<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function indexAdm()
    {
        $users = User::where("ativo", "1")->get();

        return view('users.index', compact('users'));
    }

    public function IncluirUser(Request $request)
    {
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");

        $nova = new User;
        $nova->name = $name;
        $nova->email = $email;
        $nova->password = $password;
        $nova->ativo = 1;
        $nova->save();
        return redirect('/admUsers');
    }

    public function ExcluirUser($id)
    {
        $users = User::where("id", $id)->first();
        $users->ativo = 0;
        $users->save();
        return redirect('/admUsers');
    }
    public function BuscarAlteracao($id)
    {
        $users = User::where("id", $id)->first();

        return view('users.alterar', compact('users'));
    }
    public function ExecutaAlteracao(Request $request)
    {
        $dado_name = $request->input("name");
        $dado_email = $request->input("email");
        $dado_password = $request->input("password");
        $dado_id = $request->input("id");

        $skins = User::where("id", $dado_id)->first();
        $skins->name = $dado_name;
        $skins->email = $dado_email;
        $skins->password = $dado_password;
        $skins->save();
        return redirect('/admUsers');
    }
}
