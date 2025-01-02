<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $fillable = [
        'monto',
        'tipo',
        // 'fecha',
        'categoria',
        'estado',
        'metodo',
    ];
    public function pagoPropiedad()
    {
        return $this->belongsTo(PagoPropiedad::class);
    }
    public function pagoReserve()
    {
        return $this->belongsTo(PagoReserva::class);
    }
    public function pagoEmpleado()
    {
        return $this->belongsTo(PagoEmpleado::class);
    }
}
