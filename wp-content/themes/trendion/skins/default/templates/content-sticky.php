<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_columns     = max( 1, min( 3, count( get_option( 'sticky_posts' ) ) ) );
$trendion_post_format = get_post_format();
$trendion_post_format = empty( $trendion_post_format ) ? 'standard' : str_replace( 'post-format-', '', $trendion_post_format );

?><div class="column-1_<?php echo esc_attr( $trendion_columns ); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class( 'post_item post_layout_sticky post_format_' . esc_attr( $trendion_post_format ) );
	trendion_add_blog_animation( $trendion_template_args );
	?>
>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	trendion_show_post_featured(
		array(
			'thumb_size' => trendion_get_thumb_size( 1 == $trendion_columns ? 'big' : ( 2 == $trendion_columns ? 'med' : 'avatar' ) ),
		)
	);

	if ( ! in_array( $trendion_post_format, array( 'link', 'aside', 'status', 'quote' ) ) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			trendion_show_post_meta( apply_filters( 'trendion_filter_post_meta_args', array(), 'sticky', $trendion_columns ) );
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div><?php

// div.column-1_X is a inline-block and new lines and spaces after it are forbidden
