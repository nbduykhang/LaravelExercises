<?php

namespace App\Repositories\Relationship;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use App\PermissionRole;

class PermissionRoleRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(PermissionRole $model)
    {
        parent::__construct($model);
    }

    public function findByRoleId($role_id){
        return $this->model->where('role_id',$role_id)->get();
    }
    /*function model()
    {
        return 'App\Role';
    }*/
}