<?php global $post;
	$video_bg_id=get_post_meta($post->ID,'video_bg_id',true);
	$video_bg_height=get_post_meta($post->ID,'video_bg_height',true);
	$video_bg_description=get_post_meta($post->ID,'video_bg_description',true);
	$select_video_bg_type = get_post_meta($post->ID,'select_video_bg_type',true);
	$video_bg_webm = get_post_meta($post->ID,'video_bg_webm',true);
	$video_bg_mp4 = get_post_meta($post->ID,'video_bg_mp4',true);
	$video_bg_ogg = get_post_meta($post->ID,'video_bg_ogg',true);
	$bg_video_opcaity = get_post_meta($post->ID,'bg_video_opcaity',true) ? get_post_meta($post->ID,'bg_video_opcaity',true) :'1';
	$video_bg_color = get_post_meta($post->ID,'video_bg_color',true) ? get_post_meta($post->ID,'video_bg_color',true) : '#000000';
	$enable_video_screen_height = get_post_meta($post->ID,'enable_video_screen_height',true);
	$video_height = 'height:'.$video_bg_height.'px';
	$enable_fluid_slider = get_post_meta($post->ID,'enable_fluid_slider',true) ? get_post_meta($post->ID,'enable_fluid_slider',true) : '0';
 	if($enable_fluid_slider =='0'){
 		$slider_fluid_class='container';
 	}else{
 		$slider_fluid_class='';
 	}
	 ?>
		<script type="text/javascript">
			(function($) {
			"use strict";
			$(function() {
			 $(".player").mb_YTPlayer();
			});
			})(jQuery);
		</script>
		<style>
			#mbYTP_video_bg_wrapper{
				opacity:<?php echo $bg_video_opcaity; ?>!important;
			}
		</style>
		<?php  
		$default_img = get_template_directory_uri().'/images/video_bg_img.jpg';
			$fullscreen_video_img = get_post_meta($post->ID,'fullscreen_video_img',true) ? get_post_meta($post->ID,'fullscreen_video_img',true) :'';
			$videosrc = wp_get_attachment_image_src( $fullscreen_video_img, '' );
			$videosrc = $videosrc[0] ? $videosrc[0]  : $default_img; 
			?>
 <div class="video_background <?php echo $slider_fluid_class; ?>"  style="<?php echo $video_height; ?>; background-image:url('<?php echo $videosrc; ?>');" >
 <?php if($select_video_bg_type == 'youtube_video'){ ?>
	<a id="video_bg_wrapper" class="player" data-property="{videoURL:'<?php echo trim($video_bg_id); ?>',containment:'.video_background', showControls:true, autoPlay:true, loop:true, vol:50, startAt:10, opacity:1, addRaster:false, quality:'default'}">
	</a>
	<?php }
	elseif($select_video_bg_type == 'video_webm'){ ?>
		<video id="main_video_wrapper"  preload="auto" poster="" preload="auto" width="auto" height="auto" autoplay="" loop=""  style="visibility: visible; width:1950px; opacity:<?php echo $bg_video_opcaity ?>;"> 
			<?php if(!empty($video_bg_webm)){ ?><source src="<?php echo trim($video_bg_webm); ?>" type="video/webm" /> <?php } ?>
			<?php if(!empty($video_bg_mp4)){ ?><source src="<?php echo trim($video_bg_mp4); ?>" type="video/mp4" />  <?php } ?>
			<?php if(!empty($video_bg_ogg)){ ?><source src="<?php echo trim($video_bg_ogg); ?>" type="video/ogg" /> <?php } ?>
		</video>
	<?php }else{
		//echo 'Add Your Video here';
	} ?>	
	<div class="video_description"> 
	<?php echo $video_bg_description; ?>
	</div>
</div>
