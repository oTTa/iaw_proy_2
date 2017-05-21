<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Vendedor;

class VendedorController extends MainController
{



	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->add_jquery();
        $this->add_bootstrap();
    }

    /**
    * Prapara la vista para crear un Vendedor
    */
    public function crear(){
    	$this->set_title("Crear vendedor");
        $this->add_font_awesome();
    	$this->add_css("/css/template/formulario.css");
        $this->add_css("/css/admin/fondo.css");
        $this->add_jq_bootstrap_validation();
        $this->add_js("/js/vendedor/mapa.js");
        $this->add_js("/js/vendedor/crear.js");
    	$data = $this->get_data();
    	return view('vendedor.crear', $data);
    }

     /**
    * Prapara la vista para editar un Vendedor
    */
    public function editar($id){
        $vendedor = Vendedor::find($id);

        if ($vendedor){
            $this->set_title("Editar vendedor");
            $this->add_font_awesome();
            $this->add_css("/css/template/formulario.css");
            $this->add_css("/css/admin/fondo.css");
            $this->add_jq_bootstrap_validation();
            $this->add_js("/js/vendedor/mapa.js");
            $this->add_js("/js/vendedor/editar.js");
            $data = $this->get_data();
            $data['id']=$id;
            return view('vendedor.editar', $data);
        }
        else{
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="El vendedor que intentas editar no existe";
            return view('templates.error', $data);
        }
    }

    /**
    * Prapara la vista para listar los Vendedores
    */
    public function listar(){
        $this->set_title("Listar vendedor");
        $this->add_font_awesome();
        $this->add_data_tables();
        $this->add_js("/js/vendedor/listar.js");
        $this->add_css("/css/admin/fondo.css");
        $this->add_css("/css/vendedor/listar.css");
        $data = $this->get_data();
        return view('vendedor.listar', $data);
    }
}