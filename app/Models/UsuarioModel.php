<?php
namespace App\Models;
use CodeIgniter\Model;
class UsuarioModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario', 'password', 'correo', 'rol'];

    public function verificarUsuario($usuario, $password)
    {
        return $this->select('id, usuario, correo, rol')
                    ->where('usuario', $usuario)
                    ->where('password', md5($password))
                    ->first();
    }

    public function crearUsuario($data)
    {
        return $this->insert($data);
    }
}