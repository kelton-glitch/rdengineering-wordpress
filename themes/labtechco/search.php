<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

// Nothing found message
$ts_nothing_found_message = '';

// Redirect if nothing found in selected CPT
themestek_search_redirect();
 
get_header(); ?>

	<div id="primary" class="content-area <?php echo themestek_sanitize_html_classes(themestek_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		
			
			<?php echo themestek_search_form(); ?>
			
		
			<?php
			if ( have_posts() ) :
				
				// getting global options
				$labtechco_theme_options = get_option('labtechco_theme_options');
				
				echo '<div class="ts-search-results-contents">';
				
				
				// ROW wrapper - start
				if( get_post_type() == 'page' ){
					echo '<div class="ts-search-results-pages-w"><ul class="ts-list ts-list-style-icon ts-list-icon-color-skincolor ts- ts-icon-skincolor ts-list-textsize- ts-list-icon-library-fontawesome">';
					
				} else if( get_post_type()=='product' && function_exists('woocommerce_product_loop_start') ){
					echo '<div class="woocommerce">';
					woocommerce_product_loop_start('col-sm-4');
				} else {
					echo '<div class="row multi-columns-row">';
				}
				
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					
					
					
					switch( get_post_type() ){
						
						case 'post':  // post
							echo '<div class="col-sm-12">';
							get_template_part('theme-parts/post','classic-view');
							echo '</div>';
							break;
							
						case 'page':  // page
							echo '<li><i class="ts-labtechco-icon-angle-right"></i> &nbsp; <span class="ts-list-li-content"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></span></li>';
							break;
							
						case 'ts-portfolio':  // Portfolio
							$view = ( !empty($labtechco_theme_options['pfcat_view']) ) ? $labtechco_theme_options['pfcat_view'] : 'style-1' ;
							
							echo '<div class="col-sm-4">';
							get_template_part( 'theme-parts/portfoliobox/portfoliobox', $view );
							echo '</div>';
							break;
							
						case 'ts-team-member':  // Portfolio
							$view = ( !empty($labtechco_theme_options['teamcat_view']) ) ? $labtechco_theme_options['teamcat_view'] : 'style-1' ;
							
							echo '<div class="col-sm-4">';
							get_template_part( 'theme-parts/teambox/teambox', 'style-1' );
							echo '</div>';
							break;
							
						default:
							if( function_exists('wc_get_template_part') && get_post_type() == 'product' ){
								// WooCommerce special view
								wc_get_template_part( 'content', 'product' );
								
							} else {
								echo '<div class="col-sm-4">';
								get_template_part( 'theme-parts/othercpt', 'search' );
								echo '</div>';
								break;
								
							}

					}
			
					

				endwhile; // End of the loop.
				
				// ROW wrapper - end
				if( get_post_type() == 'page' ){
					echo '</ul></div>';
				} else if( get_post_type()=='product' && function_exists('woocommerce_product_loop_end') ){
					woocommerce_product_loop_end();
					echo '</div>';
				} else {
					echo '</div>';
				}
				
				
				
				
				
				
				echo '</div><!-- .ts-search-results-contents -->';
				
				echo themestek_pagination();

			else : ?>
				
				<div class="ts-search-results-no-content">
					
					<?php themestek_nothing_found_message(); ?>
					
				</div>
				
				<?php
			endif;
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
