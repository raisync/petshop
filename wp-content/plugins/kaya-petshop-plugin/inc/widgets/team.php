<?php
class Petshop_Team_Slider_Widget extends WP_Widget
  {
   function __construct()
   {
    global $petshop_plugin_name;
     parent::__construct( 'kaya-team-slider',
      __('Petshop - Team Slider',$petshop_plugin_name),
      array('description' => __('Displays Team Slider',$petshop_plugin_name) )
      );
   }
   function widget( $args, $instance ){
   	  wp_enqueue_script('jquery_owlcarousel');
      wp_enqueue_style('css_owl.carousel');
      global $petshop_plugin_name;
      $instance = wp_parse_args($instance,array(
        'team_category' => '',
        'team_column' => '4',
        'slider_auto_play' => 'true',
        'image_width' => '500',
        'image_height' => '550',
        'img_vertical_title_color' => '#151515',
        'img_vertical_title_font_size' => '18',
        'vertical_title_font_weight' => 'normal',
        'vertical_title_font_style' => 'italic',
        'vertical_title_letter_sapce' => '0',
        'img_hover_title_font_size' => '18',
        'img_hover_title_font_weight' => 'normal',
        'img_hover_title_font_style' => 'normal',
        'img_hover_title_letter_sapce' => '0',
        'description' => '',
        'img_title_border_color' => '#ffffff',
        'img_hover_bg_color' => '#ffffff',
        'img_hover_title_color' => '#151515',
        'img_hover_desc_color' => '#454545',
        'img_hover_desc_font_size' => '15',
        'img_hover_desc_font_style' => 'normal',
        'img_hover_desc_font_weight' => 'normal',
        'img_hover_desc_letter_sapce' => '0',
        'animation_names' => '',
        'slider_nav_activation_color' => '#f49c41',
        'slider_nav_color' => '#ffffff',
        'readmore_button_font_size' => '15',
        'social_icons_font_size' => '14',
        'social_icons_color' => '#f49c41',
        'social_icons_bg_color' => '#151515',
        'social_icons_hover_color' => '#ffffff',
        'social_icons_hover_bg_color' => '#f49c41',
      ));
      echo $args['before_widget'];
      $rand = rand(1,200);
        echo '<style>.team_image_wrapper.team_image_wrapper_'.$rand.' .owl-dot.active, .team_image_wrapper.team_image_wrapper_'.$rand.' .owl-dot:hover{ border-color:'.$instance['slider_nav_activation_color'].'; } .team_image_wrapper_'.$rand.' .owl-dot.active span, .team_image_wrapper_'.$rand.' .owl-dot:hover span{ background-color:'.$instance['slider_nav_activation_color'].'; } .team_image_wrapper.team_image_wrapper_'.$rand.' .owl-dot{ border-color:'.$instance['slider_nav_color'].'; } .team_image_wrapper_'.$rand.' .owl-dot span{ background-color:'.$instance['slider_nav_color'].'; }</style>';
       	echo '<div class="team_image_wrapper team_image_wrapper_'.$rand.'" data-columns="'.$instance['team_column'].'" data-auto-play="'.$instance['slider_auto_play'].'" data-nav-buttons-color="'.$instance['slider_nav_color'].'" data-nav-active-color="'.$instance['slider_nav_activation_color'].'">';
      $array_val = ( !empty( $instance['team_category'] )) ? explode(',', $instance['team_category']) : '';
          if( $array_val ) {
            $loop = new WP_Query(array( 'post_type' => 'team',  'orderby' => 'menu_order', 'posts_per_page' =>10,'order' => 'DESC',  'tax_query' => array('relation' => 'AND', array( 'taxonomy' => 'team_category',   'field' => 'id', 'terms' => $array_val  ), )));
          }else{
            $loop = new WP_Query(array('post_type' => 'team', 'taxonomy' => 'team_category','term' => $instance['team_category'], 'orderby' => 'menu_order', 'posts_per_page' =>10,'order' => 'DESC'));
          }
       if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
        $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
        $team_description = get_post_meta(get_the_id(), 'team_description', true);
        /* Social Media icons */
        $social_awesome_icon='social_awesome_icon';
        $social_media_link='social_media_link';
        for ($i=1; $i < 5; $i++) {
           ${$social_awesome_icon.'_'.$i} = get_post_meta(get_the_id(), $social_awesome_icon.'_'.$i, true);
           ${$social_media_link.'_'.$i} = get_post_meta(get_the_id(), $social_media_link.'_'.$i, true);  	
        }        
       	echo '<div class="image_title_wrapper image_inside_border_title">';
          echo '<span class="image_title_border" style="border-color:'.$instance['img_title_border_color'].'"> </span>';
          echo '<span class="image_Vertical_title" style="background-color:'.$instance['img_title_border_color'].'; color:'.$instance['img_vertical_title_color'].'; font-size:'.$instance['img_vertical_title_font_size'].'px; font-style:'.$instance['vertical_title_font_style'].'; font-weight:'.$instance['vertical_title_font_weight'].'; letter-spacing:'.$instance['vertical_title_letter_sapce'].'px;">'.get_the_title().'</span>';
         

          if( $img_url ){
            echo '<img src="'.kaya_image_resize($img_url,  $instance['image_width'],  $instance['image_height'], 't').'" class="" alt="" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" />';
          }else{
            $default_img_url = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/default_images/portfolio.jpg';
            if (is_multisite()){
              $image_url = $default_img_url;
            }else{                  
              $image_url = kaya_image_resize( $default_img_url, $instance['image_width'],  $instance['image_height'],'t' );
            }
            echo '<img src="'.$image_url.'" class="" alt="" width="'.$instance['image_width'].'" height="'.$instance['image_height'].'" />';
          }
          if( !empty($team_description) ){
            echo '<div class="image_description_wrapper" style="background-color:'.$instance['img_hover_bg_color'].';">';
            echo '<div class="title_description_wrapper">';
              echo '<h3 style="color:'.$instance['img_hover_title_color'].'; font-size:'.$instance['img_hover_title_font_size'].'px; font-style:'.$instance['img_hover_title_font_style'].'; font-weight:'.$instance['img_hover_title_font_weight'].'; letter-spacing:'.$instance['img_hover_title_letter_sapce'].'px;">'.get_the_title().'</h3>';
              echo '<p style="color:'.$instance['img_hover_desc_color'].'; font-size:'.$instance['img_hover_desc_font_size'].'px; font-style:'.$instance['img_hover_desc_font_style'].'; font-weight:'.$instance['img_hover_desc_font_weight'].'; letter-spacing:'.$instance['img_hover_desc_letter_sapce'].'px;">'.$team_description.'</p>';
              echo '<div class="team_social_media_icons"  data-hover-color="'.$instance['social_icons_hover_color'].'" data-hover-bg-color="'.$instance['social_icons_hover_bg_color'].'" >';
              for ($i=1; $i < 5; $i++) {
              	if( !empty(${$social_awesome_icon.'_'.$i}) ){
              		echo '<a style="font-size:'.$instance['social_icons_font_size'].'px; color:'.$instance['social_icons_color'].'; background-color:'.$instance['social_icons_bg_color'].';" href="'.${$social_media_link.'_'.$i}.'"><i class="fa '.${$social_awesome_icon.'_'.$i}.'"></i></a>';
              	}
              }
            echo '</div>';
             echo '</div></div>';
          }
         echo '</div>';
         endwhile; endif;
        
         echo '</div>';
      echo $args['after_widget'];
    }
    function form( $instance ){
     global $petshop_plugin_name;
		 $team_terms=  get_terms('team_category','');
	    if( $team_terms ){
	      foreach ($team_terms as $team_term) { 
	        $team_cat_ids[] = $team_term->term_id;
	         $team_cats_name[] = $team_term->name.' - '.$team_term->term_id;
	      }
	    }else{ $team_cats_name[] = ''; $team_cat_ids[] =''; }
      $instance = wp_parse_args($instance, array(
        'team_category' => '',
        'team_column' => '4',
        'slider_auto_play' => 'true',
        'image_width' => '500',
        'image_height' => '550',
        'img_vertical_title_color' => '#151515',
        'img_vertical_title_font_size' => '18',
        'vertical_title_font_weight' => 'normal',
        'vertical_title_font_style' => 'italic',
        'vertical_title_letter_sapce' => '0',
        'img_hover_title_font_size' => '18',
        'img_hover_title_font_weight' => 'normal',
        'img_hover_title_font_style' => 'normal',
        'img_hover_title_letter_sapce' => '0',
        'description' => '',
        'img_title_border_color' => '#ffffff',
        'img_hover_bg_color' => '#ffffff',
        'img_hover_title_color' => '#151515',
        'img_hover_desc_color' => '#454545',
        'img_hover_desc_font_size' => '15',
        'img_hover_desc_font_style' => 'normal',
        'img_hover_desc_font_weight' => 'normal',
        'img_hover_desc_letter_sapce' => '0',
        'animation_names' => '',
        'slider_nav_activation_color' => '#f49c41',
        'slider_nav_color' => '#ffffff',
        'readmore_button_font_size' => '15',
        'social_icons_font_size' => '14',
        'social_icons_color' => '#f49c41',
        'social_icons_bg_color' => '#151515',
        'social_icons_hover_color' => '#ffffff',
        'social_icons_hover_bg_color' => '#f49c41',
      ));
        ?>
       <script type='text/javascript'>
        jQuery(document).ready(function($) {
          jQuery('.team_color_pickr').each(function(){
            jQuery(this).wpColorPicker();
          });
        });
      </script>
   <div class="input-elements-wrapper">
   	<p class="three_fourth">
		<label for="<?php echo $this->get_field_id('team_category') ?>"> <?php _e('Enter Team Category IDs : ',$petshop_plugin_name) ?> </label>
		<input type="text" name="<?php echo $this->get_field_name('team_category') ?>" id="<?php echo $this->get_field_id('team_category') ?>" class="widefat" value="<?php echo $instance['team_category'] ?>" />
		<em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petshop_plugin_name); ?> </strong> <?php echo implode(', ', $team_cats_name); ?></em><br />
		<stong><?php _e('Note:',$petshop_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petshop_plugin_name); ?>
	</p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('image_width') ?>"> <?php _e('Image Width & Height',$petshop_plugin_name) ?> </label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_width') ?>" value="<?php echo esc_attr($instance['image_width']) ?>" name="<?php echo $this->get_field_name('image_width') ?>" />X
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('image_height') ?>" value="<?php echo esc_attr($instance['image_height']) ?>" name="<?php echo $this->get_field_name('image_height') ?>" />
        <small><?php _e('px',$petshop_plugin_name);?></small>
      </p> 
    </div>
 <div class="input-elements-wrapper">
     <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('team_column') ?>">  <?php _e('Select Columns',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('team_column') ?>" name="<?php echo $this->get_field_name('team_column') ?>">
      <option value="4" <?php selected('4', $instance['team_column']) ?>>  <?php esc_html_e('Column 4', $petshop_plugin_name) ?>    </option>
      <option value="3" <?php selected('3', $instance['team_column']) ?>>  <?php esc_html_e('Column 3', $petshop_plugin_name) ?>    </option>
      <option value="2" <?php selected('2', $instance['team_column']) ?>>    <?php esc_html_e('Column 2', $petshop_plugin_name) ?>    </option>
      <option value="1" <?php selected('1', $instance['team_column']) ?>>    <?php esc_html_e('Column 1', $petshop_plugin_name) ?>    </option>
    </select>
  </p>
<p class="one_fourth">
    <label for="<?php echo $this->get_field_id('slider_auto_play') ?>">  <?php _e('Auto Play',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('slider_auto_play') ?>" name="<?php echo $this->get_field_name('slider_auto_play') ?>">
      <option value="true" <?php selected('True', $instance['slider_auto_play']) ?>>  <?php esc_html_e('True', $petshop_plugin_name) ?>    </option>
      <option value="false" <?php selected('false', $instance['slider_auto_play']) ?>>  <?php esc_html_e('False', $petshop_plugin_name) ?>    </option>
    </select>
  </p> 
  <p class="one_fourth">
    <label for="<?php echo $this->get_field_id('slider_nav_color') ?>">  <?php _e('Slider Navigation Color',$petshop_plugin_name)?>  </label>
   <input type="text" name="<?php echo $this->get_field_name('slider_nav_color') ?>" id="<?php echo $this->get_field_id('slider_nav_color') ?>" class="team_color_pickr" value="<?php echo $instance['slider_nav_color'] ?>" />
  </p>
  <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('slider_nav_activation_color') ?>">  <?php _e('Slider Navigation Active Color',$petshop_plugin_name)?>  </label>
   <input type="text" name="<?php echo $this->get_field_name('slider_nav_activation_color') ?>" id="<?php echo $this->get_field_id('slider_nav_activation_color') ?>" class="team_color_pickr" value="<?php echo $instance['slider_nav_activation_color'] ?>" />
  </p>  
</div>
    <div class="input-elements-wrapper">
    	<p class="one_fourth">
	        <label for="<?php echo $this->get_field_id('img_title_border_color') ?>"> <?php _e('Image Border & Vertical Title BG Color',$petshop_plugin_name) ?>  </label>
	        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('img_title_border_color') ?>" value="<?php echo esc_attr($instance['img_title_border_color']) ?>" name="<?php echo $this->get_field_name('img_title_border_color') ?>" />
      	</p>
       
     	 <p class="one_fourth">
	        <label for="<?php echo $this->get_field_id('img_vertical_title_font_size'); ?>"> <?php _e('Image Vertical Title Font Size',$petshop_plugin_name); ?> </label>  
	        <input type="text" id="<?php echo $this->get_field_id('img_vertical_title_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['img_vertical_title_font_size']) ?>" name="<?php echo $this->get_field_name('img_vertical_title_font_size') ?>" />
	        <small><?php _e('px', $petshop_plugin_name); ?></small>
      	</p>
        <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('vertical_title_font_weight') ?>"> <?php _e('Vertical Title Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('vertical_title_font_weight') ?>" name="<?php echo $this->get_field_name('vertical_title_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['vertical_title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['vertical_title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('vertical_title_font_style') ?>"> <?php _e('Vertical Title Font Style',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('vertical_title_font_style') ?>" name="<?php echo $this->get_field_name('vertical_title_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['vertical_title_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['vertical_title_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth" style="clear:both;">
        <label for="<?php echo $this->get_field_id('vertical_title_letter_sapce') ?>"> <?php _e('Image Vertical Title Letter Size',$petshop_plugin_name) ?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('vertical_title_letter_sapce') ?>" value="<?php echo esc_attr($instance['vertical_title_letter_sapce']) ?>" name="<?php echo $this->get_field_name('vertical_title_letter_sapce') ?>" />
        <small><?php _e('px',$petshop_plugin_name); ?></small>
      </p>
       <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('img_vertical_title_color') ?>"> <?php _e('Image Vertical Title Color',$petshop_plugin_name) ?>  </label>
          <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('img_vertical_title_color') ?>" value="<?php echo esc_attr($instance['img_vertical_title_color']) ?>" name="<?php echo $this->get_field_name('img_vertical_title_color') ?>" />
       </p>
    </div>
    <div class="input-elements-wrapper">
       <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('img_hover_bg_color') ?>"> <?php _e('Image Hover BG Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('img_hover_bg_color') ?>" value="<?php echo esc_attr($instance['img_hover_bg_color']) ?>" name="<?php echo $this->get_field_name('img_hover_bg_color') ?>" />
      </p> 
      <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('img_hover_title_color') ?>"> <?php _e('Image Hover Title Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('img_hover_title_color') ?>" value="<?php echo esc_attr($instance['img_hover_title_color']) ?>" name="<?php echo $this->get_field_name('img_hover_title_color') ?>" />
      </p>
       <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('img_hover_title_font_size'); ?>"> <?php _e('Image Hover Title Font Size',$petshop_plugin_name); ?> </label>  
        <input type="text" id="<?php echo $this->get_field_id('img_hover_title_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['img_hover_title_font_size']) ?>" name="<?php echo $this->get_field_name('img_hover_title_font_size') ?>" />
        <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('img_hover_title_font_weight') ?>"> <?php _e('Image Hover Title Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('img_hover_title_font_weight') ?>" name="<?php echo $this->get_field_name('img_hover_title_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['img_hover_title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['img_hover_title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth" style="clear:both;">
        <label for="<?php echo $this->get_field_id('img_hover_title_font_style') ?>"> <?php _e('Image Hover Title Font Style',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('img_hover_title_font_style') ?>" name="<?php echo $this->get_field_name('img_hover_title_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['img_hover_title_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['img_hover_title_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
        </select>
      </p>
       <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('img_hover_title_letter_sapce') ?>"> <?php _e('Image Hover Title Letter Size',$petshop_plugin_name) ?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('img_hover_title_letter_sapce') ?>" value="<?php echo esc_attr($instance['img_hover_title_letter_sapce']) ?>" name="<?php echo $this->get_field_name('img_hover_title_letter_sapce') ?>" />
        <small><?php _e('px',$petshop_plugin_name); ?></small>
      </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('img_hover_desc_color') ?>"> <?php _e('Image Hover Description Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('img_hover_desc_color') ?>" value="<?php echo esc_attr($instance['img_hover_desc_color']) ?>" name="<?php echo $this->get_field_name('img_hover_desc_color') ?>" />
      </p>  
       <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('img_hover_desc_font_size'); ?>"> <?php _e('Image Hover Description Font Size',$petshop_plugin_name); ?> </label>  
        <input type="text" id="<?php echo $this->get_field_id('img_hover_desc_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['img_hover_desc_font_size']) ?>" name="<?php echo $this->get_field_name('img_hover_desc_font_size') ?>" />
        <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>   
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('img_hover_desc_font_weight') ?>"> <?php _e('Image Hover Description Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('img_hover_desc_font_weight') ?>" name="<?php echo $this->get_field_name('img_hover_desc_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['img_hover_desc_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['img_hover_desc_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth_last" >
        <label for="<?php echo $this->get_field_id('img_hover_desc_font_style') ?>"> <?php _e('Image Hover Description Font Style',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('img_hover_desc_font_style') ?>" name="<?php echo $this->get_field_name('img_hover_desc_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['img_hover_desc_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['img_hover_desc_font_style']) ?>>  <?php esc_html_e('Italic', $petshop_plugin_name) ?></option>
        </select>
      </p>
       <p class="one_fourth" style="clear:both;">
        <label for="<?php echo $this->get_field_id('img_hover_desc_letter_sapce') ?>"> <?php _e('Image Hover Description Letter Size',$petshop_plugin_name) ?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('img_hover_desc_letter_sapce') ?>" value="<?php echo esc_attr($instance['img_hover_desc_letter_sapce']) ?>" name="<?php echo $this->get_field_name('img_hover_desc_letter_sapce') ?>" />
        <small><?php _e('px',$petshop_plugin_name); ?></small>
      </p> 
    </div>
    <div class="input-elements-wrapper">
    <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('social_icons_font_size'); ?>"> <?php _e('Social Icons Font Size',$petshop_plugin_name); ?> </label>  
        <input type="text" id="<?php echo $this->get_field_id('social_icons_font_size') ?>" class="small-text" value="<?php echo esc_attr($instance['social_icons_font_size']) ?>" name="<?php echo $this->get_field_name('social_icons_font_size') ?>" />
        <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p> 
       <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('social_icons_bg_color') ?>"> <?php _e('Social Icons Background Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('social_icons_bg_color') ?>" value="<?php echo esc_attr($instance['social_icons_bg_color']) ?>" name="<?php echo $this->get_field_name('social_icons_bg_color') ?>" />
      </p> 
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('social_icons_color') ?>"> <?php _e('Social Icons Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('social_icons_color') ?>" value="<?php echo esc_attr($instance['social_icons_color']) ?>" name="<?php echo $this->get_field_name('social_icons_color') ?>" />
      </p>  
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('social_icons_hover_bg_color') ?>"> <?php _e('Social Icons Hover Background Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('social_icons_hover_bg_color') ?>" value="<?php echo esc_attr($instance['social_icons_hover_bg_color']) ?>" name="<?php echo $this->get_field_name('social_icons_hover_bg_color') ?>" />
      </p> 
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('social_icons_hover_color') ?>"> <?php _e('Social Icons Hover Color',$petshop_plugin_name) ?>  </label>
        <input type="text" class="team_color_pickr" id="<?php echo $this->get_field_id('social_icons_hover_color') ?>" value="<?php echo esc_attr($instance['social_icons_hover_color']) ?>" name="<?php echo $this->get_field_name('social_icons_hover_color') ?>" />
      </p>  
          
    </div>
      <p class="fullwidth" style="clear:both;">
       <label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
        <?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
      </p> 
    <?php }
}
petshop_kaya_register_widgets('team-slider', __FILE__);
 ?>