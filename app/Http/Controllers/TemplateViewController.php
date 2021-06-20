<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateViewController extends Controller
{
    //returns Template Controller View
    public function index(){
        return view('pages.templates.index', ['title'=>'Manage Template']);
    }
}
