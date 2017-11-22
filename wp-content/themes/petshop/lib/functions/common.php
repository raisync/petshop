<?php
add_theme_support('automatic-feed-links');
/* ---------------------------------------
 Resize Images Width Fullwisth/Sidebar 
 ----------------------------------------- */
if( !function_exists('petshop_kaya_image_width') ){
	function petshop_kaya_image_width( $postid ){
		$sidebar_layout = get_post_meta($postid,'kaya_pagesidebar',true); 
		$kaya_width = ($sidebar_layout == "full" ) ? '1250' : '719';
		return $kaya_width;
	 }
}	 
/*-------------------------------------------
Site Title and Desc
-------------------------------------------*/
if( !function_exists('petshop_kaya_wp_title') ){
	function petshop_kaya_wp_title( $title ) {
		global $page, $paged;
		if ( is_feed() )
			return $title;
		$title .= esc_attr( get_bloginfo( 'name' ) );
		$site_description = esc_attr( get_bloginfo( 'description', 'display' ) );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " | $site_description";
		return $title;
	}
}	
add_filter( 'wp_title', 'petshop_kaya_wp_title', 10, 1 ); // End
/*-----------------------
Page Post ID Display
-------------------------*/
if( !function_exists('kaya_post_item_id') ){
	function kaya_post_item_id(){
		 global $post_item_id, $post;
		if( class_exists('woocommerce')){	
			if( is_shop() ){
				$post_item_id = wc_get_page_id( 'shop' );
			}
			else{
				if( get_post()){ $post_item_id = $post->ID;}
			}
		}
		elseif(get_post()){
			$post_item_id = $post->ID;
		}else{

		}
	}
}
function petshop_woo_product_search(){
 $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
	<div>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Product Search', 'petshop' ) . '" />
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>';

echo $form; 
}
function petshop_product_price(){
global  $product;
$sale_price = get_post_meta( $product->get_id(), '_price', true);
		    $regular_price = get_post_meta( $product->get_id(), '_regular_price', true);
		    if (empty($regular_price)){ //then this is a variable product		       
		        if($product->product_type=='variable') {
		        	 $available_variations = $product->get_available_variations();
			        $variation_id=$available_variations[0]['variation_id'];
			        $variation= new WC_Product_Variation( $variation_id );
			        $regular_price = $variation ->regular_price;
			        $sale_price = $variation ->sale_price;
		    	}
		    }
    if ( $price_html = $product->get_price_html() ) : ?>
						<div class="price"><?php echo $product->get_price_html(); ?></div>
				<?php endif; 
 } 
function petshop_add_to_cart_button(){
global  $product; ?>
	<div class="product-cart-button">
		<?php
		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
		),
		$product );	?>
	</div>
<?php }
function petshop_kaya_social_icons(){
$pf_disable_facebook_icon = get_theme_mod('pf_disable_facebook_icon') ? get_theme_mod('pf_disable_facebook_icon') : '0';
$pf_disable_twitter_icon = get_theme_mod('pf_disable_twitter_icon') ? get_theme_mod('pf_disable_twitter_icon') : '0';
$pf_disable_google_plus_icon = get_theme_mod('pf_disable_google_plus_icon') ? get_theme_mod('pf_disable_google_plus_icon') : '0';
$pf_disable_pinterest_icon = get_theme_mod('pf_disable_pinterest_icon') ? get_theme_mod('pf_disable_pinterest_icon') : '0';
$pf_disable_stumbleupon_icon = get_theme_mod('pf_disable_stumbleupon_icon') ? get_theme_mod('pf_disable_stumbleupon_icon') : '0';
$pf_disable_digg_icon = get_theme_mod('pf_disable_digg_icon') ? get_theme_mod('pf_disable_digg_icon') : '0';
$pf_disable_linkedin_icon = get_theme_mod('pf_disable_linkedin_icon') ? get_theme_mod('pf_disable_linkedin_icon') : '0'; 

	if( ( $pf_disable_facebook_icon != '1' ) || ( $pf_disable_twitter_icon != '1' ) || ( $pf_disable_google_plus_icon != '1' ) || ( $pf_disable_linkedin_icon != '1' ) || ( $pf_disable_pinterest_icon != '1' ) || ( $pf_disable_stumbleupon_icon != '1' ) || ( $pf_disable_digg_icon != '1' )){ ?>
	<div class="pf_social_share_icons">
			<ul>
				<?php if( $pf_disable_facebook_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="<?php echo esc_url( add_query_arg( array('u' => esc_attr(get_the_permalink()), 't' => esc_attr(get_the_title()) ), '//facebook.com/sharer.php')); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php esc_html_e('Share on Facebook', 'petshop'); ?>"><i class="fa fa-facebook"></i></a></li>
				<?php }
			if( $pf_disable_twitter_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="<?php echo esc_url( add_query_arg( array('status' =>esc_attr(get_the_title()).' - '.esc_attr(get_the_permalink())), '//twitter.com/home/')); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php esc_html_e('Tweet this!','petshop'); ?>"><i class="fa fa-twitter"></i></a></li>
				<?php }
			if( $pf_disable_google_plus_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a></li>
				<?php } 
			if( $pf_disable_linkedin_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="<?php echo esc_url( add_query_arg( array('mini'=> 'true', 'title' => esc_attr(get_the_title()) , 'url' =>esc_attr(get_the_permalink())), '//linkedin.com/shareArticle')); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php esc_html_e('Share on LinkedIn','petshop'); ?>"><i class="fa fa-linkedin"></i></a></li>
				</li>
				<?php } 
			if( $pf_disable_pinterest_icon != '1' ){  ?>
				<li class="social_sharing_icons"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo $url; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-pinterest-p"></i></a></li>
<?php } 
			if( $pf_disable_stumbleupon_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php _e('Stumble it','petshop'); ?>"><i class="fa fa-stumbleupon"></i></a></li>
<?php } 
			if( $pf_disable_digg_icon != '1' ){ ?>
				<li class="social_sharing_icons"><a href="http://digg.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="<?php _e('Digg this!','petshop'); ?>"><i class="fa fa-digg"></i></a></li>
				<?php } ?>
			</ul>
	</div>
<?php } }
/*----------------------------------------
Vertical Menu Title
-----------------------------------------*/
if( !function_exists('petshop_kaya_vertical_menu_title') ){
	function petshop_kaya_vertical_menu_title($vertical_title_name){
		$vertical_title = $vertical_title_name;
		$vertical_title_lenght = strlen(trim($vertical_title));
		echo '<span>';
			for($i=0; $i<trim($vertical_title_lenght); $i++){   
			    echo $vertical_title[$i]."<br />";
			}
		echo '</span>';
	}
}
if(!function_exists('kaya_hex_rgba_color')){
	function kaya_hex_rgba_color($hex) {
	   $hex = str_replace("#", "", $hex);
	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	  // $rgb = array($r, $g, $b);
	   $rgb = $r.', '.$g.', '.$b;
	   return $rgb; 
	}
}
/* --------------------------------------
Page Header Section 
---------------------------------------- */

if( !function_exists('petshop_kaya_page_menu_section') ){
	function petshop_kaya_page_menu_section(){?>
			<div class="nav_wrap">
		<?php 
		if (has_nav_menu('primary')) {
			wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'sm sm-blue'));
		}else{
		wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'main-menu','container' =>'ul', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'sm sm-blue'));
		} ?>
	</div>	
<?php		
	}
}
function mobile_menu_icons(){ ?>
	<div class="mobile_icons">
		<div class="mobile_toggle_menu">
			<input id="main-menu-state" type="checkbox" />
			<label class="main-menu-btn" for="main-menu-state">
				<span class="main-menu-btn-icon"></span>
			</label>
		</div>
	</div>
<?php }
/*-----------------------
Logo Display Function
-------------------------*/
if(!function_exists('petshop_kaya_logo_image')): // Logo
	function petshop_kaya_logo_image() {
		echo '';
		$select_header_logo_type = get_theme_mod('select_header_logo_type') ? get_theme_mod('select_header_logo_type') : 'image_logo';
		$header_text_logo = get_theme_mod('header_text_logo') ? get_theme_mod('header_text_logo') : strtoupper(KAYA_THEME_NAME);
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$text_logo_size = get_theme_mod('text_logo_size') ? get_theme_mod('text_logo_size') : '36';
		$logo_text_font_color = get_theme_mod('logo_text_font_color') ? get_theme_mod('logo_text_font_color') : '#333333';
		$sticky_logo_color = get_theme_mod('sticky_logo_color') ? get_theme_mod('sticky_logo_color') : '#333333';		
		$sticky_text_logo_size = get_theme_mod('sticky_text_logo_size') ? get_theme_mod('sticky_text_logo_size') : '28';
		$logo_text_font_weight = get_theme_mod('header_logo_font_weight') ? get_theme_mod('header_logo_font_weight') : 'normal';
		$logo_text_font_style = get_theme_mod('header_logo_font_style') ? get_theme_mod('header_logo_font_style') : 'normal';
		$header_text_logo_tagline = get_theme_mod('header_text_logo_tagline') ? get_theme_mod('header_text_logo_tagline') : '';
		$logo_tagline_font_color = get_theme_mod('logo_tagline_font_color') ? get_theme_mod('logo_tagline_font_color') : '#333';
		$logo_tagline_font_style = get_theme_mod('logo_tagline_font_style') ? get_theme_mod('logo_tagline_font_style') : 'normal';
		$logo_tagline_font_weight = get_theme_mod('logo_tagline_font_weight') ? get_theme_mod('logo_tagline_font_weight') : 'normal';
		$logo_tagline_size = get_theme_mod('logo_tagline_size') ? get_theme_mod('logo_tagline_size') : '12';
		$logo_tagline_letter_spacing = get_theme_mod('logo_tagline_letter_spacing') ? get_theme_mod('logo_tagline_letter_spacing') : '0';
		$sticky_logo_tagline_color = get_theme_mod('sticky_logo_tagline_color') ? get_theme_mod('sticky_logo_tagline_color') : '#333';
		$retina_logo = get_option('retina_logo');
		$retina_logo_img = $retina_logo['upload_retina_logo'];
		$sticky_retina = get_option('sticky_retina_logo');
		$sticky_retina_logo = $sticky_retina['upload_sticky_retina_logo'];
		$kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
		$kaya_logo_img_src = get_option('kaya_logo');
		$logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo'] : $kaya_default_logo;
			if( $logo ){
				$upload_image_id = petshop_kaya_get_attachment_id_from_src($logo);
				$array_values = petshop_kaya_logo_customizer_media_upload( $upload_image_id );
				$logo_width = $array_values['width'];
				$logo_height = $array_values['height'];
			}else{
				$logo_width = '';
				$logo_height = '';
			}
		$sticky_logo = get_option('sticky_logo');	
		$sticky_logo_img = $sticky_logo['upload_sticky_logo'] ?  $sticky_logo['upload_sticky_logo'] : $kaya_default_logo; 
		if( !empty($sticky_logo_img) ){
			$sticky_logo_src = '<img src="'.esc_url($sticky_logo_img).'" class="sticky_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		}else{
			$sticky_logo_src = '<img src="'.esc_url($logo).'" class="sticky_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		} 
		if( !empty($retina_logo_img) ){
			$retina_logo_src = '<img src="'.esc_url($retina_logo_img).'" style="width:'.$logo_width.'px; min-height:'.$logo_height.';" class="header_retina_logo retina_logo" alt="'.get_bloginfo( 'name' ).'" />';
		}else{
			$retina_logo_src = '<img src="'.esc_url($logo).'" style="width:'.$logo_width.'px; min-height:'.$logo_height.'px;" class="header_retina_logo retina_logo" alt="'.esc_attr(get_bloginfo( 'name' )).'" />';
		}
		echo '<div class="header_logo_wrapper">';
		if( $select_header_logo_type == 'image_logo' ){
				if( $logo ) {
					$kaya_logo_src = esc_attr( $logo ) ? esc_attr( $logo ) : esc_attr( $kaya_default_logo );
				}else{
					$kaya_logo_src = esc_attr( get_template_directory_uri().'/images/logo.png' );
				}
				$kaya_logo_img = 'class="logo" src="'.esc_attr($kaya_logo_src).'" style="min-height:'.$logo_height.'px;" alt="'.get_bloginfo( 'name' ).'"';
				$kaya_logo = apply_filters('kaya_image_logo', '<img '.$kaya_logo_img .' />'.$sticky_logo_src.$retina_logo_src.$sticky_retina_logo);
				echo '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'</a>';
			//}
		}elseif( $select_header_logo_type == 'text_logo' ){
			$kaya_logo = apply_filters('kaya_image_logo', $header_text_logo);
			echo '<h1 class="logo" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$text_logo_size.'px; color:'.$logo_text_font_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line logo" style="color:'.$logo_tagline_font_color.'; font-size:'.$logo_tagline_size.'px; line-height:'.ceil(1.1 * $logo_tagline_size).'px; font-weight:'.$logo_tagline_font_weight.'; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}	
			echo '<h1 class="sticky_logo" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'; font-weight:'.$logo_text_font_weight.'; font-style:'.$logo_text_font_style.'"><a  href="'.esc_url( home_url( '/' ) ).'" style="font-size:'.$sticky_text_logo_size.'px; color:'.$sticky_logo_color.'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'">'.apply_filters('kaya_logo_html', $kaya_logo).'';
			echo '</a></h1>';
			if( !empty($header_text_logo_tagline) ){
				echo '<p class="logo_tag_line sticky_logo" style="color:'.$sticky_logo_tagline_color.'; font-size:'.$logo_tagline_size.'px; font-weight:'.$logo_tagline_font_weight.';  line-height:'.ceil(1.1 * $logo_tagline_size).'px; font-style:'.$logo_tagline_font_style.'; letter-spacing:'.$logo_tagline_letter_spacing.'px;">'.$header_text_logo_tagline.'</p>';
			}
			
		}else{

		}
		echo '</div>';
	}	
endif; // End Logo
/*------------------------------------------------------------------------------------
Frame right side & Coming Soon page socila media icons
-------------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_social_media_icons') ){
	function petshop_kaya_social_media_icons(){
			$facebook_icon_id = get_theme_mod('facebook_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('facebook_icon_id')) : 'facebook_user_name';
			$twitter_icon_id = get_theme_mod('twitter_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('twitter_icon_id')) : 'twitter_user_name';
			$linkedin_icon_id = get_theme_mod('linkedin_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('linkedin_icon_id')) : '';
			$googleplus_icon_id = get_theme_mod('googleplus_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('googleplus_icon_id')) : 'google_plus_user_name';
			$youtube_icon_id = get_theme_mod('youtube_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('youtube_icon_id')) : 'youtube_user_name';
			$dribble_icon_id = get_theme_mod('dribble_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('dribble_icon_id')) : '';
			$digg_icon_id = get_theme_mod('digg_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('dribble_icon_id')) : '';
			$instagram_icon_id = get_theme_mod('instagram_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('instagram_icon_id')) : '';
			$rss_icon_id = get_theme_mod('rss_icon_id') ? str_replace('&nbsp;', '', get_theme_mod('rss_icon_id')) : '';
			echo '<ul>';
				if( trim(!empty($facebook_icon_id)) || !empty($twitter_icon_id) || !empty($linkedin_icon_id) || !empty($youtube_icon_id) || !empty($googleplus_icon_id) || !empty($dribble_icon_id) || !empty($digg_icon_id) || !empty($instagram_icon_id) || !empty($rss_icon_id) ){
					if( trim(!empty($facebook_icon_id) ) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//facebook.com/'.$facebook_icon_id ) ).'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
					}
					if( !empty($twitter_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//twitter.com/'.$twitter_icon_id ) ).'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
					}
					if( !empty($linkedin_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//linkedin.com/'.$linkedin_icon_id ) ).'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
					}
					if( !empty($youtube_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//youtube.com/'.$youtube_icon_id ) ).'" target="_blank"><i class="fa fa-youtube"></i></a></li>';
					}
					if( !empty($googleplus_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//plus.google.com/'.$googleplus_icon_id ) ).'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
					}
					if( !empty($dribble_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//dribble.com/'.$dribble_icon_id ) ).'" target="_blank"><i class="fa fa-dribbble"></i></a></li>';
					}
					if( !empty($digg_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//digg.com/'.$digg_icon_id ) ).'" target="_blank"><i class="fa fa-digg"></i></a></li>';
					}
					if( !empty($instagram_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//instagram.com/'.$instagram_icon_id ) ).'" target="_blank"><i class="fa fa-instagram"></i></a></li>';
					}
					if( !empty($rss_icon_id) ){
						echo '<li><a href="'.esc_url( add_query_arg( array(), '//rss.com/'.$rss_icon_id ) ).'" target="_blank"><i class="fa fa-rss"></i></a></li>';
					}
				}
			echo '</ul>';
	}
}
//End
/*------------------------------------------------------------------------------------
Page Title bar / Slider Display 
-------------------------------------------------------------------------------------*/
if( !function_exists('petshop_kaya_subheader_section') ){
    function petshop_kaya_subheader_section(){
		global $petshop_kaya_post_item_id, $post;
		echo  petshop_kaya_post_item_id();
		if( class_exists('woocommerce') ){
			if( is_shop() ){
				$select_page_options=get_post_meta( wc_get_page_id( 'shop' ),'select_page_options',true);
				$kaya_slider_type=get_post_meta(wc_get_page_id( 'shop' ),'kaya_slider_type',true);
			}else{ 
				if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true);
				$kaya_slider_type=get_post_meta(get_the_ID(),'kaya_slider_type',true); } else{ $select_page_options = ''; $kaya_slider_type = ''; }
			}
		}elseif( is_page()){
			$select_page_options=get_post_meta(get_the_ID(),'select_page_options',true);
			$kaya_slider_type=get_post_meta(get_the_ID(),'kaya_slider_type',true);
		}else{
			$select_page_options = '';
			$kaya_slider_type='';
		}
		if( $select_page_options == 'page_slider_setion'){
			if( is_page() ){
				if( $kaya_slider_type == 'customslider' ){
					get_template_part('slider/custom','slider');
				}else{
					get_template_part('slider/post','slider');
				}
			}
		}
		elseif($select_page_options=="singleimage"){
			get_template_part('slider/single','image');
		}
		elseif($select_page_options=="video_bg"){  
			get_template_part('slider/video');
		}
		elseif($select_page_options == 'page_title_setion'){ }
		elseif($select_page_options == 'none'){	}
		else{ }
	}
}
/*---------------------------------------------------------
Customizer Upload Image URL
---------------------------------------------------------*/
if( !function_exists('petshop_kaya_get_attachment_id_from_src') ){
	function petshop_kaya_get_attachment_id_from_src($image_src) {
	     global $wpdb;
	     $id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE  guid='%s'", $image_src));
	     return $id;
	}
}	
if(!function_exists('petshop_kaya_logo_customizer_media_upload')){
function petshop_kaya_logo_customizer_media_upload($upload_image_id)
	{
	  $upload_img_url = wp_get_attachment_image_src($upload_image_id, "full");
		$array['url']= $upload_img_url[0];
		$array['width']= $upload_img_url[1];
		$array['height']= $upload_img_url[2];
		return $array;
	}
}
if( !function_exists('petshop_kaya_customizer_media_upload') ){
	function petshop_kaya_customizer_media_upload($uploadimageid)
	{
	  $upload_img_url = wp_get_attachment_image_src($uploadimageid, "full");
	  return $upload_img_url[0];
	}
}	
/*---------------------------------------------------------------------------------------
Page title bar display 
---------------------------------------------------------------------------------------*/
if(!function_exists('petshop_kaya_custom_pagetitle')){
	function petshop_kaya_custom_pagetitle( $post_id )
	{
		global $petshop_kaya_post_item_id, $post;
		echo  petshop_kaya_post_item_id();
		$kaya_page_title_disable = get_post_meta($petshop_kaya_post_item_id, 'kaya_page_title_disable', true) ? get_post_meta($petshop_kaya_post_item_id, 'kaya_page_title_disable', true) : '0';
		if( $kaya_page_title_disable != '1' ){
			if( is_front_page() ){ } else{
					$select_page_title_customization=get_post_meta($petshop_kaya_post_item_id,'select_page_title_customization',true);
					$page_bread_crumb = get_theme_mod('bread_crumb_remove') ? get_theme_mod('bread_crumb_remove') : '0' ;
					$page_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
					$page_description_color = get_theme_mod('title_description_color') ? get_theme_mod('title_description_color') : '#333333';
					$page_title_bar_height = get_theme_mod('page_title_bar_height') ? get_theme_mod('page_title_bar_height') : '18';
					$title_left_right_border='';
					$page_title_position=get_theme_mod('page_title_position') ? get_theme_mod('page_title_position') : 'left';
					$enable_fullscreen_height='';
					$page_title_font_size = get_theme_mod('page_title_font_size') ? get_theme_mod('page_title_font_size') : '36';
					$page_description_font_size = get_theme_mod('page_description_font_size') ? get_theme_mod('page_description_font_size') : '16';
					$page_line_height = get_theme_mod('page_title_bar_padding') ? get_theme_mod('page_title_bar_padding') : '80';
					$subheader_titleoptions=get_post_meta($petshop_kaya_post_item_id,'subheader_titleoptions',true);
			if( $page_title_position == 'left' ) {
				$titleposition = 'float:left; text-align:left;';
				$bread_crumb = 'float:right; text-align: right;';
				$desc_margin = '';
		}elseif( $page_title_position == 'right' ){
				$titleposition = 'float:right; text-align:right;';
				$desc_margin = '';
				$bread_crumb = 'float:left; text-align:left;';
		}elseif( $page_title_position == 'center' ){
				$titleposition = 'margin:0px auto; text-align:center;';
				$bread_crumb = 'margin:10px auto 0';
				$desc_margin = '';
		}else{ 
				$titleposition = 'float:left; text-align:left;';
				$bread_crumb = 'float:right; text-align: right;';
				$desc_margin = '';
		}
			echo '<section class="sub_header_wrapper">';
			echo '<div class="sub_header container">';
				echo '<div class="page_title_wrapper" style="'.$titleposition.'">';				
				$kaya_custom_title=get_post_meta($petshop_kaya_post_item_id,'kaya_custom_title',true) ? get_post_meta($petshop_kaya_post_item_id,'kaya_custom_title',true) : get_the_title();
				$kaya_custom_title_description=get_post_meta($petshop_kaya_post_item_id,'kaya_custom_title_description',true);
				$select_page_title_option=get_post_meta($petshop_kaya_post_item_id,'select_page_title_option',true);
				$page_description_enable = ( $select_page_title_option == 'custom_page_title' ) ? esc_attr($kaya_custom_title_description) :'';
				$page_title_enable = ( $select_page_title_option == 'custom_page_title' ) ? $kaya_custom_title :get_the_title($post_id);
				if(is_page()){
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> <span>'.esc_attr($kaya_custom_title).'</span></h2>';			
					if(!empty( $page_description_enable )) {		
						echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.esc_attr($page_description_enable).'</P>';
					} 
				}elseif(is_home()){
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.get_the_title( get_option('page_for_posts', true) ).'</h2>';

				}elseif( is_single()){ 
					echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"> <span>'.esc_attr($page_title_enable).'</span></h2>';
					if(!empty( $page_description_enable )) {		
						echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.esc_attr($page_description_enable).'</P>';
					}  ?>
				<?php	} elseif(is_tag()){ ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">';
					 printf( __( 'Tag Archives: %s', 'petshop' ), single_cat_title( '', false ) ); ?>
				</h2>
			<?php }
			elseif ( is_author() ) {
				the_post();
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.sprintf( __( 'Author Archives: %s', 'petshop' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ).'</h2>';
				rewind_posts();

			} elseif (is_category()) { 
			 echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
					<?php printf( __( 'Category Archives: %s', 'petshop' ), single_cat_title( '', false ) ); ?>
				</h2>
			<?php }  elseif( is_tax() ){
				global $post;
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				 echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';"><span>' .$term->name.'</span></h2>';

			}elseif (is_search()) { ?>
					<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?><?php printf( __( 'Search Results for: %s', 'petshop' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			<?php }elseif (is_404()) { ?>
					<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php esc_html_e( 'Error 404 - Not Found', 'petshop' ); ?> </h2>
				<?php }
				elseif ( is_day() ){ ?>
				<?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
					<?php  printf( __( 'Daily Archives: %s', 'petshop' ), '<span>' . get_the_date() . '</span>' ); ?>
				</h2>
				<?php }			 
				 elseif ( is_month() ) { ?>
				 <?php echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>
				<?php 	printf( __( 'Monthly Archives: %s', 'petshop' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				</h2>
				<?php } elseif ( is_year() ){ ?>
					<h2>	<?php printf( __( 'Yearly Archives: %s', 'petshop' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?> </h2>
				<?php }elseif ( class_exists('woocommerce') ){
					if( is_shop() ) { 
						if($kaya_custom_title=get_post_meta(wc_get_page_id('shop'),'kaya_custom_title',true)) {
							echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'.$kaya_custom_title.'</h2>';			
						} 
						else{
							echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?> <?php esc_html_e('Shop','petshop'); ?></h2>
						<?php }
						if($kaya_custom_title_description=get_post_meta(wc_get_page_id('shop'),'kaya_custom_title_description',true)) {		
							echo '<P style="font-size:'.$page_description_font_size.'px; color:'.$page_description_color.';">'.$kaya_custom_title_description.'</P>';
						} ?>
				<?php }else { ?>
				<?php 
				echo '<h2 style="font-size:'.$page_title_font_size.'px; color:'.$page_title_color.';">'; ?>	<?php esc_html_e( 'Blog Archives', 'petshop' ); ?> </h2> 
				<?php }
				}
			//echo '<span class="title_border_bottom"> </span>';
			echo '</div>';
		$select_page_title_customization=get_post_meta($post_id,'select_page_title_customization',true);
		if(  $select_page_title_customization == 'custom_page_title_options' ){	
			if( $page_bread_crumb == 'on' || $page_bread_crumb == '0' ):
				echo '<div id="crumbs" style="'.$bread_crumb.'">';
					kaya_breadcrumbs(); 
				echo '</div>';
			endif;
		}else{
			if( $page_bread_crumb == '0' ){
				echo '<div id="crumbs" style="'.$bread_crumb.'">';
					kaya_breadcrumbs(); 
				echo '</div>';
			}
		}	
		echo '</div>';	
			echo'</section>';
			}
		}
	}
}
/*-----------------------
Bread Crumb Disaply
-------------------------*/
if( !function_exists('kaya_breadcrumbs') ){
	function kaya_breadcrumbs() { 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '<span class="delimiter fa fa-angle-right"> </span>'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = ''; // tag before the current crumb
  $after = ''; // tag after the current crumb 
  global $post;
  $homeLink = esc_url( home_url() ); 
  if (is_home() || is_front_page()) { 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category';
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        //if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . '' . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        //if ($showCurrent == 1) echo $before . get_the_title() . $after;
      } 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'petshop') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  }
} 
}
/*-----------------------------------------
Include Related Post Section
-----------------------------------------*/
	get_template_part('lib/includes/relatedpost');

/*-----------------------------------------
Menu Customization
-------------------------------------------*/
if( !class_exists('petshop_kaya_custom_pagetitle') ){
	class petshop_kaya_custom_pagetitle extends Walker_Nav_Menu
	{
      	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
      	{
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
			$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$prepend = '<strong>';
			$append = '</strong>';
			$description='';
			$item_desc='';
			if($item->description){
				$item_desc='<span class="menu_description">'.esc_attr( $item->description ).'</span>';
			}
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description.$args->link_after.$item_desc;
            $item_output .= '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
	}
}
/*-------------------------------------------
Page Post ID Display
--------------------------------------------*/
if( !function_exists('petshop_kaya_post_item_id') ){
	function petshop_kaya_post_item_id(){
		 global $petshop_kaya_post_item_id, $post;
		if( class_exists('woocommerce')){	
			if( is_shop() ){
				$petshop_kaya_post_item_id = wc_get_page_id( 'shop' );
			}
			else{
				if( get_post()){ $petshop_kaya_post_item_id = $post->ID;}
			}
		}
		elseif(get_post()){
			$petshop_kaya_post_item_id = $post->ID;
		}else{

		}
	}
}
// Popcontent Box
if( !function_exists('petshop_kaya_popup_box') ){
	function petshop_kaya_popup_box(){
		$kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
		$kaya_logo_img_src = get_option('kaya_logo');
		$logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo'] : $kaya_default_logo; ?>
		<div class="content_alert_dialog_overlay"> </div>
			<div class="content_alert_dialog_box" id="content_alert_dialog_wrapper">
				<img src="<?php echo $logo; ?>" style="margin:0px auto; display:block;"/><br />
				<p><?php echo get_theme_mod('content_wrng_popup_text') ? str_replace('&nbsp;','',get_theme_mod('content_wrng_popup_text')) : ' It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum .
				<ul>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				<li>It is a long established fact that a reader will be distracted</li>
				</ul>'; ?></p>
				<div class="content_alert_dialog_btns">
					<div class="dialog_box_allow_btn">
						<a href="#"><?php echo get_theme_mod('content_wrng_button_text') ? str_replace('&nbsp;','', get_theme_mod('content_wrng_button_text')) : 'ENTER'; ?></a>
					</div>
				</div>	
			</div>
	<?php }
}
?>