<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>GJW Multimedia - Andrelious, Baxir, and Kookimarissia</title>

	<link href="fixed-positioning.css" rel="stylesheet" type="text/css" />
	<link href="main.css" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
	<div id="bg1" data-0="background-position:0px 0px;" data-end="background-position:-500px -10000px;"></div>
	<div id="bg2" data-0="background-position:0px 0px;" data-end="background-position:-500px -8000px;"></div>
	<div id="bg3" data-0="background-position:0px 0px;" data-end="background-position:-500px -6000px;"></div>

	<div id="progress" data-0="width:0%;background:rgba(55, 55, 55, .3);" data-end="width:100%;background:rgba( 55, 55, 55, 1);"></div>

	<div id="intro" data-0="opacity:1;top:3%;" data-500="opacity:0;top:-20%;">
		<h1>Battle communique</h1>
		<h2>A multimedia submission</h2>
		<h3>by Andrelious, Baxir, and Kookimarissia</h3>
		<hr>
		<p>Scroll!</p>
		<p class="arrows">▼&nbsp;▼&nbsp;▼</p>
	</div>

	<?php
	include __DIR__ . '/functions.php';
	include __DIR__ . '/messages.php';

	$start = 550;

	$chatter = prep_chatter( $start, $chatter );
	$final_height = out_chatter( $start, $chatter, 'chat-container-1' );
	$bg_change = $final_height + 2500;

	?>
	<div id="bg4" data-0="opacity:0;" data-<?php echo $bg_change-1000; ?>="opacity:0;" data-<?php echo $bg_change; ?>="opacity:1;background-position:0px 0px;" data-end="background-position:0px 0px;"></div>
	<div id="battle" data-<?php echo $final_height; ?>="opacity:0;bottom:3%;" data-<?php echo $final_height + 300; ?>="opacity:0;bottom:40%;" data-<?php echo $final_height + 1800; ?>="opacity:1;" data-<?php echo $final_height + 2500; ?>="opacity:0;">
		<p>*Some time later*</p>
	</div>

	<?php
	$start = $final_height + 2500;

	include __DIR__ . '/messages-battle.php';
	$chatter = prep_chatter( $start, $chatter );
	$final_height = out_chatter( $start, $chatter, 'chat-container-2' );
	?>

	<div id="scrollbar" data-0="top:0%;margin-top:2px;" data-end="top:100%;margin-top:-52px;"></div>

	<script src="js/skrollr/dist/skrollr.min.js"></script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="js/skrollr/dist/skrollr.ie.min.js"></script>
	<![endif]-->
	<script src="js/waypoints.min.js"></script>
	<script src="js/behavior.js"></script>

	<audio id="fates" controls="controls" style="display: none;" preload="auto">
		<source src="sound/fates.mp3" />
	</audio>
</body>

</html>
