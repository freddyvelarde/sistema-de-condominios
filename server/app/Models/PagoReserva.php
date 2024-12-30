<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoReserva extends Model
{
    use HasFactory;
    //
    protected $table = 'pagos_reservas';
    protected $fillable = [
        'id_copropietario',
        'id_reserva',
        'id_pago'

    ];

    public function copropietario()
    {
        $this->belongsTo(Copropietario::class);
    }
    public function reserva()
    {
        $this->belongsTo(Reserva::class);
    }
    public function pago()
    {
        $this->hasOne(Pago::class);
    }

}
