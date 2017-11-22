<?php
function petshop_enqueue_styles() {
    wp_enqueue_style( 'petshop-child-style', get_stylesheet_uri(), array( 'petshop-parent-style' ) );
     wp_enqueue_style( 'petshop-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'petshop_enqueue_styles' );
?>