<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Priest;

class MaintenanceController extends Controller
{
    public function index(){
        $certificates_to_delete = count(Certificate::where('is_deleted', 1)->get());
        $certificates_not_to_delete = count(Certificate::where('is_deleted', 0)->get());
        $priests_to_delete = count(Priest::where('is_deleted', 1)->get());
        $priests_not_to_delete = count(Priest::where('is_deleted', 0)->get());

        return view('pages.maintenance.index', compact('certificates_to_delete', 'certificates_not_to_delete','priests_to_delete', 'priests_not_to_delete'));
    }

    public function delete_records($isDelete){
        if($isDelete == 'records'){
            $certificates = Certificate::selectRaw('id')->where('is_deleted', 1)->get();

            $certificates->each->delete();
        }else{
            $priests = Priest::selectRaw('id')->where('is_deleted', 1)->get();

            $priests->each->delete();
        }
        return redirect('maintenance');
    }
}
