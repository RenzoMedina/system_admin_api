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
    public function getAll(){
        return $this->db->select('table_users','*');
    }
    public function getId($id){
        return $this->db->get('table_users','*',['id'=>$id]);
    }
    public function create($data){
        $this->db->insert('table_users',[
            'name'=>$data->name,
            'last_name'=>$data->last_name,
            'email'=>$data->email,
            'password'=>$data->password,
            'id_rol'=>$data->id_rol
        ]);
    }
    public function update(){}
    public function delete(){}

}

