<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    
    public function index(){
        $players = player::all();

        return response(view('players', [
            'players' => $players
        ]));
    }
}
