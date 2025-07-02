<?php 

namespace App\Middleware;

use Flight;

class AuthMiddleware{

    public function before($params){
        $auth = Flight::request()->headers();
        Flight::json([
            "auth"=>$auth
        ]);
    }
}