<?php namespace Metronome\Layers;

use View;

class PhotoController extends BaseController {

    public function index()
    {
        return View::make('backend.photo.index');
    }

    public function show()
    {
        return View::make('backend.photo.show');
    }
}
