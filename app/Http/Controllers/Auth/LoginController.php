<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return mixed
     */
    public function showLoginForm()
    {
        return view('auth.login.index');
    }

    /**
     * @param Request $request
     * @param $user
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, User $user): RedirectResponse
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.home');
        }

        return redirect()->route('home');
    }
}
