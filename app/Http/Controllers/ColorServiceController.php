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
        $this->middleware('auth');
        $this->middleware('isAdmin');

    }

    /**
    * Crea un nuevo color almacenandolo en la base de datos
    **/
    public function agregar(Request $request){
        $id = $request->get('id');    
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
    * Eliminar un color
    **/
    public function eliminar($id){  
        $color = Color::find($id);
        if ($color){
            $ruta = getcwd().$color->url_imagen;
            if(file_exists($ruta))
            {
                unlink(realpath($ruta));
            }
            $ruta = getcwd().$color->url_thumbnail;
            if(file_exists($ruta))
            {
                unlink(realpath($ruta));
            }

            Color::destroy($id);
            $header =  array('status' => 'success', 'message' => 'Color borrado correctamente');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe el color");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }



}