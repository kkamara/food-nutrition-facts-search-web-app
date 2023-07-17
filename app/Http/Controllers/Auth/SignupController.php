<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class SignupController extends Controller
{
    protected User $user;

    public function __construct() {
        $this->middleware('guest')->only(['registerAction',]);
        $this->user = new User();
    }

    /**
     * Show the auth homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|array<string>|\Illuminate\Http\RedirectResponse
     */
    public function registerAction(Request $request) {
        $input = $this->user->cleanInput($request->collect());
        if (
            !isset($input['email']) ||
            !isset($input['password']) ||
            !isset($input['password_confirmation'])
        ) {
            $errors = [];
            if (!isset($input['email'])) {
                $errors['email'] = 'Missing email field.';
            }

            if (!isset($input['password'])) {
                $errors['password'] = 'Missing password field.';
            }

            if (!isset($input['password_confirmation'])) {
                $errors['password_confirmation'] = 'Missing password confirmation field.';
            }

            return redirect()->back()->with(['register.errors' => $errors]);
        }
        $userExists = $this->user->where('email', $input['email'])->first();
        if (null !== $userExists) {
            $errors = [];
            $errors['email'] = 'The email field is already registered. Please login or contact system administrator.';
            return redirect()->back()->with(['register.errors' => $errors]);
        }
        if ($input['password'] !== $input['password_confirmation']) {
            $errors = [];
            $errors['password_confirmation'] = 'The password confirmation field does not match the password field..';
            return redirect()->back()->with(['register.errors' => $errors]);
        }
        $this->user->email = $input['email'];
        $this->user->password = $input['password'];
        $this->user->save();
        Auth::login($this->user);
        $request->session()->regenerate();
        
        return redirect()->home();
    }
}
