<article class="themestek-box themestek-box-service ts-servicebox-style-4">
	<div class="themestek-post-item">
		<?php echo themestek_get_featured_media('', 'themestek-img-600x720'); ?>
		<div class="themestek-box-content">			
            <div class="themestek-box-content-inner">
            	<div class="ts-ihbox-icon ts-large-icon ts-icon-skincolor">
						<?php themestek_service_icon(); ?>
				</div>
				<div class="themestek-pf-box-title">
					<div class="themestek-box-category"><?php echo themestek_service_category(true); ?></div>
					<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>						
				</div>
				<div class="themestek-box-link"><a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'READ MORE', 'labtechco' ) ?>"><?php esc_attr_e('READ MORE', 'labtechco'); ?></a></div> 
			</div>		
		</div>
	</div>
</article>