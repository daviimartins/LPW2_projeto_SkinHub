<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    public function index()
    {
        $skins = Skin::where("vendido", "0")->get();

        return view('home.index', compact('skins'));
    }

    public function indexCompras()
    {
        $skins = Skin::where("vendido", "0")->get();

        return view('home.logado', compact('skins'));
    }

    public function filtrarSkins($tipo)
    {
        if ($tipo == 'todas') {
            $skins = Skin::where("vendido", "0")->get();
        } else {
            $skins = Skin::where('tipo', $tipo)->where("vendido", "0")->get();
        }

        return view('home.logado', compact('skins'));
    }

    public function indexAdm()
    {
        $skins = Skin::get();

        return view('skins.index', compact('skins'));
    }

    public function IncluirSkin(Request $request)
    {
        $skin_nome = $request->input("skin_nome");
        $arma_nome = $request->input("arma_nome");
        $raridade = $request->input("raridade");
        $valor = $request->input("valor");
        $tipo = $request->input("tipo");
        $exterior = $request->input("exterior");
        $url_imagem = $request->input("url_imagem");

        $nova = new Skin;
        $nova->skin_nome = $skin_nome;
        $nova->arma_nome = $arma_nome;
        $nova->raridade = $raridade;
        $nova->valor = $valor;
        $nova->tipo = $tipo;
        $nova->exterior = $exterior;
        $nova->url_imagem = $url_imagem;
        $nova->vendido = 0;
        $nova->save();
        return redirect('/admSkins');
    }

    public function ExcluirSkin($id)
    {
        $skin = Skin::where("id", $id)->first();
        $skin->vendido = 1;
        $skin->save();
        return redirect('/admSkins');
    }

    public function BuscarAlteracao($id)
    {
        $skins = Skin::where("id", $id)->first();

        return view('skins.alterar', compact('skins'));
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_skin = $request->input("skin_nome");
        $dado_arma = $request->input("arma_nome");
        $dado_raridade = $request->input("raridade");
        $dado_valor = $request->input("valor");
        $dado_tipo = $request->input("tipo");
        $dado_exterior = $request->input("exterior");
        $dado_imagem = $request->input("url_imagem");
        $dado_status = $request->input("vendido");
        $dado_id = $request->input("id");

        $skins = Skin::where("id", $dado_id)->first();
        $skins->skin_nome = $dado_skin;
        $skins->arma_nome = $dado_arma;
        $skins->raridade = $dado_raridade;
        $skins->valor = $dado_valor;
        $skins->tipo = $dado_tipo;
        $skins->exterior = $dado_exterior;
        $skins->url_imagem = $dado_imagem;
        $skins->vendido = $dado_status;
        $skins->save();
        return redirect('/admSkins');
    }
}
