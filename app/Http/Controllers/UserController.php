<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persons;
use App\Usecase\User\UserUsecase;

class UserController extends Controller
{
    public function index ()
    {
        $users = UserUsecase::getUsers();
        return view('admin.user.users',compact('users'));
    }

    public function profile ()
    {
        return view('admin.user.profile');
    }

    public function create ()
    {
        return view('admin.user.user-create');
    }

    public function store(Request $request)
    {
        $user = UserUsecase::create($request->all());
        if ($user) {
            return json_encode([
            "success"=>true,
            "message"=>"Usuário adicionado com successo."
        ]);
        }

        return json_encode([
            "success"=>false,
            "message"=>"Não foi possivel adicionar o usuário."
        ]);
    }

    public function edit($id) {
        $user = UserUsecase::getUserById($id);
        return view('admin.user.user-update',compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = UserUsecase::update($id,$request->all());
        if($user) 
            return json_encode(["success"=>true,"message"=>"Usuário atualizado com successo."]);
        return json_encode(["success"=>false,"message"=>"Não foi possível atualizar o usuário."]);
    }

    public function delete($id) {
        $user = UserUsecase::delete($id);
        if ($user)
            return json_encode(["success"=>true]);
        return json_encode(["success"=>false]);
    }

    public function updatePassword()
    {
        return view('admin.user.user-updatepassword');
    }
}
