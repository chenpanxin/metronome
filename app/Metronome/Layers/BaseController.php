<?php namespace Metronome\Layers;

use Controller;

class BaseController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('staff');
    }

    protected function setupLayout()
    {
        if (! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }
}
