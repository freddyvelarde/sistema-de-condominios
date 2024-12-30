<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $fillable = [
        'ci',
        'fecha_nacimiento',
        'id_usuario',
    ];
    public function datosUsuario()
    {
        return $this->hasOne(DatosUsuario::class);
    }
    public function pagoEmpleado()
    {
        return $this->hasMany(PagoEmpleado::class);
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class);
    }
}
