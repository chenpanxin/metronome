<?php namespace Metronome\Layers;

use BaseController;
use Category;
use View;

class TagController extends BaseController {

    public function index()
    {
        return View::make('backend.tag.index');
    }
}
