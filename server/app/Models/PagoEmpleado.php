<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoEmpleado extends Model
{
    use HasFactory;
    protected $table = 'pagos_empleados';
    protected $fillable = [
        'id_usuario',
        'id_pago'
    ];
    public function empleado()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }
    public function pago()
    {
        return $this->belongsTo(Pago::class, 'id_pago');
    }
}
