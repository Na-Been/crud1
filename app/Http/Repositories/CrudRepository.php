<?php

namespace App\Http\Repositories;


use App\Http\Repositories\Contrasts\Repository;
use App\Models\Crud;

class  CrudRepository extends Repository
{
    protected $model;

    public function __construct(Crud $model)
    {
        $this->model = $model;
    }


}
