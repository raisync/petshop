<?php
class Petshop_Banner_Widget extends WP_Widget
  {
   function __construct()
   {
 global $petshop_plugin_name;
     parent::__construct( 'kaya-image-text-boxes',
      __('Petshop - Banner',$petshop_plugin_name),
      array('description' => __('Displays images with on overlay text',$petshop_plugin_name) )
      );
   }
   function widget( $args, $instance ){
       global $petshop_plugin_name;
      $instance = wp_parse_args($instance,array(
        'title' => __('Enter Title Here',$petshop_plugin_name),
        'link' => '',
        "image_uri" => "",
        'image_width' => '500',
        'image_height' => '500',
        'content_color' => '#ffffff',
        'content' => __('Add here Image Overlay Content', $petshop_plugin_name),
        'image_bg_color' => '#000000',
        'image_opacity' => '0.6',
        'content_align' => __('center',$petshop_plugin_name),
        'content_align_vertical' => __('middle',$petshop_plugin_name),
        'image_border_radius' => '0',
        'image_shadow' => '',
        'banner_first_title'=>'',
        'banner_title1_color'=>'',
        'banner_title1_font_size'=>'',
        'banner_title1_font_weight'=>'',
        'banner_title1_font_style'=>'',
        'banner_title1_letter_spacing'=>'',
        'banner_second_title'=>'',
        'banner_title2_color'=>'',
        'banner_title2_font_size'=>'',
        'banner_title2_font_weight'=>'',
        'banner_title2_font_style'=>'',
        'banner_title2_letter_spacing'=>'',
        'banner_third_title'=>'',
        'banner_title3_color'=>'',
        'banner_title3_font_size'=>'',
        'banner_title3_font_weight'=>'',
        'banner_title3_font_style'=>'',
        'banner_title3_letter_spacing'=>'',
        'animation_names' => '',
        'read_more_button_text' =>'',
        'read_more_text_font_size' =>'',
        'read_more_text_font_weight' => '',
        'read_more_text_color' => '#ffffff',
        'read_more_bg_color' => '#f49c41',
        'button_margin_top' => '',
        'button_border_color' => '',
        'link_open_new_window' => '',

      ));
      echo $args['before_widget'];
      $target_window = ( $instance['link_open_new_window'] == 'on' ) ? '_blank' : '_self';
      $image_width = $instance['image_width'] ? $instance['image_width'] :'500';
      $image_height = $instance['image_height'] ? $instance['image_height'] :'500';
      $image_shadow = ($instance['image_shadow'] == 'on') ? 'box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);' : '';
       $img_text_animation_class = trim( $instance['animation_names'] )  ? 'wow '.$instance['animation_names'] : '';
       if(empty($instance['image_uri'])){

       }
        echo "<div class='".$img_text_animation_class." image_overlay_content' style='".$image_shadow." color:".$instance['content_color']."; background-color:".$instance['image_bg_color']."; border-radius:".$instance['image_border_radius']."px;'>";   ?>
          <div class="figure">
              <?php 
                if( $instance['image_uri'] ){
                  echo '<img src="'.kaya_image_resize( $instance['image_uri'], $image_width, $image_height, 't' ).'" class="" alt="'.$instance['title'].'"  style="opacity:'.$instance['image_opacity'].'; border-radius:'.$instance['image_border_radius'].'px;" />';
                }else{
                  $image_uri = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/banner.jpg';
                  echo '<img src="'.kaya_image_resize( $image_uri, $image_width, $image_height, true ).'" style="opacity:'.$instance['image_opacity'].'; border-radius:'.$instance['image_border_radius'].'px;" alt="'.$instance['title'].'" />';
                } 
              ?>
          <div class="overlay_content vertical_align_<?php echo $instance['content_align_vertical']; ?>" style="text-align:<?php echo $instance['content_align']; ?>">
             <?php 
                 if(!empty($instance['banner_first_title'])){
                   echo '<h1 style="color:'.$instance['banner_title1_color'].';font-size:'.$instance['banner_title1_font_size'].'px; font-weight:'.$instance['banner_title1_font_weight'].'; font-style:'.$instance['banner_title1_font_style'].'; letter-spacing:'.$instance['banner_title1_letter_spacing'].'px;">'.$instance['banner_first_title'].'</h1>'; 
                 }
                  if(!empty($instance['banner_second_title'])){
                   echo '<h2 style="color:'.$instance['banner_title2_color'].';font-size:'.$instance['banner_title2_font_size'].'px; font-weight:'.$instance['banner_title2_font_weight'].'; font-style:'.$instance['banner_title2_font_style'].'; letter-spacing:'.$instance['banner_title2_letter_spacing'].'px;">'.$instance['banner_second_title'].'</h2>';
                 }
                 if(!empty($instance['banner_third_title'])){
                   echo '<h3 style="color:'.$instance['banner_title3_color'].';font-size:'.$instance['banner_title3_font_size'].'px; font-weight:'.$instance['banner_title3_font_weight'].'; font-style:'.$instance['banner_title3_font_style'].'; letter-spacing:'.$instance['banner_title3_letter_spacing'].'px;">'.$instance['banner_third_title'].'</h3 >'; 
                 }
                   if(!empty($instance['read_more_button_text'])){
                    echo   '<div style="margin-top:'.$instance['button_margin_top'].'px;"><a class="banner_readmore_button" style="color:'.$instance['read_more_text_color'].'; background-color:'.$instance['read_more_bg_color'].'; font-weight:'.$instance['read_more_text_font_weight'].'; border:1px solid '.$instance['button_border_color'].'; padding: 8px 15px; font-size:'.$instance['read_more_text_font_size'].'px;" href="'.$instance['link'].'" target="'.$target_window.'"> '.$instance['read_more_button_text'].' </a></div>';
                  }
             ?>
          </div>
          </div>
          <?php
        echo "</div>";
      echo $args['after_widget'];
    }

    function form( $instance ){
       global $petshop_plugin_name;
      $instance = wp_parse_args($instance, array(
        'title' => __('Enter Title Here',$petshop_plugin_name),
        'link' => '',
        "image_uri" => "",
        'image_width' => '500',
        'image_height' => '500',
        'content_color' => '#ffffff',
        'content' => __('Add here Image Overlay Content', $petshop_plugin_name),
        'image_bg_color' => '#000000',
        'image_opacity' => '0.6',
        'content_align' => __('center',$petshop_plugin_name),
        'content_align_vertical' => __('middle',$petshop_plugin_name),
        'image_border_radius' => '0',
        'image_shadow' => '',
        'banner_first_title'=>'',
        'banner_title1_color'=>'',
        'banner_title1_font_size'=>'',
        'banner_title1_font_weight'=>'',
        'banner_title1_font_style'=>'',
        'banner_title1_letter_spacing'=>'',
        'banner_second_title'=>'',
        'banner_title2_color'=>'',
        'banner_title2_font_size'=>'',
        'banner_title2_font_weight'=>'',
        'banner_title2_font_style'=>'',
        'banner_title2_letter_spacing'=>'',
        'banner_third_title'=>'',
         'banner_title3_color'=>'',
        'banner_title3_font_size'=>'',
        'banner_title3_font_weight'=>'',
        'banner_title3_font_style'=>'',
        'banner_title3_letter_spacing'=>'',
        'animation_names' => '',
        'read_more_button_text' =>'',
        'read_more_text_font_size' =>'',
        'read_more_text_color' => '#ffffff',
        'read_more_text_font_weight' => '',
        'read_more_bg_color' => '#f49c41',
        'button_margin_top' => '',
        'button_border_color' => '',
        'link_open_new_window' => '',
        ));

        ?>
<script type='text/javascript'>
  jQuery(document).ready(function($) {
  jQuery('.image_with_overlay_text_color_pickr').each(function(){
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
  <label for="<?php echo $this->get_field_id('image_width') ?>"> <?php _e('Image Width',$petshop_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_width') ?>" value="<?php echo esc_attr($instance['image_width']) ?>" name="<?php echo $this->get_field_name('image_width') ?>" />
  <small><?php _e('PX',$petshop_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_height') ?>"> <?php _e('Image Height',$petshop_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_height') ?>" value="<?php echo esc_attr($instance['image_height']) ?>" name="<?php echo $this->get_field_name('image_height') ?>" />
  <small><?php _e('PX',$petshop_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_opacity') ?>"> <?php _e('Image Opacity (0-1)',$petshop_plugin_name) ?>  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('image_opacity') ?>" value="<?php echo esc_attr($instance['image_opacity']) ?>" name="<?php echo $this->get_field_name('image_opacity') ?>" />
</p>
<p class="one_fourth_last">
  <label for="<?php echo $this->get_field_id('image_bg_color') ?>"> <?php _e('Image Background Color',$petshop_plugin_name) ?>  </label>
  <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('image_bg_color') ?>" value="<?php echo esc_attr($instance['image_bg_color']) ?>" name="<?php echo $this->get_field_name('image_bg_color') ?>" />
</p>
</div>
<div class="input-elements-wrapper"> 
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_border_radius') ?>"> <?php _e('Image Border Radius',$petshop_plugin_name) ?>  </label>
  <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_border_radius') ?>" value="<?php echo esc_attr($instance['image_border_radius']) ?>" name="<?php echo $this->get_field_name('image_border_radius') ?>" />
  <small><?php _e('PX',$petshop_plugin_name);?></small>
</p>
<p class="one_fourth">
  <label for="<?php echo $this->get_field_id('image_shadow') ?>">  <?php _e('Enable Image Shadow',$petshop_plugin_name) ?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("image_shadow"); ?>" name="<?php echo $this->get_field_name("image_shadow"); ?>"<?php checked( (bool) $instance["image_shadow"], true ); ?> />
  </p>
</div>
<div class="input-elements-wrapper">
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_first_title'); ?>"> <?php _e('Banner Title-1',$petshop_plugin_name); ?> </label>  
    <input type="text" id="<?php echo $this->get_field_id('banner_first_title') ?>" class="widefat" value="<?php echo esc_attr($instance['banner_first_title']) ?>" name="<?php echo $this->get_field_name('banner_first_title') ?>" />
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title1_color') ?>"> <?php _e('Title-1 Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('banner_title1_color') ?>" value="<?php echo esc_attr($instance['banner_title1_color']) ?>" name="<?php echo $this->get_field_name('banner_title1_color') ?>" />
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title1_font_size'); ?>"> <?php _e('Title-1 Font size',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title1_font_size') ?>" id="<?php echo $this->get_field_id('banner_title1_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title1_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
    <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('banner_title1_letter_spacing'); ?>"> <?php _e('Title-1 Letter Spacing',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title1_letter_spacing') ?>" id="<?php echo $this->get_field_id('banner_title1_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title1_letter_spacing'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
</div>
<div class="input-elements-wrapper">
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title1_font_weight') ?>"> <?php _e('Title-1 Font Weight',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title1_font_weight') ?>" name="<?php echo $this->get_field_name
    ('banner_title1_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title1_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['banner_title1_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
    </select>
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title1_font_style') ?>"> <?php _e('Title-1 Font Style',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title1_font_style') ?>" name="<?php echo $this->get_field_name
    ('banner_title1_font_style') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title1_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="italic" <?php selected('italic', $instance['banner_title1_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
    </select>
    </p>
</div>
<div class="input-elements-wrapper">  
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_second_title'); ?>"> <?php _e('Banner Title-2',$petshop_plugin_name); ?> </label>  
    <input type="text" id="<?php echo $this->get_field_id('banner_second_title') ?>" class="widefat" value="<?php echo esc_attr($instance['banner_second_title']) ?>" name="<?php echo $this->get_field_name('banner_second_title') ?>" />
  </p>
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title2_color') ?>"> <?php _e('Title-2 Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('banner_title2_color') ?>" value="<?php echo esc_attr($instance['banner_title2_color']) ?>" name="<?php echo $this->get_field_name('banner_title2_color') ?>" />
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title2_font_size'); ?>"> <?php _e('Title-2 Font size',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title2_font_size') ?>" id="<?php echo $this->get_field_id('banner_title2_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title2_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
    <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('banner_title2_letter_spacing'); ?>"> <?php _e('Title-2 Letter Spacing',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title2_letter_spacing') ?>" id="<?php echo $this->get_field_id('banner_title2_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title2_letter_spacing'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
</div>
<div class="input-elements-wrapper">
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title2_font_weight') ?>"> <?php _e('Title-2 Font Weight',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title2_font_weight') ?>" name="<?php echo $this->get_field_name
    ('banner_title2_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title2_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['banner_title2_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
    </select>
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title2_font_style') ?>"> <?php _e('Title-2 Font Style',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title2_font_style') ?>" name="<?php echo $this->get_field_name
    ('banner_title2_font_style') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title2_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="italic" <?php selected('italic', $instance['banner_title2_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
    </select>
    </p>
</div>
<div class="input-elements-wrapper">  
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_third_title'); ?>"> <?php _e('Banner Title-3',$petshop_plugin_name); ?> </label>  
    <input type="text" id="<?php echo $this->get_field_id('banner_third_title') ?>" class="widefat" value="<?php echo esc_attr($instance['banner_third_title']) ?>" name="<?php echo $this->get_field_name('banner_third_title') ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title3_color') ?>"> <?php _e('Title-3 Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('banner_title3_color') ?>" value="<?php echo esc_attr($instance['banner_title3_color']) ?>" name="<?php echo $this->get_field_name('banner_title3_color') ?>" />
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title3_font_size'); ?>"> <?php _e('Title-3 Font size',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title3_font_size') ?>" id="<?php echo $this->get_field_id('banner_title3_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title3_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
    <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('banner_title3_letter_spacing'); ?>"> <?php _e('Title-3 Letter Spacing',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('banner_title3_letter_spacing') ?>" id="<?php echo $this->get_field_id('banner_title3_letter_spacing') ?>" class="small-text" value="<?php echo esc_attr( $instance['banner_title3_letter_spacing'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
</div>
<div class="input-elements-wrapper">
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title3_font_weight') ?>"> <?php _e('Title-3 Font Weight',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title3_font_weight') ?>" name="<?php echo $this->get_field_name
    ('banner_title3_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title3_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['banner_title3_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
    </select>
    </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('banner_title3_font_style') ?>"> <?php _e('Title-3 Font Style',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('banner_title3_font_style') ?>" name="<?php echo $this->get_field_name
    ('banner_title3_font_style') ?>">
    <option value="normal" <?php selected('normal', $instance['banner_title3_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="italic" <?php selected('italic', $instance['banner_title3_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
    </select>
    </p>
</div>
<div class="input-elements-wrapper">
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('read_more_button_text'); ?>"> <?php _e('Button Text',$petshop_plugin_name); ?> </label>  
    <input type="text" id="<?php echo $this->get_field_id('read_more_button_text') ?>" class="widefat" value="<?php echo esc_attr($instance['read_more_button_text']) ?>" name="<?php echo $this->get_field_name('read_more_button_text') ?>" />
  </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('read_more_text_color') ?>"> <?php _e('Button Text Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('read_more_text_color') ?>" value="<?php echo esc_attr($instance['read_more_text_color']) ?>" name="<?php echo $this->get_field_name('read_more_text_color') ?>" />
    </p>
     <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('read_more_bg_color') ?>"> <?php _e('Button Bg Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('read_more_bg_color') ?>" value="<?php echo esc_attr($instance['read_more_bg_color']) ?>" name="<?php echo $this->get_field_name('read_more_bg_color') ?>" />
    </p>
    <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('read_more_text_font_size'); ?>"> <?php _e('Button  Font size',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('read_more_text_font_size') ?>" id="<?php echo $this->get_field_id('read_more_text_font_size') ?>" class="small-text" value="<?php echo esc_attr( $instance['read_more_text_font_size'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
  </div>
  <div class="input-elements-wrapper">
     <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('read_more_text_font_weight') ?>"> <?php _e('Button  Font Weight',$petshop_plugin_name) ?></label>
    <select id="<?php echo $this->get_field_id('read_more_text_font_weight') ?>" name="<?php echo $this->get_field_name
    ('read_more_text_font_weight') ?>">
    <option value="normal" <?php selected('normal', $instance['read_more_text_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
    <option value="bold" <?php selected('bold', $instance['read_more_text_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
    </select>
    </p>
  <p class="one_fourth">
  <label for="<?php echo $this->get_field_id('link') ?>"> <?php _e('Button Link',$petshop_plugin_name) ?>  </label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id('link') ?>" value="<?php echo esc_attr($instance['link']) ?>" name="<?php echo $this->get_field_name('link') ?>" />
  <small><?php _e('Ex:',$petshop_plugin_name); ?> http://www.google.com</small>
</p>
 <p class="one_fourth">
     <label for="<?php echo $this->get_field_id('link_open_new_window') ?>"> <?php _e('Open In New Window',$petshop_plugin_name) ?>  </label>
     <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("link_open_new_window"); ?>" name="<?php echo $this->get_field_name("link_open_new_window"); ?>"<?php checked( (bool) $instance["link_open_new_window"], true ); ?> />
  </p>
   <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('button_margin_top'); ?>"> <?php _e('Button Margin Top',$petshop_plugin_name) ?> </label>
    <input type="text" name="<?php echo $this->get_field_name('button_margin_top') ?>" id="<?php echo $this->get_field_id('button_margin_top') ?>" class="small-text" value="<?php echo esc_attr( $instance['button_margin_top'] ) ?>" /><small><?php _e('px',$petshop_plugin_name); ?></small>
    </p>
  </div>  
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('button_border_color') ?>"> <?php _e('Button Border Color',$petshop_plugin_name) ?>  </label>
    <input type="text" class="image_with_overlay_text_color_pickr" id="<?php echo $this->get_field_id('button_border_color') ?>" value="<?php echo esc_attr($instance['button_border_color']) ?>" name="<?php echo $this->get_field_name('button_border_color') ?>" />
    </p>
    <p class="one_fourth">
      <label for="<?php echo $this->get_field_id('content_align') ?>">   <?php _e('Content Horizontal Alignment',$petshop_plugin_name)?>
      </label>
      <select id="<?php echo $this->get_field_id('content_align') ?>" name="<?php echo $this->get_field_name('content_align') ?>">
        <option value="left" <?php selected('left', $instance['content_align']) ?>>   <?php esc_html_e('Align left', $petshop_plugin_name) ?>   </option>
        <option value="right" <?php selected('right', $instance['content_align']) ?>>    <?php esc_html_e('Align Right', $petshop_plugin_name) ?>   </option>
        <option value="center" <?php selected('center', $instance['content_align']) ?>>   <?php esc_html_e('Align Center', $petshop_plugin_name) ?>   </option>
      </select>
    </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('content_align_vertical') ?>">   <?php _e('Content Vertical Alignment',$petshop_plugin_name)
    ?></label>
    <select id="<?php echo $this->get_field_id('content_align_vertical') ?>" name="<?php echo $this->get_field_name('content_align_vertical') ?>">
      <option value="top" <?php selected('top', $instance['content_align_vertical']) ?>>   <?php esc_html_e('Top', $petshop_plugin_name) ?>   </option>
      <option value="bottom" <?php selected('bottom', $instance['content_align_vertical']) ?>>    <?php esc_html_e('Bottom', $petshop_plugin_name) ?>   </option>
      <option value="middle" <?php selected('middle', $instance['content_align_vertical']) ?>>   <?php esc_html_e('Middle', $petshop_plugin_name) ?>   </option>
    </select>
  </p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p> 
<?php }
 }
petshop_kaya_register_widgets('banner', __FILE__);
 ?>