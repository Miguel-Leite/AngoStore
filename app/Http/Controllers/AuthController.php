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
            $login = auth()->user()->login;
            if (auth()->user()->inadmin < 1) {
                // Session::flush();
                Auth::logout();
                return json_encode([
                "success"=>false,
                "message" => "$login não tens permissão de acessar essa página."
            ]);
            }
            return json_encode([
                "success"=>true,
                "error"=>false,
                "message"=> "Login efectuado com successo. Seja bem-vindo $login!"
            ]);
        } else {
            return json_encode([
                "success"=>false,
                "error"=>true,
                "message" => "Login ou senha estão incorretos."
            ]);
        }
    }

    public function loginClient (Request $request)
    {
        if (Auth::attempt(['login' => $request->login,'password'=>$request->password])) {
            $login = auth()->user()->login;
            if (auth()->user()->inadmin > 0) {
                // Session::flush();
                    Auth::logout();
                    return json_encode([
                    "success"=>false,
                    "message" => "$login não tens permissão de acessar essa página."
                ]);
            }
            return json_encode([
                "success"=>true,
                "error"=>false,
                "message"=> "Login efectuado com successo. Seja bem-vindo $login!"
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
