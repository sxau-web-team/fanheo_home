<?php
namespace Home\Controller;
use Think\Controller;
class PerformController extends Controller {
    public function xihuan($add_xihuan){
        $add_xihuan = I('param.add_xihuan');
        $user_xihuan = M('action')->where("page_id='$add_xihuan' AND user_id ='".mc_user_id()."' AND action_key='perform' AND action_value ='xihuan'")->getField('id');
        if(empty($user_xihuan)) {
        	mc_add_action($add_xihuan,'perform','xihuan');
        	$user_id = mc_author_id($add_xihuan);
        	do_go('add_xihuan_end',$user_id);
        };
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
        //$date = strtotime("+8HOUR"); echo date('Y-m-d H:i:s',$date);
    }
    public function add_shoucang($add_shoucang){
        $add_shoucang = I('param.add_shoucang');
        $user_shoucang = M('action')->where("page_id='$add_shoucang' AND user_id ='".mc_user_id()."' AND action_key='perform' AND action_value ='shoucang'")->getField('id');
        if(empty($user_shoucang)) {
        	mc_add_action($add_shoucang,'perform','shoucang');
        	$user_id = mc_author_id($add_shoucang);
        	do_go('add_shoucang_end',$user_id);
        };
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function remove_shoucang($remove_shoucang){
        $remove_shoucang = I('param.remove_shoucang');
        M('action')->where("page_id='$remove_shoucang' AND user_id='".mc_user_id()."' AND action_key='perform' AND action_value = 'shoucang'")->delete();
        $user_id = mc_author_id($remove_shoucang);
        do_go('remove_shoucang_end',$user_id);
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function add_guanzhu($add_guanzhu){
        $add_guanzhu = I('param.add_guanzhu');
        $user_guanzhu = M('action')->where("page_id='$add_guanzhu' AND user_id ='".mc_user_id()."' AND action_key='perform' AND action_value ='guanzhu'")->getField('id');
        if(empty($user_guanzhu)) {
        	mc_add_action($add_guanzhu,'perform','guanzhu');
			do_go('add_guanzhu_end',$add_guanzhu);
        };
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function remove_guanzhu($remove_guanzhu){
        $remove_guanzhu = I('param.remove_guanzhu');
        M('action')->where("page_id='$remove_guanzhu' AND user_id='".mc_user_id()."' AND action_key='perform' AND action_value = 'guanzhu'")->delete();
        do_go('remove_guanzhu_end',$remove_guanzhu);
        $this->error('哥们，你放弃治疗了吗?',U('home/index/index'));
    }
    public function comment($id,$content){
        $id = I('param.id');
        $content = I('param.content');
        if($content) {
	        $content_array = explode(' ',$content);
			foreach($content_array as $val) :
			$content_s = strstr($val, '@');
			$to_user = substr($content_s, 1);
			if($to_user) :
			$idx = M('page')->where("title='$to_user'")->getField('id');
			$content_s2 .= '<a href="'.U('user/index/index?id='.$idx).'">'.$content_s.'</a> ';
			else :
			$content_s2 .= $val.' ';
			endif;
			endforeach;
	        $result = mc_add_action($id,'comment',$content_s2);
	        foreach($content_array as $val) :
			$content_s = strstr($val, '@');
			$to_user = substr($content_s, 1);
			if($to_user) :
			$idx = M('page')->where("title='$to_user'")->getField('id');
			mc_add_action($idx,'at',$result);
			do_go('publish_at_end',$idx);
			endif;
			endforeach;
			$user_id = mc_author_id($id);
			do_go('publish_comment_end',$user_id);
	        $type = mc_get_page_field($id,'type');
	        if($type=='publish') {
		        $this->success('评论成功！',U('post/index/index?id='.$id.'#comment-'.$result));
	        } elseif($type=='group') {
		        $this->success('留言成功！',U('post/group/chat?id='.$id.'#comment-'.$result));
	        } elseif($type=='baobei') {
		        $this->success('评论成功！',U('baobei/index/single?id='.$id.'#comment-'.$result));
	        } elseif($type=='article') {
		        $this->success('评论成功！',U('article/index/single?id='.$id.'#comment-'.$result));
	        } else {
		        $this->success('评论成功！',U('pro/index/single?id='.$id.'#comment-'.$result));
	        }
        } else {
	        $this->error('请填写评论内容！');
        }
    }
    public function jianyi(){
    	// var_dump($_POST);
    	// die();
    	if (mc_user_id()) {
    		if($_POST['type'] && $_POST['content']){
    			$page['type'] = I('param.type');
    			$page['content'] = I('param.content');
    			$page['user_id'] = mc_user_id();
    			$page['date'] = time();
    			$result = M('fankui')->data($page)->add();
    			if($result){
    				$this->success('感谢您的建议，我们会及时处理的',U('home/index/index'));
    			} else {
    				$this->error('提交失败了哦！');
    			}
    		}
    	}else {
	        $this->error('请填写评论内容！');
        }
    }
    public function publish(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = mc_remove_html($_POST['content']);
	    		$page['type'] = 'publish';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		mc_add_meta($result,'author',mc_user_id());
		    		if(is_numeric($_POST['group'])) {
			    		mc_add_meta($result,'group',I('param.group'));
			    		mc_update_page(I('param.group'),strtotime("now"),'date');
			    		mc_add_meta($result,'time',strtotime("now"));
		    		}
		    		do_go('publish_post_end',$result);
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
					if($_POST['pro-parameter']) {
		    			$parameter = I('param.pro-parameter');
		    			foreach($parameter as $key=>$val) {
			    			foreach($val as $vals) {
			    				if($vals!='') {
			    					mc_add_meta($result,$key,$vals,'parameter');
			    				}
			    			}
		    			}
		    		};
		    		mc_add_meta($result,'price',I('param.price'));
		    		mc_add_meta($result,'local',I('param.local'));
		    		mc_add_meta($result,'author',mc_user_id());
		    		do_go('publish_pro_end',$result);
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
    public function publish_group(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = I('param.content');
	    		if(mc_is_admin()) {
		    		$page['type'] = 'group';
	    		} else {
		    		$page['type'] = 'group_pending';
	    		};
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		if($_POST['fmimg']) {
		    			mc_add_meta($result,'fmimg',I('param.fmimg'));
		    		};
		    		mc_add_meta($result,'author',mc_user_id());
		    		mc_add_meta(mc_user_id(),'group_admin',$result,'user');
		    		do_go('publish_group_end',$result);
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
    public function publish_article(){
    	if(mc_user_id()) {
	    	if($_POST['title'] && $_POST['content']) {
	    		$page['title'] = I('param.title');
	    		$page['content'] = $_POST['content'];
	    		$page['type'] = 'article';
	    		$page['date'] = strtotime("now");
	    		$result = M('page')->data($page)->add();
		    	if($result) {
		    		if($_POST['fmimg']) {
		    			mc_add_meta($result,'fmimg',I('param.fmimg'));
		    		};
		    		mc_add_meta($result,'term',I('param.term'));
		    		mc_add_meta($result,'author',mc_user_id());
		    		do_go('publish_article_end',$result);
		    		$this->success('发布成功！',U('article/index/single?id='.$result));
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
    public function edit(){
    	if(mc_is_admin() || mc_is_group_admin($_POST['id']) || mc_is_group_admin(mc_get_meta($_POST['id'],'group'))) {
	    	if($_POST['title'] && $_POST['content'] && is_numeric($_POST['id'])) {
	    		if(mc_get_page_field($_POST['id'],'type')=='pro') {
	    			if($_POST['term']) {
		    			//mc_delete_meta($_POST['id'],'term');
		    			mc_update_meta($_POST['id'],'term',I('param.term'),$type='basic',false);
		    			//mc_add_meta($_POST['id'],'term',I('param.term'));
		    		} else {
		    			$this->error('请设置分类！');
		    		};
	    			if(is_numeric($_POST['price'])) {
	    				mc_update_meta($_POST['id'],'price',I('param.price'));
	    			} else {
						$this->error('请填写价格！');
					};
					M('meta')->where("page_id='".$_POST['id']."' AND type = 'parameter'")->delete();
					if($_POST['pro-parameter']) {
		    			$parameter = I('param.pro-parameter');
		    			foreach($parameter as $key=>$val) {
			    			foreach($val as $vals) {
			    				if($vals!='') {
			    					mc_add_meta($_POST['id'],$key,$vals,'parameter');
			    				}
			    			}
		    			}
		    		};
					if($_POST['fmimg']) {
		    			mc_delete_meta($_POST['id'],'fmimg');
		    			foreach(I('param.fmimg') as $val) {
		    				mc_add_meta($_POST['id'],'fmimg',$val);
		    			}
		    		} else {
		    			$this->error('请设置商品图片！');
		    		};
		    		if($_POST['local']) {
		    			//mc_delete_meta($_POST['id'],'local');
		    			//mc_add_meta($_POST['id'],'local',I('param.local'));
		    			mc_update_meta($_POST['id'],'local',I('param.local'),$type='basic',false);
		    		} else {
		    			$this->error('请设置店铺分类！');
		    		};
	    		};
	    		if(mc_get_page_field($_POST['id'],'type')=='local') {
	    			if($_POST['local']) {
		    			//mc_delete_meta($_POST['id'],'local');
		    			//mc_add_meta($_POST['id'],'local',I('param.local'));
		    			mc_update_meta($_POST['id'],'local',I('param.local'),$type='basic',false);
		    		} else {
		    			$this->error('请设置店铺分类！');
		    		};
	    			if($_POST['header']) {
	    				mc_update_meta($_POST['id'],'header',I('param.header'));
	    			} else {
						$this->error('请填写店长！');
					};
					if($_POST['cook']) {
	    				mc_update_meta($_POST['id'],'cook',I('param.cook'));
	    			} else {
						$this->error('请填写厨师！');
					};
					if($_POST['phone']) {
	    				mc_update_meta($_POST['id'],'phone',I('param.phone'));
	    			} else {
						$this->error('请填写联系电话！');
					};
					if($_POST['fmimg']) {
		    			mc_delete_meta($_POST['id'],'fmimg');
		    			
		    			mc_add_meta($_POST['id'],'fmimg',I('param.fmimg'));
		    			
		    		} else {
		    			$this->error('请设置店铺图片！');
		    		};
	    		};
	    		if(mc_get_page_field($_POST['id'],'type')=='group' || mc_get_page_field($_POST['id'],'type')=='article') {
	    			mc_delete_meta($_POST['id'],'fmimg');
	    			mc_add_meta($_POST['id'],'fmimg',I('param.fmimg'));
		    		if($_POST['term']) {
		    			mc_delete_meta($_POST['id'],'term');
		    			mc_add_meta($_POST['id'],'term',I('param.term'));
		    		} else {
		    			$this->error('请设置店铺图片！');
		    		};
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
	        	} elseif(mc_get_page_field($_POST['id'],'type')=='article') {
		        	$this->success('编辑成功',U('article/index/single?id='.$_POST['id']));
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
    	if(is_numeric($id) && is_numeric($number) && $number > 0) {
	    	if(mc_user_id()) {
	    		if($_POST['parameter']) {
			    	$parameter = I('param.parameter');
					$cart = M('action')->where("page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('id',true);
					if($cart) {
						$par_false = 0;
						foreach($cart as $cart_id) {
							$par_old = M('action')->where("page_id='$cart_id' AND user_id='".mc_user_id()."'")->getField('id',true);
							if($par_old) {
								$par_count = 0;
								foreach($parameter as $key=>$val) {
					    			$par_name = M('option')->where("id='$key'")->getField('meta_value');
						    		$par_id = M('action')->where("page_id='$cart_id' AND action_key='parameter' AND user_id='".mc_user_id()."' AND action_value='$par_name|$val'")->getField('id');
						    		if($par_id) {
							    		$par_count++;
						    		}
					    		}
					    		$par_old_count = count($par_old);
					    		if($par_count==$par_old_count) {
						    		//商品参数完全匹配
						    		$number2 = M('action')->where("id='$cart_id' AND page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('action_value');
						    		$action['action_value'] = $number2+$number;
									M('action')->where("id='$cart_id' AND page_id='$id' AND action_key='cart' AND user_id='".mc_user_id()."'")->save($action);
					    		} else {
						    		$par_false++;
					    		}
							} else {
								//当前饭盒内的商品参数为空
								$result = mc_add_action($id,'cart',$number);
					    		if($result) {
						    		if($_POST['parameter']) {
						    			$parameter = I('param.parameter');
						    			foreach($parameter as $key=>$val) {
						    				$par_name = M('option')->where("id='$key' AND type='pro'")->getField('meta_value');
							    			mc_add_action($result,'parameter',$par_name.'|'.$val);
						    			}
						    		}
					    		}
							}
			    		}
			    		$cart_count = count($cart);
			    		if($par_false==$cart_count) {
				    		//所有商品参数均不匹配
				    		$result = mc_add_action($id,'cart',$number);
					    	if($result) {
						    	if($_POST['parameter']) {
						    		$parameter = I('param.parameter');
						    		foreach($parameter as $key=>$val) {
						    			$par_name = M('option')->where("id='$key' AND type='pro'")->getField('meta_value');
							    		mc_add_action($result,'parameter',$par_name.'|'.$val);
						    		}
						    	}
					    	}
			    		}
			    	} else {
				    	//饭盒中不存在本商品
				    	$result = mc_add_action($id,'cart',$number);
			    		if($result) {
				    		if($_POST['parameter']) {
				    			$parameter = I('param.parameter');
				    			foreach($parameter as $key=>$val) {
				    				$par_name = M('option')->where("id='$key'")->getField('meta_value');
					    			mc_add_action($result,'parameter',$par_name.'|'.$val);
				    			}
				    		}
			    		}
			    	}
	    		} else {
		    		//本商品不存在多种型号
		    		$cart = M('action')->where("page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('id',true);
		    		if($cart) {
			    		foreach($cart as $cart_id) {
				    		$par_old = M('action')->where("page_id='$cart_id' AND user_id='".mc_user_id()."'")->getField('id',true);
				    		if($par_old) {
					    		//饭盒内商品存在参数
				    		} else {
					    		$number2 = M('action')->where("id='$cart_id' AND page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('action_value');
					    		$action['action_value'] = $number2+$number;
								M('action')->where("id='$cart_id' AND page_id='$id' AND action_key='cart' AND user_id='".mc_user_id()."'")->save($action);
				    		}
			    		}
		    		} else {
			    		//饭盒内不存在相同商品
			    		$result = mc_add_action($id,'cart',$number);
		    		}
	    		}
	    		$this->success('加入饭盒成功',U('pro/cart/index'));
	    	} else {
			    $this->success('请先登陆',U('user/login/index'));
		    }
	    } else {
		    $this->error('参数错误！');
	    }
    }
    public function add_sendtime($id){
    	if(is_numeric($id)) {
	    	if(mc_user_id()) {
	    		if($_POST['parameter']) {
	    			$cart = M('action')->where("page_id='$id' AND user_id='".mc_user_id()."' AND action_key='cart'")->getField('id',true);
			    	$parameter = I('param.parameter');
					foreach($parameter as $key=>$val) {
				    	$par_name = M('option')->where("id='$key'")->getField('meta_value');
				    	foreach ($cart as $value) {
				    		
				    		mc_add_action($value,'parameter',$par_name.'|'.$val);
				    	}
					    
				    }
				    
				    $this->success('添加送餐时间成功');
	    		
	    	} else {
			    $this->success('请先登陆',U('user/login/index'));
		    }
	    } else {
		    $this->error('参数错误！');
	    }
	}
    }


    public function cart_delete($id){
    	if(is_numeric($id)) {
	    	M('action')->where("id='$id' AND user_id='".mc_user_id()."'")->delete();
	    	M('action')->where("page_id='$id' AND user_id='".mc_user_id()."' AND action_key='parameter'")->delete();
			$this->success('删除成功',U('pro/cart/index'));
    	} else {
	    	$this->error('参数错误！');
    	}
    }
    public function pro_parameter(){
    	if(mc_is_admin()) {
	    	$parameter = I('param.parameter');
	    	if($parameter) {
		    	mc_add_option('parameter',$parameter,$type='pro');
		    	$this->success('新增参数成功');
	    	} else {
		        $this->error('参数错误！');
	        }
    	} else {
	    	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
    	}
    }
    public function pro_parameter_edit(){
    	if(mc_is_admin()) {
    		$parameter = I('param.parameter');
    		if($parameter) {
    			 foreach($parameter as $key=>$val) {
	    			 $option['meta_value'] = $val;
	    			 M('option')->where("id='$key' AND meta_key='parameter' AND type = 'pro'")->save($option);
    			 }
    			 $this->success('修改参数成功');
    		} else {
		        $this->error('参数错误！');
	        }
    	} else {
	    	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
    	}
    }
    public function pro_parameter_del($id){
    	if(mc_is_admin()) {
    		if(is_numeric($id)) {
	    		M('option')->where("id='$id' AND meta_key='parameter' AND type='pro'")->delete();
	    		$this->success('删除参数成功');
    		} else {
	    		$this->error('参数错误！');
    		}
    	} else {
	    	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
    	}
    }
    public function comment_delete($id){
    	if(mc_is_admin() || mc_is_group_admin(mc_comment_group($id))) {
	    	if(is_numeric($id)) {
		    	M('action')->where("id='$id' AND action_key='comment'")->delete();
		    	M('action')->where("action_value='$id' AND action_key='at'")->delete();
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
		    		do_go('publish_baobei_end',$result);
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
		    		if($page['type'] = 'term_local'){
		    		$this->success('新建分类成功！',U('store/index/term?id='.$result));

		    		}else{
		    		$this->success('新建分类成功！',U(I('param.type').'/index/term?id='.$result));
		    		}
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
    public function ip_false($id){
        if(is_numeric($id)) {
	        if(mc_is_admin()) {
		         if(mc_get_meta($id,'user_level',true,'user')!=10) {
			         $ip_array = M('action')->where("page_id='$id' AND action_key='ip'")->getField('action_value',true);
			         if($ip_array) {
				        foreach($ip_array as $ip) {
					        mc_add_option('ip_false',$ip,'user');
				        };
			         };
			         mc_delete_page($id);
			         $this->success('操作成功',U('Home/index/index'));
		         } else {
			         $this->error('请不要伤害管理员');
		         };
	        } else {
	        	$this->error('哥们，请不要放弃治疗！',U('Home/index/index'));
	        }
        } else {
	        $this->error('参数错误！');
        }
    }
}