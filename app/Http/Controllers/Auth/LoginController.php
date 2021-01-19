<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    protected $username;

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('guest')->except('logout');
            $this->username = 'username';
        }

        function authenticated(Request $request, $user)
        {
          if($user->is_active){
            $user->last_login_at = Carbon::now();
            $user->last_login_ip = $request->getClientIp();
            $user->save();
          }else{
            auth()->logout();
            Session()->flush();
            return redirect('/')->with('error', "Essa conta encontra-se desactivada, contacte o administrador do sistema");
          }

        }
        /**
         * Get username property.
         *
         * @return string
         */

        public function username()
        {
            return $this->username;
        }
}
