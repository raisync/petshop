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
		array(
			'name'		=> __('Page Title','petshop'),
			'id'		=> $prefix . "select_page_title_option",
			'type'		=> 'select',
			'options'	=> array(
				'default_page_title'		=> __('Default Page Title','petshop'),
				"custom_page_title"	=> __("Custom Page Title",'petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> '',
			'class' 	=> 'select_page_title_option',
		),
		array(
				'name'		=> __('Custom Page Title','petshop'),
				'id'		=> $prefix . "kaya_custom_title",
				'type'		=> 'text',
				'std'		=> '',
				'class' 	=> 'kaya_custom_title',
		),
		// Page title bg styles
		array(
			'name'		=> __('Display Page Title bar BG Image / Color','petshop'),
			'id'		=> $prefix . "page_title_bar_styles",
			'type'		=> 'select',
			'options'	=> array(
				'theme_customizer' => __('Theme Customizer','petshop'),
				"page_custom_styles"	=> __("Custom Settings",'petshop'),
			),
			'desc'		=> '',
			'class' 	=> 'page_title_bar_styles',
		),
		array(
			'name'		=> __('Select Page Title bar Settings','petshop'),
			'id'		=> $prefix . "page_title_bar_settings",
			'type'		=> 'select',
			'options'	=> array(
				'page_titlebar_bg_img' => __('Page Title bar BG Image','petshop'),
				"page_titlebar_bg_color"	=> __("Page Title bar BG Color",'petshop'),
			),
			'desc'		=> '',
			'class'	=> 'page_title_bar_settings',
		),
		array(
			'name'	=> __('Page Title Background Image','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'page_title_bar_bg_image',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
			'class'	=> 'page_title_bar_bg_image',
		),
		array(
			'name'		=> __('Background Image','petshop'),
			'id'		=> $prefix . "page_title_bg_img_repeat",
			'type'		=> 'select',
			'options'	=> array(
				'no-repeat' => __('No Repeat','petshop'),
				"repeat"	=> __("Repeat",'petshop'),
				"cover"	=> __("Cover",'petshop'),
			),
			'desc'		=> '',
			'class' 	=> 'page_title_bg_img_repeat',
		),
		array(
			'name'	=> __('Page Title Background Color','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'page_title_bar_bg_color',
			'type'	=> 'color',
			'class' 	=> 'page_title_bar_bg_color',
		),
		array(
			'name'	=> __('Page Title Color','petshop'),
			'desc'	=> '',
			'id'	=> $prefix . 'page_title_bar_title_color',
			'type'	=> 'color',
			'class' 	=> 'page_title_bar_title_color',
		),

		)
);

$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => __('Page Background Options','petshop'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	// List of meta fields
	'fields' => array(
		array(
			'name'		=> __('Choose Subheader Style','petshop'),
			'id'		=> $prefix . "select_page_options",
			'type'		=> 'select',
			'options'	=> array(
				'none' => __('None','petshop'),
				"page_slider_setion"	=> __("Header Slider",'petshop'),
				'video_bg' => __('Video Background','petshop'),			
			),
			'multiple'	=> false,
			'class' 	=> 'select_page_options',
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		// Slider Section
		array(
			'name'		=> __('Select Slider Type','petshop'),
			'id'		=> $prefix . "kaya_slider_type",
			'class' 	=> 'kaya_slider_type',
			'type'		=> 'select',
			'options'	=> array(
				'kaya_post_slider' => __('Kaya Post Slider','petshop'),
				"customslider"	=> __("Slider Plugin Shortcode",'petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		/* Kaya Post Slider */
		array(
			'name'		=> __('Select Kaya Post Slider Category','petshop'),
			'id'		=> $prefix . "kaya_post_category",
			'class' 	=> 'kaya_post_category',
			'type'		=> 'checkbox_list',
			'options'	=> $kaya_slider,
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Auto Play','petshop'),
			'id'		=> $prefix . "Kaya_post_slider_auto_play",
			'class' 	=> 'Kaya_post_slider_auto_play',
			'type'		=> 'select',
			'options'	=> array(
				'true'  => 'True',
				"false" 	=> "False",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Slide Animation Type','petshop'),
			'id'		=> $prefix . "Kaya_post_slide_animation_type",
			'class' 	=> 'Kaya_post_slide_animation_type',
			'type'		=> 'select',
			'options'	=> array(
				'1' => __('Fade', 'petshop'),
				'2' => __('Slide Top', 'petshop'),
				'3' => __('Slide Right', 'petshop'),
				'4' => __('Slide Bottom', 'petshop'),
				'5' => __('Slide Left', 'petshop'),
				'6' => __('Carousel Right', 'petshop'),
				'7' => __('Carousel Left', 'petshop'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name' => __('Slider Images Order by','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_images_order_by',
			'class' 	=> 'post_slide_images_order_by',
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
			'class' 	=> 'post_slide_images_order',
			'type' => 'select',
			'options' => array(
					'DESC' => __('Descending Order','petshop'),
					'ASC' => __('Ascending Order','petshop'),
				)
		),
		array(
			'name' => __('Slider Nav Buttons Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_buttons_color',
			'class' 	=> 'post_slide_buttons_color',
			'type' => 'color',
			'std' => '#ffffff'
		),
		array(
			'name' => __('Slider Nav Buttons Active Color','petshop'),
			'desc' => '',
			'id' => $prefix . 'post_slide_buttons_active_color',
			'class' 	=> 'post_slide_buttons_active_color',
			'type' => 'color',
			'std' => '#f49c41'
		),
	/* Custom Slider */
		array(
			'name'		=> __('Slider Shortcode','petshop'),
			'id'		=> $prefix . 'customslider_type',
			'class' 	=> 'customslider_type',
			'type'		=> 'text',
			'desc' => 'Ex: [customslider shortcode_name]'
			),
	/* Video Background */
		array(
			'name'		=> __('Video Background ID','petshop'),
			'id'		=> $prefix . 'video_bg_id',
			'type'		=> 'text',
			'class' 	=> 'video_bg_id',
			'desc' => __('Ex: ','petshop').'kuceVNBTJio'
			),
		array(
			'name'		=> __('Video WEBM URL','petshop'),
			'id'		=> $prefix . 'video_bg_webm',
			'class' 	=> 'video_bg_webm',
			'type'		=> 'text',
			'desc' => ''
			),
		array(
			'name'	=> __('Video MP4 URL','petshop'),
			'id'	=> $prefix . 'video_bg_mp4',
			'class' 	=> 'video_bg_mp4',
			'type'	=> 'text',
			'desc'  => ''
			),
		array(
			'name'	=> __('Video OGG URL','petshop'),
			'id'	=> $prefix . 'video_bg_ogg',
			'class' 	=> 'video_bg_ogg',
			'type'	=> 'text',
			'desc' 	=> ''
			),
		array(
				'name'		=> __('Video Background Opacity','petshop'),
				'id'		=> $prefix . "bg_video_opcaity",
				'type' 		=> 'slider',
				'class' 	=> 'bg_video_opcaity',
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
			'class' 	=> 'video_bg_color',
			'type' => 'color',
			'std' => '#333333'
		),
	)
);
/* ----------------------------------------------------- */
// POrtfolio Info Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_model_images',
	'title' => __('Images', 'petshop'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Images Tab Title','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_tab1_title_name',
			'type'	=> 'text',
			'std' => __('PORTFOLIO','petshop'),
		),	
		array(
			'name' => __('Upload Images','petshop'),
			'desc' => '',
			'id' => $prefix . 'upload_pf_tab1_images',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 500,
		),
		array(
			'name' => __('Enable Gallery','petshop'),
			'id' => $prefix . 'pf_gallery_tab1_images',
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		array(
			'name'		=> __('Select Columns','petshop'),
			'id'		=> $prefix . "pf_tab1_images_columns",
			'type'		=> 'select',
			'options'	=> array(
				'5'		=> __('5Column','petshop'),
				"4"	=> __("4Column",'petshop'),
				"3"	=> __("3Column",'petshop'),
				"2"	=> __("2Column",'petshop'),
			),
			'std' => '4',
		),
		array(
				'name'       => __( 'Images Height', 'petshop'),
				'id'		=> $prefix . "pf_tab1_images_height",
				'type'       => 'slider',
				'suffix'     => __( 'px', 'petshop'),
				'std' => '500',
				'js_options' => array(
					'min'  => 400,
					'max'  => 1000,
					'step' => 1,
				),
			),
	)
);
$meta_boxes[] = array(
	'id' => 'portfolio_model_videos',
	'title' => __('Videos', 'petshop'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Videos Tab Title','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_videos_tab_name',
			'type'	=> 'text',
			'std' => __('VIDEOS','petshop'),
		),
		array(
			'name' => __('Custom Video Iframe','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_custom_video_urls',
			'type'	=> 'textarea',
			'clone' => true
		),
		array(
			'name'		=> __('Select Columns','petshop'),
			'id'		=> $prefix . "pf_videos_columns",
			'type'		=> 'select',
			'options'	=> array(
				'5'		=> __('5Column','petshop'),
				"4"	=> __("4Column",'petshop'),
				"3"	=> __("3Column",'petshop'),
				"2"	=> __("2Column",'petshop'),
			),
			'std' => '4',
		),
		
	)
);
$meta_boxes[] = array(
	'id' => 'portfolio_model_biography',
	'title' => __('Biography', 'petshop'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Biography Tab Title','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_short_desc_tab_title',
			'type'	=> 'text',
			'std' => __('Biography','petshop'),
		),	
		array(
			'name' => __('Short Description','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_model_short_biography',
			'type'	=> 'wysiwyg',
			'options' => array(
					'textarea_rows' => 8,
				),
		),
		array(
				'id' => 'pf_model_short_biography_divider',
				'type' => 'divider',
			),
		array(
			'name' => __('Experience','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_model_experience',
			'type'	=> 'wysiwyg',
			'options' => array(
					'textarea_rows' => 8,
				),
		),
		array(
				'id' => 'pf_model_short_exp_divider',
				'type' => 'divider',
			),
		array(
			'name' => __('Talents','petshop'),
			'desc' => '',
			'id' => $prefix . 'pf_model_talents',
			'type'	=> 'wysiwyg',
			'options' => array(
					'textarea_rows' => 8,
				),
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
			'name'	=> __('Slide Image','petstore'),
			'desc'	=> '',
			'id'	=> $prefix . 'post_slide_image',
			'class' => 'post_slide_image',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name' => __('Slide Text','petstore'),
			'desc' => '',
			'id' => $prefix . 'slider_description',
			'type' => 'textarea',
			'std' => ''
		),
		array(
			'name'		=> __('Slide Text Position','petstore'),
			'id'		=> $prefix . "slide_title_desc_align",
			'class' => 'slide_title_desc_align',
			'type'		=> 'select',
			'options'	=> array(
				'center' => __('Center','petstore'),
				'left' => __('Left','petstore'),
				"right"	=> __('Right','petstore'),
												
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
function kaya_register_meta_boxes()
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
add_action( 'admin_init', 'kaya_register_meta_boxes' );
/* ----------------------------------------------------- */
// Model Details Information
/* ----------------------------------------------------- */
add_filter( 'rwmb_meta_boxes', 'portfolio_register_meta_boxes' );
function portfolio_register_meta_boxes( $meta_boxes ){
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
add_filter( 'rwmb_meta_boxes', 'pf_edit_meta_boxes', 20 );
function pf_edit_meta_boxes( $meta_boxes )
{
    foreach ( $meta_boxes as $k => $meta_box )
    {
        if ( isset( $meta_box['id'] ) && 'portfolio_model_options' == $meta_box['id'] )
        {
        	$options = get_option('pf_custom_options');
            if( !empty($options['pf_meta_field_name']) ){
            	$prefix = 'pf_model_';
	            $count=count($options['pf_meta_field_name']);
				for ($i=0; $i < ( count($options['pf_meta_field_name'])-1); $i++){
					 if( ( !empty($options['pf_meta_label_name'][$i]) ) &&  ( $options['pf_meta_label_name'][$i] != 'Array') &&  ( $options['pf_meta_label_name'][$i] != '') &&  ( !is_array($options['pf_meta_label_name'][$i]) )){	
					$id = str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($options['pf_meta_label_name'][$i])));
					if( $options['pf_meta_field_name'][$i] == 'select' ){
						$type="select1";
						$array = explode('|',trim($options['pf_meta_field_options'][$i]));
					}elseif( $options['pf_meta_field_name'][$i] == 'checkbox' ){
						$type="checkbox_list";
						$array = explode('|',trim($options['pf_meta_field_options'][$i]));
					}else{
						$type= $options['pf_meta_field_name'][$i];
						$array = '';
					}					
	                $meta_boxes[$k]['fields'][] = array(
		                'name' => $options['pf_meta_label_name'][$i],
		                'id'   => $prefix.$id,
		                'type' => $type,
		                'options' => $array,
	            	);
	            }
		        }        
	        }else{
	        	
	        } 
        }
    }
    // Return edited meta boxes
    return $meta_boxes;
}