<?php
namespace Pro\Controller;
use Think\Controller;
vendor('Jpush.autoload'); 
use \JPush\Model as M;
use \JPush\JPushClient;
use \JPush\Exception\APIConnectionException;
use \JPush\Exception\APIRequestException;
class PostController extends Controller {

    public $title='fanheo新订单,快做饭啦';
    public function post() {
        if(!$_POST['user_name']) {
            $this->error('请填写收货人姓名');
        };
        if(!$_POST['address']) {
            $this->error('请填写详细地址');
        };
        if(!$_POST['phone']) {
            $this->error('请填写联系电话');
        };
        

        //商户订单号
        $curDateTime = date("YmdHis");
        $randNum = rand(1000, 9999);
        $number = mc_user_id() . $curDateTime . $randNum;
        //商户网站订单系统中唯一订单号，必填
        
        $now = strtotime("now");
    $cart = M('action')->where("user_id='".mc_user_id()."' AND action_key='cart'")->order('id desc')->select();

        //付款金额
        
        //必填

        
        
        //用户ID
        $user_id = mc_user_id();
        //收货人姓名
        $user_name = $_POST['user_name'];
        //如：张三

        //收货人地址
        $address = $_POST['address'];
       
        //收货人手机号码
        $phone = $_POST['phone'];
        //如：13312341234

        /**
         * 传入status参数 筛选出不同订单状态的订单
         *status=1 => 等待配送，未处理
         *status=2 => 制作中
         *status=3 => 配送中，等待用户确认
         *status=4 => 订单完成
         *status=5 => 订单删除
         *
         */
        $status = '1';

        //备注

        $note = $_POST['note'];

        $date = time();

        foreach ($cart as $k => $val) {
            $parameter = M('action')->where("page_id='".$val['id']."' AND user_id='".mc_user_id()."'")->order('id asc')->getField('action_value',true);
            if ($parameter) {
               foreach($parameter as $par){
                list($par_name,$par_value) = explode('|',$par);
                $send_time=$par_value;
            }
            }
            
            $count = $val['action_value'];
            $pro = mc_get_page_field($val['page_id'],'title');
        $pro_id = $val['page_id'];
            $store = mc_get_meta($pro_id,'local');
            $price = mc_get_meta($val['page_id'],'price')*$count;
            mc_add_order($number,$user_id,$user_name,$address,$phone,$note,$pro_id,$send_time,$count,$store,$price,$status,$date,$pro);

            //订单推送
            $master_secret = '20767dbb32c03cdc8f56ead7';
            $app_key='172c53e98155d84188ed4ef4';
            $extras = array("number" => $number, "user" => $user_id,"store" => $store);
            $br = '<br/>';
            $client = new JPushClient($app_key, $master_secret);
            $order = mc_get_page_field($pro_id,title).'X'.$count.'送餐时间'.$send_time;  
            $result = $client->push()
                ->setPlatform(M\all)
                ->setAudience(M\all)
                //->setAudience(M\audience(M\tag(array('tag1','tag2'))))
                //->setAudience(M\audience(M\alias(array('guodong'))))
                //->setMessage(M\message('这个是推送消息', '这是标题', '', array('url'=>'www.msg.com'))) //设置内容，标题，以及附加值
                //->setNotification(M\notification('Hi, 测试成功啦   高正炎同学快下来吧'))
                ->setNotification(M\notification(null, M\android($order, $this->title, 1, $extras)))
                ->send();

        }
        M('action')->where("user_id='$user_id' AND action_key='cart'")->delete();

        
        $this->success('订单提交成功,您可以在个人中心查看饭盒状态哦',U('pro/index/index'));



    }
   
}
