<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoEmpleado extends Model
{
    use HasFactory;
    protected $table = 'pagos_empleados';
    protected $fillable = [
        'id_empleado',
        'id_pago'
    ];
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
