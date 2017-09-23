<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getLogin()
    { 
    
            return view('admin.login');
        
    }

    public function getLoginClient(){
        return view('auth.login');
    }

    
    public function postLogin(Request $request)
    {
          $input = [
                  'email' => $request->input('email'),
                  'password' => $request->input('password')
          ];
          if(Auth::attempt($input)){
                
                 return redirect('/admin/dashboard');
                
          }else{
               Session::flash('message','Username atau password salah !');
               return redirect('/admin/login');
          }
    }
    public function logout() {
        if (Auth::check())
        {               
            Auth::logout();
            return redirect('admin/login');
        }
    }

    public function getLoginCustomer(Request $request){
        if ($request){
            return view('auth.login')->with('id_product', $request->input('id_product'))
            ->with('qty', $request->input('quantity'))
            ->with('message', 'Please Login or Register Account Before Checkout'); 
        }else{
            return view('auth.login');
        }
    }

    protected function authenticated(Request $request, $user){
        if($user->role == 'client'){
           $id = $request->input('id_product');
           $qty = $request->input('quantity');
           if($request->input('id_product') != null){
             return redirect()->intended('product/'.$id.'/'.$qty.'');   
           }else{
             return redirect()->intended('store');
           }
        }
    }
}
