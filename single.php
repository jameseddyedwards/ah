<?php
/**
 * The Template for displaying all single POSTS.
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 * @since Alastair Humphreys 1.0
 */

get_header();

?>

<?php if ($testSite) { ?>
	<h1>single.php</h1>
<?php } ?>

<!-- Post -->
<?php get_template_part('content'); ?>

<?php get_footer(); ?>