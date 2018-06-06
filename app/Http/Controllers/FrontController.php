<?php

namespace RecHum\Http\Controllers;

use Illuminate\Http\Request;

use RecHum\Http\Requests;
use RecHum\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return "indice";
    }

	public function admin(){
        return "view ('admin.index')";
    }
}
