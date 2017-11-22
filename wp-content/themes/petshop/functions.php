<?php
if ( ! defined( 'KAYA_FILEPATH' ) ) {
    define('KAYA_FILEPATH', get_template_directory());
}
if ( ! defined( 'KAYA_DIRECTORY' ) ) {
    define('KAYA_DIRECTORY', get_template_directory_uri());
}
if ( ! defined( 'KAYA_THEME_NAME' ) ) {
    define('KAYA_THEME_NAME', 'petshop');
}
add_filter( 'use_default_gallery_style', '__return_false' );
require_once get_template_directory() . '/mr-image-resize.php';          
if( !function_exists('petshop_kaya_img_resize') ){ // Image Resizer
    function petshop_kaya_img_resize($url, $width, $height=0, $align='') {
        return petshop_kaya_image_resize($url, $width, $height, true, $align, false);
      }
}
add_action( 'after_setup_theme', 'petshop_kaya_theme_setup' );
if( !function_exists('petshop_kaya_theme_setup')){
    function petshop_kaya_theme_setup() {      
        // This theme allows users to set a custom background
        add_theme_support( 'custom-background');
        add_theme_support( 'custom-header' );
		add_theme_support( 'title-tag' );
        // Add default posts and comments RSS feed links to head
        add_theme_support( 'automatic-feed-links' );
        // This theme menu supports
        add_theme_support( 'nav-menus' );
        add_editor_style();
        // This theme uses wp_nav_menu() in 2 location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Navigation', 'petshop'),
            'footer' => esc_html__( 'Footer Navigation' , 'petshop'),   
        ) );
        // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
        add_theme_support( 'post-thumbnails' );
        add_theme_support('post-formats',array( 'standard'=>'standard','gallery','quote','video','audio' ) ); // Postformates
    }
}  
if ( ! isset( $content_width ) )
   $content_width ='';
//Plugin Activation 
require_once get_template_directory() . '/lib/plugin-activation.php';
add_action( 'tgmpa_register', 'petshop_kaya_required_plugins' );
if( !function_exists('petshop_kaya_required_plugins') ){
    function petshop_kaya_required_plugins() {
        $plugins = array(
            array(
                'name'      => 'SiteOrigin Page Builder',
                'slug'      => 'siteorigin-panels',
                'required'  => true,
            ),
             array(
                'name'      => 'WooCommerce',
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => 'Meta Boxes',
                'slug'      => 'meta-box',
                'required'  => true,
            ),
            array(
                'name'                  => 'Kaya '.ucfirst(KAYA_THEME_NAME).' Plugin', // The plugin name
                'slug'                  => 'kaya-'.KAYA_THEME_NAME.'-plugin', // The plugin slug (typically the folder name)
                'source'                => get_template_directory_uri(). '/lib/plugins/kaya-'.KAYA_THEME_NAME.'-plugin.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ), 
        );    
        $config = array(
            'domain'       => 'petshop',             // Text domain - likely want to be the same as your theme.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug'  => 'themes.php',            // Parent menu slug.
            'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                       // Message to output right before the plugins table
            'strings'             => array(
                'page_title'                       => esc_html__( 'Install Required Plugins', 'petshop'),
                'menu_title'                       => esc_html__( 'Install Plugins', 'petshop'),
                'installing'                       => esc_html__( 'Installing Plugin: %s', 'petshop'), // %1$s = plugin name
                'oops'                             => esc_html__( 'Something went wrong with the plugin API.', 'petshop'),
                'notice_can_install_required'      => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','petshop' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'   => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'petshop' ), // %1$s = plugin name(s)
                'notice_cannot_install'            => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'petshop' ), // %1$s = plugin name(s)
                'notice_can_activate_required'     => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' , 'petshop'), // %1$s = plugin name(s)
                'notice_can_activate_recommended'  => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'petshop' ), // %1$s = plugin name(s)
                'notice_cannot_activate'           => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'petshop' ), // %1$s = plugin name(s)
                'notice_cannot_update'             => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'petshop' ), // %1$s = plugin name(s)
                'install_link'                     => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'petshop' ),
                'activate_link'                    => _n_noop( 'Activate installed plugin', 'Activate installed plugins' , 'petshop'),
                'return'                           => esc_html__( 'Return to Required Plugins Installer', 'petshop'),
                'plugin_activated'                 => esc_html__( 'Plugin activated successfully.', 'petshop'),
                'complete'                         => esc_html__( 'All plugins installed and activated successfully. %s', 'petshop'), // %1$s = dashboard link
                'nag_type'                         => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );
        tgmpa( $plugins, $config );
    }
 }   
// End
//Theme Files
require_once get_template_directory() . '/lib/includes/theme-functions.php'; //header functions
require_once get_template_directory() . '/lib/includes/header_loads.php'; //Jquery & Css Load
require_once get_template_directory() . '/lib/includes/customizer/theme_customization.php'; //Theme Customization
require_once get_template_directory() . '/lib/functions/kaya_pagination.php'; // pagination functions
require_once get_template_directory() . '/lib/functions/kaya_comments.php'; // comments page
require_once get_template_directory() . '/lib/functions/common.php'; // common functions
require_once get_template_directory() . '/lib/functions/widgets/widgets.php'; //Widgets
load_theme_textdomain( 'petshop', get_template_directory(). '/languages' );
$locale = get_locale();
$locale_file = get_template_directory(). "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );
/* ------------------------------------------------------------------------ */
// limit the post content
/* ------------------------------------------------------------------------ */
if( !function_exists('petshop_kaya_content') ){    
    function petshop_kaya_content($limit) {
        $content = explode(' ', get_the_content(), $limit);
        if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).' ';
        } else {
        $content = implode(" ",$content);
        }   
        $content = preg_replace('/\[.+\]/','', $content);
        $content = apply_filters('get_the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}
/* ------------------------------------------------------------------------ */
//Woocommerce Start here
/* ------------------------------------------------------------------------ */
add_theme_support( 'woocommerce' );
if( class_exists('woocommerce')){
    if( !function_exists('petshop_kaya_override_page_title') ){
        function petshop_kaya_override_page_title() {
            return false;
        }
    }
    add_filter('woocommerce_show_page_title', 'petshop_kaya_override_page_title');
   // Cart Items adding With out refresh
    add_filter('add_to_cart_fragments', 'petshop_kaya_woo_header_add_to_cart_fragment');
    if( !function_exists('petshop_kaya_woo_header_add_to_cart_fragment') ){
        function petshop_kaya_woo_header_add_to_cart_fragment( $fragments ) {
            ob_start();
            ?>
            <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','petshop' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
            <?php
            
            $fragments['a.cart-contents'] = ob_get_clean();
            
            return $fragments;
        }
    }
function petshop_product_category_class($classes) {
    global $product, $woocommerce_loop, $post;
    if( is_woocommerce() ){
        $shop_columns = get_theme_mod('shop_page_columns') ? get_theme_mod('shop_page_columns') : '4';
        $productid=get_the_terms($post->ID, 'product_cat');
        if(!empty($productid)){
        foreach((get_the_terms($post->ID, 'product_cat')) as $term){
            $classes[] = $term->name;
            $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $shop_columns );
            if( is_shop() ){
                $classes[] ='shop-product-coloumns-'.$shop_columns;
            }   
            else{
                $classes[] ='shop-product-coloumns-'.$woocommerce_loop['columns'];  
            }
        }
    }
   }
    return $classes;
}
add_filter('post_class', 'petshop_product_category_class');
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
        global $post;
        $img_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
        if (  $img_url ) {
            return get_the_post_thumbnail( $post->ID, $size );
        } else {
           echo '<img src="'.get_template_directory_uri().'/images/product_slider.jpg"  alt="" />';
        }
    }
}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'petshop_kaya_show_product_new_badge' );  // The new badge function
function petshop_kaya_show_product_new_badge() {
                $postdate       = get_the_time( 'Y-m-d' );          // Post date
                $postdatestamp  = strtotime( $postdate );           // Timestamped post date
                $newness        = '2';    // Newness in days as defined by option
                if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) { // If the product was published within the newness time frame display the new badge
                    echo '<span class="wc-new-badge">' . __( 'New', 'petshop' ) . '</span>';
                }
            }
add_filter( 'woocommerce_get_price_html', 'petshop_kaya_custom_price_html', 100, 2 );
function petshop_kaya_custom_price_html( $price, $product )
{
    global $post;
    $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
    if(is_single() && $sales_price_to != "")
    {
        $sales_price_date_to = date("j M y", $sales_price_to);
        return str_replace( '</ins>', ' </ins> <b>(Offer till '.$sales_price_date_to.')</b>', $price );
    }
    else
    {
        return apply_filters( 'woocommerce_get_price', $price );
    }
}
$option_posts_per_page = get_option( 'posts_per_page' );
function petshop_kaya_posts_per_page( $value ) {
    global $option_posts_per_page;
    if ( is_tax( 'portfolio_category') ) {
        return -1;
    } else {
        return $option_posts_per_page;
    }
}
add_action( 'init', 'petshop_kaya_posts_per_page_option', 0);
function petshop_kaya_posts_per_page_option() {
    add_filter( 'option_posts_per_page', 'petshop_kaya_posts_per_page' );
} 

add_action( 'after_setup_theme', 'yourtheme_setup' );

function yourtheme_setup() {
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
}
?>