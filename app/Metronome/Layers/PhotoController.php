<?php namespace Metronome\Layers;

use Str;
use Auth;
use View;
use Input;
use Image;
use Photo;
use Redirect;

class PhotoController extends BaseController {

    public function index()
    {
        return View::make('backend.photo.index')
            ->withPhotos(Photo::all());
    }

    public function store()
    {
        $photo = Image::make(Input::file('photo')->getRealPath());

        $hash = Str::random(64);

        $photo->save($this->photoUrl($hash))->fit(640)->save($this->photoUrl($hash, false));

        $user = Auth::user();

        $photo = new Photo([
            'hash'           => $hash,
            'imageable_id'   => $user->id,
            'imageable_type' => 'User'
        ]);

        $user->photos()->save($photo);

        return Redirect::to('admin/photos');
    }

    public function show()
    {
        return View::make('backend.photo.show');
    }

    private function photoUrl($hash = null, $origin = true)
    {
        $hash = $hash ?: Str::random(64);

        if ($origin) $hash .= '-origin';

        return join('/uploads/', [\public_path(), join('.', [$hash, 'jpg'])]);
    }
}
