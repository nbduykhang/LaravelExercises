<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Retrieve all data of repository
     */
    public function all();

    public function create(array $input);

    public function update(array $input, $id);

    public function delete($id);

    public function findLastId();

    public function findById($id);

    public function getAllDeleted();

    public function restoreDeleted($id);

    public function restoreAllDeleted();


    /*public function update();

    public function delete();*/

     /**
     * Find data by id
     */
    /*public function find($id, $columns = ['*']);

    public function paginate($limit = null, $columns = ['*']);
    /**
     * Save a new entity in repository
     */
    /*public function create(array $input);

    public function update(array $input, $id);
    
    public function delete($id);*/
}