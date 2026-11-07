
/*========================================== Row / Colum Background Base Css ==========================================*/
.ts-col-stretched-yes .ts-stretched-div{
    position: absolute;
    height: 100%;
    width: 100%;
    top:0;
    left: 0;    
    width: auto;
    z-index: 1;
    overflow: hidden;
}
body:not(.rtl) .ts-col-stretched-left .ts-stretched-div{
    margin-left: -500px;
    right: 0;
}
body:not(.rtl) .ts-col-stretched-right .ts-stretched-div{
    margin-right: -500px;  
    right: 0; 
}
.elementor-section.elementor-top-section.ts-bg-image-over-color.ts-bgimage-yes:before,
.elementor-column.elementor-top-column.ts-bgimage-yes.ts-bg-image-over-color > .ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-bg-image-over-color > .elementor-widget-wrap:before,
.elementor-column.elementor-top-column.ts-bg-image-over-color > .elementor-column-wrap:before{ 
	background-color: transparent !important;
}
.elementor-column.ts-col-stretched-yes.ts-bgimage-yes{
    background-image: none;
    background-color: transparent;
}
.ts-bgimage-over-bgcolor.ts-bgimage-yes .ts-stretched-div:before,
.ts-bgimage-over-bgcolor.ts-bgimage-yes:before{
   background-color: transparent !important
}


.elementor-top-section:before, 
.ts-col-stretched-yes .ts-stretched-div:before,

.elementor-column.elementor-top-column .elementor-widget-wrap:before,
.elementor-column.elementor-top-column .elementor-column-wrap:before,

.elementor-inner-column > div:before,
.elementor-inner-section:before{
	position: absolute;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	content: "";
	display: block;
	z-index: 1;
}


/* --------------------------------------
 * Row Colum - Global BG Color
 * ---------------------------------------*/


/*--- Main RoW BG ---*/
.elementor-section.elementor-top-section.ts-bgcolor-skincolor, 
.elementor-section.elementor-top-section.ts-bgcolor-skincolor:before, 
.elementor-section.elementor-inner-section.ts-bgcolor-skincolor {
    background-color: var(--tste-labtechco-skincolor);
}

/*--- Main Row BG - with image ---*/
.elementor-section.elementor-top-section.ts-bgcolor-skincolor.ts-bgimage-yes:before{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90 );
}



/*--- Main Colum BG - ---*/
.elementor-column.elementor-top-column.ts-bgcolor-skincolor:not(.ts-bgimage-yes) .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bg-image-over-color .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor:not(.ts-col-stretched-yes) > .elementor-widget-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-widget-wrap,

.elementor-column.elementor-top-column.ts-bgcolor-skincolor:not(.ts-bgimage-yes) .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bg-image-over-color .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor:not(.ts-col-stretched-yes) > .elementor-column-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-column-wrap{
	background-color: var(--tste-labtechco-skincolor) !important;
}


/*--- Main Colum BG - with image ---*/
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-widget-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-widget-wrap .ts-stretched-div:before,
.elementor-column.elementor-top-column.ts-bgcolor-skincolor .elementor-widget-wrap .ts-bgimage-yes.ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-column-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-column-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-skincolor .elementor-column-wrap .ts-bgimage-yes.ts-stretched-div:before{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90 );
}


/*--- Inner Colum BG  ---*/
.elementor-inner-section.ts-bgcolor-skincolor{ 
	background-color: var(--tste-labtechco-skincolor) !important;
}

/*--- Inner Row - without image ---*/
.elementor-inner-section.ts-bgcolor-skincolor:not(.ts-bg-image-over-color):before{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90 );
}


/*--- Inner Colum BG ---*/
.elementor-inner-column.ts-bgcolor-skincolor > div.elementor-column-wrap,
.elementor-inner-column.ts-bgcolor-skincolor > div.elementor-widget-wrap{ 
	background-color: var(--tste-labtechco-skincolor) !important;
}

/*--- Inner Colum BG - with image ---*/
.elementor-inner-column.ts-bgcolor-skincolor:not(.ts-bg-image-over-color) > div.elementor-column-wrap:before,
.elementor-inner-column.ts-bgcolor-skincolor:not(.ts-bg-image-over-color) > div.elementor-widget-wrap:before{
	background-color: rgb( var(--tste-labtechco-skincolor-rgb) , 0.90 );
}


/*====== End --- Row Colum - Global BG Color ======*/

/* --------------------------------------
 * Row Colum - Light BG Color
 * ---------------------------------------*/


/*--- Main RoW BG ---*/
.elementor-section.elementor-top-section.ts-bgcolor-grey, 
.elementor-section.elementor-top-section.ts-bgcolor-grey:before, 
.elementor-section.elementor-inner-section.ts-bgcolor-grey {
    background-color: var(--tste-labtechco-skincolor-light);
}

/*--- Main Row BG - with image ---*/
.elementor-section.elementor-top-section.ts-bgcolor-grey.ts-bgimage-yes:before{
	background-color: rgb( var(tste-labtechco-skincolor-light-rgb) , 0.60 );
}

/*--- Main Colum BG - ---*/
.elementor-column.elementor-top-column.ts-bgcolor-grey:not(.ts-bgimage-yes) .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bg-image-over-color .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-grey:not(.ts-col-stretched-yes) > .elementor-widget-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-widget-wrap,

.elementor-column.elementor-top-column.ts-bgcolor-grey:not(.ts-bgimage-yes) .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bg-image-over-color .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-grey:not(.ts-col-stretched-yes) > .elementor-column-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-column-wrap{
	background-color: var(--tste-labtechco-skincolor-light) !important;
}


/*--- Main Colum BG - with image ---*/
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-widget-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-widget-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-grey .elementor-widget-wrap .ts-bgimage-yes.ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-column-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-grey.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-column-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-grey .elementor-column-wrap .ts-bgimage-yes.ts-stretched-div:before{
	background-color: rgb( var(tste-labtechco-skincolor-light-rgb) , 0.60 );
}


/*--- Inner Colum BG  ---*/
.elementor-inner-section.ts-bgcolor-grey{ 
	background-color: var(--tste-labtechco-skincolor-light) !important;
}

/*--- Inner Row - without image ---*/
.elementor-inner-section.ts-bgcolor-grey:not(.ts-bg-image-over-color):before{
	background-color: rgb( var(tste-labtechco-skincolor-light-rgb) , 0.60 );
}


/*--- Inner Colum BG ---*/
.elementor-inner-column.ts-bgcolor-grey > div.elementor-column-wrap,
.elementor-inner-column.ts-bgcolor-grey > div.elementor-widget-wrap{ 
	background-color: var(--tste-labtechco-skincolor-light) !important;
}

/*--- Inner Colum BG - with image ---*/
.elementor-inner-column.ts-bgcolor-grey:not(.ts-bg-image-over-color) > div.elementor-column-wrap:before,
.elementor-inner-column.ts-bgcolor-grey:not(.ts-bg-image-over-color) > div.elementor-widget-wrap:before{
	background-color: rgb( var(tste-labtechco-skincolor-light-rgb) , 0.60 );
}


/*====== End --- Row Colum - Light BG Color ======*/

/* --------------------------------------
 * Row Colum - Secondary BG Color
 * ---------------------------------------*/


/*--- Main RoW BG ---*/
.elementor-section.elementor-top-section.ts-bgcolor-darkgrey, 
.elementor-section.elementor-top-section.ts-bgcolor-darkgrey:before, 
.elementor-section.elementor-inner-section.ts-bgcolor-darkgrey {
    background-color: var(--tste-labtechco-skincolor-dark);
}

/*--- Main Row BG - with image ---*/
.elementor-section.elementor-top-section.ts-bgcolor-darkgrey.ts-bgimage-yes:before{
	background-color: rgb( var(--tste-labtechco-skincolor-dark-rgb) , 0.85 );
}

/*--- Main Colum BG - ---*/
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey:not(.ts-bgimage-yes) .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bg-image-over-color .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey:not(.ts-col-stretched-yes) > .elementor-widget-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-widget-wrap,

.elementor-column.elementor-top-column.ts-bgcolor-darkgrey:not(.ts-bgimage-yes) .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bg-image-over-color .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey:not(.ts-col-stretched-yes) > .elementor-column-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-column-wrap{
	background-color: var(--tste-labtechco-skincolor-dark) !important;
}


/*--- Main Colum BG - with image ---*/
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-widget-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-widget-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey .elementor-widget-wrap .ts-bgimage-yes.ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-column-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-column-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-darkgrey .elementor-column-wrap .ts-bgimage-yes.ts-stretched-div:before{
	background-color: rgb( var(--tste-labtechco-skincolor-dark-rgb) , 0.85 );
}


/*--- Inner Colum BG  ---*/
.elementor-inner-section.ts-bgcolor-darkgrey{ 
	background-color: var(--tste-labtechco-skincolor-dark) !important;
}

/*--- Inner Row - without image ---*/
.elementor-inner-section.ts-bgcolor-darkgrey:not(.ts-bg-image-over-color):before{
	background-color: rgb( var(--tste-labtechco-skincolor-dark-rgb) , 0.85 );
}


/*--- Inner Colum BG ---*/
.elementor-inner-column.ts-bgcolor-darkgrey > div.elementor-column-wrap,
.elementor-inner-column.ts-bgcolor-darkgrey > div.elementor-widget-wrap{ 
	background-color: var(--tste-labtechco-skincolor-dark) !important;
}

/*--- Inner Colum BG - with image ---*/
.elementor-inner-column.ts-bgcolor-darkgrey:not(.ts-bg-image-over-color) > div.elementor-column-wrap:before,
.elementor-inner-column.ts-bgcolor-darkgrey:not(.ts-bg-image-over-color) > div.elementor-widget-wrap:before{
	background-color: rgb( var(--tste-labtechco-skincolor-dark-rgb) , 0.85 );
}




/* --------------------------------------
 * Row Colum - White BG Color
 * ---------------------------------------*/



/*--- Main RoW BG ---*/
.elementor-section.elementor-top-section.ts-bgcolor-white, 
.elementor-section.elementor-top-section.ts-bgcolor-white:before, 
.elementor-section.elementor-inner-section.ts-bgcolor-white {
    background-color: #fff;
}

/*--- Main Row BG - with image ---*/
.elementor-section.elementor-top-section.ts-bgcolor-white.ts-bgimage-yes:before{
	background-color: rgba( var(--ts-labtechco-white-color-rgb) , 0.60 );
}

/*--- Main Colum BG - ---*/
.elementor-column.elementor-top-column.ts-bgcolor-white:not(.ts-bgimage-yes) .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bg-image-over-color .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-white:not(.ts-col-stretched-yes) > .elementor-widget-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-widget-wrap,

.elementor-column.elementor-top-column.ts-bgcolor-white:not(.ts-bgimage-yes) .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bg-image-over-color .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-bgcolor-white:not(.ts-col-stretched-yes) > .elementor-column-wrap, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-column-wrap{
	background-color: #fff !important;
}


/*--- Main Colum BG - with image ---*/
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-widget-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-widget-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-white .elementor-widget-wrap .ts-bgimage-yes.ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-column-wrap:before, 
.elementor-column.elementor-top-column.ts-bgcolor-white.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-column-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-bgcolor-white .elementor-column-wrap .ts-bgimage-yes.ts-stretched-div:before{
	background-color: rgba( var(--ts-labtechco-white-color-rgb) , 0.60 );
}


/*--- Inner Colum BG  ---*/
.elementor-inner-section.ts-bgcolor-white{ 
	background-color: #fff !important;
}

/*--- Inner Row - without image ---*/
.elementor-inner-section.ts-bgcolor-white:not(.ts-bg-image-over-color):before{
	background-color: rgba( var(--ts-labtechco-white-color-rgb) , 0.60 );
}


/*--- Inner Colum BG ---*/
.elementor-inner-column.ts-bgcolor-white > div.elementor-column-wrap,
.elementor-inner-column.ts-bgcolor-white > div.elementor-widget-wrap{ 
	background-color: #fff !important;
}

/*--- Inner Colum BG - with image ---*/
.elementor-inner-column.ts-bgcolor-white:not(.ts-bg-image-over-color) > div.elementor-column-wrap:before,
.elementor-inner-column.ts-bgcolor-white:not(.ts-bg-image-over-color) > div.elementor-widget-wrap:before{
	background-color: rgba( var(--ts-labtechco-white-color-rgb) , 0.60 );
}


/*====== End --- Row Colum - White BG Color ======*/


/* --------------------------------------
 * Row Colum - Gradient BG Color
 * ---------------------------------------*/

/*--- Main RoW BG ---*/
.elementor-section.elementor-top-section.ts-elementor-bg-color-gradient, 
.elementor-section.elementor-top-section.ts-elementor-bg-color-gradient:before, 
.elementor-section.elementor-inner-section.ts-elementor-bg-color-gradient {
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}

/*--- Main Row BG - with image ---*/
.elementor-section.elementor-top-section.ts-elementor-bg-color-gradient.ts-bgimage-yes:before{
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
    opacity: 0.5;
}

/*--- Main Colum BG - ---*/
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient:not(.ts-bgimage-yes) .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bg-image-over-color .elementor-widget-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient:not(.ts-col-stretched-yes) > .elementor-widget-wrap, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-widget-wrap,

.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient:not(.ts-bgimage-yes) .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bg-image-over-color .elementor-column-wrap > .ts-stretched-div, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient:not(.ts-col-stretched-yes) > .elementor-column-wrap, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bg-image-over-color:not(.ts-col-stretched-yes) > .elementor-column-wrap{
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}


/*--- Main Colum BG - with image ---*/
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-widget-wrap:before, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-widget-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient .elementor-widget-wrap .ts-bgimage-yes.ts-stretched-div:before,

.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bgimage-yes:not(.ts-col-stretched-yes) > .elementor-column-wrap:before, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient.ts-bgimage-yes:not(.ts-bg-image-over-color) .elementor-column-wrap .ts-stretched-div:before, 
.elementor-column.elementor-top-column.ts-elementor-bg-color-gradient .elementor-column-wrap .ts-bgimage-yes.ts-stretched-div:before{
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 80%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
    opacity: 0.5;
}


/*--- Inner Colum BG  ---*/
.elementor-inner-section.ts-elementor-bg-color-gradient{ 
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}

/*--- Inner Row - without image ---*/
.elementor-inner-section.ts-elementor-bg-color-gradient:not(.ts-bg-image-over-color):before{
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
    opacity: 0.5;
}


/*--- Inner Colum BG ---*/
.elementor-inner-column.ts-elementor-bg-color-gradient > div.elementor-column-wrap,
.elementor-inner-column.ts-elementor-bg-color-gradient > div.elementor-widget-wrap{ 
	background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}

/*--- Inner Colum BG - with image ---*/
.elementor-inner-column.ts-elementor-bg-color-gradient:not(.ts-bg-image-over-color) > div.elementor-column-wrap:before,
.elementor-inner-column.ts-elementor-bg-color-gradient:not(.ts-bg-image-over-color) > div.elementor-widget-wrap:before{
    background-image: -ms-linear-gradient(right, var(--tste-labtechco-first-gradient) 0%, var(--tste-labtechco-second-gradient) 100%);
	background-image: linear-gradient(to right, var(--tste-labtechco-first-gradient) , var(--tste-labtechco-second-gradient) );
}


/*====== End --- Row Colum - Gradient BG Color ======*/