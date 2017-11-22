<?php
if( !function_exists('petshop_kaya_relatedpost') ){
	function petshop_kaya_relatedpost($postid)
	{	
		global $post;
		$orig_post = $post;
		$tags = wp_get_post_tags($post->ID); 
		if ($tags) {
			$single_related_post_title = get_theme_mod( 'single_related_post_title' ) ? get_theme_mod( 'single_related_post_title' ): __('Related Articles', 'petshop');
			echo '<div class="relatedposts">';
				echo '<h2 class="title_style1">'.esc_attr($single_related_post_title).'
					<span class="title_seperator"></span></h2>';
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=>4, // Number of related posts to display.
					'ignore_sticky_posts'=>1,
					'post_type' => 'post',
					'orderby' => 'rand',
				);
				echo '<div class="related_post_slider">';
				$my_query = new wp_query( $args );
				while( $my_query->have_posts() ) {
					$my_query->the_post();
					$categories = get_the_category();
					$cat = array();
					foreach ($categories as $category) {
						$cat[] = $category->name;
					}
					$img_url=wp_get_attachment_url( get_post_thumbnail_id() ); ?>
						<div>
							<?php 	
							if( !empty($img_url) ){
								echo "<img src='". petshop_kaya_img_resize($img_url, '500', '400', 't') ."' alt='".esc_attr( get_the_title() )."' />"; 
							}else{
								$default_img = get_template_directory_uri().'/images/default_images/portfolio.jpg';
           						echo "<img src='". petshop_kaya_img_resize($default_img, '500', '400', 't') ."' alt='".esc_attr( get_the_title() )."' />";
							}
							echo '<div class="description_box">';
								echo '<h4 class="title_style2"><a href="'.esc_url( get_the_permalink() ).'">'.get_the_title().'</a></h4>';
								echo '<span>'.get_the_date('M, d, Y').'</span>';
							echo '</div>';	 ?>
					</div>
				<?php }
				echo '</div>';
				echo '</div>';
		}
		$post = $orig_post;
		wp_reset_postdata();
	}
} ?>