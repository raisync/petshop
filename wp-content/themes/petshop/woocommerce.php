<?php get_header();
if( class_exists('woocommerce') ):
	// Shop Page Sidebae Settings
	$woo_sidebar = get_theme_mod( 'shop_page_sidebar' ) ? get_theme_mod( 'shop_page_sidebar' ): 'three_fourth';
	$woo_sidebar_position = ( $woo_sidebar == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
	$sidebar_border_class=( $woo_sidebar == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar';
	// Product Single Page
	$woo_product_single_sidebar = get_theme_mod( 'shop_single_page_sidebar' ) ? get_theme_mod( 'shop_single_page_sidebar' ): 'three_fourth';
	$woo_single_sidebar_position = ( $woo_product_single_sidebar == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
	$sidebar_single_border_class=( $woo_product_single_sidebar == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar';
	// Product Single Page
	$woo_cat_product_sidebar = get_theme_mod( 'product_tag_page_sidebar' ) ? get_theme_mod( 'product_tag_page_sidebar' ): 'three_fourth'; 
	$woo_cat_product_sidebar_position = ( $woo_cat_product_sidebar == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
	$product_sidebar_border_class=( $woo_cat_product_sidebar == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar';
	if( is_shop() ){
		$sidebar_class = $woo_sidebar;
	}
	elseif( is_product_category() || is_product_tag()  ){
		$sidebar_class = $woo_cat_product_sidebar;
	}
	elseif( is_singular('product') ){
		$sidebar_class = $woo_product_single_sidebar;
	}else{

	} ?>
		<?php echo petshop_kaya_custom_pagetitle($post->ID); ?>
		<!--   Start Middle Section  -->  
		<div id="mid_container_wrapper" class="mid_container_wrapper_section">
			<div id="mid_container" class="container">
				<section class="<?php echo esc_attr( $sidebar_class ); ?>" id="content_section">
					<?php woocommerce_content(); ?>
				</section>
				<?php if( is_shop() ){
					if( $woo_sidebar != 'fullwidth' ) { ?>	
						<aside class="<?php echo esc_attr( $woo_sidebar_position ).'  '.esc_attr( $sidebar_border_class ); ?>"> <!--Start Sidebar Section -->
							<?php get_sidebar(); ?>
						</aside> <!--End Sidebar Section -->
				<?php }
				}elseif(is_product_category() || is_product_tag() ){
					if( $woo_cat_product_sidebar != 'fullwidth' ) { ?>	
						<aside class="<?php echo esc_attr( $woo_cat_product_sidebar_position ).'  '.esc_attr( $product_sidebar_border_class ); ?>"> <!--Start Sidebar Section -->
							<?php get_sidebar(); ?>
						</aside> <!--End Sidebar Section -->
				<?php }
				}elseif( is_singular('product') ) {
					if( $woo_product_single_sidebar != 'fullwidth' ) { ?>
						<aside class="<?php echo esc_attr( $woo_single_sidebar_position ).'  '.esc_attr( $sidebar_single_border_class ); ?>"> <!--Start Sidebar Section -->
							<?php get_sidebar(); 
						?>
					</aside> <!--End Sidebar Section -->
			<?php } }else{ }
endif; ?>
<?php get_footer(); ?>

	