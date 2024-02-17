<?php
namespace TrxAddons\AiHelper\AssistantTools;

if ( ! class_exists( 'Helper' ) ) {

	/**
	 * Main class for AI Helper Assistent Tools support
	 */
	class Helper {

		private $logo_types = array( 'regular', 'retina' );
		private $logo_locations = array( 'header', 'mobile-header', 'mobile-menu', 'side-menu', 'footer' );
		private $logo_options_map = array(
			'header-regular' => 'custom_logo',
			'header-retina'  => 'logo_retina',
			'mobile-header-regular' => 'logo_mobile_header',
			'mobile-header-retina'  => 'logo_mobile_header_retina',
			'mobile-menu-regular' => 'logo_mobile',
			'mobile-menu-retina'  => 'logo_mobile_retina',
			'side-menu-regular' => 'logo_side',
			'side-menu-retina'  => 'logo_side_retina',
			'footer-regular' => 'logo_footer',
			'footer-retina'  => 'logo_footer_retina',
		);
		private $scheme_colors = array( 'bg_color', 'bd_color', 'text', 'text_dark', 'text_light', 'text_link', 'text_hover' );

		/**
		 * Constructor
		 */
		function __construct() {
			add_filter( 'trx_addons_filter_api_call', array( $this, 'api_call' ), 10, 3 );
		}

		/**
		 * Controller for the API calls
		 * 
		 * @hooked trx_addons_filter_api_call, 10, 3
		 *
		 * @param string|array $output - the output of the API call
		 * @param string $name - the name of the tool
		 * @param array $args - the arguments of the API call
		 * 
		 * @return string|array $output - the output of the API call. Empty string if the tool is not supported. Array if the tool is supported.
		 * 								  Format: array( 'status' => 'success|error', 'message' => 'message text', 'value' => 'result' )
		 */
		function api_call( $output, $name, $args ) {
			if ( $name == 'get_site_logo' ) {
				$output = $this->get_site_logo( $args );
			} else if ( $name == 'set_site_logo' ) {
				$output = $this->set_site_logo( $args );
			} else if ( $name == 'get_scheme_color' ) {
				$output = $this->get_scheme_color( $args );
			} else if ( $name == 'set_scheme_color' ) {
				$output = $this->set_scheme_color( $args );
			}
			return $output;
		}

		/**
		 * Check the tool arguments - required fields and its values
		 * 
		 * @param array $args - the arguments of the API call
		 * @param array $required - the required fields
		 * 
		 * @return string - Error message if the arguments are wrong. Empty string if the arguments are correct.
		 */
		private function check_args( $args, $required ) {
			$rez = '';
			foreach( $required as $field => $values ) {
				if ( ! isset( $args[ $field ] ) ) {
					$rez = sprintf( __( 'Missing argument: %s', 'trx_addons' ), $field );
					break;
				} else if ( is_array( $values ) && ! in_array( $args[ $field ], $values ) ) {
					$rez = sprintf( __( 'Wrong value "%1$s" for the argument "%2$s"', 'trx_addons' ), $args[ $field ], $field );
					break;
				} else if ( $values === true && empty( $args[ $field ] ) ) {
					$rez = sprintf( __( 'A value "%1$s" for the argument "%2$s" is empty', 'trx_addons' ), $args[ $field ], $field );
					break;
				}
			}
			return $rez;
		}

		/**
		 * Get site logo
		 * 
		 * @param array $args - the arguments of the API call. Required fields:
		 * 						'type' => 'regular|retina',
		 * 						'location' => 'header|mobile-header|mobile-menu|side-menu|footer'
		 * 
		 * @return string|array $output - the output of the API call. Empty string if the tool is not supported. Array if the tool is supported.
		 * 								  Format: array( 'status' => 'success|error', 'message' => 'message text', 'value' => 'result' )
		 */
		private function get_site_logo( $args ) {
			$logo_types = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_types, 'site_logo', 'type' );
			$logo_locations = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_locations, 'site_logo', 'location' );
			$logo_options_map = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_options_map, 'site_logo', 'options' );

			$check_rez = $this->check_args( $args, array( 'type' => $logo_types, 'location' => $logo_locations ) );
			if ( ! empty( $check_rez ) ) {
				return array( 'status' => 'error', 'message' => $check_rez );
			}
			// Get the theme options
			$options = trx_addons_get_theme_options();
			// Get the logo url
			$logo_url = '';
			if ( isset( $logo_options_map[ $args['location'] . '-' . $args['type'] ] ) && isset( $options[ $logo_options_map[ $args['location'] . '-' . $args['type'] ] ] ) ) {
				$logo_url = trx_addons_get_attachment_url( $options[ $logo_options_map[ $args['location'] . '-' . $args['type'] ] ], 'full' );
			} else {
				return array( 'status' => 'error', 'message' => sprintf( __( 'Can\'t get a %1$s logo option for %2$s', 'trx_addons' ), $args['type'], $args['location'] ) );
			}
			// Return the result
			return array(
				'success' => true,
				'message' => sprintf(
								__( 'A %1$s logo for %2$s is %3$s', 'trx_addons'),
								$args['type'],
								$args['location'],
								empty( $logo_url ) ? __( 'not selected', 'trx_addons' ) : '<a href="' . esc_url( $logo_url ) . '" target="_blank">' . trx_addons_get_file_name( $logo_url, false ) . '</a>'
							),
				'value' => $logo_url
			);
		}

		/**
		 * Set site logo
		 * 
		 * @param array $args - the arguments of the API call. Required fields:
		 * 						'type' => 'regular|retina',
		 * 						'location' => 'header|mobile-header|mobile-menu|side-menu|footer'
		 * 						'image' => 'image url'
		 * 
		 * @return string|array $output - the output of the API call. Empty string if the tool is not supported. Array if the tool is supported.
		 * 								  Format: array( 'status' => 'success|error', 'message' => 'message text' )
		 */
		private function set_site_logo( $args ) {
			if ( ! current_user_can( 'edit_theme_options' ) ) {
				return array( 'status' => 'error', 'message' => __( 'You have no permissions to edit theme options', 'trx_addons' ) );
			}

			$logo_types = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_types, 'site_logo', 'type' );
			$logo_locations = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_locations, 'site_logo', 'location' );
			$logo_options_map = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->logo_options_map, 'site_logo', 'options' );

			$check_rez = $this->check_args( $args, array( 'type' => $logo_types, 'location' => $logo_locations, 'image' => true ) );
			if ( ! empty( $check_rez ) ) {
				return array( 'status' => 'error', 'message' => $check_rez );
			}
			// Get the theme options
			$options = trx_addons_get_theme_options();
			// Update the logo url
			if ( isset( $logo_options_map[ $args['location'] . '-' . $args['type'] ] ) && isset( $options[ $logo_options_map[ $args['location'] . '-' . $args['type'] ] ] ) ) {
				// Upload the logo image to the media library
				$attach_id = trx_addons_save_image_to_uploads( array(
					'image' => '',					// binary data of the image
					'image_url' => $args['image'],	// or URL of the image
					'filename' => '',				// filename for the image in the media library. If empty - use the image name from the URL
					'caption' => '',				// caption for the image in the media library
				) );
				// If the image was uploaded successfully - update the logo URL with the attachment URL in the theme options
				if ( ! is_wp_error( $attach_id ) && (int)$attach_id > 0 ) {
					$logo_url = wp_get_attachment_url( $attach_id );
					// Update the logo URL in the theme options
					$options[ $logo_options_map[ $args['location'] . '-' . $args['type'] ] ] = $logo_url;
					// Update the theme options
					trx_addons_update_theme_options( $options );
				} else {
					return array( 'status' => 'error', 'message' => __( 'Can\'t upload a logo image into the media library', 'trx_addons' ) );
				}
			} else {
				return array( 'status' => 'error', 'message' => sprintf( __( 'Can\'t update a %1$s logo option for %2$s', 'trx_addons' ), $args['type'], $args['location'] ) );
			}
			// Return the result
			return array(
				'success' => true,
				'message' => sprintf(
								__( 'A %1$s logo for %2$s is updated with a new image %3$s.', 'trx_addons'),
								$args['type'],
								$args['location'],
								'<a href="' . esc_url( $logo_url ) . '" target="_blank">' . trx_addons_get_file_name( $logo_url, false ) . '</a>'
							),
				//'value' => $logo_url
			);
		}

		/**
		 * Get a color from the color scheme
		 * 
		 * @param array $args - the arguments of the API call. Required fields:
		 * 						'scheme' => 'scheme_slug',
		 * 						'color' => 'bg_color|bd_color|text|text_dark|text_light|text_link|text_hover'
		 * 
		 * @return string|array $output - the output of the API call. Empty string if the tool is not supported. Array if the tool is supported.
		 * 								  Format: array( 'status' => 'success|error', 'message' => 'message text', 'value' => 'result' )
		 */
		private function get_scheme_color( $args ) {
			$schemes = trx_addons_get_theme_color_schemes();
			if ( empty( $schemes ) ) {
				return array( 'status' => 'error', 'message' => __( 'Can\'t get color schemes', 'trx_addons' ) );
			}

			$scheme_slugs = apply_filters( 'trx_addons_filter_ai_helper_tools_values', array_keys( $schemes ), 'scheme_color', 'scheme' );
			$scheme_colors = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->scheme_colors, 'scheme_color', 'color' );

			$check_rez = $this->check_args( $args, array( 'scheme' => $scheme_slugs, 'color' => $scheme_colors ) );
			if ( ! empty( $check_rez ) ) {
				return array( 'status' => 'error', 'message' => $check_rez );
			}
			// Get the scheme color
			$color = '';
			if ( isset( $schemes[ $args['scheme'] ]['colors'][ $args['color'] ] ) ) {
				$color = $schemes[ $args['scheme'] ]['colors'][ $args['color'] ];
			} else {
				return array( 'status' => 'error', 'message' => sprintf( __( 'Can\'t get a "%1$s" color from the scheme "%2$s"', 'trx_addons' ), $args['color'], $args['scheme'] ) );
			}
			// Return the result
			return array(
				'success' => true,
				'message' => sprintf(
								__( 'A "%1$s" color from the scheme "%2$s" is "%3$s"', 'trx_addons'),
								$args['color'],
								$args['scheme'],
								$color
							),
				'value' => $color
			);
		}

		/**
		 * Set/Update a color in the color scheme
		 * 
		 * @param array $args - the arguments of the API call. Required fields:
		 * 						'scheme' => 'scheme_slug',
		 * 						'color' => 'bg_color|bd_color|text|text_dark|text_light|text_link|text_hover',
		 * 						'value' => 'color value'
		 * 
		 * @return string|array $output - the output of the API call. Empty string if the tool is not supported. Array if the tool is supported.
		 * 								  Format: array( 'status' => 'success|error', 'message' => 'message text' )
		 */
		private function set_scheme_color( $args ) {
			if ( ! current_user_can( 'edit_theme_options' ) ) {
				return array( 'status' => 'error', 'message' => __( 'You have no permissions to edit theme options', 'trx_addons' ) );
			}
			// Get the theme options
			$options = trx_addons_get_theme_options();
			if ( ! empty( $options['scheme_storage'] ) ) {
				$schemes = trx_addons_unserialize( $options['scheme_storage'] );
			} else {
				$schemes = trx_addons_get_theme_color_schemes();
			}
			if ( empty( $schemes ) ) {
				return array( 'status' => 'error', 'message' => __( 'Can\'t update a theme color schemes', 'trx_addons' ) );
			}

			$scheme_slugs = apply_filters( 'trx_addons_filter_ai_helper_tools_values', array_keys( $schemes ), 'scheme_color', 'scheme' );
			$scheme_colors = apply_filters( 'trx_addons_filter_ai_helper_tools_values', $this->scheme_colors, 'scheme_color', 'color' );

			$check_rez = $this->check_args( $args, array( 'scheme' => $scheme_slugs, 'color' => $scheme_colors, 'value' => true ) );
			if ( ! empty( $check_rez ) ) {
				return array( 'status' => 'error', 'message' => $check_rez );
			}
			// Set the scheme color
			if ( isset( $schemes[ $args['scheme'] ]['colors'][ $args['color'] ] ) ) {
				$schemes[ $args['scheme'] ]['colors'][ $args['color'] ] = $args['value'];
				// Update the scheme colors in the theme options
				$options['scheme_storage'] = serialize( $schemes );
				// Update the theme options
				trx_addons_update_theme_options( $options );
			} else {
				return array( 'status' => 'error', 'message' => sprintf( __( 'Can\'t set a new "%1$s" color value for the scheme "%2$s"', 'trx_addons' ), $args['color'], $args['scheme'] ) );
			}
			// Return the result
			return array(
				'success' => true,
				'message' => sprintf(
								__( 'The "%1$s" color value for the scheme "%2$s" is updated', 'trx_addons'),
								$args['color'],
								$args['scheme'],
							),
				//'value' => $color
			);
		}

	}
}
