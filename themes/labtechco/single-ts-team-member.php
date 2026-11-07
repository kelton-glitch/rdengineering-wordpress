<?php
/**
 * The Template for displaying Portfolio single posts.
 *
 * Full View - No image and full-width content (without details box)
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

get_header();
?>


<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
	<main id="main" class="site-main">

		<?php // Start the loop. ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'theme-parts/single-team-member', 'default' ); ?>
		<?php endwhile; ?>

	</main><!-- .site-main -->
</div><!-- .content-area -->


<?php
// Left Sidebar
themestek_get_left_sidebar();

// Right Sidebar
themestek_get_right_sidebar();
?>
	
<?php get_footer(); ?>
