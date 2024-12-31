<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

    protected $fillable = [
            'numero_propiedad',
            'piso',
            'num_habitaciones',
            'estado',
            'tipo',
    ];

    public function habitantes()
    {
        return $this->hasMany(Habitante::class);
    }
    public function copropietario()
    {
        return $this->belongsTo(Copropietario::class, 'id_copropietario');
    }
    public function visitas()
    {
        return $this->hasMany(VisitaPropiedad::class);
    }
    public function pagoPropiedad()
    {
        return $this->hasMany(PagoPropiedad::class);
    }
}
