<?php
echo '<div class="single_img">'; 
	$video = get_post_meta( get_the_ID(), 'post_video', true ); 
	echo trim( $video );
echo '</div>';
?>
