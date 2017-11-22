<?php
get_header(); 
$sidebar_layout=get_post_meta(get_the_id(),'kaya_pagesidebar',true); 
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
$aside_class=($sidebar_layout== "leftsidebar" ) ?  'one_fourth' : 'one_fourth_last'; ?>
<!--Start Middle Section  -->
	<div id="mid_container_wrapper" class="mid_container_wrapper_section">
	<div id="mid_container" class=""> 
		<?php echo petshop_kaya_custom_pagetitle($post->ID); ?>
		<div class="<?php echo esc_attr( $sidebar_class ); ?>" id="content_section">
			<?php get_template_part('loop','page'); ?>
		</div>
		<!--StartSidebar Section -->
		<?php if($sidebar_layout !="full") { ?>
			<div class="<?php echo esc_attr( $aside_class );?>">
				<?php //get_sidebar();
				the_content();
				?>
			</div>
			<div class="clear"></div>
		<?php } ?>
		<div class="clear"></div>
		<!--End content Section -->
	<?php get_footer(); ?>