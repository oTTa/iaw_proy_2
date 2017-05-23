<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Moto;
use BuscoMoto\Vendedor;
use BuscoMoto\Accesorio;
use BuscoMoto\Color;

class CompraController extends MainController
{
	    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        //$this->middleware('auth');
        $this->add_jquery();
        $this->add_bootstrap();
    }

    public function compra(){
    	$this->set_title("Elegir moto");
    	$this->add_bootstrap_select();
    	$this->add_css("/css/compra/elegir_moto.css");
    	$this->add_js("/js/compra/motos.js");
        $this->add_font_awesome();
    	$data = $this->get_data();
    	return view('compra.elegir_moto', $data);
    }

    public function preparar_compra($id_moto,$id_color,$id_vendedor){
        /* faltan las validaciones con redireccionado al error*/

        $moto = Moto::find($id_moto);
        $vendedor = Vendedor::find($id_vendedor);
        $color =  Color::find($id_color);
        $accesorios = Accesorio::all();
        
        $this->set_title("Elegir accesorios");
        $this->add_css("/css/compra/elegir_moto.css");
        $this->add_js("/js/compra/accesorios.js");
        $this->add_css("/css/color/listar.css");
        $this->add_font_awesome();
        $data = $this->get_data();
        $data['vendedor'] = $vendedor;
        $data['moto'] = $moto;
        $data['color'] = $color;
        $data['accesorios'] = $accesorios;
        return view('compra.elegir_accesorios', $data);
    }
}
