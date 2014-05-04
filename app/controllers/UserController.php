<?php

class UserController extends BaseController {

    public function __construct()
    {

    }

    public function index()
    {
        return View::make('users.index')
            ->withUsers(User::with('profile')->paginate(30));
    }

    public function create()
    {
        return View::make('users.signup');
    }

    public function store()
    {
        $validator = new Ampou\Validators\UserValidator;

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $user = new User([
            'email'    => Input::get('email'),
            'username' => Input::get('username')
        ]);
        $user->password = Hash::make(Input::get('password'));
        $user->avatar_url = Str::avatar_url($user->email);

        if ($user->save() and $user->profile()->save(new Profile)) {
            Auth::login($user);
            return Redirect::to('/');
        }
        return Redirect::back();
    }

    public function show($username)
    {
        $user = User::whereUsername($username)->first();
        if ($user) {
            $user->load('profile');
            return View::make('users.show')
                ->withUser($user);
        }
        App::abort();
    }

    public function profileEdit()
    {
        return View::make('users.profile.edit')
            ->withUser(Auth::user()->load('profile'));
    }

    public function profileUpdate()
    {
        Auth::user()->profile->update([
            'nickname'      => Input::get('nickname'),
            'location'      => Input::get('location'),
            'school'        => Input::get('school'),
            'website'       => Input::get('website'),
            'contact_email' => Input::get('contact_email'),
            'biography'     => Input::get('biography')
        ]);

        Session::flash('msg', Lang::get('locale.profile_updated'));
        return Redirect::to('settings/profile');
    }

    public function avatarStore()
    {
        $validator = Validator::make(Input::all(), ['avatar'=>'mimes:jpeg,jpg,png,gif']);
        if ($validator->fails()) {
            return Redirect::to('settings/profile');
        }
        $user = Auth::user();
        $avatar = Image::make(Input::file('avatar')->getRealPath());
        $user_uploads = join('/', [public_path(), 'uploads', md5($user->email)]);
        File::exists($user_uploads) or File::makeDirectory($user_uploads);
        $avatar->grab(256)->save(join('/', [$user_uploads, 'avatar.jpg']));
        $avatar->grab(56)->save(join('/', [$user_uploads, 'avatar_s56.jpg']));

        $user->avatar_url = URL::to(join('/', ['uploads', md5($user->email), 'avatar_s56.jpg']));
        $user->save();

        return Redirect::back();
    }

    public function edit()
    {
        return View::make('users.edit');
    }

    public function update()
    {
        $user = Auth::user();

        if (! Hash::check(Input::get('current_password'), $user->password)) {
            Session::flash('msg', Lang::get('locale.old_pw_incorrect'));
            return Redirect::to('settings/password');
        }

        $validator = Validator::make(Input::all(), [
            'password'              => 'required|alpha_dash|between:6,16|confirmed',
            'password_confirmation' => 'required|alpha_dash|between:6,16'
        ]);

        if ($validator->fails()) {
            Session::flash('msg', $validator->messages()->first('password'));
            return Redirect::to('settings/password');
        }

        $user->password = Hash::make(Input::get('password'));
        $user->save();

        Session::flash('msg', Lang::get('locale.password_updated'));
        return Redirect::to('settings/password');
    }

    public function notify()
    {
        return Redirect::to('settings/profile');
    }

    public function topics($username)
    {
        $user = User::with('Topics')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.topics')
                ->withUser($user);
        }
        App::abort();
    }

    public function following($username)
    {
        $user = User::with('following')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.following')
                ->withUser($user);
        }
        App::abort();
    }

    public function followers($username)
    {
        $user = User::with('followers')->whereUsername($username)->first();
        if ($user) {
            return View::make('users.followers')
                ->withUser($user);
        }
        App::abort();
    }
}
