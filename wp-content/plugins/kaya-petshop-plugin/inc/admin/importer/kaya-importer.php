<?php 
if( !class_exists('Petshop_Demo_Import') ){
    class Petshop_Demo_Import
    {
        var $petshop_plugin_name;
        function __construct() {
            global $petshop_plugin_name;
            $this->petshop_plugin_name = $petshop_plugin_name;
            if ( ! is_admin() ) {
                return;
            }
            add_action('admin_menu', array(&$this, 'kaya_admin_option_page'));
        }
        /**
         * Importing XML Demo content
         */
         function kaya_admin_option_page(){
        add_menu_page('Options', ucfirst('petshop').' Options', 'manage_options', 'kaya_theme_options', array(&$this, 'import_xml_content'), '', 62);
        add_submenu_page('kaya_theme_options', 'Import', 'One Click Demo', 'manage_options', 'one_click_import', array(&$this,'import_xml_content'));
        remove_submenu_page( 'kaya_theme_options', 'kaya_theme_options' );
    }
        function import_xml_content(){
            echo '<h3>'.__('Choose Your','petshop').' ' .ucfirst($this->petshop_plugin_name). ' '.__('Demo Content ','petshop').'&nbsp;</h3>';
            echo '<div class="kaya_demo_note"><strong style="color:red;">'. __('Note','petshop').' : </strong> '.__('Before importing demo content make sure that you have installed and activated  Petshop theme required plugins', 'petshop').'</div>';   ?>
            <div id="import_xml_content_wrapper">            
                <div class="content_loading_wrapper">
                    <img class="content_loading" style="display:none" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.GIF" class="" /><div class="import_message"> </div>
                </div>
                <span class="clear"> </span>
                <label>
                   <input type="radio" name="demo_content" id="<?php echo $this->petshop_plugin_name; ?>" value="<?php echo $this->petshop_plugin_name; ?>" checked />
                    <img src="<?php echo constant(strtoupper($this->petshop_plugin_name).'_PLUGIN_URL'); ?>images/one_click_demo/<?php echo $this->petshop_plugin_name; ?>.jpg">
                </label>
                <span class="clear"> </span>
                <input type="button" class="xml_demo_import button button-primary button-large" value="<?php echo _e( 'Import Demo Content', 'petshop'); ?>" />
                <?php
                echo '<div class="clear"> </div>';
                echo '</div>';
                $css ='';
                $css .='.content_loading_wrapper {
                        margin-top: 30px;
                    }
                    .content_loading_wrapper img {
                        float: left;
                        margin-right: 15px;
                    }
                    label > input{ 
                      visibility: hidden;
                      position: absolute;
                    }
                    #import_xml_content_wrapper label {
                       float: left;
                        margin-bottom: 30px;
                        margin-right: 1.5%;
                        overflow: hidden;
                        text-align: center;
                        width: 23.5%;
                    }
                    .xml_demo_import {
                        float: left;
                        margin-bottom: 30px !important;
                       margin-right: 1.5% !important;
                    }
                    .kaya_demo_note {
                        border: 1px solid #e5e5e5;
                        margin-bottom: 30px;
                        padding: 15px;
                    }
                    .import_message{
                        margin-top: 30px;
                        margin-bottom: 30px;
                    }
                    .import_message .updated{
                        margin-left:0; 
                    }
                    #import_xml_content_wrapper label img {
                        background: none repeat scroll 0 0 #f5f5f5;
                        border: 1px solid #dfdfdf;
                        display: block;
                        margin-right: 16px;
                        overflow: hidden;
                        padding: 6px;
                        width: 95%;
                    }
                    label > input:checked + img {
                        border: 1px solid #2ea2cc!important;
                    }';
                $css = preg_replace( '/\s+/', ' ', $css );
                $output = "<style type=\"text/css\">\n" . $css . "\n</style>";
                echo $output;  ?>     
                <script>
                    (function($) {
                    "use strict";
                         $("input[type='button']").click(function(){
                             var $import_options = $("input[name='demo_content']:checked").val();
                             if( $import_options == undefined){
                                alert('Please Choose Your Demo Content');
                                return;
                             }
                            //alert($import_options);
                            var $import_true = confirm('are you sure to import dummy content ? it will overwrite the existing data');
                            if($import_true == false) return;
                            $('.import_message').html(' Data is being imported please be patient, while the awesomeness is being created :)  ');
                            $('.content_loading').show();
                            $('.xml_demo_import').attr('disabled','disable');
                            $('html, body').animate({scrollTop: $("body").offset().top}, 400);
                            var data = {
                                action: 'petshop_demo_xml_content_import',
                                xml: $import_options,     
                            };
                            $.post(ajaxurl, data, function(response) {
                                $('.import_message').html('<div class="import_message_success">'+ response +'</div>');
                                $('.content_loading').hide();
                                $('.xml_demo_import').removeAttr('disabled');
                            });
                        });
                    })(jQuery);
                </script>
            <?php 
        }
    }
    $globel_options = new Petshop_Demo_Import();
    add_action( 'wp_ajax_petshop_demo_xml_content_import', 'petshop_demo_xml_content_import' );
}
if( !function_exists('petshop_demo_xml_content_import') ){
    function petshop_demo_xml_content_import() 
    {    
        WP_Filesystem();
        global $wp_filesystem, $petshop_plugin_name;
        if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);      
        // Load Importer API
        require_once ABSPATH . 'wp-admin/includes/import.php';
        if ( ! class_exists( 'WP_Importer' ) ) {
            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
            if ( file_exists( $class_wp_importer ) )
            {
                require $class_wp_importer;
            }
        }
        if ( ! class_exists( 'WP_Import' ) ) {
            $class_wp_importer = constant(strtoupper($petshop_plugin_name).'_PLUGIN_DIR').'inc/admin/importer/wordpress-importer.php';
            if ( file_exists( $class_wp_importer ) )
                require $class_wp_importer;
        }
        //ob_start();
        if ( class_exists( 'WP_Import' ) ) 
        { 
            if( $_POST['xml'] ){
                $files = $_POST['xml'];
            }else{
                
            }
            $import_filepath =  constant(strtoupper($petshop_plugin_name).'_PLUGIN_DIR').'inc/admin/kaya-xml-files/'.$files.'.xml';
            $wp_import = new WP_Import();
            set_time_limit(0);
            $wp_import->fetch_attachments = false;
            $wp_import->import($import_filepath);
            // Customizer options 
            $file_name = $files.'.json'; // Get the name of file
            if( $file_name ){
                $file_path = explode('.', $file_name);
                $file_ext = end($file_path);  // Get extension of file
                if (($file_ext == "json")) {
                    $customizer_content = constant(strtoupper($petshop_plugin_name).'_PLUGIN_DIR').'inc/admin/kaya-xml-files/'.$file_name;
                     if( $customizer_content ){ // Customizer Data Read
                        //$encode_options = file_get_contents($customizer_content);
                        $encode_options = $wp_filesystem->get_contents( $customizer_content);
                        $options = json_decode($encode_options, true);
                        foreach ($options as $key => $value) {
                            set_theme_mod($key, $value);
                        }
                        $locations = array();// Menu Options Read
                        if (is_array($options['nav_menu_locations'])) {
                               foreach ($options['nav_menu_locations'] as $menu_name => $menu_id) {
                                $locations[$menu_name] = $menu_id;
                                set_theme_mod( 'nav_menu_locations', $locations);
                            }
                        }                    
                        $front_page = !empty( $options['front_page_name'] ) ?  $options['front_page_name'] : '2'; // Front Page 
                        $page_title = get_the_title( $front_page );
                        $front_page_name = get_page_by_title( $page_title );
                        if( $front_page_name == 'Sample Page' ){ }
                        else{
                            update_option( 'page_on_front', $front_page_name->ID );
                            update_option( 'show_on_front', 'page' );
                        }
                        echo "<div class='updated'><p>".__('All options are restored successfully','petshop')."</p></div>";
                    }else{
                     echo "<div class='error'><p>".__('Error occured while loading / File not found','petshop')."</p></div>";
                    }
                    }
                }else{
                     echo "<div class='error'><p>".__('Error occured while loading / File not found','petshop')."</p></div>";
                }
       // ob_get_clean();
        }
        die(); // this is required to return a proper result
    }
}
?>