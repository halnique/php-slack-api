# php-slack-api

[![Build Status](https://travis-ci.com/halnique/php-slack-api.svg?token=XvYo9WxYGLhpW4jmB1sm&branch=develop)](https://travis-ci.com/halnique/php-slack-api)
[![Coverage Status](https://coveralls.io/repos/github/halnique/php-slack-api/badge.svg)](https://coveralls.io/github/halnique/php-slack-api)
[![Maintainability](https://api.codeclimate.com/v1/badges/f8c054161f7c9d82a119/maintainability)](https://codeclimate.com/github/halnique/php-slack-api/maintainability)

## Installation

```bash
$ composer require halnique/php-slack-api
```

## Usage

```php
use Halnique\Slack;

$client = Slack\WebAPI\Client::create();
$apiTestResult = $client->call(Slack\WebAPI\Endpoints\HttpMethod::get(), 'api.test');
$authTestResult = $client->call(Slack\WebAPI\Endpoints\HttpMethod::post(), 'auth.test');
$usersLookupByEmailResult = $client->call(Slack\WebAPI\Endpoints\HttpMethod::get(), 'users.lookupByEmail', [
    'email' => 'address@gmail.com',
]);
```