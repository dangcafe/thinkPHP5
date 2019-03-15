<?php
namespace app\user\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
    public function _initialize()
    {
        $user_tel=Session::get('user_tel');
        if (!$user_tel) {
            $this->redirect("user/login/index");
        }
    }
}