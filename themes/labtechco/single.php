<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
				
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
					?>
					
					<div class="themestek-common-box-shadow">
					
					<?php
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part('theme-parts/post','classic-view');

					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
					?>
					<div class="ts-blog-classic-box-content">
						<?php comments_template(); ?>
					</div><!-- .ts-blog-classic-box-content -->
					<?php
					endif;

					
					?>
					
					</div><!-- .themestek-common-box-shadow-->
					
					<?php
					
					// Edit link
					if( is_singular() ){
						edit_post_link( esc_attr__( 'Edit', 'labtechco' ), '<div class="edit-link-wrapper clearfix"> <span class="edit-link">', '</span></div>' );
					}
					
					
				// End the loop.
				endwhile;
				?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

	
<?php
// Left Sidebar
themestek_get_left_sidebar();

// Right Sidebar
themestek_get_right_sidebar();
?>
	
<?php get_footer(); ?>
