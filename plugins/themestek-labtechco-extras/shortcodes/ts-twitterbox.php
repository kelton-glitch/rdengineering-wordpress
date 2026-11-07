<?php
// [ts-twitterbox consumer_key="v6t8ta31234ZkoljqvBDa" consumer_secret="731111dgQqSflffj1t68e60ly1sy5gvvuBgmCXlGEQg" oauth_token="156789585-yOkqsdefmgnrkgjhnrtfjhlgUXRNwkIIWOSCnk3SMOjzKx" oauth_token_secret="dgthuyjrtfjhka3Vh2J0DGr7oR6pBMLdLtnwo5E"]
if( !function_exists('themestek_sc_twitterbox') ){
function themestek_sc_twitterbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $ts_sc_params_twitterbox;
		$options_list = ts_create_options_list($ts_sc_params_twitterbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		if( function_exists('latest_tweets_render') ){
			
			// Starting wrapper of the whole arear
			$return .= themestek_box_wrapper( 'start', 'twitterbox', get_defined_vars() );
			
				// Heading element
				$return .= ts_vc_element_heading( get_defined_vars() );
				
				
				$settings = array();
				$settings['username']	  = $username;
				$settings['followustext'] = $followustext;
				$settings['show']		  = $show;
				//$settings['data']		  = $datatags;
				$settings['column']		  = $column;
				//$settings['boxwidth']	  = $boxwidth;
				$settings['boxview']      = $boxview;
				$settings['el_class'] 	  = $el_class;
				
				
				
				/***** Fetching from the plugin code *******/
				
				$screen_name = $username;
				$num         = $show;
				
				// Retweets
				//$rts = false;
				//if( $retweets == 'y' ){ $rts = true; }
				
				// Replies
				//$ats = false;
				//if( $replies  == 'y' ){ $ats = true; }
				
				// Populatiry
				//$pop = (int) $popularity;
				
				
				
				$items = latest_tweets_render( $screen_name, $num, true, true, 0 );
				$list  = apply_filters('latest_tweets_render_list', $items, $screen_name );
				
				// preparing html via this function
				$return .= $tweetList = themestek_twitterbox($settings, $list);
				
				/* *********************************** */
				
				
			
			// Ending wrapper of the whole arear
			$return .= themestek_box_wrapper( 'end', 'twitterbox', get_defined_vars() );
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'ts-twitterbox', 'themestek_sc_twitterbox' );






function themestek_twitterbox( $settings, $dataArray ) {
	

	
	$followustext = '';
	if( !empty($settings['followustext']) ){
		$followustext = '<br><span class="ts-sc-twitterbox-followus-text"><small>' . $settings['followustext'] . '</small></span>';
	}
	
	
	// Screen name
	
	$twitter_handle_link = '';
	if( !empty($settings['username']) ){
		$twitter_handle_link = '<h3><span class="themestek-hide">Twitter link</span><a target="_blank" class="twitter-link" href="http://twitter.com/' . $settings['username'] . '"><i class="fa fa-twitter"></i>'.$followustext.'</a></h3>';
	}
	
	
	$return   = '';
	$datahtml = $dataArray;
	if( is_array($datahtml) && count($datahtml)>0 ){
		
		$dataContent = '';
		
		foreach( $datahtml as $data ){
			$dataContent .= themestek_column_div('start', $settings['column'] );
			$dataContent .= $data;
			$dataContent .= themestek_column_div('end', $settings['column'] );
		}
		
		
		
		
		
		
		$return .= '
			<section class="themestek-twitterbox-wrapper themestek-items-wrapper">
				<div class="themestek-twitterbox-inner">
					' . $twitter_handle_link . '
					<div class="row multi-columns-row themestek-boxes-row-wrapper">
						'.$dataContent.'
					</div>
				</div>
			</section>';
		
	} else {
		$return .= 'Incorrect key or empty key. Please fill correct Twitter keys. You will get keys from <a href="https://dev.twitter.com" target="_blank">https://dev.twitter.com</a>.';
	}
	
	return $return;
	
} // print_footertwitterbar()

