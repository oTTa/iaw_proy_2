<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Moto;

class PublicServiceController extends Controller
{



	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * retorna las motos almacenado en la BD
    **/
    public function listar(Request $request){
        $motos=Moto::where('visible',1)->get();
        foreach ($motos as $moto) {
            $moto['colores']=$moto->colores()->get();
            $moto['vendedores']=$moto->vendedores()->get();
        }
        $header =  array('status' => 'success', 'message' => 'Motos obtenidas correctamente');
        $response = array('header' => $header, 'content' => $motos);
        return response()->json($response);
    }
    


}