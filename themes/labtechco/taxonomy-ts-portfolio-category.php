<?php
/**
 * Portfolio Category
 *
 */


// Fetching Taxonomy data so we can use it
$tax = $wp_query->get_queried_object();


get_header(); ?>

	<section id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
		
			
			<?php
			// Taxonomy featured image set by ThemeStek
			$term_data         = get_term_meta( $tax->term_id, 'ts_taxonomy_options', true );
			$featured_img_code = '';
			if( !empty($term_data['tax_featured_image']) ){
				$featured_img_code = '<div class="ts-term-featured-img"><img src="' . esc_url($term_data['tax_featured_image']) . '" alt="' . esc_attr($tax->name) . '" /></div>';
			}
			echo themestek_wp_kses($featured_img_code);
			?>
			
			<?php
			// category description
			$tax_desc = '';
			if( !empty($tax->description) ){
				$tax_desc .= '<div class="ts-term-desc">';
					$tax_desc .= do_shortcode(nl2br($tax->description));
				$tax_desc .= '</div>';
			}
			echo themestek_wp_kses($tax_desc);
			?>
			

			<?php
			global $labtechco_theme_options;
			$view   = ( !empty($labtechco_theme_options['pfcat_view']) ) ? $labtechco_theme_options['pfcat_view'] : 'overlay' ;
			$column = ( !empty($labtechco_theme_options['pfcat_column']) ) ? $labtechco_theme_options['pfcat_column'] : 'three' ;
			
			?>	
			
			
			
			<div class="row multi-columns-row themestek-boxes-row-wrapper">
				
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				?>
				
				<?php echo themestek_column_div('start', $column ); ?>
					<?php echo get_template_part( 'theme-parts/portfoliobox/portfoliobox', $view ); ?>
				<?php echo themestek_column_div('end', $column ); ?>

				<?php
			// End the loop.
			endwhile;
			
			?>
			
			</div><!-- .themestek-boxes-row-wrapper -->
			
			
			<?php
			// Previous/next page navigation.
			echo themestek_pagination();
			?>

			
			<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'theme-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

	
<?php
// Left Sidebar
themestek_get_left_sidebar();

// Right Sidebar
themestek_get_right_sidebar();
?>
	
	
	
	
<?php get_footer(); ?>
