<?php 
namespace App\Models;

use CodeIgniter\Model;

class LibroModel extends Model
{
    protected $table      = 'libros';
    protected $primaryKey = 'id_libro';
    protected $allowedFields = [
        'titulo', 'id_autor', 'id_categorias', 'genero', 'paginas', 'id_nivel', 'id_editorial'
    ];
}