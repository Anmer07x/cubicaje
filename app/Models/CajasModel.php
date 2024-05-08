<?php

namespace App\Models;

use CodeIgniter\Model;
//class UserModel extends Model
class CajasModel extends Model //creamos la clase
{
    
    protected $table      = 'cajas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo_cajas','nombre','img_caja','tipo','mercancia','cantidad','capacidad',
     'alto', 'largo','ancho',
     'piezas_caja','peso_piezas_kg','factor_de_riesgo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function totalCajas(){
        return $this->where('activo',1)->countAllResults();
    }
}
?>