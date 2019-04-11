<?php

namespace Halnique\Slack\WebAPI\Responses;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class Error implements ValueObject
{
    const UNKNOWN_ERROR = 'unknown_error';

    private $error;

    public function __construct(string $error)
    {
        $this->error = $error;
    }

    public function value(): string
    {
        return $this->error;
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