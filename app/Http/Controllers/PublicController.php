<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Moto;
use BuscoMoto\Compra;
use BuscoMoto\Usuario;
use BuscoMoto\Color;
use Illuminate\Support\Facades\Auth;

class PublicController extends MainController
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

    //HOME DE LA PAGINA
    public function compra(){
        $this->set_title("BuscoMoto");
        $this->add_bootstrap_select();
        $this->add_css("/css/compra/elegir_moto.css");
        $this->add_js("/js/compra/motos.js");
        $this->add_font_awesome();
        $data = $this->get_data();
        return view('compra.elegir_moto', $data);
    }

    public function compartida($token){
        $user = Auth::user();

        if (!$user){
            $this->set_title("Login");
            $this->add_font_awesome();
            $this->add_css("/css/template/formulario.css");
            $this->add_css("/css/admin/fondo.css");
            $this->add_jq_bootstrap_validation();
            $this->add_js("/js/usuario/login.js");
            $data = $this->get_data();
            return view('usuario.login', $data);
        }

        $compra = Compra::where('token_compartir', $token)->get();

        if ($compra->count()==0){
            $this->set_title("Error");
            $this->add_css("/css/admin/fondo.css");
            $data=$this->get_data();
            $data['mensaje']="La compra compartida no existe";
            return view('templates.error', $data);
        }
        else{
            $compra=$compra[0];
            $compra['usuario'] = $compra->usuario()->get()[0];
            $compra['moto'] = $compra->moto_compra()->get()[0];
            $compra['moto']->color = Color::find($compra['moto']->color_id);
            $compra['accesorios'] = $compra->accesorios_compra()->get();
            $compra['vendedor'] = $compra->vendedor()->get()[0];

            $this->set_title("Compras");
            $this->add_css("/css/admin/fondo.css");
            $this->add_css("/css/compra/listar_compras.css");
            $this->add_font_awesome();
            $data = $this->get_data();
            $data['compra'] = $compra;
            return view('publico.compra_comptartida', $data);
        }

    }

    
}