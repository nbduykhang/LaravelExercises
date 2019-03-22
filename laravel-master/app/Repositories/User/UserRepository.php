<?php

namespace App\Repositories\User;

use App\User;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

	public function getActivatedUser(){
    	return $this->model->where('status',1)->get();
    }
    
    public function getDeactivatedUser(){
    	return $this->model->where('status',0)->get();
    }

    public function changeStatusActiveUser($id){
    	$model=$this->model->find($id);
    	$model->status = 1;
    	$model->save();

    	return $this;
    }
    public function changeStatusDeactiveUser($id){
    	$model=$this->model->find($id);
    	$model->status = 0;
    	$model->save();

    	return $this;
    }

    /*function model()
    {
        return 'App\User';
    }*/
}