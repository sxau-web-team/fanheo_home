<?php
namespace Pro\Controller;
use Think\Controller;
class IndexController extends Controller {
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
	        $this->display('Pro/index');
        } else {
	        $condition['type'] = 'pro';
	        $this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
	        $count = M('page')->where($condition)->count();
	        $this->assign('count',$count);
	        $this->assign('page_now',$page);
	        $this->theme(mc_option('theme'))->display('Pro/index');
	    };
    }
    public function term($id,$page=1){
    	if(is_numeric($id) && is_numeric($page)) {
    		if ($_GET['lid']) {
    			$lid=$_GET['lid'];
    			$condition['type'] = 'pro';
        	$args_id = M('meta')->where(" AND meta_key='local' AND meta_value='$lid' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$lid);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Pro/term');
    		}else{
    			$condition['type'] = 'pro';
        	$args_id = M('meta')->where("meta_key='term' AND meta_value='$id' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Pro/term');
    		}
	    	
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
        $this->theme(mc_option('theme'))->display('Pro/single');
    }
}