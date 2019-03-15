<?php
namespace app\user\controller;
use think\Db as DbModel;
use think\Controller;
use think\Session;
use app\user\controller\Base;
use app\user\model\User as UserModel;
use app\user\model\UserList as ListModel;
use app\common\model\Registapi;
use app\common\model\Juhe;
use app\admin\model\Account as AccountModel ;

class Index extends Base
{
    //登录
    public function index()
    {
        $userlist=ListModel::get(["uid"=>Session::get("user_id")]);
        $this->assign('userlist',$userlist);
        return $this->fetch();
    }
    //分配账号
    public function regist()
    {
        $ajax=array("status"=>"400","message"=>"更新失败");
        $uid=Session::get('user_id');
        $realname=trim(input('realname'));
        $ppnum=trim(input('ppnum'));
        $banknum=trim(input('banknum'));
        $banknamel=trim(input('bankname'));
        $invite=trim(input('invite'));
        if (!($realname&&$ppnum&&$banknum&&$bankname&&$invite)) {
            $ajax['message']="存在未填写内容,请填写完成后再试";
            return $ajax;exit;
        }
        $juhe=new Juhe();
        $check=json_decode($juhe->popcheck($realname,$ppnum),true);
        if ($check["status"]!=200) {
            $ajax['message']=$check['message'];
            return $ajax;exit;
        }
        $userlist = new ListModel();
        // 过滤post数组中的非数据表字段数据
        $res_local=$userlist->allowField(true)->save($_POST,['uid' =>$uid]);
        if ($res_local){
            // 查询是否分配了账号
            $user_ckeck= ListModel::get(['uid' =>$uid]);
            if ($user_ckeck->accountid) {
                    $ajax['status']=200;
                    $ajax['message']='成功';
                    return $ajax;exit;
            }
            //查看当前已分配的帐号
            $maxid=$userlist->where(['status'=>'2'])->max('accountid');
            if (!$maxid) {
                $AccountID="88800050";
            }else{
                $AccountID=$maxid+1;
            }
            $res=Registapi::regist($realname,$AccountID,null,$invite);
            while ($res['ErrorID'] == "13005") {
                $AccountID++;
                $res=Registapi::regist($realname,$AccountID);
            }

            if ($res['ErrorID']!=0) {
                $ajax['message']='上游开户失败：'.$res['ErrorMsg'];
                return $ajax;exit;
            }else{
                $res2=$userlist->save(['accountid'  =>$res['ChdAccountID'],'password' => $res['passwd'],'status'=>'2'],['uid' =>$uid]);
                if ($res2) {
                    $ajax['status']=200;
                    $ajax['message']='信息更新成功';
                    return $ajax;exit;
                }else{
                    $ajax['message']='信息更新失败:02';
                    return $ajax;exit;
                }
            }
        }else{
            $ajax['message']='信息更新失败:01';
            return $ajax;exit;
        }
    }
    //注册软件账号
    public function distribute ()
    {
        //获取session中的值
        $uid=Session::get("user_id");
        $invite=Session::get("user_invite");
        $userlist=ListModel::get(["uid"=>$uid]);
        //判断是否绑定
        if (!$userlist->banknum) {
            $data=array('message'=>'未绑定银行卡','url'=>"/user/index/bandbank");
            $this->assign('data',$data);
            return $this->fetch('link');
        }
        // 查询是否分配了账号
        $user_ckeck= ListModel::get(['uid' =>$uid]);
        if ($user_ckeck->accountid){
            echo '您已开户';exit;
        }
        $AccountModel=new AccountModel();
        $account=$AccountModel->where('status', '0')->order('ctime','asc')->order('id','asc')->find();
        if (!$account) {
                $this->error("账号已分配完毕,请联系管理员添加账号");
        }
        // var_dump($account);exit;
        $add_account=$userlist->save(['accountid'  =>$account->account,'password' => $account->password,'status'=>'2'],['uid' =>$uid]);
        if ($add_account) {
            $account->status=1;
            $account->userid=$uid;
            $account->save();
            $this->success("账号分配成功");
        }else{
            $this->success("交易账号分配失败,请联系管理员.");
        }
    }
    //绑定银行卡
    public function bandbank()
    {
        if ($_POST) {
            $userlist=ListModel::get(["uid"=>Session::get("user_id")]);
            if ($userlist->banknum) {
                $return_data=array('status'=>"200",'message'=>"已完成认证");
                return $return_data;
            }
            $bankname=trim(input('bankname'));
            $banknum=trim(input('banknum'));
            $banktel=trim(input('banktel'));
            //聚合数据查询
            $juhe=new Juhe();
            $res=json_decode($juhe->bankcheck($userlist->realname,$userlist->ppnum,$banknum,$banktel),true);
            if ($res['status']!=200) {
                return json($res);
            }
            $userlist->bankname=$bankname;
            $userlist->banknum=$banknum;
            $userlist->banktel=$banktel;
            //更新数据
            if ($userlist->save()) {
                $return_data=array('status'=>"200",'message'=>"认证成功");
                return $return_data;
            }else{
                $return_data=array('status'=>"400",'message'=>"认证失败:002");
                return $return_data;
            }
            # code...
        }else{
            $userlist=ListModel::get(["uid"=>Session::get("user_id")]);
            //判断实名认证
            if (!$userlist->ppnum) {
                $data=array('message'=>'您还未实名认证','url'=>"/user/index/bandpop");
                $this->assign('data',$data);
                return $this->fetch('link');
                echo '请绑定银行卡';exit;
            }
            $this->assign('userlist',$userlist);
            return $this->fetch();
        }
    }
    //绑定实名认证
    public function bandpop()
    {
        if($_POST) {
		
            $ListModel=new ListModel;
            $userlist=ListModel::get(["uid"=>Session::get("user_id")]);
            if ($userlist->ppnum) {
                $return_data=array('status'=>"200",'message'=>"已完成认证");
                return $return_data;
            }

            $realname=trim(input('realname'));
            $ppnum=trim(input('ppnum'));
            $checkpp=substr($ppnum,0,2);
           // if ($checkpp=='37') {
 		//return $this->error('超出开户范围');exit;
                //$return_data=array('status'=>"400",'message'=>"超出开户范围");
                //return $return_data;
           // }
   		
            // 查询是否已经认证过该用户
            $ListModel=new ListModel;
            $check_ppnum=$ListModel->where('ppnum',$ppnum)->find();
		
            if ($check_ppnum) {
        		$this->error('该身份证已被其他账号绑定,如被他人盗用,请及时与客服联系');
        		exit;
            }
   
            // 获取表单上传文件

            $files = request()->file('image');
            if (!$files) {
                $this->error('上传身份证失败');
                exit;
            }
            foreach($files as $file){
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    // 输出 42a79759f284b767dfcb2a0197904287.jpg
                    $img[]=date('Ymd').DS.$info->getFilename();
                }else{
                // 上传失败获取错误信息
                    $this->error($file->getError());
                    exit;
                }
            }

            //聚合数据查询
            $juhe=new Juhe();
            $res=json_decode($juhe->popcheck($realname,$ppnum),true);
            if ($res['status']!=200) {
                $this->error($res['message']);
            }

            //更新数据
            $userlist->img1=$img['0'];
            $userlist->img2=$img['1'];
            $userlist->realname=$realname;
            $userlist->ppnum=$ppnum;
            if ($userlist->save()) {
                $this->error('认证成功');
                exit;
            }else{
                $this->error('认证失败002');
                exit;
            }
        }else{
            $userlist=ListModel::get(["uid"=>Session::get("user_id")]);
            $this->assign('userlist',$userlist);
            return $this->fetch();
        }
    }
    public function test(){
        $juhe=new Juhe();
        $res=json_decode($juhe->bankcheck('葛晴峰','320923199202232715','6212261001015665521','13162673518'));
        var_dump($res);exit;
        
    }
}
