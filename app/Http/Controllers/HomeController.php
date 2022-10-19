<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function about()
    {
        return view("about");
    }

    public function attack()
    {
        return view("attack");
    }

    public function defense()
    {
        return view("defense");
    }
}