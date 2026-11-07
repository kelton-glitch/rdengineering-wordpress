<article class="themestek-box themestek-box-testimonial ts-testimonialbox-style-8">
<div class="themestek-post-item">
	<div class="themestek-box-content">
		<div class="themestek-box-desc">
			<div class="themestek-box-star"><?php echo themestek_testimonial_star_ratings(); ?></div>
			<blockquote class="themestek-testimonial-text"><?php echo themestek_wp_kses( strip_tags( get_the_content('') ) ); ?>
			</blockquote>
		</div>
		<div class="themestek-box-author">
			<div class="themestek-box-img"><?php echo themestek_testimonial_featured_image('thumbnail'); ?></div>
			<div class="themestek-box-author-right">
				<?php echo themestek_testimonial_title(); ?>
			</div>
		</div>
	</div>
</div>
</article>
