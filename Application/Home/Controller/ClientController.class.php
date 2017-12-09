<?php
namespace Home\Controller;
use Think\Controller;
class ClientController extends Controller {
	private $user_id;
	public function _initialize(){
		$user = get_user();
		if(!$user){
		//	session('back','Client/index');
			$this -> redirect('Login/index');
		}
		$this -> user_id = $user['id'];
	//	echo $user_id;
	}

    public function index(){
		$status = I('status');
		$search = I('search');
		$where['user_id'] = $this -> user_id;

		if(isset($status) && !empty($status)){
			$w['status'] = $where['status'] = $status;
		}else{
			$w['status'] = '';
		}
		if(isset($search) && !empty($search)){
			$w['search'] = $where['phone|nick_name'] = $search;
		}else{
			$w['search'] = '';
		}

		$info = M('report') -> where($where) -> order('created_at DESC')-> limit(0,20) ->select();
		$count['all'] = M('report') -> where(['user_id'=>$where['user_id']]) -> count();
		$count['gj'] = M('report') -> where(['user_id'=>$where['user_id'],'status'=>1]) -> count();
		$count['cj'] = M('report') -> where(['user_id'=>$where['user_id'],'status'=>2]) -> count();
		$count['sx'] = M('report') -> where(['user_id'=>$where['user_id'],'status'=>3]) -> count();
		foreach($info as &$v){
			$v['loupan_name'] = M('loupan') -> where(['id'=>$v['loupan_id']]) -> getField('title');
			$v['created_at'] = date('Y-m-d',$v['created_at']);
			$v['status'] = rostatus($v['status']);
		}
		$this -> assign('info',$info);
		$this -> assign('w',$w);
		$this -> assign('count',$count);
		$this -> display();
	}

	public function info(){
		$id = I('id');
		$where['id'] = $id;
		$info = M('report') -> where($where) ->find();
		if($info['zhiye']==1){
			$info['zhiye'] = '投资';
		}elseif($info['zhiye']==2){
			$info['zhiye'] = '自住';
		}else{
			$info['zhiye'] = '投资兼自住';
		}
		switch($info['huxing']){
			case 1;
				$info['huxing'] = '一房';
				break;
			case 2;
				$info['huxing'] = '两房';
				break;
			case 3;
				$info['huxing'] = '三房';
				break;
			case 4;
				$info['huxing'] = '四房';
				break;
			case 5;
				$info['huxing'] = '五房及以上';
				break;
		}
		$info['sex'] = $info['sex']==1?'女':'男';
		$fin = M('followup') -> where(['report_id'=>$id]) ->select();
		foreach($fin as &$v){
			$v['created_at'] = date('Y-m-d',$v['created_at']);
		}
		$this -> assign('info',$info);
		$this -> assign('fin',$fin);
		$this -> display();
	}
	//客户报备
	public function report(){
		$this -> display();
	}
	//天假报备
	public function report_in(){
		$data = I('post.');
		$ing = M('report') -> where(['phone'=>$data['phone']]) ->find();
		if($ing){
			$this -> error('该客户已经报备');
		}
		$data['user_id'] = $this -> user_id;
		$data['status'] = 1;
		$info = M('report') -> add($data);
		if($info){
			$this -> success('报备成功');
		}else{
			$this -> error('报备失败');
		}

	}

}