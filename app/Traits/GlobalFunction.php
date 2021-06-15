<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait GlobalFunction {

    //create a function that will globally set our time with asia/kuala lumpur timezone and 24 hour format
    public function customCurrentDate(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('y-m-d H:i:s');
    }

    //create a function that will globally set our 24 hour
    public function customCurrentHour(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('H');
    }

    //create a function that will globally set our time
    public function customCurrentTime(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('H:i:s');
    }

    //create a function that will globally set our day
    public function customCurrentDay(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('d');
    }

    //create a function that will globally set our month
    public function customCurrentMonth(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('m');
    }

    //create a function that will globally set our month
    public function customFullTextMonth(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('F');
    }

    //create a function that will globally set our year
    public function customCurrentYear(){
        return Carbon::now("Asia/Kuala_Lumpur")->format('y');
    }

    //create a function that will globally set x of hours to expiration
    public function customAddHours($hr){
        $currentTime = Carbon::now("Asia/Kuala_Lumpur")->format('y-m-d H:i:s');
        $currentTime = Carbon::parse($currentTime);
        $currentTime->addHours($hr);

        return $currentTime;
    }

    //create a function that will globally set x of minutes to expiration
    public function customAddMinutes($min){
        $currentTime = Carbon::now("Asia/Kuala_Lumpur")->format('y-m-d H:i:s');
        $currentTime = Carbon::parse($currentTime);
        $currentTime->addMinutes($min);

        return $currentTime;
    }

    //create a global function that will return the api response
    public function customApiResponse($data, $status){

        $message = "";
        if($status == 200)
            $message = "OK";
        if($status == 201)
            $message = "Created";
        if($status == 202)
            $message = "Deleted";
        if($status == 204)
            $message = "Expired Token";
        if($status == 400)
            $message = "Duplicated";
        if($status == 401)
            $message = "Unauthorized/Access Token mismatched";
        if($status == 404)
            $message = "Not Found";
        if($status == 500)
            $message = "Internal Server Error";

        return [ 'data' => $data, 'status' => $status, 'message' => $message];
    }

    //added a function here for returning the pagination value
    public function getPaginationLimit(){
        return 5; //by default, setting our pagination limit to 5
    }
}