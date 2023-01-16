<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parnet_menu = Menu::where('menu_id',null)->get();
        return view('dashboard.menus.index')->with('menus',Menu::where('menu_id',null)->orderby('sort')->get())->with('parnet_menu',$parnet_menu); 
    }
    public function update_status(Request $request){
        $slider = Menu::find($request->menu_id);
        $slider->status = $request->status;
        $slider->save();
        return $slider;

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
        $menu = new Menu();
        $menu->title= $request->title;
        $menu->url = $request->url;
        $menu->menu_id = $request->menu_id;
        $menu->sort = Menu::count()+1;
        $menu->save();
        return redirect()->back()->with(['success'=>'تم اضافة القائمة بنجاح']);
    }
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = Menu::find($id);
                
                $menu->sort = $sortOrder;
                // $menu->save();
                $menu->update(['sort'=>$sortOrder]);
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('dashboard.menus.edit')->with('menu',$menu)->with('menus',Menu::where('menu_id',null)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title= $request->title;
        $menu->url = $request->url;
        $menu->menu_id = $request->menu_id;
        // $menu->sort = Menu::count()+1;
        $menu->save();
        return redirect()->route('menus.index')->with(['success'=>'تم تعديل القائمة بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
}
