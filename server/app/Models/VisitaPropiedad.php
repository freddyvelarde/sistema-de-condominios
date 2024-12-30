<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaPropiedad extends Model
{
    use HasFactory;
    protected $table = 'visitas_propiedades';

    protected $fillable = [
        'id_propiedad',
        'id_visitante',
        'fecha_visita',
        'hora_entrada',
        'hora_salida',
        'motivo',
    ];
    public function visitante()
    {
        return $this->belongsTo(Visitante::class, 'id_visitante');
    }
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'id_propiedad');
    }
}
