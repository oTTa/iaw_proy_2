<?php

namespace BuscoMoto\Http\Controllers;
use Illuminate\Http\Request;
use BuscoMoto\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends MainController
{
    protected $redirectTo = '/';

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

    //view
    public function formulario_registrase()
    {
        $this->set_title("Registrarse");
        $this->add_font_awesome();
        $this->add_css("/css/template/formulario.css");
        $this->add_css("/css/admin/fondo.css");
        $this->add_jq_bootstrap_validation();
        $this->add_jqueryUI();
        $this->add_js("/js/usuario/crear.js");
        $data = $this->get_data();
        return view('usuario.registrarse', $data);
    }

    //view
    public function formulario_login()
    {
        $this->set_title("Login");
        $this->add_font_awesome();
        $this->add_css("/css/template/formulario.css");
        $this->add_css("/css/admin/fondo.css");
        $this->add_jq_bootstrap_validation();
        $this->add_js("/js/usuario/login.js");
        $data = $this->get_data();
        return view('usuario.login', $data);
    }



    //ajax

    public function registrase(Request $request){
        $usuario = Usuario::where('email', $request->get('email'));
        if ($usuario->count()==0){
            $imagen = $request->file('imagen');
            $ruta = '/images/usuarios/perfil/';
            $nombre = sha1(Carbon::now()).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$ruta, $nombre);
            $user = Usuario::create
            (
                    [
                    'nombre' => $request->get('nombre'),
                    'apellido' => $request->get('apellido'),
                    'email' => $request->get('email'),
                    'url_foto_perfil' => $ruta.$nombre,
                    'password' => bcrypt($request->get('password')),
                    'tipo' => 'comprador',
                    'fecha_nacimiento' => $request->get('fecha_nacimiento') 
                    ]
            );
            $header =  array('status' => 'success', 'message' => 'Registro exitoso');
            $response = array('header' => $header, 'content' => $user);
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'error', 'message' => 'El email ya esta en uso');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

    public function authenticate(Request $request)
    {
        $password = $request->get('password');
        $email = $request->get('email');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $header =  array('status' => 'success', 'message' => 'Login correcto');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
        else{
            $header =  array('status' => 'error', 'message' => 'Usuario o contraseña incorrecto');
            $response = array('header' => $header, 'content' => array());
            return response()->json($response);
        }
    }

    public function salir()
    {
        Auth::logout();
        return redirect('/');
    }

    public function perfil(){
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

        $this->set_title("Perfil");
        $this->add_css("/css/admin/fondo.css");
        $this->add_css("/css/usuario/perfil.css");
        $this->add_font_awesome();
        $data = $this->get_data();
        $data['usuario'] = $user;
        return view('usuario.perfil', $data);

    }
}