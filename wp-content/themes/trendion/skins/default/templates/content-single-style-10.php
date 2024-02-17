<?php
/**
 * The "Style 10" template to display the content of the single post or attachment:
 * featured image placed to the post header and title placed inside content
 *
 * @package TRENDION
 * @since TRENDION 1.75.0
 */
?>
<article id="post-<?php the_ID(); ?>"
	<?php
	post_class( 'post_item_single'
		. ' post_type_' . esc_attr( get_post_type() ) 
		. ' post_format_' . esc_attr( str_replace( 'post-format-', '', get_post_format() ) )
	);
	trendion_add_seo_itemprops();
	?>
>
<?php

	do_action( 'trendion_action_before_post_data' );

	trendion_add_seo_snippets();

	// Single post thumbnail and title	
	$trendion_sidebar_position = trendion_get_theme_option( 'sidebar_position' );
	$trendion_post_format = str_replace( 'post-format-', '', get_post_format() );
	if ( apply_filters( 'trendion_filter_single_post_header', is_singular( 'post' ) || is_singular( 'attachment' ) ) ) {	
		// Featured image
		ob_start();
		trendion_show_post_featured_image( array(
			'thumb_bg' => false,
			'class'    => 'alignwide',
			'popup'    => false,
			'thumb_ratio' => $trendion_post_format == 'gallery' ? '11:7' : '', 
		) );
		$trendion_post_header = ob_get_contents();
		ob_end_clean();
		$trendion_with_featured_image = trendion_is_with_featured_image( $trendion_post_header );
		// Post title and meta
		ob_start();
		do_action( 'trendion_action_before_post_header' );
		trendion_sc_layouts_showed('title', false);
		trendion_show_post_title_and_meta(
			array_merge( 
				array( 
					'author_avatar' => true,
					'show_labels'   => true,
					'add_spaces'    => true,
				),
				( 'hide' != $trendion_sidebar_position ? 
					array (
						'share_type'    => 'list',	// block - icons with bg, list - small icons without background
						'split_meta_by' => 'share'
					) : array(
						'split_meta_by' => 'comments'	
					)
				)
			) 
		);
		do_action( 'trendion_action_after_post_header' );
		$trendion_post_header .= ob_get_contents();
		ob_end_clean();

		if ( strpos( $trendion_post_header, 'post_featured' ) !== false
			|| strpos( $trendion_post_header, 'post_title' ) !== false
			|| strpos( $trendion_post_header, 'post_meta' ) !== false
		) {
			?>
			<div class="post_header_wrap post_header_wrap_in_content post_header_wrap_style_<?php
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

	do_action( 'trendion_action_before_post_content' );

	// Post content
	$trendion_content_single = trendion_get_theme_option( 'expand_content' );
	$trendion_vertical_content = ( 'narrow' == $trendion_content_single && 'hide' == $trendion_sidebar_position ? trendion_get_theme_option( 'post_vertical_content' ) : '');
	$trendion_share_position = trendion_array_get_keys_by_value( trendion_get_theme_option( 'share_position' ) );
	?>
	<div class="post_content post_content_single entry-content<?php
		if ( in_array( 'left', $trendion_share_position ) ) {
			echo ' post_info_vertical_present' . ( in_array( 'top', $trendion_share_position ) ? ' post_info_vertical_hide_on_mobile' : '' );
		}
	?>" itemprop="mainEntityOfPage">
		<?php
		if ( in_array( 'left', $trendion_share_position ) || !empty($trendion_vertical_content) ) {
			?><div class="post_info_vertical"><?php
				if ( in_array( 'left', $trendion_share_position ) && trendion_exists_trx_addons() ) {
					?><div class="post_info_vertical_share"><?php
						echo '<h5 class="post_share_label">' . esc_html__('Share This Article', 'trendion') . '</h5>';	
						trendion_show_post_meta(
							apply_filters(
								'trendion_filter_post_meta_args',
								array(
									'components'      => 'share',
									'class'           => 'post_share_horizontal',
									'share_type'      => 'block',
									'share_direction' => 'horizontal',
								),
								'single',
								1
							)
						); ?>
					</div><?php
				}
				if ( !empty($trendion_vertical_content) ) {
					?><div class="post_info_vertical_content"><?php
						trendion_show_layout($trendion_vertical_content);
					?></div><?php
				}
			?></div><?php
		}
		the_content();
		?>
	</div><!-- .entry-content -->
	<?php
	do_action( 'trendion_action_after_post_content' );
	
	// Post footer: Tags, likes, share, author, prev/next links and comments
	do_action( 'trendion_action_before_post_footer' );
	?>
	<div class="post_footer post_footer_single entry-footer">
		<?php
		trendion_show_post_pagination();
		if ( is_single() && ! is_attachment() ) {
			trendion_show_post_footer();
		}
		?>
	</div>
	<?php
	do_action( 'trendion_action_after_post_footer' );
	?>
</article>
