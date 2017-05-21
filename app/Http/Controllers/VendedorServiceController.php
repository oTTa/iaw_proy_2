<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Vendedor;

class VendedorServiceController extends Controller
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
    * Crea un nuevo vendedor almacenandolo en la base de datos
    **/
    public function crear(Request $request){

        /*$this->validate($request, [
        'nombre' => 'required|max:120',
        'direccion' => 'required|max:120',
        'telefono' => "numeric|required|max:64",
        'latitud' => "numeric|required",
        'longitud' => "numeric|required"
         ]);*/

        $data = $request->all();
        $data['id'] = Vendedor::create($data)->id;
        $header =  array('status' => 'success', 'message' => 'Vendedor creado correctamente');
        //$content = array('id' => $data['id']);
        $response = array('header' => $header, 'content' => $data);
    	return response()->json($response);
    }

    /**
    * Crea un nuevo vendedor almacenandolo en la base de datos
    **/
    public function editar(Request $request){
        $data = $request->all();
        $vendedor = Vendedor::find($data['id']);
        if (!$vendedor){
            $header =  array('status' => 'false', 'message' => "No existe el vendedor");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $vendedor->nombre = $data['nombre'];
            $vendedor->direccion = $data['direccion'];
            $vendedor->telefono = $data['telefono'];
            $vendedor->latitud = $data['latitud'];
            $vendedor->longitud = $data['longitud'];
            $vendedor->save();

            $header =  array('status' => 'success', 'message' => 'Cambios en el vendedor realizados correctamente');
            $response = array('header' => $header, 'content' => $data);
            return response()->json($response);
        }
    }



    /**
    * retorna los vendedores almacenado en la BD
    **/
    public function listar(Request $request){
        $vendedores=Vendedor::all();
        $header =  array('status' => 'success', 'message' => 'Vendedores obtenidos correctamente');
        $response = array('header' => $header, 'content' => $vendedores);
        return response()->json($response);
    }

    /**
    * retorna los vendedores almacenado en la BD
    **/
    public function obtener($id){
        $vendedor = Vendedor::find($id);
        if ($vendedor){
            $header =  array('status' => 'success', 'message' => 'Vendedor obtenido correctamente');
            $response = array('header' => $header, 'content' => $vendedor);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe el vendedor");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }



}