<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to alastairhumphreys_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<div class="comments">
	<?php if (post_password_required()) : ?>
		<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'alastairhumphreys'); ?></p>
		<?php return; ?>
	<?php endif; ?>

	<?php if (have_comments()) : ?>

		<h2>Comments</h2>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
			<h1>1</h1>
			<nav id="comment-nav-above">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'alastairhumphreys' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'alastairhumphreys' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alastairhumphreys' ) ); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use alastairhumphreys_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define alastairhumphreys_comment() and that will be used instead.
				 * See alastairhumphreys_comment() in alastairhumphreys/functions.php for more.
				 */
				wp_list_comments(array('callback' => 'alastairhumphreys_comment'));
			?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
			<nav id="comment-nav-below">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'alastairhumphreys' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'alastairhumphreys' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'alastairhumphreys' ) ); ?></div>
			</nav>
		<?php endif; // check for comment navigation ?>

	<?php elseif (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) :
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
	?>
		<p class="nocomments"><?php _e('There are currently no comments', 'alastairhumphreys'); ?></p>
	<?php endif; ?>
</div>
<div class="comment-form">
	<?php get_template_part('content', 'comments-form'); ?>
</div>

