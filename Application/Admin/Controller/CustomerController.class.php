<?php
/**
 * Created by PhpStorm.
 * User: Huge
 * Date: 2016/3/5 0005
 * Time: 14:00
 */

namespace Admin\Controller;


class CustomerController extends AdminController
{
    protected function _initialize(){
        parent::_initialize();
        $this->dal = M("users");

    }
    public function customer(){
        $this->display();
    }
    public function index(){
        $this->display();
    }
    public function loadCustomer(){
        // sort:id order:desc limit:10 offset:0
        $where['is_del'] = 0;
        //$page = i('page');
        //$rows = i('rows');
        $offset = i("offset");

        $limit = i("limit");
        $auto = i("auto");
        $search_key = i('search_key');

        $search_value = i('search');
        if($search_value){
            $where['user_name|phone'] = array('LIKE',"%$search_value%");;
        }

        $sort = i('sort');
        $order = i('order');
        if(!empty($sort)){
            $reorder = $sort." ".$order;
        }else{
            $reorder = 'created_at desc';
        }
        $list =  M('users')-> where($where) -> order($reorder) ->limit($offset,$limit) -> select();
        foreach($list as &$v){
            $v['status_name'] = $v['status']==1?'冻结':'正常';
//            $v['sex_name'] = $v['sex']==1?'男':'女';
//            $v['is_auth'] = $v['is_auto']?'认证':'未认证';
            $v['created_at'] = date('Y-m-d H:i:s',$v['created_at']);
//            $v['grade_name'] = M('user_grade') -> where(['id'=>$v['grade_id']]) -> getField('title');
        }
        //dump($list);
        $count =   M('users')-> where($where) -> order($reorder) -> count();
        $list_array= array("total"=>$count,"rows"=>$list?$list:array());
        echo json_encode($list_array);
    }
    //添加会员信息
    public function addCustomer(){
       if(IS_POST){
            $data = i('post.');
            $data['create_at'] = time();
            $res = M('users') -> add($data);
            if($res){
                $this->success('添加成功！');
            }else{
                $this -> error('添加失败！');
            }
       }else{
       //    $res = M('user_grade') -> getField("id,title");
           //  $arr =$this->dal_cs ->where($where)->order("Sort asc")->getField("CtmStatusID,CtmStatusName");
        //   $this->assign('grade',$res);
           //dump($res);
           $this -> display('editcustomer');
       }
    }
    //修改会员
    public function editCustomer(){
        $id = i('id');
        $where['id'] = $id;
        $info = M('users') -> where($where) -> find();
        if(IS_POST){
            $data = i('post.');
            //相等的话，则不做图片删除处理
            if($data['pic'] != $info['pic']){
                $file = ROOT_PATH.$info['pic'];
                unlink($file);
            }
            M('users') -> where($where) -> save($data);
            $this -> success('修改成功！');
        }else{
//            $res = M('user_grade') -> getField("id,title");
//            $this->assign('grade',$res);
            $this->assign('info',$info);
            $this -> display('editcustomer');
        }
    }
    //删除会员
    public function delCustomer(){
        //$array_id = explode(';',$_POST['ids']);
        $arr["id"] = array("in",$_POST['ids']);
        $data['is_del'] = 1;
        if(M('users')->where($arr)->save($data) !== false){
            $this -> success('删除成功！');
        }else{
            $this -> error("删除失败！");
        }
    }
    //设置会员密码
    public function editPWD(){
        if(IS_POST){
            $data = i('post.');
            $id = i('id');
            if($data['pass'] != $data['repass']){
                $this -> error('两次密码不一致！');
                exit;
            }
            $string = get_string();
            $sa['random']= $string->rand_string(6,1);
            $sa["password"] = md5(md5($data['pass']).$sa['random']);
            M('users') -> where(array('id'=>$id)) -> save($sa);
            $this -> success('重置成功！');
        }else{
            $this -> display('editpwd');
        }
    }

    public function report(){
        $this -> display();
    }
    public function loadReport(){
        $offset = i("offset");
        $limit = i("limit");
        $search_key = i('search_key');
        $search_value = i('search');
        if($search_value){
            $where['nick_name|phone'] = array('LIKE',"%$search_value%");;
        }
        $sort = i('sort');
        $order = i('order');
        if(!empty($sort)){
            $reorder = $sort." ".$order;
        }else{
            $reorder = 'id asc';
        }
        $list =  M('report')-> where($where) -> order($reorder) ->limit($offset,$limit) -> select();
        foreach($list as &$li){
            $li['user_name'] = M('users') -> where(['id'=>$li['user_id']]) -> getField('user_name');
            $li['user_phone'] = M('users') -> where(['id'=>$li['user_id']]) -> getField('phone');
            $li['loupan_name'] = M('loupan') -> where(['id'=>$li['loupan_id']]) -> getField('title');
            switch($li['zhiye']){
                case 1;
                    $li['zhiye'] = '投资';
                    break;
                case 2;
                    $li['zhiye'] = '自住';
                    break;
                case 3;
                    $li['zhiye'] = '投资兼自住';
                    break;
                default:
                    $li['zhiye'] = '无';
                    break;
            }
            switch($li['huxing']){
                case 1;
                    $li['huxing'] = '一房';
                    break;
                case 2;
                    $li['huxing'] = '两房';
                    break;
                case 3;
                    $li['huxing'] = '三房';
                    break;
                case 4;
                    $li['huxing'] = '四房';
                    break;
                case 5;
                    $li['huxing'] = '五房及以上';
                    break;
                default:
                    $li['huxing'] = '无';
                    break;

            }
            if($li['status']==1){
                $li['status'] = '跟进';
            }elseif($li['status']==2){
                $li['status'] = '成交';
            }else{
                $li['status'] = '失效';
            }
            $li['sex'] = $li['sex']==1?'女':'男';
            $li['created_at'] = date('Y-m-d H:i',$li['created_at']);
        }
        //dump($list);
        $count =   M('report')-> where($where) -> order($reorder) -> count();
        $list_array= array("total"=>$count,"rows"=>$list?$list:array());
        echo json_encode($list_array);

    }
    public function editReport(){
        $id = i('id');
        $where['id'] = $id;
        if(IS_POST){
            $data = i('post.');
            M('report') -> where($where) -> save($data);
            $this->success('修改成功！');
        }else{
            $res = M('report') -> where($where)-> find();
            $this->assign('info',$res);
            $this-> display('editreport');
        }
    }
    public function delReport(){
        $array_id['id'] = array('in',$_POST['ids']);
        M('report') -> where($array_id) -> delete();
        $this -> success('删除成功！');
    }
    public function genj(){
        if(IS_POST){
            $data = i('post.');
            $data['created_at'] = time();
            M('followup') -> add($data);
            $this->success('增加成功！');
        }else{
            $id = I('id');
            $res = M('followup') -> where(['report_id'=>$id]) -> select();
            $this->assign('info', $res);
            $this-> display();
        }
    }

    //会员等级
    public function grade(){
        $this -> display();
    }
    //加载会员等级
    public function loadGrade(){
        $offset = i("offset");
        $limit = i("limit");
        $search_key = i('search_key');
        $search_value = i('search');
        if($search_value){
            $where['title'] = array('LIKE',"%$search_value%");;
        }
        $sort = i('sort');
        $order = i('order');
        if(!empty($sort)){
            $reorder = $sort." ".$order;
        }else{
            $reorder = 'id asc';
        }
        $list =  M('user_grade')-> where($where) -> order($reorder) ->limit($offset,$limit) -> select();
        //dump($list);
        $count =   M('user_grade')-> where($where) -> order($reorder) -> count();
        $list_array= array("total"=>$count,"rows"=>$list?$list:array());
        echo json_encode($list_array);
    }
    //增加会员等级
    public function addGrade(){
        if(IS_POST){
            $data = i('post.');
            M('user_grade') -> add($data);
            $this->success('增加成功！');
        }else{
            $this-> display('editgrade');
        }
    }
    //修改会员等级
    public function editGrade(){
        $id = i('id');
        $where['id'] = $id;
        if(IS_POST){
            $data = i('post.');
            M('user_grade') -> where($where) -> save($data);
            $this->success('修改成功！');
        }else{
            $res = M('user_grade') -> where($where)-> find();
            $this->assign('info',$res);
            $this-> display();
        }
    }
    //删除会员等级
    public function delGrade(){
        $array_id['id'] = array('in',$_POST['ids']);
        M('user_grade') -> where($array_id) -> delete();
        $this -> success('删除成功！');
    }
    //收货地址
    public function address(){
        $this ->display();
    }
    public function loadAddress(){
        $offset = i("offset");
        $limit = i("limit");
        $search_key = i('search_key');
        $search_value = i('search');
        if($search_value){
            $where['a.name|u.nick_name'] = array('LIKE',"%$search_value%");;
        }
        $sort = i('sort');
        $order = i('order');
        if(!empty($sort)){
            $reorder = $sort." ".$order;
        }else{
            $reorder = 'id asc';
        }
        $list =  M('address')-> alias('a')
            ->join('users as u on a.user_id = u.id','left')
            ->where($where)
            -> field('a.*,u.nick_name')
            -> order($reorder)
            ->limit($offset,$limit)
            -> select();
        //dump($list);
        $count =  M('address')-> alias('a')
            ->join('users as u on a.user_id = u.id','left')
            ->where($where)
            ->count();
        foreach($list as &$v){
            $v['is_default'] = $v['is_default']==2?'是':'否';
        }

        $list_array= array("total"=>$count,"rows"=>$list?$list:array());
        echo json_encode($list_array);
    }
    //增加地址
    public function addAddress(){
        if(IS_POST){
            $data = i('post.');
            //查询会员是否存在
            $info = M('users') -> where(['id'=>$data['user_id']]) -> find();
            if(!$info){
                $this->error('该会员不存在！');
            }
            M('address') -> add($data);
            $this->success('增加成功！');
        }else{
            $this-> display('editaddress');
        }
    }
    //修改地址
    public function editAddress(){
        $id = i('id');
        $where['id'] = $id;
        if(IS_POST){
            $data = i('post.');
            M('address') -> where($where) -> save($data);
            $this->success('修改成功！');
        }else{
            $res = M('address') -> where($where)-> find();
            $this->assign('info',$res);
            $this-> display();
        }
    }
    //删除地址
    public function delAddress(){
        $array_id['id'] = array('in',$_POST['ids']);
        M('address') -> where($array_id) -> delete();
        $this -> success('删除成功！');
    }
    //会员认证信息
    public function auto(){
        $this -> display();
    }
    //加载认证信息
    public function loadAuto(){
        $offset = i("offset");
        $limit = i("limit");
        $search_key = i('search_key');
        $search_value = i('search');
        if($search_value){
            $where['a.name|u.nick_name'] = array('LIKE',"%$search_value%");;
        }
        $sort = i('sort');
        $order = i('order');
        if(!empty($sort)){
            $reorder = $sort." ".$order;
        }else{
            $reorder = 'id asc';
        }
        $list =  M('user_author')-> alias('a')
            ->join('users as u on a.user_id = u.id','left')
            ->where($where)
            -> field('a.*,u.nick_name')
            -> order($reorder)
            ->limit($offset,$limit)
            -> select();
        //dump($list);
        $count =  M('user_author')-> alias('a')
            ->join('users as u on a.user_id = u.id','left')
            ->where($where)
            ->count();
        foreach($list as &$v){
            $v['is_verify'] = $v['is_verify']==2?'是':'否';
            $v['type_name'] = $v['types']==2?'机构':'个人';
            $v['pic'] = "<img width='60' src='{$v['pic']}'>";
        }
        $list_array= array("total"=>$count,"rows"=>$list?$list:array());
        echo json_encode($list_array);
    }
    //审核
    public function editAuto(){
        $id = i('id');
        $where['id'] = $id;
        $res = M('user_author') -> where($where)-> find();
        if(IS_POST){
            if($res['is_verify'] ==2){
                $this->error('已经审核');
            }
            $user = M('users');
            $user -> startTrans();
            $result = $user -> where(['id'=>$res['user_id']]) -> save(['is_auto'=>1]);
            if($result){

                $da = M('user_author') -> where($where) -> save(['is_verify'=>2]);
                if($da){
                    $datas['time'] = time();
                    $datas['user_id'] = $res['user_id'];
                    $datas['type'] = 2;
                    $datas['content'] = '您的认证已经通过了';
                    $dre = M('infos') -> add($datas);
                    if($dre){
                        $user -> commit();
                        $this->success('审核成功！');
                    }else{
                        $user -> rollback();
                        $this->error('审核失败，重新审核！');
                    }
                }else{
                    $user -> rollback();
                    $this->error('审核失败，重新审核！');
                }
            }else{
                $user -> rollback();
                $this->error('审核失败，重新审核！');
            }
        }else{
            $this->assign('info',$res);
            $this-> display();
        }

    }


}
