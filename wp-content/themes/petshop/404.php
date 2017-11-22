<?php get_header();
	$error_page_button_name = get_theme_mod('error_page_button_name') ?  get_theme_mod('error_page_button_name') : esc_html__('GO TO HOME PAGE', 'petshop');
	//$disable_error_page_pattern = get_theme_mod('disable_error_page_pattern') ? get_theme_mod('disable_error_page_pattern') : '0'; ?>
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="container">
	        <!-- End Page Titles -->
	        <?php $error_page_description = get_theme_mod('error_page_description') ? get_theme_mod('error_page_description') : esc_html__('the link you clicked might be currupted, or the page may have removed', 'petshop');
	        $error_page_title = get_theme_mod('error_page_title') ? get_theme_mod('error_page_title') : esc_html__('Sorry, this page does not exist', 'petshop');  ?>
			<div class="error_404_page_wrapper">
				<?php //if( $disable_error_page_pattern != '1' ){ ?>
					<div class="slider_overlay"> </div>
				<?php //} ?>
				<div class="error_page_bg_image"> </div>
				<div class="error_404_content">
					<div class="error_404_page">
						<h3>404</h3>
					</div>
					<h4 class="title_style2"><?php echo esc_attr($error_page_title); ?>	</h4>
					<a class="readmore_button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr($error_page_button_name); ?></a>
				</div>
			</div>
    <!-- Footer  -->
<?php get_footer(); ?>