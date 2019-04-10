<?php


namespace HalniqueTest\Slack\Mock;


use GuzzleHttp\Promise\PromiseInterface;

class GuzzlePromise implements PromiseInterface
{
    public function then(callable $onFulfilled = null, callable $onRejected = null)
    {
        return new GuzzlePromise();
    }

    public function otherwise(callable $onRejected)
    {
        return new GuzzlePromise();
    }

    public function getState()
    {
        return self::PENDING;
    }

    public function resolve($value)
    {
    }

    public function reject($reason)
    {
    }

    public function cancel()
    {
    }

    public function wait($unwrap = true)
    {
        return new GuzzlePromise();
    }
}