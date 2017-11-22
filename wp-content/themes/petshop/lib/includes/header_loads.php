<?php
/*-------------------------------------------------------------
juqery and css loads
------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'petshop_kaya_jquery_scripts');
if( !function_exists('petshop_kaya_jquery_scripts') ){
	function petshop_kaya_jquery_scripts()
	{
		global $petshop_kaya_post_item_id, $post, $is_IE;
		$enable_content_popup_box = get_theme_mod('enable_content_popup_box') ? get_theme_mod('enable_content_popup_box') : '0';
		if( class_exists('woocommerce') ){
            if( is_shop() ){
    			$select_page_options=get_post_meta( wc_get_page_id( 'shop' ),'select_page_options',true);
            }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
        }elseif( is_page()){
            $select_page_options=get_post_meta($post->ID,'select_page_options',true);
        }else{
            $select_page_options = '';
        }
		wp_enqueue_script("jquery");
	 	wp_enqueue_style('css_font_awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '3.0', 'all');
		wp_localize_script( 'jquery', 'wppath', array('template_path' => get_template_directory_uri('template_directory')));
		wp_enqueue_script( 'jquery_easing', get_template_directory_uri() .'/js/jquery.easing.1.3.js',array(),'', true);	 // Easing	
		wp_enqueue_style('css_prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css',false, '', 'all');
		wp_enqueue_script('jquery-jquery.smartmenus', get_template_directory_uri() .'/js/jquery.smartmenus.js',array(),'', true);
		wp_enqueue_style('css_sm-blue', get_template_directory_uri().'/css/sm-blue.css',false, '', 'all');
		wp_enqueue_style('css_sm-core-css', get_template_directory_uri().'/css/sm-core-css.css',false, '', 'all');
		wp_enqueue_script('jquery_prettyphoto', get_template_directory_uri() .'/js/jquery.prettyPhoto.js',array(),'', true); // for fancybox  script
		if ($is_IE){
			wp_enqueue_script('placeholder', get_template_directory_uri() .'/js/placeholder.js',array(),'', true);
		}
		if( $select_page_options == 'page_slider_setion'){
			wp_enqueue_script('jquery_owlcarousel', get_template_directory_uri() .'/js/owl.carousel.min.js',array(),'', true);
		}
		if( $select_page_options == 'video_bg'){
			wp_enqueue_script('mb.YTPlayer', get_template_directory_uri() .'/js/jquery.mb.YTPlayer.min.js',array(),'', true); // for ytp Player
		}
		wp_enqueue_script('jquery_owlcarousel', get_template_directory_uri() .'/js/owl.carousel.min.js',array(),'', true);
		if(is_single() || is_author() || is_category() || is_home() || is_archive() || is_page_template( 'templates/shortlist.php' )){
		    wp_enqueue_style('css_portfolio', get_template_directory_uri().'/css/portfolio.css',false, '', 'all');
		    wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
		}
		if(is_search()){
			wp_enqueue_style('css_portfolio', get_template_directory_uri().'/css/portfolio.css',false, '', 'all');
		}
		if( is_tax() ){
			wp_enqueue_style('css_portfolio', get_template_directory_uri().'/css/portfolio.css',false, '', 'all');
			wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
		}
		if( class_exists('woocommerce')){
			wp_enqueue_style('kaya_woocommerce', get_template_directory_uri().'/css/kaya_woocommerce.css',false, '', 'all');
			wp_enqueue_script('jquery.isotope', get_template_directory_uri() .'/js/jquery.isotope.min.js',array(),'', true);
			if(is_product()){
			    wp_enqueue_script( 'cloud-zoom', get_template_directory_uri() .'/js/cloud-zoom.1.0.2.min.js',array(),'', true);
			}
		}
		wp_enqueue_script('jquery-custom', get_template_directory_uri() .'/js/custom.js',array(),'', true);
		global $is_IE; // IE
	    if( $is_IE ) {
			wp_enqueue_script('jquery-html5', get_template_directory_uri() .'/js/html5.js',array(),'', true);
		}
		if( is_page_template( 'templates/coming-soon.php' )  ){
			wp_enqueue_script( 'countdown', get_template_directory_uri() .'/js/countdown.js',array(),'', true);
		}
		if( is_page_template( 'templates/shortlist.php' )  ){
			wp_enqueue_script( 'jquery-ui-datepicker');
		}
		wp_localize_script( 'jquery', 'kaya_ajax_url', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
		if( $enable_content_popup_box == '1' ){
			wp_enqueue_script('jquery.cookie', get_template_directory_uri() .'/js/jquery.cookie.js',array(),'', true); // for fancybox  script
		}	
	}
}
/*--------------------------------------------------------------
Styles
---------------------------------------------------------------*/
add_action('wp_enqueue_scripts', 'petshop_kaya_css_styles');
if( !function_exists('petshop_kaya_css_styles') ){
	function petshop_kaya_css_styles() {
		global $wp_styles;
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_style( 'petshop-style', get_stylesheet_uri() );
		wp_enqueue_style('sliders', get_template_directory_uri() . '/css/sliders.css',true, '1.0', 'all');
		wp_enqueue_style('css_slidemenu', get_template_directory_uri() . '/css/menu.css', true , '', 'all');
		wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css', true , '', 'all');
		wp_enqueue_style('blog_style', get_template_directory_uri() . '/css/blog_style.css', true , '', 'all');
		//wp_enqueue_style('rtl', get_template_directory_uri() . '/rtl.css', true , '', 'all');
		wp_enqueue_style('widgets', get_template_directory_uri() . '/css/widgets.css', true , '', 'all');
		wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css', true , '', 'all');
		$responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
		if($responsive_mode == "on"){
			wp_enqueue_style('css_responsive', get_template_directory_uri() . '/css/responsive.css', true, '', 'all');
		}
		wp_enqueue_style( 'petshop-ie', get_template_directory_uri() . '/css/ie9_down.css', array( 'petshop-style' ) );
		wp_script_add_data( 'petshop-ie', 'conditional', 'lt IE 8' );
	}
}
/*-----------------------------------------------------------------------
Customizer
-----------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_theme_customizer_js') ){
	function petshop_kaya_theme_customizer_js(){
		wp_enqueue_media();
		wp_enqueue_script('jquery_theme-customizer', get_template_directory_uri() .'/js/theme-customizer.js',array(),'', true);
		wp_enqueue_style('customizer_styles', get_template_directory_uri() . '/css/customizer_styles.css', false, '', 'all');
		wp_enqueue_script('customizer', get_template_directory_uri() .'/js/customizer.js',array(),'', true);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'petshop_kaya_theme_customizer_js',100 );
if( !function_exists('petshop_kaya_customize_preview_js') ){
	function petshop_kaya_customize_preview_js() {
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), '' , true );
	}
}
add_action( 'customize_preview_init', 'petshop_kaya_customize_preview_js' );
?>