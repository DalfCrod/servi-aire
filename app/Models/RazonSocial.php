<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazonSocial extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'RazonSocial';
    protected $primaryKey = 'id_RS';
    protected $fillable = [
        'nombreCompleto', 'tipoPersona', 'nroIdentificacion', 'telefono', 'email', 'direccion', 'rol', 'contraseña'
    ];

    // Relación para tipo de persona
    public function tipoPersonaClasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'tipoPersona', 'id_Clasificacion');
    }

    // Relación para rol
    public function rolClasificacion()
    {
        return $this->belongsTo(Clasificacion::class, 'rol', 'id_Clasificacion');
    }

    // Define el atributo de contraseña para Laravel
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
