<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Accesorio_compra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acceseorio_compra';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id', 'nombre', 'tipo', 'descripcion', 'precio', 'url_imagen', 'url_thumbnail' , 'compra_id'
       					];

    public function compra()
    {
        return $this->belongsTo('BuscoMoto\Compra','compra_id','id');
    }

    public function tipo()
    {
        return $this->belongsTo('BuscoMoto\Tipo_accesorio','tipo','nombre');
    }

}