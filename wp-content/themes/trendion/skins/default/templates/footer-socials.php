<?php
/**
 * The template to display the socials in the footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */


// Socials
if ( trendion_is_on( trendion_get_theme_option( 'socials_in_footer' ) ) ) {
	$trendion_output = trendion_get_socials_links();
	if ( '' != $trendion_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php trendion_show_layout( $trendion_output ); ?>
			</div>
		</div>
		<?php
	}
}
