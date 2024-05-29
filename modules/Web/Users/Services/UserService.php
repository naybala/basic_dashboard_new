<?php

namespace BasicDashboard\Web\Users\Services;

use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Users\Resources\UserResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Exception;

class UserService extends BaseController
{
    const VIEW = 'admin.user';
    const ROUTE = 'users';
    const SUCCESS = 'User was successfully';
    public function __construct(
        private UserRepository $userRepository,
    )
    {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index($request)
    {
        $params = $request->only('keyword');
        $userList = $this->userRepository->getUserList($params);
        $userList = UserResource::collection($userList)->response()->getData(true);
        return $this->returnView(self::VIEW . '.index', $userList, $params);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create()
    {
        return view(self::VIEW . '.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(array $request)
    {
        try {
            $this->userRepository->beginTransaction();
            $this->userRepository->insert($request);
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE.".index", self::SUCCESS." created.");
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
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