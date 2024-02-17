<?php
/**
 * The "Style 1" template to display the post header of the single post or attachment:
 * featured image and title placed in the post header
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
		'popup'     => true,
		'class_avg' => in_array( $trendion_post_format, array( 'video' ) ) ? 'content_wrap' : '',
	) );
	$trendion_post_header = ob_get_contents();
	ob_end_clean();

	// Remove video hover
	preg_match( '/(<div class="post_video_hover).*(<\/a><\/div>)/', $trendion_post_header, $matches );
	$video_hover = $matches ? $matches[0] : '';
	if ( !empty($video_hover) ) {
		$trendion_post_header = str_replace( $video_hover, '', $trendion_post_header );
	}

	$trendion_with_featured_image = trendion_is_with_featured_image( $trendion_post_header );
	// Post title and meta
	ob_start();
	trendion_sc_layouts_showed('title', false);
	trendion_show_post_title_and_meta( array(
										'content_wrap'  => true,
										'author_avatar' => true,
										'show_labels'   => false,
										'add_spaces'    => true,
										)
									);
	$trendion_post_header .= ob_get_contents();
	ob_end_clean();

	if ( strpos( $trendion_post_header, 'post_featured' ) !== false
		|| strpos( $trendion_post_header, 'post_title' ) !== false
		|| strpos( $trendion_post_header, 'post_meta' ) !== false
	) {
		do_action( 'trendion_action_before_post_header' );
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( trendion_get_theme_option( 'single_style' ) );
			if ( $trendion_with_featured_image ) {
				echo ' with_featured_image';
			}
		?>">
			<?php
			// Add video hover
			if ( is_singular() && get_post_format() == 'video') {
				$trendion_post_header = str_replace( '<div class="post_video_hover hide"></div>', $video_hover, $trendion_post_header );
			}
			trendion_show_layout( $trendion_post_header );
			?>
		</div>
		<?php
		do_action( 'trendion_action_after_post_header' );
	}
}
