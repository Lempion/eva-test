<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainFormController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function store(Request $request)
    {
        if ($request) {

        }
    }
}
