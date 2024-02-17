<?php
// Add plugin-specific colors and fonts to the custom CSS
if ( ! function_exists( 'trendion_cf7_get_css' ) ) {
	add_filter( 'trendion_filter_get_css', 'trendion_cf7_get_css', 10, 2 );
	function trendion_cf7_get_css( $css, $args ) {
		if ( isset( $css['fonts'] ) && isset( $args['fonts'] ) ) {
			$fonts         = $args['fonts'];
			$css['fonts'] .= <<<CSS
		span.wpcf7-not-valid-tip,
		div.wpcf7-response-output {
			{$fonts['h5_font-family']}
		}

CSS;
		}

		return $css;
	}
}

