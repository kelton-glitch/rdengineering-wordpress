<?php
$titlebar_content = themestek_titlebar_content();
if( themestek_titlebar_show() ) : ?>

	<?php if( !empty($titlebar_content) ){ ?>
	
		<div class="ts-titlebar-wrapper ts-bg <?php echo themestek_sanitize_html_classes(themestek_titlebar_classes()); ?>">
			<div class="ts-titlebar-wrapper-bg-layer ts-bg-layer"></div>
			<div class="ts-titlebar entry-header">
				<div class="ts-titlebar-inner-wrapper">
					<div class="ts-titlebar-main">
						<div class="container">
							<div class="ts-titlebar-main-inner">
								<?php echo themestek_wp_kses( $titlebar_content, 'titlebar' ); ?>
							</div>
						</div>
					</div><!-- .ts-titlebar-main -->
				</div><!-- .ts-titlebar-inner-wrapper -->
			</div><!-- .ts-titlebar -->
		</div><!-- .ts-titlebar-wrapper -->
		
	<?php } else { ?>
	
		<hr class="ts-titlebar-border" />
	
	<?php } ?>

<?php endif;  // themestek_titlebar_show() ?>







