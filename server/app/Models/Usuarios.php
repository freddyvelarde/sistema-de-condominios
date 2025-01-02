<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Usuarios extends Model implements JWTSubject
class Usuarios extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombres',
        'apellido_pat',
        'apellido_mat',
        'email',
        'password',
        'num_telefono',
        'rol',
        'ci',
    ];

    // public function directivo()
    // {
    //     return $this->hasOne(Directivo::class);
    // }
    // public function propietario()
    // {
    //     return $this->hasOne(Propietario::class, 'id_usuario');
    // }
    // public function empleado()
    // {
    //     return $this->hasOne(Empleado::class);
    // }
    // public function copropietario()
    // {
    //     return $this->hasOne(Copropietario::class);
    // }

    // copropietario

    public function reserva()
    {
        return $this->hasMany(Reserva::class);
    }
    public function pagoReserva()
    {
        return $this->hasMany(PagoReserva::class);
    }

    public function propiedades()
    {
        return $this->hasMany(Propiedad::class);
    }
    public function pagoPropiedad()
    {
        return $this->hasMany(PagoPropiedad::class);
    }
    // empleado
    public function pagoEmpleado()
    {
        return $this->hasMany(PagoEmpleado::class);
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class, 'id_usuario', 'id');
    }
    // propietarios
    public function comunicados()
    {
        return $this->hasMany(Comunicado::class, 'id_usuario', 'id');
    }
    // directivos

    public function decisiones()
    {
        return $this->hasMany(Decision::class);
    }

    // public function contrato()
    // {
    //     return $this->hasOne(Contrato::class);
    // }
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
