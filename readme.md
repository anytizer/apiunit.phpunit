# apiunit-testing

PHPUnit based REST-API Unit Testing made easy.

Used to send URL parameters using GET and POST.
Then analyze the data returned from the API Server.

Uses `relay` class and `curl` to transport the user parameters.

Useful in troubleshooting websites that use Ajax and APIs. eg. [AngularJS](https://angularjs.org/) based websites.


## Handle requests:

 * GET
 * POST


## Handle Output:

 * JSON


# FAQ
The software just demonstrates how to test APIs.
You may have to do your own expansion to it to persist your tokens or use more resources.

 * My API Server is not on __PHP/MYSQL__. Can I use it?
   - APIs are meant to be standalone; regardless of their backend software.
   - It should be practically possible to test any APIs.
   - Some API gateways might require additional info like HTTP_REFERER, etc. that you have to supply.
 * How do I use this software?
   - __Embed__ it inside any projects as an API Tester.
