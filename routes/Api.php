<?php 

use App\Controllers\UserController;

Flight::group("/api", function(){
    //api back v1
    Flight::group("/v1/user", function(){
       Flight::route("GET /", [UserController::class, 'index']);
       Flight::route("GET /@id", [UserController::class,'show']);
    });
});
Flight::start();