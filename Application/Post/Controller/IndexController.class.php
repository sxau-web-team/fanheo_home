<?php
namespace Post\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($id=1){
        if(is_numeric($id)) {
        	mc_set_views($id);
        	mc_update_page($id,strtotime("now"),'date');
        	$this->page = M('page')->field('id,title,content,type,date')->where("id='$id'")->select();
			$this->theme(mc_option('theme'))->display('Post/index');
		} else {
			$this->error('参数错误！');
		}
    }
}