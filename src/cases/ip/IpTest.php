<?php
namespace cases\ip;

use connections\relay;
use PHPUnit\Framework\TestCase;

/**
 * Class IpTest
 * @package cases\ip
 *
 * phpunit --filter IpTest
 */
class IpTest extends TestCase
{
	public function setup()
	{
		/**
		 * Use any good API
		 * @todo Gives Method NOT Allowed error
		 */
		//$this->api_url = "http://ip.example.com/";
		$this->api_url = "http://ip-api.com/json";

		// https://ipinfo.io
		// https://www.infobyip.com
		// https://ipapi.co
		// https://freegeoip.net/?q=104.205.115.227
		// https://freegeoip.net/json/104.205.115.227
		// http://ip-api.com
		// ip.bimal.org.np

		$_GET = array();
		$_POST = array();
	}

	/**
	 * IP Lookup Test
	 */
	public function testWhatIsMyIp()
	{
		// @todo Read from curl/ip service
		$my_ip = "0.0.0.0"; // false;

		//$json = $this->relay->fetch($this->api_url);
		//$this->assertJsonStringEqualsJsonFile("data/ip.json", $json);

		// IPv4 or IPv6
		$this->assertTrue(count(preg_split("/[\.|\-|\:]/is", $my_ip)) >= 4);
	}

	/**
	 * Lookup in CLI/cURL enabled subdomain service
	 */
	public function testCurlIp()
	{
		$relay = new relay();
		$result = $relay->fetch("http://ip.bimal.org.np/");
		$this->assertEquals("104.205.115.227", $result);
	}

	/**
	 * Lookup in Free Geo IP
	 * @see https://github.com/fiorix/freegeoip/
	 * @see https://freegeoip.net/
	 */
	public function testFreeGeoIp()
	{
		$ip = "104.205.115.227";
		$url = sprintf("https://freegeoip.net/json/%s", $ip);

		// https://en.wikipedia.org/wiki/List_of_HTTP_header_fields#Request_fields
		$headers = array(
			#"ACCEPT" => "application/json",
			#"Accept-Encoding" => "deflate, gzip", // sends compressed output
			"Accept-Encoding" => "deflate", // readable output
			"Connection" => "close",

			// https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Language
			// Accept-Language: *
			// Access-Control-Allow-Origin: *
			// Content-Encoding: gzip
			// Connection: keep-alive
			// Content-Type: text/html; charset=utf-8
		);

		$relay = new relay();
		$relay->headers($headers);
		$result = $relay->fetch($url);

		$info = json_decode($result, true);
		# echo $result;
		// {"ip":"104.205.115.227","country_code":"CA","country_name":"Canada","region_code":"AB","region_name":"Alberta","city":"Edmonton","zip_code":"T6L","time_zone":"America/Edmonton","latitude":53.4593,"longitude":-113.4145,"metro_code":0}
/**
HTTP/1.1 200 OK
Date: Sun, 10 Dec 2017 05:14:45 GMT
Content-Type: application/json
Content-Length: 234
Connection: keep-alive
Set-Cookie: __cfduid=dedb4966117e683e966ed3fc0604452251512882885; expires=Mon, 10-Dec-18 05:14:45 GMT; path=/; domain=.freegeoip.net; HttpOnly
Vary: Origin
X-Database-Date: Thu, 07 Dec 2017 05:07:05 GMT
X-Ratelimit-Limit: 15000
X-Ratelimit-Remaining: 14999
X-Ratelimit-Reset: 3600
Server: cloudflare-nginx
CF-RAY: 3cadb8f4acc171af-ORD
*/

		$this->assertTrue(is_array($info));

		# $this->assertArrayHasKey("ip", $info);
		# $this->assertArrayHasKey("country_code", $info);
		# $this->assertArrayHasKey("country_name", $info);
		# $this->assertArrayHasKey("region_code", $info);
		# $this->assertArrayHasKey("region_name", $info);
		# $this->assertArrayHasKey("city", $info);
		# $this->assertArrayHasKey("zip_code", $info);
		# $this->assertArrayHasKey("time_zone", $info);
		# $this->assertArrayHasKey("latitude", $info);
		# $this->assertArrayHasKey("longitude", $info);
		# $this->assertArrayHasKey("metro_code", $info);
	}
}
