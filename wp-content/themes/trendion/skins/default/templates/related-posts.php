<?php
/**
 * The default template to displaying related posts
 *
 * @package TRENDION
 * @since TRENDION 1.0.54
 */

$trendion_link        = get_permalink();
$trendion_post_format = get_post_format();
$trendion_post_format = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $trendion_post_format ) ); ?> data-post-id="<?php the_ID(); ?>">
	<?php
	trendion_show_post_featured(
		array(
			'thumb_size' => apply_filters( 'trendion_filter_related_thumb_size', trendion_get_thumb_size( (int) trendion_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $trendion_link ); ?>"><?php
			if ( '' == get_the_title() ) {
				esc_html_e( '- No title -', 'trendion' );
			} else {
				the_title();
			}
		?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<span class="post_date"><a href="<?php echo esc_url( $trendion_link ); ?>"><?php echo wp_kses_data( trendion_get_date() ); ?></a></span>
			<?php
		}
		?>
	</div>
</div>
