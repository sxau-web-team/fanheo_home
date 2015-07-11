<?php
namespace User\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function index(){
        if(mc_user_id()) {
	        $this->success('您已经登陆',U('user/index/edit?id='.mc_user_id()));
        } else {
	        $this->theme(mc_option('theme'))->display('User/register');
        }
    }

        /**
     * 调用验证码
     */
   function verify () {
        $config = array(
        'fontSize' => 30, // 验证码字体大小
        'length' => 4, // 验证码位数
        'useNoise' => true, // 关闭验证码杂点
        );

        $Verify = new \Think\Verify($config);
        $Verify->entry();

        //import('ORG.Util.Image'); 此方法失败
        //\Org\Util\Image::buildImageVerify(4,5,'png');
    }

    

    /**
      * 检测输入的验证码是否正确，$code为用户输入的验证码字符串
      */ 
    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function submit(){
        $ip_false = M('option')->where("meta_key='ip_false' AND type='user'")->getField('meta_value',true);
        if($ip_false && in_array(mc_user_ip(), $ip_false)) {
        	$this->error('您的IP被永久禁止登陆！');
        } else {
        if(empty($_POST['user_name'])) {
	        $this->error('用户名必须填写！');
        } else {
        	$user_login = M('meta')->where("meta_key='user_name' AND type ='user'")->getField('meta_value',true);
        	if($_POST['user_name']==C('ADMIN_LOGIN')){
				$this->error('用户名已存在！');
			}
        	if(in_array(strip_tags($_POST['user_name']), $user_login)) {
	        	$this->error('用户名已存在！');
        	}
        }
        };
        if(empty($_POST['user_email'])) {
	        $this->error('邮箱呢！');
        } else {
        	$user_email = M('meta')->where("meta_key='user_email' AND type ='user'")->getField('meta_value',true);
        	if(in_array(strip_tags($_POST['user_email']), $user_email)) {
	        	$this->error('邮箱已存在！若您忘了密码可以找回哦！');
        	}
        };
        if(empty($_POST['user_phone'])) {
            $this->error('为了方便给您送餐请填写手机号哦！');
        } else {
            $user_phone = M('meta')->where("meta_key='user_phone' AND type ='user'")->getField('meta_value',true);
            if(in_array(strip_tags($_POST['user_phone']), $user_phone)) {
                $this->error('此手机号已注册，若您忘了密码可以找回哦！');
            }
        };
        if(empty($_POST['user_pass'])) {
	        $this->error('密码呢！');
        };
        if($_POST['user_pass']!=$_POST['user_pass2']) {
	        $this->error('两次密码必须一致！');
        };
        if (empty($_POST['code'])) {
        	$this->error('请输入验证码！');
        } else {
        	$code = I('code');
        	$ver = $this->check_verify($code, $id = '');
        	if(!$ver)
        	$this->error('验证码错误');
        }
        $user['title'] = $_POST['user_name'];
		$user['content'] = '';
		$user['type'] = 'user';
		$user['date'] = strtotime("now");
		$result = M("page")->data($user)->add();
		if($result) {
			mc_add_meta($result,'user_name',I('param.user_name'),'user');
			$user_pass = md5(I('param.user_pass').mc_option('site_key'));
			mc_add_meta($result,'user_pass',$user_pass,'user');
			mc_add_meta($result,'user_email',I('param.user_email'),'user');
            mc_add_meta($result,'buyer_phone',I('param.user_phone'),'user');
			mc_add_meta($result,'user_level','1','user');
			session('user_name',I('param.user_name'));
	        session('user_pass',$user_pass);
			userLog('会员注册成功',$_SESSION['user_name']);
			$this->success('注册成功,快去完善下你的资料吧~~',U('user/index/edit?id='.mc_user_id()));
		} else {
			$this->error('注册失败');
		}
    }
}