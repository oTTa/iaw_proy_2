<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Cilindraje;

class CilindrajeServiceController extends Controller
{



	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
    * retorna los cilindrajes de motos almacenado en la BD
    **/
    public function listar(Request $request){
        $tipos=Cilindraje::all();
        $header =  array('status' => 'success', 'message' => 'Cilindrajes de motos obtenidos correctamente');
        $response = array('header' => $header, 'content' => $tipos);
        return response()->json($response);
    }

}