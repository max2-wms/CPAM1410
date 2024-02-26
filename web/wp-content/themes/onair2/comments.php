<?php
/*
Package: OnAir2
Description: Comments template
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- COMMENTS PART ========================= -->
<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<h5 class="qt-caption-small"><span><?php echo esc_attr__("Reader's opinions","onair2"); ?></span></h5>
<div id="comments" class="comments-area comments-list">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<div class="">
				<nav id="comment-nav-above" class="comment-navigation" role="navigation">
					<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', "onair2" ); ?></h3>
					<div class="nav-previous"><?php previous_comments_link( esc_attr__( '&larr; Older Comments', "onair2" ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments &rarr;', "onair2" ) ); ?></div>
				</nav><!-- #comment-nav-above -->
			</div >
		<?php endif; // check for comment navigation ?>
			<ol class="qt-comment-list">
				<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use qantumthemes_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define qantumthemes_comment() and that will be used instead.
				 * See qantumthemes_comment() in functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'qantumthemes_s_comment' ) );
				?>
			</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h3 class="qw-page-subtitle grey-text"><?php echo esc_attr__( 'Comment navigation', "onair2" ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_attr__( '&larr; Older Comments', "onair2" ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_attr__( 'Newer Comments &rarr;', "onair2" ) ); ?></div>
		</nav><!-- #comment-nav-below -->
			
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', "onair2" ); ?></p>
	<?php endif; ?>
	<?php

	/*
	*
	*     Custom parameters for the comment form
	*
	*/
	$required_text = esc_attr__('Required fields are marked *',"onair2");
	if(!isset ($consent) ) { 
		$consent = ''; 
	}
	$args = array(
		'class_form'		=> 'qt-material-form',
		'id_form'           => 'qw-commentform',
		'id_submit'         => 'qw-submit',
		'title_reply'       => '<span class="qw-page-subtitle grey-text">'.esc_attr__( 'Leave a Reply', "onair2" ).'</span>',
		'title_reply_to'    => '<span class="qw-page-subtitle grey-text">'.esc_attr__( 'Leave a Reply to %s', "onair2" ).'</span>',
		'cancel_reply_link' => '<i class="mdi-navigation-cancel icon-l"></i>',
		'label_submit'      => esc_attr__( 'Post Comment' ,"onair2" ),
		'class_submit'		=> 'qt-btn qt-btn-primary',
		'comment_field' =>  '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" placeholder="'.esc_attr__('Comment*',"onair2").'" name="comment" cols="45" rows="8" aria-required="true">'.'</textarea></p>',
		'must_log_in' => '<p class="must-log-in">' .
			sprintf(
				esc_attr__( 'You must be ' , "onair2").'<a href="%s">'.esc_attr__( 'logged in' , "onair2").'</a>'.esc_attr__( 'to post a comment.' , "onair2"),
				wp_login_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) )
			) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' .
			sprintf(
			__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', "onair2" ),
				admin_url( 'profile.php' ),
				$user_identity,
				esc_url(wp_logout_url( apply_filters( 'the_permalink', esc_url(get_permalink()) ) ))
			) . '</p>',
		'comment_notes_before' => '',
		'comment_notes_after' => '<p class="comment-notes">' .
			esc_attr__( 'Your email address will not be published. ' ,"onair2") 
			. ( $req ? $required_text : '' ) .
			'</p>',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author'  => '<p class="comment-form-author"><input id="author" placeholder="' . esc_attr__( 'Name', "onair2" ).( $req ? '*' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" /></p>',
			'email'   => '<input id="email" placeholder="' . esc_attr__( 'Email', "onair2" ).( $req ? '*' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" /></p>',
			'url'     => '<p class="comment-form-url"><input id="url" placeholder="'.esc_attr__( 'Website', "onair2" ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .'" size="30" /></p>',
			'cookies' =>  '
				  <div class="input-field">
				  <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
				  '<label for="wp-comment-cookies-consent"> ' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'onair2' ) . '</label></p>
				  </div><hr class="qt-spacer-s">',

			)
		),
	);


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (  comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :?>
		
		<div id="respond" class="qt-comment-respond qt-card comment-form">
			<?php  comment_form($args); ?>
		</div>
	<?php endif; ?>

</div><!-- #comments -->
