<?php


/* --- VC Shared Library --- */
require_once get_template_directory().'/includes/vc/vc-core.php';



/* --- Element List --- */

// ts_custom_heading
add_action( 'vc_after_init', 'ts_vc_custom_element_custom_heading' );
function ts_vc_custom_element_custom_heading(){ get_template_part('includes/vc/element-ts','custom-heading'); }

// ts_icon
add_action( 'vc_after_init', 'ts_vc_custom_element_icon' );
function ts_vc_custom_element_icon(){ get_template_part('includes/vc/element-ts','icon'); }

// ts_btn
add_action( 'vc_after_init', 'ts_vc_custom_element_btn' );
function ts_vc_custom_element_btn(){ get_template_part('includes/vc/element-ts','btn'); }

// ts_cta
add_action( 'vc_after_init', 'ts_vc_custom_element_cta' );
function ts_vc_custom_element_cta(){ get_template_part('includes/vc/element-ts','cta'); }

// ts_heading
add_action( 'vc_after_init', 'ts_vc_custom_element_heading' );
function ts_vc_custom_element_heading(){ get_template_part('includes/vc/element-ts','heading'); }

// ts_single_image
add_action( 'vc_after_init', 'ts_vc_custom_element_single_image' );
function ts_vc_custom_element_single_image(){ get_template_part('includes/vc/element-ts','single-image'); }

// ts_action_box
add_action( 'vc_after_init', 'ts_vc_custom_element_action_box' );
function ts_vc_custom_element_action_box(){ get_template_part('includes/vc/element-ts','action-box'); }

// ts_iconheadingbox
add_action( 'vc_after_init', 'ts_vc_custom_element_iconheadingbox' );
function ts_vc_custom_element_iconheadingbox(){ get_template_part('includes/vc/element-ts','iconheadingbox'); }

// ts_staticbox
add_action( 'vc_after_init', 'ts_vc_custom_element_staticbox' );
function ts_vc_custom_element_staticbox(){ get_template_part('includes/vc/element-ts','staticbox'); }

// ts_progress_bar
add_action( 'vc_after_init', 'ts_vc_progress_bar' );
function ts_vc_progress_bar(){ get_template_part('includes/vc/element-ts','progress-bar'); }

// ts_pricing_table
add_action( 'vc_after_init', 'ts_vc_pricing_table' );
function ts_vc_pricing_table(){ get_template_part('includes/vc/element-ts','pricing-table'); }

// ts_blogbox
add_action( 'vc_after_init', 'ts_vc_custom_element_blogbox' );
function ts_vc_custom_element_blogbox(){ get_template_part('includes/vc/element-ts','blogbox'); }

// ts-portfoliobox
add_action( 'vc_after_init', 'ts_vc_custom_element_portfoliobox' );
function ts_vc_custom_element_portfoliobox(){ get_template_part('includes/vc/element-ts','portfoliobox'); }

// ts-servicebox
add_action( 'vc_after_init', 'ts_vc_custom_element_servicebox' );
function ts_vc_custom_element_servicebox(){ get_template_part('includes/vc/element-ts','servicebox'); }

// ts_teambox
add_action( 'vc_after_init', 'ts_vc_custom_element_teambox' );
function ts_vc_custom_element_teambox(){ get_template_part('includes/vc/element-ts','teambox'); }

// ts-testimonialbox
add_action( 'vc_after_init', 'ts_vc_custom_element_testimonialbox' );
function ts_vc_custom_element_testimonialbox(){ get_template_part('includes/vc/element-ts','testimonialbox'); }

// ts_clientsbox
add_action( 'vc_after_init', 'ts_vc_custom_element_clientsbox' );
function ts_vc_custom_element_clientsbox(){ get_template_part('includes/vc/element-ts','clientsbox'); }

// ts_facts_in_digits
add_action( 'vc_after_init', 'ts_vc_custom_element_facts_in_digits' );
function ts_vc_custom_element_facts_in_digits(){ get_template_part('includes/vc/element-ts','facts-in-digits'); }

// ts_contactbox
add_action( 'vc_after_init', 'ts_vc_custom_element_contactbox' );
function ts_vc_custom_element_contactbox(){ get_template_part('includes/vc/element-ts','contactbox'); }

// ts_list
add_action( 'vc_after_init', 'ts_vc_custom_element_list' );
function ts_vc_custom_element_list(){ get_template_part('includes/vc/element-ts','list'); }

// ts_socialbox
add_action( 'vc_after_init', 'ts_vc_custom_element_socialbox' );
function ts_vc_custom_element_socialbox(){ get_template_part('includes/vc/element-ts','socialbox'); }


// ts_pricelistbox
add_action( 'vc_after_init', 'ts_vc_custom_element_pricelistbox' );
function ts_vc_custom_element_pricelistbox(){ get_template_part('includes/vc/element-ts','pricelistbox'); }

