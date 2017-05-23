<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'moto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id','tipo', 'marca', 'cilindraje', 'modelo', 'rating', 'precio', 'url_video', 'visible'
       					];

    public function colores()
    {
    	return $this->hasMany('BuscoMoto\Color','id_moto');
    }

    public function tipo()
    {
        return $this->belongsTo('BuscoMoto\Tipo','tipo','nombre');
    }

    public function marca()
    {
        return $this->belongsTo('BuscoMoto\Marca','marca','nombre');
    }

    public function cilindraje()
    {
        return $this->belongsTo('BuscoMoto\Cilindraje','cilindraje','cantidad');
    }

    public function vendedores()
    {
    	return $this->belongsToMany('BuscoMoto\Vendedor','vendedor_moto');
    }


}