<?php

namespace App\Http\Controllers;

use App\Models\Fteure;
use Illuminate\Http\Request;

class FteureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.features.index')->with('fteures',Fteure::get());
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
     * @param  \App\Models\Fteure  $fteure
     * @return \Illuminate\Http\Response
     */
    public function show(Fteure $fteure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fteure  $fteure
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.features.edit')->with('fteure',Fteure::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fteure  $fteure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fteure = Fteure::find($id);
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $fteure->title = $request->title;
        $fteure->body = $request->body;
        if($request->image != null){
            $fteure->image = $request->image->store('fteures');
        }
        $fteure->save();
        return redirect()->route('fteures.index')->with(['success'=>'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fteure  $fteure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fteure $fteure)
    {
        //
    }
}
