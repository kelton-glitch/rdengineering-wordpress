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
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
	?>
		<main id="main" class="site-main">
			<?php get_template_part( 'theme-parts/single-portfolio', themestek_portfolio_single_view() ); ?>
		</main><!-- .site-main -->
	<?php endwhile; ?>
	<div class="themestek-related-wrapper container">
		<?php echo themestek_portfolio_related(); ?>
	</div>
</div><!-- .content-area -->

<?php
// Left Sidebar
themestek_get_left_sidebar();

// Right Sidebar
themestek_get_right_sidebar();
?>



<?php get_footer(); ?>
