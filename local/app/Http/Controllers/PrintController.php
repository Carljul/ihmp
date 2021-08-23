<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public function index($certificate_type, $content, $meta){
        if($certificate_type == 'confirmation'){
            return view('pages.print.confirmation', ["content" => json_decode($content), "meta"=>json_decode($meta)]);
        }else if($certificate_type == 'marriage'){
            return view('pages.print.marriage', ["content" => json_decode($content), "meta"=>json_decode($meta)]);
        }else if($certificate_type == 'birth'){
            $godparents = explode(',', json_decode($meta)->godparents);
            // $godparents = ['Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma','Julcarl L. Selma'];
            return view('pages.print.birth', ["content" => json_decode($content), "meta"=>json_decode($meta), "godparents" => $godparents]);
        }else if($certificate_type == 'death'){
            return view('pages.print.death', ["content" => json_decode($content), "meta"=>json_decode($meta)]);
        }
    }

    public function redirect(){
        return redirect('/certificate');
    }
}
