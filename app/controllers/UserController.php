<?php

class UserController extends BaseController {

    public function __construct()
    {
        $this->beforeFilter('csrf', ['on'=>'post']);
        $this->beforeFilter('auth', ['only' => ['edit']]);
    }

    public function index()
    {
        return View::make('users.index')
            ->withUsers(User::with('profile')->paginate(30));
    }

    public function create()
    {
        return View::make('user.new');
    }

    public function store()
    {
        $email = strtolower(Input::get('email'));
        $username = Input::get('username');

        $validator = new Crayon\Validators\UserValidator(array_merge(Input::all(), ['email'=>$email]));

        if ($validator->fails()) {
            Session::flash('message', $validator->messages()->first());
            return Redirect::to('signup')
                ->withInput();
        }

        $user = new User([
            'email'    => $email,
            'username' => $username,
            'downcase' => strtolower($username)
        ]);
        $user->password = Hash::make(Input::get('password'));
        $user->avatar_url = Str::gravatarUrl($user->email);

        if ($user->save() and $user->profile()->save(new Profile(['verify_token'=>str_random(64)]))) {
            Auth::login($user);
            return Redirect::to('/');
        }
        return Redirect::to('signup');
    }

    public function profileShow($username)
    {
        $user = User::whereUsername($username)->first() ?: User::whereDowncase(strtolower($username))->first();

        if ($user) {

            if (Input::get('tab') == 'activity') {
                return View::make('user.profile.activity')
                    ->withUser($user);
            }

            if (Input::get('tab') == 'topics') {
                $user->load('topics');
                return View::make('user.profile.topics')
                    ->withUser($user);
            }

            $user->load('profile');
            return View::make('user.profile.show')
                ->withUser($user);
        }
        App::abort();
    }

    public function profileEdit()
    {
        return View::make('user.profile.edit')
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

        Session::flash('message', Lang::get('locale.profile_updated'));
        return Redirect::to('settings/profile');
    }

    public function avatarStore()
    {
        $validator = Validator::make(Input::all(), ['avatar'=>'mimes:jpeg,jpg,png,gif']);

        if ($validator->fails()) {
            return Redirect::to('settings/profile');
        }

        $user = Auth::user();

        $avatar = new Crayon\Utils\Avatar(Input::file('avatar'));
        $avatar->touch($user->email)->save();

        $user->avatar_url = URL::to(join('/', ['avatars', md5($user->email).'s92.jpg']));
        $user->save();

        return Redirect::back();
    }

    public function edit()
    {
        return View::make('user.password.edit');
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
        return View::make('user.topics')
            ->withUser(Auth::user());
    }

    public function replies($username)
    {
        return View::make('user.replies')
            ->withUser(Auth::user());
    }

    public function following($username)
    {
        $user = User::with('following')->whereUsername($username)->first();
        if ($user) {
            return View::make('user.following')
                ->withUser($user);
        }
        App::abort();
    }

    public function followers($username)
    {
        $user = User::with('followers')->whereUsername($username)->first();
        if ($user) {
            return View::make('user.followers')
                ->withUser($user);
        }
        App::abort();
    }

    public function activity($username)
    {
        $user = User::whereUsername($username)->first();
        if ($user) {
            return View::make('user.activity')
                ->withUser($user);
        }
        App::abort();
    }

    public function watching($username)
    {
        return View::make('user.watching')
            ->withUser(Auth::user());
    }

    public function likes($username)
    {
        return View::make('user.likes')
            ->withUser(Auth::user());
    }
}
