<?php

namespace App\Contracts\Repositories;


interface RepositoryContract
{
    public function findAll();
    public function create($data);
}