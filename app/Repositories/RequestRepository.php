<?php

namespace App\Repositories;

use App\Contracts\Repositories\RequestRepositoryContract;
use App\Models\Request;

class RequestRepository extends RepositoryAbstract implements RequestRepositoryContract
{
    public function __construct(Request $model)
    {
        parent::__construct($model);
    }
}