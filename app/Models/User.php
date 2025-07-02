<?php 

namespace App\Models;

use Core\Model;
use Flight;

class User extends Model{

    public static function login(){
        $user = Flight::request()->data->user;
        $password = Flight::request()->data->password;
        if(!$user == "Renzo" && $password == "1234"){
            Flight::jsonHalt([
                "error"=>"Invalid username or password"
            ],401);
        }
        return getToken($user, 1);
    }
    public function getAll(){}
    public function getId($id){
        return $this->db->get('users','*',['id'=>$id]);
    }
    public function create(){}
    public function update(){}
    public function delete(){}

}