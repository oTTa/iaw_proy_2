<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Moto;
use BuscoMoto\Vendedor;
use BuscoMoto\Accesorio;
use BuscoMoto\Color;
use BuscoMoto\Tipo_accesorio;
use BuscoMoto\Compra;
use BuscoMoto\Moto_compra;
use BuscoMoto\Accesorio_Compra;
use Illuminate\Support\Facades\Auth;
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
    	$this->set_title("BuscoMoto");
    	$this->add_bootstrap_select();
    	$this->add_css("/css/compra/elegir_moto.css");
    	$this->add_js("/js/compra/motos.js");
        $this->add_font_awesome();
    	$data = $this->get_data();
    	return view('compra.elegir_moto', $data);
    }

    public function preparar_compra($id_moto,$id_color,$id_vendedor){
        $moto = Moto::find($id_moto);
        $vendedor = Vendedor::find($id_vendedor);
        $color =  Color::find($id_color);

        if (!$moto){
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="La moto que intentas comprar no existe";
            return view('templates.error', $data);
        }

        if (!$vendedor){
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="El vendedor que realiza la venta no existe";
            return view('templates.error', $data);
        }

        if (!$color){
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="El color de la moto no existe";
            return view('templates.error', $data);
        }

        $accesorios = Accesorio::all();
        $this->set_title("Elegir accesorios");
        $this->add_css("/css/compra/elegir_moto.css");
        $this->add_js("/js/compra/accesorios.js");
        $this->add_css("/css/color/listar.css");
        $this->add_css("/css/admin/fondo.css");
        $this->add_font_awesome();
        $data = $this->get_data();
        $data['vendedor'] = $vendedor;
        $data['moto'] = $moto;
        $data['color'] = $color;
        $data['accesorios'] = $accesorios;
        $data['tipo_accesorios'] = Tipo_accesorio::all();
        return view('compra.elegir_accesorios', $data);
    }

    public function listar_compras_usuario(){
        $id_user = Auth::user()['id'];

        if (!$id_user){
            $this->set_title("Login");
            $this->add_font_awesome();
            $this->add_css("/css/template/formulario.css");
            $this->add_css("/css/admin/fondo.css");
            $this->add_jq_bootstrap_validation();
            $this->add_js("/js/usuario/login.js");
            $data = $this->get_data();
            return view('usuario.login', $data);
        }

        $compras = Compra::where('usuario_id', $id_user)->get();
        foreach ($compras as $compra) {
            $compra['moto'] = $compra->moto_compra()->get();
            $compra['moto'][0]->color = Color::find($compra['moto'][0]->color_id);
            $compra['accesorios'] = $compra->accesorios_compra()->get();
            $compra['vendedor'] = $compra->vendedor()->get();
        }

        $this->set_title("Compras");
        $this->add_css("/css/admin/fondo.css");
        $this->add_css("/css/compra/listar_compras.css");
        $this->add_js("/js/compra/listar_compras.js");
        $this->add_font_awesome();
        $data = $this->get_data();
        $data['compras'] = $compras;
        return view('compra.listar_compras_usuario', $data);

    }

}
