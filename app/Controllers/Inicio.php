<?php namespace App\Controllers;

use App\Models\ProductosModel;
use App\Models\CajasModel;
use App\Models\VehiculosModel;

class Inicio extends BaseController
{
    protected $productoModel, $cajaModel, $vehiculoModel;
    
    public function __construct()
    {
       $this->productoModel = new ProductosModel();
       $this->cajaModel = new CajasModel();
       $this->vehiculoModel = new VehiculosModel();
    }


    public function index()
    {
       $total = $this->productoModel->totalProductos();
       $totalcajas = $this->cajaModel->totalCajas();
       $totalvehiculos = $this->vehiculoModel->totalVehiculos();
       $datos = ['total' => $total, 'totalcajas' =>$totalcajas,
        'totalvehiculos' =>$totalvehiculos];

        echo view('header');
        echo view('inicio', $datos);
        echo view('footer');

    }

    public function buscarPorCodigo($codigo){
        $this->cajas->select('*');
        $this->cajas->where('codigo', $codigo);
        $this->cajas->where('activo',1);
        $datos = $this->cajas->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';
        
        if($datos){
            $res['datos'] = $datos ;
            $res['existe'] = true;
        }else {
            $res['error'] = 'No existe el codigo';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }

    public function buscarVehiculo($maximo){
        $this->productos->select('*');
        $this->productos->where('maximo', $maximo);
       // $this->productos->where('activo',1);
        $datos = $this->productos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';
        
        if($datos){
            $res['datos'] = $datos ;
            $res['existe'] = true;
        }else {
            $res['error'] = 'No existe el producto';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }

    public function buscar(){
        $model = new VehiculosModel();
        $request =\Config\Services::request();
        $id = $request->getPost('id');
        echo json_encode($model->find($id));
    }
}