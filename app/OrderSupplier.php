<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use Sqits\UserStamps\Concerns\HasUserStamps;

class OrderSupplier extends Model
{
       use HasUserStamps;
   // use SoftDeletes;

    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);

    }//end of user
    public function store()
    {
        return $this->belongsTo(Store::class);

    }//end of store

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order_supplier')->withPivot('quantity','price','transport');

    }//end of products

}//end of model
