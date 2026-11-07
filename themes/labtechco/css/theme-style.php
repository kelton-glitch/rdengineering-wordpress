<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = themestek_get_option('skincolor');
$skincolor_dark = themestek_get_option('skincolor_dark');
$skincolor_light = themestek_get_option('skincolor_light');

/* Getting Gradient skin color */
$first_gradient = themestek_get_option('first_gradient');
$second_gradient = themestek_get_option('second_gradient');


/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}


/*
 *  Setting variables for different Theme Options
 */
$header_height        = themestek_get_option('header_height');
$first_menu_margin    = themestek_get_option('first_menu_margin');
$titlebar_height      = themestek_get_option('titlebar_height');
$header_height_sticky = themestek_get_option('header_height_sticky');
$center_logo_width    = themestek_get_option('center_logo_width');

$header_btn						   = themestek_get_option('header_btn');
$header_bg_color                   = themestek_get_option('header_bg_color');
$responsive_header_bg_custom_color = themestek_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = themestek_get_option('header_bg_custom_color');
$sticky_header_bg_color            = themestek_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = themestek_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;

$sticky_header_menu_bg_color        = themestek_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = themestek_get_option('sticky_header_menu_bg_custom_color');

$general_font = themestek_get_option('general_font');


$titlebar_bg_color          = themestek_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = themestek_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = themestek_get_option('titlebar_text_color');
$titlebar_text_custom_color = themestek_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = themestek_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = themestek_get_option('titlebar_breadcrumb_font', 'color');

$topbar_text_color        = themestek_get_option('topbar_text_color');
$topbar_text_custom_color = themestek_get_option('topbar_text_custom_color');
$topbar_bg_color          = themestek_get_option('topbar_bg_color');
$topbar_bg_custom_color   = themestek_get_option('topbar_bg_custom_color');

$topbar_breakpoint        = themestek_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = themestek_get_option('topbar-breakpoint-custom');


$mainmenufont            = themestek_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$stickymainmenufontcolor = themestek_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;

$dropdownmenufont = themestek_get_option('dropdownmenufont');

$mainmenu_active_link_color        = themestek_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = themestek_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = themestek_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = themestek_get_option('dropmenu_active_link_custom_color');

$dropmenu_background = themestek_get_option('dropmenu_background');

$logoMaxHeight       = themestek_get_option('logo_max_height');
$logoMaxHeightSticky = themestek_get_option('logo_max_height_sticky');

$inner_background = themestek_get_option('inner_background');

$headerbg_color       = themestek_get_option('header_bg_color');
$headerbg_customcolor = themestek_get_option('header_bg_custom_color');

$header_menu_bg_color        = themestek_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = themestek_get_option('header_menu_bg_custom_color');


$menu_breakpoint        = themestek_get_option('menu_breakpoint');
$menu_breakpoint_custom = themestek_get_option('menu_breakpoint-custom');

$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;

$logo_font = themestek_get_option('logo_font');

$loaderimg          = themestek_get_option('loaderimg');
$loaderimage_custom = themestek_get_option('loaderimage_custom');

$fbar_breakpoint        = themestek_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = themestek_get_option('floatingbar-breakpoint-custom');

$all_data = tste_get_all_option_array();

$gradient_first = '#ffff00';
$gradient_last  = '#ffff00';
if( function_exists('themestek_get_option') ){
	$gradient_colors = themestek_get_option('gradient-color');
	$gradient_first  = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ffff00' ;
	$gradient_last   = ( !empty($gradient_colors['last'])  ) ? $gradient_colors['last']  : '#ffff00' ;
}
// new code start here
$new_all_data=array();
foreach( $all_data as $key=>$val) {
    $key=str_replace( '_', '-', $key);
    $key=str_replace( '_', '-', $key);
    $key=str_replace( '_', '-', $key);
    $key=str_replace( '_', '-', $key);
    $key=str_replace( '_', '-', $key);
    $new_all_data[$key]=$val;
}

// allowed to create css variables
$allowed=array( 
	'skincolor', 
	'skincolor-dark', 
	'gradient-color', 
	'first-gradient',
	'second-gradient',
	'white-color', 
	'skincolor-light', 
	'header-height', 
	'header-height-sticky',
	'header-btn-bg-color',
	'header-btn-bg-color-hover',
	'menu-breakpoint', 
	'mainmenufont', 
	'stickymainmenufontcolor', 
	'mainmenu-active-link-color',
	'mainmenu-active-link-custom-color',
	'dropdownmenufont',
	'dropmenu-active-link-custom-color',
	'sticky-header-menu-bg-color', 
	'topbar-bg-color',
	'topbar-bg-custom-color',
	'header-bg-custom-color',
	'topbar-text-color',
	'topbar-breakpoint',
	'topbar-text-custom-color',
	'header-menu-bg-color',
	'header-menu-bg-custom-color',
	'sticky-header-menu-bg-color',
	'sticky-header-bg-custom-color',
	'sticky-header-menu-bg-custom-color',
	'header-menuarea-height',
	'link-color', 
	'logo-max-height',
	'logo-font',
	'titlebar-height', 
	'general-font',
	'sticky-logo-height',
);
?>:root {
    <?php foreach( $new_all_data as $key=>$val) {
        if( in_array( $key, array( 'sticky-logo-height', 'header-height', 'header-height-sticky', 'header-menuarea-height', 'logo-max-height', 'topbar-breakpoint', 'menu-breakpoint', 'titlebar-height'))) {
            $val .='px';
        }
        if( in_array( $key, $allowed)) {
            if( is_array($val)) {
                foreach( $val as $val_key=>$val_val) {
                    if( !empty($val_val)) {
                        ?>--tste-labtechco-<?php echo esc_attr($key);
                        ?>-<?php echo esc_attr($val_key);
                        ?>: <?php echo esc_attr($val_val);
                        ?>;
                        <?php
                    }
                }
            }
            else {
                ?>--tste-labtechco-<?php echo esc_attr($key);
                ?>: <?php echo esc_attr($val) ?>;
                <?php
            }
        }
    }
    // value is color for the option
    $colors=array( 
		'skincolor', 
		'skincolor-dark', 
		'white-color', 
		'gradient-color',
		'skincolor-light', 
		'mainmenufont',
		'dropdownmenufont',
		'stickymainmenufontcolor',
	);
    foreach( $new_all_data as $key=>$val) {
        if( in_array( $key, $colors)) {
            if( is_array($val) && isset($val['color'])) {
                $key .='-color';
                $val=$val['color'];
            }
            ?>--tste-labtechco-<?php echo esc_attr($key);
            ?>-rgb: <?php echo esc_attr( themestek_hex2rgb($val)) ?>;
            <?php
        }
    }
    ?>
}


 <?php /* CSS :root ends here */


/* Output start
------------------------------------------------------------------------------*/ 


/* Custom CSS Code at top */
$custom_css_code_top = themestek_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	// We are not escaping / sanitizing as we are expecting css code. 
	echo trim($custom_css_code_top);
}
?>

/*------------------------------------------------------------------
* theme-style.php index *
[Table of contents]

1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/



/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themestek_get_all_background_css());
?>


/**
 * 0. Font properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(themestek_get_all_font_css());
?>



/**
 * 0. Text link and hover color properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 

$themestek_a_color = themestek_a_color();
if( !empty($themestek_a_color) ){
	echo trim($themestek_a_color);
}
?>



/**
 * 0. Header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
	.site-header.ts-bgcolor-custom:not(.is_stuck),
	.ts-header-style-classic-box.ts-header-overlay .site-header.ts-bgcolor-custom:not(.is_stuck) .ts-container-for-header{
		background-color: var(--tste-labtechco-header-bg-custom-color) !important;
	}
	<?php
}
?>

/**
 * 0. Sticky header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
	.is_stuck.site-header.ts-sticky-bgcolor-custom{
		background-color: var( --tste-labtechco-sticky-header-bg-custom-color) !important;
	}
	<?php
}
?>


/**
 * 0. header menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
	.ts-header-menu-bg-color-custom{
		background-color:var(--tste-labtechco-header-menu-bg-custom-color);
		<!-- center logo transparent header ma issue kare che important -->
	}
	<?php
}
?>


/**
 * 0. Sticky menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.ts-sticky-bgcolor-custom,
	.is_stuck .ts-sticky-bgcolor-custom{
		background-color:var(--tste-labtechco-sticky-header-menu-bg-custom-color) !important;
	}
	<?php
}
?>


/**
 * 0. Header button bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( !empty($header_btn['header_btn_bg_color'])  ){
	?>
	@media (min-width: 1200px){
		.ts-header-style-2 .ts-header-block .ts-vc_btn3-container .ts-vc_btn3,
		.ts-header-style-2 .ts-header-text-area.ts-header-button-w a,
		.ts-header-style-4 .ts-header-block .ts-vc_btn3-container .ts-vc_btn3,
		.ts-header-style-4 .ts-header-text-area.ts-header-button-w a{
			background-color:<?php echo esc_attr($header_btn['header_btn_bg_color']); ?> !important;
		}
	}
	<?php
}
if( !empty($header_btn['header_btn_bg_color_hover'])  ){
	?>
	@media (min-width: 1200px){
		.ts-header-style-2 .ts-header-block .ts-vc_btn3-container .ts-vc_btn3:hover,
		.ts-header-style-2 .ts-header-text-area.ts-header-button-w a:hover,
		.ts-header-style-4 .ts-header-block .ts-vc_btn3-container .ts-vc_btn3:hover,
		.ts-header-style-4 .ts-header-text-area.ts-header-button-w a:hover {
			background-color:<?php echo esc_attr($header_btn['header_btn_bg_color_hover']); ?> !important;
		}
	}
	<?php
}
?>


/**
 * 0. List style special style
 * ----------------------------------------------------------------------------
 */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column{
	color:var(--tste-labtechco-general-font-color);
}


/**
 * 0. Page loader css
 * ----------------------------------------------------------------------------
 */
<?php echo themestek_get_page_loader_css(); ?>



/**
 * 0. Floating bar
 * ----------------------------------------------------------------------------
 */
<?php echo themestek_floatingbar_inline_css(); ?>




/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.ts-titlebar-wrapper .ts-titlebar-inner-wrapper{
	background-color: <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.ts-titlebar-wrapper{
	background-color:  <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>

/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.ts-titlebar-wrapper .ts-titlebar-main h1.entry-title{
	color: <?php echo esc_attr($titlebar_text_custom_color); ?> !important;
}
.ts-titlebar-wrapper .ts-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_attr($titlebar_subheading_text_custom_color); ?> !important;
}
.ts-titlebar-main .breadcrumb-wrapper, .ts-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo themestek_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.ts-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo themestek_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 0.7) !important;
}
<?php endif; ?>

.ts-titlebar-wrapper .ts-titlebar-inner-wrapper{
	height: <?php echo esc_attr($titlebar_height); ?>px;	
}
.ts-header-overlay .themestek-titlebar-wrapper .ts-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr(($header_height+30)); ?>px;
}

/* Logo Max-Height */
.headerlogo img{
    max-height: var(--tste-labtechco-logo-max-height);
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeightSticky); ?>px;
}
span.ts-sc-logo.ts-sc-logo-type-image {
    position: relative;
	display: block;
	z-index: 1;
}

/**
 * Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .themestek-topbar{
		color: rgb( var(--tste-labtechco-topbar-text-custom-color-rgb) , 0.7);
	}
	.themestek-topbar-textcolor-custom .social-icons li a{
		  border: 1px solid rgb( var(--tste-labtechco-topbar-text-custom-color-rgb) , 0.7);
	}
	.site-header .themestek-topbar a{
		color: rgb( var(--tste-labtechco-topbar-text-custom-color-rbg) , 1);
	}
<?php endif; ?>

<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.themestek-pre-header-wrapper {
		background-color: var(--tste-labtechco-topbar-bg-custom-color);
	}
<?php endif; ?>

<?php

if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_attr($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_attr($topbar_breakpoint); ?>px){
		.themestek-pre-header-wrapper{
			display: none !important;
		}
	}

	<?php
}
?>
.main-form.rounded-form  input[type="text"]:focus, 
.main-form.rounded-form  input[type="email"]:focus, 
.main-form.rounded-form  textarea:focus,
.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, 
select:focus, 
blockquote{
	border-color: var(--tste-labtechco-skincolor);
}


/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tsicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgb( var(--tste-labtechco-mainmenufont-color-rgb); , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: var(--tste-labtechco-skincolor) !important;
}

<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.ts-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgb( var(--tste-labtechco-dropdownmenufont-color-rgb) , 0.8);
		font-weight: normal;
	}
<?php endif; ?>


/*Logo Color --------------------------------*/ 
span.site-title{
	color: var(--tste-labtechco-logo-font-color);
}




/**
 * Heading Elements
 * ----------------------------------------------------------------------------
 */
.ts-textcolor-skincolor h1,
.ts-textcolor-skincolor h2,
.ts-textcolor-skincolor h3,
.ts-textcolor-skincolor h4,
.ts-textcolor-skincolor h5,
.ts-textcolor-skincolor h6,

.ts-textcolor-skincolor .ts-vc_cta3-content-header h2{
	color: var(--tste-labtechco-skincolor) !important;
}
.ts-textcolor-skincolor .ts-vc_cta3-content-header h4{
	color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90) !important;
}
.ts-textcolor-skincolor .ts-vc_cta3-content .ts-cta3-description{
	color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.60) !important;
}Max Width for dynamic 
.ts-textcolor-skincolor{Max Width for dynamic 
	color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.60);
}
.ts-textcolor-skincolor a{
	color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.80);
}

/**
 * Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php

if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){

	if( esc_attr($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_attr($fbar_breakpoint); ?>px){
	.themestek-fbar-btn,
	    .themestek-fbar-box-w{
			display: none !important;
		}
	}
	<?php
}
?>


/**
 * 1. Textcolor
 * ----------------------------------------------------------------------------
 */

.widget-area.sidebar .widget.widget_block a:hover,

.themestek-pre-header-wrapper .top-contact li a:hover,

footer a:hover,
blockquote:after,
section.error-404 .ts-big-icon,

/* Icon basic color */
.ts-icolor-skincolor,

.ts-bgcolor-darkgrey ul.labtechco_contact_widget_wrapper li a:hover,
.ts-vc_general.ts-vc_cta3.ts-vc_cta3-color-skincolor.ts-vc_cta3-style-classic .ts-vc_cta3-content-header, 
.ts-vc_icon_element-color-skincolor, 
 
.ts-bgcolor-skincolor .themestek-pagination .page-numbers.current, 
.ts-bgcolor-skincolor .themestek-pagination .page-numbers:hover,
.ts-dcap-txt-color-skincolor,


/* Global Button */ 
.ts-vc_general.ts-vc_btn3.ts-vc_btn3-style-text.ts-vc_btn3-color-white:hover,
article.post .entry-title a:hover,

.comment-reply-link,

/* Global */ 
.ts-skincolor-strong  strong,
.ts-skincolor,
.ts-element-heading-wrapper .ts-vc_general .ts-vc_cta3_content-container .ts-vc_cta3-content .ts-vc_cta3-content-header h4.ts-skincolor,

/* lsit style */ 
.ts-list-style-disc.ts-list-icon-color-skincolor li,
.ts-list-style-circle.ts-list-icon-color-skincolor li,
.ts-list-style-square.ts-list-icon-color-skincolor li,

.ts-list-style-decimal.ts-list-icon-color-skincolor li,
.ts-list-style-upper-alpha.ts-list-icon-color-skincolor li,
.ts-list-style-roman.ts-list-icon-color-skincolor li,
.ts-list.ts-skincolor li .ts-list-li-content, 
 .ts-search-results-pages-w .ts-list-li-content a:hover,
.ts-textcolor-white a:hover, 

.ts-fid-icon-wrapper i,
.ts-textcolor-skincolor,
.ts-textcolor-skincolor a,
.themestek-box-title h4 a:hover,

/* Text color skin in row secion*/
.ts-background-image.ts-row-textcolor-skin h1, 
.ts-background-image.ts-row-textcolor-skin h2, 
.ts-background-image.ts-row-textcolor-skin h3, 
.ts-background-image.ts-row-textcolor-skin h4, 
.ts-background-image.ts-row-textcolor-skin h5, 
.ts-background-image.ts-row-textcolor-skin h6,
.ts-background-image.ts-row-textcolor-skin .ts-element-heading-wrapper h2,
.ts-background-image.ts-row-textcolor-skin .themestek-testimonial-title,
.ts-background-image.ts-row-textcolor-skin a,
.ts-background-image.ts-row-textcolor-skin .item-content a:hover,

.ts-row-textcolor-skin h1, 
.ts-row-textcolor-skin h2, 
.ts-row-textcolor-skin h3, 
.ts-row-textcolor-skin h4, 
.ts-row-textcolor-skin h5, 
.ts-row-textcolor-skin h6,
.ts-row-textcolor-skin .ts-element-heading-wrapper h2,
.ts-row-textcolor-skin .themestek-testimonial-title,
.ts-row-textcolor-skin a,
.ts-row-textcolor-skin .item-content a:hover,

.sidebar .widget_recent_comments li.recentcomments a:hover, 
.sidebar .themestek_widget_recent_entries a:hover, 
.sidebar .widget_recent_entries a:hover, 
.sidebar .widget_meta a:hover, 
.sidebar .widget_categories a:hover, 
.sidebar .widget_archive li a:hover, 
.sidebar .widget_pages li a:hover, 
.sidebar .widget_nav_menu li a:hover,

ul.ts-recent-post-list > li .post-date,
.single-ts-portfolio .nav-links a:hover,
.author-info .ts-author-social-links-wrapper ul li a:hover,
.ts-team-details-line .ts-team-list-value a:hover,
.ts-team-details-line i,
.ts-pf-details-heading i,
.ts-pf-single-content-wrapper .ts-social-share-links ul li a:hover,
.ts-custom-bt .ts-vc_general.ts-vc_btn3:hover,
.ts-custom-bt .ts-vc_btn3.ts-vc_btn3-style-text.ts-vc_btn3-size-md.ts-vc_btn3-icon-left:not(.ts-vc_btn3-o-empty) .ts-vc_btn3-icon,
ul.labtechco_contact_widget_wrapper li:before,

.ts-featured-meta-wrapper .ts-metaline .ts-meta-line:not(.cat-links) a:hover,
.themestek-boxes-view-carousel:not(.themestek-boxes-col-one) .themestek-boxes-row-wrapper .slick-arrow:hover:before,

.ts-custom-col-style ul.ts-pricelist-block li .service-price,
.themestek-box-team-style-3 .themestek-box-team-position,
.themestek-box-team-style-3 .themestek-box-content-inner .themestek-teambox-email i,
.themestek-box-team-style-3 .themestek-box-content-inner .themestek-teambox-email a:hover,


body .appointment input[type="submit"],
.ts-vc_general.ts-vc_btn3-color-skincolor,
.ts-icon-skincolor-strong strong,
.ts-icon-skincolor i, 
.ts-team-social-links li a:hover,
.ts-skincolor h3,
.themestek-box-testimonial .themestek-author-name,
.themestek-box-testimonial .themestek-author-name a,
h3.ts-fid-inner span:first-child,

.themestek-box.ts-portfoliobox-style-6 .themestek-box-link a:hover,
.ts-featured-meta-wrapper .ts-meta-line i,
.themestek-box-blog .themestek-box-title h4 a:hover,
.themestek-box-blog .themestek-blogbox-footer-readmore a:hover,
.themestek-blogbox-footer-readmore a:hover,
.ts-featured-meta-wrapper .ts-meta-line a:hover{
	color: var(--tste-labtechco-skincolor);
}


/**
 * 2. Background
 * ----------------------------------------------------------------------------
 */
 /*Appointment-form*/
 .select2-container--default .select2-results__option--highlighted[aria-selected],
/* Custom Subheading */
.ts-heading-shape-rounded h4.ts-custom-heading:before,

.edit-link a:hover,

/* Search result */
.ts-team-member-single-content-wrapper .ts-team-social-links li a:hover,


/* Blogbox */



/* Header bacground color */
.themestek-pre-header-wrapper .social-icons li > a:hover,


.site-header-menu.ts-sticky-bgcolor-skincolor.is_stuck,
.is_stuck.ts-sticky-bgcolor-skincolor,

.ts-bgcolor-skincolor,
.ts-skincolor-bg,
.ts-col-bgcolor-skincolor .ts-bg-layer-inner,
.ts-bgcolor-skincolor > .ts-bg-layer,
footer#colophon.ts-bgcolor-skincolor > .ts-bg-layer,
.ts-titlebar-wrapper.ts-bgcolor-skincolor .ts-titlebar-wrapper-bg-layer,
.ts-titlebar-wrapper.ts-breadcrumb-on-bottom .ts-titlebar .breadcrumb-wrapper .container,

.themestek-pagination .page-numbers.current, 
.themestek-pagination .page-numbers:hover,
.ts-social-share-links ul li a:hover,

/*Search Result Page*/
.ts-sresults-title small a,
.ts-sresult-form-wrapper,

.widget.labtechco_category_list_widget li a:hover,
.widget.themestek_widget_list_all_posts ul > li.ts-post-active a,

.widget.labtechco_category_list_widget li.current-cat a,
.widget.themestek_widget_list_all_posts ul > li a:hover,

.widget-area.sidebar .widget_search .wp-block-search__label:after,
.widget-area.sidebar .widget_block .wp-block-group h2:after,
.sidebar h3.widget-title:after,
mark, 
ins,

.tagcloud a:hover,
.ts_prettyphoto .vc_single_image-wrapper:after, 
#totop,
.ts-commonform input[type="submit"],
.ts-sortable-list .ts-sortable-link a:hover,
.ts-sortable-list .ts-sortable-link a.selected,
.comment-body .reply a:hover,


.themestek-pf-single-content-bottom .ts-pf-single-category-w a:hover,
.themestek-box-portfolio.themestek-box-view-overlay .themestek-icon-box:hover,

.ts-vc_icon_element-background-color-skincolor,

.footer .widget-title:after,

.wpb-js-composer .vc_tta-shape-square.vc_tta-color-black .vc_tta-panel.vc_active .vc_tta-panel-title > a:after,
.wpb-js-composer .vc_tta-color-black.vc_tta-style-outline .vc_tta-tab.vc_active > a:after,
.ts-vc_general.ts-vc_btn3.ts-vc_btn3-color-skincolor.ts-vc_btn3-style-outline:hover,
.ts-vc_general.ts-vc_btn3.ts-vc_btn3-color-skincolor:not(.ts-vc_btn3-style-text):not(.ts-vc_btn3-style-outline),
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
.themestek-box-blog-classic .ts-blog-classic-datebox-overlay,
 button, input[type="submit"],
.ts-col-bgcolor-skincolor,
.ts-blogbox-style-4:hover .themestek-meta-date,
.ts-bold-list.ts-list.ts-list-style-icon li i,
.ts-bold-list .elementor-icon-list-items li i,
.ts-ihbox-style-left-icon-skin-hover:hover,
.ts-ihbox-hoverstyle-1:hover,
.ts-featured-meta-wrapper .ts-featured-meta-comments-tableper,
.themestek-box-view-overlay.themestek-portfolio-box-view-overlay-icon-desc .themestek-media-link a, 
.ts-vc_btn3.ts-vc_btn3-color-black.ts-vc_btn3-style-classic:hover,
.ts-vc_btn3.ts-vc_btn3-color-black, .ts-vc_btn3.ts-vc_btn3-color-black.ts-vc_btn3-style-flat:hover,
.themestek-teambox-left-image .themestek-box-content ul li a:hover{
	background-color: var(--tste-labtechco-skincolor);
}
.comment-body .reply a,
.themestek-box-team-style4 .themestek-box-content,
.twentytwenty-handle,

.ts-teambox-style-5.themestek-box .ts-team-social-links li a,
.themestek-box-team-style-3.themestek-box .ts-team-social-links li a:hover,

.themestek-portfolio-box-view-overlay-simple.themestek-box-view-overlay .themestek-overlay,
.themestek-portfolio-box-view-overlay-two-icon-title.themestek-box-view-overlay .themestek-overlay,
.themestek-portfolio-box-view-overlay-two-icon-skin.themestek-box-view-overlay .themestek-overlay{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.80) ;
}

.ts-bt-skincolor{
	background-color: var(--tste-labtechco-skincolor) !important;
}

.ts-col-bgcolor-dark{
	background-color: var(--tste-labtechco-skincolor-dark);
}



/**
 * 3. Tabs and Accordion
 * ----------------------------------------------------------------------------
 */

/******** Tab style ********/

/* Tab flat style */
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab>a:hover,
.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,

/* Tab modern style */
.wpb-js-composer .vc_tta-style-modern.vc_tta-color-skincolor .vc_tta-tab>a, 
.wpb-js-composer .vc_tta-style-modern.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,


/* Tab classic style */
.wpb-js-composer .vc_tta-style-modern.vc_tta-shape-square.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a:hover,
.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-modern.vc_tta-color-skincolor.vc_tta-shape-square .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta-style-modern.vc_tta-shape-square.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a, 
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a:focus,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a:hover,
.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:hover,
.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor.vc_tta-shape-square .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a{
	background-color: var(--tste-labtechco-skincolor);
}


.wpb-js-composer .vc_tta-style-flat.vc_tta-color-skincolor:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.80);
}

/* Tab outline style */
.wpb-js-composer .vc_tta-container  .vc_tta-style-outline.vc_tta.vc_general.vc_tta-color-skincolor .vc_tta-tab.vc_active>a {
    border-color: var(--tste-labtechco-skincolor);    
    color: var(--tste-labtechco-skincolor);
}
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-tab>a {
    border-color: var(--tste-labtechco-skincolor);    
    color: var(--tste-labtechco-skincolor);
}
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_active .vc_tta-tab>a:hover{
	background-color: var(--tste-labtechco-skincolor);
}


.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: var(--tste-labtechco-skincolor);
}



.wpb-js-composer .vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a{
	color: var(--tste-labtechco-skincolor);
}

.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-controls-icon::after, .vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-controls-icon::before,

 .wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body,
 .wpb-js-composer .vc_tta-accordion.vc_tta-style-outline.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading{
 	border-color: var(--tste-labtechco-skincolor);    
}


/******** Accordion style ********/
/* Tab classic style */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic:not(.vc_tta-o-no-fill) .vc_tta-panel .vc_tta-panel-body {
    background-color: var(--tste-labtechco-skincolor);
}
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:focus, 
.wpb-js-composer .vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading:hover {
	background-color: var(--tste-labtechco-skincolor);
}


/**
 * Border color
 * ----------------------------------------------------------------------------
 */

.ts-vc_btn3-style-outline.ts-vc_btn3-color-skincolor:not(.ts-vc_btn3-style-text),
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-tab>a{
	border-color: var(--tste-labtechco-skincolor);
}
.main-form .select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: var(--tste-labtechco-skincolor) transparent transparent transparent;
}
.main-form  .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent var(--tste-labtechco-skincolor) transparent;
    border-width: 0 4px 5px 4px;
}

/* Progress Bar Section */
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor span.ts-vc_label_units.vc_label_units:before,
span.ts-vc_label_units.vc_label_units:before{ 
	border-color: var(--tste-labtechco-skincolor) transparent; 
}
.nav-links .nav-next:before, .nav-links .nav-previous:before{
	border-bottom-color: var(--tste-labtechco-skincolor); 
}
body table.booked-calendar td.today .date span,
body table.booked-calendar th{
	border-color: var(--tste-labtechco-skincolor) !important;
}
.slick-dots li.slick-active button{
	box-shadow: inset 0 0 0 2px var(--tste-labtechco-skincolor);
}

 /******** Gradient ********/
.ts-bgcolor-gradient {
    background-image: -ms-linear-gradient(bottom, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
    background-image: linear-gradient(to bottom, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}


.ts-bgcolor-gradient{
    background-image: -ms-linear-gradient(bottom, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
    background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}

/******** Dark BG ********/
#bbpress-forums .bbp-search-form input[type="submit"],
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.ts-search-overlay .ts-site-searchform button,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-tab>a,
.ts-search-form-wrapper input[type="submit"],
.ts-search-form-tabs-w .ts-search-form-tab.ts-search-form-tab-current a span,
body .appointment input[type="submit"]:hover,
.ts-bg.ts-bgcolor-darkgrey > .ts-bg-layer,
.ts-col-bgcolor-darkgrey,
.ts-col-bgcolor-darkgrey .ts-bg-layer-inner,
.site-header-menu.ts-sticky-bgcolor-darkgrey.is_stuck,
.ts-bgcolor-darkgrey,
button, 
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,
.ts-vc_btn3.ts-vc_btn3-color-black, .ts-vc_btn3.ts-vc_btn3-color-black.ts-vc_btn3-style-flat,
.ts-vc_general.ts-vc_btn3.ts-vc_btn3-color-skincolor:not(.ts-vc_btn3-style-text):not(.ts-vc_btn3-style-outline):hover,
.ts-sresults-title small .label-default[href]:hover,
.themestek-box-blog-style2 .themestek-blog-classic-footer-readmore a:hover,
.ts-vc_btn3.ts-vc_btn3-color-white.ts-vc_btn3-style-flat:hover,
.ts-vc_btn3.ts-vc_btn3-color-default.ts-vc_btn3-style-flat:hover,
.widget .download .item-download,
.ts-col-bgcolor-darkgrey.ts-col-bgimage-yes .ts-bg-layer-inner,
.ts-bgcolor-darkgrey.ts-bg.ts-bgimage-yes > .ts-bg-layer-inner{
    background-color: var(--tste-labtechco-skincolor-dark);
}

.ts-vc_btn3.ts-vc_btn3-size-lg.ts-vc_btn3-style-custom:hover,
.vc_tta-color-black.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading:hover,
.vc_tta-color-black.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading{
    background-color: var(--tste-labtechco-skincolor-dark) !important;
}
.widget-area.sidebar .widget.widget_block a,
.wpb-js-composer .vc_tta-style-modern.vc_tta-shape-square.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-title>a,
span.bbp-admin-links a,
#bbpress-forums .bbp-topic-title a.bbp-topic-permalink,
#bbpress-forums a.bbp-forum-title,
.woocommerce .woocommerce-order-details table.shop_table thead th,
.edit-link a,
.ts-play-text-box p a,
.ts-icon-play-after-bg .vc_single_image-wrapper:after,
span.ts-vc_label_units.vc_label_units,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a,
.wpb-js-composer .vc_tta.vc_tta-style-classic.vc_general.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel-title, 
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a,
.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-title > a,
.themestek-box-testimonial .themestek-testimonial-text,
.ts-ihbox .ts-vc_general.ts-vc_cta3 h4.ts-custom-heading,
.ts-search-form-tabs-w .ts-search-form-tab.ts-search-form-tab-current a,
.ts-search-form-tabs-w .ts-search-form-tab a,
.ts-search-results-pages-w .ts-list-li-content a,
.ts-bold-list.ts-list.ts-list-style-icon .ts-list-li-content,
.widget.labtechco_category_list_widget li a,
.ts-team-social-links li a,
.ts-team-details-line .ts-team-list-title,
.ts-team-details-line .ts-team-list-value a,
.themestek-box-team-style-3 .themestek-box-content-inner .themestek-teambox-email a,
.themestek-box-team .themestek-box-title h4 a,
.nav-links a,
.ts-pf-view-style-2 .ts-pf-top-content .ts-pf-details-heading,
.author-info .ts-author-social-links-wrapper ul li a,
.themestek-box-team .themestek-box-title h4 a,
.themestek-box-blog .themestek-box-title h4 a,
.themestek-box h3 a{
    color: var(--tste-labtechco-skincolor-dark);
}


.ts-ihbox .ts-vc_general.ts-vc_btn3{
	color: var(--tste-labtechco-skincolor-dark) !important;
}

 /************************ Mega Main Menu **************************/  
ul.nav-menu li ul li a, 
div.nav-menu > ul li ul li a, 
.ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a{
	opacity: 0.95;
}
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a, 
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-parent > a, 
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a, 
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,
#site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a{
	opacity: 1;
}


<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
	/* Dropdown Menu Active Link Color -------------------------------- */   
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a, 
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a, 
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-parent > a,       
	        
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    

	.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a {
	    color: var(--tste-labtechco-dropmenu-active-link-custom-color);
	}
<?php } ?>



.ts-search-overlay input[type="search"]{
	border-bottom-color: var(--tste-labtechco-skincolor);
}

/* Blog box style */  
.widget_recent_entries a,
.footer .social-icons li > a,
.themestek-box-blog-classic .more-link-wrapper a:hover{
	color: var(--tste-labtechco-skincolor);
}

.themestek-boxes-testimonial.themestek-boxes-view-carousel.themestek-boxes-col-one.ts-boxes-carousel-arrows-below.ts-right-arrow .themestek-boxes-row-wrapper .slick-next,
.themestek-boxes-testimonial.themestek-boxes-view-carousel.themestek-boxes-col-one.ts-boxes-carousel-arrows-below.ts-right-arrow .themestek-boxes-row-wrapper .slick-prev,
.ts-team-member-single-content-wrapper .ts-team-social-links li a{
	background-color: var(--tste-labtechco-skincolor);
}
.ts-search-overlay{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90);
}





<?php if( !empty($skincolor_dark) ){ ?>
.ts-search-overlay .ts-site-searchform button,
.ts-search-form-wrapper input[type="submit"],
.ts-search-form-tabs-w .ts-search-form-tab.ts-search-form-tab-current a span{
	background-color: var(--tste-labtechco-skincolor-dark);
}
<?php } ?>

<?php if( !empty($skincolor_light) ){ ?>
.ts-col-bgcolor-grey > .ts-bg-layer-inner, .ts-bg.ts-bgcolor-grey > .ts-bg-layer, .ts-col-bgcolor-grey .ts-bg-layer-inner, .ts-bgcolor-grey, .site-header.ts-sticky-bgcolor-grey.is_stuck, .site-header-menu.ts-sticky-bgcolor-grey.is_stuck,
.tagcloud a,
.comment-body,
.vc_tta.vc_general.vc_tta-accordion.vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a,
/*.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab.vc_active > a,
.wpb-js-composer .vc_tta.vc_tta-style-classic.vc_general.vc_tta-color-skincolor .vc_tta-tab.vc_active>a,*/
.wpb-js-composer .vc_tta-style-classic.vc_tta-color-skincolor .vc_tta-tab > a ,
.single-ts-service .site-content #sidebar-left.sidebar {
	background-color: var(--tste-labtechco-skincolor-light);
}
.comment-body {
    border: 1px solid var(--tste-labtechco-skincolor-light);
}
.comment-body:after, .comment-body:before {
    border-color: transparent var(--tste-labtechco-skincolor-light) transparent transparent;
}
<?php } ?>


/************************ End Mega Main Menu **************************/  

/************************ Woocommece and bbPress **************************/ 
#bbpress-forums li.bbp-header,
#bbpress-forums .bbp-search-form input[type="submit"]:hover,
.ts-header-icons .ts-header-wc-cart-link span.number-cart,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt:disabled,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce .woocommerce-message  .button,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.woocommerce div.product .woocommerce-tabs ul.tabs li a,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt{
	background: var(--tste-labtechco-skincolor);
}
.woocommerce-info,
.woocommerce-message{
	border-top-color: var(--tste-labtechco-skincolor); 
}
.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce ul.order_details li strong,
.woocommerce ul.products li.product a:hover,
.woocommerce ul.product_list_widget li a:hover h2,
.woocommerce .star-rating span,
.woocommerce-info::before,
.woocommerce-message::before{
	color: var(--tste-labtechco-skincolor);
}
.woocommerce-pagination ul li a:hover,
.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current{
   background: var(--tste-labtechco-skincolor);
   border-color: var(--tste-labtechco-skincolor); 
}


/*=== elementor CSS ===*/

<?php include('elementor-style.php');  ?>


/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require( get_template_directory() .'/css/theme-menu-style.php' ); // Functions

/**
 * This is for Max Mega Menu style override - This is optional css and can be disabled via Theme Options directly
 */
$megamenu_override				= themestek_get_option( 'megamenu-override' );
// Override Max Mega Menu style
if( $megamenu_override == true ){
	require( get_template_directory() .'/css/max-mega-menu-style.php' ); // Functions
}

?>

/* ********************** Responsive Menu Code END **************************** */

/* --------------------------------------
* ts-responsive-icons
* ---------------------------------------*/
.ts-responsive-icons{
	position: absolute;
	top: 30px;
	left: 20px;
	display: none;
}
.admin-bar .ts-responsive-icons{
	top: 60px;
}
.ts-responsive-icons > div{
	margin: 0 10px;
}
.ts-responsive-icons > div:first-child{
	margin-left: 0;
}

.ts-responsive-icons .ts-header-wc-cart-link .number-cart {
	position: absolute;
    top: -13px;
    left: 11px;
    background-color: var(--tste-labtechco-skincolor);
    color: #fff;
    line-height: 15px;
    width: 15px;
    text-align: center;
    border-radius: 50%;
    font-size: 11px;
}


/******************************************************/
/******************* Custom Code **********************/

<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = themestek_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	$custom_css_code = str_replace( '&gt;', '>', $custom_css_code);
	echo trim($custom_css_code);
}
?>

/******************************************************/
