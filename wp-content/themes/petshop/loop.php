<?php
global $more;
$more='0';
 echo '<div class="blog_post_wrapper">';
$kaya_readmore_blog=get_theme_mod('kaya_readmore_blog') ? get_theme_mod('kaya_readmore_blog')  : esc_html__('Read More', 'petshop');
$blog_post_date_title_color = get_theme_mod('blog_post_date_title_color') ? get_theme_mod('blog_post_date_title_color') : '#ffffff';
//$blog_post_date_bg_color = get_theme_mod('blog_post_date_bg_color') ? get_theme_mod('blog_post_date_bg_color') : '#f49c41';
 while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('standard-blog'); ?> >
   <div class="blog_post_content_wrapper">
    <div class="post_img_with_date one_third">
    <?php     
      $img_url = wp_get_attachment_url( get_post_thumbnail_id() );
      $custom_gallery = get_post_meta($post->ID, 'post_gallery', false );
      $video = get_post_meta( get_the_ID(), 'post_video', true ); 
      $kaya_audio = get_post_meta( get_the_ID(), 'kaya_audio', true );
      if(has_post_format()){
        if( get_post_format() == 'quote' ){
          $class="two_third_last";
          $post_date_wrapper = '';
           $button_align_left='button_align_left';
           $img_border='';
        }elseif( (get_post_format() == 'link') || (get_post_format() == 'chat') || (get_post_format() == 'image') || (get_post_format() == 'aside') || (get_post_format() == 'status') ){
            $class="fullwidth";
            $post_date_wrapper = 'fullwidth_meta_date_wrapper';
            $button_align_left='button_align_left';
            $img_border='disable_img_border';
        }elseif( (get_post_format() == 'gallery') ){
          get_template_part( 'formates/'.get_post_format() );
          if( !empty($custom_gallery) ){
              $class="two_third_last";
              $post_date_wrapper = '';
              $button_align_left='';
              $img_border='';
          }else{
              $class="fullwidth";
              $post_date_wrapper = 'fullwidth_meta_date_wrapper';
              $button_align_left='button_align_left';
              $img_border='disable_img_border';
          }
        }elseif( (get_post_format() == 'video') ){
          get_template_part( 'formates/'.get_post_format() );
          if( !empty($video) ){
              $class="two_third_last";
              $post_date_wrapper = '';
              $button_align_left='';
              $img_border='';
          }else{
              $class="fullwidth";
              $post_date_wrapper = 'fullwidth_meta_date_wrapper';
              $button_align_left='button_align_left';
              $img_border='disable_img_border';
          }
        }elseif( (get_post_format() == 'audio') ){
          get_template_part( 'formates/'.get_post_format() );
          if( !empty($kaya_audio) ){
              $class="two_third_last";
              $post_date_wrapper = '';
              $button_align_left='';
              $img_border='';
          }else{
              $class="fullwidth";
              $post_date_wrapper = 'fullwidth_meta_date_wrapper';
              $button_align_left='button_align_left';
              $img_border='disable_img_border';
          }
        }else{
          get_template_part( 'formates/'.get_post_format() );
          $class="two_third_last";
          $post_date_wrapper = '';
          $button_align_left='';
          $img_border='';
        }        
      }else{
        if(has_post_thumbnail()){
            echo '<img src="'.petshop_kaya_img_resize($img_url, '', '', 't').'" class="" alt="'.get_the_title().'" />';
            $class="two_third_last";
            $post_date_wrapper = '';
            $button_align_left='';
            $img_border='';
        }else{
            $class="fullwidth";
            $post_date_wrapper = 'fullwidth_meta_date_wrapper';
            $button_align_left='button_align_left';
            $img_border='disable_img_border';
        }
      } 
   ?>
    </div>
    <?php if( get_post_format() == 'quote' ){
        echo '<div class="post_content_wrapper fullwidth">';
        echo '<div class="post_description_wrapper" style="">';
        get_template_part( 'formates/'.get_post_format() ); 
      }else{
        echo '<div class="post_content_wrapper '.$class.'">';
        echo '<div class="post_description_wrapper" style="">';           
        echo '<h3 class="title_style2">';
          echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
        echo '</h3>'; 
      }  
        echo '<p>'.the_content().'</p>';
        echo '<div class="meta_post_info">';
        echo '<span class="mata_author"><i class="fa fa-user"></i>'. __('Written by ', 'petshop') .'<a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a></span>'; ?>
        <span class="meta_category"><i class="fa fa-tags"></i><?php esc_html_e('Tagged as ', 'petshop')?> <?php echo the_category(', '); ?> </span>
         <span><i class="fa fa-calendar"></i><?php echo get_the_date('M d'); ?></span>
        </div>
         <a class="readmore_button <?php echo esc_attr( $button_align_left ); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo esc_attr( $kaya_readmore_blog ); ?></a>
    </div>     
    </div> 
    </div> 
    
    </article>
  <?php  // Comment Section
  $commentsection = get_post_meta( $post->ID, 'commentsection', true );
  if( $commentsection != "on") {
    comments_template( '', true );
  } ?>
  <?php endwhile; // End the loop. While. ?>
</div>
  <?php /* Display navigation to next/previous pages when applicable */ ?>
  <?php echo petshop_kaya_pagination(); ?>
