<?php 

use App\Controllers\PatientController;
use App\Controllers\RoleController;
use App\Controllers\UserController;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\TokenMiddleware;

Flight::group("/api", function(){
    /**
     * ? group route v1 
     * !With AuthMiddleware is only create and update data
     * *With TokenMiddleware is all route of read
     */
    Flight::group("/v1", function(){
        Flight::group("/user", function(){
            Flight::route("GET /",[UserController::class, 'index'])->addMiddleware([new TokenMiddleware()]);
            Flight::route("GET /@id", [UserController::class,'show'])->addMiddleware([new TokenMiddleware()]);
            Flight::route('POST /',[UserController::class,'store'])->addMiddleware([new AuthMiddleware()]);
        });
        
      /**
       * ? group route of resource only 'store','update','destroy' with middleware
       * !With AuthMiddleware is only create and update data
       * *With TokenMiddleware is all route of read
       */
        Flight::resource("/role",RoleController::class,[
            'only'=>['store','update','destroy'],
            'middleware'=>[new AuthMiddleware()]
        ]);
        Flight::route("GET /role",[RoleController::class,'index'])->addMiddleware([new TokenMiddleware()]);
        
        /**
         * ?group route fo resource 
         */
        Flight::resource("/patient", PatientController::class,[
            'middleware'=>[new TokenMiddleware()]
        ]);

        /**
         * ? group route of service patient
         * * With TokenMiddleware is all route read, write,update
         */
        Flight::group("/patient/@id", function(){
            Flight::post("/contact",[PatientController::class, 'storeContact']);
            Flight::post("/details-clinical",[PatientController::class, 'storeDetailsClinical']);
            Flight::put("/contact/@contact_id",[PatientController::class, 'updateContact']);
            Flight::put("/details-clinical/@details_id",[PatientController::class, 'updateDetailClinical']);
        },[new TokenMiddleware()]);
    });
});

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