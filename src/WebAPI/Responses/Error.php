<?php

namespace Halnique\Slack\WebAPI\Responses;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class Error implements ValueObject
{
    const UNKNOWN_ERROR = 'unknown_error';

    private $error;

    private function __construct(string $error)
    {
        $this->error = $error;
    }

    public static function of(string $error): self
    {
        return new self($error);
    }

    public static function unknown(): self
    {
        return new self(self::UNKNOWN_ERROR);
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