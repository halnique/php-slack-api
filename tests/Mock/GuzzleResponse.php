<?php


namespace HalniqueTest\Slack\Mock;


use Psr\Http\Message\ResponseInterface;

class GuzzleResponse implements ResponseInterface
{
    use GuzzleMessageTrait;

    public function getStatusCode()
    {
        return 200;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        return clone $this;
    }

    public function getReasonPhrase()
    {
        return '';
    }
}