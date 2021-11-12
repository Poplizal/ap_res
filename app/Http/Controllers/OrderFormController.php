<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables=Table::all();
        $dishes=Dish::orderBy('id','desc')->get();
        $orders=Order::where('status',4)->get();
        $rawStatus=config('res.order_status');
        $status=array_flip($rawStatus);
        return view('order_form',compact('dishes','tables','orders','status'));
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
        $request->validate([
            'phoneNo' => 'required|max:20',
        ]);
  
$orders=array_filter($request->except('_token','phoneNo','table'));

if(count($orders) >= 1){
foreach($orders as $key=>$value){
    $rand=rand();
    DB::table('orders')->insert([
        'table_id'=>(int)$request->table,
        'dish_id'=>$key,
        'phoneNo'=>$request->phoneNo,
        'status'=>config('res.order_status.new'),
        'quantity'=>(int)$value,
        'created_at'=>now(),
       ]);
};
return redirect('/')->with('ordered','successfully ordered!');

}else{
    return redirect('/')->with('No_order_yet','Please order something that you love to enjoy!');
}
 
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
}
