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
        'id_usuario'
    ];
    public function propietario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
}
