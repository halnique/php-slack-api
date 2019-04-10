<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class HttpMethod implements ValueObject
{
    const GET = 'GET';
    const HEAD = 'HEAD';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
    const PATCH = 'PATCH';

    private const UPDATE_METHODS = [
        self::POST,
        self::PUT,
        self::DELETE,
        self::PATCH,
    ];

    private $httpMethod;

    private function __construct(string $httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    public static function get(): self
    {
        return new self(self::GET);
    }

    public static function head(): self
    {
        return new self(self::HEAD);
    }

    public static function post(): self
    {
        return new self(self::POST);
    }

    public static function put(): self
    {
        return new self(self::PUT);
    }

    public static function delete(): self
    {
        return new self(self::DELETE);
    }

    public static function patch(): self
    {
        return new self(self::PATCH);
    }

    public function isUpdate(): bool
    {
        return in_array($this->value(), self::UPDATE_METHODS);
    }

    public function value(): string
    {
        return $this->httpMethod;
    }

    public function equals(ValueObject $object): bool
    {
        return $this->value() === $object->value();
    }

    public function jsonSerialize(): string
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}