<?php
get_header();
$portfolio_page_options = get_theme_mod('pf_page_sidebar') ? get_theme_mod('pf_page_sidebar') : 'fullwidth';
$sidebar_class=( $portfolio_page_options == 'three_fourth' ) ? 'one_fourth_last' : 'one_fourth';
$sidebar_border_class=( $portfolio_page_options == 'three_fourth' ) ? 'right_sidebar' : 'left_sidebar';
$pf_img_height =  get_theme_mod('pf_images_height') ? get_theme_mod('pf_images_height') :'450';
$pf_images_width =  get_theme_mod('pf_images_width') ? get_theme_mod('pf_images_width') :'300';
$pf_thumbnail_columns =  get_theme_mod('pf_thumbnail_columns') ? get_theme_mod('pf_thumbnail_columns') :'6';
$height=($portfolio_page_options== "fullwidth" ) ?  '350' : '400';
$pf_cat_button_name =  get_theme_mod('pf_cat_button_name') ? get_theme_mod('pf_cat_button_name') :'Read More';
$pf_gray_scale_mode =  get_theme_mod('pf_gray_scale_mode') ? get_theme_mod('pf_gray_scale_mode') :'0';
$pf_disable_page_title =  get_theme_mod('pf_disable_page_title') ? get_theme_mod('pf_disable_page_title') :'0';
$pf_gray_scale_images = ( $pf_gray_scale_mode == '1' ) ? 'gray_scale_img' : '';
if( !empty($sidebars) ){
	$pf_sidebar_id = get_theme_mod('pf_sidebar_id') ? get_theme_mod('pf_sidebar_id') : 'sidebar-1';
}else{
	$pf_sidebar_id = 'sidebar-1';
}
?>
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
		<div id="mid_container" class="">
		<?php if( $pf_disable_page_title != '1' ){ ?>
			<?php echo petshop_kaya_custom_pagetitle($post->ID); 
		} ?> 
			<section class="<?php echo esc_attr( $portfolio_page_options ); ?>" id="content_section">
			 <?php	echo '<div class="portfolio_content_wrapper pf_taxonomy_gallery portfolio_img_grid_columns portfolio_columns'.$pf_thumbnail_columns.'">';		
				echo '<ul class="grid isotope-container pf_extra_width clearfix">';
					while (have_posts()) : the_post(); // loop start here
						$imgurl=wp_get_attachment_url( get_post_thumbnail_id() );
						$pf_lightbox =  $imgurl ? $imgurl : get_template_directory_uri().'/images/defult_featured_img.png';
						$video_url= get_post_meta($post->ID,'video_url',true);
				        $lightbox_type = $video_url ? trim($video_url) : $pf_lightbox;
				        $class = $video_url ? 'link_to_video' : 'link_to_image';
						$terms = get_the_terms(get_the_ID(), 'portfolio_category');
						$pf_link_new_window=get_post_meta(get_the_ID(),'pf_link_new_window' ,true);
						if($pf_link_new_window == '1') { $pf_target_link ="_blank"; }else{ $pf_target_link ='_self'; }
						$permalink = get_permalink();
						$Porfolio_customlink=get_post_meta($post->ID,'Porfolio_customlink',true);
						$pf_customlink = $Porfolio_customlink ? $Porfolio_customlink : $permalink;
						$terms = get_the_terms(get_the_ID(), 'portfolio_category');
							$terms_slug = array();
							$terms_name = array();
							if($terms ){
							foreach ($terms as $term) {
								$terms_slug[] = $term->slug;
								$terms_name[] = $term ->name;
							}
						}else{
							$terms_name[] = 'Uncategorized';
						}
						echo '<li class="isotope-item all">'; ?>
						    <div class="pf_image_wrapper <?php echo $pf_gray_scale_images; ?>">
								<?php 
								echo '<span class="pf_title_wrapper" style="">'.get_the_title().'</span>';  
								echo '<a href="'.get_the_permalink().'">';
									if( !empty($imgurl) ){
										echo "<img src='". petshop_kaya_img_resize($imgurl, $pf_images_width, $pf_img_height, 't') ."' alt='' />"; 
									}else{
										$default_img = get_template_directory_uri().'/images/default_images/portfolio.jpg';
	           							//echo "<img src='".  esc_url( $default_img ) ."' alt='' />";
	           							echo "<img src='". petshop_kaya_img_resize($default_img, $pf_images_width, $pf_img_height, 't') ."' alt='' />";
									}
								echo '</a>';	 ?>
							</div> 
							<?php
							echo '<div class="pf_content_wrapper">';
								echo '<div class="pf_title_description">';
									petshop_kaya_model_details();
								echo '</div>';
							echo '</div>'; ?>
                </li>
				<?php	endwhile; // end here
				echo '</ul>';
			echo '</section>'; ?>
			<?php
		wp_reset_postdata(); 
		if( $portfolio_page_options != 'fullwidth' ) :	?>
			<aside class="<?php echo esc_attr( $sidebar_class ).' '.esc_attr( $sidebar_border_class ); ?>" >
				<div id="sidebar">
					<?php dynamic_sidebar( $pf_sidebar_id ); ?>
				</div>
			</aside>
			<?php endif; ?>
		<?php echo petshop_kaya_pagination(); // Pagination ?>
	<?php get_footer(); ?>