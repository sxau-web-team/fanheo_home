<?php
namespace Admin\Controller;
use Think\Controller;
class SettingController extends BaseController {
	//服务器信息
	public function server(){
		 $info = array(
            '操作系统'=>php_uname(),
            '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式'=>php_sapi_name(),
            '版本'=>C('SYSTEM_NAME').C('SYSTEM_VAR').' [ <a href="https://github.com/sxau-web-team/FanHeo" target="_blank">查看最新版本</a> ]',
            '上传附件限制'=>ini_get('upload_max_filesize'),
            '执行时间限制'=>ini_get('max_execution_time').'秒',
            '服务器时间'=>date("Y年n月j日 H:i:s"),
            '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
            '服务器域名/IP'=>$_SERVER['SERVER_NAME'].' [ '.gethostbyname($_SERVER['SERVER_NAME']).' ]',
            '剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
            'register_globals'=>get_cfg_var("register_globals")=="1" ? "ON" : "OFF",
            'magic_quotes_gpc'=>(1===get_magic_quotes_gpc())?'YES':'NO',
            'magic_quotes_runtime'=>(1===get_magic_quotes_runtime())?'YES':'NO',
            '客户端IP'=>$_SERVER['REMOTE_ADDR'],  
            '服务器cpu数量'=>$_SERVER['PROCESSOR_IDENTIFIER'],
            'php版本'     =>PHP_VERSION,
            );
        $this->info=$info;
        $this->assign('title','饭盒后台管理系统-系统设置-服务器信息');
        $this->assign('loginname',$_SESSION['AdminUser']);
        $this->theme(mc_option('theme'))->display('Admin/Setting/server');
	}
	//积分记录
	public function score($page=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
				$this->page = M('meta')->where("meta_key='coins' AND type ='user'")->order('id desc')->page($page,mc_option('page_size'))->select();
				$count = M('meta')->where("meta_key='coins' AND type ='user'")->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);	
				$this->theme(mc_option('theme'))->display('Admin/Setting/score');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('Admin/login/index'));
	    };

	}
	//系统设置
	public function index(){
		    if(mc_user_id()) {
    		if(mc_is_admin()) {
	    		if($_POST['site_name'] && $_POST['site_url'] && $_POST['page_size']) {
		    		mc_update_option('site_name',I('param.site_name'));
		    		mc_update_option('site_url',I('param.site_url'));
		    		//mc_update_option('theme',I('param.theme'));
		    		mc_update_option('alipay2_seller',I('param.alipay2_seller'));
		    		mc_update_option('alipay2_partner',I('param.alipay2_partner'));
		    		mc_update_option('alipay2_key',I('param.alipay2_key'));
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
		    		mc_update_option('sidebar',I('param.sidebar'));
		    		mc_update_option('page_size',I('param.page_size'));
					$this->Record('系统设置更新成功');
		    		$this->success('更新成功');
	    		} else {
		    		$this->theme(mc_option('theme'))->display('Admin/Setting/index');
	    		}
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
	}
	//邮箱设置
	public function email(){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
	    		if($_POST['stmp_from'] && $_POST['stmp_name'] && $_POST['stmp_host']) {
		    		mc_update_option('stmp_from',I('param.stmp_from'));
		    		mc_update_option('stmp_name',I('param.stmp_name'));
		    		mc_update_option('stmp_host',I('param.stmp_host'));
		    		mc_update_option('stmp_port',I('param.stmp_port'));
		    		mc_update_option('stmp_username',I('param.stmp_username'));
		    		mc_update_option('stmp_password',I('param.stmp_password'));
					$this->Record('stmp邮箱设置更新成功');
		    		$this->success('邮箱设置更新成功');
	    		} else {
		    		$this->theme(mc_option('theme'))->display('Admin/Setting/email');
	    		}
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
		
	}
	//管理员操作记录
	public function operation($page=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
				$this->page = M('operation')->order('id desc')->page($page,mc_option('page_size'))->select();
				$count = M('operation')->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);
	    		/* $Operation = M('operation');
				$count      = $Operation->count();// 查询满足要求的总记录数
				$Page       = new \Think\Page($count,30);// 实例化分页类 传入总记录数和每页显示的记录数
				$show       = $Page->show();// 分页显示输出
				$list = $Operation->limit($Page->firstRow.','.$Page->listRows)->order('time DESC')->select();
				$this->assign('page',$show);// 赋值分页输出
				$this->assign('list',$list); */
				
				$this->theme(mc_option('theme'))->display('Admin/Setting/operation');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
	}
	//用户操作记录
	public function userlog($page=1){
		if(mc_user_id()) {
    		if(mc_is_admin()) {
				$this->page = M('Userlog')->order('id desc')->page($page,mc_option('page_size'))->select();
				$count = M('Userlog')->count();
				$this->assign('count',$count);
				$this->assign('page_now',$page);
				$this->theme(mc_option('theme'))->display('Admin/Setting/userlog');
				
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
	}
}