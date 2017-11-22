<?php
	$kaya_quotes = get_post_meta(get_the_ID(), 'kaya_quote_desc', true);
	if( !empty($kaya_quotes) ){
		echo '<div class="quote_format">';
		echo '<div class="quote_format_text">';
			echo '';
			echo '<h4><i class="fa fa-quote-left"></i>'.$kaya_quotes.'<i class="fa fa-quote-right"></i></h4>';
			echo '<h5>--'.get_the_title().'</h5>';
		echo '</div></div>';
	}
	?>