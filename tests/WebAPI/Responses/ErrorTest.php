<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Error;
use HalniqueTest\Slack\TestCase;

class ErrorTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(Error::class, Error::of(\Faker\Factory::create()->word));
    }

    public function testUnknown()
    {
        $this->assertInstanceOf(Error::class, Error::unknown());
    }

    public function testValue()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals($error, Error::of($error)->value());
    }

    public function testEquals()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertTrue(Error::of($error)->equals(Error::of($error)));
    }

    public function testJsonSerialize()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals(Error::of($error)->value(), Error::of($error)->jsonSerialize());
        $this->assertEquals('"' . Error::of($error)->value() . '"', json_encode(Error::of($error)));
    }

    public function test__toString()
    {
        $error = \Faker\Factory::create()->word;
        $this->assertEquals(Error::of($error)->value(), Error::of($error)->__toString());
        $this->assertEquals(Error::of($error)->value(), Error::of($error));
    }
}
