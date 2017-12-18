# API Unit Testing

Testing REST APIs and Micro-Services now made easy with PHPUnit.
It is used send HTTP GET/POST requests to the API Gateway. Then it analyses the data returned from the server.
APIUnit testing is hence useful in troubleshooting websites that use Ajax and API calls, eg. as in [AngularJS](https://angularjs.org/) based websites.


## Installation

Setting up PHPUnit or running the unit tests is beyond the scope of the project. But here are quick tips.


### Normal PHP

 * Put PHP in system path
 * Download [PHPUnit](https://phar.phpunit.de/phpunit.phar) .phar file
 * Run `php phpunit.phar` from project root in command line.


### Inside PHPStorm

 * Run > Edit Configurations
 * Add [+] PHPUnit > Set name: __PHPUnit: Clients__
 * Test scope: Directory (this this project's path)
 * Ok
 * File > Settings > Search PHPUnit
 * PHP > Test Frameworks > Add PHPUnit Library > Path to phpunit.phar
 * Set path to phpunit.phar including the filename.
 * Set configuration file to [phpunit.xml](phpunit.xml)
 * Set bootstrap file to [bootstrap.php](bootstrap.php)
 * Ok
 * Right click on project path - cases/ > Run __PHPUnit: Clients__


## CLI Reference
You can create several test suites for (different projects) and run them individually by name.
[Learn to create test suites](https://phpunit.de/manual/current/en/organizing-tests.html). 

	phpunit --testsuite clients
	phpunit --testsuite cases

### Standard Tests

	phpunit --testsuite api
	phpunit --testsuite cookie
	phpunit --testsuite file
	phpunit --testsuite get
	phpunit --testsuite headers
	phpunit --testsuite ip
	phpunit --testsuite login
	phpunit --testsuite mime
	phpunit --testsuite ping
	phpunit --testsuite post


## Examples

It is as simple as:

    $url = "http://localhost/test.php";
    
    $_POST = array(
        "id" => "other",
    );
    
    $relay = new relay();
    $result = $relay->fetch($url);

In this case, it will POST the data to test.php and fetch the contents.
If you need JSON data out ot it, just do:

    $json = json_decode($result);

Make sure that your data $result was a valid JSON String.


## Capabilities

 * Sends GET parameters
 * Sends POST Data
 * Sends File Uploads (single, multiple, arrays)

## API Tokens

If your API Gateway requires tokens, you should persist them at client side once you login to the API.


## Relay Class

It uses a [`relay`](classes/connections/class.relay.inc.php) class to collect and send data to the server.
Internally, it is using PHP's `curl` methods to transport the data.
I have taken care of setting of [several curl set options](http://php.net/manual/en/function.curl-setopt.php) just enough to support normal API access.
It supports several conditional parameters like GET, POST and FILE.


## Handles Requests

Handles GET and POST to send to the sever. Then, expects JSON.

## Samples

First, You should have your API Server ready. Discussions beyond scope for now.

 * [Math Calculations Test](cases/api/MathTest.php)
 * [File Upload Test](cases/file/FileTest.php)
 * [API Gateway Ping/Pong Test](cases/ping/PingPongTest.php)


# FAQ

The software just demonstrates how to test APIs and may be rudimentary.
You may have to do your own expansion to it to persist your tokens or use more resources.

 * My API Server is not based on __PHP/MYSQL__. Can I use it?
   - APIs are meant to be standalone; regardless of their backend technologies.
   - It should be practically possible to test any APIs.
   - Some API gateways might require additional info like HTTP_REFERER, etc. that you have to supply.
   - Sometimes, cross origin access is an issue. See [CORS Enabled](https://www.w3.org/wiki/CORS_Enabled).
 * How do I use this software?
   - __Embed__ it inside any projects as a PHPUnit project.
