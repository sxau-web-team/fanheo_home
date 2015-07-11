<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
       <link href="<?php echo mc_theme_url(); ?>/media2/css/bootstrap.css" rel="stylesheet">

    <title>发票打印</title>
</head>
<body>
<?php foreach($page as $val) : ?>
<div id="div2">
<p>
    <br/>
</p>
<p>
    <span style="font-size: 36px;"><strong>&nbsp; fanheo.com</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 饭盒网 服务热线：0359-12332221 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  <img style="width: 234px; height: 53px;" alt="demo.jpg" src="<?php echo mc_site_url(); ?>/code/code.php?text=<?php echo $val['number'];?>" title="" height="53" width="234"/>
</p>
<table data-sort="sortDisabled" class="table-bordered">
    <tbody>
        <tr class="firstRow">
            <td class="selectTdClass" dir="ltr" style="word-break: break-all;" height="25" valign="top" width="147">
                <span style="border: medium none; font-size: 16px;">&nbsp; 收货人姓名<br/></span>
            </td>
            <td class="selectTdClass" rowspan="1" colspan="1" height="25" valign="top" width="315"><?php echo $val['user_name'];?></td>
            <td class="selectTdClass" colspan="2" style="word-break: break-all;" height="25" valign="top" width="95">
                <span style="border: medium none; font-size: 16px;">&nbsp;联系电话<br/></span>
            </td>
            <td class="selectTdClass" height="25" valign="top" width="199"><?php echo $val['phone'];?></td>
        </tr>
        <tr>
            <td class="selectTdClass" style="word-break: break-all;" height="26" valign="top" width="147">
                <span style="border: medium none; font-size: 16px;">&nbsp; 送餐时间</span>
            </td>
            <td class="selectTdClass" style="word-break: break-all;" rowspan="1" colspan="1" height="26" valign="top" width="315"><?php echo $val['send_time'];?></td>
            <td class="selectTdClass" colspan="2" style="word-break: break-all;" height="26" valign="top" width="95">
                <span style="border: medium none; font-size: 16px;">&nbsp;店铺</span>
            </td>
            <td class="selectTdClass" style="word-break: break-all;" height="26" valign="top" width="199"><?php echo mc_get_page_field(mc_get_meta($val['pro_id'],'local'),title); ?></td>
        </tr>
        <tr>
            <td class="selectTdClass" style="word-break: break-all;" rowspan="1" colspan="1" height="33" valign="top" width="147">
                <p>
                    <span style="border: medium none; font-size: 16px;">&nbsp; 详细地址</span>
                </p><br/>
            </td>
            <td class="selectTdClass" rowspan="1" colspan="1" height="33" valign="top" width="315"><?php echo $val['address'];?></td>
            <td class="selectTdClass" style="word-break: break-all;" rowspan="1" colspan="2" height="33" valign="top" width="95">
            <span style="border: medium none; font-size: 16px;">&nbsp; 金额</span>
            </td>
            <td class="selectTdClass" rowspan="1" colspan="1" height="33" valign="top" width="199">
            <span style="border: medium none; font-size: 24px;">&nbsp;<?php echo $val['price'];?> 元</span></td>
        </tr>
        <tr>
            <td class="selectTdClass" colspan="3" height="160" valign="top" width="147">
            	<p>
            	<br/>
            	&nbsp;&nbsp;&nbsp;&nbsp;<span style="border: medium none; font-size: 24px;"><?php echo mc_get_page_field($val['pro_id'],title); ?> x <?php echo $val['count'];?></span>
            	</p>
            </td>
            <td class="selectTdClass" style="word-break: break-all;" height="160" valign="top" width="95">
                <p>
                    <span style="border: medium none; font-size: 16px;"><br/></span>
                </p>
                <p>
                    <span style="border: medium none; font-size: 16px;"><br/></span>
                </p>
                
                <p>
                    <span style="border: medium none; font-size: 16px;">&nbsp;买家备注</span>
                </p>
                <p>
                    <br/>
                </p>
            </td>
            <td class="selectTdClass" dir="ltr" height="160" valign="top" width="199">
            <br/><br/>&nbsp;&nbsp;<?php echo $val['note'];?></td>
        </tr>
    </tbody>
</table>
<p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
</p>
<p>
    &nbsp;&nbsp;&nbsp;&nbsp;日期： &nbsp;<?php echo $val['creat_time'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 客户签字： &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br/>
</p>
			   </div>
<?php endforeach; ?>			   
<a href="javascript:printme()" target="_self">打印</a>
<script language="javascript">
function printme()
{
document.body.innerHTML=document.getElementById('div2').innerHTML;
window.print();
}
</script>
</body>
