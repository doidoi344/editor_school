<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourceController extends Controller
{
    public function index()
    {
        return view('cources.index');
    }
}
