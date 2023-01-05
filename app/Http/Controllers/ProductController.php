<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index')->with('products',Product::orderby('id','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create')->with('categories',Category::get());
    }
    public function update_status(Request $request){
        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();
    }
    public function update_status_best(Request $request){
        $product = Product::find($request->product_id);
        $product->is_best = $request->status;
        $product->save();
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
            'image'=>'required',
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'price'=>'required',
        ]);
        $product = new Product();
        $product->title = $request->title;
        $product->image = $request->image->store('products');
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->penefit = $request->penefit;
        $product->system_requirements = $request->system_requirements;
        $product->price = $request->price;
        $product->price_after_discount = $request->price_after_discount;
        $product->save();
        return redirect()->route('prodcuts.index')->with(['success'=>'تم الاضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.products.edit')->with('categories',Category::get())->with('product',Product::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'price'=>'required',
        ]);
        $product->title = $request->title;
        if($request->image != null){
            $product->image = $request->image->store('products');
        }
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->penefit = $request->penefit;
        $product->system_requirements = $request->system_requirements;
        $product->price = $request->price;
        $product->price_after_discount = $request->price_after_discount;
        $product->save();
        return redirect()->route('prodcuts.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('prodcuts.index')->with(['success'=>'تم الحذف بنجاح']);

    }
}
