<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package TRENDION
 * @since TRENDION 1.0.06
 */

$trendion_header_css   = '';
$trendion_header_image = get_header_image();
$trendion_header_video = trendion_get_header_video();
if ( ! empty( $trendion_header_image ) && trendion_trx_addons_featured_image_override( is_singular() || trendion_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$trendion_header_image = trendion_get_current_mode_image( $trendion_header_image );
}

$trendion_header_id = trendion_get_custom_header_id();
$trendion_header_meta = trendion_get_custom_layout_meta( $trendion_header_id );
if ( ! empty( $trendion_header_meta['margin'] ) ) {
	trendion_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( trendion_prepare_css_value( $trendion_header_meta['margin'] ) ) ) );
	trendion_storage_set( 'custom_header_margin', trendion_prepare_css_value( $trendion_header_meta['margin'] ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $trendion_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $trendion_header_id ) ) ); ?>
				<?php
				echo ! empty( $trendion_header_image ) || ! empty( $trendion_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
				if ( '' != $trendion_header_video ) {
					echo ' with_bg_video';
				}
				if ( '' != $trendion_header_image ) {
					echo ' ' . esc_attr( trendion_add_inline_css_class( 'background-image: url(' . esc_url( $trendion_header_image ) . ');' ) );
				}
				if ( is_single() && has_post_thumbnail() ) {
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

	// Custom header's layout
	do_action( 'trendion_action_show_layout', $trendion_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
