<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
$blog_single_page_sidebar = get_theme_mod( 'blog_single_page_sidebar' ) ? get_theme_mod( 'blog_single_page_sidebar' ): 'three_fourth';
$blog_sidebar_position = ( $blog_single_page_sidebar == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
$sidebar_border_class=( $blog_single_page_sidebar == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar'; ?>
	<!-- Start Middle Section  -->
		<?php echo petshop_kaya_custom_pagetitle($post->ID); ?>
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="container">
			<section class="<?php echo esc_attr( $blog_single_page_sidebar ); ?>" id="content_section">
				<?php get_template_part( 'loop'); // called loop-blog.php ?>
			</section>
	        <?php // Sidebar Section
			if( trim( $blog_single_page_sidebar ) != 'fullwidth' ) :	?>
				<article class="<?php echo esc_attr( $blog_sidebar_position ). ' ' . esc_attr( $sidebar_border_class ); ?>" >
					<?php get_sidebar();?>
				</article>
			<?php endif; ?>
			<div class="clear"></div>
			<?php get_footer(); // Footer Section ?>