<?php $kaya_audio = get_post_meta( get_the_ID(), 'kaya_audio', true );
if( trim($kaya_audio) ){ ?>
	<div class="blog_audo_player">
		<?php echo trim($kaya_audio); ?>
	</div>
<?php } ?>