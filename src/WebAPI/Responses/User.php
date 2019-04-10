<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null $id
 * @property-read string|null $teamId
 * @property-read string|null $name
 * @property-read bool|null $deleted
 * @property-read string|null $color
 * @property-read string|null $realName
 * @property-read string|null $tz
 * @property-read string|null $tzLabel
 * @property-read int|null $tzOffset
 * @property-read UserProfile|null $profile
 * @property-read bool|null $isAdmin
 * @property-read bool|null $isOwner
 * @property-read bool|null $isPrimaryOwner
 * @property-read bool|null $isRestricted
 * @property-read bool|null $isUltraRestricted
 * @property-read bool|null $isBot
 * @property-read int|null $updated
 * @property-read bool|null $isAppUser
 * @property-read bool|null $has2fa
 * @property-read string|null $locale
 * @property-read string|null $presence
 */
final class User implements \JsonSerializable
{
    private $id;
    private $teamId;
    private $name;
    private $deleted;
    private $color;
    private $realName;
    private $tz;
    private $tzLabel;
    private $tzOffset;
    private $profile;
    private $isAdmin;
    private $isOwner;
    private $isPrimaryOwner;
    private $isRestricted;
    private $isUltraRestricted;
    private $isBot;
    private $updated;
    private $isAppUser;

    private $has2fa;
    private $locale;
    private $presence;

    public function __construct(array $attributes)
    {
        $this->id = $attributes['id'] ?? null;
        $this->teamId = $attributes['team_id'] ?? null;
        $this->name = $attributes['name'] ?? null;
        $this->deleted = $attributes['deleted'] ?? null;
        $this->color = $attributes['color'] ?? null;
        $this->realName = $attributes['real_name'] ?? null;
        $this->tz = $attributes['tz'] ?? null;
        $this->tzLabel = $attributes['tz_label'] ?? null;
        $this->tzOffset = $attributes['tz_offset'] ?? null;
        $this->profile = isset($attributes['profile']) ? new UserProfile($attributes['profile']) : null;
        $this->isAdmin = $attributes['is_admin'] ?? null;
        $this->isOwner = $attributes['is_owner'] ?? null;
        $this->isPrimaryOwner = $attributes['is_primary_owner'] ?? null;
        $this->isRestricted = $attributes['is_restricted'] ?? null;
        $this->isUltraRestricted = $attributes['is_ultra_restricted'] ?? null;
        $this->isBot = $attributes['is_bot'] ?? null;
        $this->updated = $attributes['updated'] ?? null;
        $this->isAppUser = $attributes['is_app_user'] ?? null;

        $this->has2fa = $attributes['has_2fa'] ?? null;
        $this->locale = $attributes['locale'] ?? null;
        $this->presence = $attributes['presence'] ?? null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'team_id' => $this->teamId,
            'name' => $this->name,
            'deleted' => $this->deleted,
            'color' => $this->color,
            'real_name' => $this->realName,
            'tz' => $this->tz,
            'tz_label' => $this->tzLabel,
            'tz_offset' => $this->tzOffset,
            'profile' => $this->profile,
            'is_admin' => $this->isAdmin,
            'is_owner' => $this->isOwner,
            'is_primary_owner' => $this->isPrimaryOwner,
            'is_restricted' => $this->isRestricted,
            'is_ultra_restricted' => $this->isUltraRestricted,
            'is_bot' => $this->isBot,
            'updated' => $this->updated,
            'is_app_user' => $this->isAppUser,
            'has_2fa' => $this->has2fa,
            'locale' => $this->locale,
            'presence' => $this->presence,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}