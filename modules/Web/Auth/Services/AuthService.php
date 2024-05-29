<?php

namespace BasicDashboard\Web\Auth\Services;

use BasicDashboard\Web\Common\BaseController;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseController
{
    public function __construct(
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        if (Auth::user() == null) {
            return view('auth.login');
        } else {
            return redirect("/");
        }
    }

    public function authorizeOperator($request)
    {
        if (Auth::attempt($request)) {
            return redirect("/login");
        }
        return redirect()->back()->with("message", '');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}