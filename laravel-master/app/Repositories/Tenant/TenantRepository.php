<?php

namespace App\Repositories\Tenant;

use App\Repositories\BaseRepository;
use App\Repositories\Tenant\TenantRepositoryInterface;
use App\Tenant;

class TenantRepository extends BaseRepository implements TenantRepositoryInterface
{
    /**
     * Specify Model class name
     */
    protected $model;
    
    public function __construct(Tenant $model)
    {
        parent::__construct($model);
    }

    public function getActivatedTenant(){
        return $this->model->where('enable',1)->get();
    }
    
    public function getDeactivatedTenant(){
        return $this->model->where('enable',0)->get();
    }

    public function changeStatusActiveTenant($id){
        $model=$this->model->find($id);
        $model->enable = 1;
        $model->save();

        return $this;
    }
    public function changeStatusDeactiveTenant($id){
        $model=$this->model->find($id);
        $model->enable = 0;
        $model->save();

        return $this;
    }

    /*function model()
    {
        return 'App\Role';
    }*/
}