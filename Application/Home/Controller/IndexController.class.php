<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

		//查询楼盘
		$info = M('loupan') -> where(['is_del' => 0,'status'=>1]) -> order('id desc') ->limit(0,5) -> select();
		$this -> assign('info',$info);
		$this -> display();
	}
	

}