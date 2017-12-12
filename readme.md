# API Unit Testing

PHPUnit based REST-API Unit Testing is now made easy.
It is used send HTTP requests to the API Gateway. Then it analyses the data returned from the Server.
Useful in troubleshooting websites that use Ajax and API calls, eg. as in [AngularJS](https://angularjs.org/) based websites.


## Capabilities

 * Sends GET parameters
 * Sends POST Data
 * Sends File Uploads (single, mutliple, arrays)

If your API Gateway requires tokens, you should persist them at client side once you login to the API.


## Relay Class
It uses a `relay` class to collect and send data to the server.
Internally, it is using PHP's `curl` methods to transport the data.
I have taken care of setting of [several curl set options](http://php.net/manual/en/function.curl-setopt.php) just enough to support normal API access.
It supports several conditional parameters like GET, POST and FILE.


## Handles Requests
Handles GET and POST to send to the sever. Then, expects JSON.


# FAQ
The software just demonstrates how to test APIs and may be rudimentary.
You may have to do your own expansion to it to persist your tokens or use more resources.

 * My API Server is not based on __PHP/MYSQL__. Can I use it?
   - APIs are meant to be standalone; regardless of their backend technologies.
   - It should be practically possible to test any APIs.
   - Some API gateways might require additional info like HTTP_REFERER, etc. that you have to supply.
   - Sometimes, cross origin access is an issue.
 * How do I use this software?
   - __Embed__ it inside any projects as an API Tester.
