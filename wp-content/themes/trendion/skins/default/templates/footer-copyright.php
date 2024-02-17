<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$trendion_copyright_scheme = trendion_get_theme_option( 'copyright_scheme' );
if ( ! empty( $trendion_copyright_scheme ) && ! trendion_is_inherit( $trendion_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $trendion_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$trendion_copyright = trendion_get_theme_option( 'copyright' );
			if ( ! empty( $trendion_copyright ) ) {
				$trendion_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $trendion_copyright );
				$trendion_copyright = trendion_prepare_macros( $trendion_copyright );
				// Display copyright
				echo wp_kses( nl2br( $trendion_copyright ), 'trendion_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
