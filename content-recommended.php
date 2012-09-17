<?php
/**
 * The template for displaying recent posts in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php
 /*
	$currentPostID = get_the_ID();
	query_posts('posts_per_page=6');
	*/
?>

<!--
<div class="container white">
	<div class="row">
		<div class="span12">
			<h2>Recent Posts</h2>
		</div>
	</div>
	<div class="row tab-row active">
		
		<?php while (have_posts()) : the_post(); ?>
			<?php $recentPostID = get_the_ID(); ?>

			<?php if ($currentPostID != $recentPostID) { ?>
				<div class="span4">
					<a class="post-thumb" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
						<span class="title"><?php the_title(); ?></span>
					</a>
					<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
				</div>
			<?php } ?>
		<?php endwhile; ?>
	</div>
</div>
-->
