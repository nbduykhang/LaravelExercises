<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface
{
    /**
    var
     */
    protected $model;

    /**
     */
    /*public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }*/

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    /**
     * Retrieve all data of repository
     */
    public function all()
    {
        return $this->model->all();
    }
    /**
     * Save a new entity in repository
     */
    public function create(array $input){
        return $this->model->create($input);
    }

    public function update(array $input, $id){
        $model = $this->model->findOrFail($id);
        $model->fill($input);
        $model->save();

        return $this;
    }

    public function delete($id){
        return $this->model->where('id',$id)->delete();
    }
    
    public function findLastId(){
        return $this->model->orderBy('id','desc')->first();
    }

    public function findById($id){
        return $this->model->find($id);
    }

    public function getAllDeleted(){
        return $this->model->onlyTrashed()->get();
    }

    public function restoreAllDeleted(){
        return $this->model->onlyTrashed()->restore();
    }

    public function restoreDeleted($id){
        return $this->model->onlyTrashed()->find($id)->restore();
    }

    /**
     * Retrieve all data of repository, paginated
     */
    /*public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 10) : $limit;

        return $this->model->paginate($limit, $columns);
    }*/
    /**
     * Find data by id
     */
    /*public function find($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }*/



    /**
     * Update a entity in repository by id
     */
    /*public function update(array $input, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($input);
        $model->save();

        return $this;
    }
    
    /**
     * Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     */
    /*public function delete($id)
    {
        return $this->model->destroy($id);
    }*/
}