<?php
namespace App\Controllers;
//namespace App\CajasModel;
use App\Controllers\BaseController;
use App\Models\CajasModel;
 
class Cajas extends BaseController //llamamos la clase cajas
{
    protected $cajas;
    protected $reglas;
  //relacion modelo controlador
    public function __construct()
    {
        $this->cajas = new CajasModel();
        helper(['form','upload']);

        $this->reglas =[
            'codigo_cajas' =>[
               'rules' =>'required|is_unique[cajas.codigo_cajas]',
               'errors' => [
                      'required' => 'El campo {field} es obligatorio.',
                      'is_unique' => 'El campo {field} debe ser unico.'
              ]
               ],

            'tipo' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.'
               ]
                    ],
           'mercancia' =>[
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
            'capacidad' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
               ]
                    ],
            'alto' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'largo' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'ancho' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'piezas_caja' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'peso_piezas_kg' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
                    ],
            'factor_de_riesgo' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
                    ]
        ]; 
    }
    //agregamos una funcion
    public function index($activo = 1)
    {
        $cajas = $this->cajas->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Cajas', 'datos' => $cajas];

        echo view('header');
        echo view('cajas/cajas', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $cajas = $this->cajas->where('activo',$activo)->findAll();
        $data = ['titulo' => 'cajas eliminados','datos' => $cajas];

        echo view('header');
        echo view('cajas/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar cajas'];
        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        $this->cajas->save([
         'codigo_cajas' => $this->request->getPost('codigo_cajas'),
         'tipo' => $this->request->getPost('tipo'),
         'mercancia' => $this->request->getPost('mercancia'),
         'cantidad' => $this->request->getPost('cantidad'),
         'capacidad' => $this->request->getPost('capacidad'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'),
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg'),
         'factor_de_riesgo' => $this->request->getPost('factor_de_riesgo')]);

         $id = $this->cajas->insertID();

         $validacion = $this->validate([
            'img_caja' => [
                'uploaded[img_caja]',
                'mime_in[img_caja,image/jpg,image/jpeg,image/png]',
                'max_size[img_caja, 4096]'
            ]
        ]);

        if($validacion){
            $ruta_logo = "images/cajas/".$id.".jpg";

            if(file_exists($ruta_logo)){
                unlink($ruta_logo);
            }
            $img = $this->request->getFile('img_caja');
            $img->move('./images/cajas/', $id.'.jpg');
        } else {
                echo 'ERROR en la validacion';
                exit;
            }

        return redirect()->to(base_url().'/cajas')->with('message', 'Caja guardada exitosamente');
        }else {
        $data = ['titulo' => 'Agregar cajas', 'validation' =>$this->validator];

        echo view('header');
        echo view('cajas/nuevo', $data);
        echo view('footer');
        }
    }
    
    public function insertarimagen()
    {
        // Comprobar si se ha cargado un img_caja
        if (isset($_FILES['img_caja'])) {
         extract($_POST);
         //$descripcion = $_POST['descripcion'];

        $codigo_cajas = $_POST['codigo_cajas'];
        $tipo = $_POST['tipo'];
        $mercancia = $_POST['mercancia'];
        $cantidad = $_POST['cantidad'];
        $capacidad = $_POST['capacidad'];
        $alto = $_POST['alto'];
        $largo = $_POST['largo'];
        $ancho = $_POST['ancho'];
        $piezas_caja = $_POST['piezas_caja'];
        $peso_piezas_kg = $_POST['peso_piezas_kg'];
        $factor_de_riesgo = $_POST['factor_de_riesgo'];

        $img_caja = $_FILES['img_caja'];

        // Definir la carpeta de destino
        $carpeta_destino = "images/calcular/";

        // Obtener el tipo y la extensión del img_caja
        $img_file=$img_caja['name'];
        $img_type=$img_caja['type'];
            echo 1;
                if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
                strpos($img_type, "jpg")) || strpos($img_type, "png")))
                {

                   // Validar la extensión del img_caja
                   if(((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
                       strpos($img_type, "jpg")) || strpos($img_type, "png")))
                    {


                        // Mover el img_caja a la carpeta de destino
                        $destino = "http://localhost/cubicacion/public/cajas/'/'.$img_file";
                        echo 2;
                            $sql = "INSERT INTO cajas (codigo_cajas, img_caja, tipo, mercancia, cantidad, capacidad,
                        alto, largo, ancho, piezas_caja, peso_piezas_kg, factor_de_riesgo) 
                        VALUES ('$codigo_cajas','$img_caja', '$tipo', '$mercancia', '$cantidad','$capacidad','$alto','$largo',
                        '$ancho','$piezas_caja','$peso_piezas_kg','$destino','$factor_de_riesgo')";
                        $resultado = mysqli_query($sql);

                        if (move_uploaded_file($tmp_name, $carpeta_destino))
                        {
                            return true;
                        }
                    }
                
                }
                  return false;
        }
    }
    
    public function editar($id)
    {
        $cajas = $this->cajas->where('id',$id)->first();

        $data = ['titulo' => 'Editar cajas', 'datos'=> $cajas];

        echo view('header');
        echo view('cajas/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        $this->cajas->update($this->request->getPost('id'),
        ['codigo_cajas' => $this->request->getPost('codigo_cajas'),
         'tipo' => $this->request->getPost('tipo'),
         'mercancia' => $this->request->getPost('mercancia'),
         'cantidad' => $this->request->getPost('cantidad'),
         'capacidad' => $this->request->getPost('capacidad'),
         'alto' => $this->request->getPost('alto'),
         'largo' => $this->request->getPost('largo'), 
         'ancho' => $this->request->getPost('ancho'),
         'piezas_caja' => $this->request->getPost('piezas_caja'),
         'peso_piezas_kg' => $this->request->getPost('peso_piezas_kg'),
         'factor_de_riesgo' => $this->request->getPost('factor_de_riesgo')]);

         $id = $this->cajas->insertID();

         $validacion = $this->validate([
            'img_caja' => [
                'uploaded[img_caja]',
                'mime_in[img_caja,image/jpg,image/jpeg,image/png]',
                'max_size[img_caja, 4096]'
            ]
        ]);
       /* if($validacion){
            $ruta_logo = "images/cajas/".$id.".jpg";

            if(file_exists($ruta_logo)){
                unlink($ruta_logo);
            }
            
            $img = $this->request->getFile('img_caja');
            $img->move('./images/cajas/', $id.'.jpg');
        } else {
                echo 'ERROR en la validacion';
                exit;
            } */
        return redirect()->to(base_url().'/cajas')->with('message', 'Caja actualizada exitosamente');
      
    }

    public function eliminar($id)
    {
       $model = new CajasModel();
       $model->delete($id);
       session()->setFlashdata('mensaje', 'Caja Eliminada');
        return redirect()->to(base_url().'/cajas')->with('message', 'Caja eliminada exitosamente');
    }

    public function reingresar($id)
    {
        $this->cajas->update($id, ['activo' => 1]);
        return redirect()->to(base_url().'/cajas');
    }

    public function buscarPorCodigo($codigo_cajas){
        $this->cajas->select('*');
        $this->cajas->where('codigo_cajas', $codigo_cajas);
        $this->cajas->where('activo',1);
        
        $datos = $this->cajas->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';
        
        if($datos){
            $res['datos'] = $datos ;
            $res['existe'] = true;
            //$datos = $this->cajas->get()->getRow($files/$_POST['id']);
        }else {
            $res['error'] = 'No existe la caja';
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