<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
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
			
			$box               = 'blog';
			$global_view       = themestek_get_option('blog_view');  // classic or box
			$global_box_column = themestek_get_option('blogbox_column');  // one, two, three etc
			$global_box_view   = themestek_get_option('blogbox_view');  // top-image, left-image etc
			
			if( $global_view == 'box' ){
				echo '<div class="row multi-columns-row themestek-boxes-row-wrapper">';
			}
			
			// Start the Loop.
			while ( have_posts() ) : the_post();

				if( themestek_get_option('blog_view') == 'box' ){
					echo themestek_column_div('start', themestek_get_option('blogbox_column') );
					echo get_template_part('theme-parts/blogbox/blogbox', 'style-1' );
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
			
			if( $global_view == 'box' ){
				echo '</div>';
			}
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
