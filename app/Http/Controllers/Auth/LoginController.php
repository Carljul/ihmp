<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Traits\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/certificate';

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
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function login(Request $request) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            
            // Make sure the user is active
            if ($user->is_active) {
                if($this->attemptLogin($request)){
                    // Send the normal successful login response
                    return $this->sendLoginResponse($request);
                }else{
                    // Increment the failed login attempts and redirect back to the
                    // login form with an error message.
                    $this->incrementLoginAttempts($request);
                    throw ValidationException::withMessages([
                        $this->password() => [trans('auth.failed')],
                    ]);
                }
            } else {
                // Increment the failed login attempts and redirect back to the
                // login form with an error message.
                $this->incrementLoginAttempts($request);
                throw ValidationException::withMessages([
                    $this->username() => [trans('This is account is not yet activated')],
                ]);
            }
        }else{
            // Increment the failed login attempts and redirect back to the
            // login form with an error message.
            $this->incrementLoginAttempts($request);
            throw ValidationException::withMessages([
                $this->username() => [trans('No matching records found')],
            ]);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->authenticated($request);
    }

    
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $accessToken = '';
        for ($i = 0; $i < 32; $i++) {
            $accessToken .= $characters[rand(0, $charactersLength - 1)];
        }
        $encryptedUsername = md5($user->email);
        $accessToken .= "|".$user->id."|".$encryptedUsername;

        $user_id = $user->id;
        $payload = (object) array(
            "user_id"=>$user_id,
            "token_key"=>$accessToken,
        );
        
        $result = app('App\Http\Controllers\AccessTokenController')->store($payload);
        
        if($result->getData()->status == 200){
            echo "<script>"
            ."localStorage.removeItem('AT');"
            ."localStorage.setItem('AT','".$accessToken."');"
            ."localStorage.setItem('defaultForm','individual');"
            ."</script>";
        }
        
        return view('pages.certificates.index');
    }
    public function logout(Request $request)
    {
        /// TODO:: Update the accesstoken table and set the status to expire

        $this->guard('web_buyer')->logout();
        echo "<script>"
        ."localStorage.removeItem('AT');"
        ."window.location.replace('/login');"
        ."</script>";
    }
}