<?php
namespace app\admin\model;

use think\Model;

class Pay extends Model
{
    /**
     * 构造函数
     * @access public
     * @param  $url 网址
     * @param  $arr 数组
     */
	protected $name = 'pay';
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;
    protected $createTime = 'ctime';
    protected $updateTime = 'utime';
}
?>