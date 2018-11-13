<?php

namespace App\Repositories;


use App\Contracts\Repositories\RepositoryContract;

abstract class RepositoryAbstract implements RepositoryContract
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->get();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}