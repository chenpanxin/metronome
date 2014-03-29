<?php

class TopicController extends BaseController {

    public function __construct()
    {

    }

    public function create()
    {
        return View::make('topics.new');
    }

    public function index()
    {
        return View::make('topics.index');
    }
}
