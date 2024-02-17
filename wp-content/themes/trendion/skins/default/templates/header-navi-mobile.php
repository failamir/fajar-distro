<?php
/**
 * The template to show mobile menu (used only header_style == 'default')
 *
 * @package TRENDION
 * @since TRENDION 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr( trendion_get_theme_option( 'menu_mobile_fullscreen' ) > 0 ? 'fullscreen' : 'narrow' ); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close theme_button_close" tabindex="0"><span class="theme_button_close_icon"></span></a>
		<?php

		// Logo
		set_query_var( 'trendion_logo_args', array( 'type' => 'mobile' ) );
		get_template_part( apply_filters( 'trendion_filter_get_template_part', 'templates/header-logo' ) );
		set_query_var( 'trendion_logo_args', array() );

		// Mobile menu
		$trendion_menu_mobile = trendion_skin_get_nav_menu( 'menu_mobile' );
		if ( empty( $trendion_menu_mobile ) ) {
			$trendion_menu_mobile = apply_filters( 'trendion_filter_get_mobile_menu', '' );
			if ( empty( $trendion_menu_mobile ) ) {
				$trendion_menu_mobile = trendion_skin_get_nav_menu( 'menu_main' );
				if ( empty( $trendion_menu_mobile ) ) {
					$trendion_menu_mobile = trendion_get_nav_menu();
				}
			}
		}
		if ( ! empty( $trendion_menu_mobile ) ) {
			// Change attribute 'id' - add prefix 'mobile-' to prevent duplicate id on the page
			$trendion_menu_mobile = preg_replace( '/([\s]*id=")/', '${1}mobile-', $trendion_menu_mobile );
			// Change main menu classes
			$trendion_menu_mobile = str_replace(
				array( 'menu_main',   'sc_layouts_menu_nav', 'sc_layouts_menu ' ),	
				array( 'menu_mobile', '',                    ' ' ),					
				$trendion_menu_mobile
			);
			// Wrap menu to the <nav> if not present
			if ( strpos( $trendion_menu_mobile, '<nav ' ) !== 0 ) {	// condition !== false is not allowed, because menu can contain inner <nav> elements (in the submenu layouts)
				$trendion_menu_mobile = sprintf( '<nav class="menu_mobile_nav_area" itemscope="itemscope" itemtype="%1$s//schema.org/SiteNavigationElement">%2$s</nav>', esc_attr( trendion_get_protocol( true ) ), $trendion_menu_mobile );
			}
			// Show menu
			trendion_show_layout( apply_filters( 'trendion_filter_menu_mobile_layout', $trendion_menu_mobile ) );
		}

		// Search field
		if ( trendion_get_theme_option( 'menu_mobile_search' ) > 0 ) {
			do_action(
				'trendion_action_search',
				array(
					'style' => 'normal',
					'class' => 'search_mobile',
					'ajax'  => false
				)
			);
		}

		// Social icons
		if ( trendion_get_theme_option( 'menu_mobile_socials' ) > 0 ) {
			trendion_show_layout( trendion_get_socials_links(), '<div class="socials_mobile">', '</div>' );
		}
		?>
	</div>
</div>
