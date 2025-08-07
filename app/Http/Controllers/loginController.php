<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(Request $request){
        $title="Login";
        if ($request->isMethod('post')) {
           
            $request->validate([
                'uname'=>'required',
                'password'=>'required'
            ]);
           $usr_credentials = $request->only('uname', 'password');
            
           $data = $request->all();

           
           $user_pwd = $data['password'];
            

           $usr_posts = User::where('name',$data['uname'])->first();
           
           if ($usr_posts && Hash::check($user_pwd, $usr_posts['password'])) { 
                if (Auth::attempt(['name' => $data['uname'], 'password' => $user_pwd])) {
                    Auth::login($usr_posts); 
                    
                    $user = Auth::user();
                    
                    $request->session()->regenerate();
                    return redirect()->route('taskList')->with('success', 'Logged in successfully');
                    
                    
                }
               
           
           }
           else{
            return redirect()->route('login')->withErrors('User not found');
           }
          
            
        }
        return view('logins.login',compact('title'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
