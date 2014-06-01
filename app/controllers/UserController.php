<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', [
            'on' => 'post'
        ]);
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
        $email = strtolower(Input::get('email'));
        $username = Input::get('username');

        $validator = new Ampou\Validators\UserValidator(array_merge(Input::all(), ['email'=>$email]));

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        $user = new User([
            'email'    => $email,
            'username' => $username,
            'downcase' => strtolower($username)
        ]);
        $user->password = Hash::make(Input::get('password'));
        $user->avatar_url = Str::avatar_url($user->email);

        if ($user->save() and $user->profile()->save(new Profile(['verify_token'=>str_random(64)]))) {
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
        $avatar->fit(256)->save(join('/', [$user_uploads, 'avatar.jpg']));
        $avatar->fit(56)->save(join('/', [$user_uploads, 'avatar_s56.jpg']));

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

    public function verify($token)
    {
        $profile = Profile::whereVerifyToken($token)->first();
        if (! $profile) {
            App::abort(404);
        }

        $user = $profile->user;
        if ($user->verify) {
            App::abort(400);
        }

        $user->verify = true;
        $user->save();

        return Redirect::to('/');
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
