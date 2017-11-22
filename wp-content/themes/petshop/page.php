<?php get_header(); 
	//Start Middle Section 
	global $petshop_kaya_post_item_id, $post;
  	echo  petshop_kaya_post_item_id(); ?>
  	<?php echo petshop_kaya_custom_pagetitle($post->ID); ?>
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="container">
			<section class="three_fourth" id="content_section">
				<?php // Page Content
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content();
							wp_link_pages();
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							} ?>
						</div>
					</div>
				<?php endwhile; ?>
			</section>
			<aside class="one_fourth_last right_sidebar"> <!--Start Sidebar Section -->
				<?php get_sidebar(); ?>	
			</aside> <!-- End Sidebar Section -->
			 
	<?php get_footer(); // Footer ?>