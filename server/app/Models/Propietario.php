<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $table = 'propietarios';

    protected $fillable = [
        'ci',
        'fecha_nacimiento',
        'id_usuario',
    ];
    public function datosUsuario()
    {
        return $this->hasOne(DatosUsuario::class, 'id', 'id_usuario');
    }
    public function comunicados()
    {
        return $this->hasMany(Comunicado::class, 'id_propietario', 'id');
    }
}
