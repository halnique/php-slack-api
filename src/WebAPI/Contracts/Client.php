<?php

namespace Halnique\Slack\WebAPI\Contracts;


use Halnique\Slack\WebAPI\Responses;

interface Client
{
    public function apiTest(): Responses\ApiTest;

    public function usersLookUpByEmail(string $email): Responses\UsersLookupByEmail;
}