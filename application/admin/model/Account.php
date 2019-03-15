<?php
namespace app\admin\model;

use think\Model;

class Account extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'account';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'ctime';
    protected $updateTime = 'utime';

  
    public static function getCtimeAttr($value){
        $ctime=date('Y-m-d H:i:s',$value);
        return $ctime;
    }      
    public static function getStatusAttr($value){
        $status=$value=='1'?'已使用':'未使用';
        return $status;
    }    
    public static function getUtimeAttr($value){
        $utime=date('Y-m-d H:i:s',$value);
        return $utime;
    }

}