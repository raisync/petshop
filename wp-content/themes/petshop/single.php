<?php get_header();
//Blog Page Options Left / Right / Fullwidth
$blog_single_page_sidebar = get_theme_mod( 'blog_single_page_sidebar' ) ? get_theme_mod( 'blog_single_page_sidebar' ): 'three_fourth';
$blog_sidebar_position = ( $blog_single_page_sidebar == 'three_fourth' ) ? 'one_fourth_last'  : 'one_fourth';
$sidebar_border_class=( $blog_single_page_sidebar == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar';
$blog_button_prev_text = get_theme_mod( 'blog_button_prev_text' ) ? get_theme_mod( 'blog_button_prev_text' ): esc_html__('PREVIOUS POST', 'petshop');
$blog_button_next_text = get_theme_mod( 'blog_button_next_text' ) ? get_theme_mod( 'blog_button_next_text' ): esc_html__('NEXT POST', 'petshop'); ?>
<?php echo petshop_kaya_custom_pagetitle($post->ID); // Page title bar ?>
<div id="mid_container_wrapper" class="mid_container_wrapper_section"> 	<!--Start Middle Section  -->
<div id="mid_container" class="container">
	<div class="blog_single_page_content_wrapper">
		<section class="<?php echo esc_attr( $blog_single_page_sidebar ); ?>" id="content_section">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="single_page_desription_comment_section">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php $img_url=wp_get_attachment_url( get_post_thumbnail_id() );			
						if(has_post_format()){
							get_template_part( 'formates/'.get_post_format() );
						}else{
							if(has_post_thumbnail()){
								if( is_single() ){
									$img_width = '1250';
								}else{
									$img_width = '600';
								}
								echo '<a href="'.get_the_permalink().'">';
									echo '<img src="'.petshop_kaya_img_resize($img_url, $img_width, '500', 't').'" class="" alt="'.get_the_title().'" />';    
								echo '</a>';
							}
						} ?>
						<div class="description_box post_description_wrapper">
							<?php the_content(); ?> 
						</div>
					</div>				
					<!-- .entry-content -->
					<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
						<div id="entry-author-info"> <!-- Author Information -->
							<div id="author-avatar" class="alignleft"> <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'kaya_author_bio_avatar_size', 60 ) ); ?> </div>
							<!-- #author-avatar -->
							<div id="author-description" class="description">
								<h3><?php printf( esc_attr__( 'Artical Written By %s', 'petshop' ), get_the_author() ); ?></h3>
								<p><?php the_author_meta( 'description' ); ?></p>
								<?php if( ( get_the_author_meta( 'disable_facebook' ) != '1') || (get_the_author_meta( 'disable_twitter' ) != '1') || (get_the_author_meta( 'disable_linkedin' ) != '1') || (get_the_author_meta( 'disable_pintrest' ) != '1') ){ ?>
									<div class="single_page_sharing_icons">
										<ul>
											<?php if( get_the_author_meta( 'disable_facebook' ) != '1' ){ ?>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<?php } 
											if( get_the_author_meta( 'disable_twitter' ) != '1' ){ ?>
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<?php } 
											if( get_the_author_meta( 'disable_linkedin' ) != '1' ){ ?>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<?php } 
											if( get_the_author_meta( 'disable_pintrest' ) != '1' ){ ?>
												<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
											<?php } ?>							
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php endif; 
					petshop_kaya_relatedpost($post->ID); // Related Postes
					$commentsection = get_post_meta( $post->ID, 'commentsection', true ); // Comment Section
					if( $commentsection != "on") {
						comments_template( '', true );
					} ?>
				</div>
				<div class="clear"></div>
				<div id="singlepage_nav" class=""> <!-- Navigation Buttons -->
					<div class="nav_prev_item">
						<?php previous_post_link( '%link', $blog_button_prev_text ); ?>
					</div>
					<div class="nav_next_item">
						<?php next_post_link( '%link', $blog_button_next_text ); ?>
					</div>
				</div>
			<?php endwhile; // end of the loop. ?>
		</section>
        <?php // Sidebar Section
		if( $blog_single_page_sidebar != 'fullwidth' ) :	?>
			<aside class="<?php echo esc_attr( $blog_sidebar_position ). ' ' . esc_attr( $sidebar_border_class ); ?>" >
				<?php get_sidebar();?>
			</aside>
			<?php endif; ?>		
	</div>
	<?php get_footer(); ?>