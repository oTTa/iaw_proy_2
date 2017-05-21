<?php 

namespace BuscoMoto;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'color';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       						'id', 'rgb', 'url_imagen', 'url_thumbail', 'id_moto'
       					];

    public function Moto()
    {
        return $this->belongsTo('BuscoMoto\Moto','id_moto', 'id');
    }

}