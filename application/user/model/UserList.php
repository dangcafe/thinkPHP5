<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

namespace app\user\model;

use think\Model;

/**
 * 车辆模型
 * @package app\car\model
 */
class UserList extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'user_lists';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'ctime';
    protected $updateTime = 'utime';

}