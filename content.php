<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if (is_sticky()) : ?>
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'alastairhumphreys' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Featured', 'alastairhumphreys' ); ?></h3>
			</hgroup>
		<?php elseif (get_post_type() == 'post') : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'alastairhumphreys' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php if (has_post_thumbnail()) { ?>
			<div class="span4">
				<img src="<?php the_field('thumbnail'); ?>" alt="<?php the_title(); ?>" />
			</div>
		<?php } ?>

		<?php if (get_post_type() == 'post') : ?>
			<header>
				<div class="entry-meta">
					<?php alastairhumphreys_posted_on(); ?>
				</div>
				<?php if (comments_open()) : ?>
					<div class="comments-link">
						<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'alastairhumphreys' ) . '</span>', _x( '1', 'comments number', 'alastairhumphreys' ), _x( '%', 'comments number', 'alastairhumphreys' ) ); ?>
					</div>
				<?php endif; ?>
			</header>
		<?php endif; ?>

		<?php if (is_search()) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		<?php else : ?>
			<div class="row">
				<?php if (has_post_thumbnail()) { ?>
					<div class="span8">
				<?php } else { ?>
					<div class="span12">
				<?php } ?>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'alastairhumphreys' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'alastairhumphreys' ) . '</span>', 'after' => '</div>' ) ); ?>
				</div>
			</div>
		<?php endif; ?>

		<footer class="entry-meta">
			<?php $show_sep = false; ?>

			<!-- Posts -->
			<?php if (get_post_type() == 'post') : ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'alastairhumphreys' ) );
				?>
				<?php if ($categories_list): ?>
					<span class="cat-links">
						<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'alastairhumphreys' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
						$show_sep = true; ?>
					</span>
				<?php endif; ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list('', __( ', ', 'alastairhumphreys'));
				?>
				<?php if ($tags_list) : ?>
					<?php if ($show_sep) : ?>
						<span class="sep"> | </span>
					<?php endif; // End if $show_sep ?>
					<span class="tag-links">
						<?php
							printf( __( '<span class="%1$s">Tagged</span> %2$s', 'alastairhumphreys' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
							$show_sep = true;
						?>
					</span>
				<?php endif; ?>

				<?php if (comments_open()) : ?>
					<?php if ($show_sep) : ?>
						<span class="sep"> | </span>
					<?php endif; ?>
					<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Post a comment', 'alastairhumphreys' ) . '</span>', __( '<b>1</b> Reply', 'alastairhumphreys' ), __( '<b>%</b> Replies', 'alastairhumphreys' ) ); ?></span>
				<?php endif; ?>

				<?php edit_post_link( __( 'Edit', 'alastairhumphreys' ), '<span class="edit-link">', '</span>' ); ?>
			<?php endif; ?>

		</footer>
	</article>
