<?php
namespace Admin2\Controller;
use Think\Controller;
class StoreController extends Controller {
	//店铺列表
	public function index($page=1){
		if(!is_numeric($page)) {
	        $this->error('参数错误');
        }
        
		$condition['type'] = 'local';
		$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
		$count = M('page')->where($condition)->count();
		$this->assign('count',$count);
		$this->assign('page_now',$page);
		$this->theme(mc_option('theme'))->display('Admin2/Store/index');
	}
	//添加店铺
	public function addstore(){
		
        if(mc_user_id()) {
	        $this->theme(mc_option('theme'))->display('Admin/Store/addstore');
	    } else {
		     $this->success('请先登陆',U('User/login/index'));
	    };
    
	}
	public function publish_local(){
    	if(mc_is_admin()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = $_POST['content'];
	    		$page['type'] = 'local';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		mc_add_meta($result,'local',I('param.local'));
		    		if($_POST['fmimg']) {
		    			mc_add_meta($result,'fmimg',I('param.fmimg'));
		    		};
		    		mc_add_meta($result,'public',I('param.public'));
		    		mc_add_meta($result,'local',I('param.local'));
		    		mc_add_meta($result,'header',I('param.header'));
		    		mc_add_meta($result,'phone',I('param.phone'));
		    		mc_add_meta($result,'cook',I('param.cook'));
		    		mc_add_meta($result,'author',mc_user_id());
		    		$this->success('发布成功，请耐心等待审核',U('store/index/single?id='.$result));
	    		} else {
		    		$this->error('发布失败！');
	    		}
	    	} else {
	    		$this->error('请填写标题和内容');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
	//删除店铺
	public function delstore(){
		
	}
	//修改店铺
public function editstore(){
    	if(mc_is_admin() || mc_is_group_admin($_POST['id']) || mc_is_group_admin(mc_get_meta($_POST['id'],'group'))) {
	    	if($_POST['title'] && is_numeric($_POST['id'])) {
	    	
				if(mc_get_page_field($_POST['id'],'type')=='local') {
	    			if($_POST['local']) {
		    			mc_delete_meta($_POST['id'],'local');
		    			mc_add_meta($_POST['id'],'local',I('param.local'));
		    		} else {
		    			$this->error('请设置店铺分类！');
		    		};
	    			if($_POST['header']) {
	    				mc_update_meta($_POST['id'],'header',I('param.header'));
	    			} else {
						$this->error('请填写店长！');
					};
					if($_POST['cook']) {
	    				mc_update_meta($_POST['id'],'cook',I('param.cook'));
	    			} else {
						$this->error('请填写厨师！');
					};
					if($_POST['phone']) {
	    				mc_update_meta($_POST['id'],'phone',I('param.phone'));
	    			} else {
						$this->error('请填写联系电话！');
					};
	    		};
	    
	    		$page['title'] = I('param.title');
	    		
	    		M('page')->where("id='".$_POST['id']."'")->save($page);
	    		if(mc_get_page_field($_POST['id'],'type')=='pro') {
		        	$this->success('编辑成功',U('pro/index/single?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='publish') {
		        	$this->success('编辑成功',U('post/index/index?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='group') {
		        	$this->success('编辑成功',U('post/group/index?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='baobei') {
		        	$this->success('编辑成功',U('baobei/index/single?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='article') {
		        	$this->success('编辑成功',U('article/index/single?id='.$_POST['id']));
	        	} else {
		        	$this->success('编辑成功',U('Admin2/Store/index'));
	        	}
	    	} else {
		    	$this->error('请完整填写信息！');
	    	}
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
}