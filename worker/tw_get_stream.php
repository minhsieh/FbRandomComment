<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
require_once '/var/www/vendor/autoload.php';

use Curl\Curl;

$curl = new Curl;
$curl->setHeader('Client-ID' , 'gvrfkc0vh0y1rmtcg5txlqx2ago25y');

$going = true;
$offset = 0;
$output = [];

while($going){
	$curl->get('https://api.twitch.tv/kraken/streams?language=zh-tw&limit=100&offset='.$offset.'&stream_type=live');

	$result = $curl->response['streams'];
	
	foreach($result as $one){
		$output[] = [
			'display_name' => 	$one['channel']['display_name'],
			'logo' => $one['channel']['logo'],
			'title' => $one['channel']['status'],
			'game' => $one['game'],
			'url' => $one['channel']['url']
		];
	}
	
	if( ($offset + 100) > $curl->response['_total'] ){
		$going = false;
	}else{
		$offset = $offset + 100;
	}
}

file_put_contents('tw_streams.json',json_encode($output));

