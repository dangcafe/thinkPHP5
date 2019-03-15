<?php
namespace app\agent\validate;
use think\Validate;
class Agent extends Validate {
    protected  $rule = [
        ['agentnum', 'require', '请输入代理编号'],
        ['type', 'require|number', '请选择代理类型|代理类型格式错误'],
        ['username', 'require', '请输入真实姓名'],
        ['mobile', 'require|regex:^1[34578]{1}\d{9}$', '请输入手机号|手机号格式不正确'],
        ['banknum', 'require|number', '请输入银行卡号|银行卡格式错误'],
        ['banklocal', 'require|min:6', '请输入银行卡归属行|归属行信息请填写完整'],
        ['bindphone', 'require|regex:^1[34578]{1}\d{9}$', '请输入银行卡绑定手机号|手机号格式不正确'],
        ['ppnum','require','请输入身份证号'],
        ['img1','require','请上传身份证正面'],
        ['img2','require','请输入身份证反面'],
        ['company','require','请输入公司名称'],
        ['ceo','require','请输入法人姓名'],
        ['ppnumceo','require','请输入法人身份证号'],
        ['img3','require','请上传法人身份证正面'],
        ['img4','require','请上传法人身份证反面'],
        ['img5','require','请上传营业执照'],
    ];

    /**场景设置**/
    protected  $scene = [
        'addcompany' => ['agentnum','type','username', 'mobile','banknum','banklocal','bindphone','ppnum','img1','img2','company','ceo','ppnumceo','img3','img4','img5'],// 添加
        'adduser' => ['agentnum','type','username', 'mobile','banknum','banklocal','bindphone','ppnum','img1','img2'],// 添加
        'status' => ['id', 'status'],
        'login'=>['utel','upass'],
    ];
}