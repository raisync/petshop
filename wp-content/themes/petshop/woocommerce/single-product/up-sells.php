<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $petshop_plugin_name,$woocommerce_loop;

$upsells = $product->get_upsell_ids();

if ( sizeof( $upsells ) == 0 ) return;

$meta_query = WC()->query->get_meta_query();

$args = array(
	'post_type'           => 'product',
	'ignore_sticky_posts' => 1,
	'no_found_rows'       => 1,
	'posts_per_page'      => $posts_per_page,
	'orderby'             => $orderby,
	'post__in'            => $upsells,
	'post__not_in'        => array( $product->get_id() ),
	'meta_query'          => $meta_query
);

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>
	<div class="upsells products">

		<h2 class="title_style1"><?php _e( 'You may also like&hellip;', 'petshop' ) ?></h2>
		<div class="upsells-product-slider">
			<?php while ( $products->have_posts() ) : $products->the_post(); 
				global $product, $woocommerce_loop, $post; ?>

	<div class="shop-products">
		<div class="shop-produt-image">
			<?php petshop_kaya_show_product_new_badge(); ?>
			<?php if ( $product->is_on_sale() ) : ?>
				<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale-ribbon1"><span class="onsales">' . __( 'SALE', 'petshop' ) . '</span></span>', $post, $product ); ?>
			<?php endif; 
			if ( !$product->is_in_stock() ) {
				echo apply_filters( 'woocommerce_sale_flash', '<div class="soldout-ribbon"><span>' . esc_html__( 'OUT OF STOCK', 'petshop' ) . '</span></div>', $post, $product ); 
    		} ?>
			<a href="<?php the_permalink(); ?>">
				<?php 
				$attachment_ids = $product->get_gallery_image_ids();
				$thumbnail_images = count($attachment_ids);
					$params = array('width' => '500', 'height' => '500', 'crop' => true);
					$image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'kaya-gallery'); 
					if (has_post_thumbnail()) { 
						if(!empty($attachment_ids)){
						echo '<div class="product_image">';
							echo woocommerce_get_product_thumbnail();
						echo '</div>';
						}else{
							echo woocommerce_get_product_thumbnail();
						}
					}
					else{
				$image_uri = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/product_slider.jpg';
                  echo '<img src="'.kaya_image_resize( $image_uri, 500, 500, true ).'" />';
					}
				if(!empty($attachment_ids)){
					$params = array('width' => '500', 'height' => '500', 'crop' => true);
					$image_attribute = wp_get_attachment_url( $attachment_ids[0], 'large');
					echo '<img class="hidden" src="'.$image_attribute.'">';
				}
				?>
			 </a>
		</div>			
		<div class="shop-product-details">
			<div class="product_title_desc_wrapper">
				<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
			</div>
			<?php petshop_product_price(); ?>
			<div class="product-rating">
				<?php if ($average = $product->get_average_rating()) : ?>	
				<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'petshop' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'petshop' ).'</span></div>'; ?>
				<?php 
				else:
					echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'petshop' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'petshop' ).'</span></div>';
				endif; ?>
			</div>
			<?php
				petshop_add_to_cart_button(); ?>
		</div>
	</div>

			<?php endwhile; // end of the loop. ?>
</div>
	</div>

<?php endif;

wp_reset_postdata();
