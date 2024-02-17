<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

if ( trendion_sidebar_present() ) {
	
	$trendion_sidebar_type = trendion_get_theme_option( 'sidebar_type' );
	if ( 'custom' == $trendion_sidebar_type && ! trendion_is_layouts_available() ) {
		$trendion_sidebar_type = 'default';
	}
	
	// Catch output to the buffer
	ob_start();
	if ( 'default' == $trendion_sidebar_type ) {
		// Default sidebar with widgets
		$trendion_sidebar_name = trendion_get_theme_option( 'sidebar_widgets' );
		trendion_storage_set( 'current_sidebar', 'sidebar' );
		if ( is_active_sidebar( $trendion_sidebar_name ) ) {
			dynamic_sidebar( $trendion_sidebar_name );
		}
	} else {
		// Custom sidebar from Layouts Builder
		$trendion_sidebar_id = trendion_get_custom_sidebar_id();
		do_action( 'trendion_action_show_layout', $trendion_sidebar_id );
	}
	$trendion_out = trim( ob_get_contents() );
	ob_end_clean();
	
	// If any html is present - display it
	if ( ! empty( $trendion_out ) ) {
		$trendion_sidebar_position    = trendion_get_theme_option( 'sidebar_position' );
		$trendion_sidebar_position_ss = trendion_get_theme_option( 'sidebar_position_ss' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $trendion_sidebar_position );
			echo ' sidebar_' . esc_attr( $trendion_sidebar_position_ss );
			echo ' sidebar_' . esc_attr( $trendion_sidebar_type );

			$trendion_sidebar_scheme = apply_filters( 'trendion_filter_sidebar_scheme', trendion_get_theme_option( 'sidebar_scheme' ) );
			if ( ! empty( $trendion_sidebar_scheme ) && ! trendion_is_inherit( $trendion_sidebar_scheme ) && 'custom' != $trendion_sidebar_type ) {
				echo ' scheme_' . esc_attr( $trendion_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php

			// Skip link anchor to fast access to the sidebar from keyboard
			?>
			<a id="sidebar_skip_link_anchor" class="trendion_skip_link_anchor" href="#"></a>
			<?php

			do_action( 'trendion_action_before_sidebar_wrap', 'sidebar' );

			// Button to show/hide sidebar on mobile
			if ( in_array( $trendion_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$trendion_title = apply_filters( 'trendion_filter_sidebar_control_title', 'float' == $trendion_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'trendion' ) : '' );
				$trendion_text  = apply_filters( 'trendion_filter_sidebar_control_text', 'above' == $trendion_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'trendion' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $trendion_title ); ?>"><?php echo esc_html( $trendion_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'trendion_action_before_sidebar', 'sidebar' );
				trendion_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $trendion_out ) );
				do_action( 'trendion_action_after_sidebar', 'sidebar' );
				?>
			</div>
			<?php

			do_action( 'trendion_action_after_sidebar_wrap', 'sidebar' );

			?>
		</div>
		<div class="clearfix"></div>
		<?php
	}
}
