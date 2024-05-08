<?php

namespace App\Models;

use CodeIgniter\Model;
//class UserModel extends Model
class SugerenciasModel extends Model //creamos la clase
{
    
    protected $table      = 'sugerencias';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['folio','peso_total',
     'id_usuario', 'activo'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
?>