<?php

namespace App\Repositories\Permission;

use App\Permission;
use App\Repositories\BaseRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }

    /*function model()
    {
        return 'App\Permission';
    }*/
}