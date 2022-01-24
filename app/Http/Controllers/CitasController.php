<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Auth::user()->citas;

        return view('citas.index', [
            'citas' => $citas,
        ]);
    }
}
