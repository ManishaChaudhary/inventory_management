<?php

namespace App\Repositories;

use App\Models\ProductType;
use App\Repositories\Traits\CrudRepositoryTrait;

class ProductTypeRepository
{
    use CrudRepositoryTrait;

    public $model;

    public function __construct(ProductType $model)
    {
        $this->model = $model;
    }
}
