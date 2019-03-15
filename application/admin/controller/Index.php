<?php
namespace app\admin\controller;
use think\Controller;
use app\user\model\User as UserModel ;
use app\user\model\UserList as UserListModel ;


class Index extends Base
{
//    后台首页
    public function index()
    {
        return $this->fetch();
    }
    public function edit()
    {
        $this->error('修改功能还没写呢');
    }
    public function acclist()
    {
        $this->error('修改功能还没写呢');
    }
}