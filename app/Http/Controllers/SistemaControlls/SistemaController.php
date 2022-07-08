<?php

namespace App\Http\Controllers\SistemaControlls;

use App\Http\Controllers\Controller;
use App\Models\User;

class SistemaController extends Controller
{
    public function index()
    {
        $users = User::role('Super Administrador')->orderBy('name', 'asc')->get();
        return view('sistema.index', compact('users'));
    }
}
