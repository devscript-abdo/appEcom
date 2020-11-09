<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'theadmin/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $appGuard = [];

    public function __construct($appGuard)
    {

        $this->middleware('guest:admin,moderator')->except('logout');

        $this->appGuard = $appGuard;

        //$this->redirectTo = route('admin.dash');
    }

    public function showLoginForm()
    {
        return view('theme_a.login.index');
    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect(route('admin.dash'));
    }


    protected function attemptLogin(Request $request)
    {
        if (!$request->has('guard') && !$request->filled('guard')) {

            return;
        }

        $guard = $request->only('guard');
       
        if (!isset($guard) && !in_array($guard['guard'], $this->appGuard)) {

            return;
        }
        return $this->guard($guard['guard'])->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($guard = 'admin')
    {
        return Auth::guard($guard);
    }
}
