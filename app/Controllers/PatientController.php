<?php  

namespace App\Controllers;

use App\Models\Patient;
use Flight;

class PatientController{
    
    public static function index(){
        Flight::json([
            "status"=>200,
            "data"=>(new Patient())->getAll()
        ]);
    }
    public static function show($id){}

    public static function store(){
        $data = Flight::request()->data;
        (new Patient())->create($data);
        Flight::json([
            "status"=>201,
            "message"=>"Data load succesfully!!!",
            "data"=>$data
        ]);
    }
    public static function update($id){}
    public static function destroy($di){

    }
}