<?php

namespace App\Controllers;

use Flight;

class UserController{

    public function index(){
        $token = getToken();
       Flight::json([
            "status"=>200,
            "message"=>"route index",
            "token"=>$token
        ]);
    }

    public function show($id){
        Flight::json([
            "status"=>200,
            "message"=>"route show id {$id}",
            "env"=>$_ENV['DBNAME']
        ]);
    }

    public function login(){}
    public function store(){}
    public function update(){}

}