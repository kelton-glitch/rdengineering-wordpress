<article class="themestek-box themestek-box-blog ts-blogbox-style-3 themestek-box-style3 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?>">
	<div class="post-item">
		<?php // You can use like this too - themestek_featured_media(); ?>

		<div class="ts-blog-image-with-meta">
			<?php echo themestek_wp_kses( themestek_get_featured_media( '', 'themestek-img-800x700' ) ); // Featured content ?>	
		</div>		
		
		<div class="themestek-box-content">	
			<?php echo labtechco_entry_meta('blogbox') ?>
			<?php echo themestek_box_title(); ?>
			
			<div class="themestek-box-desc">
				<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
			</div>	

			<div class="ts-bottom-meta-wrapper clearfix">	
				<div class="pull-left">
					<?php echo themestek_blogbox_readmore(); ?>
				</div>	
			</div>
		</div>
	</div>
</article>

