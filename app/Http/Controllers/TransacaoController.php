<?php

namespace App\Http\Controllers;
use App\Models\Transacao;

use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacao = Transacao::get();

        return view('transacoes.index', compact('transacao'));
    }
}
