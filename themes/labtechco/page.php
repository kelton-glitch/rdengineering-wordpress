<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?> <?php echo themestek_sanitize_html_classes(themestek_page_container_optional()); ?>">
		<main id="main" class="site-main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'theme-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- #main .site-main -->
	</div><!-- #primary .content-area -->
	
	
<?php
// Left Sidebar
themestek_get_left_sidebar();

// Right Sidebar
themestek_get_right_sidebar();
?>
	
	
<?php get_footer(); ?>
