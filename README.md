# php-slack-api

[![Build Status](https://travis-ci.com/halnique/php-slack-api.svg?token=XvYo9WxYGLhpW4jmB1sm&branch=develop)](https://travis-ci.com/halnique/php-slack-api)
[![Coverage Status](https://coveralls.io/repos/github/halnique/php-slack-api/badge.svg)](https://coveralls.io/github/halnique/php-slack-api)
[![Maintainability](https://api.codeclimate.com/v1/badges/f8c054161f7c9d82a119/maintainability)](https://codeclimate.com/github/halnique/php-slack-api/maintainability)
[![Latest Stable Version](https://poser.pugx.org/halnique/php-slack-api/v/stable)](https://packagist.org/packages/halnique/php-slack-api)
[![Total Downloads](https://poser.pugx.org/halnique/php-slack-api/downloads)](https://packagist.org/packages/halnique/php-slack-api)
[![Latest Unstable Version](https://poser.pugx.org/halnique/php-slack-api/v/unstable)](https://packagist.org/packages/halnique/php-slack-api)
[![License](https://poser.pugx.org/halnique/php-slack-api/license)](https://packagist.org/packages/halnique/php-slack-api)
[![composer.lock](https://poser.pugx.org/halnique/php-slack-api/composerlock)](https://packagist.org/packages/halnique/php-slack-api)

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