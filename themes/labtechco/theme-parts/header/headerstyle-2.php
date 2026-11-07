<header id="masthead" class="<?php echo themestek_header_style_class(); ?> <?php echo sanitize_html_class(themestek_sticky_header_class()); ?> themestek-infostack-style">
	<div class="ts-header-block <?php echo themestek_headerclass(); ?>">
		<?php get_template_part('theme-parts/header/header','search-form'); ?>
		<?php get_template_part('theme-parts/header/header','topbar'); ?>
		<div class="themestek-sticky-header"><div class="container"></div></div>
		<?php get_template_part('theme-parts/header/header','main-infostack'); ?>
		<?php get_template_part('theme-parts/header/header','titlebar'); ?>
		<?php get_template_part('theme-parts/header/header','slider'); ?>
	</div>
</header><!-- .site-header -->