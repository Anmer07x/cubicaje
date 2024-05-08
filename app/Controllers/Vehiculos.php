<?php
namespace App\Controllers;

//namespace App\vehiculosModel;
use App\Controllers\BaseController;
use App\Models\VehiculosModel;

class Vehiculos extends BaseController //llamamos la clase cajas
{
    protected $vehiculos;
    //relacion modelo controlador
    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
    }
    //agregamos una funcion
    public function index($activo = 1)
    {
        $vehiculos = $this->vehiculos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'vehiculos', 'datos' => $vehiculos];

        echo view('header');
        echo view('vehiculos/vehiculos', $data);
        echo view('footer');
    }
    public function eliminados($activo = 0)
    {
        $vehiculos = $this->vehiculos->where('activo', $activo)->findAll();
        $data = ['titulo' => 'vehiculos eliminados', 'datos' => $vehiculos];

        echo view('header');
        echo view('vehiculos/eliminados', $data);
        echo view('footer');
    }
    public function nuevo()
    {
        $data = ['titulo' => 'Agregar vehiculos'];
        echo view('header');
        echo view('vehiculos/nuevo', $data);
        echo view('footer');
    }
    public function insertar()
    {
        $this->vehiculos->save([
            'vehiculos' => $this->request->getPost('vehiculos'),
            'maximo' =>
                $this->request->getPost('maximo'),
            'tipo_vehiculos' => $this->request->getPost('tipo_vehiculos'),
            'empresa' =>
                $this->request->getPost('empresa'),
            'clasificacion' => $this->request->getPost('clasificacion')
        ]);

        $id = $this->vehiculos->insertID();

        $validacion = $this->validate([
            'img_vehiculo' => [
                'uploaded[img_vehiculo]',
                'mime_in[img_vehiculo,image/jpg,image/jpeg]',
                'max_size[img_vehiculo, 4096]'
            ]
        ]);

        if ($validacion) {
            $ruta_logo = "images/vehiculos/" . $id . ".jpg";

            if (file_exists($ruta_logo)) {
                unlink($ruta_logo);
            }
            $img = $this->request->getFile('img_vehiculo');
            $img->move('./images/vehiculos/', $id . '.jpg');
        } else {
            echo 'ERROR en la validacion';
            exit;
        }


        return redirect()->to(base_url() . '/vehiculos');
    }
    public function editar($id)
    {
        $vehiculo = $this->vehiculos->where('id', $id)->first();
        $data = ['titulo' => 'Editar vehiculos', 'datos' => $vehiculo];

        echo view('header');
        echo view('vehiculos/editar', $data);
        echo view('footer');
    }
    public function actualizar()
    {
        $this->vehiculos->update($this->request->getPost('id'), [
            'vehiculos' =>
                $this->request->getPost('vehiculos'),
            'maximo' => $this->request->getPost('maximo'),
            'tipo_vehiculos' => $this->request->getPost('tipo_vehiculos'),
            'empresa' => $this->request->getPost('empresa'),
            'clasificacion' => $this->request->getPost('clasificacion')
        ]);
        return redirect()->to(base_url() . '/vehiculos');
    }
    public function eliminar($id)
    {
        $model = new VehiculosModel();
        $model->delete($id);
        session()->setFlashdata('mensaje', 'Caja Eliminada');
        return redirect()->to(base_url() . '/vehiculos');
    }
    public function reingresar($id)
    {
        $this->vehiculos->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/vehiculos');
    }

    public function buscarPorid($id)
    {
        $this->vehiculos->select('*');
        $this->vehiculos->where('id', $id);
        // $this->vehiculos->where('activo',1);
        $datos = $this->vehiculos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if ($datos) {
            $res['datos'] = $datos;
            $res['existe'] = true;
        } else {
            $res['error'] = 'No existe el vehiculo';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }

    public function buscarPorMaximo($maximo)
    {
        $this->vehiculos->select('*');
        $this->vehiculos->where('maximo>=', $maximo - 1);
        $this->vehiculos->where('maximo<=', $maximo + 1);
        // $this->vehiculos->where('activo',1);
        $datos = $this->vehiculos->get()->getRow();

        $res['existe'] = false;
        $res['datos'] = '';
        $res['error'] = '';

        if ($datos) {
            $res['datos'] = $datos;
            $res['existe'] = true;
        } else {
            $res['error'] = 'No existe el vehiculo';
            $res['existe'] = false;
        }
        echo json_encode($res);
    }
    public function buscarInput()
    {
        $search = $this->request->getVar('search'); // Obtén el valor del campo de búsqueda

        if ($search == null) {
            return redirect()->to(base_url() . '/vehiculos');
        } else {
            // Consulta la base de datos para buscar vehiculos por código
            $vehiculoModel = new VehiculosModel();
            $vehiculos = $vehiculoModel->like('vehiculos', $search)->findAll();

            if (empty($vehiculos)) {
                $vehiculos = $vehiculoModel->like('tipo_vehiculos', $search)->findAll();
            }

            if (empty($vehiculos)) {
                $vehiculos = $vehiculoModel->like('empresa', $search)->findAll();
            }

            // Pasa los resultados a la vista
            echo view('header');
            echo view('vehiculos/vehiculosSearch', ['vehiculos' => $vehiculos]);
            echo view('footer');
        }
    }
}