<article class="themestek-box themestek-box-service ts-servicebox-style-2 themestek-box-view-overlay ts-hover-style-3">
	<div class="themestek-post-item">

		<div class="themestek-serviceimagebox">
			<?php echo themestek_get_featured_media('', 'themestek-img-800x715'); ?>
			<div class="themestek-box-content themestek-overlay">
				<div class="themestek-box-content-inner">
					<div class="themestek-icon-box themestek-media-link">
						<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'View Details', 'labtechco' ); ?>" > <?php esc_attr_e('View Details', 'labtechco'); ?></a>
					</div>
	            </div>
			</div>
		</div>

		<div class="themestek-pf-box-title">
			<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>					
		</div>	
	</div>
</article>