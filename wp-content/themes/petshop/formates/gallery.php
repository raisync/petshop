<script type="text/javascript">
(function($) {
  "use strict";
	$(function() {	
		$(window).load(function(){
		$('.image_slider').owlCarousel({
			nav:false,
		    loop : true,
		    navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		    autoPlay : true,
		    stopOnHover : true,
		    items :1,
			onInitialized: function() {
    			$('.image_slider').show();
    		},
		});
	});
});
})(jQuery);
</script>	
	<?php echo '<div class="blog_single_img ">'; 
		$meta = get_post_meta($post->ID, 'post_gallery', false );
		if ( !is_array( $meta ) )
			$meta = ( array ) $meta;
			if ( !empty( $meta ) ) {
				if(count($meta) > 1 ){
					echo '<div class="post_image image_slider clearfix ">';
						foreach ( $meta as $att ) {
							if( is_single() ){
								$img_width = '1250';
							}else{
								$img_width = '800';
							}
							$src = wp_get_attachment_image_src( $att, '' );
							$src = $src[0];
							echo "<div>"; ?>
								<?php //$params = array('width' => $img_width, 'height' => '650', 'crop' => true); ?>
								<a data-gal="prettyPhoto[gallery]" href='<?php echo esc_url( $src ); ?>' title="<?php echo the_title(); ?>">
								<img src='<?php echo petshop_kaya_img_resize($src, $img_width, 650, "t"); ?>' />
								</a>
							<?php echo '</div>';
						}
					echo '</div>';
			} else{
				foreach ( $meta as $att ) {
					$src = wp_get_attachment_image_src( $att, '' );
					$src = $src[0]; ?>
					<a data-gal="prettyPhoto[gallery]" href='<?php echo esc_url( $src ); ?>'  title="<?php echo the_title(); ?>">
						<img src='<?php echo petshop_kaya_img_resize($src,$img_width, 650, "t"); ?>' />
					<?php echo "</a>";
				}			
			} 
		} ?>
	</div>
