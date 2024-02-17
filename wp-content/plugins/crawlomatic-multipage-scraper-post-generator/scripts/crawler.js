"use strict"; 
var { registerBlockType } = wp.blocks;
var gcel = wp.element.createElement;

registerBlockType( 'crawlomatic-multipage-scraper-post-generator/crawlomatic-scraper', {
    title: 'Crawlomatic Scraper',
    icon: 'admin-site-alt3',
    category: 'embed',
    attributes: {
        url : {
            default: '',
            type:   'string',
        },
        urldecode : {
            default: '0',
            type:   'string',
        },
        get_page_using : {
            default: 'default',
            type:   'string',
        },
        on_error : {
            default: 'error_show',
            type:   'string',
        },
        cache : {
            default: '60',
            type:   'string',
        },
        output : {
            default: 'html',
            type:   'string',
        },
        timeout : {
            default: '3',
            type:   'string',
        },
        query_type : {
            default: 'auto',
            type:   'string',
        },
        query : {
            default: '',
            type:   'string',
        },
        querydecode : {
            default: '0',
            type:   'string',
        },
        remove_query_type : {
            default: 'none',
            type:   'string',
        },
        remove_query : {
            default: '',
            type:   'string',
        },
        replace_query_type : {
            default: 'none',
            type:   'string',
        },
        replace_query : {
            default: '',
            type:   'string',
        },
        replace_with : {
            default: '',
            type:   'string',
        },
        lazy_load_tag : {
            default: '',
            type:   'string',
        },
        strip_links : {
            default: '0',
            type:   'string',
        },
        strip_internal_links : {
            default: '0',
            type:   'string',
        },
        strip_scripts : {
            default: '0',
            type:   'string',
        },
        strip_images : {
            default: '0',
            type:   'string',
        },
        content_percent_to_keep : {
            default: '',
            type:   'string',
        },
        limit_word_count : {
            default: '',
            type:   'string',
        },
        spin : {
            default: '',
            type:   'string',
        },
        translate_to : {
            default: '',
            type:   'string',
        },
        second_translate : {
            default: '',
            type:   'string',
        },
        translate_source : {
            default: 'auto',
            type:   'string',
        },
        useragent : {
            default: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
            type:   'string',
        },
        charset : {
            default: '',
            type:   'string',
        },
        iframe_height : {
            default: '800',
            type:   'string',
        },
        headers : {
            default: '',
            type:   'string',
        },
        glue : {
            default: '',
            type:   'string',
        },
        eq : {
            default: '',
            type:   'string',
        },
        gt : {
            default: '',
            type:   'string',
        },
        lt : {
            default: '',
            type:   'string',
        },
        basehref : {
            default: '',
            type:   'string',
        },
        a_target : {
            default: '',
            type:   'string',
        },
        callback_raw : {
            default: '',
            type:   'string',
        },
        callback : {
            default: '',
            type:   'string',
        },
        debug : {
            default: '0',
            type:   'string',
        }
    },
    keywords: ['crawl', 'scrape', 'crawlomatic'],
    edit: (function( props ) {
		var url = props.attributes.url;
        var urldecode = props.attributes.urldecode;
        var get_page_using = props.attributes.get_page_using;
        var on_error = props.attributes.on_error;
        var cache = props.attributes.cache;
        var output = props.attributes.output;
        var timeout = props.attributes.timeout;
        var query_type = props.attributes.query_type;
        var query = props.attributes.query;
        var querydecode = props.attributes.querydecode;
        var remove_query_type = props.attributes.remove_query_type;
        var remove_query = props.attributes.remove_query;
        var replace_query_type = props.attributes.replace_query_type;
        var replace_query = props.attributes.replace_query;
        var replace_with = props.attributes.replace_with;
        var lazy_load_tag = props.attributes.lazy_load_tag;
        var strip_links = props.attributes.strip_links;
        var strip_internal_links = props.attributes.strip_internal_links;
        var strip_scripts = props.attributes.strip_scripts;
        var strip_images = props.attributes.strip_images;
        var content_percent_to_keep = props.attributes.content_percent_to_keep;
        var limit_word_count = props.attributes.limit_word_count;
        var spin = props.attributes.spin;
        var translate_to = props.attributes.translate_to;
        var second_translate = props.attributes.second_translate;
        var translate_source = props.attributes.translate_source;
        var useragent = props.attributes.useragent;
        var charset = props.attributes.charset;
        var iframe_height = props.attributes.iframe_height;
        var headers = props.attributes.headers;
        var glue = props.attributes.glue;
        var eq = props.attributes.eq;
        var gt = props.attributes.gt;
        var lt = props.attributes.lt;
        var basehref = props.attributes.basehref;
        var a_target = props.attributes.a_target;
        var callback_raw = props.attributes.callback_raw;
        var callback = props.attributes.callback;
        var debug = props.attributes.debug;
		function updateMessage( event ) {
            props.setAttributes( { url: event.target.value} );
		}
        function updateMessage2( event ) {
            props.setAttributes( { urldecode: event.target.value} );
		}
        function updateMessage3( event ) {
            props.setAttributes( { get_page_using: event.target.value} );
		}
        function updateMessage4( event ) {
            props.setAttributes( { on_error: event.target.value} );
		}
        function updateMessage5( event ) {
            props.setAttributes( { cache: event.target.value} );
		}
        function updateMessage6( event ) {
            props.setAttributes( { output: event.target.value} );
		}
        function updateMessage7( event ) {
            props.setAttributes( { timeout: event.target.value} );
		}
        function updateMessage8( event ) {
            props.setAttributes( { query_type: event.target.value} );
		}
        function updateMessage9( event ) {
            props.setAttributes( { query: event.target.value} );
		}
        function updateMessage10( event ) {
            props.setAttributes( { querydecode: event.target.value} );
		}
        function updateMessage11( event ) {
            props.setAttributes( { remove_query_type: event.target.value} );
		}
        function updateMessage12( event ) {
            props.setAttributes( { remove_query: event.target.value} );
		}
        function updateMessage13( event ) {
            props.setAttributes( { replace_query_type: event.target.value} );
		}
        function updateMessage14( event ) {
            props.setAttributes( { replace_query: event.target.value} );
		}
        function updateMessage15( event ) {
            props.setAttributes( { replace_with: event.target.value} );
		}
        function updateMessage16( event ) {
            props.setAttributes( { lazy_load_tag: event.target.value} );
		}
        function updateMessage17( event ) {
            props.setAttributes( { strip_links: event.target.value} );
		}
        function updateMessage18( event ) {
            props.setAttributes( { strip_internal_links: event.target.value} );
		}
        function updateMessage19( event ) {
            props.setAttributes( { strip_scripts: event.target.value} );
		}
        function updateMessage20( event ) {
            props.setAttributes( { strip_images: event.target.value} );
		}
        function updateMessage21( event ) {
            props.setAttributes( { content_percent_to_keep: event.target.value} );
		}
        function updateMessage22( event ) {
            props.setAttributes( { spin: event.target.value} );
		}
        function updateMessage23( event ) {
            props.setAttributes( { translate_to: event.target.value} );
		}
        function updateMessage24( event ) {
            props.setAttributes( { translate_source: event.target.value} );
		}
        function updateMessage25( event ) {
            props.setAttributes( { useragent: event.target.value} );
		}
        function updateMessage26( event ) {
            props.setAttributes( { charset: event.target.value} );
		}
        function updateMessage27( event ) {
            props.setAttributes( { iframe_height: event.target.value} );
		}
        function updateMessage28( event ) {
            props.setAttributes( { headers: event.target.value} );
		}
        function updateMessage29( event ) {
            props.setAttributes( { glue: event.target.value} );
		}
        function updateMessage30( event ) {
            props.setAttributes( { eq: event.target.value} );
		}
        function updateMessage31( event ) {
            props.setAttributes( { gt: event.target.value} );
		}
        function updateMessage32( event ) {
            props.setAttributes( { lt: event.target.value} );
		}
        function updateMessage33( event ) {
            props.setAttributes( { basehref: event.target.value} );
		}
        function updateMessage34( event ) {
            props.setAttributes( { a_target: event.target.value} );
		}
        function updateMessage35( event ) {
            props.setAttributes( { callback_raw: event.target.value} );
		}
        function updateMessage36( event ) {
            props.setAttributes( { callback: event.target.value} );
		}
        function updateMessage37( event ) {
            props.setAttributes( { debug: event.target.value} );
		}
        function updateMessage38( event ) {
            props.setAttributes( { limit_word_count: event.target.value} );
		}
        function updateMessage39( event ) {
            props.setAttributes( { second_translate: event.target.value} );
		}
		return gcel(
			'div', 
			{ className: 'coderevolution_gutenberg_div' },
            gcel(
				'h4',
				{ className: 'coderevolution_gutenberg_title' },
                'Crawlomatic URL Scraper ',
                gcel(
                    'a',
                    { href:'https://coderevolution.ro/knowledge-base/faq/crawlomatics-crawlomatic-scraper-shortcode-documentation/',target:'_blank', className: 'coderevolution_gutenberg_input' },
                    gcel(
                        'span',
                        { className: 'coderevolution_gutenberg_span' },
                        'Check Documentation'
                    )
                ),
                gcel(
                    'div', 
                    {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                    ,
                    gcel(
                        'div', 
                        {className:'bws_hidden_help_text'},
                        'This block is used to scrape a custom URL dynamically.'
                    )
                )
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'URL*: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the URL to be scrape. This field is required.'
                )
            ),
			gcel(
				'input',
				{ type:'url',placeholder:'URL to scrape (required)', value: url, onChange: updateMessage, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'URL Decode: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set if you want to decode the above URL before running the query.'
                )
            ),
            gcel(
				'select',
				{ value: urldecode, onChange: updateMessage2, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Get Page Using: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the method how you wish to download pages. Phantomjs and Puppeteer need to be configured in plugin settings (Main Settings menu) to work correctly.'
                )
            ),
            gcel(
				'select',
				{ value: get_page_using, onChange: updateMessage3, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'default'},
                    'default'
                ), 
                gcel(
                    'option',
                    { value: 'wp_remote_request'},
                    'wp_remote_request'
                ), 
                gcel(
                    'option',
                    { value: 'phantomjs'},
                    'phantomjs'
                ), 
                gcel(
                    'option',
                    { value: 'puppeteer'},
                    'puppeteer'
                ), 
                gcel(
                    'option',
                    { value: 'tor'},
                    'tor'
                ), 
                gcel(
                    'option',
                    { value: 'headlessbrowserapipuppeteer'},
                    'headlessbrowserapipuppeteer'
                ), 
                gcel(
                    'option',
                    { value: 'headlessbrowserapitor'},
                    'headlessbrowserapitor'
                ), 
                gcel(
                    'option',
                    { value: 'headlessbrowserapiphantomjs'},
                    'headlessbrowserapiphantomjs'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'On Error: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select how you wish to handle errors in the shortcode.'
                )
            ),
            gcel(
				'select',
				{ value: on_error, onChange: updateMessage4, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'error_show'},
                    'error_show'
                ), 
                gcel(
                    'option',
                    { value: 'error_hide'},
                    'error_hide'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Cache Timeout (Minutes): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the number of minutes each page will be kept in the cache. If you set this to 0, pages will not be cached.'
                )
            ),
			gcel(
				'input',
				{ type:'number', min:0, placeholder:'60', value: cache, onChange: updateMessage5, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Output Type: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the output type of the shortcode: text or html.'
                )
            ),
            gcel(
				'select',
				{ value: output, onChange: updateMessage6, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'html'},
                    'html'
                ), 
                gcel(
                    'option',
                    { value: 'text'},
                    'text'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Request Timeout (Seconds): '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the number of seconds each request will wait before timeing out. A value greater than 10 might decrease page load performance at crawling time.'
                )
            ),
			gcel(
				'input',
				{ type:'number', min:1, placeholder:'3', value: timeout, onChange: updateMessage7, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Query Type: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query type how you wish to display the content of the scraped pages.'
                )
            ),
            gcel(
				'select',
				{ value: query_type, onChange: updateMessage8, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'auto'},
                    'auto'
                ), 
                gcel(
                    'option',
                    { value: 'cssselector'},
                    'cssselector'
                ), 
                gcel(
                    'option',
                    { value: 'xpath'},
                    'xpath'
                ), 
                gcel(
                    'option',
                    { value: 'class'},
                    'class'
                ), 
                gcel(
                    'option',
                    { value: 'id'},
                    'id'
                ), 
                gcel(
                    'option',
                    { value: 'regex'},
                    'regex'
                ), 
                gcel(
                    'option',
                    { value: 'regexmatch'},
                    'regexmatch'
                ), 
                gcel(
                    'option',
                    { value: 'full'},
                    'full'
                ), 
                gcel(
                    'option',
                    { value: 'iframe'},
                    'iframe'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Query String: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query to run to get content from the page.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Query string', value: query, onChange: updateMessage9, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Query Decode: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set if you want to decode the above query before running it.'
                )
            ),
            gcel(
				'select',
				{ value: querydecode, onChange: updateMessage10, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Stripping Query Type: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query type how you wish to remove parts of imported content.'
                )
            ),
            gcel(
				'select',
				{ value: remove_query_type, onChange: updateMessage11, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'none'},
                    'none'
                ), 
                gcel(
                    'option',
                    { value: 'cssselector'},
                    'cssselector'
                ), 
                gcel(
                    'option',
                    { value: 'xpath'},
                    'xpath'
                ), 
                gcel(
                    'option',
                    { value: 'regex'},
                    'regex'
                ), 
                gcel(
                    'option',
                    { value: 'class'},
                    'class'
                ), 
                gcel(
                    'option',
                    { value: 'id'},
                    'id'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Stripping Query String: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query to run to strip parts of the content from the page.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Query string', value: remove_query, onChange: updateMessage12, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Replacing Query Type: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query type how you wish to replace parts of imported content.'
                )
            ),
            gcel(
				'select',
				{ value: replace_query_type, onChange: updateMessage13, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: 'none'},
                    'none'
                ), 
                gcel(
                    'option',
                    { value: 'cssselector'},
                    'cssselector'
                ), 
                gcel(
                    'option',
                    { value: 'xpath'},
                    'xpath'
                ), 
                gcel(
                    'option',
                    { value: 'regex'},
                    'regex'
                ), 
                gcel(
                    'option',
                    { value: 'class'},
                    'class'
                ), 
                gcel(
                    'option',
                    { value: 'id'},
                    'id'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Replacing Query String: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the query to run to replace parts of the content from the page.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Query string', value: replace_query, onChange: updateMessage14, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Replace With: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select the text to replace the matches of the content replacing query above.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Query string', value: replace_with, onChange: updateMessage15, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Lazy Load Image/Iframe Tag: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'If the content loaded uses image lazy loading, you can set the lazy loading html tag where the full URL is stored for images and iframes in the HTML content.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Query string', value: lazy_load_tag, onChange: updateMessage16, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Strip Links From Content: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select if you wish to strip links from imported content.'
                )
            ),
            gcel(
				'select',
				{ value: strip_links, onChange: updateMessage17, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Strip Internal Links From Content: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select if you wish to strip internal links from imported content.'
                )
            ),
            gcel(
				'select',
				{ value: strip_internal_links, onChange: updateMessage18, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Strip Scripts From Content: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select if you wish to strip scripts from imported content.'
                )
            ),
            gcel(
				'select',
				{ value: strip_scripts, onChange: updateMessage19, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Strip Images From Content: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select if you wish to strip images from imported content.'
                )
            ),
            gcel(
				'select',
				{ value: strip_images, onChange: updateMessage20, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            ),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Percentage To Keep: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the percentage of the imported content to keep. To disable this feature, leave this field blank.'
                )
            ),
			gcel(
				'input',
				{ type:'number', min:0, max:100, placeholder:'60', value: content_percent_to_keep, onChange: updateMessage21, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Limit Word Count: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the number of words to be displayed at maximum, from the scraped content.'
                )
            ),
			gcel(
				'input',
				{ type:'number', min:1, placeholder:'500', value: limit_word_count, onChange: updateMessage38, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Enable Text Spinning: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set if you wish to enable text spinning for imported content. You can set this settings field to 1 to use the credentials set for text spinning in the plugin\'s "Main Settings" menu. You can also enter a specific content spinner, with credentials, in the following format: SpinnerName:username/email:password/APIkey. For SpinnerName, you can use the following: bestspinner, wordai, spinrewriter, spinnerchief, turkcespin, builtin, wikisynonyms, freethesaurus (username and password should be entered only for premium spinner services).'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'spinrewriter:cr@yahoo.com:bdbee03#330cf4c_e211c0b333e0c22', value: spin, onChange: updateMessage22, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Translate Content To: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Enter a 2 letter language code to which you wish to translate content automatically.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'en', value: translate_to, onChange: updateMessage23, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Second Translation To: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Do also a second translation to this 2 letter language code.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'de', value: second_translate, onChange: updateMessage39, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Translate Source Language: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Enter a 2 letter language code which represents the source language of the article. Default for this field is auto'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'auto', value: translate_source, onChange: updateMessage24, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'User Agent String: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the user agent string to be used when downloading content. Default is: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', value: useragent, onChange: updateMessage25, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Request Charset: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the charset of the calls. The default is: get_bloginfo(\'charset\') '
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'get_bloginfo(\'charset\')', value: charset, onChange: updateMessage26, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Iframe Height: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the height of the created iframe, if the Query Type selector is set to iframe.'
                )
            ),
			gcel(
				'input',
				{ type:'number', min:0, placeholder:'800', value: iframe_height, onChange: updateMessage27, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Request Headers: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the headers that will be sent with the request. This field is working only if the Query Type selector is set to wp_remote_request'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Request headers', value: headers, onChange: updateMessage28, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Content Glue: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the glue to use when multiple content is matched on the scraped page. Default is PHP_EOL (when settings field is left empty).'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'PHP_EOL', value: glue, onChange: updateMessage29, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'EQ: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'If the query set matches multiple parts of the content, using this field, you can get the matched element from the page, with the numeric index entered here. You can also add: first, last'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Index of the matched element to display', value: eq, onChange: updateMessage30, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'GT: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'If the query set matches multiple parts of the content, using this field, you can get the matched element from the page, with the numeric index greater than the value entered here.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'The last numeric index to be entered in result', value: gt, onChange: updateMessage31, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'LT: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'If the query set matches multiple parts of the content, using this field, you can get the matched element from the page, with the numeric index less than the value entered here.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'The last numeric index to be entered in result', value: lt, onChange: updateMessage32, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Base href: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the base href URL to which links should be converted in imported content. Optional. By default, this is set to the URL of the crawled site, so links can be auto completed (in case they have missing parts).'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Base href for URLs (optional)', value: basehref, onChange: updateMessage33, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Link Target Attribute: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the target attribute for links. Example: _blank'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Link target attribute', value: a_target, onChange: updateMessage34, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Raw Output Callback Function: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the raw output callback function. Optional.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'Raw HTML callback PHP function', value: callback_raw, onChange: updateMessage35, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Output Callback Function: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Set the output callback function. Optional.'
                )
            ),
			gcel(
				'textarea',
				{ rows:1, placeholder:'HTML callback PHP function', value: callback, onChange: updateMessage36, className: 'coderevolution_gutenberg_input' }
			),
            gcel(
				'br'
			),
            gcel(
				'label',
				{ className: 'coderevolution_gutenberg_label' },
                'Enable Debug Mode: '
			),
            gcel(
                'div', 
                {className:'bws_help_box bws_help_box_right dashicons dashicons-editor-help'}
                ,
                gcel(
                    'div', 
                    {className:'bws_hidden_help_text'},
                    'Select if you wish to enable debug mode.'
                )
            ),
            gcel(
				'select',
				{ value: debug, onChange: updateMessage37, className: 'coderevolution_gutenberg_select' }, 
                gcel(
                    'option',
                    { value: '0'},
                    '0'
                ), 
                gcel(
                    'option',
                    { value: '1'},
                    '1'
                )
            )
		);
    }),
    save: (function( props ) {
       return null;
    }),
} );