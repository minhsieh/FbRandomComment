#!/bin/env php
<?php
require __DIR__.'/phpdaemon.php';
require_once '/var/www/vendor/autoload.php';

function handler($pno) {
	for (;;) {
		try{
			$fb = new Facebook\Facebook ([
				'app_id' => '421467198208637',
				'app_secret' => '1a12bd9cfd2ed33b060737a7544b876d',
				'default_graph_version' => 'v2.9'
			]);
			
			$url = 'http://twitch.twmian.com';
			
			$accessToken = file_get_contents('../.token');
			$fb->setDefaultAccessToken ( $accessToken );
			
			$request = $fb->request ( 'POST', '?scrape=true&id='.$url );
			$response = $fb->getClient ()->sendRequest ( $request );
			$object = $response->getGraphObject ();
			$result = $object->asArray ();
			echo "[".date('Y-m-d H:i:s')."] {#".$pno."}(".$url."): ".$result['title']."\n";
		}catch(\Exception $ex){
			echo "[".date('Y-m-d H:i:s')."] {#".$pno."}: ".$ex->getMessage()."\n";
		}
		sleep(5);
	}
}

$obj = new PHPDaemon();
$obj->setProcessNum(1);
$obj->setHandler("handler");
$obj->run();