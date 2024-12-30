<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    use HasFactory;

    protected $table = 'datos_usuarios';

    protected $fillable = [
        'nombres',
        'apellido_pat',
        'apellido_mat',
        'email',
        'password',
        'num_telefono',
        'rol',
    ];

    public function directivo()
    {
        return $this->hasOne(Directivo::class);
    }
    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'id_usuario');
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
    public function copropietario()
    {
        return $this->hasOne(Copropietario::class);
    }
}
