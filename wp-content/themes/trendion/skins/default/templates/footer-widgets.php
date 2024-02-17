<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

// Footer sidebar
$trendion_footer_name    = trendion_get_theme_option( 'footer_widgets' );
$trendion_footer_present = ! trendion_is_off( $trendion_footer_name ) && is_active_sidebar( $trendion_footer_name );
if ( $trendion_footer_present ) {
	trendion_storage_set( 'current_sidebar', 'footer' );
	$trendion_footer_wide = trendion_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $trendion_footer_name ) ) {
		dynamic_sidebar( $trendion_footer_name );
	}
	$trendion_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $trendion_out ) ) {
		$trendion_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $trendion_out );
		$trendion_need_columns = true;  
		if ( $trendion_need_columns ) {
			$trendion_columns = max( 0, (int) trendion_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $trendion_columns ) {
				$trendion_columns = min( 4, max( 1, trendion_tags_count( $trendion_out, 'aside' ) ) );
			}
			if ( $trendion_columns > 1 ) {
				$trendion_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $trendion_columns ) . ' widget', $trendion_out );
			} else {
				$trendion_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $trendion_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<?php do_action( 'trendion_action_before_sidebar_wrap', 'footer' ); ?>
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $trendion_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $trendion_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'trendion_action_before_sidebar', 'footer' );
				trendion_show_layout( $trendion_out );
				do_action( 'trendion_action_after_sidebar', 'footer' );
				if ( $trendion_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $trendion_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
			<?php do_action( 'trendion_action_after_sidebar_wrap', 'footer' ); ?>
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
