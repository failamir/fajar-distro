<?php
class Crawlomatic_Shortcode_Scraper {

	public static $url;
	public static $query;
	public static $args;
	public static $xcache;
	public static $error;
	public static $microtime;

	public static function shortcode($atts){
        if ( is_admin() ) 
        {
            return;
        }
		$default_args = array(
			'url' => '',
			'urldecode' => 0,
            'get_page_using' => 'default',
			'on_error' => 'error_show',
			'cache' => '60',
			'output' => 'html',
			'timeout' => '3',
            'query_type' => 'auto',
			'query' => '',
			'querydecode' => 0,
            'remove_query_type' => 'none',
			'remove_query' => '',
            'replace_query_type' => 'none',  
			'replace_query' => '',
            'replace_with' => '',
            'lazy_load_tag' => '',
            'strip_links' => '0',
            'strip_internal_links' => '0',
            'strip_scripts' => '0',
            'strip_images' => '0',
            'content_percent_to_keep' => '',
            'limit_word_count' => '',
            'spin' => '',
            'translate_to' => 'disabled',
            'second_translate' => 'disabled',
            'translate_source' => '',
			'useragent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
			'charset' => get_bloginfo('charset'),
            'iframe_height' => '800',
            'headers' => '',
			'glue' => '',
			'eq' => '',
			'gt' => '',
			'lt' => '',
            'basehref' => 1,
            'a_target' => '',
            'callback_raw' => '',
			'callback' => '',
			'debug' => 0
		);
        if( !isset($atts['url']) || trim($atts['url']) == '' )
        {
            return '';
        }
        if( isset($atts['selector']) ){
            $atts['query'] = $atts['selector'];
            $atts['query_type'] = 'cssselector';
        }
        if( isset($atts['xpath']) ){
            $atts['query'] = $atts['xpath'];
            $atts['query_type'] = 'xpath';
        }
        $args = wp_parse_args( $atts, $default_args );
		$args['url'] = str_replace(array('&#038;','&#38;','&amp;'), '&', $args['url']);
		$args['headers'] = str_replace(array('&#038;','&#38;','&amp;'), '&', $args['headers']);
		if($args['urldecode'] == 1) {
			$args['url'] = urldecode($args['url']);
            if( isset($args['headers']) )
            	$args['headers'] = urldecode($args['headers']);
		}
		if($args['querydecode'] == 1){
			$args['query'] = urldecode($args['query']);
            if( isset($args['remove_query']) )
                $args['remove_query'] = urldecode($args['remove_query']);
            if( isset($args['replace_query']) )
                $args['replace_query'] = urldecode($args['replace_query']);            
        }
        if($args['query_type'] == 'iframe')
        {
            if($args['iframe_height'] != '')
            {
                $ht = ' height="' . esc_html(trim($args['iframe_height'])) . '" ';
            }
            else
            {
                $ht = ' ';
            }
            return '<div class="ifr-container">
 <iframe class="ifr-iframe"
  width="100%"' . $ht . 'src="' . esc_url($args['url']) . '"
  frameborder="0" allowfullscreen=""></iframe>
</div>';
        }
		return Crawlomatic_Shortcode_Scraper::get_content($args['url'], $args['query'], $args);
	}

	public static function get_content($url, $query = '', $args = array()) {
		
        $mt_start = microtime(true);
        require_once (dirname(__FILE__) . "/class.crawlomatic.parser.php");
		
		// Resolving ___QUERY_STRING___ and ___(.*?)___ in $url and $args['headers']
		if( strpos($url, '__') !== false)
			if( strpos($url, '___QUERY_STRING___') !== false )
				$url = str_replace('___QUERY_STRING___', $_SERVER['QUERY_STRING'], $url);
			else
				$url = preg_replace_callback('/___(.*?)___/', function($matches) {return $_REQUEST[$matches[1]];}, $url);

		if( isset($args['headers']) && strpos($args['headers'], '__') !== false)
			if( strstr($args['headers'], '___QUERY_STRING___') )
				$args['headers'] = str_replace('___QUERY_STRING___', $_SERVER['QUERY_STRING'], $args['headers']);
			else
				$args['headers'] = preg_replace_callback('/___(.*?)___/', function($matches) {return $_REQUEST[$matches[1]];}, $args['headers']);
		
		$default_args = Crawlomatic_Shortcode_Scraper::get_default_content_args();
		Crawlomatic_Shortcode_Scraper::$url = $url;
		Crawlomatic_Shortcode_Scraper::$query = $query;
		Crawlomatic_Shortcode_Scraper::$args = wp_parse_args( $args, $default_args );
		Crawlomatic_Shortcode_Scraper::$error = null;
		$response = Crawlomatic_Shortcode_Scraper::remote_request($url, Crawlomatic_Shortcode_Scraper::$args);
		if( $response !== false && !is_wp_error( $response ) ) 
        {
            if(Crawlomatic_Shortcode_Scraper::$args['charset'] == '')
            {
                Crawlomatic_Shortcode_Scraper::$args['charset'] = get_bloginfo('charset');
            }
			$crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $response['body'], Crawlomatic_Shortcode_Scraper::$args['charset'] );
			Crawlomatic_Shortcode_Scraper::$xcache = $response['headers']['X-Crawlomatic-Cache-Control'];
			$content = '';
            if($query === '' && Crawlomatic_Shortcode_Scraper::$args['query_type'] !== 'auto')
            {
				$content = $response['body'];
			} 
            else 
            {
                if(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'full')
                {
					$content = $response['body'];
                }
                else
                {
                    if(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'cssselector')
                    {
                        $crawlomatic_parser->parse_selector( $query );
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'class')
                    {
                        $class_expr = explode(',', $query);
                        foreach($class_expr as $class_query)
                        {
                            $class_query = trim($class_query);
                            $xcontent = $crawlomatic_parser->parse_xpath( '//*[contains(@class, "' . $class_query . '")]' );
                            if(is_array($xcontent))
                            {
                                foreach($xcontent as $cpart)
                                {
                                    $content .= $cpart . ' ';
                                }
                            }
                        }
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'id')
                    {
                        $id_expr = explode(',', $query);
                        foreach($id_expr as $id_query)
                        {
                            $id_query = trim($id_query);
                            $xcontent = $crawlomatic_parser->parse_xpath( '//*[@id="' . $id_query . '"]' );
                            if(is_array($xcontent))
                            {
                                foreach($xcontent as $cpart)
                                {
                                    $content .= $cpart . ' ';
                                }
                            }
                        }
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'xpath')
                    {
                        $crawlomatic_parser->parse_xpath( $query );
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'regex')
                    {
                        $crawlomatic_parser->parse_regex( $query );                
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'regexmatch')
                    {
                        $crawlomatic_parser->parse_regex_match( $query );                
                    }
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] === 'auto')
                    {
                        $crawlomatic_parser->parse_auto();                
                    }
                    if($crawlomatic_parser->error !== null)
                    {
                        Crawlomatic_Shortcode_Scraper::$error = "Error parsing: ".$crawlomatic_parser->error;
                    } 
                    elseif(version_compare(PHP_VERSION, '5.3.3', '<'))
                    {
                        Crawlomatic_Shortcode_Scraper::$error = "Error parsing: PHP version 5.3.3 or greater is required for parsing";
                    } 
                    elseif(Crawlomatic_Shortcode_Scraper::$args['query_type'] !== 'class' && Crawlomatic_Shortcode_Scraper::$args['query_type'] !== 'id')
                    {
                        $content = $crawlomatic_parser->result;
                    }
                    else
                    {
                        $content = trim($content);
                    }
                }
			}
		} 
        elseif(is_wp_error( $response )) 
        {
			Crawlomatic_Shortcode_Scraper::$error = "Error fetching: " . $response->get_error_message();
		}
        else
        {
            Crawlomatic_Shortcode_Scraper::$error = "Failed to fetch URL: " . $url;
        }
        $ob_header = '';
        $ob_footer = '';
        if ( Crawlomatic_Shortcode_Scraper::$args['debug'] == 1 )
        {
            $ob_header = PHP_EOL .
                    '<!--' . PHP_EOL .
                    ' Start of web scrap (created by crawlomatic-multipage-scraper-post-generator)' . PHP_EOL .
                    ' Source URL: ' . Crawlomatic_Shortcode_Scraper::$url . PHP_EOL .
                    ' Query: '. Crawlomatic_Shortcode_Scraper::$query . ' (' . Crawlomatic_Shortcode_Scraper::$args['query_type'] . ')' . PHP_EOL .
                    ' Other options: ' . print_r(Crawlomatic_Shortcode_Scraper::$args, true) . '-->' . PHP_EOL;
            $ob_footer =  PHP_EOL .
                    '<!--' . PHP_EOL .
                    ' End of web scrap' . PHP_EOL .
                    ' Crawlomatic Cache Control: ' . Crawlomatic_Shortcode_Scraper::$xcache . PHP_EOL .
                    ' Computing time: ' . round(microtime(true) - $mt_start, 4) . ' seconds' . PHP_EOL .
                    '-->' . PHP_EOL;
        } 
		if (Crawlomatic_Shortcode_Scraper::$error === null) 
        {
			$ob_body = Crawlomatic_Shortcode_Scraper::filter_content($content, Crawlomatic_Shortcode_Scraper::$args, $url);
		} 
        else 
        {
			if ( Crawlomatic_Shortcode_Scraper::$args['on_error'] === 'error_hide' )
            {
				$ob_body = '';
            } 
            elseif ( Crawlomatic_Shortcode_Scraper::$args['on_error'] === 'error_show' )
            {
				$ob_body = Crawlomatic_Shortcode_Scraper::$error;
            } 
            elseif ( !empty( Crawlomatic_Shortcode_Scraper::$args['on_error'] ) )
            {
				$ob_body = Crawlomatic_Shortcode_Scraper::$args['on_error'];	
            }
		}
        return $ob_header . $ob_body . $ob_footer;
	}
	
	public static function filter_content($content, $response_args, $url){
        
        // Callback (Raw)
        if( $response_args['callback_raw'] !== '' && is_callable( $response_args['callback_raw'] ) === true )
            $content = call_user_func( $response_args['callback_raw'], $content);
        
        // Filtering if $content is an array (via parser)
        if( is_array($content) ){
		
            $i = array();

            // Get $i based on eq
            if( $response_args['eq'] !== '' ){
                if( strtolower( $response_args['eq'] ) === 'last' ) 
                    $i[] = count( $content ) - 1;
                if( strtolower( $response_args['eq'] ) === 'first' ) 
                    $i[] = 0;
                if( is_numeric( $response_args['eq'] ) === true )
                    $i[] = round( $response_args['eq'] );
            }

            // Get $i based on gt & lt both
            if( ($response_args['gt'] !== '' && is_numeric( $response_args['gt'] )) && ($response_args['lt'] !== '' && is_numeric( $response_args['lt'] )) && (round( $response_args['gt'] ) < round( $response_args['lt'] )) )
                for ($j = round( $response_args['gt'] ) + 1; $j <= round( $response_args['lt'] ) - 1; $j++)
                    $i[] = $j;            

            // Get $i based on gt only
            if( ($response_args['gt'] !== '' && is_numeric( $response_args['gt'] )) && ($response_args['lt'] == '' || !is_numeric( $response_args['lt'] )) )
                for ($j = round( $response_args['gt'] ) + 1; $j <= count($content); $j++)
                    $i[] = $j;

            // Get $i based on lt only
            if( ($response_args['lt'] !== '' && is_numeric( $response_args['lt'] )) && ($response_args['gt'] == '' || !is_numeric( $response_args['gt'] )) )
                for ($j = min( round( $response_args['lt'] ) - 1, count($content) ); $j >= 0; $j--)
                    $i[] = $j;                

            // Filter based on eq, gt or lt
            if(!empty($i)){
                foreach($content as $key => $value)
                    if(in_array($key, $i))
                        $filtered_content[] = $value;
                $content = $filtered_content;
            }

            // Output format
            if( strtolower( $response_args['output'] ) === 'text')
                foreach($content as $key => $value)
                {
                    $content[$key] = nl2br(trim(strip_tags($value)));
                    $content[$key] = preg_replace('#<br\s*\/?>[\s]*(?:<br\s*\/?>\s*)+#','<br/><br/>', $content[$key]);
                }
            if($response_args['glue'] == '')
            {
                $response_args['glue'] = PHP_EOL;
            }
            $content = implode($response_args['glue'], $content);
            
        }
        $lazy_tag = $response_args['lazy_load_tag'];
        if (trim($lazy_tag) != '' && trim($lazy_tag) != 'src' && strstr($content, trim($lazy_tag)) !== false) 
        {
            $lazy_tag = trim($lazy_tag);
            preg_match_all('{<img .*?>}s', $content, $imgsMatchs);
            if(isset($imgsMatchs[0]))
            {
                $imgsMatchs = $imgsMatchs[0];
                foreach($imgsMatchs as $imgMatch){
                    if(stristr($imgMatch, $lazy_tag )){
                        $newImg = $imgMatch;
                        $newImg = preg_replace('{ src=".*?"}', '', $newImg);
                        $newImg = str_replace($lazy_tag, 'src', $newImg);   
                        $content = str_replace($imgMatch, $newImg, $content);      
                    }
                }
            }
            preg_match_all('{<iframe .*?>}s', $content, $imgsMatchs);
            if(isset($imgsMatchs[0]))
            {
                $imgsMatchs = $imgsMatchs[0];
                if(is_array($imgsMatchs))
                {
                    foreach($imgsMatchs as $imgMatch){
                        if(stristr($imgMatch, $lazy_tag )){
                            $newImg = $imgMatch;
                            $newImg = preg_replace('{ src=["\'].*?[\'"]}', '', $newImg);
                            $newImg = str_replace($lazy_tag, 'src', $newImg);   
                            $content = str_replace($imgMatch, $newImg, $content);                          
                        }
                    }
                }
            }
        }
        if ($response_args['strip_links'] == '1') 
        {
            $content = crawlomatic_strip_links($content);
        }
        if ($response_args['strip_images'] == '1') 
        {
            $content = crawlomatic_strip_images($content);
        }
        if ($response_args['strip_internal_links'] == '1') 
        {
            $content = crawlomatic_strip_external_links($content, $url);
        }
        if ($response_args['strip_scripts'] == '1') 
        {
            $content = preg_replace('{<script[\s\S]*?\/\s?script>}s', '', $content);
            $content = preg_replace('{<ins.*?ins>}s', '', $content);
            $content = preg_replace('{<ins.*?>}s', '', $content);
            $content = preg_replace('{\(adsbygoogle.*?\);}s', '', $content);
        }
        $my_url  = parse_url($url);
        $my_host = $my_url['host'];
        preg_match_all('{src[\s]*=[\s]*["|\'](.*?)["|\'].*?>}is', $content , $matches);
        $img_srcs =  ($matches[1]);
        foreach ($img_srcs as $img_src){
            $original_src = $img_src;
            if(stristr($img_src, '../')){
                $img_src = str_replace('../', '', $img_src);
            }
            if(stristr($img_src, 'http:') === FALSE && stristr($img_src, 'www.') === FALSE && stristr($img_src, 'https:') === FALSE && stristr($img_src, 'data:image') === FALSE)
            {
                $img_src = trim($img_src);
                if(preg_match('{^//}', $img_src)){
                    $img_src = 'http:'.$img_src;
                }elseif( preg_match('{^/}', $img_src) ){
                    $img_src = 'http://'.$my_host.$img_src;
                }else{
                    $img_src = 'http://'.$my_host.'/'.$img_src;
                }
                $reg_img = '{["|\'][\s]*'.preg_quote($original_src,'{').'[\s]*["|\']}s';
                $content = preg_replace( $reg_img, '"'.$img_src.'"', $content);
            }
        }
        $content = str_replace('href="../', 'href="http://'.$my_host.'/', $content);
        $content = preg_replace('{href="/(\w)}', 'href="http://'.$my_host.'/$1', $content);
        $content = preg_replace('{srcset=".*?"}', '', $content);
        $content = preg_replace('{sizes=".*?"}', '', $content);
        $content_percent = $response_args['content_percent_to_keep'];
        if($content_percent != '' && is_numeric($content_percent))
        {
            $temp_t = crawlomatic_strip_html_tags($content);
            $temp_t = str_replace('&nbsp;',"",$temp_t);
            $ccount = str_word_count($temp_t);
            if($ccount > 10)
            {
                $str_count = strlen($content);
                $leave_cont = round($str_count * $content_percent / 100);
                $content = crawlomatic_substr_close_tags($content, $leave_cont);
            }
            else
            {
                $ccount = crawlomatic_count_unicode_words($temp_t);
                if($ccount > 10)
                {
                    $str_count = strlen($content);
                    $leave_cont = round($str_count * $content_percent / 100);
                    $content = crawlomatic_substr_close_tags($content, $leave_cont);
                }
            }
        }
        $limit_word_count = $response_args['limit_word_count'];
        if ($limit_word_count !== "") {
            $content = crawlomatic_custom_wp_trim_excerpt($content, $limit_word_count, '', ' ');
        }
        if(Crawlomatic_Shortcode_Scraper::$args['charset'] == '')
        {
            Crawlomatic_Shortcode_Scraper::$args['charset'] = get_bloginfo('charset');
        }
        
        // Dom Parser
        $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
        
        // Remove
        if( $response_args['remove_query'] !== '' ){
            if( $response_args['remove_query_type'] === 'regex' )
            {
                $content = preg_replace( $response_args['remove_query'], '', $content);
            }
            elseif( $response_args['remove_query_type'] === 'cssselector' )
            {
                $content = $crawlomatic_parser->replace_selector( $response_args['remove_query'], '' );
            }
            elseif( $response_args['remove_query_type'] === 'xpath' )
            {
                $content = $crawlomatic_parser->replace_xpath( $response_args['remove_query'], '' );
            }
            elseif( $response_args['remove_query_type'] === 'class' )
            {
                $class_expr = explode(',', $response_args['remove_query']);
                foreach($class_expr as $class_rem)
                {
                    $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
                    $class_rem = trim($class_rem);
                    $content = $crawlomatic_parser->replace_xpath( '//*[contains(@class, "' . $class_rem . '")]', '' );
                }
            }
            elseif( $response_args['remove_query_type'] === 'id' )
            {
                $id_expr = explode(',', $response_args['remove_query']);
                foreach($id_expr as $id_rem)
                {
                    $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
                    $id_rem = trim($id_rem);
                    $content = $crawlomatic_parser->replace_xpath( '//*[@id="' . $id_rem . '"]', '' );
                }
            }
            $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
        }
        // Replace
        if( $response_args['replace_query'] !== '' ){
            if( $response_args['replace_query_type'] === 'regex' ){
                $replace_query = $response_args['replace_query'];
                $replace_with = $response_args['replace_with'];
                if(is_array( unserialize( urldecode($replace_query) ) ) )
                    $replace_query = unserialize( urldecode($replace_query) );
                if(is_array( unserialize( urldecode($replace_with) ) ) )
                    $replace_with = unserialize( urldecode($replace_with) );            
                $content = preg_replace( $replace_query, $replace_with, $content);
            }
            elseif( $response_args['replace_query_type'] === 'cssselector' )
            {
                $content = $crawlomatic_parser->replace_selector( $response_args['replace_query'], $response_args['replace_with'] );
            }
            elseif( $response_args['replace_query_type'] === 'xpath' )
            {
                $content = $crawlomatic_parser->replace_xpath( $response_args['replace_query'], $response_args['replace_with'] );
            }
            elseif( $response_args['replace_query_type'] === 'class' )
            {
                $class_expr = explode(',', $response_args['replace_query']);
                foreach($class_expr as $class_rem)
                {
                    $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
                    $class_rem = trim($class_rem);
                    $content = $crawlomatic_parser->replace_xpath( '//*[contains(@class, "' . $class_rem . '")]', $response_args['replace_with'] );
                }
            }
            elseif( $response_args['replace_query_type'] === 'id' )
            {
                $id_expr = explode(',', $response_args['replace_query']);
                foreach($id_expr as $id_rem)
                {
                    $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );
                    $id_rem = trim($id_rem);
                    $content = $crawlomatic_parser->replace_xpath( '//*[@id="' . $id_rem . '"]', $response_args['replace_with'] );
                }
            }
            $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] );   
        }   
        
        // Basehref
        if( $response_args['basehref'] ){
            if( is_numeric( $response_args['basehref'] ) === false ){
                $base = $response_args['basehref'];
            } else {
                $base = Crawlomatic_Shortcode_Scraper::$url;
            }
            if( $response_args['basehref'] != 0 ){
                if( $response_args['output'] == 'text' ){
                    $content = str_replace(array('<p>','</p>'), '', $crawlomatic_parser->basehref($base));
                } else {
                    $content =  $crawlomatic_parser->basehref($base);
                }
                $crawlomatic_parser = new Crawlomatic_Shortcode_Scraper_Parser( $content, Crawlomatic_Shortcode_Scraper::$args['charset'] ); 
            }
        }     
       
        // a target="_blank"
        if( $response_args['a_target'] )
            $content = $crawlomatic_parser->a_target($response_args['a_target']);

        // Callback
        if( $response_args['callback'] !== '' && is_callable( $response_args['callback'] ) === true )
            $content = call_user_func( $response_args['callback'], $content);        
        
        if($response_args['spin'] || ($response_args['translate_to'] != '' && $response_args['translate_to'] != 'disabled'))
        {
            $transientname = 's' . md5($url . $content . $response_args['spin'] . $response_args['translate_to']);
            if ( get_transient($transientname) === false || $response_args['cache'] == 0 )
            {
                $spinned_trans = crawlomatic_spin_and_translate_shortcode($content, $response_args['spin'], $response_args['translate_to'], $response_args['translate_source'], '1', $response_args['second_translate']);
                if($spinned_trans != $content)
                {
                    set_transient($transientname, $spinned_trans, intval($response_args['cache']) * 60 );
                    $content = $spinned_trans;
                }
            }
            else
            {
                $content = get_transient($transientname);
            }
        }
        return $content;
			
	}

	public static function remote_request($url, $request_args = array()) 
    {
        $response = array();
		$transient = md5($url);
		if ( get_transient($transient) === false || $request_args['cache'] == 0 ) 
        {
            $got_phantom = false;
            if(!isset($request_args['custom_cookies']))
            {
                $request_args['custom_cookies'] = '';
            }
            if(!isset($request_args['useragent']))
            {
                $request_args['useragent'] = '';
            }
            if(!isset($request_args['use_proxy']))
            {
                $request_args['use_proxy'] = '';
            }
            if(!isset($request_args['user_pass']))
            {
                $request_args['user_pass'] = '';
            }
            if($request_args['get_page_using'] != 'default')
            {
                if($request_args['get_page_using'] == 'phantomjs')
                {
                    $use_phantom = '1';
					$phchecked = get_transient('crawlomatic_phantom_check');
                    if($phchecked === false)
                    {
						$phantom = crawlomatic_testPhantom();
						if($phantom === 0)
						{
							crawlomatic_log_to_file('[Shortcode] PhantomJS not found! Please install it on your server or configure the path to it from plugin\'s \'Main Settings\'.');
							$use_phantom = '0';
						}
						elseif($phantom === -1)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not enabled on your server. Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
						elseif($phantom === -2)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not allowed to run on your server (in disable_functions list in php.ini). Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
					}
                    if($use_phantom == '1')
                    {
                        $html_cont = crawlomatic_get_page_PhantomJS($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '');
                        if($html_cont !== false)
                        {
                            $got_phantom = true;
                        }
                    }
                }
                elseif($request_args['get_page_using'] == 'puppeteer')
                {
					$use_phantom = '1';
					$phchecked = get_transient('crawlomatic_puppeteer_check');
					if($phchecked === false)
					{
						$phantom = crawlomatic_testPuppeteer();
						if($phantom === 0)
						{
							crawlomatic_log_to_file('[Shortcode] Puppeteer not found! Please install it on your server globally.');
							$use_phantom = '0';
						}
						elseif($phantom === -1)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not enabled on your server. Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
						elseif($phantom === -2)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not allowed to run on your server (in disable_functions list in php.ini). Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
						else
						{
							set_transient('crawlomatic_puppeteer_check', '1', 2592000);
						}
					}
					if($use_phantom == '1')
                    {
						$html_cont = crawlomatic_get_page_Puppeteer($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '');
						if($html_cont !== false)
						{
							$got_phantom = true;
						}
					}
                }
                elseif($request_args['get_page_using'] == 'tor')
                {
					$use_phantom = '1';
					$phchecked = get_transient('crawlomatic_tor_check');
					if($phchecked === false)
					{
						$phantom = crawlomatic_testTor();
						if($phantom === 0)
						{
							crawlomatic_log_to_file('[Shortcode] Puppeteer not found! Please install it on your server globally (also Tor).');
							$use_phantom = '0';
						}
						elseif($phantom === -1)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not enabled on your server. Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
						elseif($phantom === -2)
						{
							crawlomatic_log_to_file('[Shortcode] shell_exec is not allowed to run on your server (in disable_functions list in php.ini). Please enable it and retry using this feature of the plugin.');
							$use_phantom = '0';
						}
						else
						{
							set_transient('crawlomatic_tor_check', '1', 2592000);
						}
					}
					if($use_phantom == '1')
                    {
						$html_cont = crawlomatic_get_page_Tor($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '');
						if($html_cont !== false)
						{
							$got_phantom = true;
						}
					}
                }
                elseif($request_args['get_page_using'] == 'headlessbrowserapipuppeteer')
                {
                    $html_cont = crawlomatic_get_page_PuppeteerAPI($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '', '', '', '');
                    if($html_cont !== false)
                    {
                        $got_phantom = true;
                    }
                }
                elseif($request_args['get_page_using'] == 'headlessbrowserapitor')
                {
                    $html_cont = crawlomatic_get_page_TorAPI($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '', '', '', '');
                    if($html_cont !== false)
                    {
                        $got_phantom = true;
                    }
                }
                elseif($request_args['get_page_using'] == 'headlessbrowserapiphantomjs')
                {
                    $html_cont = crawlomatic_get_page_PhantomJSAPI($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '', '');
                    if($html_cont !== false)
                    {
                        $got_phantom = true;
                    }
                }
                elseif($request_args['get_page_using'] == 'wp_remote_request')
                {
                    if($request_args['custom_cookies'] != '')
                    {
                        $cook = http_parse_cookie($request_args['custom_cookies']);
                        if($cook !== false)
                        {
                            $cookies = [];
                            foreach($cook->cookies as $name => $cx)
                            {
                                $cookies[] = new WP_Http_Cookie( array(
                                    'name'  => $name,
                                    'value' => $cx,
                                ));
                            }
                            $request_args['cookies'] = $cookies;
                        }
                    }
                    if($request_args['user_pass'] != '')
                    {
                        $har = explode(':', $request_args['user_pass']);
                        if(isset($har[1]))
                        {
                            $request_args['headers']['Authorization'] = 'Basic ' . base64_encode( $request_args['user_pass'] );
                        }
                    }
                    $request_args['user-agent'] = $request_args['useragent'];
                    $response = wp_remote_request($url, $request_args);
                    if( !is_wp_error( $response ) ) 
                    {
                        $html_cont = true;
                        $got_phantom = true;
                    }
                }
            }
            if($got_phantom == false)
            {
                $html_cont = crawlomatic_get_web_page($url, $request_args['custom_cookies'], $request_args['useragent'], $request_args['use_proxy'], $request_args['user_pass'], $request_args['timeout'], '', '');
            }
			if( $html_cont !== false ) 
            {
                if($html_cont === true)
                {
                    if($request_args['cache'] != 0)
                    {
                        set_transient($transient, $response['body'], intval($request_args['cache']) * 60 );
                    }
                    $response['headers']['X-Crawlomatic-Cache-Control'] = 'Remote-fetched';
                }
                else
                {
                    if($request_args['cache'] != 0)
                    {
                        set_transient($transient, $html_cont, intval($request_args['cache']) * 60 );
                    }
                    $response = array();
                    $response['body'] = $html_cont;
                    $response['headers']['X-Crawlomatic-Cache-Control'] = 'Remote-fetched';
                }
				return $response;
			}
            else 
            {
                return new WP_Error('crawlomatic_request_failed', 'Failed to reach website: ' . $url);
			}
		} 
        else 
        {
			$cache = array();
            $loaded = get_transient($transient);
            $cache['body'] = $loaded;
			$cache['headers']['X-Crawlomatic-Cache-Control'] = 'Cache-hit Transients API';
			return $cache;
		}
	}
	
	public static function get_default_content_args(){
		$default_args = array(			
		);
		return $default_args;
		
	} 

}