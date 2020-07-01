<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Category;
use App\Models\Order;

class AjaxController extends Controller
{
    //
    public function getProductType(Request $request){
        $producttype = ProductType::where('idCategory',$request->idCate)->get();
        return response()->json($producttype,200);
    }

    public function setOrderStatus(Request $request){
        $orderId = $request->orderId;
        $orderStatus = $request->orderStatus;

        Order::where('id',$orderId)->update(array('status'=>$orderStatus));
      

        return response()->json([
            'data'=>$orderStatus,200
        ]);
    }
}
