<?php
namespace Control\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	if(mc_user_id()) {
    		if(mc_is_admin()) {
	    		$this->theme(mc_option('theme'))->display('Control/index');
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function set(){
    	if(mc_user_id()) {
    		if(mc_is_admin()) {
	    		if($_POST['site_name'] && $_POST['site_url'] && $_POST['page_size']) {
		    		mc_update_option('site_name',I('param.site_name'));
		    		mc_update_option('site_url',I('param.site_url'));
		    		mc_update_option('gonggao',$_POST['gonggao']);
		    		mc_update_option('logo',I('param.logo'));
		    		mc_update_option('alipay2_seller',I('param.alipay2_seller'));
		    		mc_update_option('alipay2_partner',I('param.alipay2_partner'));
		    		mc_update_option('alipay2_key',I('param.alipay2_key'));
		    		mc_update_option('stmp_from',I('param.stmp_from'));
		    		mc_update_option('stmp_name',I('param.stmp_name'));
		    		mc_update_option('stmp_host',I('param.stmp_host'));
		    		mc_update_option('stmp_port',I('param.stmp_port'));
		    		mc_update_option('stmp_username',I('param.stmp_username'));
		    		mc_update_option('stmp_password',I('param.stmp_password'));
		    		if($_POST['fmimg']) {
			    		mc_update_option('fmimg',I('param.fmimg'));
		    		};
		    		if($_POST['homehdimg1']) {
		    			mc_update_option('homehdimg1',I('param.homehdimg1'));
		    		};
		    		if($_POST['homehdimg2']) {
		    			mc_update_option('homehdimg2',I('param.homehdimg2'));
		    		};
		    		if($_POST['homehdimg3']) {
		    			mc_update_option('homehdimg3',I('param.homehdimg3'));
		    		};
		    		mc_update_option('homehdlnk1',I('param.homehdlnk1'));
		    		mc_update_option('homehdlnk2',I('param.homehdlnk2'));
		    		mc_update_option('homehdlnk3',I('param.homehdlnk3'));
		    		mc_update_option('sidebar',$_POST['sidebar']);
		    		mc_update_option('page_size',I('param.page_size'));
		    		$this->success('更新成功');
	    		} else {
		    		$this->theme(mc_option('theme'))->display('Control/set');
	    		}
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function pro_all(){
    	if(mc_user_id()) {
    		if(mc_is_admin()) {
		    	$this->page = M('action')->where("action_key IN ('trade_wait_send','trade_wait_cofirm','trade_wait_finished')")->order('id desc')->select();
		    	$this->theme(mc_option('theme'))->display('Control/pro_all');
	    	} else {
		    	$this->error('请不要偷窥别人的购买记录哦～');
	    	}
	    } else {
		    $this->success('请先登陆',U('User/login/index'));
	    }
    }
}