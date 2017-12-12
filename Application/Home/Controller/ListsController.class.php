<?php
namespace Home\Controller;
use Think\Controller;
class ListsController extends Controller {
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
		session('key',2);
		//查询楼盘
		$info = M('loupan') -> where(['is_del' => 0,'status'=>1]) -> order('id desc') ->limit(0,5) -> select();
		$this -> assign('info',$info);
		$this -> display();
	}

	public function loadloupan(){
		$where['is_del'] = 0;
		$where['status'] = 1;
		$count = I('time');
		$info = M('loupan') -> where($where) -> order('id desc') ->limit(5*$count,5) -> select();
		//   dump($project);
		if($info){
			$this -> assign('info',$info);
			$this->success($this->fetch(),"",true);
		}else{
			$this -> error('没有更多数据！');
		}
	}

	public function lpinfo(){

		$user = get_user();
		if(!$user){
			$this -> redirect('Login/index');
		}
		$id = I('id');
		$where['id'] = $id;
		$info = M('loupan') -> where($where) ->  find();
		$info['city'] = M('citys') -> where(['id'=>$info['city_id']]) -> getField('city_name');
		$info['tag'] = explode(';',$info['tag']);
		//处处相应的佣金规则 跟 合作规则
		$cooperation = M('cooperation') -> where(['loupan_id'=>$id]) ->  find();
		$cooperation['des'] = explode(';',$cooperation['des']);
		//佣金规则
		$commission = M('commission') -> where(['loupan_id'=>$id]) ->  find();
		$commission['des'] = explode(';',$commission['des']);
		//查出轮播图
		$luobo = M('zhuli') -> where(['loupan_id'=>$id, 'type'=>1]) ->select();
		//   dump($luobo);
		$huxing = M('zhuli') -> where(['loupan_id'=>$id, 'type'=>2]) ->select();
		$this -> assign('luobo',$luobo);
		$this -> assign('huxing',$huxing);
		$this -> assign('info',$info);
		$this -> assign('cooperation',$cooperation);
		$this -> assign('commission',$commission);
		$this -> display();
	}
	public function detail(){
		$data = I('get.');
		if($data['type'] == 1){
			$table = 'commission';
		}else{
			$table = 'cooperation';
		}
		$info = M($table) -> where(['id' => $data['pid']]) -> find();
		$info['info'] = explode(';',$info['contents']);
		$info['type'] = $data['type'];
		$this -> assign('info',$info);
		$this -> display();
	}

}