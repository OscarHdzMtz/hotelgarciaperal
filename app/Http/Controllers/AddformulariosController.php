<?php

namespace App\Http\Controllers;

use App\Models\addformularios;
use Illuminate\Http\Request;

class AddformulariosController extends Controller
{
    //
    public function index(){
        $getformularios1 = addformularios::all();
        return view('pages.formularios.index', compact('getformularios1'));
    }
    public function create(){
        return view('pages.formularios.form-create');
    }
    
    public function indexmain(){
        return view('prueba');
    }
}
