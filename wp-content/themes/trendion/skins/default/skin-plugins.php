<?php
/**
 * Required plugins
 *
 * @package TRENDION
 * @since TRENDION 1.76.0
 */

// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$trendion_theme_required_plugins_groups = array(
	'core'          => esc_html__( 'Core', 'trendion' ),
	'page_builders' => esc_html__( 'Page Builders', 'trendion' ),
	'ecommerce'     => esc_html__( 'E-Commerce & Donations', 'trendion' ),
	'socials'       => esc_html__( 'Socials and Communities', 'trendion' ),
	'events'        => esc_html__( 'Events and Appointments', 'trendion' ),
	'content'       => esc_html__( 'Content', 'trendion' ),
	'other'         => esc_html__( 'Other', 'trendion' ),
);
$trendion_theme_required_plugins        = array(
	'trx_addons'                 => array(
		'title'       => esc_html__( 'ThemeREX Addons', 'trendion' ),
		'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'trendion' ),
		'required'    => true,
		'logo'        => 'trx_addons.png',
		'group'       => $trendion_theme_required_plugins_groups['core'],
	),
	'elementor'                  => array(
		'title'       => esc_html__( 'Elementor', 'trendion' ),
		'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'trendion' ),
		'required'    => false,
		'logo'        => 'elementor.png',
		'group'       => $trendion_theme_required_plugins_groups['page_builders'],
	),
	'gutenberg'                  => array(
		'title'       => esc_html__( 'Gutenberg', 'trendion' ),
		'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'trendion' ),
		'required'    => false,
		'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'gutenberg.png',
		'group'       => $trendion_theme_required_plugins_groups['page_builders'],
	),
	'woocommerce'                => array(
		'title'       => esc_html__( 'WooCommerce', 'trendion' ),
		'description' => esc_html__( "Connect the store to your website and start selling now", 'trendion' ),
		'required'    => false,
		'logo'        => 'woocommerce.png',
		'group'       => $trendion_theme_required_plugins_groups['ecommerce'],
	),
	'elegro-payment'             => array(
		'title'       => esc_html__( 'Elegro Crypto Payment', 'trendion' ),
		'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'trendion' ),
		'required'    => false,
		'logo'        => 'elegro-payment.png',
		'group'       => $trendion_theme_required_plugins_groups['ecommerce'],
	),
	'advanced-product-labels-for-woocommerce'             => array(
		'title'       => esc_html__( 'Advanced Product Labels For Woocommerce', 'trendion' ),
		'description' => esc_html__( "With Advanced Product Labels plugin you can create labels easily and quickly", 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/advanced-product-labels-for-woocommerce/advanced-product-labels-for-woocommerce.png' ),
		'group'       => $trendion_theme_required_plugins_groups['ecommerce'],
	),
	'mailchimp-for-wp'           => array(
		'title'       => esc_html__( 'MailChimp for WP', 'trendion' ),
		'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'trendion' ),
		'required'    => false,
		'logo'        => 'mailchimp-for-wp.png',
		'group'       => $trendion_theme_required_plugins_groups['socials'],
	),
	'instagram-feed'             => array(
		'title'       => esc_html__( 'Instagram Feed', 'trendion' ),
		'description' => esc_html__( "Displays the latest photos from your profile on Instagram", 'trendion' ),
		'required'    => false,
		'logo'        => 'instagram-feed.png',
		'group'       => $trendion_theme_required_plugins_groups['socials'],
	),
	'contact-form-7'             => array(
		'title'       => esc_html__( 'Contact Form 7', 'trendion' ),
		'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'trendion' ),
		'required'    => false,
		'logo'        => 'contact-form-7.png',
		'group'       => $trendion_theme_required_plugins_groups['content'],
	),
	'yikes-inc-easy-mailchimp-extender'             => array(
		'title'       => esc_html__( 'Easy Forms for Mailchimp', 'trendion' ),
		'description' => esc_html__( "Easy Forms for Mailchimp allows you to add unlimited Mailchimp sign up forms to your WordPress site", 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/yikes-inc-easy-mailchimp-extender/yikes-inc-easy-mailchimp-extender.png' ),
		'group'       => $trendion_theme_required_plugins_groups['content'],
	),
	'eu-opt-in-compliance-for-mailchimp'             => array(
		'title'       => esc_html__( 'GDPR Compliance for Mailchimp', 'trendion' ),
		'description' => esc_html__( "This addon creates an additional section on the Easy Forms for Mailchimp form builder called ‘EU Law Compliance.’", 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/eu-opt-in-compliance-for-mailchimp/eu-opt-in-compliance-for-mailchimp.png' ),
		'group'       => $trendion_theme_required_plugins_groups['content'],
	),
	'sitepress-multilingual-cms' => array(
		'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'trendion' ),
		'description' => esc_html__( "Allows you to make your website multilingual", 'trendion' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'sitepress-multilingual-cms.png',
		'group'       => $trendion_theme_required_plugins_groups['content'],
	),
	'accelerated-mobile-pages'         => array(
		'title'       => esc_html__( 'AMP for WP – Accelerated Mobile Pages', 'trendion' ),
		'description' => esc_html__( "AMP makes your website faster for Mobile visitors", 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/accelerated-mobile-pages/accelerated-mobile-pages.png' ),
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'wp-gdpr-compliance'         => array(
		'title'       => esc_html__( 'WP GDPR Compliance', 'trendion' ),
		'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'trendion' ),
		'required'    => false,
		'logo'        => 'wp-gdpr-compliance.png',
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'trx_updater'                => array(
		'title'       => esc_html__( 'ThemeREX Updater', 'trendion' ),
		'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'trendion' ),
		'required'    => false,
		'logo'        => 'trx_updater.png',
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'trx_popup'                  => array(
		'title'       => esc_html__( 'ThemeREX Popup', 'trendion' ),
		'description' => esc_html__( "Add popup to your site.", 'trendion' ),
		'required'    => false,
		'logo'        => 'trx_popup.png',
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'advanced-popups'                  => array(
		'title'       => esc_html__( 'Advanced Popups', 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/advanced-popups/advanced-popups.jpg' ),
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'powerkit'              => array(
		'title'       => esc_html__( 'Powerkit', 'trendion' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'powerkit.png',
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'kadence-blocks'		=> array(
		'title'       => esc_html__( 'Kadence Blocks', 'trendion' ),
		'description' => '',
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/kadence-blocks/kadence-blocks.png' ),
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'limit-modified-date'		=> array(
		'title'       => esc_html__( 'Limit Modified Date', 'trendion' ),
		'description' => '',
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/limit-modified-date/limit-modified-date.png' ),
		'group'       => $trendion_theme_required_plugins_groups['other'],
	),
	'cookie-law-info'         => array(
		'title'       => esc_html__( 'GDPR Cookie Consent', 'trendion' ),
		'description' => esc_html__( "The CookieYes GDPR Cookie Consent & Compliance Notice plugin will assist you in making your website GDPR (RGPD, DSVGO) compliant.", 'trendion' ),
		'required'    => false,
		'logo'        => trendion_get_file_url( trendion_skins_get_current_skin_dir() . 'plugins/cookie-law-info/cookie-law-info.png'),
		'group'       => $trendion_theme_required_plugins_groups['other'],
	)
);

if ( TRENDION_THEME_FREE ) {
	unset( $trendion_theme_required_plugins['js_composer'] );
	unset( $trendion_theme_required_plugins['vc-extensions-bundle'] );
	unset( $trendion_theme_required_plugins['easy-digital-downloads'] );
	unset( $trendion_theme_required_plugins['give'] );
	unset( $trendion_theme_required_plugins['bbpress'] );
	unset( $trendion_theme_required_plugins['booked'] );
	unset( $trendion_theme_required_plugins['content_timeline'] );
	unset( $trendion_theme_required_plugins['mp-timetable'] );
	unset( $trendion_theme_required_plugins['learnpress'] );
	unset( $trendion_theme_required_plugins['the-events-calendar'] );
	unset( $trendion_theme_required_plugins['calculated-fields-form'] );
	unset( $trendion_theme_required_plugins['essential-grid'] );
	unset( $trendion_theme_required_plugins['revslider'] );
	unset( $trendion_theme_required_plugins['ubermenu'] );
	unset( $trendion_theme_required_plugins['sitepress-multilingual-cms'] );
	unset( $trendion_theme_required_plugins['envato-market'] );
	unset( $trendion_theme_required_plugins['trx_updater'] );
	unset( $trendion_theme_required_plugins['trx_popup'] );
}

// Add plugins list to the global storage
trendion_storage_set( 'required_plugins', $trendion_theme_required_plugins );
