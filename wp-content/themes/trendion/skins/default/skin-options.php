<?php
/**
 * Skin Options
 *
 * @package TRENDION
 * @since TRENDION 1.76.0
 */


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'trendion_create_theme_options' ) ) {

	function trendion_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = esc_html__( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'trendion' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( trendion_storage_get( 'schemes' ) ) < 2;

		trendion_storage_set(

			'options', array(

				// 'Logo & Site Identity'
				//---------------------------------------------
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'trendion' ),
					'desc'     => '',
					'priority' => 10,
					'icon'     => 'icon-home-2',
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'trendion' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'trendion' ) ),
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'switch',
				),
				'logo_zoom'                     => array(
					'title'      => esc_html__( 'Logo zoom', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Zoom the logo (set 1 to leave original size). For this parameter to affect images, their max-height should be specified in "em" instead of "px" during header creation. In this case, maximum logo size depends on the actual size of the picture.', 'trendion' ) ),
					'std'        => 1,
					'min'        => 0.2,
					'max'        => 2,
					'step'       => 0.1,
					'refresh'    => false,
					'show_value' => true,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'trendion' ) ),
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'switch',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'trendion' ) ),
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'trendion' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'trendion' ) ),
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'trendion' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'trendion' ) ),
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'image',
				),



				// 'General settings'
				//---------------------------------------------
				'general'                       => array(
					'title'    => esc_html__( 'General', 'trendion' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'icon'     => 'icon-settings',
					'demo'     => true,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'trendion' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'trendion' ),
					'demo'   => true,
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => trendion_get_list_body_styles( false ),
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'demo'     => false,
					'type'     => 'choice',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'trendion' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => trendion_theme_defaults( 'page_width' ),
					'min'        => 1000,
					'max'        => 1600,
					'step'       => 10,
					'show_value' => true,
					'units'      => 'px',
					'refresh'    => false,
					'customizer' => 'page_width',          // SASS variable's name to preview changes 'on fly'
					'pro_only'   => TRENDION_THEME_FREE,
					'demo'       => true,
					'type'       => 'slider',
				),
				'page_boxed_extra'             => array(
					'title'      => esc_html__( 'Boxed page extra spaces', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Width of the extra side space on boxed pages', 'trendion' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'std'        => trendion_theme_defaults( 'page_boxed_extra' ),
					'min'        => 0,
					'max'        => 150,
					'step'       => 10,
					'show_value' => true,
					'units'      => 'px',
					'refresh'    => false,
					'customizer' => 'page_boxed_extra',   // SASS variable's name to preview changes 'on fly'
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload image for the background of the boxed content.', 'trendion' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Page margins', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Add margins above and below the content area', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'options'  => trendion_get_list_remove_margins(),
					'type'     => 'choice',
				),
				'general_menu_info'             => array(
					'title' => esc_html__( 'Navigation', 'trendion' ),
					'desc'  => '',
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'hidden',
				),			
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'trendion' ) ),
					'std'   => 1,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'hidden',
				),				
				'menu_mobile_search'           => array(
					'title' => esc_html__( 'Search field in the Mobile menu', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Add a search field at the bottom of the Mobile menu', 'trendion' ) ),
					'std'   => 1,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'switch',
				),
				'menu_mobile_socials'          => array(
					'title' => esc_html__( 'Social icons in the Mobile menu', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Add social icons at the bottom of the Mobile menu', 'trendion' ) ),
					'std'   => 1,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'switch',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'trendion' ),
					'desc'  => '',
					'demo'  => false,
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'      => 'hide',
					'options'  => array(),
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'demo'     => false,
					'type'     => 'choice',
				),
				'sidebar_position_ss'       => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'trendion' ),
					'desc'     => wp_kses_data( __( "Select position to move sidebar (if it's not hidden) on the small screen - above or below the content", 'trendion' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_ss_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'options'  => array(),
					'type'     => 'hidden',
				),
				'sidebar_type'              => array(
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'sidebar_style'                 => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
						'sidebar_type' => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
						'sidebar_type'     => array( 'default')
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'trendion' ) ),
					'std'        => trendion_theme_defaults( 'sidebar_width' ),
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'show_value' => true,
					'units'      => 'px',
					'refresh'    => false,
					'customizer' => 'sidebar_width', // SASS variable's name to preview changes 'on fly'
					'pro_only'   => TRENDION_THEME_FREE,
					'demo'       => false,
					'type'       => 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'trendion' ) ),
					'std'        => trendion_theme_defaults( 'sidebar_gap' ),
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'show_value' => true,
					'units'      => 'px',
					'refresh'    => false,
					'customizer' => 'sidebar_gap',  // SASS variable's name to preview changes 'on fly'
					'pro_only'   => TRENDION_THEME_FREE,
					'demo'       => false,
					'type'       => 'slider',
				),
				'sidebar_proportional'          => array(
					'title'      => esc_html__( 'Sidebar proportional', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Change the width of the sidebar and gap proportionally when the window is resized, or leave the width of the sidebar constant', 'trendion' ) ),
					'refresh'    => false,
					'customizer' => 'sidebar_proportional',  // SASS variable's name to preview changes 'on fly'
					'std'        => 1,
					'type'       => 'hidden',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width if the sidebar is hidden', 'trendion' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'expand_content_single'
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'options' => trendion_skin_get_list_expand_content(false, true),
					'std'     => 'expand',
					'type'    => 'choice',
				),	

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'trendion' ) ),
					'std'        => trendion_theme_defaults( 'rad' ),
					'min'        => 1,
					'max'        => 30,
					'step'       => 1,
					'show_value' => true,
					'units'      => 'px',
					'refresh'    => false,
					'demo' 	     => true,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'trendion' ),
					'desc'  => '',
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'trendion' ) ),
					'std'   => 0,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'switch',
				),
				'privacy_text' => array(
					"title" => esc_html__("Text with Privacy Policy link", 'trendion'),
					"desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'trendion') ),
					"std"   => wp_kses( __( 'I agree that my submitted data is being collected and stored.', 'trendion'), 'trendion_kses_content' ),
					"type"  => "textarea"
				),



				// 'Header'
				//---------------------------------------------
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'trendion' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'icon'     => 'icon-header',
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'demo'     => true,
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'demo'       => true,
					'std'        => 'header-custom-elementor-header-default',
					'options'    => array(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select site header position', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'std'        => 1,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'hidden',
				),
				'header_zoom'                   => array(
					'title'   => esc_html__( 'Header title zoom', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Zoom the header title. 1 - original size', 'trendion' ) ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'show_value' => true,
					'refresh' => false,
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'slider',
				),


				'header_image_info'             => array(
					'title' => esc_html__( 'Header image', 'trendion' ),
					'desc'  => '',
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'info',
				),
				'header_image_override'         => array(
					'title'    => esc_html__( 'Header image override', 'trendion' ),
					'desc'     => wp_kses_data( __( "Allow overriding the header image with a featured image of the page, post, product, etc.", 'trendion' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'std'      => 0,
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'switch',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'trendion' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'trendion' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'trendion' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'trendion' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'trendion' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'trendion' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'trendion' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'trendion' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),



				// 'Footer'
				//---------------------------------------------
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'trendion' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'icon'     => 'icon-footer',
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'trendion' ),
					),
					'demo'     => true,
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'trendion' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'demo'       => true,
					'std'        => 'footer-custom-elementor-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'trendion' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'trendion' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => trendion_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'trendion' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'switch',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'trendion' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'switch',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'trendion' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'trendion' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'trendion' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! trendion_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'trendion' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by AxiomThemes. All rights reserved.', 'trendion' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),



				// 'Mobile version'
				//---------------------------------------------
				'mobile'                        => array(
					'title'    => esc_html__( 'Mobile', 'trendion' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 55,
					'icon'     => 'icon-smartphone',
					'type'     => 'section',
				),

				'mobile_header_info'            => array(
					'title' => esc_html__( 'Header on the mobile device', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_mobile'            => array(
					'title'    => esc_html__( 'Header style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose the header to be used on mobile devices: the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'header_style_mobile'           => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'header_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_mobile'        => array(
					'title'    => esc_html__( 'Header position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),

				'mobile_sidebar_info'           => array(
					'title' => esc_html__( 'Sidebar on the mobile device', 'trendion' ),
					'desc'  => '',
					'type'  => 'hidden',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select sidebar position on mobile devices', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => 'hidden',
				),
				'sidebar_type_mobile'           => array(
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'hidden',
				),
				'sidebar_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
						'sidebar_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'hidden',
				),
				'sidebar_widgets_mobile'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on mobile devices', 'trendion' ) ),
					'dependency' => array(
						'sidebar_position_mobile' => array( '^hide' ),
						'sidebar_type_mobile' => array( 'default' )
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_mobile'         => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width if the sidebar is hidden on mobile devices', 'trendion' ) ),
					'refresh' => false,
					'dependency' => array(
						'sidebar_position_mobile' => array( 'hide', 'inherit' ),
					),
					'std'     => 'inherit',
					'options' => trendion_skin_get_list_expand_content( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'choice',
				),

				'mobile_footer_info'           => array(
					'title' => esc_html__( 'Footer on the mobile device', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'footer_type_mobile'           => array(
					'title'    => esc_html__( 'Footer style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use on mobile devices: the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'footer_style_mobile'          => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'footer_type_mobile' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets_mobile'        => array(
					'title'      => esc_html__( 'Footer widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'trendion' ) ),
					'dependency' => array(
						'footer_type_mobile' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns_mobile'        => array(
					'title'      => esc_html__( 'Footer columns', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'trendion' ) ),
					'dependency' => array(
						'footer_type_mobile'    => array( 'default' ),
						'footer_widgets_mobile' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => trendion_get_list_range( 0, 6 ),
					'type'       => 'select',
				),



				// 'Blog'
				//---------------------------------------------
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'trendion' ) ),
					'priority' => 70,
					'icon'     => 'icon-page',
					'type'     => 'panel',
				),


				// Blog - Posts page
				//---------------------------------------------
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'trendion' ) ),
					'icon'  => 'icon-th',
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'trendion' ),
					'desc'   => wp_kses_data( __( 'Customize the blog archive: post layout, header and footer style, sidebar position, etc.', 'trendion' ) ),
					'qsetup' => esc_html__( 'General', 'trendion' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'trendion' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'options'    => array(),
					'type'       => 'choice',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'Large first post', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'hidden',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'trendion' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => trendion_get_list_blog_contents(),
					'type'       => 'hidden',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'trendion' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 55,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'trendion' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'trendion' ) ),
					'std'     => 2,
					'options' => trendion_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'trendion' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'options'    => trendion_get_list_blog_paginations(),
					'type'       => 'choice',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Post animation', 'trendion' ),
					'desc'       => wp_kses_data( __( "Select post animation for the archive page. Attention! Do not use any animation on pages with the 'wheel to the anchor' behaviour!", 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'compare'                                  => 'or',
						'#page_template'                           => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'disable_animation_on_mobile'   => array(
					'title'      => esc_html__( 'Disable animation on mobile', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Disable any posts animation on mobile devices', 'trendion' ) ),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'compare'                                  => 'or',
						'#page_template'                           => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'video_in_popup'                => array(
					'title'      => esc_html__( 'Open video in the popup on a blog archive', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Open the video from posts in the popup (if plugin "ThemeREX Addons" is installed) or play the video instead the cover image', 'trendion' ) ),
					'std'        => 0,
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'compare'                                  => 'or',
						'#page_template'                           => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'type'       => 'switch',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'trendion' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => trendion_get_list_checkbox_values( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'hidden',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'trendion' ) ),
					'std'     => 'right',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'type'    => 'choice',
				),
				'sidebar_position_ss_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the small screen - above or below the content', 'trendion' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'options'  => array(),
					'type'     => 'hidden',
				),
				'sidebar_type_blog'           => array(
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'sidebar_style_blog'            => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
						'sidebar_type_blog'     => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'trendion' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
						'sidebar_type_blog'     => array( 'default' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width if the sidebar is hidden', 'trendion' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options' => trendion_skin_get_list_expand_content( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'choice',
				),


				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'trendion' ),
					'desc'  => wp_kses_data( __( "Select or upload a placeholder image for posts without a featured image. Placeholder is used exclusively on the blog stream page (and not on single post pages), and only in those styles, where omitting a featured image would be inappropriate.", 'trendion' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'trendion' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'trendion' ),
						'columns' => esc_html__( 'Mini-cards', 'trendion' ),
					),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'hidden',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'trendion' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'@editor/template' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|modified=0|views=0|likes=0|comments=1|author=1|share=0|edit=0|read=0',
					'options'    => trendion_get_list_meta_parts(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'checklist',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy readable date format', 'trendion' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'trendion' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'use_blog_archive_pages'        => array(
					'title'      => esc_html__( 'Use "Blog Archive" page settings on the post list', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Apply options and content of pages created with the template "Blog Archive" for some type of posts and / or taxonomy when viewing feeds of posts of this type and taxonomy.', 'trendion' ) ),
					'std'        => 0,
					'type'       => 'switch',
				),


				// Blog - Single posts
				//---------------------------------------------
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'trendion' ) ),
					'icon'  => 'icon-doc-text',
					'type'  => 'section',
				),

				'blog_single_info'       => array(
					'title' => esc_html__( 'Single posts', 'trendion' ),
					'desc'   => wp_kses_data( __( 'Customize the single post: content  layout, header and footer styles, sidebar position, meta elements, etc.', 'trendion' ) ),
					'type'  => 'info',
				),
				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'trendion' ),
					'desc'   => '',
					'type'  => 'info',
				),
				'header_type_single'            => array(
					'title'    => esc_html__( 'Header style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'header_style_single'           => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'header_type_single' => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_single'        => array(
					'title'    => esc_html__( 'Header position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				'header_wide_single'            => array(
					'title'      => esc_html__( 'Header fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'trendion' ) ),
					'dependency' => array(
						'header_type_single' => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => trendion_get_list_checkbox_values( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'hidden',
				),


				'blog_single_footer_info'	=> array(
					'title'    => esc_html__( 'Footer', 'trendion' ),
					'desc'     => '',
					'type'     => 'info',
				),
				'footer_type_single'                   => array(
					'title'    => esc_html__( 'Footer style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'footer_style_single'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						'footer_type_single' => array( 'custom' ),
					),
					'std'        => 'footer-custom-elementor-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),


				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'trendion' ) ),
					'std'     => 'hide',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'options' => array(),
					'type'    => 'choice',
				),
				'sidebar_position_ss_single'    => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to move sidebar on the single posts on the small screen - above or below the content', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'hidden',
				),
				'sidebar_type_single'           => array(
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				'sidebar_style_single'            => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
						'sidebar_type_single'     => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
						'sidebar_type_single'     => array( 'default' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_single'         => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width on the single posts if the sidebar is hidden', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'refresh' => false,
					'std'     => 'narrow',
					'options' => trendion_skin_get_list_expand_content( false, true, false ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'choice',
				),
				'post_vertical_content'         => array(
					'title' => esc_html__( "Post's additional content", 'trendion' ),
					'desc'  => wp_kses_data( __( "This content will display at the left side of post. This option is available only if the sidebar is hidden and the width of the content is narrow.", 'trendion' ) ),
					'dependency' => array(
						'expand_content_single' => array( 'narrow' ),
						'sidebar_position_single' => array( 'hide' ),
					),
					'std'   => '',
					'allow_html'   => true,
					'type'  => 'textarea',
				),
				'blog_single_title_info'        => array(
					'title' => esc_html__( 'Featured image and title', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'single_style'                  => array(
					'title'      => esc_html__( 'Single style', 'trendion' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 'style-9',
					'qsetup'     => esc_html__( 'General', 'trendion' ),
					'options'    => array(),
					'type'       => 'choice',
				),
				'single_parallax'               => array(
					'title'      => esc_html__( 'Parallax speed', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Speed for shifting the image while scrolling the page. If 0, the effect is not applied.', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 0,
					'min'        => -50,
					'max'        => 50,
					'step'       => 1,
					'refresh'    => false,
					'show_value' => true,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'hidden',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'trendion' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'trendion' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'trendion' ) ),
					'std'   => 1,
					'type'  => 'switch',
				),
				'meta_parts_single'             => array(
					'title'      => esc_html__( 'Post meta', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'author=1|categories=1|date=1|modified=0|views=0|likes=0|share=0|comments=1|edit=0',
					'options'    => trendion_get_list_meta_parts(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'checklist',
				),
				'share_position'                 => array(
					'title'      => esc_html__( 'Share links position', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select one or more positions to show Share links on single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'trendion' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dir'        => 'vertical',
					'std'        => 'top=1|left=0|bottom=1',
					'options'    => trendion_get_list_share_links_positions(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'checklist',
				),
				'share_fixed'                   => array(
					'title' => esc_html__( 'Share links fixed', 'trendion' ),
					'desc'  => wp_kses_data( __( "Fix share links when a document scrolled down", 'trendion' ) ),
					'dependency' => array(
						'share_position[left]' => array( 1 ),
					),
					'std'   => 1,
					'type'  => 'hidden',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'trendion' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'trendion' ) ),
					'std'   => 1,
					'type'  => 'switch',
				),

				'blog_single_comments_info'      => array(
					'title' => esc_html__( 'Post comments', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'enable_comments'          => array(
					'title' => esc_html__( 'Enable comments', 'trendion' ),
					'desc'  => wp_kses_data( __( "Enable comments on all posts", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'   => 1,
					'type'  => 'switch',
				),
				'show_comments_button'          => array(
					'title' => esc_html__( 'Show comments button', 'trendion' ),
					'desc'  => wp_kses_data( __( "Display button to show/hide comments block", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'enable_comments' => array( 1 ),
					),
					'std'   => 1,
					'type'  => 'switch',
				),
				'show_comments'                 => array(
					'title'   => esc_html__( 'Comments block', 'trendion' ),
					'desc'    => wp_kses_data( __( "Select initial state of the comments block", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'options' => trendion_get_list_visiblehidden(),
					'dependency' => array(
						'enable_comments' => array( 1 ),
						'show_comments_button' => array( 1 ),
					),
					'std'     => 'hidden',
					'type'    => 'radio',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'trendion' ),
					'desc'     => wp_kses_data( __( "Show 'Related posts' section on single post pages", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'      => 0,
					'type'     => 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select the style of the related posts output', 'trendion' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'classic',
					'options'    => array(
						'classic' => esc_html__( 'Classic', 'trendion' ),
						'list'    => esc_html__( 'List', 'trendion' ),
						'short'   => esc_html__( 'Short', 'trendion' ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'inside'        => esc_html__( 'Inside the content (fullwidth)', 'trendion' ),
						'inside_left'   => esc_html__( 'At left side of the content', 'trendion' ),
						'inside_right'  => esc_html__( 'At right side of the content', 'trendion' ),
						'below_content' => esc_html__( 'After the content', 'trendion' ),
						'below_page'    => esc_html__( 'After the content & sidebar', 'trendion' ),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'related_position_inside'       => array(
					'title'      => esc_html__( 'Before # paragraph', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Before what paragraph should related posts appear? If 0 - randomly.', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'inside_left', 'inside_right' ),
					),
					'std'        => 2,
					'options'    => trendion_get_list_range( 0, 9 ),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'trendion' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post?', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 9,
					'show_value' => true,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'trendion' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts on the single post page?', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_position' => array( 'inside', 'below_content', 'below_page' ),
					),
					'std'        => 2,
					'min'        => 1,
					'max'        => 6,
					'show_value' => true,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'trendion'),
						'side'    => esc_html__('Side', 'trendion'),
						'top'     => esc_html__('Top', 'trendion'),
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'trendion'),
						'bottom'  => esc_html__('Bottom', 'trendion')
					),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'hidden',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space between slides', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Space between slides in the related posts slider (in pixels)', 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'min'        => 0,
					'max'        => 100,
					'show_value' => true,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'slider',
				),
		
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Post navigation', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'posts_navigation'           => array(
					'title'   => esc_html__( 'Show post navigation', 'trendion' ),
					'desc'    => wp_kses_data( __( "Display post navigation on single post pages or load the next post automatically after the content of the current article.", 'trendion' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'     => 'links',
					'options' => array(
						'none'   => esc_html__('None', 'trendion'),
						'links'  => esc_html__('Prev/Next links', 'trendion'),
						'scroll' => esc_html__('Autoload next post', 'trendion')
					),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'radio',
				),
				'posts_navigation_fixed'     => array(
					'title'      => esc_html__( 'Fixed post navigation', 'trendion' ),
					'desc'       => wp_kses_data( __( "Fix the position of post navigation buttons on desktop. Display them on either side of post content.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'links' ),
					),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'posts_navigation_scroll_same_cat'     => array(
					'title'      => esc_html__( 'Next post from same category', 'trendion' ),
					'desc'       => wp_kses_data( __( "Load next post from the same category or from any category.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'std'        => 1,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'posts_navigation_scroll_which_block'  => array(
					'title'   => esc_html__( 'Which block to load?', 'trendion' ),
					'desc'    => wp_kses_data( __( "Load only the content of the next article or the article and sidebar together.", 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( "Attention! If you override sidebar position or content width on single posts (e.g. the sidebar is displayed on some posts and hidden on others), please don’t use the 'Full post' option to prevent improper content positioning.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'     => 'article',
					'options' => array(
						'article' => array(
										'title' => esc_html__( 'Only content', 'trendion' ),
										'icon'  => 'images/theme-options/posts-navigation-scroll-which-block/article.png',
									),
					),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'hidden',
				),
				'posts_navigation_scroll_hide_author'  => array(
					'title'      => esc_html__( 'Hide author bio', 'trendion' ),
					'desc'       => wp_kses_data( __( "Hide author bio after post content when infinite scroll is used.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'posts_navigation_scroll_hide_related'  => array(
					'title'      => esc_html__( 'Hide related posts', 'trendion' ),
					'desc'       => wp_kses_data( __( "Hide related posts after post content when infinite scroll is used.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 0,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'hidden',
				),
				'posts_navigation_scroll_hide_comments' => array(
					'title'      => esc_html__( 'Hide comments', 'trendion' ),
					'desc'       => wp_kses_data( __( "Hide comments after post content when infinite scroll is used.", 'trendion' ) ),
					'dependency' => array(
						'posts_navigation' => array( 'scroll' ),
					),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'trendion' ),
					),
					'std'        => 1,
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'switch',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),



				// 'Colors'
				//---------------------------------------------
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'trendion' ),
					'desc'     => '',
					'priority' => 300,
					'icon'     => 'icon-customizer',
					'demo'     => true,
					'type'     => 'section',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Select a color scheme to modify. Attention! Only sections of the site with the selected color scheme will be affected by the changes', 'trendion' ) ),
					'type'  => 'hidden',
				),
				'color_preset'                  => array(
					'title'   => esc_html__( 'Color preset', 'trendion' ),
					'desc'    => '',
					'std'     => '',
					'refresh' => false,
					'options' => array(),
					'type'    => 'hidden',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'trendion' ),
					'desc'        => '',
					'std'         => '$trendion_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'spectrum', 
					'demo'        => true,
					'type'        => 'scheme_editor',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color scheme assignment', 'trendion' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block uses the main color scheme from the first parameter - Site Color Scheme', 'trendion' ) ),
					'hidden' => $hide_schemes,
					'demo'   => true,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'trendion' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'trendion' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'demo'     => true,
					'type'     => $hide_schemes ? 'hidden' : 'select',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'trendion' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'trendion' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'demo'     => true,
					'type'     => $hide_schemes ? 'hidden' : 'select',
				),
				'menu_scheme'                   => array(
					'title'    => esc_html__( 'Sidemenu Color Scheme', 'trendion' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'trendion' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'pro_only' => TRENDION_THEME_FREE,
					'demo'     => true,
					'type'     => $hide_schemes ? 'hidden' : 'hidden',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'trendion' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'trendion' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'demo'     => true,
					'type'     => $hide_schemes ? 'hidden' : 'select',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'trendion' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'trendion' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'demo'     => true,
					'type'     => $hide_schemes ? 'hidden' : 'select',
				),
				

				'scheme_switcher'          => array(
					'title' => esc_html__( 'Color scheme switcher', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Add button at the bottom of the page', 'trendion' ) ),
					'std'   => 0,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'switch',
				),
				'invert_logo'          => array(
					'title' => esc_html__( 'Invert logo', 'trendion' ),
					'desc'  => wp_kses_data( __( 'Invert logo colors for the dark scheme (only works with the frontend color scheme switcher)', 'trendion' ) ),
					'dependency' => array(
						'scheme_switcher' => array( 1 ),
					),
					'std'   => 0,
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'switch',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Huge priority is used to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);


		// Add parameters for "Category", "Tag", "Author", "Search" to Theme Options
		trendion_storage_set_array_before( 'options', 'blog_single', trendion_options_get_list_blog_options( 'category', esc_html__( 'Category', 'trendion' ), 'icon-tag-light' ) );
		trendion_storage_set_array_before( 'options', 'blog_single', trendion_options_get_list_blog_options( 'tag', esc_html__( 'Tag', 'trendion' ), 'icon-tag' ) );
		trendion_storage_set_array_before( 'options', 'blog_single', trendion_options_get_list_blog_options( 'author', esc_html__( 'Author', 'trendion' ), 'icon-user' ) );
		trendion_storage_set_array_before( 'options', 'blog_single', trendion_options_get_list_blog_options( 'search', esc_html__( 'Search', 'trendion' ), 'icon-search-light' ) );


		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			//---------------------------------------------
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'trendion' ),
				'desc'     => '',
				'priority' => 200,
				'icon'     => 'icon-text',
				'demo'     => true,
				'type'     => 'panel',
			),

			// Fonts - presets
			'font_preset_section'        => array(
				'title' => esc_html__( 'Font presets', 'trendion' ),
				'desc'  => wp_kses_data( __( 'Select a font preset to setup all typography parameters at once.', 'trendion' ) ),
				'demo'  => true,
				'type'  => 'hidden',
			),
			'font_preset_info'   => array(
				'title' => esc_html__( 'Font presets', 'trendion' ),
				'desc'  => '',
				'demo'  => true,
				'type'  => 'hidden',
			),
			'font_preset'       => array(
				'title'   => esc_html__( 'Font preset', 'trendion' ),
				'desc'    => '',
				'std'     => '',
				'refresh' => false,
				'demo'    => true,
				'options' => array(),
				'type'    => 'hiddena',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'trendion' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'trendion' ) )
						. wp_kses_data( __( 'Press "Refresh" button to reload preview area after the all fonts are changed', 'trendion' ) ),
				'demo'  => true,
				'type'  => 'section',
			),
			'load_fonts_info'   => array(
				'title' => esc_html__( 'Load fonts', 'trendion' ),
				'desc'  => '',
				'demo'  => true,
				'type'  => 'info',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'trendion' ),
				'desc'    => wp_kses_data( __( 'Specify a comma separated list of subsets to be loaded from Google fonts.', 'trendion' ) )
						. wp_kses_data( __( 'Permitted subsets include: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'trendion' ) ),
				'class'   => 'trendion_column-1_3 trendion_new_row',
				'refresh' => false,
				'demo'    => true,
				'std'     => '$trendion_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= trendion_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( trendion_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => esc_html( sprintf( __( 'Font %s', 'trendion' ), $i ) ),
					'desc'  => '',
					'demo'  => true,
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'trendion' ),
				'desc'    => '',
				'class'   => 'trendion_column-1_4 trendion_new_row',
				'refresh' => false,
				'demo'    => true,
				'std'     => '$trendion_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Fallback fonts', 'trendion' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'A comma-separated list of fallback fonts. Used if the font specified in the previous field is not available. Last in the list, specify the name of the font family: serif, sans-serif, monospace, cursive.', 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( 'For example: Arial, Helvetica, sans-serif', 'trendion' ) )
							: '',
				'class'   => 'trendion_column-1_4',
				'refresh' => false,
				'demo'    => true,
				'std'     => '$trendion_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-link" ] = array(
				'title'   => esc_html__( 'Font URL', 'trendion' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font URL used only for Adobe fonts. This is URL of the stylesheet for the project with a fonts collection from the site adobe.com', 'trendion' ) )
							: '',
				'class'   => 'trendion_column-1_4',
				'refresh' => false,
				'demo'    => true,
				'std'     => '$trendion_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'trendion' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for Google fonts. This is a comma separated list of the font weight and style options. For example: 400,400italic,700', 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style option increases download size! Specify only those weight and style options that you plan on using.', 'trendion' ) )
							: '',
				'class'   => 'trendion_column-1_4',
				'refresh' => false,
				'demo'    => true,
				'std'     => '$trendion_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'demo' => true,
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = trendion_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_font_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'trendion' ), $tag ) ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses_data( sprintf( __( 'Font settings for the "%s" tag.', 'trendion' ), $tag ) ),
				'demo'  => true,
				'type'  => 'section',
			);
			$fonts[ "{$tag}_font_info" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: esc_html( sprintf( __( '%s settings', 'trendion' ), $tag ) ),
				'desc'  => ! empty( $v['description'] ) && false
								? $v['description']
								: '',
				'demo'  => true,
				'type'  => 'info',
			);
			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				// Skip property 'text-decoration' for the main text
				if ( 'text-decoration' == $css_prop && 'p' == $tag ) {
					continue;
				}

				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'trendion' ),
						'100'     => esc_html__( '100 (Light)', 'trendion' ),
						'200'     => esc_html__( '200 (Light)', 'trendion' ),
						'300'     => esc_html__( '300 (Thin)', 'trendion' ),
						'400'     => esc_html__( '400 (Normal)', 'trendion' ),
						'500'     => esc_html__( '500 (Semibold)', 'trendion' ),
						'600'     => esc_html__( '600 (Semibold)', 'trendion' ),
						'700'     => esc_html__( '700 (Bold)', 'trendion' ),
						'800'     => esc_html__( '800 (Black)', 'trendion' ),
						'900'     => esc_html__( '900 (Black)', 'trendion' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'trendion' ),
						'normal'  => esc_html__( 'Normal', 'trendion' ),
						'italic'  => esc_html__( 'Italic', 'trendion' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'trendion' ),
						'none'         => esc_html__( 'None', 'trendion' ),
						'underline'    => esc_html__( 'Underline', 'trendion' ),
						'overline'     => esc_html__( 'Overline', 'trendion' ),
						'line-through' => esc_html__( 'Line-through', 'trendion' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'trendion' ),
						'none'       => esc_html__( 'None', 'trendion' ),
						'uppercase'  => esc_html__( 'Uppercase', 'trendion' ),
						'lowercase'  => esc_html__( 'Lowercase', 'trendion' ),
						'capitalize' => esc_html__( 'Capitalize', 'trendion' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'refresh'    => false,
					'demo'       => true,
					'load_order' => $load_order,
					'std'        => '$trendion_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'demo' => true,
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'demo' => true,
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		trendion_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			trendion_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'trendion' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'trendion' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! trendion_check_url( 'customize.php' ) ) {
			trendion_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'trendion' ) ),
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'trendion' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for categories, tags, archives, author posts, search, etc.
if ( ! function_exists( 'trendion_options_get_list_blog_options' ) ) {
	function trendion_options_get_list_blog_options( $mode, $title = '', $icon = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $mode );
		}
		return apply_filters( 'trendion_filter_get_list_blog_options', array(
				"blog_general_{$mode}"           => array(
					'title' => $title,
					// Translators: Add mode name to the description
					'desc'  => wp_kses_data( sprintf( __( "Style and components of the %s posts page", 'trendion' ), $title ) ),
					'icon'  => $icon,
					'type'  => 'section',
				),
				"blog_general_info_{$mode}"      => array(
					// Translators: Add mode name to the title
					'title'  => wp_kses_data( sprintf( __( "%s posts page", 'trendion' ), $title ) ),
					// Translators: Add mode name to the description
					'desc'   => wp_kses_data( sprintf( __( 'Customize %s page: post layout, header and footer styles, sidebar position and widgets, etc.', 'trendion' ), $title ) ),
					'type'   => 'info',
				),
				"blog_style_{$mode}"             => array(
					'title'      => esc_html__( 'Blog style', 'trendion' ),
					'desc'       => '',
					'std'        => 'excerpt',
					'options'    => array(),
					'type'       => 'choice',
				),
				"first_post_large_{$mode}"       => array(
					'title'      => esc_html__( 'Large first post', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'trendion' ) ),
					'std'        => 0,
					'options'    => trendion_get_list_yesno( true ),
					'dependency' => array(
						'blog_style_{$mode}' => array( 'classic', 'masonry' ),
					),
					'type'       => 'hidden',
				),
				"blog_content_{$mode}"           => array(
					'title'      => esc_html__( 'Posts content', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'trendion' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						"blog_style_{$mode}" => array( 'excerpt' ),
					),
					'options'    => trendion_get_list_blog_contents( true ),
					'type'       => 'hidden',
				),
				"excerpt_length_{$mode}"         => array(
					'title'      => esc_html__( 'Excerpt length', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'trendion' ) ),
					'dependency' => array(
						"blog_style_{$mode}"   => array( 'excerpt' ),
						"blog_content_{$mode}" => array( 'excerpt' ),
					),
					'std'        => 55,
					'type'       => 'text',
				),
				"meta_parts_{$mode}"             => array(
					'title'      => esc_html__( 'Post meta', 'trendion' ),
					'desc'       => wp_kses_data( __( "Set up post meta parts to show in the blog archive. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'trendion' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'trendion' ) ),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|modified=0|views=0|likes=0|comments=1|author=1|share=0|edit=0',
					'options'    => trendion_get_list_meta_parts(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'checklist',
				),
				"blog_pagination_{$mode}"        => array(
					'title'      => esc_html__( 'Pagination style', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'trendion' ) ),
					'std'        => 'pages',
					'options'    => trendion_get_list_blog_paginations( true ),
					'type'       => 'choice',
				),
				"blog_animation_{$mode}"         => array(
					'title'      => esc_html__( 'Post animation', 'trendion' ),
					'desc'       => wp_kses_data( __( "Select post animation for the archive page. Attention! Do not use any animation on pages with the 'wheel to the anchor' behaviour!", 'trendion' ) ),
					'std'        => 'none',
					'options'    => array(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),

				"blog_header_info_{$mode}"       => array(
					'title' => esc_html__( 'Header', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				"header_type_{$mode}"            => array(
					'title'    => esc_html__( 'Header style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_header_footer_types( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				"header_style_{$mode}"           => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						"header_type_{$mode}" => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'type'       => 'select',
				),
				"header_position_{$mode}"        => array(
					'title'    => esc_html__( 'Header position', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'radio',
				),
				"header_wide_{$mode}"            => array(
					'title'      => esc_html__( 'Header fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'trendion' ) ),
					'dependency' => array(
						"header_type_{$mode}" => array( 'default' ),
					),
					'std'      => 'inherit',
					'options'  => trendion_get_list_checkbox_values( true ),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => 'hidden',
				),

				"blog_sidebar_info_{$mode}"      => array(
					'title' => esc_html__( 'Sidebar', 'trendion' ),
					'desc'  => '',
					'type'  => 'info',
				),
				"sidebar_position_{$mode}"       => array(
					'title'   => esc_html__( 'Sidebar position', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'trendion' ) ),
					'std'     => 'inherit',
					'options' => array(),
					'type'    => 'choice',
				),
				"sidebar_type_{$mode}"           => array(
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'dependency' => array(
						"sidebar_position_{$mode}" => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				"sidebar_style_{$mode}"          => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						"sidebar_position_{$mode}" => array( '^hide' ),
						"sidebar_type_{$mode}"     => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				"sidebar_widgets_{$mode}"        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'trendion' ) ),
					'dependency' => array(
						"sidebar_position_{$mode}" => array( '^hide' ),
						"sidebar_type_{$mode}"     => array( 'default' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				"expand_content_{$mode}"         => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width if the sidebar is hidden', 'trendion' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options' => trendion_skin_get_list_expand_content( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'choice',
				),
			), $mode, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'trendion_options_get_list_cpt_options' ) ) {
	function trendion_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options',
								array_merge(
									trendion_options_get_list_cpt_options_body( $cpt, $title ),
									trendion_options_get_list_cpt_options_header( $cpt, $title ),
									trendion_options_get_list_cpt_options_sidebar( $cpt, $title ),
									trendion_options_get_list_cpt_options_sidebar_single( $cpt, $title ),
									trendion_options_get_list_cpt_options_footer( $cpt, $title ),
									trendion_options_get_list_cpt_options_widgets( $cpt, $title )
								),
								$cpt,
								$title
							);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Content'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_body' ) ) {
	function trendion_options_get_list_cpt_options_body( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_body', array(
				"content_info_{$cpt}"           => array(
					'title' => esc_html__( 'Body style', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Select body style to display %s list and single posts', 'trendion' ), $title ) ),
					'type'  => 'hidden',
				),
				"body_style_{$cpt}"             => array(
					'title'    => esc_html__( 'Body style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'trendion' ) ),
					'std'      => 'inherit',
					'options'  => trendion_get_list_body_styles( true ),
					'type'     => 'hidden',
				),
				"boxed_bg_image_{$cpt}"         => array(
					'title'      => esc_html__( 'Boxed bg image', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'trendion' ) ),
					'dependency' => array(
						"body_style_{$cpt}" => array( 'boxed' ),
					),
					'std'        => 'inherit',
					'type'       => 'hidden',
				),
			), $cpt, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Header'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_header' ) ) {
	function trendion_options_get_list_cpt_options_header( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_header', array(
				"header_info_{$cpt}"            => array(
					'title' => esc_html__( 'Header', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Set up header parameters to display %s list and single posts', 'trendion' ), $title ) ),
					'type'  => 'info',
				),
				"header_type_{$cpt}"            => array(
					'title'   => esc_html__( 'Header style', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'     => 'inherit',
					'options' => trendion_get_list_header_footer_types( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'radio',
				),
				"header_style_{$cpt}"           => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'       => wp_kses_data( sprintf( __( 'Select custom layout to display the site header on the %s pages', 'trendion' ), $title ) ),
					'dependency' => array(
						"header_type_{$cpt}" => array( 'custom' ),
					),
					'std'        => 'inherit',
					'options'    => array(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				"header_position_{$cpt}"        => array(
					'title'   => esc_html__( 'Header position', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'    => wp_kses_data( sprintf( __( 'Select position to display the site header on the %s pages', 'trendion' ), $title ) ),
					'std'     => 'inherit',
					'options' => array(),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'radio',
				),
				"header_image_override_{$cpt}"  => array(
					'title'   => esc_html__( 'Header image override', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'    => wp_kses_data( sprintf( __( "Allow overriding the header image with a featured image of %s.", 'trendion' ), $title ) ),
					'std'     => 'inherit',
					'options' => trendion_get_list_yesno( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'radio',
				),
			), $cpt, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Sidebar'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_sidebar' ) ) {
	function trendion_options_get_list_cpt_options_sidebar( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_sidebar', array(
				"sidebar_info_{$cpt}"           => array(
					'title' => wp_kses_data( sprintf( __( 'Sidebar on the %s list', 'trendion' ), $title ) ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Set up sidebar parameters to display %s list and single posts', 'trendion' ), $title ) ),
					'type'  => 'info',
				),
				"sidebar_position_{$cpt}"       => array(
					// Translators: Add CPT name to the title
					'title'   => sprintf( __( 'Sidebar position on the %s list', 'trendion' ), $title ),
					// Translators: Add CPT name to the description
					'desc'    => wp_kses_data( sprintf( __( 'Select sidebar position for the %s list', 'trendion' ), $title ) ),
					'std'     => 'hide',
					'options' => array(),
					'type'    => 'choice',
				),
				"sidebar_position_ss_{$cpt}"    => array(
					// Translators: Add CPT name to the title
					'title'    => sprintf( __( 'Sidebar position on the %s list on the small screen', 'trendion' ), $title ),
					'desc'     => wp_kses_data( __( 'Select a position for the sidebar on the small screen: above the content, below or on a sliding side-panel.', 'trendion' ) ),
					'std'      => 'below',
					'dependency' => array(
						"sidebar_position_{$cpt}" => array( '^hide' ),
					),
					'options'  => array(),
					'type'     => 'hidden',
				),
				"sidebar_type_{$cpt}"           => array(
					// Translators: Add CPT name to the title
					'title'    => sprintf( __( 'Sidebar style on the %s list', 'trendion' ), $title ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'dependency' => array(
						"sidebar_position_{$cpt}" => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				"sidebar_style_{$cpt}"          => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						"sidebar_position_{$cpt}" => array( '^hide' ),
						"sidebar_type_{$cpt}"     => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				"sidebar_widgets_{$cpt}"        => array(
					// Translators: Add CPT name to the title
					'title'      => sprintf( __( 'Sidebar widgets on the %s list', 'trendion' ), $title ),
					// Translators: Add CPT name to the description
					'desc'       => wp_kses_data( sprintf( __( 'Select sidebar to show on the %s list', 'trendion' ), $title ) ),
					'dependency' => array(
						"sidebar_position_{$cpt}" => array( '^hide' ),
						"sidebar_type_{$cpt}"     => array( 'default' ),
					),
					'std'        => 'hide',
					'options'    => array(),
					'type'       => 'select',
				),
				"expand_content_{$cpt}"         => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width if the sidebar is hidden', 'trendion' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options' => trendion_skin_get_list_expand_content( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'choice',
				),
			), $cpt, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Sidebar Single'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_sidebar_single' ) ) {
	function trendion_options_get_list_cpt_options_sidebar_single( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_sidebar_single', array(
				"sidebar_single_info_{$cpt}"           => array(
					'title' => wp_kses_data( sprintf( __( 'Sidebar on the single %s', 'trendion' ), $title ) ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Set up sidebar parameters to display single %s', 'trendion' ), $title ) ),
					'type'  => 'info',
				),
				"sidebar_position_single_{$cpt}"       => array(
					'title'   => esc_html__( 'Sidebar position', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'    => wp_kses_data( sprintf( __( 'Select sidebar position for the single %s', 'trendion' ), $title ) ),
					'std'     => 'left',
					'options' => array(),
					'type'    => 'choice',
				),
				"sidebar_position_ss_single_{$cpt}"    => array(
					'title'    => esc_html__( 'Sidebar position on the small screen', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Select a position for the sidebar on the small screen: above the content, below or on a sliding side-panel.', 'trendion' ) ),
					'dependency' => array(
						"sidebar_position_single_{$cpt}" => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'hidden',
				),
				"sidebar_type_single_{$cpt}"           => array(
					// Translators: Add CPT name to the title
					'title'    => esc_html__( 'Sidebar style', 'trendion' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default sidebar or sidebar Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'dependency' => array(
						"sidebar_position_single_{$cpt}" => array( '^hide' ),
					),
					'std'      => 'default',
					'options'  => trendion_get_list_header_footer_types(),
					'pro_only' => TRENDION_THEME_FREE,
					'type'     => ! trendion_exists_trx_addons() ? 'hidden' : 'radio',
				),
				"sidebar_style_single_{$cpt}"          => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses( __( 'Select custom sidebar from Layouts Builder', 'trendion' ), 'trendion_kses_content' ),
					'dependency' => array(
						"sidebar_position_single_{$cpt}" => array( '^hide' ),
						"sidebar_type_single_{$cpt}"     => array( 'custom' ),
					),
					'std'        => 'sidebar-custom-sidebar',
					'options'    => array(),
					'type'       => 'select',
				),
				"sidebar_widgets_single_{$cpt}"        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'       => wp_kses_data( sprintf( __( 'Select sidebar widgets for the single %s', 'trendion' ), $title ) ),
					'dependency' => array(
						"sidebar_position_single_{$cpt}" => array( '^hide' ),
						"sidebar_type_single_{$cpt}"     => array( 'default' ),
					),
					'std'        => 'hide',
					'options'    => array(),
					'type'       => 'select',
				),
				"expand_content_single_{$cpt}"         => array(
					'title'   => esc_html__( 'Content width', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Content width on the single post if the sidebar is hidden', 'trendion' ) ),
					'refresh' => false,
					'std'     => 'inherit',
					'options' => trendion_skin_get_list_expand_content( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'choice',
				),
			), $cpt, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Footer'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_footer' ) ) {
	function trendion_options_get_list_cpt_options_footer( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_footer', array(
				"footer_info_{$cpt}"            => array(
					'title' => esc_html__( 'Footer', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Set up footer parameters to display %s list and single posts', 'trendion' ), $title ) ),
					'type'  => 'info',
				),
				"footer_type_{$cpt}"            => array(
					'title'   => esc_html__( 'Footer style', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'trendion' ) ),
					'std'     => 'inherit',
					'options' => trendion_get_list_header_footer_types( true ),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'radio',
				),
				"footer_style_{$cpt}"           => array(
					'title'      => esc_html__( 'Select custom layout', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select custom layout to display the site footer', 'trendion' ) ),
					'std'        => 'inherit',
					'dependency' => array(
						"footer_type_{$cpt}" => array( 'custom' ),
					),
					'options'    => array(),
					'pro_only'   => TRENDION_THEME_FREE,
					'type'       => 'select',
				),
				"footer_widgets_{$cpt}"         => array(
					'title'      => esc_html__( 'Footer widgets', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'trendion' ) ),
					'dependency' => array(
						"footer_type_{$cpt}" => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				"footer_columns_{$cpt}"         => array(
					'title'      => esc_html__( 'Footer columns', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'trendion' ) ),
					'dependency' => array(
						"footer_type_{$cpt}"    => array( 'default' ),
						"footer_widgets_{$cpt}" => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => trendion_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				"footer_wide_{$cpt}"            => array(
					'title'      => esc_html__( 'Footer fullwidth', 'trendion' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'trendion' ) ),
					'dependency' => array(
						"footer_type_{$cpt}" => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'switch',
				),
			), $cpt, $title
		);
	}
}


// Returns a list of options that can be overridden for CPT. Section 'Additional Widget Areas'
if ( ! function_exists( 'trendion_options_get_list_cpt_options_widgets' ) ) {
	function trendion_options_get_list_cpt_options_widgets( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return apply_filters( 'trendion_filter_get_list_cpt_options_widgets', array(
				"widgets_info_{$cpt}"           => array(
					'title' => esc_html__( 'Additional panels', 'trendion' ),
					// Translators: Add CPT name to the description
					'desc'  => wp_kses_data( sprintf( __( 'Set up additional panels to display %s list and single posts', 'trendion' ), $title ) ),
					'pro_only'  => TRENDION_THEME_FREE,
					'type'  => 'info',
				),
				"widgets_above_page_{$cpt}"     => array(
					'title'   => esc_html__( 'Widgets at the top of the page', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the top of the page (above content and sidebar)', 'trendion' ) ),
					'std'     => 'hide',
					'options' => array(),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'select',
				),
				"widgets_above_content_{$cpt}"  => array(
					'title'   => esc_html__( 'Widgets above the content', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the beginning of the content area', 'trendion' ) ),
					'std'     => 'hide',
					'options' => array(),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'select',
				),
				"widgets_below_content_{$cpt}"  => array(
					'title'   => esc_html__( 'Widgets below the content', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the ending of the content area', 'trendion' ) ),
					'std'     => 'hide',
					'options' => array(),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'select',
				),
				"widgets_below_page_{$cpt}"     => array(
					'title'   => esc_html__( 'Widgets at the bottom of the page', 'trendion' ),
					'desc'    => wp_kses_data( __( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'trendion' ) ),
					'std'     => 'hide',
					'options' => array(),
					'pro_only'=> TRENDION_THEME_FREE,
					'type'    => 'select',
				),
			), $cpt, $title
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'trendion_options_get_list_choises' ) ) {
	add_filter( 'trendion_filter_options_get_list_choises', 'trendion_options_get_list_choises', 10, 2 );
	function trendion_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = trendion_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = trendion_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = trendion_get_list_schemes( 'color_scheme' != $id );
			} else if ( strpos( $id, 'sidebar_style' ) === 0 ) {
				$list = trendion_get_list_sidebar_styles( strpos( $id, 'sidebar_style_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = trendion_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_ss' ) === 0 ) {
				$list = trendion_get_list_sidebars_positions_ss( strpos( $id, 'sidebar_position_ss_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = trendion_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = trendion_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = trendion_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = trendion_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'single_style' ) === 0 ) {
				$list = trendion_get_list_single_styles( strpos( $id, 'single_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = trendion_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = trendion_array_merge( array( 0 => esc_html__( '- Select category -', 'trendion' ) ), trendion_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = trendion_get_list_animations_in( strpos( $id, 'blog_animation_' ) === 0 );
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = trendion_get_list_schemes();
			} elseif ( 'color_preset' == $id ) {
				$list = trendion_get_list_color_presets();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = trendion_get_list_load_fonts( true );
			} elseif ( 'font_preset' == $id ) {
				$list = trendion_get_list_font_presets();
			}
		}
		return $list;
	}
}
