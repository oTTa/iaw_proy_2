<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Compra;
use BuscoMoto\Color;


class AdministracionUsuariosController extends MainController
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

    public function listar(Request $request){
        $this->set_title("Listar usuarios");
        $this->add_font_awesome();
        $this->add_data_tables();
        $this->add_js("/js/usuario/listar.js");
        $this->add_css("/css/admin/fondo.css");
        $this->add_css("/css/usuario/listar.css");
        $data = $this->get_data();
        return view('usuario.listar', $data);
    }

    public function listar_compras_usuario($id_user){
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