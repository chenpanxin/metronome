<?php

use Ampou\Presenters\AmpouPresenter;

$presenter = new AmpouPresenter($paginator);

if ($paginator->getLastPage() > 1) {
    echo join($presenter->render(), ['<ul>', '</ul>']);
}
