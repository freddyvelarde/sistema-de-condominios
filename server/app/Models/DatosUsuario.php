<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class DatosUsuario extends Model implements JWTSubject
class DatosUsuario extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'datos_usuarios';

    protected $fillable = [
        'nombres',
        'apellido_pat',
        'apellido_mat',
        'email',
        'password',
        'num_telefono',
        'rol',
    ];

    public function directivo()
    {
        return $this->hasOne(Directivo::class);
    }
    public function propietario()
    {
        return $this->hasOne(Propietario::class, 'id_usuario');
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
    public function copropietario()
    {
        return $this->hasOne(Copropietario::class);
    }
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
