<?php
/**
 * The template to display default site footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

?>
<footer class="footer_wrap footer_default
<?php
$trendion_footer_scheme = trendion_get_theme_option( 'footer_scheme' );
$trendion_footer_scheme = trendion_is_woocommerce_page() ? trendion_get_theme_option( 'woo_footer_scheme' ) : $trendion_footer_scheme;
if ( ! empty( $trendion_footer_scheme ) && ! trendion_is_inherit( $trendion_footer_scheme  ) ) {
	echo ' scheme_' . esc_attr( $trendion_footer_scheme );
}
?>
				">
	<?php

	// Footer widgets area
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/footer-widgets' ) );

	// Logo
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/footer-logo' ) );

	// Socials
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/footer-socials' ) );

	// Menu
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/footer-menu' ) );

	// Copyright area
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/footer-copyright' ) );

	?>
</footer><!-- /.footer_wrap -->
