<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}
echo '<div class="woo_coupon_message_wrapper">';
	$info_message = apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'petshop' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'petshop' ) . '</a>' );
	wc_print_notice( '<h3>'.$info_message.'</h3>', 'notice' );
	?>
	<form class="checkout_coupon" method="post">

		<p class="form-row form-row-first">
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_html_e( 'Coupon code', 'petshop' ); ?>" id="coupon_code" value="" />
		</p>

		<p class="form-row form-row-last">
			<input type="submit" class="button" name="apply_coupon" value="<?php esc_html_e( 'Apply Coupon', 'petshop' ); ?>" />
		</p>

		<div class="clear"></div>
	</form>
</div>
