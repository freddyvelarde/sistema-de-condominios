<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    //
    protected $table = 'reservas';
    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_final',
        'estado',
        'id_area_comun',
        'id_usuario'
    ];
    public function pagoReserva()
    {
        return $this->hasMany(PagoReserva::class);
    }
    public function areaComun()
    {
        return $this->belongsTo(AreaComun::class);
    }
    public function copropietario()
    {
        return $this->belongsTo(Usuarios::class);
    }

}
