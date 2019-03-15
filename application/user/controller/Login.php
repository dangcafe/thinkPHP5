<?php
namespace app\user\controller;
use think\Controller;
use think\Session;
use app\user\model\User as UserModel;
use app\user\model\UserList as ListModel;
use app\common\model\SignatureHelper;
use app\common\model\Juhe as Juhemodel;

class Login extends Controller
{
    //登录
    public function index()
    {
        if ($_POST) {
            $data=array('status'=>400,'message'=>"登录失败");
            $utel=input('utel');
            $upass=input('upass');
            if (!($utel && $upass) ) {
                $data['message']='请填写帐号或密码';
                return json($data);
            }else{
                $checkTel = UserModel::get(['utel'=>$utel]);
                if (!$checkTel) {
                    $data['message']='帐号不存在';
                    return json($data);
                }
                if ($checkTel->upass != $upass ) {
                    $data['message']='密码不正确';
                    return json($data);
                }else if ($checkTel->status != 1) {
                    $data['message']='帐号出现异常';
                    return json($data);
                }else{
                    $checkTel->ip   = get_client_ip();
                    $checkTel->ltime += 1;
                    $checkTel->logintime = time();
                    $checkTel->save();
                    Session::set('user_tel',$checkTel->utel);
                    Session::set('user_ip',$checkTel->ip);
                    Session::set('user_id',$checkTel->id);
                    Session::set('user_lt',$checkTel->ltime);
                    Session::set('user_logintime',$checkTel->logintime);
                    Session::set('user_invite',$checkTel->invite);
                    $data['message']='登录成功';
                    $data['status']=200;
                    return json($data);
                    // $this->redirect("user/index/index");
                }
            }
        //注册
        }else{
            return $this->fetch();
        }
    }
    // 注册
    public function regist()
    {
        if ($_POST) {
            //返回数据初始化
            $data=array('status'=>100,"message"=>"");
            // 核对手机验证码
            $recode=input('recode');
            $pcode=Session::get('pcode');
            if ($recode!=$pcode) {
                $data['message']="验证码错误";
                return $data;
            }
            //加入用户
            $user = new UserModel;
            $user->utel = input('phone');
            $user->upass = input('passwd');
            $user->invite = trim(input('invite'));
            $invite=$user->invite;
            $check_invite=array("dangcafe");
            //匹配邀请码，邀请码为dangcafe，
            if(!in_array(substr($invite , 0 , 8),$check_invite)){
                $data['message']="邀请码错误01";
                return $data;
            }
            $checkTel = UserModel::get(['utel'=>input('phone')]);
            if (!$checkTel) {
                if ( $user->save()) {
                    $data['status']=200;
                    $data['message']='OK';
                    $user_list = new ListModel(['uid'  => $user->id]);
                    $user_list->save();
                    Session::set('user_id',$user->id);
                    return $data;
                } else {
                    $data['message']=$user->getError();
                    return $data;
                }
            }else{
                    $data['message']="手机号已存在";
                    return $data;
            }
        //注册
        }else{
            return $this->fetch();
        }
    }
    //退出登陆
    public function outlogin()
    {
        Session::clear();
        $this->redirect("/index");
    }
    //发送短信
    public function sendSms($phone=null,$code=null,$status=0) {
        if (!$phone) {
            $data=array("result"=>'100','message'=>'请填写手机号');
            return $data;
        }
        $Juhemodel=new Juhemodel();
        $back_res=$Juhemodel->juhesms($phone);
        if ($back_res['result']==200) {
            Session::set('pcode',$back_res['code']);
            $data['message']='OK';
            $data['result']=200;
            return $data;
        }
        return $back_res ;
    }

}
