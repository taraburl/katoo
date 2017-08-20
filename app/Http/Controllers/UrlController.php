<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class UrlController extends Controller {

    public function __construct() {
        $this->titulo = DB::table('objeto')->select('nombre', 'font', 'id')->where('tipoobjeto', 'Titulo')->get();
        $this->subtitulo = DB::table('objeto')->select('nombre', 'url', 'padre')->where('padre', '>', 0)->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('MasterPage/TFrontoffice');
    }

    public function BackofficeAdminkatoo() {
        $titulo = $this->titulo;
        $subtitulo = $this->subtitulo;
        return view('MasterPage/TBackoffice', compact('titulo', 'subtitulo'));
    }

    public function Autenticacion() {
      
        return view('MasterPage/TLoginBackoffice');
    }

    public function usuarios() {
        return view('Formularios/usuarios');
    }

    public function accesos() {
        return view('Formularios/accesos');
    }

    public function modulos() {
        return view('Formularios/modulos');
    }

    public function empresas() {
        return view('Formularios/empresas');
    }

}
