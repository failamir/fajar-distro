<?php
/**
 * The template to display single post
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

// Full post loading
$full_post_loading          = trendion_get_value_gp( 'action' ) == 'full_post_loading';

// Prev post loading
$prev_post_loading          = trendion_get_value_gp( 'action' ) == 'prev_post_loading';
$prev_post_loading_type     = trendion_get_theme_option( 'posts_navigation_scroll_which_block' );

// Position of the related posts
$trendion_related_position   = trendion_get_theme_option( 'related_position' );

// Type of the prev/next post navigation
$trendion_posts_navigation   = trendion_get_theme_option( 'posts_navigation' );
$trendion_prev_post          = false;
$trendion_prev_post_same_cat = trendion_get_theme_option( 'posts_navigation_scroll_same_cat' );

// Rewrite style of the single post if current post loading via AJAX and featured image and title is not in the content
if ( ( $full_post_loading 
		|| 
		( $prev_post_loading && 'article' == $prev_post_loading_type )
	) 
	&& 
	! in_array( trendion_get_theme_option( 'single_style' ), array( 'style-6' ) )
) {
	trendion_storage_set_array( 'options_meta', 'single_style', 'style-6' );
}

do_action( 'trendion_action_prev_post_loading', $prev_post_loading, $prev_post_loading_type );

get_header();

while ( have_posts() ) {

	the_post();

	// Type of the prev/next post navigation
	if ( 'scroll' == $trendion_posts_navigation ) {
		$trendion_prev_post = get_previous_post( $trendion_prev_post_same_cat );  // Get post from same category
		if ( ! $trendion_prev_post && $trendion_prev_post_same_cat ) {
			$trendion_prev_post = get_previous_post( false );                    // Get post from any category
		}
		if ( ! $trendion_prev_post ) {
			$trendion_posts_navigation = 'links';
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $trendion_prev_post ) ) {
		trendion_sc_layouts_showed( 'featured', false );
		trendion_sc_layouts_showed( 'title', false );
		trendion_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $trendion_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/content', 'single-' . trendion_get_theme_option( 'single_style' ) ), 'single-' . trendion_get_theme_option( 'single_style' ) );

	// If related posts should be inside the content
	if ( strpos( $trendion_related_position, 'inside' ) === 0 ) {
		$trendion_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'trendion_action_related_posts' );
		$trendion_related_content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $trendion_related_content ) ) {
			$trendion_related_position_inside = max( 0, min( 9, trendion_get_theme_option( 'related_position_inside' ) ) );
			if ( 0 == $trendion_related_position_inside ) {
				$trendion_related_position_inside = mt_rand( 1, 9 );
			}

			$trendion_p_number         = 0;
			$trendion_related_inserted = false;
			$trendion_in_block         = false;
			$trendion_content_start    = strpos( $trendion_content, '<div class="post_content' );
			$trendion_content_end      = strrpos( $trendion_content, '</div>' );

			for ( $i = max( 0, $trendion_content_start ); $i < min( strlen( $trendion_content ) - 3, $trendion_content_end ); $i++ ) {
				if ( $trendion_content[ $i ] != '<' ) {
					continue;
				}
				if ( $trendion_in_block ) {
					if ( strtolower( substr( $trendion_content, $i + 1, 12 ) ) == '/blockquote>' ) {
						$trendion_in_block = false;
						$i += 12;
					}
					continue;
				} else if ( strtolower( substr( $trendion_content, $i + 1, 10 ) ) == 'blockquote' && in_array( $trendion_content[ $i + 11 ], array( '>', ' ' ) ) ) {
					$trendion_in_block = true;
					$i += 11;
					continue;
				} else if ( 'p' == $trendion_content[ $i + 1 ] && in_array( $trendion_content[ $i + 2 ], array( '>', ' ' ) ) ) {
					$trendion_p_number++;
					if ( $trendion_related_position_inside == $trendion_p_number ) {
						$trendion_related_inserted = true;
						$trendion_content = ( $i > 0 ? substr( $trendion_content, 0, $i ) : '' )
											. $trendion_related_content
											. substr( $trendion_content, $i );
					}
				}
			}
			if ( ! $trendion_related_inserted ) {
				if ( $trendion_content_end > 0 ) {
					$trendion_content = substr( $trendion_content, 0, $trendion_content_end ) . $trendion_related_content . substr( $trendion_content, $trendion_content_end );
				} else {
					$trendion_content .= $trendion_related_content;
				}
			}
		}

		trendion_show_layout( $trendion_content );
	}

	// Comments
	do_action( 'trendion_action_before_comments' );
	comments_template();
	do_action( 'trendion_action_after_comments' );

	// Related posts
	if ( 'below_content' == $trendion_related_position
		&& ( 'scroll' != $trendion_posts_navigation || trendion_get_theme_option( 'posts_navigation_scroll_hide_related' ) == 0 )
		&& ( ! $full_post_loading || trendion_get_theme_option( 'open_full_post_hide_related' ) == 0 )
	) {
		do_action( 'trendion_action_related_posts' );
	}

	// Post navigation: type 'scroll'
	if ( 'scroll' == $trendion_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $trendion_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $trendion_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $trendion_prev_post ) ); ?>"
			<?php do_action( 'trendion_action_nav_links_single_scroll_data', $trendion_prev_post ); ?>
		></div>
		<?php
	}
}

get_footer();
