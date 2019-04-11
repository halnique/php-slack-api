<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read bool|null ok
 * @property-read Error|null error
 */
class Response implements \JsonSerializable
{
    private $ok;
    private $error;

    public function __construct(array $attributes)
    {
        $this->ok = $attributes['ok'] ?? null;
        $this->error = isset($attributes['error']) ? new Error($attributes['error']) : null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            'ok' => $this->ok,
            'error' => $this->error,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}