<?php

namespace Halnique\Slack\WebAPI\Responses;


/**
 * @property-read User|null $user
 */
class UsersLookupByEmail extends Response
{
    private $user;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
        if (!$this->ok) {
            return;
        }
        $this->user = new User($attributes['user']) ?? null;
    }

    public function __get(string $name)
    {
        return $this->$name ?? parent::__get($name);
    }

    public function jsonSerialize(): array
    {
        return parent::jsonSerialize() + [
                'user' => $this->user,
            ];
    }

    public function __toString(): string
    {
        return json_encode($this);
    }
}