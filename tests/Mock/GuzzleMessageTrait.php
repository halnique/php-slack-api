<?php


namespace HalniqueTest\Slack\Mock;


use Psr\Http\Message\StreamInterface;

trait GuzzleMessageTrait
{
    public function getProtocolVersion()
    {
        return '';
    }

    public function withProtocolVersion($version)
    {
        return clone $this;
    }

    public function getHeaders()
    {
        return [];
    }

    public function hasHeader($header)
    {
        return true;
    }

    public function getHeader($header)
    {
        return [];
    }

    public function getHeaderLine($header)
    {
        return '';
    }

    public function withHeader($header, $value)
    {
        return clone $this;
    }

    public function withAddedHeader($header, $value)
    {
        return clone $this;
    }

    public function withoutHeader($header)
    {
        return clone $this;
    }

    public function getBody()
    {
        return new GuzzleStream();
    }

    public function withBody(StreamInterface $body)
    {
        return clone $this;
    }
}