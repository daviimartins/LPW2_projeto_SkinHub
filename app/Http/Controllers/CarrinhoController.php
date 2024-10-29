<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function adicionarAoCarrinho(Request $request, $skinId)
    {
        $userId = Auth::id();

        // Verifica se a skin já está no carrinho
        $carrinhoItem = Carrinho::where('user_id', $userId)->where('skins_id', $skinId)->first();

        if ($carrinhoItem) {
            // Se já existe, não incrementa a quantidade
            return redirect()->back()->with('info', 'Este item já está no seu carrinho.');
        } else {
            // Se não, cria um novo item no carrinho
            Carrinho::create([
                'user_id' => $userId,
                'skins_id' => $skinId,
                'quantidade_itens' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Item adicionado ao carrinho!');
    }

    public function removerDoCarrinho($itemId)
    {
        $item = Carrinho::findOrFail($itemId);
        $item->delete();

        return redirect()->back()->with('success', 'Item removido do carrinho!');
    }
}
