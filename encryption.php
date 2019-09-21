<?php

/*
* 非对称加密算法
*
*
*/
class asymmetri{
	function jsonReturn($code,$mag,$data=[]){
		exit(json_encode(array(
			'code' => $code,
			'msg'  => $mag,
			'data' => $data
		),JSON_UNESCAPED_UNICODE));
	}

	//公钥加密
	function encryption($file_path='public_key.pem',$data='123456'){
		if(file_exists($file_path)){
			$str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
			$str = str_replace("\r\n","<br />",$str);
			$pu_key = openssl_pkey_get_public($str);//这个函数可用来判断公钥是否是可用的
			if($pu_key){
				$encrypted = "";
				$decrypted = "";
				
				openssl_public_encrypt($data,$encrypted,$pu_key);//公钥加密
				/*
				*加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时
				*要注意base64编码是否是url安全的
				*/
				$encrypted = base64_encode($encrypted);
				return $encrypted;
			}else{
				$this->jsonReturn(303,'公钥错误');
			}
		}else{
			$this->jsonReturn(404,'公钥读取失败');
		}
	}


	//私钥解密
	function decrypt($file_path='private_key.pem',$encrypted){
		if(file_exists($file_path)){
			$str = file_get_contents($file_path);//将整个文件内容读入到一个字符串中
			$str = str_replace("\r\n","<br />",$str);
			//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
			$pi_key = openssl_pkey_get_private($str);
			if($pi_key){
				$decrypted = "";
				openssl_private_decrypt(base64_decode($encrypted),$decrypted,$pi_key);//私钥解密
				return $decrypted;
			}else{
				$this->jsonReturn(303,'私钥错误');
			}
		}else{
			$this->jsonReturn(404,'私钥读取失败');
		}
	}

	
}


/**
 * Created by PhpStorm.
 * User: lj
 * Date: 2018/10/21
 * Time: 3:20 PM
 * 对称加密算法
 */
class AES{
    public function __construct(){
		$this->secretKey='aeshqjnetcomwwww';
        $this->iv='aeshqjnetcomwwww';
    }

 
    //加密函数
 
    public function encrypt($str){
        $encrypt_str=mcrypt_encrypt(MCRYPT_RIJNDAEL_128,$this->secretKey,$str,MCRYPT_MODE_CBC,$this->iv);
        return base64_encode($encrypt_str);
    }
 
    //解密函数
    public function decrypt($str){
        $_str=base64_decode($str);
        $decrpt_str=mcrypt_decrypt(MCRYPT_RIJNDAEL_128,$this->secretKey,$_str,MCRYPT_MODE_CBC,$this->iv);
           return $decrpt_str;
    }
}


$asymmetri = new asymmetri();
$data = json_encode(array(
			"code" 			 => "200",
			"msg"  			 => "成功",
			"status"		 => "5",
			"price"			 => "39.00",
			"coupon_price"	 => "0.00",
			"original_price" => "39.00",
		),JSON_UNESCAPED_UNICODE
	);
echo '原文是：'.$data;
echo '<br />';
echo '<br />';
$encrypted = $asymmetri->encryption("public_key.pem",$data);
echo '非对称加密后的密文是：'.$encrypted;
echo '<br />';
echo '<br />';
$decrypt_data = $asymmetri->decrypt($file_path='private_key.pem',$encrypted);
echo '非对称解密后的是：'.$decrypt_data;
echo '<br />';
echo '<br />';




$aes=new AES();
$encrypt_str=$aes->encrypt($data);
echo '对称加密后的密文是:'.$encrypt_str;
echo '<br>';
$decrpt_str=$aes->decrypt($encrypt_str);
echo '对称解密后的是:'.$decrpt_str;
echo '<br>';
echo '<br>';
echo '<br>';


