<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Exception;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * @property User $user
     */
    protected User $user;

    public function __construct() {
        $this->middleware('guest')->only(['index',]);
        $this->middleware('auth')->only(['destroy',]);
        $this->user = new User();
    }

    /**
     * Show the auth homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        $title = 'Login & Signup';
        return view('auth/index', compact('title'));
    }

    /**
     * Show the auth homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function loginAction(Request $request) {
        $input = [
            'email' => $request->input('email'), 'password' => $request->input('password'),
        ];
        if (false === isset($input['email'])) {
            $errors = ['email' => 'Missing email field.'];
            return redirect()->back()->with(['login.errors' => $errors])->withInput();
        }
        if (false === isset($input['password'])) {
            $errors = ['email' => 'Missing password field.'];
            return redirect()->back()->with(['login.errors' => $errors])->withInput();
        }

        $input['email'] = filter_var($input['email'], FILTER_SANITIZE_STRING);

        $remember = 0;
        if ('true' === $request->input('remember')) {
            $remember = 1;
        }
        
        /** 
         * This line results in a redirect home if true is returned, 
         * because of middleware setup in constructor. 
         * @var bool $authAttempt
         */
        $authAttempt = Auth::attempt(['email'=>$input['email'], 'password'=>$input['password']], $remember);
        if (false !== $authAttempt) {
            $errors = [];
            $errors['email'] = 'Invalid username and password combination. Please login or contact system administrator.';
            return redirect()->back()->with(['login.errors' => $errors])->withInput();
        }
        
        $user = $this->user->where('email', 'like', '%'.$input['email'].'%')->first();
        if (null === $user) {
            $errors = [];
            $errors['email'] = "The email field doesn't exist in our records. Please sign up.";
            return redirect()->back()->with(['login.errors' => $errors])->withInput();
        }
        
        $user->updated_at = Carbon::now();
        $user->save();
        Auth::login($user, $remember);
        $request->session()->regenerate();
        
        return redirect()->home();
    }

    /**
     * Logout and redirect to auth homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function logoutAction(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->home();
    }
}
