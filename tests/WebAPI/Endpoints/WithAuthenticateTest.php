<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\WithAuthenticate;
use HalniqueTest\Slack\TestCase;

class WithAuthenticateTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testToken()
    {
        /** @var WithAuthenticate $withAuthenticate */
        $withAuthenticate = $this->getMockForTrait(WithAuthenticate::class);
        $this->assertEquals(getenv('SLACK_API_ACCESS_TOKEN'), $withAuthenticate->token());
    }

    /**
     * @expectedException \RuntimeException
     * @throws \ReflectionException
     */
    public function testTokenException()
    {
        putenv('SLACK_API_ACCESS_TOKEN=');
        /** @var WithAuthenticate $withAuthenticate */
        $withAuthenticate = $this->getMockForTrait(WithAuthenticate::class);
        $withAuthenticate->token();
    }
}
