<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){

		$this -> display();
	}
	public function login_in(){
		$pass = I('pwd');
		$phone = I('phone');
		$res = M('users') -> where(['phone'=>$phone,'is_del'=>0]) -> find();
		if($res){
			if($res['status'] ==1){
				$this -> error('该手机号码已经被冻结，请联系管理员');
			}
			$pwd = get_pwd($pass, $res['random']);
			if($pwd == $res['password']){
				$current_user['user_name'] = $res['user_name'];
				$current_user['phone'] = $res['phone'];
				$current_user['id'] = $res['id'];
				session("user" , $current_user);//写入Session 登录成功
			//	$back = session('back');
//				if(isset($back) && !empty($back)){
//					$this -> redirect($back);
//				}else{
					$this->success('登录成功');
//				}


			}else{
				$this -> error('输入密码错误');
			}
		}else{
			$this -> error('该手机号码不存在');
		}
	}
	//zhuce
	public function regin(){
		$this -> display();
	}
	public function regin_in(){
		$pass = I('pwd');
		$repass = I('repwd');
		$phone = I('phone');
		$res = M('users') -> where(['phone'=>$phone,'is_del'=>0]) -> find();
	//	echo 123;
		if($res){
			$this -> error('该手机号码已经被注册过了');
		}
		if(!$phone || !$pass){
			$this -> error('手机号码或者密码不能为空');
		}
		if($pass != $repass){
			$this -> error('两次密码不一致');
		}
		//获取随机数
		$info['random'] = get_string();
		$info['password'] = get_pwd($pass, $info['random']);
		$info['phone'] = $phone;
		$info['user_name'] = I('nick_name');
		$result = M('users') -> add($info);
		if($result){
			$this -> success('注册成功');
		}else{
			$this -> error('注册失败');
		}
	}



}