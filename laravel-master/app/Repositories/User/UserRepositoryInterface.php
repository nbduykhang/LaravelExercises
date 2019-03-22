<?php

namespace App\Repositories\User;
use App\User;
use App\Repositories\RepositoryInterface;
use Throwable;

interface UserRepositoryInterface extends RepositoryInterface
{
	public function getActivatedUser();
    public function getDeactivatedUser();
    public function changeStatusActiveUser($id);
    public function changeStatusDeactiveUser($id);
}