<?php

namespace App\Helpers;


use App\Models\Product;
use App\Models\ProductType;

class TypeHelper
{
    public function typeQuantity($id)
    {
        $quantity = collect(Product::where('product_type_id', $id)->select('quantity')->get());
        return $quantity->sum('quantity');
    }

    public function typeAltQuantity($id)
    {
        $altQuantity = collect(Product::where('product_type_id', $id)->select('alt_quantity')->get());
        return $altQuantity->sum('alt_quantity');
    }

    public function getTypeForDropdown()
    {
        return ProductType::pluck('title','id');
    }
}
