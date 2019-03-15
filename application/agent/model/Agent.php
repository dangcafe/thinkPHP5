<?php
namespace app\agent\model;

use think\Model;

class Agent extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'agent';
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
    
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    public function updateById($data,$id)
    {
        return $this->allowField(true)->save($data, ['id'=>$id]);
    }
    public function add($data) {
        $data['status'] = 0;
        $result = $this->save($data);
        return $result;
    }
}