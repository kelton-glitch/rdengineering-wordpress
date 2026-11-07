<div id="site-header" class="site-header <?php echo themestek_sanitize_html_classes(themestek_header_class()); ?>">
<?php $headerstyle = themestek_get_option('headerstyle');?>
	<div class="site-header-main ts-table">
	
		<div class="ts-header-top-wrapper <?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?>">
				<div class="site-branding">
					<?php echo themestek_site_logo(); ?>
				</div><!-- .site-branding -->	
				<div class="ts-infostack-right-content">
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_left_text') ) ); ?>
						</div>
					</div>
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_right_text') ) ); ?>
						</div> 
					</div> 
					<div class="info-widget">
						<div class="info-widget-inner">
							<?php echo themestek_wp_kses( do_shortcode( themestek_get_option('infostack_phone_text') ) ); ?>
						</div> 
					</div> 
					<?php
						if( $headerstyle=='8' ){
							echo themestek_header_button(); 
						} 
					?>
					
				</div>
		</div><!-- .ts-header-top-wrapper -->
		
		<div id="ts-stickable-header-w" class="ts-stickable-header-w ts-bgcolor-<?php echo themestek_get_option('header_bg_color'); ?>" >
			<div id="site-header-menu" class="site-header-menu container">
				<div class="site-header-menu-inner <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
					<div class="site-header-menu-middle <?php echo themestek_sanitize_html_classes(themestek_header_menu_class()); ?>">
						<div class="<?php echo themestek_sanitize_html_classes(themestek_header_container_class()); ?> ">
						
							<div class="ts-mobile-menu-bg"></div>
							
							<nav id="site-navigation" class="main-navigation ts-navbar" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(themestek_get_option('header_height_sticky')); ?>">		                        
								<?php get_template_part('theme-parts/header/header','menu'); ?>
							</nav><!-- .main-navigation -->
						
							<div class="ts-phone">
								<?php get_template_part('theme-parts/header/header','search-form'); ?>
								<?php echo themestek_wp_kses( themestek_header_links(), 'header_links' ); ?>
								<?php
									if( $headerstyle=='2' ){
										echo themestek_header_button(); 
									}  
								?> 
								
								<?php 
									if( $headerstyle=='8' ){
										echo do_shortcode('[ts-social-links]');
									}
								?> 								
							</div>
						</div>
					</div>
				</div>
		<?php // You can use like this too - themestek_fbar_btn(); ?>
			</div><!-- .site-header-menu -->
		</div>
		
	</div><!-- .site-header-main -->
</div>


