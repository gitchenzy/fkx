<?php
namespace Home\Controller;
use Think\Controller;
class WeixinController extends Controller {


    public function index(){

		$this -> checkSignature();

	}

	private function checkSignature()
	{

	$echostr = $_GET["echostr"];
	//	echo $signature;
	//	exit;
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];
	$token = '1234567';
	$signature = $_GET["signature"];
	$tmpArr = array($timestamp, $nonce, $token);
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );

	if( $tmpStr ==  $signature){
		echo $echostr;
	}
}


}