<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Traits\CrudRepositoryTrait;

class ProductsRepository
{
    use CrudRepositoryTrait;

    public $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function batchQuantity($id)
    {
        $quantity = collect(Product::where('batch_id' , $id)->select('quantity')->get());
         dd($quantity->sum(['quantity']));
         return $quantity;
    }

    public function batchAltQuantity($id)
    {
        $altQuantity = collect(Product::where('batch_id' , $id)->select('alt_quantity')->get());
        return $altQuantity;
    }
}
