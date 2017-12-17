<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	public function _initialize(){
		$user = get_user();
		if($user){
			//	session('back','Client/index');
			$this -> assign('yongjin',1);
		}else{
			$this -> assign('yongjin',2);
		}

	}

    public function index(){
		session('key',1);
		//查找出要轮播的图片
		$ad = M('ad') -> where(['status'=>2,'positions'=>'index']) -> order('sort asc') -> limit(3) -> select();
		//查询楼盘
		$info = M('loupan') -> where(['is_hot'=>2, 'is_del' => 0,'status'=>1]) -> order('id desc') ->limit(0,5) -> select();
		$this -> assign('info',$info);
		$this -> assign('ad',$ad);
		$this -> display();
	}
	public function loadloupan(){

		$count = I('time');
		$info = M('loupan') -> where(['is_hot'=>2, 'is_del' => 0,'status'=>1]) -> order('id desc') ->limit(5*$count,5) -> select();

		//   dump($project);
		if($info){
			$this -> assign('info',$info);
			$this->success($this->fetch(),"",true);
		}else{
			$this -> error('没有更多数据！');
		}
	}
	public function pingtai(){
		$this -> display();
	}
}