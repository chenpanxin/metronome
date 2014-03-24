<?php

class TopicController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make('topics.index');
    }
}
