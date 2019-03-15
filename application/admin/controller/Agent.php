<?php
namespace app\admin\controller;
use think\Controller;
use app\agent\model\Agent as AgentModel ;
class Agent  extends Base
{
    public function index ()
    {
        $AgentModel=new AgentModel();
        $agentlist=$AgentModel->order('id','desc')->paginate();
        $this->assign('agentlist', $agentlist);
        return  $this->fetch();
    }
    public function delete(){
    	$id=input('id');
        if ($id){
            $user = AgentModel::get($id);
//            var_dump($user);exit;
            if ($user) {
                if ($user->delete()){
                    AgentModel::destroy($id);
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
}