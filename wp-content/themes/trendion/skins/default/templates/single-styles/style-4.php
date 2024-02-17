<?php
/**
 * The "Style 4" template to display the post header of the single post or attachment:
 * featured image placed in the post header and title placed inside content
 *
 * @package TRENDION
 * @since TRENDION 1.75.0
 */

if ( apply_filters( 'trendion_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
	$trendion_post_format = str_replace( 'post-format-', '', get_post_format() );
	// Featured image
	ob_start();
	trendion_show_post_featured_image( array(
		'thumb_bg'  => true,
		'popup'    => true,
		'class_avg' => in_array( $trendion_post_format, array( 'video' ) ) ? 'content_wrap' : '',
	) );
	$trendion_post_header = ob_get_contents();
	ob_end_clean();
	$trendion_with_featured_image = trendion_is_with_featured_image( $trendion_post_header );

	if ( strpos( $trendion_post_header, 'post_featured' ) !== false ) {
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( trendion_get_theme_option( 'single_style' ) );
			if ( $trendion_with_featured_image ) {
				echo ' with_featured_image';
			}
		?>">
			<?php
			trendion_show_layout( $trendion_post_header );
			?>
		</div>
		<?php
	}
}
