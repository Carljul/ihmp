<?php

namespace App\Http\Controllers;

use App\AccessToken;
use Illuminate\Http\Request;
use App\Traits\GlobalFunction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AccessTokenController extends Controller
{
    use GlobalFunction;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all data for AccessToken table
        $result = AccessToken::all();

        //returning json response
        return response()->json($this->customApiResponse($result, 200)); //OK
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request) // removed Request type for the mean time until further notice (fixed issue)
    {
        //count the existing user_id...
        $result = AccessToken::where('user_id', $request->user_id)->get();

        //if there is no existsing user_id then insert
        if(count($result) === 0){
            //creating our payload here...
            $payload = [
                "user_id" => $request->user_id,
                "token_key" => $request->token_key,
                "token_status"=> "valid", //valid by default
                // "expiration"=> $this->customAddMinutes(1), //add one minute to test
                "expiration"=> $this->customAddHours(12), //12 hours by default
                "created_at" => $this->customCurrentDate(),
                "updated_at" => $this->customCurrentDate()
            ];
            
            //inserting the new resource...
            $result = AccessToken::updateOrInsert($payload);

            //return json response
            return response()->json($this->customApiResponse($result, 201)); //CREATED
        }else {
            //creating our payload here...
            $payload = [
                "token_key" => $request->token_key,
                "token_status"=> "valid", //valid by default
                "expiration"=> $this->customAddHours(12), //12 hours by default
                "updated_at" => $this->customCurrentDate()
            ];

            //find the user_id to be update
            $resultResponse = AccessToken::where('user_id', $request->user_id);

            //update the resource...
            $resultResponse->update($payload);

            //return json response
            return response()->json($this->customApiResponse($result, 200)); //OK
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessToken  $AccessToken
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        //return specific row using token
        $result = AccessToken::where('token_key', $token)->get();

        //if token is not found
        if(count($result) === 0){
            //return json response
            return response()->json($this->customApiResponse([], 404)); //TOKEN NOT FOUND
        }else {

            //check if expired
            $currentExpiration = $result[0]["expiration"];
            $currentDate = $this->customCurrentDate();
            $currentExpiration = Carbon::parse($currentExpiration);
            $currentDate = Carbon::parse($currentDate);

            //create a variable that would check if expired or not
            $isExpired = $currentExpiration->lt($currentDate) == 1 ? true : false;
            
            //check if expired
            if($isExpired){

                //update the status to expired
                $payload = [
                    "token_status"=> "expired",
                ];

                //get the current row
                $currentRowData = AccessToken::where('token_key', $token);

                //update the resource...
                $currentRowData->update($payload);

                // then return the latest value
                $latestData = AccessToken::where('token_key', $token)->get();
        
                //return json response
                return response()->json($this->customApiResponse($latestData, 204)); //OK
            }else{
                //return json response
                return response()->json($this->customApiResponse($result, 200)); //OK
            }

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessToken  $AccessToken
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        //creating our payload here...
        $payload = [
            "token_status" => "expired",
            "updated_at" => $this->customCurrentDate()
        ];

        //find the resource...
        $result = AccessToken::where('user_id', $request->user_id)->where('token_key', $request->token_key)->get();

        //if there is no existsing data to update
        if(count($result) == 0){
            //return json response
            return response()->json($this->customApiResponse([], 404)); //ID NOT FOUND
        }

        //update the resource
        $updateResouce = AccessToken::where('user_id', $request->user_id)->where('token_key', $request->token_key);

        //then proceed with the update
        $updateResouce->update($payload);

        //return json response
        return response()->json($this->customApiResponse($updateResouce, 200)); //OK
    }
}
