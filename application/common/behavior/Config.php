<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace app\common\behavior;
use app\admin\model\Config as ConfigModel;
// use app\admin\model\Module as ModuleModel;

/**
 * 初始化配置信息行为
 * 将系统配置信息合并到本地配置
 * @package app\common\behavior
 * @author 陈梦晨 <741459065@qq.com>
 */
class Config
{
    /**
     * 执行行为 run方法是Behavior唯一的接口
     * @access public
     * @param mixed $params  行为参数
     * @return void
     */
    public function run(&$params)
    {
        // 获取当前模块名称
        // $module = '';
        // $dispatch = request()->dispatch();
        // if (isset($dispatch['module'])) {
        //     $module = $dispatch['module'][0];
        // }

        // 获取入口目录
        $base_file = request()->baseFile();
        $base_dir  = preg_replace(['/index.php$/', '/admin.php$/'], ['', ''], $base_file);
        define('PUBLIC_PATH', $base_dir. 'public/');

        // 视图输出字符串内容替换
        $view_replace_str = [
            // 静态资源目录
            '__STATIC__'    => PUBLIC_PATH. 'static',
            // 文件上传目录
            '__UPLOADS__'   => PUBLIC_PATH. 'uploads',
            '__PUBLIC__'    => PUBLIC_PATH. 'static/public',
            // JS插件目录
            '__LIBS__'      => PUBLIC_PATH. 'static/libs',
            '__PLUGINS__'   => PUBLIC_PATH. 'static/plugins',
            // 后台CSS目录
            '__ADMIN_CSS__' => PUBLIC_PATH. 'static/admin/css',
            // 后台JS目录
            '__ADMIN_JS__'  => PUBLIC_PATH. 'static/admin/js',
            // 后台IMG目录
            '__ADMIN_IMG__' => PUBLIC_PATH. 'static/admin/img',
            // 前台CSS目录
            '__HOME_CSS__'  => PUBLIC_PATH. 'static/home/css',
            // 前台JS目录
            '__HOME_JS__'   => PUBLIC_PATH. 'static/home/js',
            // 前台IMG目录
            '__HOME_IMG__'  => PUBLIC_PATH. 'static/home/images',
            // 前台UPLOAD目录
            '__HOME_UPLOAD__'  => PUBLIC_PATH. 'static/home/upload',
            // 公共CSS目录
            '__COMMON_CSS__'  => PUBLIC_PATH. 'static/common/css',
            // 公共JS目录
            '__COMMON_JS__'   => PUBLIC_PATH. 'static/common/js',
            // 公共IMG目录
            '__COMMON_IMG__'  => PUBLIC_PATH. 'static/common/images',
        	   // HUI框架目录
            '__HUI__'         => PUBLIC_PATH.'static/hui',
            // UPLOADify目录
            '__IFY__'         => PUBLIC_PATH.'static/uploadify',
        ];
        config('view_replace_str', $view_replace_str);

        // // 如果定义了入口为admin，则修改默认的访问控制器层
        // if(defined('ENTRANCE') && ENTRANCE == 'admin') {
        //     if ($dispatch['type'] == 'module' && $module == '') {
        //         header("Location: ".$base_dir.'admin.php/admin', true, 302);exit();
        //     }
        //     if ($module != '' && $module != 'admin' && $module != 'shop'  && $module != 'common' && $module != 'api' && $module != 'index' && $module != 'extra') {
        //         // 修改默认访问控制器层
        //         config('url_controller_layer', 'admin');
        //         // 修改视图模板路径
        //         config('template.view_path', APP_PATH. $module. '/view/admin/');
        //     }
        // }else {
        //     if ($dispatch['type'] == 'module' && $module == 'admin') {
        //         header("Location: ".$base_dir.'admin.php/admin', true, 302);exit();
        //     }
            
        //     if ($module != '' && $module != 'index' && $module != 'admin' && $module != 'shop' && $module != 'common' && $module != 'api' && $module != 'extra') {
        //         // 修改默认访问控制器层
        //         config('url_controller_layer', 'home');
        //         // 修改视图模板路径
        //         config('template.view_path', APP_PATH. $module. '/view/home/');
        //     }
        // }

        // // 定义模块资源目录
        // config('view_replace_str.__MODULE_CSS__', PUBLIC_PATH. 'static/'. $module .'/css');
        // config('view_replace_str.__MODULE_JS__', PUBLIC_PATH. 'static/'. $module .'/js');
        // config('view_replace_str.__MODULE_IMG__', PUBLIC_PATH. 'static/'. $module .'/img');
        // config('view_replace_str.__MODULE_LIBS__', PUBLIC_PATH. 'static/'. $module .'/libs');
        // config('view_replace_str.__MODULE_PLUGINS__', PUBLIC_PATH. 'static/'. $module .'/plugins');
        // // 静态文件目录
        // config('public_static_path', PUBLIC_PATH. 'static/');

        // 读取系统配置
        $system_config = cache('system_config');
        if (!$system_config) {
            $system_config = ConfigModel::getConfig();
            // var_dump($system_config);exit;
            // 所有模型配置
            // $module_config = ModuleModel::where('config', 'neq', '')->column('config', 'name');
            // foreach ($module_config as $module_name => $config) {
            //     $system_config[strtolower($module_name).'_config'] = json_decode($config, true);
            // }
            // echo config('app_debug');exit;
            // 非开发模式，缓存系统配置
            if (config('app_debug')) {
                cache('system_config', $system_config);
            }
        }
        // var_dump($system_config); exit;

        // 设置配置信息
        config($system_config);
    }
}