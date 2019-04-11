<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null accessToken
 * @property-read string|null scope
 * @property-read string|null teamName
 * @property-read string|null teamId
 * @property-read IncomingWebhook|null incomingWebhook
 * @property-read Bot|null bot
 */
class OauthAccess extends Response
{
    private $accessToken;

    private $scope;

    private $teamName;

    private $teamId;

    private $incomingWebhook;

    private $bot;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        if (!$this->ok) {
            return;
        }
        $this->accessToken = $attributes['access_token'] ?? null;
        $this->scope = $attributes['scope'] ?? null;
        $this->teamName = $attributes['team_name'] ?? null;
        $this->teamId = $attributes['team_id'] ?? null;
        $this->incomingWebhook = isset($attributes['incoming_webhook']) ? new IncomingWebhook($attributes['incoming_webhook']) : null;
        $this->bot = isset($attributes['bot']) ? new Bot($attributes['bot']) : null;
    }

    public function __get(string $name): ?string
    {
        return $this->$name ?? parent::__get($name);
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize() + [
                'access_token' => $this->accessToken,
                'scope' => $this->scope,
                'team_name' => $this->teamName,
                'team_id' => $this->teamId,
                'incoming_webhook' => $this->incomingWebhook,
                'bot' => $this->bot,
            ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}