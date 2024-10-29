<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricoCompra; 

class HistoricoCompraController extends Controller
{
    public function index()
    {
        $historico = HistoricoCompra::get();

        return view('historico.index', compact('historico'));
    }
}
