<?php
// Customizer Export Settings
ob_start();
if( !class_exists('kaya_Julia_Customizer_Menu') ){
    class kaya_Julia_Customizer_Menu {
        function __construct() {
            if ( ! is_admin() ) {
                return;
            }
            add_action( 'admin_menu', array( $this, 'kaya_petshop_customizer_menu_setion' ),0 );
        }
        /**
         * export customize options
         */
        function kaya_petshop_customizer_menu_setion() 
        {
            add_theme_page( __('Customize Options Export','petshop'), __('Customize Options Export','petshop'), 'edit_theme_options', 'export', array( $this,'kaya_petshop_customize_export_option_page'));
        }
        function kaya_petshop_customize_export_option_page() {
        if (!isset($_POST['export'])) { ?>
            <div class="wrap">
                <div id="icon-tools" class="icon32"><br /></div>
                <h2><?php esc_html_e('Export Julia Theme Customize Options','petshop'); ?> </h2>
                <p><?php _e('When you click <tt>Backup all options</tt> button, system will generate a JSON file for you to save on your computer.','petshop'); ?></p>
                <p><?php _e('This backup file contains all configution and setting options on our website. Note that it do <b>NOT</b> contain posts, pages, or any relevant data, just your all options.','petshop'); ?></p>
                <p> <?php esc_html_e('After exporting, you can either use the backup file to restore your settings on this site again or another WordPress site.','petshop'); ?> </p>
                <form method='post'>
                    <p class="submit">
                        <?php wp_nonce_field('customize-export'); ?>
                        <input type='submit' name='export' value='<?php esc_html_e('Dowload Customizer Settings','petshop'); ?>' class="button"/>
                    </p>
                </form>
            </div>
            <?php
        }
        elseif (check_admin_referer('customize-export')) {
            $blogname = str_replace(" ", "", get_option('blogname'));
            $date = date("m-d-Y");
            $json_name = $blogname."-".$date; // Namming the filename will be generated.
            $options = get_theme_mods(); // Get all options data, return array        
            foreach ($options as $key => $value) {
                $value = maybe_unserialize($value);
                $need_options[$key] = $value;
            }
            $need_options['front_page_name'] .= get_option('page_on_front');
            $json_file = json_encode($need_options); // Encode data into json data
            ob_clean();
            echo $json_file;
            header("Content-Type: text/json; charset=" . get_option( 'blog_charset'));
            header("Content-Disposition: attachment; filename=$json_name.json");
            exit();
        }
    }
    }
    $kaya_petshop_admin_theme_page = new kaya_Julia_Customizer_Menu();
} ?>