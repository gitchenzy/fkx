<?php
namespace Home\Controller;
use Think\Controller;
class CenterController extends Controller {
	private $user_id;
	public function _initialize(){
		$user = get_user();
		if(!$user){
			//	session('back','Client/index');
			$this -> redirect('Login/index');
		}
		$this -> user_id = $user['id'];
		//	echo $user_id;
		session('key',4);
	}
    public function index(){

		$info = M('users') -> where(['id'=>$this -> user_id]) -> find();

		$this -> assign('info',$info);
		$this -> display();
	}

	public function mymoney(){
		$info = M('users') -> where(['id'=>$this -> user_id]) -> find();
		$this -> assign('info',$info);
		$this -> display();
	}


}