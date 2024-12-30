<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaComun extends Model
{
    use HasFactory;
    protected $table = 'areas_comunes';
    protected $fillable = [
        'tipo',
        'estado',
        'costo'
    ];
    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }
    public function controlAreaComun()
    {
        return $this->hasMany(ControlAreaComun::class);
    }
}
