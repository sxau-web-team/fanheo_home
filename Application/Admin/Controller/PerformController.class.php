<?php
namespace Home\Controller;
use Think\Controller;
class PerformController extends Controller {
    public function xihuan($add_xihuan){
        $add_xihuan = I('param.add_xihuan');
        $user_xihuan = M('action')->where("page_id='$add_xihuan' AND user_id ='".mc_user_id()."' AND action_key='perform' AND action_value ='xihuan'")->getField('id');
        if(empty($user_xihuan)) {
        	mc_add_action($add_xihuan,'perform','xihuan');
        };
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
        //$date = strtotime("+8HOUR"); echo date('Y-m-d H:i:s',$date);
    }
    public function add_shoucang($add_shoucang){
        $add_shoucang = I('param.add_shoucang');
        $user_shoucang = M('action')->where("page_id='$add_shoucang' AND user_id ='".mc_user_id()."' AND action_key='perform' AND action_value ='shoucang'")->getField('id');
        if(empty($user_shoucang)) {
        	mc_add_action($add_shoucang,'perform','shoucang');
        };
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function remove_shoucang($remove_shoucang){
        $remove_shoucang = I('param.remove_shoucang');
        M('action')->where("page_id='$remove_shoucang' AND user_id='".mc_user_id()."' AND action_key='perform' AND action_value = 'shoucang'")->delete();
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function comment($id,$content){
        $id = I('param.id');
        $content = I('param.content');
        if($content) {
	        $result = mc_add_action($id,'comment',strip_tags($content));
	        $type = mc_get_page_field($id,'type');
	        if($type=='publish') {
		        $this->success('评论成功！',U('post/index/index?id='.$id.'#comment-'.$result));
	        } elseif($type=='group') {
		        $this->success('留言成功！',U('post/group/chat?id='.$id.'#comment-'.$result));
	        } else {
		        $this->success('评论成功！',U('pro/index/single?id='.$id.'#comment-'.$result));
	        }
        } else {
	        $this->error('请填写评论内容！');
        }
    }
    public function publish(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = mc_remove_html(I('param.content'));
	    		$page['type'] = 'publish';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		mc_add_meta($result,'author',mc_user_id());
		    		if(is_numeric($_POST['group'])) {
			    		mc_add_meta($result,'group',I('param.group'));
			    		mc_update_page(I('param.group'),strtotime("now"),'date');
		    		}
		    		$this->success('发布成功，请耐心等待审核',U('post/index/index?id='.$result));
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
    public function publish_pro(){
    	if(mc_is_admin()) {
	    	if($_POST['title'] && $_POST['content'] && is_numeric($_POST['price'])) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = $_POST['content'];
	    		$page['type'] = 'pro';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		mc_add_meta($result,'term',I('param.term'));
		    		if($_POST['fmimg']) {
		    			foreach(I('param.fmimg') as $val) {
		    				mc_add_meta($result,'fmimg',$val);
		    			}
		    		};
		    		mc_add_meta($result,'price',I('param.price'));
		    		mc_add_meta($result,'local',I('param.local'));
		    		mc_add_meta($result,'author',mc_user_id());
		    		$this->success('发布成功，请耐心等待审核',U('pro/index/single?id='.$result));
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
    public function publish_group(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = I('param.content');
	    		$page['type'] = 'group_pending';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		if($_POST['fmimg']) {
		    			mc_add_meta($result,'fmimg',I('param.fmimg'));
		    		};
		    		mc_add_meta($result,'author',mc_user_id());
		    		mc_add_meta(mc_user_id(),'group_admin',$result,'user');
		    		$this->success('新建群组成功！',U('post/group/index?id='.$result));
	    		} else {
		    		$this->error('发布失败！');
	    		}
	    	} else {
	    		$this->error('请填写群组名称和介绍');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
    public function edit(){
    	if(mc_is_admin() || mc_is_group_admin($_POST['id']) || mc_is_group_admin(mc_get_meta($_POST['id'],'group'))) {
	    	if($_POST['title'] && $_POST['content'] && is_numeric($_POST['id'])) {
	    		if(mc_get_page_field($_POST['id'],'type')=='pro') {
	    			if($_POST['term']) {
		    			mc_delete_meta($_POST['id'],'term');
		    			mc_add_meta($_POST['id'],'term',I('param.term'));
		    		} else {
		    			$this->error('请设置分类！');
		    		};
	    			if(is_numeric($_POST['price'])) {
	    				mc_update_meta($_POST['id'],'price',I('param.price'));
	    			} else {
						$this->error('请填写价格！');
					};
					if($_POST['fmimg']) {
		    			mc_delete_meta($_POST['id'],'fmimg');
		    			foreach(I('param.fmimg') as $val) {
		    				mc_add_meta($_POST['id'],'fmimg',$val);
		    			}
		    		} else {
		    			$this->error('请设置商品图片！');
		    		};
	    		};
	    		if(mc_get_page_field($_POST['id'],'type')=='group') {
	    			mc_delete_meta($_POST['id'],'fmimg');
	    			mc_add_meta($_POST['id'],'fmimg',I('param.fmimg'));
	    		};
	    		if(mc_get_page_field($_POST['id'],'type')=='baobei') {
	    			if(is_numeric($_POST['price'])) {
	    				mc_update_meta($_POST['id'],'price',I('param.price'));
	    			} else {
						$this->error('请填写价格！');
					};
					if($_POST['fmimg']) {
		    			mc_delete_meta($_POST['id'],'fmimg');
		    			mc_add_meta($_POST['id'],'fmimg',I('param.fmimg'));
		    		} else {
		    			$this->error('请设置商品图片！');
		    		};
					if($_POST['link']) {
		    			mc_delete_meta($_POST['id'],'link');
		    			mc_add_meta($_POST['id'],'link',I('param.link'));
		    		} else {
		    			$this->error('请设置购买链接！');
		    		};
		    		mc_delete_meta($_POST['id'],'stime');
		    		mc_delete_meta($_POST['id'],'etime');
		    		if($_POST['stime']) {
		    			$date = strtotime($_POST['stime']);
		    		} else {
			    		$date = strtotime("now");
		    		};
		    		if($_POST['etime']) {
		    			if($date<strtotime($_POST['etime'])) {
			    			mc_add_meta($_POST['id'],'stime',$date);
							mc_add_meta($_POST['id'],'etime',strtotime($_POST['etime']));
		    			} else {
		    				$this->error('结束时间不得小于开始时间！');
		    			};
		    		} else {
			    		mc_add_meta($_POST['id'],'stime',$date);
			    		mc_add_meta($_POST['id'],'etime','');
		    		};
		    		if($_POST['term']) {
		    			mc_delete_meta($_POST['id'],'term');
		    			mc_add_meta($_POST['id'],'term',I('param.term'));
		    		} else {
		    			$this->error('请设置分类！');
		    		};
	    		};
	    		$page['title'] = I('param.title');
	    		$page['content'] = $_POST['content'];
	    		M('page')->where("id='".$_POST['id']."'")->save($page);
	    		if(mc_get_page_field($_POST['id'],'type')=='pro') {
		        	$this->success('编辑成功',U('pro/index/single?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='publish') {
		        	$this->success('编辑成功',U('post/index/index?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='group') {
		        	$this->success('编辑成功',U('post/group/index?id='.$_POST['id']));
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='baobei') {
		        	$this->success('编辑成功',U('baobei/index/single?id='.$_POST['id']));
	        	} else {
		        	$this->error('未知的Page类型',U('home/index/index'));
	        	}
	    	} else {
		    	$this->error('请完整填写信息！');
	    	}
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
    public function add_cart($id,$number){
    	if(is_numeric($id) && is_numeric($number)) {
	    	if(mc_user_id()) {
	    		$number2 = M('action')->where("page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('action_value');
	    		if($number2) {
		    		$action['action_value'] = $number2+$number;
		    		M('action')->where("page_id='$id' AND action_key='cart' AND user_id='".mc_user_id()."'")->save($action);
	    		} else {
		    		$result = mc_add_action($id,'cart',$number);
	    		}
	    		$this->success('加入饭盒成功',U('pro/cart/index'));
	    	} else {
			    $this->success('请先登陆',U('user/login/index'));
		    }
	    } else {
		    $this->error('参数错误！');
	    }
    }
    public function cart_delete($id){
    	if(is_numeric($id)) {
	    	M('action')->where("id='$id' AND user_id='".mc_user_id()."'")->delete();
			$this->success('删除成功',U('pro/cart/index'));
    	} else {
	    	$this->error('参数错误！');
    	}
    }
    public function comment_delete($id){
    	if(mc_is_admin() || mc_is_group_admin(mc_comment_group($id))) {
	    	if(is_numeric($id)) {
		    	M('action')->where("id='$id' AND action_key='comment'")->delete();
		    	$this->success('删除成功');
		    } else {
		    	$this->error('参数错误！');
	    	}
    	} else {
	    	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
    	}
    }
    public function publish_baobei(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content'] && is_numeric($_POST['price']) && is_numeric($_POST['term']) && $_POST['link']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = $_POST['content'];
	    		if(mc_is_admin()) {
		    		$page['type'] = 'baobei';
	    		} else {
		    		$page['type'] = 'baobei_pending';
	    		};
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		mc_add_meta($result,'term',I('param.term'));
		    		if($_POST['fmimg']) {
		    			mc_add_meta($result,'fmimg',I('param.fmimg'));
		    		};
		    		if($_POST['link']) {
		    			mc_add_meta($result,'link',I('param.link'));
		    		};
		    		if($_POST['stime']) {
		    			$date = strtotime($_POST['stime']);
		    		} else {
			    		$date = strtotime("now");
		    		};
		    		if($_POST['etime']) {
		    			if($date<strtotime($_POST['etime'])) {
			    			mc_add_meta($result,'stime',$date);
							mc_add_meta($result,'etime',strtotime($_POST['etime']));
		    			} else {
		    				$this->error('结束时间不得小于开始时间！');
		    			};
		    		} else {
			    		mc_add_meta($result,'stime',$date);
			    		mc_add_meta($result,'etime','');
		    		};
		    		mc_add_meta($result,'price',I('param.price'));
		    		mc_add_meta($result,'author',mc_user_id());
		    		$this->success('发布成功，请耐心等待审核',U('baobei/index/single?id='.$result));
	    		} else {
		    		$this->error('发布失败！');
	    		}
	    	} else {
	    		$this->error('请完整填写各项内容！');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
    public function publish_term(){
    	if(mc_is_admin()) {
	    	if($_POST['title']) {
	    		$page['title'] = I('param.title');
	    		$page['type'] = 'term_'.I('param.type');
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		$this->success('新建分类成功！',U(I('param.type').'/index/term?id='.$result));
	    		} else {
		    		$this->error('发布失败！');
	    		}
	    	} else {
	    		$this->error('请填写分类名称');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
    public function edit_term($id){
    	if(mc_is_admin() && is_numeric($id)) {
	    	if($_POST['title']) {
	    		$page['title'] = I('param.title');
	    		M('page')->where("id='$id'")->save($page);
	    		$type = mc_get_page_field($id,'type');
	    		if($type=='term_pro') {
		    		$type_name = 'pro';
	    		} elseif($type=='term_baobei') {
	    			$type_name = 'baobei';
	    		};
		    	$this->success('编辑分类成功！',U($type_name.'/index/term?id='.$id));
	    	} else {
	    		$this->error('请填写分类名称');
	    	};
	    } else {
		    $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
	    };
    }
    public function qiandao(){
    	if(mc_is_qiandao()) {
	    	$this->error('您已签到过了哦～');
    	} else {
	    	$coins = 3;
	    	mc_update_coins(mc_user_id(),$coins);
	    	mc_add_action(mc_user_id(),'coins',$coins);
	    	$this->success('签到成功！',U('home/index/index'));
    	}
    }
    public function review($id){
	    if(mc_is_admin()) {
	    	$type = mc_get_page_field($id,'type');
	    	if($type=='baobei_pending') {
		    	mc_update_page($id,'baobei','type');
		    	$coins = 30;
		    	mc_update_coins(mc_author_id($id),$coins);
		    	$action['page_id'] = $id;
				$action['user_id'] = mc_author_id($id);
				$action['action_key'] = 'coins';
				$action['action_value'] = $coins;
				$action['date'] = strtotime("now");
				$result = M('action')->data($action)->add();
		    	$this->success('审核成功！',U('baobei/index/single?id='.$id));
	    	} elseif($type=='group_pending') {
		    	mc_update_page($id,'group','type');
		    	$this->success('审核成功！',U('post/group/single?id='.$id));
	    	} else {
		    	$this->error('未知页面类型');
	    	}
	    } else {
		    $this->error('请不要放弃治疗');
	    }
    }
    public function delete($id){
        if(is_numeric($id)) {
	        if(mc_is_admin() || mc_is_group_admin(mc_get_meta($id,'group'))) {
		         if(mc_get_meta($id,'user_level',true,'user')!=10) {
			         mc_delete_page($id);
			         $this->success('删除成功',U('Home/index/index'));
		         } else {
			         $this->error('请不要伤害管理员',U('user/index/manage?id='.mc_user_id()));
		         };
	        } else {
	        	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
	        }
        } else {
	        $this->error('参数错误！');
        }
    }
}