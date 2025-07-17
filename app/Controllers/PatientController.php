<?php  

namespace App\Controllers;

use App\Models\Patient;
use App\Services\PatientService;
use Flight;

class PatientController{
    
    public static function index(){
       
        Flight::json([
            "status"=>200,
            "data"=>(new Patient())->getAll()
        ]);
    }
    public static function show($id){
        $data = (new Patient())->getById($id);
        Flight::json([
            "status"=>200,
            "message"=>"Data loaded by {$id}",
            "data"=>$data
        ]);
    }

    public static function store(){
        $data = Flight::request()->data;
        (new Patient())->create($data);
        Flight::json([
            "status"=>201,
            "message"=>"Data load succesfully!!!",
            "data"=>$data
        ]);
    }
    public static function update($id){
        $data = Flight::request()->data;
        $success = (new Patient())->update($id,$data);
        if ($success){
            Flight::json([
                "status"=>200,
                "message"=>"Data updated by {$id}",
                "data"=>$data
            ]);
        }else{
            Flight::jsonHalt([
                "error"=>"Data update has not been carried out validate id"
            ], 409);
        } 
    }
/*     public static function destroy($di){

    } */

    public function storeContact($idPatient){
        $data = Flight::request()->data;
       (new PatientService())->contactOfPatient($idPatient,$data);
        Flight::json([
            "status"=>201,
            "message"=>"Data load succesfully!!!",
            "data"=>$data,
            "id"=>$idPatient
        ]);
    }
}