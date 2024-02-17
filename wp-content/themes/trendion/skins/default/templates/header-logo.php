<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_args = get_query_var( 'trendion_logo_args' );

// Site logo
$trendion_logo_type   = isset( $trendion_args['type'] ) ? $trendion_args['type'] : '';
$trendion_logo_image  = trendion_get_logo_image( $trendion_logo_type );
$trendion_logo_text   = trendion_is_on( trendion_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$trendion_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $trendion_logo_image['logo'] ) || ! empty( $trendion_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $trendion_logo_image['logo'] ) ) {
			if ( empty( $trendion_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric( $trendion_logo_image['logo'] ) && $trendion_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$trendion_attr = trendion_getimagesize( $trendion_logo_image['logo'] );
				echo '<img src="' . esc_url( $trendion_logo_image['logo'] ) . '"'
						. ( ! empty( $trendion_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $trendion_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $trendion_logo_text ) . '"'
						. ( ! empty( $trendion_attr[3] ) ? ' ' . wp_kses_data( $trendion_attr[3] ) : '' )
						. '>';
			}
		} else {
			trendion_show_layout( trendion_prepare_macros( $trendion_logo_text ), '<span class="logo_text">', '</span>' );
			trendion_show_layout( trendion_prepare_macros( $trendion_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
