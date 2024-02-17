<?php
/* Powerkit support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'trendion_skin_powerkit_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'trendion_skin_powerkit_theme_setup9', 9 );
    function trendion_skin_powerkit_theme_setup9() {
        if ( trendion_exists_powerkit() ) {
            add_action( 'wp_enqueue_scripts', 'trendion_powerkit_frontend_scripts', 1100 );
            add_filter( 'trendion_filter_merge_styles', 'trendion_powerkit_merge_styles' );
        }
    }
}

// Set plugin's specific importer options
if ( !function_exists( 'trendion_exists_powerkit_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',    'trendion_exists_powerkit_importer_set_options' );
    function trendion_exists_powerkit_importer_set_options($options=array()) {   
        if ( trendion_exists_powerkit() && in_array('accelerated-mobile-pages', $options['required_plugins']) ) {
            $options['additional_options'][]    = 'powerkit_%';                   
        }
        return $options;
    }
}

// Video cover image size
if ( ! function_exists( 'trendion_powerkit_social_links_color_schemes' ) ) {
    add_filter( 'powerkit_social_links_color_schemes', 'trendion_powerkit_social_links_color_schemes' );
    function trendion_powerkit_social_links_color_schemes($schemes) {    
        $schemes = array(
            'default'         => array(
                'name' => esc_html__('Default', 'trendion')
            ),
            'rounded'         => array(
                'name' => esc_html__('Rounded', 'trendion')
            ),
            'rounded_border'         => array(
                'name' => esc_html__('Rounded with border', 'trendion')
            ),
            'square'         => array(
                'name' => esc_html__('Square', 'trendion')
            ),
            'square_border'         => array(
                'name' => esc_html__('Square with border', 'trendion')
            ),
        );
        return $schemes;
    }
}

// Twitter avatar
if ( ! function_exists( 'trendion_powerkit_lazy_process_images' ) ) {
    add_filter( 'powerkit_lazy_process_images', 'trendion_powerkit_lazy_process_images', 20 );
    function trendion_powerkit_lazy_process_images($image_avatar) {  
        $image_avatar = str_replace('_normal', '', $image_avatar);
        return $image_avatar;
    }
}


// Change thumb size for Author Widget (Powerkit)
if ( ! function_exists( 'trendion_powerkit_widget_author_avatar_size' ) ) {
    add_filter( 'powerkit_widget_author_avatar_size', 'trendion_powerkit_widget_author_avatar_size');
    function trendion_powerkit_widget_author_avatar_size() {
        return '410';
    }
}

// Change title tag for Author Widget (Powerkit)
if ( ! function_exists( 'trendion_powerkit_widget_author_title_tag' ) ) {
    add_filter( 'powerkit_widget_author_title_tag', 'trendion_powerkit_widget_author_title_tag');
    function trendion_powerkit_widget_author_title_tag() {
        return 'h4';
    }
}

// Enqueue custom scripts
if ( ! function_exists( 'trendion_powerkit_frontend_scripts' ) ) {
    //Handler of the add_action( 'wp_enqueue_scripts', 'trendion_powerkit_frontend_scripts', 1100 );
    function trendion_powerkit_frontend_scripts( $force = false ) {
        static $loaded = false;
        if ( ! $loaded ) {
            $loaded = true;
            $trendion_url = trendion_get_file_url( 'plugins/powerkit/powerkit.css' );
            if ( '' != $trendion_url ) {
                wp_enqueue_style( 'trendion-powerkit', $trendion_url, array(), null );
            }
        }
    }
}

// Merge custom styles
if ( ! function_exists( 'trendion_powerkit_merge_styles' ) ) {
    add_filter('trendion_filter_merge_styles', 'trendion_powerkit_merge_styles');
    function trendion_powerkit_merge_styles( $list ) {
        $list[] = 'plugins/powerkit/powerkit.css';
        return $list;
    }
}