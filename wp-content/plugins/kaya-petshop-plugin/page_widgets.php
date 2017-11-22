<?php
/*  Plugin Name: Kaya Petshop Plugin
    Plugin URI: http://themeforest.net/user/kayapati/portfolio
    Description: kaya Petshop Plugin Includes Custom Post Types & Widgets. The easy way to create page layouts using Widgets in Pages or post with the help of Widget based page builder like   "SiteOrigin" Page Builder, always note that these works better in pages only, not rcomended for sidebars. 
    Author: Ram
    Author URI: http://themeforest.net/user/kayapati/portfolio
    Version: 1.0.3
*/
if (!defined('ABSPATH')){ exit; }
if ( ! class_exists( 'Petshop_Page_Widgets' ) ) :
class Petshop_Page_Widgets { 
 public function __construct()
    {  
        global $petshop_plugin_name;
        $petshop_plugin_name = 'petshop';
        add_action( 'wp_enqueue_scripts', array( &$this, 'kaya_enqueue_styles' ) );        
        add_action( 'init', array( &$this, 'kaya_register_styles' ) );
        add_action( 'wp_enqueue_scripts', array( &$this, 'kaya_enqueue_scripts' ), 100,100 );
        add_action( 'init', array( &$this, 'kaya_register_scripts' ), 10,11 );
        add_action('plugins_loaded', array(&$this,'kaya_plugin_textdomain'));
        add_action('admin_enqueue_scripts', array(&$this,'kaya_admin_styles')); //style files
        add_action('admin_enqueue_scripts', array(&$this,'kaya_admin_scripts'));
        $this->kaya_custom_post_types();
        $this->kaya_plugin_constant();
        $this->kaya_plugin_function();
        $this->kaya_include_widgets();
    }
    public function kaya_plugin_constant(){
        global $petshop_plugin_name;
        define( strtoupper($petshop_plugin_name).'_PLUGIN_URL', plugin_dir_url( __FILE__ ));
        define( strtoupper($petshop_plugin_name).'_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
        define( strtoupper($petshop_plugin_name).'_VERSION', '1.0' );
    }
    public function kaya_custom_post_types(){ 
        include_once plugin_dir_path( __FILE__ ).'/inc/custom_posts/kaya_slider.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/custom_posts/kaya_team.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/custom_posts/kaya_testimonial.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/custom_posts/toggletabs_accordion.php';
    }
    public function kaya_plugin_function(){
        include_once plugin_dir_path( __FILE__ ).'/inc/mr-image-resize.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/post-format.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/social-icons.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/functions.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/customize_settings.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/animation_names.php';
        include_once plugin_dir_path( __FILE__ ).'/inc/icon_box_icons.php';
        require_once plugin_dir_path( __FILE__ ).'/inc/admin/importer/kaya-importer.php';
        require_once plugin_dir_path( __FILE__ ).'/inc/admin/meta-boxes.php';
        require_once plugin_dir_path( __FILE__ ).'/inc/admin/kaya_admin_settings.php';
        require_once plugin_dir_path( __FILE__ ).'/inc/admin/kaya-sidebar-generator.php';
        require_once plugin_dir_path( __FILE__ ).'/inc/admin/kaya_admin.php';
    }
    public function kaya_include_widgets(){
        foreach ( glob( plugin_dir_path( __FILE__ )."/inc/widgets/*.php" ) as $widget_file )
        include_once $widget_file;
    }
    public function kaya_include_shortcodes(){
        foreach ( glob( plugin_dir_path( __FILE__ )."/inc/shortcodes/*.php" ) as $shortcode_file )
        include_once $shortcode_file;
    }
    /* Styles Register */
    public function kaya_enqueue_styles() {
        global $petshop_plugin_name;
        wp_enqueue_style('fontawesome', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/fontawesome/style.css',true, '', 'all');
        wp_enqueue_style($petshop_plugin_name.'_css_page_widgets', plugins_url('css/page_widgets.css', __FILE__));
        wp_enqueue_style('css_widgets_animation', plugins_url('css/animate.min.css', __FILE__));
    }
    /* Scripts Register */
    public function kaya_register_scripts(){
        wp_register_script('jquery_owlcarousel', plugins_url('js/owl.carousel.js', __FILE__),array( 'jquery' ),'1.29', true);
        wp_register_script('jquery.isotope', plugins_url('js/jquery.isotope.min.js', __FILE__),array( 'jquery' ),'1.29', true);
    }
    public function kaya_register_styles(){
        wp_register_style('css_owl.carousel', plugins_url('css/owl.carousel.css', __FILE__));
    }
    public function kaya_enqueue_scripts(){
        global $petshop_plugin_name;
        wp_enqueue_script('jquery_prettyphoto', plugins_url('js/jquery.prettyPhoto.js', __FILE__),array( 'jquery' ),'', true);
      //  wp_enqueue_script('isotope_wiaitImages', plugins_url('js/isotope.wiaitImages.js', __FILE__),array( 'jquery' ),'', true);
        wp_enqueue_script('jquery_wow.min', plugins_url('js/wow.min.js', __FILE__),array( 'jquery' ),'', true);
        wp_localize_script( 'jquery', 'cpath', array('plugin_dir' => plugins_url('',__FILE__)));
        wp_enqueue_script($petshop_plugin_name.'_js_scripts', plugins_url('js/scripts.js', __FILE__),array( 'jquery' ),'', true);
        wp_enqueue_script('jquery.isotope');
        wp_enqueue_script('jquery-ui-accordion');
    }
    /* Admin Scripts Here */
    function kaya_admin_styles(){
        wp_enqueue_style('admin_widgets', plugins_url('css/admin_widgets.css', __FILE__));
        wp_enqueue_style('genericons', plugins_url('icons/genericons/style.css', __FILE__));
        wp_enqueue_style('fontawesome', plugins_url('icons/fontawesome/style.css', __FILE__));
        wp_enqueue_style('elegantline', plugins_url('icons/elegantline/style.css', __FILE__));
        wp_enqueue_style('icomoon', plugins_url('icons/icomoon/style.css', __FILE__));         
        wp_enqueue_media();
    }
    function kaya_admin_scripts(){
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('kaya_custommeta', plugins_url('js/kaya_custommeta.js', __FILE__),array( 'jquery' ),'', true);
        wp_enqueue_script( 'wp-color-picker' ); 
    }
    /* Text Domain */
    public  function kaya_plugin_textdomain() {
        global $petshop_plugin_name;
        $locale = apply_filters( 'plugin_locale', get_locale(), $petshop_plugin_name );
        load_textdomain( $petshop_plugin_name, trailingslashit( WP_LANG_DIR ) . '/' . $locale . '.mo' );
        load_plugin_textdomain( $petshop_plugin_name, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
} 
endif;
$petshop_page_widgets = new Petshop_Page_Widgets();
?>