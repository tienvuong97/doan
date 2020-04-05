<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = 'product_type';
    protected $fillable = [
       'idCategory','name','slug','status',
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category','idCategory','id');
    }
    public function products(){
        return $this->hasMany('App\Models\Product','idProductType','id');
    }
}
