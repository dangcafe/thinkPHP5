<?php
namespace app\common\model;

/**
接口注册
 */
class Registapi {


    public static function regist($name,$account,$pass=null,$invite=null)
    {
            //操作
            $data['Action']="ReqCreateAccount";
            // 所属的母账号
            // $data['AccountID']="117730213";
            // //所属的母账号
            // $data['BrokderID']="3040";
            //待开户的子账号密码
            if (!$pass) {
                $pass=mt_rand('100000','99999999');
            }          
            if ($invite) {
                $data['MonitorID']=$invite;
            }
            $data['ChdPassword']=$pass;
            // 待开户姓名
            $data['ChdName']=$name;
            //开户的帐号
            $data['ChdAccountID']=$account;
            //管理员账号
            $data['UserID']="superadmin";
            //管理员密码
            $data['UserKey']='215e912d80c09a2f7255812ff63b1e50';
            ksort($data);
            // return $data;
            $sign='';
            foreach ($data as $key => $value) {
                $sign.=$key.'='.$value.'&';
            }
            // return $data;
            $sign=md5(rtrim($sign,'&'));
            unset($data['UserKey']);
            $data['sign']=$sign;
            $urlpath='';
            foreach ($data as $key => $value) {
                 $urlpath.=$key.'='.$value.'&';
            }
            $urlpath=rtrim($urlpath,'&');
            // return $urlpath;

            $url="http://39.104.124.254:8082/AccMgrt.aspx?".$urlpath;
            $res=json_decode(file_get_contents($url),true);
            $res['passwd']=$pass;
            return $res;
    }


}