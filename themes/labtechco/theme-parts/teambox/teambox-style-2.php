<article class="themestek-box themestek-box-team ts-teambox-style-2  ts-hover-style-2">
	<div class="themestek-post-item">
		<?php echo themestek_wp_kses(themestek_featured_image('themestek-img-800x800')); ?>
		<div class="themestek-box-content">
            <div class="themestek-box-content-inner">		  
				<div class="themestek-pf-box-title">
					<?php echo themestek_box_title(); ?>
				</div>
				<div class="themestek-box-team-position">
					<?php echo themestek_get_meta( 'themestek_team_member_details', 'ts_team_info' , 'team_details_line_position' ); ?>
				</div>
				<?php if( has_excerpt() ){ ?>
					<div class="themestek-teambox-short-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
					</div>
				<?php }; ?>		
				<div class="themestek-teambox-social-links">
					<?php echo themestek_box_team_social_links(true); ?>
				</div>
			</div>		
		</div>
	</div>
</article>