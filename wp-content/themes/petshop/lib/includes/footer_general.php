<?php 
$select_footer_type = get_theme_mod('select_footer_type') ? get_theme_mod('select_footer_type') : 'page_type_footer';
if( $select_footer_type == 'page_type_footer' ){
	$footer_page_id = get_theme_mod('footer_page_id') ? get_theme_mod('footer_page_id') : 'select-page';
	if( $footer_page_id != 'select-page' ){
		echo '<div class="page_content_footer">';
		echo '<div class="container">';
			$post = get_page($footer_page_id); 
			$content = apply_filters('the_content', $post->post_content); 
			echo $content;
		echo '</div></div>';
	}
}
?>
<footer class="main_content_wrapper">
	<?php if( $select_footer_type == 'widget_type_footer' ){ // Widget Footer
			//$footer_disable = get_theme_mod('main_footer_disable') ? get_theme_mod('main_footer_disable') : '0'; 
			if( $footer_disable != '1' ){	?>
				<div class="footer_wrapper"> <!-- Start Footer section -->
					<div class="footer_widgets container">
						<?php  get_template_part('lib/includes/bottom_footer_section'); ?>
					</div>
				</div>
			<?php }
			}// End ?>
			<?php $select_most_footer_style=get_theme_mod('select_most_footer_style') ? get_theme_mod('select_most_footer_style') : 'left_content_right_menu'; ?> 
				<div id="most_footer_bottom" class="">
					<div  class="container">
						<?php
							if( $select_most_footer_style == 'left_content_right_menu' ){
								$left_class = 'one_half footer_left_content';
								$right_class = 'one_half_last footer_right_content';								
							}elseif( $select_most_footer_style == 'left_menu_right_content' ){
								$left_class = 'one_half_last footer_right_content';
								$right_class = 'one_half footer_left_content';	
							}elseif( $select_most_footer_style == 'left_content_right_content' ){
								$left_class = 'one_half footer_left_content';
								$right_class = 'one_half_last footer_right_content';	
							}elseif( $select_most_footer_style == 'center_content_center_menu' ){
								$left_class = 'fullwidth';
								$right_class = 'fullwidth';
							}else{
								$left_class = '';
								$right_class = '';
							}
						// Change Footer styles
						if( $select_most_footer_style != 'none' ){	
							echo '<div class="'.$left_class.'">'; // Left Content
								echo '<span class="">';
									echo get_theme_mod('most_footer_left_section') ? do_shortcode( get_theme_mod('most_footer_left_section') ) :__('Copy rights &copy; kayapati.com ', 'petshop');
								echo '</span>';
							echo '</div>';
							// Right Menu
							echo '<div class="'.$right_class.'">';
								if( $select_most_footer_style == 'left_content_right_content' ){
									echo '<span class="footer_right">'.get_theme_mod('most_footer_right_section') ? do_shortcode( get_theme_mod('most_footer_right_section') )  :__('Footer Right Section','petshop') .'</span>';
								}else{
									if( has_nav_menu( 'footer' ) ){
										wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'menu_class' => '') );
									}
								}
							echo '</div>';
						} ?>						
					</div>
				</div>
				<!-- end Footer bottom section  -->
</footer>			
						