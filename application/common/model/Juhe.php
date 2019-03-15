<?php
namespace app\common\model;

class Juhe {
	// 银行卡四要素key
	public $bank_appkey='';
	//实名认证key
	public $pop_appkey='';
	//短信验证key
	public $sms_appkey='';

	// 实名认证
	public function popcheck($name,$num){
		$url = "http://op.juhe.cn/idcard/query";
		$params = array(
			"idcard" => $num,//身份证号码
			"realname" => $name,//真实姓名
			"key" => $this->pop_appkey,//应用APPKEY(应用详细页查询)
		);
		$paramstring = http_build_query($params);
		$content = $this->juhecurl($url,$paramstring);
		$result = json_decode($content,true);
		$return_data=array('status'=>400,'message'=>'');
		if($result){
			if($result['error_code']=='0'){
				if($result['result']['res'] == '1'){
					$return_data=array('status'=>200,'message'=>'身份证号码和真实姓名一致');
					return json_encode($return_data);
				}else{
					$return_data=array('status'=>400,'message'=>'身份证号码和真实姓名不一致');
					return json_encode($return_data);
				}
			}else{
					$return_data=array('status'=>400,'message'=>$result['error_code'].":".$result['reason']);
					return json_encode($return_data);
			}
		}else{
			$return_data=array('status'=>400,'message'=>'请求失败');
			return json_encode($return_data);
		}

	}
	// 银行卡四要素
	public function bankcheck($realname,$idcard,$bankcard,$mobile){
		$url = "http://v.juhe.cn/verifybankcard4/query";
		$params = array(
			"realname" => $realname,//真实姓名
			"idcard" => $idcard,//身份证号码
			"bankcard" => $bankcard,//银行卡号
			"mobile" =>  $mobile,//应用APPKEY(应用详细页查询)
			"key" => $this->bank_appkey,//应用APPKEY(应用详细页查询)
		);
		$paramstring = http_build_query($params);
		$content = $this->juhecurl($url,$paramstring);
		$result = json_decode($content,true);
		$return_data=array('status'=>400,'message'=>'');
		if($result){
			if($result['error_code']=='0'){
				if($result['result']['res'] == '1'){
					$return_data=array('status'=>200,'message'=>'银行卡预留手机号不正确');
					return json_encode($return_data);
				}else{
					$return_data=array('status'=>400,'message'=>'银行卡预留手机号不正确');
					return json_encode($return_data);
				}
			}else{
					$return_data=array('status'=>400,'message'=>$result['error_code'].":".$result['reason']);
					return json_encode($return_data);
			}
		}else{
			$return_data=array('status'=>400,'message'=>'请求失败');
			return json_encode($return_data);
		}
	}
	//短信验证
	public function juhesms($phone=null,$code=null){
		//返回数据
        $data=array("result"=>400,'message'=>'请填写手机号','code'=>null);
		//验证手机
        if (!$phone) {
            return $data;
        }
		//验证码生成
        if (!$code) {
            $code=mt_rand("100000","999999");
		}
		//0000000是聚合手机号验证码的id，需要更改
		$url = "http://v.juhe.cn/sms/send?mobile=".$phone."&tpl_id=0000000&tpl_value=%23code%23%3D".$code."&key=".$this->sms_appkey;
		$content = json_decode($this->juhecurl($url),TRUE);
		// return $content;exit;
		if ($content['error_code']!=0) {
            $data['message']=$content['reason'] ;
            return $data;
        }else{
            $data['message']=$content['reason'];
            $data['result']=200;
            $data['code']=$code;
            return $data;
        }
	}
	/**
	 * 请求接口返回内容
	 * @param  string $url [请求的URL地址]
	 * @param  string $params [请求的参数]
	 * @param  int $ipost [是否采用POST形式]
	 * @return  string
	 */
	public function juhecurl($url,$params=false,$ispost=0){

	    $httpInfo = array();
	    $ch = curl_init();
	 
	    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
	    // curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
	    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    if( $ispost )
	    {
	        curl_setopt( $ch , CURLOPT_POST , true );
	        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
	        curl_setopt( $ch , CURLOPT_URL , $url );
	    }
	    else
	    {
	        if($params){
	            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
	        }else{
	            curl_setopt( $ch , CURLOPT_URL , $url);
	        }
	    }
	    $response = curl_exec( $ch );
	    if ($response === FALSE) {
	        //echo "cURL Error: " . curl_error($ch);
	        return false;
	    }
	    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
	    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
	    curl_close( $ch );
	    return $response;
	}
}