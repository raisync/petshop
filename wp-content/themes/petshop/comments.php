<?php
/**
 * The template for displaying Comments.
 */
?>
<div id="comments">
    <?php if ( post_password_required() ) : ?>
    <p class="nopassword">
        <?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'petshop' ); ?>
    </p>
</div>
<!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
	return;
	endif;
?>
<?php
	// You can start editing here -- including this comment!
?>
<?php if ( have_comments() ) : ?>
	<div class="">
    <h3 id="comments-title" class="title_style2">
        <?php
        printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'petshop' ),
        number_format_i18n( get_comments_number() ), ' ' . get_the_title() . ' ' );
        ?>
    </h3>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation">
        <div class="nav-previous">
            <?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'petshop' ) ); ?>
        </div>
        <div class="nav-next">
            <?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'petshop' ) ); ?>
        </div>
	</div>
<!-- .navigation -->
<?php endif; // check for comment navigation ?>
<ol class="commentlist">
    <?php
		/* Loop through and list the comments. Tell wp_list_comments()
		 * to use kaya_comment() to format the comments.
		 * If you want to overload this in a child theme then you can
		 * define kaya_comment() and that will be used instead.
		 * See kaya_comment() in functions.php for more.
		 */
		wp_list_comments( array( 'callback' => 'petshop_kaya_comment' ) );
	?>
</ol>
</div>
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
    <div class="navigation"><!-- .navigation -->
        <div class="nav-previous">
            <?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'petshop' ) ); ?>
        </div>
        <div class="nav-next">
            <?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'petshop' ) ); ?>
        </div>
    </div>
    <!-- .navigation -->
<?php endif; // check for comment navigation ?>
<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
	?>
	<p class="nocomments">
    	<?php esc_html_e( 'Comments are closed.', 'petshop' ); ?>
	</p>
	<?php endif; // end ! comments_open() ?>
	<?php endif; // end have_comments() ?>
	<?php // comment_form(); ?>
 <?php 
$aria_req='';
$comment_form_text = get_theme_mod('comment_form_text') ? get_theme_mod('comment_form_text') : esc_html__('SUBMIT', 'petshop');
$comment_args = array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' => '<p class="one_third"><input placeholder="'.esc_html__('Name Required','petshop').'" id="author" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
				'</p>',
			'email'  => '<p class="one_third"><input placeholder="'.esc_html__('Email Required','petshop').'" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30"' . $aria_req . ' />' .'</p>',
			'url'    => '<p class="one_third_last"><input placeholder="'.esc_html__('Website URL','petshop').'" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" /></p>',
		)
	),
	'comment_field' => '<p class="fullwidth"><textarea placeholder="'.esc_html__('Comment','petshop').'" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
    'comment_notes_after' => '',
    'title_reply' => __('Leave a Comment', 'petshop'),
    'label_submit' => esc_attr($comment_form_text),
);
comment_form( $comment_args );
 ?>
</div>
<!-- #comments -->