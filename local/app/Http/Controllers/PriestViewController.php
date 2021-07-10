<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriestViewController extends Controller
{
    //returns Priest Controller View
    public function index(){
        return view('pages.priests.index', ['title'=>'Manage Priests']);
    }
}
