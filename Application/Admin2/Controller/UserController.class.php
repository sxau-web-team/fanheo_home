<?php
namespace Admin2\Controller;
use Think\Controller;
class UserController extends Controller{
	//注册用户列表
	public function index($page=1){
		if(is_numeric($page)) {
	    	if(mc_user_id()) {
	    		if(mc_is_admin()) {
		    		$this->page = M('page')->where("type='user'")->order('id desc')->page($page,mc_option('page_size'))->select();
		    		$count = M('page')->where("type='user'")->count();
					$this->assign('count',$count);
					$this->assign('page_now',$page);
					$this->theme(mc_option('theme'))->display('Admin2/User/index');
		    	} else {
			    	$this->error('您没有权限访问此页面！');
		    	};
	    	} else {
		    	$this->success('请先登陆',U('User/login/index'));
		    };
		} else {
			$this->error('参数错误！');
		}
	}
	//用户留言
	public function liuyan($page=1){
		if(is_numeric($page)) {
	    	if(mc_user_id()) {
	    		if(mc_is_admin()) {
		    		$this->page = M('fankui')->order('id desc')->page($page,mc_option('page_size'))->select();
		    		$count = M('fankui')->count();
					$this->assign('count',$count);
					$this->assign('page_now',$page);
					$this->theme(mc_option('theme'))->display('Admin2/User/liuyan');
		    	} else {
			    	$this->error('您没有权限访问此页面！');
		    	};
	    	} else {
		    	$this->success('请先登陆',U('User/login/index'));
		    };
		} else {
			$this->error('参数错误！');
		}
	}
	//搜索用户
	public function search($page=1){
		//$where['user_name']  = array('like', "%{$_GET['name']}%");
		$where['meta_value']  = array('like',"%{$_GET['name']}%");
		//$where['_logic'] = 'or';
		$condition['_complex'] = $where;
		$pageid = M('meta')->where("meta_key='user_name' OR meta_key='buyer_name' AND type='user'")->where($condition)->getField('page_id',true);
		$condition2['id']  = array('in',$pageid);
		$this->page = M('page')->where("type='user'")->where($condition2)->order('id desc')->page($page,mc_option('page_size'))->select();
		$count = M('page')->where("type='user'")->where("id='$pageid'")->count();
		$this->assign('count',$count);
		$this->assign('page_now',$page);
		$this->theme(mc_option('theme'))->display('Admin2/user/search');
	}
}