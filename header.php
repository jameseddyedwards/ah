<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and the sites header and navigation menu
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
	<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
	<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
	<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
	<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title>
<?php
	// Print the <title> tag based on what is being viewed.
	global $page, $paged;

	wp_title('|', true, 'right');

	// Add the blog name.
	bloginfo('name');

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) {
		echo " | $site_description";
	}

	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2) {
		echo ' | ' . sprintf(__('Page %s', 'alastairhumphreys'), max($paged, $page));
	}
?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>



</head>

<body <?php body_class(); ?>>

	<?php get_template_part('content', 'body-scripts'); ?>

	<header class="clearfix">
		<div class="container">
			<a class="logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
				<img src="<?php bloginfo('template_url'); ?>/images/alastair-humphreys-logo.png" alt="<?php bloginfo( 'name' ); ?>" />
			</a>

			<div id="phone-nav" class="visible-desktop phone-nav">
				<ul class="social-icons inline">
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/icon/rss.png" /></a></li>
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/icon/twitter.png" /></a></li>
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/icon/facebook.png" /></a></li>
					<li><a href=""><img src="<?php bloginfo('template_url'); ?>/images/icon/flickr.png" /></a></li>
				</ul>

				<?php get_search_form(); ?>

				<nav class="access" role="navigation">
					<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
					<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'alastairhumphreys' ); ?>"><?php _e( 'Skip to secondary content', 'alastairhumphreys' ); ?></a></div>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
					<?php wp_nav_menu(array(
						'theme_location'	=> 'primary',
						'menu_class'		=> 'menu'
					)); ?>

					<?php //ah_get_dropdown(array('Adventures','Micro Adventures'), 'menu-item-8380'); ?>

					<?php get_template_part('content', 'dropdown'); ?>
				</nav>
			</div>
		</div>
	</header>

	<div class="skip-link">
		<a class="assistive-text" href="#content" title="<?php esc_attr_e('Skip to primary content', 'alastairhumphreys'); ?>">
			<?php _e('Skip to primary content', 'alastairhumphreys'); ?>
		</a>
	</div>

	<div class="main">
		<img id="nav-toggle" src="<?php bloginfo('template_url'); ?>/images/button/tab-nav.gif" class="nav-toggle visible-phone" alt="Navigation Toggle" />
