<?php

namespace App\Models;

use CodeIgniter\Model;
//class UserModel extends Model
class ProductosModel extends Model
{
    
    protected $table      = 'productos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['codigo',
    'nombre','tipo','cantidad',
    'peso_pieza_kg', 'vol_m', 
    'peso_total','id_caja','id_vehiculo','inventariable', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function totalProductos(){
       return $this->where('activo',1)->countAllResults();
    }

}
?>