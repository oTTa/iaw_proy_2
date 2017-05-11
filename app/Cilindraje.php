<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Cilindraje extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cilindraje';
    protected $primaryKey = 'cantidad';
    protected $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'cantidad'
       					];

    public function motos()
    {
        return $this->hasMany('BuscoMoto\Moto','cilindraje');
    }

    public function motos_compra()
    {
        return $this->hasMany('BuscoMoto\Moto_compra','cilindraje');
    }
    
}