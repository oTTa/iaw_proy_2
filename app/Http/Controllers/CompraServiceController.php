<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Color;
use BuscoMoto\Moto;
use BuscoMoto\Accesorio;
use BuscoMoto\Moto_compra;
use BuscoMoto\Accesorio_compra;
use BuscoMoto\Compra;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class CompraServiceController extends Controller
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
    * Crea un nuevo color almacenandolo en la base de datos
    **/
    public function comprar(Request $request){
        $id_vendedor = $request->get('id_vendedor');    
        $moto = Moto::find($request->get('id_moto'));
        $id_color = $request->get('id_color');
        $accesorios = $request->get('accesorios');
        $id_user = Auth::user()['id'];
        

        $moto_compra = Moto_compra::create
        (
                [
                'tipo' => $moto['tipo'],
                'marca' => $moto['marca'],
                'cilindraje' => $moto['cilindraje'],
                'modelo' => $moto['modelo'],
                'rating' => $moto['rating'],
                'precio' => $moto['precio'],
                'url_video' => $moto['url_video'],
                'color_id' => $id_color
                ]
        );

        $Compra = Compra::create
        (
                [
                'usuario_id' => $id_user,
                'vendedor_id' => $id_vendedor,
                'moto_compra_id' => $moto_compra['id'],
                ]
        );

        $resu_ac = array();

        foreach ($accesorios as $id_accesorio) {
            $accesorio = Accesorio::find($id_accesorio);

            $accesorio_compra = Accesorio_compra::create
            (
                [
                'nombre' => $accesorio['nombre'],
                'tipo' => $accesorio['tipo'],
                'descripcion' => $accesorio['descripcion'],
                'precio' => $accesorio['precio'],
                'url_imagen' => $accesorio['url_imagen'],
                'url_thumbnail' => $accesorio['url_thumbnail'],
                'compra_id' => $Compra['id'],
                ]
            );
            array_push($resu_ac,$accesorio_compra);
        }
        $Compra['accesorios']=$resu_ac;
        $header =  array('status' => 'success', 'message' => 'Compra realizada correctamente');
        $response = array('header' => $header, 'content' => $Compra);
        return response()->json($response);
    }

}