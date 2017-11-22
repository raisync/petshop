<div class="shop-products">
		<div class="shop-produt-image">
			<div class="product-rating">
				<?php if ($average = $product->get_average_rating()) : ?>	
				<?php echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'petshop' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%; ><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'petshop' ).'</span></div>'; ?>
				<?php 
				else:
					echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'petshop' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'petshop' ).'</span></div>';
				endif; ?>
			</div>
			<?php if ( $product->is_on_sale() ) : ?>
			<?php endif;
			if ( !$product->is_in_stock() ) {
				echo apply_filters( 'woocommerce_sale_flash', '<div class="soldout-ribbon"><span>' . esc_html__( 'OUT OF STOCK', 'petshop' ) . '</span></div>', $post, $product ); 
    		} ?>
			<a href="<?php the_permalink(); ?>">
				<?php //display product thumbnail
					if (has_post_thumbnail()) { 
						$params = array('width' => '500', 'height' => '500', 'crop' => true);
						$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'kaya-gallery' ); 
						echo woocommerce_get_product_thumbnail();
					}
					else {
						echo '<img src="/images/defaul_image.jpg"  alt="" />';
					} 
				?>
			</a>
		</div>			
		<div class="shop-product-details">
			<?php
			$sale_price = get_post_meta( $product->get_id(), '_price', true);
		    $regular_price = get_post_meta( $product->get_id(), '_regular_price', true);
		    if (empty($regular_price)){ //then this is a variable product
		        $available_variations = $product->get_available_variations();
		        $variation_id=$available_variations[0]['variation_id'];
		        $variation= new WC_Product_Variation( $variation_id );
		        $regular_price = $variation ->regular_price;
		        $sale_price = $variation ->sale_price;
		    }
		    $discount_price = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);
		    if ( $product->is_on_sale() ) :
			    echo '<div class="produt_discount_price">';
			    	echo '<span>-'.$discount_price.'%</span>';
			    echo '</div>';
			endif;    
    if ( $price_html = $product->get_price_html() ) : ?>
						<span class="price"><?php echo $product->get_price_html(); ?></span>
				<?php endif;  ?>
			<div class="product_title_desc_wrapper">
				<h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
				<p><?php echo  petshop_kaya_content(10); ?></p>
			</div>	
			<div class="product-cart-button">
					<?php
					echo apply_filters( 'woocommerce_loop_add_to_cart_link',
						sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"> %s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $quantity ) ? $quantity : 1 ),
							esc_attr( $product->get_id() ),
							esc_attr( $product->get_sku() ),
							esc_attr( isset( $class ) ? $class : 'button' ),
							esc_html( $product->add_to_cart_text() )
						),
						$product );	?>
			</div>
		</div>
	</div>