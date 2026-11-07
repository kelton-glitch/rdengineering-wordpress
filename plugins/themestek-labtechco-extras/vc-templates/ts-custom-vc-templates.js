'use strict';

/* Simple Masonry
jQuery plugin that manipulates a containers children into a simple and light masonry layout. */
!function(a){function b(b){var c=Math.min.apply(Math,b);return a.inArray(c,b)}function c(a){for(var b=[],c=0;c<a;c++)b.push(0);return b}function d(b){var c=a(b).outerWidth(),d=a(b).offsetParent().width();return{width:100*c/d,num:Math.floor(d/c)}}Array.max=function(a){return Math.max.apply(Math,a)},a.easing.__Slide=function(a,b,c,d,e){return d*Math.sqrt(1-(b=b/e-1)*b)+c},a.simplemasonry=function(e,f){var g={animate:!1,easing:"__Slide",timeout:800},h=a.extend({},g,f),i=a(e),j=this;a.extend(j,{refresh:function(){var b=a("img",e),c=b.length,d=0;b.length>0&&i.addClass("sm-images-waiting").removeClass("sm-images-loaded"),b.on("load",function(a){d++,d==c&&(j.resize(),i.removeClass("sm-images-waiting").addClass("sm-images-loaded"))}),j.resize()},resize:function(){var e=i.children(":visible"),f=d(e[0]),g=f.width,j=f.num,k=c(j),l=function(c){var d=a(this).outerHeight(),f=b(k),i=Math.round(f*g*10)/10,j={left:i+"%",top:k[f]+"px"};a(this).css({position:"absolute"}).stop(),h.animate?a(this).animate(j,h.timeout,h.easing):a(this).css(j),k[f]+=d};e.css({overflow:"hidden",zoom:"1"}).each(l),i.css({position:"relative",height:Array.max(k)+"px"})}}),a(window).resize(j.resize),i.addClass("sm-loaded"),j.refresh()},a.fn.simplemasonry=function(b){if("string"!=typeof b)return this.each(function(){if(void 0==a(this).data("simplemasonry")){var c=new a.simplemasonry(this,b);a(this).data("simplemasonry",c)}});var c=a(this).data("simplemasonry"),d=Array.prototype.slice.call(arguments,1);return c[b]?c[b].apply(c,d):void 0}}(jQuery);

/*!
 * imagesLoaded PACKAGED v4.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
!function(e,t){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",t):"object"==typeof module&&module.exports?module.exports=t():e.EvEmitter=t()}("undefined"!=typeof window?window:this,function(){function e(){}var t=e.prototype;return t.on=function(e,t){if(e&&t){var i=this._events=this._events||{},n=i[e]=i[e]||[];return n.indexOf(t)==-1&&n.push(t),this}},t.once=function(e,t){if(e&&t){this.on(e,t);var i=this._onceEvents=this._onceEvents||{},n=i[e]=i[e]||{};return n[t]=!0,this}},t.off=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){var n=i.indexOf(t);return n!=-1&&i.splice(n,1),this}},t.emitEvent=function(e,t){var i=this._events&&this._events[e];if(i&&i.length){i=i.slice(0),t=t||[];for(var n=this._onceEvents&&this._onceEvents[e],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(e,r),delete n[r]),r.apply(this,t)}return this}},t.allOff=function(){delete this._events,delete this._onceEvents},e}),function(e,t){"use strict";"function"==typeof define&&define.amd?define(["ev-emitter/ev-emitter"],function(i){return t(e,i)}):"object"==typeof module&&module.exports?module.exports=t(e,require("ev-emitter")):e.imagesLoaded=t(e,e.EvEmitter)}("undefined"!=typeof window?window:this,function(e,t){function i(e,t){for(var i in t)e[i]=t[i];return e}function n(e){if(Array.isArray(e))return e;var t="object"==typeof e&&"number"==typeof e.length;return t?d.call(e):[e]}function o(e,t,r){if(!(this instanceof o))return new o(e,t,r);var s=e;return"string"==typeof e&&(s=document.querySelectorAll(e)),s?(this.elements=n(s),this.options=i({},this.options),"function"==typeof t?r=t:i(this.options,t),r&&this.on("always",r),this.getImages(),h&&(this.jqDeferred=new h.Deferred),void setTimeout(this.check.bind(this))):void a.error("Bad element for imagesLoaded "+(s||e))}function r(e){this.img=e}function s(e,t){this.url=e,this.element=t,this.img=new Image}var h=e.jQuery,a=e.console,d=Array.prototype.slice;o.prototype=Object.create(t.prototype),o.prototype.options={},o.prototype.getImages=function(){this.images=[],this.elements.forEach(this.addElementImages,this)},o.prototype.addElementImages=function(e){"IMG"==e.nodeName&&this.addImage(e),this.options.background===!0&&this.addElementBackgroundImages(e);var t=e.nodeType;if(t&&u[t]){for(var i=e.querySelectorAll("img"),n=0;n<i.length;n++){var o=i[n];this.addImage(o)}if("string"==typeof this.options.background){var r=e.querySelectorAll(this.options.background);for(n=0;n<r.length;n++){var s=r[n];this.addElementBackgroundImages(s)}}}};var u={1:!0,9:!0,11:!0};return o.prototype.addElementBackgroundImages=function(e){var t=getComputedStyle(e);if(t)for(var i=/url\((['"])?(.*?)\1\)/gi,n=i.exec(t.backgroundImage);null!==n;){var o=n&&n[2];o&&this.addBackground(o,e),n=i.exec(t.backgroundImage)}},o.prototype.addImage=function(e){var t=new r(e);this.images.push(t)},o.prototype.addBackground=function(e,t){var i=new s(e,t);this.images.push(i)},o.prototype.check=function(){function e(e,i,n){setTimeout(function(){t.progress(e,i,n)})}var t=this;return this.progressedCount=0,this.hasAnyBroken=!1,this.images.length?void this.images.forEach(function(t){t.once("progress",e),t.check()}):void this.complete()},o.prototype.progress=function(e,t,i){this.progressedCount++,this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded,this.emitEvent("progress",[this,e,t]),this.jqDeferred&&this.jqDeferred.notify&&this.jqDeferred.notify(this,e),this.progressedCount==this.images.length&&this.complete(),this.options.debug&&a&&a.log("progress: "+i,e,t)},o.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";if(this.isComplete=!0,this.emitEvent(e,[this]),this.emitEvent("always",[this]),this.jqDeferred){var t=this.hasAnyBroken?"reject":"resolve";this.jqDeferred[t](this)}},r.prototype=Object.create(t.prototype),r.prototype.check=function(){var e=this.getIsImageComplete();return e?void this.confirm(0!==this.img.naturalWidth,"naturalWidth"):(this.proxyImage=new Image,this.proxyImage.addEventListener("load",this),this.proxyImage.addEventListener("error",this),this.img.addEventListener("load",this),this.img.addEventListener("error",this),void(this.proxyImage.src=this.img.src))},r.prototype.getIsImageComplete=function(){return this.img.complete&&this.img.naturalWidth},r.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.img,t])},r.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},r.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindEvents()},r.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindEvents()},r.prototype.unbindEvents=function(){this.proxyImage.removeEventListener("load",this),this.proxyImage.removeEventListener("error",this),this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype=Object.create(r.prototype),s.prototype.check=function(){this.img.addEventListener("load",this),this.img.addEventListener("error",this),this.img.src=this.url;var e=this.getIsImageComplete();e&&(this.confirm(0!==this.img.naturalWidth,"naturalWidth"),this.unbindEvents())},s.prototype.unbindEvents=function(){this.img.removeEventListener("load",this),this.img.removeEventListener("error",this)},s.prototype.confirm=function(e,t){this.isLoaded=e,this.emitEvent("progress",[this,this.element,t])},o.makeJQueryPlugin=function(t){t=t||e.jQuery,t&&(h=t,h.fn.imagesLoaded=function(e,t){var i=new o(this,e,t);return i.jqDeferred.promise(h(this))})},o.makeJQueryPlugin(),o});


function ts_call_custom_template(){
	jQuery('#vc_templates-editor-button').trigger('click');
}



function ts_template_js_call(){

	

	var wind = jQuery(window);
	
	// VC Templates
	if ( jQuery( '.vc_templates-template-type-default_templates' ).length ) {
	  jQuery( '#vc_templates-editor-button, #vc_templates-more-layouts' ).off( 'click' ).on( 'click', function() {
		  var inView = function( e, t, h ) {
			  var b   = t + h,
				  et  = e.position().top,
				  eb  = et + e.height();

			  return ( ( eb <= b + 50 ) && ( et >= t ) );
			},
			filters = jQuery( '.ts_vc_filters' ),
			last_li = jQuery( '[data-vc-ui-element-target="[data-tab=default_templates]"]' ).html( filters.data( 'tab-title' ) ).parent('li'),
			vupc = jQuery( '.vc_ui-panel-content-container' ),
			vutl = jQuery( '.vc_ui-template-list' );

		  last_li.prependTo( last_li.parent() );
		  last_li.find( 'button' ).trigger( 'click' );

		  jQuery( '[data-tab="default_templates"]' ).find( '.vc_col-md-12' ).addClass( 'vc_col-md-2' ).removeClass( 'vc_col-md-12' ).html( '' ).append( filters );
		  jQuery( '[data-tab="default_templates"]' ).find( '.vc_column' ).addClass( 'vc_col-md-10 ts_templates_items' ).removeClass( 'vc_col-md-12' );

		  filters.removeClass( 'hidden' );

		  jQuery( 'li', filters ).off().on( 'click', function() {
			var dis = jQuery( this ),
				nam = dis.data( 'filter' );

			dis.addClass( 'ts_active' ).siblings().removeClass( 'ts_active' );
			jQuery( '.ts_templates_items .vc_ui-template-list .vc_ui-template' ).addClass( 'ts_deactive' );
			jQuery( '.ts_templates_items .vc_ui-template-list .' + nam ).removeClass( 'ts_deactive' );

			wind.resize();

		  }).each(function() {
			var dis = jQuery( this );
			dis.append( '<span>' + jQuery( '.ts_templates_items .' + dis.data( 'filter' ) ).length + '</span>' );
		  });

		  // Lazyload templates
		  jQuery( '.vc_templates-template-type-default_templates' ).each(function() {
			var dis = jQuery( this ), button = jQuery( '.vc_ui-list-bar-item-trigger', this ), title='';

			var cls = dis.attr( 'class' ).split(' ');
			jQuery.each(cls, function( e, n ) {
			  if ( n && n.indexOf( '_jpg' ) >= 0 ) {
				title = n;
			  }
			});

			vupc.on( 'scroll', function( e ) {
			  if ( inView( dis, e.currentTarget.scrollTop, e.currentTarget.clientHeight ) && ! jQuery( 'img', dis ).length ) {
				setTimeout(function() {
				  button.html( '<img src="' + THEMESTEK_LABTECHCO_EXTRAS.THEMESTEK_LABTECHCO_URI + '/vc-templates/' + title.replace( /_/g, '.' ) + '" />' + title );
				  vutl.imagesLoaded(function() {
					wind.resize();
				  });
				}, 500 );
			  }
			});
		}).on( 'click', '.vc_ui-list-bar-item-trigger', function() {
			var dis = jQuery( this );
			dis.addClass( 'ts_template_loader_after' ).find( 'img' ).css( 'opacity', '0.3' );
			setTimeout(function() {
			  dis.removeClass( 'ts_template_loader_after' ).find( 'img' ).css( 'opacity', '1' );
			}, 5000 );
		  });

		  // Masonry templates
		  jQuery( '.vc_templates-list-default_templates' ).simplemasonry({animate: false});

		  // First time open templates
		  jQuery( '#vc_templates-editor-button, #vc_templates-more-layouts, .ts_vc_filters li' ).on( 'click', function() {
			setTimeout(function() {
			  vupc.scroll();
			  wind.resize();
			}, 1500 );
		  });

		  // Search tempaltes
		  var time = false;
		  jQuery( '.vc_ui-search-box-input' ).on( 'keyup', 'input', function() {
			clearTimeout( time );
			time = setTimeout(function() {
			  wind.resize();
			  vupc.scroll();
			  setTimeout(function() {
				vupc.scroll();
				wind.resize();
			  }, 500 );
			}, 500 );
		  });

		  setTimeout(function() {
			vupc.scroll();
		  }, 1000 );

		  jQuery( this ).off( 'click.ts_templates' );
	  });
	}
	
	
}; // function 


/** Events **/

jQuery(document).ready( function() {
	ts_template_js_call();
});
jQuery(window).load( function() {
	setTimeout(function() {
		ts_template_js_call();
	}, 300 );
});