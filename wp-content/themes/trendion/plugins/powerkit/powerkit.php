<?php
/* PowerKit support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'trendion_powerkit_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'trendion_powerkit_theme_setup9', 9 );
	function trendion_powerkit_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'trendion_filter_tgmpa_required_plugins', 'trendion_powerkit_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'trendion_powerkit_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('trendion_filter_tgmpa_required_plugins',	'trendion_powerkit_tgmpa_required_plugins');
	function trendion_powerkit_tgmpa_required_plugins( $list = array() ) {
		if ( trendion_storage_isset( 'required_plugins', 'powerkit' ) && trendion_storage_get_array( 'required_plugins', 'powerkit', 'install' ) !== false ) {
			$list[] = array(
				'name'     => trendion_storage_get_array( 'required_plugins', 'powerkit', 'title' ),
				'slug'     => 'powerkit',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'trendion_exists_powerkit' ) ) {
	function trendion_exists_powerkit() {
		return class_exists( 'Powerkit' );
	}
}
