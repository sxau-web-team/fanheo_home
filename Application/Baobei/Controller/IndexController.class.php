<?php
namespace Baobei\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'baobei';
	    	$date = strtotime("now");
        	$args_id1 = M('meta')->where("meta_key='stime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true);
        	$args_id2 = M('meta')->where("meta_key='etime' AND (meta_value>'$date' OR meta_value='') AND type='basic'")->getField('page_id',true);
        	$args_id = array_intersect($args_id1,$args_id2);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
	    	$count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Baobei/index');
		} else {
			$this->error('参数错误！');
		}
	}
	public function single($id=1){
        if(is_numeric($id)) {
        	mc_set_views($id);
        	$this->page = M('page')->field('id,title,content,type,date')->where("id='$id'")->select();
			$this->theme(mc_option('theme'))->display('Baobei/single');
		} else {
			$this->error('参数错误！');
		}
    }
    public function term($id,$page=1){
    	if(is_numeric($id) && is_numeric($page)) {
	    	$condition['type'] = 'baobei';
	    	$date = strtotime("now");
	    	$args_id1 = M('meta')->where("meta_key='stime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true);
        	$args_id2 = M('meta')->where("meta_key='etime' AND (meta_value>'$date' OR meta_value='') AND type='basic'")->getField('page_id',true);
        	$args_id3 = M('meta')->where("meta_key='term' AND meta_value='$id' AND type='basic'")->getField('page_id',true);
        	$args_id = array_intersect($args_id1,$args_id2,$args_id3);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Baobei/term');
		} else {
			$this->error('参数错误！');
		}
	}
    public function soon($page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'baobei';
	    	$date = strtotime("now");
        	$args_id = M('meta')->where("meta_key='stime' AND meta_value>'$date' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Baobei/soon');
		} else {
			$this->error('参数错误！');
		}
	}
    public function done($page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'baobei';
	    	$date = strtotime("now");
        	$args_id = M('meta')->where("meta_key='etime' AND meta_value<'$date' AND type='basic'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Baobei/done');
		} else {
			$this->error('参数错误！');
		}
	}
	public function pending($page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'baobei_pending';
	    	$this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('Baobei/pending');
		} else {
			$this->error('参数错误！');
		}
	}
}