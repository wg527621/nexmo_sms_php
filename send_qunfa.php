<?php


require "vendor/autoload.php";

$apiKey    = "xxx";
$apiSecret = "xxx";
$code_cn   = "86";

$to_str = "11111111,11111111"; //群发逗号分隔

$basic  = new \Nexmo\Client\Credentials\Basic($apiKey, $apiSecret);
$client = new \Nexmo\Client($basic);

$arrs = explode(',', $to_str);
//$arrs = explode('   ', $to_str);
if (is_array($arrs)) {
    foreach ($arrs as $to) {
        if ($to) {
            $message  = $client->message()->send([
                'to'   => $code_cn . $to,
                'from' => 'Nexmo',
//                'text' => '尊敬的用户您好',
                'text' => 'code 12345',
                'type' => 'unicode',
            ]);
            $response = $message->getResponseData();
            if ($response['messages'][0]['status'] == 0) {
                echo "发送成功{$to} \n";
            }
        }
    }
}


phpversion();
