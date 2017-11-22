<?php
  class Petshop_Social_Icons_Widget extends WP_Widget {
    public function __construct() { 
      global $petshop_plugin_name;
      // widget actual processes
      parent::__construct(
      $petshop_plugin_name.'-social-icons', // Base ID
      __('Petshop -Social Media Icons ', $petshop_plugin_name), // Name
      array( 'description' => __( 'Use this widget to create Font Awesome icons', $petshop_plugin_name ), ) // Args
      );
    }
    public function widget( $args, $instance ) {
      global $petshop_plugin_name;
      echo $args['before_widget'];
      $instance = wp_parse_args( $instance, array(
        'awesome_icon_name' => 'fa fa-facebook',
        'icon_bg_color'=>'',
        'icon_link_color' => '#ffffff',
        'icon_link_hover_color' =>'#f49c41',
        'icon_border_radius' => '100',
        'icon_border_color'=>'#313335',
        'link'  =>'#',
      ));  
      $social_rand=rand(1,100); ?>
      <style type="text/css">
        .social_media_icons<?php echo $social_rand; ?> a{
        color:<?php echo $instance['icon_link_color']; ?>!important;
        }
        .social_media_icons<?php echo $social_rand; ?> a:hover{
        color:<?php echo $instance['icon_link_hover_color']; ?>!important;
        }     
        .social_media_icons<?php echo $social_rand; ?> a{
        border: 2px solid <?php echo $instance['icon_border_color'] ?>;
        }
      </style>

      <div class="social_media_icons social_media_icons<?php echo $social_rand; ?>"> 
        <?php
        echo '<a href="'.esc_url($instance['link']).'" style="border-radius:'.$instance['icon_border_radius'].'%;background-color:'.$instance['icon_bg_color'].'"><i class="fa '.$instance['awesome_icon_name'].'" > </i></a>';
        ?>
      </div>
      <?php echo $args['after_widget'];
    }

    public function form( $instance ) {
      global $petshop_plugin_name;
      $instance = wp_parse_args( $instance, array(
        'awesome_icon_name' => 'fa fa-facebook',
        'icon_bg_color'=>'',
        'icon_link_color' => '#ffffff',
        'icon_link_hover_color' =>'#f49c41',
        'icon_border_radius' => '100',
        'icon_border_color'=>'#313335',
        'link' => '#',
      ) );
      ?>
      <script type='text/javascript'>
        (function( $ ) {
          "use strict";
          $('.pf_color_pickr').each(function(){
            $(this).wpColorPicker();
          });
        })(jQuery);
      </script>
      <div class="input-elements-wrapper">
        <p>
          <label for="<?php echo $this->get_field_id('awesome_icon_name') ?>">
          <?php _e('Awesome Icon Name',$petshop_plugin_name) ?>
          </label>
          <input type="text" class="widefat" id="<?php echo $this->get_field_id('awesome_icon_name') ?>" name="<?php echo $this->get_field_name('awesome_icon_name') ?>" value="<?php echo esc_attr($instance['awesome_icon_name']) ?>" />
          <small>
          <?php _e('Ex: fa-home, for More Awesome icons click',$petshop_plugin_name); ?>
          <a href='http://fontawesome.io/icons/' target='_blank'> click here </a></small> 
        </p>
      </div>
      <div class="input-elements-wrapper">
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('icon_bg_color') ?>">
          <?php _e('Icon Bg Color','') ?>
          </label>
          <input type="text" class="pf_color_pickr" id="<?php echo $this->get_field_id('icon_bg_color') ?>" name="<?php echo $this->get_field_name('icon_bg_color') ?>" value="<?php echo esc_attr($instance['icon_bg_color']) ?>" />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('icon_link_color') ?>">
          <?php _e('Icon Link Color','') ?>
          </label>
          <input type="text" class="pf_color_pickr" id="<?php echo $this->get_field_id('icon_link_color') ?>" name="<?php echo $this->get_field_name('icon_link_color') ?>" value="<?php echo esc_attr($instance['icon_link_color']) ?>" />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('icon_link_hover_color') ?>">
          <?php _e('Icon Link Hover Color','') ?>
          </label>
          <input type="text" class="pf_color_pickr" id="<?php echo $this->get_field_id('icon_link_hover_color') ?>" name="<?php echo $this->get_field_name('icon_link_hover_color') ?>" value="<?php echo esc_attr($instance['icon_link_hover_color']) ?>" />
        </p>
      </div>
      <div class="input-elements-wrapper">
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('icon_border_radius') ?>">
          <?php _e('Icon Border Radius ( % )',$petshop_plugin_name) ?>
          </label>
          <input type="text" class="widefat" id="<?php echo $this->get_field_id('icon_border_radius') ?>" name="<?php echo $this->get_field_name('icon_border_radius') ?>" value="<?php echo esc_attr($instance['icon_border_radius']) ?>" />
          <small>
          <?php _e('Ex:10,20 <stont> Note: </stong>It applies only percentage(%)',$petshop_plugin_name) ?>
          </small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('icon_border_color') ?>">
          <?php _e('Icon Border Color','') ?>
          </label>
          <input type="text" class="pf_color_pickr" id="<?php echo $this->get_field_id('icon_border_color') ?>" name="<?php echo $this->get_field_name('icon_border_color') ?>" value="<?php echo esc_attr($instance['icon_border_color']) ?>" />
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('link') ?>">
          <?php _e('Link',$angel_plugin_name) ?>
          </label>
          <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" name="<?php echo $this->get_field_name('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" />
          <small>
          <?php _e('Ex:http://www.google.com',$angel_plugin_name) ?>
          </small> 
        </p>
      </div>
    <?php
    }
  }
  petshop_kaya_register_widgets('social-icons', __FILE__);
?>