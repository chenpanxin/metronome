<?php namespace Crayon\Providers;

use Illuminate\Support\ServiceProvider;

class SanitizationServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function register()
    {
        $this->app->bindShared('sanitization', function()
        {
            return new \Crayon\Utils\Sanitization;
        });
    }

    public function provides()
    {
        return ['sanitization'];
    }
}
