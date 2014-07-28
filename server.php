<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

$paths = require __DIR__.'/bootstrap/paths.php';

$requested = $paths['public'].$uri;

if ($uri !== '/' and file_exists($requested))
{
    return false;
}

require_once $paths['public'].'/index.php';
