<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// ***
use Auth; // require in login()

class AdminLoginController extends Controller
{
    //
    public function __constructor() {

        $this->middleware('guest:admin');
    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {

        // validate the form

        $this->validate($request , [
            'email' => 'required|email'
            , 'password' => 'required'
        ]);

        $rememberMe = true; 
        
        
        $credentials = [
            'email' => $request->email
            // password should be use as it is, the hashing will be done in background automatically
            , 'password' => $request->password
            
        ];

        // attempts to log user in
        $bResult = Auth::guard('admin')->attempt($credentials , $request->remember);

        // if success , redirect to the intended location
        if($bResult) {
            return redirect()->intended('admin.dashboard'); 
        }
        
        // if fail, redirect back to the login page with the form data
        return redirect()->back()->withInput($request->only('email' , 'remember'));

        
    }


}
