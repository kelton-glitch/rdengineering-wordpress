<article class="themestek-box themestek-box-blog ts-blogbox-style-2 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?> themestek-box-view-style2 themestek-blog-box-view-left-image themestek-blog-box-lr">
	<div class="post-item clearfix">
        <div class="col-md-4 col-sm-4 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<?php echo themestek_get_featured_media( '', 'themestek-img-800x740' ); // Featured content ?>
		</div>
        <div class="themestek-box-content col-md-8 col-sm-8">
			<div class="themestek-box-content-inner">
				<?php echo themestek_box_title(); ?>
				<?php echo labtechco_entry_meta('blogbox') ?>
				
				<div class="themestek-box-desc">
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
				</div>
            </div>
        </div>
	</div>
</article>
