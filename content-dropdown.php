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

$js = strpos($_SERVER['REQUEST_URI'], 'AH');

$subNavs = array(
	'Blog' => array(
		'menu_item' => $js ? 7 : 58, // JS or Local
		'type' => 'blog',
		'categories' => array(
			'Blog'
		)
	),
	'Adventures' => array(
		'menu_item' => $js ? 8483 : 8380, // Local
		'type' => 'adventures',
		'page_parents' => array(
			'Adventures',
			'Micro Adventures'
		)
	),
	'Books' => array(
		'menu_item' => $js ? 8529 : 10204, // Local
		'type' => 'books',
		'page_parents' => array(
			'Books'
		)
	),
	'More' => array(
		'menu_item' => $js ? 8658 : 10221, // Local
		'type' => 'more',
		'page_parents' => array(
			'More'
		)
	)
);

?>
<?php if (count($subNavs) > 0) { ?>
	<?php foreach ($subNavs as $subNav) { ?>
		<?php $menu_class = 'menu-item-' . $subNav['menu_item']; ?>
		<div id="dropdown-<?php echo $menu_class; ?>" class="dropdown <?php echo $menu_class; ?>">
			<?php
			$subNavType = $subNav['type'];
			$i = 1;
			
			// Single Post dropdown showing latest post and all sub-categories
			if ($subNavType == 'blog') {
				$subNavCategories = $subNav['categories'];
				$categoryCount = sizeof($subNavCategories);
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

							<?php foreach($categoryPosts as $categoryPost) : setup_postdata($categoryPost); ?>
								<a class="feature-image" href="<?php the_permalink(); ?>">
									<img src="<?php echo ah_get_custom_thumb($categoryPost->ID); ?>" alt="<?php the_title(); ?>" width="215" />
								</a>
								<div class="post-text">
									<a href="<?php the_permalink(); ?>" class="sub-title"><?php the_title(); ?></a>
									<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?></span>
									<a class="arrow-link continue-reading" href="<?php the_permalink(); ?>">continue reading</a>
								</div>
							<?php endforeach; ?>
						</div>

						<!-- Category List -->
						<span class="sub-title"><?php echo $categoryClass; ?> Categories</span>
						<ul class="category-list">
							<?php
								$categoryListArgs = array('child_of'=>$categoryId,'number'=> '24');
								$subNavSubCategories = get_categories($categoryListArgs);
							?>
							<?php $subCategoryCount = 1; ?>
							<?php foreach ($subNavSubCategories as $subNavSubCategory) { ?>
								<li>
									<a href="<?php echo get_category_link($subNavSubCategory->term_id); ?>"><?php echo $subNavSubCategory->name ?></a>
								</li>
								<?php if ($subCategoryCount == 8 || $subCategoryCount == 16) { ?>
									</ul>
									<ul class="clearfix<?php echo $subCategoryCount == 16 ? ' last' : ''; ?>">
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
			} elseif ($subNavType == 'adventures') {
				$subNavPages = $subNav['page_parents'];
				$pageCount = sizeof($subNavPages);
				foreach ($subNavPages as $subNavPage) {
					$pageVars = get_object_vars(get_page_by_title($subNavPage));
					$pageId = $pageVars[ID];
					if ($pageId != '') {
						$pageArgs = array(
							'post_type'       => 'page',
							'post_parent'     => $pageId,
							'numberposts'     => 10
						);
						$featurePageArgs = array(
							'post_type'       => 'page',
							'post_parent'     => $pageId,
							'numberposts'     => 1
						);
						$pages = get_posts($pageArgs);
						$featureImagePage = get_posts($featurePageArgs);
						$pageURL = esc_url(home_url('/')) . '?page_id=' . $pageId;
						$pageClass = strtolower(str_replace(" ", "-", $subNavPage));
						if (!empty($pages)) {
						?>
					
							<div class="category clearfix <?php echo $pageClass ?>">
								<a href="<?php echo $pageURL ?>" class="sub-title"><?php echo $subNavPage ?></a>
								<?php foreach($featureImagePage as $featurePage) : setup_postdata($featurePage); ?>
									<a class="feature-image" href="<?php echo get_page_link($featurePage->ID); ?>">
										<img src="<?php echo ah_get_custom_thumb($featurePage->ID); ?>" alt="<?php echo $featurePage->post_title ?>" width="215" />
									</a>
								<?php endforeach; ?>
								<ul class="clearfix">
									<?php $pageCount = 1; ?>
									<?php foreach ($pages as $page) { ?>
										<li>
											<a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title ?></a>
										</li>
										<?php if ($pageCount == 5) { ?>
											</ul>
											<ul class="clearfix last">
										<?php } ?>
										<?php $pageCount = $pageCount + 1; ?>
									<?php } ?>

								</ul>
								<a href="<?php echo $pageURL ?>" class="arrow-link view-all">view all <?php echo $subNavPage ?></a>
							</div>
							<?php if ($i != $pageCount) { ?>
								<hr />
							<?php } ?>
							<?php $i = $i + 1; ?>
						<?php } ?>
					<?php } ?>
				<?php }
			} elseif ($subNavType == 'books') {

				$bookArgs = array(
					'post_type'       => 'page',
					'post_parent'     => $js ? 803 : 803,
					'numberposts'     => 5
				);
				$bookPages = get_posts($bookArgs);
				$counter = 0;
				$booksURL = esc_url(home_url('/')) . '?cat=' . $categoryId;

				?>
				<div class="books clearfix <?php echo $categoryClass ?>">
					<?php foreach ($bookPages as $bookPage) { ?>
						<?php $counter = $counter + 1; ?>
						<a class="feature-image<?php echo $counter == 5 ? ' last' : ''; ?>" href="<?php echo get_page_link($bookPage->ID); ?>">
							<img src="<?php echo ah_get_custom_thumb($bookPage->ID); ?>" alt="<?php the_title(); ?>" width="120" />
							<span><?php echo $bookPage->post_title ?></span>
						</a>
					<?php } ?>
				</div>
				<hr />
				<div class="view-all-link">
					<a href="<?php echo $booksURL ?>" class="arrow-link view-all">view all Books</a>
				</div>
			<? } elseif ($subNavType == 'more') {
				$subNavPages = $subNav['page_parents'];
				foreach ($subNavPages as $subNavPage) {
					$pageVars = get_object_vars(get_page_by_title($subNavPage));
					$pageId = $pageVars[ID];
					$moreArgs = array(
						'post_type'       => 'page',
						'post_parent'     => $pageId
					);
					$moreLinks = get_posts($moreArgs);
					$counter = 0;
					?>
					<div class="more clearfix <?php echo $categoryClass ?>">
						<?php foreach ($moreLinks as $moreLink) { ?>
							<?php $counter = $counter + 1; ?>
							<a href="<?php echo get_page_link($moreLink->ID); ?>"><?php echo $moreLink->post_title ?></a>
						<?php } ?>
					</div>
				<? 	}
				} ?>
		</div>
	<?php } ?>
<?php } ?>
