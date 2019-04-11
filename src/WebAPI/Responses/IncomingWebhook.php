<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null url
 * @property-read string|null channel
 * @property-read string|null configurationUrl
 */
final class IncomingWebhook implements \JsonSerializable
{
    private $url;
    private $channel;
    private $configurationUrl;

    public function __construct(array $attributes)
    {
        $this->url = $attributes['url'] ?? null;
        $this->channel = $attributes['channel'] ?? null;
        $this->configurationUrl = $attributes['configuration_url'] ?? null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            'url' => $this->url,
            'channel' => $this->channel,
            'configuration_url' => $this->configurationUrl,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}