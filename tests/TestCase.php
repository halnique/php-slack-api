<?php

namespace HalniqueTest\Slack;


use Dotenv\Dotenv;
use Faker;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        $dotEnv = Dotenv::create(__DIR__ . '/../', '.env.testing');
        $dotEnv->load();
    }

    public function faker(): Faker\Generator
    {
        return Faker\Factory::create();
    }
}
