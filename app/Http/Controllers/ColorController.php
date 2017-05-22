<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Color;
use BuscoMoto\Moto;

class ColorController extends MainController
{

	/**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
        $this->middleware('guest');
        $this->add_jquery();
        $this->add_bootstrap();
    }

    /**
    * Prepara la vista para crear un nuevo color
    */
    public function crear($id){
        $moto = Moto::find($id);
        if ($moto){
        	$this->set_title("Crear Color Moto");
            $this->add_font_awesome();
        	$this->add_css("/css/template/formulario.css");
            $this->add_css("/css/admin/fondo.css");
            $this->add_color_picker();
            $this->add_js("/js/color/crear.js");
        	$data = $this->get_data();
            $data['id']=$id;
        	return view('color.crear', $data);
        }
        else{
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="La moto que intentas editar no existe";
            return view('templates.error', $data);
        }
    }


    /**
    *** Prepara la vista para listar los colores de una moto
    **/
    public function listar($id){
        $moto = Moto::find($id);
        if ($moto){
            $this->set_title("Listar Motos");
            $this->add_font_awesome();
            $this->add_js("/js/color/listar.js");
            $this->add_css("/css/admin/fondo.css");
            $this->add_css("/css/color/listar.css");
            $data = $this->get_data();
            $moto['colores'] = Color::where('id_moto', $id)->get();
            $data['moto']=$moto;
            return view('color.listar', $data);
        }
        else{
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="La moto que intentas editar no existe";
            return view('templates.error', $data);
        }
    }
}