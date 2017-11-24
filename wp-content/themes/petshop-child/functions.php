<?php
function petshop_enqueue_styles() {
    wp_enqueue_style( 'petshop-child-style', get_stylesheet_uri(), array( 'petshop-parent-style' ) );
     wp_enqueue_style( 'petshop-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'petshop_enqueue_styles' );

// Shortcode [sponsored_product]
add_shortcode( 'sponsored_product', 'sponsored_shortcode' );
	function sponsored_shortcode( $atts ){
		// args
		$args = array(
			'numberposts'	=> -1,
			'post_type'		=> 'product',
			'meta_key'		=> 'sponsored_product',
			'meta_value'	=> true
		);

		// query
		$the_query = new WP_Query( $args );
		// var_dump($the_query);

		if( $the_query->have_posts() ): ?>
			<ul>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<?php the_title(); ?>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>

		<?php wp_reset_query();	 // Restore global post data stomped by the_post(). 
	}

?>