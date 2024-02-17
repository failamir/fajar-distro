<?php
/**
 * The template to display menu in the footer
 *
 * @package TRENDION
 * @since TRENDION 1.0.10
 */

// Footer menu
$trendion_menu_footer = trendion_skin_get_nav_menu( 'menu_footer' );
if ( ! empty( $trendion_menu_footer ) ) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php
			trendion_show_layout(
				$trendion_menu_footer,
				'<nav class="menu_footer_nav_area sc_layouts_menu sc_layouts_menu_default"'
					. ' itemscope="itemscope" itemtype="' . esc_attr( trendion_get_protocol( true ) ) . '//schema.org/SiteNavigationElement"'
					. '>',
				'</nav>'
			);
			?>
		</div>
	</div>
	<?php
}
