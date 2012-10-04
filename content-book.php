<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

$featuredClass = "";

?>

<?php while (have_posts()) : the_post(); ?>

	<?php if (get_field('post_background') != '') { ?>
		<?php $featuredClass = "featured" ?>
		<div class="feature">
			<img src="<?php the_field('post_background'); ?>" alt="<?php the_title(); ?>" />
		</div>
	<?php } ?>

	<div class="container white content book <?php echo $featuredClass?>">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<h1><?php the_title(); ?></h1>
						<span class="summary"><?php the_field('book_meta') ?></span>
						<span class="quotes"><?php the_field('quotes') ?></span>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<footer class="entry-meta">
						<?php //edit_post_link( __('Edit', 'alastairhumphreys'), '<span class="edit-link">', '</span>'); ?>
					</footer>
				</article>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
	</div>

	<?php get_field('mappazine'); ?>
	<div class="container white content formats">
		<div class="row">
			<div class="span1">&nbsp;</div>
			<div class="span10">
				<h2>Available Formats</h2>
				<ul>
					<li class="clearfix">
						<h3>Mappazine</h3>
						<img class="format-image" src="/" width="200" />
						<div class="format-info">
							<p>Imagine a full size map, with the story depicted on both sides alongside exquisite photography. Hard to explain but fabulous to explore!<br />
							Preview one side of the sheet here.</p>
							<p>More info here, or in the video.<br />
							100 photographs. 9400 words. 125cm x 95cm.<br />
							£5 + p&p Signed by the author.<br />
							Large discounts for multiple copies. Delivered worldwide at no extra cost.</p>
						</div>
					</li>
					<li class="clearfix">
						<h3>Book (and Kindle)</h3>
						<img src="/" width="200" />
						<div class="format-info">
							<p>128 pages plus 16 pages of colour photographs. 30,000 words. 23cm x 19cm.<br>
							£5 + p&p<br>
							Signed by the author.</p>
							<p>DO NOT USE THIS FOR OVERSEAS ADDRESSES. The book will not be delivered.<br />
							International Customers Please Click Here. 128 pages. $7.75</p>
							<p>Click here for the Kindle version</p>
						</div>
					</li>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
	</div>
<?php endwhile; ?>
