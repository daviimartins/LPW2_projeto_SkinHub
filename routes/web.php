<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SkinController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\HistoricoCompraController;
use App\Models\HistoricoCompra;
use Illuminate\Support\Facades\Route; 


Route::middleware('auth')->group(function () {
    Route::get('/admSkins', [SkinController::class, 'indexAdm'])->name('adm_index');

    Route::post('/admSkins', [SkinController::class, 'IncluirSkin']);

    Route::get("/admSkins/upd/{id}", [SkinController::class, 'BuscarAlteracao'])->name('skin_upd');
    Route::post('/admSkins/upd', [SkinController::class, 'ExecutaAlteracao']);

    Route::get("/admSkins/exc/{id}", [SkinController::class, 'ExcluirSkin'])->name('skin_ex');

    Route::get('/compras', [SkinController::class, 'indexCompras'])->name('compras_index');

    Route::get('/compras/{categoria}', [SkinController::class, 'filtrarSkins'])->name('filtrar_skins');

    Route::post('/carrinho/add/{skinId}', [CarrinhoController::class, 'adicionarAoCarrinho'])->name('carrinho.add');
    Route::delete('/carrinho/remove/{itemId}', [CarrinhoController::class, 'removerDoCarrinho'])->name('carrinho.remove');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/adicionar-carrinho', [CarrinhoController::class, 'adicionar'])->name('adicionar.carrinho');

    Route::get('/admUsers', [UsersController::class, 'indexAdm'])->name('adm_users');

    Route::post('/admUsers', [UsersController::class, 'IncluirUser']);

    Route::get("/admUsers/upd/{id}", [UsersController::class, 'BuscarAlteracao'])->name('user_upd');
    Route::post('/admUsers/upd', [UsersController::class, 'ExecutaAlteracao']);

    Route::get("/admUsers/exc/{id}", [UsersController::class, 'ExcluirUser'])->name('user_ex');

    Route::get('/admTransacoes', [TransacaoController::class, 'index'])->name('adm_transacao');

    Route::get('/admHistorico', [HistoricoCompraController::class, 'index'])->name('adm_historico');

    Route::post('/stripe/checkout', [CheckoutController::class, 'redirect'])->name('stripe.checkout');
    Route::get('/stripe/success', [CheckoutController::class, 'handleSuccess'])->name('stripe.success');
});

Route::get('/', [SkinController::class, 'index']);

Route::get("/registrar", function () {
    return view("admin_layout.registrar");
})->name('registrar');

Route::post("/registrar", [AuthController::class, 'register']);

Route::get("/login", function () {
    return view("admin_layout.login");
})->name("login");
Route::post("/login", [AuthController::class, 'login']);

Route::get("/loginAdm", function () {
    return view("admin_layout.loginAdm");
})->name("loginAdm");
Route::post("/loginAdm", [AuthController::class, 'loginAdm']);


