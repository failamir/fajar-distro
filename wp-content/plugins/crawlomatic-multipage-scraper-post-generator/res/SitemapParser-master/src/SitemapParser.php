<?php

namespace vipnytt;

use SimpleXMLElement;
use vipnytt\SitemapParser\Exceptions;
use vipnytt\SitemapParser\UrlParser;

/**
 * SitemapParser class
 *
 * @license https://opensource.org/licenses/MIT MIT license
 * @link https://github.com/VIPnytt/SitemapParser
 *
 * Specifications:
 * @link http://www.sitemaps.org/protocol.html
 */
class SitemapParser
{
    use UrlParser;

    /**
     * Default User-Agent
     */
    const DEFAULT_USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36';
	
    /**
     * XML file extension
     */
    const XML_EXTENSION = 'xml';

    /**
     * Compressed XML file extension
     */
    const XML_EXTENSION_COMPRESSED = 'xml.gz';

    /**
     * XML Sitemap tag
     */
    const XML_TAG_SITEMAP = 'sitemap';

    /**
     * XML URL tag
     */
    const XML_TAG_URL = 'url';

    /**
     * Robots.txt path
     */
    const ROBOTSTXT_PATH = '/robots.txt';

    /**
     * Sitemaps discovered
     * @var array
     */
    protected $sitemaps = [];

    /**
     * URLs discovered
     * @var array
     */
    protected $urls = [];

    /**
     * Sitemap URLs discovered but not yet parsed
     * @var array
     */
    protected $queue = [];

    /**
     * Parsed URLs history
     * @var array
     */
    protected $history = [];

    /**
     * Current URL being parsed
     * @var null|string
     */
    protected $currentURL;

    /**
     * Parse Recursive
     *
     * @param string $url
     * @return void
     * @throws Exceptions\SitemapParserException
     */
    public function parseRecursive($url, $content = '', $custom_cookies = '', $custom_user_agent = '', $use_proxy = '0', $user_pass = '')
    {
        $this->addToQueue([$url]);
        while (count($todo = $this->getQueue()) > 0) {
            $sitemaps = $this->sitemaps;
            $urls = $this->urls;
            try {
                $this->parse($todo[0], $content, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass);
				$content = '';
            } catch (Exceptions\TransferException $e) {
				$content = '';
                // Keep crawling
            }
            $this->sitemaps = array_merge_recursive($sitemaps, $this->sitemaps);
            $this->urls = array_merge_recursive($urls, $this->urls);
        }
    }

    /**
     * Add an array of URLs to the parser queue
     *
     * @param array $urlArray
     */
    public function addToQueue(array $urlArray)
    {
        foreach ($urlArray as $url) {
            $url = $this->urlEncode($url);
            if ($this->urlValidate($url)) {
                $this->queue[] = $url;
            }
        }
    }

    /**
     * Sitemap URLs discovered but not yet parsed
     *
     * @return array
     */
    public function getQueue()
    {
        $this->queue = array_values(array_diff(array_unique(array_merge($this->queue, array_keys($this->sitemaps))), $this->history));
        return $this->queue;
    }

    /**
     * Parse
     *
     * @param string $url URL to parse
     * @return void
     * @throws Exceptions\TransferException
     * @throws Exceptions\SitemapParserException
     */
    public function parse($url, $response = '', $custom_cookies = '', $custom_user_agent = '', $use_proxy = '0', $user_pass = '')
    {
        $this->clean();
        $this->currentURL = $this->urlEncode($url);
        if (!$this->urlValidate($this->currentURL)) {
            throw new Exceptions\SitemapParserException('Invalid URL');
        }
        $this->history[] = $this->currentURL;
		if($response == '')
		{
			$response = crawlomatic_get_web_page($url, $custom_cookies, $custom_user_agent, $use_proxy, $user_pass, '', '', '');
		}
        if (parse_url($this->currentURL, PHP_URL_PATH) === self::ROBOTSTXT_PATH) {
            $this->parseRobotstxt($response);
            return;
        }
        // Check if content is an gzip file
        if (strpos($response, "\x1f\x8b\x08") === 0) {
            $response = gzdecode($response);
        }
        $sitemapJson = $this->generateXMLObject($response);
        if ($sitemapJson instanceof SimpleXMLElement === false) {
            $this->parseString($response);
            return;
        }
        $this->parseJson(self::XML_TAG_SITEMAP, $sitemapJson);
        $this->parseJson(self::XML_TAG_URL, $sitemapJson);
    }

    /**
     * Cleanup between each parse
     *
     * @return void
     */
    protected function clean()
    {
        $this->sitemaps = [];
        $this->urls = [];
    }

    /**
     * Search for sitemaps in the robots.txt content
     *
     * @param string $robotstxt
     * @return bool
     */
    protected function parseRobotstxt($robotstxt)
    {
        // explode lines into array
        $lines = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $robotstxt)));
        // Parse each line individually
        foreach ($lines as $line) {
            // Remove comments
            $line = explode('#', $line, 2)[0];
            // explode by directive and rule
            $pair = array_map('trim', explode(':', $line, 2));
            // Check if the line contains a sitemap
            if (
                strtolower($pair[0]) !== self::XML_TAG_SITEMAP ||
                empty($pair[1])
            ) {
                // Line does not contain any supported directive
                continue;
            }
            $url = $this->urlEncode($pair[1]);
            if ($this->urlValidate($url)) {
                $this->addArray(self::XML_TAG_SITEMAP, ['loc' => $url]);
            }
        }
        return true;
    }

    /**
     * Validate URL arrays and add them to their corresponding arrays
     *
     * @param string $type sitemap|url
     * @param array $array Tag array
     * @return bool
     */
    protected function addArray($type, array $array)
    {
        if (!isset($array['loc'])) {
            return false;
        }
        $array['loc'] = $this->urlEncode(trim($array['loc']));
        if ($this->urlValidate($array['loc'])) {
            switch ($type) {
                case self::XML_TAG_SITEMAP:
                    $this->sitemaps[$array['loc']] = $this->fixMissingTags(['lastmod'], $array);
                    return true;
                case self::XML_TAG_URL:
                    $this->urls[$array['loc']] = $this->fixMissingTags(['lastmod', 'changefreq', 'priority'], $array);
                    return true;
            }
        }
        return false;
    }

    /**
     * Check for missing values and set them to null
     *
     * @param array $tags Tags check if exists
     * @param array $array Array to check
     * @return array
     */
    protected function fixMissingTags(array $tags, array $array)
    {
        foreach ($tags as $tag) {
            if (empty($array[$tag])) {
                $array[$tag] = null;
            }
        }
        return $array;
    }

    /**
     * Generate the \SimpleXMLElement object if the XML is valid
     *
     * @param string $xml
     * @return \SimpleXMLElement|false
     */
    protected function generateXMLObject($xml)
    {
        // strip XML comments from files
        // if they occur at the beginning of the file it will invalidate the XML
        // this occurs with certain versions of Yoast
        $xml = preg_replace('/\s*\<\!\-\-((?!\-\-\>)[\s\S])*\-\-\>\s*/', '', (string)$xml);
        try {
            $internalErrors = libxml_use_internal_errors(true);
            $obj = new SimpleXMLElement($xml, LIBXML_NOCDATA);
			libxml_use_internal_errors($internalErrors);
			return $obj;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Parse line separated text string
     *
     * @param string $string
     * @return bool
     */
    protected function parseString($string)
    {
        $array = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $string)));
        foreach ($array as $line) {
            if ($this->isSitemapURL($line)) {
                $this->addArray(self::XML_TAG_SITEMAP, ['loc' => $line]);
                continue;
            }
            $this->addArray(self::XML_TAG_URL, ['loc' => $line]);
        }
        return true;
    }

    /**
     * Check if the URL may contain an Sitemap
     *
     * @param string $url
     * @return bool
     */
    protected function isSitemapURL($url)
    {
        $path = parse_url($this->urlEncode($url), PHP_URL_PATH);
        return $this->urlValidate($url) && (
                substr($path, -strlen(self::XML_EXTENSION) - 1) == '.' . self::XML_EXTENSION ||
                substr($path, -strlen(self::XML_EXTENSION_COMPRESSED) - 1) == '.' . self::XML_EXTENSION_COMPRESSED
            );
    }

    /**
     * Parse Json object
     *
     * @param string $type Sitemap or URL
     * @param \SimpleXMLElement $json object
     * @return bool
     */
    protected function parseJson($type, \SimpleXMLElement $json)
    {
        if (!isset($json->$type)) {
            return false;
        }
        foreach ($json->$type as $url) {
            $this->addArray($type, (array)$url);
        }
        return true;
    }

    /**
     * Sitemaps discovered
     *
     * @return array
     */
    public function getSitemaps()
    {
        return $this->sitemaps;
    }

    /**
     * URLs discovered
     *
     * @return array
     */
    public function getURLs()
    {
        return $this->urls;
    }
}
