<?php if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('themestek-main-menu') ) : ?>

	<!-- Max Mega Menu is enabled so we are not showing our toggle menu -->
	
<?php else: ?>



<?php endif; ?>

<?php wp_nav_menu( array( 'theme_location' => 'themestek-main-menu', 'menu_class' => 'nav-menu', 'container_class' => 'nav-menu' ) ); ?>

<button id="menu-toggle" class="menu-toggle">
	<span class="ts-hide"><?php esc_attr_e( 'Toggle menu', 'labtechco' ); ?></span><i class="ts-labtechco-icon-menu"></i>
</button>
