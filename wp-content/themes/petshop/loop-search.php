<?php  
$kaya_readmore_blog=get_theme_mod('kaya_readmore_blog') ? get_theme_mod('kaya_readmore_blog')  : esc_attr__('Read More', 'petshop');
$featured_image_class='blog_exerpt_without_image';
 while ( have_posts() ) : the_post(); // Start While Loop here ?> 
<div class="search_post">  
   	<h3 class="blog_post_title title_style1">
   		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'petshop' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">   <?php the_title(); ?> </a>
   		<span class="title_seperator"></span>
   	</h3>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php echo the_excerpt(); ?>           
		<?php echo '<a href="'.get_permalink().'" class="readmore_button">'.esc_attr( $kaya_readmore_blog ).'</a>'; ?>
    </div>
</div>
<?php endwhile;  ?>
<?php echo petshop_kaya_pagination(); ?>