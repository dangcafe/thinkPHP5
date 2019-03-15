<?php
namespace app\admin\model;

use think\Model;

/**
 * 后台配置模型
 * @package app\admin\model
 */
class Config extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $name = 'config';

    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    /**
     * 获取配置信息
     * @param  string $name 配置名
     * @return mixed
     */
    public static function getConfig($name = '')
    {
        $configs = self::where('status','eq','1')->column('value', 'name');
        return $configs ;
        // $result = [];
        // foreach ($configs as $config) {
        //     // switch ($config['type']) {
        //         // case 'array':
        //         //     $result[$config['name']] = parse_attr($config['value']);
        //         //     break;
        //         // case 'checkbox':
        //         //     $result[$config['name']] = explode(',', $config['value']);
        //         //     break;
        //         // default:
        //             $result[$config['name']] = $config['value'];
        //             // break;
        //     // }
        // }

        // return $name != '' ? $result[$name] : $result;
    }
}