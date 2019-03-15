<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;

class Base extends Controller
{
    public function _initialize()
    {
    	parent::_initialize();
    	if (!Session::get('admin_id')) {
            $this->redirect('admin/login/index');
        }
    }

}
