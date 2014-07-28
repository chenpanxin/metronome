<?php namespace Metronome\Layers;

use Lang;
use View;
use User;

class UserController extends BaseController {

    public function index()
    {
        return View::make('backend.user.index')
            ->withTitle(Lang::get('locale.users'))
            ->withStaffs(User::whereStaff(true)->get())
            ->withUsers(User::normal()->paginate(16));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        if (is_null($user)) App::abort();

        $user->load('profile');

        return View::make('backend.user.show')
            ->withTitle($user->username)
            ->withUser($user);
    }
}
