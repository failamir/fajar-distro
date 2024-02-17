<?php
/**
 * The template to display the site logo in the footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

// Logo
if ( trendion_is_on( trendion_get_theme_option( 'logo_in_footer' ) ) ) {
	$trendion_logo_image = trendion_get_logo_image( 'footer' );
	$trendion_logo_text  = get_bloginfo( 'name' );
	if ( ! empty( $trendion_logo_image['logo'] ) || ! empty( $trendion_logo_text ) ) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if ( ! empty( $trendion_logo_image['logo'] ) ) {
					$trendion_attr = trendion_getimagesize( $trendion_logo_image['logo'] );
					echo '<a href="' . esc_url( home_url( '/' ) ) . '">'
							. '<img src="' . esc_url( $trendion_logo_image['logo'] ) . '"'
								. ( ! empty( $trendion_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $trendion_logo_image['logo_retina'] ) . ' 2x"' : '' )
								. ' class="logo_footer_image"'
								. ' alt="' . esc_attr__( 'Site logo', 'trendion' ) . '"'
								. ( ! empty( $trendion_attr[3] ) ? ' ' . wp_kses_data( $trendion_attr[3] ) : '' )
							. '>'
						. '</a>';
				} elseif ( ! empty( $trendion_logo_text ) ) {
					echo '<h1 class="logo_footer_text">'
							. '<a href="' . esc_url( home_url( '/' ) ) . '">'
								. esc_html( $trendion_logo_text )
							. '</a>'
						. '</h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
