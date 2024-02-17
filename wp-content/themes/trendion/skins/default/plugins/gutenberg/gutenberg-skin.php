<?php
/* Gutenberg support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'trendion_gutenberg_blocks_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'trendion_gutenberg_blocks_theme_setup9', 9 );
    function trendion_gutenberg_blocks_theme_setup9() {        
        if ( trendion_is_off( trendion_get_theme_option( 'debug_mode' ) ) ) {
            remove_action( 'trendion_filter_merge_styles', 'trendion_skin_gutenberg_merge_styles' );
            remove_action( 'trendion_filter_merge_styles', 'trendion_gutenberg_merge_styles' );
        }
    }
}

// Load required styles and scripts for Gutenberg Editor mode
if ( ! function_exists( 'trendion_gutenberg_editor_scripts' ) ) {
    add_action( 'enqueue_block_editor_assets', 'trendion_gutenberg_editor_scripts');
    function trendion_gutenberg_editor_scripts() {
        // Editor styles 
        wp_enqueue_style( 'trendion-gutenberg', trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/gutenberg/gutenberg.css' ), array(), null );
    }
}