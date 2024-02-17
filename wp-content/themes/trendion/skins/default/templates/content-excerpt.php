<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_template_args = get_query_var( 'trendion_template_args' );
$trendion_columns = 1;
if ( is_array( $trendion_template_args ) ) {
	$trendion_columns    = empty( $trendion_template_args['columns'] ) ? 1 : max( 1, $trendion_template_args['columns'] );
	$trendion_blog_style = array( $trendion_template_args['type'], $trendion_columns );
	if ( ! empty( $trendion_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $trendion_columns > 1 ) {
		$trendion_columns_class = trendion_get_column_class( 1, $trendion_columns, ! empty( $trendion_template_args['columns_tablet']) ? $trendion_template_args['columns_tablet'] : '', ! empty($trendion_template_args['columns_mobile']) ? $trendion_template_args['columns_mobile'] : '' );
		?>
		<div class="<?php echo esc_attr( $trendion_columns_class ); ?>">
		<?php
	}
}
$trendion_expanded    = ! trendion_sidebar_present() && trendion_get_theme_option( 'expand_content' ) == 'expand';
$trendion_post_format = get_post_format();
$trendion_post_format = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_excerpt post_format_' . esc_attr( $trendion_post_format ) );
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
								: array_map( 'trim', explode( ',', $trendion_template_args['meta_parts'] ) )
								)
							: trendion_array_get_keys_by_value( trendion_get_theme_option( 'meta_parts' ) );
	trendion_show_post_featured( apply_filters( 'trendion_filter_args_featured',
		array(
			'no_links'   => ! empty( $trendion_template_args['no_links'] ),
			'hover'      => $trendion_hover,
			'meta_parts' => $trendion_components,
			'thumb_size' => trendion_get_thumb_size( strpos( trendion_get_theme_option( 'body_style' ), 'full' ) !== false
								? 'full'
								: ( $trendion_expanded 
									? 'huge' 
									: 'big' 
									)
								),
		),
		'content-excerpt',
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
			if ( apply_filters( 'trendion_filter_show_blog_categories', $trendion_show_meta && in_array( 'categories', $trendion_components ), array( 'categories' ), 'excerpt' ) ) {
				do_action( 'trendion_action_before_post_category' );
				?>
				<div class="post_category"><?php
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
				?></div>
				<?php
				$trendion_components = trendion_array_delete_by_value( $trendion_components, 'categories' );
				do_action( 'trendion_action_after_post_category' );
			}
			// Post title
			if ( apply_filters( 'trendion_filter_show_blog_title', true, 'excerpt' ) ) {
				$post_title_tag = $trendion_columns > 6 ? 'h6' : 'h' . $trendion_columns;
				do_action( 'trendion_action_before_post_title' );
				if ( empty( $trendion_template_args['no_links'] ) ) {
					the_title( sprintf( '<'.esc_html($post_title_tag).' class="post_title entry-title'.($post_title_tag == 'h1' ? ' h1' : '').'"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></'.esc_html($post_title_tag).'>' );
				} else {
					the_title( '<'.esc_html($post_title_tag).' class="post_title entry-title">', '</'.esc_html($post_title_tag).'>' );
				}
				do_action( 'trendion_action_after_post_title' );
			}
			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	?><div class="post_content entry-content">
		<?php
		if ( apply_filters( 'trendion_filter_show_blog_excerpt', empty( $trendion_template_args['hide_excerpt'] ) && trendion_get_theme_option( 'excerpt_length' ) > 0, 'excerpt' ) ) {
			if ( trendion_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'trendion_action_before_full_post_content' );
					the_content( '' );
					do_action( 'trendion_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'trendion' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'trendion' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				trendion_show_post_content( $trendion_template_args, '<div class="post_content_inner">', '</div>' );
			}
		}

		// Post meta
		if ( apply_filters( 'trendion_filter_show_blog_meta', $trendion_show_meta, $trendion_components, 'excerpt' ) ) {
			if ( count( $trendion_components ) > 0 ) {
				do_action( 'trendion_action_before_post_meta' );
				trendion_show_post_meta(
					apply_filters(
						'trendion_filter_post_meta_args', array(
							'components' => join( ',', $trendion_components ),
							'seo'        => false,
							'echo'       => true,
						), 'excerpt', 1
					)
				);
				do_action( 'trendion_action_after_post_meta' );
			}
		}

		// More button
		if ( apply_filters( 'trendion_filter_show_blog_readmore', true, 'excerpt' ) ) {
			if ( empty( $trendion_template_args['no_links'] ) ) {
				do_action( 'trendion_action_before_post_readmore' );
				if ( trendion_get_theme_option( 'blog_content' ) != 'fullpost' ) {
					trendion_show_post_more_link( $trendion_template_args, '<p>', '</p>' );
				} else {
					trendion_show_post_comments_link( $trendion_template_args, '<p>', '</p>' );
				}
				do_action( 'trendion_action_after_post_readmore' );
			}
		}
		?>
	</div><!-- .entry-content -->
</article>
<?php

if ( is_array( $trendion_template_args ) ) {
	if ( ! empty( $trendion_template_args['slider'] ) || $trendion_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
