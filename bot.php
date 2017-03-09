<?php
$access_token = 'd6BNLniI9CyAQP0BTZCX2GCtP3lqxMvKKV7sU1lYx1Ed8Z34/AXlnTxKJc0xNSjphpKilolRBrv0i8qrBmtWVVAI1hB6g81g4SKDFjmla8Kx/8Tljw6cPhXsG9Bo+NBnGr75pT/87TLMgq5rJA4O1AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			if($text == 'เปิดไฟ1'){
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text."แล้ว คุณข้าวโอ๊ต"	
			];
			echo "OK1";
			
			$url1 = 'http://blynk-cloud.com/880cdfcd44334a9d863471fd62d8c71b/update/'; 
  
  			$data1 = 'V0?value=1';
			// 1. initialize
			$ch = curl_init();
 
			// 2. set the options, including the url
			curl_setopt($ch, CURLOPT_URL, $url1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $data1 );
    			curl_setopt( $ch, CURLOPT_POST, true );
    			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    			$content = curl_exec( $ch );
    			curl_close($ch);
    			print_r($content);
			}
			
			
			else if($text == 'เปิดไฟ2'){
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text."แล้ว คุณข้าวโอ๊ต"
			];
			echo "OK2";
			}
			
			else {
				$replyToken = $event['replyToken'];
				
				$messages = [
				'type' => 'text',
				'text' => $text." คำสั่งไม่ถูกต้อง คุณข้าวโอ๊ต"
			];
			}

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
