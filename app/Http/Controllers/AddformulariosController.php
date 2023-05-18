<?php

namespace App\Http\Controllers;

use App\Models\addformularios;
use Illuminate\Http\Request;

class AddformulariosController extends Controller
{
    //
    public function index(){
        $getformularios = addformularios::all();
        return view('pages.formularios.index', compact('getformularios'));
    }
    public function create(){
        return view('pages.formularios.form-create');
    }
    
}
