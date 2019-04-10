<?php

namespace Halnique\Slack\WebAPI\Contracts;


interface ValueObject extends \JsonSerializable
{
    public function value();

    public function equals(ValueObject $object): bool;

    public function __toString(): string;
}