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

<ul class="gallery">
	<li><img src="<?php bloginfo('template_url'); ?>/images/gallery/adventures/01.jpg" alt="" height="" width="" /></li>
</ul>

<?php if (have_posts()) : ?>

	<!--
	<?php
		global $post;
		$args = array(
			'orderby' => 'menu_order',
			'order' => 'ASC',
		);
		$myposts = get_posts($args);
	?>
	<?php foreach( $myposts as $post ) :	setup_postdata($post); ?>
		<?php
			$thumnail_attrs = array(
				'class'	=> "small",
			);
		?>
		<div class="large">
			<?php the_post_thumbnail("post-thumbnail",$thumnail_attrs); ?>
		</div>
		<div class="small">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="medium">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="medium">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="small">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endforeach; ?>
	-->
	<div class="post-thumbs clearfix">
		<?php while (have_posts()) : the_post(); ?>

			<?php
				$thumnail_attr_01 = array(
					'class'	=> "small",
				);
				$thumnail_attr_02 = array(
					'class'	=> "medium",
				);
				$thumnail_attr_03 = array(
					'class'	=> "large",
				);
			?>
			<span class="large left">
				<?php the_post_thumbnail(); ?>
			</span>
			<span class="small left">
				<?php the_post_thumbnail(); ?>
			</span>
			<span class="medium right">
				<?php the_post_thumbnail(); ?>
			</span>
			<span class="medium left">
				<?php the_post_thumbnail(); ?>
			</span>
			<span class="small right">
				<?php the_post_thumbnail(); ?>
			</span>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<div class="container white content">

	<div class="row">
		<div class="span12">
			<?php echo category_description(); ?>
		</div>
	</div>

	<hr class="large" />

	<div class="row">
		<div class="span12">
			<h1><?php echo single_cat_title(); ?></h1>
			<?php if (have_posts()) : ?>
				<ul class="category-posts">
					<!--
					<header class="page-header">
						<h1 class="page-title">
							<?php printf( __( 'Category Archives: %s', 'alastairhumphreys' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>
						</h1>

					</header>

					<?php alastairhumphreys_content_nav('nav-above'); ?>
					-->
					<?php while (have_posts()) : the_post(); ?>
						<li><?php the_title(); ?>&#187;</li>
						<?php
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							/*get_template_part('content', get_post_format());*/
						?>

					<?php endwhile; ?>

					<?php /* alastairhumphreys_content_nav( 'nav-below' ); */ ?>
				</ul>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'alastairhumphreys' ); ?></h1>
					</header>

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article>

			<?php endif; ?>
		</div>
	</div>
	
	<hr class="large" />

</div>

<?php get_footer(); ?>
