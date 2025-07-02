<?php 

use App\Controllers\UserController;
use App\Middleware\AuthMiddleware;

Flight::group("/api", function(){
    /**
     * ? group route v1
     */
    Flight::group("/v1/user", function(){
       Flight::route("GET /",[UserController::class, 'index']);
       Flight::route("GET /@id", [UserController::class,'show']);
       
    });
},[new AuthMiddleware()]);

/**
 * ? route not found or 404
 */
Flight::map('notFound', function(){
    Flight::json([
        "status"=>404,
        "message"=>"Not Found"
    ]);
});

Flight::route("POST /login", [UserController::class,'login']);

Flight::start();