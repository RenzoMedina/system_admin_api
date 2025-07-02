<?php

namespace App\Controllers;

use App\Models\User;
use Flight;

class UserController{

    protected $user;
    public function __construct(){
        $this->user = new User();
    }
    public function index(){}

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
        
    }
    public function update(){}

}