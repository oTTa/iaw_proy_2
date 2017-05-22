<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Tipo_accesorio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tipo_accesorio';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'nombre'
       					];

    public function accesorios()
    {
        return $this->hasMany('BuscoMoto\Accesorio','tipo');
    }

    public function accesorios_compra()
    {
        return $this->hasMany('BuscoMoto\Accesorio_compra','tipo');
    }

}