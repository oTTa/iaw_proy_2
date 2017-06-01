<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Accesorio;
use BuscoMoto\Tipo_accesorio;
use Carbon\Carbon;

class AccesorioServiceController  extends Controller
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
    * Crea un nuevo accesorio almacenandolo en la base de datos y guardando la foto
    **/
    public function crear(Request $request){
            $imagen = $request->file('imagen');
            $ruta = '/images/accesorios/';
            $nombre = sha1(Carbon::now().$request->get('nombre')).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$ruta, $nombre);
            $tipo_accesorio = Tipo_accesorio::find($request->get('tipo'));
            if (!$tipo_accesorio)
                Tipo_accesorio::create(['nombre' => $request->get('tipo')]);
            $accesorio = Accesorio::create
            (
                [
                'nombre' => $request->get('nombre'),
                'url_imagen' => $ruta.$nombre,
                'url_thumbnail' => $ruta.$nombre,
                'tipo' => $request->get('tipo'),
                'descripcion' => $request->get('descripcion'),
                'precio' => $request->get('precio')
                ]
            );
            $header =  array('status' => 'success', 'message' => 'Accesorio creado correctamente');
            $response = array('header' => $header, 'content' => $accesorio);
            return response()->json($response);
    }

    /**
    * retorna los tipos de accesorios almacenado en la BD
    **/
    public function listar_tipos_accesorios(Request $request){
        $tipos=Tipo_accesorio::all();
        $header =  array('status' => 'success', 'message' => 'Tipos de accesorios obtenidos correctamente');
        $response = array('header' => $header, 'content' => $tipos);
        return response()->json($response);
    }

    /**
    * retorna los Tipos de motos almacenado en la BD que coincidan con id
    **/
    public function obtener_accesorio($id){
        $tipos = Tipo_accesorio::where('nombre', 'like', '%' . $id . '%')->get();
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

    /**
    * edita un accesorio almacenandolo en la base de datos
    **/
    public function editar(Request $request){
        $data = $request->all();
        $accesorio = Accesorio::find($data['id']);
        if (!$accesorio){
            $header =  array('status' => 'false', 'message' => "No existe el accesorio");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $accesorio->nombre = $data['nombre'];
            $accesorio->tipo = $data['tipo'];
            $accesorio->descripcion = $data['descripcion'];
            $accesorio->precio = $data['precio'];
            $accesorio->save();

            $header =  array('status' => 'success', 'message' => 'Cambios en el Accesorio realizados correctamente');
            $response = array('header' => $header, 'content' => $accesorio);
            return response()->json($response);
        }
    }



    /**
    * retorna los vendedores almacenado en la BD
    **/
    public function listar(Request $request){
        $accesorios=Accesorio::all();
        $header =  array('status' => 'success', 'message' => 'Vendedores obtenidos correctamente');
        $response = array('header' => $header, 'content' => $accesorios);
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

    /**
    * retorna los vendedores almacenado en la BD
    **/
    public function borrar($id){
        $accesorio = Accesorio::find($id);
        if ($accesorio){
            $ruta = getcwd().$accesorio->url_imagen;
            if(file_exists($ruta))
            {
                unlink(realpath($ruta));
            }
            $ruta = getcwd().$accesorio->url_thumbnail;
            if(file_exists($ruta))
            {
                unlink(realpath($ruta));
            }

            Accesorio::destroy($id);
            $header =  array('status' => 'success', 'message' => 'Accesorio borrado correctamente');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'false', 'message' => "No existe el accesorio");
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }



}