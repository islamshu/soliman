<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.index')->with('categoires',Category::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cats = new Category();
        $cats->title = $request->title;
        $cats->image = $request->image->store('categories');
        $cats->save();
        return redirect()->route('categories.index')->with(['success'=>'تم الاضافة بنجاح']);
    }
    public function update_status(Request $request){
        $cat = Category::find($request->category_id);
        $cat->is_feture = $request->status;
        $cat->save();
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cats = Category::find($id);
        $cats->title = $request->title;
        if($request->image != null){
            $cats->image = $request->image->store('categories');
        }
        $cats->save();
        return redirect()->route('categories.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Category::find($id);
        $cats->delete();
        return redirect()->back()->with(['success'=>'تم الخذف بنجاح']);

    }
}
