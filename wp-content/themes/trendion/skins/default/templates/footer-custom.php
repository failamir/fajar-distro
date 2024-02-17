<?php
/**
 * The template to display default site footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

$trendion_footer_id = trendion_get_custom_footer_id();
$trendion_footer_meta = trendion_get_custom_layout_meta( $trendion_footer_id );
if ( ! empty( $trendion_footer_meta['margin'] ) ) {
	trendion_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( trendion_prepare_css_value( $trendion_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $trendion_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $trendion_footer_id ) ) ); ?>
						<?php
						$trendion_footer_scheme = trendion_get_theme_option( 'footer_scheme' );
						$trendion_footer_scheme = trendion_is_woocommerce_page() ? 
													( ( empty(trendion_get_theme_option( 'woo_footer_scheme' ) ) || trendion_get_theme_option( 'woo_footer_scheme' ) === 'inherit') ? 
														$trendion_footer_scheme 
														: trendion_get_theme_option( 'woo_footer_scheme' ) ) 
													: $trendion_footer_scheme;
						if ( ! empty( $trendion_footer_scheme ) && ! trendion_is_inherit( $trendion_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $trendion_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'trendion_action_show_layout', $trendion_footer_id );
	?>
</footer><!-- /.footer_wrap -->
