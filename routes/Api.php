<?php 

use App\Controllers\UserController;

Flight::group("/api", function(){
    //api back v1
    Flight::group("/v1", function(){
       Flight::route("GET /user", [UserController::class, 'index']);
    });
});
Flight::start();