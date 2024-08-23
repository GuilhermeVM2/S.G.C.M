<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class HomeController extends Controller
{
    public function index()
    {
        // Pegue as 5 consultas mais recentes, por exemplo
        $consultas = Consulta::take(5)->get();
        return view("home", compact('consultas'));
    }
}
