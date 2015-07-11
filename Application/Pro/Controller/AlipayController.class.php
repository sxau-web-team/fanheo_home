<?php
namespace Pro\Controller;
use Think\Controller;
class AlipayController extends Controller {
    public function alipay2(){
    	if(!$_POST['buyer_name']) {
	    	$this->error('请填写收货人姓名');
    	};
    	if(!$_POST['buyer_city']) {
	    	$this->error('请选择省份和城市');
    	};
    	if(!$_POST['buyer_address']) {
	    	$this->error('请填写详细地址');
    	};
    	if(!$_POST['buyer_phone']) {
	    	$this->error('请填写联系电话');
    	};
	
//	$order['user_name']	= $_POST['buyer_name'];
//	$order['address'] = $_POST['buyer_address'];
//	$order['phone'] = $_POST['buyer_phone'];
//	$order['note'] = $_POST['note'];
//	M('order')->data($order)->add();
		require_once("./pay/alipay2/alipayapi.php");
    }
    public function alipay2_return(){
    	require_once("./pay/alipay2/return_url.php");
    }
    public function alipay2_notify(){
    	require_once("./pay/alipay2/notify_url.php");
    }
}