<?php
/**
 * The "Style 6" template to display the post header of the single post or attachment:
 * featured image and title placed in the post header
 *
 * @package TRENDION
 * @since TRENDION 1.75.0
 */

if ( apply_filters( 'trendion_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {
	$trendion_post_format = str_replace( 'post-format-', '', get_post_format() );
	ob_start();
	// Post title and meta
	do_action( 'trendion_action_before_post_header' );
	trendion_sc_layouts_showed('title', false);
	trendion_show_post_title_and_meta( array(
										'show_meta'    => false,
										)
									);
	do_action( 'trendion_action_after_post_header' );
	$trendion_post_header = ob_get_contents();
	ob_end_clean();
	// Featured image
	ob_start();
	trendion_show_post_featured_image( array(
		'thumb_bg'  => false,
		'popup'    => true,
	) );
	$trendion_post_header .= ob_get_contents();
	ob_end_clean();
	$trendion_with_featured_image = trendion_is_with_featured_image( $trendion_post_header );

	if ( strpos( $trendion_post_header, 'post_featured' ) !== false
		|| strpos( $trendion_post_header, 'post_title' ) !== false
		|| strpos( $trendion_post_header, 'post_meta' ) !== false
	) {
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