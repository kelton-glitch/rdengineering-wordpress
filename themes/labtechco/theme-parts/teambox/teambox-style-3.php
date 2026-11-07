<article class="themestek-box themestek-box-team ts-teambox-style-3 ts-hover-style-2 themestek-box-team-style-3">
	<div class="themestek-post-item">
		<div class="col-md-6 themestek-box-img-left">
			<?php // You can use like this too - themestek_featured_media(); ?>
			<div class="ts-featured-outer-wrapper ts-post-featured-outer-wrapper">
				<?php echo themestek_wp_kses(themestek_featured_image('themestek-img-600x600')); ?>
			</div>
		</div>
        <div class="themestek-box-content col-md-6">
			<div class="themestek-box-content-inner">
				<?php echo themestek_box_title(); ?>
				<div class="themestek-box-team-position">
					<?php echo themestek_get_meta( 'themestek_team_member_details', 'ts_team_info' , 'team_details_line_position' ); ?>
				</div>	
				<?php if( has_excerpt() ){ ?>
					<div class="themestek-teambox-short-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
					</div>
				<?php }; ?>	
				<div class="themestek-teambox-email">
					<?php $email = themestek_get_meta( 'themestek_team_member_details', 'ts_team_info' , 'team_details_line_email' );
					if( !empty($email) ){ ?>
						<a title="<?php echo esc_attr($email); ?>" href="mailto:<?php echo trim(esc_attr($email)); ?>"><i class="fa fa-envelope"></i> <?php echo esc_attr($email); ?></a>
					<?php } ?>
				</div>
				<div class="themestek-teambox-social-links">
						<?php echo themestek_box_team_social_links(); ?>
				</div>
            </div>
        </div>
	</div>
</article>
 
