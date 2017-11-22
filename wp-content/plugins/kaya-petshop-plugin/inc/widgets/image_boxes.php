<?php
class Petshop_Image_Box_Widget extends WP_Widget
  {
   function __construct()
   {
    global $petshop_plugin_name;
     parent::__construct( 'kaya-image-boxes',
      __('Petshop - Image Box',$petshop_plugin_name),
      array('description' => __('Displays image box with title and description',$petshop_plugin_name) )
      );
   }
   function widget( $args, $instance ){
      global $petshop_plugin_name;
      wp_enqueue_script('jquery.isotope');
      $instance = wp_parse_args($instance,array(
        'title' => __('Image Box Title',$petshop_plugin_name),
        'link' => '',
        'description' => __('Enter Description Here',$petshop_plugin_name),
        'callout_color' => '',
        'title_color' => '',
        'title_font_size' => '',
        'title_font_weight'=>__('normal',$petshop_plugin_name),
        'border_color' => '#6E6E6E',
        'imagebox_align' => '',
        'image_width' => '100',
        'image_height' => '100',
        'image_uri' => '',
        'image_radius' => '0',
        'image_icon_color' =>'',
        'image_icon_bg_color' =>'',
        'image_hover_bg_color' => '',
        'disable_hover_icon' =>'',
        'image_shadow' => '',
        'new_window' =>'',
        'animation_names' => '',
      ));
      echo $args['before_widget'];
      $image_shadow = ($instance['image_shadow'] == 'on') ? 'box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);' : '';
       $new_window = ($instance['new_window'] == 'on') ? '_blank' : '_self';
       $disable_hover_icon = ($instance['disable_hover_icon'] == 'on') ? 'on' : 'off';
       $imagebox_animation = $instance['animation_names'] ? 'wow '.$instance['animation_names'].'' : '';
        echo "<div class='". $imagebox_animation ." image-boxes'>";   ?>
          <div class="figure  align<?php echo $instance['imagebox_align']; ?>" style="<?php echo $image_shadow; ?> width:<?php echo $instance['image_width']; ?>px; border-radius:<?php echo $instance['image_radius']; ?>px;">
           <?php 
          if( !empty($instance['link'])){ 
             echo '<a href="'.$instance['link'].'" target="'.$new_window.'">'; 
           }  
          $default_img_url = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/image_box.png';
           if( $instance['image_uri'] ){
            echo '<div class="image_box_image" style="background-color:'.$instance['image_hover_bg_color'].'; border-radius:'.$instance['image_radius'].'px;">';
            echo '<img src="'.kaya_image_resize($instance['image_uri'], $instance['image_width'],  $instance['image_height'], 't').'" class="" alt="'.$instance['title'].'"  style="border-radius:'.$instance['image_radius'].'px;"  />';
            echo '</div>';
          }
          else{
                if (is_multisite()){
                     $instance['image_uri'] = $default_img_url;
                  }else{                  
                    $instance['image_uri'] = kaya_image_resize( $default_img_url, $instance['image_width'],  $instance['image_height'], 't' );
                  }
                  echo '<img src="'.$instance['image_uri'].'" class="" alt="'.$instance['title'].'"  style="border-radius:'.$instance['image_radius'].'px;"  />';
               } 
         if( !empty($instance['link'])){ 
            echo '</a>';
          }
          ?>
          </div>
          <?php 
          echo '<div class="description" style="text-align:'.$instance['imagebox_align'].'">';
             if( $instance['title'] ):
              echo '<h3 style="color:'.$instance['title_color'].';font-size:'.$instance['title_font_size'].'px; font-weight:'.$instance['title_font_weight'].'" >';
                if( !empty($instance['link'])){
                 echo '<a  style="color:'.$instance['title_color'].';font-size:'.$instance['title_font_size'].'px; font-weight:'.$instance['title_font_weight'].'" href="'.$instance['link'].'" target="'.$new_window.'" >';
                } 
                  echo $instance['title'];
                if( !empty($instance['link'])){   
                 echo '</a>';
                } 
              echo '</h3>';
             endif;
              if( $instance['description'] ):  echo '<p style="color:'.$instance['callout_color'].'">'.$instance['description'].'</p>'; endif;
          echo '</div>'; 
        echo "</div>";

      echo $args['after_widget'];
    }

    function form( $instance ){
      global $petshop_plugin_name;
      $instance = wp_parse_args($instance, array(
        'title' => __('Image Box Title',$petshop_plugin_name),
        'description' => __('Enter Image Box Description here.',$petshop_plugin_name),
        'link' => '', 
        "image_id" => "",
        "thumb_src" => '',
        'callout_color' => '#666666',
        'title_color' => '#333333',
        'title_font_size' => '',
        'title_font_weight'=>__('normal',$petshop_plugin_name),
        'border_color' => '#787878',
        'imagebox_align' => '',
        'image_width' => '100',
        'image_height' => '100',
        'image_uri' => '',
        'image_radius' => '0',
        'image_shadow' => '',
        'image_icon_color' =>'',
        'image_icon_bg_color' =>'',
        'image_hover_bg_color' => '',
        'disable_hover_icon' =>'',
        'new_window' =>'',
        'animation_names' => '',
        ));

        ?>
   <script type='text/javascript'>
    jQuery(document).ready(function($) {
      jQuery('.image_boxes_color_pickr').each(function(){
        jQuery(this).wpColorPicker();
      });
    });
  </script>
<div class="input-elements-wrapper">        
  <p>
      <?php $i = rand(1,100); ?>
        <img class="custom_media_image_<?php echo $i; ?>" src="<?php if(!empty($instance['image_uri'])){echo $instance['image_uri'];} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
        <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>">
        <input type="button" value="<?php _e( 'Upload Image', 'themename' ); ?>" class="button custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
        <script type="text/javascript">
          jQuery(document).ready( function(){
            jQuery('.custom_media_upload_<?php echo $i; ?>').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: 'Image Box Uploading',
                    button: {
                        text: 'Upload Image'
                    },
                    multiple: false  // Set this to true to allow multiple files to be selected
                })
                .on('select', function() {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    jQuery('.custom_media_image_<?php echo $i; ?>').attr('src', attachment.url);
                    jQuery('.custom_media_url_<?php echo $i; ?>').val(attachment.url);
                })
                .open();
            });
          });
        </script>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_width') ?>"> <?php _e('Image Width',$petshop_plugin_name) ?> </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_width') ?>" value="<?php echo esc_attr($instance['image_width']) ?>" name="<?php echo $this->get_field_name('image_width') ?>" />
    <small><?php _e('PX',$petshop_plugin_name);?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_height') ?>"> <?php _e('Image Height',$petshop_plugin_name) ?> </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_height') ?>" value="<?php echo esc_attr($instance['image_height']) ?>" name="<?php echo $this->get_field_name('image_height') ?>" />
    <small><?php _e('PX',$petshop_plugin_name);?></small>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_radius') ?>"> <?php _e('Image Border Radius',$petshop_plugin_name) ?> </label>
    <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_radius') ?>" value="<?php echo esc_attr($instance['image_radius']) ?>" name="<?php echo $this->get_field_name('image_radius') ?>" />
    <small><?php _e('PX',$petshop_plugin_name);?></small>
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('link') ?>"> <?php _e('Image & Title Link',$petshop_plugin_name) ?>  </label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" name="<?php echo $this->get_field_name('link') ?>" />
  </p>
</div>
<div class="input-elements-wrapper">
   <p class="two_fourth img_radio_select">
      <label for="<?php echo $this->get_field_id('imagebox_align') ?>"> <?php _e('Image Position',$petshop_plugin_name) ?>  </label>
      <label>
        <input type="radio" id="<?php echo $this->get_field_id( 'imagebox_align' ); ?>" name="<?php echo $this->get_field_name( 'imagebox_align' ); ?>" value="center" <?php checked( $instance['imagebox_align'], 'center' ); ?>>  <img alt="Align Center" alt="Align Center" src="<?php echo  constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_center.png' ?>">
      </label>
      <label>
       <input type="radio" id="<?php echo $this->get_field_id( 'imagebox_align' ); ?>" name="<?php echo $this->get_field_name( 'imagebox_align' ); ?>" value="left" <?php checked( $instance['imagebox_align'], 'left' ); ?>> <img alt="Align Left" alt="Align Left" src="<?php echo  constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_left.png' ?>">
      </label>
      <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'imagebox_align' ); ?>" name="<?php echo $this->get_field_name( 'imagebox_align' ); ?>" value="right" <?php checked( $instance['imagebox_align'], 'right' ); ?>>  <img alt="Align Right"  src="<?php echo  constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_right.png' ?>">
     </label>
     <label> 
        <input type="radio" id="<?php echo $this->get_field_id( 'imagebox_align' ); ?>" name="<?php echo $this->get_field_name( 'imagebox_align' ); ?>" value="none" <?php checked( $instance['imagebox_align'], 'none' ); ?>>  <img alt="Align None" src="<?php echo  constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/align_none.png' ?>">
     </label>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_shadow') ?>">  <?php _e('Enable Image Shadow',$petshop_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("image_shadow"); ?>" name="<?php echo $this->get_field_name("image_shadow"); ?>"<?php checked( (bool) $instance["image_shadow"], true ); ?> />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('new_window') ?>">  <?php _e('Open in new window',$petshop_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("new_window"); ?>" name="<?php echo $this->get_field_name("new_window"); ?>"<?php checked( (bool) $instance["new_window"], true ); ?> />
  </p>
  
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <lable for="<?php echo $this->get_field_id('title'); ?>"> <?php _e('Title',$petshop_plugin_name); ?> </label>  
    <input type="text" id="<?php echo $this->get_field_id('title') ?>" class="widefat" value="<?php echo esc_attr($instance['title']) ?>" name="<?php echo $this->get_field_name('title') ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_font_size'); ?>"> <?php _e('Title Font size',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('title_font_size') ?>" id="<?php echo $this->get_field_id('title_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['title_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('title_colortitle_color') ?>"> <?php _e('Title Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_boxes_color_pickr" id="<?php echo $this->get_field_id('title_colortitle_color') ?>" value="<?php echo esc_attr($instance['title_color']) ?>" name="<?php echo $this->get_field_name('title_color') ?>" />
  </p>
<p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Title Font Weight',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name('title_font_weight') ?>">
      <option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
      <option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
    </select>
  </p>
  </div>

<div class="input-elements-wrapper">
  <p class="three_fourth">
    <label for="<?php echo $this->get_field_id('description') ?>"> <?php _e('Description',$petshop_plugin_name) ?> </label>
    <textarea cols="10" class="widefat" id="<?php echo $this->get_field_id('description') ?>" value="<?php echo esc_attr($instance['description']) ?>" name="<?php echo $this->get_field_name('description') ?>" ><?php echo esc_attr($instance['description']) ?></textarea>
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('callout_color') ?>"> <?php _e('Description Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_boxes_color_pickr" id="<?php echo $this->get_field_id('callout_color') ?>" value="<?php echo esc_attr($instance['callout_color']) ?>" name="<?php echo $this->get_field_name('callout_color') ?>" />
  </p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p> 
<?php }
 }
petshop_kaya_register_widgets('image-box', __FILE__);
 ?>