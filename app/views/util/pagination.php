<?php

use Crayon\Utils\Pagination;

$presenter = new Pagination($paginator);

if ($paginator->getLastPage() > 1) {
    echo join($presenter->render(), ['<ul class="pagination">', '</ul>']);
}
