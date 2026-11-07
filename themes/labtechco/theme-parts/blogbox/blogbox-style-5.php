<article class="themestek-box themestek-box-blog ts-blogbox-style-5 themestek-blogbox-format-<?php echo get_post_format() ?> <?php echo themestek_sanitize_html_classes(themestek_post_class()); ?> themestek-box-view-style5 themestek-blog-box-view-left-image themestek-blog-box-lr">
	<div class="post-item clearfix">
        <div class="col-xs-12 col-sm-6 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<?php echo themestek_get_featured_media( '', 'themestek-img-770x770' ); // Featured content ?>
		</div>
        <div class="themestek-box-content col-xs-12 col-sm-6">
			<div class="themestek-box-content-inner">
				<div class="themestek-meta-date-wrapper">					
					<i class="ts-labtechco-icon-clock"></i> <span><?php echo get_the_date( 'M d, Y' ); ?></span>
				</div>
				<div class="themestek-blogbox-footer-commnent">
					<span class="ts-blogbox-comment-w">
						<a title="<?php echo esc_attr__( 'Comments', 'labtechco' ) ?>" href="<?php echo get_permalink();?>">
							<?php 
							$num_comments    = get_comments_number();			
							$comments_code = '';
							if( !is_sticky() && comments_open() && ($num_comments>=0) ){
								?>
								<i class="themifyicon ti-comment"></i>
								<span class="comments"><?php echo esc_attr($num_comments); ?> Comments </span>
								<?php
							 } ?>
						</a>
					</span>
				</div>
				<?php echo labtechco_entry_meta('blogbox') ?>
				<?php echo themestek_box_title(); ?>
				<div class="ts-bottom-meta-wrapper clearfix">	
					<div class="pull-left">
						<?php echo themestek_blogbox_readmore(); ?>
					</div>	
				</div>
        </div>
	</div>
</div>

</article>
