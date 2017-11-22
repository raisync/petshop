<?php
class Petshop_Gallery_Slider_Widget extends WP_Widget{
	public function __construct(){
		global $petshop_plugin_name;
		parent::__construct('kaya-images-gallery',
			ucfirst($petshop_plugin_name).' '.__(' - Images Gallery',$petshop_plugin_name),
			array('description' =>__('Use this widget to add team Widget',$petshop_plugin_name))
		);	
	}
	function widget($args, $instance){
		$instance = wp_parse_args($instance, array(
			'gallery_img_type' => 'grid_view',
      		'gallery_img_ids' => '',
      		'image_width' => '480',
      		'image_height' => '480',
      		'disable_slider_thumbnails' => '',
      		'gallery_images_column' => '4',
      		'slider_auto_play' => '',
      		'images_gutter' => '',
      		'slider_arrows_bg_color' => '#ebebeb',
      		'slider_arrows_color' => '#4d4d4d',
      		'gallery_image_bg_color' => '',
      		'disable_light_box_icon' => '',
      		'disable_nav_buttons' => '',
      		'lightbox_icon_bg_color' => '#3f51b5',
      		'lightbox_icon_link_color' => '#ffffff',
		)); 
		$gallery_image_bg = ( $instance['disable_light_box_icon'] != 'on') ? 'rgba('.kaya_hex_rgba_color($instance['gallery_image_bg_color']).',0.7)' : '';
		?>
		<style type="text/css">
		.images_gallery_wrapper ul li:hover .image_link_icon, .images_gallery_wrapper .owl-item:hover .image_link_icon{
			background: <?php echo $gallery_image_bg; ?>!important;
			}</style>
		<?php
		global $petshop_plugin_name;
		if( $instance['gallery_img_type'] == 'slider_view' ){
			wp_enqueue_script('jquery_owlcarousel');
	      	wp_enqueue_style('css_owl.carousel');
	    }
		echo $args['before_widget'];
			$gallery_rand = rand(1,100);
			$gallery_lightbox_class = ( $instance['disable_light_box_icon'] != 'on') ? 'lightbox_img_opacity' : '';
			$gallery_gutter = ( $instance['images_gutter'] == 'on' ) ? 'gutter_images gutter_images_column'.$instance['gallery_images_column'].'' : 'image_grid_column'.$instance['gallery_images_column'];
			$gallery_img_slider = ( $instance['gallery_img_type'] == 'slider_view') ? 'gallery_slider' : $gallery_gutter;
			$galler_slider_class = ( $instance['gallery_img_type'] == 'slider_view') ? 'petshop_image_gallery_slider' : $gallery_gutter;
			$gallery_img_data_options = ( $instance['gallery_img_type'] == 'slider_view') ? 'data-auto-play="'.$instance['slider_auto_play'].'" data-disable-nav-buttons ="'.$instance['disable_nav_buttons'].'" data-buttons-bg="'.$instance['slider_arrows_bg_color'].'" data-buttons-color="'.$instance['slider_arrows_color'].'"' : '';
			$gallery_slider_bg = ( $instance['gallery_image_bg_color'] == '') ? '' : $gallery_lightbox_class;
				echo '<div class="images_gallery_wrapper '.$galler_slider_class.'" '.$gallery_img_data_options.'>';
				$upload_images_array_ids = explode(',', $instance['gallery_img_ids']);
				if( empty($instance['gallery_img_ids']) ){
					$default_img_url = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/gallery_slider.jpg';
					if (is_multisite()){
						$default_image_url = $default_img_url;
					}else{	                
						$default_image_url = kaya_image_resize( $default_img_url, $instance['image_width'],$instance['image_height'],'t' );
					}
				}
					if( $instance['gallery_img_type'] == 'slider_view' ){ // Slider View	
						echo '<div class="image_gallery_slider_wrapper">';  ?>
						<div id="main_slider_imgs" class="owl-carousel">
							<?php 
							if( trim( !empty($instance['gallery_img_ids']) ) ){
								foreach ($upload_images_array_ids as $image_id) {
									$image_url =  wp_get_attachment_image_src( $image_id,'' );
									echo '<div class="item">';
										if( !empty($instance['gallery_img_ids']) ){
											echo '<img class="'.$gallery_slider_bg.'" src="'.kaya_image_resize( $image_url[0], $instance['image_width'],$instance['image_height'],'t' ).'" alt="'.get_the_title().'" />';
										}
										if( $instance['disable_light_box_icon'] != 'on' ){
											echo '<div class="image_link_icon" style="">';
												echo '<a href="'.$image_url[0].'" data-gal="prettyPhoto[gallery_images_'.$gallery_rand.']" style="background:'.$instance['lightbox_icon_bg_color'].'; color:'.$instance['lightbox_icon_link_color'].';"><i class="fa fa-plus"></i></a>';
											echo '</div>';
										}
									echo '</div>';
								}
							}else{
								echo '<div class="item">';
									echo '<img class="'.$gallery_slider_bg.'" src="'.$default_image_url.'" alt="'.get_the_title().'" />';
									if( $instance['disable_light_box_icon'] != 'on' ){
										echo '<div class="image_link_icon" style="">';
											echo '<a href="'.$default_img_url.'" data-gal="prettyPhoto[gallery_images_'.$gallery_rand.']" style="background:'.$instance['lightbox_icon_bg_color'].'; color:'.$instance['lightbox_icon_link_color'].';"><i class="fa fa-plus"></i></a>';
										echo '</div>';
									}
								echo '</div>';
							} ?>
						</div>
						</div>
						<?php if( $instance['disable_slider_thumbnails'] != 'on'){ ?>
							<div id="slider_thumb_images" class="owl-carousel">
								<?php 
								if( trim( !empty($instance['gallery_img_ids']) ) ){
									foreach ($upload_images_array_ids as $image_id) {
										$image_url =  wp_get_attachment_image_src( $image_id,'' );
										echo '<div class="item">';
										if( !empty($instance['gallery_img_ids']) ){
											echo '<img class="" src="'.kaya_image_resize( $image_url[0], '300','250','t' ).'" alt="'.get_the_title().'" />';
										}
										echo '</div>';
									}
								}else{
									echo '<div class="item">';
										echo '<img class="" src="'.$default_image_url.'" alt="'.get_the_title().'" />';
									echo '</div>';
									echo '<div class="item">';
										echo '<img class="" src="'.$default_image_url.'" alt="'.get_the_title().'" />';
									echo '</div>';
								} ?>
							</div>
						<?php } 
						if( trim( empty($instance['gallery_img_ids']) ) ){
							global $post; 
						        $post_id = $post->ID;
						        $post_url = admin_url( 'post.php?post=' . $post_id ) . '&action=edit';
						        echo '<p style="text-align:center;">There is no image attachment IDs in "'.strtoupper($petshop_plugin_name).' Images Gallery" . To upload images <a target="_blank" href="'.$post_url.'">open this page</a> &  edit "'.strtoupper($petshop_plugin_name).' Images Gallery > Upload Gallery Images " button.</p>';
						}
						?>
					<?php }else{ // Grid Images View
					echo '<ul class="'.$gallery_img_slider.'">';
						if( trim( !empty($instance['gallery_img_ids']) ) ){
							foreach ($upload_images_array_ids as $image_id) {
								$image_url =  wp_get_attachment_image_src( $image_id,'' );
								echo '<li><img class="'.$gallery_slider_bg.'" src="'.kaya_image_resize( $image_url[0], $instance['image_width'],$instance['image_height'],'t' ).'" alt="'.get_the_title().'" width="'.$instance['image_width'].'"  />';
									if( $instance['disable_light_box_icon'] != 'on' ){
										echo '<div class="image_link_icon" style="">';
											echo '<a href="'.$image_url[0].'" data-gal="prettyPhoto[gallery_images_'.$gallery_rand.']" style="background:'.$instance['lightbox_icon_bg_color'].'; color:'.$instance['lightbox_icon_link_color'].';"><i class="fa fa-plus"></i></a>';
										echo '</div>';
									}
								echo '</li>';
							}
						}else{
							echo '<li><img class="'.$gallery_slider_bg.'" src="'.$default_image_url.'" alt="'.get_the_title().'" /></li>';
							global $post; 
					        $post_id = $post->ID;
					        $post_url = admin_url( 'post.php?post=' . $post_id ) . '&action=edit';
					        echo '<p style="text-align:center;">There is no image attachment IDs in "'.strtoupper($petshop_plugin_name).' Images Gallery" . To upload images <a target="_blank" href="'.$post_url.'">open this page</a> &  edit "'.strtoupper($petshop_plugin_name).' Images Gallery > Upload Gallery Images " button.</p>';
											}
					echo '</ul>';

				}			
		echo '</div>';		
		echo $args['after_widget'];		
	}
	function form( $instance ){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance, array(
			'gallery_img_type' => 'grid_view',
      		'gallery_img_ids' => '',
      		'image_width' => '480',
      		'image_height' => '480',
      		'disable_slider_thumbnails' => '',
      		'gallery_images_column' => '4',
      		'slider_auto_play' => '',
      		'images_gutter' => '',
      		'slider_arrows_bg_color' => '#ebebeb',
      		'slider_arrows_color' => '#4d4d4d',
      		'gallery_image_bg_color' => '',
      		'disable_light_box_icon' => '',
      		'disable_nav_buttons' => '',
      		'lightbox_icon_bg_color' => '#3f51b5',
      		'lightbox_icon_link_color' => '#ffffff',
        ));
        ?>
		<script type='text/javascript'>
		(function($) {
			"use strict";
			$(function() {
				$('.image_gallery_color_pickr').each(function(){
					$(this).wpColorPicker();
				});
				$("#<?php echo $this->get_field_id('gallery_img_type') ?>").change(function () {
					$(".<?php echo $this->get_field_id('slider_arrows_bg_color') ?>").hide();
					$("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().hide();
					$("#<?php echo $this->get_field_id('gallery_images_column') ?>").parent().show();
					$("#<?php echo $this->get_field_id('images_gutter') ?>").parent().show();
					$("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().addClass('one_fifth_last').removeClass('one_fifth');
					var select_client_img_type = $("#<?php echo $this->get_field_id('gallery_img_type') ?> option:selected").val(); 
					switch(select_client_img_type){
						case 'slider_view':
							$(".<?php echo $this->get_field_id('slider_arrows_bg_color') ?>").show();
							$("#<?php echo $this->get_field_id('gallery_images_column') ?>").parent().hide();
							$("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().show();
							$("#<?php echo $this->get_field_id('images_gutter') ?>").parent().hide();
							$("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().addClass('one_fifth').removeClass('one_fifth_last');
							break;  
					}
				}).change();
			});
		})(jQuery);
		</script>
		<div class="input-elements-wrapper">    
			<p><?php $i = rand(1,100); ?>
				<input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('gallery_img_ids'); ?>" id="<?php echo $this->get_field_id('gallery_img_ids'); ?>" value="<?php echo $instance['gallery_img_ids']; ?>">
				<input type="button" value="<?php _e( 'Upload Gallery Images', $petshop_plugin_name ); ?>" class="button button-primary  custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
				<script type="text/javascript">
					jQuery(document).ready( function(){
						var file_frame;
						jQuery('.custom_media_upload_<?php echo $i; ?>').live('click', function( event ){
							event.preventDefault();
							if ( file_frame ) {
								file_frame.open();
								return;
							}
							// Create the media frame.
							file_frame = wp.media.frames.file_frame = wp.media({
								title: 'Upload Gallery Images',
								button: {
									text: 'Upload Gallery Images',
								},
								multiple: true // Set to true to allow multiple files to be selected
							});
							file_frame.on( 'select', function() {
								var selection = file_frame.state().get('selection');
								var attachment_ids = selection.map( function( attachment ) {
								attachment = attachment.toJSON();
									return attachment.id;
								}).join();
								if( attachment_ids.charAt(0) === ',' ) { attachment_ids = attachment_ids.substring(1); }
								jQuery('.custom_media_url_<?php echo $i; ?>').val( attachment_ids );
							});
							// Finally, open the modal
							file_frame.open();
						});
					});
				</script><br />
				<small><?php _e('Note:Comma separated attachment IDs',$petshop_plugin_name) ?></small>
			</p>
		</div>
		<div class="input-element-wrapper">
			<p class="one_fifth">
				<label for="<?php echo $this->get_field_id('gallery_img_type') ?>">  <?php _e('Select Gallery Image Type',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('gallery_img_type') ?>" name="<?php echo $this->get_field_name('gallery_img_type') ?>">
					<option value="grid_view" <?php selected('grid_view', $instance['gallery_img_type']) ?>>  <?php esc_html_e('Grid View', $petshop_plugin_name) ?> </option>
					<option value="slider_view" <?php selected('slider_view', $instance['gallery_img_type']) ?>>  <?php esc_html_e('Slider View', $petshop_plugin_name) ?>    </option>
				</select>
			</p>
			<p class="one_fifth">
				<label for="<?php echo $this->get_field_id('gallery_images_column') ?>">  <?php _e('Select Columns',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('gallery_images_column') ?>" name="<?php echo $this->get_field_name('gallery_images_column') ?>">
					<option value="5" <?php selected('5', $instance['gallery_images_column']) ?>>  <?php esc_html_e('Column 5', $petshop_plugin_name) ?>    </option>
					<option value="4" <?php selected('4', $instance['gallery_images_column']) ?>>  <?php esc_html_e('Column 4', $petshop_plugin_name) ?>    </option>
					<option value="3" <?php selected('3', $instance['gallery_images_column']) ?>>  <?php esc_html_e('Column 3', $petshop_plugin_name) ?>    </option>
					<option value="2" <?php selected('2', $instance['gallery_images_column']) ?>>    <?php esc_html_e('Column 2', $petshop_plugin_name) ?>    </option>
					<option value="1" <?php selected('1', $instance['gallery_images_column']) ?>>    <?php esc_html_e('Column 1', $petshop_plugin_name) ?>    </option>
				</select>
			</p>
			<p class="one_fifth">
			    <label for="<?php echo $this->get_field_id('image_width'); ?>"> <?php _e('Image Width & Height',$petshop_plugin_name) ?>  </label>
			    <input type="text" name="<?php echo $this->get_field_name('image_width') ?>" id="<?php echo $this->get_field_id('image_width') ?>" class="small-text" value="<?php echo esc_attr($instance['image_width']) ?>" /> X
			    <input type="text" name="<?php echo $this->get_field_name('image_height') ?>" id="<?php echo $this->get_field_id('image_height') ?>" class="small-text" value="<?php echo esc_attr($instance['image_height']) ?>" />
			    <small><?php _e('px',$petshop_plugin_name); ?></small>
			</p>
			<p class="one_fifth">
				<label for="<?php echo $this->get_field_id('images_gutter') ?>">  <?php _e('Gutter',$petshop_plugin_name)?>  </label>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("images_gutter"); ?>" name="<?php echo $this->get_field_name("images_gutter"); ?>"<?php checked( (bool) $instance["images_gutter"], true ); ?> />
			</p>
			<p class="one_fifth_last">
				<label for="<?php echo $this->get_field_id('slider_auto_play') ?>">  <?php _e('Auto Play',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('slider_auto_play') ?>" name="<?php echo $this->get_field_name('slider_auto_play') ?>">
					<option value="true" <?php selected('True', $instance['slider_auto_play']) ?>>  <?php esc_html_e('True', $petshop_plugin_name) ?>    </option>
					<option value="false" <?php selected('false', $instance['slider_auto_play']) ?>>  <?php esc_html_e('False', $petshop_plugin_name) ?>    </option>
				</select>
			</p> 
		</div>
		<div class="input-element-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('gallery_image_bg_color') ?>">  <?php _e('Image Hover Background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('gallery_image_bg_color') ?>" id="<?php echo $this->get_field_id('gallery_image_bg_color') ?>" class="image_gallery_color_pickr" value="<?php echo esc_attr($instance['gallery_image_bg_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('disable_light_box_icon') ?>">  <?php _e('Disable Lightbox Icon',$petshop_plugin_name)?>  </label>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_light_box_icon"); ?>" name="<?php echo $this->get_field_name("disable_light_box_icon"); ?>"<?php checked( (bool) $instance["disable_light_box_icon"], true ); ?> />	
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('lightbox_icon_bg_color') ?>">  <?php _e('Lightbox Icon background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('lightbox_icon_bg_color') ?>" id="<?php echo $this->get_field_id('lightbox_icon_bg_color') ?>" class="image_gallery_color_pickr" value="<?php echo esc_attr($instance['lightbox_icon_bg_color']) ?>" />
			</p>
			<p class="one_fourth_last ">
				<label for="<?php echo $this->get_field_id('lightbox_icon_link_color') ?>">  <?php _e('Lightbox Icon Link Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('lightbox_icon_link_color') ?>" id="<?php echo $this->get_field_id('lightbox_icon_link_color') ?>" class="image_gallery_color_pickr" value="<?php echo esc_attr($instance['lightbox_icon_link_color']) ?>" />
			</p>
		</div>
		<div class="input-element-wrapper <?php echo $this->get_field_id('slider_arrows_bg_color') ?>">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>">  <?php _e('Slider Arrows Background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('slider_arrows_bg_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>" class="image_gallery_color_pickr" value="<?php echo esc_attr($instance['slider_arrows_bg_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('slider_arrows_color') ?>">  <?php _e('Slider Arrows Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('slider_arrows_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_color') ?>" class="image_gallery_color_pickr" value="<?php echo esc_attr($instance['slider_arrows_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('disable_slider_thumbnails') ?>">  <?php _e('Disable Slider Thumbnail Images',$petshop_plugin_name)?>  </label>
				<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_slider_thumbnails"); ?>" name="<?php echo $this->get_field_name("disable_slider_thumbnails"); ?>"<?php checked( (bool) $instance["disable_slider_thumbnails"], true ); ?> />
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('disable_nav_buttons') ?>">  <?php _e('Disable Nav Buttons',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('disable_nav_buttons') ?>" name="<?php echo $this->get_field_name('disable_nav_buttons') ?>">
					<option value="true" <?php selected('True', $instance['disable_nav_buttons']) ?>>  <?php esc_html_e('True', $petshop_plugin_name) ?>    </option>
					<option value="false" <?php selected('false', $instance['disable_nav_buttons']) ?>>  <?php esc_html_e('False', $petshop_plugin_name) ?>    </option>
				</select>
			</p> 
		</div>
	<?php }	 
}
petshop_kaya_register_widgets('gallery-slider', __FILE__);