<?php
namespace BasicDashboard\Foundations\Domain\Users\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function getUserList($params): LengthAwarePaginator;
}