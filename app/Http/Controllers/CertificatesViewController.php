<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificatesViewController extends Controller
{
    public function index()
    {
        return view('pages.certificates.index');
    }
}
