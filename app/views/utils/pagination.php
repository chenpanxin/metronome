<?php

use Illuminate\Pagination\BootstrapPresenter;

$presenter = new BootstrapPresenter($paginator);

if ($paginator->getLastPage() > 1) {
    echo join($presenter->render(), ['<ul>', '</ul>']);
}
