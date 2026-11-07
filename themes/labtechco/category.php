<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		
		
		<?php if( themestek_get_option('blog_view') == 'box' ) : ?>
			<div class="row multi-column-row">
		<?php endif; ?>
		

		<?php if ( have_posts() ) : ?>

			<?php		
			// Start the Loop.
			while ( have_posts() ) : the_post();
			
				if( themestek_get_option('blog_view') == 'box' ){
					$style	= themestek_get_option('blogbox_boxstyle');
					echo themestek_column_div('start', themestek_get_option('blogbox_column') );
					echo get_template_part('theme-parts/blogbox/blogbox', $style );
					echo themestek_column_div('end', themestek_get_option('blogbox_column') );
					
				} else if(themestek_get_option('blog_view') == 'style-2') {
					echo themestek_column_div('start', themestek_get_option('blogbox_column') );
					echo get_template_part('theme-parts/blogbox/blogbox', 'style-2' );
					echo themestek_column_div('end', themestek_get_option('blogbox_column') );
					
				} else {
					echo get_template_part('theme-parts/post','classic-view');
				}

			// End the loop.
			endwhile;

			?>
			
		<?php else : ?>
			
			<?php
			// If no content, include the "No posts found" template.
			get_template_part( 'theme-parts/content', 'none' );
			?>

		<?php endif; ?>

		
		<?php if( themestek_get_option('blog_view') == 'box' ) : ?>
			</div><!-- .row -->
		<?php endif; ?>
		
		
		<?php
		// Previous/next page navigation.
		echo themestek_pagination();
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
