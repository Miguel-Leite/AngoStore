<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index ()
    {
        return view('admin.auth.login');
    }

    public function login (Request $request)
    {
        if (Auth::attempt(['login' => $request->login,'password'=>$request->password])) {
            // return redirect()->route('admin.users')->with('success',"Bem-vindo ao panel de control");
            return json_encode([
                "success"=>true,
                "error"=>false,
                "message"=> "Login efectuado com successo."
            ]);
        } else {
            return json_encode([
                "success"=>false,
                "error"=>true,
                "message" => "Login ou senha estão incorretos."
            ]);
        }
    }

    public function logout() {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('admin.login');
    }
}