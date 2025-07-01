<?php

namespace App\Controllers;

use Flight;

class UserController{

    public function index(){
        return "Hola soy el index";
    }

    public function show($id){
        return "hola soy la ruta de show {$id}";
    }
}