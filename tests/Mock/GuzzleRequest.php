<?php


namespace HalniqueTest\Slack\Mock;


use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class GuzzleRequest implements RequestInterface
{
    use GuzzleMessageTrait;

    public function getRequestTarget()
    {
        return '';
    }

    public function withRequestTarget($requestTarget)
    {
        return clone $this;
    }

    public function getMethod()
    {
        return '';
    }

    public function withMethod($method)
    {
        return clone $this;
    }

    public function getUri()
    {
        return new Uri();
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        return clone $this;
    }
}