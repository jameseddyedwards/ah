<?php
/**
 * The template for displaying the Videos page which pulls in content via an RSS feed from 
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

/*
$homepage = file_get_contents('http://vimeo.com/channels/alastairhumphreys/videos/rss');
print_r($homepage);
*/

$content = file_get_contents('http://vimeo.com/channels/alastairhumphreys/videos/rss');
$x = new SimpleXmlElement($content);	

//getFeed('http://vimeo.com/channels/alastairhumphreys/videos/rss');

?>

<div class="feature-video">
	
</div>

<div class="container white content">
	<div class="row">
		<div class="span12">
			<?php if (have_posts()) : ?>
				<h1>Browse Videos</h1>
				<div class="row category-filter-thumbs">
					<?php foreach($x->channel->item as $video) { ?>
						<div class="span3">
							<?php print_r($video); ?>
							<a class="post-thumb" href="<?php echo $video->link ?>">
								<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php echo $video->title; ?>" />
								<span class="title"><?php echo $video->title; ?></span>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php else : ?>
				<h1><?php _e('There are no videos currently', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no videos have been found. Perhaps searching will help find a video.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

