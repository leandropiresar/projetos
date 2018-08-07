<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

<div id="comments" class="comm-title">
<h4 class="widgettitle"><?php comments_number(__('No Comments', 'match'), __('1 Comment', 'match'), __('% Comments', 'match') );?></h4>
</div>

	<ol class="commentlist">
	<?php wp_list_comments( array( 'callback' => 'mt_my_custom_comments' )); ?>
	</ol>
    
 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                <h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'match' ); ?></h2>
                <div class="nav-previous"><?php previous_comments_link(  __( '&larr; Older Comments', 'match' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'match' ) ); ?></div>
            </nav><!-- /coment-nav-above -->
            <?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		
	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<?php

comment_form( array(
	'title_reply' => '<div class="comm-title"><h4 class="widgettitle">'.__('Leave a Comment', 'match').'</h4></div>',

	'fields' => array(
		'author' => '<p><input type="text" name="author" id="author" class="comm-field"  value="" placeholder="'.__('Name', 'match').'" size="22" tabindex="1"/></p>',
		'email'  => '<p><input type="text" name="email" id="email" class="comm-field" value="" placeholder="'.__('Email', 'match').'" size="22" tabindex="2" /></p>',
		'url'    => null,
	),
	'comment_notes_before' => '',
	'comment_field' => '<p><textarea name="comment" id="msg-contact" placeholder="'.__('Message', 'match').'" rows="7" tabindex="3"></textarea></p>',
	'comment_notes_after' => false,
	'label_submit'      => __( 'Submit Comment', 'match')

) ); 

?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>