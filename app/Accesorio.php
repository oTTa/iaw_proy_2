<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accesorio';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id', 'nombre', 'tipo', 'descripcion', 'precio', 'url_imagen', 'url_thumbnail'
       					];

    public function tipo()
    {
        return $this->belongsTo('BuscoMoto\Tipo_accesorio','tipo','nombre');
    }

}