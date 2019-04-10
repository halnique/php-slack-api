<?php


namespace HalniqueTest\Slack\Mock;


use GuzzleHttp\ClientInterface;
use Psr\Http\Message\RequestInterface;

class GuzzleHttpClient implements ClientInterface
{
    public function send(RequestInterface $request, array $options = [])
    {
        return new GuzzleResponse();
    }

    public function sendAsync(RequestInterface $request, array $options = [])
    {
        return new GuzzlePromise();
    }

    public $request;

    public function request($method, $uri, array $options = [])
    {
        if ($this->request && is_callable($this->request)) {
            return call_user_func($this->request);
        }

        return new GuzzleResponse();
    }

    public function requestAsync($method, $uri, array $options = [])
    {
        return new GuzzlePromise();
    }

    public function getConfig($option = null)
    {
        return [];
    }
}