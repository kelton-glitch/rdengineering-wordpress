<article class="themestek-box themestek-box-service ts-servicebox-style-10">
	<div class="themestek-post-item">
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">			  
				<div class="themestek-pf-box-title">
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
	<div class="ts-ihbox-icon ts-large-icon">
		<?php themestek_service_icon(); ?>
	</div>
</article>