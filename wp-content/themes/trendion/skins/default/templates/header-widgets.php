<?php
/**
 * The template to display the widgets area in the header
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */

// Header sidebar
$trendion_header_name    = trendion_get_theme_option( 'header_widgets' );
$trendion_header_present = ! trendion_is_off( $trendion_header_name ) && is_active_sidebar( $trendion_header_name );
if ( $trendion_header_present ) {
	trendion_storage_set( 'current_sidebar', 'header' );
	$trendion_header_wide = trendion_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $trendion_header_name ) ) {
		dynamic_sidebar( $trendion_header_name );
	}
	$trendion_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $trendion_widgets_output ) ) {
		$trendion_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $trendion_widgets_output );
		$trendion_need_columns   = strpos( $trendion_widgets_output, 'columns_wrap' ) === false;
		if ( $trendion_need_columns ) {
			$trendion_columns = max( 0, (int) trendion_get_theme_option( 'header_columns' ) );
			if ( 0 == $trendion_columns ) {
				$trendion_columns = min( 6, max( 1, trendion_tags_count( $trendion_widgets_output, 'aside' ) ) );
			}
			if ( $trendion_columns > 1 ) {
				$trendion_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $trendion_columns ) . ' widget', $trendion_widgets_output );
			} else {
				$trendion_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $trendion_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<?php do_action( 'trendion_action_before_sidebar_wrap', 'header' ); ?>
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $trendion_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $trendion_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'trendion_action_before_sidebar', 'header' );
				trendion_show_layout( $trendion_widgets_output );
				do_action( 'trendion_action_after_sidebar', 'header' );
				if ( $trendion_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $trendion_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
			<?php do_action( 'trendion_action_after_sidebar_wrap', 'header' ); ?>
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
