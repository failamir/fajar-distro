<?php
/**
 * The Header: Logo and main menu
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php
	// Class scheme_xxx need in the <html> as context for the <body>!
	echo ' scheme_' . esc_attr( trendion_get_theme_option( 'color_scheme' ) );
?>">

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	do_action( 'trendion_action_before_body' );
	?>

	<div class="<?php echo esc_attr( apply_filters( 'trendion_filter_body_wrap_class', 'body_wrap' ) ); ?>" <?php do_action('trendion_action_body_wrap_attributes'); ?>>

		<?php do_action( 'trendion_action_before_page_wrap' ); ?>

		<div class="<?php echo esc_attr( apply_filters( 'trendion_filter_page_wrap_class', 'page_wrap' ) ); ?>" <?php do_action('trendion_action_page_wrap_attributes'); ?>>

			<?php do_action( 'trendion_action_page_wrap_start' ); ?>

			<?php
			$trendion_full_post_loading = ( trendion_is_singular( 'post' ) || trendion_is_singular( 'attachment' ) ) && trendion_get_value_gp( 'action' ) == 'full_post_loading';
			$trendion_prev_post_loading = ( trendion_is_singular( 'post' ) || trendion_is_singular( 'attachment' ) ) && trendion_get_value_gp( 'action' ) == 'prev_post_loading';

			// Don't display the header elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ! $trendion_full_post_loading && ! $trendion_prev_post_loading ) {

				// Short links to fast access to the content, sidebar and footer from the keyboard
				?>
				<a class="trendion_skip_link skip_to_content_link" href="#content_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'trendion_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to content", 'trendion' ); ?></a>
				<?php if ( trendion_sidebar_present() ) { ?>
				<a class="trendion_skip_link skip_to_sidebar_link" href="#sidebar_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'trendion_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to sidebar", 'trendion' ); ?></a>
				<?php } ?>
				<a class="trendion_skip_link skip_to_footer_link" href="#footer_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'trendion_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to footer", 'trendion' ); ?></a>

				<?php
				do_action( 'trendion_action_before_header' );

				// Header
				$trendion_header_type = trendion_get_theme_option( 'header_type' );
				if ( 'custom' == $trendion_header_type && ! trendion_is_layouts_available() ) {
					$trendion_header_type = 'default';
				}
				get_template_part( apply_filters( 'trendion_filter_get_template_part', "templates/header-" . sanitize_file_name( $trendion_header_type ) ) );

				// Side menu
				if ( in_array( trendion_get_theme_option( 'menu_side' ), array( 'left', 'right' ) ) ) {
					get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-navi-side' ) );
				}

				// Mobile menu
				get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-navi-mobile' ) );

				do_action( 'trendion_action_after_header' );

			}
			?>

			<?php do_action( 'trendion_action_before_page_content_wrap' ); ?>

			<div class="page_content_wrap<?php
				if ( trendion_is_off( trendion_get_theme_option( 'remove_margins' ) ) ) {
					if ( empty( $trendion_header_type ) ) {
						$trendion_header_type = trendion_get_theme_option( 'header_type' );
					}
					if ( 'custom' == $trendion_header_type && trendion_is_layouts_available() ) {
						$trendion_header_id = trendion_get_custom_header_id();
						if ( $trendion_header_id > 0 ) {
							$trendion_header_meta = trendion_get_custom_layout_meta( $trendion_header_id );
							if ( ! empty( $trendion_header_meta['margin'] ) ) {
								?> page_content_wrap_custom_header_margin<?php
							}
						}
					}
					$trendion_footer_type = trendion_get_theme_option( 'footer_type' );
					if ( 'custom' == $trendion_footer_type && trendion_is_layouts_available() ) {
						$trendion_footer_id = trendion_get_custom_footer_id();
						if ( $trendion_footer_id ) {
							$trendion_footer_meta = trendion_get_custom_layout_meta( $trendion_footer_id );
							if ( ! empty( $trendion_footer_meta['margin'] ) ) {
								?> page_content_wrap_custom_footer_margin<?php
							}
						}
					}
				}
				do_action( 'trendion_action_page_content_wrap_class', $trendion_prev_post_loading );
				?>"<?php
				if ( apply_filters( 'trendion_filter_is_prev_post_loading', $trendion_prev_post_loading ) ) {
					?> data-single-style="<?php echo esc_attr( trendion_get_theme_option( 'single_style' ) ); ?>"<?php
				}
				do_action( 'trendion_action_page_content_wrap_data', $trendion_prev_post_loading );
			?>>
				<?php
				do_action( 'trendion_action_page_content_wrap', $trendion_full_post_loading || $trendion_prev_post_loading );

				// Single posts banner
				if ( apply_filters( 'trendion_filter_single_post_header', trendion_is_singular( 'post' ) || trendion_is_singular( 'attachment' ) ) ) {
					if ( $trendion_prev_post_loading ) {
						if ( trendion_get_theme_option( 'posts_navigation_scroll_which_block' ) != 'article' ) {
							do_action( 'trendion_action_between_posts' );
						}
					}
					// Single post thumbnail and title
					$trendion_path = apply_filters( 'trendion_filter_get_template_part', 'templates/single-styles/' . trendion_get_theme_option( 'single_style' ) );
					if ( trendion_get_file_dir( $trendion_path . '.php' ) != '' ) {
						get_template_part( $trendion_path );
					}
				}

				// Widgets area above page
				$trendion_body_style   = trendion_get_theme_option( 'body_style' );
				$trendion_widgets_name = trendion_get_theme_option( 'widgets_above_page' );
				$trendion_show_widgets = ! trendion_is_off( $trendion_widgets_name ) && is_active_sidebar( $trendion_widgets_name );
				if ( $trendion_show_widgets ) {
					if ( 'fullscreen' != $trendion_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					trendion_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $trendion_body_style ) {
						?>
						</div>
						<?php
					}
				}

				// Content area
				do_action( 'trendion_action_before_content_wrap' );
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $trendion_body_style ? '_fullscreen' : ''; ?>">

					<?php do_action( 'trendion_action_content_wrap_start' ); ?>

					<div class="content">
						<?php
						do_action( 'trendion_action_page_content_start' );

						// Skip link anchor to fast access to the content from keyboard
						?>
						<a id="content_skip_link_anchor" class="trendion_skip_link_anchor" href="#"></a>
						<?php
						// Single posts banner between prev/next posts
						if ( ( trendion_is_singular( 'post' ) || trendion_is_singular( 'attachment' ) )
							&& $trendion_prev_post_loading 
							&& trendion_get_theme_option( 'posts_navigation_scroll_which_block' ) == 'article'
						) {
							do_action( 'trendion_action_between_posts' );
						}

						// Widgets area above content
						trendion_create_widgets_area( 'widgets_above_content' );

						do_action( 'trendion_action_page_content_start_text' );
