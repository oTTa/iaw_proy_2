<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Vendedor;
use BuscoMoto\Accesorio;


class AccesorioController extends MainController
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

        $this->add_jquery();
        $this->add_bootstrap();
    }

    /**
    * Prapara la vista para crear un accesorio
    */
    public function crear(){
    	$this->set_title("Crear Accesorio");
        $this->add_font_awesome();
    	$this->add_css("/css/template/formulario.css");
        $this->add_css("/css/admin/fondo.css");
        $this->add_jq_bootstrap_validation();
        $this->add_jqueryUI();
        $this->add_js("/js/accesorio/crear.js");
    	$data = $this->get_data();
    	return view('accesorio.crear', $data);
    }

     /**
    * Prapara la vista para editar un accesorios
    */
    public function editar($id){
        $accesorio = Accesorio::find($id);
        if ($accesorio){
            $this->set_title("Editar accesorio");
            $this->add_font_awesome();
            $this->add_css("/css/template/formulario.css");
            $this->add_css("/css/admin/fondo.css");
            $this->add_jq_bootstrap_validation();
            $this->add_jqueryUI();
            $this->add_js("/js/accesorio/editar.js");
            $data = $this->get_data();
            $data['accesorio']=$accesorio;
            return view('accesorio.editar', $data);
        }
        else{
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="El accesorio que intentas editar no existe";
            return view('templates.error', $data);
        }
    }

    /**
    * Prapara la vista para listar los accesorios
    */
    public function listar(){
        $this->set_title("Listar accesorios");
        $this->add_font_awesome();
        $this->add_data_tables();
        $this->add_js("/js/accesorio/listar.js");
        $this->add_css("/css/admin/fondo.css");
        $this->add_css("/css/accesorio/listar.css");
        $data = $this->get_data();
        return view('accesorio.listar', $data);
    }
}