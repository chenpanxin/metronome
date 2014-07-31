<?php

use Nelmio\Alice\Fixtures;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    public function setUp()
    {
        parent::setUp();
        Fixtures::load(__DIR__.'/fixtures/user.yml', $objectManager);
    }

    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/start.php';
    }
}
