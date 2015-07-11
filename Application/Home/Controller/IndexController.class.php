<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($page=1){
        if(mc_site_url()) {
	        if(is_numeric($page)) {
	        	//搜索话题
		        if($_GET['keyword']) {
			        $where['content']  = array('like', "%{$_GET['keyword']}%");
					$where['title']  = array('like',"%{$_GET['keyword']}%");
					$where['_logic'] = 'or';
					$condition['_complex'] = $where;
					$condition['type']  = 'publish';
					$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
			        $count = M('page')->where($condition)->count();
			        $this->assign('count',$count);
			        $this->assign('page_now',$page);
			        $this->theme(mc_option('theme'))->display('Home/search');
		        } elseif($_GET['shopkeyword']) {
		        //搜索商品
		        	
		        	$where['content']  = array('like', "%{$_GET['shopkeyword']}%");
					$where['title']  = array('like',"%{$_GET['shopkeyword']}%");
					$where['_logic'] = 'or';
					$condition['_complex'] = $where;
					$condition['type']  = 'pro';
					$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
			        $count = M('page')->where($condition)->count();
			        $this->assign('count',$count);
			        $this->assign('page_now',$page);
			        $this->theme(mc_option('theme'))->display('Home/goodssearch');

		        } else {
			        $condition['type'] = 'publish';
			        $this->page = M('page')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
			        $count = M('page')->where($condition)->count();
			        $this->assign('count',$count);
			        $this->assign('page_now',$page);
			        $this->theme(mc_option('theme'))->display('Home/index');
			    }
		    } else {
			    $this->error('参数错误！');
		    }
        } else {
	        $site_url = "http://".$_SERVER["HTTP_HOST"].$_SERVER['PHP_SELF'];
	        $site_url = preg_replace("/\/[a-z0-9]+\.php.*/is", "", $site_url);
	        $url = $site_url.'/install.php';
	        Header("Location:$url");
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