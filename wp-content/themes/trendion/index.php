<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: //codex.wordpress.org/Template_Hierarchy
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

$trendion_template = apply_filters( 'trendion_filter_get_template_part', trendion_blog_archive_get_template() );

if ( ! empty( $trendion_template ) && 'index' != $trendion_template ) {

	get_template_part( $trendion_template );

} else {

	trendion_storage_set( 'blog_archive', true );

	get_header();

	if ( have_posts() ) {

		// Query params
		$trendion_stickies   = is_home()
								|| ( in_array( trendion_get_theme_option( 'post_type' ), array( '', 'post' ) )
									&& (int) trendion_get_theme_option( 'parent_cat' ) == 0
									)
										? get_option( 'sticky_posts' )
										: false;
		$trendion_post_type  = trendion_get_theme_option( 'post_type' );
		$trendion_args       = array(
								'blog_style'     => trendion_get_theme_option( 'blog_style' ),
								'post_type'      => $trendion_post_type,
								'taxonomy'       => trendion_get_post_type_taxonomy( $trendion_post_type ),
								'parent_cat'     => trendion_get_theme_option( 'parent_cat' ),
								'posts_per_page' => trendion_get_theme_option( 'posts_per_page' ),
								'sticky'         => trendion_get_theme_option( 'sticky_style' ) == 'columns'
															&& is_array( $trendion_stickies )
															&& count( $trendion_stickies ) > 0
															&& get_query_var( 'paged' ) < 1
								);

		trendion_blog_archive_start();

		do_action( 'trendion_action_blog_archive_start' );

		if ( is_author() ) {
			do_action( 'trendion_action_before_page_author' );
			get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/author-page' ) );
			do_action( 'trendion_action_after_page_author' );
		}

		if ( trendion_get_theme_option( 'show_filters' ) ) {
			do_action( 'trendion_action_before_page_filters' );
			trendion_show_filters( $trendion_args );
			do_action( 'trendion_action_after_page_filters' );
		} else {
			do_action( 'trendion_action_before_page_posts' );
			trendion_show_posts( array_merge( $trendion_args, array( 'cat' => $trendion_args['parent_cat'] ) ) );
			do_action( 'trendion_action_after_page_posts' );
		}

		do_action( 'trendion_action_blog_archive_end' );

		trendion_blog_archive_end();

	} else {

		if ( is_search() ) {
			get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/content', 'none-search' ), 'none-search' );
		} else {
			get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/content', 'none-archive' ), 'none-archive' );
		}
	}

	get_footer();
}
