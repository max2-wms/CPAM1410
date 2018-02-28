<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to _s_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package _s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="qw-page-subtitle grey-text"><?php echo esc_attr__('Comments','_s'); ?></h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <div class="">
        		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
        			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', '_s' ); ?></h3>
        			<div class="nav-previous"><?php previous_comments_link( esc_attr__( '&larr; Older Comments', '_s' ) ); ?></div>
        			<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments &rarr;', '_s' ) ); ?></div>
        		</nav><!-- #comment-nav-above -->
            </div >
		<?php endif; // check for comment navigation ?>

        <div class="">
    		<ol class="qw-comment-list">
    			<?php
    				/* Loop through and list the comments. Tell wp_list_comments()
    				 * to use _s_comment() to format the comments.
    				 * If you want to override this in a child theme, then you can
    				 * define _s_comment() and that will be used instead.
    				 * See _s_comment() in inc/template-tags.php for more.
    				 */
    				wp_list_comments( array( 'callback' => '_s_comment' ) );
    			?>
    		</ol><!-- .comment-list -->
        </div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <div class="">
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h3 class="qw-page-subtitle grey-text"><?php _e( 'Comment navigation', '_s' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_attr__( '&larr; Older Comments', '_s' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments &rarr;', '_s' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
        </div>
		<?php endif; // check for comment navigation ?>
    <hr class="qw-separator triangle">
	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', '_s' ); ?></p>
	<?php endif; ?>



  



  <?php

  /*
  *
  *     Custom parameters for the comment form
  *
  */
$required_text = esc_attr__('Required fields are marked *','_s');

  $args = array(
    'id_form'           => 'qw-commentform',
    'id_submit'         => 'qw-submit',
    'class_submit'      => 'accentcolor', 
    'title_reply'       => '<span class="qw-page-subtitle grey-text">'.esc_attr__( 'Leave a Reply', '_s' ).'</span>',
    'title_reply_to'    => '<span class="qw-page-subtitle grey-text">'.esc_attr__( 'Leave a Reply to %s', '_s' ).'</span>',
    'cancel_reply_link' => '<i class="mdi-navigation-cancel icon-l"></i>',
    'label_submit'      => esc_attr__( 'Post Comment' ,"_s" ),
    'comment_field' =>  '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" placeholder="'.esc_attr__('Comment','_s').'" name="comment" cols="45" rows="8" aria-required="true">' .
      '</textarea></p>',
    'must_log_in' => '<p class="must-log-in">' .
      sprintf(
        esc_attr__( 'You must be <a href="%s">logged in</a> to post a comment.' , '_s'),
        wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) )
      ) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' .
      sprintf(
      __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
        admin_url( 'profile.php' ),
        $user_identity,
        esc_url(wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ))
      ) . '</p>',
    'comment_notes_before' => '',
    'comment_notes_after' => '<p class="comment-notes">' .
      esc_attr__( 'Your email address will not be published. ' ,'_s') 
      . ( $req ? $required_text : '' ) .
      '</p>',
      /*
          'comment_notes_after' => '<p class="form-allowed-tags">' .
      sprintf(
        __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ,'_s'),
        ' <code>' . allowed_tags() . '</code>'
      ) . '</p>',
      */
    'fields' => apply_filters( 'comment_form_default_fields', array(
      'author'  => '<p class="comment-form-author"><input id="author" placeholder="' . esc_attr__( 'Name', '_s' ).( $req ? '*' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" /></p>',
      'email'   => '<input id="email" placeholder="' . esc_attr__( 'Email', '_s' ).( $req ? '*' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" /></p>',
      'url'     => '<p class="comment-form-url"><input id="url" placeholder="'.esc_attr__( 'Website', '_s' ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" /></p>'
      )
    ),
  );



  ?>
  <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (  comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
	<?php comment_form($args); ?>

  <?php endif; ?>

</div><!-- #comments -->
