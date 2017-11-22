<?php
class Petshop_Alert_Boxes_Widget extends WP_Widget{
	public function __construct(){
		global $petshop_plugin_name;
		parent::__construct('alert-box',__('Petshop - Alert Box',$petshop_plugin_name),
			array('description' => __('Use this widget to add alert massages',$petshop_plugin_name))
		);
	}
	public function widget( $args,$instance){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance,array(
			'alert_box_content' => __('This is Normal Alert Message', $petshop_plugin_name),
			'awesome_icon_name' => 'fa-check-circle-o',
			'alert_box_bg_color' => '',
			'alert_content_color' => '#f49c41',
			'border_color' => '#cccccc',
		    'animation_names' => '',
		));
		echo $args['before_widget'];
			$animation = trim($instance['animation_names']) ? 'wow '.$instance['animation_names'].'' : '';
			echo '<div class="alert_box '.$animation.'" style="color:'.$instance['alert_content_color'].'; border:1px solid '.$instance['border_color'].'; background-color:'.$instance['alert_box_bg_color'].' ">';
			    echo '<span class="alert_awesome_icon"> <i class="fa '.$instance['awesome_icon_name'].'" > </i></span>';
				echo '<span class="alert_content">'.$instance['alert_box_content'].'</span>';
				echo '<span class="close_alert_icon"> <i class="fa fa-close" > </i></span>';
			echo '</div>';
		echo $args['after_widget'];
	}
	public function form($instance){
		global $petshop_plugin_name;
		$instance = wp_parse_args($instance,array(
			'alert_box_content' => __('This is Normal Alert Message', $petshop_plugin_name),
			'awesome_icon_name' => 'fa-check-circle-o',
			'alert_box_bg_color' => '',
			'alert_content_color' => '#f49c41',
			'border_color' => '#cccccc',
			'animation_names' => '',
		));?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			jQuery('.alert_boxes_color_picker').each(function(){
				jQuery(this).wpColorPicker();
			});
		});
		</script>
		<div class="input-elements-wrapper">
			<p>
				<label for="<?php echo $this->get_field_id('alert_box_content') ?>"><?php _e('Alert Box Content',$petshop_plugin_name) ?></lable>
				<textarea type="text" id="<?php echo $this->get_field_id('alert_box_content') ?>" class="widefat" name="<?php echo $this->get_field_name('alert_box_content') ?>" value = "<?php echo esc_attr($instance['alert_box_content']) ?>" > <?php echo $instance['alert_box_content'] ?>	</textarea>
			</p>
		</div>	
		<div class="input-elements-wrapper">    
			<p>
				<label for="<?php echo $this->get_field_id('awesome_icon_name') ?>"><?php _e('Awesome Icon Name',$petshop_plugin_name) ?></label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id('awesome_icon_name') ?>" name="<?php echo $this->get_field_name('awesome_icon_name') ?>" value="<?php echo esc_attr($instance['awesome_icon_name']) ?>" />
				<small>	<?php _e('Ex: fa-home, for More Awesome icons click',$petshop_plugin_name); ?>
				<a href='http://fontawesome.io/icons/' target='_blank'> click here </a></small>
			</p>
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('alert_box_bg_color') ?>"> <?php _e('Alert Box Background Color',$petshop_plugin_name) ?>  </label>
				<input type="text" id="<?php echo $this->get_field_id('alert_box_bg_color') ?>" class="alert_boxes_color_picker" name="<?php echo $this->get_field_name('alert_box_bg_color') ?>" value = "<?php echo esc_attr($instance['alert_box_bg_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('alert_content_color') ?>"> <?php _e('Alert Box Content Color',$petshop_plugin_name) ?>  </label>
				<input type="text" id="<?php echo $this->get_field_id('alert_content_color') ?>" class="alert_boxes_color_picker" name="<?php echo $this->get_field_name('alert_content_color') ?>" value = "<?php echo esc_attr($instance['alert_content_color']) ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('border_color') ?>"> <?php _e('Alert Box Border Color',$petshop_plugin_name) ?>  </label>
				<input type="text" id="<?php echo $this->get_field_id('border_color') ?>" class="alert_boxes_color_picker" name="<?php echo $this->get_field_name('border_color') ?>" value = "<?php echo esc_attr($instance['border_color']) ?>" />
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
petshop_kaya_register_widgets('alert-boxes', __FILE__);
?>