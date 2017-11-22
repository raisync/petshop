<?php
get_template_part('lib/includes/customizer/customizer_controlls');
//Body Background
$kaya_petshop_customze_note_settings = array(
	'strong' => array(
	'class' => array()
	),
);
/*---------------------------------------------------------------------------
 Header Section
-----------------------------------------------------------------------------*/
function petshop_kaya_header_settings_section( $wp_customize ) {
	$wp_customize->add_section(
	'header_color_section',
	array(
		'title' => esc_html__( 'Header & Slider Bg Settings', 'petshop'),
		'priority'       => 50,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		'description' => '',
	));
		$wp_customize->add_setting( 'select_header_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_header_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petshop'),
        'section' => 'header_color_section',
        'choices' => array(
        	 'bg_type_color' => __('Background Color','petshop'),
        	 'bg_type_image' => __('Background Image','petshop'),
        	),
		'priority' => 7,
    ));
  $wp_customize->add_setting('upload_header[bg_image]', array(
        'default'           => 'bg_type_color',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        //'type'           => 'option',
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Imageupload_Control($wp_customize, 'bg_image', array(
        'label'    => __('Header Background Image', 'petshop'),
        'section'  => 'header_color_section',
        'settings' => 'upload_header[bg_image]',
		'priority' => 8
    )));
    $wp_customize->add_setting('header_bg_img_repeat',array(
		'deafult' => 'repeat',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('header_bg_img_repeat',	array(
		'label' => __('Background Repeat', 'petshop'),
		'capability' => 'edit_theme_options', 
		'section' => 'header_color_section',
		'priority' => 9,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => __('No Repeat','petshop'),
			'repeat' => __('Repeat', 'petshop'),
			'cover'	=> __('Cover','petshop'),
			)
		));
	$wp_customize->add_setting( 'header_background_color',array( 
		'default' => '#006b95',
		'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(			
		'label' => esc_html__('Header Background Color', 'petshop'),
		'section' => 'header_color_section',
		'priority' => 10,
		'type' => 'color',
	)));
}
add_action( 'customize_register', 'petshop_kaya_header_settings_section'); // End
function petshop_kaya_top_header_settings( $wp_customize ) {
	$wp_customize->add_section(
	'top_header_section',
	array(
		'title' => esc_html__( 'Top Header Settings', 'petshop'),
		'priority'       =>10,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
	$wp_customize->add_setting( 'top_header_left_section', array(
		'default' => esc_html__('', 'petshop'),
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	));
  	$wp_customize->add_control(new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'top_header_left_section', array(
		'label'    => esc_html__( 'Header Top Left Section', 'petshop'),
		'section'  => 'top_header_section',
		'settings' => 'top_header_left_section',
		'priority' => 10,
		'type' => 'text',
	)));

	$wp_customize->add_setting( 'top_header_right_section', array(
		'default' => esc_html__('', 'petshop'),
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	));
  	$wp_customize->add_control(new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'top_header_right_section', array(
		'label'    => esc_html__( 'Header Top Right Section', 'petshop'),
		'section'  => 'top_header_section',
		'settings' => 'top_header_right_section',
		'priority' => 20,
		'type' => 'text',
	)));

 $colors[] = array(
		'slug'=>'top_header_text_color',
		'priority' => 22,
		'default' => '#363636',
		'label' => esc_html__('Text Color', 'petshop'),
	);
    $colors[] = array(
		'slug'=>'top_header_text_hover_color',
		'priority' => 23,
		'default' => '#ffffff',
		'label' => esc_html__('Text Hover Color', 'petshop'),
	);
	$wp_customize->add_setting( 'socialmediaicons_subbtitle', array(
      'sanitize_callback' => 'text_filed_sanitize',
    ) );
  $wp_customize->add_control(
    new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'socialmediaicons_subbtitle', array(
      'label'    => __( 'Social Icons Settings', 'spasaloon' ),
      'section'  => 'top_header_section',
      'settings' => 'socialmediaicons_subbtitle',
      'priority' => 24
    )));
 $src=get_template_directory_uri() . '/images/social_icons';
  $wp_customize->add_setting('social_icon1[upload_social_icon1]', array(
      'default'           => $src.'/facebbook.png',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'type'           => 'option',
      'transport' => ''
  ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_social_icon1', array(
        'label'    => __('Upload Social Icon1', 'lavan'),
        'section'  => 'top_header_section',
        'settings' => 'social_icon1[upload_social_icon1]',
    'priority' => 25
    )));
    $wp_customize->add_setting(
    'right_social_icon_link1',
    array(
        'default' => '',
    ));
  $wp_customize->add_control(
    'right_social_icon_link1',
    array(
        'label' => __('Social Icon1 Link','lavan'),
         'section'  => 'top_header_section',
        'type' => 'text',
        'priority' => 26,
    ));
 $wp_customize->add_setting(  'icon_image_link');
    $wp_customize->add_control(
    new Petshop_Kaya_Customize_Description_Control( 
      $wp_customize, 'icon_image_link', array(
      'label'    => 'http://www.socialmedia.com/userid',
      'section'  => 'top_header_section',
      'settings' => 'icon_image_link',
      'priority' => 27,
    )));
$src=get_template_directory_uri() . '/images/social_icons';
  $wp_customize->add_setting('social_icon2[upload_social_icon2]', array(
      'default'           => $src.'/pintrest.png',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'type'           => 'option',
      'transport' => ''
  ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_social_icon2', array(
        'label'    => __('Upload Social Icon2', 'lavan'),
        'section'  => 'top_header_section',
        'settings' => 'social_icon2[upload_social_icon2]',
    'priority' => 28
    )));
    $wp_customize->add_setting(
    'right_social_icon_link2',
    array(
        'default' => '',
    ));
  $wp_customize->add_control(
    'right_social_icon_link2',
    array(
        'label' => __('Social Icon2 Link','lavan'),
         'section'  => 'top_header_section',
        'type' => 'text',
        'priority' => 29,
    ));
 $wp_customize->add_setting(  'icon_image_link2');
    $wp_customize->add_control(
    new Petshop_Kaya_Customize_Description_Control( 
      $wp_customize, 'icon_image_link2', array(
      'label'    => 'http://www.socialmedia.com/userid',
      'section'  => 'top_header_section',
      'settings' => 'icon_image_link2',
      'priority' => 30,
    )));
$src=get_template_directory_uri() . '/images/social_icons';
  $wp_customize->add_setting('social_icon3[upload_social_icon3]', array(
      'default'           => $src.'/twitter.png',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'type'           => 'option',
      'transport' => ''
  ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_social_icon3', array(
        'label'    => __('Upload Social Icon3', 'lavan'),
        'section'  => 'top_header_section',
        'settings' => 'social_icon3[upload_social_icon3]',
    'priority' => 31
    )));    
  $wp_customize->add_setting(
    'right_social_icon_link3',
    array(
        'default' => '',
    ));
  $wp_customize->add_control(
    'right_social_icon_link3',
    array(
        'label' => __('Social Icon3 Link','lavan'),
         'section'  => 'top_header_section',
        'type' => 'text',
        'priority' => 32,
    ));
 $wp_customize->add_setting(  'icon_image_link3');
    $wp_customize->add_control(
    new Petshop_Kaya_Customize_Description_Control( 
      $wp_customize, 'icon_image_link3', array(
      'label'    => 'http://www.socialmedia.com/userid',
      'section'  => 'top_header_section',
      'settings' => 'icon_image_link3',
      'priority' => 33,
    )));
   $src=get_template_directory_uri() . '/images/social_icons';
  $wp_customize->add_setting('social_icon4[upload_social_icon4]', array(
      'default'           => $src.'/youtube.png',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'type'           => 'option',
      'transport' => ''
  ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_social_icon4', array(
        'label'    => __('Upload Social Icon4', 'lavan'),
        'section'  => 'top_header_section',
        'settings' => 'social_icon4[upload_social_icon4]',
    'priority' => 34
    )));    
  $wp_customize->add_setting(
    'right_social_icon_link4',
    array(
        'default' => '',
    ));
  $wp_customize->add_control(
    'right_social_icon_link4',
    array(
        'label' => __('Social Icon4 Link','lavan'),
         'section'  => 'top_header_section',
        'type' => 'text',
        'priority' => 35,
    ));
 $wp_customize->add_setting(  'icon_image_link4');
    $wp_customize->add_control(
    new Petshop_Kaya_Customize_Description_Control( 
      $wp_customize, 'icon_image_link4', array(
      'label'    => 'http://www.socialmedia.com/userid',
      'section'  => 'top_header_section',
      'settings' => 'icon_image_link4',
      'priority' => 36,
    )));
  $src=get_template_directory_uri() . '/images/social_icons';
  $wp_customize->add_setting('social_icon5[upload_social_icon5]', array(
      'default'           => $src.'/google+.png',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
      'type'           => 'option',
      'transport' => ''
  ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'upload_social_icon5', array(
        'label'    => __('Upload Social Icon5', 'lavan'),
        'section'  => 'top_header_section',
        'settings' => 'social_icon5[upload_social_icon5]',
    'priority' => 37
    )));    
  $wp_customize->add_setting(
    'right_social_icon_link5',
    array(
        'default' => '',
    ));
  $wp_customize->add_control(
    'right_social_icon_link5',
    array(
        'label' => __('Social Icon5 Link','lavan'),
         'section'  => 'top_header_section',
        'type' => 'text',
        'priority' => 38,
    ));
 $wp_customize->add_setting(  'icon_image_link5');
    $wp_customize->add_control(
    new Petshop_Kaya_Customize_Description_Control( 
      $wp_customize, 'icon_image_link5', array(
      'label'    => 'http://www.socialmedia.com/userid',
      'section'  => 'top_header_section',
      'settings' => 'icon_image_link5',
      'priority' => 39,
    )));


	 foreach( $colors as $color ) {
		$wp_customize->add_setting( $color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'top_header_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
			));
	}
}
add_action( 'customize_register', 'petshop_kaya_top_header_settings');
// End
/*---------------------------------------------------------
Menu Section
----------------------------------------------------------*/
function petshop_kaya_menu_section( $wp_customize ) {
	$wp_customize->add_section(
	'menu-section',
	array(
		'title' => esc_html__( 'Menu Color Settings', 'petshop'),
		'priority'       => 40,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
		'description' => '',
	));
	//Main Menu Settings
	$wp_customize->add_setting( 'main_menu_title', array(
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'main_menu_title', array(
		'label'    => esc_html__( 'Main Menu Settings', 'petshop'),
		'section'  => 'menu-section',
		'settings' => 'main_menu_title',
		'priority' => 80
    )));
     $colors[] = array(
		'slug'=>'menu_bar_bg_color',
		'priority' => 85,
		'default' => '#363636',
		'label' => esc_html__('Menu Bar Background Color', 'petshop'),
	);
    $colors[] = array(
		'slug'=>'menu_link_color',
		'priority' =>122,
		'default' => '#ffffff',
		'label' => esc_html__('Links Color', 'petshop'),
	);
	$colors[] = array(
		'slug'=>'menu_link_bg_hover_color',
		'priority' => 123,
		'default' => '#f49c41',
		'label' => esc_html__('Links Hover Bg Color', 'petshop'),
	);
	$colors[] = array(
		'slug'=>'menu_link_hover_text_color',
		'default' => '#f49c41',
		'label' => esc_html__('Links Hover color', 'petshop'),
		'priority' => 124
	);
	$colors[] = array(
		'slug'=>'menu_link_active_bg_color',
		'priority' => 125,
		'default' => '#f49c41',
		'label' => esc_html__('Links Active Bg Color', 'petshop'),
	);	
	$colors[] = array(
		'slug'=>'menu_link_active_color',
		'priority' => 126,
		'default' => '#f49c41',
		'label' => esc_html__('Links Active Color', 'petshop'),
	);
	$wp_customize->add_setting( 'submenu_title', array(
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'submenu_title', array(
      'label'    => esc_html__( 'Child Menu Settings', 'petshop'),
      'section'  => 'menu-section',
      'settings' => 'submenu_title',
      'priority' => 140
    )));
    $colors[] = array(
		'slug'=>'sub_menu_links_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Links Background Color', 'petshop'),
		'priority' => 141
	);
   	$colors[] = array(
		'slug'=>'sub_menu_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('Links Color', 'petshop'),
		'priority' => 150
	);
	$colors[] = array(
		'slug'=>'sub_menu_bottom_border_color',
		'priority' => 154,
		'default' => '#ff4e4e',
		'label' => esc_html__('Links Border Bottom Color', 'petshop'),
	);
	$colors[] = array(
		'slug'=>'sub_menu_links_hover_bg_color',
		'default' => '#ff0000',
		'label' => esc_html__('Links Hover Background Color', 'petshop'),
		'priority' => 156
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('Links Hover Color', 'petshop'),
		'priority' => 160
	);
	$colors[] = array(
		'slug'=>'sub_menu_links_active_bg_color',
		'default' => '#ff0000',
		'label' => esc_html__('Link Active Background Color', 'petshop'),
		'priority' => 165
	);
	$colors[] = array(
		'slug'=>'sub_menu_link_active_color',
		'default' => '#ffffff',
		'label' => esc_html__('Link Active Color', 'petshop'),
		'priority' => 170
	);
	$colors[] = array(
		'slug'=>'search_box_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Search Icon Bg Color', 'petshop'),
		'priority' => 170
	);
	$colors[] = array(
		'slug'=>'search_box_icon_color',
		'default' => '#ffffff',
		'label' => esc_html__('Search Icon Color', 'petshop'),
		'priority' => 170
	);

	$wp_customize->add_setting( 'disable_header_sticky', array(
		'default'        => 0,
		'type'           => 'option',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);

	$wp_customize->add_control('disable_header_sticky', array(
		'label'    => __( 'Enable Sticky Menu','petshop' ),
		'section'  => 'menu-section',
		'type'     => 'checkbox',
		'priority' => 171
	) );  
    foreach( $colors as $color ) {
		$wp_customize->add_setting( $color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'menu-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
			));
	}
}
add_action( 'customize_register', 'petshop_kaya_menu_section'); // End
/*---------------------------------------------------------------------------
 Header Section
-----------------------------------------------------------------------------*/
function petshop_kaya_header_main_section( $wp_customize ) {
	$wp_customize->add_panel( 'header_section_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => esc_html__( 'Header Section', 'petshop'),
	    'description'    => '',
	) );
	$wp_customize->add_section(
	'header-section',
	array(
		'title' => esc_html__( 'Logo Settings', 'petshop'),
		'priority'       => 30,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
	$wp_customize->add_setting( 'header_sticky', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_setting( 'select_header_logo_type',  array(
        'default' => 'image_logo',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_header_logo_type', array(
        'type' => 'select',
        'label' => esc_html__('Select Header Logo Type','petshop'),
        'section' => 'header-section',
        'choices' => array(
        	 'image_logo' => esc_html__('Image Logo','petshop'),
        	 'text_logo' => esc_html__('Text Logo','petshop'),
        	 'none' => 'None'
        	),
		'priority' => 60,
    ));	
	$src=get_template_directory_uri() . '/images';
	$wp_customize->add_setting('kaya_logo[upload_logo]', array(
	    'default'           => esc_url( $src ).'/logo.png',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'type'           => 'option',
	));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Imageupload_Control($wp_customize, 'upload_logo', array(
        'label'    => esc_html__('Upload Logo Image', 'petshop'),
        'section'  => 'header-section',
        'settings' => 'kaya_logo[upload_logo]',
		'priority' => 70
    )));
    // Retina logo
    $wp_customize->add_setting( 'header_retina_logo', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('header_retina_logo', array(
		'label'    => esc_html__( 'Enable Retina Logo','petshop'),
		'section'  => 'header-section',
		'type'     => 'checkbox',
		'priority' => 80
	) );
    $wp_customize->add_setting('retina_logo[upload_retina_logo]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	    'type'           => 'option',
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Imageupload_Control($wp_customize, 'upload_retina_logo', array(
        'label'    => esc_html__('Upload Retina Logo Image', 'petshop'),
        'section'  => 'header-section',
        'settings' => 'retina_logo[upload_retina_logo]',
		'priority' => 90
    )));
    // Header Text Logo
    $wp_customize->add_setting( 'header_text_logo', array(
		'default'        => '',
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	));
	$wp_customize->add_control( 'header_text_logo', array(
		'label'   => esc_html__('Text Logo','petshop'),
		'section' => 'header-section',
		'type'    => 'text',
		'priority' => 100,
	));
	$colors[] = array(
		'slug'=>'logo_text_font_color',
		'default' => '#333333',
		'label' => esc_html__('Text Logo Font Color', 'petshop'),
		'priority' => 102
	);	
	$wp_customize->add_setting( 'text_logo_size', array(
        'default'        => '36',
        'sanitize_callback' => 'petshop_kaya_check_number',
    ) );
	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'text_logo_size', array(
		'label'   => esc_html__('Logo Font Size','petshop'),
    	'section' => 'header-section',
		'settings'    => 'text_logo_size',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 24,
			'max'  => 150,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'header_logo_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Text Logo Font Weight','petshop'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'bold' => esc_html__('Bold','petshop'),
        	),
		'priority' => 120,
    ));	
    $wp_customize->add_setting( 'header_logo_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('header_logo_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Text Logo Font Style','petshop'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' => 130,
    ));
	$wp_customize->add_setting( 'header_text_logo_font_family', array( 
		'default' => '2',
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_google_fonts_Control( $wp_customize, 'header_text_logo_font_family', array(
		'label'   => esc_html__('Select Logo Font Family','petshop'),
		'section' => 'header-section',
		'settings'    => 'header_text_logo_font_family',
		'priority'    => 140,
	)));   
	$wp_customize->add_setting( 'customize_controll_divider_tagline', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_tagline', array(
        'section' => 'header-section',
		'priority' => 150,
    ))); 
	// Logo tag line
	$wp_customize->add_setting( 'header_text_logo_tagline', array(
		'default'        => '',
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
		'transport' => 'refresh'
	));
	$wp_customize->add_control( 'header_text_logo_tagline', array(
		'label'   => esc_html__('Logo Tag Line','petshop'),
		'section' => 'header-section',
		'type'    => 'text',
		'priority' => 160,
	));
	$wp_customize->add_setting( 'logo_tagline_size', array(
        'default'        => '12',
        'sanitize_callback' => 'petshop_kaya_check_number',
    ));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_size', array(
		'label'   => esc_html__('Logo Tag Line Font Size','petshop'),
    	'section' => 'header-section',
		'settings'    => 'logo_tagline_size',
		'priority'    => 170,
		'choices'  => array(
			'min'  => 10,
			'max'  => 150,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'logo_tagline_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Logo Tag Line Font Weight','petshop'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'bold' => esc_html__('Bold','petshop'),
        	),
		'priority' => 180,
    ));	
    $wp_customize->add_setting( 'logo_tagline_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('logo_tagline_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Logo Tag Line Font Style','petshop'),
        'section' => 'header-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' => 190,
    ));	
    $wp_customize->add_setting( 'logo_tagline_letter_spacing', array(
        'default'        => '0',
        'sanitize_callback' => 'petshop_kaya_check_number',
    ));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'logo_tagline_letter_spacing', array(
		'label'   => esc_html__('Logo Tag Line Font Letter Spacing','petshop'),
    	'section' => 'header-section',
		'settings'    => 'logo_tagline_letter_spacing',
		'priority'    => 191,
		'choices'  => array(
			'min'  => 0,
			'max'  => 20,
			'step' => 1
		),
	)));
   	$wp_customize->add_setting( 'text_logo_tagline_font_family', array(
   		'default' => '',
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_google_fonts_Control( $wp_customize, 'text_logo_tagline_font_family', array(
		'label'   => esc_html__('Select Tag Line Font Family','petshop'),
		'section' => 'header-section',
		'settings'    => 'text_logo_tagline_font_family',
		'priority'    => 200,
	)));
	$colors[] = array(
		'slug'=>'logo_tagline_font_color',
		'default' => '#333333',
		'label' => esc_html__('Logo Tag Line Color', 'petshop'),
		'priority' => 210
	);
	$wp_customize->add_setting( 'header_logo_padding_t_b', array(
        'default'        => '0',
        'sanitize_callback' => 'petshop_kaya_check_number',
    ));
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'], array(
			'label' => $color['label'],
			'section' => 'header-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'petshop_kaya_header_main_section' );

/*Header left section */
function petshop_kaya_header_right_section( $wp_customize ) {
	$wp_customize->add_section(
	'header_right_section',
	array(
		'title' => esc_html__( 'Header Right Section', 'petshop'),
		'priority'       =>35,
		'capability' => 'edit_theme_options',
		'panel' => 'header_section_panel',
	));
	$colors[] = array(
		'slug'=>'header_top_bottom_border_color',
		'default' => '#e4ae77',
		'label' => esc_html__('Top & Bottom Border color', 'petshop'),
		'priority' => 9
	);
	$wp_customize->add_setting( 'disable_woo_login', array(
		'default'        => '',
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_woo_login', array(
		'label'    => esc_html__( 'Disable My Account login','petshop'),
		'section'  => 'header_right_section',
		'type'     => 'checkbox',
		'priority' => 10
	) );
	$colors[] = array(
		'slug'=>'woo_login_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('link color', 'petshop'),
		'priority' => 11
	);
	$colors[] = array(
		'slug'=>'woo_login_link_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('link Hover color', 'petshop'),
		'priority' => 12
	);
	$wp_customize->add_setting( 'shopping_cart_settings', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'shopping_cart_settings', array(
      'label'    => esc_html__( 'Shopping Cart Settings', 'petshop'),
      'section' => 'header_right_section',
      'settings' => 'shopping_cart_settings',
      'priority' =>13
    )));
    $colors[] = array(
		'slug'=>'shopping_cart_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('Shopping Cart Link color', 'petshop'),
		'priority' => 14
	);
	$colors[] = array(
		'slug'=>'shopping_cart_link_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('Shopping Cart Link Hover color', 'petshop'),
		'priority' => 15
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'], array(
			'label' => $color['label'],
			'section' => 'header_right_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}	
}
add_action( 'customize_register', 'petshop_kaya_header_right_section');

/*--------------------------------------------------
Pagination Color Settings
---------------------------------------------------*/
function petshop_kaya_posts_pagination_section( $wp_customize ) {
	global $kaya_petshop_customze_note_settings;
	$wp_customize->add_section(
	'posts_pagination_section',
	array(
		'title' => esc_html__( 'Pagination Color Settings', 'petshop'),
		'priority'       => 60,
		'capability' => 'edit_theme_options',
		'panel'  => 'general_section',
		'description' => esc_html__('Note:Color applies for blog posts, portfolio posts and woocommerce poroducts pagination.', 'petshop'),
	));	
	$colors = array();
	$colors[] = array(
		'slug'=>'posts_pagination_link',
		'default' => '#f49c41',
		'label' => esc_html__('Link Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'posts_pagination_bg',
		'default' => '#ffffff',
		'label' => esc_html__('Background Color', 'petshop')
	);
		$colors[] = array(
		'slug'=>'posts_pagination_active_link',
		'default' => '#ffffff',
		'label' => esc_html__('Active Link Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'posts_pagination_active_bg',
		'default' => '#f49c41',
		'label' => esc_html__('Active Background Color', 'petshop')
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'], array(
			'label' => $color['label'], 
			'section' => 'posts_pagination_section',
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'petshop_kaya_posts_pagination_section' );
/*---------------------------------------------------
 Page Title color Settings
-------------------------------------------------------*/
function petshop_kaya_page_color_section( $wp_customize ) {
	$wp_customize->add_panel( 'page_color_panel', array(
	    'priority' => 70,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__('Page Section','petshop'),
	));	
	$wp_customize->add_section(
	'page-color-section',
	array(
		'title' => esc_html__( 'Page Title bar Settings', 'petshop'),
		'priority'       => 70,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel',
	));
	$wp_customize->add_setting( 'select_page_title_background_type',  array(
        'default' => 'bg_type_image',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_page_title_background_type', array(
        'type' => 'select',
        'label' => __('Select Background Type','petshop'),
        'section' => 'page-color-section',
        'choices' => array(
			'bg_type_image' => __('Background Image','petshop'),
			'bg_type_color' => __('Background Color','petshop'),
        	),
		'priority' => 1,
    ));	
    $wp_customize->add_setting('page_title[bg_img]',array(
    	'default' => '',
    	'capability' => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
    	));
    $wp_customize->add_control(	new Petshop_Kaya_Customize_Imageupload_Control($wp_customize,'page_title',array(
		'label' =>  __('Upload Background Image','petshop'),
		'section' => 'page-color-section',
		'settings' => 'page_title[bg_img]',
		'priority' => 10
    )));

    $wp_customize->add_setting('page_title_bar_bg_repeat',
	array(
		'deafult' => 'repeat',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
		));
	$wp_customize->add_control('page_title_bar_bg_repeat',	array(
		'label' => __('Background Repeat', 'petshop'),
		'capability' => 'edit_theme_options', 
		'section' => 'page-color-section',
		'priority' => 20,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => __('No Repeat','petshop'),
			'repeat' => __('Repeat', 'petshop'),
			'cover'	=> __('Cover','petshop'),
			)
		));
	$wp_customize->add_setting( 'page_title_bg_color',	array( 
		'default' => '#3f51b5',
		'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_title_bg_color',array(
		'label' => esc_html__('Page Title bar bg Color','petshop'),
		'section' => 'page-color-section',
		'priority' => 30,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'page_titlebar_title_color', array( 
		'default' => '#333',
		'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_titlebar_title_color',array(
		'label' => esc_html__('Title Color','petshop'),
		'section' => 'page-color-section',
		'priority' => 60,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'page_title_border_color',array( 
		'default' => '#151515',
		'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'page_title_border_color',	array(
		'label' => esc_html__('Title Border Color', 'petshop'),
		'section' => 'page-color-section',
		'priority' => 65,
		'type' => 'color',
	)));
	$wp_customize->add_setting( 'page_title_font_size', array(
        'default'        => '36',
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_font_size', array(
		'label'   => esc_html__('Title Font Size (px)','petshop'),
    	'section' => 'page-color-section',
		'settings'    => 'page_title_font_size',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 12,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'page_title_font_letter_space', array(
        'default'        => '0',
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_font_letter_space', array(
		 'label'   => esc_html__('Title Letter Space (px)','petshop'),
    	'section' => 'page-color-section',
		'settings'    => 'page_title_font_letter_space',
		'priority'    => 71,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'page_title_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Title Font Weight','petshop'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'page_title_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Title Font Style','petshop'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>90,
    ));	
    $wp_customize->add_setting( 'page_title_bar_padding', array(
		'default'        => '80',
		'sanitize_callback'    => 'petshop_kaya_check_number',
	));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'page_title_bar_padding', array(
		'label'   => esc_html__('Title Bar Padding Top & Bottom (px)','petshop'),
		'section' => 'page-color-section',
		'settings'    => 'page_title_bar_padding',
		'priority'    => 160,
		'choices'  => array(
			'min'  => 10,
			'max'  => 500,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'page_title_position',  array(
        'default' => 'center',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('page_title_position', array(
        'type' => 'select',
        'label' => esc_html__('Title Position','petshop'),
        'section' => 'page-color-section',
        'choices' => array(
        	 'center' => esc_html__('Center','petshop'),
        	 'left' => esc_html__('Left','petshop'),
        	 'right' => esc_html__('Right','petshop'),
        	),
		'priority' => 170,
    ));
    /* Breadcrumb Color */
	$wp_customize->add_setting( 'breadcrumb_title', array(
			'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
		) );
	$wp_customize->add_control(
    new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'breadcrumb_title', array(
      'label'    => __( 'Breadcrumb Settings', 'petshop' ),
      'section'  => 'page-color-section',
      'settings' => 'breadcrumb_title',
      'priority' => 171
    )));
		$wp_customize->add_setting( 'bread_crumb_text_color',
		array( 
			'default' => '#333333',
			'transport' => '',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize, 'bread_crumb_text_color',
		array(
			'label' => 'Breadcrumb Text Color',
			'section' => 'page-color-section',
			'priority' => 172,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'bread_crumb_link_color',
		array( 
			'default' => '#333333',
			'transport' => '',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'bread_crumb_link_color',
		array(
			'label' => 'Breadcrumb Link Color',
			'section' => 'page-color-section',
			'priority' => 173,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'bread_crumb_hover_link_color',
		array( 
			'default' => '#f49c41',
			'transport' => '',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize, 'bread_crumb_hover_link_color',
		array(
			'label' => 'Breadcrumb Hover Link Color',
			'section' => 'page-color-section',
			'priority' => 174,
			'type' => 'color',
		)));
	$wp_customize->add_setting( 'bread_crumb_remove', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('bread_crumb_remove', array(
		'label'    => __( 'Disable Breadcrumb','petshop' ),
		'section'  => 'page-color-section',
		'type'     => 'checkbox',
		'priority' => 174
	) );
	$colors = array();
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize, $color['slug'], array(
			'label' => $color['label'],
			'section' => 'page-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'petshop_kaya_page_color_section' );
/*-------------------------------------------
Page middle content color
--------------------------------------------*/
function petshop_kaya_page_middle_color_panel($wp_customize){
	$wp_customize->add_section(
	'background_image',
	array(
		'title' => esc_html__( 'Page Middle Content Settings', 'petshop'),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
	));
	$wp_customize->add_setting( 'select_body_background_type',  array(
        'default' => 'bg_type_color',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_body_background_type', array(
        'type' => 'select',
        'label' => esc_html__('Select Background Type','petshop'),
        'section' => 'background_image',
        'choices' => array(
        	 'bg_type_color' => esc_html__('Background Color','petshop'),
        	 'bg_type_image' => esc_html__('Background Image','petshop'),
        	),
		'priority' => 0,
    ));
	$wp_customize->add_setting( 'body_background_color',array( 
		'default' => '#f4f4f4',
		'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_background_color', array(			
		'label' => esc_html__('Background Color', 'petshop'),
		'section' => 'background_image',
		'priority' => 40,
		'type' => 'color',
	)));
	//
	$colors[] = array(
		'slug'=>'page_titles_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'petshop'),
		'priority' => 90
	);
	$colors[] = array(
		'slug'=>'page_description_color',
		'default' => '#757575',
		'label' => esc_html__('Content Color', 'petshop'),
		'priority' => 100
	);
	$colors[] = array(
		'slug'=>'page_link_color',
		'default' => '#333',
		'label' => esc_html__('Link Color', 'petshop'),
		'priority' => 110
	);
	$colors[] = array(
		'slug'=>'page_link_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Link Hover Color', 'petshop'),
		'priority' => 120
	);
	foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],array(
			'label' => $color['label'],
			'section' => 'background_image',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));	
	}
}
add_action('customize_register','petshop_kaya_page_middle_color_panel');
/*---------------------------------------------------
Page Sidebar color section
-----------------------------------------------------*/
function petshop_kaya_page_sidebar_color_panel($wp_customize)
{
	$wp_customize->add_section(
	'page-sidbar-color-section',
	array(
		'title' => esc_html__( 'Page Sidebar Color Settings', 'petshop'),
		'priority'       => 80,
		'capability' => 'edit_theme_options',
		'panel' => 'page_color_panel'
	));
	$colors[] = array(
		'slug'=>'sidebar_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Background Color', 'petshop'),
		'priority' => 9
	);
  $colors[] = array(
    'slug'=>'sidebar_border_color',
    'default' => '#e4e4e4',
    'label' => esc_html__('Border Color', 'petshop'),
    'priority' => 10
  );
    $colors[] = array(
		'slug'=>'sidebar_title_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Title Color', 'petshop'),
		'priority' => 20
	);
	$colors[] = array(
		'slug'=>'sidebar_title_bg_color',
		'default' => '#c38749',
		'label' => esc_html__('Title Bg Color', 'petshop'),
		'priority' => 20
	);
	$colors[] = array(
		'slug'=>'sidebar_desc_color',
		'default' => '#757575',
		'label' => esc_html__('Description Color', 'petshop'),
		'priority' => 40
	);
	 $colors[] = array(
		'slug'=>'sidebar_list_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('List Border Bottom Color', 'petshop'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'sidebar_link_color',
		'default' => '#333',
		'label' => esc_html__('Hyper Link Color', 'petshop'),
		'priority' => 60
	);
    $colors[] = array(
		'slug'=>'sidebar_link_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Hyper Link Hover Color', 'petshop'),
		'priority' => 70
	);
	$colors[] = array(
		'slug'=>'sidebar_tags_bg_color',
		'default' => '#f2f2f2',
		'label' => esc_html__('Tag Clouds Background Color', 'petshop'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_link_color',
		'default' => '#333333',
		'label' => esc_html__('Tag Clouds Text Color', 'petshop'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_border_color',
		'default' => '#f49c41',
		'label' => esc_html__('Tag Clouds Right Border Color', 'petshop'),
		'priority' => 100
	);
	$colors[] = array(
		'slug'=>'sidebar_tags_hover_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Tag Clouds Hover Background Color', 'petshop'),
		'priority' => 101
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_hover_link_color',
		'default' => '#ffffff',
		'label' => esc_html__('Tag Clouds Hover Text Color', 'petshop'),
		'priority' => 102
	);
    $colors[] = array(
		'slug'=>'sidebar_tags_hover_border_color',
		'default' => '#333333',
		'label' => esc_html__('Tag Clouds Hover Right Border Color', 'petshop'),
		'priority' => 103
	);
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
			'capability' =>	'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],array(
			'label' => $color['label'],
			'section' => 'page-sidbar-color-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'petshop_kaya_page_sidebar_color_panel' );
/*-----------------------------------------------------------------------------------*/
// Blog Single Page
/*-----------------------------------------------------------------------------------*/ 
function petshop_kaya_blog_page_section( $wp_customize ){
  // Blog Page Categories
	$wp_customize->add_panel( 'blog_section', array(
	    'priority' => 100,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Blog Page Settings', 'petshop'),
	));
  	$wp_customize->add_section('blog_page_section',array(
      'title' => esc_html__('Blog General Settings','petshop'),
      'priority' => '100',
      'panel' => 'blog_section',
    )); 
}
add_action('customize_register','petshop_kaya_blog_page_section');
/* Blog Page Color Section */
function petshop_kaya_blog_page_bg_section( $wp_customize ){
	global $kaya_petshop_customze_note_settings;
	$wp_customize->add_section('blog_bg_color_section',array(
		'title' => esc_html__('Blog Posts Settings', 'petshop'),
		'priority' => '100',
		'panel' => 'blog_section',
		'description' => esc_html__('Below settings applies for blog archives page , category page, author page and tags page.','petshop'),
	)); 
  	$wp_customize->add_setting('blog_single_page_sidebar', array(
		'default' => 'two_third',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
    ));
  	$wp_customize->add_control('blog_single_page_sidebar',array(
		'label' => esc_html__('Blog Sidebar Position','petshop'),
		'type' => 'radio',
		'section' => 'blog_bg_color_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','petshop'),
			'three_fourth' => esc_html__('Right','petshop'),
			'three_fourth_last' => esc_html__('Left','petshop')
		),
		'priority' => 2
  	));
	$colors = array();
    $colors[] = array(
		'slug'=>'blog_page_title_color',
		'default' => '#333333',
		'label' => esc_html__('Title Color', 'petshop'),
		'priority' => 40
	);
	 $colors[] = array(
		'slug'=>'blog_page_title_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Title Hover Color', 'petshop'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'blog_desc_color',
		'default' => '#787878',
		'label' => esc_html__('Description', 'petshop'),
		'priority' => 70
	);
	$colors[] = array(
		'slug'=>'blog_meta_info_t_b_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Meta Info Border Top & Bottom Color', 'petshop'),
		'priority' => 80
	);
    $colors[] = array(
		'slug'=>'blog_link_color',
		'default' => '#333333',
		'label' => esc_html__('Hyper Meta Info Link Color', 'petshop'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'blog_link_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Hyper Meta Info Link Hover Color', 'petshop'),
		'priority' => 100
	);
    //Button Settings
	$wp_customize->add_setting('kaya_readmore_blog', array(
        'default' => esc_html__('Read More','petshop'),
          'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control( 'kaya_readmore_blog',  array(
        'label' => esc_html__('Readmore Button Text', 'petshop'),
        'section' => 'blog_bg_color_section',
        'type' => 'text',
        'priority' => 105,    
    ));
	$colors[] = array(
		'slug'=>'blog_button_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Readmore Button BG Color', 'petshop'),
		'priority' => 110
	);
	$colors[] = array(
		'slug'=>'blog_button_color',
		'default' => '#ffffff',
		'label' => esc_html__('Readmore Button Text Color', 'petshop'),
		'priority' => 120
	);
    $colors[] = array(
		'slug'=>'blog_button_hover_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Readmore Button Hover BG Color', 'petshop'),
		'priority' => 130
	);
    $colors[] = array(
		'slug'=>'blog_button_hover_color',
		'default' => '#ffffff',
		'label' => esc_html__('Readmore Button Hover Text Color', 'petshop'),
		'priority' => 140
	);
    $wp_customize->add_setting( 'blog_button_letter_space', array(
        'default'        => '0',
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_button_letter_space', array(
		'label'   => esc_html__('Readmore Button Letter Space (px)','petshop'),
    	'section' => 'blog_bg_color_section',
		'settings'    => 'blog_button_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_button_button_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_button_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Readmore Button Font Weight','petshop'),
        'section' => 'blog_bg_color_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 160,
    ));
    $wp_customize->add_setting( 'blog_button_button_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_button_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Readmore Button Font Style','petshop'),
        'section' => 'blog_bg_color_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>170,
    ));
	$colors[] = array(
		'slug'=>'blog_gallery_slider_buttons_color',
		'default' => '#b9b9b9',
		'label' => esc_html__('Gallery Slider Navigation Color', 'petshop'),
		'priority' => 180
	);
    $colors[] = array(
		'slug'=>'blog_gallery_slider_active_buttons_color',
		'default' => '#f49c41',
		'label' => esc_html__('Gallery Slider Active Navigation Color', 'petshop'),
		'priority' => 190
	);
    foreach( $colors as $color ) {
	// SETTINGS
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
				'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_bg_color_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','petshop_kaya_blog_page_bg_section');
/*-----------------------------------------------------
 Blog Single Page  Section 
 ------------------------------------------------------*/
function petshop_kaya_blog_single_page_bg_section( $wp_customize ){
	$wp_customize->add_section('blog_single_bg_section',array(
		'title' => esc_html__('Blog Single page Color Section', 'petshop'),
		'priority' => '101',
		'panel' => 'blog_section',
		'description' => '',
	));
	$colors = array();
    $colors[] = array(
		'slug'=>'blog_single_page_title_color',
		'default' => '#ffffff',
		'label' => esc_html__('Title Color', 'petshop'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'blog_single_page_desc_color',
		'default' => '#999',
		'label' => esc_html__('Description', 'petshop'),
		'priority' => 70
	);
	
    $colors[] = array(
		'slug'=>'blog_single_page_link_color',
		'default' => '#999',
		'label' => esc_html__('Hyper Link Color', 'petshop'),
		'priority' => 90
	);
    $colors[] = array(
		'slug'=>'blog_single_page_link_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Hyper Link Hover Color', 'petshop'),
		'priority' => 100
	);
	// Blog Next Prev Colors
	$wp_customize->add_setting( 'blog_single_page_title', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	));
    $wp_customize->add_control(  new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'blog_single_page_title', array(
        'label'    => esc_html__( 'Blog Single Page Next / Prev Buttons Text', 'petshop'),
      	'section' => 'blog_single_bg_section',
      	'settings' => 'blog_single_page_title',
      	'priority' => 110
    )));
	$wp_customize->add_setting('blog_button_prev_text', 
    array(
        'default' => esc_html__('PREVIOUS PROJECT','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));		
	 $wp_customize->add_control('blog_button_prev_text',
    array(
        'label' => esc_html__('Previous Button Text', 'petshop'),
        'section' => 'blog_single_bg_section',
        'type' => 'text',
        'priority' => 120,    
    ));
    $wp_customize->add_setting('blog_button_next_text', 
    array(
        'default' => esc_html__('NEXT PROJECT','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('blog_button_next_text',
    array(
        'label' => esc_html__('Next Button Text', 'petshop'),
        'section' => 'blog_single_bg_section',
        'type' => 'text',
        'priority' => 130,    
    ));
    foreach( $colors as $color ) {
	// SETTINGS
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
				'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_single_bg_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','petshop_kaya_blog_single_page_bg_section');
/*--------------------------------------------------------------
Blog Single Quote 
--------------------------------------------------------------*/
function petshop_kaya_blog_quote_section( $wp_customize ){
	$wp_customize->add_section('blog_quote_section',array(
		'title' => esc_html__('Blog Quote Format Section', 'petshop'),
		'priority' => '105',
		'panel' => 'blog_section',
		'description' => '',
	));
	$wp_customize->add_setting( 'blog_quote_font_size', array(
        'default'        => '23',
      	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_font_size', array(
		'label'   => esc_html__('Blog Quote Format Font Size (px)','petshop'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_font_size',
		'priority'    => 1,
		'choices'  => array(
			'min'  => 15,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_font_letter_space', array(
        'default'        => '0',
       	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_font_letter_space', array(
		'label'   => esc_html__('Blog Quote Format Font Letter Space (px)','petshop'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_font_letter_space',
		'priority'    => 5,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_font_weight',  array(
        'default' => 'normal',
         'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Font Weight','petshop'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 10,
    ));
    $wp_customize->add_setting( 'blog_quote_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Font Style','petshop'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>15,
    ));
    $wp_customize->add_setting( 'blog_quote_author_title', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control(new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'blog_quote_author_title', array(
        'label'    => esc_html__( 'Quote Format Author Settings', 'petshop'),
      'section' => 'blog_quote_section',
      'settings' => 'blog_quote_author_title',
      'priority' => 20
    )));
    $wp_customize->add_setting( 'blog_quote_author_font_size', array(
        'default'        => '18',
        'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_author_font_size', array(
		'label'   => esc_html__('Blog Quote Format Author Font Size (px)','petshop'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_author_font_size',
		'priority'    => 30,
		'choices'  => array(
			'min'  => 15,
			'max'  => 100,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_author_font_letter_space', array(
        'default'        => '0',
      	'sanitize_callback'    => 'petshop_kaya_check_number',
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'blog_quote_author_font_letter_space', array(
		'label'   => esc_html__('Blog Quote Format Author Font Letter Space (px)','petshop'),
    	'section' => 'blog_quote_section',
		'settings'    => 'blog_quote_author_font_letter_space',
		'priority'    => 40,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'blog_quote_author_font_weight',  array(
        'default' => 'normal',
         'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_author_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Author Font Weight','petshop'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 50,
    ));
    $wp_customize->add_setting( 'blog_quote_author_font_style',  array(
        'default' => 'normal',
         'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('blog_quote_author_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Blog Quote Format Author Font Style','petshop'),
        'section' => 'blog_quote_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>60,
    ));
}
add_action('customize_register','petshop_kaya_blog_quote_section');
/*---------------------------------------------------
 Blog Related Post 
-----------------------------------------------------*/
function petshop_kaya_blog_single_related_post_section( $wp_customize ){
	$wp_customize->add_section('blog_single_related_post_section',array(
		'title' => esc_html__('Blog Single Related Post Title Settings', 'petshop'),
		'priority' => '105',
		'panel' => 'blog_section',
		'description' => '',
	));
	$colors = array();
	$wp_customize->add_setting('single_related_post_title', 
    array(
        'default' => esc_html__('Related Articles','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('single_related_post_title',
    array(
        'label' => esc_html__('Single Page Related Post Title', 'petshop'),
        'section' => 'blog_single_related_post_section',
        'type' => 'text',
        'priority' => 10,    
    ));
}
add_action('customize_register','petshop_kaya_blog_single_related_post_section');
/* ------------------------------------------------------------
Comment Form Section 
-------------------------------------------------------------- */
function petshop_kaya_blog_single_comment_form_section( $wp_customize ){
	$wp_customize->add_section('blog_single_comment_section',array(
		'title' => esc_html__('Blog Single Comment Form Settings', 'petshop'),
		'priority' => '106',
		'panel' => 'blog_section',
		'description' => '',
	));
	$colors = array();
	$colors[] = array(
		'slug'=>'blog_single_page_comment_list_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Comments List Bottom Border Color', 'petshop'),
		'priority' => 1
	);
	$colors[] = array(
		'slug'=>'comment_form_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Comment Form Border Color', 'petshop'),
		'priority' => 10
	);
	$colors[] = array(
		'slug'=>'comment_form_input_text',
		'default' => '#757575',
		'label' => esc_html__('Comment Form Input Text Color', 'petshop'),
		'priority' => 11
	);
	$wp_customize->add_setting('comment_form_text', 
    array(
        'default' => esc_html__('SUBMIT','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('comment_form_text',
    array(
        'label' => esc_html__('Submit Button Text', 'petshop'),
        'section' => 'blog_single_comment_section',
        'type' => 'text',
        'priority' => 20,    
    ));
	$colors[] = array(
		'slug'=>'comment_form_button_bg',
		'default' => '#f49c41',
		'label' => esc_html__('Comment Form Button BG Color', 'petshop'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'comment_form_button_color',
		'default' => '#ffffff',
		'label' => esc_html__('Comment Form Button Color', 'petshop'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'comment_form_button_hover_bg',
		'default' => '#ffffff',
		'label' => esc_html__('Comment Form Button Hover BG Color', 'petshop'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'comment_form_button_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Comment Form Button Hover Color', 'petshop'),
		'priority' => 60
	);
	   $wp_customize->add_setting( 'comment_form_button_letter_sapcing', array(
        'default'        => '0',
   
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'comment_form_button_letter_sapcing', array(
			 'label'   => esc_html__('Comment Form Button Letter Space (px)','petshop'),
        	'section' => 'blog_single_comment_section',
			'settings'    => 'comment_form_button_letter_sapcing',
			'priority'    => 70,
			'choices'  => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1
			),
		)));
    $wp_customize->add_setting( 'comment_form_button_font_weight',  array(
        'default' => 'normal',
 
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('comment_form_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Comment Form Button Font Weight','petshop'),
        'section' => 'blog_single_comment_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'comment_form_button_font_style',  array(
        'default' => 'normal',
   
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('comment_form_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Comment Form Button Font Style','petshop'),
        'section' => 'blog_single_comment_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>90,
    ));
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
	
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control(	$wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'blog_single_comment_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}    
}
add_action('customize_register','petshop_kaya_blog_single_comment_form_section');
/*-----------------------------------------------------------
 Error Page Setings 
------------------------------------------------------------*/
function petshop_kaya_error_page_section($wp_customize){
	$wp_customize->add_section('error_page_section',array(
				'title' => esc_html__('404 Error Page Settings','petshop'),
				'priority' => '125',
		));	
	$color = array(); 
	$wp_customize->add_setting('upload_404_bg_img[404_page_bg]', array(
	    'default'           => '',
	    'capability'        => 'edit_theme_options',
	    'sanitize_callback' => 'esc_url_raw',
	
	));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Imageupload_Control($wp_customize, '404_page_bg', array(
        'label'    => esc_html__('Upload 404 Page BG Image', 'petshop'),
        'section'  => 'error_page_section',
        'settings' => 'upload_404_bg_img[404_page_bg]',
		'priority' => 1
    )));
	$wp_customize->add_setting('error_404_bg_repeat',	array(
		'deafult' => 'repeat',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('error_404_bg_repeat',	array(
		'label' => esc_html__('Background Repeat','petshop'),
		'capability' => 'edit_theme_options', 
		'section' => 'error_page_section',
		'priority' => 20,
		'type' => 'radio',
		'choices' => array(
			'no-repeat' => 'No Repeat',
			'repeat' => 'Repeat',
			'cover' => 'Cover'
			)
		));
	$wp_customize->add_setting('error_404_bg_position',	array(
		'deafult' => 'center',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
		'transport' => 'refresh',
	));
	$wp_customize->add_control('error_404_bg_position',	array(
		'label' => esc_html__('Background Image Position','petshop'),
		'capability' => 'edit_theme_options', 
		'section' => 'error_page_section',
		'priority' => 30,
		'type' => 'radio',
		'choices' => array(
			'center' => esc_html__('Center','petshop'),
			'left' => esc_html__('Left','petshop'),
			'right' => esc_html__('Right','petshop'),
			)
		)); 
	$wp_customize->add_setting('error_page_title', array(
        'default' => esc_html__('Sorry, this page does not exist','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('error_page_title', array(
        'label' => esc_html__('Error Page Title', 'petshop'),
        'section' => 'error_page_section',
        'type' => 'text',
        'priority' => 40,    
    ));
	$wp_customize->add_setting('error_page_button_name', array(
        'default' => esc_html__('GO TO HOME PAGE','petshop'),
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));				
	$wp_customize->add_control('error_page_button_name', array(
        'label' => esc_html__('GO TO HOME PAGE Button Name', 'petshop'),
        'section' => 'error_page_section',
        'type' => 'text',
        'priority' => 45,    
    ));
	$colors[] = array(
	  'slug'=>'title_color_404',
	  'default' => '#fff',
	   'priority' => 50,
	  'label' => esc_html__('404 Color', 'petshop')
	);
	$colors[] = array(
	  'slug'=>'error_page_button_color',
	  'default' => '#b9b9b9',
	  'label' => esc_html__('Error Page Button Color', 'petshop'),
	  'priority' => 60
	);
	$colors[] = array(
	  'slug'=>'error_page_button_bg_color',
	  'default' => '#f49c41',
	  'label' => esc_html__('Error Page Button BG Color', 'petshop'),
	  'priority' => 70
	);
	$colors[] = array(
	  'slug'=>'error_page_button_hover_color',
	  'default' => '#f49c41',
	  'label' => esc_html__('Error Page Button Hover Color', 'petshop'),
	  'priority' => 80
	);
	$colors[] = array(
	  'slug'=>'error_page_button_hover_bg_color',
	  'default' => '#b9b9b9',
	  'label' => esc_html__('Error Page Button Hover BG Color', 'petshop'),
	  'priority' => 90
	);
	$wp_customize->add_setting( 'error_page_button_letter_sapcing', array(
        'default'        => '0',
 
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'error_page_button_letter_sapcing', array(
			 'label'   => esc_html__('Error Page Button Letter Space (px)','petshop'),
        	'section' => 'error_page_section',
			'settings'    => 'error_page_button_letter_sapcing',
			'priority'    => 100,
			'choices'  => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1
			),
		)));
    $wp_customize->add_setting( 'error_page_button_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
     $wp_customize->add_control('error_page_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Error Page  Button Font Weight','petshop'),
        'section' => 'error_page_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 110,
    ));
     $wp_customize->add_setting( 'error_page_button_font_style',  array(
        'default' => 'normal',
     
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('error_page_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Error Page  Button Font Style','petshop'),
        'section' => 'error_page_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>120,
    ));	
	foreach( $colors as $color ) {
	  // SETTINGS
	  	$wp_customize->add_setting( $color['slug'], array(
	    	'default' => $color['default'],
	      	'capability' =>  'edit_theme_options',
	      	'transport'   => '',
	      	'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	    ) );
	  	// CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'error_page_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','petshop_kaya_error_page_section');
//Main Footer Settings
function footer_section( $wp_customize ) {	
	$wp_customize->add_panel( 'footer_section', array(
	    'priority' => 130,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Footer Section', 'petshop' ),
	    //'description' => __( 'Description of what this panel does.', 'rwmb' ),
	));
	$wp_customize->add_section(
	// ID
	'footer-section',
	// Arguments array
	array(
		'title' => __( 'Main Footer Settings', 'petshop' ),
		'priority'       => 130,
		'capability' => 'edit_theme_options',
		'panel' => 'footer_section'
		//'description' => __( '', 'petshop' )
	));
    $wp_customize->add_setting( 'footer_page_id', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	'default' => '',
    ));
    $wp_customize->add_control(  new Kaya_Customize_Page_Control( $wp_customize, 'footer_page_id', array(
      'label'    => __( 'Select Page Footer', 'petshop' ),
      'section'  => 'footer-section',
      'settings' => 'footer_page_id',
      'priority' => 1,
    )));
    $wp_customize->add_setting( 'page_footer_note', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'page_footer_note', array(
  		'html_tags' => true,
		'label'    => '',
		'section'  => 'footer-section',
		'settings' => 'page_footer_note',
		'priority' => 5
    )));
}
add_action( 'customize_register', 'footer_section' );
// Most Footer
function most_footer_section( $wp_customize ) {
		$wp_customize->add_section(
	// ID
	'most-footer-section',
	// Arguments array
	array(
		'title' => __( 'Most Footer Bottom Section', 'petshop' ),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'footer_section',
		'description' =>  '',
	));
 	$wp_customize->add_setting( 'select_most_footer_style',  array(
        'default' => 'left_content_right_menu',
        'transport' => '',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('select_most_footer_style', array(
        'type' => 'select',
        'label' => __('Select Most Footer Style','petshop'),
        'section' => 'most-footer-section',
        'choices' => array(
        	'left_content_right_menu' => __('Left Content & Right Menu','petshop'),
			'left_menu_right_content' => __('Left Menu & Right Content','petshop'),
			'left_content_right_content' => __('Left & Right Content','petshop'),
			'center_content_center_menu' => __('Content & Menu Center','petshop'),
			'none'   => __('None', 'petshop'),
        	),
		'priority' => 20,
    ));
    $wp_customize->add_setting( 'footer_left_section_title', array(
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	) );
	$wp_customize->add_control(new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'footer_left_section_title', array(
		'label'    => __( 'Left Section', 'petshop' ),
		'section'  => 'most-footer-section',
		'settings' => 'footer_left_section_title',
		'priority' => 40
    )));
    $wp_customize->add_setting( 'most_footer_left_section', array(
		'deafult' => __('Copy rights kayapati.com','petshop'),
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control(new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'most_footer_left_section', array(
      'label'    => __( 'Left Section', 'petshop' ),
      'section'  => 'most-footer-section',
      'settings' => 'most_footer_left_section',
      'priority' => 60,
      'type' => 'text-area',
    )) );
    $wp_customize->add_setting( 'footer_menu_left_note', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
  	$wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'footer_menu_left_note', array(
  		'html_tags' => true,
		'label'    => __( '<span class="customizer_note">Note:</span> Display menu links in left section goto \' Appearance > Menus \' ', 'petshop' ).'<a target="_balnk" href="'.admin_url( 'nav-menus.php', 'http' ).'">'.__('Create Footer Menu ', 'petshop').' </a>'.__(' & Select Theme locations as a \' Footer Navigation \'', 'petshop'),
		 'section'  => 'most-footer-section',
		'settings' => 'footer_menu_left_note',
		'priority' => 70
    )));
    $wp_customize->add_setting( 'footer_right_section_title', array(
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	) );
	$wp_customize->add_control(new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'footer_right_section_title', array(
		'label'    => __( 'Right Section', 'petshop' ),
		'section'  => 'most-footer-section',
		'settings' => 'footer_right_section_title',
		'priority' => 80
    )));
    $wp_customize->add_setting( 'most_footer_right_section', array(
		'default' => __('Copy rights kayapati.com','petshop'),
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));
   	$wp_customize->add_control(new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'most_footer_right_section', array(
      'label'    => __( 'Right Section', 'petshop' ),
      'section'  => 'most-footer-section',
      'settings' => 'most_footer_right_section',
      'priority' => 90,
      'type' => 'text-area',
     )) );
   	$wp_customize->add_setting( 'footer_menu_right_note', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
  	$wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'footer_menu_right_note', array(
  		'html_tags' => true,
		'label'    => __( '<span class="customizer_note">Note:</span> Display menu links in right section goto \' Appearance > Menus \' ', 'petshop' ).'<a target="_balnk" href="'.admin_url( 'nav-menus.php', 'http' ).'">'.__('Create Footer Menu ', 'petshop').' </a>'.__(' & Select Theme locations as a \' Footer Navigation \'', 'petshop'),
		 'section'  => 'most-footer-section',
		'settings' => 'footer_menu_right_note',
		'priority' => 95
    )));
   	$wp_customize->add_setting( 'footer_left_right_color_title', array(
		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
	) );
    $wp_customize->add_control(new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'footer_left_right_color_title', array(
		'label'    => __( 'Menu & Content Color Settings', 'petshop' ),
		'section'  => 'most-footer-section',
		'settings' => 'footer_left_right_color_title',
		'priority' => 100
    )));
    $colors[] = array(
		'slug'=>'most_footer_bg_color',
		'default' => '#171717',
		'label' => __('Background Color', 'petshop'),
		'priority' => 110
	);
    $colors[] = array(
		'slug'=>'most_footer_text_color',
		'default' => '#757575',
		'label' => __('Content Color', 'petshop'),
		'priority' => 120
	);
    $colors[] = array(
		'slug'=>'most_footer_link_color',
		'default' => '#ffffff',
		'label' => __('Hyper Link Color', 'petshop'),
		'priority' => 130
	);
    $colors[] = array(
		'slug'=>'most_footer_link_hover_color',
		'default' => '#ffffff',
		'label' => __('Hyper Link Hover Color', 'petshop'),
		'priority' => 140
	);
    foreach( $colors as $color ) {
		$wp_customize->add_setting(	$color['slug'], array(
			'default' => $color['default'],
	
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(new WP_Customize_Color_Control(	$wp_customize,	$color['slug'],	array(
			'label' => $color['label'],
			'section' => 'most-footer-section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action( 'customize_register', 'most_footer_section' );

//end
// Typography
function petshop_kaya_typography( $wp_customize ){
	global $kaya_petshop_customze_note_settings;
	$wp_customize->add_panel( 'typography_panel_section', array(
	    'priority'       => 140,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => esc_html__( 'Typography Section', 'petshop'),
	) );
	$wp_customize->add_section(
	// ID
	'typography_section',
	// Arguments array
	array(
		'title' => esc_html__( 'Google Font Family', 'petshop'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section',
	));	
	$wp_customize->add_setting( 'google_body_font',  array( 
		'default' => 'Nova Square', 
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Petshop_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_body_font', array(
		'label'   => esc_html__('Select font for Body','petshop'),
		'section' => 'typography_section',
		'settings'    => 'google_body_font',
		'priority'    => 0,
	)));
 	$wp_customize->add_setting( 'google_heading_font', array(
 		'default' => '2',
       	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_heading_font', array(
		'label'   => esc_html__('Select font for Headings','petshop'),
		'section' => 'typography_section',
		'settings'    => 'google_heading_font',
		'priority'    =>10,
	)));
	$wp_customize->add_setting( 'google_menu_font', array( 
		'default' => 'Open Sans',  	
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
	$wp_customize->add_control( new Petshop_Kaya_Customize_google_fonts_Control( $wp_customize, 'google_menu_font', array(
		'label'   => esc_html__('Select font for Menu','petshop'),
		'section' => 'typography_section',
		'settings'    => 'google_menu_font',
		'priority'    => 20,
	))); 	
}
add_action( 'customize_register', 'petshop_kaya_typography' );
/* --------------------------------------------
Typography
-----------------------------------------------*/
function petshop_kaya_font_panel_section( $wp_customize ){
	$wp_customize->add_section(
	// ID
	'font-panel-section',
	// Arguments array
	array(
		'title' => esc_html__( 'Font Settings', 'petshop'),
		'priority'       => 140,
		'capability' => 'edit_theme_options',
		'panel' => 'typography_panel_section'
	));	
	$font_weight_names = array('normal' => 'Normal', 'bold' => 'Bold', 'lighter' => 'Lighter');	
// Body Font Size
 $wp_customize->add_setting( 'body_font_title', array(
    	'sanitize_callback' => 'text_filed_sanitize',
    	) );
    $wp_customize->add_control(
     new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'body_font_title', array(
        'label'    => __( 'Body Font Settings', 'yoga' ),
      'section' => 'font-panel-section',
      'settings' => 'body_font_title',
      'priority' =>0
    )));

	$wp_customize->add_setting('body_font_size', array(
		'default' => '15',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_size', array(
		'label'   => __('Body Font Size','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_size',
		'priority'    => 3,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting('body_font_letter_space', array(
		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'body_font_letter_space', array(
		 'label'   => esc_html__('Body Font Letter Spacing','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'body_font_letter_space',
		'priority'    => 4,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'body_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('body_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Body Font Weight','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 9,
    ));
	// Menu Font Size
	$wp_customize->add_setting( 'menu_font_title', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'menu_font_title', array(
      'label'    => esc_html__( 'Menu Font Settings', 'petshop'),
      'section' => 'font-panel-section',
      'settings' => 'menu_font_title',
      'priority' =>10
    )));
	$wp_customize->add_setting('menu_font_size',array(
		'default' => '15',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_size', array(
		 'label'   => esc_html__('Menu Font Size','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_size',
		'priority'    => 11,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
	)));
 	$wp_customize->add_setting('menu_font_letter_space', array( 
 		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'menu_font_letter_space', array(
		 'label'   => esc_html__('Menu Font Letter Spacing','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'menu_font_letter_space',
		'priority'    => 20,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'menu_font_weight', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Menu Font Weight','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 21,
    ));
    $wp_customize->add_setting( 'main_menu_uppercase', array(
		'default'        => 0,
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('main_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','petshop'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 22
	) );
    $wp_customize->add_setting( 'customize_controll_divider_menu', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_menu', array(
        'section' => 'font-panel-section',
		'priority' => 23,
    )));
    $wp_customize->add_setting( 'customize_controll_divider_menu_desc', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_menu_desc', array(
        'section' => 'font-panel-section',
		'priority' => 50,
    ))); 
	// Menu Font Size
	$wp_customize->add_setting('child_menu_font_size', array(
		'default' => '13',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_size', array(
		 'label'   => esc_html__('Child Menu Font Size','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_size',
		'priority'    => 60,
		'choices'  => array(
			'min'  => 10,
			'max'  => 30,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('child_menu_font_letter_space',array(
  		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'child_menu_font_letter_space', array(
		 'label'   => esc_html__('Child Menu Font Letter Spacing','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'child_menu_font_letter_space',
		'priority'    => 70,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
 	$wp_customize->add_setting( 'child_menu_font_weight', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('child_menu_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Select Child Menu Font Weight','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 80,
    ));
    $wp_customize->add_setting( 'child_menu_uppercase', array(
		'default'        => 0,
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('child_menu_uppercase', array(
		'label'    => esc_html__( 'Enable Uppercase Letters ','petshop'),
		'section'  => 'font-panel-section',
		'type'     => 'checkbox',
		'priority' => 90
	) );
	// Title Font Sizes
	 $wp_customize->add_setting( 'titles_font_title', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'titles_font_title', array(
        'label'    => esc_html__( 'Title Font Settings', 'petshop'),
      'section' => 'font-panel-section',
      'settings' => 'titles_font_title',
      'priority' => 100
    )));
	// H1
	$wp_customize->add_setting('h1_title_fontsize', array(
		'default' => '30',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H1','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_title_fontsize',
		'priority'    => 105,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h1_font_letter_space',
    array( 'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h1_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H1','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h1_font_letter_space',
		'priority'    => 110,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h1_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h1_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H1','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 120,
    ));
    $wp_customize->add_setting( 'customize_controll_divider_h2', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h2', array(
        'section' => 'font-panel-section',
		'priority' => 130,
    )));
	// H2
	$wp_customize->add_setting('h2_title_fontsize',array(
    	 'default' => '24',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H2','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_title_fontsize',
		'priority'    => 140,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h2_font_letter_space', array( 
  		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h2_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H2','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h2_font_letter_space',
		'priority'    => 150,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h2_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'

    ));
    $wp_customize->add_control('h2_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H2','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 160,
    ));
     $wp_customize->add_setting( 'customize_controll_divider', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider', array(
        'section' => 'font-panel-section',
		'priority' => 170,
    )));	 
	// H3
	$wp_customize->add_setting('h3_title_fontsize',array( 
		'default' => '20',
    	'sanitize_callback' => 'petshop_kaya_check_number',
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_title_fontsize', array(
		 'label'   => esc_html__('Font size for heading - H3','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_title_fontsize',
		'priority'    => 180,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h3_font_letter_space', array(
  		'default' => '2',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h3_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H3','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h3_font_letter_space',
		'priority'    => 190,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h3_font_weight_bold', array(
        'default' => 'bold',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h3_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H3','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 200,
    ));
    $wp_customize->add_setting( 'customize_controll_divider_h3', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h3', array(
        'section' => 'font-panel-section',
		'priority' => 210,
    )));
	// H4
	$wp_customize->add_setting( 'h4_title_fontsize', array(
		'default' => '18',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H4','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_title_fontsize',
		'priority'    => 220,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
		)));
  	$wp_customize->add_setting('h4_font_letter_space', array(
  		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h4_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H4','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h4_font_letter_space',
		'priority'    => 230,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		))); 
	$wp_customize->add_setting( 'h4_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h4_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H4','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 240,
    ));
     $wp_customize->add_setting( 'customize_controll_divider_h4', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h4', array(
        'section' => 'font-panel-section',
		'priority' => 250,
    )));
	// H5
	$wp_customize->add_setting('h5_title_fontsize', array( 
		'default' => '16',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H5','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_title_fontsize',
		'priority'    => 260,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
   	$wp_customize->add_setting('h5_font_letter_space',array(
   		'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h5_font_letter_space', array(
		 'label'   => esc_html__('Font Letter Spacing - H5','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h5_font_letter_space',
		'priority'    => 270,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
	)));
	$wp_customize->add_setting( 'h5_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h5_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H5','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 280
    ));	 
     $wp_customize->add_setting( 'customize_controll_divider_h5', array(
        'sanitize_callback' => 'petshop_kaya_text_filed_sanitize'
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Divider_Control( $wp_customize, 'customize_controll_divider_h5', array(
        'section' => 'font-panel-section',
		'priority' => 290,
    )));
	// H6
	$wp_customize->add_setting('h6_title_fontsize', array( 
		'default' => '14',
	    'sanitize_callback' => 'petshop_kaya_check_number'
	 ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_title_fontsize', array(
		'label'   => esc_html__('Font size for heading - H6','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_title_fontsize',
		'priority'    => 300,
		'choices'  => array(
			'min'  => 10,
			'max'  => 80,
			'step' => 1
		),
	)));
    $wp_customize->add_setting('h6_font_letter_space', array(
    	'default' => '0',
    	'sanitize_callback' => 'petshop_kaya_check_number'
    ));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'h6_font_letter_space', array(
		'label'   => esc_html__('Font Letter Spacing - H6','petshop'),
		'section' => 'font-panel-section',
		'settings'    => 'h6_font_letter_space',
		'priority'    => 310,
		'choices'  => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		),
		)));
	$wp_customize->add_setting( 'h6_font_weight_bold', array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('h6_font_weight_bold', array(
        'type' => 'select',
        'label' => esc_html__('Select Font Weight - H6','petshop'),
        'section' => 'font-panel-section',
        'choices' => $font_weight_names,
		'priority' => 320,
    ));	 
}
add_action( 'customize_register', 'petshop_kaya_font_panel_section' );
/*-------------------------------------------------------------
 Global Section
--------------------------------------------------------------*/
function petshop_kaya_global_section( $wp_customize ) {
	$wp_customize->add_panel( 'general_section', array(
	    'priority' => 150,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Global Settings', 'petshop'),
	) );
	$wp_customize->add_section(
	// ID
	'global-section',
	// Arguments array
	array(
		'title' => esc_html__( 'General Settings', 'petshop'),
		'priority'       => 10,
		'capability' => 'edit_theme_options',
		'panel'  => 'general_section',
	));
	$wp_customize->add_setting('favicon[favi_img]',array(
    	'default' => '',
    	 'capability'   => 'edit_theme_options',
    	 'sanitize_callback' => 'esc_url_raw',
        'type'       => 'option',
    	));
    $wp_customize->add_control(	new Petshop_Kaya_Customize_Imageupload_Control($wp_customize,'favicon',array(
		'label' => esc_html__('Upload Favicon Image','petshop'),
		'section' => 'global-section',
		'settings' => 'favicon[favi_img]',
		'priority' => 10
	)));	
  	$wp_customize->add_setting( 'kaya_custom_css', array(
  		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
  	));
  	$wp_customize->add_control( new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_css', array(
		'label'    => esc_html__( 'Custom CSS', 'petshop'),
		'section'  => 'global-section',
		'settings' => 'kaya_custom_css',
		'priority' => 30,
		'type' => 'text-area',
      ))  );
 	 $wp_customize->add_setting( 'kaya_custom_jquery', array(
  		'default' => '',
  		'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
  	));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Textarea_Control( $wp_customize, 'kaya_custom_jquery', array(
      'label'    => esc_html__( 'Custom JQUERY', 'petshop'),
      'section'  => 'global-section',
      'settings' => 'kaya_custom_jquery',
      'priority' => 39,
      'type' => 'text-area',
      ))  );
	$wp_customize->add_setting( 'jquery_sample_info', array(
  	  	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',  	  	
  	));
 	$wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'jquery_sample_info', array(
		'label'    => esc_html__( "Ex: alert('hai');", 'petshop'),
		'section'  => 'global-section',
		'settings' => 'jquery_sample_info',
		'priority' => 40
    	))
 	 );  
  	$wp_customize->add_setting( 'responsive_layout_mode',
		array( 'default' => 'on',
			'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
		 ));
	$wp_customize->add_control( 'responsive_layout_mode',array(
		'label' => 'Responsive Mode',
		'section' => 'global-section',
		'priority' => 41,
		'type' => 'radio',
		'choices' => array(
			'on' => 'On',
			'off' => 'Off'	
			)
	));
	$wp_customize->add_setting( 'disable_site_loader', array(
		'default'        => 0,
		'transport' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
		'capability'     => 'edit_theme_options' )
	);
	$wp_customize->add_control('disable_site_loader', array(
		'label'    => esc_html__( 'Enable Site Loader','petshop'),
		'section' => 'global-section',
		'type'     => 'checkbox',
		'priority' => 50
	) );
 }
add_action( 'customize_register', 'petshop_kaya_global_section' );

/*--------------------------------------------------
 Blog & Portfolio Next Prevb Arrows
--------------------------------------------------*/

function petshop_kaya_single_next_prev_button_section( $wp_customize ){
	$wp_customize->add_section('single_next_prev_button_section',array(
		'title' => esc_html__('Blog Single Next / Prev Settings', 'petshop'),
		'priority' => '25',
		'panel' => 'general_section',
		'description' => '',
	));
	$colors = array();
	$wp_customize->add_setting( 'pf_blog_single_page_title', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    ));
    $wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'pf_blog_single_page_title', array(
		'label'    => esc_html__( 'Blog Single Page Buttons Colors', 'petshop'),
		'section' => 'single_next_prev_button_section',
		'settings' => 'pf_blog_single_page_title',
		'priority' => 28
    )));
	$colors =array();
	$colors[] = array(
		'slug'=>'next_prev_button_bg_color',
		'default' => '#FFFFFF',
		'label' => esc_html__('Button Background Color', 'petshop'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'next_prev_button_text_color',
		'default' => '#ffffff',
		'label' => esc_html__('Button Text Color', 'petshop'),
		'priority' => 30
	);
	$colors[] = array(
		'slug'=>'next_prev_button_hover_bg_color',
		'default' => '#f49c41',
		'label' => esc_html__('Button Hover Background Color', 'petshop'),
		'priority' => 50
	);
	$colors[] = array(
		'slug'=>'next_prev_button_hover_text_color',
		'default' => '#ffffff',
		'label' => esc_html__('Button Hover Text Color', 'petshop'),
		'priority' => 60
	);
	 $wp_customize->add_setting( 'next_prev_button_letter_sapcing', array(
        'default'        => '0',
    	'sanitize_callback'    => 'petshop_kaya_check_number',
    ) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Sliderui_Control( $wp_customize, 'next_prev_button_letter_sapcing', array(
		'label'   => esc_html__('Button Letter Space (px)','petshop'),
    	'section' => 'single_next_prev_button_section',
		'settings'    => 'next_prev_button_letter_sapcing',
		'priority'    => 80,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		),
	)));
    $wp_customize->add_setting( 'next_prev_button_font_weight',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('next_prev_button_font_weight', array(
        'type' => 'select',
        'label' => esc_html__('Button Font Weight','petshop'),
        'section' => 'single_next_prev_button_section',
        'choices' => array(
        	 'normal' => 'Normal',
        	 'bold' => 'Bold',
        	),
		'priority' => 90,
    ));
    $wp_customize->add_setting( 'next_prev_button_font_style',  array(
        'default' => 'normal',
        'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize'
    ));
    $wp_customize->add_control('next_prev_button_font_style', array(
        'type' => 'select',
        'label' => esc_html__('Button Font Style','petshop'),
        'section' => 'single_next_prev_button_section',
        'choices' => array(
        	 'normal' => esc_html__('Normal','petshop'),
        	 'italic' => esc_html__('Italic','petshop'),
        	),
		'priority' =>100,
    ));    
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting( $color['slug'], array(
			'default' => $color['default'],
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,$color['slug'],array(
			'label' => $color['label'],
			'section' => 'single_next_prev_button_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','petshop_kaya_single_next_prev_button_section');
/*-----------------------------------------------------------------------------------*/
// Woo Commerce Page
/*-----------------------------------------------------------------------------------*/ 
function petshop_kaya_woocommerce_page_section( $wp_customize ){
	$wp_customize->add_panel( 'woo_panel_section', array(
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	  	'title' => esc_html__( 'Woocommerce Section', 'petshop'),
	));
	$wp_customize->add_section('woocommerce_page_section',array(
		'title' => esc_html__('Woocommerce Page Settings', 'petshop'),
		'priority' => '150',
		'panel' => 'woo_panel_section'
	));
  	$wp_customize->add_setting('shop_page_columns', array(
		'default' => '4',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('shop_page_columns',array(
		'label' => esc_html__('Shop Page Columns','petshop'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'4' => esc_html__('4 Columns','petshop'),
			'3' => esc_html__('3 Columns','petshop'),
			'2' => esc_html__('2 Columns','petshop')
			),
		'priority' => 1
	));
	$wp_customize->add_setting('shop_page_sidebar', array(
		'default' => 'three_fourth',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('shop_page_sidebar',array(
		'label' => esc_html__('Shop Page Sidebar','petshop'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','petshop'),
			'three_fourth' => esc_html__('Right','petshop'),
			'three_fourth_last' => esc_html__('Left','petshop')
			),
		'priority' => 1
	));
	$wp_customize->add_setting('product_tag_page_sidebar', array(
		'default' => 'three_fourth',
		'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
	));
	$wp_customize->add_control('product_tag_page_sidebar',array(
		'label' => esc_html__('Product Categories / Tags  Page Sidebar','petshop'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','petshop'),
			'three_fourth' => esc_html__('Right','petshop'),
			'three_fourth_last' => esc_html__('Left','petshop')
			),
		'priority' => 2
	));
	$wp_customize->add_setting('shop_single_page_sidebar', array(
			'default' => 'three_fourth',
			'sanitize_callback' => 'petshop_kaya_radio_buttons_sanitize',
		));
	$wp_customize->add_control('shop_single_page_sidebar',array(
		'label' => esc_html__('Shop Single Page Sidebar','petshop'),
		'type' => 'radio',
		'section' => 'woocommerce_page_section',
		'choices' => array(
			'fullwidth' => esc_html__('No Sidebar','petshop'),
			'three_fourth' => esc_html__('Right','petshop'),
			'three_fourth_last' => esc_html__('Left','petshop')
			),
		'priority' => 3
	));
	$wp_customize->add_setting( 'Social_icon_settings', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Subtitle_control( $wp_customize, 'Social_icon_settings', array(
      'label'    => esc_html__( 'Shop Single page social icons', 'petshop'),
      'section' => 'woocommerce_page_section',
      'settings' => 'Social_icon_settings',
      'priority' =>13
    )));
  $colors[] = array(
    'slug'=>'shop_single_page_social_icons_link_color',
    'default' => '#f49c41',
    'priority' => 14,
    'label' => esc_html__('Social Icons Link color', 'petshop')
  );
  $colors[] = array(
    'slug'=>'shop_single_page_social_icons_hover_link_color',
    'default' => '#333333',
    'priority' => 15,
    'label' => esc_html__('Social Icons Hover Link color', 'petshop')
  );
  $colors[] = array(
    'slug'=>'shop_single_page_social_icons_border_color',
    'default' => '#333333',
    'priority' => 15,
    'label' => esc_html__('Social Icons Border color', 'petshop')
  );
  $colors[] = array(
    'slug'=>'shop_single_page_social_icons_hover_border_color',
    'default' => '#333333',
    'priority' => 15,
    'label' => esc_html__('Social Icons Hover Border color', 'petshop')
  );

$wp_customize->add_setting( 'pf_disable_facebook_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_facebook_icon', array(
	      'label'    => __( 'Disable Facebook Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_facebook_icon',
	      'type' => 'checkbox',
	      'priority' => 60
    ));
    $wp_customize->add_setting( 'pf_disable_twitter_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_twitter_icon', array(
	      'label'    => __( 'Disable Twitter Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_twitter_icon',
	      'type' => 'checkbox',
	      'priority' => 70
    ));

    $wp_customize->add_setting( 'pf_disable_google_plus_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_google_plus_icon', array(
	      'label'    => __( 'Disable Google Plus Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_google_plus_icon',
	      'type' => 'checkbox',
	      'priority' => 80
    ));
    $wp_customize->add_setting( 'pf_disable_linkedin_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_linkedin_icon', array(
	      'label'    => __( 'Disable Linkedin Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_linkedin_icon',
	      'type' => 'checkbox',
	      'priority' => 90
    ));

    $wp_customize->add_setting( 'pf_disable_pinterest_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_pinterest_icon', array(
	      'label'    => __( 'Disable Pinterest Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_pinterest_icon',
	      'type' => 'checkbox',
	      'priority' => 100
    ));
    $wp_customize->add_setting( 'pf_disable_stumbleupon_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_stumbleupon_icon', array(
	      'label'    => __( 'Disable Stumbleupon Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_stumbleupon_icon',
	      'type' => 'checkbox',
	      'priority' => 110
    ));
    $wp_customize->add_setting( 'pf_disable_digg_icon', array(
		'default' => '',
		'sanitize_callback' => 'petshop_kaya_checkbox_field_sanitize',
  	) );
	$wp_customize->add_control( 'pf_disable_digg_icon', array(
	      'label'    => __( 'Disable Digg Icon', 'petshop' ),
	      'section'  => 'woocommerce_page_section',
	      'settings' => 'pf_disable_digg_icon',
	      'type' => 'checkbox',
	      'priority' => 120
    ));
    foreach( $colors as $color ) {
      // SETTINGS
      $wp_customize->add_setting($color['slug'], array(
      'default' => $color['default'],
      'capability' =>  'edit_theme_options',
      'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
    ));
      // CONTROLS
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color['slug'], array(
      'label' => $color['label'], 
          'section' => 'woocommerce_page_section',
          'priority' => $color['priority'],
          'settings' => $color['slug'])
      ));
  }
}
add_action('customize_register','petshop_kaya_woocommerce_page_section');
// Elements Colors
function petshop_kaya_woocommerce_elements_section( $wp_customize ){
	global $kaya_petshop_customze_note_settings;
	$wp_customize->add_section('woocommerce_elements_section',array(
			'title' => 'Woocommerce General Section',
			'priority' => '190',
			'panel' => 'woo_panel_section'
	));
 	$colors = array();
 	$colors[] = array(
		'slug'=>'products_border_color',
		'default' => '#cccccc',
		'label' => esc_html__('Border Color', 'petshop'),
		'priority' => 10
	);
	$wp_customize->add_setting( 'products_border_color_note', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'products_border_color_note', array(
      	'html_tags' => true,
      'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> color applied for product single page and checkout page table borders colors and product single page tabs border bottom color', 'petshop'),$kaya_petshop_customze_note_settings ),
      'section'  => 'woocommerce_elements_section',
      'settings' => 'products_border_color_note',
      'priority' => 20
    )));
	$colors[] = array(
		'slug'=>'woo_elments_bg_colors',
		'default' => '#f49c41',
		'priority' => 60,
		'label' => esc_html__('Elements BG color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'woo_elments_text_colors',
		'default' => '#ffffff',
		'priority' => 70,
		'label' => esc_html__('Elements Text color', 'petshop')
	);
    $wp_customize->add_setting( 'elements_color_note', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'elements_color_note', array(
      	'html_tags' => true,
      'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> color applied for onsale tag, checkout page coupon toggle icon and checkout page registarion form toggle icon', 'petshop'),$kaya_petshop_customze_note_settings ),
      'section'  => 'woocommerce_elements_section',
      'settings' => 'elements_color_note',
      'priority' => 90
    ))); 
	foreach( $colors as $color ) {
	  	// SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' =>  'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		  // CONTROLS
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color['slug'], array(
			'label' => $color['label'], 
	      	'section' => 'woocommerce_elements_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','petshop_kaya_woocommerce_elements_section');
/*---------------------------------------------------
 Woo Color Section 
 ----------------------------------------------------*/
function petshop_kaya_products_bg_section( $wp_customize ){
	global $kaya_petshop_customze_note_settings;
	$wp_customize->add_section('products_bg_section',array(
		'title' => esc_html__('Woocommerce Product Color Settings ', 'petshop'),
		'priority' => '180',
		'panel' => 'woo_panel_section'
	));
	$colors = array();
	$colors[] = array(
		'slug'=>'products_bg_color',
		'default' => '#ffffff',
		'label' => esc_html__('Product Description bg Color', 'petshop'),
		'priority' => 10
	);
    $colors[] = array(
		'slug'=>'products_title_color',
		'default' => '#333333',
		'label' => esc_html__('Product Title Color', 'petshop'),
		'priority' => 20
	);
    $colors[] = array(
		'slug'=>'products_title_border_color',
		'default' => '#d6d6d6',
		'label' => esc_html__('Product Border Color', 'petshop'),
		'priority' => 30
	);
	 $colors[] = array(
		'slug'=>'products_title_border_hover_color',
		'default' => '#d6d6d6',
		'label' => esc_html__('Product Border Hover Color', 'petshop'),
		'priority' => 31
	);
	 $colors[] = array(
		'slug'=>'product_cart_color',
		'default' => '#d6d6d6',
		'label' => esc_html__('Product Cart BG Color', 'petshop'),
		'priority' => 31
	);
	 $colors[] = array(
		'slug'=>'product_cart_hover_color',
		'default' => '#d6d6d6',
		'label' => esc_html__('Product Cart Icon Color', 'petshop'),
		'priority' => 31
	);
	$wp_customize->add_setting( 'products_title_border_color_note', array(
    	'sanitize_callback' => 'petshop_kaya_text_filed_sanitize',
    	) );
    $wp_customize->add_control( new Petshop_Kaya_Customize_Description_Control( $wp_customize, 'products_title_border_color_note', array(
      'html_tags' => true,
      'label'    => wp_kses(__( '<strong class="customizer_note"> Note: </strong> Color applied for  Related products, cross sells and up-sells products titles bottom border color', 'petshop'), $kaya_petshop_customze_note_settings),
      'section'  => 'products_bg_section',
      'settings' => 'products_title_border_color_note',
      'priority' => 31
    )));
	$colors[] = array(
		'slug'=>'products_desc_color',
		'default' => '#686868',
		'label' => esc_html__('Description', 'petshop'),
		'priority' => 40
	);
	$colors[] = array(
		'slug'=>'products_price_color',
		'default' => '#939393',
		'label' => esc_html__('Price Color', 'petshop'),
		'priority' => 45
	);
    $colors[] = array(
		'slug'=>'products_link_color',
		'default' => '#686868',
		'label' => esc_html__('Hyper Link Color', 'petshop'),
		'priority' => 50
	);
    $colors[] = array(
		'slug'=>'products_link_hover_color',
		'default' => '#f49c41',
		'label' => esc_html__('Hyper Link Hover Color', 'petshop'),
		'priority' => 60
	);
    foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
		// CONTROLS
		$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, $color['slug'],	array(
			'label' => $color['label'],
			'section' => 'products_bg_section',
			'priority' => $color['priority'],
			'settings' => $color['slug'])
		));
	}
}
add_action('customize_register','petshop_kaya_products_bg_section');
/*---------------------------------------------------
Buttons Color
---------------------------------------------------*/
function petshop_kaya_woo_button_colors($wp_customize){
	$wp_customize->add_section('woo_button_section',array(
		'title' => esc_html__('Buttons Color Settings','petshop'),
		'priority' => '180',
		'panel' => 'woo_panel_section'
	));	
	$color = array();   
	$colors[] = array(
	  'slug'=>'woo_buttons_bg_color',
	  'default' => '',
	   'priority' => 6,
	  'label' => esc_html__('Buttons BG Color', 'petshop')
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_text_color',
	  'default' => '#ffffff',
	  'label' => esc_html__('Buttons Text Color', 'petshop'),
	  'priority' => 7
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_bg_hover_color',
	  'default' => '',
	   'priority' => 8,
	  'label' => esc_html__('Buttons BG Hover Color', 'petshop')
	);
	$colors[] = array(
	  'slug'=>'woo_buttons_text_hover_color',
	  'default' => '#ffffff',
	   'priority' => 9,
	  'label' => esc_html__('Buttons Text Hover Color', 'petshop')
	);
	foreach( $colors as $color ) {
	  	// SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
			'default' => $color['default'],
			'capability' =>  'edit_theme_options',
			'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
		));
	  	// CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'woo_button_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','petshop_kaya_woo_button_colors');
/*--------------------------------------------------
Alert Boxes
--------------------------------------------------*/
function petshop_kaya_woo_alert_button_colors($wp_customize){
	$wp_customize->add_section('woo_alertbox_section',array(
		'title' => esc_html__('Alert Boxes Color Settings','petshop'),
		'priority' => '190',
		'panel' => 'woo_panel_section'
	));	
	$colors[] = array(
		'slug'=>'success_msg_bg_color',
		'default' => '#dff0d8',
		'transport'   => 'refresh',
		'priority' => 90,
		'label' => esc_html__('Success Alert Box BG Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'success_msg_text_color',
		'default' => '#468847',
		'transport'   => 'refresh',
		'priority' => 100,
		'label' => esc_html__('Success Alert Box Text Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'notification_msg_bg_color',
		'default' => '#b8deff',
		'transport'   => 'refresh',
		'priority' => 110,
		'label' => esc_html__('Notification Alert Box BG Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'notification_msg_text_color',
		'default' => '#333',
		'transport'   => 'refresh',
		'priority' => 120,
		'label' => esc_html__('Notification Alert Box Text Color', 'petshop')
	);
	$colors[] = array(
		'slug'=>'warning_msg_bg_color',
		'default' => '#f2dede',
		'transport'   => 'refresh',
		'priority' => 130,
		'label' => esc_html__('Warning Alert Box BG Color', 'petshop')
	); 
	$colors[] = array(
		'slug'=>'warning_msg_text_color',
		'default' => '#a94442',
		'transport'   => 'refresh',
		'priority' => 140,
		'label' => esc_html__('Warning Alert Box Text Color', 'petshop')
	);  
	foreach( $colors as $color ) {
	  // SETTINGS
	  	$wp_customize->add_setting($color['slug'], array(
	  		'default' => $color['default'],
	      	'capability' =>  'edit_theme_options',
	      	'sanitize_callback' => 'petshop_kaya_color_filed_sanitize',
	    ));
	  // CONTROLS
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array(
	  		'label' => $color['label'], 
	      	'section' => 'woo_alertbox_section',
	      	'priority' => $color['priority'],
	      	'settings' => $color['slug'])
	    ));
	}
}
add_action('customize_register','petshop_kaya_woo_alert_button_colors'); ?>