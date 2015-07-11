<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(mc_is_admin()){
			$this->display('Admin/index');
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
}