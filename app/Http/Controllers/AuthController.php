<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autenticar o usuário
        Auth::login($user);

        // Redirecionar ou retornar uma resposta
        return view("admin_layout.login");
    }
    public function login(Request $request)
    {
        // Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Verificar as credenciais e autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Login bem-sucedido
            $request->session()->regenerate();

            return redirect()->intended(route('filtrar_skins', 'todas'))->with('success', 'Login bem-sucedido!');
        }

        // Se as credenciais estiverem erradas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function loginAdm(Request $request)
{
    // Validação dos dados
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Verificar se o email pertence ao administrador
    if ($credentials['email'] === 'administracao@skinhub.com.br' && $credentials['password'] === 'admin.skinshub') {
        // Se as credenciais forem válidas, autenticar manualmente
        Auth::loginUsingId(1);  // Supondo que o ID do admin seja 1, ou você pode buscar esse ID

        // Regenerar a sessão para proteger contra ataques de sessão fixa
        $request->session()->regenerate();

        // Redirecionar para o painel administrativo
        return redirect()->intended(route('adm_index'))->with('success', 'Login bem-sucedido!');
    }

    // Se as credenciais estiverem incorretas
    return back()->withErrors([
        'email' => 'As credenciais fornecidas estão incorretas.',
    ]);
}
}
