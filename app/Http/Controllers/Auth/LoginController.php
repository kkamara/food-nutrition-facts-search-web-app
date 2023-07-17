<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest')->only(['index',]);
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
     * @return \Illuminate\Http\Response|array<string>
     */
    public function loginAction(Request $request) {
        return ['message' => 'Success',];
    }
}
