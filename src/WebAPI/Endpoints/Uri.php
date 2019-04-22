<?php

namespace Halnique\Slack\WebAPI\Endpoints;


use Halnique\Slack\WebAPI\Contracts\ValueObject;

final class Uri implements ValueObject
{
    private const DELIMITER = '/';
    private const QUERY_SEPARATOR = '?';
    private const BASE_URL = 'https://slack.com/api';

    private $uri;

    private function __construct(HttpMethod $httpMethod, string $method, array $params = [])
    {
        $uri = implode(self::DELIMITER, [self::BASE_URL, $method]);

        if (!$httpMethod->isUpdate() && $params) {
            $uri .= self::QUERY_SEPARATOR . http_build_query($params);
        }

        $this->uri = $uri;
    }

    public static function of(HttpMethod $httpMethod, string $method, array $params = []): self
    {
        return new self($httpMethod, $method, $params);
    }

    public function value(): string
    {
        return $this->uri;
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