<?php
/**
 * The "Style 15" template to display the post header of the single post or attachment:
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
										'author_avatar' => true,
										'show_labels'   => false,
										'add_spaces'    => true,
										)
									);
	do_action( 'trendion_action_after_post_header' );
	$trendion_post_header = ob_get_contents();
	ob_end_clean();

	if ( strpos( $trendion_post_header, 'post_title' ) !== false
		|| strpos( $trendion_post_header, 'post_meta' ) !== false
	) {
		?>
		<div class="post_header_wrap post_header_wrap_in_header post_header_wrap_style_<?php
			echo esc_attr( trendion_get_theme_option( 'single_style' ) );
		?>"><?php
				trendion_show_layout( $trendion_post_header );
			?>
		</div>
		<?php
	}
}
