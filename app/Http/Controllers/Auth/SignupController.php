<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->only(['registerAction',]);
    }

    /**
     * Show the auth homepage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|array<string>
     */
    public function registerAction(Request $request) {
        return ['message' => 'Success',];
    }
}
