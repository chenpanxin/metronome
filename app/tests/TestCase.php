<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    public function createApplication()
    {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/start.php';
    }

    protected function migrateAndSeed()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}
