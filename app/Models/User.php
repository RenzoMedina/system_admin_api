<?php 

namespace App\Models;

use Core\Model;
use Exception;
use Flight;

class User extends Model{
    public function login($name, $field){
        //$user = Flight::request()->data->user;
        //$password = Flight::request()->data->password;
        /*if(!$user == "Renzo" && $password == "1234"){
            Flight::jsonHalt([
                "error"=>"Invalid username or password"
            ],401);
        }*/

        try {
            $data =  $this->db->select('table_users',[
                "id",
                "name",
                "password"
            ],[
                "name"=>$name
            ]);
            
            $id = $data[0]['id'];
            $user = $data[0]['name'];
            $password = $data[0]['password']; 
            
            if ($user == $field->name && password_verify($field->password,$password)){
                return getToken($field->name, $id);
            }
        } catch (Exception $e) {
            Flight::jsonHalt([
                    "error"=>"Invalid username or password",
                    "details"=>$e->getMessage()
                ],401);
            }
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

