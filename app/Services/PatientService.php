<?php 

namespace App\Services;

use Flight;
use Core\ServiceProvider;

class PatientService extends ServiceProvider{
    private $tableContact = "table_contacts_patients";
    public function contactOfPatient(int $idPatient, $data){
        try{
            $this->db->insert($this->tableContact,[
                "id_patient"=>$idPatient,
                "rut"=>$data->rut,
                "name"=>$data->name,
                "last_name"=>$data->last_name,
                "relations"=>$data->relations,
                "telephone"=>$data->telephone,
            ]);
        }
        catch(\Exception $e){
            Flight::jsonHalt([
                "error"=>$e->getMessage()
            ],403);    
        }
    }
}