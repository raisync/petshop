(function($) {
  "use strict";
  $(function() {
  // On change
     $('.kaya-radio-img').click(function() {
    $('.kaya-radio-img-selected').removeClass('kaya-radio-img-selected');
    $(this).addClass('kaya-radio-img-selected').children('input[@type="radio"]').prop('checked', true);
   });
    $("input[name=test]").is(":checked");
// Header background Upload 
$('#customize-control-select_header_background_type select').change(function(){
	$('#customize-control-bg_image').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_bg_img_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_background_color').hide().addClass('customize-control-options-remove');

	var header_bg_type = $('#customize-control-select_header_background_type select option:selected').val();
	switch( header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-header_background_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-bg_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_bg_img_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// Menu Background
$('#customize-control-select_menu_background_type select').change(function(){
	$('#customize-control-bg_image').hide().addClass('customize-control-options-remove');
	$('#customize-control-menu_bg_img_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-main_menu_bg_color').hide().addClass('customize-control-options-remove');

	var menu_bg_type = $('#customize-control-select_menu_background_type select option:selected').val();
	switch( menu_bg_type ){
		case 'bg_type_color':
			$('#customize-control-main_menu_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-bg_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-menu_bg_img_repeat').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// page
$('#customize-control-select_page_mid_background_type select').change(function(){
	$('#customize-control-page_content_bg').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_content_bg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_bg_color').hide().addClass('customize-control-options-remove');;
	var footer_bg_type = $('#customize-control-select_page_mid_background_type select option:selected').val();
	switch( footer_bg_type ){
		case 'bg_type_color':
			$('#customize-control-page_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-page_content_bg_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_content_bg').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// Page title Image Upload 
$('#customize-control-select_page_title_background_type select').change(function(){
	$('#customize-control-page_title').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_bar_bg_repeat').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_img_position').hide().addClass('customize-control-options-remove');
	$('#customize-control-parallax_zoom_note_description').hide().addClass('customize-control-options-remove');
	$('#customize-control-page_title_bg_color').hide().addClass('customize-control-options-remove');
	var outer_header_bg_type = $('#customize-control-select_page_title_background_type select option:selected').val();
	switch( outer_header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-page_title_bg_color').show().removeClass('customize-control-options-remove');
			break;
		case 'bg_type_image':
			$('#customize-control-page_title').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_title_bar_bg_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-page_title_img_position').show().removeClass('customize-control-options-remove');
			$('#customize-control-parallax_zoom_note_description').show().removeClass('customize-control-options-remove');
			break;
		case 'default':
			break;		
	}
}).change();
// Portfolio Category
	$('#customize-control-pf_page_sidebar input').change(function(){
		$('#customize-control-pf_sidebar_id').show().removeClass('customize-control-options-remove');
		var sidebar_data = $('#customize-control-pf_page_sidebar input:checked' ).val();
		if( sidebar_data == 'fullwidth'	 ){
			$('#customize-control-pf_sidebar_id').hide().addClass('customize-control-options-remove');			
		}
	}).change();
// Disable Search Box
$('#customize-control-disable_search_box input').change(function(){
	$('#customize-control-search_icon_bg_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_icon_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_box_title').show().removeClass('customize-control-options-remove');
	$('#customize-control-serarch_search_bg_type').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_box_bg_img').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_bg_repeat').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_box_bg_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_box_title_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_box_title_border_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_input_border_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_input_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_select_options_bg_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_select_options_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_bg_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_text_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_bg_hover_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_hover_text_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_letter_space').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_font_weight').show().removeClass('customize-control-options-remove');
	$('#customize-control-search_button_font_style').show().removeClass('customize-control-options-remove');
	var search_box_show = $('#customize-control-disable_search_box input').is(':checked');
	if( search_box_show == true ){
		$('#customize-control-search_icon_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_icon_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_box_title').hide().addClass('customize-control-options-remove');
		$('#customize-control-serarch_search_bg_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_box_bg_img').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_bg_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_box_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_box_title_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_box_title_border_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_input_border_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_input_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_select_options_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_select_options_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_bg_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_hover_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_letter_space').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_font_weight').hide().addClass('customize-control-options-remove');
		$('#customize-control-search_button_font_style').hide().addClass('customize-control-options-remove');
	}
}).change();
// Top Header
function petshop_kaya_top_header_bg_type(){
	$('#customize-control-select_top_header_background_type select').change(function(){
		$('#customize-control-top_bg_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_color').hide().addClass('customize-control-options-remove');
		var footer_bg_type = $('#customize-control-select_top_header_background_type select option:selected').val();
		switch( footer_bg_type ){
			case 'bg_type_color':
				$('#customize-control-top_bar_bg_color').show().removeClass('customize-control-options-remove');
				break;
			case 'bg_type_image':
				$('#customize-control-top_bg_image').show().removeClass('customize-control-options-remove');
				$('#customize-control-top_bar_bg_repeat').show().removeClass('customize-control-options-remove');
				break;
			case 'default':
				break;		
		}
	}).change();
}	
//petshop_kaya_top_header_bg_type();
// Top Header Section 
$('#customize-control-disable_top_header input').change(function(){
	$('#customize-control-top_bar_left_content').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_left_content_info').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_right_content').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_right_content_info').show().removeClass('customize-control-options-remove');
	$('#customize-control-select_top_header_background_type').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_text_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_link_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_link_hover_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-top_bar_bg_repeat').show().removeClass('customize-control-options-remove');
	petshop_kaya_top_header_bg_type()
	var choose_top_header = $('#customize-control-disable_top_header input').is(':checked');
	if( choose_top_header ){
		$('#customize-control-top_bar_left_content').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_left_content_info').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_right_content').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_right_content_info').hide().addClass('customize-control-options-remove');
		$('#customize-control-select_top_header_background_type').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bg_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_text_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_link_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-top_bar_bg_repeat').hide().addClass('customize-control-options-remove');
	}else{
		
	}
}).change();
// Logo Change
$('#customize-control-select_header_logo_type select').change(function(){
	$('#customize-control-upload_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_text_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_text_font_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-text_logo_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_font_style').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_font_weight').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_text_logo_font_family').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_margin_top').show().removeClass('customize-control-options-remove');
	$('#customize-control-logo_margin_bottom').show().removeClass('customize-control-options-remove');
	$('#customize-control-header_text_logo_tagline').hide().addClass('customize-control-options-remove');
	$('#customize-control-customize_controll_divider_tagline').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_weight').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_style').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_letter_spacing').hide().addClass('customize-control-options-remove');
	$('#customize-control-text_logo_tagline_font_family').hide().addClass('customize-control-options-remove');
	$('#customize-control-logo_tagline_font_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_retina_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_retina_disable').hide().addClass('customize-control-options-remove');
	$('#customize-control-upload_sticky_retina_logo') ;
	$('#customize-control-logo_background_color').show().removeClass('customize-control-options-remove');
	$('#customize-control-header_logo_padding_t_b').show().removeClass('customize-control-options-remove');
	$('#customize-control-header_logo_padding_l_r').show().removeClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_header_logo_type select option:selected').val();
	switch( header_bg_type ){
		case 'image_logo':
			$('#customize-control-upload_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_retina_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-upload_retina_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_retina_disable').show().removeClass('customize-control-options-remove');
			$('#customize-control-upload_sticky_retina_logo').show().removeClass('customize-control-options-remove');
			petshop_kaya_sticky_logo_change();
			break;
		case 'text_logo':
			$('#customize-control-header_text_logo').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_text_font_color').show().removeClass('customize-control-options-remove');
			$('#customize-control-text_logo_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_logo_font_style').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_logo_font_weight').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_text_logo_font_family').show().removeClass('customize-control-options-remove');
			$('#customize-control-header_text_logo_tagline').show().removeClass('customize-control-options-remove');
			$('#customize-control-customize_controll_divider_tagline').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_weight').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_style').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_letter_spacing').show().removeClass('customize-control-options-remove');
			$('#customize-control-text_logo_tagline_font_family').show().removeClass('customize-control-options-remove');
			$('#customize-control-logo_tagline_font_color').show().removeClass('customize-control-options-remove');
			break;
		case 'none':
			$('#customize-control-logo_margin_top').hide().addClass('customize-control-options-remove');
			$('#customize-control-logo_margin_bottom').hide().addClass('customize-control-options-remove');	
			$('#customize-control-logo_background_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_padding_t_b').hide().addClass('customize-control-options-remove');
	$('#customize-control-header_logo_padding_l_r').hide().addClass('customize-control-options-remove');
		case 'default':
			break;		
	}
}).change();
// Sticky Logo
function petshop_kaya_sticky_logo_change(){
	$('#customize-control-select_header_logo_type select').change(function(){
	$('#customize-control-upload_sticky_logo').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_logo_color').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_text_logo_size').hide().addClass('customize-control-options-remove');
	$('#customize-control-sticky_logo_tagline_color').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_header_logo_type select option:selected').val();
	switch( header_bg_type ){
		case 'image_logo':
			$('#customize-control-upload_sticky_logo').show().removeClass('customize-control-options-remove');
			break;
		case 'text_logo':
			$('#customize-control-sticky_logo_color').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_text_logo_size').show().removeClass('customize-control-options-remove');
			$('#customize-control-sticky_logo_tagline_color').show().removeClass('customize-control-options-remove');
			break;
		case 'none':

		case 'default':
			break;		
	}
	}).change();
}
$('#customize-control-sticky_header_disable input').change(function(){
		$('#customize-control-upload_sticky_logo').hide().addClass('customize-control-options-remove');
		$('#customize-control-upload_sticky_logo').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_retina_disable').hide().addClass('customize-control-options-remove');
		$('#customize-control-upload_sticky_retina_logo').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_bg_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_link_hover_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_header_section').show().removeClass('customize-control-options-remove');
		$('#customize-control-sticky_header_position').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_color').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_text_logo_size').hide().addClass('customize-control-options-remove');
		$('#customize-control-sticky_logo_tagline_color').hide().addClass('customize-control-options-remove');
		var select_val = $('#customize-control-sticky_header_disable input').is(':checked');
		if( select_val ){
				$('#customize-control-upload_sticky_logo').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_retina_disable').show().removeClass('customize-control-options-remove');
				$('#customize-control-upload_sticky_retina_logo').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_header_section').show().removeClass('customize-control-options-remove');
				$('#customize-control-upload_sticky_logo').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_header_bg_color').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_header_link_color').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_header_link_hover_color').show().removeClass('customize-control-options-remove');
				$('#customize-control-sticky_header_position').show().removeClass('customize-control-options-remove');
				petshop_kaya_sticky_logo_change();
		}else{
			
		}

}).change();
// Retina logo
function petshop_kaya_sticky_logo_change(){
	$('#customize-control-header_retina_logo input').change(function(){
			$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
				var retina_show = $('#customize-control-header_retina_logo input').is(':checked');
			if( retina_show ){
				$('#customize-control-upload_retina_logo').show().removeClass('customize-control-options-remove');
			}else{
				$('#customize-control-upload_retina_logo').hide().addClass('customize-control-options-remove');
			}
	}).change();
}
function petshop_kaya_body_bg_settings(){
	$('#customize-control-select_body_background_type select').change(function(){
		$('#customize-control-background_image').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_repeat').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_position_x').hide().addClass('customize-control-options-remove');
		$('#customize-control-background_attachment').hide().addClass('customize-control-options-remove');
		$('#customize-control-body_background_color').hide().addClass('customize-control-options-remove');
	var header_bg_type = $('#customize-control-select_body_background_type select option:selected').val();
	switch( header_bg_type ){
		case 'bg_type_color':
			$('#customize-control-body_background_color').show().removeClass('customize-control-options-remove');
			$('body.custom-background').removeClass('custom-background');
			break;
		case 'bg_type_image':
			$('#customize-control-background_image').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_repeat').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_position_x').show().removeClass('customize-control-options-remove');
			$('#customize-control-background_attachment').show().removeClass('customize-control-options-remove');
			$('body').addClass('custom-background');
			break;
		case 'default':
			break;		
	}
	}).change();
}
petshop_kaya_body_bg_settings();
//
// Social Share  Email Fields
$('#customize-control-pf_disable_email_icon input').change(function(){
	$('#customize-control-email_fields_data_title').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_your_email_address_text').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_your_name_text').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_send_email_text').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_form_success_msg').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_form_error_msg').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_shared_post_msg').show().removeClass('customize-control-options-remove');
	$('#customize-control-change_form_submit_button_text').show().removeClass('customize-control-options-remove');
	$('#customize-control-pf_email_form_button_bg').show().removeClass('customize-control-options-remove');
	$('#customize-control-pf_email_form_button_color').show().removeClass('customize-control-options-remove');
	var select_mail_fields_value = $('#customize-control-pf_disable_email_icon input').is(':checked');
	if( select_mail_fields_value ){
		$('#customize-control-email_fields_data_title').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_your_email_address_text').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_your_name_text').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_send_email_text').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_form_success_msg').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_form_error_msg').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_shared_post_msg').hide().addClass('customize-control-options-remove');
		$('#customize-control-change_form_submit_button_text').hide().addClass('customize-control-options-remove');
		$('#customize-control-pf_email_form_button_bg').hide().addClass('customize-control-options-remove');
		$('#customize-control-pf_email_form_button_color').hide().addClass('customize-control-options-remove');
	}else{ }
}).change();
// Portfolio Single Next / prev Tabs
$('#customize-control-pf_nav_buttons_enable input').change(function(){
	$('#customize-control-pf_button_prev_text').hide().addClass('customize-control-options-remove');
	$('#customize-control-pf_button_next_text').hide().addClass('customize-control-options-remove');
	var retina_show = $('#customize-control-pf_nav_buttons_enable input').is(':checked');
	if( retina_show ){
		$('#customize-control-pf_button_prev_text').show().removeClass('customize-control-options-remove');
		$('#customize-control-pf_button_next_text').show().removeClass('customize-control-options-remove');
	}
}).change();
// Most footer bottom 
	$('#customize-control-select_most_footer_style select').change(function(){
		$('#customize-control-most_footer_left_section').hide().addClass('customize-control-options-remove');
		$('#customize-control-footer_menu_left_note').hide().addClass('customize-control-options-remove');
		$('#customize-control-most_footer_right_section').hide().addClass('customize-control-options-remove');
		$('#customize-control-footer_menu_right_note').hide().addClass('customize-control-options-remove');
		$('#customize-control-footer_left_section_title').show().removeClass('customize-control-options-remove');		
		$('#customize-control-footer_right_section_title').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_bg_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_text_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-most_footer_link_hover_color').show().removeClass('customize-control-options-remove');
		$('#customize-control-footer_left_right_color_title').show().removeClass('customize-control-options-remove');
		var most_footer_style = $('#customize-control-select_most_footer_style select option:selected').val();
		switch( most_footer_style ){
			case 'left_content_right_menu':
				$('#customize-control-most_footer_left_section').show().removeClass('customize-control-options-remove');
				$('#customize-control-footer_menu_right_note').show().removeClass('customize-control-options-remove');
				break;
			case 'left_menu_right_content':
				$('#customize-control-footer_menu_left_note').show().removeClass('customize-control-options-remove');
				$('#customize-control-most_footer_right_section').show().removeClass('customize-control-options-remove');
				break;
			case 'left_content_right_content':
				$('#customize-control-most_footer_left_section').show().removeClass('customize-control-options-remove');
				$('#customize-control-most_footer_right_section').show().removeClass('customize-control-options-remove');
				break;
			case 'center_content_center_menu':
				$('#customize-control-most_footer_left_section').show().removeClass('customize-control-options-remove');
				$('#customize-control-footer_menu_right_note').show().removeClass('customize-control-options-remove');
				break;
			case 'none':
				$('#customize-control-footer_left_section_title').hide().addClass('customize-control-options-remove');
				$('#customize-control-footer_right_section_title').hide().addClass('customize-control-options-remove');
				$('#customize-control-footer_left_right_color_title').hide().addClass('customize-control-options-remove');
				$('#customize-control-most_footer_bg_color').hide().addClass('customize-control-options-remove');
				
				$('#customize-control-most_footer_text_color').hide().addClass('customize-control-options-remove');
				$('#customize-control-most_footer_link_color').hide().addClass('customize-control-options-remove');
				$('#customize-control-most_footer_link_hover_color').hide().addClass('customize-control-options-remove');
				break;		
			case 'default':
				break;
		}
	}).change();

// Custom description Controler border remove
	$('li.customize-control-description').prev().addClass('li_border_bottom_remove');
	$('li.customize-control-sub-title').prev().addClass('sub_title_padding_bottom');
	$('li.customize-section-description-container').next().addClass('li_border_top_remove');

});
})(jQuery);
(function($){
    var api = wp.customize;
    api.CustomizerImage = api.Control.extend({ 
        ready: function() {
            var control = this,
                customize_upload = this.container.find('.customize_img_upload');
			$(customize_upload).each(function(){
				$(this).find(".remove_media_image").bind("click", function(){
			 		var parent = $(this).parents('.customize_img_upload');
			 		var preview = $(parent).find('.customizer_media_image > img');
			 		control.setting.set('');
			 		$(preview).attr('src', '');
				});
				$(this).find('.upload_media_image').bind('click', function(e){
			 		var title = $(this).val();
			 		var parent = $(this).parents('.customize_img_upload');
			 		var preview = $(parent).find('.customizer_media_image > img');
					e.preventDefault();
			        custom_uploader = wp.media.frames.file_frame = wp.media({
			            title: 'Upload Customizer Media Library Image',
			            button: {
			                text: 'Upload Customizer Image'
			            },
			            multiple: false
			        });
			        custom_uploader.on('select', function() {
			            attachment = custom_uploader.state().get('selection').first().toJSON();
			            control.setting.set(attachment.url);
			            $(preview).attr('src', attachment.sizes.full.url);
			        });
			        custom_uploader.open();	
				});
			});			
        }
    });
    api.controlConstructor['customize_upload'] = api.CustomizerImage;   
})(jQuery);