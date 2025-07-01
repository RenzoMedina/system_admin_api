<?php 

namespace App\Middleware;

use Flight;

class AuthMiddleware{

    public function before($params){
        Flight::json([
            "message"=>"Logica en before"
        ]);
    }
}