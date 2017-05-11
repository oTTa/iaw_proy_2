<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Moto_compra extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'moto_compra';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id','tipo', 'marca', 'cilindraje', 'modelo', 'rating', 'precio', 'url_video', 'color_id',
       					];

    public function color()
    {
    	return $this->hasOne('BuscoMoto\Color','color_id','id');
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

     public function compra()
    {
        return $this->belongsTo('BuscoMoto\Compra','id','moto_id');
    }

}