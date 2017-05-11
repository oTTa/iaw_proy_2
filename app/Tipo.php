<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo';
    protected $primaryKey = 'nombre';
    protected $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'nombre'
       					];

    public function motos()
    {
        return $this->hasMany('BuscoMoto\Moto','tipo');
    }

    public function motos_compra()
    {
        return $this->hasMany('BuscoMoto\Moto_compra','tipo');
    }

}