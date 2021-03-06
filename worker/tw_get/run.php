#!/bin/env php
<?php
require __DIR__.'/phpdaemon.php';
require_once '/var/www/vendor/autoload.php';

use Curl\Curl;

function handler($pno) {
	for (;;) {
		try{
			$curl = new Curl;
			$curl->setHeader('Client-ID' , 'gvrfkc0vh0y1rmtcg5txlqx2ago25y');
			
			$going = true;
			$offset = 0;
			$output = [];
			
			while($going){
				$curl->get('https://api.twitch.tv/kraken/streams?language=zh-tw&limit=100&offset='.$offset.'&stream_type=live');
				
				if ($curl->error) {
	    			//When Error happend
	    		} else {
	    			//insert new token into mysql database.
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
			}
			file_put_contents('../tw_streams.json',json_encode($output));
			echo "[".date('Y-m-d H:i:s')."] {#".$pno."}: Get Live Streams:".count($output)."\n";
		}catch(\Exception $ex){
			echo "[".date('Y-m-d H:i:s')."] {#".$pno."}: ".$ex->getMessage()."\n";
		}
		sleep(60);
	}
}

$obj = new PHPDaemon();
$obj->setProcessNum(1);
$obj->setHandler("handler");
$obj->run();