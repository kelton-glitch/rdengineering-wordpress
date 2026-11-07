<article class="themestek-box themestek-box-blog ts-blogbox-style-10 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?> themestek-box-view-style10 themestek-blog-box-view-left-image themestek-blog-box-lr">
	<div class="post-item clearfix">
		<div class="themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<?php echo themestek_get_featured_media( '', 'themestek-img-770x770' ); // Featured content ?>
		</div>
		<div class="themestek-box-content">
			<div class="themestek-box-content-inner">
				<?php
				// Category list
				$categories_list = get_the_category_list( ', ' );
				if ( !empty($categories_list) ) { ?>
					<span class="ts-meta-line cat-links"><span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ); ?> </span><?php echo themestek_wp_kses($categories_list); ?></span>
				<?php } ?>
				<?php echo labtechco_entry_meta('blogbox') ?>
				<?php echo themestek_box_title(); ?>
			</div>
		</div>
		<div class="themestek-box-link"> 
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><i class="ts-labtechco-icon-up-right-arrow"></i></a>
		</div>
	</div>
</article>