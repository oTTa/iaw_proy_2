<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id', 'nombre', 'direccion', 'telefono', 'latitud', 'longitud'
       					];

    public function motos()
    {
    	return $this->belongsToMany('BuscoMoto\Moto','vendedor_moto');
    }

    public function compras()
    {
    	return $this->hasMany('BuscoMoto\Compra','vendedor_id');
    }


}

