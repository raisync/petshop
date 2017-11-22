<?php 
global $post_item_id, $post;
  echo  kaya_post_item_id();
	$Kaya_post_slider_transitions=get_post_meta($post_item_id,'Kaya_post_slider_transitions',true) ? get_post_meta(get_the_ID(),'Kaya_post_slider_transitions',true) : '4000';
	$Kaya_post_slider_transitions_time=get_post_meta($post_item_id,'Kaya_post_slider_transitions_time',true) ? get_post_meta(get_the_ID(),'Kaya_post_slider_transitions_time',true) : '4000';
	$Kaya_post_slider_auto_play=get_post_meta(get_the_ID(),'Kaya_post_slider_auto_play',true) ? get_post_meta(get_the_ID(),'Kaya_slider_transitions_time',true) : '0';
	$slide_transition_speed = ( $Kaya_post_slider_auto_play !='0') ? $Kaya_post_slider_transitions_time :$Kaya_post_slider_auto_play; 
 	$post_slide_button_color=get_post_meta($post_item_id,'post_slide_button_color',true) ? get_post_meta($post_item_id,'post_slide_button_color',true) : '#ffffff';
 	$post_slide_button_disable=get_post_meta($post_item_id,'post_slide_button_disable',true) ? get_post_meta($post_item_id,'post_slide_button_disable',true) : 'true';
 	$post_slide_nav_disable=get_post_meta($post_item_id,'post_slide_nav_disable',true) ? get_post_meta($post_item_id,'post_slide_nav_disable',true) : 'true';
 	$category=get_post_meta($post_item_id,'kaya_post_category',false);
 	$post_slide_images_order=get_post_meta($post_item_id,'post_slide_images_order',true) ? get_post_meta($post_item_id,'post_slide_images_order',true) :'';
 	$post_slide_images_order_by=get_post_meta($post_item_id,'post_slide_images_order_by',true) ? get_post_meta($post_item_id,'post_slide_images_order_by',true) :'';
 	$kaya_slider_height=get_post_meta($post_item_id,'kaya_slider_height',true);
 	$slide_text_animate=get_post_meta($post->ID,'slide_text_animate',true) ? get_post_meta($post->ID,'slide_text_animate',true) : 'fadeInUp';
 	$enable_boxed_slider_type=get_post_meta($post->ID,'enable_boxed_slider',true) ? get_post_meta($post->ID,'enable_boxed_slider',true) : '0';
 	$enable_fluid_slider = get_post_meta($post_item_id,'enable_fluid_slider',true) ? get_post_meta($post_item_id,'enable_fluid_slider',true) : '0';
 	if($enable_fluid_slider =='0'){
 		$slider_fluid_class='container';
 	}else{
 		$slider_fluid_class='';
 	}
 	$post_slide_loop=get_post_meta($post->ID,'post_slide_loop',true) ? get_post_meta($post->ID,'post_slide_loop',true) : 'false';
 	$height = 'height:'.$kaya_slider_height.'px!important';
   ?>
   <script>
  (function($) {
    $(function() {
    	"use strict";
 		var owl_slider = $('.slides-container').owlCarousel({
 		nav : <?php echo $post_slide_button_disable; ?>,
 		navText : ['<i class="fa fa-caret-left" aria-hidden="true"></i>','<i class="fa fa-caret-right" aria-hidden="true"></i>'],	
 		items : 1,
 		dots: <?php echo $post_slide_nav_disable; ?>,
 		autoplay:<?php echo $Kaya_post_slider_auto_play; ?>,
 		navClass: [ 'prev', 'next' ],
 		navElement: 'a',
		navContainerClass: 'slides-navigation',
    	loop : <?php echo $post_slide_loop; ?>,
    	onInitialized: function() {
    		$('#loading_image').hide();
    		window.setTimeout(function(){$(".owl-item .slides_description").addClass('<?php echo $slide_text_animate; ?> animated images_test');}, 0); 		
        },
 	});
	owl_slider.on('change.owl.carousel', function(event) {
		event.preventDefault();
 	 	$(this).find('.owl-item .slides_description').removeClass('<?php echo $slide_text_animate; ?> animated');
  	});
 	 owl_slider.on('changed.owl.carousel', function(event) {
 	 	event.preventDefault();
	    window.setTimeout(function(){$(".owl-item .slides_description").addClass('<?php echo $slide_text_animate; ?> animated images_test');}, 0);
 	 });
  });
  })(jQuery);
  </script>
<div id="main_slider_slides" class="<?php echo $slider_fluid_class; ?>" style="<?php echo $height; ?>" >	
<div id="loading_image"><img src="<?php echo get_template_directory_uri(); ?>/images/lightbox-ico-loading.gif" alt="" /></div>
<div class="slides-container">
<?php
	if(empty($category)) {
				$loop = new WP_Query(array('post_type' => 'slider', 'taxonomy' => 'slider_category','term' => '', 'orderby' => $post_slide_images_order_by, 'posts_per_page' =>-1,'order' => $post_slide_images_order));
			}else{ 
				$loop =new WP_Query(array('post_type' => 'slider', 'orderby' => $post_slide_images_order_by, 'posts_per_page' =>-1,'order' => $post_slide_images_order, 'tax_query' => array( array( 'taxonomy' => 'slider_category', 'field' => 'slug', 'terms' => $category , 'operator' => 'IN'))));
			}
	$i=1;		
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
	$slide_rand = rand(1,100);
 	$post_slide_images=rwmb_meta( 'post_slide_image', 'type=image&size=full' );
 	 ?> 	 
	<div>
	<?php
	global $post; 
	$slide_title_desc_align=get_post_meta(get_the_ID(),'slide_title_desc_align',true) ? get_post_meta(get_the_ID(),'slide_title_desc_align',true) : 'center';
	$slider_image_description=get_post_meta(get_the_ID(),'slider_image_description',true) ? get_post_meta(get_the_ID(),'slider_image_description',true) : '';
	$params = array('width' => '1920', 'height' => '', 'crop' => true);
	foreach ( $post_slide_images as $image ){ 	
	 		$upload_post_slide_image =$image['url'];
			}
		$img_url = wp_get_attachment_url( get_post_thumbnail_id() ); //get img URL
		if( !empty($upload_post_slide_image) ){
			echo '<div class="slider_bg_img" style="background:url('.$upload_post_slide_image.'); background-size: cover;"></div>';
		}
		else{
			 echo '<img src="'.get_template_directory_uri().'/images/main_slider.jpg" style="width:100%; '.$height.'">';
		}
		echo '<div class="slides_description slides_description_'.$slide_rand.'" style="text-align:'.$slide_title_desc_align.';">';  ?>
					<?php echo $slider_image_description; ?>
	<?php echo '</div>';	?>	
	</div>
	
<?php $i++; endwhile;	
	else:
		echo '<div>';
			echo '<img src="http://placehold.it/1920x650">';
		echo '</div>';
	endif; ?>
	</div>
	</div>
<?php wp_reset_query(); ?>