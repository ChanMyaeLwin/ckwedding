<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'login_value' => 'required',
            'password' => 'required|min:6',
        ]);
        $remember_me = $request->has('remember_me') ? true : false; 
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $input = $request->all();
        $login_value =  $input['login_value'];
        $pattern_1 = '/^([0-9\s\-\+\(\)]*)$/';
        $case_1 = preg_match($pattern_1, $login_value);
        $pattern_2 = filter_var($login_value, FILTER_VALIDATE_EMAIL);
        $case_2 = $pattern_2 ? 1 : 0;
        $pattern_3 = '/^\d{3}(-\d{6})?$/';
        $case_3 = preg_match($pattern_3, $login_value);
        if ($case_3 === 1) {
            $user = User::where('employee_id', $login_value)->first();
        } else if ($case_2 === 1) {
            $user = User::where('email', $login_value)->first();
        } else if ($case_1 === 1) {
            $user = User::where('phone_no', $login_value)->first();
        } else {
            return redirect()->to('login')->withInput()->withErrors(['login_value' => 'Something was wrong. Please Try Again...!!']);
        }

        if (isset($user)) {
            // Set Auth Details
            if (Hash::check($input['password'], $user->password)) {
                Auth::login($user,$remember_me);
                // Redirect home page
                return redirect()->route('home');
            } else {
                return redirect()->route('login')->withInput()->withErrors(['password' => 'Password is not correct']);
            }
        } else {
            return redirect()->to('login')->withInput()->withErrors(['login_value' => 'Something was wrong...!!']);
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
