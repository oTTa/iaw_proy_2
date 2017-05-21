<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Moto;
use BuscoMoto\Cilindraje;
use BuscoMoto\Marca;
use BuscoMoto\Tipo;
use BuscoMoto\Vendedor;


class MotoServiceController extends Controller
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
    * Crea un nueva moto almacenandola en la base de datos
    **/
    public function crear(Request $request){
        $data = $request->all();

        $data['marca']=strtolower(trim($data['marca']));
        $data['tipo']=strtolower(trim($data['tipo']));

        $cilindraje = Cilindraje::find($data['cilindraje']);
        $marca = Marca::find($data['marca']);
        $tipo = Tipo::find($data['tipo']);

        if (!$cilindraje){
             Cilindraje::create(array('cantidad' => $data['cilindraje']));
        }
        if (!$tipo){
             Tipo::create(array('nombre' => strtolower($data['tipo'])));
        }
        if (!$marca){
             Marca::create(array('nombre' => strtolower($data['marca'])));
        }

        $data['id'] = Moto::create($data)->id;
        $header =  array('status' => 'success', 'message' => 'Moto creada correctamente');
        $response = array('header' => $header, 'content' => $data);
    	return response()->json($response);
    }

    /**
    * Edita una moto almacenandolo en la base de datos
    **/
    public function editar(Request $request){
        $data = $request->all();

        $data['marca']=strtolower(trim($data['marca']));
        $data['tipo']=strtolower(trim($data['tipo']));

        $cilindraje = Cilindraje::find($data['cilindraje']);
        $marca = Marca::find($data['marca']);
        $tipo = Tipo::find($data['tipo']);

        if (!$cilindraje){
           Cilindraje::create(array('cantidad' => $data['cilindraje']));
       }
       if (!$tipo){
           Tipo::create(array('nombre' => strtolower($data['tipo'])));
       }
       if (!$marca){
           Marca::create(array('nombre' => strtolower($data['marca'])));
       }

       $moto = Moto::find($data['id']);
       if (!$moto){
        $header =  array('status' => 'false', 'message' => "No existe la moto que quieres editar");
        $response = array('header' => $header, 'content' => array());
        return response()->json($response);
    }
    else{
        $moto->tipo = $data['tipo'];
        $moto->marca = $data['marca'];
        $moto->cilindraje = $data['cilindraje'];
        $moto->modelo = $data['modelo'];
        $moto->url_video = $data['url_video'];
        $moto->rating = $data['rating'];
        $moto->precio = $data['precio'];
        $moto->save();

        $header =  array('status' => 'success', 'message' => 'Cambios en la moto realizados correctamente');
        $response = array('header' => $header, 'content' => $moto);
        return response()->json($response);
    }
}



    /**
    * retorna las motos almacenado en la BD
    **/
    public function listar(Request $request){
        $moto=Moto::all();
        $header =  array('status' => 'success', 'message' => 'Motos obtenidas correctamente');
        $response = array('header' => $header, 'content' => $moto);
        return response()->json($response);
    }

    /**
    * retorna la moto id
    **/
    public function obtener($id){
        $moto = Moto::find($id);
        if ($moto){
            $header =  array('status' => 'success', 'message' => 'Moto obtenido correctamente');
            $response = array('header' => $header, 'content' => $moto);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe la moto");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

    /**
    * elimina la moto id
    **/
    public function eliminar($id){
        $moto = Moto::find($id);
        if ($moto){
            Moto::destroy($id);
            $header =  array('status' => 'success', 'message' => 'Moto eliminada correctamente');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe la moto");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

    /**
    * cambiar visibilidad la moto id
    **/
    public function cambiar_visibilidad($id){
        $moto = Moto::find($id);
        if ($moto){
            $moto->visible = 1 - $moto->visible;
            $moto->save();
            $header =  array('status' => 'success', 'message' => 'Visibilidad cambiada correctamente');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe la moto");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

}