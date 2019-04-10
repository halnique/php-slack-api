<?php

namespace HalniqueTest\Slack\WebAPI\Endpoints;

use Halnique\Slack\WebAPI\Endpoints\HttpMethod;
use HalniqueTest\Slack\TestCase;

class HttpMethodTest extends TestCase
{
    public function testGet()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::get());
    }

    public function testHead()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::head());
    }

    public function testPost()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::post());
    }

    public function testPut()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::put());
    }

    public function testDelete()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::delete());
    }

    public function testPatch()
    {
        $this->assertInstanceOf(HttpMethod::class, HttpMethod::patch());
    }

    public function testIsUpdate()
    {
        $this->assertFalse(HttpMethod::get()->isUpdate());
        $this->assertFalse(HttpMethod::head()->isUpdate());
        $this->assertTrue(HttpMethod::post()->isUpdate());
        $this->assertTrue(HttpMethod::put()->isUpdate());
        $this->assertTrue(HttpMethod::delete()->isUpdate());
        $this->assertTrue(HttpMethod::patch()->isUpdate());
    }

    public function testValue()
    {
        $this->assertEquals(HttpMethod::GET, HttpMethod::get()->value());
        $this->assertEquals(HttpMethod::HEAD, HttpMethod::head()->value());
        $this->assertEquals(HttpMethod::POST, HttpMethod::post()->value());
        $this->assertEquals(HttpMethod::PUT, HttpMethod::put()->value());
        $this->assertEquals(HttpMethod::DELETE, HttpMethod::delete()->value());
        $this->assertEquals(HttpMethod::PATCH, HttpMethod::patch()->value());
    }

    public function testEquals()
    {
        $this->assertTrue(HttpMethod::get()->equals(HttpMethod::get()));
        $this->assertTrue(HttpMethod::head()->equals(HttpMethod::head()));
        $this->assertTrue(HttpMethod::post()->equals(HttpMethod::post()));
        $this->assertTrue(HttpMethod::put()->equals(HttpMethod::put()));
        $this->assertTrue(HttpMethod::delete()->equals(HttpMethod::delete()));
        $this->assertTrue(HttpMethod::patch()->equals(HttpMethod::patch()));
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(HttpMethod::get()->value(), HttpMethod::get()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::get()->value()), json_encode(HttpMethod::get()));
        $this->assertEquals(HttpMethod::head()->value(), HttpMethod::head()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::head()->value()), json_encode(HttpMethod::head()));
        $this->assertEquals(HttpMethod::post()->value(), HttpMethod::post()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::post()->value()), json_encode(HttpMethod::post()));
        $this->assertEquals(HttpMethod::put()->value(), HttpMethod::put()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::put()->value()), json_encode(HttpMethod::put()));
        $this->assertEquals(HttpMethod::delete()->value(), HttpMethod::delete()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::delete()->value()), json_encode(HttpMethod::delete()));
        $this->assertEquals(HttpMethod::patch()->value(), HttpMethod::patch()->jsonSerialize());
        $this->assertEquals(json_encode(HttpMethod::patch()->value()), json_encode(HttpMethod::patch()));
    }

    public function test__toString()
    {
        $this->assertEquals(HttpMethod::get()->value(), HttpMethod::get()->__toString());
        $this->assertEquals(HttpMethod::get()->value(), HttpMethod::get());
        $this->assertEquals(HttpMethod::head()->value(), HttpMethod::head()->__toString());
        $this->assertEquals(HttpMethod::head()->value(), HttpMethod::head());
        $this->assertEquals(HttpMethod::post()->value(), HttpMethod::post()->__toString());
        $this->assertEquals(HttpMethod::post()->value(), HttpMethod::post());
        $this->assertEquals(HttpMethod::put()->value(), HttpMethod::put()->__toString());
        $this->assertEquals(HttpMethod::put()->value(), HttpMethod::put());
        $this->assertEquals(HttpMethod::delete()->value(), HttpMethod::delete()->__toString());
        $this->assertEquals(HttpMethod::delete()->value(), HttpMethod::delete());
        $this->assertEquals(HttpMethod::patch()->value(), HttpMethod::patch()->__toString());
        $this->assertEquals(HttpMethod::patch()->value(), HttpMethod::patch());
    }
}
