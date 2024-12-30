<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitante extends Model
{
    use HasFactory;

    protected $table = 'habitantes';

    protected $fillable = [
        'nombres',
            'apellido_pat',
            'apellido_mat',
            'fecha_nac',
            'id_propiedad'
    ];
    public function propiedades()
    {
        return $this->belongsTo(Propiedad::class);
    }
}
