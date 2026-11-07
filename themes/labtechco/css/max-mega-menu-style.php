
/*=== Max Mega Menu CSS ===*/
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap {
	clear: none;
	position: relative;
}
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu.mega-menu-item{
	position: static !important;
}
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-toggle-on>a,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu li.mega-menu-item>a,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-item>a.mega-menu-link,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-ancestor>a.mega-menu-link,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-page-ancestor>a.mega-menu-link,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item>a.mega-menu-link:hover,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap {
	background-color: transparent;
}
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout li.mega-menu-item a.mega-menu-link>span.mega-indicator:after {
	content: unset;
}
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator {
	margin: 0;
}
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator:after {
	content: '\f107';
	font-family: "ts-labtechco-icons";
	font-size:12px;
	margin: 0 0 0 10px;
}

@media (max-width: 1200px) {
	.ts-navbar > .mega-menu-wrap {
		background-color: #fff !important;
		position: fixed !important;
		top: 0 !important;
		right: -400px !important;
		z-index: 1000 !important;
		width: 300px !important;
		height: 100% !important;
		padding: 0 !important;
		display: block !important;
		transition: all 900ms ease !important;
		-moz-transition: all 900ms ease !important;
		-webkit-transition: all 900ms ease !important;
		-ms-transition: all 900ms ease !important;
		-o-transition: all 900ms ease !important;
		-webkit-transform: translateX(400px) !important;
		-ms-transform: translateX(400px) !important;
		transform: translateX(400px) !important;
		opacity: 0 !important;
	}
	.ts-navbar > .mega-menu-wrap.active {
		right: 0px !important;
		-webkit-transform: translateX(0) !important;
		-ms-transform: translateX(0) !important;
		transform: translateX(0) !important;
		visibility: visible !important;
		opacity: 1 !important;
		overflow-y: scroll !important;
		-webkit-transition-delay: 600ms !important;
		-moz-transition-delay: 600ms !important;
		-ms-transition-delay: 600ms !important;
		-o-transition-delay: 600ms !important;
		transition-delay: 600ms !important;
		opacity: 1 !important;
	}
	.ts-navbar > .mega-menu-wrap.active > ul{
		display: block !important;
	}
	.ts-max-mega-menu-override #page #site-navigation .mega-menu-wrap .mega-menu-toggle,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul .sub-menu-toggle {
		display: none;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li {
		border-bottom: 1px solid rgba(255, 255, 255, 0.10);
		display: block;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li a {
		color: var(--tste-labtechco-skincolor) !important;
		padding: 15px 0px !important;
		height: auto !important;
		display: block;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li a span.mega-indicator {
		float: right;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li>ul.mega-sub-menu {
		background-image: none !important;
		float: none !important;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-row .mega-menu-column>ul.mega-sub-menu>li.mega-menu-item,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-row .mega-menu-column,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-row {
		float: none !important;
	}
	.pbmit-navbar>.mega-menu-wrap.active>ul ul {
		display: block;
	}
	.ts-mmmenu-override-yes .pbmit-navbar>.mega-menu-wrap.active>ul ul,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-row .mega-menu-column>ul.mega-sub-menu>li.mega-menu-item {
		padding: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu>ul.mega-sub-menu li {
		border-bottom: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul li.mega-menu-megamenu .mega-block-title {
		padding: 10px 15px 10px 0px !important;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item h4.mega-block-title{
		margin-bottom: 0 !important;
	}
	.admin-bar.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap {
		padding-top: 0px !important;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap .pbmit-responsive-icons {
		top: 40px;
	}
	.admin-bar.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap .pbmit-responsive-icons {
		top: 75px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap .mega-menu-toggle {
		display: none;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item-has-children>a.mega-menu-link>span.mega-indicator:after {
		font-size: 16px;
	}


	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap {
		position: inherit;
	}
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-menu-toggle {
		top: 50%;
		margin-top: -13px;
		display: none;
		position: absolute;
		right: 0;
		width: 40px;
		background: none;
		z-index: 1;
		outline: none;
		padding: 0;
		line-height: normal;
	}
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-toggle-animated-inner, 
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-toggle-animated-inner::before, 
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap .mega-toggle-animated-inner::after{
		background-color: var(--tste-labtechco-skincolor);
	}

	.ts-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal{
		position: absolute;
		padding: 10px 20px;
		left: 0px;
		box-shadow: none;
		border-top: 0;
		background-color: transparent;
		z-index: 100;
		width: 100%;
		top: var(--tste-labtechco-header-height);
		overflow: hidden;
	}

	.ts-mmmenu-override-yes .themestek-header-style-classic-center.themestek-header-overlay .themestek-stickable-header-w{
		height: auto !important;
	}
	.ts-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, 
	#site-header-menu #site-navigation div.nav-menu > ul > li ul > .themestek-bg-layer{
		background-color: transparent !important;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul li a,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul li,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul {
		padding: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu li > a:before{
		display: none;
	}
}

@media (min-width: 1201px) {
	.rtl.ts-mmmenu-override-yes #masthead #mega-menu-pbminfotech-top li ul>li {
		text-align: right;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-item {
		margin: 0 12px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .mega-menu-row {
		padding: 15px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item>a.mega-menu-link {
		padding: 0px;
		-webkit-transition: all 300ms ease;
		transition: all 300ms ease;
	}
	.ts-mmmenu-override-yes #page .pbmit-sticky-header #site-navigation .max-mega-menu>li.mega-menu-item a {
		margin: 0 0px;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu li.mega-menu-item>a {
		padding: 15px 30px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu li.mega-menu-item>a {
		-webkit-transition: all .500s ease-in-out;
		transition: all .500s ease-in-out;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout ul.mega-sub-menu {
		border-top: 4px solid <?php echo esc_html($skincolor); ?>;
		-webkit-box-shadow: 0 0 60px 0 rgb(53 57 69 / 15%);
		-moz-box-shadow: 0 0 60px 0 rgba(53, 57, 69, 0.15);
		-ms-box-shadow: 0 0 60px 0 rgba(53, 57, 69, 0.15);
		-o-box-shadow: 0 0 60px 0 rgba(53, 57, 69, 0.15);
		box-shadow: 0 0 60px 0 rgb(53 57 69 / 15%);
		transition: all .5s ease;
		z-index: 99;
		-webkit-transition: all 300ms linear 0ms;
		-khtml-transition: all 300ms linear 0ms;
		-moz-transition: all 300ms linear 0ms;
		-ms-transition: all 300ms linear 0ms;
		-o-transition: all 300ms linear 0ms;
		transition: all 300ms linear 0ms;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout ul.mega-sub-menu {
		padding: 10px 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout ul.mega-sub-menu {
		width: 240px;
	}
	#mega-menu-wrap-pbminfotech-top #mega-menu-pbminfotech-top > li.mega-menu-flyout ul.mega-sub-menu li.mega-menu-item ul.mega-sub-menu{
		top: -14px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu {
		padding: 10px 0px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .mega-menu-row .mega-menu-column {
		padding-left: 0px !important;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .mega-menu-row .mega-sub-menu .mega-menu-column:first-child {
		padding-left: 0px !important;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu ul:not(.menu)>li>a {
		margin-right: 0px !important;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .mega-menu-row .mega-sub-menu .mega-menu-column {
		padding-right: 25px !important;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .mega-sub-menu>li>a,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu .widget_nav_menu ul.menu>li>a {
		padding-left: 0 !important;
		border-bottom: 0;
		-webkit-transition: all 500ms ease;
		transition: all 500ms ease;
		position: relative;
		display: inline-block;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu li.mega-menu-item>a {
		position: relative;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-flyout>ul.mega-sub-menu li.mega-menu-item a {
		line-height: 150%!important;
		margin: 0;
		display: inline-table;
		padding: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li .mega-sub-menu li:not(.mega-menu-column),
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li .mega-sub-menu,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li .mega-sub-menu a {
		height: auto !important;
		line-height: normal !important;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-grid .mega-sub-menu li:not(.mega-menu-row) {
		padding: 0px;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-grid .mega-sub-menu li:not(.mega-menu-row) ul.menu{
		margin-top: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-grid .mega-sub-menu li:not(.mega-menu-row) ul.menu > li{
		padding: 15px 0px 15px 0px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-grid .mega-sub-menu li:not(.mega-menu-row) ul.menu a{
		padding: 0;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .mega-menu-column ul {
		background-color: transparent !important;
		padding: 0px;
	}

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu.max-mega-menu,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap {
		position: relative;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-menu-megamenu>ul.mega-sub-menu {
		max-width: 600px;
		left: 0;
		right: 0;
		padding: 0px 0px 20px 0px;
	}

	.ts-mmmenu-override-yes .themestek-header-style-classic-center #site-header-menu #site-navigation div.mega-menu-wrap{
		float: none;
	}
	.ts-mmmenu-override-yes .themestek-header-style-classic-center.themestek-header-overlay #site-header-menu #site-navigation{
		display: inline-block;
	}
	.ts-mmmenu-override-yes.themestek-headerstyle-7 #page #site-navigation .mega-menu-wrap,
	.ts-mmmenu-override-yes.themestek-headerstyle-6 #page #site-navigation .mega-menu-wrap,
	.ts-mmmenu-override-yes.themestek-headerstyle-5 #page #site-navigation .mega-menu-wrap,
	.ts-mmmenu-override-yes.themestek-headerstyle-classic-overlay-fullwidth #page #site-navigation .mega-menu-wrap{
		float: left;
	}
	
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item > a.mega-menu-link:has(+ span.mega-indicator:hover), .ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item > a.mega-menu-link:has(+ span.mega-indicator:focus), .ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item > a.mega-menu-link:hover, 
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item > a.mega-menu-link:focus,

	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link:hover,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu > li.mega-menu-item > a.mega-menu-link:focus{
		background-color: transparent;
	}


	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li .mega-sub-menu li:not(.mega-menu-row) {
		padding: 10px 25px;
	}	
	
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul li a,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul li,
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul {
		padding: 0;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu .widget_nav_menu ul li{
		padding-bottom: 20px;
	}
	.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item h4.mega-block-title{
		margin-top: 10px;
	}


	/*WordPress  Menu*/
	.ts-mmmenu-override-yes  #page .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item > a{
		color: rgb( var(--tste-labtechco-stickymainmenufontcolor-rgb) , 1) ;
	}
	
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-skin #site-header-menu #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a,	
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-skin .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item.mega-current-menu-ancestor > a,
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-skin .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item:hover > a,

	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-skin #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-ancestor>a,
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-skin #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a	{
		color: var(--tste-labtechco-skincolor);
	}

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
		/* Main Menu Active Link Color --------------------------------*/
		
		.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom #site-header-menu #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a,	
		.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item.mega-current-menu-ancestor > a,
		.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item:hover > a,
	
		.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-ancestor>a,
		.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a{
			color: var(--tste-labtechco-mainmenu-active-link-custom-color);
		}

	<?php } ?>

	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a,
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item.mega-current-menu-ancestor > a,
	.ts-mmmenu-override-yes #page .ts-mmenu-active-color-custom .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap>ul > li.mega-menu-item:hover > a,

	.ts-mmmenu-override-yes #page #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li:hover > a,

	.ts-mmmenu-override-yes #page .ts-dmenu-active-color-skin #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a{
		color: <?php echo esc_html($skincolor); ?> ;
	}
	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
		/* Dropdown Menu Active Link Color -------------------------------- */		
		.ts-mmmenu-override-yes #page .ts-dmenu-active-color-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a{
			color: var(--tste-labtechco-dropmenu-active-link-custom-color);
		}
	<?php } ?>

	/* Header style 2 */
	.ts-mmmenu-override-yes.ts-headerstyle-2  #page .themestek-infostack-style #site-navigation .mega-menu-wrap{
		padding-left: 35px;
	}
	.ts-mmmenu-override-yes.ts-headerstyle-2 #page .themestek-fixed-header.themestek-infostack-style  #site-navigation .mega-menu-wrap{
		padding-left: 0px;
		padding-right: 0px;
	}
	.ts-mmmenu-override-yes.ts-headerstyle-2 #page .site-header #site-navigation .mega-menu-wrap > ul > li.mega-menu-item {
		margin: 0 20px;
	}

	.ts-mmmenu-override-yes #page .ts-header-style-2 .ts-mmenu-active-color-skin .site-header #site-header-menu #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a,
	.ts-mmmenu-override-yes #page .ts-header-style-2 .ts-mmenu-active-color-skin .site-header #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-ancestor>a,
	.ts-mmmenu-override-yes #page .ts-header-style-2 .ts-mmenu-active-color-skin .site-header #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-current-menu-parent>a{
		color: #fff ;
	}
	.ts-mmmenu-override-yes #page .ts-header-style-3 #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-menu-megamenu>ul.mega-sub-menu {
		max-width: none;
		left: 0;
		right: 0;
		margin: 0 auto;
	}
	.ts-mmmenu-override-yes #page .ts-header-style-3 #site-navigation .mega-menu.max-mega-menu {
		text-align: center;
		position: relative;
		max-width: 758px;
		margin: 0 auto;
	}
	.ts-mmmenu-override-yes #page .ts-header-style-3 #site-navigation .mega-menu-wrap > ul > li.mega-menu-item {
		margin: 0 20px;
	}

	.ts-mmmenu-override-yes .themestek-infostack-style #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	.ts-mmmenu-override-yes .themestek-infostack-style #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		height: var(--tste-labtechco-header-menuarea-height);
		line-height: var(--tste-labtechco-header-menuarea-height);
	}

	.ts-mmmenu-override-yes .themestek-sticky-header #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	.ts-mmmenu-override-yes .themestek-sticky-header #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,

	.ts-mmmenu-override-yes .themestek-infostack-style .themestek-sticky-header #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a,
	.ts-mmmenu-override-yes .themestek-infostack-style .themestek-sticky-header #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		height: var(--tste-labtechco-header-height-sticky);
		line-height: var(--tste-labtechco-header-height-sticky);
	}
	.ts-mmmenu-override-yes .themestek-infostack-style #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-item-has-children:hover>a.mega-menu-link {
		color: rgb( var(--tste-labtechco-mainmenufont-color-rgb) , 1) ;
	}
	.ts-mmmenu-override-yes #page .themestek-infostack-style #site-navigation .mega-menu-wrap>ul>li.mega-menu-item.mega-menu-megamenu>ul.mega-sub-menu {
		max-width: 650px;
		left: 0;
		right: auto;
		margin-left: auto;
		margin-right: auto;
	}
	.ts-mmmenu-override-yes .themestek-infostack-style .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,
	.ts-mmmenu-override-yes .themestek-infostack-style .themestek-sticky-header #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a{
		color: rgb( var(--tste-labtechco-stickymainmenufontcolor-rgb) , 1) ;
	}


	/* Header style 4 */
	.ts-mmmenu-override-yes.ts-headerstyle-10 #site-header-menu #site-navigation div.mega-menu-wrap,
	.ts-mmmenu-override-yes.ts-headerstyle-6 #site-header-menu #site-navigation div.mega-menu-wrap,
	.ts-mmmenu-override-yes.ts-headerstyle-5 #site-header-menu #site-navigation div.mega-menu-wrap,
	.ts-mmmenu-override-yes.ts-headerstyle-4 #site-header-menu #site-navigation div.mega-menu-wrap,
	.ts-mmmenu-override-yes.ts-headerstyle-1 #site-header-menu #site-navigation div.mega-menu-wrap {
		float: left;
	}
	.ts-mmmenu-override-yes.ts-headerstyle-7 #site-header-menu #site-navigation div.mega-menu-wrap{
		float: right;
	}
	
	/* Header style 9 */
	.ts-mmmenu-override-yes.ts-headerstyle-9 #page #site-navigation .mega-menu-wrap{
		max-width: 900px;
		margin: 0 auto;
	}
	.ts-mmmenu-override-yes.ts-headerstyle-9 #page #site-navigation .mega-menu.max-mega-menu{
		text-align: center;
	}
	.ts-mmmenu-override-yes.ts-headerstyle-9 .themestek-fixed-header #site-header-menu #site-navigation .mega-menu-wrap{
		float: left;
	}

}

.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu>li.mega-menu-item h4.mega-block-title,
.ts-mmmenu-override-yes #page #site-navigation .mega-menu-wrap>ul>li.mega-menu-megamenu>ul.mega-sub-menu li.mega-menu-column>ul.mega-sub-menu>li.mega-menu-item h4.mega-block-title {
	font-size: 18px;
	margin-bottom: 20px;
	padding: 0px;
	color: #fff;
}