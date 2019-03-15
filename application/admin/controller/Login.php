<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use app\admin\model\Admin as AdminModel;
class Login extends Controller
{
    //登录
    public function index()
    {
        if ($_POST) {
            $back=array('status'=>400,'message'=>'');
            $name=trim(input('name'));
            $passwd=trim(input('passwd'));
            if (!($name && $passwd) ) {
                $back['message']='请填写帐号密码';
                return json($back);
                exit;
            }else{
                $checkTel = AdminModel::get(['name'=>$name]);
                if (!$checkTel) {
                    $back['message']='帐号不存在';
                    return json($back);
                }
                if ($checkTel->passwd != $passwd ) {
                    $back['message']='密码不正确';
                    return json($back);
                }else if ($checkTel->status != 1) {
                    $back['message']='帐号出现异常';
                    return json($back);
                }else{
                    $checkTel->ip = get_client_ip();
                    $checkTel->save();
                    Session::set('name',$checkTel->name);
                    Session::set('admin_id',$checkTel->id);
                    $back['message']='登录成功';
                    $back['status']=200;
                    return json($back);
                }
            }
        //注册
        }else{
            return $this->fetch();
        }
    }
    // 注册
    // public function regist()
    // {
    //     if ($_POST) {
    //         //返回数据初始化
    //         $data=array('status'=>100,"message"=>"");
    //         // 核对手机验证码
    //         $recode=input('recode');
    //         $pcode=Session::get('pcode');
    //         if ($recode!=$pcode) {
    //             $data['message']="验证码错误";
    //             return $data;
    //         }
    //         //加入用户
    //         $user = new UserModel;
    //         $user->utel = input('phone');
    //         $user->upass = input('passwd');
    //         $checkTel = UserModel::get(['utel'=>input('phone')]);
    //         if (!$checkTel) {
    //             if ( $user->save()) {
    //                 $data['status']=200;
    //                 $data['message']='OK';
    //                 $user_list = new ListModel(['uid'  => $user->id]);
    //                 $user_list->save();
    //                 Session::set('user_id',$user->id);
    //                 return $data;
    //             } else {
    //                 $data['message']=$user->getError();
    //                 return $data;
    //             }
    //         }else{
    //                 $data['message']="手机号已存在";
    //                 return $data;
    //         }
    //     //注册
    //     }else{
    //         return $this->fetch();
    //     }

    // }
    //退出
    public function outlogin()
    {
        Session::clear();
        $this->redirect("/index");
    }
        //退出登录
    public function  loginout()
    {
        session(null);
        Session::clear();
        $this->redirect('/admin/index/index');
    }
}
