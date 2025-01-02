<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosDirectivos extends Model
{
    use HasFactory;
    protected $table = 'directivos';

    protected $fillable = [
        'cargo',
        'id_usuario',
        'fecha_inicio',
        'fecha_final',
    ];
    // public function datosUsuario()
    // {
    //     return $this->hasOne(DatosUsuario::class);
    // }
    public function decisiones()
    {
        return $this->hasMany(Decision::class);
    }
}
