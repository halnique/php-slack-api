<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Response;
use HalniqueTest\Slack\TestCase;

class ResponseTest extends TestCase
{
    public function test__construct()
    {
        $response = new Response([]);
        $this->assertInstanceOf(Response::class, $response);
        return $response;
    }

    /**
     * @depends test__construct
     * @param Response $response
     */
    public function testJsonSerialize(Response $response)
    {
        $this->assertArrayHasKey('ok', $response->jsonSerialize());
        $this->assertArrayHasKey('error', $response->jsonSerialize());
    }

    /**
     * @depends test__construct
     * @param Response $response
     */
    public function test__toString(Response $response)
    {
        $this->assertEquals($response, json_encode($response));
    }
}
