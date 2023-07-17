<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
     * @return \Illuminate\Http\Response|array<string>
     */
    public function registerAction(Request $request) {
        $input = $this->user->cleanInput($request->collect());
        // Log::debug(print_r($input, true));
        return ['message' => 'Success',];
    }
}
