<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;
    protected $table = 'comunicado';
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_emision',
        'estado',
        'id_propietario'
    ];
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'id_propietario');
    }
}
