<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function index()
    {
        return view('pages.ngo-list');
    }
}
