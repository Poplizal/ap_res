<?php

namespace App\Http\Controllers;

use App\Models\Dish;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawStatus=config('res.order_status');
        $status=array_flip($rawStatus);
        $orders=Order::whereIn('status',[1,2])->get();
        return view('Kitchen.orders',compact('orders','status'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

public function approve(Order $order){

$order->status=config('res.order_status.processing');
$order->save();
return redirect('/orders')->with('approve','just approved one dish');

}

public function cancel(Order $order){

    $order->status=config('res.order_status.cancel');
    $order->save();
    return redirect('/orders')->with('cancel','canceled one dish');
    
    }

    public function ready(Order $order){

        $order->status=config('res.order_status.ready');
        $order->save();
        return redirect('/orders')->with('ready','just ready one dish');
        
        }
        public function serve(Order $order){

            $order->status=config('res.order_status.done');
            $order->save();
            return redirect('/order_form')->with('serve','order served');
            }
}
