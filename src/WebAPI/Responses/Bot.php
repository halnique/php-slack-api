<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null botUserId
 * @property-read string|null botAccessToken
 * @property-read string|null configurationUrl
 */
final class Bot implements \JsonSerializable
{
    private $botUserId;
    private $botAccessToken;

    public function __construct(array $attributes)
    {
        $this->botUserId = $attributes['bot_user_id'] ?? null;
        $this->botAccessToken = $attributes['bot_access_token'] ?? null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            'bot_user_id' => $this->botUserId,
            'bot_access_token' => $this->botAccessToken,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}