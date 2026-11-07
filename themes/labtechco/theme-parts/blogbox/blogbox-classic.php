<article <?php themestek_sanitize_html_classes( post_class( themestek_blog_classic_extra_class('common-box-shadow') )); ?>>

	
	<?php
	// Date
	$date_format =  get_option('date_format'); ?>
	<span class="ts-meta-line posted-on ts-date-box">
		
		<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Posted on', 'Used before publish date.', 'labtechco' ); ?> </span>
		<a title="<?php echo esc_attr__( 'Posted on date', 'labtechco' ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<span class="ts-date">08</span>
			<span class="ts-month">AUG</span>
		</a>
	</span>
    <?php echo themestek_get_featured_media(); // Featured content ?>
    
	<header class="entry-header">
		
		<?php if( !is_single() ) : ?>
			<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
				
				
				<!-- Blog classic meta Start -->
				<div class="ts-featured-meta-wrapper ts-featured-overlay">
						
			
					<?php
					// Tag
					$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
					if ( !empty($tags_list) ) {
						?>
						<span class="ts-meta-line tags-links">
							<i class="ts-labtechco-icon-tag"></i>
							<span class="screen-reader-text ts-hide">
								<?php echo esc_attr_x( 'Tags', 'Used before tag names.', 'labtechco' ); ?>
							</span>
							<?php echo themestek_wp_kses($tags_list); ?>
						</span>
					<?php } ?>
					
					
				</div>
				<!-- Blog classic meta End -->
			  
			<?php the_title( sprintf( '<h2 class="entry-title"><a title="'. the_title(); .'" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				
			<?php endif; ?>
		<?php endif; ?>
	</header><!-- .entry-header -->



	
	
	<div class="ts-blog-classic-box-content">

		
		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">
				<?php
				the_content( '' );  // content without Read More button 
				?>
				
				
				<?php
				$share    = themestek_social_share_box('post');
				$readmore = themestek_blogbox_readmore();
				
				if( !empty($share) || !empty($readmore) ) :
				?>
				
					<div class="ts-blog-classic-footer">
						<div class="themestek-blog-classic-footer-readmore">
							<?php echo themestek_wp_kses($readmore); ?>
						</div>
						<div class="ts-featured-meta-wrapper ts-featured-overlay">
							<span class="ts-meta-line byline">
								<a title="<?php echo esc_attr__( 'Comments', 'labtechco' ) ?>" href="<?php echo get_permalink();?>">
									<?php 
									$num_comments    = get_comments_number();			
									$comments_code = '';
									if( !is_sticky() && comments_open() && ($num_comments>=0) ){
										$comments_code .= '<i class="ts-labtechco-icon-comment-1"></i><span class="comments">';
										echo $comments_code .= $num_comments . ' Comments';
										$comments_code .= '</span>';
										 }?>
								</a>
							</span>
							<?php
								// Author
							$author	= '<a title="'.get_the_author().'" class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="ts-labtechco-icon-user"></i> '.get_the_author().'</a>';
								?>
								<span class="ts-meta-line byline">									
									<span class="author vcard">
										<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Author', 'Used before post author name.', 'labtechco' ); ?> </span>
										<?php echo themestek_wp_kses($author); ?>
									</span>
								</span>	
						</div>

						<?php echo themestek_wp_kses($share); ?>
					</div>
				
				<?php endif; ?>
				
				<?php
				// pagination if any
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'labtechco' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>
			
	</div>
		
</article>
