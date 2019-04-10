<?php

namespace HalniqueTest\Slack;


use Dotenv\Dotenv;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        $dotEnv = Dotenv::create(__DIR__ . '/../', '.env.testing');
        $dotEnv->load();
    }

    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
    }
}
