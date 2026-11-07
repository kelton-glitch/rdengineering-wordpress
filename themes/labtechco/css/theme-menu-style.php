<?php $themestek_header_menuarea_height = themestek_header_menuarea_height(); ?>
.headerlogo,
.ts-header-icon{
	height: var(--tste-labtechco-header-height);
	line-height: var(--tste-labtechco-header-height);
}
/* Header sticky animation */
@keyframes menu_sticky {
	0% {
		margin-top:-120px;
		opacity: 0;
	}
	50% {
		margin-top: -64px;
		opacity: 0;
	}
	100% {
		margin-top: 0;
		opacity: 1;
	}
}

/**
* Responsive Menu
* ----------------------------------------------------------------------------
*/
@media (max-width: <?php echo esc_attr($breakpoint); ?>px){
	body.ts-slider-yes{
		background-image: none;
	}
	.ts-slider-yes .headerlogo .standardlogo{
		display: inline-block;
	}
	.ts-slider-yes .headerlogo .crosslogo{
		display: none;
	}
	.ts-header-text-area,
	.ts-header-icon.ts-header-wc-cart-link{
		display: none;
	}
	.ts-header-wc-cart-link{
		position: relative;
	}
	
	/*** Header Section ***/
	.site-header-main.ts-table{
		margin: 0;
		width: auto;
		display: block;
	}
	.site-header-main.ts-table .ts-table-cell {
		display: block;
	}
	.ts-header-icon{
		padding-right: 0px;
		padding-left: 20px;
		position: relative;
	}
	.site-title{
		width: inherit;
	}

	/*** Navigation ***/
	.main-navigation {
		clear: both;
	}
	.site-branding,
	.menu-themestek-main-menu-container,
	#site-header-menu {
		float: none;
	}
	
	/*** Responsive Menu ***/
	.righticon{
		position: absolute;
		right: 20px;
		z-index: 33;
		top: 15px;
		display: block;
	}
	.righticon i{
		font-size:20px;
		cursor:pointer;
		display:block;
		line-height: 0px;
	}
	.closepanel{
		display: none;
	}
	.closepanel {
		position: absolute;
		z-index: 99;
		right: 27px;
		top: 25px;
		display: block;
		width: 30px;
		height: 30px;
		line-height: 30px;
		border-radius: 50%;
		text-align: center;
		cursor: pointer;
		font-size: 18px;
		color: #000;
		border: 1px solid #000;
	}
	.admin-bar .closepanel {
		top: 60px;
	}

	/*** Default menu box ***/
	<?php if($headerbg_color=='custom' && !empty($headerbg_customcolor['rgba']) ) : ?>
		#site-header-menu #site-navigation div.nav-menu > ul{
			background-color: <?php  echo esc_attr($headerbg_customcolor['rgba']); ?>;
		}
	<?php endif; ?>
	
	<?php if( !empty($dropmenu_background['color']) ): ?>
		#site-header-menu #site-navigation div.nav-menu > ul{
			background-color: <?php echo esc_attr($dropmenu_background['color']); ?>;
		}
	<?php endif; ?>

	#site-header-menu #site-navigation div.nav-menu > ul ul{
		background-color: transparent !important;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li a{
		display: block;
		padding: 15px 25px;
		text-decoration: none;
		line-height: 18px;
		height: auto;
		line-height: 18px !important;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul a{
		margin: 0;
		display: block;
		/* padding: 15px 15px 15px 0px; */
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li li a::before{
		font-family: "FontAwesome";
		font-style: normal;
		font-weight: normal;
		speak: none;
		display: inline-block;
		text-decoration: inherit;
		margin-right: .2em;
		text-align: center;
		opacity: .8;
		font-variant: normal;
		text-transform: none;
		font-size: 13px;
		content: "\f105";
		margin-right: 8px;
		display: none;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li a{
		display: inline-block;
	}
	
	<?php if( !empty($dropdownmenufont['color']) ): ?>
		#site-header-menu #site-navigation div.nav-menu > ul > li > a,
		.righticon i {
			color: rgb( var(--tste-labtechco-dropdownmenufont-color-rgb) , 1);
		}
		#site-header-menu #site-navigation div.nav-menu > ul li li:last-child{
			border-bottom: none;
		}
	<?php endif; ?>

	/* Dynamic main menu color applying to responsive menu link text */
	.menu-toggle i,
	.ts-header-icons a{
		color: rgb( var(--tste-labtechco-mainmenufont-color-rgb) , 1) ;
	}
	.ts-labtechco-icon-bars,
	.ts-labtechco-icon-bars::before,
	.ts-labtechco-icon-bars::after{
		background: rgb( var(--tste-labtechco-mainmenufont-color-rgb) , 1);
	}
	.ts-header-style-2 .main-navigation:not(.toggled-on) .ts-labtechco-icon-bars,
	.ts-header-style-2 .main-navigation .ts-labtechco-icon-bars::before,
	.ts-header-style-2 .main-navigation .ts-labtechco-icon-bars::after{
		background: #031b4e;
	}

	/* sticky footer bottom margin */
	body .site-content-wrapper {
		margin-bottom: 0px !important;
	}

	/*** Classic header cross ***/
	.ts-headerstyle-1.ts-slider-yes #ts-home{
		display: none;
	}

	/*** Max mega menu css ***/
	#site-navigation .mega-menu-wrap .mega-menu-toggle{
		display: block;
		position: absolute;
		width: 30px;
		background: none;
		z-index: 1;
		top: 50%;
		right: 0;
	}
	#site-navigation .mega-menu-wrap{
		position: inherit;
	}
	#site-navigation .mega-menu-wrap .mega-menu-toggle.mega-menu-open + #mega-menu-themestek-main-menu {
		z-index: 9;
	}
	#site-navigation .mega-menu-wrap .righticon{
		display: none;
	}
	.ts-max-mega-menu-override .site-header-main.ts-table{
		height: var(--tste-labtechco-header-height);
	}
	.themestek-sticky-header {
		display: none!important;
	}

	/* Responsive menu */
	/*=== Responsive menu ===*/
	.ts-mobile-menu-bg{
		position: fixed;
		right: 0;
		top: 0;
		width: 0%;
		height: 100%;
		z-index: 99;
		background: rgba(0,0,0,0.90);
		-webkit-transform: translateX(101%);
		-moz-transform: translateX(101%);
		-o-transform: translateX(101%);
		-ms-transform: translateX(101%);
		transform: translateX(101%);
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transition-delay: 300ms;
		-moz-transition-delay: 300ms;
		-ms-transition-delay: 300ms;
		-o-transition-delay: 300ms;
		transition-delay: 300ms;
	}
	.active .ts-mobile-menu-bg{
		opacity: 1;
		width: 100%;
		visibility: visible;
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transform: translateX(0%);
		-moz-transform: translateX(0%);
		-o-transform: translateX(0%);
		-ms-transform: translateX(0%);
		transform: translateX(0%);
	}
	.ts-mobile-menu-bg{
		display: block;
	}
	.ts-responsive-icons{
		display: flex;
		align-items: center;
	}
	.ts-responsive-icons .ts-cart-wrapper,
	.ts-responsive-icons .ts-header-search-btn{
		font-size: 17px;
	}
	.ts-responsive-icons .ts-cart-wrapper i::before{
		font-weight: 700;
	}
	.ts-mobile-menu-bg{
		position: fixed;
		right: 0;
		top: 0;
		width: 0%;
		height: 100%;
		z-index: 99;
		background: rgba(0,0,0,0.90);
		-webkit-transform: translateX(101%);
		-ms-transform: translateX(101%);
		transform: translateX(101%);
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transition-delay: 300ms;
		-moz-transition-delay: 300ms;
		-ms-transition-delay: 300ms;
		-o-transition-delay: 300ms;
		transition-delay: 300ms;
	}
	.active .ts-mobile-menu-bg{
		opacity: 1;
		width: 100%;
		visibility: visible;
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transform: translateX(0%);
		-ms-transform: translateX(0%);
		transform: translateX(0%);
	}
	.ts-navbar > div.nav-menu {
		background-color: #eef1f5;
		position: fixed;
		top: 0;
		right: -400px;
		z-index: 1000;
		width: 300px;
		height: 100%;
		padding: 0;
		display: block;
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transform: translateX(400px);
		-moz-transform: translateX(400px);
		-o-transform: translateX(400px);
		-ms-transform: translateX(400px);
		transform: translateX(400px);
		opacity: 0;
	}
	.ts-navbar > div.nav-menu.active {
		right: 0px;
		-webkit-transform: translateX(0);
		-moz-transform: translateX(0);
		-o-transform: translateX(0);
		-ms-transform: translateX(0);
		transform: translateX(0);
		visibility: visible;
		opacity: 1;
		overflow-y: scroll;
		-webkit-transition-delay: 600ms;
		-moz-transition-delay: 600ms;
		-ms-transition-delay: 600ms;
		-o-transition-delay: 600ms;
		transition-delay: 600ms;
		opacity: 1;
	}
	.ts-navbar > div.nav-menu > ul{
		padding: 90px 0;
	}
	.admin-bar .ts-navbar > div.nav-menu > ul{
		padding-top: 100px;
	}
	.ts-navbar > div.nav-menu > ul li a {
		color: #000 !important;
		padding: 15px 25px;
		height: auto;
		display: inline-block;
	}
	.ts-navbar>div.nav-menu>ul ul {
		padding-left: 1em;
		overflow: hidden;
		display: none;
		list-style: none;
	}
	.ts-navbar ul .sub-menu.open,
	.ts-navbar ul .children.open {
		display: block;
	}
	.ts-navbar li {
		position: relative;
	}
	.ts-navbar ul.menu>li {
		border-bottom: 1px solid rgba(0, 0, 0, 0.10);
	}
	.sub-menu-toggle {
		display: block;
		position: absolute;
		right: 25px;
		top: 15px;
		cursor: pointer;
		color: rgba(0, 0, 0, 0.80);
	}
	.ts-navbar ul ul {
		background-color: transparent !important;
	}
	.ts-header-search-form-wrapper .search-form {
		margin: 0 70px;
	}
	.ts-mobile-search {
		display: block;
	}
	.ts-mobile-search .ts-header-search-btn {
		display: block;
		position: absolute;
		right: 60px;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}
	.site-header .ts-sticky-header {
		display: none !important;
	}
	/*=== Responsive Logo ===*/
	.ts-responsive-logo-yes .ts-sticky-logo,
	.ts-responsive-logo-yes .ts-main-logo {
		display: none;
	}
	.ts-responsive-logo-yes .ts-responsive-logo {
		display: inline-block;
	}
	/*=== Responsive header background color ===*/
	.ts-responsive-header-bgcolor-globalcolor .ts-header-wrapper {
		background-color: var(--tste-labtechco-skincolor)!important;
	}
	.ts-responsive-header-bgcolor-white .ts-header-wrapper {
		background-color: #fff !important;
	}
	.ts-responsive-header-bgcolor-blackish .ts-header-wrapper {
		background-color: #222 !important;
	}
	.menu-toggle{
		position: absolute;
		top: 50%;
		right: 0px;
		font-size: 30px;
		margin-top: -15px;
	}
}

@media (min-width: <?php echo esc_attr($breakpoint+1); ?>px) {
	@-webkit-keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0)
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none
		}
	}
	@keyframes fadeInDown {
		0% {
			opacity: 0;
			-webkit-transform: translate3d(0, -100%, 0);
			transform: translate3d(0, -100%, 0)
		}
		100% {
			opacity: 1;
			-webkit-transform: none;
			transform: none
		}
	}
	.fadeInDown {
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown
	}

	/*=== Sticky common css ===*/
	header .themestek-sticky-header {
		position: fixed;
		opacity: 0;
		visibility: hidden;
		background: #fff;
		left: 0px;
		top: 0px;
		box-shadow: 0 10px 20px rgb(0 0 0 / 20%);
		width: 100%;
		z-index: 0;
		transition: all 200ms ease;
		-moz-transition: all 200ms ease;
		-webkit-transition: all 200ms ease;
		-ms-transition: all 200ms ease;
		-o-transition: all 200ms ease;
	}
	header.themestek-fixed-header .themestek-sticky-header {
		z-index: 999;
		opacity: 1;
		visibility: visible;
		-ms-animation-name: fadeInDown;
		-moz-animation-name: fadeInDown;
		-op-animation-name: fadeInDown;
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown;
		-ms-animation-duration: 300ms;
		-moz-animation-duration: 300ms;
		-op-animation-duration: 300ms;
		-webkit-animation-duration: 300ms;
		animation-duration: 300ms;
		-ms-animation-timing-function: linear;
		-moz-animation-timing-function: linear;
		-op-animation-timing-function: linear;
		-webkit-animation-timing-function: linear;
		animation-timing-function: linear;
		-ms-animation-iteration-count: 1;
		-moz-animation-iteration-count: 1;
		-op-animation-iteration-count: 1;
		-webkit-animation-iteration-count: 1;
		animation-iteration-count: 1;
	}
	.admin-bar header.themestek-fixed-header .themestek-sticky-header {
		top: 32px;
	}
	.themestek-sticky-header .headerlogo{
		height: var(--tste-labtechco-header-height-sticky);
		line-height: var(--tste-labtechco-header-height-sticky);
	}
	header:not(.ts-header-style-3):not(.ts-header-style-7):not(.ts-header-style-10):not(.ts-header-style-11):not(.ts-header-style-12):not(.ts-header-style-13):not(.ts-header-style-14) .themestek-sticky-header .site-header-main{
		display: flex;
		align-items: center;
		-ms-flex-pack: justify!important;
		justify-content: space-between!important;
	}
	.themestek-sticky-header .site-header-menu.container,
	.themestek-sticky-header .site-header-menu.container .site-header-menu-inner .container,
	.themestek-sticky-header .ts-header-top-wrapper.container{
		max-width: none;
		padding-right: 0px;
		padding-left: 0px;
		margin-right: unset;
		margin-left: unset;
		width: auto;
	}
	.ts-header-style-3 .themestek-sticky-header .themestek-social-links-wrapper,
	header .themestek-sticky-header #site-header-menu #site-navigation,
	.themestek-sticky-header .ts-header-icons,
	.themestek-sticky-header .headerlogo,
	.themestek-sticky-header .ts-header-icon,
	.themestek-sticky-header #site-header-menu #site-navigation div.nav-menu > ul,
	.themestek-sticky-header #site-header-menu #site-navigation div.nav-menu > ul > li,
	.themestek-sticky-header #site-header-menu #site-navigation div.nav-menu > ul > li > a{
		height: var(--tste-labtechco-header-height-sticky);
		line-height: var(--tste-labtechco-header-height-sticky);
	}
	.themestek-sticky-header #site-header-menu{
		margin-left: auto;
	}
	header .ts-header-block div.themestek-sticky-header .ts-header-icons > *:nth-child(2)::after{
		background-color: rgb( var(--tste-labtechco-stickymainmenufontcolor-rgb) , 0.15);
	}
	header .ts-vc_btn3-container{
		margin-bottom: 0px;
	}
	header #site-header-menu #site-navigation{
		height: var(--tste-labtechco-header-height);
		line-height: var(--tste-labtechco-header-height);
	}
	.site-header .ts-vc_btn3-container{
		margin-bottom: 0;
	}
	.ts-headerstyle-classic-overlay .ts-header-icons{
		margin-right: 0;
	}

	/*== Header full ===*/
	.site-header-main.container-full {
		padding: 0 50px;
	}
	.ts-stickable-header.is_stuck{
		box-shadow: 0 4px 10px 0 rgba(0, 0, 0, 0.06);
	}
	.ts-header-text-area,
	.ts-header-icon,
	.social-icons,
	.headerlogo,
	#site-header-menu #site-navigation div.nav-menu > ul,
	#site-header-menu #site-navigation div.nav-menu > ul > li,
	#site-header-menu #site-navigation div.nav-menu > ul > li > a {
		transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-webkit-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
	}
	.ts-header-text-area,
	#site-header-menu #site-navigation .nav-menu,
	#site-header-menu,
	.ts-header-icons,
	.ts-header-icon,
	.menu-themestek-main-menu-container{
		float: right;
	}
	.navbar{
		vertical-align: top;
	}
	.menu-toggle {
		display: none;
		z-index: 10;
	}
	.menu-toggle i{
		color:#fff;
		font-size:28px;
	}
	.toggled-on li,
	.toggled-on .children {
		display: block;
	}
	#site-header-menu #site-navigation .nav-menu-wrapper > ul {
		margin: 0;
		padding: 0;
	}
	#site-header-menu #site-navigation div.nav-menu > ul{
		margin: 0px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul > li{
		height:var(--tste-labtechco-header-height);
		line-height:var(--tste-labtechco-header-height) ;
	}  
	#site-header-menu #site-navigation div.nav-menu > ul > li {
		margin: 0 0px 0 0;
		display: inline-block;
		position: relative;
		vertical-align: top;
	}
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	#site-header-menu #site-navigation div.nav-menu > ul > li > a{
		display: block;
		margin: 0px 18px 0px 18px;
		padding:  0px;
		text-decoration: none;
		position: relative;
		z-index: 1;
		height:var(--tste-labtechco-header-height);
		line-height:var(--tste-labtechco-header-height) ;
	}
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		margin: 0;
	}
	#site-header-menu #site-navigation div.nav-menu > ul{
		height:var(--tste-labtechco-header-height);
	}
	#site-header-menu #site-navigation div.nav-menu>ul {
		margin: 0px;
		padding: 0px;
	}
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul{
		height: var(--tste-labtechco-header-height-sticky);
	}

	/*WordPress Dropdown Menu*/
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a{
		color: var(--tste-labtechco-skincolor) ;
	}

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		/* Main Menu Active Link Color --------------------------------*/
		.ts-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,
		.ts-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,
		.ts-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,
		.ts-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,
		.ts-mmenu-active-color-custom  .ts-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a{
			color: var(--tste-labtechco-mainmenu-active-link-custom-color);
		}
	<?php } ?>

	/*** Defaultsenu ***/
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a,
	.ts-dmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a{
		color: var(--tste-labtechco-skincolor);
	}
	.ts-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,
	.ts-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,
	.ts-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,
	.ts-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a{
		color: var(--tste-labtechco-skincolor);
	}

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		.ts-mmenu-active-color-custom .site-header .social-icons li > a:hover,
		.ts-mmenu-active-color-custom .ts-header-icons .ts-header-search-link a:hover,
		.ts-mmenu-active-color-custom .ts-header-icons .ts-header-wc-cart-link a:hover,
		.ts-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a{
			color: var(--tste-labtechco-mainmenu-active-link-custom-color);
		}
		.ts-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li > a::before{
			background-color: var(--tste-labtechco-mainmenu-active-link-custom-color);
		}
	<?php } ?>

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
		/* Dropdown Menu Active Link Color -------------------------------- */
		.ts-dmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li li:hover > a{
			color: var(--tste-labtechco-skincolor);
		}
	<?php } ?>
	
	#site-header-menu #site-navigation div.nav-menu > ul > li > a{
		margin: 0px 15px 0px 15px;
	}
	.themestek-main-menu-more-than-six #site-header-menu #site-navigation div.nav-menu > ul > li > a{
		margin: 0px 12px 0px 12px;
	}
	.themestek-sticky-header #site-header-menu #site-navigation div.nav-menu > ul > li > a,
	.themestek-sticky-header .ts-header-icons .ts-header-wc-cart-link a,
	.themestek-sticky-header .social-icons li > a,
	.themestek-sticky-header .ts-header-icons .ts-header-search-link a,
	.is_stuck .ts-header-icons .ts-header-search-link a,
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a,
	.site-header.is_stuck  .social-icons li > a,
	.site-header.is_stuck .ts-header-icons .ts-header-wc-cart-link a,
	#site-header-menu.is_stuck #site-navigation div.nav-menu > ul > li > a{
		color: var(--tste-labtechco-stickymainmenufontcolor);
	}
	.ts-header-icons .ts-header-wc-cart-link a,
	.site-header .social-icons li > a,
	.ts-header-icons .ts-header-search-link a{
		color: rgb( var(--tste-labtechco-mainmenufont-color-rgb) , 1);
		transition: all .3s ease-in-out;
		-moz-transition: all .3s ease-in-out;
		-webkit-transition: all .3s ease-in-out;
		-o-transition: all .3s ease-in-out;
	}
	.site-header .social-icons li > a:hover,
	.ts-header-icons .ts-header-wc-cart-link a:hover,
	.ts-header-icons .ts-header-search-link a:hover{
		color: var(--tste-labtechco-skincolor);
	}

	/*** ts-header-icons ***/ 
	.ts-header-icon{
		position: relative;
	}
	.ts-header-icons > *{
		padding: 0 20px;
	}
	.ts-header-icons > *:nth-child(2)::after{
		content: '';
		width: 1px;
		height: 30px;
		background-color: rgb( var(--tste-labtechco-mainmenufont-color-rgb) , 0.25);
		position: absolute;
		right: 0px;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}

	/*** Sub Navigation Section ***/
	#site-header-menu #site-navigation div.nav-menu > ul > li ul{
		box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.20);
	}
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu{
		left: auto;
		right: 0px !important;
	}
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.last ul.sub-menu ul.sub-menu,
	header#masthead #site-header-menu #site-navigation div.nav-menu > ul li.lastsecond ul.sub-menu ul.sub-menu{
		left: -100%;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul {
		width: 250px;
		padding: 0px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul li > a {
		margin: 0;
		display: block;
		padding: 12px 0px;
		position: relative;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul li > a{
		padding: 15px 20px;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul li:hover > a{
		background: #fff;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul li > a{
		-webkit-transition: all .2s ease-in-out;
		transition: all .2s ease-in-out;
	}
	#site-header-menu #site-navigation div.nav-menu > ul li:hover > ul {
		opacity: 1;
		display: block;
		visibility: visible;
		height: auto;
	}
	#site-header-menu #site-navigation div.nav-menu > ul li > ul ul {
		border-left: 0;
		left: 100%;
		top: 0;
	}
	#site-header-menu #site-navigation ul ul li {
		position: relative;
	}
	#site-header-menu #site-navigation div.nav-menu > ul ul {
		text-align: left;
		position: absolute;
		visibility: hidden;
		display: block;
		opacity: 0;
		line-height: 14px;
		margin: 0;
		list-style: none;
		left: 0;
		border-radius: 0;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		background-clip: padding-box;
		transition: all .2s ease;
		z-index: 99;
	}

	/*** Sep Section ***/
	#site-header-menu #site-navigation div.nav-menu ul ul > li {
		border-bottom: 1px solid transparent;
	}
	.ts-dmenu-sep-grey #site-header-menu #site-navigation div.nav-menu ul ul > li{
		border-bottom-color: rgba(0, 0, 0, 0.10);
	}
	.ts-dmenu-sep-white #site-header-menu #site-navigation div.nav-menu ul ul > li {
		border-bottom-color: rgba(255, 255, 255, 0.20);
	}

	/*** Sticky Header Height ***/
	header .is_stuck #site-header-menu #site-navigation,
	.is_stuck .headerlogo,
	.is_stuck .ts-header-icon,
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li,
	.is_stuck #site-header-menu #site-navigation div.nav-menu > ul > li > a{
		height: var(--tste-labtechco-header-height-sticky) ;
		line-height: var(--tste-labtechco-header-height-sticky);
	}

	/*** Sub Navigation menu ***/
	#site-header-menu #site-navigation div.nav-menu > ul > li > ul {
		top: auto; 
		border-top: 3px solid var(--tste-labtechco-skincolor);
	}

	/*** Sticky Sub Navigation menu ***/
	.is_stuck  #site-header-menu #site-navigation div.nav-menu > ul > li > ul{
		top: var(--tste-labtechco-header-height-sticky);
	}
	.site-header-main.container-fullwide{
		padding-left: 30px;
		padding-right: 0px;
	}

	/*** Header Icon border ***/
	.ts-header-icons{
		height: var(--tste-labtechco-header-height);
	}
	.is_stuck .ts-header-icons{
		border-left-color: rgb( var(--tste-labtechco-stickymainmenufontcolor-rgb) , 0.15) ;
		height: var(--tste-labtechco-header-height-sticky);
	}
	header .is_stuck .site-header::after{
		border-bottom-color: rgb( var(--tste-labtechco-stickymainmenufontcolor-rgb) , 0.15) ;
	}

	/*** ThemeStek Center Menu ***/
	.ts-header-menu-position-center #site-header-menu{
		float: none;
	}
	.ts-header-menu-position-center #site-header-menu #site-navigation{
		text-align: center;
		width: 100%;
	}
	.ts-header-menu-position-center #site-header-menu  #site-navigation .nav-menu{
		float: none;
		right: 0;
		left: 0;
		text-align: center;
	}
	.ts-header-menu-position-center .site-header-menu.ts-table-cell{
		display: block;
	}
	.ts-header-menu-position-center .headerlogo,
	.ts-header-menu-position-center .ts-header-icon{
		position: relative;
		z-index: 2;
	}

	/*** ThemeStek Left Menu ***/
	.ts-header-menu-position-left #site-header-menu{
		float: none;
		display: block;
	}
	.ts-header-menu-position-left #site-header-menu #site-navigation .nav-menu{
		float: none;
	}
	.ts-header-menu-position-left .site-branding{
		padding-right: 25px;
	}

	/* Header Social link */
	.site-header .themestek-social-links-wrapper{
		float: right;
	}
	.site-header .social-icons {
		padding-top: 0;
		padding-bottom: 0;
	}
	.site-header.is_stuck {
		position: fixed;
		width:100%;
		top:0;
		z-index: 999;
		margin:0;
		animation-name: menu_sticky;
		-webkit-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
		-moz-box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
		box-shadow: 0px 13px 25px -12px rgba(0,0,0,0.25);
		padding: 0;
	}
	#site-header-menu #site-navigation div.nav-menu ul ul > li:last-child{
		border-bottom: none !important;
	}

	/***  Ts Header Style Infostack ***/
	.ts-header-style-infostack #site-header-menu #site-navigation div.nav-menu > ul > li > a::before{
		bottom: <?php echo (themestek_header_menuarea_height() / 2 - 12); ?>px;
	}  
	.ts-infostack-right-content .info-widget *{
		margin-bottom: 0;
	}
	.ts-infostack-right-content .info-widget h3{
		font-size: 15px;
		line-height: 25px;
		font-weight: normal;
		color: #999;
	}
	.ts-infostack-right-content .info-widget i{
		font-size: 25px;
		color: var(--tste-labtechco-skincolor);
	}
	.ts-infostack-right-content .info-widget .media-right,
	.ts-infostack-right-content .info-widget .media-left{
		padding: 0;
	}
	.ts-infostack-right-content .info-widget .media-left .icon{
		margin-right: 15px;
		background-color: #f6faff;
		width: 55px;
		height: 55px;
		line-height: 55px;
		text-align: center;
		border-radius: 50%;
	}
	.ts-infostack-right-content .info-widget h6{
		font-size: 19px;
		font-weight: 500;
		line-height: 29px;
		color: #09162a;
		letter-spacing: 1px;
	}
	.ts-header-text-area,
	.ts-header-icon,
	#site-header-menu #site-navigation div.nav-menu > ul,
	#site-header-menu #site-navigation div.nav-menu > ul > li{
		transition: none;
		-moz-transition: none;
		-webkit-transition: none;
		-o-transition: none;
	}
}