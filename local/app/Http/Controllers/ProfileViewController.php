<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileViewController extends Controller
{
    //
    public function index(){
        return view('pages.profile.index');
    }
}
