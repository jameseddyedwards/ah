<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

?>

</div> <!-- Close 'main' container <div> -->

<div class="footer full-section white">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h4>Search the site</h4>
				<?php get_search_form(); ?>
				<div class="clear"></div>

				<h4>All Time Popular</h4>
				<?php
					$popularArgs = array(
						'numberposts'     => 3,
						'category'        => 'best-bits',
					);
					$popularPosts = get_posts($popularArgs);
				?>
				<ul class="bullet">
					<?php foreach($popularPosts as $post) :	setup_postdata($post); ?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<span class="title"><?php the_title(); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<h4>Support</h4>
				<p>Thank you to the many people who have kindly "bought me a coffee" for just £2.50 as encouragement to keep this blog going.</p>
				<?php echo do_shortcode('[donate]'); ?>
				
			</div>
			<div class="span3">
				<h4>Upcoming Events</h4>
				<ul class="unstyled">
					<li><strong>April 11th:</strong>Explorers Connect. London</li>
				</ul>
				<blockquote>“With the possible exception of Sir David Attenborough, that was the best lecture, and the longest applause that I have heard in the past 15 years.”</blockquote>
				<p>– President of the Royal Geographical Society</p>
			</div>
			<div class="span3 clearfix">
				<h4>Blog Topics</h4>
				<?php 
					$blogCategoriesArgs = array(
						'child_of'	=>	'blog',
					);
					$blogCategories = get_categories($blogCategoriesArgs);
				?>
				<span class="blog-topics">
					<?php foreach($blogCategories as $category) : ?>
						<a href="<?php get_category_link($category -> term_id); ?>"><?php $category->name ?></a>
					<?php endforeach; ?>
					<?php
						$args = array(
							'orderby' => 'name',
							'order' => 'ASC',
							//'child_of'	=>	'blog',
						);
						$categories = get_categories($args);
						
						foreach($categories as $category) { 
							echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
						} 
					?>
				</span>

				<p>
				</p>
			</div>
			<div class="span3 social">
				<h4>Twitter</h4>
				<div class="twitter-feed">
					<?php echo do_shortcode('[twitter-feed username="Al_Humphreys" num=3 img="no" followlink="no"]'); ?>
				</div>

				<!-- Follow -->
				<a href="https://twitter.com/Al_Humphreys" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @Al_Humphreys</a>

				<!-- Like -->
				<div class="fb-like" data-href="http://www.alastairhumphreys.com/" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>
				
			</div>
		</div>
	</div>
</div>

<div class="credits full-section">
	<div class="container">
		<?php do_action('alastairhumphreys_credits'); ?>
		<span class="copyright" title="<?php esc_attr_e( 'Proudly powered by WordPress', 'alastairhumphreys' ); ?>"><?php printf( __( '&copy; Copyright 2012 Alastair Humphreys. All rights reserved.', 'alastairhumphreys' ), 'WordPress' ); ?></span>
		<a class="credit" href="<?php echo esc_url( __( 'http://www.jsummerton.co.uk/', 'alastairhumphreys' ) ); ?>" title="<?php esc_attr_e( 'A Worcester, UK based web designer specialising in clear & compelling, fast & functional web sites.', 'alastairhumphreys' ); ?>" rel="generator"><?php printf( __( 'Site design by JSummerton', 'alastairhumphreys' ), 'WordPress' ); ?></a>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>