<?php

namespace App\Usecase\User;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Persons;
// use App\Models\UsersPasswordsRecorveries as Recorveries;
// use \App\Usecase\PHPMailer\Mailer;

class UserUsecase {

    const SECRET = "angostore_secret";

    public static function getUsers()
    {
        $query = DB::select("SELECT users.login, users.inadmin, persons.* FROM persons INNER JOIN users ON users.persons_id=persons.id");
        return $query;
    }

    public static function getUserById($id) {
        $query = DB::select("SELECT users.login, users.inadmin, persons.* FROM persons INNER JOIN users ON users.persons_id=persons.id WHERE persons.id=$id LIMIT 1");
        return $query[0];
    }
    
    public static function create($data): bool
    {
        try {
            
            $personData = [
                "person" => $data["person"],
                "email" => $data["email"],
                "phone" => $data["phone"]
            ];

            $person = Persons::create($personData);

            $userdata = [
                "persons_id" => Persons::orderBy('id', 'desc')->limit(1)->first()->id,
                "login" => $data["login"],
                "password" => password_hash("123456",1),
                "inadmin" => (isset($data["inadmin"]) ? 1 : 0)
            ];

            User::create($userdata);

            return true;
        } catch (Exception $e) {
            return false;
        }
            
    }

    public static function update(int $id, array $data): bool
    {
        try {

            $personData = [
                "person" => $data["person"],
                "email" => $data["email"],
                "phone" => $data["phone"]
            ];

            $userdata = [
                "persons_id" => $id,
                "login" => $data["login"],
                "inadmin" => (isset($data["inadmin"]) ? 1 : 0)
            ];

            $person = Persons::find($id);
            $person->update($personData);

            $user = User::where("persons_id",$id);
            $user->update($userdata);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function delete(int $id): bool
    {
        $user = User::where("persons_id",$id);
        $person = Persons::find($id);
        $user->delete();
        $person->delete();
        if ( $user && $person){
            return true;
        }
        return false;
    }

}