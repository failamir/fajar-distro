<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRENDION
 * @since TRENDION 1.0
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
$trendion_expanded   = ! trendion_sidebar_present() && trendion_get_theme_option( 'expand_content' ) == 'expand';

$trendion_post_format = get_post_format();
$trendion_post_format = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );

?><div class="<?php
	if ( ! empty( $trendion_template_args['slider'] ) ) {
		echo ' slider-slide swiper-slide';
	} else {
		echo ( trendion_is_blog_style_use_masonry( $trendion_blog_style[0] )
			? 'masonry_item masonry_item-1_' . esc_attr( $trendion_columns )
			: esc_attr( $trendion_columns_class )
			);
	}
?>"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $trendion_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $trendion_columns )
				. ' post_layout_' . esc_attr( $trendion_blog_style[0] )
				. ' post_layout_' . esc_attr( $trendion_blog_style[0] ) . '_' . esc_attr( $trendion_columns )
	);
	trendion_add_blog_animation( $trendion_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$trendion_hover      = ! empty( $trendion_template_args['hover'] ) && ! trendion_is_inherit( $trendion_template_args['hover'] )
							? $trendion_template_args['hover']
							: trendion_get_theme_option( 'image_hover' );

	$trendion_components = ! empty( $trendion_template_args['meta_parts'] )
							? ( is_array( $trendion_template_args['meta_parts'] )
								? $trendion_template_args['meta_parts']
								: explode( ',', $trendion_template_args['meta_parts'] )
								)
							: trendion_array_get_keys_by_value( trendion_get_theme_option( 'meta_parts' ) );

	trendion_show_post_featured( apply_filters( 'trendion_filter_args_featured',
		array(
			'thumb_size' => trendion_get_thumb_size(
				'classic' == $trendion_blog_style[0]
						? ( strpos( trendion_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $trendion_columns > 2 ? 'big' : 'huge' )
								: ( $trendion_columns > 2
									? ( $trendion_expanded ? 'med' : 'small' )
									: ( $trendion_expanded ? 'big' : 'med' )
									)
							)
						: ( strpos( trendion_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $trendion_columns > 2 ? 'masonry-big' : 'full' )
								: ( $trendion_columns <= 2 && $trendion_expanded ? 'masonry-big' : 'masonry' )
							)
			),
			'hover'      => $trendion_hover,
			'meta_parts' => $trendion_components,
			'no_links'   => ! empty( $trendion_template_args['no_links'] ),
		),
		'content-classic',
		$trendion_template_args
	) );

	// Title and post meta
	$trendion_show_title = get_the_title() != '';
	$trendion_show_meta  = count( $trendion_components ) > 0 && ! in_array( $trendion_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $trendion_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Categories
			if ( apply_filters( 'trendion_filter_show_blog_categories', $trendion_show_meta && in_array( 'categories', $trendion_components ), array( 'categories' ), 'classic' ) ) {
				do_action( 'trendion_action_before_post_category' );
				?>
				<div class="post_category">
					<?php
					trendion_show_post_meta( apply_filters(
														'trendion_filter_post_meta_args',
														array(
															'components' => 'categories',
															'seo'        => false,
															'echo'       => true,
															),
														'hover_' . $trendion_hover, 1
														)
										);
					?>
				</div>
				<?php
				$trendion_components = trendion_array_delete_by_value( $trendion_components, 'categories' );
				do_action( 'trendion_action_after_post_category' );
			}
			// Post title
			if ( apply_filters( 'trendion_filter_show_blog_title', true, 'classic' ) ) {
				do_action( 'trendion_action_before_post_title' );
				if ( empty( $trendion_template_args['no_links'] ) ) {
					the_title( sprintf( '<h5 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
				} else {
					the_title( '<h5 class="post_title entry-title">', '</h5>' );
				}
				do_action( 'trendion_action_after_post_title' );
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}

	// Post content
	ob_start();
	if ( apply_filters( 'trendion_filter_show_blog_excerpt', empty( $trendion_template_args['hide_excerpt'] ) && trendion_get_theme_option( 'excerpt_length' ) > 0, 'classic' ) ) {
		trendion_show_post_content( $trendion_template_args, '<div class="post_content_inner">', '</div>' );
	}
	$trendion_content = ob_get_contents();
	ob_end_clean();

	trendion_show_layout( $trendion_content, '<div class="post_content entry-content">', '</div><!-- .entry-content -->' );

	// Post meta
	if ( apply_filters( 'trendion_filter_show_blog_meta', $trendion_show_meta, $trendion_components, 'classic' ) ) {
		if ( count( $trendion_components ) > 0 ) {
			do_action( 'trendion_action_before_post_meta' );
			trendion_show_post_meta(
				apply_filters(
					'trendion_filter_post_meta_args', array(
						'components' => join( ',', $trendion_components ),
						'seo'        => false,
						'echo'       => true,
						'author_avatar'   => false,
					), $trendion_blog_style[0], $trendion_columns
				)
			);
			do_action( 'trendion_action_after_post_meta' );
		}
	}
		
	// More button
	if ( apply_filters( 'trendion_filter_show_blog_readmore', ! $trendion_show_title || ! empty( $trendion_template_args['more_button'] ), 'classic' ) ) {
		if ( empty( $trendion_template_args['no_links'] ) ) {
			do_action( 'trendion_action_before_post_readmore' );
			trendion_show_post_more_link( $trendion_template_args, '<p>', '</p>' );
			do_action( 'trendion_action_after_post_readmore' );
		}
	}
	?>

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
