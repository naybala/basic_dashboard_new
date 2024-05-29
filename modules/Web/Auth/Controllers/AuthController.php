<?php

namespace BasicDashboard\Web\Auth\Controllers;

use BasicDashboard\Web\Auth\Services\AuthService;
use BasicDashboard\Web\Auth\Validation\AuthLoginRequest;
use BasicDashboard\Web\Common\BaseController;

class AuthController extends BaseController
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return $this->authService->login();
    }

    public function authorizeOperator(AuthLoginRequest $request)
    {
        return $this->authService->authorizeOperator($request->validated());
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}