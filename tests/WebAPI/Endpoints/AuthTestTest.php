<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\AuthTest;
use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Options;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\TestCase;

class AuthTestTest extends TestCase
{
    use WithAuthenticate;

    public function test__construct()
    {
        $authTest = new AuthTest(new Client());
        $this->assertInstanceOf(AuthTest::class, $authTest);
        return $authTest;
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function testCall(AuthTest $authTest)
    {
        $this->assertInstanceOf(\Halnique\Slack\WebAPI\Responses\AuthTest::class, $authTest->call());
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function testHttpMethod(AuthTest $authTest)
    {
        $this->assertEquals(HttpMethod::post(), $authTest->httpMethod());
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     * @throws \ReflectionException
     */
    public function testUri(AuthTest $authTest)
    {
        $method = (new \ReflectionClass(AuthTest::class))->getConstant('METHOD');
        $this->assertEquals(new Uri(HttpMethod::post(), $method), $authTest->uri());
    }

    /**
     * @depends test__construct
     * @param AuthTest $authTest
     */
    public function testOptions(AuthTest $authTest)
    {
        $this->assertEquals(new Options(HttpMethod::post(), [], $this->token()), $authTest->options());
    }
}
