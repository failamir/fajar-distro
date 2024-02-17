<?php
// Add theme-specific CSS-animations
if ( ! function_exists( 'trendion_elm_add_theme_animations' ) ) {
	add_filter( 'elementor/controls/animations/additional_animations', 'trendion_elm_add_theme_animations' );
	function trendion_elm_add_theme_animations( $animations ) {
		/* To add a theme-specific animations to the list:
			1) Merge to the array 'animations': array(
													esc_html__( 'Theme Specific', 'trendion' ) => array(
														'ta_custom_1' => esc_html__( 'Custom 1', 'trendion' )
													)
												)
			2) Add a CSS rules for the class '.ta_custom_1' to create a custom entrance animation
		*/
		$animations = array_merge(
						$animations,
						array(
							esc_html__( 'Theme Specific', 'trendion' ) => array(
																			'ta_fadeinup'     => esc_html__( 'Fade In Up (Short)', 'trendion' ),
																			'ta_fadeinright'  => esc_html__( 'Fade In Right (Short)', 'trendion' ),
																			'ta_fadeinleft'   => esc_html__( 'Fade In Left (Short)', 'trendion' ),
																			'ta_fadeindown'   => esc_html__( 'Fade In Down (Short)', 'trendion' ),
																			'ta_fadein'       => esc_html__( 'Fade In (Short)', 'trendion' ),
																			'ta_under_strips' => esc_html__( 'Under strips', 'trendion' ),
																			'ta_mouse_wheel' => esc_html__( 'Mouse Wheel', 'trendion' ),
																			'blogger_coverbg_parallax' => esc_html__( 'Only Blogger cover image parallax', 'trendion' ),
																			)
							)
						);
		return $animations;
	}
}
