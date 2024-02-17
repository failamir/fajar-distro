<?php
/* Advanced Product Labels For Woocommerce support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'trendion_advanced_product_labels_for_woocommerce_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'trendion_advanced_product_labels_for_woocommerce_theme_setup9', 9 );
	function trendion_advanced_product_labels_for_woocommerce_theme_setup9() {		
		if ( is_admin() ) {
			add_filter( 'trendion_filter_tgmpa_required_plugins', 'trendion_advanced_product_labels_for_woocommerce_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'trendion_advanced_product_labels_for_woocommerce_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('trendion_filter_tgmpa_required_plugins',	'trendion_advanced_product_labels_for_woocommerce_tgmpa_required_plugins');
	function trendion_advanced_product_labels_for_woocommerce_tgmpa_required_plugins( $list = array() ) {
		if ( trendion_storage_isset( 'required_plugins', 'advanced-product-labels-for-woocommerce' ) && trendion_storage_get_array( 'required_plugins', 'advanced-product-labels-for-woocommerce', 'install' ) !== false && trendion_is_theme_activated() ) {
			$path = trendion_get_plugin_source_path( 'plugins/advanced-product-labels-for-woocommerce/advanced-product-labels-for-woocommerce.zip' );
			if ( ! empty( $path ) || trendion_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => trendion_storage_get_array( 'required_plugins', 'advanced-product-labels-for-woocommerce', 'title' ),
					'slug'     => 'advanced-product-labels-for-woocommerce',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'trendion_exists_advanced_product_labels_for_woocommerce' ) ) {
	function trendion_exists_advanced_product_labels_for_woocommerce() {
		return class_exists( 'BeRocket_products_label' );
	}
}

// Set plugin's specific importer options
if ( !function_exists( 'trendion_exists_advanced_product_labels_for_woocommerce_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'trendion_exists_advanced_product_labels_for_woocommerce_importer_set_options' );
    function trendion_exists_advanced_product_labels_for_woocommerce_importer_set_options($options=array()) {   
        if ( trendion_exists_advanced_product_labels_for_woocommerce() && in_array('advanced-product-labels-for-woocommerce', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'br-products_label-options';
        }
        return $options;
    }
}