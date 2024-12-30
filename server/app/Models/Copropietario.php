<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copropietario extends Model
{
    use HasFactory;

    protected $table = 'copropietarios';

    protected $fillable = [
        'ci',
        'estado',
        'id_usuario'
    ];
    public function datosUsuario()
    {
        return $this->hasOne(DatosUsuario::class);
    }

    public function reserve()
    {
        return $this->hasMany(Reserva::class);
    }
    public function pagoReserva()
    {
        return $this->hasMany(PagoReserva::class);
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class);
    }
    public function pagoPropiedad()
    {
        return $this->hasMany(PagoPropiedad::class);
    }
}
