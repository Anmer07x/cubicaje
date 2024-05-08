<?php
namespace App\Controllers;
//namespace App\ConfiguracionModel;
use App\Controllers\BaseController;
use App\Models\ConfiguracionModel;

class Configuracion extends BaseController
{
    protected $configuracion;
    protected $reglas;
    public function __construct()
    {
        $this->configuracion = new ConfiguracionModel();

        helper(['form','upload']);
       // Son las validaciones de los direrentes campos
        $this->reglas =[
            'cubicaje_nombre' =>[
               'rules' =>'required',
               'errors' => [
                      'required' => 'El campo {field} es obligatorio.',
            ]
               ],
            'cubicaje_rfc' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.',
            ]
                ],
            'cubicaje_telefono' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
            ]
                ],
            'cubicaje_email' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
            ]
                ],
            'cubicaje_direccion' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
            ]
                ],
            'ticket_leyenda' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
            ]
                ]
        ];

    }
    
    public function index($activo = 1)
    {
        $nombre = $this->configuracion->where('nombre', 'cubicaje_nombre')->first();
        $rfc = $this->configuracion->where('nombre', 'cubicaje_rfc')->first();
        $telefono = $this->configuracion->where('nombre', 'cubicaje_telefono')->first();
        $email = $this->configuracion->where('nombre', 'cubicaje_email')->first();
        $direccion = $this->configuracion->where('nombre', 'cubicaje_direccion')->first();
        $leyenda = $this->configuracion->where('nombre', 'ticket_leyenda')->first();

        $data = ['titulo' => 'Configuracion', 'nombre' => $nombre, 'rfc' => $rfc, 'telefono' => $telefono, 
        'email' => $email, 'direccion' => $direccion, 'leyenda' => $leyenda];

        echo view('header');
        echo view('configuracion/configuracion',$data);
        echo view('footer');
    }
    
    public function actualizar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $this->configuracion->whereIn('nombre', ['cubicaje_nombre'])->set(['valor' =>
            $this->request->getPost('cubicaje_nombre')])->update();

            $this->configuracion->whereIn('nombre', ['cubicaje_rfc'])->set(['valor' =>
            $this->request->getPost('cubicaje_rfc')])->update();

            $this->configuracion->whereIn('nombre', ['cubicaje_telefono'])->set(['valor' =>
            $this->request->getPost('cubicaje_telefono')])->update();

            $this->configuracion->whereIn('nombre', ['cubicaje_email'])->set(['valor' =>
            $this->request->getPost('cubicaje_email')])->update();

            $this->configuracion->whereIn('nombre', ['cubicaje_direccion'])->set(['valor' =>
            $this->request->getPost('cubicaje_direccion')])->update();

            $this->configuracion->whereIn('nombre', ['ticket_leyenda'])->set(['valor' =>
            $this->request->getPost('ticket_leyenda')])->update();

            $img = $this->request->getFile('cubicaje_logo');

            $validacion = $this->validate([
                'cubicaje_logo' => [
                    'uploaded[cubicaje_logo]',
                    'mime_in[cubicaje_logo,image/png]',
                    'max_size[cubicaje_logo, 4096]'
                ]
            ]);
            if($validacion){
                    $ruta_logo = "images/logotipo.png";
            
                        if(file_exists($ruta_logo)){
                            unlink($ruta_logo);
                        }
                        $img = $this->request->getFile('cubicaje_logo');
                        $img->move('./images', 'logotipo.png/');
            } else {
                echo 'ERROR en la validacion';
                exit;
            }
                
          //  $img->move(WRITEPATH. '/uploads');
            
            return redirect()->to(base_url().'/configuracion');
          } else {
            //return $this->editar($this->request->getPost('id'), $this->validator);
            return redirect()->to(base_url().'/configuracion');
          }
    }


}