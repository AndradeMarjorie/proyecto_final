<?php 
namespace App\Controllers;

use App\Models\LibroModel;

class LibrosController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        $libroModel = new LibroModel();
        $data['libros'] = $libroModel->findAll();
        return view('libros/index', $data);
    }

    public function create()
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        return view('libros/create');
    }

    public function store()
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        $libroModel = new LibroModel();

        $this->validate([
            'titulo' => 'required|min_length[3]',
            'paginas' => 'required|integer'
        ]);

        $libroModel->save([
            'titulo' => $this->request->getPost('titulo'),
            'id_autor' => $this->request->getPost('id_autor'),
            'id_categorias' => $this->request->getPost('id_categorias'),
            'genero' => $this->request->getPost('genero'),
            'paginas' => $this->request->getPost('paginas'),
            'id_nivel' => $this->request->getPost('id_nivel'),
            'id_editorial' => $this->request->getPost('id_editorial')
        ]);

        return redirect()->to('/libros');
    }

    public function edit($id)
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        $libroModel = new LibroModel();
        $data['libro'] = $libroModel->find($id);
        return view('libros/edit', $data);
    }

    public function update($id)
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        $libroModel = new LibroModel();
        $libroModel->update($id, [
            'titulo' => $this->request->getPost('titulo'),
            'id_autor' => $this->request->getPost('id_autor'),
            'id_categorias' => $this->request->getPost('id_categorias'),
            'genero' => $this->request->getPost('genero'),
            'paginas' => $this->request->getPost('paginas'),
            'id_nivel' => $this->request->getPost('id_nivel'),
            'id_editorial' => $this->request->getPost('id_editorial')
        ]);

        return redirect()->to('/libros');
    }

    public function delete($id)
    {
        $session = session();
        if (!$session->has('rol') || $session->get('rol') != 'administrador') {
            return redirect()->to('/login');
        }

        $libroModel = new LibroModel();
        $libroModel->delete($id);
        return redirect()->to('/libros');
    }
}