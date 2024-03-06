<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin')->with('success', 'you have succesfully logged out');
    }

    public function login(Request $request){
        $incoming = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);
        //dd($incoming);
        if( Auth::guard('admin')->check() || Auth::guard('admin')->attempt(['email'=>$incoming['loginemail'], 'password'=>$incoming['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/admin')->with('success', 'you have succesfully logged in');
        }
        else{
            return redirect('/admin')->with('fail', 'Please check email and password');
        }
    }
    
    //管理者登録データをデータベースに追加します
    public function register(Request $request){
        $incoming = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        // Create and store the user
        $user = Admin::create($incoming);
        Auth::guard('admin')->login($user);
        return redirect('/admin')->with('success', 'registered as admin');
    }

        // $request→validation

        // if (true) {
        //     // controller give data
        //     insert logic
        // }


 


    // public function createHotel(request $request) {

    //     $result = Service::insertHotel($request);
    //     if ($result === false) {
    //         ////////////
    //     }

    // }


    //管理者登録とログインページを表示します
    public function showCorrectHomepage(){
        if( Auth::guard('admin')->check() ){
            return view('admin.loggedin');
        }
        else{
            return view('admin.homepage');
        }
        
    }

}
