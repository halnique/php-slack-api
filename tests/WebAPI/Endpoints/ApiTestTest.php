<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\ApiTest;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use HalniqueTest\Slack\TestCase;

class ApiTestTest extends TestCase
{
    public function test__construct()
    {
        $apiTest = new ApiTest(new Client());
        $this->assertInstanceOf(ApiTest::class, $apiTest);
        return $apiTest;
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function testCall(ApiTest $apiTest)
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\ApiTest::class, $apiTest->call());
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function testHttpMethod(ApiTest $apiTest)
    {
        $this->assertEquals(HttpMethod::post(), $apiTest->httpMethod());
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     * @throws \ReflectionException
     */
    public function testUri(ApiTest $apiTest)
    {
        $method = (new \ReflectionClass(ApiTest::class))->getConstant('METHOD');
        $this->assertEquals(new Uri(HttpMethod::post(), $method), $apiTest->uri());
    }

    /**
     * @depends test__construct
     * @param ApiTest $apiTest
     */
    public function testOptions(ApiTest $apiTest)
    {
        $this->assertEquals(new Options(HttpMethod::post()), $apiTest->options());
    }
}
