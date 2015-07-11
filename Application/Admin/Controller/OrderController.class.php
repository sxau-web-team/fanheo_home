<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends BaseController {
	//订单列表
	public function index($page=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
					if(!is_numeric($page)) {
					$this->error('参数错误');
				}
				$this->page = M('order')->order('id desc')->page($page,mc_option('page_size'))->select();
				$count = M('order')->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);	
				$this->theme(mc_option('theme'))->display('Admin/Order/index');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('Admin/login/index'));
	    };
	}

	public function fahuo($add_fahuo){
        $add_fahuo2 = I('param.add_fahuo');
        $status = M('order')->where("number='$add_fahuo2'")->getField('status');
        if($status==0) {
        	$page['status']='1';
        	M('order')->where("number='$add_fahuo2'")->save($page);
        };
        $this->error('哥们，你放弃治疗了吗?',U('admin/index/index'));
    }
	//未处理订单列表
	public function upay($page=1){
		//$page = mc_view_order('0');
		$page = M('order')->where("status='0'")->order('id desc')->page($page,mc_option('page_size'))->select();
		$count = M('order')->count();
		$this->assign('count',$count);
		$this->assign('page',$page);
		
		$this->theme(mc_option('theme'))->display('Admin/Order/upay');
	}
	//已付款(确认)订单列表
	public function apay(){
		mc_view_order(1);
	}
	//已发货订单列表
	public function asend(){
		mc_view_order(2);
	}
	public function already(){
		mc_view_order(3);
	}
	//退货订单列表
	
}