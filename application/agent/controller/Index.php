<?php
namespace app\agent\controller;
use think\Controller;
use app\common\model\Juhe ;
class Index  extends Controller
{
//代理商注册页面
    public function index()
    {
        return $this->fetch();
    }
    public function add() {
        if(!request()->isPost()) {
            $this->error('请求错误');
        }
        // 获取表单的值
        $data = input('post.');
        //检验数据
        $validate = validate('Agent');
        if ($data['type']!=1) {
            if(!$validate->scene('addcompany')->check($data)) {
                $this->error($validate->getError());
            }
        }else{
            if(!$validate->scene('adduser')->check($data)) {
                $this->error($validate->getError());
            }
        }
        // halt('yes');
        $accountResult = Model('Agent')->get(['ppnum'=>$data['ppnum']]);
        // 判定提交的用户是否存在
        if($accountResult) {
            $this->error('添加失败:该身份证已认证');
        }
        // 实名认证
        $juhe=new Juhe();
        $ppnum_check=json_decode($juhe->popcheck($data['username'],$data['ppnum']),true);
        if ($ppnum_check['status']==400) {
        	$this->error('添加失败:'.$ppnum_check['message']);
        }
        //银行卡认证
        $bank_check=json_decode($juhe->bankcheck($data['username'],$data['ppnum'],$data['banknum'],$data['bindphone']),true);
        if ($bank_check['status']==400) {
        	$this->error('添加失败:'.$bank_check['message']);
        }
        //信息审核完成加入数据库
        $accountId = model('Agent')->add($data);
        if(!$accountId) {
            $this->error('申请失败');
        }
        $this->success('申请成功');
    }
}