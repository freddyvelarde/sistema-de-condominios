<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;
    protected $table = 'dicisiones';
    protected $fillable = [
        'id_usuario',
        'descripcion',
        'fecha',
        'tipo'
    ];

    public function directivo()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

}
