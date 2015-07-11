<?php
namespace Admin2\Controller;
use Think\Controller;
class AndroidLoginController extends Controller {
    
    public function login(){

        // $page_id = M('meta')->where("meta_key='user_name' AND meta_value='".I('param.user_name')."' AND type='user'")->getField('page_id');
        // $user_pass_true = mc_get_meta($page_id,'user_pass',true,'user');
        if($_POST['user_name'] && $_POST['user_pass'] && md5($_POST['user_pass']) == $user_pass_true) {
            $username = I('user_name');
            $pwd = I('user_pass','','md5');
            $user = M('admin')->where(array('user_name' => $username))->find();
            if ($user['pwd'] == $pwd) {
             $alias = $user['user_type'];
             $key = 'fanheo014789014789014789';
             $data = array('result' => 'success', 'alias' => $alias,);
             $this->ajaxReturn($data);
            } else {
            	$data = array('result' => 'fail', );
    			header('HTTP/1.1 404 Not Found');
    			header("status: 404");
    	
            };
        }else{
            $data = array('result' => 'fail', );
                header('HTTP/1.1 404 Not Found');
                header("status: 404");
        }

    }
    public function logout(){
        session('user_name','user_name');
        session('user_pass','user_pass');
        $data = array('result' => 'logoutsuccess', );
        $this->ajaxReturn($data,'xml');
    }
    
}