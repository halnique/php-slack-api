<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null url
 * @property-read string|null team
 * @property-read string|null user
 * @property-read string|null teamId
 * @property-read string|null userId
 */
class AuthTest extends Response
{
    private $url;

    private $team;

    private $user;

    private $teamId;

    private $userId;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        if (!$this->ok) {
            return;
        }
        $this->url = $attributes['url'] ?? null;
        $this->team = $attributes['team'] ?? null;
        $this->user = $attributes['user'] ?? null;
        $this->teamId = $attributes['team_id'] ?? null;
        $this->userId = $attributes['user_id'] ?? null;
    }

    public function __get(string $name): ?string
    {
        return $this->$name ?? parent::__get($name);
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize() + [
                'url' => $this->url,
                'team' => $this->team,
                'user' => $this->user,
                'team_id' => $this->teamId,
                'user_id' => $this->userId,
            ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}