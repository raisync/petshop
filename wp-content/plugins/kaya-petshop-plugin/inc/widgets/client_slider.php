<?php
class Petshop_Client_slider_Widget extends WP_Widget
 {
   function __construct()
   {
     global $petshop_plugin_name; 
     parent::__construct( 'kaya-client-images',
        __('Petshop - Client Slider ',$petshop_plugin_name),
       array('description' => __('Displays Client images as a grid / slider view',$petshop_plugin_name)  )
      );
   }
   function widget( $args, $instance ){
      global $petshop_plugin_name, $post;
      wp_enqueue_script('jquery_owlcarousel');
      wp_enqueue_style('css_owl.carousel');
      $instance = wp_parse_args($instance,array(        
        'upload_images_ids' => '',
        'client_images_column' => '4',
        'client_img_type' =>'',
        'client_images_space' => '',
        'animation_names' => '',
        'slider_auto_play' => __('true',$petshop_plugin_name),
        'image_width' => '',
        'image_height' => '',
        'disable_light_box' => '',
        'slider_arrows_bg_color' => '',
        'slider_arrows_color' => '#4d4d4d',
        'disable_slider_arrow_buttons' => '',      
      ));
    echo $args['before_widget'];
    $client_rand=rand(1,500); 
    //$enable_slider_dots_buttons = ($instance['enable_slider_dots_buttons'] == 'on' ) ? 'block' :'none';
    if( $instance['client_img_type'] != 'client_slider'){
      $client_image_sapce = ($instance['client_images_space'] == 'on') ? 'gutter_images gutter_images_column'.$instance['client_images_column'].'' : 'image_grid_column'.$instance['client_images_column'].'';    
    }else{
      $client_image_sapce = '';
    }
    $slider_auto_play = ($instance['client_img_type'] == 'client_slider') ? 'data-autoplay="'.$instance['slider_auto_play'].'"' : '';
    $grid_columns = ($instance['client_img_type'] == 'list_client_images') ? 'client_list_images' : 'image_grid_column'.$instance['client_images_column'].'';
    $image_height = $instance['image_height'] ? $instance['image_height']  : '650';
    $disable_slider_arrow_buttons = ($instance['disable_slider_arrow_buttons'] == 'on' ) ? 'false' :'true';
    $client_animation =   ( trim( $instance['animation_names'] ) )  ? 'wow '. $instance['animation_names'] : '';
    $client_image_margin = ($instance['client_images_space'] == 'on') ? '20' : '0';
    $upload_image_ids = explode(',', trim( $instance['upload_images_ids']));
   // if( trim( !empty($instance['upload_images_ids']) ) ){
      $upload_image_ids = array_unique( array_combine(range(1, count($upload_image_ids)), $upload_image_ids));
      $default_img_url = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/client_slider.jpg';
      if (is_multisite()){
        $image_url = $default_img_url;
      }else{                  
        $image_url = kaya_image_resize( $default_img_url,$instance['image_width'],$instance['image_height'],'t' );
      }
     echo '<div class="client_image_slider" style="min-height:100px;">';
      echo '<div class="'. $client_animation .' '.$client_image_sapce.' client_image_wrapper '.$instance['client_img_type'].' '.$grid_columns.' client_image_wrapper_'.$client_rand.' " data-columns="'.$instance['client_images_column'].'"  data-margin="'.$client_image_margin.'"  '.$slider_auto_play.' data-button-color="'.$instance['slider_arrows_color'].'">';
      if( $instance['client_img_type'] == 'client_slider'){ // Slider
        echo '<div  class="" id="client_widget_slider" data-buttons="'.$disable_slider_arrow_buttons.'">';
        if( trim( !empty($instance['upload_images_ids']) ) ){
          foreach ($upload_image_ids as $upload_image_id) {
            $attachment = get_post( $upload_image_id );
            $values =  array(
              'caption' => $attachment->post_excerpt,
              'description' => $attachment->post_content,
              'href' => get_permalink( $attachment->ID ),
              'src' => $attachment->guid,
              'title' => $attachment->post_title
            );
            $upload_img_url = wp_get_attachment_image_src($upload_image_id, "full");
            $src = $upload_img_url[0];;
            $width = $upload_img_url[1];
            $height = $upload_img_url[2];
            $image_width = $instance['image_width'] ? $instance['image_width'] : $width;
            $image_height = $instance['image_height'] ? $instance['image_height'] : $height;
            $image_custom_link= get_post_meta( $upload_image_id, '_image_custom_link', true ) ? get_post_meta( $upload_image_id, '_image_custom_link', true ) : '';
            $link_new_window= get_post_meta( $upload_image_id, '_link_new_window', true ) ? get_post_meta( $upload_image_id, '_link_new_window', true ) : '';
            $image_custom_description= get_post_meta( $upload_image_id, '_image_custom_description', true ) ? get_post_meta( $upload_image_id, '_image_custom_description', true ) : '';
            $customlink = $image_custom_link ? $image_custom_link : $src;
            $link_open = $image_custom_link ? 'target="'.$link_new_window.'"' : 'data-gal=prettyPhoto[image_gallery]';
            //echo "<div class='image_client_slider'>";
            if( $instance['disable_light_box'] != 'on' ){
              echo "<a href=\" $customlink \"  $link_open >";
            } 
            echo "<img src='".kaya_image_resize( $src, $image_width, $image_height , 't' )."' alt='".esc_attr($values['title'])."' width='".$image_width."' height='".$image_height."'>";
            if( $instance['disable_light_box'] != 'on' ){
              echo "</a>";
            }
            //echo "</div>";
           }
        }else{            
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
            echo '<img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" >';
             }
          echo '</div>'; // end
      }else{
        echo '<ul class="gallery-images">';
          if( trim( !empty($instance['upload_images_ids']) ) ){
            foreach ($upload_image_ids as $upload_image_id) {
            $attachment = get_post( $upload_image_id );
            $values =  array(
              'caption' => $attachment->post_excerpt,
              'description' => $attachment->post_content,
              'href' => get_permalink( $attachment->ID ),
              'src' => $attachment->guid,
              'title' => $attachment->post_title
              );
              $upload_img_url = wp_get_attachment_image_src($upload_image_id, "full");
              $src = $upload_img_url[0];;
              $width = $upload_img_url[1];
              $height = $upload_img_url[2];
              $image_custom_link= get_post_meta( $upload_image_id, '_image_custom_link', true ) ? get_post_meta( $upload_image_id, '_image_custom_link', true ) : '';
              $link_new_window= get_post_meta( $upload_image_id, '_link_new_window', true ) ? get_post_meta( $upload_image_id, '_link_new_window', true ) : '';
              $image_custom_description= get_post_meta( $upload_image_id, '_image_custom_description', true ) ? get_post_meta( $upload_image_id, '_image_custom_description', true ) : '';
              $target_link = ( $link_new_window == 'on' ) ? '_blank' : '_self';
              $customlink = $image_custom_link ? $image_custom_link : $src;
              $link_open = $image_custom_link ? 'target="'.$link_new_window.'"' : 'data-gal=prettyPhoto[image_gallery]';
              $image_width = $instance['image_width'] ? $instance['image_width'] : $width;
              $image_height = $instance['image_height'] ? $instance['image_height'] : $height;
              echo "<li>";
              if($instance['client_img_type'] =='grid_view'){
                if( $instance['disable_light_box'] != 'on' ){
                  echo "<a href=\" $customlink \"  $link_open>";
                }            
                echo "<img src='".kaya_image_resize( $src, $image_width, $image_height , 't' )."' alt='".esc_html($values['title'])."' width='".$image_width."' height='".$image_height."'>";
                if( $instance['disable_light_box'] != 'on' ){
                  echo "</a>";
                } 
              }
              echo "</li>";
             }
          }else{
              echo '<li><img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" ></li>';
              echo '<li><img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" ></li>';
              echo '<li><img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" ></li>';
              echo '<li><img src="'.$image_url.'" alt="'.get_the_title().'" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" ></li>';
             }
        echo '</ul>';
      } 
        if( trim( empty($instance['upload_images_ids']) ) ){
            $post_id = $post->ID;
            $post_url = admin_url( 'post.php?post=' . $post_id ) . '&action=edit';
            echo '<p style="text-align:center; clear:both;">There is no image attachment IDs in "'.strtoupper($petshop_plugin_name).' Client Images" . To upload images <a target="_blank" href="'.$post_url.'"><b>OPEN THIS PAGE</b></a> &  edit "'.strtoupper($petshop_plugin_name).' Client Images > Upload Client Images " button.</p>';
        }

      echo '</div></div>';
        echo $args['after_widget'];
    }
    function form( $instance ){
      global $petshop_plugin_name;
      $instance = wp_parse_args($instance, array(    
        'upload_images_ids' => '',
        'client_images_column' => '4',
        'client_img_type' =>'',
        'animation_names' => '',
        'client_images_space' => '',
        'slider_auto_play' => __('true',$petshop_plugin_name),
        'image_height' => '',
        'image_width' => '',
        'disable_light_box' => '',
        'slider_arrows_bg_color' => '',
        'slider_arrows_color' => '#4d4d4d',
        'disable_slider_arrow_buttons' => '',
      ));
      ?>
  <script type='text/javascript'>
    (function($) {
      "use strict";
      $(function() {
      $('.image_client_color_pickr').each(function(){
        $(this).wpColorPicker();
      });
      $("#<?php echo $this->get_field_id('client_img_type') ?>").change(function () {
        $("#<?php echo $this->get_field_id('client_images_column') ?>").parent().show();
        $("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().hide();
        $(".client_slider_settings").hide();
        var select_client_img_type = $("#<?php echo $this->get_field_id('client_img_type') ?> option:selected").val(); 
        switch(select_client_img_type){
          case 'client_slider':
            $("#<?php echo $this->get_field_id('slider_auto_play') ?>").parent().show();
             $(".client_slider_settings").show();
            break;
          case 'list_client_images':
            $("#<?php echo $this->get_field_id('client_images_column') ?>").parent().hide();
            break;    
        }
      }).change();
   });
  })(jQuery);
  </script>
<div class="input-elements-wrapper">    
  <p><?php $i = rand(1,100); ?>
        <input type="text" class="widefat custom_media_url_<?php echo $i; ?>" name="<?php echo $this->get_field_name('upload_images_ids'); ?>" id="<?php echo $this->get_field_id('upload_images_ids'); ?>" value="<?php echo $instance['upload_images_ids']; ?>">
        <input type="button" value="<?php _e( 'Upload Client Images', $petshop_plugin_name ); ?>" class="button button-primary  custom_media_upload_<?php echo $i; ?>" id="custom_media_upload_<?php echo $i; ?>"/>
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
            title: 'Upload Client Images',
            button: {
            text: 'Upload Client Images',
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
   <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('client_img_type') ?>">  <?php _e('Select Client Image Type',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('client_img_type') ?>" name="<?php echo $this->get_field_name('client_img_type') ?>">
      <option value="grid_view" <?php selected('grid_view', $instance['client_img_type']) ?>>  <?php esc_html_e('Grid View', $petshop_plugin_name) ?> </option>
      <option value="client_slider" <?php selected('client_slider', $instance['client_img_type']) ?>>  <?php esc_html_e('Slider', $petshop_plugin_name) ?>    </option>
      
    </select>
  </p>
    <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('client_images_column') ?>">  <?php _e('Select Columns',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('client_images_column') ?>" name="<?php echo $this->get_field_name('client_images_column') ?>">
      <option value="6" <?php selected('6', $instance['client_images_column']) ?>>  <?php esc_html_e('Column 6', $petshop_plugin_name) ?>    </option>
      <option value="5" <?php selected('5', $instance['client_images_column']) ?>>  <?php esc_html_e('Column 5', $petshop_plugin_name) ?>    </option>
      <option value="4" <?php selected('4', $instance['client_images_column']) ?>>  <?php esc_html_e('Column 4', $petshop_plugin_name) ?>    </option>
      <option value="3" <?php selected('3', $instance['client_images_column']) ?>>  <?php esc_html_e('Column 3', $petshop_plugin_name) ?>    </option>
      <option value="2" <?php selected('2', $instance['client_images_column']) ?>>    <?php esc_html_e('Column 2', $petshop_plugin_name) ?>    </option>
    </select>
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('image_width'); ?>"> <?php _e('Image Width & Height',$petshop_plugin_name) ?>  </label>
    <input type="text" name="<?php echo $this->get_field_name('image_width') ?>" id="<?php echo $this->get_field_id('image_width') ?>" class="small-text" value="<?php echo $instance['image_width'] ?>" /> X
    <input type="text" name="<?php echo $this->get_field_name('image_height') ?>" id="<?php echo $this->get_field_id('image_height') ?>" class="small-text" value="<?php echo $instance['image_height'] ?>" />
    <small><?php _e('PX',$petshop_plugin_name); ?></small>
  </p>

<p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('slider_auto_play') ?>">  <?php _e('Auto Play',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('slider_auto_play') ?>" name="<?php echo $this->get_field_name('slider_auto_play') ?>">
      <option value="true" <?php selected('True', $instance['slider_auto_play']) ?>>  <?php esc_html_e('True', $petshop_plugin_name) ?>    </option>
      <option value="false" <?php selected('false', $instance['slider_auto_play']) ?>>  <?php esc_html_e('False', $petshop_plugin_name) ?>    </option>
    </select>
  </p> 
</div>
<div class="input-elements-wrapper client_slider_settings">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('slider_arrows_color') ?>">  <?php _e('Slider Navigation Color',$petshop_plugin_name)?>  </label>
   <input type="text" name="<?php echo $this->get_field_name('slider_arrows_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_color') ?>" class="image_client_color_pickr" value="<?php echo $instance['slider_arrows_color'] ?>" />
  </p>
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('disable_slider_arrow_buttons') ?>">  <?php _e('Disable Slider Arrow Buttons',$petshop_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_slider_arrow_buttons"); ?>" name="<?php echo $this->get_field_name("disable_slider_arrow_buttons"); ?>"<?php checked( (bool) $instance["disable_slider_arrow_buttons"], true ); ?> />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('disable_light_box') ?>">  <?php _e('Disable Lightbox',$petshop_plugin_name) ?>  </label>
      <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_light_box"); ?>" name="<?php echo $this->get_field_name("disable_light_box"); ?>"<?php checked( (bool) $instance["disable_light_box"], true ); ?> />
  </p>
</div>
<div class="input-elements-wrapper">
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('client_images_space') ?>">  <?php _e('Gutter',$petshop_plugin_name)?>  </label>
    <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("client_images_space"); ?>" name="<?php echo $this->get_field_name("client_images_space"); ?>"<?php checked( (bool) $instance["client_images_space"], true ); ?> />
  </p>
</div>
<p>
   <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
    <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
  <p> 
<?php }
 }
petshop_kaya_register_widgets('client-slider', __FILE__);
?>