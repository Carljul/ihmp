<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Traits\GlobalFunction;

class GeneralController extends Controller
{
    use GlobalFunction;


    /// For testing purpose
    public function connectivity(){
        // Test database connection
        try {
            DB::connection()->getPdo();
            return response()->json($this->customApiResponse('', 200));
        } catch (\Exception $e) {
            // die("Could not connect to the database.  Please check your configuration. error:" . $e );
            return response()->json($this->customApiResponse($e, 500));
        }
    }
}
