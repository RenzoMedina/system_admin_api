<?php 

namespace App\Models;

use Core\Model;
use Exception;
use Flight;

class Patient extends Model{
    
    private $table = "table_patients";
    public function getAll(){
        try{
            return $this->db->select($this->table,'*');
        }catch(Exception $e){
            Flight::jsonHalt([
                "error"=>$e->getMessage()
            ],401);
        }
    }
    public function create($data){
        try {
            $this->db->insert($this->table,[
                "rut"=>$data->rut,
                "name"=>$data->name,
                "last_name"=>$data->last_name,
                "age"=>$data->age,
                "weigth"=>$data->weigth,
                "size"=>$data->size
            ]);
        } catch (Exception $e) {
            Flight::jsonHalt([
                "error"=>$e->getMessage()
            ],403);
        }
    }


}