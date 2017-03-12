<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skokov
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
            <?php comments_number('No comments', '1 comment', '% comments');?>
		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'skokov' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'skokov' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'skokov' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ul class="comment-list comments bottom-line">
			<?php
				wp_list_comments( 'type=comment&callback=mytheme_comment');
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'skokov' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'skokov' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'skokov' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'skokov' ); ?></p>
	<?php
	endif;

    $defaults = array(
        'fields'               => array(
            'author' => '<div class="row"><p class="comment-form-author col-sm-6">'  .
                '<input id="author" name="author" type="text" placeholder="name ..."  value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>',
            'email'  => '<p class="comment-form-email col-sm-6">' .
                '<input id="email" name="email" placeholder="email ..."' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p></div>',
            ),
        'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required" placeholder="comment ..."></textarea></p>',
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'class_form'           => 'comment-form',
        'class_submit'         => 'button-link',
        'title_reply'          => __( 'Leave a comment' ),
        'title_reply_to'       => __( '' ),
        'title_reply_before'   => '<h2 class="comments-title" id="reply-title" =>',
        'title_reply_after'    => '</h2>',
        'cancel_reply_link'    => __( 'Cancel reply' ),
        'label_submit'         => __( 'Add a comment' ),
    );

    add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
    function kama_reorder_comment_fields( $fields ){

        $new_fields = array();

        $myorder = array('author','email', 'comment'); // The desired order of the fields

        foreach( $myorder as $key ){
            $new_fields[ $key ] = $fields[ $key ];
            unset( $fields[ $key ] );
        }

        if( $fields )
            foreach( $fields as $key => $val )
                $new_fields[ $key ] = $val;

        return $new_fields;
    }

    comment_form( $defaults );
	?>

</div><!-- #comments -->

<?php
function mytheme_comment($comment, $args, $depth){
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>">
            <div class="icon-wrapper">
                <?php echo get_avatar( $comment, $size='50', $default='<path_to_url>' ); ?>
            </div>
        <div class="text-comment">
            <div class="info-comment">
                <cite class="autor"><?php echo get_comment_author_link() ?></cite>
                <a class="time" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( '%1$s', get_comment_date()) ?></a>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'  => 'reply'))) ?>
            </div>

            <?php if ($comment->comment_approved == '0') : ?>
                <p><em>Your comment is awaiting validation.</em></p>
            <?php endif; ?>

            <div class="comment-meta commentmetadata">
                <?php edit_comment_link('(Edit)', '  ', '') ?>
            </div>

            <?php comment_text() ?>
        </div>
    </div>
    <?php
}
?>