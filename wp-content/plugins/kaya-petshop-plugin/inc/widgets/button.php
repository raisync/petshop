<?php
class Petshop_Readmore_Button_Widget extends WP_Widget {
    public function __construct(){
      global $petshop_plugin_name;
      parent::__construct(
        $petshop_plugin_name.'-readmore-button',
        __('Petshop -  Button ',$petshop_plugin_name),   
        array( 'description' => __('Displays Button where ever you want',$petshop_plugin_name),'class' => 'kaya_readmore_widget',
      ));
    }
    public function widget( $args , $instance){
      global $petshop_plugin_name;
      $instance = wp_parse_args($instance, array(          
        'readmore_button_text' => __('Readmore',$petshop_plugin_name),
        'readmore_button_link' => '#',
        'readmore_button_color' => '#f49c41',
        'readmore_button_text_color' => '#ffffff',
        'readmore_button_hover_color' => '#4d4d4d',
        'readmore_button_hover_link_color' => '#ffffff',
        'readmore_button_alignment' => __('left', $petshop_plugin_name),
        'readmore_button_new_window' => '',
        'readmore_button_border_color' => '#4d4d4d',
        'readmore_button_border_hover_color' => '#f49c41',
        'readmore_button_border_width' => '2',
        'animation_names' => '',
        'readmore_button_margin_top' => '0',
        'font_icon_name' => '',
        'select_font_icon_type' => '',
        'readmore_button_padding_t_b' => '7',
        'readmore_button_padding_l_r' => '20',
        'readmore_button_font_size' => '13',
        'readmore_button_font_weight' => 'normal',
        'readmore_button_font_style' => 'normal',
        'readmore_button_letter_spacing' => '2',
        'readmore_button_border_radius' => '0',
      ));
      echo $args['before_widget']; 
        $button_hover =rand(1,100);   
        $target_window = ( $instance['readmore_button_new_window'] == 'on' ) ? '_blank' : '_self';
        $button_animation =   ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : ''; ?>
          <div class="button_wrapper_section button_wrapper_<?php echo $instance['readmore_button_alignment'] ?>">
          <a data-hover-link-color = "<?php echo $instance['readmore_button_hover_link_color']; ?>" data-hover-bg-color = "<?php echo $instance['readmore_button_hover_color']; ?>"  data-hover-border-color = "<?php echo $instance['readmore_button_border_hover_color']; ?>" class="<?php  echo $button_animation; ?> widget_button widget_readmore-<?php echo $button_hover; ?> align<?php echo $instance['readmore_button_alignment']; ?>" href="<?php echo esc_url($instance['readmore_button_link']); ?>" target="<?php echo $target_window; ?>" style="background-color:<?php echo $instance['readmore_button_color']; ?>; color:<?php echo $instance['readmore_button_text_color']; ?>; border-radius:<?php echo $instance['readmore_button_border_radius'] ?>px; border:<?php echo $instance['readmore_button_border_width'] ?>px solid <?php echo $instance['readmore_button_border_color']; ?>; margin-top:<?php echo $instance['readmore_button_margin_top'] ?>px; padding:<?php echo $instance['readmore_button_padding_t_b'] ?>px <?php echo $instance['readmore_button_padding_l_r'] ?>px; font-size:<?php echo $instance['readmore_button_font_size']?>px; font-weight:<?php echo $instance['readmore_button_font_weight']?>; font-style:<?php echo $instance['readmore_button_font_style']?>; letter-spacing:<?php echo $instance['readmore_button_letter_spacing']?>px">
            <?php echo esc_attr($instance['readmore_button_text']); ?>
        </a>
      </div>
        <?php        
      echo $args['after_widget'];
    }
    public function form($instance){
      global $petshop_plugin_name;
      $instance = wp_parse_args($instance, array(          
        'readmore_button_text' => __('Readmore',$petshop_plugin_name),
        'readmore_button_link' => '#',
        'readmore_button_color' => '#f49c41',
        'readmore_button_text_color' => '#ffffff',
        'readmore_button_hover_color' => '#4d4d4d',
        'readmore_button_hover_link_color' => '#ffffff',
        'readmore_button_alignment' => __('left', $petshop_plugin_name),
        'readmore_button_new_window' => '',
        'readmore_button_border_color' => '#4d4d4d',
        'readmore_button_border_hover_color' => '#f49c41',
        'readmore_button_border_width' => '2',
        'animation_names' => '',
        'readmore_button_margin_top' => '0',
        'font_icon_name' => '',
        'select_font_icon_type' => '',
        'readmore_button_padding_t_b' => '7',
        'readmore_button_padding_l_r' => '20',
        'readmore_button_font_size' => '13',
        'readmore_button_font_weight' => 'normal',
        'readmore_button_font_style' => 'normal',
        'readmore_button_letter_spacing' => '2',
        'readmore_button_border_radius' => '0',
      )); ?>
      <script type='text/javascript'>
        jQuery(document).ready(function($) {
        jQuery('.button_color_pickr').each(function(){
          jQuery(this).wpColorPicker();
        }); 
      });
      </script> 
      <div class="input-elements-wrapper"> 
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_text'); ?>"><?php  _e('Button Text',$petshop_plugin_name); ?></label>
          <input id="<?php echo $this->get_field_id('readmore_button_text'); ?>" name="<?php echo $this->get_field_name('readmore_button_text'); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['readmore_button_text']) ?>" />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_color'); ?>"><?php _e('Button BG Color',$petshop_plugin_name); ?> </label>
          <input id="<?php echo $this->get_field_id('readmore_button_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_color']) ?>"  />
        </p>
         <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_border_color'); ?>">  <?php  _e('Button Border Color',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_border_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_border_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_border_color']) ?>" />
        </p>
        <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('readmore_button_text_color'); ?>"><?php  _e('Button Text Color',$petshop_plugin_name); ?></label>
          <input id="<?php echo $this->get_field_id('readmore_button_text_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_text_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_text_color']) ?>" />
        </p>
      </div>
      <div class="input-elements-wrapper"> 
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_hover_color'); ?>"><?php  _e('Button Hover BG Color',$petshop_plugin_name); ?></label>
          <input id="<?php echo $this->get_field_id('readmore_button_hover_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_hover_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_hover_color']) ?>"  />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_border_hover_color'); ?>"> <?php _e('Button Hover Border Color',$petshop_plugin_name); ?> </label>
          <input id="<?php echo $this->get_field_id('readmore_button_border_hover_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_border_hover_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_border_hover_color']) ?>"  />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_hover_link_color'); ?>"> <?php _e('Button Hover Text Color',$petshop_plugin_name); ?> </label>
          <input id="<?php echo $this->get_field_id('readmore_button_hover_link_color'); ?>" name="<?php echo $this->get_field_name('readmore_button_hover_link_color'); ?>" type="text" class="button_color_pickr" value="<?php echo esc_attr($instance['readmore_button_hover_link_color']) ?>"  />
        </p>
        
      </div>
      <div class="input-elements-wrapper">
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_border_width'); ?>">  <?php  _e('Button Border Width',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_border_width'); ?>" name="<?php echo $this->get_field_name('readmore_button_border_width'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_border_width']) ?>" />
          <small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_border_radius'); ?>">  <?php  _e('Button Border Radius',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_border_radius'); ?>" name="<?php echo $this->get_field_name('readmore_button_border_radius'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_border_radius']) ?>" />
          <small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_padding_t_b'); ?>">  <?php  _e('Button Padding Top & Bottom',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_padding_t_b'); ?>" name="<?php echo $this->get_field_name
          ('readmore_button_padding_t_b'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_padding_t_b']) ?>" />
          <small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('readmore_button_padding_l_r'); ?>">  <?php  _e('Button Padding Left & Right',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_padding_l_r'); ?>" name="<?php echo $this->get_field_name('readmore_button_padding_l_r'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_padding_l_r']) ?>" />
          <small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
      </div>
      <div class="input-elements-wrapper">
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_font_size'); ?>">  <?php  _e('Button Font Size',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_font_size'); ?>" name="<?php echo $this->get_field_name('readmore_button_font_size'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_font_size']) ?>" /><small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_font_weight') ?>"> <?php _e('Button Font Weight',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('readmore_button_font_weight') ?>" name="<?php echo $this->get_field_name('readmore_button_font_weight') ?>">
            <option value="normal" <?php selected('normal', $instance['readmore_button_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
            <option value="bold" <?php selected('bold', $instance['readmore_button_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
          </select>
        </p>
         <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_font_style') ?>"> <?php _e('Button Font Style',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('readmore_button_font_style') ?>" name="<?php echo $this->get_field_name('readmore_button_font_style') ?>">
            <option value="normal" <?php selected('normal', $instance['readmore_button_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
            <option value="italic" <?php selected('italic', $instance['readmore_button_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
          </select>
        </p>
        <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('readmore_button_letter_spacing'); ?>">  <?php  _e('Button Letter Spacing',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_letter_spacing'); ?>" name="<?php echo $this->get_field_name('readmore_button_letter_spacing'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_letter_spacing']) ?>" /><small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_margin_top'); ?>"><?php  _e('Margin Top',$petshop_plugin_name); ?></label>
          <input id="<?php echo $this->get_field_id('readmore_button_margin_top'); ?>" name="<?php echo $this->get_field_name
          ('readmore_button_margin_top'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_margin_top']) ?>" /><small><?php _e('px',$petshop_plugin_name) ?></small>
        </p>
      </div>
      <div class="input-elements-wrapper">
        <p class="one_fourth img_radio_select">
          <label for="<?php echo $this->get_field_id('readmore_button_alignment') ?>">  <?php _e('Button Alignment',$petshop_plugin_name) ?>  </label>
          <label>
            <input type="radio" id="<?php echo $this->get_field_id( 'readmore_button_alignment' ); ?>" name="<?php echo $this->get_field_name( 'readmore_button_alignment' ); ?>" value="center" <?php checked( $instance['readmore_button_alignment'], 'center' ); ?>>  <img alt="Align Center" title="Align Center"  src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/button_center.png' ?>">
          </label>
          <label>
            <input type="radio" id="<?php echo $this->get_field_id( 'readmore_button_alignment' ); ?>" name="<?php echo $this->get_field_name( 'readmore_button_alignment' ); ?>" value="left" <?php checked( $instance['readmore_button_alignment'], 'left' ); ?>> <img alt="Align Left" title="Align Left" src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/button_left.png' ?>">
          </label>
          <label> 
            <input type="radio" id="<?php echo $this->get_field_id( 'readmore_button_alignment' ); ?>" name="<?php echo $this->get_field_name( 'readmore_button_alignment' ); ?>" value="right" <?php checked( $instance['readmore_button_alignment'], 'right' ); ?>>  <img alt="Align Right" title="Align Right"  src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/button_right.png' ?>">
          </label>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_link'); ?>"><?php  _e('Destination URL',$petshop_plugin_name); ?></label>
          <input id="<?php echo $this->get_field_id('readmore_button_link'); ?>" name="<?php echo $this->get_field_name
          ('readmore_button_link'); ?>" type="text" class="widefat" value="<?php echo esc_url($instance['readmore_button_link']) ?>"  />
        </p> 
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_new_window') ?>"> <?php _e('Open In New Window',$petshop_plugin_name) ?>
          </label>
          <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("readmore_button_new_window"); ?>" name="<?php echo $this->get_field_name("readmore_button_new_window"); ?>"<?php checked( (bool) $instance["readmore_button_new_window"], true ); ?> />
        </p>
        
      </div>
    <div class="input-elements-wrapper">
      <p>
        <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
        <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
      </p> 
    </div> 
<?php }
} 
petshop_kaya_register_widgets('readmore-button', __FILE__);
?>