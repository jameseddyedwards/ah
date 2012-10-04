<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();

?>

<!-- Post -->
<?php get_template_part('content', get_field('post_layout')); ?>

<?php get_footer(); ?>