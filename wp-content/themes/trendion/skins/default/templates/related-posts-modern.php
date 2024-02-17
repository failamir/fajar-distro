<?php
/**
 * The template 'Style 1' to displaying related posts
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_link        = get_permalink();
$trendion_post_format = get_post_format();
$trendion_post_format = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $trendion_post_format ) ); ?> data-post-id="<?php the_ID(); ?>">
	<?php
	trendion_show_post_featured(
		array(
			'thumb_size'    => apply_filters( 'trendion_filter_related_thumb_size', trendion_get_thumb_size( (int) trendion_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
			'post_info'     => '<div class="post_header entry-header">'
									. '<div class="post_categories">' . wp_kses( trendion_get_post_categories( '' ), 'trendion_kses_content' ) . '</div>'
									. '<h6 class="post_title entry-title"><a href="' . esc_url( $trendion_link ) . '">'
										. wp_kses_data( '' == get_the_title() ? esc_html__( '- No title -', 'trendion' ) : get_the_title() )
									. '</a></h6>'
									. ( in_array( get_post_type(), array( 'post', 'attachment' ) )
											? '<div class="post_meta"><a href="' . esc_url( $trendion_link ) . '" class="post_meta_item post_date">' . wp_kses_data( trendion_get_date() ) . '</a></div>'
											: '' )
								. '</div>',
		)
	);
	?>
</div>
