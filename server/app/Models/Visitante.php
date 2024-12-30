<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;
    protected $table = 'visitantes';
    protected $fillable = [
        'nombres',
        'apellido_mat',
        'apellido_pat',
        'ci',
    ];
    public function visitas()
    {
        return $this->hasMany(VisitaPropiedad::class);
    }
}
