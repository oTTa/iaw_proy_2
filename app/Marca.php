<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marca';
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
        return $this->hasMany('BuscoMoto\Moto','marca');
    }

    public function motos_compra()
    {
        return $this->hasMany('BuscoMoto\Moto_compra','marca');
    }
    
}