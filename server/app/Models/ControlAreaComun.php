<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlAreaComun extends Model
{
    use HasFactory;
    protected $table = 'control_areas_comunes';

    protected $fillable = [

        'fecha_inicio',
        'fecha_final',
        'costo',
        'descripcion',
        'tipo',
    ];

    public function areaComun()
    {
        return $this->belongsTo(AreaComun::class);
    }
}
