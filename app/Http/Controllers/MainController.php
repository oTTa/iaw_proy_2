<?php

namespace BuscoMoto\Http\Controllers;

class MainController extends Controller
{
    private $icon="";
    private $title="";
    private $js = array();
    private $css = array();
    private $extra = array();

 	public function add_js($ruta){
 		array_push($this->js,$ruta);
 	}

 	public function add_css($ruta){
 		array_push($this->css,$ruta);
 	}

 	public function add_extra($extra){
 		array_push($this->extra,$extra);
 	}

 	public function set_icon($ruta){
 		$this->icon = $ruta;
 	}

 	public function set_title($title){
 		$this->title = $title;
 	}

 	public function get_data(){
 		$resu = array();
 		$resu['js'] = $this->js;
 		$resu['css'] = $this->css;
 		$resu['icon'] = $this->icon;
 		$resu['title'] = $this->title;
 		$resu['extra'] = $this->extra;
 		return $resu;
 	}

 	public function add_bootstrap(){
 		array_push($this->css,"/css/bootstrap/bootstrap.min.css");
 		array_push($this->css,"/css/bootstrap/bootstrap-theme.min.css");
 		array_push($this->js,"/js/bootstrap/bootstrap.min.js");
 	}

 	public function add_bootstrap_select(){
 		array_push($this->css,"/css/bootstrap-select/bootstrap-select.css");
 		array_push($this->js,"/js/bootstrap-select/bootstrap-select.js");
 		array_push($this->js,"/js/bootstrap-select/i18n/defaults-es_ES.js");
 	}

 	public function add_jquery(){
		array_push($this->js,"/js/jquery/jquery-2.2.4.min.js");
 	}

 	public function add_data_tables(){
 		array_push($this->css,"/css/data_tables/datatables.min.css");
 		array_push($this->js,"/js/data_tables/datatables.min.js");
 	}

 	public function add_jqueryUI(){
 		array_push($this->css,"/css/jquery-ui/jquery-ui.css");
 		array_push($this->css,"/css/jquery-ui/jquery-ui.structure.min.css");
 		array_push($this->css,"/css/jquery-ui/jquery-ui.theme.min.css");

		array_push($this->js,"/js/jquery-ui/jquery-ui.min.js");
 	}

 	public function add_font_awesome(){
		array_push($this->css,"/css/font-awesome/css/font-awesome.min.css");
 	}

 	public function add_jq_bootstrap_validation(){
 		array_push($this->js,"/js/jqBootstrapValidation/jqBootstrapValidation.js");
 	}

 	public function add_color_picker(){
 		array_push($this->css,"/css/colorpicker/color-picker.min.css");

 		array_push($this->js,"/js/colorpicker/color-picker.min.js");
 	}

 	public function add_google_login(){
 		array_push($this->extra,'<meta name="google-signin-scope" content="profile email">');
 		array_push($this->extra,'<meta name="google-signin-client_id" content="815131428435-4d830q1dljs8p8o0jio77rp6elov04o7.apps.googleusercontent.com">');
 		array_push($this->extra,'<script src="https://apis.google.com/js/platform.js" async defer></script>');
 	}
 	
 	
}
