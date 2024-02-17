<?php
/**
 * The template to display the attachment
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */


get_header();

while ( have_posts() ) {
	the_post();

	// Display post's content
	get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/content', 'single-' . trendion_get_theme_option( 'single_style' ) ), 'single-' . trendion_get_theme_option( 'single_style' ) );

	// Parent post navigation.
	$trendion_posts_navigation = trendion_get_theme_option( 'posts_navigation' );
	if ( 'links' == $trendion_posts_navigation ) {
		?>
		<div class="nav-links-single<?php
			if ( ! trendion_is_off( trendion_get_theme_option( 'posts_navigation_fixed' ) ) ) {
				echo ' nav-links-fixed fixed';
			}
		?>">
			<?php
			the_post_navigation( apply_filters( 'trendion_filter_post_navigation_args', array(
					'prev_text' => '<span class="nav-arrow"></span>'
						. '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Published in', 'trendion' ) . '</span> '
						. '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'trendion' ) . '</span> '
						. '<h5 class="post-title">%title</h5>'
						. '<span class="post_date">%date</span>',
			), 'image' ) );
			?>
		</div>
		<?php
	}

	// Comments
	do_action( 'trendion_action_before_comments' );
	comments_template();
	do_action( 'trendion_action_after_comments' );
}

get_footer();
