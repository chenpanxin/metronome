<?php namespace Crayon\Providers;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider {

    protected $defer = true;

    public function register()
    {
        $this->app->bindShared('markdown', function()
        {
            return new \Crayon\Utils\Markdown;
        });
    }

    public function provides()
    {
        return ['markdown'];
    }
}
