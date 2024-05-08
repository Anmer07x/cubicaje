<?php

namespace App\Models;

use CodeIgniter\Model;
//class UserModel extends Model
class VehiculosModel extends Model
{
    
    protected $table      = 'vehiculos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['vehiculos', 'maximo','tipo_vehiculos','empresa','clasificacion'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function totalVehiculos(){
        return $this->where('activo',1)->countAllResults();
    }
     
}
?>