<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\HistoricoCompra;
use App\Models\Skin;
use App\Models\Transacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{

    public function redirect(Request $request)
    {
        Log::log('info', 'user id: ' . auth()->user()->id);
        Stripe::setApiKey('sk_test_51QEJdMPJFVsMtCbkSmjOW79aBOKLwsTLqhZK9odM4yUet3eflgCBZQgnMxDCZzWjtOOU26npF7z5iAVvfnCUQr0u00tAlvL5yX');

        $items = json_decode($request->input('carrinhoItems'));
        foreach ($items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $item->skin->skin_nome,
                        'images' => [$item->skin->url_imagem],
                        'metadata' => [
                            'skin_id' => $item->skin->id,
                        ],
                    ],
                    'unit_amount' => $item->skin->valor * 100,
                ],
                'quantity' => $item->quantidade_itens,
            ];
        }

        // Criação da sessão de checkout
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}&user_id=' . auth()->user()->id,
            'cancel_url' => url('/cancel'),
        ]);

        // Redirecionamento para a página de checkout do Stripe
        return redirect($checkoutSession->url);
    }

    public function handleSuccess(Request $request)
    {
        Stripe::setApiKey('sk_test_51QEJdMPJFVsMtCbkSmjOW79aBOKLwsTLqhZK9odM4yUet3eflgCBZQgnMxDCZzWjtOOU26npF7z5iAVvfnCUQr0u00tAlvL5yX');

        // Buscar a sessão de checkout para obter os dados dos itens comprados
        $userId = $request->query('user_id');
        $sessionId = $request->query('session_id');  // Obtém o ID da sessão na URL
        $session = Session::retrieve($sessionId, [
            'expand' => ['line_items'],
        ]);

        if ($session) {
            Log::info('Stripe Session:', ['session' => $session]);
            $items = Session::allLineItems($sessionId);
            Log::info('Stripe Session Line Items:', ['line_items' => $items]);

            foreach ($items->data as $item) {
                // Retrieve the product associated with the line item
                $product = \Stripe\Product::retrieve($item->price->product); // Use item->price->product to get the product ID

                // Access the metadata
                $skinId = $product->metadata['skin_id'] ?? null; // Get the metadata

                // Log or process the skin ID
                Log::info('Retrieved skin ID:', ['skin_id' => $skinId]);

                if ($skinId) {
                    // Update your skin status in the database
                    Skin::where('id', $skinId)->update(['vendido' => 1]);
                }
                HistoricoCompra::create([
                    'user_id' => $userId,
                    'skins_id' => $skinId,
                ]);
            }

            Log::info('User ID:', ['user_id' => $userId]);
            Carrinho::where('user_id', $userId)->delete();

            Transacao::create([
                'user_id' => $userId,
                'valor_transacao' => $session->amount_total / 100,
                'forma_pagamento' => 'cartão de crédito',
            ]);

            // Redireciona para uma página de confirmação ou exibe uma mensagem
            return redirect()->intended(route('filtrar_skins', 'todas'))->with('success', 'Compra confirmada com sucesso!');
        }

        return redirect()->intended(route('filtrar_skins', 'todas'))->with('error', 'Erro ao processar a compra.');
    }
}
