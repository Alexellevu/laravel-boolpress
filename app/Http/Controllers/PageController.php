<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.welcome');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function contacts()
    {
        return view('guest.contacts');

    }

    public function sendForm(Request $request)
    {
        //ddd($request->all());
        
    }
}
