<?php

class MyIpTest extends PHPUnit_Framework_TestCase
{
    private $relay = null;

    public function setup()
    {
        /**
         * Use any good API
         * @todo Gives Method NOT Allowed error
         */
        $this->api_url = "http://ip.example.com/";

        $_GET = array();
        $_POST = array();

        $this->relay = new relay();
        $this->relay->log(true);
    }

    /**
     * IP Lookup Test
     */
    public function testWhatIsMyIp()
    {
        $json = $this->relay->fetch($this->api_url);

        $this->assertJsonStringEqualsJsonFile('data/ip.json', $json);
    }
}
