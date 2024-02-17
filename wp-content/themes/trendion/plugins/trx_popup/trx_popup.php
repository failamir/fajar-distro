<?php
/* ThemeREX Popup support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'trendion_trx_popup_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'trendion_trx_popup_theme_setup9', 9 );
	function trendion_trx_popup_theme_setup9() {
		if ( trendion_exists_trx_popup() ) {
			add_action( 'wp_enqueue_scripts', 'trendion_trx_popup_frontend_scripts', 1100 );
			add_filter( 'trendion_filter_merge_styles', 'trendion_trx_popup_merge_styles' );
		}
		if ( is_admin() ) {
			add_filter( 'trendion_filter_tgmpa_required_plugins', 'trendion_trx_popup_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'trendion_trx_popup_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter( 'trendion_filter_tgmpa_required_plugins',	'trendion_trx_popup_tgmpa_required_plugins' );
	function trendion_trx_popup_tgmpa_required_plugins( $list = array() ) {
		if ( trendion_storage_isset( 'required_plugins', 'trx_popup' ) && trendion_storage_get_array( 'required_plugins', 'trx_popup', 'install' ) !== false && trendion_is_theme_activated() ) {
			$path = trendion_get_plugin_source_path( 'plugins/trx_popup/trx_popup.zip' );
			if ( ! empty( $path ) || trendion_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => trendion_storage_get_array( 'required_plugins', 'trx_popup', 'title' ),
					'slug'     => 'trx_popup',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_popup.zip',
					'version'  => '1.0',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'trendion_exists_trx_popup' ) ) {
	function trendion_exists_trx_popup() {
		return defined( 'TRX_POPUP_URL' );
	}
}

// Enqueue custom scripts
if ( ! function_exists( 'trendion_trx_popup_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'trendion_trx_popup_frontend_scripts', 1100 );
	function trendion_trx_popup_frontend_scripts() {
		if ( trendion_is_on( trendion_get_theme_option( 'debug_mode' ) ) ) {
			$trendion_url = trendion_get_file_url( 'plugins/trx_popup/trx_popup.css' );
			if ( '' != $trendion_url ) {
				wp_enqueue_style( 'trendion-trx-popup', $trendion_url, array(), null );
			}
		}
	}
}

// Merge custom styles
if ( ! function_exists( 'trendion_trx_popup_merge_styles' ) ) {
	//Handler of the add_filter('trendion_filter_merge_styles', 'trendion_trx_popup_merge_styles');
	function trendion_trx_popup_merge_styles( $list ) {
		$list[ 'plugins/trx_popup/trx_popup.css' ] = true;
		return $list;
	}
}

// Add plugin-specific colors and fonts to the custom CSS
if ( trendion_exists_trx_popup() ) {
	$trendion_fdir = trendion_get_file_dir( 'plugins/trx_popup/trx_popup-style.php' );
	if ( ! empty( $trendion_fdir ) ) {
		require_once $trendion_fdir;
	}
}
