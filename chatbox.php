<?php
$start_settings = 'left:-500px;opacity:0;top: ' . $top . 'px;';

if ( ! $avatar ) {
	$start_settings = 'left:0;opacity:0;top: ' . $top . 'px;';
}//end if
?>
	<div
		class="chatbox"
		data-<?php echo $start; ?>="<?php echo $start_settings; ?>"
		data-<?php echo $end; ?>="left:0;opacity:1;"
	>
	<?php
	if ( $avatar ) {
		?>
		<img class="avatar" src="<?php echo $avatar; ?>" width="75" height="75"/>
		<?php
	}//end if
	?>
	<div class="body">
		<?php
		if ( $name ) {
			?>
			<header><span>&raquo;</span><?php echo $name; ?></header>
			<?php
		}//end if
		?>
		<p>
			<?php echo $message; ?>
		</p>
	</div>
</div>
