<?php
namespace app\user\model;

use think\Model;

class User extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'user';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'ctime';
    protected $updateTime = 'utime';

    public static function getOne($arr){
        $data_list = self::get(['utel'=>$utel]);
        return $data_list;
    }    
    public static function getLogintimeAttr($value){
        $logintime=date('Y-m-d H:i:s',$value);
        return $logintime;
    }

}