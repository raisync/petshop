<?php
class Petshop_Services_Widget extends WP_Widget{
	public function __construct(){
		global $petshop_plugin_name;
		parent::__construct(  'kaya-services-widget',
		__('Petshop - Services',$petshop_plugin_name),
		array( 'description' => __('Use this widget as a services',$petshop_plugin_name) ,'class' => '' )
		);
	}
	public function widget( $args , $instance ){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance, array(
			'services_box_height' => '200',
			'services_box_icon_name' => 'paint-brush',
      		'services_box_icon_bg_color' => '#1a1a1a',
      		'services_box_icon_color' => '#ffffff',
      		'services_box_icon_font_size' => '100',
      		'services_box_desc_bg_color' => '#ffffff',
      		'services_box_desc_color' => '#737373',
      		'services_box_desc_font_weight' => 'normal',
      		'services_box_desc_font_style' => 'normal',
      		'services_box_description' => __('Add your servics box title description',$petshop_plugin_name),
      		'services_box_title' => __('Add Services Title',$petshop_plugin_name),
      		'services_box_title_bg_color' => '#ffffff',
      		'services_box_title_color' => '#333333',
      		'services_box_title_font_style' => 'normal',
      		'services_box_title_bg_hover_color' => '#f49c41',
      		'services_box_title_hover_color' => '#ffffff',
      		'services_box_title_font_weight'=>'normal',
      		'services_box_title_font_size'	=>'18',
      		'services_box_title_letter_space' => '0',
      		'select_font_icon_type' => '',
      		'services_box_desc_letter_space' => '0',
      		'services_box_desc_font_size' => '15',
        ));
		echo $args['before_widget'];
		if( $instance['select_font_icon_type'] == 'awesome_fonts' ){
     		 wp_enqueue_style('fontawesome', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/fontawesome/style.css',true, '', 'all');
    	}
    if( $instance['select_font_icon_type'] == 'generaic_icons' ){
      wp_enqueue_style('genericons', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/genericons/style.css',true, '', 'all');
    }
    if( $instance['select_font_icon_type'] == 'elegentline_icons' ){
      wp_enqueue_style('elegantline', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/elegantline/style.css',true, '', 'all');
    }
    if( $instance['select_font_icon_type'] == 'icomoon_icons' ){
      wp_enqueue_style('icomoon', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/icomoon/style.css',true, '', 'all');
    }
			echo '<div class="services_widget_wrapper">';
				echo '<div class="services_content_wrapper" style="height:'.$instance['services_box_height'].'px;">';
					echo '<div class="services_icon_wrapper" style="line-height:'.$instance['services_box_height'].'px; background-color:'.$instance['services_box_icon_bg_color'].'; color:'.$instance['services_box_icon_color'].'; font-size:'.$instance['services_box_icon_font_size'].'px;">';
						 display_font_icons( $instance['services_box_icon_name'], $instance['select_font_icon_type'] );  
					echo '</div>'; 
					if( !empty($instance['services_box_description']) ){
						echo '<div class="services_description_wrapper" style="background-color:'.$instance['services_box_desc_bg_color'].'; color:'.$instance['services_box_desc_color'].';"><p style="font-style:'.$instance['services_box_desc_font_style'].'; font-weight:'.$instance['services_box_desc_font_weight'].'; font-size:'.$instance['services_box_desc_font_size'].'px; letter-spacing:'.$instance['services_box_desc_letter_space'].'px; color:'.$instance['services_box_desc_color'].';">';
							echo $instance['services_box_description'].'</p>';
						echo '</div>';
					}
				echo '</div>';
				if( !empty($instance['services_box_title']) ){
					echo '<h3 class="services_title" style="background-color:'.$instance['services_box_title_bg_color'].'; font-size:'.$instance['services_box_title_font_size'].'px; letter-spacing:'.$instance['services_box_title_letter_space'].'px; font-weight:'.$instance['services_box_title_font_weight'].'; font-style:'.$instance['services_box_title_font_style'].'; color:'.$instance['services_box_title_color'].';" data-bg-hover="'.trim($instance['services_box_title_bg_hover_color']).'" data-text-hover="'.$instance['services_box_title_hover_color'].'">'.$instance['services_box_title'].'</h3>';
				}
			echo '</div>';
		echo $args['after_widget'];
	}
	function form( $instance ){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance, array(
			'services_box_height' => '200',
			'services_box_icon_name' => 'paint-brush',
      		'services_box_icon_bg_color' => '#1a1a1a',
      		'services_box_icon_color' => '#ffffff',
      		'services_box_icon_font_size' => '100',
      		'services_box_desc_bg_color' => '#ffffff',
      		'services_box_desc_color' => '#737373',
      		'services_box_desc_font_weight' => 'normal',
      		'services_box_desc_font_style' => 'normal',
      		'services_box_description' => __('Add your servics box title description',$petshop_plugin_name),
      		'services_box_title' => __('Add Services Title',$petshop_plugin_name),
      		'services_box_title_bg_color' => '#ffffff',
      		'services_box_title_color' => '#333333',
      		'services_box_title_font_style' => 'normal',
      		'services_box_title_bg_hover_color' => '#f49c41',
      		'services_box_title_hover_color' => '#ffffff',
      		'services_box_title_font_weight'=>'normal',
      		'services_box_title_font_size'	=>'18',
      		'services_box_title_letter_space' => '0',
      		'select_font_icon_type' => '',
      		'services_box_desc_letter_space' => '0',
      		'services_box_desc_font_size' => '15',
        ));
        ?>
        	<script type='text/javascript'>
		(function($) {
			"use strict";
			$(function() {
				$('.services_color_pickr').each(function(){
					$(this).wpColorPicker();
				});
			});
		})(jQuery);
		</script>
		<div class="input-element-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_height') ?>">  <?php _e('Service Box Wrapper Height',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_height') ?>" id="<?php echo $this->get_field_id('services_box_height') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_height']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
			<?php select_font_icons($this->get_field_id('select_font_icon_type'), $this->get_field_name('select_font_icon_type'), $instance['select_font_icon_type']); ?>
   			 <?php kaya_font_icons($this->get_field_id('services_box_icon_name'), $this->get_field_name('services_box_icon_name'), $instance['services_box_icon_name']); ?>

			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_icon_bg_color') ?>">  <?php _e('Icon Background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_icon_bg_color') ?>" id="<?php echo $this->get_field_id('services_box_icon_bg_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_icon_bg_color']) ?>" />
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('services_box_icon_color') ?>">  <?php _e('Icon Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_icon_color') ?>" id="<?php echo $this->get_field_id('services_box_icon_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_icon_color']) ?>" />
			</p>
			<p class="one_fourth" style="clear:both;">
				<label for="<?php echo $this->get_field_id('services_box_icon_font_size') ?>">  <?php _e('Icon Font Size',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_icon_font_size') ?>" id="<?php echo $this->get_field_id('services_box_icon_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_icon_font_size']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
		</div>
		<div class="input-element-wrapper">
			 <p class="fullwidth">
		        <lable for="<?php echo $this->get_field_id('services_box_description') ?>">  <?php _e('Services Box Content',$petshop_plugin_name) ?>  </label>
		        <textarea type="text" id="<?php echo $this->get_field_id('services_box_description') ?>" class="widefat" name="<?php echo $this
		         ->get_field_name('services_box_description') ?>" value = "<?php echo esc_attr( $instance['services_box_description'] ) ?>" > <?php echo esc_attr( $instance['services_box_description'] ) ?></textarea>
		    </p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_desc_bg_color') ?>">  <?php _e('Description Background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_desc_bg_color') ?>" id="<?php echo $this->get_field_id('services_box_desc_bg_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_desc_bg_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_desc_color') ?>">  <?php _e('Description Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_desc_color') ?>" id="<?php echo $this->get_field_id('services_box_desc_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_desc_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_desc_font_size') ?>">  <?php _e('Description Font Size',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_desc_font_size') ?>" id="<?php echo $this->get_field_id('services_box_desc_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_desc_font_size']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('services_box_desc_letter_space') ?>">  <?php _e('Description Letter Spacing',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_desc_letter_space') ?>" id="<?php echo $this->get_field_id('services_box_desc_letter_space') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_desc_letter_space']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth"  style="clear:both;">
				<label for="<?php echo $this->get_field_id('services_box_desc_font_weight') ?>">  <?php _e('Description Font Weight',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('services_box_desc_font_weight') ?>" name="<?php echo $this->get_field_name('services_box_desc_font_weight') ?>">
					<option value="normal" <?php selected('normal', $instance['services_box_desc_font_weight']) ?>>  <?php esc_html_e('Normal', $petshop_plugin_name) ?>    </option>
					<option value="bold" <?php selected('bold', $instance['services_box_desc_font_weight']) ?>>  <?php esc_html_e('Bold', $petshop_plugin_name) ?>    </option>
				</select>
			</p> 
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_desc_font_style') ?>">  <?php _e('Description Font Style',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('services_box_desc_font_style') ?>" name="<?php echo $this->get_field_name('services_box_desc_font_style') ?>">
					<option value="normal" <?php selected('normal', $instance['services_box_desc_font_style']) ?>>  <?php esc_html_e('Normal', $petshop_plugin_name) ?>    </option>
					<option value="italic" <?php selected('italic', $instance['services_box_desc_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?>    </option>
				</select>
			</p>
		</div>
		<div class="input-element-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_title') ?>">  <?php _e('Title',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title') ?>" id="<?php echo $this->get_field_id('services_box_title') ?>" class="" value="<?php echo esc_attr($instance['services_box_title']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_title_bg_color') ?>">  <?php _e('Title Background Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_bg_color') ?>" id="<?php echo $this->get_field_id('services_box_title_bg_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_title_bg_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_title_color') ?>">  <?php _e('Title Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_color') ?>" id="<?php echo $this->get_field_id('services_box_title_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_title_color']) ?>" />
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('services_box_title_font_size') ?>">  <?php _e('Title Font Size',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_font_size') ?>" id="<?php echo $this->get_field_id('services_box_title_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_title_font_size']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth" style="clear:both;">
				<label for="<?php echo $this->get_field_id('services_box_title_letter_space') ?>">  <?php _e('Title Letter Spacing',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_letter_space') ?>" id="<?php echo $this->get_field_id('services_box_title_letter_space') ?>" class="small-text" value="<?php echo esc_attr($instance['services_box_title_letter_space']) ?>" />
				<small><?php _e('px', $petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_title_font_weight') ?>">  <?php _e('Title Font Weight',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('services_box_title_font_weight') ?>" name="<?php echo $this->get_field_name('services_box_title_font_weight') ?>">
					<option value="normal" <?php selected('normal', $instance['services_box_title_font_weight']) ?>>  <?php esc_html_e('Normal', $petshop_plugin_name) ?>    </option>
					<option value="bold" <?php selected('bold', $instance['services_box_title_font_weight']) ?>>  <?php esc_html_e('Bold', $petshop_plugin_name) ?>    </option>
				</select>
			</p> 
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('services_box_title_font_style') ?>">  <?php _e('Title Font Style',$petshop_plugin_name)?>  </label>
				<select id="<?php echo $this->get_field_id('services_box_title_font_style') ?>" name="<?php echo $this->get_field_name('services_box_title_font_style') ?>">
					<option value="normal" <?php selected('normal', $instance['services_box_title_font_style']) ?>>  <?php esc_html_e('Normal', $petshop_plugin_name) ?>    </option>
					<option value="italic" <?php selected('bold', $instance['services_box_title_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?>    </option>
				</select>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('services_box_title_bg_hover_color') ?>">  <?php _e('Title Background Hover Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_bg_hover_color') ?>" id="<?php echo $this->get_field_id('services_box_title_bg_hover_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_title_bg_hover_color']) ?>" />
			</p>
			<p class="one_fourth" style="clear:both;">
				<label for="<?php echo $this->get_field_id('services_box_title_hover_color') ?>">  <?php _e('Title Hover Color',$petshop_plugin_name)?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('services_box_title_hover_color') ?>" id="<?php echo $this->get_field_id('services_box_title_hover_color') ?>" class="services_color_pickr" value="<?php echo esc_attr($instance['services_box_title_hover_color']) ?>" />
			</p>
		</div>
	<?php }	 
}
petshop_kaya_register_widgets('services', __FILE__);