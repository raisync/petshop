<?php
/* These are functions specific to the included option settings and this theme */
/*-----------------------------------------------------------------------------------*/
/* Theme Header Output - wp_head() */
/*-----------------------------------------------------------------------------------*/

/* Add Body Classes for Layout

/*-----------------------------------------------------------------------------------*/
// This used to be done through an additional stylesheet call, but it seemed like
// a lot of extra files for something so simple. Adds a body class to indicate sidebar position.
add_filter('body_class','petshop_kaya_body_class');
if( !function_exists('petshop_kaya_body_class') ){
    function petshop_kaya_body_class($classes) {
    	$shortname =  get_option('kaya_shortname');
    	$layout = get_option($shortname .'_layout');
    	if ($layout == '') {
    		$layout = 'layout-2cr';
    	}
    	$classes[] = $layout;
    	return $classes;
    }
}
/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_favicon') ){
    function petshop_kaya_favicon() {
      $favicon = get_option('favicon');
      $favi_img_ul = $favicon['favi_img'];
        if ( !empty( $favi_img_ul) ) {
    		echo '<link rel="shortcut icon" href="'.  esc_url($favi_img_ul)  .'"/>'."\n";
      }
    }
}    
add_action('wp_head', 'petshop_kaya_favicon');
/*-----------------------------------------------------------------------------------*/
/* Custom CSS
/*-----------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_custom_css') ){
    function petshop_kaya_custom_css() {
    $kaya_custom_css = get_theme_mod('kaya_custom_css') ? get_theme_mod('kaya_custom_css') : '';
    $custom_styles = str_replace('&nbsp;', '', $kaya_custom_css);
    if(trim( !empty( $custom_styles) ))
        {
          echo '<style>';
			echo wp_kses_data( $kaya_custom_css );
          echo '</style>';
        }
    }
}
add_action('wp_head', 'petshop_kaya_custom_css');
/*-----------------------------------------------------------------------------------*/
/* Custom JS
/*-----------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_custom_js') ){
    function petshop_kaya_custom_js() {
        $kaya_custom_js = get_theme_mod('kaya_custom_jquery') ? get_theme_mod('kaya_custom_jquery') : '';
        if(trim( $kaya_custom_js ))
        {
          echo '<script>';
			echo wp_kses_data( $kaya_custom_js );
          echo '</script>';
        }
    }
}
add_action('wp_head', 'petshop_kaya_custom_js');
/* -----------------------------------------------------------------------------------------
 Theme Style Color customization 
------------------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_custom_colors') ){
    function petshop_kaya_custom_colors(){
    	global $petshop_kaya_post_item_id, $post;
    	echo  petshop_kaya_post_item_id();
        $url = get_template_directory_uri().'/images/';
       // Layout Options
        $body_background_color = get_theme_mod( 'body_background_color' ) ? get_theme_mod( 'body_background_color' ) : '#f4f4f4';
        $boxed_layout_position = get_theme_mod( 'boxed_layout_position' ) ? get_theme_mod( 'boxed_layout_position' ) : 'center';
        $select_body_background_type = get_theme_mod( 'select_body_background_type' ) ? get_theme_mod( 'select_body_background_type' ) : 'bg_type_color';
        $boxed_layout_shadow = get_theme_mod( 'boxed_layout_shadow' ) ? get_theme_mod( 'boxed_layout_shadow' ) : '0';
        $responsive_layout_mode = get_option( 'responsive_layout_mode' );
        $layout_frame_border_color = get_theme_mod( 'layout_frame_border_color' ) ? get_theme_mod( 'layout_frame_border_color' ) : '#FFFFFF';
        $frame_border_text_color = get_theme_mod( 'frame_border_text_color' ) ? get_theme_mod( 'frame_border_text_color' ) : '#ffffff';
        $frame_border_link_color = get_theme_mod( 'frame_border_link_color' ) ? get_theme_mod( 'frame_border_link_color' ) : '#ffffff';
        $frame_border_link_hover_color = get_theme_mod( 'frame_border_link_hover_color' ) ? get_theme_mod( 'frame_border_link_hover_color' ) : '#f49c41';
        //Right Icons colors
         $frame_right_icons_bg_color = get_theme_mod( 'frame_right_icons_bg_color' ) ? get_theme_mod( 'frame_right_icons_bg_color' ) : '#333';
         $frame_right_icons_color = get_theme_mod( 'frame_right_icons_color' ) ? get_theme_mod( 'frame_right_icons_color' ) : '#ffffff';
         $frame_right_icons_hover_bg_color = get_theme_mod( 'frame_right_icons_hover_bg_color' ) ? get_theme_mod( 'frame_right_icons_hover_bg_color' ) : '#f49c41';
         $frame_right_icons_hover_color = get_theme_mod( 'frame_right_icons_hover_color' ) ? get_theme_mod( 'frame_right_icons_hover_color' ) : '#ffffff';   
        // Header Left & Login right information
        $header_left_right_text_color = get_theme_mod( 'header_left_right_text_color' ) ? get_theme_mod( 'header_left_right_text_color' ) : '#686868';
        $header_left_right_link_color = get_theme_mod( 'header_left_right_link_color' ) ? get_theme_mod( 'header_left_right_link_color' ) : '#686868';
        $header_left_right_link_hover_color = get_theme_mod( 'header_left_right_link_hover_color' ) ? get_theme_mod( 'header_left_right_link_hover_color' ) : '#f49c41';
        //Socai Media ICons Color
        $top_header_text_color = get_theme_mod('top_header_text_color') ? get_theme_mod('top_header_text_color') : '#B5B5B5';
        $top_header_text_hover_color = get_theme_mod('top_header_text_hover_color') ? get_theme_mod('top_header_text_hover_color') : '#B5B5B5';
        $social_icons_color = get_theme_mod('social_icons_color') ? get_theme_mod('social_icons_color') : '#B5B5B5';
        $social_icons_hover_color = get_theme_mod('social_icons_hover_color') ? get_theme_mod('social_icons_hover_color') : '#B5B5B5';
        // Header Section
        $select_header_background_type = get_theme_mod('select_header_background_type') ? get_theme_mod('select_header_background_type') : 'bg_type_color';
         $upload_header = get_theme_mod('upload_header');  
        $header_bg_img_repeat = get_theme_mod('header_bg_img_repeat') ? get_theme_mod('header_bg_img_repeat') : 'repeat';

        $header_background_color = get_theme_mod('header_background_color') ? get_theme_mod('header_background_color') : '#006b95';
        $header_border_bottom_color = get_theme_mod('header_border_bottom_color') ? get_theme_mod('header_border_bottom_color') : '';
        /* Header right section color settings */
       
        //Page title bar color settings
        $page_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
        $page_titlebar_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
        $title_description_color = get_theme_mod('title_description_color') ? get_theme_mod('title_description_color') : '#333333';
        $bread_crumb_text_color = get_theme_mod( 'bread_crumb_text_color' ) ? get_theme_mod( 'bread_crumb_text_color' ) : '#8b8b8b';
        $bread_crumb_link_color = get_theme_mod( 'bread_crumb_link_color' ) ? get_theme_mod( 'bread_crumb_link_color' ) : '#8b8b8b';
        $bread_crumb_hover_link_color = get_theme_mod( 'bread_crumb_hover_link_color' ) ? get_theme_mod( 'bread_crumb_hover_link_color' ) : '#f49c41';
        $page_title_pattern = get_theme_mod('page_title_pattern');
        $select_page_title_background_type = get_theme_mod('select_page_title_background_type') ? get_theme_mod('select_page_title_background_type') : 'bg_type_image';
        $page_title_bar = get_theme_mod('page_title');
        $page_title_bg_color = get_theme_mod('page_title_bg_color') ? get_theme_mod('page_title_bg_color') : '';
        $page_title_bar_bg_repeat = get_theme_mod('page_title_bar_bg_repeat') ? get_theme_mod('page_title_bar_bg_repeat') : 'repeat' ;
        $page_title_bar_padding = get_theme_mod('page_title_bar_padding') ? get_theme_mod('page_title_bar_padding') : '80';
        $page_title_font_size = get_theme_mod('page_title_font_size') ? get_theme_mod('page_title_font_size') : '36';
        $page_title_font_weight = get_theme_mod('page_title_font_weight') ? get_theme_mod('page_title_font_weight') : 'normal';
        $page_title_font_style = get_theme_mod('page_title_font_style') ? get_theme_mod('page_title_font_style') : 'normal';
    	$title_left_right_border=get_post_meta($petshop_kaya_post_item_id,'title_left_right_border',true) ? get_post_meta($petshop_kaya_post_item_id,'title_left_right_border',true) :'off';
        $border_bottom = ($title_left_right_border == 'on') ? '' :'padding-bottom:0; margin-bottom:0;';
        $page_description_font_weight = get_theme_mod('page_description_font_weight') ? get_theme_mod('page_description_font_weight') : 'normal';
        $page_description_font_style = get_theme_mod('page_description_font_style') ? get_theme_mod('page_description_font_style') : 'normal';
        $page_title_border_color = get_theme_mod('page_title_border_color') ? get_theme_mod('page_title_border_color') : '#151515';
        $page_title_font_letter_space = get_theme_mod('page_title_font_letter_space') ? get_theme_mod('page_title_font_letter_space') : '0';
        $page_title_position = get_theme_mod('page_title_position') ? get_theme_mod('page_title_position') : 'center';
    	// Page title Font & Alignment Section
        $title_font_weight = get_post_meta($petshop_kaya_post_item_id,'title_font_weight',true);
        $title_font_style = get_post_meta($petshop_kaya_post_item_id,'title_font_style',true);
        $description_font_weight = get_post_meta($petshop_kaya_post_item_id,'description_font_weight',true);
        $description_font_style = get_post_meta($petshop_kaya_post_item_id,'description_font_style',true);
        $paget_title_position=get_post_meta($petshop_kaya_post_item_id,'paget_title_position',true) ? get_post_meta($petshop_kaya_post_item_id,'paget_title_position',true) :'center';
        // Page title position	
        // Menu  Section
        $left_menu_button_color = get_theme_mod('left_menu_button_color') ? get_theme_mod('left_menu_button_color') : '#686868';
        $select_menu_background_type = get_theme_mod('select_menu_background_type') ? get_theme_mod('select_menu_background_type') : 'bg_type_color' ;
        $menu_bar_bg_color = get_theme_mod('menu_bar_bg_color') ? get_theme_mod('menu_bar_bg_color') : '#363636';
        $menu_link_bg_color = get_theme_mod('menu_link_bg_color') ? get_theme_mod('menu_link_bg_color') : '';
        $menu_link_bg_hover_color = get_theme_mod('menu_link_bg_hover_color') ? get_theme_mod('menu_link_bg_hover_color') : '#f49c41';
        $upload_menu = get_theme_mod('upload_menu'); 
        $menu_links = get_theme_mod('menu_links'); 
        
        $menu_links_border_top = get_theme_mod('menu_links_border_top') ? get_theme_mod('menu_links_border_top') : '#000' ;
        $menu_links_border_bottom = get_theme_mod('menu_links_border_bottom') ? get_theme_mod('menu_links_border_bottom') : '#262626' ;

        $menu_bg_img_repeat = get_theme_mod('menu_bg_img_repeat') ? get_theme_mod('menu_bg_img_repeat') : 'repeat';
        $menu_padding_top_bottom =get_theme_mod( 'menu_padding_top_bottom') ? get_theme_mod( 'menu_padding_top_bottom') : '5';
        $menubg_repeat = get_theme_mod('menubg_repeat') ? get_theme_mod('menubg_repeat') : 'repeat' ;
        $menu_bg_active_color = get_theme_mod('menu_link_active_bg_color') ? get_theme_mod('menu_link_active_bg_color') : '' ;
        $menu_link_active_color = get_theme_mod('menu_link_active_color') ? get_theme_mod('menu_link_active_color') : '#fbd1d1' ;
        $menu_background_color = get_theme_mod('menu_background_color') ? get_theme_mod('menu_background_color') : '' ;
        $menu_link_color = get_theme_mod('menu_link_color') ? get_theme_mod('menu_link_color') : '#ffffff' ;
        $search_box_bg_color = get_theme_mod('search_box_bg_color') ? get_theme_mod('search_box_bg_color') : '#f49c41';
        $search_box_icon_color = get_theme_mod('search_box_icon_color') ? get_theme_mod('search_box_icon_color') : '#ffffff';
        $menu_link_hover_text_color = get_theme_mod('menu_link_hover_text_color') ? get_theme_mod('menu_link_hover_text_color') : '#f49c41';
        $menu_link_hover_bg_color = get_theme_mod('menu_link_hover_bg_color') ? get_theme_mod('menu_link_hover_bg_color') : '';
        $sub_menu_link_color = get_theme_mod('sub_menu_link_color') ? get_theme_mod('sub_menu_link_color') : '#ffffff';
        $sub_menu_link_hover_color = get_theme_mod('sub_menu_link_hover_color') ? get_theme_mod('sub_menu_link_hover_color') : '#ffffff';
        $sub_menu_links_bg_color = get_theme_mod('sub_menu_links_bg_color') ? get_theme_mod('sub_menu_links_bg_color') : '#f49c41';
        $sub_menu_links_hover_bg_color = get_theme_mod('sub_menu_links_hover_bg_color') ? get_theme_mod('sub_menu_links_hover_bg_color') : '#ff0000';
        $sub_menu_links_active_bg_color  = get_theme_mod('sub_menu_links_active_bg_color') ? get_theme_mod('sub_menu_links_active_bg_color') : '#ff0000';
        $sub_menu_link_active_color = get_theme_mod('sub_menu_link_active_color') ? get_theme_mod('sub_menu_link_active_color') : '#ffffff';
        $sub_menu_bottom_border_color = get_theme_mod('sub_menu_bottom_border_color') ? get_theme_mod('sub_menu_bottom_border_color') : '#ff4e4e' ;
        $child_menu_uppercase = get_theme_mod('child_menu_uppercase') ? get_theme_mod('child_menu_uppercase') : '0';
        $main_menu_uppercase = get_theme_mod('main_menu_uppercase') ? get_theme_mod('main_menu_uppercase') : '0';
        $childmenu_uppercase = ( $child_menu_uppercase == '1' ) ? 'uppercase':'normal';
        $mainmenu_uppercase = ( $main_menu_uppercase == '1' ) ? 'uppercase':'normal';
        //Page Middle Content color settings
        $page_content_bg = get_theme_mod('page_content_bg');
        $select_page_mid_background_type = get_theme_mod('select_page_mid_background_type') ? get_theme_mod('select_page_mid_background_type') : 'bg_type_color' ;
        $page_content_bg_repeat = get_theme_mod('page_content_bg_repeat') ? get_theme_mod('page_content_bg_repeat') : 'repeat' ;
        $page_bg_color = get_theme_mod('page_bg_color') ? get_theme_mod('page_bg_color') : '';
        $page_titles_color = get_theme_mod('page_titles_color') ? get_theme_mod('page_titles_color') : '#333333';
        $page_description_color = get_theme_mod('page_description_color') ? get_theme_mod('page_description_color') : '#757575';
        $page_link_color = get_theme_mod('page_link_color') ? get_theme_mod('page_link_color') : '#333333';
        $page_link_hover_color = get_theme_mod('page_link_hover_color') ? get_theme_mod('page_link_hover_color') : '#ff0000 ';
        //Sidebar color settings
        $sidebar_bg_color =  get_theme_mod('sidebar_bg_color') ? get_theme_mod('sidebar_bg_color') : '#FFFFFF';
        $sidebar_border_color =  get_theme_mod('sidebar_border_color') ? get_theme_mod('sidebar_border_color') : '#e4e4e4';
        $sidebar_title_color =  get_theme_mod('sidebar_title_color') ? get_theme_mod('sidebar_title_color') : '#ffffff';
        $sidebar_title_border_color =  get_theme_mod('sidebar_title_border_color') ? get_theme_mod('sidebar_title_border_color') : '#b9b9b9';
        $sidebar_title_bg_color = get_theme_mod('sidebar_title_bg_color') ? get_theme_mod('sidebar_title_bg_color') : '#c38749';
        $sidebar_desc_color =  get_theme_mod('sidebar_desc_color') ? get_theme_mod('sidebar_desc_color') : '#757575';
        $sidebar_link_color =  get_theme_mod('sidebar_link_color') ? get_theme_mod('sidebar_link_color') : '#333333';
        $sidebar_link_hover_color = get_theme_mod('sidebar_link_hover_color') ? get_theme_mod('sidebar_link_hover_color') : '#f49c41';
        $sidebar_list_border_color = get_theme_mod('sidebar_list_border_color') ? get_theme_mod('sidebar_list_border_color') : '#e4e4e4';
        $sidebar_tags_link_color =  get_theme_mod('sidebar_tags_link_color') ? get_theme_mod('sidebar_tags_link_color') : '#ffffff';
        $sidebar_tags_bg_color = get_theme_mod('sidebar_tags_bg_color') ? get_theme_mod('sidebar_tags_bg_color') : '#333';
        $sidebar_tags_border_color = get_theme_mod('sidebar_tags_border_color') ? get_theme_mod('sidebar_tags_border_color') : '#f49c41';

        $sidebar_tags_hover_link_color =  get_theme_mod('sidebar_tags_hover_link_color') ? get_theme_mod('sidebar_tags_hover_link_color') : '#ffffff';
        $sidebar_tags_hover_bg_color = get_theme_mod('sidebar_tags_hover_bg_color') ? get_theme_mod('sidebar_tags_hover_bg_color') : '#f49c41';
        $sidebar_tags_hover_border_color = get_theme_mod('sidebar_tags_hover_border_color') ? get_theme_mod('sidebar_tags_hover_border_color') : '#333333';
         /* Footer Section */
    //$footer_bg_repeat =  get_theme_mod('footer_bg_repeat') ? get_theme_mod('footer_bg_repeat') : 'repeat';
    $select_footer_background_type =  get_theme_mod('select_footer_background_type') ? get_theme_mod('select_footer_background_type') : 'bg_type_color';
    $footer_bg =  get_theme_mod('footer_bg') ? get_theme_mod('footer_bg') : '';
    //$main_footer_bg_color =  get_theme_mod('main_footer_bg_color') ? get_theme_mod('main_footer_bg_color') : '#111111';
    $main_footer_title_color =  get_theme_mod('main_footer_title_color') ? get_theme_mod('main_footer_title_color') : '#ffffff';
    $main_footer_title_border_color =  get_theme_mod('main_footer_title_border_color') ? get_theme_mod('main_footer_title_border_color') : '#404040';
    //$main_footer_text_color =  get_theme_mod('main_footer_text_color') ? get_theme_mod('main_footer_text_color') : '#757575';
    //$main_footer_link_color =  get_theme_mod('main_footer_link_color') ? get_theme_mod('main_footer_link_color') : '#ffffff';
    //$main_footer_link_hover_color = get_theme_mod('main_footer_link_hover_color') ? get_theme_mod('main_footer_link_hover_color') : '#ffffff';
    $footer_border =  get_theme_mod('footer_border');
    // Most Footer
    $select_most_footer_style=get_theme_mod('select_most_footer_style') ? get_theme_mod('select_most_footer_style') : 'left_content_right_menu';
    $most_footer_bg_color = get_theme_mod('most_footer_bg_color') ? get_theme_mod('most_footer_bg_color') : '#171717';
    $most_footer_text_color = get_theme_mod('most_footer_text_color') ? get_theme_mod('most_footer_text_color') : '#787878';
    $most_footer_link_color = get_theme_mod('most_footer_link_color') ? get_theme_mod('most_footer_link_color') : '#ffffff';
    $most_footer_link_hover_color = get_theme_mod('most_footer_link_hover_color') ? get_theme_mod('most_footer_link_hover_color') : '#ffffff';
        /* Blog Page */
        $blog_page_date_bg_color = get_theme_mod('blog_page_date_bg_color') ? get_theme_mod('blog_page_date_bg_color') : '#f49c41';
        $blog_page_date_color = get_theme_mod('blog_page_date_color') ? get_theme_mod('blog_page_date_color') : '#ffffff';
        $blog_page_title_color = get_theme_mod('blog_page_title_color') ? get_theme_mod('blog_page_title_color') : '#333333';
        $blog_page_title_hover_color = get_theme_mod('blog_page_title_hover_color') ? get_theme_mod('blog_page_title_hover_color') : '#f49c41';
        $blog_page_img_border_color = get_theme_mod('blog_page_img_border_color') ? get_theme_mod('blog_page_img_border_color') : '#ffffff';
        $blog_desc_color = get_theme_mod('blog_desc_color') ? get_theme_mod('blog_desc_color') : '#787878';
        $blog_meta_info_t_b_border_color = get_theme_mod('blog_meta_info_t_b_border_color') ? get_theme_mod('blog_meta_info_t_b_border_color') : '#cccccc';
        $blog_link_color = get_theme_mod('blog_link_color') ? get_theme_mod('blog_link_color') : '#333333';
        $blog_link_hover_color = get_theme_mod('blog_link_hover_color') ? get_theme_mod('blog_link_hover_color') : '#f49c41';
        $blog_button_bg_color = get_theme_mod('blog_button_bg_color') ? get_theme_mod('blog_button_bg_color') : '#f49c41';
        $blog_button_color = get_theme_mod('blog_button_color') ? get_theme_mod('blog_button_color') : '#ffffff';
        $blog_button_hover_bg_color = get_theme_mod('blog_button_hover_bg_color') ? get_theme_mod('blog_button_hover_bg_color') : '#f49c41';
        $blog_button_hover_color = get_theme_mod('blog_button_hover_color') ? get_theme_mod('blog_button_hover_color') : '#ffffff';
        $blog_button_letter_space = get_theme_mod('blog_button_letter_space') ? get_theme_mod('blog_button_letter_space') : '0';
        $blog_button_button_font_weight = get_theme_mod('blog_button_button_font_weight') ? get_theme_mod('blog_button_button_font_weight') : 'normal';
        $blog_button_button_font_style = get_theme_mod('blog_button_button_font_style') ? get_theme_mod('blog_button_button_font_style') : 'normal';
        //Single Page
        $blog_quote_section = get_theme_mod('blog_quote_section') ? get_theme_mod('blog_quote_section') : '23';
        $blog_quote_font_letter_space = get_theme_mod('blog_quote_font_letter_space') ? get_theme_mod('blog_quote_font_letter_space') : '0';
        $blog_quote_font_style = get_theme_mod('blog_quote_font_style') ? get_theme_mod('blog_quote_font_style') : 'normal';
        $blog_quote_font_weight = get_theme_mod('blog_quote_font_weight') ? get_theme_mod('blog_quote_font_weight') : 'normal';
        $blog_quote_author_font_size = get_theme_mod('blog_quote_author_font_size') ? get_theme_mod('blog_quote_author_font_size') : '18';
        $blog_quote_author_font_letter_space = get_theme_mod('blog_quote_author_font_letter_space') ? get_theme_mod('blog_quote_author_font_letter_space') : '0';
        $blog_quote_author_font_style = get_theme_mod('blog_quote_author_font_style') ? get_theme_mod('blog_quote_author_font_style') : 'normal';
        $blog_quote_author_font_weight = get_theme_mod('blog_quote_author_font_weight') ? get_theme_mod('blog_quote_author_font_weight') : 'normal';
        $blog_single_page_title_color = get_theme_mod('blog_single_page_title_color') ? get_theme_mod('blog_single_page_title_color') : '#333333';
        //$blog_single_page_title_border_color = get_theme_mod('blog_single_page_title_border_color') ? get_theme_mod('blog_single_page_title_border_color') : '#333';
        $blog_single_page_desc_color = get_theme_mod('blog_single_page_desc_color') ? get_theme_mod('blog_single_page_desc_color') : '#757575';
        $blog_single_page_link_color = get_theme_mod('blog_single_page_link_color') ? get_theme_mod('blog_single_page_link_color') : '#333333';
        $blog_single_page_link_hover_color = get_theme_mod('blog_single_page_link_hover_color') ? get_theme_mod('blog_single_page_link_hover_color') : '#f49c41';
       
        $blog_gallery_slider_buttons_color = get_theme_mod('blog_gallery_slider_buttons_color') ? get_theme_mod('blog_gallery_slider_buttons_color') : '#b9b9b9';
        $blog_gallery_slider_active_buttons_color = get_theme_mod('blog_gallery_slider_active_buttons_color') ? get_theme_mod('blog_gallery_slider_active_buttons_color') : '#f49c41';
        $comment_form_input_text = get_theme_mod('comment_form_input_text') ? get_theme_mod('comment_form_input_text') : '#999';  
        $comment_form_border_color = get_theme_mod('comment_form_border_color') ? get_theme_mod('comment_form_border_color') : '#ccc';
        $comment_form_button_bg = get_theme_mod('comment_form_button_bg') ? get_theme_mod('comment_form_button_bg') : '#f49c41'; 
        $comment_form_button_color = get_theme_mod('comment_form_button_color') ? get_theme_mod('comment_form_button_color') : '#ffffff'; 
        $comment_form_button_hover_bg = get_theme_mod('comment_form_button_hover_bg') ? get_theme_mod('comment_form_button_hover_bg') : '#ffffff';
        $comment_form_button_hover_color = get_theme_mod('comment_form_button_hover_color') ? get_theme_mod('comment_form_button_hover_color') : '#f49c41';
        $blog_single_page_comment_list_border_color = get_theme_mod('blog_single_page_comment_list_border_color') ? get_theme_mod('blog_single_page_comment_list_border_color') : '#cccccc';
        $comment_form_button_letter_sapcing = get_theme_mod('comment_form_button_letter_sapcing') ? get_theme_mod('comment_form_button_letter_sapcing') : '0';
        $comment_form_button_font_weight = get_theme_mod('comment_form_button_font_weight') ? get_theme_mod('comment_form_button_font_weight') : 'normal';
        $comment_form_button_font_style = get_theme_mod('comment_form_button_font_style') ? get_theme_mod('comment_form_button_font_style') : 'normal';
        // Portfolio & bLog Page Next Prev BG Color
        $next_prev_button_bg_color = get_theme_mod('next_prev_button_bg_color') ? get_theme_mod('next_prev_button_bg_color') : '#FFFFFF';
        $next_prev_button_text_color = get_theme_mod('next_prev_button_text_color') ? get_theme_mod('next_prev_button_text_color') : '#ffffff';
        $next_prev_button_border_color = get_theme_mod('next_prev_button_border_color') ? get_theme_mod('next_prev_button_border_color') : '#FFFFFF';
        $next_prev_button_hover_bg_color = get_theme_mod('next_prev_button_hover_bg_color') ? get_theme_mod('next_prev_button_hover_bg_color') : '#f49c41';
        $next_prev_button_hover_text_color = get_theme_mod('next_prev_button_hover_text_color') ? get_theme_mod('next_prev_button_hover_text_color') : '#ffffff';
        $next_prev_button_hover_border_color = get_theme_mod('next_prev_button_hover_border_color') ? get_theme_mod('next_prev_button_hover_border_color') : '';
        $next_prev_button_letter_sapcing = get_theme_mod('next_prev_button_letter_sapcing') ? get_theme_mod('next_prev_button_letter_sapcing') : '0';
        $next_prev_button_font_weight = get_theme_mod('next_prev_button_font_weight') ? get_theme_mod('next_prev_button_font_weight') : 'normal';
        $next_prev_button_font_style = get_theme_mod('next_prev_button_font_style') ? get_theme_mod('next_prev_button_font_style') : 'normal';
        /* Footer Section */
        $most_footer_text_color = get_theme_mod('most_footer_text_color') ? get_theme_mod('most_footer_text_color') : '#ffffff';
        $most_footer_link_color = get_theme_mod('most_footer_link_color') ? get_theme_mod('most_footer_link_color') : '#ffffff';
        $most_footer_link_hover_color = get_theme_mod('most_footer_link_hover_color') ? get_theme_mod('most_footer_link_hover_color') : '#f49c41';
        // Pagination Section
        $posts_pagination_bg = get_theme_mod('posts_pagination_bg') ? get_theme_mod('posts_pagination_bg') : '#ffffff';
        $posts_pagination_link = get_theme_mod('posts_pagination_link') ? get_theme_mod('posts_pagination_link') : '#f49c41';
        $posts_pagination_active_link = get_theme_mod('posts_pagination_active_link') ? get_theme_mod('posts_pagination_active_link') : '#ffffff';
        $posts_pagination_active_bg = get_theme_mod('posts_pagination_active_bg') ? get_theme_mod('posts_pagination_active_bg') : '#f49c41';
        $footer_text_font_size = get_theme_mod( 'footer_text_font_size' ) ? get_theme_mod( 'footer_text_font_size' ) : '13';
        $footer_text_font_weight = get_theme_mod( 'footer_text_font_weight' ) ? get_theme_mod( 'footer_text_font_weight' ) : 'normal';
        $footer_text_font_style = get_theme_mod( 'footer_text_font_style' ) ? get_theme_mod( 'footer_text_font_style' ) : 'normal';
        $footer_text_letter_space = get_theme_mod( 'footer_text_letter_space' ) ? get_theme_mod( 'footer_text_letter_space' ) : '0';
        /* Font Family */
        $logo_background_color = get_theme_mod( 'logo_background_color' ) ? get_theme_mod( 'logo_background_color' ) : '';
        $select_header_logo_type = get_theme_mod( 'select_header_logo_type' ) ? get_theme_mod( 'select_header_logo_type' ) : '';
        $header_margin_top = get_theme_mod( 'header_margin_top' ) ? get_theme_mod( 'header_margin_top' ) : '10';
        $header_margin_bottom = get_theme_mod( 'header_margin_bottom' ) ? get_theme_mod( 'header_margin_bottom' ) : '10';
        $header_text_logo_font_family = get_theme_mod('header_text_logo_font_family') ? get_theme_mod('header_text_logo_font_family') : 'Libre Baskerville';
        $text_logo_tagline_font_family = get_theme_mod('text_logo_tagline_font_family') ? get_theme_mod('text_logo_tagline_font_family') : 'Open Sans';
        $google_body_font=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font') : 'Open Sans';
        $google_bodyfont= ( $google_body_font == '0' ) ? 'arial' : $google_body_font;
        $google_menu_font=get_theme_mod( 'google_menu_font' ) ? get_theme_mod( 'google_menu_font' ) : 'Open Sans, Arial,Helvetica,sans-serif';
        $google_menufont= ( $google_menu_font == '0' ) ? 'arial' : $google_menu_font;
        $google_general_titlefont=get_theme_mod( 'google_heading_font') ? get_theme_mod( 'google_heading_font' ) : 'Montserrat';
        $google_generaltitlefont= ( $google_general_titlefont == '0' ) ? 'arial' : $google_general_titlefont;
        $google_all_desc_font = get_theme_mod('google_all_desc_font') ? get_theme_mod('google_all_desc_font') : 'Lora';
        $google_all_desc_font_family= ( $google_all_desc_font == '0' ) ? 'arial' : $google_all_desc_font;
        $google_all_desc_font_style = get_theme_mod('google_all_desc_font_style') ? get_theme_mod('google_all_desc_font_style') : 'italic';
        $frame_border_text_font_family = get_theme_mod('frame_border_text_font_family') ? get_theme_mod('frame_border_text_font_family') : 'Open Sans';
        $header_logo_padding_l_r = get_theme_mod( 'header_logo_padding_l_r' ) ? get_theme_mod( 'header_logo_padding_l_r' ) : '0';
        $header_logo_padding_t_b = get_theme_mod( 'header_logo_padding_t_b' ) ? get_theme_mod( 'header_logo_padding_t_b' ) : '0';
        /* Font Sizes */
        /* Title Font sizes H1 */
        $h1_title_font_size=get_theme_mod( 'h1_title_fontsize', '' ) ? get_theme_mod( 'h1_title_fontsize', '' ) : '30'; // H1
        $h2_title_font_size=get_theme_mod( 'h2_title_fontsize', '' ) ? get_theme_mod( 'h2_title_fontsize', '' ) : '27'; // H2
        $h3_title_font_size=get_theme_mod( 'h3_title_fontsize', '' ) ? get_theme_mod( 'h3_title_fontsize', '' ) : '25'; // H3
        $h4_title_font_size=get_theme_mod( 'h4_title_fontsize', '' ) ? get_theme_mod( 'h4_title_fontsize', '' ) : '18'; // H4
        $h5_title_font_size=get_theme_mod( 'h5_title_fontsize', '' ) ? get_theme_mod( 'h5_title_fontsize', '' ) : '16'; // H5
        $h6_title_font_size=get_theme_mod( 'h6_title_fontsize', '' ) ? get_theme_mod( 'h6_title_fontsize', '' ) : '12'; // H6
        // Letter Spaceing
        $h1_font_letter_space=get_theme_mod( 'h1_font_letter_space') ? get_theme_mod( 'h1_font_letter_space') : '0'; // H1
        $h2_font_letter_space=get_theme_mod( 'h2_font_letter_space') ? get_theme_mod( 'h2_font_letter_space') : '0'; // H2
        $h3_font_letter_space=get_theme_mod( 'h3_font_letter_space') ? get_theme_mod( 'h3_font_letter_space') : '2'; // H3
        $h4_font_letter_space=get_theme_mod( 'h4_font_letter_space') ? get_theme_mod( 'h4_font_letter_space') : '0'; // H4
        $h5_font_letter_space=get_theme_mod( 'h5_font_letter_space') ? get_theme_mod( 'h5_font_letter_space') : '0'; // H5
        $h6_font_letter_space=get_theme_mod( 'h6_font_letter_space') ? get_theme_mod( 'h6_font_letter_space') : '0'; // H6
        // Font Weight
        $h1_font_weight_bold=get_theme_mod( 'h1_font_weight_bold') ? get_theme_mod( 'h1_font_weight_bold') : 'normal'; // H1
        $h2_font_weight_bold=get_theme_mod( 'h2_font_weight_bold') ? get_theme_mod( 'h2_font_weight_bold') : 'normal'; // H2
        $h3_font_weight_bold=get_theme_mod( 'h3_font_weight_bold') ? get_theme_mod( 'h3_font_weight_bold') : 'normal'; // H3
        $h4_font_weight_bold=get_theme_mod( 'h4_font_weight_bold') ? get_theme_mod( 'h4_font_weight_bold') : 'normal'; // H4
        $h5_font_weight_bold=get_theme_mod( 'h5_font_weight_bold') ? get_theme_mod( 'h5_font_weight_bold') : 'normal'; // H5
        $h6_font_weight_bold=get_theme_mod( 'h6_font_weight_bold') ? get_theme_mod( 'h6_font_weight_bold') : 'normal'; // H6
        // Body & Menu
        $body_font_weight_bold=get_theme_mod( 'body_font_weight_bold') ? get_theme_mod( 'body_font_weight_bold') : 'normal'; // body
        $menu_font_weight=get_theme_mod( 'menu_font_weight') ? get_theme_mod( 'menu_font_weight') : 'normal'; // Menu
        $child_menu_font_weight=get_theme_mod( 'child_menu_font_weight') ? get_theme_mod( 'child_menu_font_weight') : 'normal'; // Child Menu
        // Menu Latter Sapcing
        $body_font_letter_space=get_theme_mod( 'body_font_letter_space') ? get_theme_mod( 'body_font_letter_space') : '0'; // H4
        $menu_font_letter_space=get_theme_mod( 'menu_font_letter_space') ? get_theme_mod( 'menu_font_letter_space') : '2'; // H5
        $menu_desc_letter_space=get_theme_mod( 'menu_desc_letter_space') ? get_theme_mod( 'menu_desc_letter_space') : '1'; // H5
        $child_menu_font_letter_space=get_theme_mod( 'child_menu_font_letter_space') ? get_theme_mod( 'child_menu_font_letter_space') : '0'; // H6
        $body_font_size=get_theme_mod( 'body_font_size', '' ) ? get_theme_mod( 'body_font_size', '' ) : '15'; // Body Font Size
        $menu_font_size=get_theme_mod( 'menu_font_size', '' ) ? get_theme_mod( 'menu_font_size', '' ) : '15'; // Body Font Size
      $child_menu_font_size=get_theme_mod( 'child_menu_font_size', '' ) ? get_theme_mod( 'child_menu_font_size', '' ) : '13'; // Body Font Size
        /* Menu TOp */
       /* Woocommerce Color Section */  
         //social ocons color settings
        $shop_single_page_social_icons_link_color = get_theme_mod('shop_single_page_social_icons_link_color') ? get_theme_mod('shop_single_page_social_icons_link_color') : '#f49c41';
        $shop_single_page_social_icons_hover_link_color = get_theme_mod('shop_single_page_social_icons_hover_link_color') ? get_theme_mod('shop_single_page_social_icons_hover_link_color') : '#333333';
        $shop_single_page_social_icons_border_color = get_theme_mod('shop_single_page_social_icons_border_color') ? get_theme_mod('shop_single_page_social_icons_border_color') : '#f49c41';
        $shop_single_page_social_icons_hover_border_color = get_theme_mod('shop_single_page_social_icons_hover_border_color') ? get_theme_mod('shop_single_page_social_icons_hover_border_color') : '#f49c41';

        $products_bg_color = get_theme_mod('products_bg_color') ? get_theme_mod('products_bg_color') : '#ffffff';
        $products_title_color = get_theme_mod('products_title_color') ? get_theme_mod('products_title_color') : '#333333';
        $products_title_border_color = get_theme_mod('products_title_border_color') ? get_theme_mod('products_title_border_color') : '#d6d6d6';
        $products_title_border_hover_color = get_theme_mod('products_title_border_hover_color') ? get_theme_mod('products_title_border_hover_color') : '';
        $product_cart_color  = get_theme_mod('product_cart_color') ? get_theme_mod('product_cart_color') : '';
        $product_cart_hover_color = get_theme_mod('product_cart_hover_color') ? get_theme_mod('product_cart_hover_color') : '';
        $products_link_color = get_theme_mod('products_link_color') ? get_theme_mod('products_link_color') : '#686868';
        $products_desc_color = get_theme_mod('products_desc_color') ? get_theme_mod('products_desc_color') : '#686868';
        $products_link_hover_color = get_theme_mod('products_link_hover_color') ? get_theme_mod('products_link_hover_color') : '#f49c41';
        $products_price_color = get_theme_mod('products_price_color') ? get_theme_mod('products_price_color') : '#939393';
        $products_border_color = get_theme_mod('products_border_color') ? get_theme_mod('products_border_color') : '#d6d6d6';  
        // Button Bg
        $woo_buttons_bg_color = get_theme_mod('woo_buttons_bg_color') ? get_theme_mod('woo_buttons_bg_color') : '';
        $woo_buttons_text_color = get_theme_mod('woo_buttons_text_color') ? get_theme_mod('woo_buttons_text_color') : '#ffffff';
        $woo_buttons_bg_hover_color = get_theme_mod('woo_buttons_bg_hover_color') ? get_theme_mod('woo_buttons_bg_hover_color') : '';
        $woo_buttons_text_hover_color = get_theme_mod('woo_buttons_text_hover_color') ? get_theme_mod('woo_buttons_text_hover_color') : '#ffffff'; 
        // Elements
        $woo_elments_bg_colors = get_theme_mod('woo_elments_bg_colors') ? get_theme_mod('woo_elments_bg_colors') : '#f49c41';
         $woo_elments_text_colors = get_theme_mod('woo_elments_text_colors') ? get_theme_mod('woo_elments_text_colors') : '#ffffff';
    	// Alert message color section
        $success_msg_bg_color = get_theme_mod('success_msg_bg_color') ? get_theme_mod('success_msg_bg_color') : '#dff0d8';
        $success_msg_text_color = get_theme_mod('success_msg_text_color') ? get_theme_mod('success_msg_text_color') : '#468847';
        $notification_msg_bg_color = get_theme_mod('notification_msg_bg_color') ? get_theme_mod('notification_msg_bg_color') : '#b8deff';
        $notification_msg_text_color = get_theme_mod('notification_msg_text_color') ? get_theme_mod('notification_msg_text_color') : '#333';
        $warning_msg_bg_color = get_theme_mod('warning_msg_bg_color') ? get_theme_mod('warning_msg_bg_color') : '#f2dede';
        $warning_msg_text_color = get_theme_mod('warning_msg_text_color') ? get_theme_mod('warning_msg_text_color') : '#a94442';
        // Error Page
        $upload_404_bg_img =  get_theme_mod('upload_404_bg_img');
        $error_404_bg_repeat = get_theme_mod('error_404_bg_repeat') ? get_theme_mod('error_404_bg_repeat') : 'center';
        $error_404_bg_position = get_theme_mod('error_404_bg_position') ? get_theme_mod('error_404_bg_position') : 'center';
        $title_color_404 =  get_theme_mod('title_color_404') ? get_theme_mod('title_color_404') : '#333';
        $error_page_button_color = get_theme_mod('error_page_button_color') ? get_theme_mod('error_page_button_color') : '#ffffff';
        $error_page_button_bg_color =  get_theme_mod('error_page_button_bg_color') ? get_theme_mod('error_page_button_bg_color') : '#f49c41';
        $error_page_button_hover_color =  get_theme_mod('error_page_button_hover_color') ? get_theme_mod('error_page_button_hover_color') : '#f49c41';
        $error_page_button_hover_bg_color =  get_theme_mod('error_page_button_hover_bg_color') ? get_theme_mod('error_page_button_hover_bg_color') : '#ffffff';
        $error_page_button_letter_sapcing =  get_theme_mod('error_page_button_letter_sapcing') ? get_theme_mod('error_page_button_letter_sapcing') : '0';
        $error_page_button_font_weight = get_theme_mod('error_page_button_font_weight') ? get_theme_mod('error_page_button_font_weight') : 'normal';
        $error_page_button_font_style =  get_theme_mod('error_page_button_font_style') ? get_theme_mod('error_page_button_font_style') : '#f49c41';
        // Coming Soon Page
        $coming_soon_page_title_color = get_theme_mod('coming_soon_page_title_color') ? get_theme_mod('coming_soon_page_title_color') : '#ffffff';
        $coming_soon_page_title_border_color =  get_theme_mod('coming_soon_page_title_border_color') ? get_theme_mod('coming_soon_page_title_border_color') : '#f49c41';
        $coming_soon_date_color =  get_theme_mod('coming_soon_date_color') ? get_theme_mod('coming_soon_date_color') : '#ffffff';
        $coming_soon_date_bg_color =  get_theme_mod('coming_soon_date_bg_color') ? get_theme_mod('coming_soon_date_bg_color') : '#fff';
        $coming_soon_date_m_s_h_color =  get_theme_mod('coming_soon_date_m_s_h_color') ? get_theme_mod('coming_soon_date_m_s_h_color') : '#151515';
        $coming_soon_social_icons_bg_color =  get_theme_mod('coming_soon_social_icons_bg_color') ? get_theme_mod('coming_soon_social_icons_bg_color') : '#f49c41';
        $coming_soon_social_icons_color =  get_theme_mod('coming_soon_social_icons_color') ? get_theme_mod('coming_soon_social_icons_color') : '#ffffff';
        $coming_soon_social_icons_hover_bg_color =  get_theme_mod('coming_soon_social_icons_hover_bg_color') ? get_theme_mod('coming_soon_social_icons_hover_bg_color') : '#FFFFFF';
        $coming_soon_social_icons_hover_color =  get_theme_mod('coming_soon_social_icons_hover_color') ? get_theme_mod('coming_soon_social_icons_hover_color') : '#ffffff';
        // Footer Section
        $footer_bg_color = get_theme_mod('footer_bg_color') ? get_theme_mod('footer_bg_color') : '#FFFFFF';
        $footer_text_color = get_theme_mod('footer_text_color') ? get_theme_mod('footer_text_color') : '#333333';
        $footer_text_link_color = get_theme_mod('footer_text_link_color') ? get_theme_mod('footer_text_link_color') : '#333333';
        $footer_text_link_hover = get_theme_mod('footer_text_link_hover') ? get_theme_mod('footer_text_link_hover') : '#f49c41';
        $footer_border_top_color = get_theme_mod('footer_border_top_color') ? get_theme_mod('footer_border_top_color') : '';
        //End
        // Scroller
        $scrollbar_color =  get_theme_mod('scrollbar_color') ? get_theme_mod('scrollbar_color') : '#f49c41';
        $lightbox_image_gallery_enable =  get_theme_mod('lightbox_image_gallery_enable') ? get_theme_mod('lightbox_image_gallery_enable') : '0'; //LIGHT BOX OPTIONS
        $lightbox_image_title_disable =  get_theme_mod('lightbox_image_title_disable') ? get_theme_mod('lightbox_image_title_disable') : '0'; //LIGHT BOX OPTIONS
        $lightbox_image_social_icons_enable =  get_theme_mod('lightbox_image_social_icons_enable') ? get_theme_mod('lightbox_image_social_icons_enable') : '0'; //LIGHT BOX OPTIONS
        /* Slider Buttons */
        $post_slide_buttons_color=get_post_meta($petshop_kaya_post_item_id,'post_slide_buttons_color',true) ? get_post_meta($petshop_kaya_post_item_id,'post_slide_buttons_color',true) : '#ffffff';
        $post_slide_buttons_active_color=get_post_meta(get_the_ID(),'post_slide_buttons_active_color',true) ? get_post_meta(get_the_ID(),'post_slide_buttons_active_color',true) : '#f49c41'; 
        // Page title bar background image settings
      // Page title bar background image settings
        if( class_exists('woocommerce') ){
            if( is_shop() ){
                 $bg_post_id = wc_get_page_id( 'shop' );
            }else{
                $bg_post_id = get_the_ID();        }
        }else{
            $bg_post_id = get_the_ID();
        }
        $page_title_bar_bg_image=get_post_meta($bg_post_id,'page_title_bar_bg_image',true) ? get_post_meta($bg_post_id,'page_title_bar_bg_image',true) : '';
        $page_title_bar_title_color=get_post_meta($bg_post_id,'page_title_bar_title_color',true) ? get_post_meta($bg_post_id,'page_title_bar_title_color',true) : '';
        $page_title_bg_img_repeat=get_post_meta($bg_post_id,'page_title_bg_img_repeat',true) ? get_post_meta($bg_post_id,'page_title_bg_img_repeat',true) : 'no-repeat';
        $page_title_bar_bg_color=get_post_meta($bg_post_id,'page_title_bar_bg_color',true) ? get_post_meta($bg_post_id,'page_title_bar_bg_color',true) : '';
        $page_title_bar_desc_color=get_post_meta($bg_post_id,'page_title_bar_desc_color',true) ? get_post_meta($bg_post_id,'page_title_bar_desc_color',true) : ''; 
        $page_title_bar_settings=get_post_meta($bg_post_id,'page_title_bar_settings',true) ? get_post_meta($bg_post_id,'page_title_bar_settings',true) : '';
        $page_title_bar_styles=get_post_meta($bg_post_id,'page_title_bar_styles',true) ? get_post_meta($bg_post_id,'page_title_bar_styles',true) : 'theme_customizer';  
        /* Body & Menu & Title's Font Line Height  */
        $lineheight_body = round((1.9 * $body_font_size));
        $lineheight_h1 = round((1.6 * $h1_title_font_size));
        $lineheight_h2 = round((1.6 * $h2_title_font_size));
        $lineheight_h3 = round((1.6 * $h3_title_font_size));
        $lineheight_h4 = round((1.6 * $h4_title_font_size)); 
        $lineheight_h5 = round((1.6 * $h5_title_font_size));
        $lineheight_h6 = round((1.6 * $h6_title_font_size));
        if( $boxed_layout_position == 'center' ){
            $boxed_layout = 'margin:0px auto';
        }elseif( $boxed_layout_position == 'left' ){
            $boxed_layout = 'float:left';
        }else{
            $boxed_layout = 'float:right';
        }
        $css ='';
        $body_color = ( get_theme_mod('body_background_color') == 'false' ) ? 'none' : get_theme_mod('body_background_color');
        if( $select_body_background_type == 'bg_type_color' ){
            $css .= 'body.custom-background{
                    background-image:none!important;
                }';
            $css .= 'body{
                    background:'.$body_background_color.'!important;
                }';
        }else{  }
        /*Main slider button color settings */
        $post_slide_button_bg_color=get_post_meta($petshop_kaya_post_item_id,'post_slide_button_bg_color',true) ? get_post_meta($petshop_kaya_post_item_id,'post_slide_button_bg_color',true) : '';
        $post_slide_button_text_color=get_post_meta($petshop_kaya_post_item_id,'post_slide_button_text_color',true) ? get_post_meta($petshop_kaya_post_item_id,'post_slide_button_text_color',true) : '';
         $post_slides_button_hover_bg_color=get_post_meta($petshop_kaya_post_item_id,'post_slides_button_hover_bg_color',true) ? get_post_meta($petshop_kaya_post_item_id,'post_slides_button_hover_bg_color',true) : '';
         $post_slide_button_hover_text_color=get_post_meta($petshop_kaya_post_item_id,'post_slide_button_hover_text_color',true) ? get_post_meta($petshop_kaya_post_item_id,'post_slide_button_hover_text_color',true) : '';
         $slider_dot_button_color=get_post_meta($petshop_kaya_post_item_id,'slider_dot_button_color',true) ? get_post_meta($petshop_kaya_post_item_id,'slider_dot_button_color',true) : '';
         $slider_dot_active_button_color=get_post_meta($petshop_kaya_post_item_id,'slider_dot_active_button_color',true) ? get_post_meta($petshop_kaya_post_item_id,'slider_dot_active_button_color',true) : '';
         $css .='.slides-navigation a.prev, .slides-navigation a.next{
             background: none repeat scroll 0 0 '.$post_slide_button_bg_color.';
         }
         .slides-navigation a.prev:hover, .slides-navigation a.next:hover{
            background: none repeat scroll 0 0 '.$post_slides_button_hover_bg_color.';
         }
         .slides-navigation i{
            color: '. $post_slide_button_text_color.';
         }
         .slides-navigation a.prev:hover i, .slides-navigation a.next:hover i{
            color: '. $post_slide_button_hover_text_color.';
         }
         #main_slider_slides .owl-dot.active span{
            background-color: '.$slider_dot_button_color.'!important;
     }
     #main_slider_slides .owl-theme .owl-dots .owl-dot span{
    background-color: '.$slider_dot_active_button_color.';
 }';
        /* Lora font family */
        $css .='span.image_Vertical_title,.portfolio_content_wrapper span.pf_title_wrapper, .search_box_style input, .search_box_style select, #mid_container_wrapper .pf_model_info_wrapper ul li span, .social_media_sharing_icons span.share_on_title, span.image_side_title, .custom_title_wrapper p, .testimonial_slider p, .meta_post_info span a, span.meta_date_month, .quote_format h4, .widget_container .tagcloud a, .recent_posts_date, .comment_posted_date, input,  textarea, select,  blockquote p, .related_post_slider span, #slidecaption p, span.menu_description, .woocommerce .summary .price b,.onsale-ribbon .onsale, .woocommerce span.onsale, .woocommerce table.shop_attributes td, .scroll_top, h3.services_title, .testimonial_slider span.designation, .coming_soon_banner_content p, .countdown_wrapper, .error_404_page_wrapper h4.title_style2{
                   font-family:'.$google_all_desc_font_family.';
                   font-style:'.$google_all_desc_font_style.';
                }';
                $css .= '.menu > ul > li > a{
                    font-family:'.$google_menufont.';
                    font-size:'.$menu_font_size.'px;
                    letter-spacing:'.$menu_font_letter_space.'px;
                    font-weight:'.$menu_font_weight.';
                    text-transform:'.$mainmenu_uppercase.';
                }
                .menu ul ul li a{
                    font-size:'.$child_menu_font_size.'px;
                    letter-spacing:'.$child_menu_font_letter_space.'px;
                    font-weight:'.$child_menu_font_weight.';
                    text-transform:'.$childmenu_uppercase.';
                }
                body, p, input[type="submit"]{
                    font-family:'.esc_attr( $google_bodyfont ).';
                    line-height:'.$lineheight_body.'px;
                    font-size:'.$body_font_size.'px;
                    letter-spacing:'.$body_font_letter_space.'px;
                    font-weight:'.$body_font_weight_bold.';
                     font-style:normal;
                }
                .widget_container .tagcloud a, .fm-form input, .fm-form select, .toggle_search_wrapper select, .toggle_search_wrapper .search_form input, .fm-form textarea{
                     font-size:'.$body_font_size.'px!important;
                }
               a, span{
                    font-family:'.esc_attr( $google_bodyfont ).';
                }
                p{
                    padding-bottom:'.$lineheight_body.'px;
                }
                /* Heading Font Family */
                 h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, #slidecaption h2 span{
                    font-family:'.esc_attr( $google_generaltitlefont ).';
                }
                /* Logo Font Family */
                .header_logo_wrapper h1.logo a,  .header_logo_wrapper h1.sticky_logo a{
                    font-family:'.esc_attr( $header_text_logo_font_family ).';
                }
                .header_logo_wrapper .logo_tag_line{
                    font-family:'.esc_attr( $text_logo_tagline_font_family ).';
                }
                h1{
            		font-size:'.$h1_title_font_size.'px;
            		line-height:'.$lineheight_h1.'px;
            		letter-spacing:'.$h1_font_letter_space.'px;
                    font-weight: '.$h1_font_weight_bold.';
                }
                h2{
            		font-size:'.$h2_title_font_size.'px;
            		line-height:'.$lineheight_h2.'px;
            		letter-spacing:'.$h2_font_letter_space.'px;
                    font-weight: '.$h2_font_weight_bold.';
                }
                h3, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3, .fm-form legend{
            		font-size:'.$h3_title_font_size.'px;
            		line-height:'.$lineheight_h3.'px;
            		letter-spacing:'.$h3_font_letter_space.'px;
                    font-weight: '.$h3_font_weight_bold.';
                }
                .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3, .fm-form legend{
                    font-weight: '.$h3_font_weight_bold.'!important;
                }
                h4{
            		font-size:'.$h4_title_font_size.'px;
            		line-height:'.$lineheight_h4.'px;
            		letter-spacing:'.$h4_font_letter_space.'px;
                    font-weight: '.$h4_font_weight_bold.';
                }
                h5{
            		font-size:'.$h5_title_font_size .'px;
            		line-height:'. $lineheight_h5 .'px;
            		letter-spacing:'.$h5_font_letter_space.'px;
                    font-weight: '.$h5_font_weight_bold.';
                }
                h6{
            		font-size:'.$h6_title_font_size.'px;
            		line-height:'.$lineheight_h6.'px;
            		letter-spacing:'.$h6_font_letter_space.'px;
                    font-weight: '.$h6_font_weight_bold.';
                }';
        /* slider */
        $css .='ul#slide-list li a{
                    background-color:'.$post_slide_buttons_color.';
                }
                ul#slide-list li{
                        border:2px solid '.$post_slide_buttons_color.';
                }
                ul#slide-list li.current-slide, ul#slide-list li.current-slide:hover ul#slide-list li:hover, ul#slide-list li:hover{
                    border:2px solid '.$post_slide_buttons_active_color.';
                }
               ul#slide-list li.current-slide a, ul#slide-list li.current-slide a:hover, ul#slide-list li:hover a{
                        background-color:'.$post_slide_buttons_active_color.';
                }'; 
                $css .='.header_top_left_section i,.header_top_left_section p,.header_top_right_section i,.header_top_right_section span{
                    color:'.$top_header_text_color.';
                }
                .header_top_left_section i:hover,.header_top_left_section p:hover,.header_top_right_section i:hover,.header_top_right_section span:hover{
                    color:'.$top_header_text_hover_color.';
                }';
/* Right Section Socila media icons */
/*-----------------------------------------------------------------------------------*/
function header_right_social_icons(){
//$social_icon_link1_disable=get_theme_mod('social_icon_link1_disable') ? get_theme_mod('social_icon_link1_disable'):'';
$src=get_template_directory_uri() . '/images/social_icons';

$socialmedia_icon1_img_src = get_option('social_icon1');
$socialmediaicon1 = $socialmedia_icon1_img_src['upload_social_icon1'] ? str_replace('&nbsp;', '', $socialmedia_icon1_img_src['upload_social_icon1'])    : $src.'/facebbook.png';
$right_social_icon_link1=get_theme_mod('right_social_icon_link1') ? get_theme_mod('right_social_icon_link1'): '';

$socialmedia_icon2_img_src = get_option('social_icon2');
$socialmediaicon2 = $socialmedia_icon2_img_src['upload_social_icon2'] ? str_replace('&nbsp;', '',$socialmedia_icon2_img_src['upload_social_icon2'])   : $src.'/pintrest.png';
 $right_social_icon_link2=get_theme_mod('right_social_icon_link2') ? get_theme_mod('right_social_icon_link2'): '';

$socialmedia_icon3_img_src = get_option('social_icon3');
$socialmediaicon3 = $socialmedia_icon3_img_src['upload_social_icon3'] ? str_replace('&nbsp;', '', $socialmedia_icon3_img_src['upload_social_icon3'])  : $src.'/twitter.png';
$right_social_icon_link3=get_theme_mod('right_social_icon_link3') ? get_theme_mod('right_social_icon_link3'): '';

$socialmedia_icon4_img_src = get_option('social_icon4');
$socialmediaicon4 = $socialmedia_icon4_img_src['upload_social_icon4'] ? str_replace('&nbsp;', '', $socialmedia_icon4_img_src['upload_social_icon4'])    : $src.'/youtube.png';
$right_social_icon_link4=get_theme_mod('right_social_icon_link4') ? get_theme_mod('right_social_icon_link4'): '';

$socialmedia_icon5_img_src = get_option('social_icon5');
$socialmediaicon5 = $socialmedia_icon5_img_src['upload_social_icon5'] ? str_replace('&nbsp;', '', $socialmedia_icon5_img_src['upload_social_icon5'] )   : $src.'/google+.png';
$right_social_icon_link5=get_theme_mod('right_social_icon_link5') ? get_theme_mod('right_social_icon_link5'): '';
 
if(!empty($socialmediaicon1 ) || (!empty($socialmediaicon2)) || (!empty($socialmediaicon3)) || (!empty($socialmediaicon4)) || (!empty($socialmediaicon5))){

    echo '<div class="social_icons_box">';  
if( trim($socialmediaicon1) ){
          echo '<a href="'.$right_social_icon_link1.'" target="_blank"><img class="icon1" src="'.$socialmediaicon1.'" class="header_social_icons" /></a>';
         }
 //end
if( trim($socialmediaicon2) ){
         echo '<a href="'.$right_social_icon_link2.'" target="_blank"><img  class="icon2" src="'.$socialmediaicon2.'" class="header_social_icons"/></a>';
    }    
//end
if( trim($socialmediaicon3) ){
         echo '<a href="'.$right_social_icon_link3.'" target="_blank"><img class="icon3" src="'.$socialmediaicon3.'" class="header_social_icons"/></a>';
         } 
//end
if( trim($socialmediaicon4) ){
         echo '<a href="'.$right_social_icon_link4.'" target="_blank"><img class="icon4" src="'.$socialmediaicon4.'" class="header_social_icons"/></a>';
        }
 //end
if( trim($socialmediaicon5) ){
         echo '<a href="'.$right_social_icon_link5.'" target="_blank"><img class="icon5" src="'.$socialmediaicon5.'" class="header_social_icons"/></a>';
        }
      echo '</div>';
}
}                
        /* Header Logo */    
        if( $select_header_logo_type != 'none' ){
             if(!empty($logo_background_color)){
                $css .='.header_logo_wrapper{
                    background:'.$logo_background_color.';
                }';
            }
            $css .='.header_logo_wrapper{
                    text-align:center;
                }'; 
            $css .='.header_content_wrapper{
                    padding-top:'.$header_margin_top.'px!important;
                    padding-bottom:'.$header_margin_bottom.'px!important;
                }';        
        }
        if( $select_header_background_type == 'bg_type_color'){
        $css .='.header_container_wrapper{
               background-color:'.$header_background_color.'; 
        }';
    }else{
        if( $upload_header['bg_image'] ){ 
            $backgroundbg_image_repeat = ( $header_bg_img_repeat == 'cover' ) ? 'cover' : 'inherit';
            $css .='.header_container_wrapper{
                background:url('.$upload_header['bg_image'].')!important;
                background-size : '.$backgroundbg_image_repeat.'!important;
                background-repeat : '.$header_bg_img_repeat.'!important;
                background-attachment: scroll!important;
                background-position: center top!important;
                background-repeat:repeat;
            }';
        }
    }
        if( !empty($header_border_bottom_color) ){
           $css .='.header_top_bar_setion{
               border-bottom:1px solid '.$header_border_bottom_color.'; 
            }'; 
        }
        $menu_border_img = $menu_links['border_img'] ? $menu_links['border_img'] : esc_url($url).'/menu-border.png';
        if(!empty($menu_border_img) ){
            $css .='.sm-blue> li > a{
                }';
        }
        $css .= '.header_main_menu .container{
            background-color: '.$menu_bar_bg_color.';
                }
                .header_menu{
                    background-color: '.$menu_bar_bg_color.';
                }
                div.toggle_search_icon a{
                    color:'.$left_menu_button_color.';
                }
                .menu > ul > li > a, .shop_cart_icon a, .mobile_toggle_menu i, .mobile_drop_down_icons i, .mobile_menu_section ul a{
                  color:'.$menu_link_color.';
                  background-color:'.$menu_link_bg_color.';
                }
                .menu > ul > li:hover a{
                background-color:'.$menu_link_bg_hover_color.';
                }
                .menu > ul > li{
                    border-top-color:'.$menu_links_border_top.';
                    border-bottom-color:'.$menu_links_border_bottom.';
                }
                ul#primary-menu ul{
                    border-top-color:'.$menu_links_border_bottom.';    
                }
                .header_menu_section{
                   background: '.$menu_background_color.';
                }
                 .mobile_menu a{
                  color:'.$menu_link_color.';
                }
                .header_menu_section .menu .current_page_ancestor > a,.header_menu_section .menu .current-menu-item > a, .header_menu_section .menu .current_page_ancestor  > a,.header_menu_section .menu .current-menu-ancestor > a,.header_menu_section .menu .current-menu-item  > a,.header_menu_section .menu .current-menu-item.fa:before, .header_menu_section .menu > ul > li.current_page_ancestor.fa:before, .header_menu_section .menu > ul > li.current-menu-ancestor.current-menu-parent::before{
                   color:'.$menu_link_active_color.';
                    background-color:'.$menu_bg_active_color.';
                }
                .menu > li.current_page_item > a{
                    color:'.$menu_link_active_color.';
                    background-color:'.$menu_bg_active_color.';
                }
                .menu .current_page_ancestor > a, .mobile_menu_section ul li.current_page_ancestor a, .mobile_menu_section ul li.current_page_ancestor .current-menu-item a, .mobile_menu_section .sub-menu .current-menu-item > a{
                    color:'.$menu_link_active_color.'!important;
                }
                .menu > ul > li:hover > a,  .menu > ul > li.fa:hover:before{
                    color:'.$menu_link_hover_text_color.'!important;
                }
                .menu ul ul li a{
                  color:'.$sub_menu_link_color.';
                  background-color:'.$sub_menu_links_bg_color.'!important;
                }
                .menu ul ul li a:hover, .menu ul ul li.fa:hover:before{
                  color:'.$sub_menu_link_hover_color.';
                  background-color:'.$sub_menu_links_hover_bg_color.'!important;
                }
                .menu ul ul li{
                    border-bottom:1px solid '.$sub_menu_bottom_border_color.';
                }
                .menu ul ul li a{
                  text-transform:'.$childmenu_uppercase.';
                }
                .menu > ul > li > a{
                  text-transform:'.$mainmenu_uppercase.';
                }
                .menu .menu_content_wrapper .current-menu-item > a, .menu .sub-menu .current-menu-item > a, .menu .sub-menu .current-menu-item.fa:before{
                     color:'.$sub_menu_link_active_color.';
                     background-color:'.$sub_menu_links_active_bg_color.'!important;
                }
                span.toggle_menu_border{
                    background-color:'.$menu_link_color.';
                }
                .search_box_icon{
                    background-color:'.$search_box_bg_color.';
                    color:'.$search_box_icon_color.';
                }
                .mobile_menu_icons .toggle_search_icon {
                    color:'.$menu_link_color.'!important;
                }';
        /*Page Title bar settings */
        if(  $select_page_title_background_type == 'bg_type_color' ){
            $css .= '.sub_header_wrapper{
                background : '.$page_title_bg_color.';
            }';
        }else{ 
            $default_img = esc_url($url).'page-title-bg.jpg';
            $page_title_img = $page_title_bar['bg_img'] ? $page_title_bar['bg_img'] : $default_img;
            if( $page_title_img ){            
                $bg_size_cover = ( $page_title_bar_bg_repeat == 'cover' ) ? 'cover' : 'inherit';
                $css .= '.sub_header_wrapper{
                background:url('.$page_title_img.')!important;
                background-repeat:'.$page_title_bar_bg_repeat.'!important;
                background-size: '.$bg_size_cover.'!important;
                background-position:center top!important;
                }';
            }
        }
     $page_title_position = ( $page_title_position == 'center' ) ? 'margin:0px auto;' : 'float:'.$page_title_position.';';
        $css .= '.sub_header_wrapper h2{
                    font-size:'.$page_title_font_size.'px;
                    line-height:'.ceil($page_title_font_size * 1.3 ).'px;
                    font-weight:'.$page_title_font_weight.';
                    font-style:'.$page_title_font_style.';
                }
                .title_big_letter, .title_big_letter strong{
                    font-size:'.ceil(2.5*$page_title_font_size).'px;
                    color:'.$page_title_color.';
                }
                span.title_border_bottom {
                    background-color:'.$page_title_border_color.';
                }
                .page_title_wrapper h2{
                    border-bottom:3px solid '.$page_title_border_color.';
                    letter-spacing:'.$page_title_font_letter_space.'px;
                    display:inline-table;
                    padding-bottom: 10px;
                }
                .page_title_wrapper{
                    '.$page_title_position.'
                }
                .sub_header.container {
                padding: '.$page_title_bar_padding.'px  0;
                }';
        if( $page_title_bar_styles == 'page_custom_styles'){
            
        }else{
           
            $css .='.sub_header_wrapper h2::after{
                        background:'.$page_titlebar_title_color.';
                    }
                    .sub_header_wrapper h2{
                        color:'.$page_titlebar_title_color.';
                    }
                    .sub_header_wrapper p{
                        color:'.$title_description_color.';
                    }
                    #crumbs{
                    color:'.$bread_crumb_text_color.';
                }
                #crumbs a{
                color:'.$bread_crumb_link_color.';
            }
             #crumbs a:hover{
                color:'.$bread_crumb_hover_link_color.';
            }
            ';
        }  
        /*Page Mid Content settings */
        if( $page_title_pattern['bg_pattern'] ){
            $css .='.page_title_pattern{
                        background:url('.esc_url( $page_title_pattern['bg_pattern'] ).');
                    }';
        }
        //Mid Container
        $css .= '.mid_container_wrapper_section h1,.mid_container_wrapper_section h2, .mid_container_wrapper_section h3, .mid_container_wrapper_section h4,.mid_container_wrapper_section h5, .mid_container_wrapper_section h6, .meta-nav-next strong, .meta-nav-prev strong, .fm-form legend{
            		color: '.$page_titles_color.';
                }
            	.mid_container_wrapper_section p, .mid_container_wrapper_section #mid_content_left_section, #mid_content_right_section, ul li{
                   color: '.$page_description_color.';
                }
                .mid_container_wrapper_section a:not(.add_to_cart_button){
                   color: '.$page_link_color.';
                }  
                .mid_container_wrapper_section a:hover:not(.add_to_cart_button){
                   color: '.$page_link_hover_color.';
                }';
        /* Sidebar Settings  */
        $css .='#sidebar .widget_container{
                    background-color:'.$sidebar_bg_color.';
                }
                #sidebar .sidebar_content, .page_sidebar ul.product_list_widget{
                     border: 1px solid '.$sidebar_border_color.';
                }
                .mid_container_wrapper_section #sidebar .widget_container h3{
                    color:'.$sidebar_title_color.';
                }
                #sidebar h3.title_style1, .page_sidebar h3{
                background-color:'.$sidebar_title_bg_color.';
                }
                .mid_container_wrapper_section .widget_container ul li a{
                    color:'.$sidebar_link_color.';
                }
                .mid_container_wrapper_section .widget_container ul li a:hover{
                    color:'.$sidebar_link_hover_color.';
                }
                .mid_container_wrapper_section .widget_container p, .mid_container_wrapper_section .widget_container, .widget_container.widget_search input{
                    color:'.$sidebar_desc_color.';
                }
                #sidebar .widget_container .title_seperator{
                   background-color:'.$sidebar_title_border_color.';
                }
                #sidebar .widget_container .title_seperator::after{
                   border-color:'.$sidebar_title_border_color.';
                }
                #sidebar .widget_container ul li{
                     border-bottom: 1px solid '.$sidebar_list_border_color.';
                }
               .widget_container .tagcloud a{
                    background-color:'.$sidebar_tags_bg_color.';
                    border-color:'.$sidebar_tags_border_color.';
                    color:'.$sidebar_tags_link_color.';
                }
                .widget_container .tagcloud a:hover{
                    background-color:'.$sidebar_tags_hover_bg_color.';
                    color:'.$sidebar_tags_hover_link_color.';
                    border-color:'.$sidebar_tags_hover_border_color.';
                }';
                   /* Footer Bg Settings */
     /*$footer_bg_size = ( $footer_bg_repeat == 'cover' ) ? 'background-size:cover; background-repeat:no-repeat' : 'background-repeat:'.$footer_bg_repeat.';'; 
    if( $select_footer_background_type == 'bg_type_image' ){
        if( !empty($footer_bg['bg_img']) ){
            $css .='footer .footer_wrapper{
                    background:url('.$footer_bg['bg_img'].');
                    '.$footer_bg_size.';
            }';
        }
     }else{
        $css .='.main_content_wrapper .footer_wrapper{
            background:'.$main_footer_bg_color.';
        }'; 
     }*/
    $css .='
        .footer_widget_container_wrapper .widget_container h3::before{
            background:'.$main_footer_title_border_color.';
        }

        .footer_widget_container_wrapper .widget_container .tagcloud a{
        }';
        if($footer_border['border_img']){
            $css .='footer .widget_container .title_bottom_border{
                background:url('.$footer_border['border_img'].');
            }'; 
        }

    // Most Footer
    $css .= '#most_footer_bottom{
            background:'.$most_footer_bg_color.';
        }
        .footer_left_content p, .footer_left_content, .footer_left_content span, .footer_right_content p, .footer_right_content, .footer_right_content span, #most_footer_bottom .container .fullwidth, #most_footer_bottom .container .fullwidth span{
            color:'.$most_footer_text_color.';
        }
        .footer_left_content a, .footer_left_content ul li a, .footer_right_content a, .footer_right_content ul li a, #most_footer_bottom .container .fullwidth a, #most_footer_bottom .container .fullwidth ul li a{
            color:'.$most_footer_link_color.';
        }
        .footer_left_content a:hover, .footer_left_content a:active, #menu-footer > li.current-menu-item > a,
        .footer_right_content a:hover, .footer_right_content a:active, #menu-footer > li.current-menu-item > a,
        #most_footer_bottom .container .fullwidth a:hover{
            color:'.$most_footer_link_hover_color.';
        }';
    if( $select_most_footer_style == 'none' ){
        $css .='#most_footer_bottom{
            display:none;
        }';
    }    
       /*Header right section color settings */
        $header_top_bottom_border_color = get_theme_mod('header_top_bottom_border_color') ? get_theme_mod('header_top_bottom_border_color') : '#e4ae77';
        $woo_login_link_color = get_theme_mod('woo_login_link_color') ? get_theme_mod('woo_login_link_color') : '#ffffff';
        $woo_login_link_hover_color = get_theme_mod('woo_login_link_hover_color') ? get_theme_mod('woo_login_link_hover_color') : '#ffffff';
        $shopping_cart_link_color = get_theme_mod('shopping_cart_link_color') ? get_theme_mod('shopping_cart_link_color') : '#ffffff';
        $shopping_cart_link_hover_color = get_theme_mod('shopping_cart_link_hover_color') ? get_theme_mod('shopping_cart_link_hover_color') : '#ffffff';
        $css .='
        .header_section{
           border-top: 1px solid '.$header_top_bottom_border_color.';
           border-bottom: 1px solid '.$header_top_bottom_border_color.';
        }
        .woo_login  a,.woo_login  i{
            color:'.$woo_login_link_color.'!important;
        }
        .woo_login  a:hover,.woo_login  i:hover{
            color:'.$woo_login_link_hover_color.'!important;
        }
        .shopping_cart a{
            color:'.$shopping_cart_link_color.'!important;
            border: 2px solid '.$shopping_cart_link_color.'!important;
        }
        .shopping_cart a:hover{
            color:'.$shopping_cart_link_hover_color.'!important;
            border: 2px solid '.$shopping_cart_link_hover_color.'!important;
        }';
    	/* Woocommerce Color Section */
            $css .= '.owl-item .shop-product-details, .shop-product-items li .shop-product-details, .upsells-product-slider .owl-item .shop-product-details, .related-product-slider .owl-item .shop-product-details, .cross-sells-product-slider .owl-item .shop-product-details, .woocommerce table.shop_table, .cart_total_wrapper, .woocommerce-billing-fields-wrapper, .woocommerce #payment ul.payment_methods, .woocommerce-page #payment ul.payment_methods, .col2-set.addresses .col-1 address, .woocommerce .order_details .woocommerce form.login, .calculate_shipping_wrapper, .woocommerce-billing-fields-wrapper, .woocommerce-shipping-fields-wrapper, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce .order_details li,.col2-set.addresses address, .col2-set.addresses address, .woocommerce address, form.track_order{
                    background-color:'.$products_bg_color.'!important;
                }
                .woocommerce_single_product_content_wrapper p ,.product_meta span.posted_in span, .cart_totals th, .cart_totals td, .woocommerce form .woocommerce-billing-fields .form-row, .woocommerce form .woocommerce-billing-fields .form-row input, .woocommerce-billing-fields .select2-container .select2-choice, .woocommerce-checkout #payment ul.payment_methods li p, .col2-set.addresses .col-1 address, .woocommerce .order_details li, .woocommerce-page table.shop_table td, .woocommerce form.login, .woocommerce form.login p, .woo_checkout_login_message_wrapper input, .woocommerce table.shop_table.order_details th, .woocommerce table.shop_table.order_details td, .woocommerce table.shop_table.customer_details td, .woocommerce table.shop_table.customer_details th, .woocommerce .shop-product-details p, .claculate_shipping, .col2-set.addresses address, .col2-set.addresses address, .woocommerce div.product p.stock, .woocommerce textarea, .woocommerce  input, .woocommerce select, .woocommerce table.shop_attributes, .woocommerce table.shop_attributes p, .woocommerce address, form.track_order, form.track_order p{
                       color:'.$products_desc_color.'!important;
                }
                .shop-product-items li .shop-product-details h4 a, .upsells-product-slider .owl-item .shop-product-details h4 a, .related-product-slider .owl-item .shop-product-details h4 a, .cross-sells-product-slider .owl-item .shop-product-details h4 a, .woocommerce div.product .product_title,  .woocommerce-checkout #payment ul.payment_methods li, form.track_order label, ul.single-product-tabs li a{
                        color:'.$products_title_color.'!important;
                }
                .related.products .title_seperator, .crosssells.products .title_seperator, .cross-sell.products .title_seperator, .upsells.products .title_seperator {
                        background:'.$products_title_border_color.'!important;
                }
                .title_seperator::after{
                    border: 1px solid '.$products_title_border_color.';
                }
                .shop-products,.shop-products .product-cart-button i{
                        border: 1px solid '.$products_title_border_color.';
                }
                .products li:hover .shop-products{
                     border: 1px solid '.$products_title_border_hover_color.'; 
                }
                .products li .product-cart-button{
                background-color: '.$product_cart_color.';
                   }
                 .products li:hover .product-cart-button{
                background-color: '.$product_cart_hover_color.';
                }
                 .products li:hover .product-cart-button i{
                     color:'.$product_cart_color.';
                }
                .products li .product-cart-button i{
                     color:'.$product_cart_hover_color.';
                }
                 .product_meta span.posted_in a, input.woo_qty_minus, input.woo_qty_plus, input.woo_items_quantity, .woocommerce-product-rating a, .cart_item input.woo_qty_minus, input.woo_qty_plus, .cart_item input.woo_items_quantity, .cart_item input.input.woo_qty_plus, .woocommerce-checkout #payment ul.payment_methods li, .woocommerce-checkout #payment .payment_method_paypal .about_paypal, p.lost_password a, .product_meta span.tagged_as a, .woocommerce table.shop_table.order_details a, a.shipping-calculator-button, table.shop_table.cart .product-name a, .woocommerce div.product form.cart .group_table td a{
                      color:'.$products_link_color.'!important;
                }
            .product_meta span.posted_in a:hover, .product_meta span.tagged_as a:hover, .woocommerce-product-rating a:hover, .woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover, p.lost_password a:hover, .woocommerce table.shop_table.order_details a:hover, .comment-form-rating p.stars a:hover, table.shop_table.cart .product-name a:hover, .woocommerce div.product form.cart .group_table td a:hover{
                     color:'.$products_link_hover_color.'!important;
                }
                .shop-product-items li .shop-product-details  span.amount, .upsells-product-slider .owl-item .shop-product-details  span.amount, .related-product-slider .owl-item .shop-product-details  span.amount, .cross-sells-product-slider .owl-item .shop-product-details  span.amount, .woocommerce .summary span.amount, .product-subtotal span, .product-price span, tr.order-total, tr.order-total th, .order-total td strong span, .woocommerce table.shop_table.order_details tfoot tr:last-child th, .woocommerce-page table.shop_table.order_details tfoot tr:last-child td, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del, .related-product-slider .shop-products span del .amount, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .related-product-slider .shop-products span .amount{
                      color:'.$products_price_color.'!important;
                }
                .shop-product-items li .shop-product-details .product_cost_add_cart_wrapper, .upsells-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .related-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .cross-sells-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .woocommerce div.product form.cart div.quantity, .woocommerce-page table.shop_table td, .woocommerce-page table.shop_table th, .product-quantity .quantity, .woocommerce table.cart td.actions .coupon .input-text, .cart_totals td, .cart_totals th, .woocommerce .woocommerce-billing-fields .form-row textarea, .woocommerce-billing-fields .form-row input.input-text, .woocommerce-billing-fields .form-row textarea, .woocommerce-billing-fields .select2-container .select2-choice, .woo_checkout_login_message_wrapper input, .tabs.single-product-tabs, .woocommerce #reviews #comments ol.commentlist li, #review_form textarea, .woocommerce p.stars a.star-1, .woocommerce p.stars a.star-2, .woocommerce p.stars a.star-3, .woocommerce p.stars a.star-4, .woocommerce p.stars a.star-5, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .woocommerce-page form .form-row input.input-text, .woocommerce-page form .form-row textarea, .woocommerce form .form-row select, .woocommerce-page form .form-row select, .woocommerce-checkout #payment ul.payment_methods li, .select2-container .select2-choice, .woocommerce div.product p.stock, #review_form input, form.track_order input{
                    border-color:'.$products_border_color.'!important;
                }';

        $css .='.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce-cart-info h3 a::after, .produt_discount_price, .woocommerce .produt_discount_price span, .product-remove a.remove{
                    background-color:'.$woo_elments_bg_colors.';
                    color:'.$woo_elments_text_colors.';
                }
                .woocommerce .woocommerce-product-rating .star-rating, .star-rating, .comment-form-rating p.stars span a{
                    color:'.$woo_elments_bg_colors.';    
                }
                .woocommerce .produt_discount_price span, .product-remove a.remove{
                    border-color:'.$woo_elments_text_colors.';
                }
                .product-remove a.remove:hover{
                    background-color:'.$woo_elments_text_colors.'!important;;
                    color:'.$woo_elments_bg_colors.'!important;;
                }
                .product-remove a.remove:hover{
                    border-color:'.$woo_elments_text_colors.'!important;;
                }
                .cart-success-message {
                    background-color:'.$success_msg_bg_color.';
                    color:'.$success_msg_text_color.';
                }
                .woocommerce-cart-info {
                    background-color:'.$notification_msg_bg_color.';
                    color: '.$notification_msg_text_color.';
                }
                .woocommerce-cart-info a{
                    color: '.$notification_msg_text_color.'!important;
                }
                .woocommerce-cart-error {
                    background-color: '.$warning_msg_bg_color.';
                    color: '.$warning_msg_text_color.';
                }';  
                $css .='.primary-button, .single_add_to_cart_button.button.alt, .woocommerce #respond input#submit, .cart-success-message a.button.wc-forward, input.button, a.checkout-button.button.alt.wc-forward, .woocommerce-shipping-calculator button.button, .woocommerce .form-row.place-order input#place_order, p.return-to-shop a.button.wc-backward{
                    background:'.$woo_buttons_bg_color.'!important;
                    color:'.$woo_buttons_text_color.'!important;
                }
                 .woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
                     color:'.$woo_buttons_bg_color.'!important;
                 }
                 .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{
                     color:'.$woo_buttons_bg_hover_color.'!important;
                 }
                .primary-button:hover, .single_add_to_cart_button.button.alt:hover, .woocommerce #respond input#submit:hover, .cart-success-message a.button.wc-forward:hover, input.button:hover, a.checkout-button.button.alt.wc-forward:hover, .woocommerce-shipping-calculator button.button:hover, .woocommerce .form-row.place-order input#place_order:hover, p.return-to-shop a.button.wc-backward:hover{
                    background:'.$woo_buttons_bg_hover_color.'!important;
                    color:'.$woo_buttons_text_hover_color.'!important;
                }'; 
    	/* End */
//social ocons
        $css .='.social_sharing_icons a i{
            color:'.$shop_single_page_social_icons_link_color.';
        }
        .social_sharing_icons a i:hover{
            color:'.$shop_single_page_social_icons_hover_link_color.';
        }
        .social_icons_border_color a,
        .pf_social_share_icons li a{
            border-color:'.$shop_single_page_social_icons_border_color.'!important;
        }
        .social_icons_hover_border_color a:hover,
        .pf_social_share_icons li a:hover{
            border-color:'.$shop_single_page_social_icons_hover_border_color.'!important;
        }';

        /* Blog */  
        $css .='.standard-blog .meta_date_wrapper{
                    border-color:'.$blog_page_date_bg_color.';
                }
                .standard-blog .meta_date{
                    background-color:'.$blog_page_date_bg_color.';
                    color:'.$blog_page_date_color.';
                }
                .standard-blog .blog_post_content_wrapper .image_title_border{
                     border-color:'.$blog_page_img_border_color.';
                }
                .mid_container_wrapper_section .standard-blog .post_description_wrapper h3 a, .standard-blog  .meta_post_info, .quote_format_text h3, .standard-blog  .quote_format_text h5,  .standard-blog .post_description_wrapper h3, .standard-blog .post_description_wrapper h1, .standard-blog .post_description_wrapper h2, .standard-blog .post_description_wrapper h4, .standard-blog .post_description_wrapper h5, .standard-blog .post_description_wrapper h6, .search_post .blog_post_title h3 a{
                    color:'.$blog_page_title_color.'!important;
                }
                .mid_container_wrapper_section .standard-blog .post_description_wrapper h3 a:hover{
                    color:'.$blog_page_title_hover_color.'!important;
                }
                .standard-blog .post_description_wrapper p, .standard-blog .post_description_wrapper ul, .standard-blog .post_description_wrapper pre, .standard-blog .post_description_wrapper ol, .standard-blog .post_description_wrapper address, .standard-blog .post_description_wrapper td, .standard-blog .post_description_wrapper dt, .standard-blog .post_description_wrapper dd {
                    color:'.$blog_desc_color.';
                }
                .standard-blog .meta_post_info{
                    border-color:'.$blog_meta_info_t_b_border_color.'!important;
                }
                .standard-blog .meta_post_info span a, .standard-blog .post_description_wrapper a:not(.readmore_button){
                    color:'.$blog_link_color.'!important;
                }
                .standard-blog .meta_post_info span a:hover, .standard-blog .post_description_wrapper a:hover:not(.readmore_button){
                    color:'.$blog_link_hover_color.'!important;
                }
                .standard-blog .readmore_button, .search_post .readmore_button,.slides_description .readmore_button{
                    background-color:'.$blog_button_bg_color.'!important;
                    color:'.$blog_button_color.'!important;
                    letter-spacing:'.$blog_button_letter_space.'px;
                    font-style:'.$blog_button_button_font_style.';
                    font-weight:'.$blog_button_button_font_weight.';
                }
                .standard-blog .readmore_button:hover, .search_post .readmore_button:hover, .slides_description .readmore_button:hover{
                    background-color:'.$blog_button_hover_bg_color.'!important;
                    color:'.$blog_button_hover_color.'!important;
                }
                .blog_post_content_wrapper .owl-dot span, .blog_single_img  .owl-dot span{
                    background-color:'.$blog_gallery_slider_buttons_color.'!important;
                }
                .blog_post_content_wrapper .owl-dot, .blog_single_img  .owl-dot{
                    border-color:'.$blog_gallery_slider_buttons_color.'!important;
                }
                .blog_post_content_wrapper .owl-dot.active span, .blog_post_content_wrapper .owl-dot:hover span, .blog_single_img  .owl-dot:hover span, .blog_single_img  .owl-dot.active span{
                    background-color:'.$blog_gallery_slider_active_buttons_color.'!important;
                }
                .blog_post_content_wrapper .owl-dot.active,  .blog_post_content_wrapper .owl-dot:hover, .blog_single_img .owl-dot.active, .blog_single_img .owl-dot:hover{
                    border-color:'.$blog_gallery_slider_active_buttons_color.'!important;
                }';
        /* Single Page */
        $css .= '.quote_format_text h4{
                    font-size:'.$blog_quote_section.'px;
                    letter-spacing:'.$blog_quote_font_letter_space.'px;
                    line-height:'.round((1.6 * $blog_quote_section)).'px;
                    font-style:'.$blog_quote_font_style.';
                    font-weight:'.$blog_quote_font_weight.'!important;
                }
                .quote_format_text h5{
                    font-size:'.$blog_quote_author_font_size.'px;
                    letter-spacing:'.$blog_quote_author_font_letter_space.'px;
                    line-height:'.round((1.6 * $blog_quote_author_font_size)).'px;
                    font-style:'.$blog_quote_author_font_style.';
                    font-weight:'.$blog_quote_author_font_weight.';
                }';
        $css .='.single_page_desription_comment_section .post_description_wrapper, .single_page_desription_comment_section .post_description_wrapper p, div#entry-author-info p, #mid_container_wrapper .relatedposts span, .blog_single_page_content_wrapper #comments .blog_single_page_content_wrapper #comments p, .single_page_desription_comment_section p, .single_page_desription_comment_section, .blog_single_page_content_wrapper .quote_format_text h6, #content_section #comments {
                    color:'.$blog_single_page_desc_color.';
                }
                .single_page_desription_comment_section h1, .single_page_desription_comment_section h2, .single_page_desription_comment_section h3, .single_page_desription_comment_section h4, .single_page_desription_comment_section h5, .single_page_desription_comment_section h6, .single_page_desription_comment_section .relatedposts h4 a, .blog_single_page_content_wrapper .quote_format_text h4{
                    color:'.$blog_single_page_title_color.'!important;
                }
                .single_page_desription_comment_section a, #content_section #comments .description a{
                    color:'.$blog_single_page_link_color.'!important;
                }
                 .single_page_desription_comment_section a:hover, .single_page_desription_comment_section .relatedposts h4 a:hover, #content_section #comments .description a:hover{
                    color:'.$blog_single_page_link_hover_color.'!important;
                }';        
        $css .='#singlepage_nav .nav_prev_item a, #singlepage_nav .nav_next_item a{
                    border:0px solid '.$next_prev_button_border_color.';
                    color:'.$next_prev_button_text_color.';
                    background:'.$next_prev_button_bg_color.';
                    letter-spacing:'.$next_prev_button_letter_sapcing.'px;
                    font-style:'.$next_prev_button_font_style.';
                    font-weight:'.$next_prev_button_font_weight.';
                }
                .nav_prev_item a::before{
                    border-top-color:'.$next_prev_button_bg_color.';  
                }
                .nav_next_item a::after{
                    border-bottom-color:'.$next_prev_button_bg_color.';  
                }
                 .nav_prev_item a:hover::before{
                    border-top-color:'.$next_prev_button_hover_bg_color.';  
                }
                .nav_next_item a:hover::after{
                    border-bottom-color:'.$next_prev_button_hover_bg_color.';  
                }
                #singlepage_nav .nav_prev_item a:hover, #singlepage_nav .nav_next_item a:hover{
                    border:0px solid '.$next_prev_button_hover_border_color.';
                    color:'.$next_prev_button_hover_text_color.';
                    background:'.$next_prev_button_hover_bg_color.';
                }'; 
        /* Comment Form Colors */
         $css .='div#comments textarea, div#comments input{
                    border:1px solid '.$comment_form_border_color.';
                    color:'.$comment_form_input_text.';
                }
                 #respond input.submit{
                    border:1px solid '.$comment_form_button_bg.';
                    background-color:'.$comment_form_button_bg.';
                    color:'.$comment_form_button_color.';
                    letter-spacing:'.$comment_form_button_letter_sapcing.'px;
                    font-style:'.$comment_form_button_font_style.';
                    font-weight:'.$comment_form_button_font_weight.';
                 }
                 #respond input.submit:hover, .error_404_page_wrapper .readmore_button:hover{
                        background:'.$comment_form_button_hover_bg.'!important;
                        color:'.$comment_form_button_hover_color.';
                 }
                  ol.commentlist li, .commentlist li ul.children{
                    border-color:'.$blog_single_page_comment_list_border_color.';
                }';     
        //Pagination
            $css .='span.page-numbers a, .woocommerce-pagination .page-numbers a, .pagination ul li a{      
                    background:'.$posts_pagination_bg.'!important;
                    color:'.$posts_pagination_link.'!important;
                }
                span.page-numbers.current, ul.page-numbers span.page-numbers.current, .woocommerce nav.woocommerce-pagination ul li a:hover, ul.page-numbers span.page-numbers, .pagination ul li a:hover{
                    background:'.$posts_pagination_active_bg.'!important;
                    color:'.$posts_pagination_active_link.'!important;
                }
                ul.page-numbers li.current_page, ul.page-numbers li:hover{
                    border: 1px solid '.$posts_pagination_active_bg.'!important;
                }
                ul.page-numbers li{
                    border: 1px solid '.$posts_pagination_bg.'!important;
                }';
        // Error Page Section 
        if( $upload_404_bg_img['404_page_bg'] ){ 
                $error_404_bg_image_repeat = ( $error_404_bg_repeat == 'cover' ) ? 'cover' : 'inherit';
                $css .='.error_page_bg_image{
                    background:url('.esc_url( $upload_404_bg_img['404_page_bg'] ).')!important;
                    background-size : '.$error_404_bg_image_repeat.'!important;
                    background-repeat : '.$error_404_bg_repeat.'!important;
                    background-position: '.$error_404_bg_position.'!important;
                }';
        }
        $css .='.error_404_page_wrapper h3.title_style2{
                    color:'.$title_color_404.'!important;
                }
                 .error_404_page_wrapper h3, .error_404_page_wrapper h4{
                    color:'.$title_color_404.'!important;
                }
                .error_404_page_wrapper .readmore_button{
                    background-color:'.$error_page_button_bg_color.'!important;
                    color:'.$error_page_button_color.'!important;
                    letter-spacing:'.$error_page_button_letter_sapcing.'px!important;
                    font-style:'.$error_page_button_font_style.'!important;
                    font-weight:'.$error_page_button_font_weight.'!important;
                    padding:12px 30px!important;
                 }
                  .error_404_page_wrapper .readmore_button:hover{
                    background-color:'.$error_page_button_hover_bg_color.'!important;
                    color:'.$error_page_button_hover_color.'!important;
                 }';
        /* Coming Soon Page Color */
        $css .='.coming_soon_banner_content h3.title_style1 , .coming_soon_banner_content p, .coming_soon_banner_content{
                    color:'.$coming_soon_page_title_color.';
                }
                .coming_soon_banner_content span.title_seperator::after{
                   border-color:'.$coming_soon_page_title_border_color.';
                }
                .coming_soon_banner_content span.title_seperator{
                    background-color:'.$coming_soon_page_title_border_color.';
                }
                .count_down_wrapper_border{
                    border-color:'.$coming_soon_date_bg_color.';
                }
                .coming_soon_date_color{
                    color:'.$coming_soon_date_color.'!important;
                }
                .countdown_wrapper{
                    color:'.$coming_soon_date_m_s_h_color.'!important;
                    background:'.$coming_soon_date_bg_color.'!important;
                }
                .coming_soon_social_media_icons ul li a{
                    background:'.$coming_soon_social_icons_bg_color.';
                    color:'.$coming_soon_social_icons_color.';
                }
                .coming_soon_social_media_icons ul li a:hover{
                    background:'.$coming_soon_social_icons_hover_bg_color.';
                    color:'.$coming_soon_social_icons_hover_color.';
                }';
        // Footer Section 
        $css .='.bottom_footer_bar_wrapper, .footer_social_sharing_icons ul{
                background:'.$footer_bg_color.';
            }
            .bottom_footer_bar_wrapper p, .bottom_footer_bar_wrapper{
                color:'.$footer_text_color.';
                font-size:'.$footer_text_font_size.'px;
                font-weight:'.$footer_text_font_weight.';
                font-style:'.$footer_text_font_style.';
                letter-spacing:'.$footer_text_letter_space.'px;
            }

            .bottom_footer_bar_wrapper ul li a, .bottom_footer_bar_wrapper a{
                color:'.$footer_text_link_color.';
                font-size:'.$footer_text_font_size.'px;
                letter-spacing:'.$footer_text_letter_space.'px;
            }
            .bottom_footer_bar_wrapper ul li a:hover, .bottom_footer_bar_wrapper a:hover{
                color:'.$footer_text_link_hover.';
            }';
        if( !empty($footer_border_top_color) ){
           $css .='.bottom_footer_bar_wrapper{
               border-bottom:1px solid '.$footer_border_top_color.'; 
            }'; 
        } 
        //Scroll Bar Color
        $css .= '.nicescroll-cursors{
            background:'.$scrollbar_color.'!important;
        }';
       //light box disable
    $css .= '.pp_nav{
            display:none!important;
        }';
        if( $lightbox_image_gallery_enable != '1' ){        
            $css .='.pp_gallery ul{
                        display:none;
                }';    
        }
        if( $lightbox_image_title_disable == '1' ){
            $css .= 'div.ppt{
                    display:none!important;
                }';
        }
        if( $lightbox_image_social_icons_enable != '1' ){
            $css .= '.pp_social{
                    display:none!important;
                }';
        }
      $css = preg_replace( '/\s+/', ' ', $css ); 
      echo "<style type=\"text/css\">\n" .trim( $css ). "\n</style>";
        }
        add_action('wp_head','petshop_kaya_custom_colors');
    }
    if( !function_exists('petshop_kaya_tgmpa_styles') ){
        function petshop_kaya_tgmpa_styles(){
            $css = '.tgmp_version{
                    float: right; padding: 0em 1.5em 0.5em 0;
                }
                .tgmpa_required_version{
                    min-width: 32px; text-align: right; float: right;
                }
                .tgm_plugin_style{
                    display: block; margin: 0.5em 0.5em 0 0; clear: both;
                }'; 
           $css = preg_replace( '/\s+/', ' ', $css ); 
          echo "<style type=\"text/css\">\n" .trim( $css ). "\n</style>";     
        }
        add_action('admin_head','petshop_kaya_tgmpa_styles');
    } ?>