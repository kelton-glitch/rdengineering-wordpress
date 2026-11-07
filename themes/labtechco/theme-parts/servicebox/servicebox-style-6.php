<article class="themestek-box themestek-box-service ts-servicebox-style-6">
	<div class="themestek-post-item">
		<?php echo themestek_get_featured_media('', 'themestek-img-800x700'); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  
				<div class="ts-ihbox-icon ts-large-icon">
						<?php themestek_service_icon(); ?>
				</div>
				<div class="themestek-pf-box-title">
					<div class="themestek-box-category"><?php echo themestek_service_category(true); ?></div>
					<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>					
				</div>

				 <?php if( has_excerpt() ){ ?>
					<div class="themestek-box-desc">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>  
			</div>		
		</div>
	</div>
</article>