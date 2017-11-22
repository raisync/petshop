<?php
  class Petshop_Custom_menu_Widget extends WP_Widget
  {   
  function __construct()
  {
    parent::__construct( 'nav_menu',
    __('Petshop-Custom Menu','petshop'),
    array('description' => __('This video will show  custom menus','petshop')  )
    );
  }
  function widget( $args, $instance ){
    $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

    if ( !$nav_menu )
    return;
    $rand = rand(1,100); ?>
    <style type="text/css">
    .custom_nav_<?php echo $rand; ?>{
        border-top: 1px solid <?php echo $instance['custom_top_and_bottom_border_color']; ?>;
        border-bottom: 1px solid <?php echo $instance['custom_top_and_bottom_border_color']; ?>;
        }
        .custom_nav_<?php echo $rand; ?> ul li a{
         color: <?php echo $instance['menu_link_color']; ?>!important;
        }
        .custom_nav_<?php echo $rand; ?> ul li a:hover{
        color: <?php echo $instance['menu_link_hover_color']; ?>!important;
        }
    </style>
    <?php  echo $args['before_widget'];
    $nav_menu_args = array(
    'fallback_cb' => '',
    'menu'  => $nav_menu
    );
    echo '<div class="custom_menu_items '.$instance['menu_styles'].' custom_nav_'.$rand.'">';
      wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
    echo '</div>';
    echo $args['after_widget'];
  }
  function form( $instance ){
    $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
    $menu_styles = $instance['menu_styles']  ? $instance['menu_styles'] : 'horizontal';
    $menus = wp_get_nav_menus();
  ?>
  <p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
    <?php
    if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
    $url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
    } else {
    $url = admin_url( 'nav-menus.php' );
    }
    ?>
    <?php echo sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_attr( $url ) ); ?>
  </p>
  <script type='text/javascript'>
      (function( $ ) {
        "use strict";
          $('.menu_color_pickr').each(function(){
            $(this).wpColorPicker();
          });
      })(jQuery);
  </script>
  <div class="input-elements-wrapper nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
          <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
          <?php foreach ( $menus as $menu ) : ?>
          <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
          <?php echo esc_html( $menu->name ); ?>
          </option>
        <?php endforeach; ?>
        </select>
    </p>
   <p class="one_fourth">
            <label for="<?php echo $this->get_field_id('menu_styles') ?>"><?php _e('Menu styles','petshop')?></label>
              <select id="<?php echo $this->get_field_id('menu_styles') ?>" name="<?php echo $this->get_field_name('menu_styles') ?>">
        <option value="horizontal">
         <?php _e( 'horizontal' ); ?></option>
        <option value="vertical">
          <?php _e( 'vertical' ); ?></option>
      </select>
        </p>
  </div>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('menu_link_color') ?>"><?php _e('Menu Link Color','petshop')?></label>
      <input type="text" class="menu_color_pickr" id="<?php echo $this->get_field_id('menu_link_color') ?>" value="<?php echo esc_attr($instance['menu_link_color']) ?>" name="<?php echo $this->get_field_name('menu_link_color') ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('menu_link_hover_color') ?>"><?php _e('Menu Link Hover Color','petshop')?></label>
      <input type="text" class="menu_color_pickr" id="<?php echo $this->get_field_id('menu_link_hover_color') ?>" value="<?php echo esc_attr($instance['menu_link_hover_color']) ?>" name="<?php echo $this->get_field_name('menu_link_hover_color') ?>" />
    </p>
     <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('custom_top_and_bottom_border_color') ?>"><?php _e('Menu Top&bottom border Color','petshop')?></label>
      <input type="text" class="menu_color_pickr" id="<?php echo $this->get_field_id('custom_top_and_bottom_border_color') ?>" value="<?php echo esc_attr($instance['custom_top_and_bottom_border_color']) ?>" name="<?php echo $this->get_field_name('custom_top_and_bottom_border_color') ?>" />
    </p>
  </div>
  <?php }
  }
petshop_kaya_register_widgets('custom-menu', __FILE__);
?>