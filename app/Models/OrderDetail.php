<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    protected $table = 'orderdetail';
    protected $fillable = [
        'idOrder','idProduct', 'quantity', 'price', 'name'
    ];
    public function order(){
        return $this->belongsTo('App\Models\Order','idOrder','id');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product','idProduct','id');
    }
}
