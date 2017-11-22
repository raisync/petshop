<?php
class Petshop_Blog_Widget extends WP_Widget{
  public function __construct(){
    global $petshop_plugin_name;
    parent::__construct(  'kaya-blog',
    __('Petshop - Blog',$petshop_plugin_name),
    array( 'description' => __('Use this widget to add blog post items',$petshop_plugin_name) ,'class' => 'kaya_blog' )
    );
  }
  public function widget( $args , $instance ){
      global $petshop_plugin_name, $post;
      wp_enqueue_script('jquery_owlcarousel');
      wp_enqueue_style('css_owl.carousel');
      $instance = wp_parse_args($instance, array(
      'blog_posts_style' => 'standard',
      'post_img_border_color' => '#ffffff',
      'title_font_size' => '25',
      'title_font_style' => 'normal',
      'title_font_weight' => 'normal',
      'content_font_style' => 'normal',
      'content_font_weight' => 'normal',
      'content_font_size' => '15',
      //'post_date_bg_color' => '#f49c41',
      'content_limit' => '50',
      'post_limit' => '10',
      'blog_category' => '',
      'title_color' => '#333333',
      'content_color' => '#757575',
      'posts_link_color' => '#333333',
      'posts_link_hover_color' => '#f49c41',
      'disable_pagination' => '',
      'blog_posts_order_by' => '',
      'blog_posts_order' => '',
      'readmore_button_text' => __('Read More',$petshop_plugin_name),
      //'post_date_color' => '#ffffff',
      'blog_date_color' =>'#ffffff',
      'title_hover_color' => '#f49c41',
      //'posts_bg_color' => '#ffffff',
      'posts_meta_border_top_bottom' => '#cccccc',      
      'readmore_button_bg_color' => '#f49c41',
      'readmore_button_link_color' => '#ffffff',
      'readmore_button_hover_bg_color' => '#ff0000',
      'readmore_button_link_hover_color' => '#ffffff',
      'readmore_button_font_style' => 'normal',
      'readmore_button_font_weight' => 'normal',
      'readmore_button_letter_spacing' => '0',
    ));
    $post_rand =rand(1,100);  
    if( $instance['blog_posts_style'] == 'standard' ){
      $img_container="one_third";
      $container_class = "two_third_last";
      $blog_style_class = array('blog_style1');
      $masonry_class = ''; 

    }else{
      $masonry_class = 'masonry_blog_gallery';
      $img_container="";
      $container_class = "";
      $blog_style_class = array('one_third','blog_style2');
    }
    echo '<div class="blog_post_wrapper '.$masonry_class.'">';
      $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'cat' =>  $instance['blog_category'],
        'post_type' => 'post',
        'posts_per_page' => $instance['post_limit'],
        'paged' => $page,
        'orderby' => $instance['blog_posts_order_by'],
        'order' => $instance['blog_posts_order'],
      );
      query_posts($args);
      if(have_posts() ) : while( have_posts() ) : the_post(); 
        global $post;  
         $post_img_gallery = get_post_meta($post->ID, 'post_gallery', false );
        $video = get_post_meta( $post->ID, 'post_video', true );  ?>
        <article <?php post_class($blog_style_class); ?>>
          <div class="blog_post_content_wrapper">
            <?php
            echo '<div class="post_img_with_date '.$img_container.'">'; 
              $format = get_post_format(); 
              $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
              if( has_post_format('gallery') ){
                gallery_format();
                 if( !empty($post_img_gallery) ){
                  $class = $container_class;
                }else{
                  $class = 'fullwidth';
                }
                $date_class='';
                $button_align_left='';
                $img_border='';
              }elseif( has_post_format('video') ){
                video_format($post);
                if( !empty($video) ){
                  $class = $container_class;
                }else{
                  $class = 'fullwidth';
                }
                $date_class='';
                $button_align_left='';
                $img_border='';
              }elseif(has_post_format('quote')){
                //quote_format();
                $img_border='';
                $class = $container_class;
                $date_class='';
                $button_align_left='button_align_left';
              }elseif(has_post_format('link')){
                link_format();
                $img_border='';
                $class = $container_class;
                $date_class='';
                $button_align_left='';
              }elseif(has_post_format('audio')){
                audio_format();
                $img_border='';
                $class = $container_class;
                $date_class='';
                $button_align_left='';
              }elseif( false === $format){
                if( $img_url ){
                  standard_format($img_url);
                  $img_border='';
                  $class = $container_class;
                  $date_class='';
                  $button_align_left='';
                }else{
                  $class ="fullwidth";
                  $date_class='fullwidth_meta_date_wrapper';
                  $button_align_left='button_align_left';
                  $img_border='disable_img_border';
                }
              }else{            
                $class = $container_class;
                $button_align_left='';   
                $img_border='';     
              }
              if( !has_post_format('gallery') ){
                
              } 
            echo '</div>';
            if( has_post_format('quote') ){
              echo '<div class="post_content_wrapper fullwidth" data-link="'.$instance['posts_link_color'].'" data-link-hover="'.$instance['posts_link_hover_color'].'">';
              echo '<div class="post_description_wrapper">';
              quote_format($instance['title_color']);
            }else{   ?>
              <div class="post_content_wrapper <?php echo $class; ?>"  data-link="<?php echo $instance['posts_link_color']; ?>" data-link-hover="<?php echo $instance['posts_link_hover_color']; ?>">
              <?php
                echo '<div class="post_description_wrapper" >';
                  echo '<h3 class="title_style2" style="color:'.$instance['title_color'].'; font-size:'.$instance['title_font_size'].'px; font-style:'.$instance['title_font_style'].'; font-weight:'.$instance['title_font_weight'].';">';
                  echo '<a style="color:'.$instance['title_color'].';" href="'.get_the_permalink().'" data-title-hover="'.$instance['title_hover_color'].'">';
                  echo get_the_title();
                  echo '</a>';	
                  echo '</h3>'; 
                  echo '<p style="color:'.$instance['content_color'].'; font-size:'.$instance['content_font_size'].'px;  font-style:'.$instance['content_font_style'].'; font-weight:'.$instance['content_font_weight'].';">'.kaya_content_dsiplay_words($instance['content_limit']).'</p>';
            }   
                echo '<div class="meta_post_info" style="color:'.$instance['title_color'].'; border-color:'.$instance['posts_meta_border_top_bottom'].';">';
                echo '<span class="mata_author"><i class="fa fa-user"></i>'. __('Written by ', $petshop_plugin_name) .'<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span>'; ?> |
                <span class="meta_category" ><i class="fa fa-tags"></i><?php _e('Tagged as ', $petshop_plugin_name)?> <?php echo the_category(', '); ?> </span> |
                <span><i class="fa fa-calendar"></i><?php echo get_the_date('M d'); ?></span>
              <?php
              echo '</div>';
              echo '<a class="readmore_button '.$button_align_left.'" style="font-weight:'.$instance['readmore_button_font_weight'].'; font-style:'.$instance['readmore_button_font_style'].'; letter-spacing:'.$instance['readmore_button_letter_spacing'].'px; background:'.$instance['readmore_button_bg_color'].'; color:'.$instance['readmore_button_link_color'].';" data-bg-hover="'.$instance['readmore_button_hover_bg_color'].'" data-link="'.$instance['readmore_button_link_color'].'" data-link-hover="'.$instance['readmore_button_link_hover_color'].'" href="'.get_the_permalink().'">'.$instance['readmore_button_text'].'</a>'; 
              echo '</div>'; ?>
            </div>
            </div>
        </article>
      <?php endwhile; endif; ?>
      </div>
      <?php if( $instance['disable_pagination'] != 'on' ){
        echo petshop_kaya_pagination(); 
      }
      wp_reset_query(); ?>
    
  <?php }
  public function form( $instance ){
    global $petshop_plugin_name;
    $blog_categories = get_categories('hide_empty=0');
    if( $blog_categories ){
      foreach ($blog_categories as $category) {
        $blog_cat_name[] = $category->name .' - '.$category->cat_ID;
        $blog_cat_id[] = $category->cat_ID;
      } } else{   
        $blog_cat_id[] = '';
        $blog_cat_name[] = '';
    }
    $instance = wp_parse_args( $instance, array(
      'blog_posts_style' => 'standard',
      'post_img_border_color' => '#ffffff',
      'title_font_size' => '25',
      'title_font_style' => 'normal',
      'title_font_weight' => 'normal',
      'content_font_style' => 'normal',
      'content_font_weight' => 'normal',
      'content_font_size' => '15',
      //'post_date_bg_color' => '#f49c41',
      'content_limit' => '50',
      'post_limit' => '10',
      'blog_category' => '',
      'title_color' => '#333333',
      'content_color' => '#757575',
      'posts_link_color' => '#333333',
      'posts_link_hover_color' => '#f49c41',
      'disable_pagination' => '',
      'blog_posts_order_by' => '',
      'blog_posts_order' => '',
      'readmore_button_text' => __('Read More',$petshop_plugin_name),
      //'post_date_color' => '#ffffff',
      'blog_date_color' =>'#ffffff',
      'title_hover_color' => '#f49c41',
      //'posts_bg_color' => '#ffffff',
      'posts_meta_border_top_bottom' => '#cccccc',      
      'readmore_button_bg_color' => '#f49c41',
      'readmore_button_link_color' => '#ffffff',
      'readmore_button_hover_bg_color' => '#ff0000',
      'readmore_button_link_hover_color' => '#ffffff',
      'readmore_button_font_style' => 'normal',
      'readmore_button_font_weight' => 'normal',
      'readmore_button_letter_spacing' => '0',
    ) );  ?>
    <script type='text/javascript'>
      (function( $ ) {
      "use strict";
        $('.blog_color_pickr').each(function(){
          $(this).wpColorPicker();
        });
      })(jQuery);
    </script>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('blog_posts_style') ?>"><?php _e('Blog Post Display Style',$petshop_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('blog_posts_style') ?>" name="<?php echo $this->get_field_name('blog_posts_style') ?>">
          <option value="standard" <?php selected('standard', $instance['blog_posts_style']) ?>>  <?php esc_html_e('Standard', $petshop_plugin_name) ?></option>
          <option value="masonry_columns" <?php selected('masonry_columns', $instance['blog_posts_style']) ?>> <?php esc_html_e('Masonry Columns', $petshop_plugin_name) ?></option>
        </select>
      </p>
    </div>
    <div class="input-elements-wrapper">        
      <p class="fullwidth">
        <label for="<?php echo $this->get_field_id('blog_category') ?>">    <?php _e('Enter Blog Category IDs',$petshop_plugin_name) ?>   </label>
        <input type="text" name="<?php echo $this->get_field_name('blog_category') ?>" id="<?php echo $this->get_field_id('blog_category') ?>" class="widefat" value="<?php echo $instance['blog_category'] ?>" />
        <em><strong><?php _e('Available Categories and IDs : ',$petshop_plugin_name); ?> </strong> <?php echo implode(',', $blog_cat_name); ?></em><br />
        <stong><?php _e('Note:',$petshop_plugin_name); ?></strong><?php _e('Separate IDs with commas only',$petshop_plugin_name); ?></stong>
      </p>
      </div>
      <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('blog_posts_order_by') ?>"><?php _e('Orderby',$petshop_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('blog_posts_order_by') ?>" name="<?php echo $this->get_field_name('blog_posts_order_by') ?>">
          <option value="date" <?php selected('date', $instance['blog_posts_order_by']) ?>> <?php esc_html_e('Date', $petshop_plugin_name) ?></option>
          <option value="menu_order" <?php selected('menu_order', $instance['blog_posts_order_by']) ?>><?php esc_html_e('Menu Order', $petshop_plugin_name) ?></option>
          <option value="title" <?php selected('title', $instance['blog_posts_order_by']) ?>> <?php esc_html_e('Title', $petshop_plugin_name) ?></option>
          <option value="rand" <?php selected('rand', $instance['blog_posts_order_by']) ?>>  <?php esc_html_e('Random', $petshop_plugin_name) ?></option>
          <option value="author" <?php selected('author', $instance['blog_posts_order_by']) ?>> <?php esc_html_e('Author', $petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('blog_posts_order') ?>"><?php _e('Order',$petshop_plugin_name)?></label>
        <select id="<?php echo $this->get_field_id('blog_posts_order') ?>" name="<?php echo $this->get_field_name('blog_posts_order') ?>">
          <option value="DESC" <?php selected('DESC', $instance['blog_posts_order']) ?>><?php esc_html_e('Descending', $petshop_plugin_name) ?></option> 
          <option value="ASC" <?php selected('ASC', $instance['blog_posts_order']) ?>><?php esc_html_e('Ascending', $petshop_plugin_name) ?></option>
        </select>
      </p>
    </div>   
    <div class="input-elements-wrapper">
      <p class="one_fifth">
        <label for="<?php echo $this->get_field_id('title_color') ?>"><?php _e('Posts Title  Color',$petshop_plugin_name)?> </label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('title_color') ?>" name="<?php echo $this->get_field_name('title_color') ?>" value="<?php echo $instance['title_color']; ?>" />
      </p>
      <p class="one_fifth">
        <label for="<?php echo $this->get_field_id('title_hover_color') ?>"><?php _e('Posts Title Hover Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('title_hover_color') ?>" name="<?php echo $this->get_field_name('title_hover_color') ?>" value="<?php echo $instance['title_hover_color']; ?>" />
      </p>
      <p class="one_fifth">
        <label for="<?php echo $this->get_field_id('title_font_size') ?>"><?php _e('Posts Title Font Size',$petshop_plugin_name)?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('title_font_size') ?>" name="<?php echo $this->get_field_name('title_font_size') ?>" value="<?php echo $instance['title_font_size']; ?>" />
       <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>
      <p class="one_fifth">
        <label for="<?php echo $this->get_field_id('title_font_style') ?>"> <?php _e('Posts Title Font Style',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('title_font_style') ?>" name="<?php echo $this->get_field_name('title_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['title_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['title_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fifth_last">
        <label for="<?php echo $this->get_field_id('title_font_weight') ?>"> <?php _e('Posts Title Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('title_font_weight') ?>" name="<?php echo $this->get_field_name('title_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['title_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['title_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p>
    </div>   
    <div class="input-elements-wrapper">
      <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('content_color') ?>"><?php _e('Posts Description Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('content_color') ?>" name="<?php echo $this->get_field_name('content_color') ?>" value="<?php echo esc_attr($instance['content_color']); ?>" />
      </p>  
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('content_font_size') ?>"><?php _e('Posts Description Font Size',$petshop_plugin_name)?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('content_font_size') ?>" name="<?php echo $this->get_field_name('content_font_size') ?>" value="<?php echo $instance['content_font_size']; ?>" />
      <small><?php _e('px', $petshop_plugin_name); ?></small>
      </p>
      <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('content_font_style') ?>"> <?php _e('Posts Description Font Style',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('content_font_style') ?>" name="<?php echo $this->get_field_name('content_font_style') ?>">
          <option value="normal" <?php selected('normal', $instance['content_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="italic" <?php selected('italic', $instance['content_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
        </select>
      </p>
      <p class="one_fourth_last">
        <label for="<?php echo $this->get_field_id('content_font_weight') ?>"> <?php _e('Posts Description Font Weight',$petshop_plugin_name) ?></label>
        <select id="<?php echo $this->get_field_id('content_font_weight') ?>" name="<?php echo $this->get_field_name('content_font_weight') ?>">
          <option value="normal" <?php selected('normal', $instance['content_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
          <option value="bold" <?php selected('bold', $instance['content_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
        </select>
      </p>
    </div>   
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('posts_link_color') ?>"><?php _e('Post Meta Links Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_link_color') ?>" name="<?php echo $this->get_field_name('posts_link_color') ?>" value="<?php echo esc_attr($instance['posts_link_color']); ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('posts_link_hover_color') ?>"><?php _e('Post Meta Links Hover Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_link_hover_color') ?>" name="<?php echo $this->get_field_name('posts_link_hover_color') ?>" value="<?php echo esc_attr($instance['posts_link_hover_color']); ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('posts_meta_border_top_bottom') ?>"><?php _e('Post Meta Border Top & Bottom Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('posts_meta_border_top_bottom') ?>" name="<?php echo $this->get_field_name('posts_meta_border_top_bottom') ?>" value="<?php echo esc_attr($instance['posts_meta_border_top_bottom']); ?>" />
      </p>           
    </div>
    <div class="input-elements-wrapper">      
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('readmore_button_text') ?>"><?php _e('Readmore Button Text',$petshop_plugin_name)?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('readmore_button_text') ?>" name="<?php echo $this->get_field_name('readmore_button_text') ?>" value="<?php echo esc_attr($instance['readmore_button_text']); ?>" />
      </p>
      <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('readmore_button_link_color') ?>"><?php _e('Read More Button Link Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('readmore_button_link_color') ?>" name="<?php echo $this->get_field_name('readmore_button_link_color') ?>" value="<?php echo esc_attr($instance['readmore_button_link_color']); ?>" />
      </p> 
      <p class="one_fourth" >
        <label for="<?php echo $this->get_field_id('readmore_button_bg_color') ?>"><?php _e('Read More Button Background Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('readmore_button_bg_color') ?>" name="<?php echo $this->get_field_name('readmore_button_bg_color') ?>" value="<?php echo esc_attr($instance['readmore_button_bg_color']); ?>" />
      </p>  
      <p class="one_fourth_last" >
        <label for="<?php echo $this->get_field_id('readmore_button_link_hover_color') ?>"><?php _e('Read More Button Link Hover Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('readmore_button_link_hover_color') ?>" name="<?php echo $this->get_field_name('readmore_button_link_hover_color') ?>" value="<?php echo esc_attr($instance['readmore_button_link_hover_color']); ?>" />
      </p> 
      <p class="one_fourth" style="clear:both;" >
        <label for="<?php echo $this->get_field_id('readmore_button_hover_bg_color') ?>"><?php _e('Read More Button Hover Background Color',$petshop_plugin_name)?></label>
        <input type="text" class="blog_color_pickr" id="<?php echo $this->get_field_id('readmore_button_hover_bg_color') ?>" name="<?php echo $this->get_field_name('readmore_button_hover_bg_color') ?>" value="<?php echo esc_attr($instance['readmore_button_hover_bg_color']); ?>" />
      </p> 
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_letter_spacing'); ?>">  <?php  _e('Read More Button Letter Spacing',$petshop_plugin_name); ?></label> 
          <input id="<?php echo $this->get_field_id('readmore_button_letter_spacing'); ?>" name="<?php echo $this->get_field_name('readmore_button_letter_spacing'); ?>" type="text" class="small-text" value="<?php echo esc_attr($instance['readmore_button_letter_spacing']) ?>" /><small><?php _e('px',$petshop_plugin_name);?></small>
        </p>
        <p class="one_fourth">
          <label for="<?php echo $this->get_field_id('readmore_button_font_weight') ?>"> <?php _e('Read More Button Font Weight',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('readmore_button_font_weight') ?>" name="<?php echo $this->get_field_name('readmore_button_font_weight') ?>">
            <option value="normal" <?php selected('normal', $instance['readmore_button_font_weight']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
            <option value="bold" <?php selected('bold', $instance['readmore_button_font_weight']) ?>>  <?php esc_html_e('Bold',$petshop_plugin_name) ?></option>
          </select>
        </p>
        <p class="one_fourth_last">
          <label for="<?php echo $this->get_field_id('readmore_button_font_style') ?>"> <?php _e('Read More Button Font Style',$petshop_plugin_name) ?></label>
          <select id="<?php echo $this->get_field_id('readmore_button_font_style') ?>" name="<?php echo $this->get_field_name('readmore_button_font_style') ?>">
            <option value="normal" <?php selected('normal', $instance['readmore_button_font_style']) ?>> <?php esc_html_e('Normal', $petshop_plugin_name) ?>   </option>
            <option value="italic" <?php selected('italic', $instance['readmore_button_font_style']) ?>>  <?php esc_html_e('Italic',$petshop_plugin_name) ?></option>
          </select>
        </p>
    </div>
    <div class="input-elements-wrapper">
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('content_limit') ?>"><?php _e('Post Content Limit',$petshop_plugin_name)?></label>
        <input type="text" class="small-text" id="<?php echo $this->get_field_id('content_limit') ?>" name="<?php echo $this->get_field_name('content_limit') ?>" value="<?php echo esc_attr($instance['content_limit']); ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('post_limit') ?>"><?php _e('Display Posts Per Page',$petshop_plugin_name)?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id('post_limit') ?>" name="<?php echo $this->get_field_name('post_limit') ?>" value="<?php echo esc_attr($instance['post_limit']); ?>" />
      </p>
      <p class="one_fourth">
        <label for="<?php echo $this->get_field_id('disable_pagination') ?>"> <?php _e('Disable Pagination',$petshop_plugin_name) ?> </label>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("disable_pagination"); ?>" name="<?php echo $this->get_field_name("disable_pagination"); ?>"<?php checked( (bool) $instance["disable_pagination"], true ); ?> />
        </p>
    </div>
  <?php  }
}
petshop_kaya_register_widgets('blog', __FILE__);
?>