<?php

namespace App\Controllers;

use App\Models\User;
use Exception;
use Flight;

class UserController{

    protected $user;
    public function __construct(){
        $this->user = new User();
    }
    public function index(){
        $data = (new User())->getAll();
        Flight::json([
            "data"=>$data
        ]);
    }

    public function show($id){
        Flight::json([
            "status"=>200,
            "message"=>"route show id {$id}",
            "env"=>$_ENV['DBNAME']
        ]);
    }

    public function login(){
        $user = Flight::request()->data->name;
        $field = Flight::request()->data;
        $token = $this->user->login($user, $field);
        Flight::json([
            "token"=>$token,
            //"validate"=> validatedToken($token,$user)
        ]);
       
    }
    public function store(){

        try {
        $data = Flight::request()->data;
        $field_data = $data->getData();   
        $hash_pass = password_hash($data->password, PASSWORD_DEFAULT);
        $data->password = $hash_pass;

        if (empty($field_data)){
            Flight::jsonHalt([
            "error"=>"Field data is empty"
            ],401);
        }

        (new User())->create($data);
        Flight::json([
            "status"=>201,
            "data"=>$data
            ]);
        } catch (Exception $e) {
            Flight::jsonHalt([
            "error"=>"Unexpected error",
            "details"=>$e->getMessage()
            ],500);
        }
    }
    public function update(){}

}