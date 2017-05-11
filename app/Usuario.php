<?php

namespace BuscoMoto;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
    *  The table associated with the model.
    * @var string
    */
    protected $table ='usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
            'id', 'nombre', 'apellido', 'fecha_nacimiento', 'ultima_actividad', 'email', 'password', 'url_foto_perfil'
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function compras()
    {
        return $this->hasMany('BuscoMoto\Compra','usuario_id');
    }
}
