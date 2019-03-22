<?php

namespace App\Repositories\Relationship;

use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use App\RoleUser;

class RoleUserRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(RoleUser $model)
    {
        parent::__construct($model);
    }

    public function countUserOfRole($role_id){
        return $this->model->where('role_id',$role_id)->count();
    }

    public function findByUserId($user_id){
        return $this->model->where('user_id',$user_id)->first();
    }

    public function updateOrCreate(array $input, $id){
        $model = $this->model->updateOrCreate(['user_id'=>$id], $input);
    }

    /*function model()
    {
        return 'App\Role';
    }*/

}