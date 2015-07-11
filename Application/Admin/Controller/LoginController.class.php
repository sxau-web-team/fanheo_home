<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(mc_user_id()) {
	        $this->success('您已经登陆',U('user/index/edit?id='.mc_user_id()));
        } else {
	        $this->display('Admin/login');
        }
    }
    public function submit(){
        $page_id = M('meta')->where("meta_key='user_name' AND meta_value='".I('param.user_name')."' AND type='user'")->getField('page_id');
        $user_pass_true = mc_get_meta($page_id,'user_pass',true,'user');
        if($_POST['user_name'] && $_POST['user_pass'] && md5($_POST['user_pass'].mc_option('site_key')) == $user_pass_true) {
	        session('user_name',I('param.user_name'));
	        session('user_pass',md5(I('param.user_pass').mc_option('site_key')));
	        $this->success('登陆成功',U('user/index/index?id='.mc_user_id()));
        } else {
        	$this->error('用户名与密码不符！');
        };
    }
    public function logout(){
        session('user_name','user_name');
        session('user_pass','user_pass');
        $this->success('您已经成功退出登陆',U('home/index/index'));
    }
    public function connect_qq(){
    	require_once './connect-qq/oauth/callback.php';
    }
}