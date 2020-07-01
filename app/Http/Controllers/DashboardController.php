<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashBoard(){
        $sumpr =Product::count();
        $sumuser = User::count();
        $total = DB::table('order')->sum('monney');
        $summonth = DB::table('order')->whereMonth('created_at',date('m'))->sum('monney');
        return view('admin.layouts.index',compact('sumpr','sumuser','total','summonth'));
    }
}
