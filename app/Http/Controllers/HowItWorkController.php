<?php

namespace App\Http\Controllers;

use App\Models\HowItWork;
use Illuminate\Http\Request;

class HowItWorkController extends Controller
{
    public function index(){
        return view('dashboard.hows.index')->with('hows',HowItWork::orderby('order')->get());
    }
    public function edit($id){
        return view('dashboard.hows.edit')->with('how',HowItWork::find($id));
    }
    public function update(Request $request,$id){
        $how = HowItWork::find($id);
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        if($request->image != null){
            $how->image =$request->image->store('hows');
        }
        $how->title = $request->title;
        $how->body = $request->body;
        $how->save();
        return redirect()->route('how_it_works.index')->with(['success'=>'تم التعديل بنجاح']);
    }
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = HowItWork::find($id);
                
                $menu->order = $sortOrder;
                // $menu->save();
                $menu->update(['order'=>$sortOrder]);
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
    
}

