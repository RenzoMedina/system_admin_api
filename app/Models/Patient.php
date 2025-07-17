<?php 

namespace App\Models;

use Core\Model;
use Exception;
use Flight;
use PDO;

class Patient extends Model{
    
    private $table = "table_patients";
    public function getAll(){
        try{
            $patients = $this->db->select($this->table, '*');
            $result = [];
            foreach ($patients as $patient) {
                $contacts = $this->db->select("table_contacts_patients", '*', [
                    "id_patient" => $patient['id']
                ]);
                $result[] = [
                    "patient" => $patient,
                    "contacts" => $contacts
                ];
            }
        return $result;
        
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

    public function getById(int $id){
        try {
            return $this->db->get($this->table,'*',[
            "id"=>$id
            ]);
        } catch (Exception $e) {
            Flight::jsonHalt([
                "error"=>$e->getMessage()
            ],403);
        }
    }

    public function update(int $id, $data){
        try {
            $rowsAffected = $this->db->update($this->table,[
                "rut"=>$data->rut,
                "name"=>$data->name,
                "last_name"=>$data->last_name,
                "age"=>$data->age,
                "weigth"=>$data->weigth,
                "size"=>$data->size,
                "status"=>$data->status,
            ],[
                "id"=>$id
            ]);
            $rowsOk = $rowsAffected->rowCount();
            return $rowsOk > 0;
        } catch (Exception $e) {
             Flight::jsonHalt([
                "error"=>$e->getMessage()
            ],403);
        }
    }
}