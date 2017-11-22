<?php
// Home Sidebar
if( !function_exists('petshop_kaya_page_dynamic_sidebars') ){
	function petshop_kaya_page_dynamic_sidebars(){
		if ( function_exists('register_sidebar') )
				register_sidebar(
				array(
					'name' => esc_html__('Sidebar','petshop'),
					'id'  => 'sidebar-1',
					'description' => esc_html__('A widget area, used as a sidebar for Homepage', 'petshop'),			
					'before_widget' => '<div id="%1$s" class="widget_container %2$s">',
					'after_widget' => '</h6></div>',
					'before_title' => '<h3 class="title_style1">',
					'after_title' => '</h3><h6 class="sidebar_content">',
				));
		}
}	
add_action('widgets_init','petshop_kaya_page_dynamic_sidebars');		
?>