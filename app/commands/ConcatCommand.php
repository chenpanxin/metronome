<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ConcatCommand extends Command {

    protected $name = 'asset:concat';

    protected $description = 'Concat files and component.';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        $content = '';
        $components = [
            Component::jquery(),
            Component::jqueryTimeago(),
            Component::jqueryAutosize(),
            Component::underscore()
        ];

        foreach ($components as $component) {
            $content .= file_get_contents($component);
        }

        foreach (glob(app_path().'/assets/javascripts/*.js') as $file) {
            $content .= file_get_contents($file);
        }

        file_put_contents(public_path().'/assets/application.js', $content);
    }
}