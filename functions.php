<?php
function prep_chatter( $start, $chatter ) {
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
				$top += 15;
				$start = $end + 550;
			} else {
				$top += 10;
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

	return $massaged_chatter;
}//end prep_chatter

function out_chatter( $original_start, $chatter, $id ) {
	ob_start();

	foreach ( $chatter as $chat ) {
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
		id="<?php echo $id; ?>"
		data-<?php echo $original_start; ?>="left:0;top:0%;opacity:1;width:100%;height:<?php echo $final_height; ?>px;"
		data-<?php echo $original_start + 3000; ?>="top:0%;"
		<?php
		for ( $i = $original_start + 3050, $j = 1; $i < $final_height + 3000; $i += 5, $j++ ) {
			?>
			data-<?php echo $i; ?>="top:-<?php echo $j; ?>px;"
			<?php
		}//end for
		?>
		data-<?php echo $final_height+3500; ?>="top:-<?php echo $final_height;?>px;"
	>
		<?php echo $chatboxes; ?>
	</div>
	<?php

	return $final_height;
}//end out_chatter
