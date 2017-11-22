<?php
/* Testimonial Slider */
class Petshop_Testimonial_Slider_Widget extends WP_Widget{
  public function __construct(){
    global $petshop_plugin_name;
    parent::__construct(  'kaya-testimonials-slider',
        __('Petshop - Testimonial Slider',$petshop_plugin_name),
    array( 'description' => __('Display client slider from "Testimonial" CPT post featured image',$petshop_plugin_name), 'class' => 'kaya_testimonial_widget' )
    );
  }
  public function widget( $args , $instance ){
    global $petshop_plugin_name;
    wp_enqueue_script('jquery_owlcarousel');
    wp_enqueue_style('css_owl.carousel');
    $instance = wp_parse_args($instance, array(        
        'testimonial_slide_items' => '1',
        'link' => '#',
        'tm_client_name_color' => '#fff',
        'tm_description_color' => '#fff',
        'testimonial_slide_autoplay' => '',
        'tm_border_color' => '#1a1a1a',
        'kaya_testimonial_cat' => '',
        'tm_description_font_size' => '14',
        'tm_description_font_style' =>  __('normal',$petshop_plugin_name),
        'tm_description_letter_space' => '0',
        'tm_description_font_weight' =>  __('normal',$petshop_plugin_name),
        'tm_client_name_size' => '16',
        'tm_client_name_font_weight' =>  __('normal',$petshop_plugin_name),
        'tm_client_name_leter_sapce' => '0',
        'tm_client_name_font_style' =>  __('normal',$petshop_plugin_name),
        'designation_color' => '#fff',
        'designation_font_size' => '14',
        'designation_letter_spacing' => '0',
        'designation_font_style' => 'normal',
        'designation_font_weight' => 'normal',
        'thumbnails_border_color' => '#fff',
        'thumb_active_border_color' => '#f49c41',
        'animation_names' => '',
      ));
    echo $args['before_widget'];
      $tm_rand = rand(1,500);
      $testimonial_slider_animation = $instance['animation_names'] ? 'wow '.$instance['animation_names'].'' : '';
      $desc_line_height = (  ceil($instance['tm_description_font_size']) * 1.8 );
      $client_name_line_height = ( ceil($instance['tm_client_name_size']) * 1.4 );
      echo '<style type="text/css"> .testimonial_slider_wrapper_'.$tm_rand.' .slider_thumb_img.active{border-color:'.$instance['thumb_active_border_color'].'!important;}</style>';
      echo '<div class="'.$testimonial_slider_animation.' testimonial_slider_wrapper  testimonial_slider_wrapper_'.$tm_rand.'" data-columns="'.$instance['testimonial_slide_items'].'" data-autoplay="'.$instance['testimonial_slide_autoplay'].'" >';
          $array_val = ( !empty( $instance['kaya_testimonial_cat'] )) ? explode(',', $instance['kaya_testimonial_cat']) : '';
          if( $array_val ) {
            $loop = new WP_Query(array( 'post_type' => 'testimonial',  'orderby' => 'menu_order', 'posts_per_page' =>10,'order' => 'DESC',  'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'testimonial_category',   'field' => 'id', 'terms' => $array_val  ), )));
          }else{
            $loop = new WP_Query(array('post_type' => 'testimonial', 'taxonomy' => 'testimonial_category','term' => $instance['kaya_testimonial_cat'], 'orderby' => 'menu_order', 'posts_per_page' =>10,'order' => 'DESC'));
          }
           echo '<div class="thumbimg">';
              $thumb ='1';
          if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
              global $post;
                $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
                echo '<div class="slider_thumb_img" style="border-color:'.$instance['thumbnails_border_color'].'; width:100px; height:100px;" data-active-border="'.$instance['thumb_active_border_color'].'">';
                if( $img_url ){
                  echo '<a class="button secondary url" href="#item'. $thumb.'"><img src="'.kaya_image_resize( $img_url, '100','100','' ).'" alt="'.get_the_title().'" class="img-responsive" /></a>';
                }else{
                    $default_img_url = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/testimonial.jpg';
                    if (is_multisite()){
                    $image_url = $default_img_url;
                  }else{                  
                    $image_url = kaya_image_resize( $default_img_url, '100','100','t' );
                  }
                  echo '<a class="button secondary url" href="#item'. $thumb.'"><img src="'.$image_url.'" alt="'.get_the_title().'" class="img-responsive" /></a>';
                }
                  echo '</div>'; $thumb++;
          endwhile;          
          wp_reset_postdata();  endif;
           echo '</div>';
          $i=1;      
          echo '<div class="testimonial_slider_section">';
          if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
              global $post;
              $t_client_link=get_post_meta(get_the_ID(),'t_client_link' ,true);
              $testimonial_description=get_post_meta(get_the_ID(),'testimonial_description',true);
              $t_client_designation= get_post_meta($post->ID,'t_client_designation',true);
              $testimonial_target_link= get_post_meta($post->ID,'testimonial_target_link',true);
              if( $testimonial_target_link == '1' ){ $target_link_class='target=_blank';}else{ $target_link_class=""; }
                echo '<div class="testimonial_slider  testimonial-'.$tm_rand.'" data-hash="item'. $i.'">';
                    echo '<p style="font-size:'.$instance['tm_description_font_size'].'px; font-style:'.$instance['tm_description_font_style'].'; color:'.$instance['tm_description_color'].';">'.$testimonial_description.'</p>';
                    echo '<span style="background-color:'.$instance['tm_border_color'].';" class="desc_border_bottom"></span>';
                    echo '<h3 style="color:'.$instance['tm_client_name_color'].'; font-size:'.$instance['tm_client_name_size'].'px; font-weight:'.$instance['tm_client_name_font_weight'].'; font-style:'.$instance['tm_client_name_font_style'].';">'.get_the_title().'</h3>';
                    echo '<span class="designation" style="color:'.$instance['designation_color'].'; font-size:'.$instance['designation_font_size'].'px; letter-spacing:'.$instance['designation_letter_spacing'].'px; font-style:'.$instance['designation_font_style'].'; font-weight:'.$instance['designation_font_weight'].';">'.$t_client_designation.'</span>';
                echo '</div>';
                $i++;
          endwhile;          
          wp_reset_postdata();  endif;
          echo '</div>';
             
      echo '</div>';
   echo $args['after_widget'];
  }
  public function form( $instance ){
      global $petshop_plugin_name;
      $kaya_terms=  get_terms('testimonial_category','');
      if( $kaya_terms ){   
      foreach ($kaya_terms as $kaya_term) { 
      $kaya_cat_ids[] = $kaya_term->term_id;
      $kaya_cats_name[] = $kaya_term->name.' - '.$kaya_term->term_id;
      } $slider_items = implode(',', $kaya_cat_ids); }else{ $slider_items = '';  $kaya_cats_name[] =''; }
      $instance = wp_parse_args( $instance, array(
        'testimonial_slide_items' => '1',
        'link' => '#',
        'tm_client_name_color' => '#fff',
        'tm_description_color' => '#fff',
        'testimonial_slide_autoplay' => '',
        'tm_border_color' => '#1a1a1a',
        'kaya_testimonial_cat' => '',
        'tm_description_font_size' => '14',
        'tm_description_font_style' =>  __('normal',$petshop_plugin_name),
        'tm_description_letter_space' => '0',
        'tm_description_font_weight' =>  __('normal',$petshop_plugin_name),
        'tm_client_name_size' => '16',
        'tm_client_name_font_weight' =>  __('normal',$petshop_plugin_name),
        'tm_client_name_leter_sapce' => '0',
        'tm_client_name_font_style' =>  __('normal',$petshop_plugin_name),
        'designation_color' => '#fff',
        'designation_font_size' => '14',
        'designation_letter_spacing' => '0',
        'designation_font_style' => 'normal',
        'designation_font_weight' => 'normal',
        'thumbnails_border_color' => '#fff',
        'thumb_active_border_color' => '#f49c41',
        'animation_names' => '',
  ));
  ?>
  <script type='text/javascript'>
    (function($) {
      "use strict";
      $(function() {
        $('.testimonial_slider_color_pickr').each(function(){
          $(this).wpColorPicker();
        });
      });
    })(jQuery);
  </script> 
  <div class="input-elements-wrapper">   
      <p class="three_fourth">
          <label for="<?php echo $this->get_field_id('kaya_testimonial_cat') ?>">   <?php _e('Enter Testimonial Slider Category IDs : ',$petshop_plugin_name) ?>  </label>
          <input type="text" name="<?php echo $this->get_field_name('kaya_testimonial_cat') ?>" id="<?php echo $this->get_field_id
          ('kaya_testimonial_cat') ?>" class="widefat" value="<?php echo $instance['kaya_testimonial_cat'] ?>" />
          <em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petshop_plugin_name); ?>  </strong> <?php echo implode
          (',', $kaya_cats_name); ?></em><br />
          <stong><?php _e('Note:',$petshop_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petshop_plugin_name); ?>
      </p>
  </div>
  <div class="input-elements-wrapper">
       <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('thumbnails_border_color') ?>"><?php _e('Thumb Image Border Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('thumbnails_border_color') ?>" id="<?php echo $this->get_field_id('thumbnails_border_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo esc_attr($instance['thumbnails_border_color']) ?>"  />
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('thumb_active_border_color') ?>"><?php _e('Thumb Image Active Border Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('thumb_active_border_color') ?>" id="<?php echo $this->get_field_id('thumb_active_border_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo esc_attr($instance['thumb_active_border_color']) ?>"  />
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_description_color') ?>"><?php _e('Description Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('tm_description_color') ?>" id="<?php echo $this->get_field_id('tm_description_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo esc_attr($instance['tm_description_color']) ?>"  />
      </p>
  </div>
  <div class="input-elements-wrapper">
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_description_font_size') ?>">  <?php _e('Description Font Size',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_description_font_size') ?>" name="<?php echo $this->get_field_name('tm_description_font_size') ?>" value="<?php echo esc_attr($instance['tm_description_font_size']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_description_letter_space') ?>">  <?php _e('Description Letter Spacing',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_description_letter_space') ?>" name="<?php echo $this->get_field_name('tm_description_letter_space') ?>" value="<?php echo esc_attr($instance['tm_description_letter_space']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_description_font_style') ?>"> <?php _e('Description Font Style',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('tm_description_font_style') ?>" name="<?php echo $this->get_field_name('tm_description_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['tm_description_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['tm_description_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
          </select>
      </p>
        <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('tm_description_font_weight') ?>"> <?php _e('Description Font Weight',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('tm_description_font_weight') ?>" name="<?php echo $this->get_field_name('tm_description_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['tm_description_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['tm_description_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
          </select>
      </p>
  </div>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_client_name_color') ?>"><?php _e('Client Name Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('tm_client_name_color') ?>" id="<?php echo $this->get_field_id
          ('tm_client_name_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo esc_attr($instance['tm_client_name_color']) ?>" 
          />
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_client_name_size') ?>">  <?php _e('Client Name Font Size',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_client_name_size') ?>" name="<?php echo $this->get_field_name('tm_client_name_size') ?>" value="<?php echo esc_attr($instance['tm_client_name_size']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_client_name_leter_sapce') ?>">  <?php _e('Client Name Letter Space',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('tm_client_name_leter_sapce') ?>" name="<?php echo $this->get_field_name('tm_client_name_leter_sapce') ?>" value="<?php echo esc_attr($instance['tm_client_name_leter_sapce']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
      </p>
      <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('tm_client_name_font_style') ?>"> <?php _e('Client Name Font Style',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('tm_client_name_font_style') ?>" name="<?php echo $this->get_field_name('tm_client_name_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['tm_client_name_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['tm_client_name_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
          </select>
      </p>
  </div>
  <div class="input-elements-wrapper">
    <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_client_name_font_weight') ?>"> <?php _e('Client Name Font Weight',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('tm_client_name_font_weight') ?>" name="<?php echo $this->get_field_name('tm_client_name_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['tm_client_name_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['tm_client_name_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
          </select>
      </p>
       <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('tm_border_color') ?>"><?php _e('Border Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('tm_border_color') ?>" id="<?php echo $this->get_field_id('tm_border_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo $instance['tm_border_color'] ?>" />
      </p>
  </div>
  <div class="input-elements-wrapper">
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('designation_color') ?>"><?php _e('Designation Color',$petshop_plugin_name); ?></label>
          <input type="text" name="<?php echo $this->get_field_name('designation_color') ?>" id="<?php echo $this->get_field_id
          ('designation_color') ?>" class="testimonial_slider_color_pickr" value="<?php echo $instance['designation_color'] ?>" 
          />
      </p>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('designation_font_size') ?>">  <?php _e('Designation Font Size',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('designation_font_size') ?>" name="<?php echo $this->get_field_name('designation_font_size') ?>" value="<?php echo esc_attr($instance['designation_font_size']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
          </p>
          <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('designation_letter_spacing') ?>">  <?php _e('Designation Letter Space',$petshop_plugin_name) ?>  </label>
          <input type="text" class="small-text" id="<?php echo $this->get_field_id('designation_letter_spacing') ?>" name="<?php echo $this->get_field_name('designation_letter_spacing') ?>" value="<?php echo esc_attr($instance['designation_letter_spacing']) ?>" />
          <small>  <?php _e('px',$petshop_plugin_name) ?>  </small> 
      </p>
      <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('designation_font_style') ?>"> <?php _e('Designation Font Style',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('designation_font_style') ?>" name="<?php echo $this->get_field_name('designation_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['designation_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['designation_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
          </select>
      </p>
  </div>
      <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('designation_font_weight') ?>"> <?php _e('Designation Font Weight',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('designation_font_weight') ?>" name="<?php echo $this->get_field_name('designation_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['designation_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['designation_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
          </select>
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?> 
          </label>
          <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
      <p>
<?php  }
 }
petshop_kaya_register_widgets('testimonial-slider', __FILE__);
 ?>