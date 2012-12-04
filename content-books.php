<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

$current_category = 'category_' . get_query_var('cat');
$postImage = '';
if (function_exists('z_taxonomy_image_url') && z_taxonomy_image_url() != '') {
	$postImage = ' style="background:url(' . z_taxonomy_image_url() . ') no-repeat center top; padding-top:700px;"';
}

$bookPageArgs = array(
	'post_type'       => 'page',
	'post_parent'     => $post->ID,
	'numberposts'     => 10
);
$bookPages = get_posts($bookPageArgs);


?>

<?php if ($testSite) { ?>
	<h1>content-books.php</h1>
<?php } ?>

<div class="split-layout background"<?php echo $postImage ?>>

	<?php if (have_posts()) : the_post(); ?>
		<div class="container white content">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span9">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
				<div class="span2">&nbsp;</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="container white content book-menu">

		<?php foreach($bookPages as $bookPage) : setup_postdata($bookPage); ?>
			<!--
			<a class="feature-image" href="<?php the_permalink(); ?>">
				<img src="<?php echo ah_get_custom_thumb($bookPage->ID); ?>" alt="<?php the_title(); ?>" width="215" />
			</a>
			<div class="post-text">
				<a href="<?php the_permalink(); ?>" class="sub-title"><?php the_title(); ?></a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?></span>
				<a class="arrow-link continue-reading" href="<?php the_permalink(); ?>">continue reading</a>
			</div>
		-->

			<?php //print_r($bookPage); ?>
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span3">
					<a href="<?php echo esc_url(home_url('/')) . '?page_id=' . $bookPage->ID; ?>"><img src="<?php echo ah_get_custom_thumb($bookPage->ID); ?>" alt="<?php echo $bookPage->post_title; ?>" /></a>
				</div>
				<div class="span6 book-menu">
					<div class="info">
						<h2><a class="title" href="<?php echo $bookPage->guid; ?>"><?php echo $bookPage->post_title; ?></a></h2>
						<span class="summary"><?php the_field('book_meta') ?></span>
						<?php
							if (get_field('book_snippet') != '') {
								the_field('book_snippet');
							} else {
								the_excerpt();
							}
						?>
						<a class="box-button" href="<?php the_permalink() ?>">More Information &amp; buying options</a>
					</div>
				</div>
				<div class="span2">&nbsp;</div>
			</div>
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span9">
					<hr />
				</div>
				<div class="span1">&nbsp;</div>
			</div>

		<?php endforeach; ?>

		</div>
	</div>

	<!-- Further Reading -->
	<div class="container white content further-reading">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span9">
				<h3>Further Reading</h3>
				<?php the_field('additional_info', $current_category); ?>
			</div>
			<div class="span2">&nbsp;</div>
		</div>
	</div>
</div>
