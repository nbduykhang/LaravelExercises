<?php

namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function changeStatus($id){
    	$model=$this->model->find($id);
    	if($model->status==1){
    		$model->status = 0;
    		$model->save();
    	} else {
    		$model->status = 1;
    		$model->save();
    	}
    	return $this;
    }

    /*function model()
    {
        return 'App\Role';
    }*/
}