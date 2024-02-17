<?php
/**
 * The template to display the background video in the header
 *
 * @package TRENDION
 * @since TRENDION 1.0.14
 */
$trendion_header_video = trendion_get_header_video();
$trendion_embed_video  = '';
if ( ! empty( $trendion_header_video ) && ! trendion_is_from_uploads( $trendion_header_video ) ) {
	if ( trendion_is_youtube_url( $trendion_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $trendion_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php trendion_show_layout( trendion_get_embed_video( $trendion_header_video ) ); ?></div>
		<?php
	}
}
