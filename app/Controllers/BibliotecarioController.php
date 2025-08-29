<?php
namespace App\Controllers;

class BibliotecarioController extends BaseController
{
    public function dashboard()
    {
        if(session()->get('rol') != 'bibliotecario'){
            return redirect()->to('/');
        }
        return view('bibliotecario/dashboard');
    }
}