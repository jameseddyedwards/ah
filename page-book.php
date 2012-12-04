<?php
/**
 * Template Name: Book Template
 * Description: A Template used to display a single Book
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

$featuredClass = "";

?>

<?php while (have_posts()) : the_post(); ?>

	<?php if (get_field('feature_image') != '') { ?>
		<?php $featuredClass = "featured" ?>
		<div class="feature">
			<img src="<?php the_field('feature_image'); ?>" alt="<?php the_title(); ?>" />
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
				</article>
			</div>
			<div class="span1">&nbsp;</div>
		</div>
	</div>

	<?php if (get_field('format_1') != '') { ?>
		<div class="container white content formats">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span10">
					<h2>Available Formats</h2>
				</div>
				<div class="span1">&nbsp;</div>
			</div>
			<?php for ($i = 1; $i <= 5; $i++) { ?>
				<?php
					$fieldId = 'format_' . $i;
					$fieldDesc = 'format_' . $i . '_description';
					$fieldImage = 'format_' . $i . '_image';
				?>
				<?php if (get_field($fieldId) != '') { ?>
					<div class="row">
						<div class="span1">&nbsp;</div>
						<div class="span2">
							<h3><?php the_field($fieldId); ?></h3>
							<img src="<?php the_field($fieldImage); ?>" alt="<?php the_field($fieldId); ?>" />
						</div>
						<div class="span8">
							<?php the_field($fieldDesc); ?>
							<p>128 pages plus 16 pages of colour photographs. 30,000 words. 23cm x 19cm.<br>
							£5 + p&p<br>
							Signed by the author.</p>
							<p>DO NOT USE THIS FOR OVERSEAS ADDRESSES. The book will not be delivered.<br />
							International Customers Please Click Here. 128 pages. $7.75</p>
							<p>Click here for the Kindle version</p>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<?php } ?>
<?php endwhile; ?>
