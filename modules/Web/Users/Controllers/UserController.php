<?php

namespace BasicDashboard\Web\Users\Controllers;

use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Users\Services\UserService;
use BasicDashboard\Web\Users\Validation\StoreUserRequest;
use BasicDashboard\Web\Users\Validation\UpdateUserRequest;
use BasicDashboard\Web\Users\Validation\DeleteUserRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class UserController extends BaseController
{
    public function __construct(
        private UserService $userService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request)
    {
        return $this->userService->index($request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create()
    {
        return $this->userService->create();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(StoreUserRequest $request)
    {
        return $this->userService->store($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id)
    {
        return $this->userService->edit($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(UpdateUserRequest $request, string $id)
    {
        return $this->userService->update($request->validated(), $id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy(DeleteUserRequest $request)
    {
        return $this->userService->destroy($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}