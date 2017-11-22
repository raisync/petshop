<?php
class Petshop_Recent_Posts_Widget extends WP_Widget{
	public function __construct(){
		global $petshop_plugin_name;
		parent:: __construct('kaya-recentposts', __('Petshop Recent posts Slider',$petshop_plugin_name),
			array( 'description' => __('Use this widget to add recentposts',$petshop_plugin_name),'class' =>'recentposts')
		);
	}
	public function widget($args, $instance){
		echo $args['before_widget'];
		global $post;
		global $petshop_plugin_name;
		$instance = wp_parse_args( $instance,array(
			'recent_blog_post' => '',
			'limit' => '45',
			'limit_content'=> '25',
			'order_by' => 'id',
            'order' => 'desc',
            'recent_posts_column' =>'2',
            'recent_post_image_width' => '200',
            'recent_post_image_height' => '200',
            'title_font_color' => '#000',
            'title_font_size' => '25',
            'date_color' => '#F49C41',
            'animation_names' => '',
            'post_description_color' => '',
            'description_font_size' => '16',
            'post_img_border_color' => '#BAC2C4',
            'slider_arrows_bg_color' => '',
	        'slider_arrows_color' => '',
	        'slider_arrows_border_color' => '',
    	));
		$post_rand = rand(1,20); ?>
	<style type="text/css">
	.resent_posts_customNavigation a{
					background-color: <?php echo $instance['slider_arrows_bg_color'] ?>;
					color: <?php echo $instance['slider_arrows_color'] ?>!important;
				}
				.resent_posts_customNavigation .btn,.resent_posts_customNavigation .btn:hover{
					border:1px solid <?php echo $instance['slider_arrows_border_color'] ?>!important;
				}
	</style>
		<?php $posts_animation = ( trim($instance['animation_names']) ) ?  "wow ".$instance['animation_names']."":'';
		$line_height  = round((1.5 * $instance['title_font_size'])); 
		$recent_post_image_width = $instance['recent_post_image_width'] ? $instance['recent_post_image_width'] : '';
        $recent_post_image_height = $instance['recent_post_image_height'] ? $instance['recent_post_image_height'] : ''; 
        $limit_content = $instance['limit_content'] ? $instance['limit_content'] : '';  ?>
        <div class="resent_posts_customNavigation">
  		<a class="btn prev"><i class="fa fa-chevron-left"></i></a>
 	 	<a class="btn next"><i class="fa fa-chevron-right"></i></a>
		</div>
		<div class="recent_posts_widget_slider" style="min-height:200px;">
		<?php	echo '<span class="slider_bg_loading_img" style="background:url('.constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/ajax-loader.GIF)"></span>'; ?>
		<div class="recent_posts <?php echo $posts_animation; ?>" data-columns= "<?php echo $instance['recent_posts_column']; ?>">
				<?php 
				$loop = new WP_Query(array('post_type' => 'post', 'orderby' => $instance['order_by'], 'order' => $instance['order'], 'posts_per_page' => $instance['limit'], 'cat' =>  $instance['recent_blog_post']));
				if( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();?>
			<div class="recent_post_slider">
					<?php
					$img_url = wp_get_attachment_url( get_post_thumbnail_id() );
						echo '<div class="recent_post_image">'; ?>
					<?php	if( $img_url ){ ?>
							<a href="<?php echo the_permalink(); ?>">
								<?php 	
	
									echo '<img src="'.kaya_image_resize( $img_url, $recent_post_image_width,$recent_post_image_height,'t' ).'" class="" alt="'.get_the_title().'" />';
								
						echo '</a>';
						} else{
						  $image_uri = constant(strtoupper($petshop_plugin_name).'_PLUGIN_URL').'images/recentposts.jpg';
                  echo '<img src="'.kaya_image_resize( $image_uri, $recent_post_image_width,$recent_post_image_height,'t' ).'"  class="" alt="'.get_the_title().'" />';
					}
						echo '</div>';
					?>
					<div class="recent_post_content">
						<span class="recent_posts_date" style="color:<?php echo $instance['date_color']?>"><?php echo get_the_date('d/ m/Y'); ?>
						</span>
						<h4 style="font-size:<?php echo $instance['title_font_size']?>px; line-height:<?php echo $line_height; ?>px; color:<?php echo $instance['title_font_color']?>;">
							<?php  echo get_the_title(); ?>
						</h4> 
						<p style="color:<?php echo $instance['post_description_color'] ?>; font-size:<?php echo $instance['description_font_size'] ?>px;"><?php echo kaya_content_dsiplay_words($limit_content); ?></p>
						<i class="fa fa-comment" aria-hidden="true"></i><span><?php echo comments_popup_link( __( '0 COMMENTS', $petshop_plugin_name ) . '</span>', __( '1 COMMENT', $petshop_plugin_name ), __( '% COMMENTS', $petshop_plugin_name ) ); ?></span>
					</div>
				</div>
				<?php endwhile; endif; ?>
			
			<?php wp_reset_postdata(); ?>
		</div>
	    <?php echo $args['after_widget'];
	}
    public function form($instance){
    	global $petshop_plugin_name;
    	$blog_categories = get_categories('hide_empty=0');
		if( $blog_categories ){
			foreach ($blog_categories as $category) {
			$blog_cat_name[] = $category->name.'-'.$category->cat_ID;
			$blog_cat_id[] = $category->cat_ID;  
		} } 
		else{   
			$blog_cat_id[] = '';
			$blog_cat_name[] ='';
		}
    	$instance = wp_parse_args($instance,array(
    		'recent_blog_post' => implode(',', $blog_cat_id),
    		'limit' => '45',
    		'limit_content'=> '25',
    		'order_by' => 'id',
            'order' => 'desc',
            'recent_posts_column' =>'2',
            'recent_post_image_width' => '200',
            'recent_post_image_height' => '200',
            'title_font_color' => '#000',
            'title_font_size' => '25',
            'date_color' => '#F49C41',
            'animation_names' => '',
            'post_description_color' => '',
            'description_font_size' => '16',
             'post_img_border_color' => '#BAC2C4',
             'slider_arrows_bg_color' => '',
	        'slider_arrows_color' => '',
	        'slider_arrows_border_color' => '',

    	));?>
    	<script type="text/javascript">
    	jQuery(document).ready(function($){
    		jQuery('.recentposts_color_picker').each(function(){
    			jQuery(this).wpColorPicker();
    		});
    	});
    	</script>
    	<div class="input-elements-wrapper"> 
			<p class="three_fourth">
				<label for="<?php echo $this->get_field_id('recent_blog_post') ?>"><?php _e('Select Blog Category IDs',$petshop_plugin_name) ?>
				</label>
				<input type="text" name="<?php echo $this->get_field_name('recent_blog_post') ?>" id="<?php echo $this->get_field_id('recent_blog_post') ?>" class="widefat" value="<?php echo $instance['recent_blog_post'] ?>" />
				<em><strong style="color:green;"><?php _e('Available Categories and IDs : ',$petshop_plugin_name); ?> </strong> <?php echo implode
				(',', $blog_cat_name); ?></em><br />
				<stong><?php _e('Note:',$petshop_plugin_name); ?></strong>
			    <?php _e('Separate IDs with commas only',$petshop_plugin_name); ?>
		 <p class="one_fourth_last">
    <label for="<?php echo $this->get_field_id('recent_posts_column') ?>">  <?php _e('Select Columns',$petshop_plugin_name)?>  </label>
    <select id="<?php echo $this->get_field_id('recent_posts_column') ?>" name="<?php echo $this->get_field_name('recent_posts_column') ?>">
      <option value="4" <?php selected('4', $instance['recent_posts_column']) ?>>  <?php esc_html_e('Column 4', $petshop_plugin_name) ?>    </option>
      <option value="3" <?php selected('3', $instance['recent_posts_column']) ?>>  <?php esc_html_e('Column 3', $petshop_plugin_name) ?>    </option>
      <option value="2" <?php selected('2', $instance['recent_posts_column']) ?>>    <?php esc_html_e('Column 2', $petshop_plugin_name) ?>    </option>
       <option value="1" <?php selected('1', $instance['recent_posts_column']) ?>>    <?php esc_html_e('Column 1', $petshop_plugin_name) ?>    </option>
    </select>
  </p>
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('limit') ?>">  <?php _e('Display Number of Posts',$petshop_plugin_name)?>  </label>
				<input type="text" class="small-text" id="<?php echo $this->get_field_id('limit') ?>" value="<?php echo esc_attr($instance['limit']) ?>" name="<?php echo $this->get_field_name('limit') ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('limit_content') ?>"><?php _e('Limit Content',$petshop_plugin_name)?>  </label>
				<input type="text" class="small-text" id="<?php echo $this->get_field_id('limit_content') ?>" value="<?php echo esc_attr($instance['limit_content']) ?>" name="<?php echo $this->get_field_name('limit_content') ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('recent_post_image_width'); ?>"> <?php _e('Image Width & Height',$petshop_plugin_name) ?>  </label>
				<input type="text" name="<?php echo $this->get_field_name('recent_post_image_width') ?>" id="<?php echo $this->get_field_id('recent_post_image_width') ?>" class="small-text" value="<?php echo $instance['recent_post_image_width'] ?>" /> X
				<input type="text" name="<?php echo $this->get_field_name('recent_post_image_height') ?>" id="<?php echo $this->get_field_id('recent_post_image_height') ?>" class="small-text" value="<?php echo $instance['recent_post_image_height'] ?>" />
				<small><?php _e('PX',$petshop_plugin_name); ?></small>
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('date_color') ?>"><?php _e('Date Color',$petshop_plugin_name)?></label>
				<input type="text" class="recentposts_color_picker" id="<?php echo $this->get_field_id('date_color') ?>" name="<?php echo $this->get_field_name('date_color') ?>" value="<?php echo $instance['date_color']; ?>" />
			</p>
		</div>
		<div class="input-elements-wrapper"> 
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_font_color') ?>"><?php _e('Title Font Color',$petshop_plugin_name)?></label>
				<input type="text" class="recentposts_color_picker" id="<?php echo $this->get_field_id('title_font_color') ?>" name="<?php echo $this->get_field_name('title_font_color') ?>" value="<?php echo $instance['title_font_color']; ?>" />
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('title_font_size') ?>">  <?php _e('Title Font Size',$petshop_plugin_name) ?>  </label>
				<input type="text" id="<?php echo $this->get_field_id('title_font_size') ?>" class="small-text" name="<?php echo $this->get_field_name('title_font_size') ?>" value = "<?php echo $instance['title_font_size'] ?>" />
				<small><?php _e('px',$petshop_plugin_name);?></small>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('post_description_color') ?>"><?php _e('Description Font Color',$petshop_plugin_name)?></label>
				<input type="text" class="recentposts_color_picker" id="<?php echo $this->get_field_id('post_description_color') ?>" name="<?php echo $this->get_field_name('post_description_color') ?>" value="<?php echo $instance['post_description_color']; ?>" />
			</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('description_font_size') ?>">  <?php _e('Description Font Size',$petshop_plugin_name) ?>  </label>
				<input type="text" id="<?php echo $this->get_field_id('description_font_size') ?>" class="small-text" name="<?php echo $this->get_field_name('description_font_size') ?>" value = "<?php echo $instance['description_font_size'] ?>" />
				<small><?php _e('px',$petshop_plugin_name);?></small>
			</p>
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('order_by') ?>"><?php _e('Orderby',$petshop_plugin_name)?></label>
				<select id="<?php echo $this->get_field_id('order_by') ?>" name="<?php echo $this->get_field_name
				    ('order_by') ?>">
					<option value="date" <?php selected('date', $instance['order_by']) ?>> <?php esc_html_e('Date', $petshop_plugin_name) ?> </option>
					<option value="menu_order" <?php selected('menu_order', $instance['order_by']) ?>>	<?php esc_html_e('Menu Order', $petshop_plugin_name) ?></option>
					<option value="title" <?php selected('title', $instance['order_by']) ?>><?php esc_html_e('Title', $petshop_plugin_name) ?></option>
					<option value="rand" <?php selected('rand', $instance['order_by']) ?>>	<?php esc_html_e('Random', $petshop_plugin_name) ?></option>
					<option value="author" <?php selected('author', $instance['order_by']) ?>>	<?php esc_html_e('Author', $petshop_plugin_name) ?></option>
				</select>
			</p>
			<p class="one_fourth">
				<label for="<?php echo $this->get_field_id('order') ?>"><?php _e('Order',$petshop_plugin_name)?> </label>
				<select id="<?php echo $this->get_field_id('order') ?>" name="<?php echo $this->get_field_name('order') ?>">
					<option value="DESC" <?php selected('DESC', $instance['order']) ?>><?php esc_html_e('Descending', $petshop_plugin_name) ?></option> 
					<option value="ASC" <?php selected('ASC', $instance['order']) ?>><?php esc_html_e('Ascending', $petshop_plugin_name) ?></option>
				</select>
			</p>
		</div>
		<div class="input-elements-wrapper">
			<p class="one_fourth">
		    <label for="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>">  <?php _e('Slider Navigation Background Color',$petshop_plugin_name)?>  </label>
		    <input type="text" name="<?php echo $this->get_field_name('slider_arrows_bg_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_bg_color') ?>" class="recentposts_color_picker" value="<?php echo $instance['slider_arrows_bg_color'] ?>" />
		</p>
		<p class="one_fourth">
		    <label for="<?php echo $this->get_field_id('slider_arrows_color') ?>">  <?php _e('Slider Navigation Color',$petshop_plugin_name)?>  </label>
		   <input type="text" name="<?php echo $this->get_field_name('slider_arrows_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_color') ?>" class="recentposts_color_picker" value="<?php echo $instance['slider_arrows_color'] ?>" />
		</p>
		<p class="one_fourth">
		    <label for="<?php echo $this->get_field_id('slider_arrows_border_color') ?>">  <?php _e('Slider Arrows Border Color',$petshop_plugin_name)?>  </label>
		   <input type="text" name="<?php echo $this->get_field_name('slider_arrows_border_color') ?>" id="<?php echo $this->get_field_id('slider_arrows_border_color') ?>" class="recentposts_color_picker" value="<?php echo $instance['slider_arrows_border_color'] ?>" />
		</p>
			<p class="one_fourth_last">
				<label for="<?php echo $this->get_field_id('animation_names') ?>">  <?php _e('Select Animation Effect',$petshop_plugin_name) ?>  </label>
				<?php animation_effects($this->get_field_name('animation_names'), $instance['animation_names'] ); ?>
			<p>
		</div>
     <?php
    }
}
petshop_kaya_register_widgets('recent-posts', __FILE__);
?>