#!/bin/env php
<?php
require __DIR__.'/phpdaemon.php';
require_once __DIR__.'/irc.php';
require_once __DIR__.'/parser.php';
require_once '/var/www/vendor/autoload.php';

function handler($pno) {
	$parser = new parser();
	
	$channel = '#bignoodletw';
	$msg = date('Y-m-d H:i:s');
	
	$irc = new irc();
	$irc->setServer('irc.twitch.tv');
	$irc->setPort(6667);
	$irc->connect();
	$irc->sendData('PASS ' . 'oauth:lgi6hpddfizq0o5g2o3ak9ajnd3qml');
	$irc->sendData('USER ' . 'mianbot mianbot mianbot :mianbot');
	$irc->sendData('NICK ' . 'mianbot');
	$checking = true;
	do{
	    $data = $irc->getData();
	    
	    if (stripos($data, 'Welcome') !== false){
	        $irc->sendData('PRIVMSG NICKSERV :IDENTIFY oauth:lgi6hpddfizq0o5g2o3ak9ajnd3qml');
	        $irc->sendData('JOIN '.$channel);
	        $checking = false;
	    }
	}
	while($checking == true);
	$irc->sendData('PRIVMSG '.$channel.' :'.$msg);
	
	do{
        // Get the irc response
        $data = $irc->getData();
        echo $data;
    }
    while($irc->isConnected());
}

$obj = new PHPDaemon();
$obj->setProcessNum(1);
$obj->setHandler("handler");
$obj->run();