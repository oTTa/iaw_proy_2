<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Tipo;

class TipoServiceController extends Controller
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
    * retorna los tipos de motos almacenado en la BD
    **/
    public function listar(Request $request){
        $tipos=Tipo::all();
        $header =  array('status' => 'success', 'message' => 'Tipos de motos obtenidos correctamente');
        $response = array('header' => $header, 'content' => $tipos);
        return response()->json($response);
    }

    /**
    * retorna los Tipos de motos almacenado en la BD que coincidiad con id
    **/
    public function obtener($id){
        $tipos = Tipo::where('nombre', 'like', '%' . $id . '%')->get();
        if ($tipos->count()>0){
            $header =  array('status' => 'success', 'message' => 'Tipo obtenido correctamente');
            $response = array('header' => $header, 'content' => $tipos);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No hay tipos que coincidan con esos parametros");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

}