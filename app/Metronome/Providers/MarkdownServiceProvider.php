<?php namespace Metronome\Providers;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function register()
    {
        $this->app->bindShared('markdown', function()
        {
            return new \Metronome\Utils\Markdown;
        });
    }

    public function provides()
    {
        return ['markdown'];
    }
}
