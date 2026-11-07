<div id="ts-stickable-header-w" class="ts-stickable-header-w ts-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>" >
	<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>">
		<?php $headerstyle = themestek_get_option('headerstyle');?>
		<?php // You can use this function for floating bar buttons - echo themestek_fbar_btn(); ?>
		
		<div class="site-header-main ts-table <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
		<div class="ts-mobile-menu-bg"></div>
		<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_left_text') ) ); ?>
			<div class="site-branding ts-table-cell">
				<?php echo themestek_wp_kses( themestek_site_logo() ); ?>
			</div><!-- .site-branding -->
			<?php
				$overlay_show_social = themestek_get_option('overlay_show_social'); 
				if( shortcode_exists('ts-social-links') && $overlay_show_social==true && $headerstyle=='9' ){
					echo do_shortcode('[ts-social-links]');
				};
			?>
			</div> 	
			<div class="ts-menu-topbararea ts-col-bgcolor-dark <?php echo themestek_sanitize_html_classes(themestek_sticky_header_class()); ?>"> 
				<div class="container">
				<div id="site-header-menu" class="site-header-menu">
					<div class="ts-mobile-menu-bg"></div>
					<nav id="site-navigation" class="main-navigation ts-navbar" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(themestek_get_option('header_height_sticky')); ?>">	 
						<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
						<?php get_template_part('theme-parts/header/header','menu'); ?>
					</nav><!-- .main-navigation -->
				</div><!-- .site-header-menu -->
			</div><!-- .site-header-menu -->
		</div> 
	</div>
</div>


