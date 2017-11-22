<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */ ?>
	<div class="shop-products" id="shop_product_item">
		
		<div class="shop-produt-image">
	<?php do_action( 'woocommerce_before_shop_loop_item' );?>
	
	<?php
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
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
</li>