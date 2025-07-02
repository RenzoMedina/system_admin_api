<?php 

namespace App\Middleware;

use Flight;

class AuthMiddleware{

    public function before($params){
        $auth = Flight::request()->header('Authorization');
        if(!$auth){
            Flight::jsonHalt([
                "error"=>"Empty token"
            ], 401);
        }
    }
}