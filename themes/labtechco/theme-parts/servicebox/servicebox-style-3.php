<article class="themestek-box themestek-box-service ts-servicebox-style-3">
	<div class="themestek-post-item">
		<?php echo themestek_get_featured_media('', 'themestek-img-800x650'); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">
				<div class="themestek-pf-box-title">
					<div class="ts-ihbox-icon ts-large-icon ts-icon-skincolor">
						<?php themestek_service_icon(); ?>
					</div>
					<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php if( has_excerpt() ) : ?>
					<div class="themestek-service-content"><?php the_excerpt(); ?></div>
					<?php endif; ?>
									
				</div> 
			</div>		
		</div>
	</div>
</article>