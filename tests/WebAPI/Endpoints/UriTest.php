<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use Halnique\Slack\WebAPI\Endpoints\Uri;
use HalniqueTest\Slack\TestCase;

class UriTest extends TestCase
{
    public function test__construct()
    {
        $faker = \Faker\Factory::create();
        $params = [];
        foreach ($faker->words as $word) {
            $params[$faker->word] = $word;
        }
        $uri = new Uri(HttpMethod::get(), $faker->word, $params);
        $this->assertInstanceOf(Uri::class, $uri);
        return $uri;
    }

    /**
     * @depends test__construct
     * @param Uri $uri
     */
    public function testValue(Uri $uri)
    {
        $this->assertNotFalse(parse_url($uri));
    }

    /**
     * @depends test__construct
     * @param Uri $uri
     */
    public function testEquals(Uri $uri)
    {
        $this->assertTrue($uri->equals(clone $uri));
    }

    /**
     * @depends test__construct
     * @param Uri $uri
     */
    public function testJsonSerialize(Uri $uri)
    {
        $this->assertEquals($uri->value(), $uri->jsonSerialize());
        $this->assertEquals(json_encode($uri->value()), json_encode($uri));
    }

    /**
     * @depends test__construct
     * @param Uri $uri
     */
    public function test__toString(Uri $uri)
    {
        $this->assertEquals($uri->value(), $uri->__toString());
        $this->assertEquals($uri->value(), $uri);
    }
}
