<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Account as AccountModel ;
use app\user\model\User as UserModel ;
use app\user\model\UserList as UserListModel ;

class Account extends Base
{
    //显示所有账号
    public function index()
    {
        $AccountModel = new AccountModel();
        $accountlist = $AccountModel->order('id','desc')->paginate("20");
        $this->assign('lists', $accountlist);
        return $this->fetch();
    }   
    //添加账号 
    public function add()
    {
    	if ($_POST) {
    		$account=input('account');
            $password=input('password');
            $accounts = explode('to',$account); 
            // var_dump(isset($accounts['1']));exit;
            if (isset($accounts['1'])) {
                if ($accounts['0'] < $accounts['1']) {
                    for ($i=$accounts['0']; $i <=$accounts['1'] ; $i++) {
                        //检测当前账户是否已存在
                        $check=AccountModel::get(['account' =>$i]);
                        if ($check) {
                            $this->error('账号'.$i.'已存在');
                        }
                        // 循环添加
                        $AccountModel = new AccountModel;
                        $AccountModel->account = $i;
                        $AccountModel->password =$password;
                        $AccountModel->save();
                    }
                    $this->success('操作成功','admin/account/index');
                }else{
                    $this->error("第一个数要比第二个数小!!!!");
                }
            }else{
                //检测当前账户是否已存在
                $check_account=AccountModel::get(['account' =>$account ]);
                if ($check_account) {
                    $this->error('该账号已存在');
                }else{
                    $AccountModel = new AccountModel;
                    $res=$AccountModel->allowField(true)->save($_POST);
                    $this->success('操作成功','admin/account/index');
                }
            }
    	}else{
        	return $this->fetch();
    	}
    }
    //查询账号
    public function search()
    {
        // $userlist=new User_listModel();
        if($_POST){
            $zhanghao=trim(input('zhanghao'));
            $user = ZhanghuModel::get(['zhanghao'=>$zhanghao]);
            if(!$user){
                $this->error('没有此帐号');
            }
            $userid=$user->user;
            if($userid=='...'){
                $this->error('此帐号还未被注册');
            }
            $userlist=db('user_list')->where('listid',$userid)->order('paraid',"desc")->select();
            $userinfo=db('user')->where('id',$userid)->find();
            $this->assign('userlist', $userlist);
            $this->assign('userinfo', $userinfo);
            return $this->fetch('admin/userlist');
        }else{
            return $this->fetch();
        }
    }    
    //编辑软件账号
    public function edit()
    {
        $id=input('id');
        if(!$id){
            $this->error('参数错误');
        }
        if($_POST){
            // var_dump($_POST);exit;
            $account = new AccountModel();
            // 过滤post数组中的非数据表字段数据
            $res_edit=$account->allowField(true)->save($_POST,['id' => $id]);
            if($res_edit){
                $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }else{
            $id=input('id');
            $account=AccountModel::get($id);
            $this->assign('account', $account);
            return $this->fetch();
        }
    }
    //删除账号
    public function delete()
    {
        $id=input('id');
        if ($id){
            $account = AccountModel::get($id);
            // return $account->status;exit;
            if ($account) {
                if ($account->status =='已使用') {
                    $del_res['status']='400';
                    $del_res['message']='该账号已被使用不能删除';
                    return json($del_res);
                }
                if (AccountModel::destroy($id)){
                    $del_res['status']='200';
                    $del_res['message']='删除软件账号成功';
                    return json($del_res);
                }else{
                    $del_res['status']='400';
                    $del_res['message']='删除软件账号失败';
                    return json($del_res);
                }
            } else {
                $del_res['status']='400';
                $del_res['message']='删除的软件账号不存在';
                return json($del_res);
            }
        }else{
            $del_res['status']='400';
            $del_res['message']='参数错误';
            return json($del_res);
        }
    }

}
