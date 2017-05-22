<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Marca;

class MarcaServiceController extends Controller
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
    * retorna las marcas de motos almacenado en la BD
    **/
    public function listar(Request $request){
        $marcas=Marca::all();
        $header =  array('status' => 'success', 'message' => 'Marcas de motos obtenidas correctamente');
        $response = array('header' => $header, 'content' => $marcas);
        return response()->json($response);
    }

        /**
    * retorna las marcas de motos almacenado en la BD que coincidan con id
    **/
    public function obtener($id){
        $marcas = Marca::where('nombre', 'like', '%' . $id . '%')->get();
        if ($marcas->count()>0){
            $header =  array('status' => 'success', 'message' => 'Marcas obtenidas correctamente');
            $response = array('header' => $header, 'content' => $marcas);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No hay marcas que coincidan con esos parametros");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

}