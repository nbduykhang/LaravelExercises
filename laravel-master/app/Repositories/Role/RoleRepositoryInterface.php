<?php

namespace App\Repositories\Role;
use App\Role;
use App\Repositories\RepositoryInterface;
use Throwable;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function changeStatus($id);
}