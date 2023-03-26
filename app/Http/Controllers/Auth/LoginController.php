<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Show the application's login form.
   *
   * @return \Illuminate\View\View
   */
  public function showLoginForm()
  {
    return view('auth.auth-login-sneat');
  }
  public function showLoginFormWali()
  {
    return view('auth.auth-login-sneat-wali');
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function authenticated(Request $request, $user)
  {
    if ($user->akses == 'operator' || $user->akses == 'admin') {
      return redirect()->route('operator.beranda');
    } elseif ($user->akses == 'wali') {
      return redirect()->route('wali.beranda');
    } else {
      Auth::user()->logout();
      flash('Anda tidak memiliki hak akses')->error();
      return redirect()->route('login');
    }
  }
}
