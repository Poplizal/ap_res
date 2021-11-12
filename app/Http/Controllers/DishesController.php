<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DishCreateRequest;

class DishesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes=Dish::all();
      return view('Kitchen.dishes',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('Dishes.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    { 
        
        $imageName=$request->image->getClientOriginalName().".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path('dish_images'), $imageName);

        DB::table('dishes')->insert([
         'name'=>$request->name,
         'category_id'=>$request->category,
         'image'=>$imageName,
         'created_at'=>now(),
        ]);

        return redirect('/dishes')->with('stored_dish',"Created new Dish on our list");
            }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/dishes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {    
        $categories=Category::all();
        return view('Dishes/edit',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dish $dish)
    {
  $request->validate([
    'name' => 'required|max:255',
    'category' => 'required',
  ]);

 $dish->name=$request->name;
 $dish->category_id=$request->category;

 if($request->image != null){
    $imageName=$request->image->getClientOriginalName().'.'.$request->image->getClientOriginalExtension();
     $request->image->move(public_path('dish_images'),$imageName);
     $dish->image=$imageName;
 }
 $dish->save();
 return redirect('/dishes')->with('updated_dish',"successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
$dish->delete();
return redirect('/dishes')->with('deleted_dish',"dish has been successfully deleted");
    }
}
