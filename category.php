<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

?>
<?php if (function_exists('z_taxonomy_image_url')) { ?>
	<div class="gallery">
		<img src="<?php echo z_taxonomy_image_url(); ?>" alt="" />
	</div>
<?php } ?>

<?php if (have_posts()) : ?>
	<div class="post-thumbs clearfix">
		<?php while (have_posts()) : the_post(); ?>
			<a href="<?php the_permalink() ?>" class="<?php the_field('post_gallery_image_size'); ?> post-thumb">
				<img src="<?php the_field('post_gallery_image'); ?>" title='<?php the_title(); ?>' alt='<?php the_title(); ?>' />
				<span class="title"><?php the_title(); ?></span>
			</a>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<div class="container white content">

	<div class="row">
		<div class="span12">
			<?php echo category_description(); ?>
		</div>
	</div>

	<hr />

	<div class="row">
		<div class="span12">
			<?php if (have_posts()) : ?>
				<h1><?php echo single_cat_title(); ?></h1>
				<ul class="category-posts clearfix">
					<?php while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>"><?php the_title(); ?> &#187;</a></li>
					<?php endwhile; ?>

					<?php /* alastairhumphreys_content_nav( 'nav-below' ); */ ?>
				</ul>

				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_google_plusone" g:plusone:annotation="bubble" g:plusone:size="medium"></a>
					<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5055c67455ab2ff5"></script>
				<!-- AddThis Button END -->
			<?php else : ?>
				<h1><?php echo single_cat_title(); ?><?php _e(' has no posts', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>

		</div>
	</div>


</div>

<?php get_footer(); ?>
