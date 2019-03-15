<?php
namespace app\admin\controller;
use think\Controller;
use app\user\model\User as UserModel ;
use app\common\model\Ips as IpsModel ;
use app\admin\model\Pay as PayModel ;
use app\user\model\UserList as UserListModel ;
class Pay  extends Base
{
    //已实名用户
    public function userlist()
    {
        $lists=db()->view('user_lists','*')
            ->view('user','*','user.id=user_lists.id')
            ->where('accountid','not null')
            ->where('accountid','neq','')
        ->order('user_lists.utime',"desc")->paginate("20");
        $this->assign('lists', $lists);
        return $this->fetch();
    }   
    //开户 
    public function regist()
    {
        $uid=input('id');
        if (!$uid) {
            $this->error('参数错误');
        }
        $PayModel=new PayModel();
        $user_pay=$PayModel->where('uid',$uid)->find();
        if ($user_pay) {
            $this->error('该用户已开户,开户账号为:'.$user_pay->account);
        }
        //获取用户信息
        $UserListModel=new UserListModel();
        $userlist=$UserListModel->get($uid);
        // 客户号
        $account=$userlist->accountid;
        //身份证
        $ppnum=$userlist->ppnum;
        // 正式姓名
        $realname=$userlist->realname;
        //手机号
        $banktel=$userlist->banktel;


        $PayModel->uid = $uid;
        $PayModel->account = $account;
        $PayModel->name = $realname;
        $PayModel->peoplenum = $ppnum;
        $PayModel->phone = $banktel;
        if (!$PayModel->save()) {
            $this->error('信息添加到数据库失败');
        }
        //初始化对象
        $iPSUtils=new IpsModel();
        $body="<body><merAcctNo>2096030016</merAcctNo><userType>2</userType><customerCode>".$account."</customerCode><identityType>1</identityType><identityNo>".$ppnum."</identityNo><userName>".$realname."</userName><legalName></legalName><legalCardNo></legalCardNo><mobiePhoneNo>".$banktel."</mobiePhoneNo><contactAddress>默认</contactAddress><pageUrl>http://www.homejia.club</pageUrl><s2sUrl>http://www.homejia.club</s2sUrl><directSell></directSell><stmsAcctNo></stmsAcctNo><ipsUserName></ipsUserName></body>";
        $mercret=$iPSUtils->mercret;
        $signer=MD5($body.$mercret);
        $arg3DesXmlPara="<openUserReqXml><head><version>v1.0.1</version><reqIp>192.168.0.66</reqIp><reqDate>".date('Y-m-d h:i:s')."</reqDate><signature>".$signer."</signature></head>".$body."</openUserReqXml>";
        $ipsRequest=$iPSUtils->encrypt($arg3DesXmlPara);

        $this->assign('ipsRequest', $ipsRequest);
        return $this->fetch();
    }
    //单独开户 
    public function registadd()
    {
        $uid=input('id');
        if (!$uid) {
            return $this->fetch();
        }
        //获取用户信息
        $UserListModel=new UserListModel();
        $userlist=$UserListModel->get($uid);
        if (!$userlist) {
            $this->error('实名用户中没有编号为'.$uid.'的用户');
        }
        // var_dump($userlist);exit;
        // 客户号
        $account=$userlist->accountid;
        //身份证
        $ppnum=$userlist->ppnum;
        // 正式姓名
        $realname=$userlist->realname;
        //手机号
        $banktel=$userlist->banktel;

        //初始化对象
        $iPSUtils=new IpsModel();
        $body="<body><merAcctNo>2096030016</merAcctNo><userType>2</userType><customerCode>".$account."</customerCode><identityType>1</identityType><identityNo>".$ppnum."</identityNo><userName>".$realname."</userName><legalName></legalName><legalCardNo></legalCardNo><mobiePhoneNo>".$banktel."</mobiePhoneNo><contactAddress>默认</contactAddress><pageUrl>http://www.homejia.club</pageUrl><s2sUrl>http://www.homejia.club</s2sUrl><directSell></directSell><stmsAcctNo></stmsAcctNo><ipsUserName></ipsUserName></body>";
        $mercret=$iPSUtils->mercret;
        $signer=MD5($body.$mercret);
        $arg3DesXmlPara="<openUserReqXml><head><version>v1.0.1</version><reqIp>192.168.0.66</reqIp><reqDate>".date('Y-m-d h:i:s')."</reqDate><signature>".$signer."</signature></head>".$body."</openUserReqXml>";
        $ipsRequest=$iPSUtils->encrypt($arg3DesXmlPara);
        // var_dump($ipsRequest);exit;
        $this->assign('ipsRequest', $ipsRequest);
        return $this->fetch('regist');
    }
    //转账第一步
    public function opay()
    {
        $uid=input('id');
        if (!$uid) {
            $this->error('参数错误');
        }
        $PayModel=new PayModel();
        $user_pay=$PayModel->where('uid',$uid)->find();
        if (!$user_pay) {
            $this->error('该用户还未开通账号,前往开账户路上',"/admin/pay/regist/id/$uid");
        }
        $this->assign('user_pay', $user_pay);
        return $this->fetch();
    }
    //转账第二步
    public function charge()
    {
        $money=input('money');
        $account=input('account');
        if(!($money && $account)) {
            $this->error('参数错误');
        }
        // var_dump($_POST);exit;
        $iPSUtils=new IpsModel();
        $mercret=$iPSUtils->mercret;
        //初始化对象
        $body="<body><merBillNo></merBillNo><transferType>2</transferType><merAcctNo>2096030016</merAcctNo><customerCode>".$account."</customerCode><transferAmount>".$money."</transferAmount><collectionItemName>tocustomermoney</collectionItemName><remark></remark></body>";
        $signer=MD5($body.$mercret);
        // var_dump($signer);exit;
        $arg3DesXmlPara="<transferReqXml><head><version>v1.0.1</version><reqIp>192.168.0.66</reqIp><reqDate>2016-11-26 10:48:39</reqDate><signature>".$signer."</signature></head>".$body."</transferReqXml>";
        $ipsRequest=$iPSUtils->encrypt($arg3DesXmlPara);
        $this->assign('ipsRequest', $ipsRequest);
        return $this->fetch();
        // var_dump($ipsRequest);exit;
    }    
    //提现
    public function tixian()
    {
        $account=input('id');
        $iPSUtils=new IpsModel();
        $mercret=$iPSUtils->mercret;
        $body= "<body><merBillNo></merBillNo><customerCode>".$account."</customerCode><pageUrl>http://182.150.31.132:20078/fpms-access/action/test/pageWeb.html</pageUrl><s2sUrl>http://192.168.0.66:8005/fpms-access/action/test/s2sUrl.do</s2sUrl><bankCard></bankCard><bankCode></bankCode></body>";
        $signer=MD5($body.$mercret);
        // var_dump($signer);exit;
        $arg3DesXmlPara="<withdrawalReqXml><head><version>v1.0.1</version><reqIp>192.168.0.66</reqIp><reqDate>2016-11-26 10:48:39</reqDate><signature>".$signer."</signature></head>".$body."</withdrawalReqXml>";
        $ipsRequest=$iPSUtils->encrypt($arg3DesXmlPara);
        $this->assign('ipsRequest', $ipsRequest);
        return $this->fetch();
        // var_dump($ipsRequest);exit;
    } 
    public function search()
    {
        $value=trim(input('value'));
        $param=trim(input('param'));
        $UserListModel =new UserListModel();
	$data[$param]=['like','%'.$value.'%'];
        $lists=$UserListModel->where($data)->find();
        // var_dump($lists);exit;
        if (!$lists) {
            $this->error('没查询到啊');
        }
        $this->assign('lists', $lists);
        return $this->fetch();
    }   
}