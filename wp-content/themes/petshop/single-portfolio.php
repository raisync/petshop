<?php get_header();
$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true) ? get_post_meta(get_the_id(),'kaya_pagesidebar',true) : 'full';
$pf_button_next_text = get_theme_mod('pf_button_next_text') ? get_theme_mod('pf_button_next_text') : esc_html__( 'NEXT','petshop' );
$pf_button_prev_text = get_theme_mod('pf_button_prev_text') ? get_theme_mod('pf_button_prev_text') : esc_html__( 'PREV','petshop' );
switch( $sidebar_layout ){
	case 'leftsidebar':
		$sidebar_class="three_fourth_last";
		break;
	case 'rightsidebar':
		$sidebar_class="three_fourth";
		break;	
	case 'full':
		$sidebar_class="fullwidth";
		break;		
}
$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_fourth' : 'one_fourth_last';
//Social Sharing ICons
$pf_disable_facebook_icon = get_theme_mod('pf_disable_facebook_icon') ? get_theme_mod('pf_disable_facebook_icon') : '0';
$pf_disable_twitter_icon = get_theme_mod('pf_disable_twitter_icon') ? get_theme_mod('pf_disable_twitter_icon') : '0';
$pf_disable_google_plus_icon = get_theme_mod('pf_disable_google_plus_icon') ? get_theme_mod('pf_disable_google_plus_icon') : '0';
$pf_disable_pinterest_icon = get_theme_mod('pf_disable_pinterest_icon') ? get_theme_mod('pf_disable_pinterest_icon') : '0';
$pf_disable_stumbleupon_icon = get_theme_mod('pf_disable_stumbleupon_icon') ? get_theme_mod('pf_disable_stumbleupon_icon') : '0';
$pf_disable_digg_icon = get_theme_mod('pf_disable_digg_icon') ? get_theme_mod('pf_disable_digg_icon') : '0';
$pf_disable_linkedin_icon = get_theme_mod('pf_disable_linkedin_icon') ? get_theme_mod('pf_disable_linkedin_icon') : '0';
$pf_disable_email_icon = get_theme_mod('pf_disable_email_icon') ? get_theme_mod('pf_disable_email_icon') : '0';
$change_your_email_address_text = get_theme_mod('change_your_email_address_text') ? get_theme_mod('change_your_email_address_text') : esc_html__('Your Email Address','petshop');
$change_your_name_text = get_theme_mod('change_your_name_text') ? get_theme_mod('change_your_name_text') : esc_html__('Your Name','petshop');
$change_send_email_text = get_theme_mod('change_send_email_text') ? get_theme_mod('change_send_email_text') : esc_html__('Send to Email Address','petshop');
$change_form_submit_button_text = get_theme_mod('change_form_submit_button_text') ? get_theme_mod('change_form_submit_button_text') : esc_html__('SUBMIT','petshop');
$pf_nav_buttons_enable = get_theme_mod('pf_nav_buttons_enable') ? get_theme_mod('pf_nav_buttons_enable') :0;
// Short List Button Text
$remove_short_list_button_text = get_theme_mod('remove_short_list_button_text') ? get_theme_mod('remove_short_list_button_text') :'REMOVE';
$short_list_button_text = get_theme_mod('short_list_button_text') ? get_theme_mod('short_list_button_text') :'SHORTLIST';
?>
<!-- Start Middle Section  -->
<div id="mid_container_wrapper" class="mid_container_wrapper_section">
	<div id="mid_container" class="container">
	<div class="entry-content">
	<?php
	echo '<div class="single_page_content_wrapper">';
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$selected = '';
		if(isset($_SESSION['shortlist'])) {
			if ( in_array($id, $_SESSION['shortlist']) ) {
				$selected = 'item_selected';
			}
		}
	?>
		<div id="<?php the_ID(); ?>" <?php post_class('portfolio_main_content_wrapper item '.$selected); ?>> <!-- Start Portfolio -->
			<?php
			global $wp_query, $current_user;
			$post_array_data = $wp_query->get_queried_object();
			$user_ID = get_current_user_id();
			$upload_pf_tab2_images = rwmb_meta( 'upload_pf_tab2_images', 'type=image&size=full' );
			$upload_pf_tab1_images = rwmb_meta( 'upload_pf_tab1_images', 'type=image&size=full' );
			$pf_custom_video_urls=get_post_meta(get_the_id(),'pf_custom_video_urls',true) ? get_post_meta(get_the_id(),'pf_custom_video_urls',true) : '';
			$pf_gallery_tab1_images = get_post_meta(get_the_id(),'pf_gallery_tab1_images', true);
			$pf_tab1_title_name=get_post_meta(get_the_id(),'pf_tab1_title_name',true) ? get_post_meta(get_the_id(),'pf_tab1_title_name',true) : esc_html__( 'PORTFOLIO','petshop');
			$pf_tab1_images_columns=get_post_meta(get_the_id(),'pf_tab1_images_columns',true) ? get_post_meta(get_the_id(),'pf_tab1_images_columns',true) : '4';
			$enable_pf_gallery_tab1_images = ( $pf_gallery_tab1_images == '1' ) ? 'pf_enable_gallery_images gallery_images_column'.$pf_tab1_images_columns : 'gallery_horizontal';
			$pf_videos_tab_name=get_post_meta(get_the_id(),'pf_videos_tab_name',true) ? get_post_meta(get_the_id(),'pf_videos_tab_name',true) : 'VIDEOS';
			$pf_videos_columns=get_post_meta(get_the_id(),'pf_videos_columns',true) ? get_post_meta(get_the_id(),'pf_videos_columns',true) : '4';
			$pf_tab1_images_height=get_post_meta(get_the_id(),'pf_tab1_images_height',true) ? get_post_meta(get_the_id(),'pf_tab1_images_height',true) : '500';
			$pf_short_desc_tab_title=get_post_meta(get_the_id(),'pf_short_desc_tab_title',true) ? get_post_meta(get_the_id(),'pf_short_desc_tab_title',true) : esc_html__( 'SHORT DESCRIPTION', 'petshop');
			$pf_model_short_biography=get_post_meta(get_the_id(),'pf_model_short_biography',true) ? get_post_meta(get_the_id(),'pf_model_short_biography',true) : '';
			$pf_model_experience=get_post_meta(get_the_id(),'pf_model_experience',true) ? get_post_meta(get_the_id(),'pf_model_experience',true) : '';
			$pf_model_talents=get_post_meta(get_the_id(),'pf_model_talents',true) ? get_post_meta(get_the_id(),'pf_model_talents',true) : '';
			
			//Tab2
			$upload_pf_tab2_images = rwmb_meta( 'upload_pf_tab2_images', 'type=image&size=full' );
			$pf_gallery_tab2_images = get_post_meta(get_the_id(),'pf_gallery_tab2_images', true);
			$pf_tab2_title_name=get_post_meta(get_the_id(),'pf_tab2_title_name',true) ? get_post_meta(get_the_id(),'pf_tab2_title_name',true) : 'POLAROID';
			$pf_tab2_images_height=get_post_meta(get_the_id(),'pf_tab2_images_height',true) ? get_post_meta(get_the_id(),'pf_tab2_images_height',true) : '500';
			$pf_tab2_images_columns=get_post_meta(get_the_id(),'pf_tab2_images_columns',true) ? get_post_meta(get_the_id(),'pf_tab2_images_columns',true) : '4';
			$enable_pf_gallery_tab2_images = ( $pf_gallery_tab2_images == '1' ) ? 'pf_enable_gallery_images gallery_images_column'.$pf_tab2_images_columns: 'gallery_horizontal';
			$pf_tab2_custom_text=get_post_meta(get_the_id(),'pf_tab2_custom_text',true) ? get_post_meta(get_the_id(),'pf_tab2_custom_text',true) : '';
			//Tab3
			$upload_pf_tab3_images = rwmb_meta( 'upload_pf_tab3_images', 'type=image&size=full' );
			$pf_gallery_tab3_images = get_post_meta(get_the_id(),'pf_gallery_tab3_images', true);
			$pf_tab3_title_name=get_post_meta(get_the_id(),'pf_tab3_title_name',true) ? get_post_meta(get_the_id(),'pf_tab3_title_name',true) : 'TAB3 TITLE';
			$pf_tab3_images_height=get_post_meta(get_the_id(),'pf_tab3_images_height',true) ? get_post_meta(get_the_id(),'pf_tab3_images_height',true) : '500';
			$pf_tab3_images_columns=get_post_meta(get_the_id(),'pf_tab3_images_columns',true) ? get_post_meta(get_the_id(),'pf_tab3_images_columns',true) : '4';
			$enable_pf_gallery_tab3_images = ( $pf_gallery_tab3_images == '1' ) ? 'pf_enable_gallery_images gallery_images_column'.$pf_tab3_images_columns: 'gallery_horizontal';
			$pf_tab3_custom_text=get_post_meta(get_the_id(),'pf_tab3_custom_text',true) ? get_post_meta(get_the_id(),'pf_tab3_custom_text',true) : '';
			//Tab4
			$upload_pf_tab4_images = rwmb_meta( 'upload_pf_tab4_images', 'type=image&size=full' );
			$pf_gallery_tab4_images = get_post_meta(get_the_id(),'pf_gallery_tab4_images', true);
			$pf_tab4_title_name=get_post_meta(get_the_id(),'pf_tab4_title_name',true) ? get_post_meta(get_the_id(),'pf_tab4_title_name',true) : 'TAB4 TITLE';
			$pf_tab4_images_height=get_post_meta(get_the_id(),'pf_tab4_images_height',true) ? get_post_meta(get_the_id(),'pf_tab4_images_height',true) : '500';
			$pf_tab4_images_columns=get_post_meta(get_the_id(),'pf_tab4_images_columns',true) ? get_post_meta(get_the_id(),'pf_tab4_images_columns',true) : '4';
			$enable_pf_gallery_tab4_images = ( $pf_gallery_tab4_images == '1' ) ? 'pf_enable_gallery_images gallery_images_column'.$pf_tab4_images_columns: 'gallery_horizontal';
			$pf_tab4_custom_text=get_post_meta(get_the_id(),'pf_tab4_custom_text',true) ? get_post_meta(get_the_id(),'pf_tab4_custom_text',true) : '';
			//Tab5
			$upload_pf_tab5_images = rwmb_meta( 'upload_pf_tab5_images', 'type=image&size=full' );
			$pf_gallery_tab5_images = get_post_meta(get_the_id(),'pf_gallery_tab5_images', true);
			$pf_tab5_title_name=get_post_meta(get_the_id(),'pf_tab5_title_name',true) ? get_post_meta(get_the_id(),'pf_tab5_title_name',true) : 'TAB5 TITLE';
			$pf_tab5_images_height=get_post_meta(get_the_id(),'pf_tab4_images_height',true) ? get_post_meta(get_the_id(),'pf_tab5_images_height',true) : '500';
			$pf_tab5_images_columns=get_post_meta(get_the_id(),'pf_tab4_images_columns',true) ? get_post_meta(get_the_id(),'pf_tab5_images_columns',true) : '4';
			$enable_pf_gallery_tab5_images = ( $pf_gallery_tab5_images == '1' ) ? 'pf_enable_gallery_images gallery_images_column'.$pf_tab5_images_columns: 'gallery_horizontal';
			$pf_tab5_custom_text=get_post_meta(get_the_id(),'pf_tab5_custom_text',true) ? get_post_meta(get_the_id(),'pf_tab5_custom_text',true) : '';
			//
			$pf_image_width = ( ($pf_tab1_images_columns == '3') ||  ($pf_tab2_images_columns == '3') ) ? ' 650 ' : '480';
			echo '<div class="portfolio_left_content_section" style="background-color:#FFFFFF;">'; // Left Side Section
				echo '<div class="container" style="padding:30px;">';
					echo '<span class="pf_back_to_page"><a href="javascript: history.go(-1)" title="'.esc_html__('Back to page','petshop').'"><i class="fa fa-th"> </i></a></span>';
					// Display Model Information
					$custom_pf_options = get_option('pf_custom_options');
					$prefix = 'pf_model_';
					 unset($custom_pf_options['pf_meta_label_name'][0]);
					 $count = count($custom_pf_options['pf_meta_label_name'])-1;
					if( $count > 0 ){
						echo '<div class="pf_model_info_wrapper"><ul>';
						for ($i=0; $i < count($custom_pf_options['pf_meta_label_name']); $i++) {
							if( ( !empty($custom_pf_options['pf_meta_label_name'][$i]) ) &&  ( $custom_pf_options['pf_meta_label_name'][$i] != 'Array') &&  ( $custom_pf_options['pf_meta_label_name'][$i] != '') &&  ( !is_array($custom_pf_options['pf_meta_label_name'][$i]) )){
									$options_data_id = $prefix.str_replace(array(' ', ',','-', '/', '___'), '_', trim(strtolower($custom_pf_options['pf_meta_label_uid'][$i])));
									//$mutilple_items = ( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ) ? 'false' : 'true';
									if( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
										$meta_data = get_post_meta(get_the_ID(), $options_data_id , false);
									}else{
										$meta_data = get_post_meta(get_the_ID(), $options_data_id , true);
									}
								if( !empty( $meta_data) ){
									if( $custom_pf_options['pf_meta_field_name'][$i] == 'date' ){
										$option_value = petshop_kaya_dob_cal($meta_data, $custom_pf_options['pf_meta_field_date_format'][$i]);
									}elseif( $custom_pf_options['pf_meta_field_name'][$i] == 'checkbox' ){
										$option_value = implode(',', $meta_data);
									}else{
										$option_value = str_replace('.', "'", $meta_data);
									}
									$pf_option_visibility = ( $custom_pf_options['pf_option_visibility'][$i] == 'false' ) ? 'pf_options_visibility' : '';
									echo '<li><strong>'.trim($custom_pf_options['pf_meta_label_name'][$i]).' : </strong><span class="'.$pf_option_visibility.'">'.$option_value.'</span></li>';
								}
							}
						}
						echo '</ul></div>';
					}
					// End
					echo '<div class="pf_item_add_remove">';
						echo '<a href="#" class="action add" data-action="add"><i class="fa fa-plus"></i>'.trim($short_list_button_text).'</a>'; //Shortlist data
						echo '<a href="#" class="action remove" data-action="remove"><i class="fa fa-minus"></i>'.trim($remove_short_list_button_text).'</a>';
					echo '</div>';
				//Model Tabs
				if(!empty($upload_pf_tab2_images) || !empty($pf_custom_video_urls) || !empty($upload_pf_tab1_images) || !empty($upload_pf_tab3_images) || !empty($upload_pf_tab4_images) || !empty($upload_pf_tab5_images) ||  !empty($portfolio_model_biography) || !empty($pf_tab2_custom_text) || !empty($pf_tab3_custom_text) || !empty($pf_tab4_custom_text) || !empty($pf_tab5_custom_text) ){
					if( ( !empty($pf_custom_video_urls) && !empty($upload_pf_tab2_images) ) ||  ( !empty($upload_pf_tab1_images) && !empty($upload_pf_tab2_images) ) ||  ( !empty($upload_pf_tab1_images) && !empty($pf_custom_video_urls) ) || ( !empty($pf_model_short_biography) && !empty($pf_model_experience) ) || ( !empty($pf_model_short_biography) && !empty($pf_model_talents) ) || ( !empty($pf_model_experience) && !empty($pf_model_short_biography) ) || ( !empty($pf_model_experience) && !empty($pf_model_talents) ) || ( !empty($pf_model_talents) && !empty($pf_model_short_biography) ) || ( !empty($pf_model_talents) && !empty($pf_model_experience) ) 

						|| ( !empty($upload_pf_tab1_images) && !empty($upload_pf_tab3_images) ) || ( !empty($upload_pf_tab1_images) && !empty($upload_pf_tab4_images) ) || ( !empty($upload_pf_tab1_images) && !empty($upload_pf_tab5_images) ) 

						|| ( ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) && ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) ) || ( ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) && ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) ) || ( ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) && ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) ) //Tab2

						|| ( ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) && !empty($upload_pf_tab1_images) ) || ( ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) && ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) ) || ( ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) && ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) ) || ( ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) && ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) ) || ( ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) && ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) ) // Tab3

						|| ( ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) && !empty($upload_pf_tab1_images) ) || ( ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) && ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) ) || ( ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) && ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) ) || ( ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) && ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) ) || ( ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) && ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) ) // Tab4

						|| ( ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) && !empty($upload_pf_tab1_images) ) || ( ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) && ( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ) ) || ( ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) && ( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ) ) || ( ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) && ( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ) ) || ( ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) && ( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ) ) // Tab5

						|| ( ( !empty($upload_pf_tab1_images) || !empty($pf_tab1_custom_text) || !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text) || !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text) || !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text) || !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text) ) && ( ( !empty($pf_model_short_biography) || !empty($pf_model_experience) || !empty($pf_model_talents) ) ) ) // Tabs & Biography tabs
						
						)
						{	
					echo '<div class="pf_tab_list">';
						echo '<ul>';
							if( !empty($upload_pf_tab1_images) ){
								echo '<li class="pf_tabs_style"><a href="#pf_image_gallery">'.esc_attr( $pf_tab1_title_name ).'</a></li>';
							}
							if( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ){
								echo '<li  class="pf_tabs_style"><a href="#pf_tab5">'.esc_attr( $pf_tab5_title_name ).'</a></li>';
							}
							if( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ){
								echo '<li  class="pf_tabs_style"><a href="#pf_tab3">'.esc_attr( $pf_tab3_title_name ).'</a></li>';
							}
							if( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text)  ){
								echo '<li  class="pf_tabs_style"><a href="#pf_tab4">'.esc_attr( $pf_tab4_title_name ).'</a></li>';
							}							
							if( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text)  ){
								echo '<li  class="pf_tabs_style"><a href="#pf_tab2">'.esc_attr( $pf_tab2_title_name ).'</a></li>';
							}
							if( !empty($pf_custom_video_urls) ){
								echo '<li  class="pf_tabs_style"><a href="#video_iframes">'.esc_attr( $pf_videos_tab_name ).'</a></li>';
							}
							if( ( !empty($pf_model_short_biography) || !empty($pf_model_experience) || !empty($pf_model_talents) ) ){
								echo '<li  class="pf_tabs_style"><a href="#model_description">'.esc_attr( $pf_short_desc_tab_title ).'</a></li>';
							}
						echo '</ul>';
					echo '</div>';	
						}
					}
					//Social Share Icons ?>
				
				<?php echo '</div>';	
			echo '</div>'; // End Left Side Section ?>
			<div class="user_send_email_post">
					<div class="success_result" style="display:none;"></div>
					<input type="hidden" name="user_post_link" id="user_post_link" value="<?php echo get_permalink(); ?>" />
					<p><input type="text" name="user_email" id="user_email" value="" placeholder="<?php echo trim($change_your_email_address_text); ?>" /></p>
					<p><input type="text" name="user_name" id="user_name" value="" placeholder="<?php echo trim($change_your_name_text); ?>" /></p>
					<p><input type="text" name="receiver_email" id="receiver_email" value="" placeholder="<?php echo trim($change_send_email_text); ?>" /></p>
					<input type="submit" id="send_mail_to_post" class="user_profile_button" value= "<?php echo trim($change_form_submit_button_text); ?>" /><img class="mail_form_load_img" style="display:none" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.GIF" class="" />
				</div>
			<?php echo '<div class="portfolio_right_content_section">'; // Right Side Content Section
					echo '<img src="'.get_template_directory_uri().'/images/ajax-loader.GIF" class="tab_content_wrapper_loader" />';
					echo '<div class="pf_tabs_content_wrapper">';
						if( !empty($upload_pf_tab1_images) ){ // Tab1
							echo '<div id="pf_image_gallery" class="pf_tab_content">';		   		
								if ( is_array( $upload_pf_tab1_images ) ){
									if(  $pf_gallery_tab1_images != '1'){
										echo '<div class="single_page_slider_loader"> </div>';
										$slider1_img_height = "style='height:{$pf_tab1_images_height}px;'";
										$gallery_type = 'slider';
									}else{
										$slider1_img_height ='';
										$gallery_type = 'gallery';
									}
									echo '<div id="gallery_horizontal" class="'.esc_attr( $enable_pf_gallery_tab1_images ).' clearfix " data-column="'.esc_attr( $pf_tab1_images_columns ).'">';
									foreach ( $upload_pf_tab1_images as $image ){
										if( $pf_gallery_tab1_images != '1' ){
											$image_url = $image['url'];
											echo '<div class="horizontal_item">';
										}else{
											$image_url = petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab1_images_height ), 't');
										}
										echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery_".$gallery_type."]' >"; 
												echo "<img class='' src='".$image_url."' alt='{$image['title']}' width=''  height='' ".$slider1_img_height." />";
											echo '</a>';
										if( $pf_gallery_tab1_images != '1' ){	
											echo '</div>';
										}
									}
									echo '</div>';
								}else{
									foreach ( $upload_pf_tab1_images as $image ) {
										echo "<img class='' src='".petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab1_images_height ), 't')."' alt='{$image['title']}' width='".esc_attr( $pf_image_width )."' height='".esc_attr( $pf_tab1_images_height )."'  />"; 
									}
								}
							echo '</div>';
						}
						if( !empty($upload_pf_tab2_images) || !empty($pf_tab2_custom_text) ){ // Tab2
							echo '<div id="pf_tab2" class="pf_tab_content">';
								if( !empty($upload_pf_tab2_images)  ){		   		
									if ( is_array( $upload_pf_tab2_images ) ){
										if(  $pf_gallery_tab2_images != '1'){
											echo '<div class="single_page_slider_loader"> </div>';
											$slider2_img_height = "style='height:{$pf_tab2_images_height}px;'";
										}else{
											$slider2_img_height ='';
										}
										echo '<div id="gallery_horizontal" class="'.esc_attr( $enable_pf_gallery_tab2_images ).' clearfix " data-column="'.esc_attr( $pf_tab2_images_columns ).'">';
										foreach ( $upload_pf_tab2_images as $image ){
											if( $pf_gallery_tab2_images != '1' ){
												echo '<div class="horizontal_item">';
												$image_url = $image['url'];
											}else{
												$image_url = petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab2_images_height ), 't');
											}
												echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery]' >"; 
													echo "<img class='' src='".$image_url."' alt='{$image['title']}' ".$slider2_img_height." />";
												echo '</a>';
											if( $pf_gallery_tab2_images != '1' ){	
												echo '</div>';
											}
										}
										echo '</div>';
									}else{
										foreach ( $upload_pf_tab2_images as $image ) {
											echo "<img class='' src='".petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab2_images_height ), 't')."' alt='{$image['title']}' width='".esc_attr( $pf_image_width )."' height='".esc_attr( $pf_tab2_images_height )."'  />"; 
										}
									}
								}	
								if( trim(!empty($pf_tab2_custom_text)) ){
									echo '<div class="clear">&nbsp;</div>';
									echo trim(do_shortcode($pf_tab2_custom_text));
								}
							echo '</div>';
						}
						if( !empty($upload_pf_tab3_images) || !empty($pf_tab3_custom_text)  ){// Tab3
							echo '<div id="pf_tab3" class="pf_tab_content">';
								if(  !empty($upload_pf_tab3_images) ){	   		
									if ( is_array( $upload_pf_tab3_images ) ){
										if(  $pf_gallery_tab3_images != '1'){
											echo '<div class="single_page_slider_loader"> </div>';
											$slider3_img_height = "style='height:{$pf_tab3_images_height}px;'";
										}else{
											$slider3_img_height ='';
										}
										echo '<div id="gallery_horizontal" class="'.esc_attr( $enable_pf_gallery_tab3_images ).' clearfix " data-column="'.esc_attr( $pf_tab3_images_columns ).'">';
										foreach ( $upload_pf_tab3_images as $image ){
											if( $pf_gallery_tab3_images != '1' ){
												echo '<div class="horizontal_item">';
												$image_url = $image['url'];
											}else{
												$image_url = petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab3_images_height ), 't');
											}
												echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery]' >"; 
													echo "<img class='' src='".$image_url."' alt='{$image['title']}' width=''  ".$slider3_img_height." />";
												echo '</a>';
											if( $pf_gallery_tab3_images != '1' ){	
												echo '</div>';
											}
										}
										echo '</div>';
									}else{
										foreach ( $upload_pf_tab3_images as $image ) {
											echo "<img class='' src='".petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab3_images_height ), 't')."' alt='{$image['title']}' width='".esc_attr( $pf_image_width )."' height='".esc_attr( $pf_tab3_images_height )."'  />"; 
										}
									}
								}
								if( trim(!empty($pf_tab3_custom_text)) ){
									echo '<div class="clear">&nbsp;</div>';
									echo trim(do_shortcode($pf_tab3_custom_text));
								}
							echo '</div>';
						}
						if( !empty($upload_pf_tab4_images) || !empty($pf_tab4_custom_text) ){ //Tab4
							echo '<div id="pf_tab4" class="pf_tab_content">';
								if( !empty($upload_pf_tab4_images)  ){		   		
									if ( is_array( $upload_pf_tab4_images ) ){
										if(  $pf_gallery_tab4_images != '1'){
											$slider4_img_height = "style='height:{$pf_tab4_images_height}px;'";
										}else{
											$slider4_img_height ='';
										}
										echo '<div id="gallery_horizontal" class="'.esc_attr( $enable_pf_gallery_tab4_images ).' clearfix " data-column="'.esc_attr( $pf_tab4_images_columns ).'">';
										foreach ( $upload_pf_tab4_images as $image ){
											if( $pf_gallery_tab4_images != '1' ){
													echo '<div class="horizontal_item">';
														$image_url = $image['url'];
													}else{
														$image_url = petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab4_images_height ), 't');
													}
													echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery]' >"; 
														echo "<img class='' src='".$image_url."' alt='{$image['title']}' width='' ".$slider4_img_height." />";
													echo '</a>';
												if( $pf_gallery_tab4_images != '1' ){	
													echo '</div>';
												}
										}
										echo '</div>';
									}else{
										foreach ( $upload_pf_tab4_images as $image ) {
											echo "<img class='' src='".petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab4_images_height ), 't')."' alt='{$image['title']}' width='".esc_attr( $pf_image_width )."' height='".esc_attr( $pf_tab4_images_height )."'  />"; 
										}
									}
								}
								if( trim(!empty($pf_tab4_custom_text)) ){
									echo '<div class="clear">&nbsp;</div>';
									echo trim(do_shortcode($pf_tab4_custom_text));
								}
							echo '</div>';
						}
						if( !empty($upload_pf_tab5_images) || !empty($pf_tab5_custom_text)  ){ //Tab5
							echo '<div id="pf_tab5" class="pf_tab_content">';
							if( !empty($upload_pf_tab5_images)  ){			   		
									if ( is_array( $upload_pf_tab5_images ) ){
										if(  $pf_gallery_tab5_images != '1'){
											$slider5_img_height = "style='height:{$pf_tab5_images_height}px;'";
										}else{
											$slider5_img_height ='';
										}
										echo '<div id="gallery_horizontal" class="'.esc_attr( $enable_pf_gallery_tab5_images ).' clearfix " data-column="'.esc_attr( $pf_tab5_images_columns ).'">';
										foreach ( $upload_pf_tab5_images as $image ){
											if( $pf_gallery_tab5_images != '1' ){
													echo '<div class="horizontal_item">';
													$image_url = $image['url'];
												}else{
													$image_url = petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab5_images_height ), 't');
												}
													echo "<a href='{$image['url']}' title='{$image['title']}' data-gal='prettyPhoto[gallery]' >"; 
														echo "<img class='' src='".$image_url."' alt='{$image['title']}' width=''  ".$slider5_img_height." />";
													echo '</a>';
												if( $pf_gallery_tab5_images != '1' ){	
													echo '</div>';
											}
										}
										echo '</div>';
									}else{
										foreach ( $upload_pf_tab5_images as $image ) {
											echo "<img class='' src='".petshop_kaya_img_resize("{$image['url']}", esc_attr( $pf_image_width ), esc_attr( $pf_tab5_images_height ), 't')."' alt='{$image['title']}' width='".esc_attr( $pf_image_width )."' height='".esc_attr( $pf_tab5_images_height )."'  />"; 
										}
									}
								}
								if( trim(!empty($pf_tab5_custom_text)) ){
									echo '<div class="clear">&nbsp;</div>';
									echo trim(do_shortcode($pf_tab5_custom_text));
								}
							echo '</div>';
						}
						if( !empty($pf_custom_video_urls) ){
							echo '<div id="video_iframes" class="pf_tab_content">';
								if ( is_array( $pf_custom_video_urls ) ){
									echo '<div class="single_video_iframe gallery_video_column'.$pf_videos_columns.' clearfix ">';
										foreach ( $pf_custom_video_urls as $pf_custom_video_url ){
											echo trim( $pf_custom_video_url );
										}
									echo '</div>';
								}
							echo '</div>';
						}
						if( ( !empty($pf_model_short_biography) || !empty($pf_model_experience) || !empty($pf_model_talents) ) ){
							echo '<div id="model_description" class="pf_tab_content">';
								if( ( !empty($pf_model_short_biography) && !empty($pf_model_experience) && !empty($pf_model_talents) ) ){
									$class="one_third";
								}elseif( ( !empty($pf_model_short_biography) && !empty($pf_model_experience) ) || ( !empty($pf_model_short_biography) && !empty($pf_model_talents) ) || ( !empty($pf_model_experience) && !empty($pf_model_short_biography) ) || ( !empty($pf_model_experience) && !empty($pf_model_talents) )  || ( !empty($pf_model_talents) && !empty($pf_model_short_biography) ) || 
								( !empty($pf_model_talents) && !empty($pf_model_experience) ) )
								{
									$class="one_half";
								}
								elseif( ( !empty($pf_model_short_biography) || !empty($pf_model_experience) || !empty($pf_model_talents) ) ){
									$class="fullwidth";
								}
								if( trim(!empty($pf_model_short_biography)) ):
									echo '<div class="'.esc_attr( $class ).'">';
										echo '<div class="description">';
											echo  trim( $pf_model_short_biography );
										echo '</div>';
									echo '</div>';
								endif;
								if( !empty($pf_model_experience) ):
									echo '<div class="'.esc_attr( $class ).'">';
										echo '<div class="description">';
											echo  trim( $pf_model_experience );
										echo '</div>';
									echo '</div>';
								endif;
								if( !empty($pf_model_talents) ):	
									echo '<div class="'.esc_attr( $class ).'">';
										echo '<div class="description">';
											echo  trim( $pf_model_talents );
										echo '</div>';
									echo '</div>';
								endif;	
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="clear"></div>';  ?>
				
				<?php
				if( $pf_nav_buttons_enable == '1' ){
					echo '<div id="singlepage_nav" class="">';
						echo '<ul class="pf_single_nav_buttons">';
							echo '<li class="nav_prev_item">';
								previous_post_link( '%link', esc_attr( $pf_button_prev_text ) ); 
							echo '</li>';
							echo '<li class="nav_next_item">';
								next_post_link( '%link', esc_attr( $pf_button_next_text ) ); 
							echo '</li></ul>';
					echo '</div>';
				}
				echo '<div class="clear"></div>';
				if ( is_super_admin() ) { }else{
					if( current_user_can( 'user' ) ):
						if( $post_array_data->post_author == $user_ID ){
						echo '<a href="'.esc_url( admin_url( 'post.php?post='.get_the_id().'&action=edit' ) ).'" class="user_profile_button">'.esc_html__('Update Your Profile','petshop').'</i></a>';
					}			
				endif;
				} ?>
			</div> <!-- End Portfolio Right Section -->	
		</div>	<!-- Portfolio End -->	
	<?php  endwhile; endif;
	echo '</div></div>';
	wp_reset_postdata(); ?>	
<?php get_footer(); ?>