<?php

namespace App\Repositories\Tenant;
use App\Tenant;
use App\Repositories\RepositoryInterface;
use Throwable;

interface TenantRepositoryInterface extends RepositoryInterface
{
    public function getActivatedTenant();
    public function getDeactivatedTenant();
    public function changeStatusActiveTenant($id);
    public function changeStatusDeactiveTenant($id);
}