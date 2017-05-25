<?php

namespace BuscoMoto\Http\Controllers;

use Illuminate\Http\Request;
use BuscoMoto\Http\Controllers\Controller;
use BuscoMoto\Marca;

class PublicServiceController extends Controller
{



	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


}