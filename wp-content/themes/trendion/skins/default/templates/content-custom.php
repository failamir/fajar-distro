<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRENDION
 * @since TRENDION 1.0.50
 */

$trendion_template_args = get_query_var( 'trendion_template_args' );
if ( is_array( $trendion_template_args ) ) {
	$trendion_columns       = empty( $trendion_template_args['columns'] ) ? 2 : max( 1, $trendion_template_args['columns'] );
	$trendion_blog_style    = array( $trendion_template_args['type'], $trendion_columns );
	$trendion_columns_class = trendion_get_column_class( 1, $trendion_columns, ! empty( $trendion_template_args['columns_tablet']) ? $trendion_template_args['columns_tablet'] : '', ! empty($trendion_template_args['columns_mobile']) ? $trendion_template_args['columns_mobile'] : '' );
} else {
	$trendion_blog_style    = explode( '_', trendion_get_theme_option( 'blog_style' ) );
	$trendion_columns       = empty( $trendion_blog_style[1] ) ? 2 : max( 1, $trendion_blog_style[1] );
	$trendion_columns_class = trendion_get_column_class( 1, $trendion_columns );
}
$trendion_blog_id       = trendion_get_custom_blog_id( join( '_', $trendion_blog_style ) );
$trendion_blog_style[0] = str_replace( 'blog-custom-', '', $trendion_blog_style[0] );
$trendion_expanded      = ! trendion_sidebar_present() && trendion_get_theme_option( 'expand_content' ) == 'expand';
$trendion_components    = ! empty( $trendion_template_args['meta_parts'] )
							? ( is_array( $trendion_template_args['meta_parts'] )
								? join( ',', $trendion_template_args['meta_parts'] )
								: $trendion_template_args['meta_parts']
								)
							: trendion_array_get_keys_by_value( trendion_get_theme_option( 'meta_parts' ) );
$trendion_post_format   = get_post_format();
$trendion_post_format   = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );

$trendion_blog_meta     = trendion_get_custom_layout_meta( $trendion_blog_id );
$trendion_custom_style  = ! empty( $trendion_blog_meta['scripts_required'] ) ? $trendion_blog_meta['scripts_required'] : 'none';

if ( ! empty( $trendion_template_args['slider'] ) || $trendion_columns > 1 || ! trendion_is_off( $trendion_custom_style ) ) {
	?><div class="<?php
		if ( ! empty( $trendion_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo esc_attr( trendion_is_off( $trendion_custom_style )
							? $trendion_columns_class
							: sprintf( '%1$s_item %1$s_item-1_%2$d', $trendion_custom_style, $trendion_columns )
							);
		}
	?>">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_item_container post_format_' . esc_attr( $trendion_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $trendion_columns )
					. ' post_layout_' . esc_attr( $trendion_blog_style[0] )
					. ' post_layout_' . esc_attr( $trendion_blog_style[0] ) . '_' . esc_attr( $trendion_columns )
					. ( ! trendion_is_off( $trendion_custom_style )
						? ' post_layout_' . esc_attr( $trendion_custom_style )
							. ' post_layout_' . esc_attr( $trendion_custom_style ) . '_' . esc_attr( $trendion_columns )
						: ''
						)
		);
	trendion_add_blog_animation( $trendion_template_args );
	?>
>
	<?php
	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	// Custom layout
	do_action( 'trendion_action_show_layout', $trendion_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $trendion_template_args['slider'] ) || $trendion_columns > 1 || ! trendion_is_off( $trendion_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
