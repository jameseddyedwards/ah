<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<?php if (have_posts()) : ?>
	<?php
	global $post;
	$currentCategoryId = get_query_var('cat');
	$args = array('numberposts' => 1, 'category' => $currentCategoryId);
	$myposts = get_posts($args);
	?>
	<?php foreach($myposts as $post) : setup_postdata($post); ?>
		<?php if (get_field('feature_image') != '') { ?>
			<div class="gallery">
				<img src="<?php the_field('feature_image') ?>" alt="<?php echo single_cat_title(); ?>" />
			</div>
		<?php } ?>
		<div class="container white content">
			<div class="row">
				<div class="span2">
					<?php if ('post' == get_post_type()) : ?>
						<div class="post-date">
							<?php alastairhumphreys_posted_on(); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="span10">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<h1><?php the_title(); ?></h1>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'alastairhumphreys' ) );

								/* translators: used between list items, there is a space after the comma */
								$tag_list = get_the_tag_list('', __(', ','alastairhumphreys'));
								if ('' != $tag_list) {
									/* $utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'alastairhumphreys' ); */
									$utility_text = __('<span class="meta">Posted in %1$s and tagged %2$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								} elseif ('' != $categories_list) {
									$utility_text = __('<span class="meta">Posted in %1$s. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								} else {
									$utility_text = __('<span class="meta">Posted by <a href="%6$s">%5$s</a>. Want to read later? <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Bookmark it</a>.</span>', 'alastairhumphreys' );
								}

								printf(
									$utility_text,
									$categories_list,
									$tag_list,
									esc_url(get_permalink()),
									the_title_attribute('echo=0'),
									get_the_author(),
									esc_url(get_author_posts_url(get_the_author_meta('ID')))
								);
							?>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<a href="<?php the_permalink(); ?>" class="continue-reading">
							<span>continue reading</span>
						</a>
					</article>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<div class="container white content">
	<div class="row">
		<div class="span12">
			<?php if (have_posts()) : ?>
				<h2>Browse blog posts</h2>
				<div class="row category-filter">
					<div class="span3">
						<h3>Browse Blog Posts by Category</h3>
					</div>
					<div class="span9">

						<!-- Category List -->
						<ul id="category-links" class="post-categories">
							<?php
							$categories = get_categories(array('number'=>12));
							foreach($categories as $category) {
								$obj = get_object_vars($category);
								$catId = $obj[cat_ID];
								$catName = $obj[name];
								$catURL = esc_url(home_url('/')) . '?cat=' . $catId;
								?>

								<li>
									<a<?php echo $currentCategoryId == $catId ? ' class="current"' : ''; ?> rel="category" title="View latest posts in <?php echo $catName; ?>" href="<?php echo $catURL; ?>"><?php echo $catName; ?></a>
								</li>

								<?php
							}
							?>
						</ul>
					</div>
				</div>
				<div id="category-filter-thumbs" class="row category-filter-thumbs">
					<?php while (have_posts()) : the_post(); ?>
						<div class="span3">
							<a class="post-thumb" href="<?php the_permalink(); ?>">
								<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
								<span class="title"><?php the_title(); ?></span>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<h1><?php echo single_cat_title(); ?><?php _e(' has no posts', 'alastairhumphreys'); ?></h1>
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'alastairhumphreys'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>

			<!-- Pagination -->
			<div id="pagination" class="row">
				<div class="span12">
					<?php 
						if (function_exists('wp_paginate')) {
							wp_paginate();
						} else if ($wp_query->max_num_pages > 1) {
							alastairhumphreys_content_nav('nav-below');
						}
					?>
				</div>
			</div>

		</div>
	</div>
</div>

<script type="text/javascript">
	
	jQuery(document).ready(function($){
		var container = $("#category-links"),
			links = $("a", container),
			pagination = $("#pagination"),
			paginationLinks = $("a", pagination),
			pathname = window.location.href,
			posts = $("#category-filter-thumbs"),
			thumbs,
			wrapper = $('<div id="wrapper" class="wrapper">').css("height", posts.outerHeight()),
			url;

		if (!$("#wrapper").length > 0) {
			posts.wrap(wrapper);
		}

		function initPaginationAjax() {
			$("a", "#pagination").click(function(event){
				event.preventDefault();

				url = $(this).attr("href");
				ajaxPagination(url);
			});
		}

		function ajaxPagination(url) {
			$.get(url, function(data) {
				thumbs = $(data).find("#category-filter-thumbs").html();
				newPagination = $(data).find("#pagination").html();
				
				posts.html(thumbs); // Replace posts with Ajax'd posts (while hidden)
				//console.log($("#category-filter-thumbs").outerHeight());
				//console.log(wrapper);
				wrapper.animate({height : $("#category-filter-thumbs").outerHeight()}, 500); // Calculate new post wrapper height and animate

				posts.fadeIn(); // Once wrapper height is the correct size load the new thumbs
				//console.log($("a", newPagination).length);
				if ($("a", newPagination).length > 0) {					
					pagination.html(newPagination);
					initPaginationAjax();
					pagination.fadeIn();
					//console.log("pagination ajax initiated");
				} else {
					pagination.fadeOut();
				}
			});
		}

		links.click(function(event){
			event.preventDefault();

			if (!$(this).hasClass("current")) {

				url = $(this).attr("href");

				links.removeClass("current");
				$(this).addClass("current");

				posts.fadeOut();

				ajaxPagination(url);
			}
		});

		if (paginationLinks.length > 0) {
			initPaginationAjax();
			//console.log("pagination initiated on load");
		}
	});

</script>

