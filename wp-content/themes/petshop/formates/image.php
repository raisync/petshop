<?php
$img_url = wp_get_attachment_url(get_post_thumbnail_id());
if( !empty($img_url) ){
	echo '<div class="post_image">';
		echo '<a href="'.get_the_permalink().'">';
		  echo '<img src="'.petshop_kaya_img_resize($img_url, 1250, 650, 't').'" class="" alt="'.get_the_title().'" />';  
		echo '</a>';
	echo '</div>';
}
?>