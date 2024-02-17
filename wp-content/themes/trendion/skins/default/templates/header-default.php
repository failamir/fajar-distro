<?php
/**
 * The template to display default site header
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_header_css   = '';
$trendion_header_image = get_header_image();
$trendion_header_video = trendion_get_header_video();
if ( ! empty( $trendion_header_image ) && trendion_trx_addons_featured_image_override( is_singular() || trendion_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$trendion_header_image = trendion_get_current_mode_image( $trendion_header_image );
}
?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $trendion_header_image ) || ! empty( $trendion_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $trendion_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $trendion_header_image ) {
		echo ' ' . esc_attr( trendion_add_inline_css_class( 'background-image: url(' . esc_url( $trendion_header_image ) . ');' ) );
	}
	if ( is_singular() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( trendion_is_on( trendion_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight trendion-full-height';
	}
	$trendion_header_scheme = trendion_get_theme_option( 'header_scheme' );
	if ( ! empty( $trendion_header_scheme ) && ! trendion_is_inherit( $trendion_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $trendion_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $trendion_header_video ) ) {
		get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-navi' ) );

	// Mobile header
	if ( trendion_is_on( trendion_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	if ( ! is_single() ) {
		get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-title' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
