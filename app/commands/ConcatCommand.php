<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ConcatCommand extends Command {

    protected $name = 'asset:concat';

    protected $description = 'Concat files for javascripts';

    public function __construct()
    {
        parent::__construct();
    }

    public function fire()
    {
        $content = '';
        $sorted = [];

        $javascripts = File::glob(join('/', [$this->javascriptsPath(), '*.js']));

        $javascript_libs = [
            JavaScript::jquery(),
            JavaScript::jqueryTimeago(),
            JavaScript::jqueryAutosize(),
            // JavaScript::underscore()
            JavaScript::turbolinks(),
            JavaScript::jqueryU()
        ];

        foreach ($javascript_libs as $lib) {
            $content .= file_get_contents($lib);
        }

        $_js = join('/', [$this->javascriptsPath(), '_.js']);

        if (in_array($_js, $javascripts)) {

            preg_match_all('/[\w]+\.js/', file_get_contents($_js), $_js);

            foreach ($_js[0] as $name) {
                $file_path = join('/', [$this->javascriptsPath(), $name]);
                if (in_array($file_path, $javascripts)) {
                    $content .= file_get_contents($file_path);
                }
            }
        }

        file_put_contents(public_path().'/assets/application.js', $content);
    }

    private function javascriptsPath()
    {
        return app_path().'/assets/javascripts';
    }
}
