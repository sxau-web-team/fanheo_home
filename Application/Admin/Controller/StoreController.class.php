<?php
namespace Admin\Controller;
use Think\Controller;
class StoreController extends BaseController {
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
		$this->theme(mc_option('theme'))->display('Admin/Store/index');
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
	}
}