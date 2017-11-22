<?php
/* iconbox */
class Petshop_Iconbox_Widget extends WP_Widget {
  public function __construct() {
     global $petshop_plugin_name;
   // widget actual processes
   parent::__construct(
      'icon-box', // Base ID
      ucfirst($petshop_plugin_name).' '.__(' - Icon Box', $petshop_plugin_name), // Name
   array( 'description' => __( 'Use this widget to create icon box with text or Font icons',  $petshop_plugin_name)) // Args
 );
 }
public function widget( $args, $instance ) {
  global $petshop_plugin_name;
  echo $args['before_widget'];
  $instance = wp_parse_args( $instance, array(
     'title' => __('Icon Box Title',$petshop_plugin_name),
      'title_font_weight'=>__('bold',$petshop_plugin_name),
      'iconbox_text' => '',
      'iconbox_bg_color' => '',
      'description' => __('We strive to leave the tiniest footprint we can. Thats why our goods are designed and manufactured.',$petshop_plugin_name),
      'readmore_button_bg' => '',
      'readmore_text' => '',
      'readmore_link_color' => '#3f51b5',
      'reamore_hover_bg_color' => '',  
      'reamore_link_hover_color' => '#333',
      'reamore_padding_t_b' => '0',
      'reamore_padding_l_r' => '0',
      'readmore_border_color' => '',
      'readmore_hover_border_color' => '',
      'readmore_letter_space' => '1',
      'readmore_font_size' => '13',
      'link' => '#',
      'icon_bg_color' => '',
      'icon_padding' => '',
      'icon_color' => '#3f51b5',
      'icon_border_radius' => '0',
      'title_color' => '#333333',
      'title_hover_color' => '#3f51b5',
      'description_color' => '#737373',
      'iconbox_align' => 'center',
      'awesome_icon_name' => 'fa-cog',
      'new_window'=>'',
      'iconbox_font_size' => '50',
      'iconbox_link_disable' => '',
      'animation_names' => '',
      'icon_url_id' => '',
      'font_icon_name' => 'cog',
      'select_font_icon_type' => __('awesome_fonts',$petshop_plugin_name),
      'icon_url' => '',
      'select_display_icon_type' => __('font_icons',$petshop_plugin_name),
      'title_letter_space' => '1',
      'description_letter_space' => '0',
      'title_font_style' => __('normal',$petshop_plugin_name),
      'title_font_size' => '22',
      'description_font_weight' => __('normal',$petshop_plugin_name),
      'description_font_style' => __('normal',$petshop_plugin_name),
      'iconbox_border_color' => '#e5e5e5',
      'description_font_size' => '14',
      'iconbox_padding_t_b' => '60',
      'iconbox_padding_l_r' => '30',
      'icon_border_color' => '',
      'icon_border' => '0',
    ) );
    if( $instance['select_font_icon_type'] == 'awesome_fonts' ){
      wp_enqueue_style('fontawesome', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/fontawesome/style.css',false, '', 'all');
    }
    if( $instance['select_font_icon_type'] == 'generaic_icons' ){
      wp_enqueue_style('genericons', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/genericons/style.css',false, '', 'all');
    }
    if( $instance['select_font_icon_type'] == 'elegentline_icons' ){
      wp_enqueue_style('elegantline', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/elegantline/style.css',false, '', 'all');
    }
    if( $instance['select_font_icon_type'] == 'icomoon_icons' ){
      wp_enqueue_style('icomoon', constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'/icons/icomoon/style.css',false, '', 'all');
    }
  $iconbox_rand = rand(1,500);
  $upload_img_id = wp_get_attachment_image_src($instance['icon_url_id'], "full");
  $icon_left_align = ( $instance['iconbox_align'] == 'none' ) ? 'text-align:center;':'';
  $icon_left_align = ( $instance['iconbox_align'] == 'none' ) ? 'text-align:left;':'';
  $iconbox_data = array(
      'font-size' => $instance['iconbox_font_size'].'px',
      'color' => $instance['icon_color'].'',
      'padding' => $instance['icon_padding'].'px',
      'border' => $instance['icon_border'].'px solid '.$instance['icon_border_color'],
      'border-radius' => $instance['icon_border_radius'].'px',
      'width' => $instance['iconbox_font_size'].'px',
      'height' => $instance['iconbox_font_size'].'px',
      'line-height' => $instance['iconbox_font_size'].'px',
      'text-align' => 'center',
  );
  $iconbox_styles =array();
  foreach ($iconbox_data as $key => $value) {
      $iconbox_styles[] = $key.':'.$value;
  }  
  $target_link = ( $instance['new_window'] == 'on' ) ? '_blank' : '_self';
  //$iconbox_icon_rotate_hover = ( $instance['iconbox_icon_rotate_hover'] == 'on') ? 'on' :'off';
  $iconbox_animation =   ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
  if( $instance['iconbox_align'] == 'center' ){
    $button_position = 'margin:0px auto;';
  }elseif( $instance['iconbox_align'] == 'right' ){
    $button_position = 'float:right;';
  }else{
    $button_position = 'float:left;';
  } 
  $bg_bolor = !empty($instance['iconbox_bg_color']) ? 'background-color:'.$instance['iconbox_bg_color'].';' : '';
  $icon_bg_bolor = !empty($instance['icon_bg_color']) ? 'background-color:'.$instance['icon_bg_color'].';' : '';
  $border_color = !empty($instance['iconbox_border_color']) ? 'border:1px solid '.$instance['iconbox_border_color'].';' : '';
  $padding = ( !empty($instance['iconbox_bg_color']) ||  !empty($instance['iconbox_border_color'] ) ) ? 'padding:'.$instance['iconbox_padding_t_b'].'px '.$instance['iconbox_padding_l_r'].'px;' : 'padding:0px;';
  ?>
  <div class="icon_box_wrapper <?php echo $iconbox_animation; ?>" style="<?php echo $bg_bolor; ?>" >
    <div class="description_box iconbox iconbox_<?php echo $instance['iconbox_align']; ?> iconbox-<?php echo $iconbox_rand; ?>" style="<?php echo $padding; ?> <?php echo $border_color; ?>" >
      <?php if($instance['iconbox_link_disable'] != 'on' &&  $instance['link']): ?>
        <a href="<?php echo $instance['link'] ?>" target="<?php echo $target_link; ?>">
      <?php endif; ?>
      <?php if( $instance['select_display_icon_type'] == 'image_icons' ){
        echo '<div class="icon_image iconbox_bg align'.$instance['iconbox_align'].'" style="'.$icon_bg_bolor.' '.implode('; ',$iconbox_styles).'">';
          echo '<div class="iconbox_iconbg_conatiner " style="">';
            echo '<img src="'.$instance['icon_url'].'"  style="'. $icon_left_align .'"/>';
        echo '</div></div>';
      }else{ ?>
        <div class="iconbox_bg align<?php echo $instance['iconbox_align']; ?>" style="<?php echo $icon_bg_bolor.' '. $icon_left_align; ?> <?php  echo  implode('; ',$iconbox_styles); ?> ">
          <?php
          echo '<div class="iconbox_iconbg_conatiner" style="">';
            if( $instance['select_display_icon_type'] == 'font_icons' ){
              display_font_icons( $instance['font_icon_name'], $instance['select_font_icon_type'] );                
            }elseif( $instance['select_display_icon_type'] == 'letter_icons' ){
              echo '<div class="" style="">'. $instance['iconbox_text'].'</div>';
            }else{
              display_font_icons( $instance['font_icon_name'], $instance['select_font_icon_type'] );  
            }
          echo '</div>';
        echo '</div>';  
      } ?>      
      <?php if($instance['iconbox_link_disable'] != 'on' && $instance['link']): ?>
        </a>
      <?php endif; ?>
      <div class="description" style="">
        <?php if( trim(!empty( $instance['title']))){ ?>
        <?php if( $instance['link'] ){ ?>
          <a href="<?php echo esc_url($instance['link']); ?>" target="<?php echo $target_link; ?>" >
        <?php } ?>
        <h3 class="title_style1" data-hover-color="<?php echo $instance['title_hover_color']; ?>" style="line-height:<?php echo ceil(1.3* $instance['title_font_size']); ?>px; color:<?php echo $instance['title_color']; ?>; font-weight:<?php echo $instance['title_font_weight']; ?>; text-align:<?php echo $instance['iconbox_align']; ?>; letter-spacing:<?php echo $instance['title_letter_space'] ?>px; font-size:<?php echo $instance['title_font_size'] ?>px; font-style:<?php echo $instance['title_font_style'] ?>;"><?php echo $instance['title']; ?></h3>
        <?php if( $instance['link'] ){ ?> </a> <?php } } ?>
        <p style="color:<?php echo $instance['description_color']; ?>!important; text-align:<?php echo $instance['iconbox_align']; ?>; letter-spacing:<?php echo $instance['description_letter_space'] ?>px; font-size:<?php echo $instance['description_font_size'] ?>px; font-weight:<?php echo $instance['description_font_weight'] ?>; font-style:<?php echo $instance['description_font_style'] ?>"><?php echo $instance['description']; ?></p>
        <?php 
        $readmore_bg_color = $instance['readmore_button_bg'] ? 'background-color:'.$instance['readmore_button_bg'].';' : '';
        $readmore_border_color = $instance['readmore_border_color'] ? 'border:1px solid '.$instance['readmore_border_color'].';' : '';
        if( $instance['readmore_text'] ): echo '<a target="'.$target_link.'" data-hover-bg = "'.$instance['reamore_hover_bg_color'].'" data-hover-color = "'.$instance['reamore_link_hover_color'].'" data-hover-border = "'.$instance['readmore_hover_border_color'].'" style="'.$readmore_bg_color.' '.$readmore_border_color.' padding:'.$instance['reamore_padding_t_b'].'px '.$instance['reamore_padding_l_r'].'px; color:'.$instance['readmore_link_color'].'; font-size:'.$instance['readmore_font_size'].'px; letter-spacing:'.$instance['readmore_letter_space'].'px; '.$button_position.'" href="'.esc_url($instance['link']).'" class="readmore_button">'.esc_attr($instance['readmore_text']).'</a>'; endif;  ?>
      </div>
    </div>
  </div>
  <?php 
  echo $args['after_widget'];
 }
  public function form( $instance ) {
    global $petshop_plugin_name;
    $instance = wp_parse_args( $instance, array(
        'title' => __('Icon Box Title',$petshop_plugin_name),
        'title_font_weight'=>__('bold',$petshop_plugin_name),
        'iconbox_text' => '',
        'iconbox_bg_color' => '',
        'description' => __('We strive to leave the tiniest footprint we can. Thats why our goods are designed and manufactured.',$petshop_plugin_name),
        'readmore_button_bg' => '',
        'readmore_text' => '',
        'readmore_link_color' => '#3f51b5',
        'reamore_hover_bg_color' => '',  
        'reamore_link_hover_color' => '#333',
        'reamore_padding_t_b' => '0',
        'reamore_padding_l_r' => '0',
        'readmore_border_color' => '',
        'readmore_hover_border_color' => '',
        'readmore_letter_space' => '1',
        'readmore_font_size' => '13',
        'link' => '#',
        'icon_bg_color' => '',
        'icon_padding' => '',
        'icon_border_radius' => '0',
        'icon_color' => '#3f51b5',
        'title_color' => '#333333',
        'title_hover_color' => '#3f51b5',
        'description_color' => '#737373',
        'iconbox_align' => 'center',
        'awesome_icon_name' => 'fa-cog',
        'new_window'=>'',
        'iconbox_font_size' => '50',
        'iconbox_link_disable' => '',
        'animation_names' => '',
        'icon_url_id' => '',
        'font_icon_name' => 'cog',
        'select_font_icon_type' => __('awesome_fonts',$petshop_plugin_name),
        'icon_url' => '',
        'select_display_icon_type' => __('font_icons',$petshop_plugin_name),
        'title_letter_space' => '1',
        'description_letter_space' => '0',
        'title_font_style' => __('normal',$petshop_plugin_name),
        'title_font_size' => '22',
        'description_font_weight' => __('normal',$petshop_plugin_name),
        'description_font_style' => __('normal',$petshop_plugin_name),
        'iconbox_border_color' => '#e5e5e5',
        'description_font_size' => '14',
        'iconbox_padding_t_b' => '60',
        'iconbox_padding_l_r' => '30',
        'icon_border_color' => '',
        'icon_border' => '0',
        'readmore_letter_space' => '1',
    ) );
    $font_sizes = array(16,24,32,48,64,80,98,128);   ?> 
  <script type="text/javascript">
      (function($) {
      "use strict";
      $(function() {
      // Color Pickr 
      $('.iconbox_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
  // Selecet icons type
   $("#<?php echo $this->get_field_id('select_display_icon_type') ?>").change(function () {
      $("#<?php echo $this->get_field_id('select_font_icon_type') ?>").parent().hide();
      $("#<?php echo $this->get_field_id('font_icon_name') ?>").hide();
      $("#<?php echo $this->get_field_id('icon_url'); ?>").parent().hide();
      $("#<?php echo $this->get_field_id('iconbox_text'); ?>").parent().hide();
      $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(0).show();
      $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(1).show();
      $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(2).show();
      $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").show();
      $(".<?php echo $this->get_field_id('icon_color'); ?>").show();

     var select_font_icons_type = $("#<?php echo $this->get_field_id('select_display_icon_type') ?> option:selected").val(); 
      switch(select_font_icons_type){
        case 'font_icons':
          $("#<?php echo $this->get_field_id('select_font_icon_type') ?>").parent().show();
          $("#<?php echo $this->get_field_id('font_icon_name') ?>").show();
          $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(4).removeClass('one_fifth').addClass('one_fifth_last');
          $(".<?php echo $this->get_field_id('icon_border'); ?> ").addClass('one_fourth_last').removeClass('one_fourth');
          $(".<?php echo $this->get_field_id('icon_border_color'); ?> ").css('clear','both');
          $(".<?php echo $this->get_field_id('icon_border_radius'); ?> ").addClass('one_fourth').removeClass('one_fourth_last');
          $(".<?php echo $this->get_field_id('iconbox_align'); ?> ").removeClass('one_fourth_last').removeClass('one_fourth');
          break;
        case 'image_icons':
           $("#<?php echo $this->get_field_id('icon_url'); ?>").parent().show();
           $(".<?php echo $this->get_field_id('icon_color'); ?>").hide();
           $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").hide();
           $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(0).hide();
           $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(1).hide();
           $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(2).hide();
           $(".<?php echo $this->get_field_id('iconbox_font_size'); ?> .one_fifth_last").removeClass('one_fifth_last').addClass('one_fifth');
           $(".<?php echo $this->get_field_id('icon_border'); ?> ").removeClass('one_fourth_last').addClass('one_fourth');
           $(".<?php echo $this->get_field_id('icon_border_color'); ?> ").removeAttr('style');
           $(".<?php echo $this->get_field_id('icon_border_radius'); ?> ").removeClass('one_fourth').addClass('one_fourth_last');
           $(".<?php echo $this->get_field_id('iconbox_align'); ?> ").removeClass('one_fourth_last').addClass('one_fourth');
           break;
        case 'letter_icons':
          $("#<?php echo $this->get_field_id('iconbox_text'); ?>").parent().show();
          $(".<?php echo $this->get_field_id('iconbox_font_size'); ?>").find('p').eq(4).removeClass('one_fifth').addClass('one_fifth_last');
           $(".<?php echo $this->get_field_id('icon_border'); ?> ").addClass('one_fourth_last').removeClass('one_fourth');
           $(".<?php echo $this->get_field_id('icon_border_color'); ?> ").css('clear','both');
           $(".<?php echo $this->get_field_id('icon_border_radius'); ?> ").addClass('one_fourth').removeClass('one_fourth_last');
           $(".<?php echo $this->get_field_id('iconbox_align'); ?> ").removeClass('one_fourth_last').removeClass('one_fourth');
          break;    
      }
    }).change(); 
    });
  })(jQuery);
  </script>
  <div class="input-elements-wrapper"> 
    <p>
      <label for="<?php echo $this->get_field_id('select_display_icon_type') ?>">  <?php _e('Select Icon Type',$petshop_plugin_name) ?> </label>
        <select id="<?php echo $this->get_field_id('select_display_icon_type') ?>" class="iconbox_widget_select" name="<?php echo $this->get_field_name
        ('select_display_icon_type') ?>">
        <option value="font_icons" <?php selected('font_icons', $instance['select_display_icon_type']) ?>> <?php esc_html_e('Font Type Icons', $petshop_plugin_name) ?> </option>
        <option value="image_icons" <?php selected('image_icons', $instance['select_display_icon_type']) ?>> <?php esc_html_e('Image Icon', $petshop_plugin_name) ?> </option>
        <option value="letter_icons" <?php selected('letter_icons', $instance['select_display_icon_type']) ?>> <?php esc_html_e('Letter Icons', $petshop_plugin_name) ?> </option>
      </select>
    </p>
    <?php select_font_icons($this->get_field_id('select_font_icon_type'), $this->get_field_name('select_font_icon_type'), $instance['select_font_icon_type']); ?>
    <?php kaya_font_icons($this->get_field_id('font_icon_name'), $this->get_field_name('font_icon_name'), $instance['font_icon_name']); ?>
    <p>
      <?php $i = rand(1,100); ?>
      <img class="custom_media_image_<?php echo $i; ?>" src="<?php if(!empty($instance['icon_url'])){echo $instance['icon_url'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
      <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('icon_url'); ?>" id="<?php echo $this->get_field_id('icon_url'); ?>" value="<?php echo $instance['icon_url']; ?>">
      <input type="hidden" class="small-text custom_media_url_id_<?php echo $i; ?>" name="<?php echo $this->get_field_name('icon_url_id'); ?>" id="<?php echo $this->get_field_id('icon_url_id'); ?>" value="<?php echo $instance['icon_url_id']; ?>">
      <input type="button" value="<?php _e( 'Upload Image', $petshop_plugin_name); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
      <script type="text/javascript">
      jQuery(document).ready( function(){
        jQuery('.custom_media_upload_<?php echo $i; ?>').click(function(e) {
          e.preventDefault();
          var custom_uploader = wp.media({
            title: 'Upload Icon',
            button: {
            text: 'Upload Icon'
          },
           multiple: false  // Set this to true to allow multiple files to be selected
          })
          .on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('.custom_media_image_<?php echo $i; ?>').attr('src', attachment.url);
            jQuery('.custom_media_url_id_<?php echo $i; ?>').val(attachment.id);
            jQuery('.custom_media_url_<?php echo $i; ?>').val(attachment.url);
          })
          .open();
          });
      });
      </script>
    </p>
    <p class="clearfix">
      <label for="<?php echo $this->get_field_id('iconbox_text') ?>"> <?php _e('Icon Text',$petshop_plugin_name) ?> </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('iconbox_text') ?>" name="<?php echo $this->get_field_name('iconbox_text') ?>" value="<?php echo esc_attr($instance['iconbox_text']) ?>" />
      <small><?php _e('Ex: A',$petshop_plugin_name); ?></small>
    </p>
  </div>
  <div class="input-elements-wrapper <?php echo $this->get_field_id('iconbox_font_size') ?>"> 
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('iconbox_bg_color') ?>">  <?php _e('Iconbox Container BG Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('iconbox_bg_color') ?>" name="<?php echo $this->get_field_name('iconbox_bg_color') ?>" value="<?php echo esc_attr($instance['iconbox_bg_color']) ?>" />
    </p> 
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('iconbox_border_color') ?>">  <?php _e('Iconbox Container Border Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('iconbox_border_color') ?>" name="<?php echo $this->get_field_name('iconbox_border_color') ?>" value="<?php echo esc_attr($instance['iconbox_border_color']) ?>" />
    </p> 
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('iconbox_padding_t_b') ?>">  <?php _e('Iconbox Container Padding',$petshop_plugin_name) ?>  </label>
      <?php _e('Top & Bottom',$petshop_plugin_name) ?> &nbsp;<input type="text" class="small-text" id="<?php echo $this->get_field_id('iconbox_padding_t_b') ?>" name="<?php echo $this->get_field_name('iconbox_padding_t_b') ?>" value="<?php echo esc_attr($instance['iconbox_padding_t_b']) ?>" />
      <?php _e('Left & Right',$petshop_plugin_name) ?> &nbsp;<input type="text" class="small-text" id="<?php echo $this->get_field_id('iconbox_padding_l_r') ?>" name="<?php echo $this->get_field_name('iconbox_padding_l_r') ?>" value="<?php echo esc_attr($instance['iconbox_padding_l_r']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
  </div>
  <div class="input-elements-wrapper"> 
    <p class="one_fourth <?php echo $this->get_field_id('icon_bg_color') ?>">
      <label for="<?php echo $this->get_field_id('icon_bg_color') ?>">  <?php _e('Icon Background Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('icon_bg_color') ?>" name="<?php echo $this->get_field_name('icon_bg_color') ?>" value="<?php echo esc_attr($instance['icon_bg_color']) ?>" />
    </p>
    <p class="one_fourth <?php echo $this->get_field_id('icon_color') ?>">
      <label for="<?php echo $this->get_field_id('icon_color') ?>">  <?php _e('Icon Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('icon_color') ?>" name="<?php echo $this->get_field_name('icon_color') ?>" value="<?php echo esc_attr($instance['icon_color']) ?>" />
    </p>
     <p class="one_fourth <?php echo $this->get_field_id('iconbox_font_size') ?>">
      <label for="<?php echo $this->get_field_id('iconbox_font_size') ?>">  <?php _e('Icon Size',$petshop_plugin_name)?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('iconbox_font_size') ?>" name="<?php echo $this->get_field_name('iconbox_font_size') ?>" value="<?php echo esc_attr($instance['iconbox_font_size']) ?>" />
      <small><?php _e('px',$petshop_plugin_name); ?></small>
    </p> 
     <p class="one_fourth_last  <?php echo $this->get_field_id('icon_border') ?>">
      <label for="<?php echo $this->get_field_id('icon_border') ?>">  <?php _e('Icon Border',$petshop_plugin_name)?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('icon_border') ?>" name="<?php echo $this->get_field_name('icon_border') ?>" value="<?php echo esc_attr($instance['icon_border']) ?>" />
      <small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>     
    <p class="one_fourth <?php echo $this->get_field_id('icon_border_color') ?>" style="clear:both;">
      <label for="<?php echo $this->get_field_id('icon_border_color') ?>">  <?php _e('Icon Border Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('icon_border_color') ?>" name="<?php echo $this->get_field_name('icon_border_color') ?>" value="<?php echo esc_attr($instance['icon_border_color']) ?>" />
     
    <p class="one_fourth <?php echo $this->get_field_id('icon_border_radius') ?>">
      <label for="<?php echo $this->get_field_id('icon_border_radius') ?>">  <?php _e('Icon Border Radius',$petshop_plugin_name)?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('icon_border_radius') ?>" name="<?php echo $this->get_field_name('icon_border_radius') ?>" value="<?php echo esc_attr($instance['icon_border_radius']) ?>" />
      <small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>     
    <p class="one_fourth <?php echo $this->get_field_id('icon_padding') ?>">
      <label for="<?php echo $this->get_field_id('icon_padding') ?>">  <?php _e('Icon Padding',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('icon_padding') ?>" name="<?php echo $this->get_field_name('icon_padding') ?>" value="<?php echo esc_attr($instance['icon_padding']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth_last img_radio_select icon_alignment <?php echo $this->get_field_id('iconbox_align') ?>" >
      <label for="<?php echo $this->get_field_id('iconbox_align') ?>">  <?php _e('Icon Position',$petshop_plugin_name)  ?>  </label>
      <label>
        <input type="radio" id="<?php echo $this->get_field_id( 'iconbox_align' ); ?>" name="<?php echo $this->get_field_name( 'iconbox_align' ); ?>" value="center" <?php checked( $instance['iconbox_align'], 'center' ); ?>> 
        <img alt="Align Center" title="Align Center" src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_center.png' ?>">
      </label>
      <label>
        <input type="radio" id="<?php echo $this->get_field_id( 'iconbox_align' ); ?>" name="<?php echo $this->get_field_name( 'iconbox_align' ); ?>" value="left" <?php checked( $instance['iconbox_align'], 'left' ); ?>> <img alt="Align Left" title="Align Left" src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_left.png' ?>">
      </label>
      <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'iconbox_align' ); ?>" name="<?php echo $this->get_field_name( 'iconbox_align' ); ?>" value="right" <?php checked( $instance['iconbox_align'], 'right' ); ?>>  <img alt="Align Right" title="Align Right"  src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_right.png' ?>">
      </label>
      <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'iconbox_align' ); ?>" name="<?php echo $this->get_field_name( 'iconbox_align' ); ?>" value="none" <?php checked( $instance['iconbox_align'], 'none' ); ?>>  <img alt="Align Right" title="Align None"  src="<?php echo constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_none.png' ?>">
      </label>
    </p>
    <p class="one_fourth" style="clear:both;">
      <label for="<?php echo $this->get_field_id('iconbox_link_disable') ?>">  <?php _e('Icon Link Disable',$petshop_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("iconbox_link_disable"); ?>" name="<?php echo $this->get_field_name("iconbox_link_disable"); ?>"<?php checked( (bool) $instance["iconbox_link_disable"], true ); ?> />
    </p>
  </div>
  <div class="input-elements-wrapper fields_bottom_border">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title') ?>">  <?php _e('Title',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr($instance['title']) ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_font_size') ?>">  <?php _e('Title Font Size',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('title_font_size') ?>" name="<?php echo $this->get_field_name('title_font_size') ?>" value="<?php echo esc_attr($instance['title_font_size']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_letter_space') ?>">  <?php _e('Title Letter Space',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('title_letter_space') ?>" name="<?php echo $this->get_field_name('title_letter_space') ?>" value="<?php echo esc_attr($instance['title_letter_space']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth_last">
      <label for="<?php echo $this->get_field_id('title_font_style') ?>"> <?php _e('Title Font Style',$petshop_plugin_name) ?></label>
      <select id="<?php echo $this->get_field_id('title_font_style') ?>" name="<?php echo $this->get_field_name('title_font_style') ?>">
        <option value="normal" <?php selected('normal', $instance['title_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
        <option value="italic" <?php selected('italic', $instance['title_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
      </select>
    </p>
  </div>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Title Font Weight',$petshop_plugin_name) ?></label>
      <select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name('title_font_weight') ?>">
        <option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
        <option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
      </select>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_color') ?>">  <?php _e('Title Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('title_color') ?>" name="<?php echo $this->get_field_name('title_color') ?>" value="<?php echo esc_attr($instance['title_color']) ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('title_hover_color') ?>">  <?php _e('Title Hover Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('title_hover_color') ?>" name="<?php echo $this->get_field_name('title_hover_color') ?>" value="<?php echo esc_attr($instance['title_hover_color']) ?>" />
    </p>
  </div>
  <div class="input-elements-wrapper">  
    <p class="two_fourth">
      <label for="<?php echo $this->get_field_id('description') ?>">  <?php  _e('Description' ,$petshop_plugin_name); ?>  </label>
      <textarea type="text" class="widefat" name="<?php echo $this->get_field_name('description') ?>" id="<?php echo $this->get_field_id('description') ?>" ><?php echo esc_attr($instance['description']) ?></textarea>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('description_font_size') ?>">  <?php _e('Description Font Size',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('description_font_size') ?>" name="<?php echo $this->get_field_name('description_font_size') ?>" value="<?php echo esc_attr($instance['description_font_size']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth_last">
      <label for="<?php echo $this->get_field_id('description_letter_space') ?>">  <?php _e('Description Letter Space',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('description_letter_space') ?>" name="<?php echo $this->get_field_name('description_letter_space') ?>" value="<?php echo esc_attr($instance['description_letter_space']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
  </div>
  <div class="input-elements-wrapper"> 
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('description_font_style') ?>"> <?php _e('Description Font Style',$petshop_plugin_name) ?></label>
      <select id="<?php echo $this->get_field_id('description_font_style') ?>" name="<?php echo $this->get_field_name('description_font_style') ?>">
        <option value="normal" <?php selected('normal', $instance['description_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
        <option value="italic" <?php selected('italic', $instance['description_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
      </select>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('description_font_weight') ?>"> <?php _e('Description Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('description_font_weight') ?>" name="<?php echo $this->get_field_name('description_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['description_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['description_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('description_color') ?>">  <?php _e('Description Color',$petshop_plugin_name) ?>  </label>
      <input type="text"  class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('description_color') ?>" name="<?php echo $this->get_field_name('description_color') ?>" value="<?php echo esc_attr($instance['description_color']) ?>" />
    </p>
  </div>
  <div class="input-elements-wrapper fields_bottom_border">  
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('readmore_text') ?>">  <?php _e('Readmore Button Text',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('readmore_text') ?>" name="<?php echo $this->get_field_name('readmore_text') ?>" value="<?php echo esc_attr($instance['readmore_text']) ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('readmore_button_bg') ?>">  <?php _e('Readmore Button BG Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('readmore_button_bg') ?>" name="<?php echo $this->get_field_name('readmore_button_bg') ?>" value="<?php echo esc_attr($instance['readmore_button_bg']) ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('readmore_link_color') ?>">  <?php _e('Readmore Button Link Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('readmore_link_color') ?>" name="<?php echo $this->get_field_name('readmore_link_color') ?>" value="<?php echo esc_attr($instance['readmore_link_color']) ?>" />
    </p>
     <p class="one_fourth_last">
      <label for="<?php echo $this->get_field_id('readmore_border_color') ?>">  <?php _e('Readmore Button Border Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('readmore_border_color') ?>" name="<?php echo $this->get_field_name('readmore_border_color') ?>" value="<?php echo esc_attr($instance['readmore_border_color']) ?>" />
    </p>
    <p class="one_fourth" style="clear:both;">
      <label for="<?php echo $this->get_field_id('reamore_hover_bg_color') ?>">  <?php _e('Readmore Button Hover BG Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('reamore_hover_bg_color') ?>" name="<?php echo $this->get_field_name('reamore_hover_bg_color') ?>" value="<?php echo esc_attr($instance['reamore_hover_bg_color']) ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('reamore_link_hover_color') ?>">  <?php _e('Readmore Button Link Hover Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('reamore_link_hover_color') ?>" name="<?php echo $this->get_field_name('reamore_link_hover_color') ?>" value="<?php echo esc_attr($instance['reamore_link_hover_color']) ?>" />
    </p>
     <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('readmore_hover_border_color') ?>">  <?php _e('Readmore Button Hover Border Color',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat iconbox_color_pickr" id="<?php echo $this->get_field_id('readmore_hover_border_color') ?>" name="<?php echo $this->get_field_name('readmore_hover_border_color') ?>" value="<?php echo esc_attr($instance['readmore_hover_border_color']) ?>" />
    </p>
    <p class="one_fourth_last">
      <label for="<?php echo $this->get_field_id('readmore_font_size') ?>">  <?php _e('Readmore Button Font Size',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text" id="<?php echo $this->get_field_id('readmore_font_size') ?>" name="<?php echo $this->get_field_name('readmore_font_size') ?>" value="<?php echo esc_attr($instance['readmore_font_size']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth" style="clear:both;">
      <label for="<?php echo $this->get_field_id('readmore_letter_space') ?>">  <?php _e('Readmore Button Letter Space',$petshop_plugin_name) ?>  </label>
      <input type="text" class="small-text " id="<?php echo $this->get_field_id('readmore_letter_space') ?>" name="<?php echo $this->get_field_name('readmore_letter_space') ?>" value="<?php echo esc_attr($instance['readmore_letter_space']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
     <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('reamore_padding_t_b') ?>">  <?php _e('Readmore Button Padding',$petshop_plugin_name) ?>  </label>
      <?php _e('Top & Bottom',$petshop_plugin_name) ?> &nbsp;<input type="text" class="small-text" id="<?php echo $this->get_field_id('reamore_padding_t_b') ?>" name="<?php echo $this->get_field_name('reamore_padding_t_b') ?>" value="<?php echo esc_attr($instance['reamore_padding_t_b']) ?>" />
      <?php _e('Left & Right',$petshop_plugin_name) ?> &nbsp;<input type="text" class="small-text" id="<?php echo $this->get_field_id('reamore_padding_l_r') ?>" name="<?php echo $this->get_field_name('reamore_padding_l_r') ?>" value="<?php echo esc_attr($instance['reamore_padding_l_r']) ?>" />
      <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('link') ?>">  <?php _e('Link',$petshop_plugin_name) ?>  </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" name="<?php echo $this->get_field_name('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" />
      <small>  <?php _e('Ex:http://www.google.com',$petshop_plugin_name) ?>  </small> </p>
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('new_window') ?>">  <?php _e('Open in new window',$petshop_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("new_window"); ?>" name="<?php echo $this->get_field_name("new_window"); ?>"<?php checked( (bool) $instance["new_window"], true ); ?> />
    </p>
  </div>
  <div class="input-elements-wrapper"> 
    <p class="">
      <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
      <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
    </p>
  </div>
  <?php
  }
}
petshop_kaya_register_widgets('iconbox', __FILE__);
?>