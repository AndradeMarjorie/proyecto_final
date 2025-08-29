<?php
namespace App\Controllers;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function autenticar()
{
    $usuario = $this->request->getPost('usuario');
    $password = $this->request->getPost('password');

    $usuarioModel = new UsuarioModel();
    $datosUsuario = $usuarioModel->verificarUsuario($usuario, $password);

    if ($datosUsuario) {
        session()->set([
            'id' => $datosUsuario['id'],
            'usuario' => $datosUsuario['usuario'],
            'rol' => $datosUsuario['rol'],
            'logged_in' => true
        ]);

        switch($datosUsuario['rol']){
            case 'administrador':
                return redirect()->to('/admin/dashboard');
            case 'bibliotecario':
                return redirect()->to('/bibliotecario/dashboard');
            default:
                return redirect()->to('/alumno/dashboard');
        }

    } else {
        return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
    }
}
    public function panel()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('panel');
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}