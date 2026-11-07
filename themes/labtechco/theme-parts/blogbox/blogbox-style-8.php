<article class="themestek-box themestek-box-blog ts-blogbox-style-8 ts-hover-style-3 themestek-box-style8 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?>">
	<div class="post-item">
		<?php // You can use like this too - themestek_featured_media(); ?>

		<div class="ts-blog-image-with-meta">
			<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x650' ) ); // Featured content ?>
		</div>
		<div class="themestek-box-content">
			<?php
			// Category list
			$categories_list = get_the_category_list( ' ' );
			if ( !empty($categories_list) ) { ?>
				<span class="ts-meta-line cat-links"><span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ); ?> </span><?php echo themestek_wp_kses($categories_list); ?></span>
			<?php } ?>
			<div class="themestek-box-title">
				<?php echo themestek_box_title(); ?>
			 </div>
			 <?php echo labtechco_entry_meta('blogbox') ?>
		</div>
	</div>
</article>