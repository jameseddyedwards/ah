<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>

<!-- Adventures -->
<!-- Types - grahical, single-post, categories -->

<?php
$subNavs = array(
	'Blog' => array(
		'menu_item' => 58,
		'type' => 'single-post',
		'categories' => array(
			'Blog'
		)
	),
	'Adventures' => array(
		'menu_item' => 8380,
		'type' => 'categories',
		'categories' => array(
			'Adventures',
			'Micro Adventures'
		)
	),
	'Books' => array(
		'menu_item' => 59,
		'type' => 'graphics',
		'categories' => array(
			'Books'
		)
	)
);

?>
<?php if (count($subNavs) > 0) { ?>
	<?php foreach ($subNavs as $subNav) { ?>
		<?php $menu_class = 'menu-item-' . $subNav['menu_item']; ?>
		<div id="dropdown-<?php echo $menu_class; ?>" class="dropdown <?php echo $menu_class; ?>">
			<?php
			$subNavCategories = $subNav['categories'];
			$subNavType = $subNav['type'];
			$categoryCount = sizeof($subNavCategories);
			$i = 1;
			
			// Single Post dropdown showing latest post and all sub-categories
			if ($subNavType == 'single-post') {
				foreach ($subNavCategories as $subNavCategory) {
					$categoryId = get_cat_ID($subNavCategory);
					$categoryPosts = get_posts(array('numberposts'=>1, 'cat'=>$categoryId));
					$categoryURL = esc_url(home_url('/')) . '?cat=' . $categoryId;
					$categoryClass = strtolower(str_replace(" ", "-", $subNavCategory));
					?>
				
					<div class="category clearfix <?php echo $categoryClass ?>">

						<!-- Latest Post -->
						<div class="latest-post clearfix">
							<span class="sub-title">Latest Post</span>
							<?php foreach($categoryPosts as $post) : setup_postdata($post); ?>
								<a class="feature-image" href="<?php the_permalink(); ?>">
									<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" width="215" />
								</a>
								<div class="post-text">
									<a href="<?php the_permalink(); ?>" class="sub-title"><?php the_title(); ?></a>
									<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?></span>
									<a class="arrow-link continue-reading" href="<?php the_permalink(); ?>">continue reading</a>
								</div>
							<?php endforeach; ?>
						</div>

						<!-- Category List -->
						<ul class="category-list">
							<?php
								$categoryListArgs = array('child_of'=>$categoryId,'number'=> '24');
								$subNavSubCategories = get_categories($categoryListArgs);
							?>
							<?php $subCategoryCount = 1; ?>
							<?php foreach ($subNavSubCategories as $subNavSubCategory) { ?>
								<li>
									<a href="<?php echo get_category_link($subNavSubCategory->term_id); ?>"><?php echo $subNavSubCategory->category_nicename ?></a>
								</li>
								<?php if ($subCategoryCount == 8 || $subCategoryCount == 16) { ?>
									</ul>
									<ul class="clearfix">
								<?php } ?>
								<?php $subCategoryCount = $subCategoryCount + 1; ?>
							<?php } ?>
						</ul>
						<a href="<?php echo $categoryURL ?>" class="arrow-link view-all">browse all posts</a>
					</div>
					<?php if ($i != $categoryCount) { ?>
						<hr />
					<?php } ?>
					<?php $i = $i + 1; ?>
					<?php
				}
			} elseif ($subNavType == 'categories') {
				foreach ($subNavCategories as $subNavCategory) {
					$categoryId = get_cat_ID($subNavCategory);
					$categoryPosts = get_posts(array('numberposts'=>10, 'cat'=>$categoryId));
					$featureImagePost = get_posts(array('numberposts'=>1, 'cat'=>$categoryId));
					$categoryURL = esc_url(home_url('/')) . '?cat=' . $categoryId;
					$categoryClass = strtolower(str_replace(" ", "-", $subNavCategory));
					?>
				
					<div class="category clearfix <?php echo $categoryClass ?>">
						<a href="<?php echo $categoryURL ?>" class="sub-title"><?php echo $subNavCategory ?></a>
						<?php foreach($featureImagePost as $post) : setup_postdata($post); ?>
							<a class="feature-image" href="<?php the_permalink(); ?>">
								<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" width="215" />
							</a>
						<?php endforeach; ?>
						<ul class="clearfix">
							<?php
								$postCount = 1;
								foreach($categoryPosts as $post) : setup_postdata($post); ?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
								<?php if ($postCount == 5) { ?>
									</ul>
									<ul class="clearfix">
								<?php } ?>
								<?php $postCount = $postCount + 1; ?>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo $categoryURL ?>" class="arrow-link view-all">view all <?php echo $subNavCategory ?></a>
					</div>
					<?php if ($i != $categoryCount) { ?>
						<hr />
					<?php } ?>
					<?php $i = $i + 1; ?>
					<?php
				}
			} else {
				foreach ($subNavCategories as $subNavCategory) {
					$categoryId = get_cat_ID($subNavCategory);
					$categoryPosts = get_posts(array('numberposts'=>10, 'cat'=>$categoryId));
					$featureImagePost = get_posts(array('numberposts'=>1, 'cat'=>$categoryId));
					$categoryURL = esc_url(home_url('/')) . '?cat=' . $categoryId;
					$categoryClass = strtolower(str_replace(" ", "-", $subNavCategory));
					?>
				
					<div class="category clearfix <?php echo $categoryClass ?>">
						<a href="<?php echo $categoryURL ?>" class="sub-title"><?php echo $subNavCategory ?></a>
						<?php foreach($featureImagePost as $post) : setup_postdata($post); ?>
							<a class="feature-image" href="<?php the_permalink(); ?>">
								<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" width="215" />
							</a>
						<?php endforeach; ?>
						<ul class="clearfix">
							<?php
								$postCount = 1;
								foreach($categoryPosts as $post) : setup_postdata($post); ?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>
								<?php if ($postCount == 5) { ?>
									</ul>
									<ul class="clearfix">
								<?php } ?>
								<?php $postCount = $postCount + 1; ?>
							<?php endforeach; ?>
						</ul>
						<a href="<?php echo $categoryURL ?>" class="arrow-link view-all">view all <?php echo $subNavCategory ?></a>
					</div>
					<?php if ($i != $categoryCount) { ?>
						<hr />
					<?php } ?>
					<?php $i = $i + 1; ?>
					<?php
				}
			}
			?>
		</div>
	<?php } ?>
<?php } ?>
