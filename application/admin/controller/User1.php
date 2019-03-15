<?php
namespace app\admin\controller;
use think\Controller;
use app\user\model\User as UserModel ;
use app\user\model\UserList as UserListModel ;
class User  extends Base
{
    //所有用户
    public function alluser()
    {
        $UserModel = new UserModel();
        $userlists = $UserModel->where(['status'=>"1"])->order('id',"desc")->paginate("20");
        $this->assign('userlists', $userlists);
        return $this->fetch();
    }
    //所有注册账户
    public function allacc()
    {
        $lists=db()->view('user_lists','*')
            ->view('user','*','user.id=user_lists.id')
            ->where('accountid','not null')
            ->where('accountid','neq','')
            ->order('user_lists.utime',"desc")->paginate("20");
        //$UserListModel = new UserListModel();
        //$lists = $UserListModel->where('accountid','not null')->where('accountid','neq','')->order('utime',"desc")->paginate("20");
        $this->assign('lists', $lists);
        return $this->fetch();
    }
    //查询账户
    public function search()
    {
        if ($_POST) {

        }else{

            echo'功能开发中';
        }
    }
    //删除用户
    public function delete()
    {
        $id=input('id');
        if ($id){
            $user = UserModel::get($id);
//            var_dump($user);exit;
            if ($user) {
                if ($user->delete()){
                    UserListModel::destroy($id);
                    $del_res['status']='200';
                    $del_res['msg']='删除用户成功';
                    return json($del_res);
                }else{
                    $del_res['status']='400';
                    $del_res['msg']='删除用户失败';
                    return json($del_res);
                }
            } else {
                $del_res['status']='400';
                $del_res['msg']='删除的用户不存在';
                return json($del_res);
            }
        }else{
            $del_res['status']='400';
            $del_res['msg']='参数错误';
            return json($del_res);
        }
    }
    //修改用户
    public function edit()
    {
        $id=input('id');
        if(!$id){
            $this->error('参数错误');
        }
        if($_POST){
            $user = new UserModel();
            // 过滤post数组中的非数据表字段数据
            $res_edit=$user->allowField(true)->save($_POST,['id' => $id]);
            if($res_edit){
               $this->success('修改成功');
            }else{
                $this->error('修改失败');
            }
        }else{
            $id=input('id');
            $user=UserModel::get($id);
            $this->assign('user', $user);
            return $this->fetch();
        }
    }
}