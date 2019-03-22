<?php

namespace App\Repositories\Relationship;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use App\PermissionUser;

class PermissionUserRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(PermissionUser $model)
    {
        parent::__construct($model);
    }

    /*function model()
    {
        return 'App\Role';
    }*/
}