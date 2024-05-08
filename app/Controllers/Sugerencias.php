<?php
namespace App\Controllers;
//namespace App\SugerenciasModel;
use App\Controllers\BaseController;
use App\Models\SugerenciasModel;
 
class Sugerencias extends BaseController //llamamos la clase sugerencias
{
    protected $sugerencias;
    protected $reglas;
  //relacion modelo controlador
    public function __construct()
    {
        $this->sugerencias = new SugerenciasModel();
        helper(['form']);
    }
    //agregamos una funcion
    public function index($activo = 1)
    {
        $sugerencias = $this->sugerencias->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Sugerencias', 'datos' => $sugerencias];

        echo view('header');
        echo view('sugerencias/sugerencias', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $sugerencias = $this->sugerencias->where('activo',$activo)->findAll();
        $data = ['titulo' => 'sugerencias eliminados','datos' => $sugerencias];

        echo view('header');
        echo view('sugerencias/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        echo view('header');
        echo view('sugerencias/nuevo');
        echo view('footer');
    }
    public function insertar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        $this->sugerencias->save([
         'codigo_sugerencias' => $this->request->getPost('codigo_sugerencias'),
         'tipo' => $this->request->getPost('tipo'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'),
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg')]);

         $id = $this->sugerencias->insertID();

         $validacion = $this->validate([
            'img_caja' => [
                'uploaded[img_caja]',
                'mime_in[img_caja,image/jpg,image/jpeg]',
                'max_size[img_caja, 4096]'
            ]
        ]);

        if($validacion){
            $ruta_logo = "images/sugerencias/".$id.".jpg";

            if(file_exists($ruta_logo)){
                unlink($ruta_logo);
            }
            $img = $this->request->getFile('img_caja');
            $img->move('./images/sugerencias/', $id.'.jpg');
        } else {
                echo 'ERROR en la validacion';
                exit;
            }

        return redirect()->to(base_url().'/sugerencias');
        }else {
        $data = ['titulo' => 'Agregar sugerencias', 'validation' =>$this->validator];

        echo view('header');
        echo view('sugerencias/nuevo', $data);
        echo view('footer');
        }
    }
    public function editar($id, $valid=null)
    {
        $sugerencias = $this->sugerencias->where('id',$id)->first();

        if($valid != null){
            $data = ['titulo' => 'Editar Caja', 'datos' =>$sugerencias, 'validation' => $valid];
        }else {
            $data = ['titulo' => 'Editar Caja', 'datos' =>$sugerencias];
        }

        $data = ['titulo' => 'Editar sugerencias', 'datos'=> $sugerencias];

        echo view('header');
        echo view('sugerencias/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){
        $this->sugerencias->update($this->request->getPost('id'),
        ['codigo_sugerencias' => $this->request->getPost('codigo_sugerencias'),
         'tipo' => $this->request->getPost('tipo'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'), 
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg')
        ]);
        return redirect()->to(base_url().'/sugerencias');
      } else {
        return $this->editar($this->request->getPost('id'), $this->validator);
      }
    }

    public function eliminar($id)
    {
       $model = new SugerenciasModel();
       $model->delete($id);
       session()->setFlashdata('mensaje', 'Caja Eliminada');
        return redirect()->to(base_url().'/sugerencias');
    }

    public function reingresar($id)
    {
        $this->sugerencias->update($id, ['activo' => 1]);
        return redirect()->to(base_url().'/sugerencias');
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

        return redirect()->to(base_url().'/sugerencias');
    }

}