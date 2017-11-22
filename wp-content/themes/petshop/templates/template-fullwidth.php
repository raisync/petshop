<?php
/*
Template Name: Full Width Page
*/
get_header(); 
global $petshop_kaya_post_item_id, $post;
  echo  petshop_kaya_post_item_id(); ?>
  <?php 
				if( !is_front_page() ){
					echo petshop_kaya_custom_pagetitle($post->ID);
				} ?>
		<div id="mid_container_wrapper" class="mid_container_wrapper_section">
			<div id="mid_container" class="container">
				
				<section class="fullwidth" id="content_section">
				<?php
				if ( have_posts() ) while ( have_posts() ) : the_post(); 
						
				?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
						<?php the_content(); ?>
						</div>
					</div>
			<!-- #post-## -->
		<?php endwhile; ?>
		</section>
	<?php   get_footer(); ?>