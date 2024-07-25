<?php

namespace BasicDashboard\Web\Roles\Services;

use BasicDashboard\Foundations\Domain\Roles\Repositories\Eloquent\RoleRepository;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Roles\Resources\RoleResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class RoleService extends BaseController
{
    public function __construct(
        private RoleRepository $roleRepository,
    )
    {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index($request)
    {
        $params = $request->only('keyword');
        $roleList = $this->roleRepository->getRoleList($params);
        $roleList = RoleResource::collection($roleList)->response()->getData(true);
        return $this->returnView('hr.role.index', $roleList, $params);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create()
    {
        return view('hr.role.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store($request)
    {
        try {
            $this->roleRepository->beginTransaction();
            $this->roleRepository->insert($request);
            $this->roleRepository->commit();
            //return $this->redirectRoute(self::ROUTE.".index", "Name was successfully created.");
        } catch (Exception $e) {
            //return $this->redirectBackWithError($this->roleRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id)
    {

    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update($request, string $id)
    {

    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request)
    {

    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
}