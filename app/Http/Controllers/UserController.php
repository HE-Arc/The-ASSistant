<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view("users.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "password" => "required|string",
            "password2" => "required|string",
        ]);

        $user = new User();
        $user->name = $request->name;

        if($request->password == $request->password2)
        {
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            # https://stackoverflow.com/questions/53230208/how-to-an-encrypt-a-password-with-sha1-in-php
        }
        else
        {
            return redirect()
                ->route("users.create")
                ->with("error", "Les mots de passe ne sont pas identiques.");
        }


        $user->save();

        return redirect()
            ->route("login")
            ->with("success", "Utilisateur créé avec succès.");
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "password" => "required|string",
        ]);

        $name = $request->name;
        $password = $request->password;

        $user = User::where(['name' => $name])->first();

        if (!empty($user) && password_verify($password, $user->password)) {

            session(['username' => $request->name]);

            return redirect()
                ->route("home");
        }

        return redirect()
                ->route("login")
                ->with("error", "Le nom d'utilisateur ou le mot de passe est incorrect.");
    }

    public function logout()
    {
        session()->forget(['username']);

        return redirect()->route('home');
    }
}
