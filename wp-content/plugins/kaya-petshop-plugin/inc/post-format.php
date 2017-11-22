<?php 
global $post;
if( !function_exists('gallery_format')  ){
	function gallery_format(){
		global $post; 
		$meta = get_post_meta($post->ID, 'post_gallery', false );
		$kaya_gallery_slider = get_post_meta($post->ID, 'kaya_gallery_slider', true );
		$gallery_slider = 'gllery_slider';
		if ( !is_array( $meta ) )
		$meta = ( array ) $meta;
			if ( !empty( $meta ) ) {
				echo '<div class="single_img">';
			if(count($meta) > 1 ){
				echo '<div class="'.$gallery_slider .' clearfix ">';
				foreach ( $meta as $att ) {
				$src = wp_get_attachment_image_src( $att, '' );
				$src = $src[0];
				echo "<div>" ?>
				<?php
				echo "<a href='".get_the_permalink()."'><img src=".kaya_image_resize($src, '800', 650, 't')." alt='".get_the_title()."' /></a>";
				echo '</div>';
				}
				echo '</div>';		 
			} else{
			foreach ( $meta as $att ) {
			$src = wp_get_attachment_image_src( $att, '' );
			$src = $src[0]; ?>
			<?php echo "<a href='".get_the_permalink()."'><img src=".kaya_image_resize($src, 800, 650, 't')." alt='".get_the_title()."' />"; 
			echo '</a>';
			}			
			} 
			echo '</div>';
			}						
					
	}
}
if( !function_exists('video_format') ){
function video_format($post){
	echo '<div class="single_img">'; 
		$video = get_post_meta( get_the_ID(), 'post_video', true ); 
		echo trim( $video );
	echo '</div>';	
}
}
if( !function_exists('standard_format') ){
function standard_format($img_url){
	if( $img_url ){		
		    echo "<img src='".kaya_image_resize( $img_url, '800', '650' , 't' )."' alt='".get_the_title()."'>";
		} 
}
}
if( !function_exists('quote_format') ){
function quote_format($quote_color){
	global $petshop_plugin_name;
	$source = get_post_meta(get_the_ID(), 'kaya_quote_desc', true);
	echo '<div class="quote_format">';
	echo '<div class="quote_format_text">';
		echo '';
		echo '<h4 style="color:'.$quote_color.';"><i class="fa fa-quote-left"></i>'.$source.'<i class="fa fa-quote-right"></i></h4>';
		echo '<h5 style="color:'.$quote_color.';">--'.get_the_title().'</h5>';
	echo '</div></div>';
}
}
if( !function_exists('link_format') ){
	function link_format(){
		global $petshop_plugin_name;
		$pf_link = get_post_meta(get_the_ID(), 'kaya_link', true);
		echo '<div class="link_format_wrapper ">';
		echo '<h3><a title="Permalink to: '.$pf_link.'" href="'.esc_url($pf_link).'" target="_blank">'.get_the_title().'</a></h3>';
		echo '</div>';
	}
}
if( !function_exists('audio_format') ){
function audio_format(){ 
	$kaya_audio = get_post_meta(get_the_ID(), 'kaya_audio', true); ?>
	<div class="blog_audo_player">
		<?php echo trim($kaya_audio); ?>			
	</div>
<?php }
}
?>