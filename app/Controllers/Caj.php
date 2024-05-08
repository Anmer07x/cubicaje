<?php
namespace App\Controllers;
//namespace App\ProductosModel;
use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\CajModel;
use App\Models\VehiculosModel;

class Productos extends BaseController
{
    protected $productos;
    protected $reglas;
    public function __construct()
    {
        $this->productos = new ProductosModel();
        $this->cajas = new CajModel();
        $this->vehiculos = new VehiculosModel();

        helper(['form']);

        $this->reglas =[
            'codigo' =>[
               'rules' =>'required|is_unique[productos.codigo]',
               'errors' => [
                      'required' => 'El campo {field} es obligatorio.',
                      'is_unique' => 'El campo {field} debe ser unico.'
              ]
               ],
            'nombre' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.'
               ]
                    ],
            'cantidad' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'peso_total' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'vol_m' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'inventariable' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'id_caja' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                ],
            'id_vehiculo' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                ]  
        ];

    }
    
    public function index($activo = 1)
    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        $data = ['titulo' => 'productos', 'datos' => $productos];

        echo view('header');
        echo view('productos/productos', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $productos = $this->productos->where('activo',$activo)->findAll();
        $data = ['titulo' => 'productos eliminados','datos' => $productos];

        echo view('header');
        echo view('productos/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $cajas = $this->cajas->where('activo',1)->findAll();
        $vehiculos = $this->vehiculos->where('activo', 1)->findAll();
        $data = ['titulo' =>  'Agregar producto', 'cajas'=> $cajas, 'vehiculos'=> $vehiculos];

        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        $this->productos->save([
        'codigo' => $this->request->getPost('codigo'),
        'nombre' => $this->request->getPost('nombre'),
        'cantidad' => $this->request->getPost('cantidad'),
        'peso_total' => $this->request->getPost('peso_total'),
        'vol_m' => $this->request->getPost('vol_m'),
        'inventariable' => $this->request->getPost('inventariable'),
        'id_caja' => $this->request->getPost('id_caja'),
        'id_vehiculo' => $this->request->getPost('id_vehiculo')]);
        return redirect()->to(base_url().'/productos');
        }else {
        $cajas = $this->cajas->where('activo',1)->findAll();
        $vehiculos = $this->vehiculos->where('activo', 1)->findAll();
        $data = ['titulo' =>  'Agregar producto', 'cajas'=> $cajas,
        'vehiculos'=> $vehiculos, 'validation' =>$this->validator];
        
        echo view('header');
        echo view('productos/nuevo', $data);
        echo view('footer');
        }
    }
    public function editar($id)
    {
        $cajas = $this->cajas->where('activo',1)->findAll();
        $vehiculos = $this->vehiculos->where('activo', 1)->findAll();
        $producto = $this->productos->where('id' , $id)->first();
        $data = ['titulo' => 'Editar producto', 'cajas'=> $cajas, 'vehiculos'=> $vehiculos,
        'producto' => $producto];

        echo view('header');
        echo view('productos/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        $this->productos->update($this->request->getPost('id'),
        ['codigo' => $this->request->getPost('codigo'),
         'nombre' => $this->request->getPost('nombre'),
         'cantidad' => $this->request->getPost('cantidad'),
         'peso_total' => $this->request->getPost('peso_total'),
         'vol_m' => $this->request->getPost('vol_m'),
         'inventariable' => $this->request->getPost('inventariable'),
         'id_caja' => $this->request->getPost('id_caja'),
         'id_vehiculo' => $this->request->getPost('id_vehiculo')
        ]);
        return redirect()->to(base_url().'/productos');
    }
    public function eliminar($id)
    {
        $this->productos->update($id, ['activo' => 0]);
        return redirect()->to(base_url().'/productos');
    }
    public function reingresar($id)
    {
        $this->productos->update($id, ['activo' => 1]);
        return redirect()->to(base_url().'/productos');
    }

}