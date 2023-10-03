<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudiController extends Controller
{
    public function index(){

        return view('audi.index');

    }
    public function gallery(){

        return view('gallery.gallery');

    }
}
