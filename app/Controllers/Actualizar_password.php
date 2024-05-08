<?php namespace App\Controllers;
namespace App\Controllers;
//namespace App\UsuariosModel;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajModel;
use App\Models\RolesModel;


class actualizar_password extends BaseController
{
    //Son las reglas de cajas, usuarios etc.
    protected $usuarios, $caj, $roles;
    protected $reglas, $reglasLogin, $reglasCambia, $reglasRecupera;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->caj = new CajModel();
        $this->roles = new RolesModel();

        helper(['form']);

        $this->reglas =[
            'usuario' =>[
               'rules' =>'required|is_unique[usuarios.usuario]',
               'errors' => [
                      'required' => 'El campo {field} es obligatorio.',
                      'is_unique' => 'El campo {field} debe ser unico.'
              ]
               ],
            'password' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.'
               ]
                    ],
            'repassword' =>[
                'rules' =>'required|matches[password]',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'matches' => 'Las contraseñas no coinciden.'
                ]
                    ],
            'nombre' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'id_caj' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                ]
            ],
            'id_rol' =>[
                'rules' =>'required',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.'
                    ]
            ]  
        ];

        $this->reglasLogin =[
            'usuario' =>[
               'rules' =>'required',
               'errors' => [
                      'required' => 'El campo {field} es obligatorio.',
              ]
               ],
            'password' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.'
               ]
            ]
        ];

        $this->reglasCambia =[
            'password' =>[
                'rules' =>'required',
                'errors' => [
                       'required' => 'El campo {field} es obligatorio.',
               ]
            ],
            'repassword' =>[
               'rules' =>'required|matches[password]',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'matches' => 'Las contraseñas no coinciden.'
                 
                ]
            ]
        ];

        $this->reglasRecupera =[
            'usuario' =>[
               'rules' =>'required|matches[usuario]',
                'errors' => [
                        'required' => 'El campo {field} es obligatorio.',
                        'matches' => 'Los usuarios no coinciden.'
                 
                ]
            ]
        ];
    }


    public function index()
    {


      return view('nuevaClave');


    }

    public function actualizar_password()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)){

            $session =session();
            $idUsuario =$session->id_usuario;
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    
            $this->usuarios->update($idUsuario, ['password' => $hash]);
    
            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario, 'mensaje' => 'Contraseña actualizada'];

           echo view('header');
           echo view('recovery', $data);
           echo view('footer');

            }else {
                $session= session();
                $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
                $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario, 'validation' => $this->validator];
        
                echo view('header');
                echo view('recovery', $data);
                echo view('footer');
            }
    }
 
}