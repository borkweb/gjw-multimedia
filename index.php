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
		<h1><a href="https://github.com/Prinzhorn/skrollr">skrollr</a></h1>
		<h2>parallax scrolling for the masses</h2>
		<p>let's get scrollin' ;-)</p>
		<p class="arrows">▼&nbsp;▼&nbsp;▼</p>
	</div>

	<?php
	include __DIR__ . '/messages.php';

	$start = 550;
	$top = 0;
	$first = TRUE;

	$massaged_chatter = array();

	foreach ( $chatter as $chat ) {
		if ( is_numeric( $chat ) ) {
			$start += $chat;
			continue;
		}//end if

		$avatar = empty( $chat['avatar'] ) ? NULL : $chat['avatar'];
		$name = empty( $chat['name'] ) ? NULL : $chat['name'];
		$height = empty( $chat['height'] ) ? 1 : $chat['height'];
		$message = $chat['message'];

		if ( $first ) {
			$first = FALSE;
		} else {
			if ( $avatar ) {
				$top += 25;
				$start = $end + 550;
			} else {
				$top += 15;
				$start = $end + 150;
			}//end else
		}//end else

		$end = $start + 100;

		$massaged_chatter[] = array(
			'avatar' => $avatar,
			'name' => $name,
			'height' => $height,
			'message' => $message,
			'top' => $top,
			'start' => $start,
			'end' => $end,
		);

		// prepare for the next message
		if ( $height - 1 ) {
			if ( $avatar ) {
				$top += 80;
			} else {
				$top += 48;
			}//end else
		} else {
			if ( $avatar ) {
				$top += 81;
			} else {
				$top += 47;
			}//end else
		}//end else

		$top += ( $height - 1 ) * 24;
	}//end foreach

	ob_start();

	foreach ( $massaged_chatter as $chat ) {
		$avatar = $chat['avatar'];
		$name = $chat['name'];
		$message = $chat['message'];
		$height = $chat['height'];
		$start = $chat['start'];
		$end = $chat['end'];
		$top = $chat['top'];

		include __DIR__ . '/chatbox.php';
	}//end foreach

	$chatboxes = ob_get_clean();
	$final_height = $end;
	?>
	<div
		id="chat-container"
		data-550="left:0;top:0%;opacity:1;width:100%;height:<?php echo $final_height; ?>px;"
		data-3550="top:0%;"
		<?php
		for ( $i = 3560, $j = 1; $i < $final_height + 3000; $i += 5, $j++ ) {
			?>
			data-<?php echo $i; ?>="top:-<?php echo $j; ?>px;"
			<?php
		}//end for
		?>
		data-<?php echo $final_height+10000; ?>="top:-<?php echo $final_height;?>px;"
	>
		<?php echo $chatboxes; ?>
	</div>

	<div id="scrollbar" data-0="top:0%;margin-top:2px;" data-end="top:100%;margin-top:-52px;"></div>

	<script src="js/skrollr/dist/skrollr.min.js"></script>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="js/skrollr/dist/skrollr.ie.min.js"></script>
	<![endif]-->
	<script src="js/behavior.js"></script>
</body>

</html>
