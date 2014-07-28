<?php namespace Metronome\Layers;

use Category;
use View;

class TagController extends BaseController {

    public function index()
    {
        return View::make('backend.tag.index');
    }
}
