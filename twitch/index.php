<?php
$json = file_get_contents('/var/www/worker/tw_streams.json');
$lols = json_decode($json,true);
$data = $lols[array_rand($lols,1)];
$data['username'] = str_replace('https://www.twitch.tv/','',$data['url']);

$msg = "你想看「".$data['display_name']."」";
if( !empty($data['game']) ){
	$msg .= "玩「".$data['game']."」";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="twitter:card" value="summary"> 
	<meta property="og:title" content="<?=$msg?>" />
	<meta property="og:type" content="video" />
	<meta content='text/html' property='og:video:type'>
	<meta property="og:url" content="http://twitch.twmian.com/" />
	
	<meta property="og:description" content="來試看看你想看誰的實況吧，把網址貼在臉書的留言上。"/>
	
	<meta property="og:video" content="http://player.twitch.tv/?channel=<?=$data['username']?>" />
	<meta property="og:video:secure_url" content="https://player.twitch.tv/?channel=<?=$data['username']?>" />
	
	<meta content="620" property="og:width" />
	<meta content="378" property="og:height" />
	
	<meta property="og:image" content="<?=$data['logo']?>" />
	<meta property="og:image:url" content="<?=$data['logo']?>" />
	<title>你想看誰的Twitch實況？</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/c55cfc3bb6.js"></script>
	<style>
		body {
		  padding-top: 50px;
		}
		.starter-template {
		  padding: 40px 15px;
		  text-align: center;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#4b367c;">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="https://twitch.twmian.com/">你想看誰的Twitch實況？</a>
        </div>
      </div>
    </nav>

    <div class="container">
    	<div class="starter-template">
    		<div class="jumbotron">
    			<div class="row">
    				<div class="col-md-8 col-md-offset-2">
    					
    				</div>
    			</div>
				<h2>你想看誰的Twitch實況？</h2>
				<p>來試看看你內心想看誰的實況吧，把網址貼在臉書的留言上。</p>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="input-group input-group-lg">
							<input id="copyurl" type="text" class="form-control" value="https://twitch.twmian.com/" readonly>
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" data-clipboard-target="#copyurl">複製網址</button>
							</span>
						</div><!-- /input-group -->
					</div>
				</div>
			</div>
    	</div>
    <!--	<div class="row">-->
    <!--		<div class="col-md-4 col-md-offset-4">-->
    <!--			<div class="panel panel-default">-->
				<!--	<div class="panel-body" style="text-align:center;">-->
				<!--		<p>Developr - 大麵 bignoodletw</p>-->
				<!--		<a href="https://www.facebook.com/mian.da.737" class="btn btn-default"><i class="fa fa-facebook" aria-hidden="true"></i></a>-->
				<!--		<a href="https://www.twitch.tv/bignoodletw" class="btn btn-default"><i class="fa fa-twitch" aria-hidden="true"></i></a>-->
				<!--	</div>-->
				<!--</div>-->
    <!--		</div>-->
    <!--	</div>-->
    	
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.1/clipboard.min.js"></script>
  	<script>
  		$(document).ready(function(){
  			new Clipboard('.btn');	
  		});
  	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49352039-6', 'auto');
  ga('send', 'pageview');
</script>
  </body>
</HTML>