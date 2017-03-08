<?php
$access_token = 'd6BNLniI9CyAQP0BTZCX2GCtP3lqxMvKKV7sU1lYx1Ed8Z34/AXlnTxKJc0xNSjphpKilolRBrv0i8qrBmtWVVAI1hB6g81g4SKDFjmla8Kx/8Tljw6cPhXsG9Bo+NBnGr75pT/87TLMgq5rJA4O1AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
