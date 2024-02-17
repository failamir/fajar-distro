<?php
/**
 * 'Band' template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRENDION
 * @since TRENDION 1.71.0
 */

$trendion_template_args = get_query_var( 'trendion_template_args' );

$trendion_columns       = 1;

$trendion_expanded      = ! trendion_sidebar_present() && trendion_get_theme_option( 'expand_content' ) == 'expand';

$trendion_post_format   = get_post_format();
$trendion_post_format   = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );

if ( is_array( $trendion_template_args ) ) {
	$trendion_columns    = empty( $trendion_template_args['columns'] ) ? 1 : max( 1, $trendion_template_args['columns'] );
	$trendion_blog_style = array( $trendion_template_args['type'], $trendion_columns );
	if ( ! empty( $trendion_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide"><?php
	} elseif ( $trendion_columns > 1 ) {
		$trendion_columns_class = trendion_get_column_class( 1, $trendion_columns, ! empty( $trendion_template_args['columns_tablet']) ? $trendion_template_args['columns_tablet'] : '', ! empty($trendion_template_args['columns_mobile']) ? $trendion_template_args['columns_mobile'] : '' );
		?><div class="<?php echo esc_attr( $trendion_columns_class ); ?>"><?php
	}
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_band post_format_' . esc_attr( $trendion_post_format ) );
	trendion_add_blog_animation( $trendion_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$trendion_hover      = ! empty( $trendion_template_args['hover'] ) && ! trendion_is_inherit( $trendion_template_args['hover'] )
							? $trendion_template_args['hover']
							: trendion_get_theme_option( 'image_hover' );
	$trendion_components = ! empty( $trendion_template_args['meta_parts'] )
							? ( is_array( $trendion_template_args['meta_parts'] )
								? $trendion_template_args['meta_parts']
								: array_map( 'trim', explode( ',', $trendion_template_args['meta_parts'] ) )
								)
							: trendion_array_get_keys_by_value( trendion_get_theme_option( 'meta_parts' ) );

	$trendion_show_title = get_the_title() != '';
	$trendion_show_meta  = count( $trendion_components ) > 0 && ! in_array( $trendion_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	// Post date
	if ( $trendion_show_meta && in_array( 'date', $trendion_components ) ) {
		?>
		<div class="post_date_wrap">
			<div class="day"><?php echo esc_html(get_the_date('d')); ?></div>
			<?php			
			trendion_show_post_meta( apply_filters(
												'trendion_filter_post_meta_args',
												array(
													'components' => 'date',
													'date_format' => 'M Y',
													'seo'        => false,
													'echo'       => true,
													),
												'band', 0
												)
								);
			?>
		</div>
		<?php
		$trendion_components = trendion_array_delete_by_value( $trendion_components, 'date' );
	}

	// Featured image
	trendion_show_post_featured( apply_filters( 'trendion_filter_args_featured', 
		array(
			'no_links'   => ! empty( $trendion_template_args['no_links'] ),
			'hover'      => $trendion_hover,
			'meta_parts' => $trendion_components,
			'thumb_bg'   => true,
			'thumb_ratio' => $trendion_post_format == 'image' ? '16:9' : '1:1',
			'thumb_size' => trendion_get_thumb_size( 'big' )
		),
		'content-band',
		$trendion_template_args
	) );

	?><div class="post_content_wrap"><?php
		// Title and post meta
		if ( $trendion_show_title ) {
			?>
			<div class="post_header entry-header">
				<?php
				// Categories
				if ( apply_filters( 'trendion_filter_show_blog_categories', $trendion_show_meta && in_array( 'categories', $trendion_components ), array( 'categories' ), 'band' ) ) {
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
				if ( apply_filters( 'trendion_filter_show_blog_title', true, 'band' ) ) {
					do_action( 'trendion_action_before_post_title' );
					$trendion_title_tag = $trendion_post_format == 'image' && !is_archive() && !is_home() ? 'h3' : 'h4';
					if ( empty( $trendion_template_args['no_links'] ) ) {
						the_title( sprintf( '<'.esc_html($trendion_title_tag).' class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></'.esc_html($trendion_title_tag).'>' );
					} else {
						the_title( '<'.esc_html($trendion_title_tag).' class="post_title entry-title">', '</'.esc_html($trendion_title_tag).'>' );
					}
					do_action( 'trendion_action_after_post_title' );
				}
				?>
			</div><!-- .post_header -->
			<?php
		}

		// Post content
		if ( ! isset( $trendion_template_args['excerpt_length'] ) && ! in_array( $trendion_post_format, array( 'gallery', 'audio', 'video' ) ) ) {
			$trendion_template_args['excerpt_length'] = 30;
		}
		if ( apply_filters( 'trendion_filter_show_blog_excerpt', empty( $trendion_template_args['hide_excerpt'] ) && trendion_get_theme_option( 'excerpt_length' ) > 0, 'band' ) ) {
			?>
			<div class="post_content entry-content">
				<?php
				// Post content area
				trendion_show_post_content( $trendion_template_args, '<div class="post_content_inner">', '</div>' );
				?>
			</div><!-- .entry-content -->
			<?php
		}
		// Post meta
		if ( apply_filters( 'trendion_filter_show_blog_meta', $trendion_show_meta, $trendion_components, 'band' ) ) {
			if ( count( $trendion_components ) > 0 ) {
				do_action( 'trendion_action_before_post_meta' );
				trendion_show_post_meta(
					apply_filters(
						'trendion_filter_post_meta_args', array(
							'components' => join( ',', $trendion_components ),
							'seo'        => false,
							'echo'       => true,
						), 'band', 1
					)
				);
				do_action( 'trendion_action_after_post_meta' );
			}
		}
		// More button
		if ( apply_filters( 'trendion_filter_show_blog_readmore', true, 'band' ) ) {
			if ( empty( $trendion_template_args['no_links'] ) ) {
				do_action( 'trendion_action_before_post_readmore' ); ?>
				<a class="sc_button sc_button_simple color_style_1" href="<?php echo esc_url( get_permalink() ); ?>">
					<span class="icon"></span>
				</a><?php
				do_action( 'trendion_action_after_post_readmore' );
			}
		}
		?>
	</div>
</article>
<?php

if ( is_array( $trendion_template_args ) ) {
	if ( ! empty( $trendion_template_args['slider'] ) || $trendion_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
