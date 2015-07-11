<?php
namespace Admin2\Controller;
use Think\Controller;
class IndexController extends Controller {
	//订单列表
	/**
	 * 传入status参数 筛选出不同订单状态的订单
	 *status=1 => 新订单，未处理
	 *status=2 => 制作中
	 *status=3 => 配送中，等待用户确认
	 *status=4 => 订单完成
	 *status=5 => 订单删除
	 *
	 */
    public function index(){
        if(mc_is_admin()){
		        	$date   = isset($_GET['date'])?$_GET['date'] : 'Y-m-d';
		        	$store  = isset($_GET['store'])?$_GET['store'] : 54;
		        	$status = isset($_GET['status'])?$_GET['status'] : 1;
		        	$date = strtotime(date($date));
					$end_date = $date+24*60*60;
					$condition['creat_time']  = array(array('egt',"$date"),array('elt', "$end_date"),'and');
					$condition['status'] = $status;
					$condition['store'] = $store;
					$this->page = M('order')->where($condition)->order('id desc')->select();
					$count = M('order')->where($condition)->count();
					$this->assign('count',$count);
					$this->assign('page_now',$page);
					$this->theme(mc_option('theme'))->display('Admin2/index');
		}
		else{
			$this->error('您没有权限访问此页面！');
		}
    }
	

    public function publish($id){
        if(is_numeric($id)) {
	        if(mc_is_admin()) {
	        	mc_update_page($id,'publish','type');
				$this->success('审核成功！');
			} else {
		        $this->error('您没有权限访问此页面！');
	        }
        } else {
	        $this->error('参数错误！');
        }
    }
	//订单搜索
	public function search($page=1){
		if(is_numeric($page)){
		if($_GET['name']) {
			        $where['note']  = array('like', "%{$_GET['name']}%");
					$where['user_name']  = array('like',"%{$_GET['name']}%");
					$where['_logic'] = 'or';
					$condition['_complex'] = $where;
					$this->page = M('order')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
			        $count = M('order')->where($condition)->count();
			        $this->assign('count',$count);
			        $this->assign('page_now',$page);
			        $this->theme(mc_option('theme'))->display('Admin2/Index/search');
		        } elseif($_GET['ordernumber']) {
		        //搜索商品
		        	$where['note']  = array('like', "%{$_GET['ordernumber']}%");
					$where['number']  = array('like',"%{$_GET['ordernumber']}%");
					$where['_logic'] = 'or';
					$condition['_complex'] = $where;
					$this->page = M('order')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
			        $count = M('order')->where($condition)->count();
			        $this->assign('count',$count);
			        $this->assign('page_now',$page);
			        $this->theme(mc_option('theme'))->display('Admin2/Index/search');
					}
					}
	}
}