<?php namespace Metronome\Layers;

use Category;
use Lang;
use View;

class TagController extends BaseController {

    public function index()
    {
        return View::make('backend.tag.index')
            ->withTitle(Lang::get('locale.tag'));
    }
}
