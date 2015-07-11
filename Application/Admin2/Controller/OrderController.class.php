<?php
namespace Admin2\Controller;
use Think\Controller;
class OrderController extends Controller {
	//订单列表
	public function index($page=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
					if(!is_numeric($page)) {
					$this->error('参数错误');
				}
				$this->page = M('order')->where('')->order('id desc')->select();
				$count = M('order')->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);	
				$this->theme(mc_option('theme'))->display('Admin2/Order/index');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('Admin2/login/index'));
	    };
	}
	//订单列表
	public function ordercount($page=1,$date=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
					if(!is_numeric($page)) {
					$this->error('参数错误');
				}
				$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
				
				$this->page = M('order')->order('id desc')->page($page,mc_option('page_size'))->where('creat_time>=$beginToday')->select();
				$count = M('order')->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);	
				$this->theme(mc_option('theme'))->display('Admin2/Order/count');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('Admin2/login/index'));
	    };
	}
	public function print_single($id=1){

		$this->page = M('order')->where("number='$id'")->select();
        $this->theme(mc_option('theme'))->display('Admin2/Order/print_single');
	}

    public function delete(){
    	if ($_GET['number']&&$_GET['store']) {
    		$number = isset($_GET['number'])?$_GET['number'] : '';
	    	$store = isset($_GET['store'])?$_GET['store'] : '';
	    	$condition['number'] = $number;
	    	$condition['store'] = $store;
	    	$page['status'] = '5';
	    	M('order')->where($condition)->save($page);
	    	$this->success('订单已删除');
    	}else{
    		$this->error('参数错误',U('admin2/index/index'));
    	}
    }
    public function zhizuo(){
    	if ($_GET['number']&&$_GET['store']) {
    		$number = isset($_GET['number'])?$_GET['number'] : '';
	    	$store = isset($_GET['store'])?$_GET['store'] : '';
	    	$condition['number'] = $number;
	    	$condition['store'] = $store;
	    	$page['status'] = '2';
	    	M('order')->where($condition)->save($page);
	    	$this->success('开始制作');
    	}else{
    		$this->error('参数错误',U('admin2/index/index'));
    	}
    }
    public function peisong(){
    	if ($_GET['number']&&$_GET['store']) {
    		$number = isset($_GET['number'])?$_GET['number'] : '';
	    	$store = isset($_GET['store'])?$_GET['store'] : '';
	    	$condition['number'] = $number;
	    	$condition['store'] = $store;
	    	$page['status'] = '3';
	    	M('order')->where($condition)->save($page);
	    	$this->success('开始配送');
    	}else{
    		$this->error('参数错误',U('admin2/index/index'));
    	}
    }
    public function wancheng(){
    	if ($_GET['number']&&$_GET['store']) {
    		$number = isset($_GET['number'])?$_GET['number'] : '';
	    	$store = isset($_GET['store'])?$_GET['store'] : '';
	    	$condition['number'] = $number;
	    	$condition['store'] = $store;
	    	$page['status'] = '4';
	    	M('order')->where($condition)->save($page);
	    	$this->success('订单完成');
    	}else{
    		$this->error('参数错误',U('admin2/index/index'));
    	}
    }
    //扫码确认订单
	public function saoma_firm(){

		$this->theme(mc_option('theme'))->display('Admin2/Order/saoma_firm');
		
	}
	//扫码配送订单
	public function saoma_send(){

		$this->theme(mc_option('theme'))->display('Admin2/Order/saoma_send');
		
	}
	//扫码开始制作
	public function saoma_begin(){

		$this->theme(mc_option('theme'))->display('Admin2/Order/saoma_begin');
		
	}
	public function saoma(){
		if ($_GET['id']&&$_GET['status']) {
    		$number = isset($_GET['id'])?$_GET['id'] : '';
    		$status = isset($_GET['status'])?$_GET['status'] : '';
    		switch ($status) {
    			case '2':
    				$print = '开始制作';
    				$page_now = 'saoma_begin';
    				break;
    			case '3':
    				$print = '开始配送';
    				$page_now = 'saoma_send';
    				break;
    			case '4':
    				$print = '订单完成';
    				$page_now = 'saoma_firm';
    				break;
    			default:
    				break;
    		}
	    	$condition['number'] = $number;
	    	$count = M('order')->where($condition)->count();
	    	if ($count) {
	    		$page['status'] = $status;
		    	M('order')->where($condition)->save($page);
		    	$this->success($print);
	    	}else{
	    		$this->error('订单不存在',U('admin2/Order/'.$page_now.''),1);
	    	}
	    	
    	}else{
    		$this->error('参数错误',U('admin2/Order/saoma_firm'));
    	}
	}
}