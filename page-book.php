<?php
/**
 * Template Name: Book Template
 * Description: A Template used to display a single Book
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

wp_register_style('books', get_template_directory_uri() . '/css/books.css', __FILE__);	
wp_enqueue_style('books');

get_header();

?>

<?php while (have_posts()) : the_post(); ?>

	<!-- Feature Image -->
	<?php echo ah_get_feature_image($pageID = $post->ID); ?>

	<div class="container white content book">
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

	<?php if (get_field('book_formats') != '') { ?>
		<div class="container white formats">
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span10">
					<h2>Available Formats</h2>
				</div>
				<div class="span1">&nbsp;</div>
			</div>
			<div class="row">
				<div class="span1">&nbsp;</div>
				<div class="span10">
					<?php the_field('book_formats'); ?>
					
					<!-- Template
					<div class="book">
						<img src="" alt="" />
						<div class="book-info">
							<h3></h3>
							<p>128 pages plus 16 pages of colour photographs. 30,000 words. 23cm x 19cm.<br>
							£5 + p&p<br>
							Signed by the author.</p>
							<p>DO NOT USE THIS FOR OVERSEAS ADDRESSES. The book will not be delivered.<br />
							International Customers Please Click Here. 128 pages. $7.75</p>
							<p>Click here for the Kindle version</p>
						</div>
					</div>

					<div class="format">
						<div class="format-image">
							<img src="http://farm7.static.flickr.com/6120/6335712854_3c176b2fe1_m.jpg" title="foldedsheet" width="160" height="240" alt="Folded Sheet" />
						</div>
						<div class="format-info">
							<strong>"Mappazine"</strong>
							<p>Imagine a full size map, with the story depicted on both sides alongside exquisite photography. Hard to explain but fabulous to explore! Preview one side of the sheet <a href="http://www.flickr.com/photos/alastairhumphreys/6334380870/in/photostream/lightbox/">here</a>.</p>
							<p>More info <a href="http://www.alastairhumphreys.com/2011/11/mappazine/">here</a>.</p>
							<p>100 photographs. 9400 words. 125cm x 95cm.<br />
							<strong>£5 + p&amp;p</strong> Signed by the author.<br />
							Large discounts for multiple copies. Delivered worldwide at no extra cost.</p>

							<form class="buy-book" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="paypal">
								<fieldset>
									<input type="hidden" name="cmd" value="_s-xclick" />
									<input type="hidden" name="hosted_button_id" value="RYX6BV9KG8LLW" />
									<input type="hidden" name="on0" value="Number of Copies (no change to postage total)" />
									<input type="hidden" name="currency_code" value="GBP" />
									<img alt="" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1" border="0" />

									<p>Number of Copies (no change to postage total)</p>

									<select name="os0">
										<option value="1 Copy">1 Copy £5.00 GBP</option>
										<option value="2 Copies">2 Copies £8.00 GBP</option>
										<option value="3 Copies">3 Copies £10.00 GBP</option>
										<option value="5 Copies">5 Copies £14.00 GBP</option>
										<option value="10 Copies">10 Copies £20.00 GBP</option>
										<option value="100 Copies">100 Copies £100.00 GBP</option>
									</select>

									<input type="image" alt="PayPal — The safer, easier way to pay online." name="submit" src="https://www.paypalobjects.com/en_GB/i/btn/btn_cart_LG.gif" />
								</fieldset>
							</form>
						</div>
					</div>
					-->

				</div>
			</div>
		</div>
	<?php } ?>
<?php endwhile; ?>

<?php get_footer(); ?>