<?php
namespace app\admin\controller;
use app\admin\model\Config as ConfigModel ;


class Setting  extends Base
{
    //网站配置
    public function index(){
        $ConfigModel= new ConfigModel();
        $setting=$ConfigModel->where('status','eq','1')->paginate('20');
        // var_dump($setting);exit;
        $this->assign('setting', $setting);
        return $this->fetch();
    }
    public function update(){
    	var_dump('$_POST');exit;
    }
}