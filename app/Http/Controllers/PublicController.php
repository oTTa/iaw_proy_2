<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Moto;

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

    
}