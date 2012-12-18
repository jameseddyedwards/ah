<?php
/**
 * The main template file.
 *
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage AlastairHumphreys
 */

get_header();

$category_best = get_cat_ID('Best bits');
$category_blog = get_cat_ID('Blog');
$bestArgs = array(
	'numberposts'	=> 3,
	'cat'			=> $category_best
);
$recentArgs = array(
	'numberposts'		=> 3,
	'cat'				=> $category_blog
);
$bestBits = get_posts($bestArgs);
$recentPosts = get_posts($recentArgs);

$bannerCount = 10;

?>

<?php if ($testSite) { ?>
	<h1>Index.php</h1>
<?php } ?>

<?php if (have_posts()) { ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php if (get_field('carousel_gallery') == '') { ?>
			<div class="gallery">
				<?php the_field('carousel_gallery'); ?>
			</div>
		<?php } ?>
	<?php endwhile; ?>
<?php } ?>

<style>
.timer,
.play {left:50%; opacity:0.6; position:absolute; top:50px; transition:opacity 0.6s ease; z-index:2;}
.timer {height:50px; margin:-25px 0 0 -25px; width:50px;}
.timer .top,
.timer .bottom {height:25px; overflow:hidden; width:50px;}
.timer .bottom img {margin-top:-26px; transform:rotate(180deg);}
.play {border:8px solid transparent; border-left:13px solid #000; height:0; left:20px; position:absolute; top:17px; width:0;}
.play.paused {border:4px solid #000; border-bottom:none; border-top:none; height:14px; width:3px;}
.play:hover {opacity:1;}

.next,
.previous {height:49px; margin-top:-25px; opacity:0.6; position:absolute; top:50%; width:49px; z-index:10;}
.next:hover,
.previous:hover {opacity:1;}
.next {background:url("<?php bloginfo('template_url'); ?>/images/icon/right.png") no-repeat; right:10px;}
.previous {background:url("<?php bloginfo('template_url'); ?>/images/icon/left.png") no-repeat; left:10px;}
</style>

<div class="carousel">
	<div id="carousel">
		<?php for ($i = 1; $i <= $bannerCount; $i++) { ?>
			<?php $i = sprintf('%02s', $i); ?>
			<img src="<?php bloginfo('template_url'); ?>/images/gallery/home/<?php echo $i; ?>.jpg" alt="rally1" width="1600" height="800" />
		<?php } ?>
	</div>
	<div id="timer" class="timer">
		<div class="top">
			<img src="<?php bloginfo('template_url'); ?>/images/icon/timer-dark.png" />
		</div>
		<div class="bottom">
			<img src="<?php bloginfo('template_url'); ?>/images/icon/timer-dark.png" />
		</div>
		<a id="play" class="play" href="#"></a>
	</div>
	<a id="next" class="next" href="#"></a>
	<a id="previous" class="previous" href="#"></a>
</div>


<script type="text/javascript">

jQuery(function($) {
	var timer = $('#timer'),
		timerTop = $('.top img', timer),
		timerBottom = $('.bottom img', timer);

	$('#carousel').carouFredSel({
		auto: {
			pauseOnEvent: 'resume',
			button: '#play',
			progress: {
				bar: '#timer',
				updater: function( percentage ) {
					if ( percentage < 50 ) {
						var deg = 180 - ( percentage * 180 / 50 );
						timerTop.css( 'transform', 'rotate( -' + deg + 'deg )' );
						timerBottom.css( 'transform', 'rotate( 0deg )' );
						
					} else {
						var deg = ( ( percentage - 50 ) * 180 / 50 );
						timerTop.css( 'transform', 'rotate( 0deg )' );
						timerBottom.css( 'transform', 'rotate( ' + deg + 'deg )' );
					}
				}
			}
		},
		items : {
			height : 'variable'
		},
		next : {
			button : "#next"
		},
		prev : {
			button : "#previous"
		},
		responsive  : true,
		scroll: {
			fx: 'crossfade',
			duration: 300,
			timeoutDuration: 5000,
			onBefore: function() {
				timer.hide();
			},
			onAfter: function() {
				timer.show();
				timerTop.css( 'transform', 'rotate( 182deg )' );
				timerBottom.css( 'transform', 'rotate( 0deg )' );
			}
		}
	});
});

</script>



<div class="container white">
	<?php if (have_posts()) { ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="span4">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="span8">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'alastairhumphreys' ) ); ?>
				</div>
			</div>
			<hr />
		<?php endwhile; ?>
	<?php } ?>

	<div class="row">
		<div class="span12 head-bar">
			<ul id="post-view" class="tabs clearfix">
				<li id="recent" class="active">Latest posts</li>
				<li id="best">Best bits</li>
			</ul>
			<a class="view-all" href="<?php echo get_site_url(); ?>/?cat=5">view all</a>
		</div>
	</div>

	<!-- Best Bits -->
	<div class="row tab-row best">
		<?php foreach($bestBits as $post) :	setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>

	<!-- Recent Posts -->
	<div class="row tab-row recent active">
		<?php foreach($recentPosts as $post) : setup_postdata($post); ?>
			<div class="span4">
				<a class="post-thumb" href="<?php the_permalink(); ?>">
					<img src="<?php echo ah_get_custom_thumb(); ?>" alt="<?php the_title(); ?>" />
					<span class="title"><?php the_title(); ?></span>
				</a>
				<span class="excerpt"><?php echo strip_tags(get_the_excerpt()) ?>...</span>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>