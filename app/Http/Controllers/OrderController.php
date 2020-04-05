<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function postBuyy(Request $request){
        $cart = Cart::getContent();
        $monney = str_replace(',','',Cart::getTotal());
            $order = new Order();
            $order->idUser = Auth::user()->id;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->monney = $monney;
            $order->save();
            $tt = Order::orderBy('created_at', 'desc')->first();
            foreach($cart as $cart){
                $order_detail = new OrderDetail();
                $order_detail->idOrder = $tt->id;
                $order_detail->idProduct = $cart->id;
                $order_detail->quantity = $cart->quantity;
                $order_detail->price = $cart->price;
                $qtyproduct = DB::table('product')->where('id',$cart->id)->select('quantity')->get();
                $qty = (float)$qtyproduct - (float)$cart->quantity;
                dd($qty);
                $order_detail->save();
                
            }
        $cart = Cart::clear();
        return redirect('checkout');
    }
    public function getList()
    {
        $order = Order::paginate(5);
        return view('admin.pages.order.order_list',['order'=>$order]);
    }
    public function getEdit($id){
        $order = Order::find($id);
        return view('admin.pages.order.edit',['order'=>$order]);
    }
    public function postEdit(Request $request,$id){
        $order = Order::find($id);
        $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->monney = $request->monney;
            $order->status = $request->status;
            $order->save();
            return redirect('admin/order/list');
    }
    public function getOrderDetail($id){
        $order_detail = OrderDetail::where('idOrder',$id)->get();
        return view('admin.pages.order.order_detail',['order_detail'=>$order_detail]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function postBuy(Request $request){
        
    }
}
