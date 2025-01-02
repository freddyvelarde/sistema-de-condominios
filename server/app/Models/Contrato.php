<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $table = 'contratos';
    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'tipo',
        'sueldo_base',
        'cargo',
        'estado',
        'id_usuario'
        // 'ci_usuario'
    ];
    public function empleado()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
