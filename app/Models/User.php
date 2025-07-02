<?php 

namespace App\Models;

use Flight;

class User{

    public static function login(){
        $user = Flight::request()->data->user;
        $password = Flight::request()->data->password;
        if(!$user == "Renzo" && $password == "1234"){
            Flight::jsonHalt([
                "error"=>"Invalid username or password"
            ],401);
        }
        return getToken($user);
    }
    public function getAll(){}
    public function getId(){}
    public function create(){}
    public function update(){}
    public function delete(){}

}