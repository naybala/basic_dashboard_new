<?php

namespace BasicDashboard\Foundations\Domain\Users\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use BasicDashboard\Foundations\Domain\Users\Repositories\UserRepositoryInterface;
use BasicDashboard\Foundations\Domain\Users\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    protected function filterUser(array $params): Builder | User
    {
        $connection = $this->connection();
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $connection = $connection->where('name', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $connection;
    }

    public function getUserList($params): LengthAwarePaginator
    {
        return $this->filterUser($params)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->orderBy('id', 'desc')
            ->paginate(20);
    }
}