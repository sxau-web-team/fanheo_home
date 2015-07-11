<?php 
require_once '/vendor/vendor/autoload.php';

use JPush\Model as M;
use JPush\JPushClient;
use JPush\Exception\APIConnectionException;
use JPush\Exception\APIRequestException;

$master_secret = '20767dbb32c03cdc8f56ead7';
$app_key='172c53e98155d84188ed4ef4';

$br = '<br/>';
$client = new JPushClient($app_key, $master_secret);

$result = $client->push()
    ->setPlatform(M\all)
    ->setAudience(M\all)
    ->setNotification(M\notification('Hi, 饭盒网官方客服妹子02郭栋发了一条消息，消息称饭盒网官方客服妹子01王金亮已失踪，据当事人称已失联28小时。over。'))
    ->send();
echo 'Push Success.' . $br;
echo 'sendno : ' . $result->sendno . $br;
echo 'msg_id : ' .$result->msg_id . $br;
echo 'Response JSON : ' . $result->json . $br;
?>