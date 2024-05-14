<?php
namespace App\Controllers;
//namespace App\UsuariosModel;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\CajModel;
use App\Models\RolesModel;

class Usuarios extends BaseController
{   //Son las reglas de cajas, usuarios etc.
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
    
    public function index($activo = 1)
    {
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        $data = ['titulo' => 'Usuarios', 'datos' => $usuarios];

        echo view('header');
        echo view('usuarios/usuarios', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $usuarios = $this->usuarios->where('activo',$activo)->findAll();
        $data = ['titulo' => 'usuarios eliminados','datos' => $usuarios];

        echo view('header');
        echo view('usuarios/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $caj = $this->caj->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $data = ['titulo' =>  'Agregar usuario', 'caj' => $caj, 'roles' => $roles];

        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglas)){

        $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->usuarios->save([
        'usuario' => $this->request->getPost('usuario'),
        'password' => $hash,
        'nombre' => $this->request->getPost('nombre'),
        'id_caj' => $this->request->getPost('id_caj'),
        'id_rol' => $this->request->getPost('id_rol'),
        'activo' => 1
        ]);

        return redirect()->to(base_url().'/usuarios');
        }else {
        $caj = $this->caj->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $data = ['titulo' =>  'Agregar usuario', 'caj'=> $caj,
        'roles'=> $roles, 'validation' =>$this->validator];
        
        echo view('header');
        echo view('usuarios/nuevo', $data);
        echo view('footer');
        }
    }
    public function editar($id)
    {
        $caj = $this->caj->where('activo', 1)->findAll();
        $roles = $this->roles->where('activo', 1)->findAll();
        $usuario = $this->usuarios->where('id' , $id)->first();
        $data = ['titulo' => 'Editar usuario' ,'usuario' => $usuario];

        echo view('header');
        echo view('usuarios/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        $this->usuarios->update($this->request->getPost('id'),
        ['codigo' => $this->request->getPost('codigo'),
         'nombre' => $this->request->getPost('nombre'),
         'cantidad' => $this->request->getPost('cantidad'),
         'peso_total' => $this->request->getPost('peso_total'),
         'vol_m' => $this->request->getPost('vol_m'),
         'inventariable' => $this->request->getPost('inventariable'),
         'id_caja' => $this->request->getPost('id_caja'),
         'id_vehiculo' => $this->request->getPost('id_vehiculo')
        ]);
        return redirect()->to(base_url().'/usuarios');
    }
    public function eliminar($id)
    {
       $model = new UsuariosModel();
       $model->delete($id);
       session()->setFlashdata('mensaje', 'Caja Eliminada');
        return redirect()->to(base_url().'/usuarios');
    }
    public function reingresar($id)
    {
        $this->usuarios->update($id, ['activo' => 1]);
        return redirect()->to(base_url().'/usuarios');
    }

    public function login()
    {
        echo view('login');
    }
    public function recovery()
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglasRecupera)){
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)-> first();

             if($datosUsuario != null){
                $datosSesion = [
                    'usuario' => $datosUsuario['usuario']
                ];
                $paracorrreo ="usuario";
                $titulo ="Recuperar contraseña";
                $mensaje ="Para recuperar tu contraseña sigue los pasos.";
                $tucorreo ="From: mena.r1307@gmail.com";

                if(mail($paracorrreo,$titulo,$mensaje,$tucorreo))
                {
                    echo "Correo enviado";
                }else
                {
                    echo "No se envio Error";
                }

                $session = session();
                $session->set($datosSesion);
                return redirect()->to(base_url() . '/actualizar_password');

            }else {
                $data['error']= "El usuario no existe";
                echo view('recovery', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('recovery', $data);
        }
    }

    public function validar() //Para validad el login
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)){
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)-> first();

            if($datosUsuario != null){
                if(password_verify($password, $datosUsuario['password'])){
                    $datosSesion = [
                    'id_usuario' => $datosUsuario['id'],
                    'nombre' => $datosUsuario['nombre'],
                    'id_caj' => $datosUsuario['id_caj'],
                    'id_rol' => $datosUsuario['id_rol']
                ];

                $session = session();
                $session->set($datosSesion);
                return redirect()->to(base_url() . '/inicio');
                }else {
                    $data['error']= "Las contraseñas no coinciden";
                    echo view('login', $data);
                }

            }else {
                $data['error']= "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation'=> $this->validator];
            echo view('login', $data);
        }
    }
     // cerrrar sesion
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
    }

    public function cambia_password(){
        $session= session();
        $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
        $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario];

        echo view('header');
        echo view('usuarios/cambia_password', $data);
        echo view('footer');
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
           echo view('usuarios/cambia_password', $data);
           echo view('footer');

            }else {
                $session= session();
                $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
                $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario, 'validation' => $this->validator];
        
                echo view('header');
                echo view('usuarios/cambia_password', $data);
                echo view('footer');
            }
    }

    public function claveNueva() //Cambiar contraseña en el login
    {
        if($this->request->getMethod() == "post" && $this->validate($this->reglasCambia)){

            $session =session();
            $idUsuario =$session->id_usuario;
            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    
            $this->usuarios->update($idUsuario, ['password' => $hash]);
    
            $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
            $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario, 'mensaje' => '¡Contraseña actualizada correctamente!'];
    
              echo view('nuevaClave', $data);

            }else {
                $session= session();
                $usuario = $this->usuarios->where('id', $session->id_usuario)->first();
                $data = ['titulo' =>  'Cambiar contraseña', 'usuario' => $usuario, 'error' => '¡Las contraseñas no coinciden!'];
        
                echo view('nuevaClave', $data);
            }
    }
    public function valida() //Validacion recapchat
    {
    
	define('CLAVE', '6LczlnAmAAAAAMgeH_hDnUuaAwwVBhcsQ7-xmVfe');
	$token = $_POST['token'];
	$action = $_POST['action']; 
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datosUsuario = json_decode($response, true);
	
	//print_r($datosUsuario);
	
	if($datosUsuario['success'] == 1 && $datosUsuario['score'] >= 0.5){
		if($datosUsuario['action'] == 'validarUsuario'){
			if($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)){
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)-> first();

            if($datosUsuario != null){
                if(password_verify($password, $datosUsuario['password'])){
                    $datosSesion = [
                    'id_usuario' => $datosUsuario['id'],
                    'nombre' => $datosUsuario['nombre'],
                    'id_caj' => $datosUsuario['id_caj'],
                    'id_rol' => $datosUsuario['id_rol']
                ];

                $session = session();
                $session->set($datosSesion);
                return redirect()->to(base_url() . '/inicio');
                }else {
                    $data['error']= "Las contraseñas no coinciden";
                    echo view('login', $data);
                }

            }else {
                $data['error']= "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation'=> $this->validator];
            echo view('login', $data);
        }
		}
		
		} else {
		//echo "ERES UN ROBOT";
        $data['error']= "ERES UN ROBOT";
        echo view('login', $data);
	}	

    }

    public function recuperar(){
        if($this->request->getMethod() == "post" && $this->validate($this->reglasRecupera)){
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');
            $datosUsuario = $this->usuarios->where('usuario', $usuario)-> first();

            if($datosUsuario != null){
                if(usuario_verify($password, $datosUsuario['usuario'])){
                    $datosSesion = [
                    'id_usuario' => $datosUsuario['id'],
                    'nombre' => $datosUsuario['nombre'],
                    'id_caj' => $datosUsuario['id_caj'],
                    'id_rol' => $datosUsuario['id_rol']
                ];

                $session = session();
                $session->set($datosSesion);
                return redirect()->to(base_url() . '/recuperar');
                }else {
                    $data['error']= "Las contraseñas no coinciden";
                    echo view('login', $data);
                }

            }else {
                $data['error']= "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation'=> $this->validator];
            echo view('login', $data);
        }
    }
}