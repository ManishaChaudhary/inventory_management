<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'title', 'batch_id', 'product_type_id', 'quantity', 'alt_quantity'
    ];

    protected $primaryKey = "id";

    public function batch()
    {
        return $this->belongsTo('App\ProductBatch', 'batch_id');
    }
}
