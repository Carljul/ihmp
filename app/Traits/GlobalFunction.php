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
        return [ 'data' => $data, 'status' => $status];
    }
}