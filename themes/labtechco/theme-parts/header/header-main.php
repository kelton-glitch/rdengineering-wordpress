<div id="ts-stickable-header-w" class="ts-stickable-header-w ts-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>">
	<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?> <?php echo themestek_sanitize_html_classes(themestek_sticky_header_class()); ?>">
	
		<?php // You can use this function for floating bar buttons - echo themestek_fbar_btn(); ?>
		
		<div class="site-header-main ts-table <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
		
			<div class="site-branding ts-table-cell">
				<?php echo themestek_wp_kses( themestek_site_logo() ); ?>
			</div><!-- .site-branding -->

			<div id="site-header-menu" class="site-header-menu ts-table-cell">
				<div class="ts-mobile-menu-bg"></div>
				<nav id="site-navigation" class="main-navigation ts-navbar" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(themestek_get_option('header_height_sticky')); ?>">	
					<?php $headerstyle = themestek_get_option('headerstyle');
					if( $headerstyle=='4' || $headerstyle=='5' || $headerstyle=='6' || $headerstyle=='10' ){
						echo themestek_header_button(); 
						} 
					$overlay_show_social = themestek_get_option('overlay_show_social');
					$headerstyle = themestek_get_option('headerstyle');
					if( $headerstyle=='3' ){
						echo themestek_headerstyle3_button(); 
					}
					if( shortcode_exists('ts-social-links') && $overlay_show_social==true ){
						if( $headerstyle=='3' || $headerstyle=='7'  || $headerstyle=='10'){
							echo do_shortcode('[ts-social-links]');
						}
					};
					?>
					<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
					<?php get_template_part('theme-parts/header/header','menu'); ?>
				</nav><!-- .main-navigation -->
			</div><!-- .site-header-menu -->
			
		</div><!-- .site-header-main -->
	</div>
</div>


