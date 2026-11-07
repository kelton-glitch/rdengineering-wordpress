<article class="themestek-box themestek-box-portfolio ts-portfoliobox-style-1 ts-hover-style-2">
	<div class="themestek-post-item">
		<?php echo themestek_featured_image('themestek-img-800x650'); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  
				
				<div class="themestek-pf-box-title">
					<div class="themestek-box-category"><?php echo themestek_portfolio_category(true); ?></div>
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