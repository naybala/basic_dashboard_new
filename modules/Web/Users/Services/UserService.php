<?php

namespace BasicDashboard\Web\Users\Services;

use BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent\UserRepository;
use BasicDashboard\Web\Common\BaseController;
use BasicDashboard\Web\Users\Resources\UserResource;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserService extends BaseController
{
    const VIEW = 'admin.user';
    const ROUTE = 'users';
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function index($request): View
    {
        $params = $request->only('keyword');
        $userList = $this->userRepository->getUserList($params);
        $userList = UserResource::collection($userList)->response()->getData(true);
        return $this->returnView(self::VIEW . '.index', $userList, $params);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function create(): View
    {
        return view(self::VIEW . '.create');
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function store(array $request): RedirectResponse
    {
        try {
            $this->userRepository->beginTransaction();
            $this->userRepository->insert($request);
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __('user.user_created'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function edit(string $id): View | RedirectResponse
    {
        $user = $this->userRepository->edit($id);
        return $this->returnView(self::VIEW . ".edit", $user);
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function update(array $request): RedirectResponse
    {
        try {
            $this->userRepository->beginTransaction();
            $match = $this->isPasswordMatch($request['id'], $request['password']);
            if ($match) {
                $request['password'] = Hash::make($request['newPassword']);
                $request = Arr::except($request, ['newPassword']);
            } else {
                return redirect()->back()->with([
                    'base_error' => __('user.old_password_wrong'),
                ]);
            }
            $this->userRepository->update($request, $request['id']);
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __('user.user_updated'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }

    }

    ///////////////////////////This is Method Divider///////////////////////////////////////

    public function destroy($request): RedirectResponse
    {
        try {
            $this->userRepository->beginTransaction();
            $this->userRepository->delete($request['id']);
            $this->userRepository->commit();
            return $this->redirectRoute(self::ROUTE . ".index", __('user.user_deleted'));
        } catch (Exception $e) {
            return $this->redirectBackWithError($this->userRepository, $e);
        }
    }

    ///////////////////////////This is Method Divider///////////////////////////////////////
    private function isPasswordMatch(int $id, string $oldPassword): bool
    {
        $password = $this->userRepository->connection(true)->where('id', $id)->value('password');
        return Hash::check($oldPassword, $password);
    }
}
