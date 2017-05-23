<?php

namespace BuscoMoto\Http\Controllers;

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
        $this->middleware('auth');
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
}
