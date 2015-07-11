<?php
namespace Admin2\Controller;
use Think\Controller;

class AndroidController extends Controller {
	public function xml_order() {
		if ($_GET['key']=='fanheo014789014789014789') {
					$date   = isset($_GET['date'])?$_GET['date'] : 'Y-m-d';
		        	$store  = isset($_GET['store'])?$_GET['store'] : 54;
		        	$status = isset($_GET['status'])?$_GET['status'] : 1;
		        	$date = strtotime(date($date));
					$end_date = $date+24*60*60;
					$condition['creat_time']  = array(array('egt',"$date"),array('elt', "$end_date"),'and');
					$condition['status'] = $status;
					$condition['store'] = $store;
					$data = M('order')->where($condition)->order('id desc')->select();

		//  属性数组
		$attribute_array = array(
		    'number' => array(
		    'number' => 1
		    )
		);
		 
		$xml = new \XMLWriter();
		$xml->openUri("php://output");
		//  输出方式，也可以设置为某个xml文件地址，直接输出成文件
		$xml->setIndentString('  ');
		$xml->setIndent(true);
		 
		//$xml->startDocument('1.0', 'utf-8');
		//  开始创建文件
		//  根结点
		$xml->startElement('info');
		 
		foreach ($data as $data) {
			
		    $xml->startElement('order');
		 
		    if (is_array($data)) {
		        foreach ($data as $key => $row) {

		          $xml->startElement($key);
		 
		          if (isset($attribute_array[$key]) && is_array($attribute_array[$key]))
		          {
		              foreach ($attribute_array[$key] as $akey => $aval) {
		              //  设置属性值
		                    $xml->writeAttribute($akey, $aval);
		                }
		 
		            }
		 			//$row->pro_id = '000';
		            $xml->text($row);   //  设置内容
		            $xml->endElement(); // $key
		        }
		 
		    }
		    $xml->endElement(); //  item
		}
		 
		$xml->endElement(); //  article
		$xml->endDocument();
		 
		$xml->flush();
		}else{
			$data = array('result' => 'fail no key', );
            $this->ajaxReturn($data);
		}
	}



	public function app_order(){
		if ($_POST['number']&&$_POST['store']&&$_POST['key']=='fanheo014789014789014789') {
	    	$condition['number'] = $_POST['number'];
	    	$condition['store'] = $_POST['store'];
	    	$page['status'] = '2';
	    	M('order')->where($condition)->save($page);
	    	$data = array('result' => 'success', );
            $this->ajaxReturn($data);
	    	
    	}else{
    		$data = array('result' => 'fail', );
			header('HTTP/1.1 404 Not Found');
			header("status: 404");
    	}
	}

	


}
