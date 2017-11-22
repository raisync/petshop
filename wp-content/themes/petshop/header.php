<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php $responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
	if($responsive_mode == "on"){ ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>"> 
	<?php endif; ?>	
	<?php  wp_head();  ?>
</head>
<body <?php body_class(); ?> >
	<?php 
	$disable_site_loader = get_theme_mod('disable_site_loader') ? get_theme_mod('disable_site_loader') : '0';
	$disable_header_sticky = ( get_option( 'disable_header_sticky' )  != '1' ) ? 'non_sticky' : 'sticky';
	$enable_content_popup_box = get_theme_mod('enable_content_popup_box') ? get_theme_mod('enable_content_popup_box') : '0';
	$top_header_left_section = get_theme_mod('top_header_left_section') ? get_theme_mod('top_header_left_section') : '<div><i class="fa fa-phone"></i><span><p>(+961) 1235 666 |</p>
</div><div><i class="fa fa-envelope"></i><span><p>kayapati@gmail.com</p></span></div>';
	$top_header_right_section = get_theme_mod('top_header_right_section') ? get_theme_mod('top_header_right_section') : '<span><i class="fa fa-truck" aria-hidden="true"></i> Free shipping all over the world</span>';
	$disable_woo_login = get_theme_mod('disable_woo_login') ? get_theme_mod('disable_woo_login') : '0';
	// Window Alert Box  
	if( $enable_content_popup_box == '1' ){ // Content popup Box Hide/Show
		petshop_kaya_popup_box();
	} 
	if( $disable_site_loader == '1' ){ // Site Loader ?>
		<div id="loader"> <div id="status"> </div>	</div>
	<?php } ?>
<section id="fullwidth_layout"><!-- Main Layout Section Start -->
	<?php global $woocommerce; ?>
	<div class="header_container_wrapper">	
			<?php	echo '<div class="header_top_section container">';
			echo '<div class="header_top_left_section">'; 
			echo $top_header_left_section; ?> 
					<?php	echo '</div>';
					
					echo '<div class="header_top_right_section">';
					echo '<div class="right_content">';
					echo $top_header_right_section; 
					echo '</div>';

					echo '<div class="social_icons">';
					$url = get_template_directory_uri();
					$header_right_social_icons = get_theme_mod('header_right_social_icons') ? get_theme_mod('header_right_social_icons') :'<a href="#"><i class="fa fa-facebook"> </i></a>
					<a href="#"><i class="fa fa-youtube"> </i></a>
					<a href="#"><i class="fa fa-twitter"> </i></a>
					<a href="#"><i class="fa fa-rss"> </i></a>'; 
					echo header_right_social_icons(); 
					echo '</div>';
					
					echo '</div>';
			echo '</div>';
			echo '<div class="header_section">'; // Logo Section
			echo '<div class="container">';
			echo '<div class="header_left_section">'; // Logo Section
			echo petshop_kaya_logo_image();
			echo '</div>';
			echo '<div class="header_right_section">'; //Header right section 
			
			if (class_exists('woocommerce')) { 
			if( $disable_woo_login == '0'){ ?>
				<div class="woo_login"><i class="fa fa-user"></i>
						 <?php global $woocommerce; ?>
					<!-- User Details Login / Registration -->
					<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','petshop'); ?>"><?php _e('My Account','petshop'); ?></a> | <a href="<?php echo wp_logout_url( home_url() ) ?>" title="Logout"><?php _e('Logout','petshop'); ?></a>
					<?php }
					else { ?>
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Registration','petshop'); ?>"><?php _e('Login / Registration','petshop'); ?></a>
					<?php } ?>
				</div>
				<?php } ?>
				

				<div class="shopping_cart"><a class="" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','petshop' ); ?>"><?php echo sprintf (_n( '%d ITEM', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
				</div>
				<?php } ?>
				<?php 
				echo '</div></div></div>'; 
				  ?>
	<?php echo '<div class="header_menu_wrapper">';
			echo '<div class="header_main_menu '.$disable_header_sticky.'">';
			echo '<div class="container">';
			mobile_menu_icons();
				echo '<nav class="header_menu_section" >';
	 				petshop_kaya_page_menu_section();
				echo '</nav>';
	?>
<div class="main_search_wrapper">
		<div class="search_box_icon"><i class="fa fa-search"> </i></div>
		<div class="search_box_wrapper">
			<?php petshop_woo_product_search(); ?>
		</div>
		</div>
		<?php
			echo '</div>';
		echo '</div>';
		echo '</div>';  
		echo petshop_kaya_subheader_section();	 ?>

	</div>				