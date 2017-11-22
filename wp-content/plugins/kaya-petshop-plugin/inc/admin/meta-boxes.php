<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
global $pf_slug_name, $meta_boxes;
$prefix = '';
$meta_boxes = array();
$kayaslider_array =get_terms('slider_category','hide_empty=1');
$kaya_slider = array();
$portfolio_terms=  get_terms('portfolio_category','');
	$kaya_portfolio_cat = array();
if( taxonomy_exists('slider_category') ){
	if(!empty($kayaslider_array)){
		foreach ($kayaslider_array as $sliders) {
		$kaya_slider[$sliders->slug] = $sliders->name;
		$sliders_ids[] = $sliders->slug;
		}
	}else{	}
}else{
 $kaya_slider = '';
}
$pf_slug_name = get_theme_mod('pf_slug_name') ? get_theme_mod('pf_slug_name') :'Model';
/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'page_title_settings',
	'title' => __('Page Title Options','petshop'),
	'pages' => array( 'page','post' ),
	'context' => 'normal',
	'priority' => 'high',
	// List of meta fields
	'fields' => array(
		array(
				'name'		=> __('Disable Page Title','petshop'),
				'id'		=> $prefix . "kaya_page_title_disable",
				'type'		=> 'checkbox',
				'std'		=> '',
				'class' 	=> 'kaya_page_title_disable',
		),

		)
);

/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => __('Custom Options','petshop'),
	'pages' => array( 'page','post','portfolio' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> __('Choose Subheader Style','petshop'),
			'id'		=> $prefix . "select_page_options",
			'class'     => 'select_page_options',
			'type'		=> 'select',
			'options'	=> array(
				'page_title_setion'		=> __('Page Title bar','petshop'),
				"page_slider_setion"	=> __("Header Slider",'petshop'),
				'video_bg' => __('Video Background','petshop'),
				'none' => __('None','petshop'),			
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Page Title','petshop'),
			'id'		=> $prefix . "select_page_title_option",
			'class'     => 'select_page_title_option',
			'type'		=> 'select',
			'options'	=> array(
				'default_page_title'		=> __('Default Page Title','petshop'),
				"custom_page_title"	=> __("Custom Page Title",'petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
				'name'		=> __('Custom Page Title','petshop'),
				'id'		=> $prefix . "kaya_custom_title",
				'class'     => 'kaya_custom_title',
				'type'		=> 'text',
				'std'		=> 'Enter page custom title',
				'std'		=> ''
		),
		array(
				'name'		=> __('Page Title Description','petshop'),
				'id'		=> $prefix . "kaya_custom_title_description",
				'class'     => 'kaya_custom_title_description',
				'type'		=> 'textarea',
				'std'		=> 'Enter page title description',
				'std'		=> '',
				'cols' => 20,
				'rows' => 1,
		),
		array(
			'name'		=> __('Select Header Slider Type','petshop'),
			'id'		=> $prefix . "slider",
			'class'     => 'slider',
			'type'		=> 'select',
			'options'	=> array(
				'kaya_post_slider' => __('Kaya Post Slider','petshop'),
				"customslider"	=> __("Slider Plugin Shortcode",'petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),

		array(
			'name'	=> __('Upload Images','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'page_slider_images',
			'class'     => 'page_slider_images',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 50,
		),
		/* array(
				'name'		=> 'Slide Image Opacity',
				'id'		=> $prefix . "slide_bg_image_opcaity",
				'type'		=> 'text',
				'desc'		=> 'Opacity values 0-1',
				'std'		=> '1'
		),

		array(
			'name' => 'Slide Background Color',
			'desc' => '',
			'id' => $prefix . 'slide_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),  */
		array(
			'name'		=> __('Slide Transition','petshop'),
			'id'		=> $prefix . "Kaya_slider_transitions",
			'class'     => 'Kaya_slider_transitions',
			'type'		=> 'select',
			'options'	=> array(
				'slide'  	=> 'Slide',
				"fade" 	=> "Fade",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		
		array(
			'name'		=> __('Auto Play','petshop'),
			'id'		=> $prefix . "Kaya_slider_auto_play",
			'class'     => 'Kaya_slider_auto_play',
			'type'		=> 'select',
			'options'	=> array(
				'4000'  => 'True',
				"0" 	=> "False",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'	=> __('Slide Transition','petshop'),
			'desc'	=> 'Slide trasition between two slides',
			'id'	=> "Kaya_slider_transitions_time",
			'class'     => 'Kaya_slider_transitions_time',
			'type'	=> 'text',
			'std' => '4000',
		),
		array(
			'name' => __('Slider Next & Prev Buttons Colors','petshop'),
			'desc' => '',
			'id' => $prefix . 'slide_button_color',
			'class'     => 'slide_button_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
	
		/* array(
			'name'	=> 'Slider Height',
			'desc'	=> 'px',
			'id'	=> "kaya_slider_height",
			'type'	=> 'text',
			'std' => '',
		), */
		/* Kaya Post Slider */
		array(
			'name'		=> __('Enable Fluid Slider','petshop'),
			'id'		=> $prefix . "enable_fluid_slider",
			'class'     => 'enable_fluid_slider',
			'type'		=> 'checkbox',
			'options'	=> '',
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Select Kaya Post Slider Category','petshop'),
			'id'		=> $prefix . "kaya_post_category",
			'class'     => 'kaya_post_category',
			'type'		=> 'checkbox_list',
			'options'	=> $kaya_slider,
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Slide Transition','petshop'),
			'id'		=> $prefix . "Kaya_post_slider_transitions",
			'class'     => 'Kaya_post_slider_transitions',
			'type'		=> 'select',
			'options'	=> array(
				'slide'  	=> 'Slide',
				"fade" 	=> "Fade",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name' => __( 'Slide Text Animation', 'petshop' ),
			'desc' => __('animation effects','petshop').'<a target="_blank" href="http://daneden.github.io/animate.css/"> '.__(' click here','petshop').'</a>',
			'id' => $prefix . 'slide_text_animate',
			'class'     => 'slide_text_animate',
			'type' => 'select',
			'options' => array(
					'bounce' => 'Bounce',
					'bounceIn'=> 'BounceIn',
					'bounceInLeft' => 'BounceInLeft',
					'bounceInUp' => 'BounceInUp',
					'bounceInDown' => 'BounceInDown',
					'bounceInRight' => 'BounceInRight',
					'fadeIn'=> 'fadeIn',
					'fadeInDownBig' => 'fadeInDownBig',
					'fadeInLeftBig' => 'fadeInLeftBig',
					'fadeInRightBig' => 'fadeInRightBig',
					'fadeInUpBig' => 'fadeInUpBig',
					'fadeInDown'=> 'fadeInDown',
					'fadeInLeft' => 'fadeInLeft',
					'fadeInRight' => 'fadeInRight',
					'fadeInUp' => 'fadeInUp',
					'flip'=> 'flip',
					'flipInX' => 'flipInX',
					'flipInY' => 'flipInY',
					'flipOutX' => 'flipOutX',
					'flipOutY' => 'flipOutY',
					'lightSpeedIn'=> 'lightSpeedIn',
					'lightSpeedOut' => 'lightSpeedOut',
					'rotateIn'=> 'rotateIn',
					'rotateInDownLeft' => 'rotateInDownLeft',
					'rotateInDownRight' => 'rotateInDownRight',
					'rotateInUpLeft' => 'rotateInUpLeft',
					'slideInDown'=> 'slideInDown',
					'slideInUp'=> 'slideInUp',
					'slideInLeft' => 'slideInLeft',
					'slideInRight' => 'slideInRight',
					'slideOutLeft' => 'slideOutLeft',
					'slideOutRight' => 'slideOutRight',
					'hinge'=> 'hinge',
					'rollIn' => 'rollIn',
					'rollOut' => 'rollOut',
					'zoomIn'=> 'zoomIn',
					'zoomInDown' => 'zoomInDown',
					'zoomInLeft' => 'zoomInLeft',
					'zoomInUp'=> 'zoomInUp',
					'zoomInRight' => 'zoomInRight',
					'flash' => 'flash',
					'pulse' => 'Pulse',
					'shake' => 'Shake',
					'tada' => 'Tada',
					'rubberBand' => 'RubberBand',
					'swing' => 'Swing',
					'wobble' => 'Wobble',
        	),
			'std' => 'fadeInUp'
		),
		array(
			'name'		=> __('Auto Play','petshop'),
			'id'		=> $prefix . "Kaya_post_slider_auto_play",
			'class'     => 'Kaya_post_slider_auto_play',
			'type'		=> 'select',
			'options'	=> array(
				'4000'  => 'True',
				"0" 	=> "False",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Loop','petshop'),
			'id'		=> $prefix . "post_slide_loop",
			'class'     => 'post_slide_loop',
			'type'		=> 'select',
			'options'	=> array(
				"true" 	=> __('True','petshop'),
				'false'  => __('False','petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'	=> __('Slide Transition','petshop'),
			'desc'	=> 'Slide trasition between two slides',
			'id'	=> "Kaya_post_slider_transitions_time",
			'class'     => 'Kaya_post_slider_transitions_time',
			'type'	=> 'text',
			'std' => '4000',
		),
		array(
			'name' => __('Slider Images Order by','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_images_order_by',
			'class'     => 'post_slide_images_order_by',
			'type' => 'select',
			'options' => array(
					'ID' => __('ID','petshop'),
					'menu_order' => __('Menu Order','petshop'),
					'title' => __('Title','petshop'),
				)
		),
		array(
			'name' => __('Slide Images Order','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_images_order',
			'class'     => 'post_slide_images_order',
			'type' => 'select',
			'options' => array(
					'DESC' => __('Descending Order','petshop'),
					'ASC' => __('Ascending Order','petshop'),
				)
		),
		
		array(
			'name' => __('Slider Next & Prev Buttons','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_disable',
			'class'     => 'post_slide_button_disable',
			'type' => 'select',
			'options' => array(
					'true' => __('Enable','petshop'),
					'false' => __('Disable','petshop'),
				)
		),
		
		array(
			'name' => __('Slider Nav Buttons BG Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_bg_color',
			'class'     => 'post_slide_button_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Nav Buttons Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_text_color',
			'class'     => 'post_slide_button_text_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name' => __('Slider Nav Buttons Hover BG Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slides_button_hover_bg_color',
			'class'     => 'post_slides_button_hover_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Nav Buttons Hover Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_button_hover_text_color',
			'class'     => 'post_slide_button_hover_text_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name' => __('Slider Dots Navigation Buttons','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_nav_disable',
			'class'     => 'post_slide_nav_disable',
			'type' => 'select',
			'options' => array(
					'true' => __('Enable','petshop'),
					'false' => __('Disable','petshop'),
				)
		),
		array(
			'name' => __('Slider Dot Nav Buttons Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_nav_button_bg_color',
			'class'     => 'post_slide_nav_button_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Dot button Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'slider_dot_button_color',
			'class'     => 'slider_dot_button_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name' => __('Slider Dot Active Button Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'slider_dot_active_button_color',
			'class'     => 'slider_dot_active_button_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name'	=> __('Slider Height','petshop'),
			'id'	=> "kaya_slider_height",
			'class'     => 'kaya_slider_height',
			'type' => 'slider',
			'suffix' => __( 'px', 'petshop' ),
			'js_options' => array(
				'min' => 400,
				'max' => 1000,
				'step' => 1,
			),
			'std' => '500',
		),
	/* Custom Slider */
		array(
			'name'		=> 	__('Slider Shortcode','petshop'),
			'id'		=> 	$prefix . 'customslider_type',
			'class'     => 'customslider_type',
			'type'		=> 'text',
			'desc' 		=> 'Ex: [customslider shortcode_name]'
			),
	/* Video Background */
		array(
			'name'		=> __('Select Video Type','petshop'),
			'id'		=> $prefix . 'select_video_bg_type',
			'class'     => 'select_video_bg_type',
			'type'		=> 'select',
			'options' => array(
			'youtube_video' => 'Youtube Video ID',
			'video_webm' => 'WEBM / MP4 Video Url'
			),
			'desc' => ''
			),
		array(
			'name'		=> __('Video Background ID','petshop'),
			'id'		=> $prefix . 'video_bg_id',
			'class'     => 'video_bg_id',
			'type'		=> 'text',
			'desc' => __('Ex: ','petshop').'kuceVNBTJio'
			),
		array(
			'name'		=> __('Video WEBM URL','petshop'),
			'id'		=> $prefix . 'video_bg_webm',
			'class'     => 'video_bg_webm',
			'type'		=> 'text',
			'desc' => ''
			),
		array(
			'name'	=> __('Video MP4 URL','petshop'),
			'id'	=> $prefix . 'video_bg_mp4',
			'class'     => 'video_bg_mp4',
			'type'	=> 'text',
			'desc'  => ''
			),
		array(
			'name'	=> __('Video OGG URL','petshop'),
			'id'	=> $prefix . 'video_bg_ogg',
			'class'     => 'video_bg_ogg',
			'type'	=> 'text',
			'desc' 	=> ''
			),
		array(
				'name'		=> __('Video Background Opacity','petshop'),
				'id'		=> $prefix . "bg_video_opcaity",
				'class'     => 'bg_video_opcaity',
				'type' 		=> 'slider',
				'js_options' => array(
					'min' 		=> 0,
					'max' 		=> 1,
					'step'		=> 0.1,
			),
			'std' => '1',
		),
		array(
			'name' => __('Video Background Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'video_bg_color',
			'class'     => 'video_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
		array(
			'name'		=> __('Video Description','petshop'),
			'id'		=> $prefix . 'video_bg_description',
			'class'     => 'video_bg_description',
			'type'		=> 'textarea',
			'desc' => '&lt;h2 style=&quot;color:#fff; font-size:3.5em; line-height:100%; font-weight: bold;&quot;&gt;&lt;span class=&quot;accent&quot;&gt;&lt;/span&gt; VIDEO BACKGROUND&lt;/h2&gt;'
			),	
		array(
			'name'		=> __('Video Height','petshop'),
			'id'		=> $prefix . 'video_bg_height',
			'class'     => 'video_bg_height',
			'type' => 'slider',
			'suffix' => __( 'px', 'petshop' ),
			'js_options' => array(
				'min' => 250,
				'max' => 1000,
				'step' => 1,
			),
			'std' => '500',
			),
		array(
			'name'		=> __('Upload  Video Background Image','petshop'),
			'id'		=> $prefix . "fullscreen_video_img",
			'type'		=> 'image_advanced',
			'std'		=>'',
			'desc'		=> '',
			'max_file_uploads' => 1,
			'class'   =>'fullscreen_video_img',
		),
	)
);

/* ----------------------------------------------------- */
// Team Layout Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'my-team-settings',
	'title' => 'Team Page Section',
	'pages' => array( 'team' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Team Designation','petshop'),
			'desc' => '',
			'id' => $prefix . 'team_designation',
			'type' => 'text',
			'std'	=> 'Managing Director',
			),
		array(
			'name' => __('Description','petshop'),
			'desc' => '',
			'id' => $prefix . 'team_description',
			'type' => 'textarea',
			'std'	=> '',
			),
			
	)

);
/* ----------------------------------------------------- */
// Team page Layout Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'my-team--social-icons-settings',
	'title' => 'Social Media Icons Section',
	'pages' => array( 'team' ),
	'context' => 'normal',
		'fields' => array(
		// Awesome Icons
		// Icon Images
		array(
			'name' => __('Awesome Icon - 1','petshop'), // Awesome Icon
			'desc' => __('Ex:fa-facebook','petshop'),
			'id' => $prefix . 'social_awesome_icon_1',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'name' => 'Icon Link - 1',
			'desc' => __('Ex:http://www.facebook.com/yourfacebookid','petshop'),
			'id' => $prefix . 'social_media_link_1',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 2','petshop'),   // Awesom Icon 
			'desc' => __('Ex:fa-twitter','petshop'),
			'id' => $prefix . 'social_awesome_icon_2',
			'type' => 'text',
			'std'	=> '',
		),
		
		array(
			'name' => 'Icon Link - 2',
			'desc' => __('Ex:http://www.twitter.com/yourtwitterid','petshop'),
			'id' => $prefix . 'social_media_link_2',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 3','petshop'),   // Awesom Icon 
			'desc' => __('Ex:fa-google-plus','petshop'),
			'id' => $prefix . 'social_awesome_icon_3',
			'type' => 'text',
			'std'	=> '',
		),
		
		array(
			'name' => 'Icon Link - 3',
			'desc' => __('Ex:https://plus.google.com/Yourid','petshop'),
			'id' => $prefix . 'social_media_link_3',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 4','petshop'),   // Awesom Icon 
			'desc' => __('Ex:fa-linkedin','petshop'),
			'id' => $prefix . 'social_awesome_icon_4',
			'type' => 'text',
			'std'	=> '',
		),
		
		array(
			'name' => 'Icon Link - 4',
			'desc' => __('Ex:http://www.linkedin.com/profile/qa?id=yourid','petshop'),
			'id' => $prefix . 'social_media_link_4',
			'type' => 'text',
			'std'	=> '',
		),
		array(
			'type' => 'divider',
			'id' => 'icon_divider', 
		),
		array(
			'name' => __('Awesome Icon - 5','petshop'),   // Awesom Icon 
			'desc' => __('Ex:fa-pinterest','petshop'),
			'id' => $prefix . 'social_awesome_icon_5',
			'type' => 'text',
			'std'	=> '',
		),
		
		array(
			'name' => 'Icon Link - 5',
			'desc' => __('Ex:http://www.pinterest.com/yourid','petshop'),
			'id' => $prefix . 'social_media_link_5',
			'type' => 'text',
			'std'	=> '',
		),

	)

);
/* ----------------------------------------------------- */
// Video Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_post_format_video',
	'title' => __('Video','petshop'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(

		array(
			'name' 	=> 	__('Add Iframe Video','petshop'),
			'id' 	=> 	$prefix . 'post_video',
			'type'	=> 	'textarea',
			'desc' 	=> 	'&lt;iframe width=&quot;100%&quot; height=&quot;315&quot; src=&quot;//www.youtube.com/embed/keDneypw3HY&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;',
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Gallery
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'kaya_post_format_gallery',
	'title'		=> __('Gallery Format','petshop'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Post Format Gallery','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'post_gallery',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 500,
		),
		)
);
/* ----------------------------------------------------- */
// Quote Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_quote_format_quote',
	'title' => 'Quote Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	__('Quote','petshop'),
			'id' 	=> 	$prefix . 'kaya_quote_desc',
			'type'	=> 	'textarea',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),
	)
);
/* ----------------------------------------------------- */
// Audio Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_audio_format',
	'title' => 'Audio Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	'Audio URL(mp3)',
			'id' 	=> 	$prefix . 'kaya_audio',
			'type'	=> 	'textarea',
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Link Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_link_format',
	'title' => 'Link Format',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	'Link',
			'id' 	=> 	$prefix . 'kaya_link',
			'type'	=> 	'text',
			'desc' 	=> 	__('http://www.google.com','petshop'),
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'slider-customlink',
	'title'		=> 'SLIDER SETTINGS',
	'pages'		=> array( 'slider' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name'	=> __('Slide Image','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'post_slide_image',
			'class' => 'post_slide_image',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => __('Slide Text','petshop'),
			'desc' => 'Ex: &lt;h3 style="font-size: 60px;color: #252525;margin-bottom: 30px;"&gt;DOG FOOD&lt;/h3&gt;
				&lt;h1 style="font-size: 80px;font-weight: bold;color: #252525;margin-bottom: 50px;"&gt;Save Up to &lt;span style="color:#c38749;"&gt;80%&lt;/span&gt;&lt;/h1&gt;
				&lt;h3 style="font-size: 50PX;color: #252525;margin-bottom: 40px;"&gt;NEW ARRIVALS&lt;/h3&gt;
				&lt;a href="#" class="readmore_button"&gt;SHOP NOW&lt;/a&gt;',
			'id' => $prefix . 'slider_image_description',
			'type' => 'textarea',
			'std' => ''
		),

		array(
			'name'		=> __('Slide Text Position','petshop'),
			'id'		=> $prefix . "slide_title_desc_align",
			'class' => 'slide_title_desc_align',
			'type'		=> 'select',
			'options'	=> array(
				'center' => __('Center','petshop'),
				'left' => __('Left','petshop'),
				"right"	=> __('Right','petshop'),
												
			),
			'multiple'	=> false,
			'std'		=> 'center',
			'desc'		=> ''
		),
		)
	);


/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'testimonial-settngs',
	'title'		=> __('Testimonial Settings','petshop'),
	'pages'		=> array( 'testimonial' ),
	'context' => 'normal',
	'fields'	=> array(
	array(
			'name' => __('Description','petshop'),
			'desc' => '',
			'id' => $prefix . 'testimonial_description',
			'type' => 'textarea',
			'std' => ''
		),
	    array(
			'name' => __('Designation','petshop'),
			'desc' => 'Ex:Creative Director',
			'id' => $prefix . 't_client_designation',
			'type' => 'text',
			'std' => ''
		),
		)
	);
/* ----------------------------------------------------- */
// Client Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'client-settngs',
	'title'		=> __('Client Settings','petshop'),
	'pages'		=> array( 'client' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name' => __('Description','petshop'),
			'desc' => '',
			'id' => $prefix . 'client_description',
			'type' => 'textarea',
			'std' => ''
		),
		array(
			'name' => __('Custom Link','petshop'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 'client_link',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Open New Window','petshop'),
			'id' => $prefix . 'client_target_link',
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		)
	);
/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function kaya_petshop_register_meta_boxes()
{
	global $meta_boxes;
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
add_action( 'admin_init', 'kaya_petshop_register_meta_boxes' );
/* ----------------------------------------------------- */
// Model Details Information
/* ----------------------------------------------------- */
add_filter( 'rwmb_meta_boxes', 'kaya_petshop_pf_register_meta_boxes' );
function kaya_petshop_pf_register_meta_boxes( $meta_boxes ){
	global $pf_slug_name;
	$meta_boxes[] = array(
		'id' => 'portfolio_model_options',
		'title' => ucfirst($pf_slug_name).' '.__('Details','petshop'),
		'pages' => array( 'portfolio' ),
		'priority' => 'high',
		'context' => 'normal',
			'fields' => array(

		)
	);
 return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'kaya_petshop_pf_edit_meta_boxes', 20 );
function kaya_petshop_pf_edit_meta_boxes( $meta_boxes )
{
    foreach ( $meta_boxes as $k => $meta_box )
    {
        if ( isset( $meta_box['id'] ) && 'portfolio_model_options' == $meta_box['id'] )
        {
        	$options = get_option('pf_custom_options');
            if( !empty($options['pf_meta_field_name']) ){
            	$prefix = 'pf_model_';
	            $count=count($options['pf_meta_field_name']);
	            unset($options['pf_meta_label_name'][0]);
				for ($i=0; $i < ( count($options['pf_meta_field_name'])-1); $i++){
					 if( ( !empty($options['pf_meta_label_name'][$i]) ) &&  ( $options['pf_meta_label_name'][$i] != 'Array') &&  ( $options['pf_meta_label_name'][$i] != '') &&  ( !is_array($options['pf_meta_label_name'][$i]) )){	
					$id = str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($options['pf_meta_label_uid'][$i])));
					//unset($options['pf_meta_label_name'][0]);
					//unset($options['pf_meta_field_name'][0]);
					if( $options['pf_meta_field_name'][$i] == 'select' ){
						$type="select";
						$data_values = kaya_explode_data($options['pf_meta_field_options'][$i]);
						$data_keys = kaya_explode_data($options['pf_meta_field_options'][$i]);
						$data_keys = str_replace("'", ".", $data_keys);
						$data_keys = explode(',', trim($data_keys));
						$data_values = explode(',', trim($data_values));
						$array = array_filter(array_combine($data_keys, $data_values));
						$placeholder =__('Select Option','petshop');
						$class ='';
					}elseif( $options['pf_meta_field_name'][$i] == 'checkbox' ){
						$type="checkbox_list";
						$data_values = kaya_explode_data($options['pf_meta_field_options'][$i]);
						$data_keys = kaya_explode_data($options['pf_meta_field_options'][$i]);
						$data_keys = str_replace("'", ".", trim($data_keys));
						$data_keys = explode(',', trim($data_keys));
						$data_values = explode(',', trim($data_values));
						$array = array_filter(array_combine($data_keys, $data_values));
						$placeholder ='';
						$class ='';
					}elseif( $options['pf_meta_field_name'][$i] == 'date' ){
						$type="text";
						$array = '';
						if( $options['pf_meta_field_date_format'][$i] == 'y_m_d' ){
							$placeholder = 'YYYY-DD-MM';
						}elseif( $options['pf_meta_field_date_format'][$i] == 'm_d_y' ){
							$placeholder = 'MM-DD-YYYY';
						}elseif( $options['pf_meta_field_date_format'][$i] == 'd_m_y' ){
							$placeholder = 'DD-MM-YYYY';
						}else{
							$placeholder = 'YYYY-DD-MM';
						}
						$class = $prefix.'age_cal';
						$options_data_id = $prefix.str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($options['pf_meta_label_uid'][$i])));
						$meta_data = get_post_meta(get_the_ID(), $options_data_id , true);
						$option_data = julia_kaya_dob_cal($meta_data, $options['pf_meta_field_date_format'][$i]);
					}else{
						$type= $options['pf_meta_field_name'][$i];
						$array = '';
						$placeholder ='';
						$class ='';
					}	

	                $meta_boxes[$k]['fields'][] = array(
		                'name' => $options['pf_meta_label_name'][$i],
		                'id'   => $prefix.$id,
		                'type' => $type,
		                'options' => $array,
		                'placeholder' => $placeholder,
		                'class' => $class,
	            	);
	                if( $options['pf_meta_field_name'][$i] == 'date' ){
		                $meta_boxes[$k]['fields'][] = array(
			                'name' => '&nbsp;',
			                'id'   => $prefix.$id.'_diff',
			                'type' => 'hidden',
			                'class' => $prefix.'age_data',
			                'std' => $option_data,
		            	);
		            }

	            }
		        }        
	        }else{
	        	
	        } 
        }
    }
    // Return edited meta boxes
    return $meta_boxes;
}