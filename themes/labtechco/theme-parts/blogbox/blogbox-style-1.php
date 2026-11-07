<article class="themestek-box themestek-box-blog ts-blogbox-style-1 themestek-box-style1 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?>">
	<div class="post-item">
		<?php // You can use like this too - themestek_featured_media(); ?>

		<div class="ts-blog-image-with-meta">
			<?php echo themestek_get_post_format_icon(); // Post format icon ?>
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
				<div class="themestek-blogbox-footer-commnent pull-right">
					<span class="ts-blogbox-comment-w">
						<a title="<?php echo esc_attr__( 'Comments', 'labtechco' )?>" href="<?php echo get_permalink();?>">
							<?php 
							$num_comments    = get_comments_number();			
							$comments_code = '';
							if( !is_sticky() && comments_open() && ($num_comments>=0) ){
								?>
								<i class="themifyicon ti-comment"></i>
								<span class="comments"><?php echo esc_attr($num_comments); ?></span>
								<?php
							 } ?>
						</a>
					</span>
				</div>
				
			</div>

		</div>

	</div>
</article>

