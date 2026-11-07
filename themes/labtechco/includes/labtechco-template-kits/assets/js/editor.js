// Ref: https://github.com/elementor/elementor/blob/v3.4.8/assets/dev/js/admin/admin-feedback.js
/* global jQuery */
( function( $, window ) {
	'use strict';

	var Labtechco_Template_Kits = {
		initConstants: function() {
			this.labtechco_template_kits_obj_name          = labtechco_template_kits_data.obj_name;
			this.labtechco_template_kits_obj               = window[ this.labtechco_template_kits_obj_name ];
			this.labtechco_template_kits_btn_class         = this.labtechco_template_kits_obj.labtechco_template_kits_btn_class;
			this.labtechco_template_kits_btn_title         = this.labtechco_template_kits_obj.labtechco_template_kits_btn_title;
			this.labtechco_template_kits_btn_logo          = this.labtechco_template_kits_obj.labtechco_template_kits_btn_logo;
			this.labtechco_template_kits_categories        = this.labtechco_template_kits_obj.labtechco_template_kits_categories;
			this.labtechco_template_kits_mdl_icon          = this.labtechco_template_kits_obj.labtechco_template_kits_mdl_icon;
			this.labtechco_template_kits_mdl_icon_bg_color = this.labtechco_template_kits_obj.labtechco_template_kits_mdl_icon_bg_color;
			this.labtechco_template_kits_mdl_title         = this.labtechco_template_kits_obj.labtechco_template_kits_mdl_title;
			this.template_data                 = [];
			this.template_data_error           = false;
			this.compare_versions              = window.elementor.helpers.compareVersions;
			this.templates_hash                = [];
		},
		bindEvents: function() {
			var self  = this,
				event = ( this.compare_versions( window.elementor.config.version, '2.8.5', '>' ) ) ? 'document:loaded' : 'preview:loaded';

			$( 'body' ).on( 'click', '.labtechco-template-kits-template .elementor-template-library-template-insert', function( event ) {
				event.preventDefault();
				var el = this;
				self.insertTemplate( el, event );
			});

			$( 'body' ).on( 'click', '.elementor-templates-modal__header__close', function( event ) {
				event.preventDefault();
				self.getModal().hide();
			});

			// Caregory Filter.
			$( 'body' ).on( 'click', '#elementor-template-library-filter .elementor-template-library-filter-tab', function( event ) {
				var cat = $(this).attr( 'data-value' );
				$('#elementor-template-library-filter .elementor-template-library-filter-tab.selected').removeClass('selected');

				$(this).addClass( 'selected' );
				$('.elementor-template-library-template.labtechco-template-kits-template').removeClass('cat-hidden');
				'all' != cat && $('.elementor-template-library-template.labtechco-template-kits-template').not( self.templates_hash[ cat ] ).addClass('cat-hidden');

			});

			// Template search.
			$( 'body' ).on( 'keyup', '#elementor-template-library-filter-text', function( event ) {
				var val = $(this).val();

				val.length ? self.searchByName( val ) : self.clearSearch();
			});

			$( 'body' ).on( 'click', '#elementor-template-library-header-sync', function( event ) {
				event.preventDefault();
				self.syncLibrary( {
					show_templates: true,
					resync: true,
				});
			});

			window.elementor.on( event, function() {
				self.initTemplateLibrary();
				self.syncLibrary();
			});

		},
		searchByName: function( val ) {
			var self = this;

			$('.elementor-template-library-template.labtechco-template-kits-template').removeClass('search-hidden');
			var searched_els = $('.elementor-template-library-template.labtechco-template-kits-template[data-template_id*="' + this.slugify( val ) + '"]');
			$('.elementor-template-library-template.labtechco-template-kits-template').not( searched_els ).addClass('search-hidden');
		},
		clearSearch: function() {
			var self = this;

			$('.elementor-template-library-template.labtechco-template-kits-template').removeClass('search-hidden');
		},
		slugify: function( text ) {
			var self = this;

			return text.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-");
		},
		initTemplateLibrary: function() {
			var self = this;

			self.insertButton();

			window.elementor.$previewContents.find( '.' + this.labtechco_template_kits_btn_class ).on('click', function( event ) {
				event.preventDefault();
				self.showModal();
			});
		},
		insertButton: function() {
			var self = this;

			if ( window.elementor.$previewContents.find( '.' + this.labtechco_template_kits_btn_class ).length > 0 ) {
				return;
			}

			var btn_img = $('<img />', {
				src: self.labtechco_template_kits_btn_logo,
				class: self.labtechco_template_kits_btn_class + '-img'
			});

			var btn_tooltip = $('<div>', {
				class: 'top'
			})
			.append(
				$('<h3>', {
					class: 'h3-top'
				})
				.append(self.labtechco_template_kits_btn_title )
			);

			var btn_el = $('<div>')
				.addClass( 'elementor-add-section-area-button labtechco-elementor-tooltip ' + self.labtechco_template_kits_btn_class )
				.append( btn_img )
				.append( btn_tooltip );

			window.elementor.$previewContents.find( '.elementor-add-new-section .elementor-add-template-button' ).after( btn_el );
		},
		showModal: function() {
			var self = this;
			self.getModal().show();
		},
		hideModal: function() {
			var self = this;
			self.getModal().hide();
		},
		getHeaderTemplates: function() {
			var self = this;

			var header = wp.template( 'labtechco-header-templates' );
			return header({
				'closeType': 'normal',
				'icon': self.labtechco_template_kits_mdl_icon,
				'categories': self.labtechco_template_kits_categories,
				'icon_bg_color': self.labtechco_template_kits_mdl_icon_bg_color,
				'title': self.labtechco_template_kits_mdl_title,
			});
		},
		getHeaderTemplatePreview: function( args ) {
			var self = this;

			var header = wp.template( 'labtechco-header-template-preview' );
			return header({
				'closeType': 'normal',
				'tmpl_id': args.tmpl_id,
			});
		},
		setModalHeader: function( content ) {
			var self = this;
			self.getModal().setHeaderMessage( content );
		},
		setModalContent: function( content ) {
			var self = this;
			self.getModal().setMessage( content );
		},
		getLoader: function() {
			var self = this;

			var loader = wp.template( 'labtechco-loader' );
			return loader({});
		},
		showLoader: function() {
			var self = this;

			var message = self.getModal().getElements('message');
			message.find('.dialog-loading.dialog-lightbox-loading').show();
		},
		hideLoader: function() {
			var self = this;

			var message = self.getModal().getElements('message');
			message.find('.dialog-loading.dialog-lightbox-loading').hide();
		},
		removeTemplates: function() {
			var self = this;

			var message = self.getModal().getElements('message');
			message.find( '#elementor-template-library-templates' ).remove();
		},
		showTemplates: function() {
			var self = this;

			self.removeTemplates();
			self.hideLoader();

			if ( false !== self.template_data_error ) {
				var sync_error_msg      = wp.template('labtechco-sync-error');
				var sync_error_msg_html = sync_error_msg({
					'error_message': self.template_data_error,
				});
				self.templates_hash = [];
			} else {
				var templates      = wp.template('labtechco-templates');
				var templates_html = templates( self.template_data );

				var message = self.getModal().getElements('message');
				message.append( templates_html );

				// Prepare data for category filter.
				message.find( '#elementor-template-library-templates #elementor-template-library-templates-container > .elementor-template-library-template.labtechco-template-kits-template' ).each( function (i, div ) {
					$.each( $( div ).attr('data-template_cat').split(','), function ( i, el ) {
						if ( ! ( el in self.templates_hash ) ) {
							self.templates_hash[ el ] = [];
						}
						self.templates_hash[ el ].push( div );
					});
				});
			}
		},
		previewTemplate: function() {
			var self = this;
		},
		insertTemplate: function( el, event ) {
			var self           = this,
				template_id    = $( el ).data( 'template_id' ),
				editor_post_id = window.elementor.config.document.id;

			$.ajax({
				url: self.labtechco_template_kits_obj.ajax_url,
				method: 'POST',
				data: {
					action: 'labtechco_template_kits_get_template',
					template_id: template_id,
					editor_post_id: editor_post_id,
					security: self.labtechco_template_kits_obj.ajax_nonce,
				},
				dataType: 'json',
				beforeSend: function( xhr, settings ) {
					self.removeTemplates();
					self.showLoader();
				},
				success: function( response, status, xhr ) {
					if ( response ) {
						elementor.getPreviewView().addChildModel( response.data.content );
						self.hideModal();
						$e.internal('document/save/set-is-modified', {
							status: true
						});
					}
				},
				error: function( xhr, status, errorthrown ) {
				},
				complete: function( xhr, status ) {
				}
			});
		},
		syncLibrary: function( args = {} ) {
			var self = this;

			var resync         = ( 'resync' in args ) ? args.resync : false;
			var show_templates = ( 'show_templates' in args ) ? args.show_templates : false;

			var translations = self.labtechco_template_kits_obj.translations;

			$.ajax({
				url: self.labtechco_template_kits_obj.ajax_url,
				method: 'POST',
				data: {
					action: 'labtechco_template_kits_sync_library',
					security: self.labtechco_template_kits_obj.ajax_nonce,
				},
				dataType: 'json',
				beforeSend: function(){
					if ( resync ) {
						$( '#elementor-template-library-header-sync' ).find('.eicon-sync').addClass('eicon-animation-spin');
					}
				},
				success: function( response, status, xhr ) {
					if ( response ) {
						self.template_data       = response.data;
						self.template_data_error = false;
					} else {
						self.template_data_error = ( resync ) ? translations.library_sync_error : translations.library_fetch_error;
						self.template_data       = [];
					}
				},
				error: function( xhr, status, errorthrown ) {
					self.template_data_error = ( resync ) ? translations.library_sync_error : translations.library_fetch_error;
					self.template_data       = [];
				},
				complete: function( xhr, status ) {
					if ( resync ) {
						$( '#elementor-template-library-header-sync' ).find('.eicon-sync').removeClass('eicon-animation-spin');
					}
					$( document.body ).trigger( 'labtechco_template_kits_sync_complete' );
					if ( show_templates ) {
						self.showTemplates();
					}
				}
			});
		},
		initModal: function() {
			var self = this,
				modal;

			var translations = self.labtechco_template_kits_obj.translations;

			self.getModal = function() {
				if ( ! modal ) {
					modal = elementorCommon.dialogsManager.createWidget( 'lightbox', {
						id: 'labtechco-template-kits-template-library-modal',
						className: 'elementor-templates-modal labtechco-template-kits-modal',
						closeButton: false,
						draggable: false,

						headerMessage: self.getHeaderTemplates(),
						message: self.getLoader(),
						hide: {
							onOutsideClick: true,
							onEscKeyPress: true
						},
						position: {
							my: 'center',
							at: 'center',
						},
						onReady: function() {
						},
						onShow: function() {
							self.showLoader();
							if ( self.template_data.length === 0 ) {
								self.syncLibrary( {
									show_templates: true,
								});
							} else {
								self.showTemplates();
							}
						},
						onHide: function() {
							var header_content = self.getHeaderTemplates();
							self.setModalHeader( header_content );
						},
					} );
				}

				return modal;
			};
		},
		init: function() {
			this.initConstants();
			this.initModal();
			this.bindEvents();
		},
	};
	$( function() {
		Labtechco_Template_Kits.init();
	} );
})( jQuery, window );
