<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class Options implements ValueObject
{
    private $options = [];

    public function __construct(HttpMethod $httpMethod, array $params = [], string $token = '')
    {
        if ($httpMethod->isUpdate()) {
            $this->options = $params;
        }

        $headers = [];
        if ($token) {
            $headers['Authorization: Bearer'] = $token;
        }
        $this->options['headers'] = $headers;
    }

    public function value(): array
    {
        return $this->options;
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