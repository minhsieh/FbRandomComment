<?php
$json = file_get_contents('pokemons.json');
$lols = json_decode($json,true);
$data = $lols[array_rand($lols,1)];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<meta name="twitter:card" value="summary"> 
	<meta property="og:title" content="你是「<?=$data['name']?> <?=$data['name_en']?>」" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://poke.twmian.com/" />
	<meta property="og:image" content="http://poke.twmian.com/images/<?=$data['file_name']?>" />
	<meta property="og:description" content="在臉書留言貼上網址，看看你是哪隻神奇寶貝"/>
	<title>你是哪隻神奇寶貝？？</title>
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
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#B71C1C;">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="https://poke.twmian.com/" style="color:#ffffff;">你是哪隻神奇寶貝？</a>
        </div>
      </div>
    </nav>

    <div class="container">
    	<div class="starter-template">
    		<div class="jumbotron">
    			<div class="row">
    				<div class="col-md-8 col-md-offset-2">
    					<img src="images/logo.png" style="width:100%;">
    				</div>
    			</div>
				<h2>看看你是哪隻神奇寶貝？</h2>
				<p>在臉書的留言貼上網址，看看你是哪隻神奇寶貝</p>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="input-group input-group-lg">
							<input id="copyurl" type="text" class="form-control" value="https://poke.twmian.com/" readonly>
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" data-clipboard-target="#copyurl">複製網址</button>
							</span>
						</div><!-- /input-group -->
					</div>
				</div>
			</div>
    	</div>
    	<div class="row">
    		<div class="col-md-4 col-md-offset-4">
    			<div class="panel panel-default">
					<div class="panel-body" style="text-align:center;">
						<p>Developr - 大麵bignoodletw</p>
						<a href="https://www.facebook.com/mian.da.737" class="btn btn-default"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="https://www.twitch.tv/bignoodletw" class="btn btn-default"><i class="fa fa-twitch" aria-hidden="true"></i></a>
					</div>
				</div>
    		</div>
    	</div>
    	
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

  ga('create', 'UA-49352039-7', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</HTML>