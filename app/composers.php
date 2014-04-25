<?php

View::composer(['topics.index'], function($view)
{
    $view->with('stat', Stat::orderBy('id', 'desc')->first());
});
