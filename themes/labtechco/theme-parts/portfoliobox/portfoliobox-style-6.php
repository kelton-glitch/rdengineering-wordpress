<article class="themestek-box themestek-box-portfolio ts-portfoliobox-style-6 ts-hover-style-1">
	<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title(); ?>">
		<div class="themestek-post-item">
			<?php echo themestek_featured_image('themestek-img-800x715'); ?>
			<div class="themestek-box-content">
				<div class="themestek-box-content-inner">			  
					<div class="themestek-pf-box-title">
						<div class="themestek-box-category"><?php echo themestek_portfolio_category(true); ?></div>
						<h3><a title="<?php echo the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
					<?php if( has_excerpt() ){ ?>
						<div class="themestek-box-desc">
							<?php the_excerpt(); ?>
						</div>
					<?php } ?>  
					<div class="themestek-box-link"><a href="<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'READ MORE', 'labtechco'); ?>"><?php esc_attr_e('READ MORE', 'labtechco'); ?></a></div> 
				</div>		
			</div>
		</div>
	</a>
</article>
