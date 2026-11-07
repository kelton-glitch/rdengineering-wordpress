<?php
// [ts-logo]
if( !function_exists('themestek_sc_logo') ){
function themestek_sc_logo( $atts, $content=NULL ){
	
	$return = '';
	
	$labtechco_theme_options = get_option('labtechco_theme_options');
	
	if( !empty($labtechco_theme_options['logotype']) ){
	
		$return = '<span class="ts-sc-logo ts-sc-logo-type-'.$labtechco_theme_options['logotype'].'">';
		
		if( $labtechco_theme_options['logotype']=='image' ){
			if( isset($labtechco_theme_options['logoimg']) && is_array($labtechco_theme_options['logoimg']) ){
				
				// standard logo
				if( isset($labtechco_theme_options['logoimg']['full-url']) && trim($labtechco_theme_options['logoimg']['full-url'])!='' ){
					$image = $labtechco_theme_options['logoimg']['full-url'];
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$labtechco_theme_options['logoimg']['full-url'].'">';
				
				} else if( isset($labtechco_theme_options['logoimg']['thumb-url']) && trim($labtechco_theme_options['logoimg']['thumb-url'])!='' ){
					$image = $labtechco_theme_options['logoimg']['thumb-url'];
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$labtechco_theme_options['logoimg']['thumb-url'].'">';

				} else if( isset($labtechco_theme_options['logoimg']['id']) && trim($labtechco_theme_options['logoimg']['id'])!='' ){
					$image   = wp_get_attachment_image_src( $labtechco_theme_options['logoimg']['id'], 'full' );
					$return .= '<img class="themestek-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
					
					
				}
				
				
				// stikcy logo
				if( isset($labtechco_theme_options['logoimg_sticky']) && is_array($labtechco_theme_options['logoimg_sticky']) ){
					
					if( isset($labtechco_theme_options['logoimg_sticky']['full-url']) && trim($labtechco_theme_options['logoimg_sticky']['full-url'])!='' ){
						$sticky_image   = $labtechco_theme_options['logoimg_sticky']['full-url'];
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$labtechco_theme_options['logoimg_sticky']['full-url'].'">';
					
					} else if( isset($labtechco_theme_options['logoimg_sticky']['thumb-url']) && trim($labtechco_theme_options['logoimg_sticky']['thumb-url'])!='' ){
						$sticky_image   = $labtechco_theme_options['logoimg_sticky']['thumb-url'];
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$labtechco_theme_options['logoimg_sticky']['thumb-url'].'">';
					
					} else if( isset($labtechco_theme_options['logoimg_sticky']['id']) && trim($labtechco_theme_options['logoimg_sticky']['id'])!='' ){
						$sticky_image   = wp_get_attachment_image_src( $labtechco_theme_options['logoimg_sticky']['id'], 'full' );
						$return .= '<img class="themestek-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$sticky_image[0].'" width="'.$sticky_image[1].'" height="'.$image[2].'">';
						
					}
					
				}
				
				
			}
		} else {
			if( !empty($labtechco_theme_options['logotext']) ){
				$return = $labtechco_theme_options['logotext'];
			}
		}
		
		$return .= '</span>';
		
	}
	
	return $return;
}
}
add_shortcode( 'ts-logo', 'themestek_sc_logo' );