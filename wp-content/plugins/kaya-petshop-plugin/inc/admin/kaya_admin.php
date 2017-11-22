<?php 
// Memeber Post Submit Message
function petshop_kaya_memeber_submit_message(){
	$header_right_login_info = get_theme_mod('members_portfolio_submit_message') ? get_theme_mod('members_portfolio_submit_message') : esc_html__('Your Portfolio Profile Will be activate with in 24 hours!', 'petshop'); ?>
		<script type="text/javascript">
		// Admin Submit for review
		jQuery(document).ready(function(){
			jQuery('#publishing-action').each(function(){
				var post_submit_val = jQuery(this).find('#publish').val();
				if( post_submit_val == 'Update' ){
					jQuery('.memeber_submit_message').hide();
				}else if( post_submit_val == 'Submit for Review' ){
					jQuery('.memeber_submit_message').show();
				}
				if( post_submit_val == 'Submit for Review' ){
					jQuery(this).find('#publish').click(function(){
						alert('<?php echo $header_right_login_info; ?>');
					});
				}
			});
		});
		</script>
<?php }
add_action('admin_head', 'petshop_kaya_memeber_submit_message');
// Member post Pending Message
function my_admin_notice() {
	if ( current_user_can('user') ) {
		if( get_post_type() == 'portfolio'  ){
			if( $_REQUEST['action'] == 'edit' ){     ?>
			<div id="message" class="error notice notice-success is-dismissible memeber_submit_message">
				<p><?php _e( '<strong>Notice: </strong> &nbsp; Your Portfolio Profile Will be activate with in 24 hours!', 'petshop' ); ?></p>
			</div>
		<?php
		}
		}
	}
}
add_action( 'admin_notices', 'my_admin_notice' );
?>
