<?php
	global $post_item_id, $post;
		echo  kaya_post_item_id();
	$page_middle_content = get_post_meta($post_item_id,'page_middle_content',true) ? get_post_meta($post_item_id,'page_middle_content',true) : '0';
	$page_footer_container = get_post_meta($post_item_id,'page_footer_container',true) ? get_post_meta($post_item_id,'page_footer_container',true) : '0';
	if( $page_footer_container == '0' ){ ?>
		</div> <!-- end middle content section -->
		</div> <!-- end middle Container wrapper section -->
	<?php } 
	if( $page_footer_container == '0' ){ ?>
		<div class="clear"> </div>	
		<!-- end middle section -->
		<?php  get_template_part('lib/includes/footer_general'); // General Footer ?>
		<div class="clear"></div>
	<?php } ?>
	<a href="#" class="scroll_top "><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
		<!--  Google Analytic  -->
	<?php  
	$google_tracking_code= get_theme_mod('google_tracking_code') ? get_theme_mod('google_tracking_code') : '';
		if (!empty( $google_tracking_code ) ) { ?>
			<?php echo trim($google_tracking_code); ?>
		<?php 					
		} else { ?>
	<?php } ?>
	<!--  end Google Analytics  -->
</section> <!-- Main Layout Section End -->
	<?php wp_footer(); ?>
</body>
</html>