<?php

namespace BasicDashboard\Web\Roles\Controllers;

use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Roles\Services\RoleService;
use BasicDashboard\Web\Roles\Validation\StoreRoleRequest;
use BasicDashboard\Web\Roles\Validation\UpdateRoleRequest;
use BasicDashboard\Web\Roles\Validation\DeleteRoleRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class RoleController extends BaseController
{
    public function __construct(
        private RoleService $roleService
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index(Request $request)
    {
        return $this->roleService->index($request);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create()
    {
        return $this->roleService->create();
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(StoreRoleRequest $request)
    {
        return $this->roleService->store($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id)
    {
        return $this->roleService->edit($id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(UpdateRoleRequest $request, string $id)
    {
        return $this->roleService->update($request->validated(), $id);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy(DeleteRoleRequest $request)
    {
        return $this->roleService->destroy($request->validated());
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}