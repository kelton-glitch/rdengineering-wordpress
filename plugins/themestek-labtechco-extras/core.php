<?php

if( !function_exists('themestek_logo') ){
function themestek_logo(){
	$logotype       = themestek_get_option('logotype');
	$logoimg        = themestek_get_option('logoimg');
	$logoimg_sticky = themestek_get_option('logoimg_sticky');
	
	$return = '<span class="ts-sc-logo ts-sc-logo-type-' . sanitize_html_class($logotype) . '">';
	if( $logotype=='image' ){
		if( isset($logoimg) && is_array($logoimg) ){
			
			// standard logo
			if( isset($logoimg['full-url']) && trim($logoimg['full-url'])!='' ){
				$image = $logoimg['full-url'];
				$return .= '<img class="themestek-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src=" ' . esc_url($logoimg['full-url']) . '">';
			
			} else if( isset($logoimg['thumb-url']) && trim($logoimg['thumb-url'])!='' ){
				$image = $logoimg['thumb-url'];
				$return .= '<img class="themestek-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg['thumb-url']) . '">';

			} else if( isset($logoimg['id']) && trim($logoimg['id'])!='' ){
				$image   = wp_get_attachment_image_src( $logoimg['id'], 'full' );
				$return .= '<img class="themestek-logo-img standardlogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_attr($image[0]) . '" width="' . esc_attr($image[1]) . '" height="' . esc_attr($image[2]) . '">';
				
				
			}
			
			
			// stikcy logo
			if( isset($logoimg_sticky) && is_array($logoimg_sticky) ){
				
				if( isset($logoimg_sticky['full-url']) && trim($logoimg_sticky['full-url'])!='' ){
					$sticky_image   = $logoimg_sticky['full-url'];
					$return .= '<img class="themestek-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg_sticky['full-url']) . '">';
				
				} else if( isset($logoimg_sticky['thumb-url']) && trim($logoimg_sticky['thumb-url'])!='' ){
					$sticky_image   = $logoimg_sticky['thumb-url'];
					$return .= '<img class="themestek-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($logoimg_sticky['thumb-url']) . '">';
				
				} else if( isset($logoimg_sticky['id']) && trim($logoimg_sticky['id'])!='' ){
					$sticky_image   = wp_get_attachment_image_src( $logoimg_sticky['id'], 'full' );
					$return .= '<img class="themestek-logo-img stickylogo" alt="' . esc_attr(get_bloginfo( 'name' )) . '" src="' . esc_url($sticky_image[0]) . '" width="' . esc_attr($sticky_image[1]) . '" height="' . esc_attr($image[2]) . '">';
					
				}
				
			}
			
			
		}
	} else {
		
		$return = themestek_get_option('logotext');
	}
	$return .= '</span>';
	
	return $return;
}
}



/**
 *  Social Share links creations
 */
if ( !function_exists( 'themestek_blog_classic_extra_class' ) ){
function themestek_blog_classic_extra_class(){
	$return = 'post themestek-box-blog-classic themestek-common-box-shadow themestek-blogbox-format-'.get_post_format();
	
	$post_images = get_post_meta( get_the_ID(), '_themestek_metabox_gallery', true );
	$post_images = ( isset($post_images['gallery_images']) ) ? $post_images['gallery_images'] : '' ;
	
	if( get_post_format() == 'gallery' ){
		if( empty($post_images) ){
			$return .= ' ts-no-featured-content';
		}
	} else {
		
		if( !has_post_thumbnail() ){
			$return .= ' ts-no-featured-content';
		}
	
	}
	
	
	
	
	return $return;
	
}
}






/*******
 *  Social Share links creations
 */
if ( !function_exists( 'themestek_social_share_links' ) ){
function themestek_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);
	
	if( !empty($post_type) ){
		
		$post_type       = esc_attr($post_type);
		$social_services = themestek_get_option( $post_type.'_social_share_services' );
		$return          = '';
		
		if( !empty( $social_services ) && is_array( $social_services ) ){
			foreach( $social_services as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="ts-social-share ts-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TSSocialWindow=window.open(\''. esc_url($link) .'\',\'TSSocialWindow\',width=600,height=100); return false;"><i class="ts-labtechco-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="ts-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}






/**
 *  List of Social services that used for Social Links section
 */
if( !function_exists('ts_shared_social_list') ){
function ts_shared_social_list(){
	/**
	 *  'social_id' => array('social_name')
	 *  'social_name' can also be used for icon class
	 */
	$sociallist = array(
		'twitter'      => 'Twitter',
		'youtube'      => 'YouTube',
		'flickr'       => 'Flickr',
		'facebook'     => 'Facebook',
		'linkedin'     => 'LinkedIn',
		'gplus'        => 'Google+',
		'yelp'         => 'Yelp',
		'dribbble'     => 'Dribbble',
		'pinterest'    => 'Pinterest',
		'podcast'      => 'Podcast',
		'instagram'    => 'Instagram',
		'xing'         => 'Xing',
		'vimeo'        => 'Vimeo',
		'vk'           => 'VK',
		'houzz'        => 'Houzz',
		'issuu'        => 'Issuu',
		'google-drive' => 'Google Drive',
	);
	
	return $sociallist;
}
}




/**
 *  List of Social services that used for Social Links section
 */
if( !function_exists('themestek_a_color') ){
function themestek_a_color(){
	$skincolor  = themestek_get_option('skincolor');
	$link_color = themestek_get_option('link-color');
	
	// default
	$normal_color = '#202020';
	$hover_color  = $skincolor;
	
	if( $link_color=='darkhover' ){
		$normal_color = $skincolor;
		$hover_color  = '#202020';
		
	} else if( $link_color=='custom' ){
		$normal_color = themestek_get_option('link-color-regular');
		$hover_color  = themestek_get_option('link-color-hover');
		
	}
	?>

	a{color:<?php echo esc_attr($normal_color); ?>;}
	a:hover{color:<?php echo esc_attr($hover_color); ?>;}
	
	<?php
}
}




/**
 *  Add HTTP if not found in URL
 */
if( !function_exists('themestek_vc_get_bg_css_only') ){
function themestek_vc_get_bg_css_only($css, $nobg='') {
	
	$return = '';
	
	if( !empty($css) ){
		$css_array = explode( '{', $css );
		$css_selector = $css_array[0];
		$css_array = $css_array[1];
		$css_array = str_replace( '}', '', $css_array );
		$css_array = trim($css_array);
		$css_array = explode( ';', $css_array );
		
		foreach( $css_array as $css_rule ){
			if ( substr( $css_rule, 0, 10 ) == 'background' ) {
				$return .= $css_rule . ';';
			}
		}
	}
	
	// no bg
	if( $nobg=='nobg' && !empty($return) ){
		$return .= 'background-image:none !important;';
	}
	
	if( !empty($css_selector) && !empty($return) ){
		$return = $css_selector . '{' . $return . '}' ;
	}
	
	return $return;
	
}
}






/**
 *  Add HTTP if not found in URL
 */
if( !function_exists('themestek_addhttp') ){
function themestek_addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
}



/**
 *  Previous/next page navigation.
 */
if( !function_exists('themestek_pagination') ){
function themestek_pagination( $wp_query_data=false ){
	
	if( $wp_query_data==false ){
		global $wp_query;
	} else {
		$wp_query = $wp_query_data;
	}
	
	$return  = '';
	$return .= themestek_wp_kses('<div class="clearfix"></div>');
	
	$big     = 999999999; // need an unlikely integer
	
	// Array to check if pagination data exists
	$paginateLinks = paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var('paged') ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'array',
		'prev_text' => '<i class="ts-labtechco-icon-arrow-left"></i> <span class="ts-hide ts-pagination-text ts-pagination-text-prev">' . esc_attr__( 'Previous page', 'labtechco' ) . '</span>',
		'next_text' => '<span class="ts-hide ts-pagination-text ts-pagination-text-next">' . esc_attr__( 'Next page', 'labtechco' ) . '</span> <i class="ts-labtechco-icon-arrow-right"></i>',
	) );
	
	
	if( $paginateLinks!=NULL ){
		$big = 999999999; // need an unlikely integer
		$return .= '<div class="themestek-pagination">';
		$return .= paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => '<i class="ts-labtechco-icon-arrow-left"></i> <span class="ts-hide ts-pagination-text ts-pagination-text-prev">' . esc_attr__( 'Previous page', 'labtechco' ) . '</span>',
			'next_text' => '<span class="ts-hide ts-pagination-text ts-pagination-text-next">' . esc_attr__( 'Next page', 'labtechco' ) . '</span> <i class="ts-labtechco-icon-arrow-right"></i>',
		) );
		$return .= '</div><!-- .themestek-pagination -->';
	}
	
	
	
	return $return;
}
}




/**
 *   Get theme options. If value is not set than it will fetch default value
 */
if( !function_exists('themestek_get_option') ){
function themestek_get_option( $option, $inner_option='' ){
	
	global $labtechco_theme_options;
	if( function_exists('themestek_single_skin_color') ){
		themestek_single_skin_color(); // applying skin color if set in single page.
	}
	
	
	if( !is_array($labtechco_theme_options) ){
		
		if( is_multisite() ){
			$labtechco_theme_options = get_site_option('labtechco_theme_options');
		} else {
			$labtechco_theme_options = get_option('labtechco_theme_options');
		}
		
	}
	
	
	$return = '';
	
	if( isset($labtechco_theme_options[$option]) ){
		$return = $labtechco_theme_options[$option];
	} else {
		if( file_exists(get_template_directory() . '/cs-framework-override/config/framework-options.php') ){
			include( get_template_directory() . '/cs-framework-override/config/framework-options.php' );
		}
		
		if( isset($ts_framework_options) && is_array($ts_framework_options) && count($ts_framework_options)>0 ){
			
			foreach( $ts_framework_options as $fields ){
				
				if( isset($fields['sections']) && is_array($fields['sections']) && count($fields['sections'])>0 ){
					foreach( $fields['sections'] as $section ){
						foreach( $section['fields'] as $field ){
							if( !empty($field['id']) && $field['id'] == $option && isset($field['default']) ){
								$return = $field['default'];
							}
						}
					}
				}
				
				if( isset($fields['fields']) && is_array($fields['fields']) && count($fields['fields'])>0 ){
					foreach( $fields['fields'] as $field ){
						if( !empty($field['id']) && $field['id'] == $option && isset($field['default']) ){
							$return = $field['default'];
						}
					}
				}
				
			}
		}
	}
	
	// if required inner option
	if( !empty($inner_option) ){
		if( isset($return[$inner_option]) ){
			$return = $return[$inner_option];
		}
	}
	
	return $return;
	
}
}




/**
 *  Get all registed sidebars. This will also return custom sidebars too.
 */
if( !function_exists('themestek_get_all_registered_sidebars') ){
function themestek_get_all_registered_sidebars(){
	global $wp_registered_sidebars;
	$return = array( '' => esc_attr__('Default', 'labtechco') );
	foreach( $wp_registered_sidebars as $sidebar_id=>$sidebar_info ){
		$return[$sidebar_id] = $sidebar_info['name'];
	}
	return $return;
}
}



/**
 *  Convert VC options to list of array with default values
 */
if( !function_exists('ts_create_options_list') ){
function ts_create_options_list( $optionslist=array() ){
	$options_list = array();
	
	if( is_array($optionslist) && count($optionslist)>0 ){
		foreach( $optionslist as $options ){
			
			if( $options['param_name']!='content' ){
				$std = ( !empty($options['std']) ) ? trim($options['std']) : '' ;
				$std = ( empty($std) && !empty($options['value']) && !is_array($options['value']) ) ? trim($options['value']) : $std ;
				
				// if type == dropdown   than fetch first option as std value
				if( !empty($options['type']) && $options['type']=='dropdown' && empty($options['std']) ){
					$std = $options['value'][key($options['value'])];
				}
				
				// if type == iconpicker   than fetch value as default std value
				if( !empty($options['type']) && $options['type']=='themestek_iconpicker' ){
					$std = $options['value'];
				}
				
				
				$options_list[$options['param_name']] = $std;
			}
		}
	}
	return $options_list;
}
}





/**
 * Function to prepare DATA tag values
 */
if( !function_exists('ts_carousel_data_html') ){
function ts_carousel_data_html( $allVar ){
	$return = '';
	
	if( $allVar['boxview'] == 'carousel' || $allVar['boxview'] == 'slickview' || $allVar['boxview'] == 'slickview-leftimg' || $allVar['boxview'] == 'slickview-bottomimg'){
		
		foreach( $allVar as $key=>$value ){
			$var = substr($key, 0 , 9 );
			if( $var=='carousel_' ){
				$datatitle = str_replace('carousel_','data-ts-',$key);
				$return .= ' '.$datatitle.'="'.$value.'"';
			}
		}
	}
	return $return;
}
}







/**
 *  Heading in our custom element like Blogbox, Portfoliobox etc.
 */
if( !function_exists('ts_vc_element_heading') ){
function ts_vc_element_heading( $allVar ){
	
	$return = '';
	
	$ctaOptions = array(
		'h2',
		'h2_link',
		'h2_use_theme_fonts',
		'use_custom_fonts_h2',
		'h2_font_container',
		'h2_google_fonts',
		'h2_el_class',
		'h4',
		'h4_link',
		'h4_use_theme_fonts',
		'use_custom_fonts_h4',
		'h4_font_container',
		'h4_google_fonts',
		'h4_el_class',
		'txt_align',
		'shape',
		'style',
		'custom_background',
		'custom_text',
		'color',
		'add_button',
		'reverse_heading',
		'seperator',
		//'heading_style',
	);
	
	

	if( !empty($allVar['h2']) ) {
		$return .= '<div class="themestek-box-heading-wrapper ts-element-align-'.$allVar['txt_align'].'">';
		
		if( !isset($allVar['content']) ){
			$allVar['content'] = '';
		}
		$allVar['style'] = 'transparent';
		// Preparing Heading Shortcode
		$ctaShortcode = '[ts-heading ';
		foreach( $ctaOptions as $option ){
			if( isset($allVar[$option]) ){
				$ctaShortcode .= $option.'="'.$allVar[$option].'" ';
			}
		}
		if( isset($allVar['add_icon_new']) ){
			$ctaShortcode .= 'add_icon="'.$allVar['add_icon_new'].'" ';
		}
	
		$ctaShortcode .= 'el_width="100%" css_animation=""]'.$allVar['content'].'[/ts-heading]';
		$return .= do_shortcode($ctaShortcode);

		$return .= '</div> <!-- .ts-element-heading-wrapper container --> ';
		
	}
	
	return $return;

}
}






if( !function_exists('themestek_hex2rgb') ){
function themestek_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb); // returns the rgb values separated by commas
}
}





if( !function_exists('ts_adjustBrightness') ){
function ts_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}
}







/*
 * Function to get count of total sidebar
 */
if( !function_exists('themestek_get_widgets_count') ){
function themestek_get_widgets_count( $sidebar_id ){
	$sidebars_widgets = wp_get_sidebars_widgets();
	if( isset($sidebars_widgets[ $sidebar_id ]) ){
		return (int) count( (array) $sidebars_widgets[ $sidebar_id ] );
	}
}
}


/**
 *  Widget count class
 */
if( !function_exists('themestek_class_for_widgets_count') ){
function themestek_class_for_widgets_count( $count=0 ){
	$return = '';
	if( $count<1 ){ $count = 1; }
	if( $count>4 ){ $count = 4; }
	switch( $count ){
		case 1:
			$return = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$return = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			$return = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case 4:
			$return = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
	}
	return $return;
}
}






/**
 * Custom template tags for LabtechCO
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */

if ( ! function_exists( 'labtechco_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since LabtechCO 1.0
 */
function labtechco_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation">
		<h2 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'labtechco' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_attr__( 'Older Comments', 'labtechco' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr__( 'Newer Comments', 'labtechco' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;




if ( ! function_exists( 'labtechco_entry_meta' ) ) :
/**
 * Prints html with meta information for the categories, tags.
 *
 * @since LabtechCO 1.0
 */
function labtechco_entry_meta( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$social_share = '';
	$metalist     = themestek_get_option( $metafor . '_meta_list' );
	$date_format  = themestek_get_option( $metafor . '_meta_dateformat' );
	$date_format = ( empty($date_format) ) ? get_option('date_format') : $date_format ;
	$cat_link     = themestek_get_option( $metafor . '_meta_catlink' );
	$tag_link     = themestek_get_option( $metafor . '_meta_taglink' );
	$author_link  = themestek_get_option( $metafor . '_meta_authorlink' );
	
	
	if( !empty($metalist['enabled']) && is_array($metalist['enabled']) && count($metalist['enabled'])>0 ){
		
		foreach( $metalist['enabled'] as $meta_id=>$meta_name ){
			
			switch( $meta_id ){
				
				case 'date':
					
					// date format
					if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
						
						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated ts-hide" datetime="%3$s">%4$s</time>';
						}

						$time_string = sprintf( $time_string,
							esc_attr( get_the_date( 'c' ) ),
							get_the_date($date_format),
							esc_attr( get_the_modified_date( 'c' ) ),
							get_the_modified_date($date_format)
						);

						$return .= sprintf( '<span class="ts-meta-line posted-on"><i class="ts-labtechco-icon-clock"></i> <span class="screen-reader-text ts-hide">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
							esc_attr_x( 'Posted on', 'Used before publish date.', 'labtechco' ),
							esc_url( get_permalink() ),
							$time_string
						);
						
					}
					
					break;
					
				
				case 'author':
					
					
					
					if ( 'post' === get_post_type() ) {
						// preparing link
						$author	= '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'.get_the_author().'</a>';
						
						if( $author_link!=true ){
							$author = strip_tags($author);
						}
						
						$return .= sprintf( '<span class="ts-meta-line byline"><i class="ts-labtechco-icon-user"></i> <span class="author vcard"><span class="screen-reader-text ts-hide">%1$s </span>%2$s</span></span>',
							esc_attr_x( 'Author', 'Used before post author name.', 'labtechco' ),
							$author
						);
					}


					break;
					
					
					
				case 'comment':
				
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						$return .= '<span class="ts-meta-line comments-link"><i class="ts-labtechco-icon-comments-smiley"></i> ';
						ob_start();
						comments_popup_link( esc_attr__( 'Leave a comment', 'labtechco' ) );
						$return .= ob_get_contents();
						ob_end_clean();
						$return .=  '</span>';
					}
					
					break;



				case 'cat':
					$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) {
						if( $cat_link!=true ){
							$categories_list = strip_tags($categories_list);
						}
						$return .= sprintf( '<span class="ts-meta-line cat-links"><i class="ts-labtechco-icon-category"></i> <span class="screen-reader-text ts-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ),
							$categories_list
						);
					}
					
					break;
					
				case 'tag':
					$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
					if ( !empty($tags_list) ) {
						if( $tag_link!=true ){
							$tags_list = strip_tags($tags_list);
						}
						$return .= sprintf( '<span class="ts-meta-line tags-links"><i class="ts-labtechco-icon-tag"></i> <span class="screen-reader-text ts-hide" ts-hide>%1$s </span>%2$s</span>',
							esc_attr_x( 'Tags', 'Used before tag names.', 'labtechco' ),
							$tags_list
						);
					}
					
					break;
					
			} // switch
			
		} // foreach
		
	}
	
	
	
	// Social share
	if( $metafor != "blogbox" ){
		$social_share = themestek_social_share_box('post');
	}
	
	// meta details
	if( !empty($return) ){
		$return = '<div class="ts-entry-meta-wrapper"><div class="entry-meta ts-entry-meta ts-entry-meta-' . $metafor . '">' . $return . '</div></div>' ;
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
	
}
endif;








/**
 * Determine whether blog/site has more than one category.
 *
 * @since LabtechCO 1.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
if( ! function_exists('labtechco_categorized_blog') ){
function labtechco_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'labtechco_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'labtechco_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so labtechco_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so labtechco_categorized_blog should return false.
		return false;
	}
}
}







/*
 *  This function will reset the TGM Activation message box to show if user need to update any plugin or not. This function will call after theme version changed.
 */
if( !function_exists('ts_reset_tgm_infobox') ){
function ts_reset_tgm_infobox(){
	update_user_meta( get_current_user_id(), 'tgmpa_dismissed_notice_tgmpa', '0' );
}
}





/**
 *  CSS Minifier
 */
if( !function_exists('themestek_minify_css') ){
function themestek_minify_css( $css ){
	if( !empty($css) ){
		// Remove comments
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		
		// Remove new line charactor
		$css = str_replace(array("\r\n", "\r", "\n", "\t"), '', $css);
		
		// Remove whitespace
		$css = str_replace(array('  ', '   ', '    ', '     ', '      ', '       ', '        ', '         ', '          '), ' ', $css);
		
		// Remove space after colons
		$css = str_replace(': ', ':', $css);
		
		// Remove space near commas
		$css = str_replace(', ', ',', $css);
		$css = str_replace(' ,', ',', $css);

		// Remove space before brackets
		$css = str_replace('{ ', '{', $css);
		$css = str_replace('} ', '}', $css);
		$css = str_replace(' {', '{', $css);
		$css = str_replace(' }', '}', $css);

		// Remove last dot with comma
		$css = str_replace(';}', '}', $css);
		
		// Remove whitespace again
		$css = str_replace(array('  ', '   ', '    ', '     ', '      ', '       ', '        ', '         ', '          '), ' ', $css);
		
		// Remove extra space
		$css = str_replace('; }', ';}', $css);
		
	}
	return $css;
}
}














/**
 *  Get options which has only specific type
 */
if( !function_exists('ts_get_options_type') ){
function ts_get_options_type( $type='themestek_background' ){
	$return = array();
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
	foreach( $ts_framework_options as $options_key => $options_val ){
		// main menu options
		if( !empty($options_val['fields']) ){
			foreach( $options_val['fields'] as $curr_id=>$field ){
				if( !empty($field['type']) && $field['type']==$type && !empty($field['id']) ){
					$output = ( !empty($field['output']) ) ? $field['output'] : '' ;
					$return[$field['id']] = $options_val['fields'][$curr_id];
				}
			}
		}
		// sub menu options
		if( !empty($options_val['sections']) ){
			
			foreach( $options_val['sections'] as $section_id=>$section_val ){
				
				if( !empty($section_val['fields']) ){
					foreach( $section_val['fields'] as $curr_id=>$field ){
						if( !empty($field['type']) && $field['type']==$type && !empty($field['id']) ){
							$output = ( !empty($field['output']) ) ? $field['output'] : '' ;
							$return[$field['id']] = $options_val['sections'][$section_id]['fields'][$curr_id];
						}
					}
				}
				
				
			}
			
		}
		
	}
	return $return;
}
}





/**
 *  The properties that can be set, are: background-color, background-image, background-position, background-size, background-repeat, background-origin, background-clip, and background-attachment.
 */
if( !function_exists('themestek_get_all_background_css') ){
function themestek_get_all_background_css(){
	$return = array();
	
	// Getting all "themestek_background" options 
	$element_ids = ts_get_options_type('themestek_background');
	
	
	foreach( $element_ids as $element_id=>$optionlist ){
		$selector_class = $optionlist['output'];
		// modify thissss
		$element_id_val = themestek_get_option($element_id);
		$return[]       = themestek_get_background_css( $optionlist, $element_id_val );
	}
	
	$return = implode( ' ', $return );
	
	// return data
	return $return;
		
}
}






/**
 *  The properties that can be set, are: background-color, background-image, background-position, background-size, background-repeat, background-origin, background-clip, and background-attachment.
 */
if( !function_exists('themestek_get_background_css') ){
function themestek_get_background_css( $element_array, $values, $exclude=array() ){
	
	$selector = '';
	if( !empty($element_array) && is_array($element_array) && isset($element_array['output']) ){
		$selector = $element_array['output'];
	} else if( !empty($element_array) && is_string($element_array) ){
		$selector = $element_array;
	} 
	
	$return          = array();
	$return_bglayer  = array();
	$rgb_color_layer = '';
	$valid_options   = array(
		'image',
		'color',
		'position',
		'size',
		'repeat',
		'attachment',
	);
	
	
	
	// default values
	$default_options   = array(
		'image'		 => '',
		'imageid'	 => '',
		'color'		 => '',
		'position'	 => '0% 0%',
		'size'		 => 'auto',
		'repeat'	 => 'repeat',
		'attachment' => 'scroll',
	);
	
	// Merging default values with real values
	foreach( $default_options as $default_key => $default_value ){
		if( !empty($values[$default_key]) ){
			$default_options[$default_key] = $values[$default_key];
		}
	}
	$values = $default_options;
	
	// BG Layer class
	$bg_layer_class = $selector . ' > .ts-bg-layer';
	if( !empty($element_array['bg_layer_class']) ){
		$bg_layer_class = $element_array['bg_layer_class'];
	}
	
	
	
	// color in dropdown
	$dropdown_color = '';
	if( !empty($element_array['color_dropdown_id']) ){
		$dropdown_color = themestek_get_option($element_array['color_dropdown_id']);
	}
	

	
	foreach( $valid_options as $option ){
		
		if( isset($values[$option]) && trim($values[$option])!='' ){
			if( $option=='image' ){
				$return[] = 'background-image:url(\''. $values[$option] .'\')';
			} else if( $option=='color' ){
				
				// setting transparent
				if( $dropdown_color=='transparent' ){ $values[$option]='transparent'; }
				
				
				// background color
				
				if( !in_array('background-color',$exclude) && !in_array($dropdown_color, array('grey','darkgrey','white','skincolor') ) ){
					if( substr($values[$option],0,5)=='rgba(' ){
						$return[]        = 'background-color:'. $values[$option]; // If RGB color
						$rgb_color_layer = 'background-color:'. $values[$option];
					} else {
						$return[] = 'background-color:'. $values[$option];
					}
				}
				
				// bg layer class
				if( !in_array('background-color',$exclude) ){
					$return_bglayer[] = 'background-color:'. $values[$option]; // If RGB color
				}
				
			} else {
				$return[] = 'background-'. $option .':'. $values[$option];
			}
		}
		
	}
	
	
	
	
	
	
	
	
	// Return
	if( count($return)>0 ){
		
		if( $selector=='' ){
			$return = implode( ';', $return ).';';
		} else {
			$return = $selector.'{'.implode( ';', $return ).';}'."\n";
		}
		
		// modify selector to select bg layer too
		if( !in_array('output_bglayer',$exclude) && is_array($return_bglayer) && count($return_bglayer)>0  ){
			if( $selector!='' && !in_array($dropdown_color, array('grey','darkgrey','white','skincolor') ) ){
				$return .= $bg_layer_class . '{'.implode( ';', $return_bglayer ).';}'."\n";
			}
		}
		
	} else {
		$return = '';
	}
	
	// Return data
	return $return;
	
}
}













/**
 *  Generate CSS for all background options
 */
if( !function_exists('themestek_get_all_font_css') ){
function themestek_get_all_font_css(){
	$return = array();
	
	// Getting all "themestek_background" options 
	$element_ids = ts_get_options_type('themestek_typography');
	
	
	foreach( $element_ids as $element_id=>$optionlist ){
		$selector_class = $optionlist['output'];
		$element_id_val = themestek_get_option($element_id);
		$return[] = themestek_get_font_css( $selector_class, $element_id_val );
	}
	
	
	$return = implode( ' ', $return );
	
	// return data
	return $return;
	
}
}





/**
 *  Generate CSS for all font options
 */
if( !function_exists('themestek_get_font_css') ){
function themestek_get_font_css( $selector, $values, $important=false ){
	$return = array();
	$family = '';
	
	$valid_options = array(
		'variant',
		'text-transform',
		'font-size',
		'line-height',
		'letter-spacing',
		'color',
	);
	
	// Main font
	if( !empty($values['family']) ){
		$family = '"'.$values['family'].'"';
	}
	
	// Backup font
	if( !empty($values['backup-family']) ){
		$family .= ', '.$values['backup-family'];
	}
	$return[] = 'font-family:'. $family;
	
	$important = ($important==true) ? ' !important' : '' ;
	
	
	// Loop other font css
	foreach( $valid_options as $option ){
		if( !empty($values[$option]) ){
			
			// Prefix
			$prefix = (
				   $option=='font-size'
				|| $option=='line-height'
				|| $option=='letter-spacing'
			) ? 'px' : '' ;
		
		
			if( $option=='variant' ){
				
				if( $values[$option]=='regular' ){ $values[$option] = '400'; }
				
				if( substr( $values[$option], -6 ) == 'italic' ){
					$return[]			= 'font-style: italic ' . $important;
					$values[$option]	= str_replace('italic','', $values[$option]);
				} else if( substr( $values[$option], -4 ) == 'bold' ){
					$return[]			= 'font-weight: bold ' . $important;
					$values[$option]	= str_replace('bold','', $values[$option]);
				}
				
				$return[] = 'font-weight:'.$values[$option] . $important;
				
			} else {
				$return[] = trim($option).':'.$values[$option] . $prefix . $important;
			}
		}
	}
	
	
	
	
	// Return
	if( count($return)>0 ){
		if( $selector!='' ){
			$return = $selector .'{'.implode( ';', $return ).';}'."\n";
		} else {
			$return = implode( ';', $return ).';';
		}
		
	} else {
		$return = '';
	}
	
	return $return;
	
}
}










/*
 *  Check if color is dark. This is new version. This will return TRUE if dark color.
 */
if( !function_exists('ts_check_dark_color') ){
function ts_check_dark_color($hex){
	// strip off any leading #
	$hex = str_replace('#', '', $hex);

	//break up the color in its RGB components
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	//do simple weighted avarage
	//
	//(This might be overly simplistic as different colors are perceived
	// differently. That is a green of 128 might be brighter than a red of 128.
	// But as long as it's just about picking a white or black text color...)
	if($r + $g + $b > 382){
		return false;
		//bright color, use dark font
	}else{
		return true;
		//dark color, use bright font
	}
}
}








/*
 *  Max Mega Menu : Default theme setup
 */
if( !function_exists('ts_mmmenu_theme_setup') ){
function ts_mmmenu_theme_setup(){
	$megamenu_themes       = get_option('megamenu_themes');
	$ts_mmmenu_theme_saved = get_option('ts_mmmenu_theme_saved');
	
	if( $ts_mmmenu_theme_saved!=='yes' ){
		$megamenu_themes['default'] = array(
			"title" => "Default",
			"arrow_up" => "dash-f343",
			"arrow_down" => "dash-f347",
			"arrow_left" => "dash-f341",
			"arrow_right" => "dash-f345",
			"responsive_breakpoint" => "1200px",
			"responsive_text" => "",
			"line_height" => "1.7",
			"z_index" => "999",
			"shadow_horizontal" => "0px",
			"shadow_vertical" => "0px",
			"shadow_blur" => "5px",
			"shadow_spread" => "0px",
			"shadow_color" => "rgba(0, 0, 0, 0.1)",
			"container_background_from" =>  "rgba(34, 34, 34, 0)",
			"container_background_to" =>  "rgba(34, 34, 34, 0)",
			"container_padding_top" => "0px",
			"container_padding_right" => "0px",
			"container_padding_bottom" => "0px",
			"container_padding_left" => "0px",
			"container_border_radius_top_left" => "0px",
			"container_border_radius_top_right" => "0px",
			"container_border_radius_bottom_right" => "0px",
			"container_border_radius_bottom_left" => "0px",
			"menu_item_align" => "left",
			"menu_item_background_from" => "rgba(0,0,0,0)",
			"menu_item_background_to" => "rgba(0,0,0,0)",
			"menu_item_background_hover_from" => "#333",
			"menu_item_background_hover_to" => "#333",
			"menu_item_spacing" => "0px",
			"menu_item_link_height" => "40px",
			"menu_item_link_color" => "#ffffff",
			"menu_item_link_font_size" => "14px",
			"menu_item_link_font" => "inherit",
			"menu_item_link_text_transform" => "none",
			"menu_item_link_weight" => "normal",
			"menu_item_link_text_decoration" => "none",
			"menu_item_link_color_hover" => "#ffffff",
			"menu_item_link_weight_hover" => "bold",
			"menu_item_link_text_decoration_hover" => "none",
			"menu_item_link_padding_top" => "0px",
			"menu_item_link_padding_right" => "10px",
			"menu_item_link_padding_bottom" => "0px",
			"menu_item_link_padding_left" => "10px",
			"menu_item_border_color" => "#fff",
			"menu_item_border_top" => "0px",
			"menu_item_border_right" => "0px",
			"menu_item_border_bottom" => "0px",
			"menu_item_border_left" => "0px",
			"menu_item_border_color_hover" => "#fff",
			"menu_item_link_border_radius_top_left" => "0px",
			"menu_item_link_border_radius_top_right" => "0px",
			"menu_item_link_border_radius_bottom_right" => "0px",
			"menu_item_link_border_radius_bottom_left" => "0px",
			"menu_item_divider_color" => "rgba(255, 255, 255, 0.1)",
			"menu_item_divider_glow_opacity" => "0.1",
			"panel_background_from" => "#f1f1f1",
			"panel_background_to" => "#f1f1f1",
			"panel_width" => "100%",
			"panel_padding_top" => "0px",
			"panel_padding_right" => "0px",
			"panel_padding_bottom" => "0px",
			"panel_padding_left" => "0px",
			"panel_border_color" => "#fff",
			"panel_border_top" => "0px",
			"panel_border_right" => "0px",
			"panel_border_bottom" => "0px",
			"panel_border_left" => "0px",
			"panel_border_radius_top_left" => "0px",
			"panel_border_radius_top_right" => "0px",
			"panel_border_radius_bottom_right" => "0px",
			"panel_border_radius_bottom_left" => "0px",
			"panel_widget_padding_top" => "15px",
			"panel_widget_padding_right" => "15px",
			"panel_widget_padding_bottom" => "15px",
			"panel_widget_padding_left" => "15px",
			"panel_header_color" => "#555",
			"panel_header_font_size" => "16px",
			"panel_header_font" => "inherit",
			"panel_header_font_weight" => "bold",
			"panel_header_text_transform" => "uppercase",
			"panel_header_text_decoration" => "none",
			"panel_font_color" => "#666",
			"panel_font_size" => "14px",
			"panel_font_family" => "inherit",
			"panel_header_padding_top" => "0px",
			"panel_header_padding_right" => "0px",
			"panel_header_padding_bottom" => "5px",
			"panel_header_padding_left" => "0px",
			"panel_header_margin_top" => "0px",
			"panel_header_margin_right" => "0px",
			"panel_header_margin_bottom" => "0px",
			"panel_header_margin_left" => "0px",
			"panel_header_border_color" => "#555",
			"panel_header_border_top" => "0px",
			"panel_header_border_right" => "0px",
			"panel_header_border_bottom" => "0px",
			"panel_header_border_left" => "0px",
			"panel_second_level_font_color" => "#555",
			"panel_second_level_font_size" => "16px",
			"panel_second_level_font" => "inherit",
			"panel_second_level_font_weight" => "bold",
			"panel_second_level_text_transform" => "uppercase",
			"panel_second_level_text_decoration" => "none",
			"panel_second_level_font_color_hover" => "#555",
			"panel_second_level_font_weight_hover" => "bold",
			"panel_second_level_text_decoration_hover" => "none",
			"panel_second_level_background_hover_from" => "rgba(0,0,0,0)",
			"panel_second_level_background_hover_to" => "rgba(0,0,0,0)",
			"panel_second_level_padding_top" => "0px",
			"panel_second_level_padding_right" => "0px",
			"panel_second_level_padding_bottom" => "0px",
			"panel_second_level_padding_left" => "0px",
			"panel_second_level_margin_top" => "0px",
			"panel_second_level_margin_right" => "0px",
			"panel_second_level_margin_bottom" => "0px",
			"panel_second_level_margin_left" => "0px",
			"panel_second_level_border_color" => "#555",
			"panel_second_level_border_top" => "0px",
			"panel_second_level_border_right" => "0px",
			"panel_second_level_border_bottom" => "0px",
			"panel_second_level_border_left" => "0px",
			"panel_third_level_font_color" => "#666",
			"panel_third_level_font_size" => "14px",
			"panel_third_level_font" => "inherit",
			"panel_third_level_font_weight" => "normal",
			"panel_third_level_text_transform" => "none",
			"panel_third_level_text_decoration" => "none",
			"panel_third_level_font_color_hover" => "#666",
			"panel_third_level_font_weight_hover" => "normal",
			"panel_third_level_text_decoration_hover" => "none",
			"panel_third_level_background_hover_from" => "rgba(0,0,0,0)",
			"panel_third_level_background_hover_to" => "rgba(0,0,0,0)",
			"panel_third_level_padding_top" => "0px",
			"panel_third_level_padding_right" => "0px",
			"panel_third_level_padding_bottom" => "0px",
			"panel_third_level_padding_left" => "0px",
			"flyout_menu_background_from" => "#f1f1f1",
			"flyout_menu_background_to" => "#f1f1f1",
			"flyout_width" => "150px",
			"flyout_padding_top" => "0px",
			"flyout_padding_right" => "0px",
			"flyout_padding_bottom" => "0px",
			"flyout_padding_left" => "0px",
			"flyout_border_color" => "#ffffff",
			"flyout_border_top" => "0px",
			"flyout_border_right" => "0px",
			"flyout_border_bottom" => "0px",
			"flyout_border_left" => "0px",
			"flyout_border_radius_top_left" => "0px",
			"flyout_border_radius_top_right" => "0px",
			"flyout_border_radius_bottom_right" => "0px",
			"flyout_border_radius_bottom_left" => "0px",
			"flyout_background_from" => "#f1f1f1",
			"flyout_background_to" => "#f1f1f1",
			"flyout_background_hover_from" => "#dddddd",
			"flyout_background_hover_to" => "#dddddd",
			"flyout_link_height" => "35px",
			"flyout_link_padding_top" => "0px",
			"flyout_link_padding_right" => "10px",
			"flyout_link_padding_bottom" => "0px",
			"flyout_link_padding_left" => "10px",
			"flyout_link_color" => "#666",
			"flyout_link_size" => "14px",
			"flyout_link_family" => "inherit",
			"flyout_link_text_transform" => "none",
			"flyout_link_weight" => "normal",
			"flyout_link_text_decoration" => "none",
			"flyout_link_color_hover" => "#666",
			"flyout_link_weight_hover" => "normal",
			"flyout_link_text_decoration_hover" => "none",
			"flyout_menu_item_divider_color" =>  "rgba(255, 255, 255, 0.1)",
			"custom_css" => '#{$wrap} #{$menu} {
			/** Custom styles should be added below this line **/
			}
			#{$wrap} { 
			clear: both;
			}'
		);
		
		//  Saving new theme
		update_option('megamenu_themes', $megamenu_themes);
		update_option('ts_mmmenu_theme_saved', 'yes');
	}
}
}








/**
 *  Custom code - Body start code
 */
if( !function_exists('themestek_body_start_code') ){
function themestek_body_start_code(){
	$return               = '';
	$page_loader          = '';
	$customhtml_bodystart = trim(themestek_get_option('customhtml_bodystart'));
	$preloader_show       = themestek_get_option('preloader_show');
	$loaderimg            = themestek_get_option('loaderimg');
	$loaderimage_custom   = themestek_get_option('loaderimage_custom');
	
	// Body Start
	if( !empty( $customhtml_bodystart ) ){
		// We are not sanitizing this as we are expecting any (html, CSS, JS) code here
		$return .= $customhtml_bodystart;
	}
	
	// Show page loader if enabled
	if( !empty($loaderimg) && $preloader_show==true ){
		if( $loaderimg=='custom' && !empty($loaderimage_custom) ){
			
			$imgdata = wp_get_attachment_image_src( $loaderimage_custom, 'full' );
			if( !empty($imgdata[0]) ){
				$page_loader = themestek_wp_kses('<div class="ts-pre-loader-container ts-pre-loader-custom"><img src="'. esc_url($imgdata[0]).'" alt="'.esc_attr__('Loading...', 'labtechco').'" /></div>');
			}
		
		} else {
			$page_loader = '<div class="ts-pre-loader-container">';
			$page_loader .= '<img src="' . get_template_directory_uri() . '/images/loader'. esc_attr($loaderimg).'.svg" alt="'.esc_attr__('Loading...', 'labtechco').'" />';
			$page_loader .= '</div>';  // We are not sanitizing this as we are expecting any (html, CSS, JS) code here
		}
		
		
	}
	
	echo trim($return . $page_loader);
	
}
}








/**
 *  Custom code - Body start code
 */
if( !function_exists('themestek_get_page_loader_css') ){
function themestek_get_page_loader_css(){
	$return             = '';
	$loaderimg          = themestek_get_option('loaderimg');
	$loaderimage_custom = themestek_get_option('loaderimage_custom');
	
	
	if( !empty( $loaderimg ) ){
		
		$img_src = '';
		
		if( $loaderimg=='custom' ){
			if( !empty($loaderimage_custom) ){
				$imgdata = wp_get_attachment_image_src( $loaderimage_custom, 'full' );
				if( !empty($imgdata[0]) ){ $img_src = $imgdata[0]; }
			}
		} else {
			$img_src = get_template_directory_uri() .'/images/loader'. $loaderimg .'.gif';
		}


		$return = '.ts-page-loader-wrapper{background-image:url(' . esc_url( $img_src ) . ')}';
		
	};
	
	return $return;
}
}













/**
 *  Blogbox footer meta options
 */
if ( !function_exists( 'themestek_blogbox_footer' ) ){
function themestek_blogbox_footer(){
	
	$return = '';
	
	ob_start();
	get_template_part('theme-parts/blogbox/blogbox','footer');
	$return = ob_get_contents();
	ob_end_clean();
	
	return $return;
}
}




/**
 * Print html with icon for current post.
 *
 * Create your own themestek_blogbox_comment_count() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if ( !function_exists( 'themestek_blogbox_comment_count' ) ){
function themestek_blogbox_comment_count( $echo = false ) {
	$return = '';
	if( comments_open() ){
		$comments = wp_count_comments( get_the_ID() );
		$comments = $comments->approved; //Get Total Comments
		$return  .= '<div class="themestek-blogbox-comment"><i class="ts-labtechco-icon-comment"></i> '. $comments .'</div>';
	}
	return $return;
}
}





/**
 *  Post thumbnail. This will echo post thumbnail according to port format like video, audio etc.
 */
if ( !function_exists( 'themestek_featured_image' ) ){
function themestek_featured_image($size='full'){
	$return = '';

	if( has_post_thumbnail() ){
		$return = get_the_post_thumbnail( NULL, $size );
	}
	
	if( !empty($return) ){
		$return = '
		<span class="themestek-item-thumbnail">
			<span class="themestek-item-thumbnail-inner">
				' . $return . '
			</span>
		</span>';
	}
	
	return $return;
	
}
}






/******************************************************************/
/* ----------------------- Team Member  ------------------------- */

/**
 *  Get single team member - position
 */
if ( !function_exists( 'themestek_team_member_single_meta' ) ){
function themestek_team_member_single_meta( $type='position', $post_id='' ) {
	$return = '';
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$types = array( 'position', 'phone', 'email', 'website' );
	
	if( !empty($type) ){
		
		// Position
		if( in_array( $type, $types ) ){
			$meta_data = get_post_meta( $post_id, 'themestek_team_member_details', true );
			if( !empty($meta_data['ts_team_info']['team_details_line_'.$type]) ){
				$return = $meta_data['ts_team_info']['team_details_line_'.$type];
			}
		}
		
		// Preparing output according to data type
		if( !empty($return) ){
			
			switch( $type ){
				case 'position':
					$return = '<h5 class="ts-team-member-single-position">' . $return . '</h5>';
					break;
					
				case 'phone':
					$return = '<div class="ts-team-list-title ts-skincolor"><i class="ts-labtechco-icon-phone"></i> '. esc_attr__('Phone','labtechco') .'</div>
						<div class="ts-team-list-value"><a href="tel:' . $return . '">' . $return . '</a></div>';
					break;
					
				case 'email':
					$return = '<div class="ts-team-list-title ts-skincolor"><i class="ts-labtechco-icon-mail"></i> '. esc_attr__('Email','labtechco') .'</div>
						<div class="ts-team-list-value"><a href="mailto:' . $return . '">' . $return . '</a></div>';
					break;
					
				case 'website':
					
					$return_link = $return;
					if( substr($return_link, 0, 3)=='www' ){
						$return_link = 'http://'.$return;
					}
				
					$return = '<div class="ts-team-list-title ts-skincolor"><i class="ts-labtechco-icon-world"></i> '. esc_attr__('Website','labtechco') .'</div>
						<div class="ts-team-list-value"><a target="_blank" href="' . esc_url($return_link) . '">' . $return . '</a></div>';
					break;
			
			}
			
		}
		
	}
	
	
	return $return;
}
}





/**
 *  Single Team member content
 */
if ( !function_exists( 'themestek_team_member_meta_details' ) ){
function themestek_team_member_meta_details( $post_id='' ){
	$return  = '';
	$phone   = themestek_wp_kses( themestek_team_member_single_meta( 'phone' ) );
	$email   = themestek_wp_kses( themestek_team_member_single_meta( 'email' ) );
	$website = themestek_wp_kses( themestek_team_member_single_meta( 'website' ) ); 
	
	
	if( !empty($phone) ){
		$return .= '<li class="ts-team-details-line ts-team-extra-details-line-phone">' . $phone . '</li>';
	}
	if( !empty($email) ){
		$return .= '<li class="ts-team-details-line ts-team-extra-details-line-email">' . $email . '</li>';
	}
	if( !empty($website) ){
		$return .= '<li class="ts-team-details-line ts-team-extra-details-line-website">' . $website . '</li>';
	}
	
	
	
	// final output
	if( !empty($return) ){
		$return = '<div class="ts-team-details-wrapper"><ul class="ts-team-details-list">' . $return . '</ul></div>';
	}
	
	return $return;
}
}





/**
 *  Single Team member extra details (list items)
 */
if ( !function_exists( 'themestek_team_member_extra_details' ) ){
function themestek_team_member_extra_details( $post_id='' ){
	$return                   = '';
	$team_extra_details_lines = themestek_get_option('team_extra_details_lines');

	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	if( !empty($team_extra_details_lines) && is_array($team_extra_details_lines) && count($team_extra_details_lines) > 0 ){
		
		// getting value from single team member
		$post_meta = get_post_meta( $post_id, 'themestek_team_member_details', true );
		
		foreach( $team_extra_details_lines as $key=>$val ){
			
			if( !empty($post_meta['ts_team_info']['team_extra_details_line_'.$key]) ){
				$icon  = themestek_create_icon_from_data( $val['team_extra_details_line_icon'], true );
				$title = (!empty($val['team_extra_details_line_title'])) ? esc_attr($val['team_extra_details_line_title']) . ' ' : '' ;
				$value =  $post_meta['ts_team_info']['team_extra_details_line_'.$key];
				
				// Check if icon not exists so we can set class
				$icon_none = ( !empty($icon) ) ? '' : 'ts-list-detail-no-icon' ;
				
				$return .= '<li class="ts-team-details-line ts-team-extra-details-line-' . $key . ' ' . $icon_none . '">
					<div class="ts-team-list-title ts-skincolor">' . $icon . $title . '</div>
					<div class="ts-team-list-value">' . $value . '</div>
				</li>';
				
			}
			
		} // foreach
		
	} // if
	
	
	if( !empty($return) ){
		$return = '<div class="ts-team-details-wrapper ts-team-extra-details-wrapper"><ul class="ts-team-details-list ts-team-extra-details-list">' . $return . '</ul></div>';
	}
	
	
	return $return;
	
}
}






/**
 *  Icon from array
 */
if ( !function_exists( 'themestek_create_icon_from_data' ) ){
function themestek_create_icon_from_data( $data, $i_tag_only=false ){

	$return = '';
	
	if( isset($data['library']) && isset($data['library_'.$data['library']]) ){
		
		$library = $data['library'];
		
		if( !empty( $data['library_'.$data['library']] ) && $data['library_'.$data['library']]!='empty' ){
			
			$return = do_shortcode('[ts-icon type="'.$library.'" icon_'.$library.'="'.$data['library_'.$data['library']].'" ]');
			
			if( $i_tag_only==true ){
				$return = '<i class="' . $data['library_'.$data['library']] . '"></i>';
			}
			
		}
		
	}
	
	return $return;
	
}
}




/**
 *  Single Team member content
 */
if ( !function_exists( 'themestek_team_member_content' ) ){
function themestek_team_member_content( $post_id='' ){
	$return = '';
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="ts-team-member-content">' . $content . '</div><!-- .ts-team-member-content -->';
	
	return $return;
}
}



/**
 *  Single Team member show category
 */
if ( !function_exists( 'themestek_team_member_single_category_list' ) ){
function themestek_team_member_single_category_list( $post_id='' ){
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$categories_list = wp_get_post_terms( $post_id, 'ts-team-group' );
	
	if( is_array($categories_list) && count($categories_list)>0 ){
		$x = 1;
		foreach( $categories_list as $category ){
			if( $x != 1 ){ $return .= '&nbsp; / &nbsp;'; } $x++;
			$return .= '<a href="' . get_term_link( $category->term_id ) . '">' . esc_attr($category->name) . '</a>';
			
		}
	}
	
	
	if( !empty($return) ){
		$return = '<div class="ts-team-member-single-category">' . $return . '</div>';
	}
	
	return $return;
	
}
}





/**
 *  Single Team member extra details (list items)
 */
if ( !function_exists( 'themestek_team_member_single_excerpt' ) ){
function themestek_team_member_single_excerpt(){
	$return  = '';
	$excerpt = get_the_excerpt();
	
	if( !empty($excerpt) ){
		$excerpt = apply_filters( 'the_content', $excerpt );
		$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
		$return = '<div class="ts-team-member-excerpt">' . $excerpt . '</div>';
	}
	
	return $return;
	
}
}









/******************************************************************/
/* ----------------------- Portfolio box ------------------------- */
if ( !function_exists( 'themestek_portfolio_next_prev_btn' ) ){
function themestek_portfolio_next_prev_btn() {
	$return = '';
	
	if( is_singular('ts-portfolio') ){
		
		$return = get_the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Next', 'labtechco' ) . '</span> ' .
				'<span class="screen-reader-text ts-hide">' . esc_attr__( 'Next post:', 'labtechco' ) . '</span> ' .
				'<span class="post-title ts-hide">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Previous', 'labtechco' ) . '</span> ' .
				'<span class="screen-reader-text ts-hide">' . esc_attr__( 'Previous post:', 'labtechco' ) . '</span> ' .
				'<span class="post-title ts-hide">%title</span>',
		) );

	}
	
	return $return;
	
}
}



if ( !function_exists( 'themestek_portfolio_category' ) ){
function themestek_portfolio_category( $link=true ) {
	$return = get_the_term_list( get_the_ID(), 'ts-portfolio-category', '', ', ' );
	if( $link!=true ){
		$return = strip_tags($return);
	}
	return $return;
}
}



if ( !function_exists( 'themestek_service_category' ) ){
function themestek_service_category( $link=true ) {
	$return = get_the_term_list( get_the_ID(), 'ts-service-category', '', ', ' );
	if( $link!=true ){
		$return = strip_tags($return);
	}
	return $return;
}
}






/* Get single portfolio view style */
if ( !function_exists( 'themestek_portfolio_single_view' ) ){
function themestek_portfolio_single_view() {
	$view                = '';
	$portfolio_viewstyle = themestek_get_option('portfolio_viewstyle');
	
	// Fetching global value for Single Portfolio View style
	if( !empty($portfolio_viewstyle) ){
		$view = $portfolio_viewstyle;
	}
	
	// Fetching this single portfolio value... if set
	$single_viewstyle = get_post_meta( get_the_ID(), 'themestek_portfolio_view', true );
	if( !empty($single_viewstyle['viewstyle']) ){
		$view = $single_viewstyle['viewstyle'];
	}
	
	return $view;
}
}







/* Portfolio details box */
if( !function_exists('themestek_portfolio_detailsbox') ){
function themestek_portfolio_detailsbox( $type='list'){ // 'list' or 'box'
	$return                    = '';
	$portfolio_project_details = themestek_get_option('portfolio_project_details');
	$pf_details_line           = themestek_get_option('pf_details_line');
	
	$row_class = ( $type=='box' ) ? 'row multi-columns-row' : '' ;
	
	$return .= '
	<div class="themestek-pf-detailbox">
		<div class="themestek-pf-detailbox-inner">
			<ul class="themestek-pf-detailbox-list '.$row_class.'">';
	
	$page_values = get_post_meta( get_the_ID(), 'themestek_portfolio_list_data', true );
	$page_values = $page_values['ts_pf_list_data'];
	$total_meta  = count($pf_details_line);
	
	if( isset($pf_details_line) && is_array($pf_details_line) && count($pf_details_line)>0 ){
		foreach( $pf_details_line as $key=>$val ){
			
			$row_title = '';
			$row_value = '';
			$icon      = themestek_create_icon_from_data( $val['pf_details_line_icon'], true );
			
			if( !empty($val['pf_details_line_title']) ){ $row_title = sprintf( esc_attr__('%s ', 'labtechco'), $val['pf_details_line_title'] ); }
			if( !empty($page_values['pf_details_line_'.$key]) ){ $row_value = nl2br($page_values['pf_details_line_'.$key]); }
			
			// Dynamic value
			if( !empty($val['data']) ){
				if($val['data']=='date'){
					$row_value = get_the_date();
				} else if($val['data']=='category'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'ts-portfolio-category', '', ', ', '' ) );
				} else if($val['data']=='category_link'){
					$row_value = get_the_term_list( get_the_ID(), 'ts-portfolio-category', '', ', ', '' );
				} else if($val['data']=='tag'){
					$row_value = strip_tags( get_the_term_list( get_the_ID(), 'ts-portfolio_tags', '', ', ', '' ) );
				} else if($val['data']=='tag_link'){
					$row_value = get_the_term_list( get_the_ID(), 'ts-portfolio_tags', '', ', ', '' );
				}
			}
			
			
			if( !empty($row_value) ){
				
				$col_class = ( $type=='box' ) ? ts_get_meta_col_class( $total_meta ) : '' ;
				
				$return .= '
						<li class="ts-pf-details-date '.esc_attr($col_class).'">
							<span class="ts-pf-details-heading">'. $icon .' '. $row_title .'</span>
							<span class="ts-pf-details-content">'. $row_value .'</span>
						</li>';
			}
		
		
		}
	}
	
	
	$return .= '
			</ul>
		</div><!-- .themestek-pf-detailbox-inner -->
	</div><!-- .themestek-pf-detailbox -->
	
	';
	
	
	return $return;
}
}




if ( !function_exists( 'ts_get_meta_col_class' ) ){
function ts_get_meta_col_class( $count=0 ){
	if( $count>5 ){ $count = 5; }
	$return = '';
	switch( $count ){
		case 1:
			$return = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
			break;
		case 2:
			$return = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
			break;
		case 3:
			$return = 'col-xs-12 col-sm-6 col-md-4 col-lg-4';
			break;
		case 4:
			$return = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
			break;
		case 5:
			$return = 'col-xs-12 col-sm-6 col-md-3 col-lg-20percent';
			break;
	}
	return $return;
	
}
}






if ( !function_exists( 'themestek_portfoliobox_media_link' ) ){
function themestek_portfoliobox_media_link( $default_icon='ts-labtechco-icon-search-1', $video_icon='ts-labtechco-icon-video', $audio_icon='ts-labtechco-icon-music-alt', $slider_icon='ts-labtechco-icon-gallery-1' ){

	$icon_code='<i class="ts-labtechco-icon-search-1"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	

	// getting single portfolio feature type
	$portfolio_featured = get_post_meta( get_the_ID(), 'themestek_portfolio_featured' , true );
	
	// default output
	$return = '<a class="ts_prettyphoto" title="' . get_the_title() . '" href="' . esc_url(themestek_portfolio_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($portfolio_featured['featuredtype']) ){
		
		switch( $portfolio_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="themestek-open-gallery" data-id="' . get_the_ID() . '" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($portfolio_featured['slide_images']) ){
					$slider_images = explode( ',', $portfolio_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
						
						
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($portfolio_featured['video_code']) ){
					$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="' . esc_url( $portfolio_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($portfolio_featured['audio_code']) ){
					$return .= '<div class="ts-hide" id="themestek-embed-code-' . get_the_ID() . '">' . $portfolio_featured['audio_code'] . '</div>';
				}
				break;
			
		}
		
		
	}
	
	return $return;
}
}




/**
 *  Service Box media link
 */
if ( !function_exists( 'themestek_servicebox_media_link' ) ){
function themestek_servicebox_media_link( $default_icon='ts-labtechco-icon-search-1', $video_icon='ts-labtechco-icon-video', $audio_icon='ts-labtechco-icon-music-alt', $slider_icon='ts-labtechco-icon-gallery-1' ){

	$icon_code='<i class="ts-labtechco-icon-search-1"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	

	// getting single service feature type
	$service_featured = get_post_meta( get_the_ID(), 'themestek_service_featured' , true );
	
	// default output
	$return = '<a class="ts_prettyphoto" title="' . get_the_title() . '" href="' . esc_url(themestek_service_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($service_featured['featuredtype']) ){
		
		switch( $service_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="themestek-open-gallery" data-id="' . get_the_ID() . '" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($service_featured['slide_images']) ){
					$slider_images = explode( ',', $service_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
						
						
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($service_featured['video_code']) ){
					$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="' . esc_url( $service_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($service_featured['audio_code']) ){
					$return .= '<div class="ts-hide" id="themestek-embed-code-' . get_the_ID() . '">' . $service_featured['audio_code'] . '</div>';
				}
				break;
			
		}
		
		
	}
	
	return $return;
}
}





if ( !function_exists( 'themestek_gallerystyle_portfoliobox_media_link' ) ){
function themestek_gallerystyle_portfoliobox_media_link( $default_icon='ts-labtechco-icon-search-1', $video_icon='ts-labtechco-icon-video', $audio_icon='ts-labtechco-icon-music-alt', $slider_icon='ts-labtechco-icon-gallery-1' ){

	$icon_code='<i class="ts-labtechco-icon-search-1"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	

	// getting single portfolio feature type
	$portfolio_featured = get_post_meta( get_the_ID(), 'themestek_portfolio_featured' , true );
	
	// default output
	$return = '<a class="ts_prettyphoto" data-gal="prettyPhoto[gal]" title="' . get_the_title() . '" href="' . esc_url(themestek_portfolio_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($portfolio_featured['featuredtype']) ){
		
		switch( $portfolio_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="themestek-open-gallery" data-id="' . get_the_ID() . '" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($portfolio_featured['slide_images']) ){
					$slider_images = explode( ',', $portfolio_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
						
						
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($portfolio_featured['video_code']) ){
					$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="' . esc_url( $portfolio_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($portfolio_featured['audio_code']) ){
					$return .= '<div class="ts-hide" id="themestek-embed-code-' . get_the_ID() . '">' . $portfolio_featured['audio_code'] . '</div>';
				}
				break;
			
		}
		
		
	}
	
	return $return;
}
}






/**
 *  Service box
 */
if ( !function_exists( 'themestek_gallerystyle_servicebox_media_link' ) ){
function themestek_gallerystyle_servicebox_media_link( $default_icon='ts-labtechco-icon-search-1', $video_icon='ts-labtechco-icon-video', $audio_icon='ts-labtechco-icon-music-alt', $slider_icon='ts-labtechco-icon-gallery-1' ){

	$icon_code='<i class="ts-labtechco-icon-search-1"></i>';
	if( !empty($default_icon) ){
		$icon_code='<i class="' . $default_icon . '"></i>';
	}
	

	// getting single service feature type
	$service_featured = get_post_meta( get_the_ID(), 'themestek_service_featured' , true );
	
	// default output
	$return = '<a class="ts_prettyphoto" data-gal="prettyPhoto[gal]" title="' . get_the_title() . '" href="' . esc_url(themestek_service_single_image_path()) . '">' . $icon_code . '</a>';
	
	
	// preparing output
	if( !empty($service_featured['featuredtype']) ){
		
		switch( $service_featured['featuredtype'] ){
			
			case 'slider':
				// icon
				if( !empty($slider_icon) ){
					$icon_code='<i class="' . $slider_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="themestek-open-gallery" data-id="' . get_the_ID() . '" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				
				if( !empty($service_featured['slide_images']) ){
					$slider_images = explode( ',', $service_featured['slide_images'] );
					if( is_array($slider_images) && count($slider_images)>0 ){
						
						$api_images_src   = '';
						$api_images_title = '';
						$api_images_desc  = '';
						
						$x = 1;
						foreach( $slider_images as $slide_image ){
							$comma = ( $x!=1 ) ? ',' : '' ;
							
							$img_src = wp_get_attachment_image_src($slide_image, 'full');
							$img_src = $img_src[0];
							
							$api_images_src   .= $comma . '"' . $img_src . '"';
							$api_images_title .= $comma . '"' . get_the_title() . '"';
							$api_images_desc  .= $comma . '""';
							$x++;
						}
						
						$return .= '<script> "use strict"; ';
							$return .= 'var api_images_' . get_the_ID() . ' = ['.$api_images_src.'];';
							$return .= 'var api_titles_' . get_the_ID() . ' = ['.$api_images_title.'];';
							$return .= 'var api_desc_' . get_the_ID() . ' = ['.$api_images_desc.'];';
						$return .= '</script>';
						
						
					}
				}
				
				break;
				
			case 'video':
				
				// icon
				if( !empty($video_icon) ){
					$icon_code='<i class="' . $video_icon . '"></i>';
				}
				
				if( !empty($service_featured['video_code']) ){
					$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="' . esc_url( $service_featured['video_code'] ) . '">' . $icon_code . '</a>';
				}
				break;
				
			case 'audioembed':
				
				// icon
				if( !empty($audio_icon) ){
					$icon_code='<i class="' . $audio_icon . '"></i>';
				}
				
				$return = '<a title="' . get_the_title() . '" class="ts_prettyphoto" href="#themestek-embed-code-' . get_the_ID() . '">' . $icon_code . '</a>';
				if( !empty($service_featured['audio_code']) ){
					$return .= '<div class="ts-hide" id="themestek-embed-code-' . get_the_ID() . '">' . $service_featured['audio_code'] . '</div>';
				}
				break;
			
		}
		
		
	}
	
	return $return;
}
}




if ( !function_exists( 'themestek_portfoliobox_footer' ) ){
function themestek_portfoliobox_footer(){
	$return = '';
	return $return;
}
}

if ( !function_exists( 'themestek_portfoliobox_likes' ) ){
function themestek_portfoliobox_likes(){
	$return = '';	
	$likes = get_post_meta( get_the_ID(), 'themestek_likes', true );
	if( !$likes ){ $likes='0'; }
	
	$likeActiveClass = ( isset($_COOKIE["themestek_likes_".get_the_ID()]) ) ? 'like-active' : '' ;
	$likeIconClass   = ( isset($_COOKIE["themestek_likes_".get_the_ID()]) ) ? 'tsicon-fa-heart' : 'tsicon-fa-heart-o' ;
	
		$like = '<div class="themestek-portfolio-likes-wrapper">
					<a class="themestek-portfolio-likes ' . $likeActiveClass . '" href="#" id="pid-' . get_the_ID() . '">
						<i class="'.$likeIconClass.'"></i>&nbsp;' . $likes . '
					</a>
				</div>';
				
	if( isset($howes['portfolio_show_like']) && trim($howes['portfolio_show_like'])=='0' ){
		$like = '';
	}
	$return.=$like;
	return $return;
}
}


if ( !function_exists( 'themestek_get_meta' ) ){
function themestek_get_meta( $meta_group='', $meta_id='' , $meta_sub_id='' ){
 $return = '';
 
 $meta_group_value = get_post_meta( get_the_ID(), $meta_group, true );
 
 if( !empty( $meta_sub_id ) ){
  if( !empty( $meta_group_value[$meta_id][$meta_sub_id] ) ){
   $return = $meta_group_value[$meta_id][$meta_sub_id];
  }
 } else if( !empty($meta_group_value[$meta_id]) ){
  $return = $meta_group_value[$meta_id];
 }
 
 // return data
 return $return;
 
}
}




/**
 *  Portfolio Gallery
 */
if( !function_exists('themestek_featured_gallery_slider') ){
function themestek_featured_gallery_slider(){
	$return = '';
	return $return;
}
}





/**
 *  Social share box
 */
if ( !function_exists( 'themestek_social_share_box' ) ){
function themestek_social_share_box($post_type='portfolio'){
	
	$return       = '';
	$social_links = '';
	$button_html  = '';
	$portfolio_single_top_btn_title = themestek_get_option('portfolio_single_top_btn_title');
	$portfolio_single_top_btn_link  = themestek_get_option('portfolio_single_top_btn_link');
	
	${ $post_type.'_social_share_title' } = themestek_get_option( $post_type.'_social_share_title' );
	
	
	// preparing social links
	switch($post_type){
		case 'portfolio':
			if( themestek_get_option('portfolio_show_social_share')==true ){
				$social_links = themestek_social_share_links('portfolio');
			}
			break;
		case 'post':
			$social_links = themestek_social_share_links('post');
			break;
	}
	
	
	// preparing button
	if( !empty($portfolio_single_top_btn_title) && !empty($portfolio_single_top_btn_title) && shortcode_exists('ts-btn') ){
		$button_html  = '<div class="ts-single-top-btn">';
		
		$button_html .= do_shortcode('[ts-btn title="' . $portfolio_single_top_btn_title . '" style="flat" shape="round" color="black" size="md" i_align="right" i_icon_themify="themifyicon ti-arrow-right" add_icon="true" link="url:' . urlencode(esc_url($portfolio_single_top_btn_link)) . '|||"]');
		
		$button_html .= '</div>';
	}
	
	
	
	
	// preparing output according to CPT
	if( !empty($social_links) ){
		
		$return = '<div class="ts-social-share-wrapper ts-social-share-' . $post_type . '-wrapper">';
		
		// social share title
		if( !empty( ${ $post_type.'_social_share_title' } ) ){
			$return .= '<div class="ts-social-share-title">'. ${ $post_type.'_social_share_title' } .'</div>';
		}
		
		// social links
		$return .= $social_links;
		
		// button after this
		$return .= $button_html;
		
		$return .= '</div>';
		$return .= '<div class="clearfix"></div>';

		
		
	}
	
	
	return $return;
}
}










/**
 *  Post thumbnail. This will echo post thumbnail according to port format like video, audio etc.
 */
if ( !function_exists( 'themestek_portfolio_featured_media' ) ){
function themestek_portfolio_featured_media( $post_id='', $size='full' ){
	
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	// get post meta
	$post_meta = get_post_meta( $post_id, 'themestek_portfolio_featured', true );
	
	
	if( !empty($post_meta['featuredtype']) ){
		
		switch($post_meta['featuredtype']){
			case 'image':
				$return .= themestek_get_featured_media();
			
		}
		
	}
	
	
}
}




/**
 *  Portfolio description content
 */
if ( !function_exists( 'themestek_portfolio_description' ) ){
function themestek_portfolio_description( $post_id='' ){
	$return = '';
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="ts-portfolio-description">' . $content . '</div><!-- .ts-portfolio-description -->';
	
	return $return;
}
}


/*
 *  Portfolio short description
 */
if ( !function_exists( 'themestek_portfolio_shortdesc' ) ){
function themestek_portfolio_shortdesc( $post_id='' ){
	$return = '';
	if( is_singular() ){
		$short_desc = get_post_meta( get_the_ID(), 'themestek_portfolio_shortdesc', true);
		if( !empty($short_desc['ts_pf_shortdesc']) ){
			$short_desc = apply_filters( 'the_content', $short_desc['ts_pf_shortdesc'] );
			$return = '<div class="ts-portfolio-short-desc">' . $short_desc . '</div><!-- .ts-portfolio-short-desc -->';
		}
	}
	return $return;
}
}











/**
 *  Service description content
 */
if ( !function_exists( 'themestek_service_description' ) ){
function themestek_service_description( $post_id='' ){
	$return = '';
	
	// processing content
	$content = get_the_content( null, false );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	
	// preparing final output
	$return = '<div class="ts-service-description">' . $content . '</div><!-- .ts-service-description -->';
	
	return $return;
}
}




/**
 *  Related Portfolio
 */
if ( !function_exists( 'themestek_portfolio_related' ) ){
function themestek_portfolio_related(){
	$portfolio_show_related   = themestek_get_option('portfolio_show_related');
	$portfolio_related_column = themestek_get_option('portfolio_related_column');
	$portfolio_related_show   = themestek_get_option('portfolio_related_show');
	$portfolio_related_view   = themestek_get_option('portfolio_related_view');
	$portfolio_related_title  = themestek_get_option('portfolio_related_title');
	
	$return   = '';
	
	if( $portfolio_show_related===true ){
		
		// Tempoary delcated this variables.. please correct it
		$column        = ( !empty($portfolio_related_column) ) ? $portfolio_related_column : 'four' ;
		$show          = ( !empty($portfolio_related_show) ) ? $portfolio_related_show : '4' ;
		$cpt           = 'portfolio'; // This will be used in themestek_get_boxes() automatically.
		$boxstyle      = ( !empty($portfolio_related_view) ) ? $portfolio_related_view : 'overlay' ;
		$related_title = ( !empty($portfolio_related_title) ) ? '<h3 class="ts-pf-single-related-title">' . $portfolio_related_title . '</h3>' : '' ;
		
		$catid      = wp_get_post_terms( get_the_ID() , 'ts-portfolio-category', array("fields" => "ids"));
		$thisPostID = array(get_the_ID());
		
		// Title
		$args = array(
			'post__not_in' => $thisPostID,
			'post_type'    => 'ts-portfolio',
			'showposts'    => $show,
			'tax_query'    => array(
				array(
					'taxonomy' => 'ts-portfolio-category',
					'field'    => 'id',
					'terms'    => $catid,
				)
			),
			'orderby' => 'rand',
		);
		
		global $posts;
		$original_posts = $posts;
		
		$posts = new WP_Query( $args );
		
		
		if ( $posts->have_posts() ) {
			$return .= '<div class="ts-pf-single-related-wrapper">
				' . $related_title . '
				' . themestek_get_boxes( 'portfolio', get_defined_vars() ) . '
			</div>';
		}
		
		$posts = $original_posts;
		
		// Restore original Post Data
		wp_reset_postdata();
		
		$posts = $original_posts;
		
	}
	
	return $return;
}
}




/**
 *  Blog only - Extra class to each classic view of post
 */
if ( !function_exists( 'themestek_post_class' ) ){
function themestek_post_class( $class_list='' ){
	$return = '';
	$classes = array();
	
	// If no featured content found
	if( themestek_get_featured_media()=='' ){
		$classes[] = 'ts-no-featured-content';
	}
	
	// creating string from array
	if( !empty($classes) && count($classes)>0 ){
		$return = implode( ' ', $classes );
	}
	
	return $return;
}
}

/**
 *  Blog Classic - Extra layout class to each classic view of post
 */
if ( !function_exists( 'themestek_postlayout_class' ) ){
function themestek_postlayout_class(){
	$return = '';
	$classes = array();
	
// If no featured content found
	if( themestek_get_featured_media()=='' ){
		$classes[] = 'ts-no-featured-content';
	}
	
	if(themestek_get_option('blog_view') == 'classic' || themestek_get_option('blog_view') == 'box' ) {
		$classes[] = 'themestek-box-blog-classic';
	}
	else if(themestek_get_option('blog_view') == 'classic-style2') {
		$classes[] = 'themestek-box-blog-style2';
	}
	else if(themestek_get_option('blog_view') == 'classic-style3') {
		$classes[] = 'themestek-box-blog-style3';
	}
	else {
		$classes[] = '';
	}
	// creating string from array
	if( !empty($classes) && count($classes)>0 ){
		$return = implode( ' ', $classes );
	}
	
	// merging class that passed in this function
	if( !empty($class_list) ){
		$return = $class_list . ' ' . $return;
	}
		
	return $return;
}
}




if ( !function_exists( 'themestek_get_post_format_icon' ) ){
function themestek_get_post_format_icon( $post_id='' ){
	$return = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	$post_type   = get_post_type($post_id);
	$post_format = get_post_format( $post_id );
	
	$valid_post_formats_icon = array(
		'aside'		=> 'aside',
		'gallery' 	=> 'gallery-1',
		'link' 		=> 'link',
		'image' 	=> 'image',
		'quote' 	=> 'quote-left',
		'status' 	=> 'status',
		'video' 	=> 'video',
		'audio'	 	=> 'music-alt',
		'chat' 		=> 'chat',
	);
	
	if( $post_type=='post' ){
	
		$icon_class = 'pencil';
		
		if( $post_format != false && array_key_exists( $post_format, $valid_post_formats_icon ) ){
			$icon_class = $valid_post_formats_icon[$post_format];
		}
		
		$return = '<i class="ts-labtechco-icon-' . $icon_class . '"></i>';
	
	}
	
	if( !empty($return) ){
		$return = '<div class="ts_classic_post_icon"><div class="ts-post-format-icon-wrapper">' . $return . '</div></div>';
	}
	
	return $return;
	
}
}




/**
 * Getting featured media like image, gallery, video, audio etc
 */
if ( !function_exists( 'themestek_get_featured_media' ) ){
function themestek_get_featured_media( $post_id='', $size='full', $imgonly=false ){
	
	$return        = '';
	$class         = 'ts-' . sanitize_html_class( get_post_type() ) . '-featured-wrapper';
	$featured_type = 'image';
	$video_code    = '';
	$audio_code    = '';
	$slide_images  = '';
	
	if( empty($post_id) ){
		$post_id = get_the_ID();
	}
	
	
	if( !empty($post_id) ){
		
		// Getting post type
		$post_type = get_post_type($post_id);
		
		
		// If blog post
		if( $post_type=='post' ){
			$featured_type = get_post_format( $post_id );
			$video_code    = trim( get_post_meta( $post_id, '_format_video_embed', true) );
			$audio_code    = trim( get_post_meta( $post_id, '_format_audio_embed', true) );
			$slide_images  =  get_post_meta( $post_id, '_themestek_metabox_gallery', true) ;
			$slide_images  = ( !empty($slide_images['gallery_images']) ) ? $slide_images['gallery_images'] : '' ;
			$class        .= ' ts-post-format-' . get_post_format();
		}
		
		
		// If portfolio
		if( $post_type=='ts-portfolio' ){
			
			// get post meta
			$post_meta  = get_post_meta( $post_id, 'themestek_portfolio_featured', true );
			
			$video_code   = ( !empty($post_meta['video_code']) ) ? trim($post_meta['video_code']) : '' ;
			$audio_code   = ( !empty($post_meta['audio_code']) ) ? trim($post_meta['audio_code']) : '' ;
			$slide_images = ( !empty($post_meta['slide_images']) ) ? trim($post_meta['slide_images']) : '' ;
			
			// getting featured type
			if( !empty($post_meta['featuredtype']) ){
				$featured_type = $post_meta['featuredtype'];
			}
			
		}
		
		// If imageonly than return only featured image
		if( $imgonly==true ){
			$featured_type = 'image';
		}
		
		
		// The related posts (1st post) was giving notice level error like this:
		// Trying to get property of non-object in post-thumbnail-template.php on line 83
		// So we are calling this
		ob_start();
		get_the_post_thumbnail( $post_id, $size );
		ob_end_clean();
		
		
		
		// Now preparing the output
		switch( $featured_type ){
			case 'image':
			default:
				if ( has_post_thumbnail() ) {					
					$return1  = get_the_post_thumbnail( $post_id, $size );
					$postlink = get_the_permalink();
					
					global $ts_blog_imglink;
					if($ts_blog_imglink == 'yes') {
						$return .= '<a href="'.esc_url($postlink).'">'.$return1.'</a>';
					} else {
						$return .=$return1;
					}
				
				}
				break;
			
			case 'video':
				if( $video_code!='' ){
					$return .= themestek_oembed_get($video_code);
				}
				break;
				
			case 'audio':
			case 'audioembed':
				if( $audio_code!='' ){
					$return .= themestek_oembed_get($audio_code);
					if( strtolower(substr($audio_code, -4)) == ".mp3" ){
						$class .= ' ts-post-format-audio-mp3';
					}
				}
				break;
				
			case 'gallery':
			case 'slider':
				$return .= themestek_create_slider($slide_images, $size);
				break;
				
			case 'quote':
				$return .= themestek_featured_quote();
				break;
				
			case 'link':
				$return .= themestek_featured_link();
				break;
		}
		
		
	}

	
	// Adding wrapper
	if( !empty($return) ){
		$return = '<div class="ts-featured-wrapper ' . $class . '">' . $return . '</div>';
	}

	return $return;
	
}
}






/**
 *  Post Format - Link
 */
if ( !function_exists( 'themestek_featured_link' ) ){
function themestek_featured_link($code=''){
	
	$return = '';
	
	if( get_post_format() == 'link' ){
		
		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}
		
		// preparing content
		$content  = '';
		$link_url = get_post_meta( get_the_ID(), '_format_link_url', true );
		if( !empty($link_url) ){
			$content .= '<h3 class="ts-format-link-title"><a href="' . esc_url($link_url) . '">' . get_the_title() . '</a></h3>';
			$content .= '<span class="ts-format-link-url"><a href="' . esc_url($link_url) . '">' . esc_url($link_url) . '</a></span>';
		} else {
			$content .= '<h3 class="ts-format-link-title">' . get_the_title() . '</h3>';
		}
		
		
		
		// Final output
		$return = '
			<div class="ts-post-featured-link-wrapper" ' . $inline_style . '>
				<div class="ts-post-featured-link">
					' . $content . '
				</div>
			</div>
			';
		
	}
	
	return $return;
	
}
}





/**
 *  Post Format - Quote
 */
if ( !function_exists( 'themestek_featured_quote' ) ){
function themestek_featured_quote($code=''){
	
	$return = '';
	
	if( get_post_format() == 'quote' ){
		
		$inline_style = '';
		if( has_post_thumbnail() ){
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				$inline_style = 'style="background-image:url(\'' . get_the_post_thumbnail_url( get_the_ID(), 'full') . '\');"';
			}
		}
		
		// Quote Source Name
		$source_name    = get_post_meta( get_the_ID(), '_format_quote_source_name', true );
		$source_url     = get_post_meta( get_the_ID(), '_format_quote_source_url', true );
		$link_start     = '';
		$link_end       = '';
		$source_content = '';
		if( !empty($source_url) ){
			$link_start = '<a href="' . $source_url . '">';
			$link_end   = '</a>';
		}
		if( !empty($source_name) ){
			$source_content = '<cite>' . $link_start . $source_name . $link_end . '</cite>';
		}
		
		// Content
		$get_the_content = get_the_content();
		$content         = $get_the_content;
		if ( strpos( $get_the_content, '<blockquote>' ) === false) {
			$content = '<blockquote>' . $get_the_content . $source_content . '</blockquote>';
		}
		
		// Final output
		$return = '<div class="ts-post-featured-quote" ' . $inline_style . '>' . $content . '</div>';
		
	}
	
	return $return;
	
}
}




if ( !function_exists( 'themestek_oembed_get' ) ){
function themestek_oembed_get($code=''){
	$return = '';
	$code   = trim($code); // Removing extra white space
	
	if( !empty($code) ){
		
		if( substr($code, -4) != ".mp3" && substr($code, 0, 4) == "http" ){
			$return = wp_oembed_get($code);
			if( $return==false ){  // 1st retry
				$return = wp_oembed_get($code);
			}
			if( $return==false ){  // 2nd retry
				$return = wp_oembed_get($code);
			}
			if( $return==false ){ // 3rd retry
				$return = wp_oembed_get($code);
			}

		} else if( substr($code, -4) == ".mp3" ){  // MP3 file
			$return = '<div class="ts-blogbox-audio-mp3player-w">'.do_shortcode( '[audio src="'.$code.'"]' ).'</div>';
			
		} else {  // MP3 file
			$return = '<div class="ts-blogbox-audio-mp3player-w">' . $code . '</div>';
			
		}
	}
	
	return $return;
	
}
}





if ( !function_exists( 'themestek_create_slider' ) ){
function themestek_create_slider($images='', $size='full'){
	$return = '';
	
	if( !empty($images) ){
		$images_array = explode(',', $images);
		if( count($images_array)>0 ){
			foreach( $images_array as $image_id ){
				$thumb = wp_get_attachment_image_src( $image_id, 'medium' );
				$thumb = $thumb[0];
				if( is_numeric($image_id) ){
					$return .= '<li>' . wp_get_attachment_image( $image_id, $size ) . '</li>';
				}
			}
		}
	}
	
	// preparing final output as flex slider
	if( !empty($return) ){
		$return = '<div class="ts-slick-carousel-wrapper"><div class="ts-flexslider"><ul class="slides">' . $return . '</ul></div></div>';
	}
	
	return $return;
	
}
}








/* =============================================================== */
/* ---------------------- Blog functions  ------------------------ */


/**
 * get Boxes for CPT
 */
if( !function_exists('themestek_get_boxes') ){
function themestek_get_boxes( $cpt='blog', $vars=array() ){
	global $ts_blog_imglink;
	
	
	$return            = '';
	$sortable_category = array();
	$posts    = (!empty($vars['posts']))   ? $vars['posts'] : '' ;
	$column   = (!empty($vars['column']))  ? $vars['column'] : 'three' ;
	$boxstyle = (!empty($vars['boxstyle']))    ? $vars['boxstyle'] : 'top-image' ;
	$allword  = (!empty($vars['allword'])) ? $vars['allword'] : esc_attr__('All', 'labtechco');
	$boxview  = (!empty($vars['boxview'])) ? $vars['boxview'] : '';
	$show_tooltip		= (!empty($vars['show_tooltip'])) ? $vars['show_tooltip'] : 'yes' ;
	$add_link			= (!empty($vars['add_link']))     ? $vars['add_link'] : 'yes' ;
	$ts_blog_imglink	= (!empty($vars['postlink_onimage']) && $vars['postlink_onimage']=='true' )   ? 'yes' : 'no' ;
	
	if( empty($posts) ){
		global $posts;
	}

		while ( $posts->have_posts() ) {
			$posts->the_post();
			
			// Portfolio box sortable category links
			if( !empty($vars['sortable']) && $vars['sortable']=='yes' ){
				$post_terms = wp_get_post_terms( get_the_ID(), themestek_get_taxonomy_from_cpt() );
				foreach( $post_terms as $term ){
					$sortable_category[ $term->name ] = $term->slug;
				}
			}
			
			
			
			// Client Logos
			$client_wrap_start = '';
			$client_wrap_end   = '';
			if( $cpt == 'client' ){
				$client_wrap_start .= '<div class="ts-client-logo-box-w">';
				$client_wrap_end    = '</div><!-- .ts-client-logo-box-w --> ' . $client_wrap_end;
					
				if( $show_tooltip == 'yes' ){
					$client_wrap_start .= '<div class="ts-client-logo-tooltip" data-tooltip="' . get_the_title() . '">';
					$client_wrap_end    = '</div>' . $client_wrap_end;
				}
				if( $add_link == 'yes' && themestek_client_single_link()!='' ){
					$client_wrap_start .= '<a class="ts-client-logo-link" href="' . themestek_client_single_link() . '">';
					$client_wrap_end    = '</a>' . $client_wrap_end;
				}
			}
			
			
			ob_start();
			get_template_part('theme-parts/'. $cpt .'box/'. $cpt .'box', $boxstyle);
			$boxes = ob_get_contents();
			ob_end_clean();
			
			$return .= themestek_column_div('start', $column );
				$return .= $client_wrap_start;
					$return .= $boxes;
				$return .= $client_wrap_end;
			$return .= themestek_column_div('end', $column );
		
		} // while
		
		
		
	//}
	
	
	
	
	if( !empty($return) ){
		
		// Sortable
		$sortable_category_html = '';
		if( !empty($sortable_category) && is_array($sortable_category) && count($sortable_category)>0 ){
			$sortable_category_html .= '<li class="ts-sortable-link ts-sortable-all-link"><a class="selected" href="javascript:void(0);" data-filter="*"> ' . $allword . ' </a></li>';
			foreach($sortable_category as $key=>$val){
				$sortable_category_html .= '<li class="ts-sortable-link"><a href="javascript:void(0);" data-filter=".' . $val . '">' . $key . '</a></li>';
			}
			$sortable_category_html = '<div class="ts-sortable-wrapper ts-sortable-wrapper-' . $cpt . '"><nav class="ts-sortable-list"><ul>' . $sortable_category_html . '</ul></nav></div>';
		}
		
		// Boxes
		$return = '
			' . $sortable_category_html . '
			<div class="row multi-columns-row themestek-boxes-row-wrapper">
				'.$return.'
			</div>
		';
		
		
		// Pagination
		if( isset($vars['pagination']) && $vars['pagination']=='yes' && $vars['boxview']!='carousel' ){
			$return .= themestek_pagination( $posts );
		}
		
		return $return;
	}
	return '';
	
}
}




/**
 *  ThemeStek Box class function
 */
if( !function_exists('themestek_box_class') ){
function themestek_box_class( $extra_class='' ){
	$return = '';
	
	// getting taxonomy
	$taxonomy = themestek_get_taxonomy_from_cpt();
	
	// getting term list for current taxonomy
	$terms = wp_get_post_terms( get_the_ID(), $taxonomy ); // Get all terms of a taxonomy
	
	if( is_array($terms) && count($terms)>0 ){
		foreach( $terms as $term ){
			$return .= $term->slug . ' ';
		}
	}
	
	// removing extra space
	$return = trim($return);
	
	// extra class
	if( !empty($extra_class) ){
		$return .= ' ' . themestek_sanitize_html_classes($extra_class);
	}
	
	return trim($return);
	
	
}
}




/**
 *  ThemeStek Box class function
 */
if( !function_exists('themestek_get_taxonomy_from_cpt') ){
function themestek_get_taxonomy_from_cpt(){
	$return = 'category';
	
	if( get_post_type() == 'ts-portfolio' ){
		$return = 'ts-portfolio-category';
	} else if( get_post_type() == 'ts-team-member' ){
		$return = 'ts-team-group';
	} else if( get_post_type() == 'ts-testimonial' ){
		$return = 'ts-testimonial-group';
	}
	
	return $return;
}
}







/**
 *  Global function - This will return array of Blogbox templates
 */
if( !function_exists('themestek_global_blog_template_list') ){
function themestek_global_blog_template_list( $for_vc=false ){
	$return = array(
		"top-image"       => esc_attr__("Top image and bottom content (default)", "labtechco"),
		"left-image"      => esc_attr__('Left image and right content ', "labtechco"),
		"right-image"     => esc_attr__('Right image and left content ', "labtechco"),
	);
	
	if( $for_vc==true ){ // for vc
		$return = array_flip( $return );
	}
	
	return $return;
}
}







/**
 *  Global function - This will return array of different templates for CPT and other boxes
 */
if( !function_exists('themestek_global_template_list') ){
function themestek_global_template_list( $for='team', $for_codestar=true, $options=array() ){
	$return = array();
	
	if( !empty($for) ){
		
		switch( $for ){
			case 'team':
				
				$return = array(
					array(
						'label'	=> esc_attr__('Team Member Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/team-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Team Member Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/team-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('Team Member Box - Style 3','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/team-style-3.jpg',
					),
					array(
						'label'	=> esc_attr__('Team Member Box - Style 4','labtechco'),
						'value'	=> 'style-4',
						'thumb'	=> get_template_directory_uri() . '/includes/images/team-style-4.jpg',
					),
					
				);
				break;
				
			case 'portfolio':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Portfolio Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Portfolio Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('Portfolio Box - Style 3','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-style-3.jpg',
					),
				);
				break;
				
				
			case 'portfolio-single':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Left image and right content','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Top image and bottom content','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('No image and full-width content','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-3.jpg',
					),
					array(
						'label'	=> esc_attr__('Top image and full-width content','labtechco'),
						'value'	=> 'style-4',
						'thumb'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-4.jpg',
					),
				);
				break;
				
				
			case 'service':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Service Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/servicebox-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/servicebox-style-2.jpg',
					),
				);
				break;
				
				
			case 'testimonial':
			
				$return = array(
				
					array(
						'label'	=> esc_attr__('Testimonial Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/testimonial-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Testimonial Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/testimonial-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('Testimonial Box - Style 3','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/testimonial-style-3.jpg',
					),
					
				);
				break;
				
				
			case 'blog':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Blog Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/blogbox-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Blog Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/blogbox-style-2.jpg',
					),
					
				);
				break;
				
				
			case 'iconheadingbox':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Service Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 3','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-3.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 4','labtechco'),
						'value'	=> 'style-4',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-4.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 5','labtechco'),
						'value'	=> 'style-5',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-5.jpg',
					),
					array(
						'label'	=> esc_attr__('Service Box - Style 6','labtechco'),
						'value'	=> 'style-6',
						'thumb'	=> get_template_directory_uri() . '/includes/images/sbox-style-6.jpg',
					),
				);
				break;
				
				
			case 'fidbox':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Facts in Digits Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/fidbox-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Facts in Digits Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/fidbox-style-2.jpg',
					),
					array(
						'label'	=> esc_attr__('Facts in Digits Box - Style 3','labtechco'),
						'value'	=> 'style-3',
						'thumb'	=> get_template_directory_uri() . '/includes/images/fidbox-style-3.jpg',
					),
				);
				break;
				
				
			case 'pricingtable':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Pricing Table - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/ptable-style-1.jpg',
					),
					
				);
				break;
				
				
				
				
			case 'clients':
			
				$return = array(
					array(
						'label'	=> esc_attr__('Clients Box - Style 1','labtechco'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/includes/images/clientbox-style-1.jpg',
					),
					array(
						'label'	=> esc_attr__('Clients Box - Style 2','labtechco'),
						'value'	=> 'style-2',
						'thumb'	=> get_template_directory_uri() . '/includes/images/clientbox-style-2.jpg',
					),
				);
				break;
				
				
		}
		
		if( $for_codestar==true ){
			if( is_array($return) && count($return)>0 ){
				$new_return = array();
				foreach( $return as $data ){
					$new_return[ $data['value'] ] = $data['thumb'];
				}
			}
			$return = $new_return;
		}
	}
	
	return $return;
}
}








/**
 *  Global function - This will return array of Client templates
 */
if( !function_exists('themestek_global_client_template_list') ){
function themestek_global_client_template_list( $for_vc=false ){
	$return = array(
		'simple-logo'    => esc_attr__('Simple Logo view', 'labtechco'),
		'separator-logo' => esc_attr__('Logo with Separator view', 'labtechco'),
		'boxed-logo'     => esc_attr__('Boxed view', 'labtechco'),
	);
	
	if( $for_vc==true ){ // for vc
		$return = array_flip( $return );
	}
	
	return $return;
}
}


/**
 *  Client Logos - Link for single client logo
 */
if( !function_exists('themestek_client_single_link') ){
function themestek_client_single_link( $for_vc=false ){
	$return = '';
	if( get_the_ID() ){
		$post_meta = get_post_meta( get_the_ID(), 'themestek_clients_details' , true );
		if( !empty($post_meta['clienturl']) ){
			$return = $post_meta['clienturl'];
		}
	}
	return $return;
}
}





/**
 *  Client Logos - 
 */
if( !function_exists('themestek_client_hover_img') ){
function themestek_client_hover_img( $for_vc=false ){
	$return = '';
	if( get_the_ID() ){
		$post_meta = get_post_meta( get_the_ID(), 'themestek_clients_hover_image' , true );
		if( !empty($post_meta['hoverimg']['full-url']) ){
			$return .= '<div class="ts-client-box-hover-img">';
			$return .= '<img src="' . esc_url($post_meta['hoverimg']['full-url']).'" alt="' . esc_attr(get_bloginfo('name')) . '" />';
			$return .= '</div>';
		}
	}
	return $return;
}
}





if( !function_exists('themestek_column_div') ){
function themestek_column_div($type='start', $column='three' ){
	
	$return   = '';
	$boxClass = 'ts-box-col-wrapper ';
	
	switch($column){
		case 'one':
			$boxClass .= 'col-lg-12 col-sm-12 col-md-12 col-xs-12';
			break;
		case 'two':
			$boxClass .= 'col-lg-6 col-sm-6 col-md-6 col-xs-12';
			break;
		case 'three':
		default:
			$boxClass .= 'col-lg-4 col-sm-6 col-md-4 col-xs-12';
			break;
		case 'four':
			$boxClass .= 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'five':
			$boxClass .= 'col-lg-20percent col-sm-4 col-md-4 col-xs-12';
			break;
		case 'six':
			$boxClass .= 'col-lg-2 col-sm-4 col-md-4 col-xs-12';
			break;
		case 'mix':
			$boxClass .= 'col-lg-3 col-sm-6 col-md-3 col-xs-12';
			break;
		case 'fix':
			$boxClass .= 'blog-slider-box-width';
			break;
		case 'timeline':
			$boxClass .= 'ts-blogbox-timeline';
			break;
	}
	
	// adding term based class for Isotope sorting
	$boxClass .= ' '.themestek_box_class();
	
	
	if( $type == 'start' ){
		$return .= '<div class="'. $boxClass .'">';
	} else {
		$return .= '</div>';
	}
	
	
	return $return;
	
}
}







/**
 * Print html with title of the post.
 *
 * Create your own themestek_box_title() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if ( !function_exists( 'themestek_box_title' ) ){
function themestek_box_title() {
	$return = '';
	
	if( 'link' != get_post_format() && 'quote' != get_post_format() ){
		$return = '<div class="themestek-box-title"><h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4></div>';
	}
	
	
	return $return;
}
}









/**
 * Print blog description for blogbox shortcode
 *
 * Create your own themestek_blogbox_description() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if ( !function_exists( 'themestek_blogbox_description' ) ){
function themestek_blogbox_description($limit=''){
	
	$blog_text_limit = themestek_get_option('blogbox_text_limit');
	$return = '';
	
	// Short Description
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else if( $blog_text_limit>0 && $limit!='full' ){
		$return  = nl2br( ts_get_short_desc() );
	} else {
		global $more;
		$more = 0;
		$return = strip_shortcodes( nl2br(get_the_content( '' )) );
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
}
}








/**
 * Print blog description for blog shortcode
 *
 * Create your own themestek_blog_description() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if ( !function_exists( 'themestek_blog_description' ) ){
function themestek_blog_description($limit=''){
	
	$blog_text_limit = themestek_get_option('blog_text_limit');
	$return = '';
	
	// Short Description
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else if( $blog_text_limit>0 && $limit!='full' ){
		$return  = nl2br( ts_get_short_desc() );
	} else {
		global $more;
		$more = 0;
		$return = strip_shortcodes( nl2br(get_the_content( '' )) );
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
}
}







/**
 * Print blog readmore text for blogbox shortcode
 *
 * Create your own themestek_blogbox_readmore_text() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if ( !function_exists( 'themestek_blogbox_readmore_text' ) ){
function themestek_blogbox_readmore_text(){
	$blog_readmore_text = themestek_get_option('blog_readmore_text');
	$return             = esc_attr__('Read More', 'labtechco');
	
	// Get text from Theme Options
	if( !empty($blog_readmore_text) ){
		$return = esc_attr($blog_readmore_text);
	}
	
	return $return;
}
}





/**
 * Print Read More link
 *
 * Create your own themestek_blogbox_readmore() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 * @return void
 */
if ( !function_exists( 'themestek_blogbox_readmore' ) ){
function themestek_blogbox_readmore(){
	
	$return        = '';
	$readMore_text = themestek_blogbox_readmore_text();  // Read More word
	
	if( strpos(get_the_content(), '"more-link"')!==false && get_post_format()!='quote' && get_post_format()!='link' ) {
		$return .= '<div class="themestek-blogbox-footer-left">';
		$return .= '<a href="'.get_permalink().'">'.$readMore_text.'</a>';
		$return .= '</div>';
	}
	
	return $return;
	
}
}






if ( !function_exists( 'ts_get_short_desc' ) ){
function ts_get_short_desc(){
	$blog_text_limit = themestek_get_option('blog_text_limit');
	$content = '';
	if( $blog_text_limit>0 ){
		$content = get_the_content('',FALSE,'');
		$content = wp_strip_all_tags($content);
		$content = strip_shortcodes($content);
		$content = str_replace(']]>', ']]>', $content);
		$content = substr($content,0, $blog_text_limit );
		$content = trim(preg_replace( '/\s+/', ' ', $content));
		$content = $content.'...';
	}
	return $content;
}
}





/**
 * Print html with icon for current post.
 *
 * Create your own themestek_entry_icon() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if ( !function_exists( 'themestek_entry_icon' ) ){
function themestek_entry_icon() {
	$iconCode = '';
	$postFormat = get_post_format();
	if( is_sticky() ){ $postFormat = 'sticky'; }
	$icon = 'pencil';
	switch($postFormat){
		case 'sticky':
			$icon = 'sticky';
			break;
		case 'aside':
			$icon = 'aside';
			break;
		case 'audio':
			$icon = 'music';
			break;
		case 'chat':
			$icon = 'chat';
			break;
		case 'gallery':
			$icon = 'gallery';
			break;
		case 'image':
			$icon = 'picture';
			break;
		case 'link':
			$icon = 'link';
			break;
		case 'quote':
			$icon = 'quote-left';
			break;
		case 'status':
			$icon = 'status';
			break;
		case 'video':
			$icon = 'video';
			break;
	}
	
	$iconCode .= '<i class="ts-labtechco-icon-'.$icon.'"></i>';
	
	
	// return data
	return $iconCode;
	
}
}






/*
 *  ThemeStek Box Wrapper
 */
if( !function_exists('themestek_box_wrapper') ){
function themestek_box_wrapper( $position='start', $cptname='blog', $vars=array() ){
	
	$return 	 = '';
	$view        = (!empty($vars['view']))   ? $vars['view'] : 'top-image' ;
	$column      = (!empty($vars['column'])) ? $vars['column'] : 'three' ;
	$box_spacing = (!empty($vars['box_spacing'])) ? $vars['box_spacing'] : '' ;
	$boxview     = (!empty($vars['boxview'])) ? $vars['boxview'] : 'default' ;
	$sortable    = (!empty($vars['sortable'])) ? $vars['sortable'] : '' ;
	$txt_align   = (!empty($vars['txt_align'])) ? $vars['txt_align'] : '' ;
	$sortable_buttontype    = (!empty($vars['sortable_buttontype'])) ? $vars['sortable_buttontype'] : '' ;
	
	if( $position=='start' ){
		
		$classArray = array();
		
		// Data tags
		$datatags = ts_carousel_data_html( $vars );
		
		$classArray[] = 'themestek-boxes';
		$classArray[] = 'themestek-boxes-'.$cptname;
		$classArray[] = 'themestek-boxes-view-'.$boxview;
		$classArray[] = 'themestek-boxes-col-'. $column;
		$classArray[] = 'themestek-boxes-sortable-'. $sortable;
		$classArray[] = 'themestek-boxes-textalign-'. $txt_align;
		$classArray[] = 'themestek-boxes-sortablebutton-'. $sortable_buttontype;
		if( !empty($box_spacing) ){ $classArray[] = 'themestek-boxes-spacing-'. $box_spacing; }
		
		// Carousel special class for carousel arrows
		if ( $boxview=='carousel' ) {
			if( $vars['carousel_nav']=='above' || $vars['carousel_nav']=='below' ){
				$classArray[] = 'ts-boxes-carousel-arrows-' . esc_attr($vars['carousel_nav']);
				if ( !empty( $vars['txt_align'] ) ) {
					$classArray[] = 'ts-boxes-txtalign-' . $vars['txt_align'];
				}
			} else {
				$classArray[] = 'ts-boxes-carousel-arrows-' . esc_attr($vars['carousel_nav']);
			}
		}
		
		// CSS Animation
		if ( ! empty( $vars['css_animation'] ) ) {
			$classArray[] = ts_getCSSAnimation( $vars['css_animation'] );
		}
		// Extra class
		if ( ! empty( $vars['el_class'] ) ) {
			$classArray[] = $vars['el_class'];
		}
		
		//Design Options tab css class
		if( !empty($vars['css']) ){
			$classArray[] = ts_vc_shortcode_custom_css_class($vars['css']);
		}
		
		$return = '<div class="'. implode(' ',$classArray) .'"'. $datatags .'>
		<div class="themestek-boxes-inner themestek-boxes-'. $cptname .'-inner ">';
		
		
	} else {
		
		$return = '</div><!-- .themestek-boxes-inner -->   </div><!-- .themestek-boxes -->  ';
		
	}
	
	return $return;
	
}
}








if( !function_exists('themestek_get_query_args') ){
function themestek_get_query_args( $cptname='blog', $vars=array() ){
	
	$show     	= (!empty($vars['show'])) ? $vars['show'] : '3' ;
	$category 	= (!empty($vars['category'])) ? $vars['category'] : '' ;
	$orderby	= (!empty($vars['orderby'])) ? $vars['orderby'] : 'date' ;
	$order		= (!empty($vars['order'])) ? $vars['order'] : 'DESC' ;
	
	$valid_post_types = array(
		'blog',
		'portfolio',
		'service',
		'team',
		'testimonial',
		'client',
		'events',
	);
	
	$post_type = array(
		'blog' => array(
			'post_type' => 'post',
			'taxonomy' 	=> 'category',
		),
		'portfolio' => array(
			'post_type' => 'ts-portfolio',
			'taxonomy' 	=> 'ts-portfolio-category',
		),
		'service' => array(
			'post_type' => 'ts-service',
			'taxonomy' 	=> 'ts-service-category',
		),
		'team' => array(
			'post_type' => 'ts-team-member',
			'taxonomy' 	=> 'ts-team-group',
		),
		'testimonial' => array(
			'post_type' => 'ts-testimonial',
			'taxonomy' 	=> 'ts-testimonial-group',
		),
		'client' => array(
			'post_type' => 'ts-client',
			'taxonomy' 	=> 'ts-client-group',
		),
		'events' => array(
			'post_type' => 'tribe_events',
			'taxonomy' 	=> 'tribe_events_cat',
		),
	);
	
	
	
	// check if not called directly
	if( count($vars)>0 ){
		
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		// default args passing blog data, if no matching post type
		$args = array(
			'post_type'				=> 'post',
			'paged'                 => esc_attr($paged),
			'ignore_sticky_posts'	=> true,
			'orderby'				=> esc_attr($orderby),
			'order'					=> esc_attr($order),
		);
	
		// args if post type names match valid post types.  
		if( in_array( $cptname, $valid_post_types ) ){
			
			$args = array(
				'post_type'				=> $post_type[$cptname]['post_type'],
				'paged'                 => esc_attr($paged),
				'posts_per_page'		=> $show,
				'ignore_sticky_posts'	=> true,
				'orderby'				=> $orderby,
				'order'					=> $order,
			);
			// Creating array for multiple category
			if( strpos($category, ',') !== false ) {
				$category = explode(',',$category);
			}
			// Category
			if( $category != '' ){
				$args['tax_query'] = array(
					array(
						'taxonomy' 	=> $post_type[$cptname]['taxonomy'],
						'field' 	=> 'slug',
						'terms' 	=> $category
					),
				);
			}
			
		}

		return $args;
	
	}
	
}
}






/**
 * Blogbox meta boxes - show or hide
 *
 * Create your own themestek_blogbox_show_meta() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if ( !function_exists( 'themestek_blogbox_show_meta' ) ){
function themestek_blogbox_show_meta() {
	return true;
}
}





/**
 * Blogbox meta boxes
 *
 * Create your own themestek_blogbox_single_meta() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if ( !function_exists( 'themestek_blogbox_single_meta' ) ){
function themestek_blogbox_single_meta( $option='date', $args=array() ) {
	$return      = '';
	$icon        = '';
	$icon_prefix = 'ts-labtechco-icon';
	
	switch($option){
		
		case 'date' :
		default :
			$icon           = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-date"></i>' ;
			$date_structure = ( !empty($args['date_structure']) ) ? $args['date_structure'] : 'j M Y' ;
			$return         = get_the_time( $date_structure );
			break;
			
		case 'user' :
			$icon   = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-user"></i>' ;
			$return = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
			break;
			
		case 'comment' :
			$icon   = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-comment"></i>' ;
			$return = '';
			break;
			
		case 'category' :
			$icon            = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-category"></i>' ;
			$categories_list = get_the_category_list( esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
			if ( !empty($categories_list) ) {
				$return = sprintf( '<span class="themestek-category-links">%s</span>',
					$categories_list
				);
			}
			break;
			
		case 'tags' :
			$icon      = ( !empty($args['icon']) ) ? $args['icon'] : '<i class="'. $icon_prefix .'-tags"></i>' ;
			$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
			if ( $tags_list ) {
				$return = sprintf( '<span class="themestek-tags-links">%s</span>',
					$tags_list
				);
			}
			break;
			
	}
	
	
	// now preparing the output
	if( $return!='' ){
		$return = '<span class="themestek-blogbox-meta-row themestek-blogbox-meta-row-'. $option .'">'. $icon .' '. $return .'</span>';
	}
	
	return $return;
	
}
}








/* =============================================================== */
/* -------------------- Titlebar functions  ---------------------- */

if( !function_exists('themestek_titlebar_classes') ){
function themestek_titlebar_classes(){
	$titlebar_bg_color    = themestek_get_option('titlebar_bg_color');
	$titlebar_text_color  = themestek_get_option('titlebar_text_color');
	$titlebar_view        = themestek_get_option('titlebar_view');
	$titlebar_background  = themestek_get_option('titlebar_background');
	$breadcrumb_on_bottom = themestek_get_option('breadcrumb_on_bottom');
	
	//global $ts_inline_css;
	$reurn                = array();
	$titlebar_if_bg_image = 'no';
	$breadcrum_on_bottom  = "";
	
	$titlebar_viewlist  = array( 'default','allleft','allright' );
	
	
	
	
	// If bg image is there
	if( !empty($titlebar_background['image']) ){
		$titlebar_if_bg_image = 'yes';
	}
	
	// Breadcrumb on bottom
	if( !empty($breadcrumb_on_bottom) && $breadcrumb_on_bottom == 'yes' ){
		$breadcrum_on_bottom = "yes";
	}
	
	
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_themestek_metabox_group', true );
		
		// ** ALL bg options ** 
		if( !empty($single_tbar_options['titlebar_bg_custom_options']) && $single_tbar_options['titlebar_bg_custom_options']=='custom' ){
			
			// BG  Color
			if( !empty($single_tbar_options['titlebar_bg_color']) ){
				$titlebar_bg_color = $single_tbar_options['titlebar_bg_color'];
			}
			
			// If bg image is there
			if( !empty($single_tbar_options['titlebar_background']['image']) ){
				$titlebar_if_bg_image = 'yes';
			} else {
				$titlebar_if_bg_image = 'no';
			}
			
		}
		

		
		if( !empty($single_tbar_options['titlebar_font_custom_options']) && $single_tbar_options['titlebar_font_custom_options']=='custom' ){
			
			// Text Color
			if( !empty($single_tbar_options['titlebar_text_color']) && !empty($single_tbar_options['titlebar_text_color']) ){
				$titlebar_text_color = $single_tbar_options['titlebar_text_color'];
			}
		
		}
		
		// Titlebar Align
		if( !empty($single_tbar_options['titlebar_view']) && !empty($single_tbar_options['titlebar_view']) ){
			$titlebar_view = $single_tbar_options['titlebar_view'];
		}
		

		
	}
	
	
	
	if( !empty($titlebar_bg_color) ){
		$reurn[] = 'ts-bgcolor-'.$titlebar_bg_color;
	}
	if( !empty($titlebar_view) ){
		$reurn[] = 'ts-titlebar-align-'.$titlebar_view;
	}
	if( !empty($titlebar_text_color) ){
		$reurn[] = 'ts-textcolor-'.$titlebar_text_color;
	}
	if( !empty($titlebar_if_bg_image) ){
		$reurn[] = 'ts-bgimage-'.$titlebar_if_bg_image;
	}
	if( $breadcrum_on_bottom == 'yes' && in_array( $titlebar_view, $titlebar_viewlist ) ){
		$reurn[] = 'ts-breadcrumb-on-bottom';
	}
	
	$reurn = implode( ' ', $reurn );
	
	// Return data
	return $reurn;
	
}
}







if( !function_exists('themestek_get_framework_raw_option') ){
function themestek_get_framework_raw_option( $element_id ){
	$return = '';
	
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
	
	foreach( $ts_framework_options as $ts_framework_option ){
		foreach( $ts_framework_option as $options ){
			if( is_array($options) && count($options)>0 ){
				foreach( $options as $option ){
					if( !empty($option['id']) && $option['id']==$element_id ){
						$return = $option['output'];
					}
				}
			}
		}
	}
	
	return $return;
	
}
}









if( !function_exists('themestek_titlebar_title') ){
function themestek_titlebar_title(){
	
	
	
	$title    = get_the_title();
	$subtitle = '';
	
	
	if( is_singular() || is_home() ){  // single page, single post and single cpt
		$pageID = get_the_ID();
		if( is_home() ){
			$pageID = get_option( 'page_for_posts' );
			$title = esc_attr__( 'Blog', 'labtechco' );  // Setting for Titlebar title
		}
		
		
		
		$single_tbar_settings = get_post_meta( $pageID, '_themestek_metabox_group', true );
		$title    = ( !empty($single_tbar_settings['title']) ) ? trim($single_tbar_settings['title']) : $title ;
		$subtitle = ( !empty($single_tbar_settings['subtitle']) ) ? trim($single_tbar_settings['subtitle']) : $subtitle ;
		
		
		
		
	} else if( function_exists('is_woocommerce')  && is_woocommerce() ){ // WooCommerce
		$pageID = get_option( 'woocommerce_shop_page_id' );
		
		$single_tbar_settings = get_post_meta( $pageID, '_themestek_metabox_group', true );
		$title    = ( !empty($single_tbar_settings['title']) ) ? trim($single_tbar_settings['title']) : get_the_title($pageID) ;
		$subtitle = ( !empty($single_tbar_settings['subtitle']) ) ? trim($single_tbar_settings['subtitle']) : '' ;
	
	
	
	
	} else if( is_category() ){ // Category
		$adv_tbar_catarc = themestek_get_option('adv_tbar_catarc');
		$adv_tbar_catarc = ( !empty($adv_tbar_catarc) ) ? esc_attr($adv_tbar_catarc.' %s') : esc_attr__('Category Archives: %s', 'labtechco') ;
		$title = sprintf(
			$adv_tbar_catarc,
			'<span class="ts-titlebar-heading ts-tbar-category-title">' . esc_attr(single_cat_title( '', false)) . '</span>'  // for WPML
		);
		
		
		
	} else if( is_tag() ){ // Tag
		$adv_tbar_tagarc = themestek_get_option('adv_tbar_tagarc');
		$adv_tbar_tagarc = ( !empty( $adv_tbar_tagarc ) ) ? esc_attr($adv_tbar_tagarc.' %s') : esc_attr__('Tag Archives: %s','labtechco') ;
		$title = sprintf(
			$adv_tbar_tagarc,
			'<span class="ts-titlebar-heading ts-tbar-tag-title">' . esc_attr( single_tag_title( '', false)) . '</span>'  // for WPML
		);
		
	
	
		
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		
		if( is_tax('ts-team-group') || is_tax('ts-portfolio-category') ){
			$title = '<span class="ts-titlebar-heading ts-tbar-taxonomy-title">' . esc_attr($tax->name) . '</span>';
			
		} else {
			$adv_tbar_postclassified = themestek_get_option('adv_tbar_postclassified');
			global $wp_query;
			$adv_tbar_postclassified = ( !empty($adv_tbar_postclassified) ) ? esc_attr($adv_tbar_postclassified.' %s') : esc_attr__('Posts classified under: %s', 'labtechco') ;
		
			$title = sprintf(
				$adv_tbar_postclassified,
				'<span>' . esc_attr($tax->name) . '</span>'
			);
			
		}
			
	
		
	} else if( is_author() ){ // Author
		
		global $post;
		$author_id          = $post->post_author;
		$adv_tbar_authorarc = themestek_get_option('adv_tbar_authorarc');
		$adv_tbar_authorarc = ( !empty( $adv_tbar_authorarc ) ) ? esc_attr($adv_tbar_authorarc.' %s') : esc_attr__('Author Archives: %s', 'labtechco');
		
		$title = sprintf(
			$adv_tbar_authorarc,
			'<span class="ts-titlebar-heading ts-tbar-author-title">' . get_the_author_meta( 'display_name', $author_id ) . '</span>'
		);
		
		



	} else if( is_search()  ){ // Search Results
		$title    = sprintf( esc_attr__( 'Search Results for %s', 'labtechco' ), '<span class="ts-titlebar-heading ts-tbar-search-title">' . get_search_query() . '</span>' );

		
		
		
		
	} else if( is_404() ){ // 404
		if( function_exists('tribe_is_past') && function_exists('tribe_is_upcoming') && (tribe_is_past() || tribe_is_upcoming() || tribe_is_month() || tribe_is_day() && !is_tax()) ){
			$title = esc_attr__( 'EVENTS', 'labtechco' );
		}
	

	
	} else if( is_archive() ){
		// Title for events calendar pages
		if( function_exists('tribe_is_month') && tribe_is_month() && !is_tax() ) { // The Main Calendar Page
			$title = esc_attr__( 'Events Calendar', 'labtechco' );
			
		} elseif( function_exists('tribe_is_month') && tribe_is_month() && is_tax() ) { // Calendar Category Pages
			$title = single_term_title('', false);
			
		} elseif( function_exists('tribe_is_event') &&  tribe_is_event() && !tribe_is_day() && !is_single() ) { // The Main Events List
			$title = esc_attr__( 'Events', 'labtechco' );

		} elseif( function_exists('tribe_is_event') && tribe_is_event() && is_single() ) { // Single Events
			$title = get_the_title();
			
		} elseif( function_exists('tribe_is_day') && tribe_is_day() ) { // Single Event Days
			global $wp_query;
			$title = esc_attr__( 'Events on: ', 'labtechco' ). date('F j, Y', strtotime($wp_query->query_vars['eventDate']));
			
		} elseif( function_exists('tribe_is_venue') && tribe_is_venue() ) { // Single Venues
			$title =	get_the_title();
			
			
		// BBPress section
		} else if( function_exists('is_bbpress') && is_bbpress() ) {
			$title = esc_attr__( 'Forum', 'labtechco' );
		} else if( is_post_type_archive() ){
			$title = post_type_archive_title('', false);
		} else if ( is_day() ){
			$title = sprintf( esc_attr__( 'Daily Archives: %s', 'labtechco' ), '<span>' . get_the_date() . '</span>' );
		} elseif( is_month() ){
			$title = sprintf( esc_attr__( 'Monthly Archives: %s', 'labtechco' ), '<span>' . get_the_date( esc_attr_x( 'F Y', 'monthly archives date format', 'labtechco' ) ) . '</span>' );
		} elseif( is_year() ){
			$title = sprintf( esc_attr__( 'Yearly Archives: %s', 'labtechco' ), '<span>' . get_the_date( esc_attr_x( 'Y', 'yearly archives date format', 'labtechco' ) ) . '</span>' );
		} else {
			if( function_exists('is_bbpress') && is_bbpress() ) {
				$title = esc_attr__( 'Forum', 'labtechco' );
			} else {
				$title = esc_attr__( 'Archives', 'labtechco' );
			}
		};
		
		
		
	} else {
		$title = get_the_title();
		
	}
	
	
	// return data
	$return  = '';
	$return .= ( !empty($title) ) ? '<h1 class="entry-title"> '. do_shortcode($title) . '</h1>' : '' ;
	$return .= ( !empty($subtitle) ) ? '<h3 class="entry-subtitle"> '. do_shortcode($subtitle) .'</h3>' : '' ;
	
	if( $return!='' ){
		$return = '<div class="entry-title-wrapper"><div class="container">'.$return.'</div></div>';
	}
	
	// Return data
	return $return;
	
}
}










if( !function_exists('themestek_titlebar_content') ){
function themestek_titlebar_content(){
	
	$titlebar_hide_breadcrumb = themestek_get_option('titlebar_hide_breadcrumb');
	$titlebar_view            = themestek_get_option('titlebar_view');
	
	$leftContent  = '';
	$rightContent = '';
	
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	
	
	
	// Left content
	$leftContent = themestek_titlebar_title();
	
	// Right content
	if( !empty($titlebar_hide_breadcrumb) && $titlebar_hide_breadcrumb!='yes' ){
		$rightContent = themestek_titlebar_breadcrumb();
	}
	
	
	
	// if single page,post etc
	if( $post_id ){
		$single_titlebar = get_post_meta( $post_id, '_themestek_metabox_group', true );
		// View
		if( !empty($single_titlebar['titlebar_hide_breadcrumb']) ){
			if( $single_titlebar['titlebar_hide_breadcrumb'] == 'yes' ){
				$rightContent = '';
			} else if( $single_titlebar['titlebar_hide_breadcrumb'] == 'no' ){
				$rightContent = themestek_titlebar_breadcrumb();
			}
		}
	}
	
	
	
	// All content
	$allContent = $leftContent . $rightContent;
	if( !empty($titlebar_view) && $titlebar_view == 'right' ){  // Right align
		$allContent = $rightContent . $leftContent;
	}
	
	// if single page,post etc
	if( $post_id ){
		$single_titlebar = get_post_meta( $post_id, '_themestek_metabox_group', true );
		// View
		if( !empty($single_titlebar['titlebar_view']) && $single_titlebar['titlebar_view'] == 'right' ){  // Right align
			$allContent = $rightContent . $leftContent;
		}
	}
	
	
	
	if( !empty($titlebar_view) && $titlebar_view == 'right' ){  // Right align
		$allContent = $rightContent . $leftContent;
	}
	
	
	
	// Return data
	return $allContent;
	
	
}
}




if( !function_exists('themestek_titlebar_show') ){
function themestek_titlebar_show(){
	$return = true;
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$single_view = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($single_view['hide_titlebar']) && $single_view['hide_titlebar']==true ){
			$return = false;
		}
	}
	
	return $return;
}
}







if( !function_exists('themestek_titlebar_breadcrumb') ){
function themestek_titlebar_breadcrumb(){
	$return = '';
	if(function_exists('bcn_display')){
		$return .=  '<!-- Breadcrumb NavXT output -->';
		$return .= bcn_display(true);
	} else if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$return .=  '<!-- woocommerce_breadcrumb -->';
		ob_start();
		woocommerce_breadcrumb(); //would normally get printed to the screen/output to browser
		$ts_wc_bcrumb_output = ob_get_contents();
		ob_end_clean();
		$return .= $ts_wc_bcrumb_output;
	}
	
	if( !empty($return) ){
		$return = '<div class="breadcrumb-wrapper"><div class="container"><div class="breadcrumb-wrapper-inner">'. $return .'</div></div></div>';
	}
	
	return $return;
	
}
}






/**
 *  Adding inline style css for Titlebar
 */
if( !function_exists('themestek_titlebar_inline_style') ){
function themestek_titlebar_inline_style(){
	$css = '';
	
	// Singuler of shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$page_titlebar = get_post_meta( $post_id, '_themestek_metabox_group' ,true );
		
		// Featured image as Titlebar BG image
		$titlebar_bg_featured_img	= themestek_get_option('titlebar_bg_featured_img');
		$featured_img				= get_the_post_thumbnail_url();
		
		if( !empty($titlebar_bg_featured_img) && is_array($titlebar_bg_featured_img) ){
			if( is_singular() && in_array( get_post_type() , $titlebar_bg_featured_img ) ){
				$css .= 'body div.ts-titlebar-wrapper{background-image: url("' . $featured_img . '") !important; }';
			}
		}
		
		// Background options
		if( !empty($page_titlebar['titlebar_bg_custom_options']) && $page_titlebar['titlebar_bg_custom_options']=='custom' ){
			
			// Featured image as bg image
			if( !empty($featured_img_src) ){
				$page_titlebar['titlebar_background']['image'] = $featured_img;
			}
			
			$bg_exclude = array();
			if( !empty($page_titlebar['titlebar_bg_color']) && $page_titlebar['titlebar_bg_color']!='custom' ){
				$bg_exclude = array('background-color');
			}
			
			
			$css .= themestek_get_background_css(
				'body div.ts-titlebar-wrapper',
				$page_titlebar['titlebar_background'],
				$bg_exclude // exclude array
			);
		}
		
		// custom fonts
		if( !empty($page_titlebar['titlebar_font_custom_options']) && $page_titlebar['titlebar_font_custom_options']=='custom' ){
			
			// heading
			$css .= themestek_get_font_css(
				'.ts-titlebar-wrapper .ts-titlebar-main h1.entry-title',
				$page_titlebar['titlebar_heading_font'],
				true
			);
			
			// sub-heading
			$css .= themestek_get_font_css(
				'.ts-titlebar-wrapper .ts-titlebar-main h3.entry-subtitle',
				$page_titlebar['titlebar_subheading_font'],
				true
			);
			
			// breadcrumb
			$css .= themestek_get_font_css(
				'.ts-titlebar .breadcrumb-wrapper, .ts-titlebar .breadcrumb-wrapper a',
				$page_titlebar['titlebar_breadcrumb_font'],
				true
			);
			
			// add Google fonts css
			themestek_enqueue_google_fonts(
				array(
					$page_titlebar['titlebar_heading_font'],
					$page_titlebar['titlebar_subheading_font'],
					$page_titlebar['titlebar_breadcrumb_font']
				)
			);
			
		}
		
		
		
		// Titlebar Height
		if( !empty($page_titlebar['titlebar_height']) ){
			$css .= '.ts-titlebar-wrapper .ts-titlebar .ts-titlebar-inner-wrapper{height:'. $page_titlebar['titlebar_height'] .'px;}';
		}
	
	}
	
	return $css;
	
}
}





/**
 *  themestek_enqueue_google_fonts function
 */
if( !function_exists('themestek_enqueue_google_fonts') ){
function themestek_enqueue_google_fonts( $fontsdata ){
	
	foreach( $fontsdata as $font ){
		if( !empty($font['family']) ){
			themestek_footer_google_fonts_array( $font['family'] , $font['variant'] );
		}
	}
	
}
}







/* =============================================================== */
/* --------------------- Topbar functions  ----------------------- */

if( !function_exists('themestek_topbar_show') ){
function themestek_topbar_show(){
	$return = true;
	
	
	$show_topbar = themestek_get_option('show_topbar');
	if( isset($show_topbar) ){
		$return = $show_topbar;
	}
	
	
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$single_view = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($single_view['show_topbar']) ){
			if( $single_view['show_topbar']=='yes' ){
				$return = true;
			} else if( $single_view['show_topbar']=='no' ){
				$return = false;
			}
		}
	}
	
	return $return;
}
}






if( !function_exists('themestek_topbar_classes') ){
function themestek_topbar_classes(){
	global $ts_inline_css;
	$full_wide_elements = themestek_get_option('full_wide_elements');
	$topbar_bg_color    = themestek_get_option('topbar_bg_color');
	$topbar_text_color  = themestek_get_option('topbar_text_color');
	$layout             = themestek_get_option('layout');
	$return = array();

	
	// Singuler or Shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_themestek_metabox_group', true );
		
		if( !empty($single_tbar_options['topbar_bg_color']) ){
			$topbar_bg_color = $single_tbar_options['topbar_bg_color'];
		}
		
		// Text Color
		if( !empty($single_tbar_options['topbar_text_color']) ){
			$topbar_text_color = $single_tbar_options['topbar_text_color'];
		}
		
	}  // if
	
	
	
	if( !empty($topbar_bg_color) ){
		$return[] = 'ts-bgcolor-'.$topbar_bg_color;
	}
	if( !empty($topbar_view) ){
		$return[] = 'ts-topbar-align-'.$topbar_view;
	}
	if( !empty($topbar_text_color) ){
		$return[] = 'ts-textcolor-'.$topbar_text_color;
	}
	
	//Full Wide class
	if( $layout=='fullwide' && is_array($full_wide_elements) && count($full_wide_elements)>0 ){
		if( in_array('topbar', $full_wide_elements ) ){
			$return[] = 'container-full';
		}
	} 
	
	// output
	$return = implode( ' ', $return );
	
	
	// Return data
	return $return;

}
}







if( !function_exists('themestek_topbar_content') ){
function themestek_topbar_content(){
	$return = $topbar_left_text = $topbar_right_text = '';
	$topbar_left_text  = themestek_get_option('topbar_left_text');
	$topbar_right_text = themestek_get_option('topbar_right_text');
	
	// Remove [ts-social-links] shortcode if not exists
	if ( !shortcode_exists( 'ts-social-links' ) ) {
		$topbar_right_text = str_replace('[ts-social-links]', '', $topbar_right_text );
	}
	
	
	
	// Singuler or Shop page
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') ) {
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_themestek_metabox_group', true );
		
		if( !empty($single_tbar_options['topbar_left_text']) ){
			$topbar_left_text = $single_tbar_options['topbar_left_text'];
		}
		
		// Right text
		if( !empty($single_tbar_options['topbar_right_text']) ){
			$topbar_right_text = $single_tbar_options['topbar_right_text'];
		}
		
	}
	
	
	
	// Floating Bar button
	if( themestek_fbar_show()==true ){
		$topbar_right_text .= '
		<span class="themestek-fbar-btn ' . themestek_sanitize_html_classes(themestek_fbar_btn_classes()) . '">
			<a href="#" class="themestek-fbar-btn-link">
				' . themestek_fbar_open_icon() . '
				' . themestek_fbar_close_icon() . '
				<span class="ts-hide">' . esc_attr__('Open', 'labtechco') . '</span>
			</a>
		</span>';
	}
	
	
	
	if( !empty($topbar_left_text) ){
		$topbar_left_text = '<div class="ts-table-cell">'. do_shortcode($topbar_left_text) .'</div>';
	}
	if( !empty($topbar_right_text) ){
		$topbar_right_text = '<div class="ts-table-cell ts-align-right">'. do_shortcode($topbar_right_text) .'</div>';
	}
	
	if( !empty($topbar_left_text) || !empty($topbar_right_text) ){
		$return = '<div class="ts-table ts-pre-header-content">'. $topbar_left_text . $topbar_right_text .'</div>';
	}
	
	
	
	// Return data
	return $return;
	
}
}





/**
 *  Topbar custom CSS code
 */
if( !function_exists('themestek_topbar_inline_style') ){
function themestek_topbar_inline_style(){
	$return                   = '';
	$topbar_bg_color          =  themestek_get_option('topbar_bg_color');
	$topbar_bg_custom_color   =  themestek_get_option('topbar_bg_custom_color');
	$topbar_text_color        =  themestek_get_option('topbar_text_color');
	$topbar_text_custom_color =  themestek_get_option('topbar_text_custom_color');
	
	// Getting singluar id or shop id
	$post_id = false;
	if( is_singular() ){
		$post_id = get_the_ID();
	} else if( function_exists('is_woocommerce') && is_woocommerce() ) {
		$post_id = get_option( 'woocommerce_shop_page_id' );
	}
	
	
	// Single overwrite
	if( $post_id ){
		$single_tbar_options = get_post_meta( $post_id, '_themestek_metabox_group', true );
		
		// BG Color
		if( !empty($single_tbar_options['topbar_bg_color']) ){
			$topbar_bg_color        = $single_tbar_options['topbar_bg_color'];
			if( $single_tbar_options['topbar_bg_color']=='custom' ){
				$topbar_bg_custom_color = $single_tbar_options['topbar_bg_custom_color'];
			}
		}
		
		// Text Color
		if( !empty($single_tbar_options['topbar_text_color']) ){
			$topbar_text_color        = $single_tbar_options['topbar_text_color'];
			if( $single_tbar_options['topbar_text_color'] == 'custom' ){
				$topbar_text_custom_color = $single_tbar_options['topbar_text_custom_color'];
			}
		}
		
	}
	
	
	// BG Color CSS code
	if( $topbar_bg_color=='custom' ){
		$return .= '.themestek-topbar-wrapper{background-color:'. $topbar_bg_custom_color .';}';
	}
	
	// Text Color CSS code
	if( $topbar_text_color=='custom' ){
		$return .= '.themestek-topbar-wrapper, .themestek-topbar-wrapper a{color:'. $topbar_text_custom_color .';}';
	}
	
	return $return;
	
}
}





/* =============================================================== */
/* --------------------- Header functions  ----------------------- */


/**
 *  Main logo
 */
if( !function_exists('themestek_site_logo') ){
function themestek_site_logo( $logo_type = '' ){
	$logoimg_sticky = themestek_get_option('logoimg_sticky');
	$logoseo        = themestek_get_option('logoseo');
	$logotype       = themestek_get_option('logotype');
	$return     = '';
	$stickylogo = '';
	
	
	// sticky logo class
	$stickyLogoClass = 'no';
	if( !empty($logoimg_sticky['id']) || !empty($logoimg_sticky['thumb-url']) || !empty($logoimg_sticky['full-url']) ){
		$stickyLogoClass = 'yes';
	}
	
	// Logo code
	$logo_html = themestek_logo();
	
	// Logo tag for SEO
	$logotag    = ( $logoseo=='h1homeonly' && !is_front_page() ) ? 'span' : 'h1' ;
	
	// Preparing logo
	$return .= '<div class="headerlogo themestek-logotype-'. sanitize_html_class($logotype) .' ts-stickylogo-'. sanitize_html_class($stickyLogoClass) .'">';
		$return .= '<'.esc_attr($logotag) .' class="site-title">';
			$return .= '<a class="home-link" href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'" rel="home">';
				$return .= $logo_html;
			$return .= '</a>';
		$return .= '</'. esc_attr($logotag) .'>';
		$return .= '<h2 class="site-description">'. get_bloginfo( 'description' ) .'</h2>';
	$return .= '</div>';
	return $return;
}
}






if( !function_exists('themestek_header_links') ){
function themestek_header_links(){
	$return         = '';
	$header_search  = themestek_get_option('header_search');
	$wc_header_icon = themestek_get_option('wc-header-icon');
	$show_topbar    = themestek_get_option('show_topbar');
	$header_style   = themestek_get_option('headerstyle');
	$class          = 'ts-fbar-link-only';
	
	// Floating bar icon
	if( themestek_fbar_show()==true && $show_topbar==false ){
		$return .= '
		<span class="themestek-fbar-btn ' . themestek_sanitize_html_classes(themestek_fbar_btn_classes()) . '">
			<a href="#" class="themestek-fbar-btn-link">
				' . themestek_fbar_open_icon() . '
				' . themestek_fbar_close_icon() . '
				<span class="ts-hide">' . esc_attr__('Open', 'labtechco') . '</span>
			</a>
		</span>';
	}

	
	// Woo Commerce cart icon
	if( function_exists('is_woocommerce') && $wc_header_icon==true ){
		global $woocommerce;
		$class    = '';
		$cart_url = wc_get_cart_url();
		$count    = $woocommerce->cart->cart_contents_count;
		
		if( empty($count) ){ $count = 0; }
		
		if( isset($woocommerce->cart->cart_contents_count) && $woocommerce->cart->cart_contents_count > 0 ){
			$total_count = $woocommerce->cart->cart_contents_count;
		}
		
		$return  .= '<span class="ts-header-icon ts-header-wc-cart-link"><a href="' . $cart_url . '"><i class="ts-labtechco-icon-shopping-cart"></i><span class="number-cart">' . esc_attr($count) . '</span></a></span>';
	}
	
	
	// Search icon
	if( $header_search==true ){
		$class   = '';
		$return .= '<span class="ts-header-icon ts-header-search-link"><a href="#"><i class="ts-labtechco-icon-search-1"></i></a></span>';
	}
	
	
	
	if( $return!='' ){
		$return = '<div class="ts-header-icons ' . $class . '">'. $return .'</div>';
	}
	
	return $return;
}
}




/**
 *  Header container classes
 */
if( !function_exists('themestek_header_container_class') ){
function themestek_header_container_class(){
	
	$class = '';
	$class = themestek_container_class('header');
	
	// Return data
	return $class;
	
}
}


/**
 *  Page container class (optional)
 */
if( !function_exists('themestek_page_container_optional') ){
function themestek_page_container_optional(){
	$return = '';
	
	if( is_page() ){
		if( !function_exists('vc_lean_map') ){
			$return = 'container';
		} else {
			$page_object = get_page( get_the_ID() );
			$content     =  $page_object->post_content;
			if ( strpos( $content, '[vc_row' ) === false ) {
				$return = 'container';
			}
		}
	}
	
	return $return;
	
}
}







/**
 *  Header container classes
 */
if( !function_exists('themestek_header_widget_text_color_class') ){
function themestek_header_widget_text_color_class(){
	$return             = '';
	$widget_text_color  = themestek_get_option('header_widget_text_color');
	$header_bg_color    = themestek_get_option('header_bg_color');
	
	if( !empty($widget_text_color) && 'custom' == $header_bg_color ){
		$return = 'ts-textcolor-' . $widget_text_color . ' ts-header-widget-text-' . $widget_text_color;
	}
	return $return;
}
}




/**
 *  Footer container classes
 */
if( !function_exists('themestek_footer_container_class') ){
function themestek_footer_container_class( $class = array() ){
	
	$class = '';
	$class = themestek_container_class('footer');
	
	// Return data
	return $class;
	
}
}


/**
 *  Floating Bar container classes
 */
if( !function_exists('themestek_floatingbar_container_class') ){
function themestek_floatingbar_container_class(){
	
	$class = '';
	$class = themestek_container_class('floatingbar');
	
	// Return data
	return $class;
	
}
}


/**
 *  Topbar container classes
 */
if( !function_exists('themestek_topbar_container_class') ){
function themestek_topbar_container_class(){
	
	$class = '';
	$class = themestek_container_class('topbar');
	
	// Return data
	return $class;
	
}
}


/**
 *  Content-area container classes
 */
if( !function_exists('themestek_contentarea_container_class') ){
function themestek_contentarea_container_class(){
	
	$class = '';
	$class = themestek_container_class('content');
	
	// Return data
	return $class;
	
}
}


/**
 *   Container classes for wide and full wide layout
 */
if( !function_exists('themestek_container_class') ){
function themestek_container_class($section='header'){
	
	$class              = '';
	$layout             = themestek_get_option('layout');
	$full_wide_elements = themestek_get_option('full_wide_elements');
	
	if( $layout=='fullwide' && is_array($full_wide_elements) && in_array($section, $full_wide_elements) ){
		$class = 'container-fullwide';
	} else {
		$class = 'container';
	}
	if( !$section=='topbar' ){
		$class .= ' ts-container-for-'.$section; // adding general class
	}
	
	return $class;
	
}
}





/**
 *  Header main classes
 */
if( !function_exists('themestek_header_class') ){
function themestek_header_class( $extra_class='' ){
	$header_bg_color              = themestek_get_option( 'header_bg_color' );
	$header_responsive_icon_color = themestek_get_option( 'header_responsive_icon_color' );
	$megamenu_override            = themestek_get_option( 'megamenu-override' );
	$sticky_header_bg_color       = themestek_get_option( 'sticky_header_bg_color' );
	$header_menu_position         = themestek_get_option( 'header_menu_position' );
	$header_text_abovemenu		  = themestek_get_option('header_text_abovemenu');
	
	$class				= array();
	$headerstyle 		= themestek_get_headerstyle();
	$valid_headerstyle	= array(
							'classic',
							'classic-overlay',
						);
	
	
	// header bg class
	if( !empty($header_bg_color) ) {
		$class[] = 'ts-bgcolor-'.esc_attr( $header_bg_color );
	};
	
	// sticky header bg class
	if( !empty($sticky_header_bg_color) ) {
		$class[] = 'ts-sticky-bgcolor-'.esc_attr( $sticky_header_bg_color );
	};
	
	// Responsive icon (like responsive menu, cart icon, search icon) color
	if( !empty($header_responsive_icon_color) && $header_bg_color=='custom' ) {
		$class[] = 'ts-responsive-icon-'.esc_attr( $header_responsive_icon_color );
	};
	
	
	// Header Menu Postion class for specific header styles only
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $header_menu_position ) ){
		$class[] = 'ts-header-menu-position-'. sanitize_html_class( $header_menu_position );
	}
	
	
	// Override Max Mega Menu style
	if( $megamenu_override == true ){
		$class[] = 'ts-mmmenu-override-yes';
	}
	
	
	// For "CLASSIC INFO STACK" header style only... Check if content above menu is set or not and add class on it
	$ts_above_content_class = 'ts-above-content-yes';
	if( $header_text_abovemenu=='' && 'classic2'==$headerstyle ){
		$ts_above_content_class = 'ts-above-content-no';
	}
	$class[] = $ts_above_content_class;
	
	
	
	// extra class
	if( !empty($extra_class) ){
		$class[] = $extra_class;
	}
	
	// processing and preparing all class
	if( count($class)>0 ){
		$class = implode(' ', $class );
	} else {
		$class = '';
	}
	
	// Return data
	return $class;

}
}





/**
 *  Header main classes
 */
if( !function_exists('themestek_header_w_class') ){
function themestek_header_w_class( $extra_class='' ){
	$class					= array();
	$header_text_abovemenu	= themestek_get_option('header_text_abovemenu');
	$header_bg_color		= themestek_get_option('header_bg_color');
	$headerstyle 			= themestek_get_headerstyle();
	
	
	// Common class
	$class[] = 'ts-stickable-header-w';
	
	
	// For "CLASSIC INFO STACK" header style only... Check if content above menu is set or not and add class on it
	$ts_above_content_class = 'ts-above-content-yes';
	if( $header_text_abovemenu=='' && 'classic2'==$headerstyle ){
		$ts_above_content_class = 'ts-above-content-no';
	}
	$class[] = $ts_above_content_class;
	
	
	
	// header bg color in wraper div
	if( !empty($header_bg_color) ){
		$class[] = 'ts-bgcolor-' . $header_bg_color;
	}
	
	
	
	// processing and preparing all class
	if( count($class)>0 ){
		$class = implode(' ', $class );
	} else {
		$class = '';
	}
	
	// Return data
	return $class;
	
}
}






/**
 * adding height for menu area in selected headerstyle only
 */
if( !function_exists('themestek_header_menuarea_height') ){
function themestek_header_menuarea_height(){
	$return                 = '60';
	$header_menuarea_height = themestek_get_option('header_menuarea_height');
	
	if( !empty($header_menuarea_height) ){
		$return = $header_menuarea_height;
	}
	return $return;
	
}
}
 





/**
 *  Header main classes
 */
if( !function_exists('themestek_sticky_header_class') ){
function themestek_sticky_header_class(){
	$class         = '';
	$sticky_header = themestek_get_option('sticky_header');
	
	// Check if sticky header enabled
	if( $sticky_header==true) {
		$class .= ' ' . sanitize_html_class('ts-stickable-header');
	};
	
	// Return data
	return $class;

}
}






/**
 *  Header dynamic class for different settings
 */
if ( !function_exists('themestek_headerclass') ){
function themestek_headerclass(){
	$mainmenu_active_link_color = themestek_get_option('mainmenu_active_link_color');
	$dropmenu_active_link_color = themestek_get_option('dropmenu_active_link_color');
	$dropdown_menu_separator    = themestek_get_option('dropdown_menu_separator');
	
	$headerClassList = array();
	
	// Main Menu active link color
	if( !empty($mainmenu_active_link_color) ){
		$headerClassList[] = 'ts-mmenu-active-color-'.sanitize_html_class($mainmenu_active_link_color);
	} else {
		$headerClassList[] = 'ts-mmenu-active-color-skin';
	}
	
	// Dropdown Menu active link color
	if( !empty($dropmenu_active_link_color) ){
		$headerClassList[] = 'ts-dmenu-active-color-'. sanitize_html_class($dropmenu_active_link_color);
	} else {
		$headerClassList[] = 'ts-dmenu-active-color-skin';
	}
	
	// Dropdown Menu separator
	if( !empty($dropdown_menu_separator) ){
		$headerClassList[] = 'ts-dmenu-sep-'. sanitize_html_class($dropdown_menu_separator);
	} else {
		$headerClassList[] = 'ts-dmenu-sep-grey';
	}
	
	return ' '.implode(' ', $headerClassList);
}
}






/**
 *  Header dynamic class for different settings
 */
if ( !function_exists('themestek_get_headerstyle') ){
function themestek_get_headerstyle(){
	$return      = 'classic';
	$headerstyle = themestek_get_option('headerstyle');
	
	if( !empty($headerstyle) ){
		$return = $headerstyle;
	}
		
	// Return data
	return $return;
	
}
}




/**
 *  Header dynamic class for different settings
 */
if ( !function_exists('themestek_header_style_class') ){
function themestek_header_style_class( $echo=false ){
	$return = '';
	
	// Main header class so we can understand the selected header style
	$curr_headerstyle = themestek_get_headerstyle();
	$headerstyle = themestek_get_headerstyle();
	$headerstyle = str_replace('-overlay','', $headerstyle);
	$headerstyle = str_replace('-rtl','', $headerstyle);
	$return     .= ' ts-header-style-'. $headerstyle;
	
	if (strpos( themestek_get_headerstyle(), 'overlay') !== false) {
		$return .= ' ts-header-overlay';
	}
	
	
	
	
	
	// Main menu count and add class in body tag so we can design it
	$total_count	= 0;
	if ( has_nav_menu( 'themestek-main-menu' ) ) {  // if menu is set
		$menu_locations = get_nav_menu_locations();
		$menu			= wp_get_nav_menu_object( $menu_locations[ 'themestek-main-menu' ] );
		$menu_items		= wp_get_nav_menu_items($menu->term_id);
		foreach( $menu_items as $menu_item ){
			if( $menu_item->menu_item_parent === '0' ){
				$total_count++;
			}
		}
	} else {  // if menu not set so get total pages and count parent pages
		$pages = get_pages(); 
		foreach( $pages as $page ){
			if( $page->post_parent === 0 ){
				$total_count++;
			}
		}
	}
	$return	 .= ' themestek-main-menu-total-' . $total_count;
	if( $total_count>6 ){
		$return .= ' themestek-main-menu-more-than-six';
	}
	
	
	
	
	
	if ( (strpos( themestek_get_headerstyle(), 'rtl') !== false) || ((is_rtl()) && (in_array($curr_headerstyle, array('classic','classic-overlay','classic-box-overlay','infostack','infostack-overlay')))) ) {
		$return .= ' ts-header-invert';
	}
	
	return $return;
	
}
}







/**
 *  Header inline style
 */
if( !function_exists('themestek_header_menu_class') ){
function themestek_header_menu_class(){
	global $labtechco_theme_options;
	
	$class                       = '';
	$header_menu_bg_color        = themestek_get_option('header_menu_bg_color');
	$sticky_header_menu_bg_color = themestek_get_option('sticky_header_menu_bg_color');
	
	
	if( !empty($header_menu_bg_color) ){
		$class .= ' ts-header-menu-bg-color-'. sanitize_html_class($header_menu_bg_color) .' ts-bgcolor-'. sanitize_html_class($header_menu_bg_color);
	}
	
	// sticky class
	if( !empty($sticky_header_menu_bg_color) ){
		$class .= ' ts-sticky-bgcolor-'. sanitize_html_class($sticky_header_menu_bg_color);
	}
	
	
	// Return data
	return $class;
	
}
}








/* ===================================================================== */
/* --------------------- Floating Bar functions  ----------------------- */


/**
 *  ThemeStek Floating Bar classes
 */
if( !function_exists('themestek_fbar_show') ){
function themestek_fbar_show(){
	$fbar_show = themestek_get_option('fbar_show');
	$return    = false;
	
	if( $fbar_show==true ){
		$return = true;
	}
	
	return $return;
}
}


/**
 *  Floating Bar button classes
 */
if( !function_exists('themestek_fbar_btn') ){
function themestek_fbar_btn(){
	$return = '<!-- Open/close button -->
			<span class="themestek-fbar-btn ' . themestek_sanitize_html_classes(themestek_fbar_btn_classes()) . '">
				<a href="javascript:void(0)" class="themestek-fbar-btn-link">
					' . themestek_fbar_open_icon() . '
					' . themestek_fbar_close_icon() . '
					<span class="ts-hide">' . esc_attr__('Open', 'labtechco') . '</span>
				</a>
			</span>';
			
	return $return;
}
}


/**
 *  Floating Bar button classes
 */
if( !function_exists('themestek_fbar_btn_classes') ){
function themestek_fbar_btn_classes(){
		
	$topbarbgcolor = themestek_get_option('topbarbgcolor');
	$fbar_position = themestek_get_option('fbar-position');
	
	
	$return = array();
	
	if( !empty($topbarbgcolor) && trim($topbarbgcolor)=='skincolor' ){
		$return[] = 'ts-fbar-btn-bgnoskin';
	}
	
	// Floating bar position class
	if( !empty($fbar_position) ){
		$return[] = 'ts-fbar-btn-cposition-' . $fbar_position;
	}
	
	return implode(' ',$return);
}
}






/**
 *  ThemeStek Floating Bar close icon
 */
if( !function_exists('themestek_fbar_open_icon') ){
function themestek_fbar_open_icon(){
	$return = '';
	
	$fbar_handler_icon = themestek_get_option('fbar_handler_icon');
	$return = '<span class="ts-fbar-open-icon ts-icolor-' . themestek_sanitize_html_classes( themestek_get_option('fbar_icon_color') ) . '">' . themestek_create_icon_from_data( $fbar_handler_icon, true ) . '</span>';
	
	return $return;
}
}

/**
 *  ThemeStek Floating Bar close icon
 */
if( !function_exists('themestek_fbar_close_icon') ){
function themestek_fbar_close_icon(){
	$return = '';
	
	$fbar_handler_icon_close = themestek_get_option('fbar_handler_icon_close');
	$return = '<span class="ts-fbar-close-icon ts-icolor-' . themestek_sanitize_html_classes( themestek_get_option('fbar_icon_color_close') ) . '" style="display:none;">' . themestek_create_icon_from_data( $fbar_handler_icon_close, true ) . '</span>';
	
	return $return;
}
}


/**
 *  ThemeStek Floating Bar close icon for content area
 */
if( !function_exists('themestek_fbar_close_icon_for_content_area') ){
function themestek_fbar_close_icon_for_content_area(){
	$return = '';
	
	$fbar_handler_icon_close = themestek_get_option('fbar_handler_icon_close');
	$return = '<span class="ts-fbar-close-icon ts-icolor-' . themestek_sanitize_html_classes( themestek_get_option('fbar_icon_color_close') ) . '">' . themestek_create_icon_from_data( $fbar_handler_icon_close, true ) . '</span>';
	
	return $return;
}
}



/**
 *  ThemeStek Floating Bar classes
 */
if( !function_exists('themestek_fbar_classes') ){
function themestek_fbar_classes(){
	global $labtechco_theme_options;
	
	$fbar_background = themestek_get_option('fbar_background');
	$topbarbgcolor   = themestek_get_option('topbarbgcolor');
	
	$optionsArray = array(
						'fbar_show',
						'fbar_bg_color',
						'fbar_text_color',
						'fbar_text_custom_color',
						'fbar_background',
						'fbar_handler_icon',
						'fbar_handler_icon_close'
	);

	// Creating variables
	foreach( $optionsArray as $option ){
		
		$current_val = themestek_get_option($option);
		
		if( !is_array($current_val) ){  // bypassing color value which is array by default
			$fbar_opt = esc_attr($current_val);
		} else {
			$fbar_opt = $current_val;
		}
		${$option} = $fbar_opt;
	
	}
	
	
	$classes = array();
	$classes[] = 'ts-textcolor-'. sanitize_html_class($fbar_text_color); // Text Color
	$classes[] = 'ts-bgcolor-'. sanitize_html_class($fbar_bg_color); // BG Color
	
	if( !empty($fbar_background['image']) ){
		$classes[] = 'ts-bg';
		$classes[] = 'ts-bgimage-yes';
	} else {
		$classes[] = 'ts-bgimage-no';
	}
	
	
	// If Topbar bg color is set to SKIN color than set the icon color with grey or dark-grey color so it will be visible
	if( $topbarbgcolor == 'skincolor' ){
		$classes[] = 'ts-fbar-btn-bgnoskin';
	}
	
	// Return data
	return implode(' ',$classes);
}
}




/**
 * Add inline CSS for Floating Bar area based on certain conditions. 
 */
if(!function_exists('themestek_floatingbar_inline_css')){
function themestek_floatingbar_inline_css(){
	
	
	$return = '';
	
	// getting options
	$fbar_show                = themestek_get_option('fbar_show');
	$fbar_bg_color            = themestek_get_option('fbar_bg_color');
	$fbar_text_color          = themestek_get_option('fbar_text_color');
	$fbar_text_custom_color   = themestek_get_option('fbar_text_custom_color');
	$fbar_icon_color          = themestek_get_option('fbar_icon_color');
	$fbar_icon_custom_color   = themestek_get_option('fbar_icon_custom_color');
	$fbar_btn_bg_custom_color = themestek_get_option('fbar_btn_bg_custom_color');

	
	if($fbar_show){
	
		// Inline style
		$inlineStyleAll			= '';
		$inlineStyle     		= '';
		$inlineStyle_a   		= '';
		$inlineStyle_ah  		= '';
		$inlineStyle_h   		= '';
		$inlineStyle_border   	= '';
	
		// Custom Background color RGB
		if( $fbar_bg_color == 'custom' && !empty( $fbar_bg_custom_color['rgba'] ) ){
			$return .= '.themestek-fbar-box-w:after{background-color:'.esc_attr($fbar_bg_custom_color['rgba']).';}';
		}
		
		// Custom Text Color
		if( $fbar_text_color == 'custom' && !empty($fbar_text_custom_color) ){
			$fbar_text_custom_color  = esc_attr($fbar_text_custom_color);
			$inlineStyle			.= 'color: rgba( ' . themestek_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			$inlineStyle_a			.= 'color: rgba( ' . themestek_hex2rgb($fbar_text_custom_color) . ', 1);';
			$inlineStyle_ah			.= 'color: rgba( ' . themestek_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			$inlineStyle_h  		.= 'color: rgba( ' . themestek_hex2rgb($fbar_text_custom_color) . ', 1);';
			$inlineStyle_border  	.= 'border-color: rgba( ' . themestek_hex2rgb($fbar_text_custom_color) . ', 0.7);';
			
			$return .= "
				.themestek-fbar-box-w *, .ts-table-cell.ts-fbar-input .search_field.selectbox:after, .themestek-fbar-box .search_field select, .themestek-content-team-search-box .search_field select, .themestek-fbar-box .search_field i, .themestek-content-team-search-box .search_field i { $inlineStyle }
				.themestek-fbar-box-w a, .widget_calendar #today{ $inlineStyle_a }
				.themestek-fbar-box-w a:hover{ $inlineStyle_ah }
				.themestek-fbar-box-w .widget .widget-title{ $inlineStyle_h }
				.themestek-fbar-box-w .widget .widget-title, .themestek-fbar-box-w .widget_calendar table, .themestek-fbar-box-w .widget_calendar th, .themestek-fbar-box-w .widget_calendar td, .themestek-fbar-box .search_field, .contact-info{ $inlineStyle_border }
			";
		}
		
		if( $fbar_icon_color=='custom' ){
			$return .= '
			.themestek-fbar-btn a i{
				color: ' . $fbar_icon_custom_color . ';
			}
			';
		}
		
	} 
	
	return $return;
	
}
}









/* =============================================================== */
/* --------------------- Footer functions  ----------------------- */


if( !function_exists('themestek_footer_cta') ){
function themestek_footer_cta(){
	
	$footer_cta = themestek_get_option('footer_cta');
	
	if( $footer_cta==true && shortcode_exists('ts-cta') && function_exists('themestek_url_encode') ){
		
		$icon		= themestek_get_option('footer_cta_icon');
		$title		= themestek_get_option('footer_cta_title');
		$subtitle	= themestek_get_option('footer_cta_subtitle');
		$btn_text	= themestek_get_option('footer_cta_button_text');
		$btn_link	= themestek_get_option('footer_cta_button_link');
		
		$i_library	= ( !empty($icon["library"]) ) ? $icon["library"] : '' ;
		$i_icon		= ( !empty($icon["library_".$i_library]) ) ? 'i_icon_'.$i_library.'="'.$icon["library_".$i_library].'"' : '' ;
		
		
		$cta_sc = '[ts-cta h2="' . esc_attr($title) . '" h4="' . esc_attr($subtitle) . '" btn_title="' . esc_attr($btn_text) . '" btn_link="url:' . themestek_url_encode($btn_link) . '|||" add_icon="left" i_type="' . $i_library . '" ' . $i_icon . ' btn_color="mulled-wine" i_color="white"][/ts-cta]';
		
		$return = do_shortcode($cta_sc);
		
		echo themestek_wp_kses('<div class="ts-footer-cta-wrapper sidebar-container ts-bg ts-bgcolor-skincolor ts-textcolor-dark"><div class="ts-footer-cta-inner container">' . $return . '</div></div>');
		
	}
	
}
}




if( !function_exists('themestek_footer_row_class') ){
function themestek_footer_row_class( $row='first' ){
	$class = '';
	global $labtechco_theme_options;
	
	// BG color
	if( !empty($labtechco_theme_options[$row.'_footer_bg_color']) ){
		$class .= ' ts-bg ts-bgcolor-'.sanitize_html_class($labtechco_theme_options[$row.'_footer_bg_color']);
	}
	
	// Text color
	if( !empty($labtechco_theme_options[$row.'_footer_text_color']) ){
		$class .= ' ts-textcolor-'.sanitize_html_class($labtechco_theme_options[$row.'_footer_text_color']);
	}
	
	// If bg image is there
	if( !empty($labtechco_theme_options[$row.'_footer_bg_all']['image']) ){
		$class .= ' ts-bgimage-yes';
	} else {
		$class .= ' ts-bgimage-no';
	}
	
	// border type
	if( !empty($labtechco_theme_options[$row.'_footer_bordertype']) ){
		$class .= ' ts-bordertype-'.sanitize_html_class($labtechco_theme_options[$row.'_footer_bordertype']);
	}
	
	//widget border color
	if( !empty($labtechco_theme_options[$row.'_footer_widget_bordercolor']) ){
		$class .= ' ts-widgetbordercolor-'.sanitize_html_class($labtechco_theme_options[$row.'_footer_widget_bordercolor']);
	}
	
	if( $row == 'bottom' && // Add class only to bottom footer area
		themecheck_if_widget_position_content( 'first-footer-1-widget-area'  ) == false &&
		themecheck_if_widget_position_content( 'first-footer-2-widget-area'  ) == false &&
		themecheck_if_widget_position_content( 'first-footer-3-widget-area'  ) == false &&
		themecheck_if_widget_position_content( 'first-footer-4-widget-area'  ) == false &&
		themecheck_if_widget_position_content( 'second-footer-1-widget-area' ) == false &&
		themecheck_if_widget_position_content( 'second-footer-2-widget-area' ) == false &&
		themecheck_if_widget_position_content( 'second-footer-3-widget-area' ) == false &&
		themecheck_if_widget_position_content( 'second-footer-4-widget-area' ) == false
	){
		$class .= ' themestek-no-footer-widget';
	}
	
	// Return data
	return $class;
	
}
}


/**
 *  Create list of google fonts to set in footer
 *  usage: themestek_footer_google_fonts_array('Raleway', '100');
 */
if( !function_exists('themestek_footer_google_fonts_array') ){
function themestek_footer_google_fonts_array( $font_family, $font_weight='normal' ){
	$font_family = str_replace(' ','+', $font_family);
	$font_family = str_replace(' ','+', $font_family);
	$font_family = str_replace(' ','+', $font_family);
	
	global $ts_global_footer_gfonts;
	
	if( !is_array($ts_global_footer_gfonts) ){
		$ts_global_footer_gfonts = array();
	}
	// check if font_family already exists
	if( isset($ts_global_footer_gfonts[$font_family]) ){
		// check if font_weight already exists
		
		if( is_array($ts_global_footer_gfonts[$font_family]) && !in_array($font_weight, $ts_global_footer_gfonts[$font_family] ) ){
			$ts_global_footer_gfonts[$font_family][] = $font_weight;
		}
	} else {
		// font not found in global variable
		$ts_global_footer_gfonts[$font_family] = array($font_weight);
	}
	
}
}








if( !function_exists('themestek_portfolio_single_image_path') ){
function themestek_portfolio_single_image_path(){
	$image = '';
	if (has_post_thumbnail()){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		if( !empty($image[0]) ){
			$image = $image[0];
		}
	};
	
	
	// Return data
	return $image;
	
}
}





/**
 *  Servicebox
 */
if( !function_exists('themestek_service_single_image_path') ){
function themestek_service_single_image_path(){
	$image = '';
	if (has_post_thumbnail()){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		if( !empty($image[0]) ){
			$image = $image[0];
		}
	};
	
	
	// Return data
	return $image;
	
}
}





/* =============================================================== */
/* ---------------------  Team Member box  ----------------------- */


if( !function_exists('themestek_box_team_social_links') ){
function themestek_box_team_social_links( $multicolor_icon = false ){
	$return = '';
	
	$data   = themestek_get_meta( 'themestek_team_member_social', 'social_icons_list' );
	
	if( !empty($data) && is_array($data) && count($data)>0 ){
		$return .= '<div class="ts-team-social-links-wrapper">';
		$return .= '<ul class="ts-team-social-links">';
		
		// getting all social name with slug
		$all_social = ts_shared_social_list();
		
		foreach($data as $social ){
			
			$social_name = ( !empty($all_social[$social['social_icons_list_icon']]) ) ? $all_social[ $social['social_icons_list_icon'] ] : ucwords($social['social_icons_list_icon']) ;
			
			$a_color_class = '';
			if( $multicolor_icon == true ){
				$a_color_class = 'ts-team-social-'.strtolower(sanitize_html_class($social_name));
			}
			
			$return .= '
				<li>
					<a href="'. $social['social_icons_list_link'] .'" target="_blank" class="'.$a_color_class.'">
						<i class="ts-labtechco-icon-'. $social['social_icons_list_icon'] .'"></i>
						<span class="ts-hide">'. $social_name .'</span>
					</a>
				</li>';
		}
		
		$return .= '</ul> <!-- .ts-team-social-links --> ';
		$return .= '</div> <!-- .ts-team-social-links-wrapper --> ';
	}
	
	// Return data
	return $return;
}
}



if( !function_exists('themestek_short_desc') ){
function themestek_short_desc(){
	$return = '';
	
	if( has_excerpt() ){
		$return  = nl2br( get_the_excerpt() );
		$return  = do_shortcode($return);
	} else {
		$return = get_the_content('Read more');
	}
	
	if( !empty($return) ){
		$return = '<div class="ts-short-desc">'. $return .'</div>';
	}
	
	return $return;
}
}

/**
 * Add HTTP to url if not added already
 */
if( !function_exists('labtechco_addhttp') ){
	function labtechco_addhttp($url){
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)){
			$url = "http://" . $url;
		}
		return $url;
	}
}


/**
 * Change order of heading
 */
if( !function_exists('themestek_change_heading_order') ){
function themestek_change_heading_order($input_code=''){
	
	
	// finding and fetching <h2> and <h4> tag
	preg_match("/<h2>(.*?)<\/h2>/", $input_code, $h2_output_array);
	preg_match("/<h4>(.*?)<\/h4>/", $input_code, $h4_output_array);
	

	// heading with attributes
	preg_match('#<h([2]) .*?class="(.*?)".*?>(.*?)<\/h[2]>#si', $input_code, $h2_custom);
	preg_match('#<h([4]) .*?class="(.*?)".*?>(.*?)<\/h[4]>#si', $input_code, $h4_custom);
	
	
	// now checking if both tags are available
	if( !empty($h2_output_array) && is_array($h2_output_array) && count($h2_output_array)==2 &&
	!empty($h4_output_array) && is_array($h4_output_array) && count($h4_output_array)==2 ){
	
		$input_code = preg_replace('/<h4>(.*?)<\/h4>/', '', $input_code);
		
		$replace_word = $h4_output_array[0];
		$input_code = str_replace( '<h2>' , $replace_word.'<h2>' , $input_code );
		
	}

	if( !empty($h2_custom) && !empty($h4_custom) ){
		
		$string_h2 = $h4_custom[0];
		$string_h4 = $h2_custom[0] ;
		$string_h6 = '<h6 class="">this is sample </h6>';
		
		$input_code = preg_replace('#<h([2]) .*?class="(.*?)".*?>(.*?)<\/h[2]>#si', $string_h6, $input_code);
		
		$input_code = preg_replace('#<h([4]) .*?class="(.*?)".*?>(.*?)<\/h[4]>#si', $string_h4, $input_code);
		
		$input_code = preg_replace('#<h([6]) .*?class="(.*?)".*?>(.*?)<\/h[6]>#si', $string_h2, $input_code);
		
	}
	
	return $input_code;

}
}


/**
 * Testimonials Title and Designation details
 *
 * Create your own themestek_testimonial_title() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if(!function_exists('themestek_testimonial_title')){
function themestek_testimonial_title(){
	
	$return      		= '';
	$testimonial_meta   = get_post_meta( get_the_id(), 'themestek_testimonials_details', true );
	$clienturl 			= ( !empty($testimonial_meta['clienturl'])   ) ? $testimonial_meta['clienturl'] : '' ;
	$designation		= ( !empty($testimonial_meta['designation']) ) ? $testimonial_meta['designation'] : '' ;
	
	$return .= ( !empty($clienturl) ) ? '<h3 class="themestek-author-name"><a href="'.esc_url($clienturl).'" target="_blank">'.get_the_title().'</a></h3>' : '<h3 class="themestek-author-name">'.get_the_title().'</h3>' ;
	$return .= ( !empty($designation) ) ? '<span class="themestek-box-footer">'.esc_attr($designation).'</span>' : '';
	
	return $return;
		
}
}




/**
 * Testimonials star ratings
 *
 * Create your own themestek_testimonial_star_ratings() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if(!function_exists('themestek_testimonial_star_ratings')){
function themestek_testimonial_star_ratings(){
	$return      		= '';
	$testimonial_meta   = get_post_meta( get_the_id(), 'themestek_testimonials_details', true );
	$star_ratings		= ( !empty($testimonial_meta['star_ratings']) ) ? $testimonial_meta['star_ratings'] : '1' ;
	
	for ($i = 1; $i <= 5; $i++) {
		if( $star_ratings >= $i ){
			$return .= ' <i class="ts-labtechco-icon-star ts-skincolor ts-active"></i> ';
		} else {
			$return .= ' <i class="ts-labtechco-icon-star"></i> ';
		}
	}
	return $return;
}
}



/**
 * Testimonials Featured Image
 *
 * Create your own themestek_testimonial_featured_image() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if(!function_exists('themestek_testimonial_featured_image')){
function themestek_testimonial_featured_image($size='thumbnail'){
	
	$return = "";
	$featured_image = themestek_featured_image($size);
	
	$return = ( !empty($featured_image) ) ? $featured_image : '<span class="themestek-icon-box"><i class="demo-icon ts-labtechco-icon-quote-left"></i></span>';
	
	return $return;

}
}


/**
 * Header Button Area depending on header sytle
 *
 * Create your own themestek_header_button() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if( !function_exists('themestek_header_button') ){
function themestek_header_button( $args=array() ){
	$return		 = '';
	
	$header_btn = themestek_get_option('header_btn');
	$btn_text = ( !empty($header_btn['header_btn_text']) ) ? $header_btn['header_btn_text'] : '' ;
	$btn_link = ( !empty($header_btn['header_btn_link']) ) ? $header_btn['header_btn_link'] : '' ;
	
	if( !empty($btn_text) && !empty($btn_link) ){
		$btn_sc		= '[ts-btn title="' . esc_attr($btn_text) . '" shape="square" style="flat" color="skincolor" size="md" link="url:' . themestek_url_encode($btn_link) . '|||"]';
		$return		= '<div class="ts-header-text-area ts-header-button-w">'.do_shortcode( $btn_sc ).'</div>';
	}
	
	echo  themestek_wp_kses($return);

}
}




if( !function_exists('themestek_text_abovemenu') ){
function themestek_text_abovemenu(){
	$return		 = '';
	$headerstyle = themestek_get_headerstyle();
	$header_text_abovemenu = themestek_get_option('header_text_abovemenu');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(
							'classic2',					
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $header_text_abovemenu ) ){
		$header_text_abovemenu = themestek_wp_kses( $header_text_abovemenu );
		$return      = '<div class="ts-classicheader-text-area"><div class="ts-header-text">'.do_shortcode( $header_text_abovemenu ).'</div></div>';
	}

	echo  themestek_wp_kses($return);
	
}
}

if( !function_exists('themestek_text_belowmenu') ){
function themestek_text_belowmenu(){
	$return		 = '';
	$headerstyle = themestek_get_headerstyle();
	$header_text_belowmenu = themestek_get_option('header_text_belowmenu');
	
	// list of valid header style where the text area will appear
	$valid_headerstyle = array(
							'classic-vertical',					
						);
	
	if( in_array( $headerstyle, $valid_headerstyle ) && !empty( $header_text_belowmenu ) ){
		$header_text_belowmenu = themestek_wp_kses( $header_text_belowmenu );
		$return      = '<div class="ts-header-text-area">'.do_shortcode( $header_text_belowmenu ).'</div>';
	}

	echo themestek_wp_kses($return);
	
}
}

/**
 * Client Logo boxes. 
 *
 * Create your own themestek_get_clientboxes() to override in a child theme.
 *
 * @since LabtechCO 1.0
 *
 */
if( !function_exists('themestek_get_clientboxes') ){
function themestek_get_clientboxes( $vars = array() ){
	$return 			= '';
	$group 				= ( !empty( $vars['group'] ) ) ? $vars['group'] : '' ;
	$column 			= ( !empty( $vars['column'] ) ) ? $vars['column'] : '' ;
	$show 				= ( !empty( $vars['show'] ) ) ? $vars['show'] : '' ;
	$clients 			= themestek_get_option('clients');
	$list_of_clients 	= array();
	$finalkeys			= array();
	
	
	

	// created groups array
	if( !empty( $group ) ){
		$group = explode(',',$group);
	}
	
	
	//creating clients list
	if( is_array( $group ) && !empty( $group ) ){
		foreach( $clients as $key => $val ){	
			if( isset( $val['client_group'] ) && is_array( $val['client_group'] ) ){
				foreach( $group as $gkey => $gval ){
					if( in_array( $gval, $val['client_group']) ){
						$finalkeys[] = $key;
					}
				}
			}
		}
		
		$finalkeys = array_unique( $finalkeys );
		
		if( !empty( $finalkeys ) ){
			foreach( $finalkeys as $key => $val ){
				$list_of_clients[] = $clients[$val];
			}
		}
		
	} else{
		$list_of_clients = $clients;
	}
	
	
	$i = 0;
	foreach( $list_of_clients as $key => $val ){
		$i++;
		
		$client_name 	= trim( $val['client_name'] );
		$client_website = trim( $val['client_website'] );
		$client_logo    = wp_get_attachment_image( $val['client_logo'], 'full');
		$linktarget 	= '';
		
		// settings links target attribute
		if( $client_website != '' ){
			$linktarget = 'target="_blank"';
		} else {
			$client_website = 'javascript:void(0);';
		}
		
		
		if( !empty( $client_logo ) ){
			$return .= themestek_column_div( 'start', $column );
			$return .= '<a href="'.esc_url( $client_website ).'" '.$linktarget.' data-tooltip="'.esc_attr( $client_name ).'" title="'.esc_attr( $client_name ).'">';
			$return .= $client_logo;
			$return .= '</a>';
			$return .= themestek_column_div( 'end', $column );
		} else {
			$return .= '<!-- No Featured Image For this Client -->';
		}
		
		// breaking out of loop when items equals show
		if($i == $show){
			break;
		}

	}
	
	return $return;
}
}






/**
 *  Show RevolutionSlider select option
 */
if( !function_exists('themestek_revslider_array') ){
function themestek_revslider_array( $countonly=false ) {
	$sliders = array();
	
	// Add This only if RevSlider is Activated
	if ( class_exists( 'RevSlider' ) ) {
		
		/* get revolution array */
		$slider     = new RevSlider();
		$arrSliders = $slider->getArrSliders();
		
		if( count($arrSliders)>0 ){
			foreach( $arrSliders as $arrSlider_key => $arrSlider_val ){
				$sliders[$arrSlider_val->getAlias()] = $arrSlider_val->getTitle();
			}
		}
	}
	
	if( $countonly==true ){
		return count($sliders);
	} else {
		// Check if slider created
		if( count($sliders)==0 ){
			$sliders[''] = esc_attr__('(No Slider Found)', 'labtechco');
		}
		return $sliders;
	}
}
}




if( !function_exists('themestek_layerslider_array') ){
function themestek_layerslider_array( $countonly=false ){
	
	//check if LayerSlider plugins is active 
	if ( function_exists('lsSliders') ) {
		
		$sliders 		= lsSliders();
		$slider_names  	= array();
		
		foreach( $sliders as $key => $val ){		
			$slider_names[$val['id']] = $val['name'].' (ID: '. $val['id'] .')';
		}
		
		if( $countonly == true ){
			return count($slider_names);
		} else {
			// Check if slider created
			if( count($slider_names) == 0 ){
				$slider_names[''] = esc_attr__('(No Slider Found)', 'labtechco');
			}
			return $slider_names;
		}
		
	}
	
	
	
}
}







/* ======================================================================= */
/* ---------------------  Header Slider Functions  ----------------------- */


if( !function_exists('themestek_header_slider_show') ){
function themestek_header_slider_show(){
	$return  = false;
	$post_id = false;
	
	if( is_singular() ){
		$post_id = get_the_ID();
		
	} else if( function_exists('is_woocommerce') ) {

		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$page_slider = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($page_slider['slidertype']) ){
			$return = true;
		}
	}
	
	
	
	return $return;
}
}

if( !function_exists('themestek_header_slider') ){
function themestek_header_slider(){
	$return = '';
	$post_id = false;
	
	if( is_singular() ){
		$post_id = get_the_ID();
		
	} else if( function_exists('is_woocommerce') ) {
		
		if( is_woocommerce() ){
			$post_id = get_option( 'woocommerce_shop_page_id' );
		}
	}
	
	if( $post_id ){
		$page_slider = get_post_meta( $post_id, '_themestek_metabox_group', true );
		if( !empty($page_slider['slidertype']) ){
			
			switch( $page_slider['slidertype'] ){
				case 'revslider':
					if( !empty($page_slider['revslider']) ){
						$return = do_shortcode('[rev_slider alias="'. esc_attr($page_slider['revslider']) .'"]');
					}
					break;
					
				case 'layerslider':
					if( !empty($page_slider['layerslider']) ){
						$return = do_shortcode('[layerslider id="'. esc_attr($page_slider['layerslider']) .'"]');
					}
					break;
					
				case 'custom':
					if( !empty($page_slider['customslider']) ){
						$return = do_shortcode( $page_slider['customslider'] );
					}
					break;
					
			} // switch()
			
			$wrapper_class = 'themestek-slider-wide';
			// Boxed layout wrapper
			if( !empty($page_slider['slider_width']) && esc_attr($page_slider['slider_width'])=='boxed' ){
				$wrapper_class = 'container themestek-slider-boxed';
			}
			$return = '<div class="'. themestek_sanitize_html_classes($wrapper_class) .'">'.$return.'</div>';
			
		}
	}
	return $return;
}
}







/* ======================================================================= */
/* ---------------------- Sidebar related functions ---------------------- */


/**
 *  Return sidebar class for Row container or content container
 */
if( !function_exists('themestek_sidebar_class') ){
function themestek_sidebar_class($for='row'){
	
	$container = 'container';
	if( themestek_get_option('layout')=='fullwide' ){
		$container = themestek_contentarea_container_class();
	}
	
	$return_container    = $container;
	$return_row          = '';
	$return_content_area = '';
	
	
	
	// If page than remove container
	if( is_page() ){
		$return_container = '';
		if( function_exists('is_woocommerce') && ( is_cart() || is_checkout() ) ){
			$return_container = $container;
		}
	}
	
	if( in_array( esc_attr(themestek_get_sidebar_info()), array('left','right') ) ){
		$return_container    = $container;
		$return_row          = 'row multi-columns-row';
		$return_content_area = 'col-md-9 col-lg-9 col-xs-12';
		
	} else if( in_array( esc_attr(themestek_get_sidebar_info()), array('both','bothleft','bothright') ) ){
		$return_container    = $container;
		$return_row          = 'row multi-columns-row';
		$return_content_area = 'col-md-6 col-lg-6 col-xs-12';
	}
	
	// container for portfolio category
	if( is_tax( array('ts-portfolio-category','ts-team-group') ) ){
		$return_container = $container;
	}
	
	
	if( $for == 'content-area' ){
		return $return_content_area;
	} else if( $for == 'container' ){
		return $return_container;
	} else {
		return $return_row;
	}
	
	
}
}




/**
 *  Check for sidebar enabled for the side
 */
if( !function_exists('themestek_get_sidebar_info') ){
function themestek_get_sidebar_info( $return_total_count = false ){

	
	// Sidebar Class
	$sidebar       = esc_attr( themestek_get_option('sidebar_post') ); // Global settings
	$count_widgets = themestek_count_sidebar( 'post', $sidebar );
	
	// if page or single
	
	if( is_front_page() && !is_page() ){
		// Blogroll page
		$sidebar       = esc_attr( themestek_get_option('sidebar_post') ); // Global settings
		$count_widgets = themestek_count_sidebar( 'post', $sidebar );
		
	} else if( is_home() || is_page() || is_singular() ){
		
		// Getting page/post/singluar id 
		$page_id = get_the_ID();
		if( is_home() ){
			$page_id = get_option('page_for_posts');
		}
		
		// global sidebar for page
		if( is_page() ){
			$sidebar = esc_attr( themestek_get_option('sidebar_page') ); // Global settings
			$count_widgets = themestek_count_sidebar( 'page', $sidebar );
		}
		
		// if Team member
		if( is_singular('ts-team-member') ){
			$sidebar = esc_attr( themestek_get_option('sidebar_team_member') ); // Global settings
			$count_widgets = themestek_count_sidebar( 'team-member', $sidebar );
		}
		
		// if Portfolio
		if( is_singular('ts-portfolio') ){
			$sidebar = esc_attr( themestek_get_option('sidebar_portfolio') ); // Global settings
			$count_widgets = themestek_count_sidebar( 'portfolio', $sidebar );
		}
		
		// if Service
		if( is_singular('ts-service') ){
			$sidebar = esc_attr( themestek_get_option('sidebar_service') ); // Global settings
			$count_widgets = themestek_count_sidebar( 'service', $sidebar );
		}
		
		// if WooCommerce Single product view
		if( is_singular('product') ){
			$sidebar = esc_attr( themestek_get_option('sidebar_woocommerce_single') ); // Global settings
			$count_widgets = themestek_count_sidebar( 'woocommerce', $sidebar );
		}
		
		
		// Getting sidebar value from Single (page/post/singluar)
		if( !empty($page_id) ){
			$single_sidebar = get_post_meta( $page_id, '_themestek_metabox_sidebar', true);
			if( !empty($single_sidebar['sidebar']) ){
				$sidebar = $single_sidebar['sidebar'];
				$count_widgets = themestek_count_sidebar( 'page', $sidebar );
			}
		}
		
		// The Events Calendar
		if( is_singular('tribe_events') ){
			$sidebar_events = themestek_get_option('sidebar_events');
			$sidebar = ( !empty( $sidebar_events ) ) ? esc_attr( $sidebar_events ) : 'no' ; // Global settings
			$count_widgets = themestek_count_sidebar( 'events', $sidebar );
		}
		
		
	}
	
	
	// Portfolio Category
	if( is_tax('ts-portfolio-category') ){
		$sidebar = esc_attr( themestek_get_option('sidebar_portfolio_category') ); // Global settings
		$count_widgets = themestek_count_sidebar( 'portfoliocat', $sidebar );
	}
	
	// Service Category
	if( is_tax('ts-service-category') ){
		$sidebar = esc_attr( themestek_get_option('sidebar_service_category') ); // Global settings
		$count_widgets = themestek_count_sidebar( 'servicecat', $sidebar );
	}
	
	// Team Group
	if( is_tax('ts-team-group') ){
		$sidebar = esc_attr( themestek_get_option('sidebar_team_member_group') ); // Global settings
		$count_widgets = themestek_count_sidebar( 'team-member-group', $sidebar );
	}
	
	
	// WooCommerce sidebar class
	if( function_exists('is_woocommerce') && is_woocommerce() && !is_singular('product') ) {
		$sidebar_woocommerce = themestek_get_option('sidebar_woocommerce');
		$sidebar = !empty( $sidebar_woocommerce ) ? esc_attr( $sidebar_woocommerce ) : 'right' ;
		$count_widgets = themestek_count_sidebar( 'woocommerce', $sidebar );
		
		$post_id = get_option( 'woocommerce_shop_page_id' );
		if( !empty($post_id) ){
			$single_sidebar = get_post_meta( $post_id, '_themestek_metabox_sidebar', true);
			if( !empty($single_sidebar['sidebar']) ){
				$sidebar = $single_sidebar['sidebar'];
				$count_widgets = themestek_count_sidebar( 'woocommerce', $sidebar );
			}
		}
		
	}
	
	// BBPress sidebar class
	if( function_exists('is_bbpress') && is_bbpress() ) {
		$sidebar_bbpress = themestek_get_option('sidebar_bbpress');
		$sidebar = !empty( $sidebar_bbpress ) ? esc_attr( $sidebar_bbpress ) : 'right' ;
		$count_widgets = themestek_count_sidebar( 'bbpress', $sidebar );
	}
	
	// Tribe Events (The Events Calendar plugin)
	if( function_exists('tribe_is_upcoming') ){
		if ( get_post_type() == 'tribe_events' || tribe_is_upcoming() || tribe_is_month() || tribe_is_by_date() || tribe_is_day() || is_single('tribe_events')){
			$sidebar_events = themestek_get_option('sidebar_events');
			$sidebar = ( !empty( $sidebar_events ) ) ? esc_attr( $sidebar_events ) : 'no' ; // Global settings
			$count_widgets = themestek_count_sidebar( 'events', $sidebar );
		}
	}
	
	
	// Search results page sidebar
	if( is_search() ){
		$sidebar_search = themestek_get_option('sidebar_search');
		$sidebar = ( !empty( $sidebar_search ) && trim( $sidebar_search )!='' ) ? esc_attr( $sidebar_search ) : 'no' ; // Global settings for search results page
		$count_widgets = themestek_count_sidebar( 'search', $sidebar );
	}
	
	// If 404 page
	if( is_404() ){
		$sidebar = 'no';
	}
	
	
	if( $return_total_count=='count_widgets' ){
		return $count_widgets;
	} else {
		return $sidebar;
	}
	
}
}




/**
 *  Check if sidebar
 */
if( !function_exists('themestek_count_sidebar') ){
function themestek_count_sidebar( $cpt, $sidebar ){
	
	$return = '0';
	
	$sidebars_widgets = wp_get_sidebars_widgets();
	
	if( $cpt == 'post' ){ $cpt = 'blog'; }
	
	
	if( $sidebar == 'left' || $sidebar == 'right' ){
		if( isset($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]) ){
			if( is_array($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]) && count($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ])>0 ){
				$return = count($sidebars_widgets[ 'sidebar-'.$sidebar.'-'.$cpt ]);
			}
		}
	} else if( $sidebar == 'both' || $sidebar == 'bothleft' || $sidebar == 'bothright' ){
		if( isset($sidebars_widgets[ 'sidebar-left-'.$cpt ])		&&
			is_array($sidebars_widgets[ 'sidebar-left-'.$cpt ])		&&
			count($sidebars_widgets[ 'sidebar-left-'.$cpt ])>0		&&
			isset($sidebars_widgets[ 'sidebar-right-'.$cpt ])		&&
			is_array($sidebars_widgets[ 'sidebar-right-'.$cpt ])	&&
			count($sidebars_widgets[ 'sidebar-right-'.$cpt ])>0
		){
			$return = '1';
		} else {
			$return = '0';
		}
		
	}
	
	return $return;
	
}
}






/**
 *  Get sidebar value of single page/post/cpt type.
 */
if( !function_exists('themestek_single_get_sidebar_value') ){
function themestek_single_get_sidebar_value(){
	
	// Getting global sidebar value
	global $labtechco_theme_options;
	
	// Globally the sidebar of POST will be used
	$sidebar = $labtechco_theme_options['sidebar_post'];
	
	if( is_page() || is_singular() ){
		
		$cpt = get_post_type();
		
		// Single page/post ID
		$single_id = get_the_ID();
		if( is_home() ){ $single_id = get_option( 'page_for_posts' ); }
		
		// Single view of any of our CPT
		if( !empty($labtechco_theme_options['sidebar_'.$cpt]) ){
			$sidebar = $labtechco_theme_options['sidebar_'.$cpt];
		}
		
		// Getting single meta for sidebar
		$single_meta = get_post_meta( $single_id, '_themestek_metabox_sidebar', true );
		if( !empty( $single_meta['sidebar'] ) ){
			$sidebar = $single_meta['sidebar'];
		}
		
	}
	
	
	// If search results page
	if( is_search() ){
		$sidebar = $labtechco_theme_options['sidebar_search'];
	}
	
	
	// If search results page
	if( is_search() ){
		$sidebar = $labtechco_theme_options['sidebar_search'];
	}
	
	
	return $sidebar;
}
}






/**
 *  Single content area class
 */
if( !function_exists('themestek_single_contentarea_class') ){
function themestek_single_contentarea_class(){
	$return = 'col-md-12 col-lg-12 col-xs-12';
	
	if( is_page() || is_singular() ){
		
		$sidebar = themestek_single_get_sidebar_value();
		
		// Preparing return
		// adding class
		if( !empty($sidebar) && $sidebar!='no' ){
			if( $sidebar=='left' || $sidebar=='right' ){
				$return = 'col-md-9 col-lg-9 col-xs-12';
			} else {
				$return = 'col-md-6 col-lg-6 col-xs-12';
			}
		}
		
	}
	
	return $return;
	
}
}




/**
 *  Show sidebar of hide sidebar
 */
if( !function_exists('themestek_single_show_sidebar') ){
function themestek_single_show_sidebar( $side='left' ){
	$return = false;
	
	if( is_page() || is_singular() ){
		
		$sidebar = themestek_single_get_sidebar_value();
		
		// Preparing return
		if( $side=='left' ){
			if( $sidebar=='left' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
				$return = true;
			}
		} else {
			if( $sidebar=='right' || $sidebar=='both' || $sidebar=='bothleft' || $sidebar=='bothright' ){
				$return = true;
			}
		}
		
	}
	
	return $return;
	
}
}





/**
 *  Left Sidebar
 */
if( !function_exists('themestek_get_left_sidebar') ){
function themestek_get_left_sidebar(){
	if( in_array( esc_attr(themestek_get_sidebar_info()), array('left','bothleft','bothright','both') ) ){
		get_sidebar( 'left' );
	}
}
}


/**
 *  Right Sidebar
 */
if( !function_exists('themestek_get_right_sidebar') ){
function themestek_get_right_sidebar(){
	if( in_array( esc_attr(themestek_get_sidebar_info()), array('right','bothleft','bothright','both') ) ){
		get_sidebar( 'right' );
	}
}
}







/* ======================================================================= */
/* ------------------------- The Events Calendar ------------------------- */


/**
 *  Show event price
 */
if( !function_exists('themestek_event_price') ){
function themestek_event_price(){
	$return = '';
	if( function_exists('tribe_get_formatted_cost') ){
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ){
			$return = themestek_wp_kses('<div class="tribe-events-event-cost"><span> ' . esc_attr( tribe_get_formatted_cost() ) . ' </span></div>');
		}
	}

	return $return;
	
}
}




/**
 *  Events Box meta details
 */
if( !function_exists('themestek_event_meta') ){
function themestek_event_meta(){
	$return = '';
	$price = '';
	
	
	$time_format = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
	$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

	$start_datetime = tribe_get_start_date();
	$start_date = tribe_get_start_date( null, false );
	$start_time = tribe_get_start_date( null, false, $time_format );
	$start_ts = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

	$end_datetime = tribe_get_end_date();
	$end_date = tribe_get_end_date( null, false );
	$end_time = tribe_get_end_date( null, false, $time_format );
	$end_ts = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );
	
	if( function_exists('tribe_get_formatted_cost') ){
		$cost = tribe_get_formatted_cost();
		if ( ! empty( $cost ) ){
			$price = '<span class="tribe-events-event-cost"> ' . esc_attr( tribe_get_formatted_cost() ) . ' </span>';
		}
	}
	
	
	
	
	
	$return .= '<div class="themestek-meta-details themestek-event-meta-details">';
		$return .= '<span class="themestek-event-meta-item themestek-event-date"> ';
			$return .= '<i class="fa fa-clock-o"></i> ';
			// All day (multiday) events
			if ( tribe_event_is_all_day() && tribe_event_is_multiday() ){
				

				$return .= '
					<span class="themestek-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' .  esc_attr( $start_date ) . ' </span> - 
					<span class="themestek-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' . esc_attr( $end_date ) . ' </span>';

			
			// All day (single day) events
			} elseif ( tribe_event_is_all_day() ){
				$return .= '<span class="themestek-event-meta-onedate" title="'. esc_attr( $start_ts ) . '"> ' . esc_attr( $start_date ) . '</span>';

			
			// Multiday events
			} elseif ( tribe_event_is_multiday() ){
				
				$return .= '<span class="themestek-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . esc_attr( $start_datetime ) . ' </span> - ';
				$return .= '<span class="themestek-event-meta-dtend" title="' . esc_attr( $end_ts ) . '"> ' .  esc_attr( $end_datetime ) .' </span>';


			// Single day events
			} else {
				
				$return .= '<span class="themestek-event-meta-dtstart" title="' . esc_attr( $start_ts ) . '"> ' . esc_attr( $start_date ) . ' </span> - ';

				$return .= '<span class="themestek-event-meta-dtend" title="' . esc_attr( $end_ts ) . '">';
					if ( $start_time == $end_time ) {
						$return .= esc_attr( $start_time );
					} else {
						$var_diff_time = $start_time . $time_range_separator . $end_time;
						$return .= esc_attr( $var_diff_time );
					}

				$return .=' </span>';
			}
		$return .=' </span>';
		$return .= '
			&nbsp;&nbsp; <span class="themestek-event-meta-item themestek-event-price">
				'.$price.'
			</span>';
	$return .= '</div>';
	return $return;
}
}





/**
 *  Events Short Description
 */
if( !function_exists('themestek_event_description') ){
function themestek_event_description(){ 
	$return   = '';
	$readMore = esc_attr__('See Event', 'labtechco') . ' <i class="tsicon-fa-angle-right"></i>';
	
	if( has_excerpt() ){
		$return  = get_the_excerpt();
		$return .= '<div class="themestek-post-readmore"><a href="'.get_permalink().'">'.$readMore.'</a></div>';
	} else {
		global $more;
		$more = 0;
		$return = get_the_content( $readMore );
	}
	return $return;
}
}



/**
 *  Get excerpt only
 */
if( !function_exists('themestek_get_only_excerpt') ){
function themestek_get_only_excerpt(){ 
	$return   = '';
		if( has_excerpt() ){
		  $return  = '<div class="themestek-excerpt">'.get_the_excerpt().'</div>';
		}
	return $return;
}
}






/* ======================================================================= */
/* ----------------------- Post comment functions ------------------------ */


/**
 *  Show sidebar of hide sidebar
 */
if( !function_exists('themestek_comment_row_template') ){
function themestek_comment_row_template($comment, $args, $depth){
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
	
	
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			 <em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'labtechco' ); ?></em>
			  <br />
		<?php endif; ?>

		<div class="comment-meta commentsetadata">
			<?php printf( '<cite class="ts-comment-owner fn">%s</cite> <span class="says">' . esc_attr__('says:', 'labtechco' ) . '</span>', get_comment_author_link() ); ?>
			
			<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
			/* translators: 1: date, 2: time */
			printf( esc_attr__( '%1$s at %2$s', 'labtechco' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_attr__( '(Edit)', 'labtechco' ), '  ', '' );
			?>
		</div>

		<?php comment_text(); ?>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		
		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
		<?php endif; ?>
	
	</<?php echo esc_attr($tag); ?>>
	
    <?php
	
}
}






/**
 *  Author social links for Author Bio box
 */
if( !function_exists('themestek_author_social_links') ){
function themestek_author_social_links(){
	$return = '';
	$all_socials = array();
	
	// fetching all values
	// Structure: $all_socials[SOCIAL_CLASS]  => get_the_author_meta( 'INPUT_NAME' );
	// The "INPUT_NAME" is defined in hooks.php in themestek_author_socials() function. You can add more socials in that function.
	$all_socials['twitter']  = get_the_author_meta( 'twitter' );
	$all_socials['facebook'] = get_the_author_meta( 'facebook' );
	$all_socials['linkedin'] = get_the_author_meta( 'linkedin' );
	$all_socials['gplus']    = get_the_author_meta( 'gplus' );
	
	foreach( $all_socials as $social_class => $social_link ){
		if( !empty($social_link) ){
			$return .= '<li><a href="'. $social_link .'" target="_blank"><i class="ts-labtechco-icon-'. $social_class .'"></i><span class="ts-hide">'. ucwords($social_class) .'</span></a></li>';
		}
	}
	
	if( !empty($return) ){
		$return = '<div class="ts-author-social-links-wrapper"><ul class="ts-author-social-links">' . $return . '</ul> <!-- .ts-team-social-links -->  </div> <!-- .ts-team-social-links-wrapper -->';
	}
	
	// Return data
	return $return;
	
	
	
	
	
}
}








/* =================================================================== */
/* ----------------------- 404 page functions ------------------------ */


/**
 *  Getting 404 page big icon
 */
if( !function_exists('themestek_404_icon') ){
function themestek_404_icon(){
	$icon   = themestek_get_option('error404_big_icon');
	$return = ( !empty($icon['library_' . $icon['library']] ) ) ? '<div class="ts-big-icon"><i class="' . $icon['library_' . $icon['library']] . '"></i></div>' : '' ;
	return $return;
}
}



/**
 *  Getting 404 heading
 */
if( !function_exists('themestek_404_heading') ){
function themestek_404_heading(){
	$heading = themestek_get_option('error404_big_text');
	$return  = ( !empty($heading) ) ? '<header class="page-header"> <h1 class="page-title">' . esc_attr( $heading ) . '</h1> </header><!-- .page-header -->' : '' ;
	return $return;
}
}


/**
 *  Getting 404 description
 */
if( !function_exists('themestek_404_description') ){
function themestek_404_description(){
	$description = themestek_get_option('error404_medium_text');
	$return  = ( !empty($description) ) ? '<div class="page-content"> <p>' . esc_attr( $description ) . '</p> </div><!-- .page-content -->' : '' ;
	return $return;
}
}











/* =================================================================== */
/* ----------------------- Search Results page ------------------------ */

/**
 *  Search results box title
 */
if( !function_exists('themestek_search_results_box_title') ){
function themestek_search_results_box_title( $post_type='post' ){
	$return        = '';
	$singular_name = '';
	
	$small_link = '<small><a href="'. esc_url(get_home_url()).'?s='.get_search_query().'" class="label label-default"><i class="ts-labtechco-icon-angle-left"></i> '.esc_attr__('Back to results','labtechco').'</a></small>';
	if( empty($_GET['post_type']) ){
		$small_link = '<small><a href="'. esc_url(get_home_url()).'?s='.get_search_query().'&post_type=' . $post_type . '" class="label label-default">'.esc_attr__('View more','labtechco').'</a></small>';
	}
		
	if( !empty($post_type) ){
		$obj = get_post_type_object( $post_type );
		$singular_name = $obj->labels->singular_name;
	}
	
	if( !empty($singular_name) ){
		
		$return .= '<div class="ts-sresults-title-w"><h2 class="ts-sresults-title">' . sprintf(
				esc_attr__('%s results','labtechco'),
				'<strong>' . esc_attr($singular_name) . '</strong>'
			)  . ' 
			&nbsp;
			'.$small_link.'
			</h2></div>';
	}

	
	return $return;
	

}
}



if( !function_exists('themestek_nothing_found_message') ){
function themestek_nothing_found_message(){
	$return       = '';
	$results_text = '';
	$current_cpt = ( !empty($_GET['post_type']) ) ? $_GET['post_type'] : 'post' ;
	
	// Fetch all CPT
	$args = array(
		'public'   => true,
	);
	$cpt_obj          = get_post_types( $args, 'objects' );
	$current_cpt_name = ( !empty($cpt_obj[$current_cpt]->labels->singular_name) ) ? $cpt_obj[$current_cpt]->labels->singular_name : '' ;
	
	if( !empty($cpt_obj) ){
		foreach( $cpt_obj as $cpt ){
			if( !in_array( $cpt->name, array( 'attachment', 'ts-client', 'ts-testimonial' ) ) ){  // Exclude Media from search
			
				$allsearch     = new WP_Query("s=".get_search_query()."&showposts=0&post_type=".$cpt->name);
				$total_results = $allsearch->found_posts;
				$link          = site_url() . '?s=' . get_search_query() . '&post_type=' . $cpt->name ;
				
				$results_text  .= ( $total_results > 0 ) ? '  <li><a href="' . esc_url($link) . '"> <i class="ts-labtechco-icon-angle-right"></i> ' . sprintf( esc_attr__('%1$s found in %2$s','labtechco'), $total_results, '<strong>'.$cpt->labels->name.'</strong>' ) . '</a></li>' : '' ;
			
			}
		}

	}
	
	
	if( !empty($results_text) ){
		$return = '<div class="ts-search-no-results ts-search-results-others"><p>' . sprintf( esc_attr__('Sorry, but nothing matched in %1$s with your search terms.  But we found results in other sections:','labtechco'), '<strong>' . $current_cpt_name . '</strong>' ) . '</p>';
		$return .= '<ul>'.$results_text.'</ul>';
		$return .= '</div>';
	} else {
		$return = '<p>'.esc_attr__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','labtechco').'</p>';
	}
	
	echo themestek_wp_kses($return);
	
}
}





/**
 *  Check if results found for CPT.. if not than redirect
 */
if( !function_exists('themestek_search_redirect') ){
function themestek_search_redirect(){
	
	// check if results found for selected CPT
	$current_cpt = ( !empty($_GET['post_type']) ) ? $_GET['post_type'] : 'post' ;
	
	$allsearch     = new WP_Query("s=".get_search_query()."&showposts=0&post_type=".$current_cpt);
	$total_results = $allsearch->found_posts;
	
	if( $total_results > 0 ){
		
		// We found some posts from selected CPT.. nothing to do
		
	} else {
		
		// Check if we found in other CPT
		$args = array(
			'public'   => true,
		);
		$cpt_obj = get_post_types( $args, 'objects' );
		foreach( $cpt_obj as $cpt ){
			if( !in_array( $cpt->name, array( 'attachment', 'ts-client', 'ts-testimonial', $current_cpt ) ) ){  // Exclude Media from search
				$allsearch     = new WP_Query("s=".get_search_query()."&showposts=0&post_type=".$cpt->name);
				$total_results = $allsearch->found_posts;
				if( $total_results > 0 ){
					$url = site_url() . '?s=' . get_search_query() . '&post_type=' . $cpt->name ;
					wp_redirect( $url );
					break;
					exit;
				}
				
			}
		}
		
	}
	
	
	
}
}



if( !function_exists('themestek_search_form') ){
function themestek_search_form(){
	$return      = '';
	$cpt_select  = '';
	$cpt_tab     = '';
	$current_cpt = ( !empty($_GET['post_type']) ) ? $_GET['post_type'] : 'post' ;
	
	// https://codex.wordpress.org/Function_Reference/get_post_types
	
	$args = array(
		'public'   => true,
	);

	// Get all CPT for list
	$cpt_obj = get_post_types( $args, 'objects' );
	if( !empty($cpt_obj) ){
		
		foreach( $cpt_obj as $cpt ){
			if( !in_array( $cpt->name, array( 'attachment', 'ts-client', 'ts-testimonial' ) ) ){  // Exclude Media from search
			
				$allsearch     = new WP_Query("s=".get_search_query()."&showposts=0&post_type=".$cpt->name);
				$total_results = $allsearch->found_posts;
				
				if( $total_results > 0 ){
					$results_text  = '  <span>'.sprintf( esc_attr__('%1$s found','labtechco'), $total_results ).'</span>';
					$results_class = ( $total_results > 0 ) ? '' : 'ts-search-form-tab-disabled' ;
					$current_class = ( $current_cpt == $cpt->name ) ? 'ts-search-form-tab-current' : '' ; 
					
					$cpt_tab .= '<li class="ts-search-form-tab ' . esc_attr($current_class) . '"><a href="#" data-cpt="' . $cpt->name . '"> ' . $cpt->label . $results_text . '</a></li>';
				}
				
			}
		}
		
		$no_tab_class = '';
		if( !empty($cpt_tab) ){
			$cpt_tab = '<div class="ts-search-form-tabs-w"><ul class="ts-search-form-tabs">'.$cpt_tab.'</ul></div>';
		} else {
			$no_tab_class = 'ts-search-result-without-tab';
		}
		
	}
	
	
	
	
	
	?>
	
	<div class="ts-search-form-wrapper <?php echo esc_attr($no_tab_class); ?>">
		<div class="ts-search-form-big-icon"><i class="ts-labtechco-icon-search-1"></i></div>
		<form role="search" method="get" class="search-form ts-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="ts-searchword">
				<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'labtechco' ); ?></span>
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'labtechco' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			</label>
			
			<input type="hidden" name="post_type" value="<?php echo esc_attr( $current_cpt ); ?>" />
			<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'labtechco' ); ?>" />
		</form>
		
		<?php echo themestek_wp_kses($cpt_tab); ?>
	
	</div>
	
	<?php
	
}
}




			
			
			
			

/**************** Recent Posts widget function **************/

/**
 *  Recent Posts widget function
 */
if( !function_exists('themestek_recent_posts') ){
function themestek_recent_posts( $post='' ){
	
	$return = '';
	
	$return .= '<li class="ts-recent-post-list-li">';
		if( has_post_thumbnail() ){
			$return .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'thumbnail') . '</a>';
		}		
		$return .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
		$return .= '<span class="post-date">' . get_the_date() . '</span>';
	$return .= '</li>';

	return $return;
	
}
}





/* ============================================================================== */
/* ----------------------- Footer functions ------------------------ */

/**
 *  Footer Copyright text - right
 *
 */
if( !function_exists('themestek_footer_copyright_right') ){
function themestek_footer_copyright_right(){
	$right  = themestek_get_option('footer_copyright_right');
	$return = '';
	
	if ( !shortcode_exists( 'ts-footermenu' ) ) {
		$right = str_replace('[ts-footermenu]', '', $right );
	}
	
	if( !empty($right) ){
		$return .= do_shortcode( $right );
	}
	
	return $return;
}
}









/* ============================================================================== */
/* ----------------------- The Events Calendar functions ------------------------ */

/**
 *  Events Calendar correction for data
 */
if( !function_exists('themestek_events_calendar_correction') ){
function themestek_events_calendar_correction(){
	global $posts;
	global $post;
	if( !empty($posts[0]->ID) ){
		$post = $posts[0];
	}
}
}










/* =================================================================== */
/* ----------------------- Sanitize functions ------------------------ */


/**
 *  Sanitize multiple html classes in one pass.
 *
 *  Accepts either an array of '$classes', or a space separated string of classes and
 *  sanitizes them using the 'sanitize_html_class' function.
 */
if( !function_exists('themestek_sanitize_html_classes') ){
function themestek_sanitize_html_classes($classes, $return_format = 'input'){
	if ( 'input' === $return_format ) {
		$return_format = is_array( $classes ) ? 'array' : 'string';
	}

	$classes = is_array( $classes ) ? $classes : explode( ' ', $classes );

	$sanitized_classes = array_map( 'sanitize_html_class', $classes );

	if ( 'array' === $return_format ){
		return $sanitized_classes;
	}else{
		return implode( ' ', $sanitized_classes );
	}

}
}




/**
 *  Sanitize html content here
 *
 */
if( !function_exists('themestek_wp_kses') ){
function themestek_wp_kses( $string, $allowed_html_type='' ){
	
	// default allowed html list
	$allowed_html = array(
		'aside' => array(
			'class' => array(),
			'id'    => array(),
			'role'  => array(),
		),
		'div' => array(
			'class'        => array(),
			'style'        => array(),
			'id'           => array(),
			'data-iconset' => array(),
			'data-icon'    => array(),
			'role'         => array(),
		),
		'span'   => array(
			'class'  => array(),
			'style'  => array(),
			'id'     => array(),
		),
		'i'   => array(
			'class'  => array(),
		),
		'h1'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'h2'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'h3'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'h4'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'h5'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'h6'   => array(
			'style'  => array(),
			'class'  => array(),
		),
		'input'   => array(
			'type'  => array(),
			'name'  => array(),
			'value' => array(),
			'class' => array(),
		),
		'a' => array(
			'href'     => array(),
			'title'    => array(),
			'class'    => array(),
			'target'   => array(),
			'data-cpt' => array(),
		),
		'br'     => array(),
		'em'     => array(),
		'strong' => array(),
		'ol'     => array(),
		'ul'     => array(
			'class'  => array(),
		),
		'li'     => array(
			'class'  => array(),
		),
		'p'    => array(
			'class' => array(),
		),
		'img' => array(
			'class'  => array(),
			'src'    => array(),
			'alt'    => array(),
			'title'  => array(),
			'width'  => array(),
			'height' => array(),
		),
		'sup'    => array(
			'class' => array(),
		),
		'sub'    => array(
			'class' => array(),
		),
		'iframe' => array(
			'src'         => array(),
			'width'       => array(),
			'height'      => array(),
			'scrolling'   => array(),
			'frameborder' => array(),
		),
		'time'    => array(
			'class'		=> array(),
			'datetime'	=> array(),
		),
		'select'    => array(
			'name'		=> array(),
			'class'		=> array(),
			'id'		=> array(),
		),
		'option'    => array(
			'value'		=> array(),
			'class'		=> array(),
			'selected'	=> array(),
		),
		'i'    => array(
			'class'		=> array(),
		),
		
	);
	
	
	
	// Optional - Change the allowed tag array.
	if( !empty($allowed_html_type) ){
		
		switch($allowed_html_type){
			case 'fid_icon': // Facts In Digits icon
				$allowed_html = array(
					'div' => array(
						'class' => array(),
						'id'    => array(),
					),
					'i'   => array(
						'class'  => array(),
					),
				);
				break;
		}
		
	}
	
	
	
	// final filter
	return wp_kses( $string, $allowed_html );

}
}







if ( ! function_exists( 'themestek_entry_date' ) ) :
function themestek_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) ){
		$format_prefix = esc_attr_x( '%1$s on %2$s', '1: post format name. 2: date', 'labtechco' );
	} else {
		$format_prefix = '%2$s';
	}
	
	
	$date = '<div class="themestek-post-date-wrapper">';
		$date .= sprintf( '<div class="themestek-entry-date-wrapper"><span class="themestek-entry-date"><time class="entry-date" datetime="%1$s" >%2$s<span class="entry-month entry-year">%3$s<span class="entry-year">%4$s</span></span></time></span></div>',
			get_the_date( 'c' ),
			get_the_date( 'j' ),
			get_the_date( 'M' ),
			get_the_date( 'Y' ),
			themestek_entry_icon()
		);
	$date .= '</div>';
	
	if ( $echo ){
		echo themestek_wp_kses($date);
	} else {
		return themestek_wp_kses($date);
	}
}
endif;





/* blog post classic style 2 */

if ( ! function_exists( 'labtechco_blogstyle2_meta' ) ) :

function labtechco_blogstyle2_meta( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$social_share = '';
	$metalist     = themestek_get_option( $metafor . '_meta_list' );
	$date_format  = themestek_get_option( $metafor . '_meta_dateformat' );
	$date_format = ( empty($date_format) ) ? get_option('date_format') : $date_format ;
	$cat_link     = themestek_get_option( $metafor . '_meta_catlink' );
	$tag_link     = themestek_get_option( $metafor . '_meta_taglink' );
	$author_link  = themestek_get_option( $metafor . '_meta_authorlink' );
	
	
	if( !empty($metalist['enabled']) && is_array($metalist['enabled']) && count($metalist['enabled'])>0 ){
		
		foreach( $metalist['enabled'] as $meta_id=>$meta_name ){
			
			switch( $meta_id ){
				
				
				case 'author':
					
					
					
					if ( 'post' === get_post_type() ) {
						// preparing link
						$author	= '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'.get_the_author().'</a>';
						
						if( $author_link!=true ){
							$author = strip_tags($author);
						}
						
						$return .= sprintf( '<span class="ts-meta-line byline"><i class="ts-labtechco-icon-user"></i> <span class="author vcard"><span class="screen-reader-text ts-hide">%1$s </span>%2$s</span></span>',
							esc_attr_x( 'Author', 'Used before post author name.', 'labtechco' ),
							$author
						);
					}


					break;
					
					
					
				case 'comment':
				
					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
						$return .= '<span class="ts-meta-line comments-link"><i class="ts-labtechco-icon-comments-smiley"></i> ';
						ob_start();
						comments_popup_link( esc_attr__( 'Leave a comment', 'labtechco' ) );
						$return .= ob_get_contents();
						ob_end_clean();
						$return .=  '</span>';
					}
					
					break;



				case 'cat':
					$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) {
						if( $cat_link!=true ){
							$categories_list = strip_tags($categories_list);
						}
						$return .= sprintf( '<span class="ts-meta-line cat-links"><i class="ts-labtechco-icon-category"></i> <span class="screen-reader-text ts-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ),
							$categories_list
						);
					}
					
					break;
					
				case 'tag':
					$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
					if ( !empty($tags_list) ) {
						if( $tag_link!=true ){
							$tags_list = strip_tags($tags_list);
						}
						$return .= sprintf( '<span class="ts-meta-line tags-links"><i class="ts-labtechco-icon-tag"></i> <span class="screen-reader-text ts-hide" ts-hide>%1$s </span>%2$s</span>',
							esc_attr_x( 'Tags', 'Used before tag names.', 'labtechco' ),
							$tags_list
						);
					}
					
					break;
					
			} // switch
			
		} // foreach
		
	}
	
	
	
	// Social share
	if( $metafor != "blogbox" ){
		$social_share = themestek_social_share_box('post');
	}
	
	// meta details
	if( !empty($return) ){
		$return = '<div class="ts-entry-meta-wrapper"><div class="entry-meta ts-entry-meta ts-entry-meta-' . $metafor . '">' . $return . '</div></div>' ;
	}
	
	if( 'link' == get_post_format() || 'quote' == get_post_format() ){
		$return = '';
	}
	
	return $return;
	
	
}
endif;


/* Get post date for entry meta data */

if ( ! function_exists( 'labtechco_posttime_meta' ) ) :
function labtechco_posttime_meta( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$date_format  = themestek_get_option( $metafor . '_meta_dateformat' );
	
		// date format
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated ts-hide" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				get_the_date($date_format),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date($date_format)
			);

			$return .= sprintf( '<span class="ts-meta-line posted-on"><span class="screen-reader-text ts-hide">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
				esc_attr_x( 'Posted on', 'Used before publish date.', 'labtechco' ),
				esc_url( get_permalink() ),
				$time_string
			);
			
		}
	return $return;		
}
endif;



/* Get post category name */

if ( ! function_exists( 'themestek_box_postcategory' ) ) :
function themestek_box_postcategory( $metafor="blogbox" ) {
	
	if( !in_array($metafor, array('blogclassic','blogbox') ) ){
		$metafor = "blogclassic";
	}
	
	$return       = '';
	$cat_link     = themestek_get_option( $metafor . '_meta_catlink' );
	
		// date format
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			
			$categories_list = get_the_category_list( ', ' );
					if ( !empty($categories_list) ) {
						if( $cat_link!=true ){
							$categories_list = strip_tags($categories_list);
						}
						$return .= sprintf( '<span class="ts-meta-line cat-links"><span class="screen-reader-text ts-hide">%1$s </span>%2$s</span>',
							esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ),
							$categories_list
						);
					}
			
		}
	return $return;		
}
endif;





/* footer socialbar links */

if( !function_exists('themestek_get_socialbar_links') ){
function themestek_get_socialbar_links( $tooltip_position='top' , $tooltip='yes' ){
	global $labtechco_theme_options;
	
	$socialArray = array(
		/* <social-id>  =>  <social-name> */
		'twitter'      => 'Twitter',
		'youtube'      => 'YouTube',
		'flickr'       => 'Flickr',
		'facebook'     => 'Facebook',
		'linkedin'     => 'LinkedIn',
		'gplus'        => 'Google+',
		'yelp'         => 'Yelp',
		'dribbble'     => 'Dribbble',
		'pinterest'    => 'Pinterest',
		'podcast'      => 'Podcast',
		'instagram'    => 'Instagram',
		'xing'         => 'Xing',
		'vimeo'        => 'Vimeo',
		'vk'           => 'VK',
		'houzz'        => 'Houzz',
		'issuu'        => 'Issuu',
		'google-drive' => 'Google Drive',
		'rss'          => 'RSS',
	);
	
	
	$return = '';
	if( !empty($labtechco_theme_options['social_icons_list']) ){
		foreach( $labtechco_theme_options['social_icons_list'] as $socialicon ){
			
			$social_id   = $socialicon['social_service_name'];
			$social_name = $socialArray[ $socialicon['social_service_name'] ];
			$social_link = ( !empty($socialicon['social_service_link']) ) ? trim($socialicon['social_service_link']) : '' ;
			
			
			// check for valid position for tooltip
			$class = '';
			$valie_tooltip_positions = array('top','right','bottom','left');
			if ( in_array( $tooltip_position, $valie_tooltip_positions ) ){
				$class = 'tooltip-' . $tooltip_position;
			}
			
			// If tooltip show or hide
			$data_tooltip = 'data-tooltip="'. $social_name .'"';
			if( !empty($tooltip) && $tooltip=='no' ){
				$data_tooltip = '';
			}
			
			// Link according to type of link
			$href = '#';
			if( $social_id == 'rss' ){
				$href = get_bloginfo('rss2_url');
			} else {
				$href = $social_link;
			}
			
			$return .= '<li class="ts-social-' . $social_id . ' ts-socialbox-i-wrapper"><a class="ts-socialbox-icon-link ts-socialbox-icon-link-' . $social_id . ' ' . sanitize_html_class($class) . '" target="_blank" href="' . $href . '"><span class="frame-hover"></span><i class="ts-labtechco-icon-' . $social_id . '"></i><span class="social_name">'.$social_name.'</span></a></li>' . "\n";
		}
	}

	foreach( $socialArray as $key=>$value ){
		
		if( $key == 'rss' ){
			if( isset($labtechco_theme_options['rss']) && $labtechco_theme_options['rss']=='1' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.get_bloginfo('rss2_url').'" data-tooltip="'.$value[1].'"><i class="ts-social-icon-'.$value[0].'"></i></a></li>';
			}
		} else {
			if( isset($labtechco_theme_options[$key]) && trim($labtechco_theme_options[$key])!='' ){
				$return .= '<li class="'.$key.' "><a target="_blank" href="'.esc_url($labtechco_theme_options[$key]).'" data-tooltip="'.$value[1].'"><i class="ts-social-icon-'.$value[0].'"></i></a></li>';
			}
		}
	}
	
	if( $return!='' ){
		$return = '<ul class="social-icons ts-socialbox-links-wrapper">'.$return.'</ul>';
	}
	
	return $return;
}
}



/**
 *  Checking if negative value in margin-top property (for ROW in VC). This is being used in vc_row.php file
 */
if( !function_exists('ts_check_if_minus_margin') ){
function ts_check_if_minus_margin( $css ){
	$return = false;
	if( !empty($css) ){
		$css_array = explode('{',$css);
		$css_array = $css_array[1];
		$css_array = str_replace('}', '', $css_array);
		$css_array = explode(';',$css_array);
		foreach( $css_array as $css_line ){
			if( substr($css_line,0,10) == 'margin-top' ){
				$css_line_array = explode(':',$css_line);
				if( !empty($css_line_array[1]) ){
					$css_line_array[1] = trim($css_line_array[1]);
					if( substr($css_line_array[1],0,1) == '-' ){
						$return = true;
					}
				}
			}
		}
	}
	return $return;
}
}







/**
 *
 */
if( !function_exists('ts_responsive_padding_margin') ){
function ts_responsive_padding_margin( $data='' , $parent_class='' ){
	
	$return = '';
	
	if( !empty($data) ){
		
		$data_array = explode('|',$data);
		
		$css_1200   = '';
		$css_991    = '';
		$css_767    = '';
		$css_custom = '';
		
		// add "px" if we dont find any "px" "%" or "em" in each value
		foreach( $data_array as $key=>$val ){
			if($key!=0 && $key!=1 && $key!=10 && $key!=19 && $key!=29 ){
				if( !empty($val) && substr($val, -2)!='px' && substr($val, -2)!='em' && substr($val, -1)!='%' ){
					$data_array[$key] = trim($val).'px';
				}
			}
		}
		
		$class		= ( !empty($data_array[0]) ) ? $data_array[0] : '' ;
		
		$css_1200	.= ( isset($data_array[2]) && ($data_array[2])!='' ) ? 'margin-top:'.$data_array[2].' !important;'			: '' ;
		$css_1200	.= ( isset($data_array[3]) && ($data_array[3])!='' ) ? 'margin-right:'.$data_array[3].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[4]) && ($data_array[4])!='' ) ? 'margin-bottom:'.$data_array[4].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[5]) && ($data_array[5])!='' ) ? 'margin-left:'.$data_array[5].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[6]) && ($data_array[6])!='' ) ? 'padding-top:'.$data_array[6].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[7]) && ($data_array[7])!='' ) ? 'padding-right:'.$data_array[7].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[8]) && ($data_array[8])!='' ) ? 'padding-bottom:'.$data_array[8].' !important;'		: '' ;
		$css_1200	.= ( isset($data_array[9]) && ($data_array[9])!='' ) ? 'padding-left:'.$data_array[9].' !important;'		: '' ;
		
		$css_991	.= ( isset($data_array[11]) && ($data_array[11])!='' )  ? 'margin-top:'.$data_array[11].' !important;'		: '' ;
		$css_991	.= ( isset($data_array[12]) && ($data_array[12])!='' ) ? 'margin-right:'.$data_array[12].' !important;'		: '' ;
		$css_991	.= ( isset($data_array[13]) && ($data_array[13])!='' ) ? 'margin-bottom:'.$data_array[13].' !important;'	: '' ;
		$css_991	.= ( isset($data_array[14]) && ($data_array[14])!='' ) ? 'margin-left:'.$data_array[14].' !important;'		: '' ;
		$css_991	.= ( isset($data_array[15]) && ($data_array[15])!='' ) ? 'padding-top:'.$data_array[15].' !important;'		: '' ;
		$css_991	.= ( isset($data_array[16]) && ($data_array[16])!='' ) ? 'padding-right:'.$data_array[16].' !important;'	: '' ;
		$css_991	.= ( isset($data_array[17]) && ($data_array[17])!='' ) ? 'padding-bottom:'.$data_array[17].' !important;'	: '' ;
		$css_991	.= ( isset($data_array[18]) && ($data_array[18])!='' ) ? 'padding-left:'.$data_array[18].' !important;'		: '' ;
		
		$css_767	.= ( isset($data_array[20]) && ($data_array[20])!='' ) ? 'margin-top:'.$data_array[20].' !important;'		: '' ;
		$css_767	.= ( isset($data_array[21]) && ($data_array[21])!='' ) ? 'margin-right:'.$data_array[21].' !important;'		: '' ;
		$css_767	.= ( isset($data_array[22]) && ($data_array[22])!='' ) ? 'margin-bottom:'.$data_array[22].' !important;'	: '' ;
		$css_767	.= ( isset($data_array[23]) && ($data_array[23])!='' ) ? 'margin-left:'.$data_array[23].' !important;'		: '' ;
		$css_767	.= ( isset($data_array[24]) && ($data_array[24])!='' ) ? 'padding-top:'.$data_array[24].' !important;'		: '' ;
		$css_767	.= ( isset($data_array[25]) && ($data_array[25])!='' ) ? 'padding-right:'.$data_array[25].' !important;'	: '' ;
		$css_767	.= ( isset($data_array[26]) && ($data_array[26])!='' ) ? 'padding-bottom:'.$data_array[26].' !important;'	: '' ;
		$css_767	.= ( isset($data_array[27]) && ($data_array[27])!='' ) ? 'padding-left:'.$data_array[27].' !important;'		: '' ;
		
		$custom_width = ( !empty($data_array[28]) ) ? $data_array[28] : '' ;
		
		$css_custom	.= ( isset($data_array[30]) && ($data_array[30])!='' ) ? 'margin-top:'.$data_array[30].' !important;'		: '' ;
		$css_custom	.= ( isset($data_array[31]) && ($data_array[31])!='' ) ? 'margin-right:'.$data_array[31].' !important;'		: '' ;
		$css_custom	.= ( isset($data_array[32]) && ($data_array[32])!='' ) ? 'margin-bottom:'.$data_array[32].' !important;'	: '' ;
		$css_custom	.= ( isset($data_array[33]) && ($data_array[33])!='' ) ? 'margin-left:'.$data_array[33].' !important;'		: '' ;
		$css_custom	.= ( isset($data_array[34]) && ($data_array[34])!='' ) ? 'padding-top:'.$data_array[34].' !important;'		: '' ;
		$css_custom	.= ( isset($data_array[35]) && ($data_array[35])!='' ) ? 'padding-right:'.$data_array[35].' !important;'	: '' ;
		$css_custom	.= ( isset($data_array[36]) && ($data_array[36])!='' ) ? 'padding-bottom:'.$data_array[36].' !important;'	: '' ;
		$css_custom	.= ( isset($data_array[37]) && ($data_array[37])!='' ) ? 'padding-left:'.$data_array[37].' !important;'		: '' ;
		
		
		
		if( !empty($css_1200)   ){ $return .= '@media (max-width: 1200px){ '.$parent_class.'.ts-responsive-custom-'.$class.'{'.$css_1200.'} }'; }
		if( !empty($css_991)    ){ $return .= '@media (max-width: 991px ){ '.$parent_class.'.ts-responsive-custom-'.$class.'{'.$css_991.'} }'; }
		if( !empty($css_767)    ){ $return .= '@media (max-width: 767px ){ '.$parent_class.'.ts-responsive-custom-'.$class.'{'.$css_767.'} }'; }
		if( !empty($css_custom) ){ $return .= '@media (max-width: '.$custom_width.' ){ '.$parent_class.'.ts-responsive-custom-'.$class.'{'.$css_custom.'} }'; }
		
	}
	
	return $return;
	
}
}



/**
 *   
 */
if( !function_exists('ts_responsive_padding_margin_class') ){
function ts_responsive_padding_margin_class( $data='' ){
	$return = '';
	if( !empty($data) ){
		$data_array = explode('|',$data);
		$return = ( !empty($data_array[0]) ) ? 'ts-responsive-custom-'.$data_array[0] : '' ;
	}
	return $return;
}
}
 

/**
 *  Check widget position has widgets or not
 */
if( !function_exists('themecheck_if_widget_position_content') ){
function themecheck_if_widget_position_content( $position='' ){
	ob_start();
	dynamic_sidebar($position);
	$sidebar = ob_get_contents();
	ob_end_clean();
	if( empty($sidebar) ){
		return false;
	} else {
		return true;
	}
}
}
 
 

/*---- End of core.php file ----*/
