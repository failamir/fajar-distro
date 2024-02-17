<?php

namespace ThemeRex\ModelsLab;

use ThemeRex\Ai\Api;

class Images extends Api {

	private static string $api_server  = "https://modelslab.com";	// URL to the API server
	private static string $site_server = "https://modelslab.com";	// URL to the site server
	private string $scheduler = "DDPMScheduler";
	private string $default_sd_endpoint = '';

	public function __construct( $api_key = '' )	{
		parent::__construct( $api_key );

		$this->setAuthMethod( 'Argument', 'key' );
		$this->setHeaders( array( 'Accept: application/json' ) );

		if ( empty( $this->default_sd_endpoint ) ) {
			$this->default_sd_endpoint = trx_addons_get_option( 'ai_helper_default_api_stabble_diffusion', 'v6' ) == 'v6' ? 'v6/realtime' : 'v3';
		}
	}

	/**
	 * Return a base URL to the vendor site
	 * 
	 * @param string $endpoint  The endpoint to use
	 * @param string $type  The type of the URL: api, site. Default: api
	 * 
	 * @return string  The URL to the vendor site
	 */
	public static function baseUrl( $endpoint = '', $type = 'api' ) {
		return ( $type == 'api' ? self::$api_server : self::$site_server ) . ( ! empty( $endpoint ) ? "/{$endpoint}" : '' );
	}

	/**
	 * Return an URL to the API
	 * 
	 * @return string  The URL to the API
	 */
	public function apiUrl( $endpoint ) {
		return self::baseUrl( "api/{$endpoint}" );
	}

	private function checkArgs( $args ) {
		if ( ! empty( $args['model_id'] ) && empty( $args['scheduler'] ) ) {
			$args['scheduler'] = $this->scheduler;
		}
		return apply_filters( 'trx_addons_filter_ai_helper_check_args', $args, 'modelslab' );
	}

	/**
	 * Return a list of available models
	 * 
	 * @return bool|string  The response from the API
	 */
	public function listModels( $opts ) {
		$url = $this->apiUrl( 'v4/dreambooth/model_list' );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

	/**
	 * Generate an image from a text prompt
	 * 
	 * @param array $opts  The options for the request
	 * 
	 * @return bool|string  The response from the API
	 */
	public function textToImage( $opts ) {
		$url = $this->apiUrl( ! empty( $opts['model_id'] ) ? 'v6/images/text2img' : "{$this->default_sd_endpoint}/text2img" );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

	/**
	 * Generate an image from another image
	 * 
	 * @param array $opts  The options for the request
	 * 
	 * @return bool|string  The response from the API
	 */
	public function imageToImage( $opts ) {
		$url = $this->apiUrl( ! empty( $opts['model_id'] ) ? 'v6/images/img2img' : "{$this->default_sd_endpoint}/img2img" );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

	/**
	 * Upscale the image
	 * 
	 * @param array $opts  The options for the request
	 * 
	 * @return bool|string  The response from the API
	 */
	public function imageUpscale( $opts ) {
		$url = $this->apiUrl( 'v6/image_editing/super_resolution' );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

	/**
	 * Edit an image with a mask and another image
	 * 
	 * @param array $opts  The options for the request
	 * 
	 * @return bool|string  The response from the API
	 */
	public function imageInpaint( $opts ) {
		$url = $this->apiUrl( ! empty( $opts['model_id'] ) ? 'v6/images/inpaint' : "{$this->default_sd_endpoint}/inpaint" );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

	/**
	 * Fetch queued images
	 * 
	 * @param array $opts  The options for the request
	 * 
	 * @return bool|string  The response from the API
	 */
	public function fetchImages( $opts ) {
		if ( ! empty( $opts['fetch_url'] ) ) {
			$url = $this->apiUrl( $opts['fetch_url'] );
			unset( $opts['fetch_url'] );
		} else if ( ! empty( $opts['model_id'] ) ) {
			$url = $this->apiUrl( 'v6/images/fetch' );
			$opts['request_id'] = $opts['fetch_id'];
			// unset( $opts['model_id'] );
		} else {
			$url = $this->apiUrl( "{$this->default_sd_endpoint}/fetch/{$opts['fetch_id']}" );
		}
		unset( $opts['fetch_id'] );
		return $this->sendRequest( $url, 'POST', $this->checkArgs( $opts ) );
	}

}
