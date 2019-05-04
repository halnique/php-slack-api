<?php

namespace HalniqueTest\Slack\WebAPI\Responses;

use Halnique\Slack\WebAPI\Responses\Response;
use HalniqueTest\Slack\TestCase;

class ResponseTest extends TestCase
{
    public function test__get()
    {
        $attributes = $this->randomAttributes();
        $response = Response::of($attributes);
        foreach ($attributes as $key => $value) {
            $this->assertEquals($value, $response->$key);
        }
    }

    public function testValue()
    {
        $attributes = $this->randomAttributes();
        $this->assertEquals($attributes, Response::of($attributes)->value());
    }

    public function testEquals()
    {
        $attributes = $this->randomAttributes();
        $this->assertTrue(Response::of($attributes)->equals(Response::of($attributes)));
        $newAttributes = $this->randomAttributes();
        $this->assertFalse(Response::of($attributes)->equals(Response::of($newAttributes)));
    }

    public function testJsonSerialize()
    {
        $attributes = $this->randomAttributes();
        $this->assertEquals($attributes, Response::of($attributes)->jsonSerialize());
    }

    public function test__toString()
    {
        $attributes = $this->randomAttributes();
        $this->assertEquals(json_encode($attributes), Response::of($attributes));
    }

    private function randomAttributes(): array
    {
        $attributes = [];

        for ($i = 0; $i < $this->faker()->randomDigit; $i++) {
            $attributes[$this->faker()->word] = $this->faker()->word;
        }

        return $attributes;
    }
}
