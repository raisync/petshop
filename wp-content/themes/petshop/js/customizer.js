( function( $ ) {
//body
wp.customize('body_background_color',function( value ){
	value.bind(function( to ){
		var body_background_color =  'body{background:'+to+'!important}';
		if( $(document).find('#body_background_color').length ){
			$(document).find('#body_background_color').remove();
		}
		$(document).find('head').append($('<style id="body_background_color">'+ body_background_color +'</style>'));
	}); 
});
//top section
wp.customize('blog_page_bg_color', function( value ){
	value.bind(function( to ){
		var blog_page_bg_color = '.standard-blog .blog_post_content_wrapper{background:'+ to +'!important}';
		if($(document).find('#blog_page_bg_color').length) {
			$(document).find('#blog_page_bg_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_bg_color">' + blog_page_bg_color + '</style>'));
	});
});
// Menu Colors
wp.customize('menu_links[border_img]', function(value){
	value.bind(function( to ){
		if( to ){
			var menu_links = '.menu > ul > li > a{ background-image:url('+ to +')!important; }';
		}else{
			var menu_links = '.menu > ul > li > a{ background-image:inherit!important;  padding:15px!important; }';
		}
		if( $(document).find('#menu_links').length ){
			$(document).find('#menu_links').remove();
		}
		$(document).find('head').append($('<style id=menu_links>' + menu_links + '</style>'));
	});
});
wp.customize('main_menu_bg_color', function( value ){
	value.bind(function(to){
		$('#header_container_wrapper').css('background', to ? to : '#151515');
	});
}); 
wp.customize('menu_link_color', function( value ){
	value.bind(function(to){
		$('.menu > ul > li > a, .shop_cart_icon a, .search_box_icon, #jqueryslidemenu i').css('color', to ? to : '');
	});
});
wp.customize('menu_bg_active_color', function( value ){
	value.bind( function( to ){
		$('.menu > li.current-menu-item > a, .menu > li.current_page_item > a').css('background', to ? to : '');
	});
});
wp.customize('menu_link_active_color', function(value){
	value.bind(function( to ){
		var menu_link_active_color = '.menu .current_page_ancestor > a, .menu .current-menu-item > a, .menu .current_page_ancestor > a, .menu .current-menu-ancestor > a, .menu .current-menu-item > a{ color:'+to+' }';
		if( $(document).find('#menu_link_active_color').length ){
			$(document).find('#menu_link_active_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_active_color>' + menu_link_active_color + '</style>'));
	});
});
wp.customize('menu_link_hover_bg_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_bg_color = '.menu > ul > li > a:hover{ background-color:'+ ( to ? to : 'inherit') +'!important; }';
		if( $(document).find('#menu_link_hover_bg_color').length ){
			$(document).find('#menu_link_hover_bg_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_bg_color>' + menu_link_hover_bg_color + '</style>'));
	});
});
wp.customize('menu_link_hover_text_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_text_color = '.menu > ul > li > a:hover, .menu > ul > li > a:hover i{ color:'+ to +'!important; }';
		if( $(document).find('#menu_link_hover_text_color').length ){
			$(document).find('#menu_link_hover_text_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_text_color>' + menu_link_hover_text_color + '</style>'));
	});
});
wp.customize('menu_links_border_top', function(value){
	value.bind(function( to ){
		var menu_links_border_top = '.menu ul ul li, .menu > ul > li{ border-top-color:'+ to +'!important; }';
		if( $(document).find('#menu_links_border_top').length ){
			$(document).find('#menu_links_border_top').remove();
		}
		$(document).find('head').append($('<style id=menu_links_border_top>' + menu_links_border_top + '</style>'));
	});
});
wp.customize('menu_links_border_bottom', function(value){
	value.bind(function( to ){
		var menu_links_border_bottom = '.menu ul ul li, .menu > ul > li, .menu ul ul{ border-bottom-color:'+ to +'!important; }';
		if( $(document).find('#menu_links_border_bottom').length ){
			$(document).find('#menu_links_border_bottom').remove();
		}
		$(document).find('head').append($('<style id=menu_links_border_bottom>' + menu_links_border_bottom + '</style>'));
	});
});

wp.customize('main_menu_icon_color', function(value){
	value.bind(function( to ){
		var main_menu_icon_color = '.menu > ul > li.fa:before{ color:'+ to +'!important; }';
		if( $(document).find('#main_menu_icon_color').length ){
			$(document).find('#main_menu_icon_color').remove();
		}
		$(document).find('head').append($('<style id=main_menu_icon_color>' + main_menu_icon_color + '</style>'));
	});
});
wp.customize('child_menu_icon_color', function(value){
	value.bind(function( to ){
		var child_menu_icon_color = '.menu ul ul li.fa:before{ color:'+ to +'!important; }';
		if( $(document).find('#child_menu_icon_color').length ){
			$(document).find('#child_menu_icon_color').remove();
		}
		$(document).find('head').append($('<style id=child_menu_icon_color>' + child_menu_icon_color + '</style>'));
	});
});

// Child Menu
wp.customize('sub_menu_bg_color', function( value ){
	value.bind( function( to ){
		$('.menu ul ul li a, .menu ul ul li').css('background', to ? to : '');
	});
});
wp.customize('sub_menu_bottom_border_color', function( value ){
	value.bind( function(to){
		$('.menu ul ul li').css('border-bottom-color', to);
	});
});
wp.customize('sub_menu_links_bg_color', function(value){
	value.bind(function( to ){
		var sub_menu_links_bg_color = '.menu ul ul li a{ background:'+ to +'!important; }';
		if( $(document).find('#sub_menu_links_bg_color').length ){
			$(document).find('#sub_menu_links_bg_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_links_bg_color>' + sub_menu_links_bg_color + '</style>'));
	});
});

wp.customize('sub_menu_link_color', function(value){
	value.bind(function( to ){
		var sub_menu_link_color = '.menu ul ul li a{ color:'+ to +'!important; }';
		if( $(document).find('#sub_menu_link_color').length ){
			$(document).find('#sub_menu_link_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_link_color>' + sub_menu_link_color + '</style>'));
	});
});

wp.customize('sub_menu_links_hover_bg_color', function(value){
	value.bind(function( to ){
		var sub_menu_links_hover_bg_color = '.menu ul ul li a:hover{ background:'+ to +'!important; }';
		if( $(document).find('#sub_menu_links_hover_bg_color').length ){
			$(document).find('#sub_menu_links_hover_bg_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_links_hover_bg_color>' + sub_menu_links_hover_bg_color + '</style>'));
	});
});

wp.customize('sub_menu_top_border_color', function(value){
	value.bind(function( to ){
		var sub_menu_top_border_color = '.menu ul ul.sub-menu li{ border-color:'+ to +'!important; }';
		if( $(document).find('#sub_menu_top_border_color').length ){
			$(document).find('#sub_menu_top_border_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_top_border_color>' + sub_menu_top_border_color + '</style>'));
	});
});
wp.customize('sub_menu_bottom_border_color', function(value){
	value.bind(function( to ){
		var sub_menu_bottom_border_color = '.menu ul ul.sub-menu li{ border-color:'+ to +'!important; }';
		if( $(document).find('#sub_menu_bottom_border_color').length ){
			$(document).find('#sub_menu_bottom_border_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_bottom_border_color>' + sub_menu_bottom_border_color + '</style>'));
	});
});

wp.customize('sub_menu_link_hover_color', function(value){
	value.bind(function( to ){
		var sub_menu_link_hover_color = '.menu ul ul li a:hover{ color:'+ to +'; }';
		if( $(document).find('#sub_menu_link_hover_color').length ){
			$(document).find('#sub_menu_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_link_hover_color>' + sub_menu_link_hover_color + '</style>'));
	});
});

wp.customize('menu_link_desc_color', function(value){
	value.bind(function( to ){
		var menu_link_desc_color = '.menu span.menu_description{ color:'+ to +'; }';
		if( $(document).find('#menu_link_desc_color').length ){
			$(document).find('#menu_link_desc_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_desc_color>' + menu_link_desc_color + '</style>'));
	});
});
wp.customize('menu_link_active_desc_color', function(value){
	value.bind(function( to ){
		var menu_link_active_desc_color = 'menu .current_page_ancestor > a span.menu_description, .menu .current-menu-item > a span.menu_description, .menu .current_page_ancestor > a span.menu_description, .menu .current-menu-ancestor > a span.menu_description, .menu .current-menu-item > a span.menu_description{ color:'+ to +'; }';
		if( $(document).find('#menu_link_active_desc_color').length ){
			$(document).find('#menu_link_active_desc_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_active_desc_color>' + menu_link_active_desc_color + '</style>'));
	});
});

wp.customize('menu_link_hover_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_desc_color = '.menu ul ul li a:hover span.menu_description{ color:'+ to +'!important; }';
		if( $(document).find('#menu_link_hover_desc_color').length ){
			$(document).find('#menu_link_hover_desc_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_desc_color>' + menu_link_hover_desc_color + '</style>'));
	});
});

wp.customize('menu_link_hover_desc_color', function(value){
	value.bind(function( to ){
		var menu_link_hover_desc_color = '.menu ul li a:hover span.menu_description{ color:'+ to +'; }';
		if( $(document).find('#menu_link_hover_desc_color').length ){
			$(document).find('#menu_link_hover_desc_color').remove();
		}
		$(document).find('head').append($('<style id=menu_link_hover_desc_color>' + menu_link_hover_desc_color + '</style>'));
	});
});

wp.customize('sub_menu_links_active_bg_color', function(value){
	value.bind(function( to ){
		var sub_menu_links_active_bg_color = '.menu .sub-menu .current-menu-item > a{ background:'+ to +'!important; }';
		if( $(document).find('#sub_menu_links_active_bg_color').length ){
			$(document).find('#sub_menu_links_active_bg_colorsub_menu_links_active_bg_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_links_active_bg_color>' + sub_menu_links_active_bg_color + '</style>'));
	});
});
wp.customize('sub_menu_link_active_color', function(value){
	value.bind(function( to ){
		var sub_menu_link_active_color = '.menu .sub-menu .current-menu-item > a{ color:'+ to +'!important; }';
		if( $(document).find('#sub_menu_link_active_color').length ){
			$(document).find('#sub_menu_link_active_color').remove();
		}
		$(document).find('head').append($('<style id=sub_menu_link_active_color>' + sub_menu_link_active_color + '</style>'));
	});
});

wp.customize('child_menu_uppercase', function( value ){
	value.bind( function(to){
		if( to == '1' ){
			$('.sm-blue ul li a').css('text-transform', 'uppercase');
		}else{
			$('.sm-blue ul li a').css('text-transform', 'inherit');
		}
	});
});
wp.customize('main_menu_uppercase', function( value ){
	value.bind( function(to){
		if( to == '1' ){
			$('.sm-blue a').css('text-transform', 'uppercase');
		}else{
			$('.sm-blue a').css('text-transform', 'inherit');
		}
	});
});

wp.customize('menu_border_bottom', function( value ){
	value.bind(function( to ){
	var menu_border_bottom = '.header_menu_section .container{border-bottom:4px solid '+ to +'!important}';
		if($(document).find('#menu_border_bottom').length) {
			$(document).find('#menu_border_bottom').remove();
		}
	$(document).find('head').append($('<style id="menu_border_bottom">' + menu_border_bottom + '</style>'));
	});
});
// Search Box
wp.customize('search_box_bg_img[search_bg_img]', function( value ){
	value.bind(function( to ){
	var bg_img = to ? 'url('+to+')' : 'inherit'; 
	var search_box_bg_img = '.toggle_search_wrapper .toggle_search_field{ background :'+bg_img+'!important}';
		if($(document).find('#search_box_bg_img').length) {
			$(document).find('#search_box_bg_img').remove();
		}
		$(document).find('head').append($('<style id="search_box_bg_img">' + search_box_bg_img + '</style>'));
	});
});
wp.customize('search_bg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var search_bg_repeat = '.toggle_search_wrapper .toggle_search_field{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var search_bg_repeat = '.toggle_search_wrapper .toggle_search_field{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var search_bg_repeat = '.toggle_search_wrapper .toggle_search_field{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			case 'default':
				var search_bg_repeat = '.toggle_search_wrapper .toggle_search_field{ background-repeat: no-repeat!important;}';
				break;	
			}	
		if($(document).find('#search_bg_repeat').length) {
			$(document).find('#search_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="search_bg_repeat">' + search_bg_repeat + '</style>'));		
	});
});	


wp.customize('search_icon_bg_color', function( value ){
	value.bind(function( to ){
	var search_icon_bg_color = '.toggle_search_icon{ background :'+ to +'!important}';
		if($(document).find('#search_icon_bg_color').length) {
			$(document).find('#search_icon_bg_color').remove();
		}
	$(document).find('head').append($('<style id="search_icon_bg_color">' + search_icon_bg_color + '</style>'));
	});
});
wp.customize('search_icon_color', function( value ){
	value.bind(function( to ){
	var search_icon_color = '.toggle_search_icon{ color :'+ to +'!important}';
		if($(document).find('#search_icon_color').length) {
			$(document).find('#search_icon_color').remove();
		}
	$(document).find('head').append($('<style id="search_icon_color">' + search_icon_color + '</style>'));
	});
});

wp.customize('search_box_bg_color', function( value ){
	value.bind(function( to ){
	var search_box_bg_color = '.toggle_search_wrapper .toggle_search_field{ background :'+ to +'!important}';
		if($(document).find('#search_box_bg_color').length) {
			$(document).find('#search_box_bg_color').remove();
		}
	$(document).find('head').append($('<style id="search_box_bg_color">' + search_box_bg_color + '</style>'));
	});
});
wp.customize('search_box_title_color', function( value ){
	value.bind(function( to ){
	var search_box_title_color = '.toggle_search_wrapper h3{ color: '+ to +'!important}';
		if($(document).find('#search_box_title_color').length) {
			$(document).find('#search_box_title_color').remove();
		}
	$(document).find('head').append($('<style id="search_box_title_color">' + search_box_title_color + '</style>'));
	});
});
wp.customize('search_box_title_border_color', function( value ){
	value.bind(function( to ){
	var search_box_title_border_color = '.toggle_search_wrapper .title_seperator{ background: '+ to +'!important} .toggle_search_wrapper .title_seperator::after{ border-color: '+ to +'!important}';
		if($(document).find('#search_box_title_border_color').length) {
			$(document).find('#search_box_title_border_color').remove();
		}
	$(document).find('head').append($('<style id="search_box_title_border_color">' + search_box_title_border_color + '</style>'));
	});
});
wp.customize('search_input_border_color', function( value ){
	value.bind(function( to ){
	var search_input_border_color = '.toggle_search_wrapper select, .search_form input, .fm-form input, .fm-form select, .fm-form textarea{ border-color :'+ to +'!important}';
		if($(document).find('#search_input_border_color').length) {
			$(document).find('#search_input_border_color').remove();
		}
	$(document).find('head').append($('<style id="search_input_border_color">' + search_input_border_color + '</style>'));
	});
});
wp.customize('search_input_color', function( value ){
	value.bind(function( to ){
	var search_input_color = '.toggle_search_wrapper select, .search_form input,  .toggle_search_wrapper ::-webkit-input-placeholder, span.search_close{ color :'+ to +'!important}';
		if($(document).find('#search_input_color').length) {
			$(document).find('#search_input_color').remove();
		}
	$(document).find('head').append($('<style id="search_input_color">' + search_input_color + '</style>'));
	});
});
//select options bg color
wp.customize('search_select_options_bg_color', function( value ){
	value.bind(function( to ){
	var search_select_options_bg_color = '.toggle_search_wrapper select option{ background-color :'+ to +'!important}';
		if($(document).find('#search_select_options_bg_color').length) {
			$(document).find('#search_select_options_bg_color').remove();
		}
	$(document).find('head').append($('<style id="search_select_options_bg_color">' + search_select_options_bg_color + '</style>'));
	});
});
wp.customize('search_select_options_color', function( value ){
	value.bind(function( to ){
	var search_select_options_color = '.toggle_search_wrapper select option{ color :'+ to +'!important}';
		if($(document).find('#search_select_options_color').length) {
			$(document).find('#search_select_options_color').remove();
		}
	$(document).find('head').append($('<style id="search_select_options_color">' + search_select_options_color + '</style>'));
	});
});
//
wp.customize('search_button_bg_color', function( value ){
	value.bind(function( to ){
	var search_button_bg_color = '.toggle_search_wrapper .search_form #search_submit, .fm-form input.submit{ background :'+ to +'!important}';
		if($(document).find('#search_button_bg_color').length) {
			$(document).find('#search_button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="search_button_bg_color">' + search_button_bg_color + '</style>'));
	});
});
wp.customize('search_button_text_color', function( value ){
	value.bind(function( to ){
	var search_button_text_color = '.toggle_search_wrapper .search_form #search_submit, .fm-form input.submit{ color :'+ to +'!important}';
		if($(document).find('#search_button_text_color').length) {
			$(document).find('#search_button_text_color').remove();
		}
	$(document).find('head').append($('<style id="search_button_text_color">' + search_button_text_color + '</style>'));
	});
});
wp.customize('search_button_bg_hover_color', function( value ){
	value.bind(function( to ){
	var search_button_bg_hover_color = '.toggle_search_wrapper .search_form #search_submit:hover, .fm-form input.submit:hover{ background :'+ to +'!important}';
		if($(document).find('#search_button_bg_hover_color').length) {
			$(document).find('#search_button_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="search_button_bg_hover_color">' + search_button_bg_hover_color + '</style>'));
	});
});
wp.customize('search_button_hover_text_color', function( value ){
	value.bind(function( to ){
	var search_button_hover_text_color = '.toggle_search_wrapper .search_form #search_submit:hover, .fm-form input.submit:hover{ color :'+ to +'!important}';
		if($(document).find('#search_button_hover_text_color').length) {
			$(document).find('#search_button_hover_text_color').remove();
		}
	$(document).find('head').append($('<style id="search_button_hover_text_color">' + search_button_hover_text_color + '</style>'));
	});
});
wp.customize('search_button_letter_space', function( value ){
	value.bind(function( to ){
	var search_button_letter_space = '.toggle_search_wrapper .search_form #search_submit, .fm-form input.submit{ letter-spacing :'+ to +'px!important}';
		if($(document).find('#search_button_letter_space').length) {
			$(document).find('#search_button_letter_space').remove();
		}
	$(document).find('head').append($('<style id="search_button_letter_space">' + search_button_letter_space + '</style>'));
	});
});
wp.customize('search_button_font_weight', function( value ){
	value.bind(function( to ){
		var search_button_font_weight ='.toggle_search_wrapper .search_form #search_submit, .fm-form input.submit{ font-weight: '+ to +' !important; }'
		if($(document).find('#search_button_font_weight').length) {
			$(document).find('#search_button_font_weight').remove();
		}
		$(document).find('head').append($('<style id="search_button_font_weight">' + search_button_font_weight + '</style>'));
	});
});
wp.customize('search_button_font_style', function( value ){
	value.bind(function( to ){
		var search_button_font_style ='.toggle_search_wrapper .search_form #search_submit, .fm-form input.submit{ font-style: '+ to +' !important; }'
		if($(document).find('#search_button_font_style').length) {
			$(document).find('#search_button_font_style').remove();
		}
		$(document).find('head').append($('<style id="search_button_font_style">' + search_button_font_style + '</style>'));
	});
});
//page bg
wp.customize('page_bg_color', function( value ){
	value.bind(function(to){
		$('.mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section').css('background', to ? to :'inherit');
	});
});
wp.customize('page_titles_color', function( value ){
	value.bind(function( to ){
		var page_titles_color = '.mid_container_wrapper_section h1, #mid_content_left_section h1, #mid_content_right_section h1, .mid_container_wrapper_section h2, #mid_content_left_section h2, #mid_content_right_section h2, .mid_container_wrapper_section h3, #mid_content_left_section h3, #mid_content_right_section h3, .mid_container_wrapper_section h4, #mid_content_left_section h4, #mid_content_right_section h4, .mid_container_wrapper_section h5, #mid_content_left_section h5, #mid_content_right_section h5, .mid_container_wrapper_section h6, #mid_content_left_section h6, #mid_content_right_section h6{color:'+ to +'}';
		if($(document).find('#page_titles_color').length) {
		$(document).find('#page_titles_color').remove();
		}
		$(document).find('head').append($('<style id="page_titles_color">' + page_titles_color + '</style>'));
	});
});
wp.customize('page_description_color', function( value ){
	value.bind(function( to ){
	var page_description_color = '.mid_container_wrapper_section p, .mid_container_wrapper_section, .mid_container_wrapper_section #mid_content_left_section, #mid_content_right_section{color:'+ to +'}';
		if($(document).find('#page_description_color').length) {
		$(document).find('#page_description_color').remove();
		}	
		$(document).find('head').append($('<style id="page_description_color">' + page_description_color + '</style>'));
	});
});
wp.customize('page_link_color', function( value ){
	value.bind(function( to ){
		//$('.mid_container_wrapper_section a:not(.add_to_cart_button)').css('color',to)	
		var page_link_color = '.mid_container_wrapper_section a:not(.add_to_cart_button){color:'+ to +'}';
		if($(document).find('#page_link_color').length) {
		$(document).find('#page_link_color').remove();
		}	
		$(document).find('head').append($('<style id="page_link_color">' + page_link_color + '</style>'));
	});
});
wp.customize('page_link_hover_color', function( value ){
	value.bind(function( to ){
		var page_link_hover = '.mid_container_wrapper_section a:hover:not(.add_to_cart_button){color:'+ to +'}';
		if($(document).find('#page_link_hover').length) {
			$(document).find('#page_link_hover').remove();
		}
	$(document).find('head').append($('<style id="page_link_hover">' + page_link_hover + '</style>'));
	});
});
// Sidebar
wp.customize('sidebar_bg_color', function( value ){
	value.bind(function( to ){
		var sidebar_bg_color = '#sidebar .widget_container{background:'+ to +'!important}';
		if($(document).find('#sidebar_bg_color').length) {
			$(document).find('#sidebar_bg_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_bg_color">' + sidebar_bg_color + '</style>'));
	});
});

wp.customize('sidebar_title_color', function( value ){
	value.bind(function( to ){
		var sidebar_title_color = '.mid_container_wrapper_section #sidebar .widget_container h3{color:'+ to +'!important}';
		if($(document).find('#sidebar_title_color').length) {
			$(document).find('#sidebar_title_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_title_color">' + sidebar_title_color + '</style>'));
	});
});
wp.customize('sidebar_title_border_color', function( value ){
	value.bind(function( to ){
		var sidebar_title_border_color = '#sidebar .widget_container .title_seperator{background:'+ to +'!important}';
		if($(document).find('#sidebar_title_border_color').length) {
			$(document).find('#sidebar_title_border_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_title_border_color">' + sidebar_title_border_color + '</style>'));
	});
});
wp.customize('sidebar_title_border_color', function( value ){
	value.bind(function( to ){
		var sidebar_title_border_color_after = '#sidebar .widget_container .title_seperator::after{border-color:'+ to +'!important}';
		if($(document).find('#sidebar_title_border_color_after').length) {
			$(document).find('#sidebar_title_border_color_after').remove();
		}
		$(document).find('head').append($('<style id="sidebar_title_border_color_after">' + sidebar_title_border_color_after + '</style>'));
	});
});
wp.customize('sidebar_list_border_color', function( value ){
	value.bind(function( to ){
		var sidebar_list_border_color = ' #sidebar .widget_container ul li{border-color:'+ to +'!important}';
		if($(document).find('#sidebar_list_border_color').length) {
			$(document).find('#sidebar_list_border_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_list_border_color">' + sidebar_list_border_color + '</style>'));
	});
});
wp.customize('sidebar_desc_color', function( value ){
	value.bind(function( to ){
		var sidebar_desc_color = '  .mid_container_wrapper_section .widget_container p, .mid_container_wrapper_section .widget_container{color:'+ to +'!important}';
		if($(document).find('#sidebar_desc_color').length) {
			$(document).find('#sidebar_desc_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_desc_color">' + sidebar_desc_color + '</style>'));
	});
});
wp.customize('sidebar_link_color', function( value ){
	value.bind(function( to ){
		var sidebar_link_color = ' .mid_container_wrapper_section .widget_container ul li a{color:'+ to +'!important}';
		if($(document).find('#sidebar_link_color').length) {
			$(document).find('#sidebar_link_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_link_color">' + sidebar_link_color + '</style>'));
	});
});
wp.customize('sidebar_link_hover_color', function( value ){
	value.bind(function( to ){
		var sidebar_link_hover_color = '.mid_container_wrapper_section .widget_container ul li a:hover{color:'+ to +'!important}';
		if($(document).find('#sidebar_link_hover_color').length) {
			$(document).find('#sidebar_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_link_hover_color">' + sidebar_link_hover_color + '</style>'));
	});
});
// Tags
wp.customize('sidebar_tags_bg_color', function( value ){
	value.bind(function( to ){
		var sidebar_tags_bg_color = ' .widget_container .tagcloud a{background-color:'+ to +'!important;}';
		if($(document).find('#sidebar_tags_bg_color').length) {
			$(document).find('#sidebar_tags_bg_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_tags_bg_color">' + sidebar_tags_bg_color + '</style>'));
	});
});
wp.customize('sidebar_tags_border_color', function( value ){
	value.bind(function( to ){
		var sidebar_tags_border_color = ' .widget_container .tagcloud a{border-color:'+ to +'!important;}';
		if($(document).find('#sidebar_tags_border_color').length) {
			$(document).find('#sidebar_tags_border_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_tags_border_color">' + sidebar_tags_border_color + '</style>'));
	});
});
wp.customize('sidebar_tags_link_color', function( value ){
	value.bind(function( to ){
		var sidebar_tags_link_color = ' .widget_container .tagcloud a{color:'+ to +'!important;}';
		if($(document).find('#sidebar_tags_link_color').length) {
			$(document).find('#sidebar_tags_link_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_tags_link_color">' + sidebar_tags_link_color + '</style>'));
	});
});
//
wp.customize('sidebar_tags_link_color', function( value ){
	value.bind(function( to ){
		var sidebar_tags_bg_hover_color = '.widget_container .tagcloud a:hover{background-color:'+ to +'!important;}';
		if($(document).find('#sidebar_tags_bg_hover_color').length) {
			$(document).find('#sidebar_tags_bg_hover_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_tags_bg_hover_color">' + sidebar_tags_bg_hover_color + '</style>'));
	});
});
wp.customize('sidebar_tags_bg_color', function( value ){
	value.bind(function( to ){
		var sidebar_tags_hover_link_color = '.widget_container .tagcloud a:hover{color:'+ to +'!important;}';
		if($(document).find('#sidebar_tags_hover_link_color').length) {
			$(document).find('#sidebar_tags_hover_link_color').remove();
		}
		$(document).find('head').append($('<style id="sidebar_tags_hover_link_color">' + sidebar_tags_hover_link_color + '</style>'));
	});
});
//page title colors
wp.customize('page_title_bg_color', function( value ){
	value.bind(function( to ){
		var page_title_bg_color = '.sub_header_wrapper{ background-color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#page_title_bg_color').length) {
			$(document).find('#page_title_bg_color').remove();
		}
	$(document).find('head').append($('<style id="page_title_bg_color">' + page_title_bg_color + '</style>'));
	});
});
wp.customize('page_titlebar_title_color', function( value ){
	value.bind(function( to ){
		$('.sub_header_wrapper h2, .title_big_letter strong').css('color',to);
	});
});
wp.customize('title_description_color', function( value ){
	value.bind(function( to ){
		$('.sub_header_wrapper p').css('color',to);
	});
});


// Font weight
wp.customize('page_title_font_weight', function(  value ){
	value.bind(function(to){
		var page_title_font_weight = '.sub_header_wrapper h2{ font-weight:'+ to +';}';
		if($(document).find('#page_title_font_weight').length) {
			$(document).find('#page_title_font_weight').remove();
		}
	$(document).find('head').append($('<style id="page_title_font_weight">' + page_title_font_weight + '</style>'));
	});
});
wp.customize('page_title_font_style', function(  value ){
	value.bind(function(to){
		var page_title_font_style = '.sub_header_wrapper h2{ font-style:'+ to +';}';
		if($(document).find('#page_title_font_style').length) {
			$(document).find('#page_title_font_style').remove();
		}
	$(document).find('head').append($('<style id="page_title_font_style">' + page_title_font_style + '</style>'));
	});
});
wp.customize('page_title_font_size', function( value ){
	value.bind(function( to ){
		$('.page_title_wrapper h2').css({'font-size':to +'px', 'line-height':to +'px'});
	});
});
wp.customize('page_title_font_letter_space', function( value ){
	value.bind(function( to ){
		$('.page_title_wrapper h2').css({'letter-spacing':to +'px'});
	});
});
wp.customize('page_title_bar_padding', function(value){
	value.bind(function( to ){
		var title_line_height = (parseInt(to)) + 10;
		var page_title_bar_padding = '.sub_header_wrapper{ padding-top:'+ to +'px!important; padding-bottom:'+ to +'px!important; }.title_border_bottom_line{height:'+ title_line_height +'px!important; }';
		//alert(to);
		//var page_title_bar_padding= '.title_border_bottom_line{height:'+ to +'px!important; }';
		if( $(document).find('#page_title_bar_padding').length ){
			$(document).find('#page_title_bar_padding').remove();
		}
		$(document).find('head').append($('<style id=page_title_bar_padding>' + page_title_bar_padding  + '</style>'));

	});
});
wp.customize('page_titlebar_border_bottom', function(value){
	value.bind(function( to ){
		var page_titlebar_border_bottom = '.sub_header_wrapper{ border-bottom-width:'+ to +'px!important; }';
		if( $(document).find('#page_titlebar_border_bottom').length ){
			$(document).find('#page_titlebar_border_bottom').remove();
		}
		$(document).find('head').append($('<style id=page_titlebar_border_bottom>' + page_titlebar_border_bottom + '</style>'));
	});
});
wp.customize('page_title_border_color', function(value){
	value.bind(function( to ){
		var page_title_border_color = '.title_border_bottom{ background:'+ to +'!important;} ';
		if( $(document).find('#page_title_border_color').length ){
			$(document).find('#page_title_border_color').remove();
		}
		$(document).find('head').append($('<style id=page_title_border_color>' + page_title_border_color + '</style>'));
	});
});
wp.customize('bg_image_opacity', function(value){
	value.bind(function( to ){
		var bg_image_opacity = '.page_title_bg_img{ opacity:'+ to +'!important; }';
		if( $(document).find('#bg_image_opacity').length ){
			$(document).find('#bg_image_opacity').remove();
		}
		$(document).find('head').append($('<style id=bg_image_opacity>' + bg_image_opacity + '</style>'));
	});
});
// Page title bg Image
wp.customize('page_title[bg_img]', function(value){
	value.bind(function( to ){
		var page_title_bar = '.sub_header_wrapper{ background-image:url('+ to +')!important; }';
		if( $(document).find('#page_title_bar').length ){
			$(document).find('#page_title_bar').remove();
		}
		$(document).find('head').append($('<style id=page_title_bar>' + page_title_bar + '</style>'));
	});
});
wp.customize('page_title_bar_bg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var page_title_bar_bg_repeat = '.sub_header_wrapper{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var page_title_bar_bg_repeat = '.sub_header_wrapper{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var page_title_bar_bg_repeat = '.sub_header_wrapper{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#page_title_bar_bg_repeat').length) {
			$(document).find('#page_title_bar_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="page_title_bar_bg_repeat">' + page_title_bar_bg_repeat + '</style>'));		
	});
});	
// Page mid content bg
wp.customize('page_content_bg[bg_img]', function(value){
	value.bind(function( to ){
		var page_content_bg = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background:url('+ to +')!important; }';
		if( $(document).find('#page_content_bg').length ){
			$(document).find('#page_content_bg').remove();
		}
		$(document).find('head').append($('<style id=page_content_bg>' + page_content_bg + '</style>'));
	});
});
wp.customize('page_content_bg_repeat', function(value){		
	value.bind(function(to){
		switch(to){
			case 'no-repeat':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: no-repeat!important;}';
				break;
			case 'repeat':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: repeat!important; background-size:inherit!important;}';
				break;
			case 'cover':
				var page_content_bg_repeat = '.mid_container_wrapper_section, .blog .mid_container_wrapper_section, #mid_content_right_section, #mid_content_left_section{ background-repeat: no-repeat!important; background-size:cover!important;}';
				break;
			}	
		if($(document).find('#page_content_bg_repeat').length) {
			$(document).find('#page_content_bg_repeat').remove();
		}
		$(document).find('head').append($('<style id="page_content_bg_repeat">' + page_content_bg_repeat + '</style>'));		
	});
});
/* Footer BG Section */
// Most footer bottom
wp.customize( 'most_footer_left_section', function( value ) {
		value.bind( function( to ) {
			$( '.footer_section span' ).html( to );
		} );
	} );
wp.customize( 'most_footer_right_section', function( value ) {
		value.bind( function( to ) {
			$( '.footer_section.one_half_last' ).html( to );
		} );
	} );

// Logo
wp.customize('kaya_logo[upload_logo]', function( value ){
	value.bind(function( to ){
		if( to ){
			$('.header_logo_wrapper img.logo').attr('src', to);
		}else{
			$('.header_logo_wrapper img.logo').attr('src', '');
		}
	});
});
wp.customize('header_text_logo', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper h1.logo a, .header_logo_wrapper h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a, .kaya_right_position h1.logo a, .kaya_left_position h1.logo a').html(to);
	});
});
wp.customize('text_logo_size', function( value ){
	value.bind(function( to ){
		var text_logo_size = Math.round(1.1 * to);
		$('.header_logo_wrapper h1.logo a').css({'font-size':to +'px', 'line-height':text_logo_size+'px'});
	});
});

wp.customize('sticky_text_logo_size', function( value ){
	value.bind(function( to ){
		var line_height_h4 = Math.round(1.3 * to);
		$('.header_logo_wrapper h1.sticky_logo a, .kaya_right_position h1.sticky_logo a, .kaya_left_position h1.sticky_logo a').css({'font-size':to +'px', 'line-height':to +'px'});
	});
});

wp.customize('header_logo_font_weight', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper h1.logo a, .header_logo_wrapper h1.sticky_logo a').css('font-weight',to);
	});
});
wp.customize('header_logo_font_style', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper h1.logo a, .header_logo_wrapper h1.sticky_logo a').css('font-style',to);
	});
});
wp.customize('logo_text_font_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper h1.logo a').css('color',to ? to : '#333333');
	});
});
wp.customize('logo_background_color', function( value ){
	value.bind(function( to ){
		var logo_padding = to ? '20px 30px' : '0';
		var logo_background_color = '.header_logo_wrapper{background:'+ ( to ? to : 'inherit') +'!important; padding:'+logo_padding+'px;}';
		if($(document).find('#logo_background_color').length) {
			$(document).find('#logo_background_color').remove();
		}
	$(document).find('head').append($('<style id="logo_background_color">' + logo_background_color + '</style>'));

	});
});
wp.customize('header_margin_top', function( value ){
	value.bind(function( to ){
		var header_margin_top = '.header_content_wrapper{padding-top:'+to+'px!important;}';
		if($(document).find('#header_margin_top').length) {
			$(document).find('#header_margin_top').remove();
		}
	$(document).find('head').append($('<style id="header_margin_top">' + header_margin_top + '</style>'));

	});
});
wp.customize('header_margin_bottom', function( value ){
	value.bind(function( to ){
		var header_margin_bottom = '.header_content_wrapper{padding-bottom:'+to+'px!important;}';
		if($(document).find('#header_margin_bottom').length) {
			$(document).find('#header_margin_bottom').remove();
		}
	$(document).find('head').append($('<style id="header_margin_bottom">' + header_margin_bottom + '</style>'));

	});
});
wp.customize('header_logo_padding_t_b', function( value ){
	value.bind(function( to ){
		var header_logo_padding_t_b = '.header_logo_wrapper{padding-top:'+to+'px; padding-bottom:'+to+'px;}';
		if($(document).find('#header_logo_padding_t_b').length) {
			$(document).find('#header_logo_padding_t_b').remove();
		}
	$(document).find('head').append($('<style id="header_logo_padding_t_b">' + header_logo_padding_t_b + '</style>'));

	});
});
wp.customize('header_logo_padding_l_r', function( value ){
	value.bind(function( to ){
		var header_logo_padding_l_r = '.header_logo_wrapper{padding-left:'+to+'px; padding-right:'+to+'px;}';
		if($(document).find('#header_logo_padding_l_r').length) {
			$(document).find('#header_logo_padding_l_r').remove();
		}
	$(document).find('head').append($('<style id="header_logo_padding_l_r">' + header_logo_padding_l_r + '</style>'));

	});
});
//Sticky logo color
wp.customize('sticky_logo_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper h1.sticky_logo a').css('color',to ? to : '#333333');
	});
});
// Tagline
wp.customize('header_text_logo_tagline', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo_tag_line').html(to);
	});
});
wp.customize('logo_tagline_size', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo_tag_line').css({'font-size': to +'px', 'line-height' : Math.ceil(1.1*to)+'px'});
	});
});
wp.customize('logo_tagline_letter_spacing', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo_tag_line').css('letter-spacing',to +'px');
	});
});

wp.customize('logo_tagline_font_weight', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo_tag_line').css('font-weight',to);
	});
});
wp.customize('logo_tagline_font_style', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo_tag_line').css('font-style',to);
	});
});
wp.customize('logo_tagline_font_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .logo.logo_tag_line').css('color',to ? to : '#333333');
	});
});

wp.customize('sticky_logo_tagline_color', function( value ){
	value.bind(function( to ){
		$('.header_logo_wrapper .sticky_logo.logo_tag_line').css('color',to ? to : '#333333');
	});
});
// Sticky logo
wp.customize('sticky_logo[upload_sticky_logo]', function( value ){
	value.bind(function( to ){
		if( to ){
			$('#header_wrapper img.sticky_logo').attr('src', to);
		}else{
			$('#header_wrapper img.sticky_logo').attr('src', wppath.template_path+'/images/logo.png');
		}
	});
});
/* Custom Css */
wp.customize('kaya_custom_css', function( value ){
	value.bind(function( to ){
		if($(document).find('#kaya_custom_css').length) {
			$(document).find('#kaya_custom_css').remove();
		}
	$(document).find('head').append($('<style id="kaya_custom_css">' + to + '</style>'));
	});
	});

// Portfolio thumbnail Colors
wp.customize('pf_cat_img_side_title_color', function( value ){
	value.bind(function( to ){
		var pf_cat_img_side_title_color = '.pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{color:'+ to +'!important}';
		if($(document).find('#pf_cat_img_side_title_color').length) {
			$(document).find('#pf_cat_img_side_title_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_img_side_title_color">' + pf_cat_img_side_title_color + '</style>'));

	});
});
wp.customize('pf_cat_img_border_color', function( value ){
	value.bind(function( to ){
		var pf_cat_img_border_color = '.pf_taxonomy_gallery.portfolio_img_grid_columns > ul li .pf_image_wrapper{border-color:'+ to +'!important} .pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{background:'+ to +'!important}';
		if($(document).find('#pf_cat_img_border_color').length) {
			$(document).find('#pf_cat_img_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_img_border_color">' + pf_cat_img_border_color + '</style>'));

	});
});
//
wp.customize('vertical_title_font_size', function( value ){
	value.bind(function( to ){
		var vertical_title_font_size = '.pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{font-size:'+ to +'px!important}';
		if($(document).find('#vertical_title_font_size').length) {
			$(document).find('#vertical_title_font_size').remove();
		}
	$(document).find('head').append($('<style id="vertical_title_font_size">' + vertical_title_font_size + '</style>'));

	});
});
wp.customize('vertical_title_font_style', function( value ){
	value.bind(function( to ){
		var vertical_title_font_style = '.pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{font-style:'+ to +'!important}';
		if($(document).find('#vertical_title_font_style').length) {
			$(document).find('#vertical_title_font_style').remove();
		}
	$(document).find('head').append($('<style id="vertical_title_font_style">' + vertical_title_font_style + '</style>'));

	});
});
wp.customize('vertical_title_font_weight', function( value ){
	value.bind(function( to ){
		var vertical_title_font_weight = '.pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{font-weight:'+ to +'!important}';
		if($(document).find('#vertical_title_font_weight').length) {
			$(document).find('#vertical_title_font_weight').remove();
		}
	$(document).find('head').append($('<style id="vertical_title_font_weight">' + vertical_title_font_weight + '</style>'));

	});
});
wp.customize('vertical_title_letter_space', function( value ){
	value.bind(function( to ){
		var vertical_title_letter_space = '.pf_taxonomy_gallery.portfolio_content_wrapper span.pf_title_wrapper{letter-spacing:'+ to +'px!important}';
		if($(document).find('#vertical_title_letter_space').length) {
			$(document).find('#vertical_title_letter_space').remove();
		}
	$(document).find('head').append($('<style id="vertical_title_letter_space">' + vertical_title_letter_space + '</style>'));

	});
});
//
wp.customize('pf_cat_hover_bg_color', function( value ){
	value.bind(function( to ){
		var pf_cat_hover_bg_color = '.pf_taxonomy_gallery .pf_content_wrapper{background:'+ to +'!important}';
		if($(document).find('#pf_cat_hover_bg_color').length) {
			$(document).find('#pf_cat_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_hover_bg_color">' + pf_cat_hover_bg_color + '</style>'));

	});
});
wp.customize('pf_cat_title_color', function( value ){
	value.bind(function( to ){
		var pf_cat_title_color = '.pf_taxonomy_gallery .pf_title_description h3{color:'+ to +'!important}';
		if($(document).find('#pf_cat_title_color').length) {
			$(document).find('#pf_cat_title_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_title_color">' + pf_cat_title_color + '</style>'));

	});
});
wp.customize('pf_cat_desc_color', function( value ){
	value.bind(function( to ){
		var pf_cat_desc_color = '.pf_taxonomy_gallery .pf_title_description{color:'+ to +'!important}';
		if($(document).find('#pf_cat_desc_color').length) {
			$(document).find('#pf_cat_desc_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_desc_color">' + pf_cat_desc_color + '</style>'));

	});
});
wp.customize('pf_cat_button_link_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_link_color = '.pf_taxonomy_gallery .pf_title_description a{color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_link_color').length) {
			$(document).find('#pf_cat_button_link_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_link_color">' + pf_cat_button_link_color + '</style>'));

	});
});
wp.customize('pf_cat_button_bg_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_bg_color = '.pf_taxonomy_gallery .pf_title_description a{background-color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_bg_color').length) {
			$(document).find('#pf_cat_button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_bg_color">' + pf_cat_button_bg_color + '</style>'));

	});
});
wp.customize('pf_cat_button_border_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_border_color = '.pf_taxonomy_gallery .pf_title_description a{border-color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_border_color').length) {
			$(document).find('#pf_cat_button_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_border_color">' + pf_cat_button_border_color + '</style>'));

	});
});
wp.customize('pf_cat_button_link_hover_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_link_hover_color = ' .pf_taxonomy_gallery .pf_title_description a:hover{color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_link_hover_color').length) {
			$(document).find('#pf_cat_button_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_link_hover_color">' + pf_cat_button_link_hover_color + '</style>'));

	});
});
wp.customize('pf_cat_button_bg_hover_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_bg_hover_color = '.pf_taxonomy_gallery .pf_title_description a:hover{background-color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_bg_hover_color').length) {
			$(document).find('#pf_cat_button_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_bg_hover_color">' + pf_cat_button_bg_hover_color + '</style>'));

	});
});
wp.customize('pf_cat_button_border_hover_color', function( value ){
	value.bind(function( to ){
		var pf_cat_button_border_hover_color = '.pf_taxonomy_gallery .pf_title_description a:hover{border-color:'+ to +'!important}';
		if($(document).find('#pf_cat_button_border_hover_color').length) {
			$(document).find('#pf_cat_button_border_hover_color').remove();
		}
	$(document).find('head').append($('<style id="pf_cat_button_border_hover_color">' + pf_cat_button_border_hover_color + '</style>'));

	});
});
// portfolio Single page
wp.customize('pf_contant_bg_color', function( value ){
	value.bind(function( to ){
		var pf_contant_bg_color = ' #mid_container_wrapper .portfolio_left_content_section{background:'+ to +'!important}';
		if($(document).find('#pf_contant_bg_color').length) {
			$(document).find('#pf_contant_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_contant_bg_color">' + pf_contant_bg_color + '</style>'));

	});
});

wp.customize('pf_model_details_bg_color', function( value ){
	value.bind(function( to ){
		var pf_model_details_bg_color = ' #mid_container_wrapper .portfolio_left_content_section{background:'+ to +'!important}';
		if($(document).find('#pf_model_details_bg_color').length) {
			$(document).find('#pf_model_details_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_model_details_bg_color">' + pf_model_details_bg_color + '</style>'));

	});
});
wp.customize('pf_model_details_border_color', function( value ){
	value.bind(function( to ){
		var pf_model_details_border_color = ' #mid_container_wrapper .pf_model_info_wrapper ul li{border-color:'+ to +'!important}';
		if($(document).find('#pf_model_details_border_color').length) {
			$(document).find('#pf_model_details_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_model_details_border_color">' + pf_model_details_border_color + '</style>'));

	});
});
wp.customize('pf_model_details_title_color', function( value ){
	value.bind(function( to ){
		var pf_model_details_title_color = '#mid_container_wrapper .pf_model_info_wrapper ul li{color:'+ to +'!important}';
		if($(document).find('#pf_model_details_title_color').length) {
			$(document).find('#pf_model_details_title_color').remove();
		}
	$(document).find('head').append($('<style id="pf_model_details_title_color">' + pf_model_details_title_color + '</style>'));

	});
});
wp.customize('pf_porject_details_info_color', function( value ){
	value.bind(function( to ){
		var pf_porject_details_info_color = '#mid_container_wrapper .pf_model_info_wrapper ul li span{color:'+ to +'!important}';
		if($(document).find('#pf_porject_details_info_color').length) {
			$(document).find('#pf_porject_details_info_color').remove();
		}
	$(document).find('head').append($('<style id="pf_porject_details_info_color">' + pf_porject_details_info_color + '</style>'));

	});
});
wp.customize('pf_tabs_bg_color', function( value ){
	value.bind(function( to ){
		var pf_tabs_bg_color = '.pf_tab_list > ul > li.pf_tabs_style, .pf_tab_list > ul > li.pf_tabs_style:first-child::before, .pf_tab_list > ul > li.pf_tabs_style:last-child::before, .pf_tab_list > ul > li.pf_tabs_style, .pf_tab_list > ul > li.pf_tabs_style:first-child::before, .pf_tab_list > ul > li.pf_tabs_style:last-child::before, .model_share_icon{background:'+ to +'!important}.model_share_icon::before{ border-bottom-color: '+ to +' }';
		if($(document).find('#pf_tabs_bg_color').length) {
			$(document).find('#pf_tabs_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_tabs_bg_color">' + pf_tabs_bg_color + '</style>'));
	});
});

wp.customize('pf_tabs_text_color', function( value ){
	value.bind(function( to ){
		var pf_tabs_text_color = '#mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style > a, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style:first-child::before, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style:last-child::before, .model_share_icon{color:'+ to +'!important}';
		if($(document).find('#pf_tabs_text_color').length) {
			$(document).find('#pf_tabs_text_color').remove();
		}
	$(document).find('head').append($('<style id="pf_tabs_text_color">' + pf_tabs_text_color + '</style>'));

	});
});
wp.customize('pf_tabs_active_bg_color', function( value ){
	value.bind(function( to ){
		var pf_tabs_active_bg_color = ' .pf_tab_list > ul > li.pf_tabs_style.tab-active, .pf_tab_list > ul > li.pf_tabs_style:hover, .model_info_active, .pf_tab_list > ul > li.pf_tabs_style.tab-active:first-child::before, .pf_tab_list > ul > li.pf_tabs_style.tab-active:last-child::before, .pf_tab_list > ul > li.pf_tabs_style:hover:first-child::before, .pf_tab_list > ul > li.pf_tabs_style:hover:last-child::before,  .model_info_icon{background:'+ to +'!important} .model_info_icon::before{ border-top-color: '+ to +' }';
		if($(document).find('#pf_tabs_active_bg_color').length) {
			$(document).find('#pf_tabs_active_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_tabs_active_bg_color">' + pf_tabs_active_bg_color + '</style>'));

	});
});
wp.customize('pf_tabs_active_bg_link_color', function( value ){
	value.bind(function( to ){
		var pf_tabs_active_bg_link_color = '#mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style.tab-active a, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style:hover a, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style.tab-active:first-child::before, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style.tab-active:last-child::before, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style:hover:first-child::before, #mid_container_wrapper .pf_tab_list > ul > li.pf_tabs_style:hover:last-child::before,  .model_info_icon{color:'+ to +'!important}';
		if($(document).find('#pf_tabs_active_bg_link_color').length) {
			$(document).find('#pf_tabs_active_bg_link_color').remove();
		}
	$(document).find('head').append($('<style id="pf_tabs_active_bg_link_color">' + pf_tabs_active_bg_link_color + '</style>'));

	});
});
wp.customize('pf_tabs_active_bg_link_color', function( value ){
	value.bind(function( to ){
		var pf_tabs_active_bg_link_color1 = '.pf_tab_list > ul > li.pf_tabs_style.tab-active a, .pf_tab_list > ul > li.pf_tabs_style:hover a{color:'+ to +'!important}';
		if($(document).find('#pf_tabs_active_bg_link_color1').length) {
			$(document).find('#pf_tabs_active_bg_link_color1').remove();
		}
	$(document).find('head').append($('<style id="pf_tabs_active_bg_link_color1">' + pf_tabs_active_bg_link_color1 + '</style>'));

	});
});

wp.customize('pf_model_details_border_color', function( value ){
	value.bind(function( to ){
		var pf_model_details_border_color = '.mid_container_wrapper_section .pf_model_info_wrapper{border-color:'+ to +'!important}';
		if($(document).find('#pf_model_details_border_color').length) {
			$(document).find('#pf_model_details_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_model_details_border_color">' + pf_model_details_border_color + '</style>'));

	});
});

wp.customize('pf_slider_buttons_text_color', function( value ){
	value.bind(function( to ){
		var pf_slider_buttons_text_color = '.single_image_slider .owl-next, .single_image_slider .owl-prev{color:'+ to +'!important}';
		if($(document).find('#pf_slider_buttons_text_color').length) {
			$(document).find('#pf_slider_buttons_text_color').remove();
		}
	$(document).find('head').append($('<style id="pf_slider_buttons_text_color">' + pf_slider_buttons_text_color + '</style>'));

	});
});
wp.customize('pf_slider_buttons_bg_color', function( value ){
	value.bind(function( to ){
		var pf_slider_buttons_bg_color = '.single_image_slider .owl-next, .single_image_slider .owl-prev{background:'+ to +'!important}';
		if($(document).find('#pf_slider_buttons_bg_color').length) {
			$(document).find('#pf_slider_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_slider_buttons_bg_color">' + pf_slider_buttons_bg_color + '</style>'));

	});
});
wp.customize('pf_slider_buttons_bg_color', function( value ){
	value.bind(function( to ){
		var pf_slider_buttons_bg_color1 = '.single_image_slider .owl-prev::after{border-top: 50px solid '+ to +'!important}.single_image_slider .owl-next::before{border-bottom: 50px solid '+ to +'!important}';
		if($(document).find('#pf_slider_buttons_bg_color1').length) {
			$(document).find('#pf_slider_buttons_bg_color1').remove();
		}
	$(document).find('head').append($('<style id="pf_slider_buttons_bg_color1">' + pf_slider_buttons_bg_color1 + '</style>'));

	});
});
wp.customize('pf_additional_info_title_color', function( value ){
	value.bind(function( to ){
		var pf_additional_info_title_color = '.pf_model_additional_info h3{color:'+ to +'!important}';
		if($(document).find('#pf_additional_info_title_color').length) {
			$(document).find('#pf_additional_info_title_color').remove();
		}
	$(document).find('head').append($('<style id="pf_additional_info_title_color">' + pf_additional_info_title_color + '</style>'));

	});
});
wp.customize('pf_additional_info_desc_color', function( value ){
	value.bind(function( to ){
		var pf_additional_info_desc_color = '.pf_model_additional_info{color:'+ to +'!important}';
		if($(document).find('#pf_additional_info_desc_color').length) {
			$(document).find('#pf_additional_info_desc_color').remove();
		}
	$(document).find('head').append($('<style id="pf_additional_info_desc_color">' + pf_additional_info_desc_color + '</style>'));

	});
});
// Short Description
wp.customize('pf_shortdesc_bg_color', function( value ){
	value.bind(function( to ){
		var pf_shortdesc_bg_color = '#model_description{background:'+ to +'!important}';
		if($(document).find('#pf_shortdesc_bg_color').length) {
			$(document).find('#pf_shortdesc_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_shortdesc_bg_color">' + pf_shortdesc_bg_color + '</style>'));

	});
});
wp.customize('pf_shortdesc_title_color', function( value ){
	value.bind(function( to ){
		var pf_shortdesc_title_color = '#model_description .description h1, #model_description .description h2, #model_description .description h3, #model_description .description h4, #model_description .description h5, #model_description .description h6, #model_description .description h3 span{color:'+ to +'!important}';
		if($(document).find('#pf_shortdesc_title_color').length) {
			$(document).find('#pf_shortdesc_title_color').remove();
		}
	$(document).find('head').append($('<style id="pf_shortdesc_title_color">' + pf_shortdesc_title_color + '</style>'));

	});
});
wp.customize('pf_shortdesc_desc_color', function( value ){
	value.bind(function( to ){
		var pf_shortdesc_desc_color = '#model_description .description p, #model_description .description ul li, #model_description .description, #model_description .description p span{color:'+ to +'!important}';
		if($(document).find('#pf_shortdesc_desc_color').length) {
			$(document).find('#pf_shortdesc_desc_color').remove();
		}
	$(document).find('head').append($('<style id="pf_shortdesc_desc_color">' + pf_shortdesc_desc_color + '</style>'));

	});
});
wp.customize('pf_shortdesc_link_color', function( value ){
	value.bind(function( to ){
		var pf_shortdesc_link_color = '#model_description .description a{color:'+ to +'!important}';
		if($(document).find('#pf_shortdesc_link_color').length) {
			$(document).find('#pf_shortdesc_link_color').remove();
		}
	$(document).find('head').append($('<style id="pf_shortdesc_link_color">' + pf_shortdesc_link_color + '</style>'));

	});
});
wp.customize('pf_shortdesc_link_hover_color', function( value ){
	value.bind(function( to ){
		var pf_shortdesc_link_hover_color = '#model_description .description a:hover{color:'+ to +'!important}';
		if($(document).find('#pf_shortdesc_link_hover_color').length) {
			$(document).find('#pf_shortdesc_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="pf_shortdesc_link_hover_color">' + pf_shortdesc_link_hover_color + '</style>'));

	});
});
// Single Page Buttons Color
wp.customize('next_prev_button_bg_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_bg_color = '#singlepage_nav .nav_prev_item a, #singlepage_nav .nav_next_item a{background:'+ ( to ? to : 'inherit') +'!important; } .nav_prev_item a::before{border-top-color:'+ ( to ? to : 'inherit') +'!important; }  .nav_next_item a::after{border-bottom-color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#next_prev_button_bg_color').length) {
			$(document).find('#next_prev_button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_bg_color">' + next_prev_button_bg_color + '</style>'));

	});
});
wp.customize('next_prev_button_text_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_text_color = '#singlepage_nav .nav_prev_item a, #singlepage_nav .nav_next_item a{color:'+to+'!important; }';
		if($(document).find('#next_prev_button_text_color').length) {
			$(document).find('#next_prev_button_text_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_text_color">' + next_prev_button_text_color + '</style>'));

	});
});
wp.customize('next_prev_button_border_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_border_color = '#singlepage_nav .nav_prev_item a, #singlepage_nav .nav_next_item a{border-color:'+to+'!important; }';
		if($(document).find('#next_prev_button_border_color').length) {
			$(document).find('#next_prev_button_border_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_border_color">' + next_prev_button_border_color + '</style>'));

	});
});
wp.customize('next_prev_button_hover_bg_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_hover_bg_color = '#singlepage_nav .nav_prev_item a:hover, #singlepage_nav .nav_next_item a:hover{background:'+ ( to ? to : 'inherit') +'!important; }  #singlepage_nav .nav_prev_item a:hover::before{border-top-color:'+ ( to ? to : 'inherit') +'!important; }  #singlepage_nav .nav_next_item a:hover::after{border-bottom-color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#next_prev_button_hover_bg_color').length) {
			$(document).find('#next_prev_button_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_hover_bg_color">' + next_prev_button_hover_bg_color + '</style>'));

	});
});
wp.customize('next_prev_button_hover_text_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_hover_text_color = '#singlepage_nav .nav_prev_item a:hover, #singlepage_nav .nav_next_item a:hover{color:'+to+'!important; }';
		if($(document).find('#next_prev_button_hover_text_color').length) {
			$(document).find('#next_prev_button_hover_text_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_hover_text_color">' + next_prev_button_hover_text_color + '</style>'));

	});
});
wp.customize('next_prev_button_hover_border_color', function( value ){
	value.bind(function( to ){
		var next_prev_button_hover_border_color = '#singlepage_nav .nav_prev_item a:hover, #singlepage_nav .nav_next_item a:hover{border-color:'+to+'!important; }';
		if($(document).find('#next_prev_button_hover_border_color').length) {
			$(document).find('#next_prev_button_hover_border_color').remove();
		}
	$(document).find('head').append($('<style id="next_prev_button_hover_border_color">' + next_prev_button_hover_border_color + '</style>'));

	});
});

wp.customize('next_prev_button_letter_sapcing', function( value ){
		value.bind(function( to ){
		var next_prev_button_letter_sapcing ='#singlepage_nav .nav_prev_item a{ letter-spacing: '+ to +'px!important; }';
		if($(document).find('#next_prev_button_letter_sapcing').length) {
			$(document).find('#next_prev_button_letter_sapcing').remove();
		}
		$(document).find('head').append($('<style id="next_prev_button_letter_sapcing">' + next_prev_button_letter_sapcing + '</style>'));
	});
});
wp.customize('next_prev_button_font_weight', function( value ){
	value.bind(function( to ){
		var next_prev_button_font_weight ='#singlepage_nav .nav_prev_item a{ font-weight: '+ to +' !important; }'
		if($(document).find('#next_prev_button_font_weight').length) {
			$(document).find('#next_prev_button_font_weight').remove();
		}
		$(document).find('head').append($('<style id="next_prev_button_font_weight">' + next_prev_button_font_weight + '</style>'));
	});
});
wp.customize('next_prev_button_font_style', function( value ){
	value.bind(function( to ){
		var next_prev_button_font_style ='#singlepage_nav .nav_prev_item a, #singlepage_nav .nav_prev_item a{ font-style: '+ to +' !important; }'
		if($(document).find('#next_prev_button_font_style').length) {
			$(document).find('#next_prev_button_font_style').remove();
		}
		$(document).find('head').append($('<style id="next_prev_button_font_style">' + next_prev_button_font_style + '</style>'));
	});
});
// Portfolio sharing icons
wp.customize('pf_social_shaing_icons_bg_color', function( value ){
	value.bind(function( to ){
		var pf_social_shaing_icons_bg_color = '#mid_container_wrapper .pf_social_share_icons li a, #mid_container_wrapper .user_send_email_post{background:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#pf_social_shaing_icons_bg_color').length) {
			$(document).find('#pf_social_shaing_icons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_social_shaing_icons_bg_color">' + pf_social_shaing_icons_bg_color + '</style>'));

	});
});
wp.customize('pf_social_shaing_icons_color', function( value ){
	value.bind(function( to ){
		var pf_social_shaing_icons_color = '#mid_container_wrapper .pf_social_share_icons li a, #mid_container_wrapper .user_send_email_post{color:'+ to +'!important; }';
		if($(document).find('#pf_social_shaing_icons_color').length) {
			$(document).find('#pf_social_shaing_icons_color').remove();
		}
	$(document).find('head').append($('<style id="pf_social_shaing_icons_color">' + pf_social_shaing_icons_color + '</style>'));

	});
});
wp.customize('pf_social_shaing_icons_hover_bg_color', function( value ){
	value.bind(function( to ){
		var pf_social_shaing_icons_hover_bg_color = '#mid_container_wrapper .pf_social_share_icons li a:hover{background:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#pf_social_shaing_icons_hover_bg_color').length) {
			$(document).find('#pf_social_shaing_icons_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="pf_social_shaing_icons_hover_bg_color">' + pf_social_shaing_icons_hover_bg_color + '</style>'));

	});
});
wp.customize('pf_social_shaing_icons_hover_color', function( value ){
	value.bind(function( to ){
		var pf_social_shaing_icons_hover_color = '#mid_container_wrapper .pf_social_share_icons li a:hover{color:'+ to +'!important; }';
		if($(document).find('#pf_social_shaing_icons_hover_color').length) {
			$(document).find('#pf_social_shaing_icons_hover_color').remove();
		}
	$(document).find('head').append($('<style id="pf_social_shaing_icons_hover_color">' + pf_social_shaing_icons_hover_color + '</style>'));

	});
});
wp.customize('pf_social_shaing_icons_border_color', function( value ){
	value.bind(function( to ){
		var pf_social_shaing_icons_border_color = '#mid_container_wrapper .pf_social_share_icons{border-color:'+ to+'!important; }';
		if($(document).find('#pf_social_shaing_icons_border_color').length) {
			$(document).find('#pf_social_shaing_icons_border_color').remove();
		}
	$(document).find('head').append($('<style id="pf_social_shaing_icons_border_color">' + pf_social_shaing_icons_border_color + '</style>'));

	});
});
wp.customize('pf_email_form_button_bg', function( value ){
	value.bind(function( to ){
		var pf_email_form_button_bg = '#mid_container_wrapper #send_mail_to_post{background:'+ ( to ? to : 'inherit') +'!important; } #send_mail_to_post:hover{color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#pf_email_form_button_bg').length) {
			$(document).find('#pf_email_form_button_bg').remove();
		}
	$(document).find('head').append($('<style id="pf_email_form_button_bg">' + pf_email_form_button_bg + '</style>'));

	});
});
wp.customize('pf_email_form_button_color', function( value ){
	value.bind(function( to ){
		var pf_email_form_button_color = '#mid_container_wrapper #send_mail_to_post{color:'+ ( to ? to : 'inherit') +'!important; } #send_mail_to_post:hover{background-color:'+ ( to ? to : 'inherit') +'!important; }';
		if($(document).find('#pf_email_form_button_color').length) {
			$(document).find('#pf_email_form_button_color').remove();
		}
	$(document).find('head').append($('<style id="pf_email_form_button_color">' + pf_email_form_button_color + '</style>'));

	});
});
// Woocommerce
// Even Bg Color
wp.customize('products_bg_color', function( value ){
	value.bind(function( to ){
		var products_bg_color = '.shop-product-items li .shop-product-details, .upsells-product-slider .owl-item .shop-product-details, .related-product-slider .owl-item .shop-product-details, .cross-sells-product-slider .owl-item .shop-product-details, .woocommerce_single_product_content_wrapper, .woocommerce table.shop_table, .cart_total_wrapper, .woocommerce-billing-fields-wrapper, .woocommerce #payment ul.payment_methods, .woocommerce-page #payment ul.payment_methods, .col2-set.addresses .col-1 address, .woocommerce .order_details .woocommerce form.login, .woocommerce-tabs.clearfix, .calculate_shipping_wrapper, .woocommerce-billing-fields-wrapper, .woocommerce-shipping-fields-wrapper, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce .order_details li,.col2-set.addresses address, .col2-set.addresses address{background:'+ to +'!important}';
		if($(document).find('#products_bg_color').length) {
			$(document).find('#products_bg_color').remove();
		}
	$(document).find('head').append($('<style id="products_bg_color">' + products_bg_color +'</style>'));
	});
});
wp.customize('products_desc_color', function( value ){
	value.bind(function( to ){
		var products_desc_color = '.upsells-product-slider .owl-item .shop-product-details span, .woocommerce_single_product_content_wrapper p , .woocommerce_single_product_content_wrapper,  .product_meta span.posted_in span, .cart_totals th, .cart_totals td, .woocommerce form .woocommerce-billing-fields .form-row, .woocommerce form .woocommerce-billing-fields .form-row input, .woocommerce-billing-fields .select2-container .select2-choice, .woocommerce-checkout #payment ul.payment_methods li p, .col2-set.addresses .col-1 address, .woocommerce .order_details li, .woocommerce-page table.shop_table td, .woocommerce form.login, .woocommerce form.login p, .woo_checkout_login_message_wrapper input, .woocommerce table.shop_table.order_details th, .woocommerce table.shop_table.order_details td, .woocommerce table.shop_table.customer_details td, .woocommerce table.shop_table.customer_details th, .woocommerce .shop-product-details p, .claculate_shipping, .col2-set.addresses address, .col2-set.addresses address, .woocommerce div.product p.stock, .woocommerce textarea, .woocommerce  input, .woocommerce select{color:'+ to +'!important}';
		if($(document).find('#products_desc_color').length) {
			$(document).find('#products_desc_color').remove();
		}
	$(document).find('head').append($('<style id="products_desc_color">' + products_desc_color +'</style>'));
	});
});
wp.customize('products_title_color', function( value ){
	value.bind(function( to ){
		var products_title_color = '.shop-product-items li .shop-product-details h4 a, .upsells-product-slider .owl-item .shop-product-details h4 a, .related-product-slider .owl-item .shop-product-details h4 a, .cross-sells-product-slider .owl-item .shop-product-details h4 a, .woocommerce div.product .product_title,  .woocommerce-checkout #payment ul.payment_methods li{color:'+ to +'!important}';
		if($(document).find('#products_title_color').length) {
			$(document).find('#products_title_color').remove();
		}
	$(document).find('head').append($('<style id="products_title_color">' + products_title_color +'</style>'));
	});
});
wp.customize('products_title_border_color', function( value ){
	value.bind(function( to ){
		var products_title_border_color = '.related.products .title_seperator{background:'+ to +'!important} .related.products .title_seperator::after{ border-color:'+ to +'!important }';
		if($(document).find('#products_title_border_color').length) {
			$(document).find('#products_title_border_color').remove();
		}
	$(document).find('head').append($('<style id="products_title_border_color">' + products_title_border_color +'</style>'));
	});
});
wp.customize('products_link_color', function( value ){
	value.bind(function( to ){
		var products_link_color = '.product_meta span.posted_in a, input.woo_qty_minus, input.woo_qty_plus, input.woo_items_quantity, .woocommerce-product-rating a, .cart_item input.woo_qty_minus, input.woo_qty_plus, .cart_item input.woo_items_quantity, .cart_item input.input.woo_qty_plus, .woocommerce-checkout #payment ul.payment_methods li, .woocommerce-checkout #payment .payment_method_paypal .about_paypal, p.lost_password a, .product_meta span.tagged_as a, .woocommerce table.shop_table.order_details a, a.shipping-calculator-button{color:'+ to +'!important}';
		if($(document).find('#products_link_color').length) {
			$(document).find('#products_link_color').remove();
		}
	$(document).find('head').append($('<style id="products_link_color">' + products_link_color +'</style>'));
	});
});
wp.customize('products_link_hover_color', function( value ){
	value.bind(function( to ){
		var products_link_hover_color = '.product_meta span.posted_in a:hover, .product_meta span.tagged_as a:hover, .woocommerce-product-rating a:hover, .woocommerce-checkout #payment .payment_method_paypal .about_paypal:hover, p.lost_password a:hover, .woocommerce table.shop_table.order_details a:hover, .comment-form-rating p.stars a:hover{color:'+ to +'!important}';
		if($(document).find('#products_link_hover_color').length) {
			$(document).find('#products_link_hover_color').remove();
		}
	$(document).find('head').append($('<style id="products_link_hover_color">' + products_link_hover_color +'</style>'));
	});
});
wp.customize('products_price_color', function( value ){
	value.bind(function( to ){
		var products_price_color = '.shop-product-items li .shop-product-details  span.amount, .upsells-product-slider .owl-item .shop-product-details  span.amount, .related-product-slider .owl-item .shop-product-details  span.amount, .cross-sells-product-slider .owl-item .shop-product-details  span.amount, .woocommerce .summary span.amount, .product-subtotal span, .product-price span, tr.order-total, tr.order-total th, .order-total td strong span, .woocommerce table.shop_table.order_details tfoot tr:last-child th, .woocommerce-page table.shop_table.order_details tfoot tr:last-child td, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price del, .woocommerce-page ul.products li.product .price del, .related-product-slider .shop-products span del .amount, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .related-product-slider .shop-products span .amount{color:'+ to +'!important}';
		if($(document).find('#products_price_color').length) {
			$(document).find('#products_price_color').remove();
		}
	$(document).find('head').append($('<style id="products_price_color">' + products_price_color +'</style>'));
	});
});
wp.customize('products_even_link_hover_color', function( value ){
	value.bind(function( to ){
		var products_border_color = '.shop-product-items li .shop-product-details .product_cost_add_cart_wrapper, .upsells-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .related-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .cross-sells-product-slider .owl-item .shop-product-details .product_cost_add_cart_wrapper, .woocommerce div.product form.cart div.quantity, .woocommerce-page table.shop_table td, .woocommerce-page table.shop_table th, .product-quantity .quantity, .woocommerce table.cart td.actions .coupon .input-text, .cart_totals td, .cart_totals th, .woocommerce .woocommerce-billing-fields .form-row textarea, .woocommerce-billing-fields .form-row input.input-text, .woocommerce-billing-fields .form-row textarea, .woocommerce-billing-fields .select2-container .select2-choice, .woo_checkout_login_message_wrapper input, .tabs.single-product-tabs, .woocommerce #reviews #comments ol.commentlist li, #review_form textarea, .woocommerce p.stars a.star-1, .woocommerce p.stars a.star-2, .woocommerce p.stars a.star-3, .woocommerce p.stars a.star-4, .woocommerce p.stars a.star-5, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .woocommerce-page form .form-row input.input-text, .woocommerce-page form .form-row textarea, .woocommerce form .form-row select, .woocommerce-page form .form-row select, .woocommerce-checkout #payment ul.payment_methods li, .select2-container .select2-choice, .woocommerce div.product p.stock, #review_form input, form.track_order input{border-color:'+ to +'!important}';
		if($(document).find('#products_border_color').length) {
			$(document).find('#products_border_color').remove();
		}
	$(document).find('head').append($('<style id="products_border_color">' + products_border_color +'</style>'));
	});
});

wp.customize('woo_elments_bg_colors', function( value ){
	value.bind(function( to ){
		var woo_elments_bg_colors = '.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce-cart-info h3 a::after, .produt_discount_price, .woocommerce .produt_discount_price span{ background-color:' + to + '!important; } .woocommerce .woocommerce-product-rating .star-rating, .star-rating{ color:' + to + '!important;  }';
		if($(document).find('#woo_elments_bg_colors').length) {
			$(document).find('#woo_elments_bg_colors').remove();
		}
	$(document).find('head').append($('<style id="woo_elments_bg_colors">' + woo_elments_bg_colors +'</style>'));
	});
});
wp.customize('woo_elments_text_colors', function( value ){
	value.bind(function( to ){
		var woo_elments_text_colors = '.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce-cart-info h3 a::after, .produt_discount_price, .woocommerce .produt_discount_price span{ color:' + to + '!important; } .woocommerce .produt_discount_price span{ border-color:' + to + '!important; }';
		if($(document).find('#woo_elments_text_colors').length) {
			$(document).find('#woo_elments_text_colors').remove();
		}
	$(document).find('head').append($('<style id="woo_elments_text_colors">' + woo_elments_text_colors +'</style>'));
	});
});
// Fields
wp.customize('success_msg_bg_color', function( value ){
	value.bind(function( to ){
		var success_msg_bg_color ='.cart-success-message{ background: '+ to +' !important; }'
		if($(document).find('#success_msg_bg_color').length) {
			$(document).find('#success_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="success_msg_bg_color">' + success_msg_bg_color + '</style>'));
	});
});
wp.customize('success_msg_text_color', function( value ){
	value.bind(function( to ){
		var success_msg_text_color ='.cart-success-message{ color: '+ to +' !important; }'
		if($(document).find('#success_msg_text_color').length) {
			$(document).find('#success_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="success_msg_text_color">' + success_msg_text_color + '</style>'));
	});
});
wp.customize('notification_msg_bg_color', function( value ){
	value.bind(function( to ){
		var notification_msg_bg_color ='.woocommerce-cart-info{ background: '+ to +' !important; }'
		if($(document).find('#notification_msg_bg_color').length) {
			$(document).find('#notification_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="notification_msg_bg_color">' + notification_msg_bg_color + '</style>'));
	});
});
wp.customize('notification_msg_text_color', function( value ){
	value.bind(function( to ){
		var notification_msg_text_color ='.woocommerce-cart-info, .woocommerce-cart-info a{ color: '+ to +' !important; }';
		if($(document).find('#notification_msg_text_color').length) {
			$(document).find('#notification_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="notification_msg_text_color">' + notification_msg_text_color + '</style>'));
	});
});
wp.customize('warning_msg_bg_color', function( value ){
	value.bind(function( to ){
		var warning_msg_bg_color ='.woocommerce-cart-error{ background: '+ to +' !important; }'
		if($(document).find('#warning_msg_bg_color').length) {
			$(document).find('#warning_msg_bg_color').remove();
		}
	$(document).find('head').append($('<style id="warning_msg_bg_color">' + warning_msg_bg_color + '</style>'));
	});
});
wp.customize('warning_msg_text_color', function( value ){
	value.bind(function( to ){
		var warning_msg_text_color ='.woocommerce-cart-error{ color: '+ to +' !important; }'
		if($(document).find('#warning_msg_text_color').length) {
			$(document).find('#warning_msg_text_color').remove();
		}
	$(document).find('head').append($('<style id="warning_msg_text_color">' + warning_msg_text_color + '</style>'));
	});
});
// Button Colors
wp.customize('woo_buttons_bg_color', function( value ){
	value.bind(function( to ){
		var woo_buttons_bg_color ='.primary-button, .single_add_to_cart_button.button.alt, .woocommerce #respond input#submit, .cart-success-message a.button.wc-forward, input.button, a.checkout-button.button.alt.wc-forward, .woocommerce-shipping-calculator button.button, .woocommerce .form-row.place-order input#place_order, p.return-to-shop a.button.wc-backward, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a{ background: '+ to +' !important; }'
		if($(document).find('#woo_buttons_bg_color').length) {
			$(document).find('#woo_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="woo_buttons_bg_color">' + woo_buttons_bg_color + '</style>'));
	});
});
wp.customize('woo_buttons_text_color', function( value ){
	value.bind(function( to ){
		var woo_buttons_text_color ='.primary-button, .single_add_to_cart_button.button.alt, .woocommerce #respond input#submit, .cart-success-message a.button.wc-forward, input.button, a.checkout-button.button.alt.wc-forward, .woocommerce-shipping-calculator button.button, .woocommerce .form-row.place-order input#place_order, p.return-to-shop a.button.wc-backward, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a{ color: '+ to +' !important; }'
		if($(document).find('#woo_buttons_text_color').length) {
			$(document).find('#woo_buttons_text_color').remove();
		}
	$(document).find('head').append($('<style id="woo_buttons_text_color">' + woo_buttons_text_color + '</style>'));
	});
});
wp.customize('woo_buttons_text_hover_color', function( value ){
	value.bind(function( to ){
		var woo_buttons_text_hover_color ='.primary-button:hover, .single_add_to_cart_button.button.alt:hover, .woocommerce #respond input#submit:hover, .cart-success-message a.button.wc-forward:hover, input.button:hover, a.checkout-button.button.alt.wc-forward:hover, .woocommerce-shipping-calculator button.button:hover, .woocommerce .form-row.place-order input#place_order:hover, p.return-to-shop a.button.wc-backward:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{ color: '+ to +' !important; }'
		if($(document).find('#woo_buttons_text_hover_color').length) {
			$(document).find('#woo_buttons_text_hover_color').remove();
		}
	$(document).find('head').append($('<style id="woo_buttons_text_hover_color">' + woo_buttons_text_hover_color + '</style>'));
	});
});
wp.customize('woo_buttons_bg_hover_color', function( value ){
	value.bind(function( to ){
		var woo_buttons_bg_hover_color ='.primary-button:hover, .single_add_to_cart_button.button.alt:hover, .woocommerce #respond input#submit:hover, .cart-success-message a.button.wc-forward:hover, input.button:hover, a.checkout-button.button.alt.wc-forward:hover, .woocommerce-shipping-calculator button.button:hover, .woocommerce .form-row.place-order input#place_order:hover, p.return-to-shop a.button.wc-backward:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover{ background: '+ to +' !important; }'
		if($(document).find('#woo_buttons_bg_hover_color').length) {
			$(document).find('#woo_buttons_bg_hover_color').remove();
		}
	$(document).find('head').append($('<style id="woo_buttons_bg_hover_color">' + woo_buttons_bg_hover_color + '</style>'));
	});
});
/* Blog */
wp.customize('blog_page_bg_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var blog_page_bg_color ='.standard-blog .blog_post_content_wrapper{ background-color: '+ to +' !important; }'
		if($(document).find('#blog_page_bg_color').length) {
			$(document).find('#blog_page_bg_color').remove();
		}
		$(document).find('head').append($('<style id="blog_even_bg_color">' + blog_page_bg_color + '</style>'));
	});
	});
});
wp.customize('blog_page_date_bg_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var blog_page_date_border_color =' .standard-blog .meta_date_wrapper{ border-color: '+ to +' !important; } .standard-blog .meta_date{ background: '+ to +' !important; }';
		if($(document).find('#blog_page_date_border_color').length) {
			$(document).find('#blog_page_date_border_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_date_border_color">' + blog_page_date_border_color + '</style>'));
	});
	});
});
wp.customize('blog_page_date_color', function( value ){
	value.bind(function( to ){
		var blog_page_date_color =' .standard-blog .meta_date{ color: '+ to +' !important; }';
		if($(document).find('#blog_page_date_color').length) {
			$(document).find('#blog_page_date_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_date_color">' + blog_page_date_color + '</style>'));
	});
});

wp.customize('blog_page_img_border_color', function( value ){
	value.bind(function( to ){
		var blog_page_img_border_color ='.standard-blog .blog_post_content_wrapper .image_title_border{ border-color: '+ to +' !important; }'
		if($(document).find('#blog_page_img_border_color').length) {
			$(document).find('#blog_page_img_border_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_img_border_color">' + blog_page_img_border_color + '</style>'));
	});
});

wp.customize('blog_page_title_color', function( value ){
	value.bind(function( to ){
		var blog_page_title_color ='.mid_container_wrapper_section .standard-blog .post_description_wrapper h3 a, .standard-blog .meta_post_info, .quote_format_text h3, .standard-blog .quote_format_text h5, .standard-blog .post_description_wrapper h3, .standard-blog .post_description_wrapper h1, .standard-blog .post_description_wrapper h2, .standard-blog .post_description_wrapper h4, .standard-blog .post_description_wrapper h5, .standard-blog .post_description_wrapper h6{ color: '+ to +' !important; }'
		if($(document).find('#blog_page_title_color').length) {
			$(document).find('#blog_page_title_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_title_color">' + blog_page_title_color + '</style>'));
	});
});

wp.customize('blog_page_title_hover_color', function( value ){
	value.bind(function( to ){
		var blog_page_title_hover_color ='.mid_container_wrapper_section .standard-blog .post_description_wrapper h3 a:hover{ color: '+ to +' !important; }'
		if($(document).find('#blog_page_title_hover_color').length) {
			$(document).find('#blog_page_title_hover_color').remove();
		}
		$(document).find('head').append($('<style id="blog_page_title_hover_color">' + blog_page_title_hover_color + '</style>'));
	});
});
wp.customize('blog_desc_color', function( value ){
	value.bind(function( to ){
		var blog_desc_color ='.standard-blog .post_description_wrapper p{ color: '+ to +' !important; }'
		if($(document).find('#blog_desc_color').length) {
			$(document).find('#blog_desc_color').remove();
		}
		$(document).find('head').append($('<style id="blog_desc_color">' + blog_desc_color + '</style>'));
	});
});
wp.customize('blog_meta_info_t_b_border_color', function( value ){
	value.bind(function( to ){
		var blog_meta_info_t_b_border_color ='.standard-blog .meta_post_info{ border-color: '+ to +' !important; }'
		if($(document).find('#blog_meta_info_t_b_border_color').length) {
			$(document).find('#blog_meta_info_t_b_border_color').remove();
		}
		$(document).find('head').append($('<style id="blog_meta_info_t_b_border_color">' + blog_meta_info_t_b_border_color + '</style>'));
	});
});
wp.customize('blog_link_color', function( value ){
	value.bind(function( to ){
		var blog_link_color ='.mid_container_wrapper_section .standard-blog .meta_post_info span a, .standard-blog .post_description_wrapper a:not(.readmore_button){ color: '+ to +' !important; }'
		if($(document).find('#blog_link_color').length) {
			$(document).find('#blog_link_color').remove();
		}
		$(document).find('head').append($('<style id="blog_link_color">' + blog_link_color + '</style>'));
	});
});
wp.customize('blog_link_hover_color', function( value ){
	value.bind(function( to ){
		var blog_link_hover_color ='.standard-blog .meta_post_info span a:hover, .standard-blog .post_description_wrapper a:hover:not(.readmore_button){ color: '+ to +' !important; }'
		if($(document).find('#blog_link_hover_color').length) {
			$(document).find('#blog_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id="blog_link_hover_color">' + blog_link_hover_color + '</style>'));
	});
});
wp.customize('blog_button_bg_color', function( value ){
	value.bind(function( to ){
		var blog_button_bg_color ='.standard-blog .readmore_button{ background: '+ to +' !important; }'
		if($(document).find('#blog_button_bg_color').length) {
			$(document).find('#blog_button_bg_color').remove();
		}
		$(document).find('head').append($('<style id="blog_button_bg_color">' + blog_button_bg_color + '</style>'));
	});
});
wp.customize('blog_button_color', function( value ){
	value.bind(function( to ){
		var blog_button_color ='.standard-blog .readmore_button{ color: '+ to +' !important; }'
		if($(document).find('#blog_button_color').length) {
			$(document).find('#blog_button_color').remove();
		}
		$(document).find('head').append($('<style id="blog_button_color">' + blog_button_color + '</style>'));
	});
});
wp.customize('blog_button_hover_bg_color', function( value ){
	value.bind(function( to ){
		var blog_button_hover_bg_color ='.standard-blog .readmore_button:hover{ background: '+ to +' !important; }'
		if($(document).find('#blog_button_hover_bg_color').length) {
			$(document).find('#blog_button_hover_bg_color').remove();
		}
		$(document).find('head').append($('<style id="blog_button_hover_bg_color">' + blog_button_hover_bg_color + '</style>'));
	});
});
wp.customize('blog_button_hover_color', function( value ){
	value.bind(function( to ){
		var blog_button_hover_color ='.standard-blog .readmore_button:hover{ color: '+ to +' !important; }'
		if($(document).find('#blog_button_hover_color').length) {
			$(document).find('#blog_button_hover_color').remove();
		}
		$(document).find('head').append($('<style id="blog_button_hover_color">' + blog_button_hover_color + '</style>'));
	});
});
wp.customize('blog_button_button_font_weight', function( value ){
	value.bind(function( to ){
		var blog_button_button_font_weight ='.standard-blog .readmore_button{ font-weight: '+ to +' !important; }'
		if($(document).find('#blog_button_button_font_weight').length) {
			$(document).find('#blog_button_button_font_weight').remove();
		}
		$(document).find('head').append($('<style id="blog_button_button_font_weight">' + blog_button_button_font_weight + '</style>'));
	});
});
wp.customize('blog_button_button_font_style', function( value ){
	value.bind(function( to ){
		var blog_button_button_font_style ='.standard-blog .readmore_button{ font-style: '+ to +' !important; }'
		if($(document).find('#blog_button_button_font_style').length) {
			$(document).find('#blog_button_button_font_style').remove();
		}
		$(document).find('head').append($('<style id="blog_button_button_font_style">' + blog_button_button_font_style + '</style>'));
	});
});
wp.customize('blog_button_letter_space', function( value ){
	value.bind(function( to ){
		var blog_button_letter_space ='.standard-blog .readmore_button{ letter-spacing: '+ to +'px!important; }';
		if($(document).find('#blog_button_letter_space').length) {
			$(document).find('#blog_button_letter_space').remove();
		}
		$(document).find('head').append($('<style id="blog_button_letter_space">' + blog_button_letter_space + '</style>'));
	});
});
wp.customize('blog_gallery_slider_buttons_color', function( value ){
	value.bind(function( to ){
		var blog_gallery_slider_buttons_color =' .blog_post_content_wrapper .owl-dot span, .blog_single_img  .owl-dot span{ background: '+ to +' !important; } .blog_post_content_wrapper .owl-dot, .blog_single_img  .owl-dot{ border-color: '+ to +' !important; }';
		if($(document).find('#blog_gallery_slider_buttons_color').length) {
			$(document).find('#blog_gallery_slider_buttons_color').remove();
		}
		$(document).find('head').append($('<style id="blog_gallery_slider_buttons_color">' + blog_gallery_slider_buttons_color + '</style>'));
	});
});

wp.customize('blog_gallery_slider_active_buttons_color', function( value ){
	value.bind(function( to ){
		var blog_gallery_slider_active_buttons_color ='blog_post_content_wrapper .owl-dot.active span, .blog_post_content_wrapper .owl-dot:hover span, .blog_single_img  .owl-dot:hover span, .blog_single_img  .owl-dot.active span{ background: '+ to +' !important; } .blog_post_content_wrapper .owl-dot.active,  .blog_post_content_wrapper .owl-dot:hover, .blog_single_img .owl-dot.active, .blog_single_img .owl-dot:hover{ border-color: '+ to +' !important; }';
		if($(document).find('#blog_gallery_slider_active_buttons_color').length) {
			$(document).find('#blog_gallery_slider_active_buttons_color').remove();
		}
		$(document).find('head').append($('<style id="blog_gallery_slider_active_buttons_color">' + blog_gallery_slider_active_buttons_color + '</style>'));
	});
});
//Blog Quote Formate
wp.customize('blog_quote_font_size', function( value ){
	value.bind(function( to ){
		var blog_quote_font_size ='.quote_format_text h4{ font-size: '+ to +'px!important; }';
		if($(document).find('#blog_quote_font_size').length) {
			$(document).find('#blog_quote_font_size').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_font_size">' + blog_quote_font_size + '</style>'));
	});
});
wp.customize('blog_quote_font_letter_space', function( value ){
	value.bind(function( to ){
		var blog_quote_font_letter_space ='.quote_format_text h4{ letter-spacing: '+ to +'px!important; }';
		if($(document).find('#blog_quote_font_letter_space').length) {
			$(document).find('#blog_quote_font_letter_space').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_font_letter_space">' + blog_quote_font_letter_space + '</style>'));
	});
});

wp.customize('blog_quote_font_weight', function( value ){
	value.bind(function( to ){
		var blog_quote_font_weight ='.quote_format_text h4{ font-weight: '+ to +' !important; }';
		if($(document).find('#blog_quote_font_weight').length) {
			$(document).find('#blog_quote_font_weight').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_font_weight">' + blog_quote_font_weight + '</style>'));
	});
});

wp.customize('blog_quote_font_style', function( value ){
	value.bind(function( to ){
		var blog_quote_font_style ='.quote_format_text h4{ font-style: '+ to +'!important; }';
		if($(document).find('#blog_quote_font_style').length) {
			$(document).find('#blog_quote_font_style').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_font_style">' + blog_quote_font_style + '</style>'));
	});
});
wp.customize('blog_quote_author_font_size', function( value ){
	value.bind(function( to ){
		var blog_quote_author_font_size ='.quote_format h5{ font-size: '+ to +'px!important; }';
		if($(document).find('#blog_quote_author_font_size').length) {
			$(document).find('#blog_quote_author_font_size').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_author_font_size">' + blog_quote_author_font_size + '</style>'));
	});
});

wp.customize('blog_quote_author_font_letter_space', function( value ){
	value.bind(function( to ){
		var blog_quote_author_font_letter_space ='.quote_format h5{ letter-spacing: '+ to +'px!important; }';
		if($(document).find('#blog_quote_author_font_letter_space').length) {
			$(document).find('#blog_quote_author_font_letter_space').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_author_font_letter_space">' + blog_quote_author_font_letter_space + '</style>'));
	});
});
wp.customize('blog_quote_author_font_weight', function( value ){
	value.bind(function( to ){
		var blog_quote_author_font_weight ='.quote_format h5{ font-weight: '+ to +' !important; }';
		if($(document).find('#blog_quote_author_font_weight').length) {
			$(document).find('#blog_quote_author_font_weight').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_author_font_weight">' + blog_quote_author_font_weight + '</style>'));
	});
});

wp.customize('blog_quote_author_font_style', function( value ){
	value.bind(function( to ){
		var blog_quote_author_font_style ='.quote_format h5{ font-style: '+ to +' !important; }';
		if($(document).find('#blog_quote_author_font_style').length) {
			$(document).find('#blog_quote_author_font_style').remove();
		}
		$(document).find('head').append($('<style id="blog_quote_author_font_style">' + blog_quote_author_font_style + '</style>'));
	});
});

//Blog Single Page
wp.customize('blog_single_page_bg_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_bg_color ='.post_description_wrapper, div#entry-author-info, #mid_container_wrapper .relatedposts, .blog_single_page_content_wrapper #comments{ background: '+ to +' !important; }';
		if($(document).find('#blog_single_page_bg_color').length) {
			$(document).find('#blog_single_page_bg_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_bg_color">' + blog_single_page_bg_color + '</style>'));
	});
});

wp.customize('blog_single_page_desc_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_desc_color =' .post_description_wrapper, .post_description_wrapper p, div#entry-author-info p, #mid_container_wrapper .relatedposts span, .blog_single_page_content_wrapper #comments .blog_single_page_content_wrapper #comments p, .single_page_desription_comment_section p, .single_page_desription_comment_section {color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_desc_color').length) {
			$(document).find('#blog_single_page_desc_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_desc_color">' + blog_single_page_desc_color + '</style>'));
	});
});

wp.customize('blog_single_page_title_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_title_color ='.single_page_desription_comment_section h1, .single_page_desription_comment_section h2, .single_page_desription_comment_section h3, .single_page_desription_comment_section h4, .single_page_desription_comment_section h5, .single_page_desription_comment_section h6, .single_page_desription_comment_section .relatedposts h4 a{ color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_title_color').length) {
			$(document).find('#blog_single_page_title_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_title_color">' + blog_single_page_title_color + '</style>'));
	});
});
wp.customize('blog_single_page_title_border_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_title_border_color =' .relatedposts .title_seperator{ background: '+ to +' !important; } .relatedposts .title_seperator::after{ border-color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_title_border_color').length) {
			$(document).find('#blog_single_page_title_border_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_title_border_color">' + blog_single_page_title_border_color + '</style>'));
	});
});
wp.customize('blog_single_page_comment_list_border_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_comment_list_border_color ='  ol.commentlist li, .commentlist li ul.children{ border-color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_comment_list_border_color').length) {
			$(document).find('#blog_single_page_comment_list_border_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_comment_list_border_color">' + blog_single_page_comment_list_border_color + '</style>'));
	});
});
wp.customize('blog_single_page_link_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_link_color ='.single_page_desription_comment_section a{color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_link_color').length) {
			$(document).find('#blog_single_page_link_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_link_color">' + blog_single_page_link_color + '</style>'));
	});
});
wp.customize('blog_single_page_link_hover_color', function( value ){
	value.bind(function( to ){
		var blog_single_page_link_hover_color ='.single_page_desription_comment_section a:hover, .single_page_desription_comment_section .relatedposts h4 a:hover{color: '+ to +' !important; }';
		if($(document).find('#blog_single_page_link_hover_color').length) {
			$(document).find('#blog_single_page_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id="blog_single_page_link_hover_color">' + blog_single_page_link_hover_color + '</style>'));
	});
});
wp.customize( 'kaya_readmore_blog', function( value ) {
		value.bind( function( to ) {
			$( '.standard-blog .readmore_button' ).html( to );
		} );
	} );
// Share Icons Color
wp.customize('single_tags_share_text_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var single_tags_share_text_color ='.blog_tags_sharing_icons h6{ color: '+ to +' !important; }'
		if($(document).find('#single_tags_share_text_color').length) {
			$(document).find('#single_tags_share_text_color').remove();
		}
		$(document).find('head').append($('<style id="single_tags_share_text_color">' + single_tags_share_text_color + '</style>'));
	});
	});
});
wp.customize('tags_share_link_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var tags_share_link_color ='.mid_container_wrapper_section .blog_tags_sharing_icons a{ color: '+ to +' !important; }'
		if($(document).find('#tags_share_link_color').length) {
			$(document).find('#tags_share_link_color').remove();
		}
		$(document).find('head').append($('<style id="tags_share_link_color">' + tags_share_link_color + '</style>'));
	});
	});
});
wp.customize('tags_share_link_hover_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var tags_share_link_hover_color ='.mid_container_wrapper_section .blog_tags_sharing_icons a:hover{ color: '+ to +' !important; }'
		if($(document).find('#tags_share_link_hover_color').length) {
			$(document).find('#tags_share_link_hover_color').remove();
		}
		$(document).find('head').append($('<style id="tags_share_link_hover_color">' + tags_share_link_hover_color + '</style>'));
	});
	});
});

// Form Border Comment
wp.customize('comment_form_border_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_border_color ='div#comments textarea, div#comments input:not(.submit){ border: 1px solid '+ to +' !important; }'
		if($(document).find('#comment_form_border_color').length) {
			$(document).find('#comment_form_border_color').remove();
		}
		$(document).find('head').append($('<style id="comment_form_border_color">' + comment_form_border_color + '</style>'));
	});
	});
});
wp.customize('comment_form_border_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_border_color ='div#comments textarea, div#comments input:not(.submit){ border: 1px solid '+ to +' !important; }'
		if($(document).find('#comment_form_border_color').length) {
			$(document).find('#comment_form_border_color').remove();
		}
		$(document).find('head').append($('<style id="comment_form_border_color">' + comment_form_border_color + '</style>'));
	});
	});
});
wp.customize('comment_form_input_text', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_input_text ='div#comments textarea, div#comments input:not(.submit){ color: '+ to +' !important; }'
		if($(document).find('#comment_form_input_text').length) {
			$(document).find('#comment_form_input_text').remove();
		}
		$(document).find('head').append($('<style id="comment_form_input_text">' + comment_form_input_text + '</style>'));
	});
	});
});
wp.customize('comment_form_button_bg', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_button_bg ='#respond input.submit{ background-color: '+ to +' !important; border-color:'+ to +' !important;}';
		if($(document).find('#comment_form_button_bg').length) {
			$(document).find('#comment_form_button_bg').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_bg">' + comment_form_button_bg + '</style>'));
	});
	});
});
wp.customize('comment_form_button_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_button_color ='#respond input.submit{ color: '+ to +' !important; }'
		if($(document).find('#comment_form_button_color').length) {
			$(document).find('#comment_form_button_color').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_color">' + comment_form_button_color + '</style>'));
	});
	});
});
wp.customize('comment_form_button_hover_bg', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_button_hover_bg ='#respond input.submit:hover{ background-color: '+ to +' !important; }'
		if($(document).find('#comment_form_button_hover_bg').length) {
			$(document).find('#comment_form_button_hover_bg').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_hover_bg">' + comment_form_button_hover_bg + '</style>'));
	});
	});
});
wp.customize('comment_form_button_hover_color', function( value ){
	value.bind(function( to ){
		value.bind(function( to ){
		var comment_form_button_hover_color ='#respond input.submit:hover{ color: '+ to +' !important; }'
		if($(document).find('#comment_form_button_hover_color').length) {
			$(document).find('#comment_form_button_hover_color').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_hover_color">' + comment_form_button_hover_color + '</style>'));
	});
	});
});
wp.customize('comment_form_button_letter_sapcing', function( value ){
		value.bind(function( to ){
		var comment_form_button_letter_sapcing ='#respond input.submit{ letter-spacing: '+ to +'px!important; }';
		if($(document).find('#comment_form_button_letter_sapcing').length) {
			$(document).find('#comment_form_button_letter_sapcing').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_letter_sapcing">' + comment_form_button_letter_sapcing + '</style>'));
	});
});
wp.customize('comment_form_button_font_weight', function( value ){
	value.bind(function( to ){
		var comment_form_button_font_weight ='#respond input.submit{ font-weight: '+ to +' !important; }'
		if($(document).find('#comment_form_button_font_weight').length) {
			$(document).find('#comment_form_button_font_weight').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_font_weight">' + comment_form_button_font_weight + '</style>'));
	});
});
wp.customize('comment_form_button_font_style', function( value ){
	value.bind(function( to ){
		var comment_form_button_font_style ='#respond input.submit{ font-style: '+ to +' !important; }'
		if($(document).find('#comment_form_button_font_style').length) {
			$(document).find('#comment_form_button_font_style').remove();
		}
		$(document).find('head').append($('<style id="comment_form_button_font_style">' + comment_form_button_font_style + '</style>'));
	});
});
// Heading Fonts Sizes
/*wp.customize('body_font_size', function(  value ){
	value.bind(function(to){
		var body_font_line_height = Math.round(1.6 * to);
		var body_font_size = 'body, p{ font-size:'+ to +'px!important; line-height:'+ body_font_line_height +'px;}';
		if($(document).find('#body_font_size').length) {
			$(document).find('#body_font_size').remove();
		}
	$(document).find('head').append($('<style id="body_font_size">' + body_font_size + '</style>'));
	});
});*/

wp.customize('menu_font_size', function(  value ){
	value.bind(function(to){
		var menu_font_size = '.menu ul li a{ font-size:'+ to +'px!important;}';
		if($(document).find('#menu_font_size').length) {
			$(document).find('#menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="menu_font_size">' + menu_font_size + '</style>'));
	});
});
wp.customize('child_menu_font_size', function(  value ){
	value.bind(function(to){
		var child_menu_font_size = '.menu ul ul li a{ font-size:'+ to +'px!important;}';
		if($(document).find('#child_menu_font_size').length) {
			$(document).find('#child_menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_size">' + child_menu_font_size + '</style>'));
	});
});
wp.customize('h1_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h1 = Math.round(1.1 * to);
		var h1_title_fontsize = 'h1{ font-size:'+ to +'px!important; line-height:'+ line_height_h1 +'px;}';
		if($(document).find('#h1_title_fontsize').length) {
			$(document).find('#h1_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h1_title_fontsize">' + h1_title_fontsize + '</style>'));
	});
});

wp.customize('h2_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h2 = Math.round(1.1 * to);
		var h2_title_fontsize = 'h2{ font-size:'+ to +'px!important; line-height:'+ line_height_h2 +'px;}';
		if($(document).find('#h2_title_fontsize').length) {
			$(document).find('#h2_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h2_title_fontsize">' + h2_title_fontsize + '</style>'));
	});
});

wp.customize('h3_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h3 = Math.round(1.1 * to);
		var h3_title_fontsize = 'h3{ font-size:'+ to +'px!important; line-height:'+ line_height_h3 +'px;}';
		if($(document).find('#h3_title_fontsize').length) {
			$(document).find('#h3_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h3_title_fontsize">' + h3_title_fontsize + '</style>'));
	});
});
wp.customize('h4_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h4 = Math.round(1.1 * to);
		var h4_title_fontsize = 'h4{ font-size:'+ to +'px!important; line-height:'+ line_height_h4 +'px;}';
		if($(document).find('#h4_title_fontsize').length) {
			$(document).find('#h4_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h4_title_fontsize">' + h4_title_fontsize + '</style>'));
	});
});

wp.customize('h5_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h5 = Math.round(1.1 * to);
		var h5_title_fontsize = 'h5{ font-size:'+ to +'px!important; line-height:'+ line_height_h5 +'px;}';
		if($(document).find('#h5_title_fontsize').length) {
			$(document).find('#h5_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h5_title_fontsize">' + h5_title_fontsize + '</style>'));
	});
});
wp.customize('h6_title_fontsize', function(  value ){
	value.bind(function(to){
		var line_height_h6 = Math.round(1.1 * to);
		var h6_title_fontsize = 'h6{ font-size:'+ to +'px!important; line-height:'+ line_height_h6 +'px;}';
		if($(document).find('#h6_title_fontsize').length) {
			$(document).find('#h6_title_fontsize').remove();
		}
	$(document).find('head').append($('<style id="h6_title_fontsize">' + h6_title_fontsize + '</style>'));
	});
});

// Fonts
var subset = ['latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese'];
var font_weights = ['100', '100italic', '200', '200italic', '300', '300italic', '400', '400italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'];
// Frame Border
wp.customize('frame_border_text_font_family', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var google_frame_border_text_font_family ='http://fonts.googleapis.com/css?family='+replacestring;
		var frame_border_text_font_family = '.toggle_menu_wrapper span, .header_contact_info span, .header_contact_info a,  .user_login_info span, .user_login_info a, .bottom_footer_bar_wrapper, .bottom_footer_bar_wrapper a, .bottom_footer_bar_wrapper span{ font-family:'+ to +'!important}';
		if($(document).find('#google_frame_border_text_font_family').length) {
				$(document).find('#google_frame_border_text_font_family').remove();
			}
		if($(document).find('#frame_border_text_font_family').length) {
				$(document).find('#frame_border_text_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_frame_border_text_font_family' href='"+ google_frame_border_text_font_family +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='frame_border_text_font_family'>" + frame_border_text_font_family + "</style>"));
	}else{
		$(document).find('#frame_border_text_font_family').remove();
		$(document).find('#google_frame_border_text_font_family').remove();
		var frame_border_text_font_family = '.header_logo_wrapper h1.logo a, .header_logo_wrapper h1.sticky_logo a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + frame_border_text_font_family + "</style>"));
	}
	});
});
// Logo
wp.customize('header_text_logo_font_family', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var google_logo_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var logo_font_family = '.header_logo_wrapper h1.logo a,  .header_logo_wrapper h1.sticky_logo a{ font-family:'+ to +'!important}';
		if($(document).find('#google_logo_font').length) {
				$(document).find('#google_logo_font').remove();
			}
		if($(document).find('#logo_font_family').length) {
				$(document).find('#logo_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_logo_font' href='"+ google_logo_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='logo_font_family'>" + logo_font_family + "</style>"));
	}else{
		$(document).find('#logo_font_family').remove();
		$(document).find('#google_logo_font').remove();
		var logo_font_family = '.header_logo_wrapper h1.logo a, .header_logo_wrapper h1.sticky_logo a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + logo_font_family + "</style>"));
	}
	});
});
// Tag Line
// Logo
wp.customize('text_logo_tagline_font_family', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var text_logo_tagline_font_family ='http://fonts.googleapis.com/css?family='+replacestring;
		var tagline_font_family = '.header_logo_wrapper .logo_tag_line{ font-family:'+ to +'!important}';
		if($(document).find('#text_logo_tagline_font_family').length) {
				$(document).find('#text_logo_tagline_font_family').remove();
			}
		if($(document).find('#tagline_font_family').length) {
				$(document).find('#tagline_font_family').remove();
			}	
		$(document).find('head').append($("<link id='text_logo_tagline_font_family' href='"+ text_logo_tagline_font_family +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='tagline_font_family'>" + tagline_font_family + "</style>"));
	}else{
		$(document).find('#tagline_font_family').remove();
		$(document).find('#text_logo_tagline_font_family').remove();
		var tagline_font_family = '.header_logo_wrapper .logo_tag_line, #right_header_section .logo_tag_line, #left_header_section .logo_tag_line{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + tagline_font_family + "</style>"));
	}
	});
});

wp.customize('google_body_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){
		var replacestring = to.split(' ').join('+');
		var   google_body_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var body_font_family = 'body ,p, a{ font-family:'+ to +'!important}';
		if($(document).find('#google_body_font').length) {
				$(document).find('#google_body_font').remove();
			}
		if($(document).find('#body_font_family').length) {
				$(document).find('#body_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_body_font' href='"+ google_body_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='body_font_family'>" + body_font_family + "</style>"));
	}else{
		$(document).find('#body_font_family').remove();
		$(document).find('#google_body_font').remove();
		var body_font_family = 'body ,p, a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + body_font_family + "</style>"));
	}
	});
});

wp.customize('google_heading_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){	
		var replacestring = to.split(' ').join('+');
		var google_heading_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var heading_font_family = 'h1,h2,h3,h4,h5,h6{ font-family:'+ to +'!important}';
		if($(document).find('#google_heading_font').length) {
				$(document).find('#google_heading_font').remove();
			}
		if($(document).find('#heading_font_family').length) {
				$(document).find('#heading_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_heading_font' href='"+ google_heading_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='heading_font_family'>" + heading_font_family + "</style>"));
	}else{
		$(document).find('#google_heading_font').remove();
		$(document).find('#heading_font_family').remove();
		var heading_font_family = 'h1,h2,h3,h4,h5,h6{ font-family:arial!important}';
		$(document).find('head').append($("<style" + heading_font_family + "</style>"));
	}	
	});
});

wp.customize('google_menu_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){	
		var replacestring = to.split(' ').join('+');
		var google_menu_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var menu_font_family = '.menu ul li a{ font-family:'+ to +'!important}';
		if($(document).find('#google_menu_font').length) {
				$(document).find('#google_menu_font').remove();
			}
		if($(document).find('#menu_font_family').length) {
				$(document).find('#menu_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_menu_font' href='"+ google_menu_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='menu_font_family'>" + menu_font_family + "</style>"));

	}else{
		$(document).find('#google_menu_font').remove();
		$(document).find('#menu_font_family').remove();
		var menu_font_family = '.menu ul li a{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + menu_font_family + "</style>"));
	}	
});
});
wp.customize('google_all_desc_font', function(  value ){
	value.bind(function(to){
	if( '0' != to){	
		var replacestring = to.split(' ').join('+');
		var google_all_desc_font ='http://fonts.googleapis.com/css?family='+replacestring;
		var titles_desc_font_family = 'span.menu_description, .portfolio_content_wrapper span.pf_title_wrapper, .pf_content_wrapper span, .search_box_style input, .search_box_style select, #mid_container_wrapper .pf_model_info_wrapper ul li span, .social_media_sharing_icons span.share_on_title, span.image_side_title, .custom_title_wrapper p, .testimonial_slider p, .meta_post_info span a, .blog_post_wrapper .readmore_button, span.meta_date_month, .quote_format h3, .widget_container .tagcloud a, .recent_posts_date, .comment_posted_date, div#comments input, div#comments textarea, blockquote p, .related_post_slider span, #slidecaption p{ font-family:'+ to +'!important}';
		if($(document).find('#google_all_desc_font').length) {
				$(document).find('#google_all_desc_font').remove();
			}
		if($(document).find('#titles_desc_font_family').length) {
				$(document).find('#titles_desc_font_family').remove();
			}	
		$(document).find('head').append($("<link id='google_all_desc_font' href='"+ google_all_desc_font +":"+font_weights+"&subset="+subset+"' rel='stylesheet' type='text/css'><style id='titles_desc_font_family'>" + titles_desc_font_family + "</style>"));

	}else{
		$(document).find('#google_all_desc_font').remove();
		$(document).find('#titles_desc_font_family').remove();
		var titles_desc_font_family = 'span.menu_description, .portfolio_content_wrapper span.pf_title_wrapper, .pf_content_wrapper span, .search_box_style input, .search_box_style select, #mid_container_wrapper .pf_model_info_wrapper ul li span, .social_media_sharing_icons span.share_on_title, span.image_side_title, .custom_title_wrapper p, .testimonial_slider p, .meta_post_info span a, .blog_post_wrapper .readmore_button, span.meta_date_month, .quote_format h3, .widget_container .tagcloud a, .recent_posts_date, .comment_posted_date, div#comments input, div#comments textarea, blockquote p, .related_post_slider span, #slidecaption p{ font-family:arial!important}';
		$(document).find('head').append($("<style>" + titles_desc_font_family + "</style>"));
	}	
});
});
wp.customize('google_all_desc_font_style', function( value ){
	value.bind(function( to ){
		$('span.menu_description, .portfolio_content_wrapper span.pf_title_wrapper, .pf_content_wrapper span, .search_box_style input, .search_box_style select, #mid_container_wrapper .pf_model_info_wrapper ul li span, .social_media_sharing_icons span.share_on_title, span.image_side_title, .custom_title_wrapper p, .testimonial_slider p, .meta_post_info span a, .blog_post_wrapper .readmore_button, span.meta_date_month, .quote_format h3, .widget_container .tagcloud a, .recent_posts_date, .comment_posted_date, div#comments input, div#comments textarea, blockquote p, .related_post_slider span, #slidecaption p').css('font-style',to);
	});
});
// Letter Spacing
wp.customize('h1_font_letter_space', function(  value ){
	value.bind(function(to){
		var h1_font_letter_space = 'h1{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h1_font_letter_space').length) {
			$(document).find('#h1_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h1_font_letter_space">' + h1_font_letter_space + '</style>'));
	});
});

wp.customize('h2_font_letter_space', function(  value ){
	value.bind(function(to){
		var h2_font_letter_space = 'h2{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h2_font_letter_space').length) {
			$(document).find('#h2_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h2_font_letter_space">' + h2_font_letter_space + '</style>'));
	});
});

wp.customize('h3_font_letter_space', function(  value ){
	value.bind(function(to){
		var h3_font_letter_space = 'h3{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h3_font_letter_space').length) {
			$(document).find('#h3_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h3_font_letter_space">' + h3_font_letter_space + '</style>'));
	});
});

wp.customize('h4_font_letter_space', function(  value ){
	value.bind(function(to){
		var h4_font_letter_space = 'h4{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h4_font_letter_space').length) {
			$(document).find('#h4_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h4_font_letter_space">' + h4_font_letter_space + '</style>'));
	});
});

wp.customize('h5_font_letter_space', function(  value ){
	value.bind(function(to){
		var h5_font_letter_space = 'h5{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h5_font_letter_space').length) {
			$(document).find('#h5_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h5_font_letter_space">' + h5_font_letter_space + '</style>'));
	});
});
wp.customize('h6_font_letter_space', function(  value ){
	value.bind(function(to){
		var h6_font_letter_space = 'h6{ letter-spacing:'+ to +'px;}';
		if($(document).find('#h6_font_letter_space').length) {
			$(document).find('#h6_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="h6_font_letter_space">' + h6_font_letter_space + '</style>'));
	});
});


/*wp.customize('body_font_letter_space', function(  value ){
	value.bind(function(to){
		var body_font_letter_space = 'body,p{ letter-spacing:'+ to +'px;}';
		if($(document).find('#body_font_letter_space').length) {
			$(document).find('#body_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="body_font_letter_space">' + body_font_letter_space + '</style>'));
	});
});
*/
wp.customize('menu_font_letter_space', function(  value ){
	value.bind(function(to){
		var menu_font_letter_space = '.menu ul li a{ letter-spacing:'+ to +'px;}';
		if($(document).find('#menu_font_letter_space').length) {
			$(document).find('#menu_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="menu_font_letter_space">' + menu_font_letter_space + '</style>'));
	});
});

wp.customize('child_menu_font_letter_space', function(  value ){
	value.bind(function(to){
		var child_menu_font_letter_space = '.menu ul ul li a, .wide_menu strong{ letter-spacing:'+ to +'px;}';
		if($(document).find('#child_menu_font_letter_space').length) {
			$(document).find('#child_menu_font_letter_space').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_letter_space">' + child_menu_font_letter_space + '</style>'));
	});
});
wp.customize('child_menu_font_size', function(  value ){
	value.bind(function(to){
		var child_menu_font_size = '.menu ul ul li a, .wide_menu strong{ font-size:'+ to +'px!important;}';
		if($(document).find('#child_menu_font_size').length) {
			$(document).find('#child_menu_font_size').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_size">' + child_menu_font_size + '</style>'));
	});
});
// Desc Font Size
wp.customize('menu_desc_font_size', function(  value ){
	value.bind(function(to){
		var menu_desc_font_size = '.menu span.menu_description{ font-size:'+ to +'px!important;}';
		if($(document).find('#menu_desc_font_size').length) {
			$(document).find('#menu_desc_font_size').remove();
		}
	$(document).find('head').append($('<style id="menu_desc_font_size">' + menu_desc_font_size + '</style>'));
	});
});
wp.customize('menu_desc_letter_space', function(  value ){
	value.bind(function(to){
		var menu_desc_letter_space = '.menu span.menu_description{ letter-spacing:'+ to +'px;}';
		if($(document).find('#menu_desc_letter_space').length) {
			$(document).find('#menu_desc_letter_space').remove();
		}
	$(document).find('head').append($('<style id="menu_desc_letter_space">' + menu_desc_letter_space + '</style>'));
	});
});
wp.customize('menu_desc_font_weight', function(  value ){
	value.bind(function(to){
		var menu_desc_font_weight = '.menu span.menu_description{ font-weight:'+ to +'; }';
		if($(document).find('#menu_desc_font_weight').length) {
			$(document).find('#menu_desc_font_weight').remove();
		}
	$(document).find('head').append($('<style id="menu_desc_font_weight">' + menu_desc_font_weight + '</style>'));
	});
});
// Typography
// Body
wp.customize('body_font_weight_bold', function(  value ){
	value.bind(function(to){
		var body_font_weight_bold = 'body, p{ font-weight:'+ to +';}';
		if($(document).find('#body_font_weight_bold').length) {
			$(document).find('#body_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="body_font_weight_bold">' + body_font_weight_bold + '</style>'));
	});
});
// Menu
wp.customize('menu_font_weight', function(  value ){
	value.bind(function(to){
		var menu_font_weight = '.menu ul li a{ font-weight:'+ to +';}';
		if($(document).find('#menu_font_weight').length) {
			$(document).find('#menu_font_weight').remove();
		}
	$(document).find('head').append($('<style id="menu_font_weight">' + menu_font_weight + '</style>'));
	});
});
wp.customize('child_menu_font_weight', function(  value ){
	value.bind(function(to){
		var child_menu_font_weight = '.menu ul ul li a{ font-weight:'+ to +';}';
		if($(document).find('#child_menu_font_weight').length) {
			$(document).find('#child_menu_font_weight').remove();
		}
	$(document).find('head').append($('<style id="child_menu_font_weight">' + child_menu_font_weight + '</style>'));
	});
});
//titles
wp.customize('h1_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h1_font_weight_bold = 'h1{ font-weight:'+ to +';}';
		if($(document).find('#h1_font_weight_bold').length) {
			$(document).find('#h1_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h1_font_weight_bold">' + h1_font_weight_bold + '</style>'));
	});
});

wp.customize('h2_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h2_font_weight_bold = 'h2{ font-weight:'+ to +';}';
		if($(document).find('#h2_font_weight_bold').length) {
			$(document).find('#h2_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h2_font_weight_bold">' + h2_font_weight_bold + '</style>'));
	});
});

wp.customize('h3_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h3_font_weight_bold = 'h3, .woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3{ font-weight:'+ to +';}';
		if($(document).find('#h3_font_weight_bold').length) {
			$(document).find('#h3_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h3_font_weight_bold">' + h3_font_weight_bold + '</style>'));
	});
});

wp.customize('h4_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h4_font_weight_bold = 'h4{ font-weight:'+ to +';}';
		if($(document).find('#h4_font_weight_bold').length) {
			$(document).find('#h4_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h4_font_weight_bold">' + h4_font_weight_bold + '</style>'));
	});
});

wp.customize('h5_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h5_font_weight_bold = 'h5{ font-weight:'+ to +';}';
		if($(document).find('#h5_font_weight_bold').length) {
			$(document).find('#h5_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h5_font_weight_bold">' + h5_font_weight_bold + '</style>'));
	});
});

wp.customize('h6_font_weight_bold', function(  value ){
	value.bind(function(to){
		var h6_font_weight_bold = 'h6{ font-weight:'+ to +';}';
		if($(document).find('#h6_font_weight_bold').length) {
			$(document).find('#h6_font_weight_bold').remove();
		}
	$(document).find('head').append($('<style id="h6_font_weight_bold">' + h6_font_weight_bold + '</style>'));
	});
});
// Pagination
wp.customize('posts_pagination_link', function(  value ){
	value.bind(function(to){
		var posts_pagination_link = 'span.page-numbers a, .page-numbers > li a, .woocommerce-pagination .page-numbers a, .pagination ul li a{ color:'+ to +'!important;}';
		if($(document).find('#posts_pagination_link').length) {
			$(document).find('#posts_pagination_link').remove();
		}
	$(document).find('head').append($('<style id="posts_pagination_link">' + posts_pagination_link + '</style>'));
	});
});
wp.customize('posts_pagination_bg', function(  value ){
	value.bind(function(to){
		var posts_pagination_bg = 'span.page-numbers a, .page-numbers > li a, .woocommerce-pagination .page-numbers a, .pagination ul li a{ background:'+ to +'!important;} ul.page-numbers li{border-color:'+ to +'!important;}';
		if($(document).find('#posts_pagination_bg').length) {
			$(document).find('#posts_pagination_bg').remove();
		}
	$(document).find('head').append($('<style id="posts_pagination_bg">' + posts_pagination_bg + '</style>'));
	});
});
wp.customize('posts_pagination_active_link', function(  value ){
	value.bind(function(to){
		var posts_pagination_active_link = 'span.page-numbers.current, ul.page-numbers span.page-numbers.current, .woocommerce nav.woocommerce-pagination ul li a:hover, ul.page-numbers span.page-numbers, .pagination ul li a:hover{ color:'+ to +'!important;}';
		if($(document).find('#posts_pagination_active_link').length) {
			$(document).find('#posts_pagination_active_link').remove();
		}
	$(document).find('head').append($('<style id="posts_pagination_active_link">' + posts_pagination_active_link + '</style>'));
	});
});
wp.customize('posts_pagination_active_bg', function(  value ){
	value.bind(function(to){
		var posts_pagination_active_bg = 'span.page-numbers.current, ul.page-numbers span.page-numbers.current, .woocommerce nav.woocommerce-pagination ul li a:hover, ul.page-numbers span.page-numbers, .pagination ul li a:hover{ background-color:'+ to +'!important;} ul.page-numbers li.current_page, ul.page-numbers li:hover{border-color:'+ to +'!important;}';
		if($(document).find('#posts_pagination_active_bg').length) {
			$(document).find('#posts_pagination_active_bg').remove();
		}
	$(document).find('head').append($('<style id="posts_pagination_active_bg">' + posts_pagination_active_bg + '</style>'));
	});
});
//coming soon page
wp.customize('upload_bg_img[coming_soon_bg]', function( value ){
	value.bind(function( to ){
		if( to ){
			$('.coming_soon_page_banner  .coming_soon_bg_img').attr('style', 'background:url('+to+')');
		}else{
			$('.coming_soon_page_banner .coming_soon_bg_img').attr('style', 'background:url('+wppath.template_path+'/images/coming-soon-page.jpg)');
		}
	});
});
wp.customize('coming_soon_page_title_color', function( value ){
	value.bind(function( to ){
	var coming_soon_page_title_color = '.coming_soon_banner_content h3.title_style1 , .coming_soon_banner_content p, .coming_soon_banner_content{ color :'+ to +'!important}';
		if($(document).find('#coming_soon_page_title_color').length) {
			$(document).find('#coming_soon_page_title_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_page_title_color">' + coming_soon_page_title_color + '</style>'));
	});
});
wp.customize('coming_soon_date_bg_color', function( value ){
	value.bind(function( to ){
	var count_down_wrapper_border = '.countdown_wrapper{ border-color :'+ to +'!important}';
		if($(document).find('#count_down_wrapper_border').length) {
			$(document).find('#count_down_wrapper_border').remove();
		}
	$(document).find('head').append($('<style id="count_down_wrapper_border">' + count_down_wrapper_border + '</style>'));
	});
});
wp.customize('coming_soon_date_bg_color', function( value ){
	value.bind(function( to ){
	var coming_soon_date_bg_color = '.countdown_wrapper{ background :'+ to +'!important}';
		if($(document).find('#coming_soon_date_bg_color').length) {
			$(document).find('#coming_soon_date_bg_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_date_bg_color">' + coming_soon_date_bg_color + '</style>'));
	});
});
wp.customize('coming_soon_date_color', function( value ){
	value.bind(function( to ){
	var coming_soon_date_color = '.coming_soon_date_color{ color :'+ to +'!important}';
		if($(document).find('#coming_soon_date_color').length) {
			$(document).find('#coming_soon_date_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_date_color">' + coming_soon_date_color + '</style>'));
	});
});
wp.customize('coming_soon_page_title_border_color', function( value ){
	value.bind(function( to ){
	var coming_soon_page_title_border_color = '.coming_soon_banner_content span.title_seperator{ background :'+ to +'!important} .coming_soon_banner_content span.title_seperator::after{ border-color :'+ to +'!important }';
		if($(document).find('#coming_soon_page_title_border_color').length) {
			$(document).find('#coming_soon_page_title_border_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_page_title_border_color">' + coming_soon_page_title_border_color + '</style>'));
	});
});
wp.customize('coming_soon_social_icons_bg_color', function( value ){
	value.bind(function( to ){
	var coming_soon_social_icons_bg_color = '.coming_soon_social_media_icons ul li a{ background :'+ to +'!important}';
		if($(document).find('#coming_soon_social_icons_bg_color').length) {
			$(document).find('#coming_soon_social_icons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_social_icons_bg_color">' + coming_soon_social_icons_bg_color + '</style>'));
	});
});
wp.customize('coming_soon_social_icons_color', function( value ){
	value.bind(function( to ){
	var coming_soon_social_icons_color = '.coming_soon_social_media_icons ul li a{ color :'+ to +'!important}';
		if($(document).find('#coming_soon_social_icons_color').length) {
			$(document).find('#coming_soon_social_icons_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_social_icons_color">' + coming_soon_social_icons_color + '</style>'));
	});
});
wp.customize('coming_soon_social_icons_hover_bg_color', function( value ){
	value.bind(function( to ){
	var coming_soon_social_icons_hover_bg_color = '.coming_soon_social_media_icons ul li a:hover{ background :'+ to +'!important}';
		if($(document).find('#coming_soon_social_icons_hover_bg_color').length) {
			$(document).find('#coming_soon_social_icons_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_social_icons_hover_bg_color">' + coming_soon_social_icons_hover_bg_color + '</style>'));
	});
});
wp.customize('coming_soon_social_icons_hover_color', function( value ){
	value.bind(function( to ){
	var coming_soon_social_icons_hover_color = '.coming_soon_social_media_icons ul li a:hover{ color :'+ to +'!important}';
		if($(document).find('#coming_soon_social_icons_hover_color').length) {
			$(document).find('#coming_soon_social_icons_hover_color').remove();
		}
	$(document).find('head').append($('<style id="coming_soon_social_icons_hover_color">' + coming_soon_social_icons_hover_color + '</style>'));
	});
});
// Header
wp.customize('header_background_color', function( value ){
	value.bind(function( to ){
	var header_background_color = '.header_top_bar_setion{ background :'+ to +'!important}';
		if($(document).find('#header_background_color').length) {
			$(document).find('#header_background_color').remove();
		}
	$(document).find('head').append($('<style id="header_background_color">' + header_background_color + '</style>'));
	});
});
wp.customize('header_border_bottom_color', function( value ){
	value.bind(function( to ){
	var header_border_bottom_color = '.header_top_bar_setion{ border :1px solid '+ to +'!important}';
		if($(document).find('#header_border_bottom_color').length) {
			$(document).find('#header_border_bottom_color').remove();
		}
	$(document).find('head').append($('<style id="header_border_bottom_color">' + header_border_bottom_color + '</style>'));
	});
});
	
// Footer Section
wp.customize('footer_bg_color', function( value ){
	value.bind(function( to ){
	var footer_bg_color = '.bottom_footer_bar_wrapper{ background :'+ to +'!important}';
		if($(document).find('#footer_bg_color').length) {
			$(document).find('#footer_bg_color').remove();
		}
	$(document).find('head').append($('<style id="footer_bg_color">' + footer_bg_color + '</style>'));
	});
});
wp.customize('footer_text_color', function( value ){
	value.bind(function( to ){
	var footer_text_color = '.bottom_footer_bar_wrapper p, .bottom_footer_bar_wrapper{ color :'+ to +'!important}';
		if($(document).find('#footer_text_color').length) {
			$(document).find('#footer_text_color').remove();
		}
	$(document).find('head').append($('<style id="footer_text_color">' + footer_text_color + '</style>'));
	});
});
wp.customize('footer_text_link_color', function( value ){
	value.bind(function( to ){
	var footer_text_link_color = '.bottom_footer_bar_wrapper ul li a, .bottom_footer_bar_wrapper a{ color :'+ to +'!important}';
		if($(document).find('#footer_text_link_color').length) {
			$(document).find('#footer_text_link_color').remove();
		}
	$(document).find('head').append($('<style id="footer_text_link_color">' + footer_text_link_color + '</style>'));
	});
});
wp.customize('footer_text_link_hover', function( value ){
	value.bind(function( to ){
	var footer_text_link_hover = '.bottom_footer_bar_wrapper ul li a:hover, .bottom_footer_bar_wrapper a:hover{ color :'+ to +'!important}';
		if($(document).find('#footer_text_link_hover').length) {
			$(document).find('#footer_text_link_hover').remove();
		}
	$(document).find('head').append($('<style id="footer_text_link_hover">' + footer_text_link_hover + '</style>'));
	});
});
wp.customize('footer_text_font_size', function( value ){
	value.bind(function( to ){
	var footer_text_font_size = '.bottom_footer_bar_wrapper, .bottom_footer_bar_wrapper p{ font-size :'+ to +'px!important}';
		if($(document).find('#footer_text_font_size').length) {
			$(document).find('#footer_text_font_size').remove();
		}
	$(document).find('head').append($('<style id="footer_text_font_size">' + footer_text_font_size + '</style>'));
	});
});
wp.customize('footer_text_letter_space', function( value ){
	value.bind(function( to ){
	var footer_text_letter_space = '.bottom_footer_bar_wrapper, .bottom_footer_bar_wrapper p{ letter-spacing :'+ to +'px!important}';
		if($(document).find('#footer_text_letter_space').length) {
			$(document).find('#footer_text_letter_space').remove();
		}
	$(document).find('head').append($('<style id="footer_text_letter_space">' + footer_text_letter_space + '</style>'));
	});
});
wp.customize('footer_text_font_weight', function( value ){
	value.bind(function( to ){
	var footer_text_font_weight = '.bottom_footer_bar_wrapper, .bottom_footer_bar_wrapper p{ font-weight :'+ to +'!important}';
		if($(document).find('#footer_text_font_weight').length) {
			$(document).find('#footer_text_font_weight').remove();
		}
	$(document).find('head').append($('<style id="footer_text_font_weight">' + footer_text_font_weight + '</style>'));
	});
});
wp.customize('footer_text_font_style', function( value ){
	value.bind(function( to ){
	var footer_text_font_style = '.bottom_footer_bar_wrapper, .bottom_footer_bar_wrapper p{ font-style :'+ to +'!important}';
		if($(document).find('#footer_text_font_style').length) {
			$(document).find('#footer_text_font_style').remove();
		}
	$(document).find('head').append($('<style id="footer_text_font_style">' + footer_text_font_style + '</style>'));
	});
});
wp.customize('footer_border_top_color', function( value ){
	value.bind(function( to ){
	var footer_border_top_color = '.bottom_footer_bar_wrapper{ border :1px solid '+ to +'!important}';
		if($(document).find('#footer_border_top_color').length) {
			$(document).find('#footer_border_top_color').remove();
		}
	$(document).find('head').append($('<style id="footer_border_top_color">' + footer_border_top_color + '</style>'));
	});
});
// Shortlist list
wp.customize('add_short_list_buttons_bg_color', function( value ){
	value.bind(function( to ){
	var add_short_list_buttons_bg_color = 'a.item_button{ background: '+ to +'!important}';
		if($(document).find('#add_short_list_buttons_bg_color').length) {
			$(document).find('#add_short_list_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="add_short_list_buttons_bg_color">' + add_short_list_buttons_bg_color + '</style>'));
	});
});
wp.customize('add_short_list_buttons_color', function( value ){
	value.bind(function( to ){
	var add_short_list_buttons_color = 'a.item_button{ color: '+ to +'!important}';
		if($(document).find('#add_short_list_buttons_color').length) {
			$(document).find('#add_short_list_buttons_color').remove();
		}
	$(document).find('head').append($('<style id="add_short_list_buttons_color">' + add_short_list_buttons_color + '</style>'));
	});
});
// Shortlist Button
wp.customize('short_list_buttons_bg_color', function( value ){
	value.bind(function( to ){
	var short_list_buttons_bg_color = 'ul.pf_shotlist_options_wrapper li a{ background: '+ to +'!important}';
		if($(document).find('#short_list_buttons_bg_color').length) {
			$(document).find('#short_list_buttons_bg_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_buttons_bg_color">' + short_list_buttons_bg_color + '</style>'));
	});
});
wp.customize('short_list_buttons_color', function( value ){
	value.bind(function( to ){
	var short_list_buttons_color = 'ul.pf_shotlist_options_wrapper li a{ color: '+ to +'!important}';
		if($(document).find('#short_list_buttons_color').length) {
			$(document).find('#short_list_buttons_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_buttons_color">' + short_list_buttons_color + '</style>'));
	});
});
wp.customize('short_list_buttons_hover_bg_color', function( value ){
	value.bind(function( to ){
	var short_list_buttons_hover_bg_color = 'ul.pf_shotlist_options_wrapper li a:hover{ background: '+ to +'!important}';
		if($(document).find('#short_list_buttons_hover_bg_color').length) {
			$(document).find('#short_list_buttons_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_buttons_hover_bg_color">' + short_list_buttons_hover_bg_color + '</style>'));
	});
});
wp.customize('short_list_buttons_hover_color', function( value ){
	value.bind(function( to ){
	var short_list_buttons_hover_color = 'ul.pf_shotlist_options_wrapper li a:hover{ color: '+ to +'!important}';
		if($(document).find('#short_list_buttons_hover_color').length) {
			$(document).find('#short_list_buttons_hover_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_buttons_hover_color">' + short_list_buttons_hover_color + '</style>'));
	});
});
//Email Form Fields
wp.customize('short_list_email_form_bg_colors', function( value ){
	value.bind(function( to ){
	var short_list_email_form_bg_colors = '.form_shortlist_data{ background: '+ to +'!important}';
		if($(document).find('#short_list_email_form_bg_colors').length) {
			$(document).find('#short_list_email_form_bg_colors').remove();
		}
	$(document).find('head').append($('<style id="short_list_email_form_bg_colors">' + short_list_email_form_bg_colors + '</style>'));
	});
});
wp.customize('short_list_input_fields_border_colors', function( value ){
	value.bind(function( to ){
	var short_list_input_fields_border_colors = '.form_shortlist_data input, .form_shortlist_data textarea{ border-color: '+ to +'!important}';
		if($(document).find('#short_list_input_fields_border_colors').length) {
			$(document).find('#short_list_input_fields_border_colors').remove();
		}
	$(document).find('head').append($('<style id="short_list_input_fields_border_colors">' + short_list_input_fields_border_colors + '</style>'));
	});
});
wp.customize('short_list_input_fields_colors', function( value ){
	value.bind(function( to ){
	var short_list_input_fields_colors = '.form_shortlist_data input, .form_shortlist_data textarea, span.shortlist_form_close{ border-color: '+ to +'!important}';
		if($(document).find('#short_list_input_fields_colors').length) {
			$(document).find('#short_list_input_fields_colors').remove();
		}
	$(document).find('head').append($('<style id="short_list_input_fields_colors">' + short_list_input_fields_colors + '</style>'));
	});
});
wp.customize('short_list_form_button_bg_color', function( value ){
	value.bind(function( to ){
	var short_list_form_button_bg_color = '.form_shortlist_data #shortlist_form_submit{ background: '+ to +'!important}';
		if($(document).find('#short_list_form_button_bg_color').length) {
			$(document).find('#short_list_form_button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_form_button_bg_color">' + short_list_form_button_bg_color + '</style>'));
	});
});
wp.customize('short_list_form_button_color', function( value ){
	value.bind(function( to ){
	var short_list_form_button_color = '.form_shortlist_data #shortlist_form_submit{ color: '+ to +'!important}';
		if($(document).find('#short_list_form_button_color').length) {
			$(document).find('#short_list_form_button_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_form_button_color">' + short_list_form_button_color + '</style>'));
	});
});
wp.customize('short_list_form_button_hover_bg_color', function( value ){
	value.bind(function( to ){
	var short_list_form_button_hover_bg_color = '.form_shortlist_data #shortlist_form_submit:hover{ background: '+ to +'!important}';
		if($(document).find('#short_list_form_button_hover_bg_color').length) {
			$(document).find('#short_list_form_button_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_form_button_hover_bg_color">' + short_list_form_button_hover_bg_color + '</style>'));
	});
});
wp.customize('short_list_form_hover_button_color', function( value ){
	value.bind(function( to ){
	var short_list_form_hover_button_color = '.form_shortlist_data #shortlist_form_submit:hover{ color: '+ to +'!important}';
		if($(document).find('#short_list_form_hover_button_color').length) {
			$(document).find('#short_list_form_hover_button_color').remove();
		}
	$(document).find('head').append($('<style id="short_list_form_hover_button_color">' + short_list_form_hover_button_color + '</style>'));
	});
});
//Booking Form Fields
wp.customize('booking_form_bg_color', function( value ){
	value.bind(function( to ){
	var booking_form_bg_color = '.form_shortlist_book_form{ background: '+ to +'!important}';
		if($(document).find('#booking_form_bg_color').length) {
			$(document).find('#booking_form_bg_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_bg_color">' + booking_form_bg_color + '</style>'));
	});
});
wp.customize('booking_form_input_border_color', function( value ){
	value.bind(function( to ){
	var booking_form_input_border_color = '.form_shortlist_book_form input, .form_shortlist_book_form textarea{ border-color: '+ to +'!important}';
		if($(document).find('#booking_form_input_border_color').length) {
			$(document).find('#booking_form_input_border_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_input_border_color">' + booking_form_input_border_color + '</style>'));
	});
});
wp.customize('booking_form_input_color', function( value ){
	value.bind(function( to ){
	var booking_form_input_color = '.form_shortlist_book_form input, .form_shortlist_book_form textarea, span.shortlist_book_form_close{ border-color: '+ to +'!important}';
		if($(document).find('#booking_form_input_color').length) {
			$(document).find('#booking_form_input_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_input_color">' + booking_form_input_color + '</style>'));
	});
});
wp.customize('booking_form_button_bg_color', function( value ){
	value.bind(function( to ){
	var booking_form_button_bg_color = '#form_shortlist_book_form_submit{ background: '+ to +'!important}';
		if($(document).find('#booking_form_button_bg_color').length) {
			$(document).find('#booking_form_button_bg_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_button_bg_color">' + booking_form_button_bg_color + '</style>'));
	});
});
wp.customize('booking_form_button_color', function( value ){
	value.bind(function( to ){
	var booking_form_button_color = '#form_shortlist_book_form_submit{ color: '+ to +'!important}';
		if($(document).find('#booking_form_button_color').length) {
			$(document).find('#booking_form_button_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_button_color">' + booking_form_button_color + '</style>'));
	});
});
wp.customize('booking_form_button_hover_bg_color', function( value ){
	value.bind(function( to ){
	var booking_form_button_hover_bg_color = '#form_shortlist_book_form_submit:hover{ background: '+ to +'!important}';
		if($(document).find('#booking_form_button_hover_bg_color').length) {
			$(document).find('#booking_form_button_hover_bg_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_button_hover_bg_color">' + booking_form_button_hover_bg_color + '</style>'));
	});
});
wp.customize('booking_form_button_hover_color', function( value ){
	value.bind(function( to ){
	var booking_form_button_hover_color = '#form_shortlist_book_form_submit:hover{ color: '+ to +'!important}';
		if($(document).find('#booking_form_button_hover_color').length) {
			$(document).find('#booking_form_button_hover_color').remove();
		}
	$(document).find('head').append($('<style id="booking_form_button_hover_color">' + booking_form_button_hover_color + '</style>'));
	});
});
//end
} )( jQuery );