<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $fillable = [
        'name', 'slug', 'description','quantity','price','promotional','idCategory','idProductType','image','status',
    ];
    public function productType(){
        return $this->belongsTo('App\Models\ProductType','idProductType','id');
    }
    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetail','idProduct','id');
    }

}
