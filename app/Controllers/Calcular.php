<?php
namespace App\Controllers;
//namespace App\CalcularModel;
use App\Controllers\BaseController;
use App\Models\CalcularModel;
 
class Calcular extends BaseController //llamamos la clase calcular
{
    protected $calcular;
    protected $reglas;
  //relacion modelo controlador
    public function __construct()
    {
        $this->calcular = new CalcularModel();
        helper(['form']);
    }
    //agregamos una funcion
    public function index($activo = 1)
    {
        $calcular = $this->calcular->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Calcular', 'datos' => $calcular];

        echo view('header');
        echo view('calcular/calcular', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $calcular = $this->calcular->where('activo',$activo)->findAll();
        $data = ['titulo' => 'calcular eliminados','datos' => $calcular];

        echo view('header');
        echo view('calcular/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        echo view('header');
        echo view('calcular/nuevo');
        echo view('footer');
    }
    public function insertar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        $this->calcular->save([
         'codigo_calcular' => $this->request->getPost('codigo_calcular'),
         'tipo' => $this->request->getPost('tipo'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'),
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg')]);

         $id = $this->calcular->insertID();

         $validacion = $this->validate([
            'img_caja' => [
                'uploaded[img_caja]',
                'mime_in[img_caja,image/jpg,image/jpeg]',
                'max_size[img_caja, 4096]'
            ]
        ]);

        if($validacion){
            $ruta_logo = "images/calcular/".$id.".jpg";

            if(file_exists($ruta_logo)){
                unlink($ruta_logo);
            }
            $img = $this->request->getFile('img_caja');
            $img->move('./images/calcular/', $id.'.jpg');
        } else {
                echo 'ERROR en la validacion';
                exit;
            }

        return redirect()->to(base_url().'/calcular');
        }else {
        $data = ['titulo' => 'Agregar calcular', 'validation' =>$this->validator];

        echo view('header');
        echo view('calcular/nuevo', $data);
        echo view('footer');
        }
    }
    public function editar($id, $valid=null)
    {
        $calcular = $this->calcular->where('id',$id)->first();

        if($valid != null){
            $data = ['titulo' => 'Editar Caja', 'datos' =>$calcular, 'validation' => $valid];
        }else {
            $data = ['titulo' => 'Editar Caja', 'datos' =>$calcular];
        }

        $data = ['titulo' => 'Editar calcular', 'datos'=> $calcular];

        echo view('header');
        echo view('calcular/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
        $this->calcular->update($this->request->getPost('id'),
        ['codigo_calcular' => $this->request->getPost('codigo_calcular'),
         'tipo' => $this->request->getPost('tipo'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'), 
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg')
        ]);
        return redirect()->to(base_url().'/calcular');
      } else {
        return $this->editar($this->request->getPost('id'), $this->validator);
      }
    }

    public function eliminar($id)
    {
       $model = new CalcularModel();
       $model->delete($id);
       session()->setFlashdata('mensaje', 'Caja Eliminada');
        return redirect()->to(base_url().'/calcular');
    }

    public function reingresar($id)
    {
        $this->calcular->update($id, ['activo' => 1]);
        return redirect()->to(base_url().'/calcular');
    }
    public function buscarPorCodigo($codigo){
        $this->productos->select('*');
        $this->productos->where('codigo', $codigo);
        $this->productos->where('activo',1);
        $datos = $this->producto->get()->getRow();

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

    public function img_producto($id)
    {
        if($validacion){
            $img_producto = "images/productos/".$id.".jpg";

            if(file_exists($img_producto)){
                unlink($img_producto);
            }
            $img = $this->request->getFile('img_producto');
            $img->move('./images/productos/', $id.'.jpg');
        } else {
                echo 'ERROR en la validacion';
                exit;
            }

        return redirect()->to(base_url().'/calcular');
    }

}