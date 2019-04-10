<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read string|null realName
 * @property-read string|null displayName
 * @property-read string|null avatarHash
 * @property-read string|null realNameNormalized
 * @property-read string|null displayNameNormalized
 * @property-read string|null image24
 * @property-read string|null image32
 * @property-read string|null image48
 * @property-read string|null image72
 * @property-read string|null image192
 * @property-read bool|null alwaysActive
 * @property-read string|null email
 * @property-read array|null fields
 * @property-read string|null firstName
 * @property-read string|null guestChannels
 * @property-read string|null image512
 * @property-read string|null imageOriginal
 * @property-read string|null lastName
 * @property-read string|null phone
 * @property-read string|null skype
 * @property-read string|null statusEmoji
 * @property-read int|null statusExpiration
 * @property-read string|null statusText
 * @property-read string|null statusTextCanonical
 * @property-read string|null team
 * @property-read string|null title
 */
final class UserProfile implements \JsonSerializable
{
    private $realName;
    private $displayName;
    private $avatarHash;
    private $realNameNormalized;
    private $displayNameNormalized;
    private $image24;
    private $image32;
    private $image48;
    private $image72;
    private $image192;

    private $alwaysActive;
    private $email;
    private $fields;
    private $firstName;
    private $guestChannels;
    private $image512;
    private $imageOriginal;
    private $lastName;
    private $phone;
    private $skype;
    private $statusEmoji;
    private $statusExpiration;
    private $statusText;
    private $statusTextCanonical;
    private $team;
    private $title;

    public function __construct(array $attributes)
    {
        $this->realName = $attributes['real_name'] ?? null;
        $this->displayName = $attributes['display_name'] ?? null;
        $this->avatarHash = $attributes['avatar_hash'] ?? null;
        $this->realNameNormalized = $attributes['real_name_normalized'] ?? null;
        $this->displayNameNormalized = $attributes['display_name_normalized'] ?? null;
        $this->image24 = $attributes['image_24'] ?? null;
        $this->image32 = $attributes['image_32'] ?? null;
        $this->image48 = $attributes['image_48'] ?? null;
        $this->image72 = $attributes['image_72'] ?? null;
        $this->image192 = $attributes['image_192'] ?? null;

        $this->alwaysActive = $attributes['always_active'] ?? null;
        $this->email = $attributes['email'] ?? null;
        $this->fields = $attributes['fields'] ?? null;
        $this->firstName = $attributes['first_name'] ?? null;
        $this->guestChannels = $attributes['guest_channels'] ?? null;
        $this->image512 = $attributes['image_512'] ?? null;
        $this->imageOriginal = $attributes['image_original'] ?? null;
        $this->lastName = $attributes['last_name'] ?? null;
        $this->phone = $attributes['phone'] ?? null;
        $this->skype = $attributes['skype'] ?? null;
        $this->statusEmoji = $attributes['status_emoji'] ?? null;
        $this->statusExpiration = $attributes['status_expiration'] ?? null;
        $this->statusText = $attributes['status_text'] ?? null;
        $this->statusTextCanonical = $attributes['status_text_canonical'] ?? null;
        $this->team = $attributes['team'] ?? null;
        $this->title = $attributes['title'] ?? null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function jsonSerialize(): array
    {
        return [
            'real_name' => $this->realName,
            'display_name' => $this->displayName,
            'avatar_hash' => $this->avatarHash,
            'real_name_normalized' => $this->realNameNormalized,
            'display_name_normalized' => $this->displayNameNormalized,
            'image_24' => $this->image24,
            'image_32' => $this->image32,
            'image_48' => $this->image48,
            'image_72' => $this->image72,
            'image_192' => $this->image192,
            'always_active' => $this->alwaysActive,
            'email' => $this->email,
            'fields' => $this->fields,
            'first_name' => $this->firstName,
            'guest_channels' => $this->guestChannels,
            'image_512' => $this->image512,
            'image_original' => $this->imageOriginal,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'skype' => $this->skype,
            'status_emoji' => $this->statusEmoji,
            'status_expiration' => $this->statusExpiration,
            'status_text' => $this->statusText,
            'status_text_canonical' => $this->statusTextCanonical,
            'team' => $this->team,
            'title' => $this->title,
        ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}