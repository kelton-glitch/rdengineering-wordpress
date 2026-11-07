<article class="themestek-box themestek-box-service ts-servicebox-style-12">
	<div class="themestek-post-item">
		<div class="themestek-box-content">
			<div class="themestek-box-content-inner">
				<div class="ts-ihbox-icon ts-large-icon ts-icon-skincolor">
					<?php themestek_service_icon(); ?>
				</div>
				<div class="themestek-pf-box-title">
					<h3><a title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
				<a class="ts-blog-link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><div class="themestek-box-link"><i class="ts-labtechco-icon-up-right-arrow"></i></div></a>
				<?php if( has_excerpt() ){ ?>
					<div class="themestek-box-desc">
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</article>