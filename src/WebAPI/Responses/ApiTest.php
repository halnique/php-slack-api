<?php

namespace Halnique\Slack\WebAPI\Responses;


class ApiTest extends Response
{
    private $args;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        if (!$this->ok) {
            return;
        }
        $this->args = $attributes['args'] ?? null;
    }

    public function __get(string $name): ?string
    {
        return $this->args[$name] ?? parent::__get($name);
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize() + [
                'args' => $this->args,
            ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}