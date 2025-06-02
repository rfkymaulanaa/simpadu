<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [
            'nama' => 'Rifky Maulana ',
            'foto' => 'avatar5.png'
        ];
        return view('dashboard', compact('data'));
    }
}
