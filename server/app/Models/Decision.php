<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;
    protected $table = 'dicisiones';
    protected $fillable = [
        'id_directivo',
        'descripcion',
        'fecha',
        'tipo'
    ];

    public function directivo()
    {
        return $this->belongsTo(Directivo::class, 'id_directivo');
    }

}
