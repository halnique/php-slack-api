<?php

namespace Halnique\Slack\WebAPI\Responses;


use Halnique\Slack\WebAPI\Contracts;
use Halnique\Slack\WebAPI\Contracts\ValueObject;

/**
 * @property-read bool ok
 */
class Response implements Contracts\Responses\Response
{
    private $attributes = [];

    private function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public static function of(array $attributes): Response
    {
        return new static($attributes);
    }

    public function __get(string $name)
    {
        return (isset($this->attributes[$name])) ? $this->attributes[$name] : null;
    }

    public function value(): array
    {
        return $this->attributes;
    }

    public function equals(ValueObject $object): bool
    {
        return $this->value() === $object->value();
    }

    public function jsonSerialize(): array
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return json_encode($this->value());
    }
}