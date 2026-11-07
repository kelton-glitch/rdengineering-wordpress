<article class="themestek-box themestek-box-service ts-servicebox-style-11">
	<div class="themestek-post-item">
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  
				<div class="ts-ihbox-icon ts-large-icon">
						<?php themestek_service_icon(); ?>
				</div>
				<div class="themestek-pf-box-title">
					<div class="themestek-box-category"><?php echo themestek_service_category(true); ?></div>
					<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>					
				</div>
				<div class="themestek-box-link"> 
					<a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr__('READ MORE', 'labtechco' ); ?>">
					<i class="ts-labtechco-icon-arrow-right"></i>
				</a>
				</div> 
			</div>		
		</div>
		<?php echo themestek_get_featured_media('', 'themestek-img-800x400'); ?>
	</div>
</article>