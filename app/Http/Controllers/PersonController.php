<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{   
    //muestra todas las personas
    public function index()
    {
        return Person::all();
    }
}
