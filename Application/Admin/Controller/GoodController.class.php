<?php
namespace Admin\Controller;
use Think\Controller;
class GoodController extends BaseController {
	//商品列表
    public function index($page=1){
        if(!is_numeric($page)) {
	        $this->error('参数错误');
        }
        if($_GET['keyword']) {
	        $where['content']  = array('like', "%{$_GET['keyword']}%");
			$where['title']  = array('like',"%{$_GET['keyword']}%");
			$where['_logic'] = 'or';
			$condition['_complex'] = $where;
			$condition['type']  = 'pro';
	        $this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
	        $count = M('page')->where($condition)->count();
	        $this->assign('count',$count);
	        $this->assign('page_now',$page);
	        $this->display('Admin/Good/index');
        } else {
	        $condition['type'] = 'pro';
	        $this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
	        $count = M('page')->where($condition)->count();
	        $this->assign('count',$count);
	        $this->assign('page_now',$page);
	        $this->theme(mc_option('theme'))->display('Admin/Good/index');
	    };
    }
	//分类
    public function term($id,$page=1){
    	if(is_numeric($id) && is_numeric($page)) {
	    	$condition['type'] = 'pro';
        	$args_id = M('meta')->where("meta_key='term' AND meta_value='$id' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Admin/Good/term');
		} else {
			$this->error('参数错误！');
		}
	}
    public function single($id=1){

    	$args_id = M('meta')->where("meta_key='term' AND type='basic'")->getField('page_id',true);
        if(!is_numeric($id)) {
	        $this->error('参数错误');
        }
		if(!in_array($id,$args_id))
		{
			$this->redirect('/home');
		}
		$condition['type'] = 'pro';
		// mc_set_views($id);
        $this->page = M('page')->field('id,title,content,type,date')->where($condition)->where("id='$id'")->select();

       
        mc_set_views($id);
        $this->page = M('page')->field('id,title,content,type,date')->where("id='$id'")->select();
        $this->theme(mc_option('theme'))->display('Admin/Good/single');
    }
	//添加商品
	public function addGood(){
		if(mc_is_admin()) {
	        $this->theme(mc_option('theme'))->display('Admin/Good/addGood');
	     } else {
		     $this->success('请先登陆',U('User/login/index'));
	     };
	}
	//删除商品
	public function delgood($id){
        if(is_numeric($id)) {
	        if(mc_is_admin() || mc_is_group_admin(mc_get_meta($id,'group'))) {
		         if(mc_get_meta($id,'user_level',true,'user')!=10) {
			         mc_delete_page($id);
			         $this->success('删除成功',U('Admin/Good/index'));
		         } else {
			         $this->error('请不要伤害管理员',U('user/index/manage?id='.mc_user_id()));
		         };
	        } else {
	        	$this->error('哥们，请不要放弃治疗！',U('Admin/Login/index'));
	        }
        } else {
	        $this->error('参数错误！');
        }
    
	}
	//编辑商品
	public function editgood($id){
		if(is_numeric($id)) {
        	if(mc_is_admin() || mc_is_group_admin($id) || mc_is_group_admin(mc_get_meta($id,'group'))) {
	        	$this->page = M('page')->where("id='$id'")->order('id desc')->select();
	        	if(mc_get_page_field($id,'type')=='pro') {
		        	$this->theme(mc_option('theme'))->display('Admin/Good/editgood');
	        	} elseif(mc_get_page_field($id,'type')=='publish') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit');
	        	} elseif(mc_get_page_field($id,'type')=='group') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit_group');
		        } elseif(mc_get_page_field($id,'type')=='local') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit_local');
	        	} elseif(mc_get_page_field($id,'type')=='baobei') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit_baobei');
	        	} elseif(mc_get_page_field($id,'type')=='article') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit_article');
	        	} else {
		        	$this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	        	}
		    } else {
			    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
		    };
        } else {
	        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
        }
	}
	//分类列表
	public function categorylist(){
		if(mc_is_admin()) {
	        $this->theme(mc_option('theme'))->display('Admin/Good/categorylist');
	     } else {
		     $this->success('请先登陆',U('User/login/index'));
	     };
	}
	public function publish_term(){
    	if(mc_is_admin()) {
	    	if($_POST['title']) {
	    		$page['title'] = I('param.title');
	    		$page['type'] = 'term_'.I('param.type');
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		if($page['type'] = 'term_local'){
		    		$this->success('新建分类成功！',U('Admin/Good/index'));

		    		}else{
		    		$this->success('新建分类成功！',U(I('param.type').'/index/term?id='.$result));
		    		}
	    		} else {
		    		$this->error('发布失败！');
	    		}
	    	} else {
	    		$this->error('请填写分类名称');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
	//套餐管理
	public function taocan($id=29,$page=1){
		if(is_numeric($id) && is_numeric($page)) {
	    	$condition['type'] = 'pro';
        	$args_id = M('meta')->where("meta_key='term' AND meta_value='$id' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Admin/Good/taocan');
		} else {
			$this->error('参数错误！');
		}
		
	}
}