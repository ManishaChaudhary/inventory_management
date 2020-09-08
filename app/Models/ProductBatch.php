<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBatch extends Model
{
    protected $table  = "product_batches";
    protected $fillable = [
        'title',  'company_id' , 'godown_id' , 'product_type_id' , 'created_by',
        'updated_by' , 'status'
    ];

    protected $primaryKey = "id";

    public function scopeActive($query)
    {
        return $query->where('status', 'Active');
    }

    public function company()
    {
        return $this->belongsTo('App\Company' , 'company_id');
    }

    public function godown()
    {
        return $this->belongsTo('App\Godown' , 'godown_id');
    }
    public function product_type()
    {
        return $this->belongsTo('App\ProductType' , 'product_type_id');
    }

    public function created_by()
    {
        return $this->belongsTo('App\User' , 'created_by');
    }

    public function updated_by()
    {
        return $this->belongsTo('App\User' , 'updated_by');
    }
}
