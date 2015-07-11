<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
	//注册用户列表
	public function index($page=1){
		if(is_numeric($page)) {
	    	if(mc_user_id()) {
	    		if(mc_is_admin()) {
		    		$this->page = M('page')->where("type='user'")->order('id desc')->page($page,mc_option('page_size'))->select();
		    		$count = M('page')->where("type='user'")->count();
					$this->assign('count',$count);
					$this->assign('page_now',$page);
					$this->theme(mc_option('theme'))->display('Admin/User/index');
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
}