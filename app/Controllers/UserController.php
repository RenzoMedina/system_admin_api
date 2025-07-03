<?php

namespace App\Controllers;

use App\Models\User;
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
        $token = $this->user::login();
        Flight::json([
            "token"=>$token
        ]);
    }
    public function store(){
        $data = Flight::request()->data;   
        $hash_pass = password_hash($data->password, PASSWORD_DEFAULT);
        $data->password = $hash_pass;
        Flight::json([
            "status"=>201,
            "data"=>(new User())->create($data),
        ]);
    }
    public function update(){}

}