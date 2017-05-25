<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'compra';
    const CREATED_AT = 'fecha_compra';
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id', 'usuario_id', 'vendedor_id', 'moto_compra_id', 'fecha_compra'
       					];

    public function usuario()
    {
        return $this->hasOne('BuscoMoto\Usuario','id','usuario_id');
    }

    public function vendedor()
    {
        return $this->hasOne('BuscoMoto\Vendedor','id','vendedor_id');
    }

    public function moto_compra()
    {
        return $this->hasOne('BuscoMoto\Moto_compra','id','moto_compra_id');
    }

    public function accesorios_compra()
    {
        return $this->hasMany('BuscoMoto\Accesorio_compra','compra_id');
    }

}