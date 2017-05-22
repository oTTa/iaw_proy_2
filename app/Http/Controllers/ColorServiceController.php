<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Color;
use BuscoMoto\Moto;

use Carbon\Carbon;

class ColorServiceController extends Controller
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
    * Crea un nuevo color almacenandolo en la base de datos
    **/
    public function agregar(Request $request){
        $id = $request->get('id');    
        $data = $request->all();
        $moto = Moto::find($id);
        if ($moto){
            $color = $request->get('color');
            $imagen = $request->file('imagen');
            $ruta = '/images/motos/';
            $nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$ruta, $nombre);
            $color = Color::create
            (
                [
                'rgb' => $color,
                'url_imagen' => $ruta.$nombre,
                'url_thumbnail' => $ruta.$nombre,
                'id_moto' => $id
                ]
            );
            $header =  array('status' => 'success', 'message' => 'Color creado correctamente');
            $response = array('header' => $header, 'content' => $color);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe la moto");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        

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



}