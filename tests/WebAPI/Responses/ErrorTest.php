<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Error;
use HalniqueTest\Slack\TestCase;

class ErrorTest extends TestCase
{
    public function test__construct()
    {
        foreach ((new \ReflectionClass(Error::class))->getConstant('VALID_ERRORS') as $error) {
            $this->assertInstanceOf(Error::class, new Error($error));
        }
    }

    public function test__construct_exception()
    {
        $this->expectException(\DomainException::class);
        new Error(\Faker\Factory::create()->word);
    }

    public function testValue()
    {
        foreach ((new \ReflectionClass(Error::class))->getConstant('VALID_ERRORS') as $error) {
            $this->assertEquals($error, (new Error($error))->value());
        }
    }

    public function testEquals()
    {
        foreach ((new \ReflectionClass(Error::class))->getConstant('VALID_ERRORS') as $error) {
            $this->assertTrue((new Error($error))->equals(new Error($error)));
        }
    }

    public function testJsonSerialize()
    {
        foreach ((new \ReflectionClass(Error::class))->getConstant('VALID_ERRORS') as $error) {
            $this->assertEquals((new Error($error))->value(), (new Error($error))->jsonSerialize());
            $this->assertEquals('"' . (new Error($error))->value() . '"', json_encode(new Error($error)));
        }
    }

    public function test__toString()
    {
        foreach ((new \ReflectionClass(Error::class))->getConstant('VALID_ERRORS') as $error) {
            $this->assertEquals((new Error($error))->value(), (new Error($error))->__toString());
            $this->assertEquals((new Error($error))->value(), (new Error($error)));
        }
    }
}
