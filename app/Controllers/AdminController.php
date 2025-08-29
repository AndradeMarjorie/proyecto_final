<?php
namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
    {
        // Solo admins
        if(session()->get('rol') != 'administrador'){
            return redirect()->to('/');
        }
        return view('admin/dashboard');
    }
}