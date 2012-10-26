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


<?php
$subNavs = array(
	'Adventures' => array(
		'menu_item' => 8380,
		'categories' => array(
			'Adventures',
			'Micro Adventures'
		)
	),
	'Speaking' => array(
		'menu_item' => 215,
		'categories' => array(
			'Speaking'
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
			$categoryCount = sizeof($subNavCategories);
			$i = 1;

			foreach ($subNavCategories as $subNavCategory) {
				$categoryId = get_cat_ID($subNavCategory);
				$categoryPosts = get_posts(array('numberposts'=>10, 'cat'=>$categoryId));
				$featureImagePost = get_posts(array('numberposts'=>1, 'cat'=>$categoryId));
				$categoryURL = esc_url(home_url('/')) . '?cat=' . $categoryId;
				$categoryClass = strtolower(str_replace(" ", "-", $subNavCategory));
				?>
			
				<div class="category clearfix <?php echo $categoryClass ?>">
					<a href="<?php echo $categoryURL ?>" class="cat-title"><?php echo $subNavCategory ?></a>
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
					<a href="<?php echo $categoryURL ?>" class="view-all">view all <?php echo $subNavCategory ?></a>
				</div>
				<?php if ($i != $categoryCount) { ?>
					<hr />
				<?php } ?>
				<?php $i = $i + 1; ?>
				<?php
				
			}
			?>
		</div>
	<?php } ?>
<?php } ?>
