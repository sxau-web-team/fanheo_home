<?php
/**  
 * @author 
 * @author 
 */
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {
    function _initialize(){
        //登陆判断
		if(isset($_SESSION['user_name']) && $_SESSION['user_pass'] != ''){
			$this->assign('AdminUser',session('user_name'));
			//$this->assign('LoginTime',session('LoginTime'));
		}elseif(CONTROLLER_NAME != 'Login' && !isset($_seeion[C('USER_AUTH_KEY')])){
			$this->redirect('Login/Index');
		}
		
		//echo MODULE_NAME;
		//echo ACTION_NAME;
		$notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
		//dump($notAuth);
		
		if(C('USER_AUTH_ON') && !$notAuth){
			\Org\Util\Rbac::AccessDecision(GROUP_NAME) || $this->error('没有权限');
		}
    }
    /**
     * @后台操作记录
     * @type    记录类型
     * @id      是否开启
	 * @作者		shop猫
	 * @版权		宁波天发网络
	 * @官网		http://www.tifaweb.com http://www.dswjcms.com
     */
    public function Record($type,$id=0){
        if($id==0){
            $Operation = M('operation');
            $array['name']= $_SESSION['user_name'];
            $array['page']= $_SERVER['PHP_SELF'].'/'.MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
            $array['type']= $type;
            $array['ip']= get_client_ip();
            $array['time']= time();
            $Operation->add($array);
        }
    }	
}