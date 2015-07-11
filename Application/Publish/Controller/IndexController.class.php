<?php
namespace Publish\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(mc_is_admin()) {
	        $this->theme(mc_option('theme'))->display('Publish/index');
	     } else {
		     $this->success('请先登陆',U('User/login/index'));
	     };
    }
    public function add_group(){
        if(mc_user_id()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_group');
	     } else {
		     $this->success('请先登陆',U('User/login/index'));
	     };
    }
    public function upload(){
    	require_once './Kindeditor/php/upload_json.php';
    }
    public function edit($id){
        if(is_numeric($id)) {
        	if(mc_is_admin() || mc_is_group_admin($id) || mc_is_group_admin(mc_get_meta($id,'group'))) {
	        	$this->page = M('page')->where("id='$id'")->order('id desc')->select();
	        	if(mc_get_page_field($id,'type')=='pro') {
		        	$this->theme(mc_option('theme'))->display('Publish/edit_pro');
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
      public function add_post(){
        if(mc_user_id()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_post');
	    } else {
		     $this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function add_baobei(){
        if(mc_user_id()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_baobei');
	    } else {
		     $this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function add_local(){
        if(mc_user_id()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_local');
	    } else {
		     $this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function add_term(){
        if(mc_is_admin()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_term');
	    } else {
		     $this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function add_article(){
        if(mc_is_admin()) {
	        $this->theme(mc_option('theme'))->display('Publish/add_article');
	     } else {
		     $this->success('请先登陆',U('User/login/index'));
	     };
    }
}