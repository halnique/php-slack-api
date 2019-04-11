<?php

namespace Halnique\Slack\WebAPI\Contracts;


use Halnique\Slack\WebAPI\Responses;

interface Client
{
    public function oauthAccess(string $clientId, string $clientSecret, string $code): Responses\OauthAccess;

    public function authTest(): Responses\AuthTest;

    public function apiTest(): Responses\ApiTest;

    public function usersLookUpByEmail(string $email): Responses\UsersLookupByEmail;
}