<?php
/**
 * The template for displaying Author pages
 *
 * Used to display author pages for posts.
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
		
		<?php
			// Author bio.
			if ( get_the_author_meta( 'description' ) ) :
				echo get_template_part( 'theme-parts/author-bio', 'customized' );
			endif;
		?>
	
	
		<?php if( themestek_get_option('blog_view') == 'box' ) : ?>
			<div class="row multi-column-row">
		<?php endif; ?>
		

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				if( themestek_get_option('blog_view') == 'box' ){
					echo themestek_column_div('start', themestek_get_option('blogbox_column') );
					echo get_template_part('theme-parts/blogbox/blogbox', themestek_get_option('blogbox_view') );
					echo themestek_column_div('end', themestek_get_option('blogbox_column') );
				} else if(themestek_get_option('blog_view') == 'classic') {
					echo get_template_part('theme-parts/post','classic-view');
				}

			// End the loop.
			endwhile;


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'theme-parts/content', 'none' );

		endif;
		?>
		
		
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
