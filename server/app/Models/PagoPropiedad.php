<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoPropiedad extends Model
{
    use HasFactory;
    protected $table = 'pagos_propiedades';

    protected $fillable = [
        'id_copropietario',
        'id_propiedad',
        'id_pago'
    ];

    public function propiedad()
    {
        $this->belongsTo(Propiedad::class);
    }
    public function copropietario()
    {
        $this->belongsTo(Copropietario::class);
    }

    public function pago()
    {
        $this->hasOne(Pago::class);
    }

}
