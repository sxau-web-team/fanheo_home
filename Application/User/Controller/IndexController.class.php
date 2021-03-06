<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($id,$page=1){
    	if(is_numeric($id)) {
	    	if(mc_user_id()!=$id) {
		    	$args_id = M('meta')->where("meta_key='author' AND meta_value='$id'")->getField('page_id',true);
	        	$condition['id']  = array('in',$args_id);
				$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
		    	$count = M('page')->where($condition)->count();
		        $this->assign('id',$id);
		        $this->assign('count',$count);
		        $this->assign('page_now',$page);
		    	$this->theme(mc_option('theme'))->display('User/pages');
		    } else {
			    //我关注的
			    $args_id1 = M('action')->where("action_key='perform' AND action_value='guanzhu' AND user_id = '$id'")->getField('page_id',true);
			    //@我的
			    $args_id2 = M('action')->where("action_key='at' AND page_id = '$id'")->getField('page_id',true);
			    //我的文章发生的
			    $args_id3 = M('meta')->where("meta_key='author' AND meta_value='$id'")->getField('page_id',true);
			    //最终
			    $my_id = array($id);
			    if($args_id1) {
				    if($args_id2) {
				    	$args_id = array_merge($args_id1,$args_id2,$my_id);
				    } else {
					    $args_id = array_merge($args_id1,$my_id);
				    };
			    } else {
			    	if($args_id2) {
			    		$args_id = array_merge($args_id2,$my_id);
			    	} else {
				    	$args_id = $my_id;
			    	}
			    };
			    if($args_id2 && $args_id3) {
				    $args_id5 = array_merge($args_id3,$args_id2);
			    } elseif($args_id2) {
			    	$args_id5 = $args_id2;
			    } elseif($args_id3) {
			    	$args_id5 = $args_id3;
			    };
			    $condition1['user_id']  = array('in',$args_id);
			    $condition1['page_id'] = array('in',$args_id5);
			    $condition1['_logic'] = 'OR';
			    $args_id4 = array('at','perform','comment');
			    $condition['action_key'] = array('in',$args_id4);
			    $condition['_complex'] = $condition1;
				$this->page = M('action')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
		    	$count = M('action')->where($condition)->count();
		        $this->assign('id',$id);
		        $this->assign('count',$count);
		        $this->assign('page_now',$page);
		        $this->theme(mc_option('theme'))->display('User/index');
			    do_go('user_home_end');
		    }
		} else {
	     	$this->error('参数错误！');
	     };
	}
    public function edit($id){
    	if(is_numeric($id)) {
	    	if(mc_user_id()==$id) {
		        if($_POST['title']) {
			        $title = M('page')->where("title='".I('param.title')."' AND type ='user'")->getField('id');
		        	if(is_numeric($title) && $title!=$id) {
			        	$this->error('昵称已存在！');
		        	} else {
			        	mc_update_page(mc_user_id(),I('param.title'),'title');
		        	};
			        if($_POST['content']) {
				        mc_update_page(mc_user_id(),$_POST['content'],'content');
			        };
			        if($_POST['user_avatar']) {
			        	if(mc_get_meta(mc_user_id(),'user_avatar',true,'user')) {
				        	mc_update_meta(mc_user_id(),'user_avatar',$_POST['user_avatar'],'user');
			        	} else {
				        	mc_add_meta(mc_user_id(),'user_avatar',$_POST['user_avatar'],'user');
			        	}
					};
					if($_POST['fmimg']) {
						mc_delete_meta($id,'fmimg','basic');
						mc_add_meta($id,'fmimg',$_POST['fmimg']);
					};
					mc_delete_meta($id,'buyer_name','user');
					if($_POST['buyer_name']) {
				        mc_add_meta($id,'buyer_name',$_POST['buyer_name'],'user');
			        };
			        mc_delete_meta($id,'buyer_province','user');
					if($_POST['buyer_province']) {
				        mc_add_meta($id,'buyer_province',$_POST['buyer_province'],'user');
			        };
			        mc_delete_meta($id,'buyer_city','user');
					if($_POST['buyer_city']) {
				        mc_add_meta($id,'buyer_city',$_POST['buyer_city'],'user');
			        };
			        mc_delete_meta($id,'buyer_address','user');
					if($_POST['buyer_address']) {
				        mc_add_meta($id,'buyer_address',$_POST['buyer_address'],'user');
			        };
			        mc_delete_meta($id,'buyer_phone','user');
					if($_POST['buyer_phone']) {
				        mc_add_meta($id,'buyer_phone',$_POST['buyer_phone'],'user');
			        };
			        if($_POST['user_email']) {
			        	mc_update_meta(mc_user_id(),'user_email',$_POST['user_email'],'user');
					} else {
						$this->error('邮箱必须填写！');
					};
					if($_POST['pass']) {
						if($_POST['pass2']==$_POST['pass']) {
							mc_update_meta(mc_user_id(),'user_pass',md5($_POST['pass'].mc_option('site_key')),'user');
							$this->success('修改密码成功，请使用新密码登陆','?m=user&c=login');
						} else {
							$this->error('两次密码必须填写一致！');
						}
					} else {
						$this->success('更新资料成功',U('User/index/edit?id='.$id));
					};
		        } else {
			        $this->theme(mc_option('theme'))->display('User/edit');
		        };
		     } else {
			     $this->theme(mc_option('theme'))->display('User/account');
		     }
	     } else {
	     	$this->error('参数错误！');
	     };
    }
    public function manage($page=1){
    	if(is_numeric($page)) {
	    	if(mc_user_id()) {
	    		if(mc_is_admin()) {
		    		$this->page = M('page')->where("type='user'")->order('id desc')->page($page,mc_option('page_size'))->select();
		    		$count = M('page')->where("type='user'")->count();
					$this->assign('count',$count);
					$this->assign('page_now',$page);
					$this->theme(mc_option('theme'))->display('User/manage');
		    	} else {
			    	$this->error('您没有权限访问此页面！');
		    	};
	    	} else {
		    	$this->success('请先登陆',U('User/login/index'));
		    };
		} else {
			$this->error('参数错误！');
		}
    }
    public function control(){
    	if(mc_user_id()) {
    		if(mc_is_admin()) {
	    		if($_POST['site_name'] && $_POST['site_url'] && $_POST['page_size']) {
		    		mc_update_option('site_name',I('param.site_name'));
		    		mc_update_option('site_url',I('param.site_url'));
		    		mc_update_option('gonggao',$_POST['gonggao']);
		    		mc_update_option('logo',I('param.logo'));
		    		mc_update_option('alipay2_seller',I('param.alipay2_seller'));
		    		mc_update_option('alipay2_partner',I('param.alipay2_partner'));
		    		mc_update_option('alipay2_key',I('param.alipay2_key'));
		    		mc_update_option('stmp_from',I('param.stmp_from'));
		    		mc_update_option('stmp_name',I('param.stmp_name'));
		    		mc_update_option('stmp_host',I('param.stmp_host'));
		    		mc_update_option('stmp_port',I('param.stmp_port'));
		    		mc_update_option('stmp_username',I('param.stmp_username'));
		    		mc_update_option('stmp_password',I('param.stmp_password'));
		    		if($_POST['fmimg']) {
			    		mc_update_option('fmimg',I('param.fmimg'));
		    		};
		    		if($_POST['homehdimg1']) {
		    			mc_update_option('homehdimg1',I('param.homehdimg1'));
		    		};
		    		if($_POST['homehdimg2']) {
		    			mc_update_option('homehdimg2',I('param.homehdimg2'));
		    		};
		    		if($_POST['homehdimg3']) {
		    			mc_update_option('homehdimg3',I('param.homehdimg3'));
		    		};
		    		mc_update_option('homehdlnk1',I('param.homehdlnk1'));
		    		mc_update_option('homehdlnk2',I('param.homehdlnk2'));
		    		mc_update_option('homehdlnk3',I('param.homehdlnk3'));
		    		mc_update_option('sidebar',I('param.sidebar'));
		    		mc_update_option('page_size',I('param.page_size'));
		    		$this->success('更新成功');
	    		} else {
		    		$this->theme(mc_option('theme'))->display('User/control');
	    		}
	    	} else {
		    	$this->error('您没有权限访问此页面！');
	    	};
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
    }
    public function site_control(){
    	if(mc_is_admin()) {
    		if($_POST['home_control']) {
		    	mc_update_option('home_title',I('param.home_title'));
		    	mc_update_option('home_keywords',I('param.home_keywords'));
		    	mc_update_option('home_description',I('param.home_description'));
		    	mc_update_option('pro_close',I('param.pro_close'));
		    	mc_update_option('baobei_close',I('param.baobei_close'));
		    	mc_update_option('group_close',I('param.group_close'));
		    	mc_update_option('article_close',I('param.article_close'));
		    	$this->success('保存成功',U('Home/index/index'));
	    	} elseif($_POST['pro_control']) {
		    	mc_update_option('pro_title',I('param.pro_title'));
		    	mc_update_option('pro_keywords',I('param.pro_keywords'));
		    	mc_update_option('pro_description',I('param.pro_description'));
		    	$this->success('保存成功',U('Pro/index/index'));
	    	} elseif($_POST['baobei_control']) {
		    	mc_update_option('baobei_title',I('param.baobei_title'));
		    	mc_update_option('baobei_keywords',I('param.baobei_keywords'));
		    	mc_update_option('baobei_description',I('param.baobei_description'));
		    	$this->success('保存成功',U('Baobei/index/index'));
	    	} elseif($_POST['group_control']) {
		    	mc_update_option('group_title',I('param.group_title'));
		    	mc_update_option('group_keywords',I('param.group_keywords'));
		    	mc_update_option('group_description',I('param.group_description'));
		    	$this->success('保存成功',U('Post/Group/index'));
	    	} elseif($_POST['article_control']) {
		    	mc_update_option('article_title',I('param.article_title'));
		    	mc_update_option('article_keywords',I('param.article_keywords'));
		    	mc_update_option('article_description',I('param.article_description'));
		    	$this->success('保存成功',U('Article/index/index'));
	    	} else {
		    	$this->error('提交参数错误！');
	    	}
    	} else {
	    	$this->success('请先登陆',U('User/login/index'));
	    };
    }
    
    public function shoucang($id){
        if(is_numeric($id)) {
	        $args_id = M('action')->where("user_id='$id' AND action_key='perform' AND action_value='shoucang'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
        	$this->page = M('page')->where($condition)->order('id desc')->select();
	        $this->theme(mc_option('theme'))->display('User/shoucang');
	    } else {
	     	$this->error('参数错误！');$this->error('参数错误！');
	    };
    }
    // public function pro($id){
    // 	if(is_numeric($id)) {
	   //  	if(mc_user_id()==$id) {
				// /* $this->page = M('order')->where("user_id='".mc_user_id()."'")->order('id desc')->page($page,mc_option('page_size'))->select();
				// $count = M('order')->count();
				// $this->assign('count',$count);
				// $this->assign('page_now',$page); */
				
		  //   	$this->page = M('action')->where("user_id='".mc_user_id()."' AND action_key IN ('trade_wait_send','trade_wait_cofirm','trade_wait_finished')")->order('id desc')->select();
		  //   	$this->theme(mc_option('theme'))->display('User/pro');
	   //  	} else {
		  //   	$this->error('请不要偷窥别人的购买记录哦～');
	   //  	}
	   //  } else {
	   //   	$this->error('参数错误！');
	   //  };
    // }
    public function pro2($id){
    	if(is_numeric($id)) {
	    	if(mc_user_id()==$id) {
		    	$this->page = M('order')->where("user_id='".mc_user_id()."'")->order('id desc')->select();
		    	$this->theme(mc_option('theme'))->display('User/pro');
	    	} else {
		    	$this->error('请不要偷窥别人的购买记录哦～');
	    	}
	    } else {
	     	$this->error('参数错误！');
	    };
    }
    // public function pro_all(){
    // 	if(mc_user_id()) {
    // 		if(mc_is_admin()) {
		  //   	$this->page = M('action')->where("action_key IN ('trade_wait_send','trade_wait_cofirm','trade_wait_finished')")->order('id desc')->select();
		  //   	$this->theme(mc_option('theme'))->display('User/pro_all');
	   //  	} else {
		  //   	$this->error('请不要偷窥别人的购买记录哦～');
	   //  	}
	   //  } else {
		  //   $this->success('请先登陆',U('User/login/index'));
	   //  }
    // }
    public function pro_all2(){
    	if(mc_user_id()) {
    		if(mc_is_admin()) {
		    	$this->page = M('order')->order('id desc')->select();
		    	$this->theme(mc_option('theme'))->display('User/pro_all');
	    	} else {
		    	$this->error('请不要偷窥别人的购买记录哦～');
	    	}
	    } else {
		    $this->success('请先登陆',U('User/login/index'));
	    }
    }
    //用户确认收货
    public function affirm(){
    	if (mc_user_id) {
    		if($_POST['number'] && $_POST['user_id'] ){
    			$uid=$_POST['user_id'];
    			if (mc_user_id()==$uid) {
    				$number = I('param.number');
			        $status = M('order')->where("number='$number'")->getField('status');
			        if($status==3) {
			        	$page['status']='4';
			        	M('order')->where("number='$number'")->save($page);
			        	$this->success('订单已确认');
			        }else{
			        	$this->error('订单已经确认过');
			        }
			        
    			}else{
    				$this->error('非法操作');
    			}
    		}else{
    			$this->error('数据错误，失败');
    		}
    	}else{
    		$this->success('请先登陆',U('User/login/index'));
    	}
    }
    public function coins($id,$page=1){
    	if(is_numeric($id) && is_numeric($page)) {
	    	$condition['user_id'] = $id;
	    	$condition['action_key'] = 'coins';
	    	$this->page = M('action')->where($condition)->order('date desc')->page($page,mc_option('page_size'))->select();
		    $this->assign('id',$id);
		    $this->assign('count',$count);
		    $this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('User/coins');
		} else {
			$this->error('参数错误！');
		}
	}
    public function guanzhu($id,$page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'user';
        	$args_id = M('action')->where("action_key='perform' AND action_value='guanzhu' AND user_id='$id'")->getField('page_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
			$this->assign('count',$count);
			$this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('User/guanzhu');
		} else {
			$this->error('参数错误！');
		}
    }
    public function fans($id,$page=1){
    	if(is_numeric($page)) {
	    	$condition['type'] = 'user';
        	$args_id = M('action')->where("action_key='perform' AND action_value='guanzhu' AND page_id='$id'")->getField('user_id',true);
        	$condition['id']  = array('in',$args_id);
	    	$this->page = M('page')->where($condition)->order('id desc')->page($page,mc_option('page_size'))->select();
		    $count = M('page')->where($condition)->count();
			$this->assign('count',$count);
			$this->assign('page_now',$page);
			$this->theme(mc_option('theme'))->display('User/fans');
		} else {
			$this->error('参数错误！');
		}
    }
}