<?php

namespace BasicDashboard\Foundations\Domain\Roles\Repositories\Eloquent;

use BasicDashboard\Foundations\Domain\Base\Repositories\Eloquent\BaseRepository;
use BasicDashboard\Foundations\Domain\Roles\Repositories\RoleRepositoryInterface;
use BasicDashboard\Foundations\Domain\Roles\Role;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    protected function filterRole(array $params): Builder | Role
    {
        $connection = $this->connection();
        if (isset($params['keyword']) && strlen($params['keyword']) > 0) {
            $connection = $connection->where('name', 'LIKE', '%' . $params['keyword'] . '%');
        }
        return $connection;
    }

    public function getRoleList($params): LengthAwarePaginator
    {
        return $this->filterRole($params)
            ->orderByRaw('CASE WHEN created_at IS NULL THEN updated_at ELSE created_at END DESC')
            ->orderBy('id', 'desc')
            ->paginate(20);
    }
}