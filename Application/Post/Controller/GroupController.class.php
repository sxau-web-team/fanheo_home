<?php
namespace Post\Controller;
use Think\Controller;
class GroupController extends Controller {
    public function index($page=1){
    	if(is_numeric($page)) {
	    	$this->page = M('page')->where('type="group"')->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where('type="group"')->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Post/group_home');
		} else {
			$this->error('参数错误！');
		}
	}
	public function pending($page=1){
    	if(is_numeric($page)) {
	    	$this->page = M('page')->where('type="group_pending"')->order('id desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where('type="group"')->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Post/group_pending');
		} else {
			$this->error('参数错误！');
		}
	}
	public function single($id,$page=1){
    	if(is_numeric($id) && is_numeric($page)) {
    		if(mc_get_page_field($id,'type')=='group_pending') {
	    		$this->error('该群组正在审核中！');
    		} else {
		    //	$this->page = D('GroupPost')->field('id,title,content,type,date')->where("meta.meta_key='group' AND meta.meta_value='$id'")->group('id')->order('date desc')->page($page,mc_option('page_size'))->select();
		    //   $count = D('GroupPost')->where("meta.meta_key='group' AND meta.meta_value='$id'")->count();
			$condition['type'] = 'publish';
	        	$args_id = M('meta')->where("meta_key='group' AND meta_value='$id'")->getField('page_id',true);
	        	$condition['id']  = array('in',$args_id);
		    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    	$count = M('page')->where($condition)->count();
		        $this->assign('id',$id);
		        $this->assign('count',$count);
		        $this->assign('page_now',$page);
			    $this->theme(mc_option('theme'))->display('Post/group');
			}
		} else {
	     	$this->error('参数错误！');
	    };
	}
	public function chat($id){
		if(is_numeric($id)) {
			$this->page = M('page')->field('id,title,content,type,date')->where("id='$id'")->select();
			$this->theme(mc_option('theme'))->display('Post/chat');
		} else {
	     	$this->error('参数错误！');
	    };
	}
}