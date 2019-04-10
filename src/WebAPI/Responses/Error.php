<?php

namespace Halnique\Slack\WebAPI\Responses;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class Error implements ValueObject
{
    const USERS_NOT_FOUND = 'users_not_found';
    const NOT_AUTHED = 'not_authed';
    const INVALID_AUTH = 'invalid_auth';
    const ACCOUNT_INACTIVE = 'account_inactive';
    const NO_PERMISSION = 'no_permission';
    const INVALID_ARG_NAME = 'invalid_arg_name';
    const INVALID_ARRAY_ARG = 'invalid_array_arg';
    const INVALID_CHARSET = 'invalid_charset';
    const INVALID_FORM_DATA = 'invalid_form_data';
    const INVALID_POST_TYPE = 'invalid_post_type';
    const MISSING_POST_TYPE = 'missing_post_type';
    const TERM_ADDED_TO_ORG = 'team_added_to_org';
    const INVALID_JSON = 'invalid_json';
    const JSON_NOT_OBJECT = 'json_not_object';
    const REQUEST_TIMEOUT = 'request_timeout';
    const UPGRADE_REQUIRED = 'upgrade_required';
    const FATAL_ERROR = 'fatal_error';

    private const VALID_ERRORS = [
        self::USERS_NOT_FOUND,
        self::NOT_AUTHED,
        self::INVALID_AUTH,
        self::ACCOUNT_INACTIVE,
        self::NO_PERMISSION,
        self::INVALID_ARG_NAME,
        self::INVALID_ARRAY_ARG,
        self::INVALID_CHARSET,
        self::INVALID_FORM_DATA,
        self::INVALID_POST_TYPE,
        self::MISSING_POST_TYPE,
        self::TERM_ADDED_TO_ORG,
        self::INVALID_JSON,
        self::JSON_NOT_OBJECT,
        self::REQUEST_TIMEOUT,
        self::UPGRADE_REQUIRED,
        self::FATAL_ERROR,
    ];

    private $error;

    public function __construct(string $error)
    {
        if (!in_array($error, self::VALID_ERRORS)) {
            throw new \DomainException("{$error} is invalid.");
        }

        $this->error = $error;
    }

    public function value(): string
    {
        return $this->error;
    }

    public function equals(ValueObject $object): bool
    {
        return $this->value() === $object->value();
    }

    public function jsonSerialize(): string
    {
        return $this->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}