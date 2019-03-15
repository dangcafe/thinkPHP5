<?php
namespace app\common\model;

//环球付
class Ips {

    //3des秘钥
 	public $key ="wLgpzjN3CV5KVcyqKFY34KDc";
 	//3des向量
 	public $iv ="BhvJ4DW4";
    //商户md5证书
 	public $mercret="TosvMsmAtqPL7bvYnJhbxkkqkUfHOyROkdrJWvdwhqMt5rncr078gS7wUnG3UUpZu8T1AwCw4BdG6xjoSecSMjNSrayaj0rdlR4UWrNetPceRzhJAB44wNBBTr9NJc6f";
 function encrypt($input){//数据加密
	 $size = mcrypt_get_block_size(MCRYPT_3DES,MCRYPT_MODE_CBC);
	 $input = $this->pkcs5_pad($input, $size);
	 $key = str_pad($this->key,24,'0');
	 $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
	 $iv = $this->iv;
	 @mcrypt_generic_init($td, $key, $iv);
	 $data = mcrypt_generic($td, $input);
	 mcrypt_generic_deinit($td);
	 mcrypt_module_close($td);
	 //    $data = base64_encode($this->PaddingPKCS7($data));
	 $data = base64_encode($data);
	 return $data;
 }
 
 function decrypt($encrypted){//数据解密
	 $encrypted = base64_decode($encrypted);
	 $key = str_pad($this->key,24,'0');
	 $td = mcrypt_module_open(MCRYPT_3DES,'',MCRYPT_MODE_CBC,'');
	 $iv = $this->iv;
	 $ks = mcrypt_enc_get_key_size($td);
	 @mcrypt_generic_init($td, $key, $iv);
	 $decrypted = mdecrypt_generic($td, $encrypted);
	 mcrypt_generic_deinit($td);
	 mcrypt_module_close($td);
	 $y=$this->pkcs5_unpad($decrypted);
	 return $y;
 }
 function pkcs5_pad ($text, $blocksize) {
	 $pad = $blocksize - (strlen($text) % $blocksize);
	 return $text . str_repeat(chr($pad), $pad);
 }
 function pkcs5_unpad($text){
	 $pad = ord($text{strlen($text)-1});
	 if ($pad > strlen($text)) {
		return false;
	}
	if (strspn($text, chr($pad), strlen($text) - $pad) != $pad){
		return false;
	}
	return substr($text, 0, -1 * $pad);
 }
 
 function PaddingPKCS7($data) {
	 $block_size = mcrypt_get_block_size(MCRYPT_3DES, MCRYPT_MODE_CBC);
	 $padding_char = $block_size - (strlen($data) % $block_size);
	 $data .= str_repeat(chr($padding_char),$padding_char);
	 return $data;
 }
 
 /**
  * post提交
  * 
  * */
  
 function request_post($url = '', $post_data = array()) {
        if (empty($url) || empty($post_data)) {
            return false;
        }
        
        $o = "";
        foreach ( $post_data as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);

        $postUrl = $url;
        $curlPost = $post_data;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        
        return $data;
    }
    
}