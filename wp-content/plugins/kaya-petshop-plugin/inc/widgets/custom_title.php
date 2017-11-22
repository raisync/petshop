<?php
class Petshop_Custom_Title_Widget extends WP_Widget{
	public function __construct(){
		global $petshop_plugin_name;
	    parent::__construct('kaya-custom-title',
	    __('Petshop - Custom Title',$petshop_plugin_name),
	    array('description' => __('Add custom title where you want', $petshop_plugin_name))
	    );	
	}
	public function widget($args, $instance){
		echo $args['before_widget'];
		global $petshop_plugin_name;
		$instance = wp_parse_args( $instance, array(
			'title' => __('Custom Title', $petshop_plugin_name),
			'description' => '',
			'desc_color' => '#757575',
			'title_color' => '#333333',
			'title_border_color' => '',
			'text_align' => 'left',
			'title_font_size' => '30',
			'title_font_weight' => 'normal',
			'title_font_style' => 'normal',
			'description_font_weight' =>'normal',
			'description_font_style' => 'normal',
			'title_margin_bottom' => '15',
			'title_letter_spacing' => '0',
			'animation_names' => '',
			'description_letter_spacing' => '0',
			'description_font_size' => '14',
			'description_margin_bottom' => '0',
			'disable_margin_left'  => '',
		));
		$rand = rand(1,100); ?>
		<style type="text/css">
		.custom_title_<?php echo $rand; ?> h2,.custom_title_<?php echo $rand; ?> h2::before,.custom_title_<?php echo $rand; ?> h2::after{
			border: 1px solid <?php echo $instance['title_border_color'] ?>!important;
		}
		.custom_title_<?php echo $rand; ?> .custom_title_left{
  			float: left;
  			text-align: left;
		}
		.custom_title_<?php echo $rand; ?> .custom_title_right{
		    float: right;
		    text-align: right;
		}
		.custom_title_<?php echo $rand; ?> .custom_title_center{
		    float: none;
		    text-align: center;
		}
		</style>
		<?php 
		$title_animation = ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
		$desc_line_height = ceil($instance['description_font_size'] * 1.8);
		$title_line_height = ceil($instance['title_font_size'] * 1.4);
		echo '<div class="'.$title_animation.' custom_title_wrapper custom_title_'.$rand.'">';
			echo '<div class="custom_title_'.$instance['text_align'].'">';
			if( $instance['title'] ): 
				echo  '<h2 class="title_style1" style="letter-spacing:'.$instance['title_letter_spacing'].'px; font-weight:'.$instance['title_font_weight'].'; font-style:'.$instance['title_font_style'].'; font-size:'.$instance['title_font_size'].'px; line-height:'.$title_line_height.'px; text-align:'.$instance['text_align'].'; color:'.$instance['title_color'].'!important;">'.$instance['title'];
				echo '</h2>'; 
			endif;
				// Description
				if( trim( $instance['description'] ) ):   echo  '<p style="margin-bottom:'.$instance['description_margin_bottom'].'px; font-size:'.$instance['description_font_size'].'px;  line-height:'.$desc_line_height.'px; font-weight:'.$instance['description_font_weight'].'; letter-spacing:'.$instance['description_letter_spacing'].'px; font-style:'.$instance['description_font_style'].'; text-align:'.$instance['text_align'].'; color:'.$instance['desc_color'].'!important;">'.trim( $instance['description'] ).'</p>'; endif;
			echo '</div>';
		echo '</div>';
		?>
		<div class="clear"> </div>
		<?php    echo  $args['after_widget'];
	}
	public function form($instance){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance,array(
			'title' => __('Custom Title', $petshop_plugin_name),
			'description' => '',
			'desc_color' => '#757575',
			'title_color' => '#333333',
			'title_border_color' => '',
			'text_align' => 'left',
			'title_font_size' => '30',
			'title_font_weight' => 'normal',
			'title_font_style' => 'normal',
			'description_font_weight' =>'normal',
			'description_font_style' => 'normal',
			'title_margin_bottom' => '15',
			'title_letter_spacing' => '0',
			'animation_names' => '',
			'description_letter_spacing' => '0',
			'description_font_size' => '14',
			'description_margin_bottom' => '0',
			'disable_margin_left'  => '',
		));?>
		<script type='text/javascript'>
			(function( $ ) {
				"use strict";
				$('.title_color_pickr').each(function(){
					$(this).wpColorPicker();
				});
				$("#<?php echo $this->get_field_id('text_align') ?>").change(function () {
					$("#<?php echo $this->get_field_id('disable_margin_left') ?>").parent().hide(); 
					var left_setting = $("#<?php echo $this->get_field_id('text_align') ?> option:selected").val();
					switch(left_setting){
						case 'left':
							$("#<?php echo $this->get_field_id('disable_margin_left') ?>").parent().show();
						break; 
					}
				}).change();
			})(jQuery);
		</script>
		<div class="input-elements-wrapper">  
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title',$petshop_plugin_name) ?> </label>
				<input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ) ?>" />
			</p>
		</div>
		<div class="input-elements-wrapper"> 	
			<p class="one_fourth">
					<label for="<?php echo $this->get_field_id('title_font_size'); ?>"> <?php _e('Title Font Size',$petshop_plugin_name) ?> </label>
					<input type="text" name="<?php echo $this->get_field_name('title_font_size') ?>" id="<?php echo $this->get_field_id('title_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['title_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Title Font Weight',$petshop_plugin_name) ?></label>
				<select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name
					('title_font_weight') ?>">
					<option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
					<option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
				</select>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_font_style') ?>"> <?php _e('Title Font Style',$petshop_plugin_name) ?></label>
				<select id="<?php echo $this->get_field_id('title_font_style') ?>" name="<?php echo $this->get_field_name
					('title_font_style') ?>">
					<option value="normal" <?php selected('normal', $instance['title_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
					<option value="italic" <?php selected('italic', $instance['title_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
				</select>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('title_letter_spacing'); ?>"> <?php _e('Title Letter Spacing',$petshop_plugin_name) ?> </label>
				<input type="text" name="<?php echo $this->get_field_name('title_letter_spacing') ?>" id="<?php echo $this->get_field_id('title_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['title_letter_spacing'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
			</p>
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_color'); ?>"> <?php _e('Title Color',$petshop_plugin_name) ?></label>
				<input type="text" name="<?php echo $this->get_field_name('title_color') ?>" id="<?php echo $this->get_field_id('title_color') ?>" class="title_color_pickr" value="<?php echo $instance['title_color'] ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_border_color'); ?>"> <?php _e('Title Border Color',$petshop_plugin_name) ?> </label>
				<input type="text" name="<?php echo $this->get_field_name('title_border_color') ?>" id="<?php echo $this->get_field_id('title_border_color') ?>" class="title_color_pickr" value="<?php echo esc_attr($instance['title_border_color']) ?>" />
			</p>
		</div>		
		<!-- End Separator --> 
		<div class="input-elements-wrapper">  
			<p class="three_fourth">
				<label for="<?php echo $this->get_field_id('description'); ?>"> <?php _e('Description',$petshop_plugin_name) 
				?></label>
				<textarea name="<?php echo $this->get_field_name('description') ?>" id="<?php echo $this->get_field_id('description') ?>" class="widefat" value="<?php echo $instance['description'] ?>" > <?php echo $instance['description'] ?> </textarea>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('description_font_size'); ?>"> <?php _e('Description Font Size',$petshop_plugin_name) ?> </label>
				<input type="text" name="<?php echo $this->get_field_name('description_font_size') ?>" id="<?php echo $this->get_field_id('description_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['description_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('description_font_weight') ?>"> <?php _e('Description Font Weight',$petshop_plugin_name) ?></label>
				<select id="<?php echo $this->get_field_id('description_font_weight') ?>" name="<?php echo 
					$this->get_field_name('description_font_weight') ?>">
					<option value="normal" <?php selected('normal', $instance['description_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
					<option value="bold" <?php selected('bold', $instance['description_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
				</select>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('description_font_style') ?>"> <?php _e('Description Font Style',$petshop_plugin_name) ?></label>
				<select id="<?php echo $this->get_field_id('description_font_style') ?>" name="<?php echo 
					$this->get_field_name('description_font_style') ?>">
					<option value="italic" <?php selected('italic', $instance['description_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
					<option value="normal" <?php selected('normal', $instance['description_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
				</select>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('description_letter_spacing'); ?>"> <?php _e('Description Letter Spacing',$petshop_plugin_name) ?> </label>
				<input type="text" name="<?php echo $this->get_field_name('description_letter_spacing') ?>" id="<?php echo $this->get_field_id('description_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['description_letter_spacing'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('desc_color'); ?>"> <?php _e('Description Color',$petshop_plugin_name) ?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('desc_color') ?>" id="<?php echo $this->get_field_id
				('desc_color') ?>" class="title_color_pickr" value="<?php echo esc_attr($instance['desc_color']) ?>" />
			</p>  
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('text_align') ?>"> <?php _e('Titles / Description Position',$petshop_plugin_name) ?>  </label>
				<select id="<?php echo $this->get_field_id('text_align') ?>" name="<?php echo $this->get_field_name
					('text_align') ?>">
					<option value="left" <?php selected('left', $instance['text_align']) ?>>   <?php esc_html_e(' Left', $petshop_plugin_name) ?>    </option>
					<option value="right" <?php selected('right', $instance['text_align']) ?>>   <?php esc_html_e('Right', $petshop_plugin_name) ?>   </option>
					<option value="center" <?php selected('center', $instance['text_align']) ?>>  <?php esc_html_e(' Center', $petshop_plugin_name) ?>   </option>
				</select>
			</p>
		</div>
		<div class="input-elements-wrapper">
			<p>
				<label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
				<?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
			<p>
		</div>
	 <?php
	}
}
  petshop_kaya_register_widgets('custom-title', __FILE__); 
?>