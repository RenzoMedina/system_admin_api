<?php 

namespace App\Models;

use Core\Model;

class Role extends Model{
    public function create($data){
       $this->db->insert('table_roles',[
            'type_role'=>$data,
        ]);
    }

    public function getAll(){
        return $this->db->select('table_roles','*');
    }
}